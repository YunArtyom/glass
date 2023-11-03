<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoFormRequest;
use App\Models\Promo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class PromoController extends Controller
{
    public function promosPage(): View
    {
        return view('pages/promo/promos')->with(['promos' => Promo::all()]);
    }

    public function editPromoPage(Request $request): View
    {
        return view('pages/promo/edit-promo')->with(['contact' => Promo::find($request->id)]);
    }

    public function editPromo(PromoFormRequest $request): View
    {
        Promo::query()->where('key', '=', $request->id)->update(['value' => $request->value]);
        return view('pages/promo/promos')->with(['contacts' => Promo::all()]);
    }
}
