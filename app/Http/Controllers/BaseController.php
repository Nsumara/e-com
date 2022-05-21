<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('layouts.layouts.app');
    }

    public function about_Us()
    {
        return view('layouts.about');
    }
    public function blog()
    {
        return view('layouts.blog');
    }
    public function contectUs()
    {
        return view('layouts.contectus');
    }
    public function shop()
    {
        return view('layouts.shop');
    }
    public function cart()
    {
        return view('layouts.cart');
    }
    public function checkOut()
    {
        return view('layouts.chackout');
    }
    public function singleProduct()
    {
        return view('layouts.singleproduct');
    }


}
