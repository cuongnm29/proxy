@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.post.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.post.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('catid') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.post.title_singular') }}*</label>
                <select id="catid" name="catid" class="form-control">
                    <option value="">{{ trans('cruds.post.title_selection') }} </option>
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
                @if($errors->has('catid'))
                <em class="invalid-feedback">
                    {{ $errors->first('catid') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.post.fields.name') }}*</label>
                <input type="text" id="title" name="title" class="form-control"   value="{{ old('title', isset($post) ? $post->title : '') }}"
                    >
                @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.post.fields.summary') }}*</label>
                <textarea id="summary" name="summary" class="form-control">{!! old('summary', isset($summary) ? $post->summary : '')!!}</textarea>
                @if($errors->has('summary'))
                <em class="invalid-feedback">
                    {{ $errors->first('summary') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.summary_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.post.fields.content') }}*</label>
                <textarea id="content" name="content" class="form-control">{!! old('content', isset($content) ? $post->content : '')!!}</textarea>
                @if($errors->has('content'))
                <em class="invalid-feedback">
                    {{ $errors->first('content') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.content_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.post.fields.order') }}*</label>
                <input type="text" id="isorder" name="isorder" class="form-control" value="{{ old('isorder', isset($post) ? $post->isorder : '') }}"
                     >
                @if($errors->has('isorder'))
                <em class="invalid-feedback">
                    {{ $errors->first('isorder') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.order_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo" required>{{ trans('cruds.post.fields.photo') }}*</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ old('photo', isset($post) ? $post->photo : '') }}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;"/>
                @if($errors->has('photo'))
                <em class="invalid-feedback">
                    {{ $errors->first('photo') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.post.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ishome') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.post.fields.ishome') }}
                </label>
                <select name="ishome" id="ishome" class="form-control select">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                @if($errors->has('ishome'))
                <em class="invalid-feedback">
                    {{ $errors->first('ishome') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.status_helper') }}
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

@section('scripts')
@section('scripts')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "#summary,#content",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }
      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
  tinymce.init(editor_config);
</script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

@stop