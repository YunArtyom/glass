<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostFormRequest;
use App\Http\Requests\EditPostFormRequest;
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

    public function addPost(AddPostFormRequest $request): RedirectResponse
    {
        $post = new Post;
        $images = [];
        foreach (collect($request->validated()['images'])->unique() as $key => $image) {
            $filename = $key . rand(1, 900) . time() .'.'. $image->getClientOriginalExtension();
            $image->move(public_path('storage/media/'), $filename);

            $images[] = $filename;
        }
        $post->name = $request->validated()['name'];
        $post->content = $request->validated()['content'];
        $post->seo_name = $request->validated()['seo_name'];
        $post->seo_content = $request->validated()['seo_content'];
        $post->images = json_encode($images);
        $post->save();
        return redirect()->route('postsIndexPage')->with(['posts' => Post::all()->sortDesc()]);
    }

    public function editPostPage(Request $request): View
    {
        $post = Post::find($request->id);
        return view('pages/post/edit-post')
            ->with(['post' => $post]);
    }

    public function editPost(EditPostFormRequest $request): RedirectResponse
    {
        $images = [];
        $post = Post::query()->find($request->validated()['id']);
        if (isset($request->validated()['images']) and isset($request->validated()['oldImages'])) {
            foreach (collect($request->validated()['images'])->unique() as $key => $image) {
                $filename = $key . rand(1, 900) . time() .'.'. $image->getClientOriginalExtension();
                $image->move(public_path('storage/media/'), $filename);
                $images[] = $filename;
            }
            $images = array_merge($images, json_decode($request->validated()['oldImages'], true));
        } elseif (isset($request->validated()['images'])) {
            foreach (collect($request->validated()['images'])->unique() as $key => $image) {
                $filename = $key . rand(1, 900) . time() .'.'. $image->getClientOriginalExtension();
                $image->move(public_path('storage/media/'), $filename);
                $images[] = $filename;
            }
        } else {
            $images = json_decode($request->validated()['oldImages'], true);
        }

        $post->name = $request->validated()['name'];
        $post->content = $request->validated()['content'];
        $post->seo_name = $request->validated()['seo_name'];
        $post->seo_content = $request->validated()['seo_content'];
        $post->images = json_encode($images);
        $post->save();

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

    public function deleteImage(Request $request): RedirectResponse
    {
        $newImages = [];
        $post = Post::query()->find($request->post_id);
        $images = collect(json_decode($post->images));

        if (count($images) === 1) {
            return redirect()->back()->withErrors(['Вы не можете удалить единственную фотографию. Сначала добавьте новую!']);
        }

        $deletingImage = $images->search($request->image_name);
        unset($images[$deletingImage]);
        foreach ($images as $image) {
            $newImages[] = $image;
        }
        $post->images = json_encode($newImages);
        $post->save();
        return redirect()->back();
    }
}
