<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">{{__('Users')}}</h1>
    <div>
        <a href="{{$base_url}}/super-admin/settings?tab=user" class="btn btn-primary">{{__('Add User')}}</a>
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
                        <a href="{{$base_url}}/office/document?uuid={{$app_user->uuid}}">{{$app_user->first_name}} {{$app_user->last_name}}</a>
                    </td>
                    <td>
                        {{$app_user->email}}
                    </td>
                    <td>
                        {{$app_user->phone ?? '--'}}
                    </td>
                    <td data-order="{{$app_user->created_at->getTimestamp()}}">
                        {{$app_user->created_at->diffForHumans()}}
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end" style="">

                                <li><a class="dropdown-item" href="{{$base_url}}/super-admin/settings?tab=user&current_user={{$app_user->uuid}}">{{__('Edit')}}</a></li>

                                @if($app_user->id !== $user->id)
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/super-admin/delete/user/{{$app_user->uuid}}">{{__('Delete')}}</a></li>
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
