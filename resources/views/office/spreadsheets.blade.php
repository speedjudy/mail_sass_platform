@extends('office.layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-5">{{__('Recent Spreadsheets')}}</h1>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_document">
                {{__('New Spreadsheet')}}
            </button>
        </div>
    </div>

    <div class="mb-3">
        <div class="row">
            @foreach($recent_documents as $recent_document)
                <div class="col-md-3">
                    <a href="{{$base_url}}/office/document?uuid={{$recent_document->uuid}}">
                        <div class="card">
                            <div class="card-body p-2 text-dark">
                                <div class="mb-2 fw-bold">{{$recent_document->title}}</div>
                                <div>
                                    <div class="mb-1"><span class="text-muted">{{__('Last Open')}}:</span> {{$recent_document->last_opened_at->diffForHumans()}}</div>
                                    @if(!empty($users[$recent_document->user_id]))
                                        <div><span class="text-muted">{{__('By')}}:</span> {{$users[$recent_document->user_id]->first_name}} {{$users[$recent_document->user_id]->last_name}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>{{__('Spreadsheets')}}</h3>
            <table id="app-data-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Author')}}</th>
                    <th>{{__('Last Update')}}</th>
                    <th class="text-end">{{__('Manage')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>
                            <a href="{{$base_url}}/office/document?uuid={{$recent_document->uuid}}">{{$document->title}}</a>
                        </td>
                        <td>
                            @if(!empty($users[$document->user_id]))
                                {{$users[$document->user_id]->first_name}} {{$users[$document->user_id]->last_name}}
                            @endif
                        </td>
                        <td>
                            {{$document->updated_at->diffForHumans()}}
                        </td>
                        <td class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                    <li><a class="dropdown-item" href="{{$base_url}}/office/document?uuid={{$document->uuid}}">{{__('Open')}}</a></li>
                                    <li><a class="dropdown-item" data-app-modal="/office/app-modal/share-document?uuid={{$document->uuid}}" data-app-modal-title="{{$document->title}}" href="#">{{__('Share')}}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/document/{{$document->uuid}}">{{__('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="create_document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('New Document')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form novalidate="novalidate" method="post" action="{{route('office.save-document')}}" id="form-install" data-form="redirect" data-btn-id="btn-save-document">

                        <div class="mb-3">
                            <label for="input_title">{{__('Title')}}</label>
                            <input type="text" class="form-control" required id="input_title" name="title">
                        </div>

                        <input type="hidden" name="type" value="spreadsheet">

                        <button type="submit" class="btn btn-primary" id="btn-save-document">{{__('Save')}}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
