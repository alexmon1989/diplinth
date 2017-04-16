<?php

namespace App\Http\Controllers\Admin;

use App\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Orchestra\Support\Facades\Memory;

class SectionsController extends Controller
{
    /**
     * Страница отображения настроек главной секции.
     */
    public function mainIndex()
    {
        $section = Section::whereSlug('main')->first();
        $sectionProperties = [];
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $sectionProperties[$lang] = json_decode($section->translate($lang)->properties);
        }
        $sectionSpecs = json_decode($section->specs);

        return view('admin.sections.main.index', compact('section', 'sectionProperties', 'sectionSpecs'));
    }

    /**
     * Обработчик запроса изменения настроек главной секции.
     */
    public function mainUpdate(Request $request)
    {
        // Валидация данных
        $validationRules = [];
        foreach (['ru' => 'русском', 'uk' => 'украинском', 'en' => 'английском', 'pl' => 'польском'] as $lang => $value) {
            $validationRules['title_' . $lang] = 'required|max:255';
            $validationRules['under_title_text_' . $lang] = 'required';
            $validationRules['form_title_' . $lang] = 'required';
            $messages['title_' . $lang . '.required'] = "Поле \"Заголовок секции\" на {$value} языке обязательно для заполнения";
            $messages['title_' . $lang . '.max'] = "Поле \"Заголовок секции\" на {$value} языке должно содержать не более 255 символов";
            $messages['under_title_text_' . $lang . '.required'] = "Поле \"Текст под заголовком\" на {$value} языке обязательно для заполнения";
            $messages['form_title_' . $lang . '.required'] = "Поле \"Заголовок формы\" на {$value} языке обязательно для заполнения";
        }
        $validationRules['form_email'] = 'required|email';
        $messages['form_email.required'] = 'Поле "Отправлять данные формы на следующий адрес" обязательно для заполнения';
        $messages['form_email.email'] = 'Поле "Отправлять данные формы на следующий адрес" должно содержать правильный E-Mail';
        $this->validate($request, $validationRules, $messages);

        $section = Section::whereSlug('main')->first();
        $section->specs = json_encode([
            'form_email' => $request->form_email,
        ]);
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $section->translateOrNew($lang)->properties = json_encode([
                'title' => trim($request->get('title_' . $lang)),
                'under_title_text' => trim($request->get('under_title_text_' . $lang)),
                'form_title' => trim($request->get('form_title_' . $lang)),
            ]);
        }
        $section->save();

        // E-Mail для формы
        Memory::put('orders_form_email', $request->form_email);

        return redirect()->back()->with('success', 'Данные успешно сохранены');
    }

    /**
     * Страница отображения настроек секции "О нас".
     */
    public function aboutIndex()
    {
        $section = Section::whereSlug('about')->first();
        $sectionProperties = [];
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $sectionProperties[$lang] = json_decode($section->translate($lang)->properties);
        }

        return view('admin.sections.about.index', compact('section', 'sectionProperties'));
    }

    /**
     * Обработчик запроса изменения настроек секции "О нас".
     */
    public function aboutUpdate(Request $request)
    {
        // Валидация данных
        $validationRules = [];
        $messages = [];
        for ($i = 1; $i <= 4; $i++) {
            $validationRules['image_' . $i] = 'image|max:1024';
            $messages['image_' . $i . '.image'] = "Поле \"Изображение для блока {$i}\" должно содержать изображение";
            $messages['image_' . $i . '.max'] = "Поле \"Изображение для блока {$i}\" должно содержать файл размером не более 1024 Килобайта";
        }
        foreach (['ru' => 'русском', 'uk' => 'украинском', 'en' => 'английском', 'pl' => 'польском'] as $lang => $value) {
            $validationRules['title_' . $lang] = 'required|max:255';
            $validationRules['parallax_text_' . $lang] = 'required|max:255';
            $messages['title_' . $lang . '.required'] = "Поле \"Заголовок секции\" на {$value} языке обязательно для заполнения";
            $messages['title_' . $lang . '.max'] = "Поле \"Заголовок секции\" на {$value} языке должно содержать не более 255 символов";
            $messages['title_' . $lang . '.required'] = "Поле \"Текст в Parallax-блоке\" на {$value} языке обязательно для заполнения";
            $messages['title_' . $lang . '.max'] = "Поле \"Текст в Parallax-блоке\" на {$value} языке должно содержать не более 255 символов";
            for ($i = 1; $i <= 4; $i++) {
                $validationRules['block_' . $i . '_text_' . $lang] = 'required';
                $messages['block_' . $i . '_text_' . $lang . '.required'] = "Поле \"Текст блока {$i}\" на {$value} языке обязательно для заполнения";
            }
        }
        $this->validate($request, $validationRules, $messages);

        // Редактирование данных
        $section = Section::whereSlug('about')->first();
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $section->translateOrNew($lang)->properties = json_encode([
                'title' => trim($request->get('title_' . $lang)),
                'block_1_text' => trim($request->get('block_1_text_' . $lang)),
                'block_2_text' => trim($request->get('block_2_text_' . $lang)),
                'block_3_text' => trim($request->get('block_3_text_' . $lang)),
                'block_4_text' => trim($request->get('block_4_text_' . $lang)),
                'parallax_text' => trim($request->get('parallax_text_' . $lang)),
            ]);
        }
        $section->save();

        // Изображения
        $imgDir = public_path('img' . DIRECTORY_SEPARATOR
            . 'about' . DIRECTORY_SEPARATOR);
        for ($i = 1; $i <= 4; $i++) {
            if ($request->file('image_' . $i)) {
                Image::make($request->file('image_' . $i))->resize(200, 200)->save($imgDir . $i . '.jpg', 60);
            }
        }

        return redirect()->back()->with('success', 'Данные успешно сохранены');
    }

    /**
     * Страница отображения настроек секции "Контакты".
     */
    public function contactsIndex()
    {
        $section = Section::whereSlug('contacts')->first();
        $sectionProperties = [];
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $sectionProperties[$lang] = json_decode($section->translate($lang)->properties);
        }
        $sectionSpecs = json_decode($section->specs);

        return view('admin.sections.contacts.index', compact('section', 'sectionProperties', 'sectionSpecs'));
    }

    /**
     * Обработчик запроса изменения настроек секции "Контакты".
     */
    public function contactsUpdate(Request $request)
    {
        // Валидация данных
        $validationRules = [];
        $messages = [];
        foreach (['ru' => 'русском', 'uk' => 'украинском', 'en' => 'английском', 'pl' => 'польском'] as $lang => $value) {
            $validationRules['title_' . $lang] = 'required|max:255';
            $validationRules['under_title_text_' . $lang] = 'required';
            $messages['title_' . $lang . '.required'] = "Поле \"Заголовок секции\" на {$value} языке обязательно для заполнения";
            $messages['title_' . $lang . '.max'] = "Поле \"Заголовок секции\" на {$value} языке должно содержать не более 255 символов";
            $messages['under_title_text_' . $lang . '.required'] = "Поле \"Текст под заголовком\" на {$value} языке обязательно для заполнения";
        }
        $validationRules['lat'] = 'required|numeric';
        $validationRules['lng'] = 'required|numeric';
        $validationRules['form_email_orders'] = 'required|email';
        $validationRules['form_email'] = 'required|email';
        $messages['lat.required'] = 'Поле "Широта" обязательно для заполнения';
        $messages['lat.numeric'] = 'Поле "Широта" должно содержать значение числового типа';
        $messages['lng.required'] = 'Поле "Долгота" обязательно для заполнения';
        $messages['lng.numeric'] = 'Поле "Долгота" должно содержать значение числового типа';
        $messages['form_email_orders.required'] = 'Поле "Отправлять данные формы заказа на следующий адрес" обязательно для заполнения';
        $messages['form_email_orders.email'] = 'Поле "Отправлять данные формы заказа на следующий адрес" должно содержать правильный E-Mail';
        $messages['form_email.required'] = 'Поле "Отправлять данные контактной формы на следующий адрес" обязательно для заполнения';
        $messages['form_email.email'] = 'Поле "Отправлять данные контактной формы на следующий адрес" должно содержать правильный E-Mail';
        $this->validate($request, $validationRules, $messages);

        // Сохранение данных
        $section = Section::whereSlug('contacts')->first();
        $section->specs = json_encode([
            'email' => trim($request->email),
            'web_site' => str_replace('http://', '', trim($request->web_site)),
            'facebook' => trim($request->facebook),
            'map_marker_position' => [
                'lat' => $request->lat,
                'lng' => $request->lng,
            ],
        ]);
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $section->translateOrNew($lang)->properties = json_encode([
                'title' => trim($request->get('title_' . $lang)),
                'under_title_text' => trim($request->get('under_title_text_' . $lang)),
                'address' => trim($request->get('address_' . $lang)),
                'tel_1' => trim($request->get('tel_1_' . $lang)),
                'tel_2' => trim($request->get('tel_2_' . $lang)),
                'tel_3' => trim($request->get('tel_3_' . $lang)),
                'collaboration' => trim($request->get('collaboration_' . $lang)),
            ]);
        }
        $section->save();

        // E-Mail для форм
        Memory::put('orders_form_email', $request->form_email_orders);
        Memory::put('contacts_form_email', $request->form_email);

        return redirect()->back()->with('success', 'Данные успешно сохранены');
    }

    public function fixingIndex()
    {
        $section = Section::whereSlug('fixing')->first();
        $sectionProperties = [];
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $sectionProperties[$lang] = json_decode($section->translate($lang)->properties);
        }
        $sectionSpecs = json_decode($section->specs);

        return view('admin.sections.fixing.index', compact('section', 'sectionProperties', 'sectionSpecs'));
    }

    public function fixingUpdate(Request $request)
    {
        // Валидация данных
        $validationRules = [
            'image_1' => 'image|max:1024',
            'image_2' => 'image|max:1024',
            'block_1_icon' => 'required',
            'block_2_icon' => 'required',
            'block_3_icon' => 'required',
        ];
        $messages = [];
        foreach (['ru' => 'русском', 'uk' => 'украинском', 'en' => 'английском', 'pl' => 'польском'] as $lang => $value) {
            $validationRules['title_' . $lang] = 'required|max:255';
            $validationRules['under_title_text_' . $lang] = 'required';
            $messages['title_' . $lang . '.required'] = "Поле \"Заголовок секции\" на {$value} языке обязательно для заполнения";
            $messages['title_' . $lang . '.max'] = "Поле \"Заголовок секции\" на {$value} языке должно содержать не более 255 символов";
            $messages['under_title_text_' . $lang . '.required'] = "Поле \"Текст под заголовком\" на {$value} языке обязательно для заполнения";
        }
        $messages['image_1.image'] = 'Поле "Изображение 1" должно содержать изображение';
        $messages['image_1.max'] = 'Поле "Изображение 1" должно содержать файл размером не более 1024 Килобайта';
        $messages['image_2.image'] = 'Поле "Изображение 2" должно содержать изображение';
        $messages['image_2.max'] = 'Поле "Изображение 2" должно содержать файл размером не более 1024 Килобайта';
        $messages['block_1_icon.required'] = 'Поле "Иконка блока 1" обязательно для заполнения';
        $messages['block_2_icon.required'] = 'Поле "Иконка блока 2" обязательно для заполнения';
        $messages['block_3_icon.required'] = 'Поле "Иконка блока 3" обязательно для заполнения';
        $this->validate($request, $validationRules, $messages);

        // Сохранение данных
        $section = Section::whereSlug('fixing')->first();
        $section->specs = json_encode([
            'block_1_icon' => trim($request->block_1_icon),
            'block_2_icon' => trim($request->block_2_icon),
            'block_3_icon' => trim($request->block_3_icon),
        ]);
        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            $section->translateOrNew($lang)->properties = json_encode([
                'title' => trim($request->get('title_' . $lang)),
                'under_title_text' => trim($request->get('under_title_text_' . $lang)),
                'block_1' => [
                    'title' => trim($request->get('block_1_title_' . $lang)),
                    'text' => trim($request->get('block_1_text_' . $lang)),
                ],
                'block_2' => [
                    'title' => trim($request->get('block_2_title_' . $lang)),
                    'text' => trim($request->get('block_2_text_' . $lang)),
                ],
                'block_3' => [
                    'title' => trim($request->get('block_3_title_' . $lang)),
                    'text' => trim($request->get('block_3_text_' . $lang)),
                ],
            ]);
        }
        $section->save();

        // Изображения
        $imgDir = public_path('img' . DIRECTORY_SEPARATOR
            . 'products' . DIRECTORY_SEPARATOR
            . 'fixing' . DIRECTORY_SEPARATOR);
        if (!file_exists($imgDir)) {
            File::makeDirectory($imgDir, 0775, true);
        }
        if ($request->file('image_1')) {
            Image::make($request->file('image_1'))->save($imgDir . '1.jpg', 60);
        }
        if ($request->file('image_2')) {
            Image::make($request->file('image_2'))->save($imgDir . '2.jpg', 60);
        }

        return redirect()->back()->with('success', 'Данные успешно сохранены');
    }
}
