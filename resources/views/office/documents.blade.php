@extends('office.layout')
@section('content')

    @include('office.common.recent-documents')

    <div class="card">
        <div class="card-body">
            <h3 class="fs-5">{{__('Documents')}}</h3>
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
                            <a href="{{$base_url}}/office/document?uuid={{$document->uuid}}">{{$document->title}}</a>
                        </td>
                        <td>
                            @if(!empty($users[$document->user_id]))
                                {{$users[$document->user_id]->first_name}} {{$users[$document->user_id]->last_name}}
                            @endif
                        </td>
                        <td @if($document->updated_at) data-order="{{$document->updated_at->getTimestamp()}}" @endif>
                            @if($document->updated_at) {{$document->updated_at->diffForHumans()}} @endif
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
                                    <li><a class="dropdown-item" href="{{$base_url}}/office/download-document?uuid={{$document->uuid}}&access_key={{$document->access_key}}&type=pdf">{{__('PDF')}}</a></li>
                                    <li><a class="dropdown-item" href="{{$base_url}}/office/download-document?uuid={{$document->uuid}}&access_key={{$document->access_key}}&type=docx">{{__('Word')}}</a></li>
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

    @include('office.common.create-document')

@endsection
