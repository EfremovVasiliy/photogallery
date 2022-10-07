<?php

namespace App\Services\CommentService\Repositories;

use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function getCommentsByPostId(int $id);
    public function create(Request $request);
    public function update(Request $request, int $id);
    public function delete($id);
}
