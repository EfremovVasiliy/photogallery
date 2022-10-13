<?php

namespace App\Http\Controllers;

use App\Services\LikeService\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    private LikeService $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function like(Request $request)
    {
        return response()->json($this->likeService->addLikeToPost($request));
    }

    public function dislike(Request $request)
    {
        return response()->json($this->likeService->removeLikeFromPost($request));
    }
}
