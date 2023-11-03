<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function deleteComment(Request $request): RedirectResponse
    {
        Comment::find($request->id)->delete();
        return redirect()->back();
    }
}
