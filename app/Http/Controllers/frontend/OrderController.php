<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreOrderRequest;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $menus = Menu::get();
        return view('frontend.pages.order', ['menus' => $menus]);
    }
    public function store(StoreOrderRequest $request)
    {
        $price = 0;
        foreach($request->input('menus') as $menu)
        {
            $arry = explode("-",$menu);
            $price += (int)$arry[1];
            $menus_id[] = (int)$arry[0];
        }

        $order = Order::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'location' => $request->input('location'),
            'orderType' => $request->input('orderType'),
            'totalPrice' => $price,
            'status' => false
        ]);

        $order->menus()->attach($menus_id);

        return redirect('/order')->with('success', 'Your order is placed Successfully!!!');

    }
}
