@extends('layouts.base')
@section('base_content')

    <div class="container">
        <div class="card mx-auto max-width-800 mt-5">
            <div class="card-body">
                <div class="mb-3">
                    <h1 class="h3">{{$share->title}}</h1>
                </div>

                @include('office.render.share')

            </div>
        </div>
    </div>


@endsection
