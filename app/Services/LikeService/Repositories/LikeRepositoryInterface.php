<?php

namespace App\Services\LikeService\Repositories;

use Illuminate\Http\Request;

interface LikeRepositoryInterface
{
    public function addLikeToPost(int $userId, int $postId): int;
    public function removeLikeFromPost(int $userId, int $postId): int;
}
