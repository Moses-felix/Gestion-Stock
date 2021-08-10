<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTvaRequest;
use App\Http\Requests\UpdateTvaRequest;
use App\Http\Resources\Admin\TvaResource;
use App\Models\Tva;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TvaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tva_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TvaResource(Tva::all());
    }

    public function store(StoreTvaRequest $request)
    {
        $tva = Tva::create($request->all());

        return (new TvaResource($tva))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tva $tva)
    {
        abort_if(Gate::denies('tva_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TvaResource($tva);
    }

    public function update(UpdateTvaRequest $request, Tva $tva)
    {
        $tva->update($request->all());

        return (new TvaResource($tva))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tva $tva)
    {
        abort_if(Gate::denies('tva_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tva->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
