@extends('super-admin.office')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>{{__('Digital Assets')}}</h3>
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#upload_file">
                        {{__('Upload')}}
                    </button>
                </div>
            </div>
            <table id="app-data-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Workspace')}}</th>
                    <th>{{__('Owner')}}</th>
                    <th>{{__('Created')}}</th>
                    <th class="text-end">{{__('Manage')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <td>
                            <a href="{{$base_url}}/office/view-file/{{$file->uuid}}">{{$file->title}}</a>
                        </td>
                        <td>
                            @if(!empty($workspaces[$file->workspace_id]))
                                {{$workspaces[$file->workspace_id]->name}}
                            @endif
                        </td>
                        <td>
                            @if(!empty($users[$file->user_id]))
                                {{$users[$file->user_id]->first_name}} {{$users[$file->user_id]->last_name}}
                            @endif
                        </td>
                        <td>
                            {{$file->updated_at->diffForHumans()}}
                        </td>
                        <td class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                    <li><a class="dropdown-item" href="{{$base_url}}/office/view-file/{{$file->uuid}}">{{__('Open')}}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/media-file/{{$file->uuid}}">{{__('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
