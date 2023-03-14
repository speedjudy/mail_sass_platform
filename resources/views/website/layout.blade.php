<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
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
    <title>{{$post->title}}</title>

    @inject('assets', 'App\Supports\AssetSupport')

    {!! $assets->css('css/landing') !!}
    {!! $assets->css('css/landing-app') !!}


</head>
<body>
<!-- ====== Navbar Section Start -->
<div class="ud-header absolute top-0 left-0 z-40 flex w-full items-center bg-transparent">
    <div class="container">
        <div class="relative -mx-4 flex items-center justify-between">
            <div class="w-60 max-w-full px-4">
                <a href="{{$base_url}}/#home" class="navbar-logo block w-full py-5">
                    @if(!empty($super_settings['logo']))
                        <img src="{{config('app.url')}}/uploads/{{$super_settings['logo']}}" alt="{{$super_settings['workspace_name'] ?? config('app.name')}}" class="header-logo w-full">
                    @else
                        <img src="{{config('app.url')}}/uploads/system/logo.png" alt="{{$super_settings['workspace_name'] ?? config('app.name')}}" class="header-logo w-full">
                    @endif
                </a>
            </div>
            <div class="flex w-full items-center justify-between px-4">
                <div>
                    <button
                        id="navbarToggler"
                        class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden"
                    >
                <span
                    class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
                        <span
                            class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                        ></span>
                        <span
                            class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                        ></span>
                    </button>
                    <nav id="navbarCollapse" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6">
                        <ul class="blcok lg:flex">
                            <li class="group relative">
                                <a href="{{$base_url}}/#home" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">
                                    {{__('Home')}}
                                </a>
                            </li>
                            <li class="group relative">
                                <a href="{{$base_url}}/#about" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                    {{$post->settings['about_section_name'] ?? __('About')}}
                                </a>
                            </li>
                            <li class="group relative">
                                <a href="{{$base_url}}/#pricing" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                    {{$post->settings['pricing_section_name'] ?? __('Pricing')}}
                                </a>
                            </li>
                            <li class="group relative">
                                <a href="{{$base_url}}/#customers" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                    {{$post->settings['customers_section_name'] ?? __('Customers')}}
                                </a>
                            </li>
                            <li class="group relative">
                                <a href="{{$base_url}}/#faq" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                    {{$post->settings['faq_section_name'] ?? __('FAQ')}}
                                </a>
                            </li>


                        </ul>
                    </nav>
                </div>
                <div class="hidden justify-end pr-16 sm:flex lg:pr-0">

                    @if(!empty($user))
                        <a href="{{$base_url}}/office/dashboard" class="signUpBtn rounded-lg bg-white bg-opacity-20 py-3 px-6 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100 hover:text-dark">{{__('Dashboard')}}</a>
                    @else
                        <a href="{{$base_url}}/office/login" class="loginBtn py-3 px-7 text-base font-medium text-white hover:opacity-70">{{__('Sign In')}}</a>
                        <a href="{{$base_url}}/#signup" class="signUpBtn rounded-lg bg-white bg-opacity-20 py-3 px-6 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100 hover:text-dark">{{__('Sign Up')}}</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ====== Navbar Section End -->

@yield('content')

<footer class="fadeInUp relative z-10 bg-blue-900 pt-20 lg:pt-[120px]">
    <div class="container">
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4 sm:w-1/2 md:w-1/2">
                <div class="mb-10 w-full">


                    <a href="{{$base_url}}" class="block navbar-logo  w-full py-5">
                        @if(!empty($super_settings['logo']))
                            <img src="{{config('app.url')}}/uploads/{{$super_settings['logo']}}" alt="{{$super_settings['workspace_name'] ?? config('app.name')}}" class="header-logo max-h-[35px]">
                        @else
                            <img src="{{config('app.url')}}/uploads/system/logo.png" alt="{{$super_settings['workspace_name'] ?? config('app.name')}}" class="header-logo  max-h-[35px]">
                        @endif
                    </a>

                    <p class="mb-7 text-blue-100">
                        {{$post->settings['footer_business_short_description'] ?? ''}}
                    </p>



                    <div class="my-1">
                        <p class="text-base text-[#f3f4fe]">&copy; {{date('Y')}} <a class="text-blue-200" href="{{$base_url}}">{{$super_settings['workspace_name']}}</a> {{__('All Rights Reserved')}}. <a class="text-blue-200" href="{{$base_url}}/privacy-policy">{{__('Privacy Policy')}}</a> | <a class="text-blue-200" href="{{$base_url}}/terms-of-service">{{__('Terms of Service')}}</a> </p>
                    </div>



                </div>
            </div>
            <div class="w-full px-4 sm:w-1/4 md:w-1/4">
                <div class="mb-10 w-full ">
                    <h4 class="mb-9 text-lg font-semibold text-white">{{__('My Account')}}</h4>
                    <ul>
                        <li>
                            <a href="{{$base_url}}/office/login" class="mb-2 inline-block text-base leading-loose text-blue-200 hover:text-white">
                                {{__('Sign In')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{$base_url}}/#signup" class="mb-2 inline-block text-base leading-loose text-blue-200 hover:text-white">
                                {{__('Create an Account')}}
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="w-full px-4 sm:w-1/4 md:w-1/4">
                <div class="mb-10 w-full ">
                    <h4 class="mb-9 text-lg font-semibold text-white">{{$super_settings['workspace_name']}}</h4>
                    <ul>
                        <li><a href="{{$base_url}}/#home" class="mb-2 inline-block text-base leading-loose text-blue-200 hover:text-white">{{__('Home')}}</a></li>
                        <li><a href="{{$base_url}}/#about" class="mb-2 inline-block text-base leading-loose text-blue-200 hover:text-white">{{$post->settings['about_section_name'] ?? __('About')}}</a></li>
                        <li><a href="{{$base_url}}/#pricing" class="mb-2 inline-block text-base leading-loose text-blue-200 hover:text-white">{{$post->settings['pricing_section_name'] ?? __('Pricing')}}</a></li>
                    </ul>
                </div>
            </div>



        </div>
    </div>

</footer>

<a href="#" class="back-to-top fixed bottom-8 right-8 left-auto z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark"><span class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"></span></a>

{!! $assets->js('js/landing') !!}

</body>
</html>
