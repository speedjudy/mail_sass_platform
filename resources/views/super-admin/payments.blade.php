@extends('super-admin.office')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>{{__('Payments')}}</h3>
                </div>
            </div>
            <table id="app-data-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('Workspace')}}</th>
                    <th>{{__('User')}}</th>
                    <th>{{__('Plan')}}</th>
                    <th>{{__('Amount')}}</th>
                    <th>{{__('Created')}}</th>
                    <th class="text-end">{{__('Manage')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>
                            @if(!empty($workspaces[$transaction->workspace_id]))
                                {{$workspaces[$transaction->workspace_id]->name}}
                            @endif
                        </td>
                        <td>
                            @if(!empty($users[$transaction->user_id]))
                                {{$users[$transaction->user_id]->first_name}} {{$users[$transaction->user_id]->last_name}}
                            @endif
                        </td>
                        <td>
                            @if(!empty($plans[$transaction->plan_id]))
                                {{$plans[$transaction->plan_id]->name}}
                            @else
                                --
                            @endif
                        </td>
                        <td>
                            @if(!empty($users[$transaction->user_id]))
                                {{$users[$transaction->user_id]->first_name}} {{$users[$transaction->user_id]->last_name}}
                            @endif
                        </td>
                        <td>
                            {{$transaction->updated_at->diffForHumans()}}
                        </td>
                        <td class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                    <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/super-admin/delete/transaction/{{$transaction->uuid}}">{{__('Delete')}}</a></li>
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
