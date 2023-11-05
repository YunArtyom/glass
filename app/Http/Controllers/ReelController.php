<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReelFormRequest;
use App\Models\Reel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class ReelController extends Controller
{
    public function index(): View
    {
        return view('pages/reel/index')->with(['reels' => Reel::all()->sortDesc()]);
    }

    public function addReelPage(): View
    {
        return view('pages/reel/add-reel');
    }

    public function addReel(ReelFormRequest $request): RedirectResponse
    {
        Reel::create($request->validated());
        return redirect()->route('reelsIndexPage')->with(['reels' => Reel::all()->sortDesc()]);
    }

    public function editReelPage(Request $request): View
    {
        $post = Reel::find($request->id);
        return view('pages/reel/edit-reel')
            ->with(['reel' => $post]);
    }

    public function editReel(ReelFormRequest $request): RedirectResponse
    {
        Reel::query()->where('id', '=', $request->id)->update($request->validated());
        return redirect()->route('reelsIndexPage')->with(['reels' => Reel::all()->sortDesc()]);
    }

    public function deleteReel(Request $request): RedirectResponse
    {
        Reel::find($request->id)->delete();
        return redirect()->route('reelsIndexPage')->with(['reels' => Reel::all()->sortDesc()]);
    }

    public function infoPage(Request $request): View
    {
        return view('pages/reel/info-reel')->with(['reel' => Reel::find($request->id)]);
    }
}
