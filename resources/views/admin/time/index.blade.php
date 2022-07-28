@extends('layouts.admin')
@section('content')
@can('time_manage')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.time.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.time.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.time.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-time">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.time.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.time.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.time.fields.server') }}
                        </th>
                        <th>
                            {{ trans('cruds.time.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($times as $key => $time)
                        <tr data-entry-id="{{ $time->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $time->id ?? '' }}
                            </td>
                            <td>
                                {{ $time->name ?? '' }}
                            </td>
                            <td>
                            @foreach($time->servers()->pluck('name') as $server)
                                    <span class="badge badge-info">{{ $server }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $time->status == "1" ? 'Enable':'Disable' }}
                            </td>
                            <td>
                               
                                <a class="btn btn-xs btn-info" href="{{ route('admin.time.edit', $time->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('admin.time.destroy', $time->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('time_manage')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.time.mass_destroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-time:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection