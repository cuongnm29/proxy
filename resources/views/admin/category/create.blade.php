@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.category.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="name">{{ trans('cruds.category.title_singular') }}</label>
                <select id="parent_id" name="parent_id" class="form-control">
                    <option value="0">{{ trans('cruds.category.title_selection') }} </option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{$category->name }}</option>
                    @if(isset($category->child))
                    @foreach ($category->child as $child)
                    <option value="{{ $child->id }}">---{{ $child->name }}</option>
                        @if(($child->child))
                            @foreach ($child->child as $subchild)
                                <option value="{{ $subchild->id }}">------{{ $subchild->name }}</option>
                                    @if(($subchild->child))
                                        @foreach ($subchild->child as $subchildlv)
                                            <option value="{{ $subchildlv->id }}">--------{{ $subchildlv->name }}</option>
                                        @endforeach
                                    @endif
                            @endforeach
                        @endif
                    @endforeach
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.category.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control"
                    required>
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.name_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('istype') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.category.fields.type') }}
                </label>
                <select name="istype" id="istype" class="form-control select">
                    <option value="1">Tài khoản</option>
                    <option value="2">Giao dịch</option>
                    <option value="3">Nạp tiền</option>
                    <option value="4">Server</option>
                    <option value="5">Proxy</option>
                    <option value="6">Tin tức</option>
                    <option value="7">Liên hệ</option>
                </select>
                @if($errors->has('istype'))
                <em class="invalid-feedback">
                    {{ $errors->first('istype') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.type_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ismenu') ? 'has-error' : '' }}">
                <label for="ismenu">{{ trans('cruds.category.fields.menu') }}
                </label>
                <select name="ismenu" id="ismenu" class="form-control select">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                @if($errors->has('ismenu'))
                <em class="invalid-feedback">
                    {{ $errors->first('ismenu') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="isorder">{{ trans('cruds.category.fields.order') }}*</label>
                <input type="text" id="isorder" name="isorder" class="form-control"
                     required>
                @if($errors->has('isorder'))
                <em class="invalid-feedback">
                    {{ $errors->first('isorder') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.category.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('services') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.status_helper') }}
                </p>
            </div>
            <div>
            <input type="hidden" name="langid" id="langid" value="{{ app()->getLocale()}}">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

