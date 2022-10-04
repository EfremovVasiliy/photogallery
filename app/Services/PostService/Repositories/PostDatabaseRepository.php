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

    public function find(int $id)
    {
        return $this->post::find($id);
    }

    public function getPosts(): Collection
    {
        return $this->post::all();
    }

    public function create(Request $request)
    {
        $this->post::create([
            'user_id' => $request->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $post = $this->post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
    }

    public function delete(int $id)
    {
        $post = $this->post::find($id);
        $post->delete();
    }
}
