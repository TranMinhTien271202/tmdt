<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cate = Category::all();
        $cart = cart::where('user_id', auth()->user()->id)->get();
        $product = Product::all();
        $data = cart::join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('carts.*, products.price * carts.quantity as total')
            // ->selectRaw('carts.*, IF(products.sale == null) products.sale * carts.quantity ELSE products.price * carts.quantity AS total')
            ->get();
            // ->selectRaw('name, CASE WHEN age < 18 THEN "Chưa trưởng thành" ELSE "Đã trưởng thành" END as status')
        return view('cart.index', ['cate' => $cate, 'cart' => $cart]);
    }
    public function store(Request $request)
    {

        $data = cart::where('user_id', auth()->user()->id)->where('product_id', $request->product_id)->first();
        if ($data) {
            $data->quantity += $request->quantity;
            $data->save();
        } else {
            $data = cart::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'user_id' => auth()->user()->id
            ]);
        }
        return response()->json($data);
    }
}
