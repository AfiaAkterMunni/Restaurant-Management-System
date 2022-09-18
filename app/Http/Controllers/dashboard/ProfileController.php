<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChangePasswordRequest;
use App\Http\Requests\Dashboard\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(UpdateProfileRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ];
        User::where('id', auth()->id())->update($data);
        return redirect(url()->previous())->with('success', 'Profile Updated Successfully!!!');
    }

    public function changepassword(ChangePasswordRequest $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        if(Hash::check($request->old_pass, $user->password))
        {
            User::where('id', $id)->update([
                'password' => Hash::make($request->input('password'))
            ]);
            return redirect(url()->previous())->with('password', 'Your Password Changed Successfully!!!');
        }
        return redirect(url()->previous())->with('erorrpass', 'Your Old Password is Wrong!!!');
    }
}
