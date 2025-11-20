<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Socialite;
use App\Models\DetailUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->tokens()->delete();
            Auth::logout();
            return redirect('/auth/login')->with('success', 'Logout successful. Thank you for using our application!');
        }
        return redirect('/auth/login')->with('error', 'You are not logged in');
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $role = $googleUser->email === 'kickardimas@gmail.com' ? 'admin' : 'user';

        $user = DetailUser::updateOrCreate(
            ['email' => $googleUser->email],
            [
                'id' => Str::uuid(),
                'nama' => $googleUser->name,
                'email' => $googleUser->email,
                'photo' => $googleUser->avatar,
                'role' => $role,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]
        );

         // Hapus semua token sebelumnya
        $user->tokens()->delete();

        // Buat token baru
        $token = $user->createToken('auth_token')->plainTextToken;
        
        // Regenerasi session ID untuk keamanan
        session()->regenerate();
        
        // Loginkan user ke session Laravel
        Auth::login($user);
        
        // Simpan token ke session jika ingin digunakan di blade atau route biasa
        session(['auth_token' => $token]);

        return redirect('/');
    }


    // unused
    public function login(Request $request)
    {
        dd($request->all());
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = UserData::where('email', $request->email)->first();
        
        if ($user == null) {
            return redirect()->back()->with('error', 'Email not found');
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password is incorrect');
        }

        // Hapus semua token sebelumnya
        $user->tokens()->delete();

        // Buat token baru
        $token = $user->createToken('auth_token')->plainTextToken;
        
        // Regenerasi session ID untuk keamanan
        $request->session()->regenerate();
        
        // Loginkan user ke session Laravel
        Auth::login($user);
        
        // Simpan token ke session jika ingin digunakan di blade atau route biasa
        session(['auth_token' => $token]);

        return redirect()->route('dashboard.home');
    }
}
