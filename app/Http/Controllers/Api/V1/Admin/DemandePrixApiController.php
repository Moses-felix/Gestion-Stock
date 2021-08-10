<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemandePrixRequest;
use App\Http\Requests\UpdateDemandePrixRequest;
use App\Http\Resources\Admin\DemandePrixResource;
use App\Models\DemandePrix;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandePrixApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demande_prix_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemandePrixResource(DemandePrix::with(['demande_achat', 'users', 'company'])->get());
    }

    public function store(StoreDemandePrixRequest $request)
    {
        $demandePrix = DemandePrix::create($request->all());

        return (new DemandePrixResource($demandePrix))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DemandePrix $demandePrix)
    {
        abort_if(Gate::denies('demande_prix_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemandePrixResource($demandePrix->load(['demande_achat', 'users', 'company']));
    }

    public function update(UpdateDemandePrixRequest $request, DemandePrix $demandePrix)
    {
        $demandePrix->update($request->all());

        return (new DemandePrixResource($demandePrix))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DemandePrix $demandePrix)
    {
        abort_if(Gate::denies('demande_prix_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandePrix->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
