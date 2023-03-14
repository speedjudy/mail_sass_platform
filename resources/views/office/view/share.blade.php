@extends('office.layout')
@section('content')

    <div class="card mb-3">
        <div class="card-body">

            <h4>{{$share->title}}</h4>

            <div class="mb-3">
                <label for="input-copy-value">{{__('Share Short URL')}}</label>
                <input class="form-control" id="input-copy-value" value="{{$base_url}}/s/{{$share->short_url_key}}">
            </div>

            <div class="mb-4">
                <button type="button" data-copy-to-clipboard="input-copy-value" class="btn btn-primary">{{__('Copy URL')}}</button>
                <a href="{{$base_url}}/s/{{$share->short_url_key}}" target="_blank" class="btn btn-primary">{{__('Open')}}</a>
            </div>


            @include('office.render.share')


        </div>
    </div>

    @include('office.common.quick-share-access-logs')

@endsection
