<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrmNoteRequest;
use App\Http\Requests\StoreCrmNoteRequest;
use App\Http\Requests\UpdateCrmNoteRequest;
use App\Models\CrmNote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrmNoteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crm_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmNotes = CrmNote::all();

        return view('admin.crmNotes.index', compact('crmNotes'));
    }

    public function create()
    {
        abort_if(Gate::denies('crm_note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crmNotes.create');
    }

    public function store(StoreCrmNoteRequest $request)
    {
        $crmNote = CrmNote::create($request->all());

        return redirect()->route('admin.crm-notes.index');
    }

    public function edit(CrmNote $crmNote)
    {
        abort_if(Gate::denies('crm_note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crmNotes.edit', compact('crmNote'));
    }

    public function update(UpdateCrmNoteRequest $request, CrmNote $crmNote)
    {
        $crmNote->update($request->all());

        return redirect()->route('admin.crm-notes.index');
    }

    public function show(CrmNote $crmNote)
    {
        abort_if(Gate::denies('crm_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crmNotes.show', compact('crmNote'));
    }

    public function destroy(CrmNote $crmNote)
    {
        abort_if(Gate::denies('crm_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmNote->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmNoteRequest $request)
    {
        CrmNote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
