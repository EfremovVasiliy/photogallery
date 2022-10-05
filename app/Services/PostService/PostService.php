<?php

namespace App\Services\PostService;

use App\Services\PostService\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;
use League\Flysystem\Filesystem;

class PostService
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPostList()
    {
        return $this->postRepository->getPosts();
    }

    public function findPostById(int $id)
    {
        return $this->postRepository->find($id);
    }

    public function createPost(Request $request): void
    {
        $fileName = $request->file('file')->store('uploads', 'public');
        $this->postRepository->create($request, $fileName);
    }

    public function updatePost(Request $request, int $id): void
    {
        $this->postRepository->update($request, $id);
    }

    public function deletePost(int $id): string
    {
        return $this->postRepository->delete($id);
    }
}
