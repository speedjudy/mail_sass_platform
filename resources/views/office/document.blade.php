@extends('office.layout')
@section('content')

    <form novalidate="novalidate" method="post" action="{{route('office.save-document')}}" id="form-document" data-form="refresh" data-btn-id="btn-save-document">

        <input type="hidden" name="uuid" value="{{$document->uuid}}">
        <textarea id="app-editor-content" name="content" class="d-none">{!! app_clean_html_content($document->content) !!}</textarea>

        <div class="mb-3">
            <input class="form-control" name="title" placeholder="{{__('Document Name')}}" value="{{$document->title}}">
        </div>

        <div class="mb-3 btn-group">
            <button type="submit" class="btn btn-primary" id="btn-save-document">{{__('Save')}}</button>

            @if($document->type == 'word')
                <div class="btn-group">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('Download')}}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{$base_url}}/office/download-document?uuid={{$document->uuid}}&access_key={{$document->access_key}}&type=pdf">{{__('PDF')}}</a></li>
                        <li><a class="dropdown-item" href="{{$base_url}}/office/download-document?uuid={{$document->uuid}}&access_key={{$document->access_key}}&type=docx">{{__('Word')}}</a></li>
                    </ul>
                </div>
            @elseif($document->type == 'spreadsheet')
                <button type="button" id="btn-download-xlsx" class="btn btn-primary d-none" data-file-name="{{$document->title}}.xlsx">{{__('Download XLSX')}}</button>
            @endif

            <button type="button" class="btn btn-primary" data-app-modal="/office/app-modal/share-document?uuid={{$document->uuid}}" data-app-modal-title="{{$document->title}}">{{__('Share')}}</button>
        </div>

        <div>

            @switch($document->type)

                @case('word')



                    <div id="toolbar-container"></div>
                    <div class="app-document-canvas">
                        <div class="app-document" id="app-document-editor">
                            {!! app_clean_html_content($document->content) !!}
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




        </div>
    </form>

    @if($document->type == 'word')
    @include('office.common.editor')
    @elseif($document->type == 'spreadsheet')
        <script src="/assets/lib/xlsx.full.min.js?v=4"></script>
    @endif

@endsection
