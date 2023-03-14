@extends('super-admin.office')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>{{$workspace->name}}</h3>

                    <div class="mb-2">
                        <strong>{{__('Total Users')}}:</strong> {{$workspace->users->count()}}
                    </div>

                    <h4>{{__('Users')}}</h4>

                    <div class="table-responsive mb-4">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Email')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workspace->users as $app_user)
                                    <tr>
                                        <td>
                                            <a href="{{$base_url}}/super-admin/view-user/{{$app_user->uuid}}"><strong>{{$app_user->first_name}} {{$app_user->last_name}}</strong></a>
                                        </td>
                                        <td>{{$app_user->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($user->workspace_id !== $workspace->id)

                        <h4>{{__('Actions')}}</h4>

                        <div class="mb-2">
                            @if($workspace->is_active)
                                <a href="{{$base_url}}/super-admin/view-workspace/{{$workspace->uuid}}?action=suspend" class="btn btn-danger">{{__('Deactivate Workspace')}}</a>
                            @else
                                <a href="{{$base_url}}/super-admin/view-workspace/{{$workspace->uuid}}?action=unsuspend" class="btn btn-success">{{__('Activate Workspace')}}</a>
                            @endif
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
