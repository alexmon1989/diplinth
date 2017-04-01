<?php

namespace App\Http\Controllers\Marketing;

use App\Mail\ContactsFormPosted;
use App\Mail\OrderSended;
use App\Product;
use App\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Orchestra\Support\Facades\Memory;

class MainController extends Controller
{
    /**
     * Отображение страницы сайта
     */
    public function index()
    {
        // Данные секций
        $sections = Section::withTranslation()->get();

        // Отдельно секции
        $mainSection = $sections->where('slug', 'main')->first();
        $mainSectionProperties = json_decode($mainSection->properties);
        $aboutSection = $sections->where('slug', 'about')->first();
        $aboutSectionProperties = json_decode($aboutSection->properties);
        $fixingSection = $sections->where('slug', 'fixing')->first();
        $fixingSectionProperties = json_decode($fixingSection->properties);
        $fixingSectionSpecs = json_decode($fixingSection->specs);
        $contactsSection = $sections->where('slug', 'contacts')->first();
        $contactsSectionProperties = json_decode($contactsSection->properties);
        $contactsSectionSpecs = json_decode($contactsSection->specs);

        // Продукция
        $products = Product::withTranslation()->orderBy('created_at', 'ASC')->get();

        // Продукция отфильтрованная (не новинки, новинки)
        $productsNotNew = $products->where('is_new', false);
        $productsNew = $products->where('is_new', true);

        return view('marketing.welcome', compact(
                'mainSectionProperties',
                'aboutSectionProperties',
                'fixingSection',
                'fixingSectionProperties',
                'fixingSectionSpecs',
                'contactsSectionProperties',
                'contactsSectionSpecs',
                'productsNotNew',
                'productsNew'
            )
        );
    }

    /**
     * Обработчик запроса на оформление заявки
     */
    public function postOrderForm(Request $request)
    {
        Mail::to(Memory::get('orders_form_email', 'diplinth@ukr.net'))->send(new OrderSended($request->all()));

        return response()->json(['result' => 'success']);
    }

    /**
     * Обработчик запроса на отправку контактной формы
     */
    public function postContactForm(Request $request)
    {
        Mail::to(Memory::get('contacts_form_email', 'diplinth@ukr.net'))->send(new ContactsFormPosted($request->all()));

        return response()->json(['result' => 'success']);
    }

    public function productDetails(Product $product)
    {
        return view('marketing.product_details', compact('product'));
    }
}
