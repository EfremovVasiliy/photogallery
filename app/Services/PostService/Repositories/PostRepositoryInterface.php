<?php

namespace App\Services\PostService\Repositories;

interface PostRepositoryInterface
{
    public function find(int $id);
    public function getPosts();
}
