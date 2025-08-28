<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showregister()
    {
        return view('auth.register');
    }
    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);



        $userCount  = User::count();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $userCount === 0 ? 'admin' : 'user';

        $user->save();

        return redirect('/');

    }

    public function showlogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'emial' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function getprofile()
    {
        $userAuth = Auth::user()->profile();

        $userId = Auth::id();

        $profileData = Profile::find('user_id', $userId)->first();

        if($userAuth->id){
            return view("profile.edit", $profileData);
        }else{
            return view("profile.create");
        }
    }

    public function createprofile(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'bio' => 'required|min:5',
        ]);

        $userId = Auth::id();

        $profile = new Profile;
        $profile->name = $request->input('age');
        $profile->email = $request->input('bio');
        $profile->user_id = $userId;

        $profile ->save();

        return redirect('/profile');
    }
    public function updateprofile(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'bio' => 'required|min:5',
        ]);

        $profile = Profile::find($id);
        $profile->name = $request->input('age');
        $profile->email = $request->input('bio');
        $profile->user_id;

        $profile ->save();

        return redirect('/profile');
    }
}
