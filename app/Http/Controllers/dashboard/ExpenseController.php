<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreExpenseRequest;
use App\Http\Requests\Dashboard\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::latest()->paginate(3);
        return view('dashboard.pages.expense', [
            'expenses' => $expenses
        ]);
    }

    public function store(StoreExpenseRequest $request)
    {
        // dd($request);
        Expense::create([
            'category' => $request->input('category'),
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
        ]);
        return redirect('/expenses')->with('addexpense', 'Your Expense is Created Successfully!!!');

    }
    public function update(UpdateExpenseRequest $request, $id)
    {
        Expense::where('id', $id)->update([
            'category' => $request->input('category'),
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
        ]);
        return redirect('/expenses')->with('updateexpense', 'Your Expense is Updated Successfully!!!');

    }
    public function delete(Request $request, $id)
    {
        Expense::where('id', $id)->delete();
        return redirect('/expenses')->with('deleteexpense', 'Your Expense is Deleted Successfully!!!');
    }

}
