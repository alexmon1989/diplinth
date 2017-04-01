<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::withTranslation()->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function createOrUpdate(Request $request, Product $product)
    {
        // Валидация данных
        $validationRules = [
            'title_ru'          => 'required|max:255',
            'title_uk'          => 'required|max:255',
            'title_en'          => 'required|max:255',
            'title_pl'          => 'required|max:255',
            'description_ru'    => 'required',
            'description_uk'    => 'required',
            'description_en'    => 'required',
            'description_pl'    => 'required',
            'enabled'           => 'boolean',
            'is_new'            => 'boolean',
            'in_stock'          => 'boolean',
        ];
        if (!$product->id || $request->small_image) {
            $validationRules['small_image'] = 'required|image|max:1024';
        }
        if (!$product->id || $request->full_image) {
            $validationRules['full_image'] = 'required|image|max:1024';
        }
        $this->validate($request, $validationRules);

        // Создание / изменение данных продукта
        if (!$product->id) {
            $product = new Product();
            $message = 'Продукт успешно создан!';
        } else {
            $message = 'Продукт успешно отредактирован!';
        }
        $product->enabled = (bool) $request->enabled;
        $product->is_new = (bool) $request->is_new;
        $product->in_stock = (bool) $request->in_stock;
        foreach (['ru', 'uk', 'en', 'pl'] as $locale) {
            $product->translateOrNew($locale)->title = trim($request->get('title_'.$locale));
            $product->translateOrNew($locale)->description = trim($request->get('description_'.$locale));
        }
        $product->save();

        // Изображения
        $imgDir = public_path( 'img' . DIRECTORY_SEPARATOR
            . 'products' . DIRECTORY_SEPARATOR
            . $product->id . DIRECTORY_SEPARATOR);
        if (!file_exists($imgDir)) {
            File::makeDirectory($imgDir, 0775, true);
        }
        if ($request->small_image) {
            Image::make($request->small_image)->resize(700, 525)->save($imgDir . 'small.jpg', 60);
        }
        if ($request->full_image) {
            Image::make($request->full_image)->resize(700, 467)->save($imgDir . 'full.jpg', 60);
        }

        return redirect()->route('admin.sections.products.edit', ['product' => $product])->with('success', $message);
    }

    public function delete(Product $product)
    {
        File::deleteDirectory(public_path( 'img' . DIRECTORY_SEPARATOR
            . 'products' . DIRECTORY_SEPARATOR
            . $product->id));
        $product->delete();

        return redirect()->back()->with('success', 'Продукт успешно удалён.');
    }
}
