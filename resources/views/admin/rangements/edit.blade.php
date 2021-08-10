@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.rangement.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.rangements.update", [$rangement->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nom_rangement') ? 'has-error' : '' }}">
                            <label class="required" for="nom_rangement">{{ trans('cruds.rangement.fields.nom_rangement') }}</label>
                            <input class="form-control" type="text" name="nom_rangement" id="nom_rangement" value="{{ old('nom_rangement', $rangement->nom_rangement) }}" required>
                            @if($errors->has('nom_rangement'))
                                <span class="help-block" role="alert">{{ $errors->first('nom_rangement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rangement.fields.nom_rangement_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection