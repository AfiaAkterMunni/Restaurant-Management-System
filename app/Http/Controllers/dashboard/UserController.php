<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('dashboard.pages.user',['users' => $users]);
    }
    public function store(StoreUserRequest $request)
    {
        // dd($request);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password'))
        ]);
        return redirect('/users')->with('adduser', 'New User is Created Successfully!!!');

    }
}
