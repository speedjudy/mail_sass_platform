@extends('office.layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">{{__('Calendar')}}</h1>
        <div>
            <button class="btn btn-primary" id="btn_add_event">{{__('Add Event')}}</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-2">
            <div id="app-calendar"
                 data-events-source-url="{{$base_url}}/office/calendar-events"
                 data-events-save-url="{{$base_url}}/office/save-event"
            ></div>
        </div>
    </div>

    @include('office.common.add-event')

@endsection
