@extends('website.layout')
@section('content')
    <section id="not_a_landing_page" class="bg-primary pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
        <div class="container">
            <div class="bg-white rounded">
                <div class="p-4">
                    {!! app_clean_html_content($post->content) !!}
                </div>
            </div>
        </div>
    </section>
@endsection
