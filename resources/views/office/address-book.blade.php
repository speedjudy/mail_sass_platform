@extends('office.layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">{{__('Contacts')}}</h1>
        <div>
            <a href="{{$base_url}}/office/contact" class="btn btn-primary">{{__('Add Contact')}}</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="app-data-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Owner')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Phone')}}</th>
                    <th>{{__('Notes')}}</th>
                    <th class="text-end">{{__('Manage')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>
                            <a href="{{$base_url}}/office/contact?uuid={{$contact->uuid}}">{{$contact->first_name}} {{$contact->last_name}}</a>
                        </td>
                        <td>
                            {{$contact->title}}
                        </td>
                        <td>
                            @if(!empty($users[$contact->user_id]))
                                {{$users[$contact->user_id]->first_name}} {{$users[$contact->user_id]->last_name}}
                            @endif
                        </td>
                        <td>
                            {{$contact->email}}
                        </td>
                        <td>
                            {{$contact->phone ?? '--'}}
                        </td>
                        <td>
                            {{$contact->notes}}
                        </td>
                        <td class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                    <li><a class="dropdown-item" href="{{$base_url}}/office/contact?uuid={{$contact->uuid}}">{{__('Open')}}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" data-delete-item="true" href="{{$base_url}}/office/delete/contact/{{$contact->uuid}}">{{__('Delete')}}</a></li>
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
