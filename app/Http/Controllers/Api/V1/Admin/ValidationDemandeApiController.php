<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreValidationDemandeRequest;
use App\Http\Requests\UpdateValidationDemandeRequest;
use App\Http\Resources\Admin\ValidationDemandeResource;
use App\Models\ValidationDemande;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationDemandeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('validation_demande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ValidationDemandeResource(ValidationDemande::with(['demande', 'users'])->get());
    }

    public function store(StoreValidationDemandeRequest $request)
    {
        $validationDemande = ValidationDemande::create($request->all());

        return (new ValidationDemandeResource($validationDemande))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ValidationDemande $validationDemande)
    {
        abort_if(Gate::denies('validation_demande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ValidationDemandeResource($validationDemande->load(['demande', 'users']));
    }

    public function update(UpdateValidationDemandeRequest $request, ValidationDemande $validationDemande)
    {
        $validationDemande->update($request->all());

        return (new ValidationDemandeResource($validationDemande))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ValidationDemande $validationDemande)
    {
        abort_if(Gate::denies('validation_demande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationDemande->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
