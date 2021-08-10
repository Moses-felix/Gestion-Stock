<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyValidationAchatRequest;
use App\Http\Requests\StoreValidationAchatRequest;
use App\Http\Requests\UpdateValidationAchatRequest;
use App\Models\DemandeAchat;
use App\Models\User;
use App\Models\ValidationAchat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationAchatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('validation_achat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationAchats = ValidationAchat::with(['users', 'demande_achat'])->get();

        return view('admin.validationAchats.index', compact('validationAchats'));
    }

    public function create()
    {
        abort_if(Gate::denies('validation_achat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demande_achats = DemandeAchat::pluck('objet', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.validationAchats.create', compact('users', 'demande_achats'));
    }

    public function store(StoreValidationAchatRequest $request)
    {
        $validationAchat = ValidationAchat::create($request->all());

        return redirect()->route('admin.validation-achats.index');
    }

    public function edit(ValidationAchat $validationAchat)
    {
        abort_if(Gate::denies('validation_achat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demande_achats = DemandeAchat::pluck('objet', 'id')->prepend(trans('global.pleaseSelect'), '');

        $validationAchat->load('users', 'demande_achat');

        return view('admin.validationAchats.edit', compact('users', 'demande_achats', 'validationAchat'));
    }

    public function update(UpdateValidationAchatRequest $request, ValidationAchat $validationAchat)
    {
        $validationAchat->update($request->all());

        return redirect()->route('admin.validation-achats.index');
    }

    public function show(ValidationAchat $validationAchat)
    {
        abort_if(Gate::denies('validation_achat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationAchat->load('users', 'demande_achat');

        return view('admin.validationAchats.show', compact('validationAchat'));
    }

    public function destroy(ValidationAchat $validationAchat)
    {
        abort_if(Gate::denies('validation_achat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationAchat->delete();

        return back();
    }

    public function massDestroy(MassDestroyValidationAchatRequest $request)
    {
        ValidationAchat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
