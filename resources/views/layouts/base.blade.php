<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png">
    <link rel="manifest" href="/assets/site.webmanifest">
    <link rel="mask-icon" href="/assets/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/assets/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-title" content="{{config('app.name')}}">
    <meta name="application-name" content="{{config('app.name')}}">

    @inject('assets', 'App\Supports\AssetSupport')

    @if(!empty($page_title))
        <title>{{$page_title}} | {{$settings['workspace_name'] ?? config('app.name')}}</title>
        @else
        <title>{{$settings['workspace_name'] ?? config('app.name')}}</title>
    @endif

    <script>
        window.csrf_token = '{{ csrf_token() }}';
        window.base_url = '{{$base_url ?? config('app.url')}}';
        window.app = {
            i18n: {
                'yes': '{{__('Yes')}}',
                'no': '{{__('No')}}',
                'are_you_sure': '{{__('Are you sure?')}}',
                'loading': '{{__('Loading')}}',
                'copied': '{{__('Copied')}}',
            },
        }
    </script>

    {!! $assets->commonCssJs('build/cloudoffice.min') !!}
    {!! $assets->css('css/dark-sidebar') !!}

    @yield('base_head')

</head>
<body>

@yield('base_content')

{{-- System will load data dynamically --}}
<div class="modal" tabindex="-1" id="app-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="app-modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="app-modal-content"></div>
        </div>
    </div>
</div>
@yield('base_scripts')
</body>
</html>
