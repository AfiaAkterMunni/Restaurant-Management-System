<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('dashboard.pages.order', ['orders' => $orders]);
    }

    public function approve(Request $request, $id)
    {

        Order::where('id', $id)->update([
            'status' => true
        ]);
        return redirect('/allorder')->with('approve', 'Order is Aprroved Successfully!!!');
    }

    public function delete(Request $request, $id)
    {
        $order = Order::find($id);
        $order->menus()->detach();
        $order->delete();
        return redirect('/allorder')->with('delete', 'Order is Deleted Successfully!!!');
    }
}
