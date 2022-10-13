<?php

namespace App\Services\LikeService\Repositories;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeDatabaseRepository implements LikeRepositoryInterface
{
    private Like $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    public function getLikesCountAtPost(int $postId): int
    {
        // TODO: Implement getLikesCountAtPost() method.
    }

    public function addLikeToPost(int $userId, int $postId): int
    {
        // TODO: Implement addLikeToPost() method.
    }

    public function removeLikeFromPost(int $userId, int $postId): int
    {
        // TODO: Implement removeLikeFromPost() method.
    }
}
