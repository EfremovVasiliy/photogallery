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

    public function create(Request $request, string $fileName)
    {
        $this->post::create([
            'user_id' => $request->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'file_path' => $fileName
        ]);
    }

    public function update(Request $request, int $id)
    {
        $post = $this->post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
    }

    public function delete(int $id): string
    {
        $post = $this->post::find($id);
        $filename = $post->file_path;
        $post->delete();
        return $filename;
    }
}
