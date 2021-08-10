<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRangementRequest;
use App\Http\Requests\UpdateRangementRequest;
use App\Http\Resources\Admin\RangementResource;
use App\Models\Rangement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RangementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rangement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RangementResource(Rangement::all());
    }

    public function store(StoreRangementRequest $request)
    {
        $rangement = Rangement::create($request->all());

        return (new RangementResource($rangement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Rangement $rangement)
    {
        abort_if(Gate::denies('rangement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RangementResource($rangement);
    }

    public function update(UpdateRangementRequest $request, Rangement $rangement)
    {
        $rangement->update($request->all());

        return (new RangementResource($rangement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Rangement $rangement)
    {
        abort_if(Gate::denies('rangement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rangement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
