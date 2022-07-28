@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>
  
    <div class="card-body">
        <form action="{{ route('admin.payment.update', [$payment->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.payment.fields.code') }}*</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ old('name', isset($payment) ? $payment->code : '') }}" readonly>
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payment.fields.code_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('method') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.payment.fields.method') }}*</label>
                <input type="text" id="method" name="method" class="form-control" value="{{ old('method', isset($payment) ? 'Vietcombank' : '') }}" readonly>
                @if($errors->has('method'))
                    <em class="invalid-feedback">
                        {{ $errors->first('method') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payment.fields.method_helper') }}
                </p>
            </div>
            
            
            <div class="form-group {{ $errors->has('money') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.payment.fields.money') }}*</label>
                <input type="number" id="money" name="money" class="form-control" value="{{ old('money', isset($payment) ? $payment->money : '') }}" readonly>
                @if($errors->has('isorder'))
                    <em class="invalid-feedback">
                        {{ $errors->first('isorder') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payment.fields.money_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.payment.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                <option value="1" {{$payment->status==1 ?'selected':''}}>Enable</option>
                    <option value="0" {{$payment->status==0 ?'selected':''}}>Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payment.fields.status_helper') }}
                </p>
            </div>
            
            <div>
            <input type="hidden" id="memberid" name="memberid" value="5">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

