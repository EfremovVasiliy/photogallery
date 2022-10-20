<?php

namespace App\Services\PostService;

use App\Exceptions\IllegalActException;
use App\Models\Post;
use App\Services\PostService\Objects\PostDTO;
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
        $postDTO = new PostDTO(
            title: $request->title,
            userId: $request->user()->id,
            description: $request->description,
            file_path: $fileName
        );
        return $this->postRepository->create($postDTO);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Post
     */
    public function updatePost(Request $request, int $id): Post
    {
        $postDTO = new PostDTO(
            id: $id,
            title: $request->title,
            userId: $request->user()->id,
            description: $request->description,
        );
        return $this->postRepository->update($postDTO);
    }

    /**
     * @param Request $request
     * @param int $postId
     * @return string
     * @throws IllegalActException
     */
    public function deletePost(Request $request, int $postId): string
    {
        $post = $this->findPostById($postId);
        if ($request->user()->id === $post->user_id) {
            $filename = $post->file_path;
            $post->delete();
            return $filename;
        }
        throw new IllegalActException('Attempt to delete another\'s data');
    }
}
