<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(): View
    {
        return view('pages/post/index')->with(['posts' => Post::all()->sortDesc()]);
    }

    public function addPostPage(): View
    {
        return view('pages/post/add-post');
    }

    public function addPost(PostFormRequest $request): RedirectResponse
    {
        Post::create($request->validated());
        return redirect()->route('postsIndexPage')->with(['posts' => Post::all()->sortDesc()]);
    }

    public function editPostPage(Request $request): View
    {
        $post = Post::find($request->id);
        return view('pages/post/edit-post')
            ->with(['post' => $post]);
    }

    public function editPost(PostFormRequest $request): RedirectResponse
    {
        Post::query()->where('id', '=', $request->id)->update($request->validated());
        return redirect()->route('postsIndexPage')->with(['posts' => Post::all()->sortDesc()]);
    }

    public function deletePost(Request $request): RedirectResponse
    {
        Post::find($request->id)->delete();
        return redirect()->route('postsIndexPage')->with(['posts' => Post::all()->sortDesc()]);
    }

    public function infoPage(Request $request): View
    {
        return view('pages/post/info-post')->with(['post' => Post::find($request->id)]);
    }
}
