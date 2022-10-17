<?php

namespace App\Services\PostService\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function find(int $id): Post;
    public function getPosts(): Collection;
    public function getPostsByUserId(int $userId): Collection|Post;
    public function create(Request $request, string $filename): Post;
    public function update(Request $request, int $id): void;
}
