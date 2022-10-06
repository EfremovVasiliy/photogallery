<?php

namespace App\Http\Controllers;

use App\Exceptions\IllegalActException;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $postList = $this->postService->getPostList();
        return response()->view('post.index', ['postList' => $postList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePostRequest $request): RedirectResponse
    {
        $this->postService->createPost($request);
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $post = $this->postService->findPostById($id);
        return response()->view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        $post = $this->postService->findPostById($id);
//        dd($post);
        return response()->view('post.update', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdatePostRequest $request, int $id)
    {
        $this->postService->updatePost($request, $id);
        return redirect("/post/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     * @throws IllegalActException
     */
    public function destroy(Request $request, int $id)
    {
        $filename = $this->postService->deletePost($request, $id);
        unlink(public_path('/storage/'. $filename));
        Storage::delete($filename);
        return redirect('/post');
    }
}
