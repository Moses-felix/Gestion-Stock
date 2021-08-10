<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreValidationAchatRequest;
use App\Http\Requests\UpdateValidationAchatRequest;
use App\Http\Resources\Admin\ValidationAchatResource;
use App\Models\ValidationAchat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationAchatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('validation_achat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ValidationAchatResource(ValidationAchat::with(['users', 'demande_achat'])->get());
    }

    public function store(StoreValidationAchatRequest $request)
    {
        $validationAchat = ValidationAchat::create($request->all());

        return (new ValidationAchatResource($validationAchat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ValidationAchat $validationAchat)
    {
        abort_if(Gate::denies('validation_achat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ValidationAchatResource($validationAchat->load(['users', 'demande_achat']));
    }

    public function update(UpdateValidationAchatRequest $request, ValidationAchat $validationAchat)
    {
        $validationAchat->update($request->all());

        return (new ValidationAchatResource($validationAchat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ValidationAchat $validationAchat)
    {
        abort_if(Gate::denies('validation_achat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validationAchat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
