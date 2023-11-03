<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkFormRequest;
use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class LinkController extends Controller
{
    public function linksPage(): View
    {
        return view('pages/link/links')->with(['links' => Link::all()]);
    }

    public function editLinkPage(Request $request): View
    {
        return view('pages/link/edit-link')->with(['links' => Link::find($request->id)]);
    }

    public function editLink(LinkFormRequest $request): View
    {
        Link::query()->where('key', '=', $request->key)->update(['value' => $request->value]);
        return view('pages/link/links')->with(['links' => Link::all()]);
    }
}
