<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRangementRequest;
use App\Http\Requests\StoreRangementRequest;
use App\Http\Requests\UpdateRangementRequest;
use App\Models\Rangement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RangementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rangement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rangements = Rangement::all();

        return view('admin.rangements.index', compact('rangements'));
    }

    public function create()
    {
        abort_if(Gate::denies('rangement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rangements.create');
    }

    public function store(StoreRangementRequest $request)
    {
        $rangement = Rangement::create($request->all());

        return redirect()->route('admin.rangements.index');
    }

    public function edit(Rangement $rangement)
    {
        abort_if(Gate::denies('rangement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rangements.edit', compact('rangement'));
    }

    public function update(UpdateRangementRequest $request, Rangement $rangement)
    {
        $rangement->update($request->all());

        return redirect()->route('admin.rangements.index');
    }

    public function show(Rangement $rangement)
    {
        abort_if(Gate::denies('rangement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rangements.show', compact('rangement'));
    }

    public function destroy(Rangement $rangement)
    {
        abort_if(Gate::denies('rangement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rangement->delete();

        return back();
    }

    public function massDestroy(MassDestroyRangementRequest $request)
    {
        Rangement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
