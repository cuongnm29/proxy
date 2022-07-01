@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.update') }} {{ trans('cruds.coupon.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.coupon.update', [$coupon->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('percent') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.coupon.fields.percent') }}*</label>
                <input type="number" id="percent" name="percent" class="form-control" value="{{ old('percent', isset($coupon) ? $coupon->percent : '') }}" required>
                @if($errors->has('percent'))
                    <em class="invalid-feedback">
                        {{ $errors->first('percent') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coupon.fields.percent_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.coupon.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                <option value="1" {{$coupon->status==1 ?'selected':''}}>Enable</option>
                    <option value="0" {{$coupon->status==0 ?'selected':''}}>Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.coupon.fields.status_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

