@extends('layouts.admin')
@section('content')
@can('post_manage')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.post.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.post.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.post.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">

      <div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable datatable-Post">
            <thead>
                <tr>
                    <th>
                        {{ trans('cruds.post.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.post.fields.name') }}
                    </th>

                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach($posts as $item)
                <tr>
                    <td>
                        <span>{{ $item->id }}</span>
                    </td>
                    <td class="treeview">
                        <span>{{ $item->title }}</span>  
                    </td>
                    <td>
                        @can('post_manage')
                        <a class="btn btn-xs btn-info" href="{{ route('admin.post.edit', $item->id) }}">
                            {{ trans('global.edit') }}
                        </a>
                        @endcan
                        @can('post_manage')
                        <form action="{{ route('admin.post.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                            style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                        </form>
                        @endcan
                    </td>
                </tr>
                
                @endforeach
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
@can('post_manage')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.post.mass_destroy') }}",
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
  $('.datatable-post:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection