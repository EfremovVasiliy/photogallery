<?php

namespace App\Services\CommentService\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function getCommentsByPostId(int $postId): Collection;
    public function create(Request $request): Comment;
    public function update(Request $request, int $id): Comment;
    public function delete($id): int;
}
