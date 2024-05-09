<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
        return view('frontend.shop');
    }
    public function cart()
    {

        return view('frontend.cart');
    }
    public function checkout()
    {

        return view('frontend.checkout');
    }

    public function shop_detail()
    {

        return view('frontend.shop-details');
    }

    public function  pagenotfound()
    {

        return view('frontend.404');
    }
}
