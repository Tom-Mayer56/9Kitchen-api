<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function get(Request $request, $entity, $fromUser = false) {
        $relations = explode(',', $request->get('relations'));
        if ($request->get('id')) return response()->json($entity::with($relations)->findOrFail($request->get('id')), 200);
        return response()->json($entity::with($relations)->when($fromUser, function($q) {
            $q->where('user_id', Auth::user()->id);
        })->get(), 200);
    }

    public function post(Request $request, $entity) {
        $user = new $entity();
        $user->user_id = Auth::user()->id;
        $user->fill($request->toArray());
        $user->save();
        return response()->json($user, 201);
    }

    public function put(Request $request, $entity) {
        if ($request->get('id')) return response()->json('Please provide an Id.', 400);
        $user = $entity::find($request->get('id'));
        if (!$user) return response()->json(get_class($entity) . ' not found.', 400);
        $user->user_id = Auth::user()->id;
        $user->fill($request->toArray());
        $user->save();
        return response()->json(null, 204);
    }

}
