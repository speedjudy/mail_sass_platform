@extends('layouts.base')
@section('base_content')
    <div class="container">
        <div class="card mx-auto max-width-500 mt-5">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="{{$base_url ?? config('app.url')}}" class="app-brand-link gap-2">
                  <span class="app-brand-logo">
                    @if(!empty($settings['logo']))
                          <img src="{{config('app.url')}}/uploads/{{$settings['logo']}}" alt="{{$settings['workspace_name'] ?? config('app.name')}}" class="max-height-35 py-1 my-1">
                      @else
                          <img src="{{config('app.url')}}/uploads/system/logo.png" alt="{{$settings['workspace_name'] ?? config('app.name')}}" class="max-height-35 py-1 my-1">
                      @endif
                  </span>
                    </a>
                </div>


                @yield('message_content')



            </div>
        </div>
    </div>
@endsection
