<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\DeliveryAddress;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('frontend.index', compact('products', 'categories'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('frontend.shop', compact('products', 'categories'));
    }
    public function cart()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::with('product', 'user')->where('user_id', $user_id)->get();


        return view('frontend.cart', compact('carts'));
    }
    public function checkout(Request $request)
    {
        // Fetch the selected items array from the request
        $selectedItems = $request->selectedItems;

        // Fetch the user ID
        $user_id = auth()->user()->id;

        // Fetch user details
        $user_details = User::with('delivery')->where('id', $user_id)->first();

        // Fetch carts based on user ID and selected item IDs
        // if (session()->has('selectedItems')) {
        //     $selectedItems = session()->get('selectedItems');
        //     $selectedItems = unserialize($selectedItems);

        //     $carts = Cart::with('product', 'user')
        //         ->where('user_id', $user_id)
        //         ->whereIn('id', $selectedItems)
        //         ->get();
        //     notify()->error('Payment failed, Order placed Successfully');
        //     session()->forget('selectedItems');
        //     return view('frontend.checkout', compact('carts', 'user_details', 'selectedItems'));
        // } else {
        $carts = Cart::with('product', 'user')
            ->where('user_id', $user_id)
            ->whereIn('id', $selectedItems)
            ->get();

        // Return the checkout view with the filtered carts and user details
        return view('frontend.checkout', compact('carts', 'user_details', 'selectedItems'));
    }

    public function shop_detail($id)
    {
        $product = Product::with('category')->find($id);
        $related_product = Product::with('category')->where('id', '!=', $product->id)->get();

        return view('frontend.shop-details', compact('product', 'related_product'));
    }

    public function  pagenotfound()
    {

        return view('frontend.404');
    }
    public function  order_lists(){
                
        return view('frontend.orders_lists');
    }
}
