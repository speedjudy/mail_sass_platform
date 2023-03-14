@extends('super-admin.office')
@section('content')
    <div class="card">
        <div class="card-body">

            <h3 class="mb-4">{{__('Workspaces')}}</h3>

            <table id="app-data-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Users')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>{{__('Created')}}</th>
                    <th class="text-end">{{__('Manage')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($workspaces as $app_workspace)
                    <tr>
                        <td>
                            <a class="fw-bold" href="{{$base_url}}/super-admin/view-workspace/{{$app_workspace->uuid}}">{{$app_workspace->name}}</a>
                        </td>
                        <td>
                            @if(!empty($users[$app_workspace->id]))
                                @foreach($users[$app_workspace->id] as $app_user)
                                    <a href="{{$base_url}}/super-admin/view-user/{{$app_user->uuid}}">{{$app_user->first_name}} {{$app_user->last_name}}</a> ({{$user->email}})<br>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if($app_workspace->is_active)
                                <span class="badge bg-success">{{__('Active')}}</span>
                            @else
                                <span class="badge bg-danger">{{__('Inactive')}}</span>
                            @endif
                        </td>
                        <td>
                            {{$app_workspace->created_at->diffForHumans()}}
                        </td>
                        <td class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">

                                    <li><a class="dropdown-item" href="{{$base_url}}/super-admin/view-workspace/{{$app_workspace->uuid}}">{{__('View')}}</a></li>

                                    @if($app_workspace->id !== $user->workspace_id)
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        @if($app_workspace->is_active)
                                            <li><a class="dropdown-item" href="{{$base_url}}/super-admin/view-workspace/{{$app_workspace->uuid}}?action=suspend">{{__('Suspend')}}</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="{{$base_url}}/super-admin/view-workspace/{{$app_workspace->uuid}}?action=unsuspend">{{__('Unsuspend')}}</a></li>
                                        @endif
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/user/{{$app_workspace->uuid}}">{{__('Delete')}}</a></li>
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
@endsection
