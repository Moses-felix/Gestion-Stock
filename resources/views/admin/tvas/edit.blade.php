@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.tva.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tvas.update", [$tva->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('tva') ? 'has-error' : '' }}">
                            <label class="required" for="tva">{{ trans('cruds.tva.fields.tva') }}</label>
                            <input class="form-control" type="number" name="tva" id="tva" value="{{ old('tva', $tva->tva) }}" step="0.01" required>
                            @if($errors->has('tva'))
                                <span class="help-block" role="alert">{{ $errors->first('tva') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tva.fields.tva_helper') }}</span>
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