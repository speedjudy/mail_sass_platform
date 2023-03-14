@extends('layouts.message')
@section('page_title', __('Unauthorized'))
@section('message_content')
    <div class="text-center">
        <h1 class="display-1">403</h1>
        <p class="h4 mb-3">{{__('Forbidden')}}</p>
        <p class="h4 mb-3">{{__('You do not have permission to access this page.')}}</p>
    </div>
@endsection
