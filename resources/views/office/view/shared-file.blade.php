@extends('layouts.base')
@section('base_content')


    <div class="container">

        <div class="mx-auto max-width-800 mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">{{$media_file->title}}</h1>
                <div class="btn-group">
                    <a href="{{$base_url}}/office/view/file/{{$media_file->uuid}}?access_key={{$media_file->access_key}}&action=download" class="btn btn-primary"><i class="bi bi-download"></i> {{__('Download')}}</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mb-5">
                        <h1 class="h3">{{$media_file->title}}</h1>
                    </div>
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
        </div>

    </div>




@endsection
