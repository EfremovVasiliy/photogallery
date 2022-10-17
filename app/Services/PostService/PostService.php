<?php

namespace App\Services\PostService;

use App\Exceptions\IllegalActException;
use App\Models\Post;
use App\Services\PostService\Objects\UsersPostsDTO;
use App\Services\PostService\Repositories\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostService
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return Collection
     */
    public function getPostList(): Collection
    {
        return $this->postRepository->getPosts();
    }

    /**
     * @param int $id
     * @return Post
     */
    public function findPostById(int $id): Post
    {
        return $this->postRepository->find($id);
    }

    /**
     * @param Request $request
     * @return Post
     */
    public function createPost(Request $request): Post
    {
        $fileName = $request->file->store('uploads', 'public');
        return $this->postRepository->create($request, $fileName);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function updatePost(Request $request, int $id): void
    {
        $post = $this->findPostById($id);
        $this->postRepository->update($request, $id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return string
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
