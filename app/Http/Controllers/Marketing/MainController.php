<?php

namespace App\Http\Controllers\Marketing;

use App\Mail\ContactsFormPosted;
use App\Mail\OrderSended;
use App\Mail\OrderSendedClient;
use App\Order;
use App\Product;
use App\Section;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
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
     * Обработчик запроса на отправку контактной формы
     */
    public function postContactForm(Requests\SendContactsFormRequest $request)
    {
        Mail::to(Memory::get('contacts_form_email', 'diplinth@ukr.net'))->send(new ContactsFormPosted($request->all()));

        return response()->json(['result' => 'success']);
    }

    public function productDetails(Product $product)
    {
        return view('marketing.product_details', compact('product'));
    }

    public function productOrderForm(Product $product)
    {
        return view('marketing._partial.order_form', compact('product'));
    }

    /**
     * Обработчик создания заказа.
     *
     * @param Requests\MakeOrderRequest $request
     * @param Product $product
     * @return array
     */
    public function makeOrder(Requests\MakeOrderRequest $request, Product $product)
    {
        $price = $product->heights()->whereValue($request->get('height'))->first()->price;

        // Детали заказа в массив
        $orderArr = [
            'product' => $product,
            'product_title_ru' => $product->translate('ru')->title,
            'height' => $request->get('height'),
            'count' => $request->get('count'),
            'username' => $request->get('username'),
            'userphone' => $request->get('userphone'),
            'useremail' => $request->get('useremail'),
            'price' => $price,
            'total_sum' => $price * $request->get('count')
        ];

        // Создание заказа в БД
        $order = new Order();
        $order->details = json_encode($orderArr);
        $order->save();

        // Отправка писем
        Mail::to(Memory::get('orders_form_email', 'diplinth@ukr.net'))->send(new OrderSended($orderArr));
        if ($orderArr['useremail']) {
            Mail::to($orderArr['useremail'])->send(new OrderSendedClient($orderArr));
        }

        return response()->json([
            'success' => 1,
            'message' => Lang::get('interface.sections.products.order_success_message')
        ]);
    }
}
