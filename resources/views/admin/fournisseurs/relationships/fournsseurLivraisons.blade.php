<div class="content">
    @can('livraison_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.livraisons.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.livraison.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.livraison.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-fournsseurLivraisons">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.numero_livraison') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.fournsseur') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.transport') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.divers') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.updated_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.livraison.fields.deleted_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($livraisons as $key => $livraison)
                                    <tr data-entry-id="{{ $livraison->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $livraison->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $livraison->numero_livraison ?? '' }}
                                        </td>
                                        <td>
                                            {{ $livraison->description ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($livraison->fournsseurs as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nom_fournisseur }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $livraison->transport ?? '' }}
                                        </td>
                                        <td>
                                            {{ $livraison->divers ?? '' }}
                                        </td>
                                        <td>
                                            {{ $livraison->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $livraison->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $livraison->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('livraison_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.livraisons.show', $livraison->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('livraison_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.livraisons.edit', $livraison->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('livraison_delete')
                                                <form action="{{ route('admin.livraisons.destroy', $livraison->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('livraison_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.livraisons.massDestroy') }}",
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
  let table = $('.datatable-fournsseurLivraisons:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection