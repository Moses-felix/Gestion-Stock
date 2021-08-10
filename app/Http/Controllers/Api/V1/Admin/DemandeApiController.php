<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use App\Http\Resources\Admin\DemandeResource;
use App\Models\Demande;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemandeResource(Demande::with(['users'])->get());
    }

    public function store(StoreDemandeRequest $request)
    {
        $demande = Demande::create($request->all());

        return (new DemandeResource($demande))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Demande $demande)
    {
        abort_if(Gate::denies('demande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemandeResource($demande->load(['users']));
    }

    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        $demande->update($request->all());

        return (new DemandeResource($demande))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Demande $demande)
    {
        abort_if(Gate::denies('demande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demande->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
