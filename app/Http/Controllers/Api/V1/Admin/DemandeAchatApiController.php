<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemandeAchatRequest;
use App\Http\Requests\UpdateDemandeAchatRequest;
use App\Http\Resources\Admin\DemandeAchatResource;
use App\Models\DemandeAchat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandeAchatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demande_achat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemandeAchatResource(DemandeAchat::with(['users'])->get());
    }

    public function store(StoreDemandeAchatRequest $request)
    {
        $demandeAchat = DemandeAchat::create($request->all());

        return (new DemandeAchatResource($demandeAchat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DemandeAchat $demandeAchat)
    {
        abort_if(Gate::denies('demande_achat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemandeAchatResource($demandeAchat->load(['users']));
    }

    public function update(UpdateDemandeAchatRequest $request, DemandeAchat $demandeAchat)
    {
        $demandeAchat->update($request->all());

        return (new DemandeAchatResource($demandeAchat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DemandeAchat $demandeAchat)
    {
        abort_if(Gate::denies('demande_achat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandeAchat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
