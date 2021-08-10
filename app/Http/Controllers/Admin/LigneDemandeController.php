<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\DemandeAchat;
use App\Models\LigneDemande;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LigneDemandeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ligne_demande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ligneDemandes = LigneDemande::with(['product', 'demande', 'demande_achat'])->get();

        $products = Product::get();

        $demandes = Demande::get();

        $demande_achats = DemandeAchat::get();

        return view('admin.ligneDemandes.index', compact('ligneDemandes', 'products', 'demandes', 'demande_achats'));
    }

    public function show(LigneDemande $ligneDemande)
    {
        abort_if(Gate::denies('ligne_demande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ligneDemande->load('product', 'demande', 'demande_achat');

        return view('admin.ligneDemandes.show', compact('ligneDemande'));
    }
}
