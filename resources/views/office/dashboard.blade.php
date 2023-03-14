@extends('office.layout')
@section('content')

    <h3 class="mb-3">{{__('Hey')}}, {{$user->first_name}}!</h3>

    @include('office.common.recent-documents')

    <div class="row">

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="h3">{{__('Events')}}</h1>
                        <div>
                            <button class="btn btn-primary" id="btn_add_event">{{__('Add Event')}}</button>
                            <a class="btn btn-primary" href="{{$base_url}}/office/calendar">{{__('View More')}}</a>
                        </div>
                    </div>
                    <div id="app-calendar"
                         data-events-source-url="{{$base_url}}/office/calendar-events"
                         data-events-save-url="{{$base_url}}/office/save-event"
                         data-initial-view="dayGridMonth"
                         data-disable-header-toolbar="true"
                    ></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <a href="{{$base_url}}/office/documents" class="text-dark">
                        <div class="card">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">{{__('Documents')}}</span>
                                <h3 class="card-title mb-2">{{$word_documents_count}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <a href="{{$base_url}}/office/spreadsheets" class="text-dark">
                        <div class="card">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">{{__('Spreadsheet')}}</span>
                                <h3 class="card-title mb-2">{{$spreadsheet_documents_count}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body pb-0">
                    <h4>{{__('Recent Contacts')}}</h4>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($recent_contacts as $recent_contact)
                            <tr>
                                <td>
                                    <a href="{{$base_url}}/office/contact?uuid={{$recent_contact->uuid}}"><strong>{{$recent_contact->first_name}} {{$recent_contact->lastt_name}}</strong></a>
                                </td>
                                <td>
                                    {{$recent_contact->title}}
                                </td>
                                <td>
                                    {{$recent_contact->email}}
                                </td>
                                <td>
                                    {{$recent_contact->phone}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4>{{__('Activities Statistics')}}</h4>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>

    @include('office.common.add-event')
    @include('office.common.create-document')


@endsection

@section('scripts')
    <script>
        (function(){
            "use strict";
            window.addEventListener('DOMContentLoaded', () => {
                createChart("#chart", {
                    type: "heatmap",
                    data: {
                        dataPoints: @json($activities_stats),
                        // One month ago date object
                        start: new Date(new Date().setMonth(new Date().getMonth() - 1)),
                        // Today date object
                        end: new Date(),

                    },
                });
            });
        })();
    </script>
@endsection
