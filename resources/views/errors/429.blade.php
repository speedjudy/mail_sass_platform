@extends('layouts.message')
@section('page_title', __('Unauthorized'))
@section('message_content')
    <div class="text-center">
        <h1 class="display-1">429</h1>
        <p class="h4 mb-3">{{__('Too Many Requests')}}</p>
        <p class="h4 mb-3">{{__('Too Many Requests')}}</p>
    </div>
@endsection
