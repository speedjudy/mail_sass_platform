@extends('layouts.base')
@section('base_content')

    @switch($document->type)

        @case('word')

            <div class="container">
                <div class="card mx-auto max-width-800 mt-5">
                    <div class="card-body">
                        <div class="mb-3">
                            <h1 class="h3">{{$document->title}}</h1>
                        </div>
                        {!! $document->content !!}
                    </div>
                </div>
            </div>

        @break

        @case('spreadsheet')

            <div id="loading_state">{{__('Loading')}}...</div>
            <div class="table-responsive">
                <div id="app-spreadsheet-editor" data-load-url="{{$base_url}}/office/load-document?uuid={{$document->uuid}}&access_key={{$document->access_key}}" data-save-url="{{$base_url}}/office/save-document?uuid={{$document->uuid}}"></div>
            </div>

        @break

    @endswitch


@endsection
