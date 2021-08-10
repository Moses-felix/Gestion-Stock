<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLivraisonRequest;
use App\Http\Requests\StoreLivraisonRequest;
use App\Http\Requests\UpdateLivraisonRequest;
use App\Models\Commande;
use App\Models\Livraison;
use App\Models\ProductCategory;
use App\Models\Rangement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LivraisonController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('livraison_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $livraisons = Livraison::with(['commande', 'product_category', 'rangement'])->get();

        return view('admin.livraisons.index', compact('livraisons'));
    }

    public function create()
    {
        abort_if(Gate::denies('livraison_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes = Commande::pluck('prix', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rangements = Rangement::pluck('nom_rangement', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.livraisons.create', compact('commandes', 'product_categories', 'rangements'));
    }

    public function store(StoreLivraisonRequest $request)
    {
        $livraison = Livraison::create($request->all());

        return redirect()->route('admin.livraisons.index');
    }

    public function edit(Livraison $livraison)
    {
        abort_if(Gate::denies('livraison_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes = Commande::pluck('prix', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rangements = Rangement::pluck('nom_rangement', 'id')->prepend(trans('global.pleaseSelect'), '');

        $livraison->load('commande', 'product_category', 'rangement');

        return view('admin.livraisons.edit', compact('commandes', 'product_categories', 'rangements', 'livraison'));
    }

    public function update(UpdateLivraisonRequest $request, Livraison $livraison)
    {
        $livraison->update($request->all());

        return redirect()->route('admin.livraisons.index');
    }

    public function show(Livraison $livraison)
    {
        abort_if(Gate::denies('livraison_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $livraison->load('commande', 'product_category', 'rangement');

        return view('admin.livraisons.show', compact('livraison'));
    }

    public function destroy(Livraison $livraison)
    {
        abort_if(Gate::denies('livraison_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $livraison->delete();

        return back();
    }

    public function massDestroy(MassDestroyLivraisonRequest $request)
    {
        Livraison::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
