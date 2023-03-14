@extends('layouts.message')
@section('page_title', __('Server Error'))
@section('message_content')
    <div class="text-center">
        <h1 class="display-1">503</h1>
        <p class="h4 mb-3">{{__('Service Unavailable')}}</p>
    </div>
@endsection
