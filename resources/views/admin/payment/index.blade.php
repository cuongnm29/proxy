
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-country">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.member') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.method') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.money') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $payment->id ?? '' }}
                            </td>
                            <td>
                                {{ $payment->code ?? '' }}
                            </td>
                            <td>
                            @foreach($payment->members()->pluck('username') as $members)
                                    <span class="badge badge-info">{{ $members }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $payment->method==1 ?'Vietcombank': '' }}
                            </td>
                            <td>
                                {{ number_format($payment->money , 0, '', ',')?? '' }}
                            </td>
                            <td>
                                {{ $payment->status == "1" ? 'Enable':'Disable' }}
                            </td>
                            <td>
                               
                                <a class="btn btn-xs btn-info" href="{{ route('admin.payment.edit', $payment->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
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
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-country:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection