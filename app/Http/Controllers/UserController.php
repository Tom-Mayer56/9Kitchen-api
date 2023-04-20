<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function get(Request $request) {
        if ($request->get('id')) return response()->json(User::find($request->get('id')), 200);
        return response()->json(User::all(), 200);
    }

    public function post(Request $request) {
        if (User::firstWhere('email', $request->get('email'))) return response()->json('Unable to create User.', 400);
        $user = new User();
        $user->fill($request->toArray());
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return response()->json($user, 201);
    }

    public function put(Request $request) {
        if ($request->get('id')) return response()->json('Please provide an Id.', 400);
        $user = User::find($request->get('id'));
        if (!$user) return response()->json('User not found.', 400);
        $user->fill($request->toArray());
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return response()->json(null, 204);
    }
}
