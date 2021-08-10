<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\LigneDemandeResource;
use App\Models\LigneDemande;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LigneDemandeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ligne_demande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LigneDemandeResource(LigneDemande::with(['product', 'demande', 'demande_achat'])->get());
    }

    public function show(LigneDemande $ligneDemande)
    {
        abort_if(Gate::denies('ligne_demande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LigneDemandeResource($ligneDemande->load(['product', 'demande', 'demande_achat']));
    }
}
