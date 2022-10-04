<?php

namespace App\Services\PostService\Repositories;

use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function find(int $id);
    public function getPosts();
    public function create(Request $request);
    public function update(Request $request, int $id);
    public function delete(int $id);
}
