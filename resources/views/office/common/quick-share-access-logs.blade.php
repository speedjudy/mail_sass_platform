<div class="card">
    <div class="card-body">
        <h3 class="fs-5">{{__('Access Logs')}}</h3>
        <table id="app-data-table" class="table table-bordered">
            <thead>
            <tr>
                <th>{{__('IP')}}</th>
                <th>{{__('Device')}}</th>
                <th>{{__('Accessed On')}}</th>
                <th class="text-end">{{__('Manage')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($access_logs as $access_log)
                <tr>
                    <td>
                        {{$access_log->ip}}
                    </td>
                    <td>
                        {{$access_log->browser}} ({{$access_log->os}})
                    </td>
                    <td>
                        {{$access_log->created_at->diffForHumans()}}
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/quick-share-access-log/{{$access_log->uuid}}">{{__('Delete')}}</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
