<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPromoFormRequest;
use App\Http\Requests\EditPromoFormRequest;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class PromoController extends Controller
{
    public function promosPage(): View
    {
        return view('pages/promo/index')->with(['promos' => Promo::all()->sortDesc()]);
    }

    public function addPromoPage(): View
    {
        return view('pages/promo/add-promo');
    }

    public function addPromo(AddPromoFormRequest $request): RedirectResponse
    {
        $promo = new Promo();
        $img = $request->validated()['img'];
        $filename = rand(1, 900) . time() .'.'. $img->getClientOriginalExtension();
        $img->move(public_path('storage/media/'), $filename);

        $promo->name = $request->validated()['name'];
        $promo->content = $request->validated()['content'];
        $promo->end_date = $request->validated()['end_date'];
        $promo->img = $filename;
        $promo->save();
        return redirect()->route('promosPage')->with(['promos' => Promo::all()->sortDesc()]);
    }

    public function editPromoPage(Request $request): View
    {
        return view('pages/promo/edit-promo')->with(['promo' => Promo::find($request->id)]);
    }

    public function editPromo(EditPromoFormRequest $request): RedirectResponse
    {
        $promo = Promo::query()->find($request->validated()['id']);
        if (isset($request->validated()['img'])) {
            $img = $request->validated()['img'];
            $imageName = rand(1, 900) . time() .'.'. $img->getClientOriginalExtension();
            $img->move(public_path('storage/media/'), $imageName);
        } else {
            $imageName = $request->validated()['oldImg'];
        }

        $promo->name = $request->validated()['name'];
        $promo->content = $request->validated()['content'];
        $promo->end_date = $request->validated()['end_date'];
        $promo->img = $imageName;
        $promo->save();

        return redirect()->route('promosPage')->with(['promos' => Promo::all()->sortDesc()]);
    }

    public function deletePromo(Request $request): RedirectResponse
    {
        Promo::find($request->id)->delete();
        return redirect()->route('promosPage')->with(['promos' => Promo::all()->sortDesc()]);
    }

    public function infoPromoPage(Request $request): View
    {
        return view('pages/promo/info-promo')->with(['promo' => Promo::find($request->id)]);
    }
}
