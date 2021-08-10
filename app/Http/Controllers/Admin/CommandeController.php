<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCommandeRequest;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Models\Commande;
use App\Models\ContactCompany;
use App\Models\DemandeAchat;
use App\Models\Product;
use App\Models\Tva;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes = Commande::with(['company', 'demande_achat', 'tva'])->get();

        $contact_companies = ContactCompany::get();

        $demande_achats = DemandeAchat::get();

        $tvas = Tva::get();

        return view('admin.commandes.index', compact('commandes', 'contact_companies', 'demande_achats', 'tvas'));
    }

    public function create()
    {
        abort_if(Gate::denies('commande_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = ContactCompany::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demande_achats = DemandeAchat::pluck('objet', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tvas = Tva::pluck('tva', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.commandes.create', compact('companies', 'demande_achats', 'tvas'));
    }

    public function store(StoreCommandeRequest $request)
    {
        $commande = Commande::create($request->all());

        return redirect()->route('admin.commandes.index');
    }

    public function edit(Commande $commande)
    {
        abort_if(Gate::denies('commande_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = ContactCompany::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demande_achats = DemandeAchat::pluck('objet', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tvas = Tva::pluck('tva', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commande->load('company', 'demande_achat', 'tva');

        return view('admin.commandes.edit', compact('companies', 'demande_achats', 'tvas', 'commande'));
    }

    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $commande->update($request->all());

        return redirect()->route('admin.commandes.index');
    }

    public function show(Commande $commande)
    {
        abort_if(Gate::denies('commande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commande->load('company', 'demande_achat', 'tva');

        return view('admin.commandes.show', compact('commande'));
    }

    public function destroy(Commande $commande)
    {
        abort_if(Gate::denies('commande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commande->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommandeRequest $request)
    {
        Commande::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
