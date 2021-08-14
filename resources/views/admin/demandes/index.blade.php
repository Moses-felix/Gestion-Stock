@extends('layouts.admin')
@section('content')
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
                <div class='row'>
                    <div class="form-group col-md-12">
                        @php
                            $success = Session::get('succes');
                        @endphp
                        @if ($success)
                            <div class="alert alert success">$success</div>
                        @endif
                    </div>

                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Demande">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.users') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demande.fields.objet_demande') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $key => $demande)
                                @if (Auth::user()->roles()->first()->title=='Magasinier' && $demande->etat = 0)
                                    <tr data-entry-id="{{ $demande->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $demande->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demande->users->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demande->objet_demande ?? '' }}
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
                                @elseif($demande->users_id == Auth::user()->id)
                                <tr data-entry-id="{{ $demande->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $demande->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $demande->users->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $demande->objet_demande ?? '' }}
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
                                @endif
                                   
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
    pageLength: 10,
  });
  let table = $('.datatable-Demande:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection