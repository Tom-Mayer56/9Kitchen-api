<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        return $this->_login($request->toArray(), false);
    }

    public function register(Request $request) {
        if (User::firstWhere('email', $request->get('email'))) return response()->json(["message" => 'Unable to register at this time.'], 400);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = new User();
        $user->fill($credentials);
        $user->name = $user->email;
        $user->password = Hash::make($credentials['password']);
        $user->save();

        return $this->_login($credentials, true);
    }

    private function _login($request, $register) {
        if (Auth::attempt($request)) {
            $user = Auth::user();
            $token = $user->createToken('authToken');
            return response()->json(['success' => $token->plainTextToken], 200);
        }

        return response()->json(["message" => $register ? 'Unable to register at this time.' : 'Credentials do not match our records.'], 400);
    }
}
