@extends('layouts.admin')
@section('content')
<div class="content">
    @can('validation_achat_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.validation-achats.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.validationAchat.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.validationAchat.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ValidationAchat">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.users') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.demande_achat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.commentaire') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.etat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.statut') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($validationAchats as $key => $validationAchat)
                                    <tr data-entry-id="{{ $validationAchat->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $validationAchat->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $validationAchat->users->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $validationAchat->demande_achat->objet ?? '' }}
                                        </td>
                                        <td>
                                            {{ $validationAchat->commentaire ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ValidationAchat::ETAT_RADIO[$validationAchat->etat] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $validationAchat->statut ?? '' }}
                                        </td>
                                        <td>
                                            @can('validation_achat_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.validation-achats.show', $validationAchat->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('validation_achat_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.validation-achats.edit', $validationAchat->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('validation_achat_delete')
                                                <form action="{{ route('admin.validation-achats.destroy', $validationAchat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('validation_achat_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.validation-achats.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-ValidationAchat:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection