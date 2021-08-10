<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTvaRequest;
use App\Http\Requests\StoreTvaRequest;
use App\Http\Requests\UpdateTvaRequest;
use App\Models\Tva;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TvaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tva_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tvas = Tva::all();

        return view('admin.tvas.index', compact('tvas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tva_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tvas.create');
    }

    public function store(StoreTvaRequest $request)
    {
        $tva = Tva::create($request->all());

        return redirect()->route('admin.tvas.index');
    }

    public function edit(Tva $tva)
    {
        abort_if(Gate::denies('tva_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tvas.edit', compact('tva'));
    }

    public function update(UpdateTvaRequest $request, Tva $tva)
    {
        $tva->update($request->all());

        return redirect()->route('admin.tvas.index');
    }

    public function show(Tva $tva)
    {
        abort_if(Gate::denies('tva_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tvas.show', compact('tva'));
    }

    public function destroy(Tva $tva)
    {
        abort_if(Gate::denies('tva_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tva->delete();

        return back();
    }

    public function massDestroy(MassDestroyTvaRequest $request)
    {
        Tva::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
