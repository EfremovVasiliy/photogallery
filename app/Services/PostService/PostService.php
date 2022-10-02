<?php

namespace App\Services\PostService;

use App\Services\PostService\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostService
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPostList(): string
    {
        return $this->postRepository->getPosts();
    }

    public function findPostById(int $id)
    {
        return $this->postRepository->find($id);
    }
}
