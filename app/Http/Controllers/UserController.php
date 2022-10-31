<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(int $userId)
    {
        $user = User::find($userId);
        return response()->view('user.show', ['user' => $user]);
    }
}
