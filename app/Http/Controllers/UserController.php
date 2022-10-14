<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PostService\PostService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function show(int $userId)
    {
        $user = User::find($userId);
        return response()->view('user.show', ['user' => $user]);
    }
}
