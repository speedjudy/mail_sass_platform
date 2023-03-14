@extends('office.layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>{{__('Images')}}</h3>
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#upload_image_modal">
                        {{__('Upload Image')}}
                    </button>
                </div>
            </div>
            <table id="app-data-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('Image')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Author')}}</th>
                    <th class="text-end">{{__('Manage')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <td>
                            <div class="mb-3">
                                <img src="{{config('app.url')}}/uploads/{{$file->path}}" class="rounded max-height-75" loading="lazy" alt="{{$file->title}}">
                            </div>
                            <a href="{{$base_url}}/office/image-editor/{{$file->uuid}}" class="btn btn-sm btn-primary">{{__('Open with Editor')}}</a>
                        </td>
                        <td>
                            <a href="{{$base_url}}/office/view-file/{{$file->uuid}}">{{$file->title}}</a>
                        </td>
                        <td>
                            @if(!empty($users[$file->user_id]))
                                {{$users[$file->user_id]->first_name}} {{$users[$file->user_id]->last_name}}
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                    <li><a class="dropdown-item" href="{{$base_url}}/office/view-file/{{$file->uuid}}">{{__('Open')}}</a></li>
                                    <li><a class="dropdown-item" href="{{$base_url}}/office/image-editor/{{$file->uuid}}">{{__('Open with Editor')}}</a></li>
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

    <div class="modal fade" id="upload_image_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{__('Upload')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{route('office.save-upload')}}" id="app-file-upload" data-accepted-files=".jpeg,.jpg,.png,.gif" class="dropzone text-center px-4 py-6 dz-clickable">
                        <div class="dz-message">

                            <h5 class="mb-4">Drag and drop your file here</h5>

                            <p class="mb-4">or</p>

                            <button type="button" class="btn btn-sm btn-dark">Browse files</button>

                            @csrf

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
