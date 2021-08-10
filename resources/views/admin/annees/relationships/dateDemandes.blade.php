<div class="content">
    @can('demande_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.demandes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.demande.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.demande.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-dateDemandes">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.numero_demande') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.objet_demande') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.users') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.updated_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.deleted_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $key => $demande)
                                    <tr data-entry-id="{{ $demande->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $demande->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demande->numero_demande ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demande->objet_demande ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($demande->users as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $demande->date->date_debut ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demande->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demande->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demande->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('demande_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.demandes.show', $demande->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('demande_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.demandes.edit', $demande->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('demande_delete')
                                                <form action="{{ route('admin.demandes.destroy', $demande->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('demande_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.demandes.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-dateDemandes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection