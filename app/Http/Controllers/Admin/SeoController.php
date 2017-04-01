<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Orchestra\Support\Facades\Memory;

class SeoController extends Controller
{
    public function index()
    {
        return view('admin.seo.index');
    }

    public function update(Request $request)
    {
        // Валидация данных
        $validationRules = [];
        $messages = [];
        foreach (['ru' => 'русском', 'uk' => 'украинском', 'en' => 'английском', 'pl' => 'польском'] as $lang => $value) {
            $validationRules['title_' . $lang] = 'required|max:100';
            $messages['title_' . $lang . '.required'] = "Поле \"Title\" на {$value} языке обязательно для заполнения";
            $messages['title_' . $lang . '.max'] = "Поле \"Title\" на {$value} должно содержать не более 100 символов (но рекомендуется до 70).";
        }
        $this->validate($request, $validationRules, $messages);

        foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
            Memory::put('site.title_' . $lang, trim($request->get('title_' . $lang)));
            Memory::put('site.keywords_' . $lang, trim($request->get('keywords_' . $lang)));
            Memory::put('site.description_' . $lang, trim($request->get('description_' . $lang)));
        }

        return redirect()->back()->with('success', 'Данные успешно сохранены');
    }
}
