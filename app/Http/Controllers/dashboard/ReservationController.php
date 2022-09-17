<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return view('dashboard.pages.reservation',['reservations' => $reservations]);
    }
    public function approve(Request $request, $id)
    {

        Reservation::where('id', $id)->update([
            'status' => true
        ]);
        return redirect('/allreservation')->with('approve', 'Reservation is Aprroved Successfully!!!');
    }

    public function delete(Request $request, $id)
    {
        Reservation::where('id', $id)->delete();
        return redirect('/allreservation')->with('deletereservation', 'Reservation is Deleted Successfully!!!');
    }
}
