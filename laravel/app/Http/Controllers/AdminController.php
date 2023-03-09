<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function orders(Request $request)
    {
        $status = $request->get('status');

        $orders = Order::query();

        if ($status) {
            $orders->where('status', $status);
        }

        $orders = $orders->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.orders', compact('orders', 'status'));
    }

    public function viewOrder($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.view_order', compact('order'));
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'Отменен';
        $order->save();

        return redirect()->back()->with('success', 'Заказ отменен.');
    }

    public function confirmOrder($id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'Подтвержден';
        $order->save();

        return redirect()->back()->with('success', 'Заказ подтвержден.');
    }

    public function products(Request $request)
    {
        $search = $request->get('search');

        $category = DB::table('categories')->limit(1)->get();

        $products = Product::query();

        if ($search) {
            $products->where('name', 'like', '%' . $search . '%');
        }

        $products = $products->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products', compact('products', 'search', 'category'));
    }

    public function addProduct(Request $request)
    {
        $product = new Product;

        $product->name = $request->get('name');
        // Сохраняем картинку в папку storage/app/public/images
        $product->image = $request->get('image');
        $product->price = $request->get('price');
        $product->year = $request->get('year');
        $product->category = $request->get('category');
        $product->quantity = $request->get('quantity');
        $product->description = $request->get('description');
        $product->model = $request->get('model');

        $product->save();

        return redirect()->back()->with('success', 'Товар добавлен.');
    }



    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $category = DB::table('categories')->get();

        return view('admin.editProduct', compact('product', 'category'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->price = $request->get('price');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);
                $product->image = $filename;
            }

            $product->category = $request->get('category');
            $product->save();

            return redirect()->route('admin.orders');
        } else {
            return redirect()->back()->with('error', 'Товар не найден.');
        }
    }



    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back()->with('success', 'Товар удален.');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $category = new Category;

        $category->name_category = $request->get('name');
        $category->save();

        return redirect()->back()->with('success', 'Категория добавлена.');
    }

    public function deleteCategory($id)
    {
        $category  = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Категория  удален.');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit-category', compact('category'));
    }

    // метод обновления категории в базе данных
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if($category){
            $category->name_category = $request->get('name');
            $category->save();
            return redirect()->route('admin.category');
        }else {
            return redirect()->back()->with('error', 'Категория не найдена.');
        }
        return view('admin.edit-category', compact('category'));
    }
}
