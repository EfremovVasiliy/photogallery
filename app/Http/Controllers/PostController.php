<?php

namespace App\Http\Controllers;

use App\Exceptions\IllegalActException;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Services\CommentService\CommentService;
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
    private CommentService $commentService;

    public function __construct(PostService $postService, CommentService $commentService)
    {
        $this->postService = $postService;
        $this->commentService = $commentService;
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
        return redirect(route('post.index'));
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
        $comments = $this->commentService->getCommentsByPostId($id);
        return response()->view('post.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response|RedirectResponse
     */
    public function edit(int $id): Response | RedirectResponse
    {
        $post = $this->postService->findPostById($id);
        if (request()->user()->id === $post->user_id) {
            return response()->view('post.update', ['post' => $post]);
        }
        return redirect(route('post.index'));
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
        return redirect(route('post.show', $id));
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
        return redirect(route('post.index'));
    }
}
