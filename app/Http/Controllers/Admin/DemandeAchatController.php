<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDemandeAchatRequest;
use App\Http\Requests\StoreDemandeAchatRequest;
use App\Http\Requests\UpdateDemandeAchatRequest;
use App\Models\DemandeAchat;
use App\Models\User;
use App\Models\Product;
use App\Models\ligneDemande;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandeAchatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demande_achat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandeAchats = DemandeAchat::with(['users'])->get();

        $users = User::get();

        $ligneDemandes = ligneDemande::get();

        return view('admin.demandeAchats.index', compact('demandeAchats', 'users', 'ligneDemandes'));
    }

    public function create()
    {
        abort_if(Gate::denies('demande_achat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::all();

        return view('admin.demandeAchats.create', compact('users', 'products'));
    }

    public function store(StoreDemandeAchatRequest $request)
    {
        $demandeAchat = DemandeAchat::create($request->all());

        for($i = 0 ; $i < count($request->product) ; $i++){
            $ligne_demmande = new LigneDemande();
            $ligne_demmande->product_id = $request->product[$i];
            $ligne_demmande->quantite = $request->quantite[$i];
            $ligne_demmande->demande_achat_id = $demande_achat ->id;
            $ligne_demmande->save();

        }

        return redirect()->route('admin.demande-achats.index');
    }

    public function edit(DemandeAchat $demandeAchat)
    {
        abort_if(Gate::denies('demande_achat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demandeAchat->load('users', 'lignedemandes');

        $products = Product::all();

        return view('admin.demandeAchats.edit', compact('users', 'demandeAchat', 'products'));
    }

    public function update(UpdateDemandeAchatRequest $request, DemandeAchat $demandeAchat)
    {
        $demandeAchat->update($request->all());

        ligneDemande::where('demande_achat_id',$demande->id)->delete();

        for($i = 0 ; $i < count($request->product) ; $i++){
            $ligne_demmande = new LigneDemande();
            $ligne_demmande->product_id = $request->product[$i];
            $ligne_demmande->quantite = $request->quantite[$i];
            $ligne_demmande->demande_achat_id = $demande_achat ->id;
            $ligne_demmande->save();

        }

        return redirect()->route('admin.demande-achats.index');
    }

    public function show(DemandeAchat $demandeAchat)
    {
        abort_if(Gate::denies('demande_achat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandeAchat->load('users', 'lignedemandes');

        return view('admin.demandeAchats.show', compact('demandeAchat'));
    }

    public function destroy(DemandeAchat $demandeAchat)
    {
        abort_if(Gate::denies('demande_achat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demandeAchat->delete();

        return back();
    }

    public function massDestroy(MassDestroyDemandeAchatRequest $request)
    {
        DemandeAchat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
