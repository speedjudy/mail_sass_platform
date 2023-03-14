@extends('office.layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form novalidate="novalidate" method="post" action="{{route('office.save-settings')}}" id="form-contact" data-form="{{$base_url}}/office/manage-api/{{$api->uuid}}" data-btn-id="btn-save-contact">

                        <h4>{{__('API')}}</h4>

                        <div class="mb-3">
                            <label for="api_name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="api_name" name="name" value="{{$api->name ?? ''}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="api_key">{{__('API Key')}}</label>
                            <input type="text" id="api_key" class="form-control" disabled value="{{$api->key ?? ''}}">
                        </div>

                        <input type="hidden" name="uuid" value="{{$api->uuid}}">
                        <input type="hidden" name="type" value="api-key">

                        <button type="submit" class="btn btn-primary" id="btn-save-contact">{{__('Save')}}</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>{{__('Sample API Request')}}</h4>
                    <strong>{{__('POST Request')}}:</strong> <code>{{$base_url}}/api/contact</code>
                    <p class="mt-3">{{__('Parameters')}}</p>
                    <ul>
                        <li><code>api_key</code> - <code>{{$api->key}}</code></li>
                        <li><code>first_name</code> - {{__('First Name')}}</li>
                        <li><code>last_name</code> - {{__('Last Name')}}</li>
                        <li><code>email</code> - {{__('Email')}}</li>
                        <li><code>phone</code> - {{__('Phone')}}</li>
                        <li><code>address</code> - {{__('Address')}}</li>
                        <li><code>notes</code> - {{__('Notes')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
