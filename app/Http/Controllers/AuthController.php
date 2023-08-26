<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $result = Auth::attempt($credentials);
        if ($result) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function personal(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        DB::table('users')->where('id', Auth::id())->update($data);
        return back()->withErrors([
            'error_profile' => 'The provided information Saved.',
        ]);
    }

    public function updatePassword(Request $request)
    {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ]);

            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->withErrors([
                    'error_security' => 'Your Old password is wrong.',
                ]);
            }

            User::where('id',auth()->user()->user_id)->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->withErrors([
                'error_security' => 'Successfull password updated!!.',
            ]);
    }
}
