<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        $setting = Setting::first();
    
        if ($setting->show_landing_page == 1) {

            $total_reseller = User::where('role', 'customer')->count();
            $total_sales    = Sale::sum('qty');
            $total_products = Product::count();

            $products = Product::take(6)->get();

            return view('welcome', compact('total_reseller', 'total_sales', 'total_products', 'products', 'setting'));
        }else{
            return redirect()->intended("/login");
        }
    }
}
