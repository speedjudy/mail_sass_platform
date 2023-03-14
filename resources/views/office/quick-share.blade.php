@extends('office.layout')
@section('content')


    @switch($tab)

        @case('new')

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form novalidate="novalidate" method="post" action="{{route('office.save-quick-share')}}" id="form-share-wizard" data-form="redirect" data-btn-id="btn-save-share">

                                <div class="mb-4">
                                    <h4 class="mb-3">{{__('New Share Wizard')}}</h4>
                                    <p class="fs-5 mb-2">{{__('What would you like to share?')}}</p>
                                    <p class="text-muted mb-2">{{__('Select an option from below to get started.')}}</p>
                                    <div>
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input share-type" type="radio" name="type" id="type_url" value="url">
                                            <label class="form-check-label" for="type_url">{{__('A URL')}}</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input share-type" type="radio" checked name="type" id="type_image" value="image">
                                            <label class="form-check-label" for="type_image">{{__('An image')}}</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input share-type" type="radio" name="type" id="type_video" value="video">
                                            <label class="form-check-label" for="type_video">{{__('A video')}}</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input share-type" type="radio" name="type" id="type_zip_file" value="zip_file">
                                            <label class="form-check-label" for="type_zip_file">{{__('A zip file')}}</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input share-type" type="radio" name="type" id="type_text_snippet" value="text_snippet">
                                            <label class="form-check-label" for="type_text_snippet">{{__('A text snippet')}}</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-3 d-none" id="block_share_title">
                                    <label for="share_title">{{__('Title')}}</label>
                                    <input type="text" class="form-control" id="share_title" name="title" value="">
                                </div>

                                <div id="block_share_url" class="d-none">
                                    <div class="mb-3">
                                        <label for="share_url">{{__('URL')}}</label>
                                        <input type="text" class="form-control" id="share_url" name="url" value="">
                                    </div>
                                </div>

                                <div id="block_share_text" class="d-none">
                                    <div class="mb-3">
                                        <label for="share_text">{{__('Text')}}</label>
                                        <textarea class="form-control" id="share_text" name="content" rows="15"></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary d-none" id="btn-save-share">{{__('Save')}}</button>

                            </form>
                            <div id="block_share_file">
                                <form action="{{route('office.create-quick-share')}}" data-then="redirect" id="app-file-upload" class="dropzone d-none text-center px-4 py-6 dz-clickable">
                                    <div class="dz-message">

                                        <h5 class="mb-4">{{__('Drag and drop your file here')}}</h5>

                                        <p class="mb-4">{{__('or')}}</p>

                                        <button type="button" class="btn btn-sm btn-dark">{{__('Browse files')}}</button>

                                        @csrf

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @break

        @case('shares')

            <div class="card">
                <div class="card-body">
                    @if(count($shares))
                        <h3 class="fs-5">{{__('Shares')}}</h3>
                        <table id="app-data-table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Owner')}}</th>
                                <th>{{__('Created')}}</th>
                                <th class="text-end">{{__('Manage')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shares as $share)
                                <tr>
                                    <td>
                                        <a href="{{$base_url}}/office/view-share/{{$share->uuid}}">{{$share->title}}</a>
                                    </td>
                                    <td>
                                        @if(!empty($users[$share->user_id]))
                                            {{$users[$share->user_id]->first_name}} {{$users[$share->user_id]->last_name}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$share->created_at->diffForHumans()}}
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                                <li><a class="dropdown-item" href="{{$base_url}}/office/view-share/{{$share->uuid}}">{{__('Open')}}</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/quick-share/{{$share->uuid}}">{{__('Delete')}}</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else

                        <div class="text-center">
                            <img alt="{{__('Empty')}}" src="/uploads/system/empty.png" class="img-fluid max-height-100"/>
                            <h4 class="mt-4">{{__('No Files Found')}}</h4>
                            <p class="text-muted">
                                {{__('You have not shared any files yet.')}}
                            </p>
                        </div>

                    @endif
                </div>
            </div>

            @break

        @case('access_logs')

            @include('office.common.quick-share-access-logs')

        @break

    @endswitch


@endsection

@section('scripts')
    <script>
        (function(){
            "use strict";
            document.addEventListener('DOMContentLoaded', () => {

                @if($tab == 'new')


                let shareType = document.querySelectorAll('.share-type');
                let blockShareUrl = document.querySelector('#block_share_url');
                let blockShareText = document.querySelector('#block_share_text');
                let appFileUpload = document.querySelector('#app-file-upload');
                let btnSaveShare = document.querySelector('#btn-save-share');
                let block_share_title = document.querySelector('#block_share_title');

                function triggerShareType(value) {
                    switch (value)
                    {
                        case 'url':
                            block_share_title.classList.remove('d-none');
                            btnSaveShare.classList.remove('d-none');
                            blockShareUrl.classList.remove('d-none');
                            appFileUpload.classList.add('d-none');
                            blockShareText.classList.add('d-none');
                            break;
                        case 'image':
                        case 'video':
                        case 'zip_file':
                            block_share_title.classList.add('d-none');
                            btnSaveShare.classList.add('d-none');
                            blockShareUrl.classList.add('d-none');
                            appFileUpload.classList.remove('d-none');
                            blockShareText.classList.add('d-none');
                            break;
                        case 'text_snippet':
                            block_share_title.classList.remove('d-none');
                            btnSaveShare.classList.remove('d-none');
                            blockShareUrl.classList.add('d-none');
                            appFileUpload.classList.add('d-none');
                            blockShareText.classList.remove('d-none');
                            break;
                    }
                }

                let currentShareType = document.querySelector('.share-type:checked');
                if(currentShareType)
                {
                    let value = currentShareType.value;
                    triggerShareType(value);
                }


                shareType.forEach((item) => {
                    item.addEventListener('change', (e) => {
                        let value = e.target.value;
                        triggerShareType(value);
                    });
                });


                @endif


            });
        })();
    </script>
@endsection
