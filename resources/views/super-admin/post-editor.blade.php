@extends('super-admin.office')
@section('content')

    <form novalidate="novalidate" method="post" action="{{$base_url}}/super-admin/save-post-content" id="form-document" data-form="refresh" data-btn-id="btn-save-document">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">{{$post->title}}</h1>
        <div>
            <button type="submit" class="btn btn-primary" id="btn-save-document">{{__('Save')}}</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

                <div class="mb-3">
                    <input class="form-control" name="title" placeholder="{{__('Title')}}" value="{{$post->title}}">
                </div>
                <textarea id="app-editor-content" name="content" class="d-none">{!! app_clean_html_content($post->content) !!}</textarea>
                <div id="toolbar-container"></div>
                <div class="app-document-canvas">
                    <div class="app-document" id="app-document-editor">
                        {!! app_clean_html_content($post->content) !!}
                    </div>
                </div>
                <input type="hidden" name="uuid" value="{{$post->uuid}}">

        </div>
    </div>


    </form>

@endsection

@include('office.common.editor')
