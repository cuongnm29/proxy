@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.server.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.server.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.service.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($server) ? $server->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.service.fields.description') }}*</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($services) ? $services->description : '') }}" required>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.service.fields.content') }}*</label>
                <input type="text" id="content" name="content" class="form-control" value="{{ old('content', isset($services) ? $services->content : '') }}" required>
                @if($errors->has('content'))
                    <em class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.content_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.service.fields.order') }}*</label>
                <input type="number" id="isorder" name="isorder" class="form-control" value="{{ old('isorder', isset($services) ? $services->isorder : '') }}" required>
                @if($errors->has('isorder'))
                    <em class="invalid-feedback">
                        {{ $errors->first('isorder') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.service.fields.status') }}
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
                    {{ trans('cruds.service.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.service.fields.icon') }}</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="logo" value="{{ old('icon', isset($services) ? $services->icon : '') }}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;"/>
                @if($errors->has('icon'))
                <em class="invalid-feedback">
                    {{ $errors->first('icon') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.icon_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
    var route_prefix = "/laravel-filemanager";
    lfm('lfm', 'image', {
        prefix: route_prefix
    });
    </script>
@endsection