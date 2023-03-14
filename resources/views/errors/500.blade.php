@extends('layouts.message')
@section('page_title', __('Server Error'))
@section('message_content')
    <div class="text-center">
        <h1 class="display-1">500</h1>
        <p class="h4 mb-3">{{__('Server Error')}}</p>
        <p class="h4 mb-3">{{__('The server encountered an internal error or misconfiguration and was unable to complete your request.')}}</p>
    </div>
@endsection
