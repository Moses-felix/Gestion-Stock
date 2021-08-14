@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.validationDemande.title_singular') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.validation-demandes.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <form method="POST" action="{{ route("admin.validation-demandes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('demande') ? 'has-error' : '' }}">
                            <label class="required" for="demande_id">{{ trans('cruds.validationDemande.fields.demande') }}</label>
                            <select class="form-control select2" name="demande_id" id="demande_id" required onchange="getdemande()">
                                @foreach($demandes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('demande_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('demande'))
                                <span class="help-block" role="alert">{{ $errors->first('demande') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationDemande.fields.demande_helper') }}</span>
                        </div>

                        {{-- <div class="form-group"> --}}
                            <tab id="detaildemande">

                            </tab>
                        {{-- </div> --}}
                        
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.validationDemande.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1">
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationDemande.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('etat') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="etat" value="0">
                                <input type="checkbox" name="etat" id="etat" value="1" {{ old('etat', 0) == 1 ? 'checked' : '' }}>
                                <label for="etat" style="font-weight: 400">Activer</label>
                                {{-- {{ trans('cruds.validationDemande.fields.etat') }} --}}
                            </div>
                            @if($errors->has('etat'))
                                <span class="help-block" role="alert">{{ $errors->first('etat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationDemande.fields.etat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">
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

@section('scripts')
<script>
    function getdemande(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'GET',
            url:"{{ route('demande.get') }}",
            data:{demande: $("#demande_id").val()},
            success: function(data){
                $("#detaildemande").empty();
                $("#detaildemande").append(data);
            },
            error: function(data){
                alert("error");
            }
        });
    }
</script>
@endsection