<?php

namespace App\Services\PostService\Repositories;

use App\Models\Post;
use App\Services\PostService\Repositories\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param Request $request
     * @param string $filename
     * @return void
     */
    public function create(Request $request, string $filename): Post
    {
        return $this->post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filename
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id): void
    {
        $post = $this->post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
    }

    public function getPostsByUserId(int $userId): Collection|Post
    {
        return $this->post::whereUserId($userId)->get();
    }
}
