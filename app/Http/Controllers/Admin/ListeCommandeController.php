<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyListeCommandeRequest;
use App\Http\Requests\StoreListeCommandeRequest;
use App\Http\Requests\UpdateListeCommandeRequest;
use App\Models\Commande;
use App\Models\ListeCommande;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListeCommandeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('liste_commande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listeCommandes = ListeCommande::with(['commande', 'product'])->get();

        $commandes = Commande::get();

        $products = Product::get();

        return view('admin.listeCommandes.index', compact('listeCommandes', 'commandes', 'products'));
    }

    public function create()
    {
        abort_if(Gate::denies('liste_commande_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes = Commande::pluck('prix', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listeCommandes.create', compact('commandes', 'products'));
    }

    public function store(StoreListeCommandeRequest $request)
    {
        $listeCommande = ListeCommande::create($request->all());

        return redirect()->route('admin.liste-commandes.index');
    }

    public function edit(ListeCommande $listeCommande)
    {
        abort_if(Gate::denies('liste_commande_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes = Commande::pluck('prix', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listeCommande->load('commande', 'product');

        return view('admin.listeCommandes.edit', compact('commandes', 'products', 'listeCommande'));
    }

    public function update(UpdateListeCommandeRequest $request, ListeCommande $listeCommande)
    {
        $listeCommande->update($request->all());

        return redirect()->route('admin.liste-commandes.index');
    }

    public function show(ListeCommande $listeCommande)
    {
        abort_if(Gate::denies('liste_commande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listeCommande->load('commande', 'product');

        return view('admin.listeCommandes.show', compact('listeCommande'));
    }

    public function destroy(ListeCommande $listeCommande)
    {
        abort_if(Gate::denies('liste_commande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listeCommande->delete();

        return back();
    }

    public function massDestroy(MassDestroyListeCommandeRequest $request)
    {
        ListeCommande::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
