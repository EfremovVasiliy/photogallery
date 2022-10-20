<?php

namespace App\Services\PostService\Repositories;

use App\Models\Post;
use App\Services\PostService\Objects\PostDTO;
use Illuminate\Database\Eloquent\Collection;

class PostDatabaseRepository implements PostRepositoryInterface
{
    private Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function find(int $id): Post
    {
        return $this->post::withCount('likes')->find($id);
    }

    /**
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return $this->post::with(['user'])->withCount('likes')->get();
    }

    /**
     * @param PostDTO $postDTO
     * @return Post
     */
    public function create(PostDTO $postDTO): Post
    {
        return $this->post::create([
            'user_id' => $postDTO->userId,
            'title' => $postDTO->title,
            'description' => $postDTO->description,
            'file_path' => $postDTO->file_path
        ]);
    }

    /**
     * @param PostDTO $postDTO
     * @return Post
     */
    public function update(PostDTO $postDTO): Post
    {
        $post = $this->post::find($postDTO->id);
        $post->title = $postDTO->title;
        $post->description = $postDTO->description;
        $post->save();

        return $post;
    }
}
