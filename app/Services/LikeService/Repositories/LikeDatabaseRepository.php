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

    private function checkLike(int $userId, int $postId): bool
    {
        if ($this->like::where('post_id', $postId)->where('user_id', $userId)->first()) {
            return false;
        }

        return true;
    }

    public function addLikeToPost(int $userId, int $postId): int
    {
        if ($this->checkLike($userId, $postId)) {
            $like = $this->like::create([
                'post_id' => $postId,
                'user_id' => $userId
            ]);
        }

        $count = $this->like::where('post_id', $postId)->count();

        return $count;
    }

    public function removeLikeFromPost(int $userId, int $postId): int
    {
        if (!$this->checkLike($userId, $postId)) {
            $like = $this->like::where('user_id', $userId)->where('post_id', $postId)->first();
            $like->delete();
        }

        $count = $this->like::where('post_id', $postId)->count();

        return $count;
    }
}
