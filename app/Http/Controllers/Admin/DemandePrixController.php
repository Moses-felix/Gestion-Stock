<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDemandePrixRequest;
use App\Http\Requests\StoreDemandePrixRequest;
use App\Http\Requests\UpdateDemandePrixRequest;
use App\Models\ContactCompany;
use App\Models\DemandeAchat;
use App\Models\DemandePrix;
use App\Models\Product;
use App\Models\ligneDemande;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandePrixController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demande_prix_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandePrixes = DemandePrix::with(['demande_achat', 'users', 'company'])->get();

        $demande_achats = DemandeAchat::get();

        $users = User::get();

        $contact_companies = ContactCompany::get();

        return view('admin.demandePrixes.index', compact('demandePrixes', 'demande_achats', 'users', 'contact_companies'));
    }

    public function create()
    {
        abort_if(Gate::denies('demande_prix_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demande_achats = DemandeAchat::pluck('objet', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = ContactCompany::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.demandePrixes.create', compact('demande_achats', 'users', 'companies'));
    }

    public function store(StoreDemandePrixRequest $request)
    {
        $demandePrix = DemandePrix::create($request->all());

        return redirect()->route('admin.demande-prixes.index');
    }

    public function edit(DemandePrix $demandePrix)
    {
        abort_if(Gate::denies('demande_prix_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demande_achats = DemandeAchat::pluck('objet', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = ContactCompany::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demandePrix->load('demande_achat', 'users', 'company');

        return view('admin.demandePrixes.edit', compact('demande_achats', 'users', 'companies', 'demandePrix'));
    }

    public function update(UpdateDemandePrixRequest $request, DemandePrix $demandePrix)
    {
        $demandePrix->update($request->all());

        return redirect()->route('admin.demande-prixes.index');
    }

    public function show(DemandePrix $demandePrix)
    {
        abort_if(Gate::denies('demande_prix_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandePrix->load('demande_achat', 'users', 'company');

        return view('admin.demandePrixes.show', compact('demandePrix'));
    }

    public function destroy(DemandePrix $demandePrix)
    {
        abort_if(Gate::denies('demande_prix_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandePrix->delete();

        return back();
    }

    public function massDestroy(MassDestroyDemandePrixRequest $request)
    {
        DemandePrix::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
