<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'is_agent' => ['required'],
        ]);

        $userData['password'] = bcrypt($userData['password']);
        $userData['is_agent'] = (int)$userData['is_agent'];

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
