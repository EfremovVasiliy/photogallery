<?php

namespace App\Services\CommentService\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function getCommentsByPostId(int $id): Collection;
    public function create(Request $request): int;
    public function update(Request $request, int $id): int;
    public function delete($id): int;
}
