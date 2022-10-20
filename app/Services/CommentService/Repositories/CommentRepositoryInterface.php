<?php

namespace App\Services\CommentService\Repositories;

use App\Models\Comment;
use App\Services\CommentService\Objects\CommentDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function getCommentsByPostId(int $postId): Collection;
    public function create(CommentDTO $commentDTO): Comment;
    public function update(CommentDTO $commentDTO): Comment;
    public function delete($id): int;
}
