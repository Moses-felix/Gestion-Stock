<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDemandeRequest;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use App\Models\Demande;
use App\Models\Product;
use App\Models\User;
use App\Models\ligneDemande;
use Gate;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandes = Demande::with(['users'])->get();

        $users = User::get();

        $ligneDemandes = ligneDemande::get();

        return view('admin.demandes.index', compact('demandes', 'users', 'ligneDemandes'));
    }

    public function create()
    {
        abort_if(Gate::denies('demande_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::all();

        return view('admin.demandes.create', compact('users', 'products'));
    }

    public function store(StoreDemandeRequest $request)
    {
        $demande = Demande::create(array_merge($request->all(),['users_id' => Auth::user()->id]));

        for($i = 0 ; $i < count($request->product) ; $i++){
            // $res = "pdt : ".$request->product[$i]
            $ligne_commande = new LigneDemande();
            $ligne_commande->product_id = $request->product[$i];
            $ligne_commande->quantite = $request->quantite[$i];
            $ligne_commande->demande_id = $demande ->id;
            $ligne_commande->save();

        }
        
        // Session::put('success', "La demande est faite avec succés...");

        return redirect()->route('admin.demandes.index');
    }

    public function edit(Demande $demande)
    {
        abort_if(Gate::denies('demande_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demande->load('users', 'lignedemandes');

        $products = Product::all();

        return view('admin.demandes.edit', compact('users', 'demande', 'products'));
    }

    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        $demande->update($request->all());

        ligneDemande::where('demande_id',$demande->id)->delete();

        // $lignedemandes->update($request->all());

        for($i = 0 ; $i < count($request->product) ; $i++){
            $ligne_demmande = new LigneDemande();
            $ligne_demmande->product_id = $request->product[$i];
            $ligne_demmande->quantite = $request->quantite[$i];
            $ligne_demmande->demande_id = $demande ->id;
            $ligne_demmande->save();
        }

        Session::put('success', "La modification a été faite avec succés...");

        return redirect()->route('admin.demandes.index');
    }

    public function show(Demande $demande)
    {
        abort_if(Gate::denies('demande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demande->load('users','lignedemandes');

        return view('admin.demandes.show', compact('demande'));
    }

    public function destroy(Demande $demande)
    {
        abort_if(Gate::denies('demande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demande->delete();

        //$ligneDemande::where('demande_id',$demande->id)->delete();
        Session::put('success', "Vous venez de supprimer une demande...");

        return back();
    }

    public function massDestroy(MassDestroyDemandeRequest $request)
    {
        Demande::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
