<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyValidationDemandeRequest;
use App\Http\Requests\StoreValidationDemandeRequest;
use App\Http\Requests\UpdateValidationDemandeRequest;
use App\Models\Demande;
use App\Models\User;
use App\Models\LigneDemande;
use App\Models\ValidationDemande;
use Gate;
use auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationDemandeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('validation_demande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationDemandes = ValidationDemande::with(['demande', 'users'])->get();

        $demandes = demande::get();

        $ligneDemandes = ligneDemande::get();
        
        $users = user::get();

        return view('admin.validationDemandes.index', compact('validationDemandes', 'demandes', 'ligneDemandes'));
    }

    public function create()
    {
        abort_if(Gate::denies('validation_demande_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandes = Demande::pluck('objet_demande', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ligneDemandes = lignedemande::get();

        //$validationDemandes = validationdemande::get();

        $Demandes = demande::get();

        return view('admin.validationDemandes.create', compact('demandes', 'users'));
    }

    public function store(StoreValidationDemandeRequest $request)
    {
        $validationDemande = ValidationDemande::create($request->all());

        $ligneDemandes = lignedemande::get();

        $Demandes = demande::get();

        if(Btn-success){
            
        }

        return redirect()->route('admin.validation-demandes.index');
    }

    public function edit(ValidationDemande $validationDemande)
    {
        abort_if(Gate::denies('validation_demande_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandes = Demande::pluck('objet_demande', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $validationDemande->load('demande', 'users');

        return view('admin.validationDemandes.edit', compact('demandes', 'users', 'validationDemande'));
    }

    public function update(UpdateValidationDemandeRequest $request, ValidationDemande $validationDemande)
    {
        $validationDemande->update($request->all());

        return redirect()->route('admin.validation-demandes.index');
    }

    public function show(ValidationDemande $validationDemande)
    {
        abort_if(Gate::denies('validation_demande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationDemande->load('demande', 'users');

        return view('admin.validationDemandes.show', compact('validationDemande'));
    }

    public function destroy(ValidationDemande $validationDemande)
    {
        abort_if(Gate::denies('validation_demande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationDemande->delete();

        return back();
    }

    public function massDestroy(MassDestroyValidationDemandeRequest $request)
    {
        ValidationDemande::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
