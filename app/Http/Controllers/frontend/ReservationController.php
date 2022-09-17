<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('frontend.pages.reservation');
    }

    public function store(StoreReservationRequest $request)
    {
        // dd($request);
        Reservation::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'table_no' => $request->input('table_no'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'guest_no' => $request->input('guest_no'),
            'status' => false
        ]);
        return redirect('/reservation')->with('success', 'Your Table is Reserved Successfully!!!');

    }
}
