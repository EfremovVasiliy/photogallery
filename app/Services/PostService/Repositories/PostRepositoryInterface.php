<?php

namespace App\Services\PostService\Repositories;

use App\Models\Post;
use App\Services\PostService\Objects\PostDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function find(int $id): Post;
    public function getPosts(): Collection;
    public function create(PostDTO $postDTO): Post;
    public function update(PostDTO $postDTO): Post;
}
