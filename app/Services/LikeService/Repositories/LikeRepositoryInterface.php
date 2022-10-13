<?php

namespace App\Services\LikeService\Repositories;

use Illuminate\Http\Request;

interface LikeRepositoryInterface
{
    public function getLikesCountAtPost(int $postId): int;
    public function addLikeToPost(int $userId, int $postId): int;
    public function removeLikeFromPost(int $userId, int $postId): int;
}
