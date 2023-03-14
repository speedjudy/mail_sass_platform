@extends('office.layout')
@section('content')
    @switch($tab)
        @case('general')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form novalidate="novalidate" method="post" action="{{route('office.save-settings')}}" id="form-contact" data-form="refresh" data-btn-id="btn-save-contact">

                                <h4>{{__('Workspace')}}</h4>

                                <div class="mb-3">
                                    <label for="workspace_name">{{__('Workspace Name')}}</label>
                                    <input type="text" class="form-control" id="workspace_name" name="workspace_name" value="{{$settings['workspace_name'] ?? ''}}" required>
                                </div>

                                <input type="hidden" name="type" value="general">

                                <button type="submit" class="btn btn-primary" id="btn-save-contact">{{__('Save')}}</button>

                            </form>


                            <form method="post" action="{{route('office.save-settings')}}" enctype="multipart/form-data">
                                <div class="mt-4 mb-3">
                                    <label for="formFile" class="form-label">{{__('Change Logo')}}</label>
                                    <input class="form-control" type="file" accept="image/*" name="logo" id="formFile">
                                    <input type="hidden" name="type" value="logo">
                                    @csrf
                                </div>
                                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            @break

            @case('users')

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">{{__('Users')}}</h1>
                <div>
                    <a href="{{$base_url}}/office/user/new" class="btn btn-primary">{{__('Add User')}}</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="app-data-table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Created')}}</th>
                            <th class="text-end">{{__('Manage')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $app_user)
                            <tr>
                                <td>
                                    <a href="{{$base_url}}/office/user/{{$app_user->uuid}}">{{$app_user->first_name}} {{$app_user->last_name}}</a>
                                </td>
                                <td>
                                    {{$app_user->email}}
                                </td>
                                <td>
                                    {{$app_user->phone ?? '--'}}
                                </td>
                                <td>
                                    {{$app_user->created_at->diffForHumans()}}
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">

                                            <li><a class="dropdown-item" href="{{$base_url}}/office/user/{{$app_user->uuid}}">{{__('Edit')}}</a></li>

                                            @if($app_user->id !== $user->id)
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/user/{{$app_user->uuid}}">{{__('Delete')}}</a></li>
                                            @endif

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @break

        @case('api')

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">{{__('API Keys')}}</h1>
                <div>
                    <a href="{{$base_url}}/office/mail-api" class="btn btn-info">{{__('Mail API')}}</a>&nbsp; <a href="{{$base_url}}/office/manage-api/new" class="btn btn-primary">{{__('Create API Key')}}</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="app-data-table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{__('Label')}}</th>
                            <th>{{__('Owner')}}</th>
                            <th>{{__('Created')}}</th>
                            <th class="text-end">{{__('Manage')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($api_keys as $api_key)
                            <tr>
                                <td>
                                    <a href="{{$base_url}}/office/manage-api/{{$api_key->uuid}}">{{$api_key->name}}</a>
                                </td>
                                <td>
                                    @if(!empty($users[$api_key->user_id]))
                                        {{$users[$api_key->user_id]->first_name}} {{$users[$api_key->user_id]->last_name}}
                                    @endif
                                </td>
                                <td>
                                    {{$api_key->created_at->diffForHumans()}}
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">

                                            <li><a class="dropdown-item" href="{{$base_url}}/office/manage-api/{{$api_key->uuid}}">{{__('Edit')}}</a></li>
                                            <li><a class="dropdown-item" href="{{$base_url}}/office/manage-api/{{$api_key->uuid}}?action=regenerate">{{__('Regenerate Key')}}</a></li>

                                            @if($api_key->id !== $user->id)
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/api-key/{{$api_key->uuid}}">{{__('Delete')}}</a></li>
                                            @endif

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @break

        @case('about')

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4>{{config('app.name')}}</h4>
                            <p>{{__('App Version')}}: {{config('app.version')}}</p>
                            <p>{{__('Running on')}}: {{__('PHP')}}-{{PHP_VERSION ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>

        @break

    @endswitch
@endsection
