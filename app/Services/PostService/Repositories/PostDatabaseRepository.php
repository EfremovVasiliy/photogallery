<?php

namespace App\Services\PostService\Repositories;

use App\Models\Post;
use App\Services\PostService\Repositories\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
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
}
