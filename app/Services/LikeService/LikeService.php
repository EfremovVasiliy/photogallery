<?php

namespace App\Services\LikeService;

use App\Services\LikeService\Repositories\LikeRepositoryInterface;
use Illuminate\Http\Request;

class LikeService
{
    private LikeRepositoryInterface $likeRepository;

    public function __construct(LikeRepositoryInterface $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function addLikeToPost(Request $request): int
    {
        $user = $request->user()->id;
        $postId = $request->json('postId');

        return $this->likeRepository->addLikeToPost($user, $postId);
    }

    public function removeLikeFromPost(Request $request): int
    {
        $user = $request->user()->id;
        $postId = $request->json('postId');

        return $this->likeRepository->removeLikeFromPost($user, $postId);
    }
}
