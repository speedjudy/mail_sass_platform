@extends('office.layout')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>{{$file->title}}</h5>
        <div>
            <button class="btn btn-primary" id="download_image">{{__('Download')}}</button>
        </div>
    </div>

    <div id="app-image-editor" data-image-path="/uploads/{{$file->path}}" data-image-name="{{$file->title}}"></div>

@endsection
