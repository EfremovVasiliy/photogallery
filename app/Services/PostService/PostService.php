<?php

namespace App\Services\PostService;

use App\Exceptions\IllegalActException;
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

    /**
     *
     */
    public function updatePost(Request $request, int $id): void
    {
        $post = $this->findPostById($id);
        $this->postRepository->update($request, $id);
    }

    /**
     * @throws IllegalActException
     */
    public function deletePost(Request $request, int $id): string
    {
        $post = $this->findPostById($id);
        if ($request->user()->id === $post->user_id) {
            $filename = $post->file_path;
            $post->delete();
            return $filename;
        }
        throw new IllegalActException('Attempt to delete another\'s data');
    }
}
