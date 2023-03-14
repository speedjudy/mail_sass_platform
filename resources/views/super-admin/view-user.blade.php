@extends('super-admin.office')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>{{$user->first_name}} {{$user->last_name}}</h3>
                    <div class="mb-2">
                        <strong>{{__('Email')}}:</strong> {{$user->email}}
                    </div>
                    <div class="mb-2">
                        <strong>{{__('Phone')}}:</strong> {{$user->phone ?? '--'}}
                    </div>
                    <div class="mb-2">
                        <strong>{{__('Workspace')}}:</strong> {{$user->workspace->name}}
                    </div>
                    <div class="mb-2">
                        <strong>{{__('Created')}}:</strong> {{$user->created_at->diffForHumans()}}
                    </div>
                    <div class="mb-2">
                        <strong>{{__('Last Login')}}:</strong> {{$user->last_login_at ? $user->last_login_at->diffForHumans() : '--'}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        (function(){
            "use strict";
            window.addEventListener('DOMContentLoaded', () => {

            });
        })();
    </script>
@endsection
