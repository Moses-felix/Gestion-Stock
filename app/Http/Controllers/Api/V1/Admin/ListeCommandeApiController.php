<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListeCommandeRequest;
use App\Http\Requests\UpdateListeCommandeRequest;
use App\Http\Resources\Admin\ListeCommandeResource;
use App\Models\ListeCommande;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListeCommandeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('liste_commande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListeCommandeResource(ListeCommande::with(['commande', 'product'])->get());
    }

    public function store(StoreListeCommandeRequest $request)
    {
        $listeCommande = ListeCommande::create($request->all());

        return (new ListeCommandeResource($listeCommande))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ListeCommande $listeCommande)
    {
        abort_if(Gate::denies('liste_commande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListeCommandeResource($listeCommande->load(['commande', 'product']));
    }

    public function update(UpdateListeCommandeRequest $request, ListeCommande $listeCommande)
    {
        $listeCommande->update($request->all());

        return (new ListeCommandeResource($listeCommande))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ListeCommande $listeCommande)
    {
        abort_if(Gate::denies('liste_commande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listeCommande->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
