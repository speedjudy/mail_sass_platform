@extends('office.layout')
@section('content')


    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">{{$media_file->title}}</h1>
        <div class="btn-group">
            <a href="/office/digital-assets" class="btn btn-warning"><i class="bi bi-arrow-left"></i> {{__('Back')}}</a>
            <a href="{{$base_url}}/office/download-media-file/{{$media_file->uuid}}" class="btn btn-primary"><i class="bi bi-download"></i> {{__('Download')}}</a>
            <button type="button" class="btn btn-primary" data-app-modal="/office/app-modal/share-file?uuid={{$media_file->uuid}}" data-app-modal-title="{{$media_file->title}}">{{__('Share')}}</button>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">

            @if($media_file->extension)

                @switch($media_file->extension)

                    @case('jpg')
                    @case('jpeg')
                    @case('png')
                    @case('gif')
                        <img alt="{{$media_file->title}}" src="{{config('app.url')}}/uploads/{{$media_file->path}}" class="img-fluid">
                        @break

                    @case('mp4')
                    @case('webm')
                    @case('ogg')

                        <video class="img-fluid rounded-3" controls>
                            <source src="{{config('app.url')}}/uploads/{{$media_file->path}}" type="video/{{$media_file->extension}}">
                        </video>

                        @break

                    @default

                        <div class="text-center">
                            <a class="btn btn-lg btn-primary" href="{{$base_url}}/office/download-media-file/{{$media_file->uuid}}">{{__('Download')}}</a>
                        </div>

                        @break



                @endswitch


            @endif



        </div>
    </div>


@endsection
