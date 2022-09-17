<?php

namespace App\Http\Controllers\dashboard;

use App\Charts\RevenueChart;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Menu;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrder = Order::count();
        $totalItem = Menu::count();
        $income = Order::sum('totalPrice');
        $expense = Expense::sum('amount');
        $profit = $income - $expense;
        $todaysOrders = Order::whereDate('created_at', Carbon::today())->get();

        //chart
        $revenueChart = new RevenueChart;
        $dates = [
            Carbon::today()->subDays(6)->toDateString(),
            Carbon::today()->subDays(5)->toDateString(),
            Carbon::today()->subDays(4)->toDateString(),
            Carbon::today()->subDays(3)->toDateString(),
            Carbon::today()->subDays(2)->toDateString(),
            Carbon::today()->subDays(1)->toDateString(),
            Carbon::today()->toDateString()
        ];
        $profitDataSet = [];
        foreach($dates as $date)
        {
            $orderPrice = Order::whereDate('created_at', $date)->sum('totalPrice');
            $expensePrice = Expense::whereDate('created_at', $date)->sum('amount');
            $profitDataSet[] = $orderPrice - $expensePrice;
        }
        $revenueChart->labels($dates);
        $revenueChart->dataset('Revenue Graph', 'line', $profitDataSet);

        return view('dashboard.pages.index', [
            'totalOrder' => $totalOrder,
            'totalItem' => $totalItem,
            'profit' => $profit,
            'todaysOrders' => $todaysOrders,
            'revenueChart' => $revenueChart
        ]);
    }
}
