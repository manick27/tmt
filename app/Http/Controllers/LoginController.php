<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class LoginController extends Controller
{
    public function userSave(CreatesNewUsers $creator, Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'frist_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'condition' => 'accepted',
        ]);

        // dd("azerty");
        event(new Registered($user = $creator->create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'country' => $request->get('country'),
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ])));

        // dd($user);
        $user->save();

        Auth::guard()->login($user);

        return redirect()->route('home');
    }
}
