@extends('website.layout')
@section('content')
    <div id="home" class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap items-center">
                <div class="w-full px-4">
                    <div
                        class="hero-content mx-auto max-w-[780px] text-center"

                    >
                        <h1 class="mb-8 text-3xl font-bold leading-snug text-white sm:text-4xl sm:leading-snug md:text-[45px] md:leading-snug">
                            {{$post->settings['hero_title'] ?? ''}}
                        </h1>
                        <p class="mx-auto mb-10 max-w-[600px] text-base text-[#e4e4e4] sm:text-lg sm:leading-relaxed md:text-xl md:leading-relaxed">
                            {{$post->settings['hero_subtitle'] ?? ''}}
                        </p>
                        <ul class="mb-10 flex flex-wrap items-center justify-center">
                            <li><a href="{{$post->settings['hero_button_url'] ?? ''}}"
                                   class="inline-flex items-center justify-center rounded-lg bg-white py-4 px-6 text-center text-base font-medium text-dark transition duration-300 ease-in-out hover:text-primary hover:shadow-lg sm:px-10">{{$post->settings['hero_button_text'] ?? ''}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="w-full px-4">
                    <div class="relative z-10 mx-auto max-w-[845px]">
                        <div class="mt-16">
                            @if(!empty($post->settings['hero_image']))
                                <img
                                    src="{{config('app.url')}}/uploads/{{$post->settings['hero_image']}}"
                                    alt="{{$post->title ?? ''}}"
                                    class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                                />
                            @endif
                        </div>
                        <div class="absolute bottom-0 -left-9 z-[-1]">
                            <img src="{{config('app.url')}}/assets/images/website/pattern-1.svg">
                        </div>
                        <div class="absolute -top-6 -right-6 z-[-1]">
                            <img src="{{config('app.url')}}/assets/images/website/pattern-2.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Hero Section End -->

    <!-- ====== Features Section Start -->
    <section class="pt-20 pb-8 lg:pt-[120px] lg:pb-[70px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mb-12 max-w-[620px] lg:mb-20">
                        <span class="mb-2 block text-lg font-semibold text-primary">{{$post->settings['feature_section_name'] ?? ''}}</span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
                            {{$post->settings['feature_highlight_title'] ?? ''}}
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            {{$post->settings['feature_highlight_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4 md:w-1/2 lg:w-1/4">
                    <div class="group mb-12 bg-white">
                        <div class="relative z-10 mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary">
                            <span class="absolute top-0 left-0 z-[-1] mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"></span>
                            <div class="icon-svg">
                                {!! $post->settings['feature_highlight_feature_1_icon'] ?? '' !!}
                            </div>
                        </div>
                        <h4 class="mb-3 text-xl font-bold text-dark">
                            {{$post->settings['feature_highlight_feature_1_title'] ?? ''}}
                        </h4>
                        <p class="mb-8 text-body-color lg:mb-11">
                            {{$post->settings['feature_highlight_feature_1_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/4">
                    <div class="group mb-12 bg-white">
                        <div class="relative z-10 mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary">
                            <span class="absolute top-0 left-0 z-[-1] mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"></span>
                            <div class="icon-svg">
                                {!! $post->settings['feature_highlight_feature_2_icon'] ?? '' !!}
                            </div>
                        </div>
                        <h4 class="mb-3 text-xl font-bold text-dark">
                            {{$post->settings['feature_highlight_feature_2_title'] ?? ''}}
                        </h4>
                        <p class="mb-8 text-body-color lg:mb-11">
                            {{$post->settings['feature_highlight_feature_2_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/4">
                    <div class="group mb-12 bg-white">
                        <div class="relative z-10 mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary">
                            <span class="absolute top-0 left-0 z-[-1] mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"></span>
                            <div class="icon-svg">
                                {!! $post->settings['feature_highlight_feature_3_icon'] ?? '' !!}
                            </div>
                        </div>
                        <h4 class="mb-3 text-xl font-bold text-dark">
                            {{$post->settings['feature_highlight_feature_3_title'] ?? ''}}
                        </h4>
                        <p class="mb-8 text-body-color lg:mb-11">
                            {{$post->settings['feature_highlight_feature_3_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/4">
                    <div class="group mb-12 bg-white">
                        <div class="relative z-10 mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary">
                            <span class="absolute top-0 left-0 z-[-1] mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"></span>
                            <div class="icon-svg">
                                {!! $post->settings['feature_highlight_feature_4_icon'] ?? '' !!}
                            </div>
                        </div>
                        <h4 class="mb-3 text-xl font-bold text-dark">
                            {{$post->settings['feature_highlight_feature_4_title'] ?? ''}}
                        </h4>
                        <p class="mb-8 text-body-color lg:mb-11">
                            {{$post->settings['feature_highlight_feature_4_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="signup" class="relative py-20 md:py-[120px]">
        <div
            class="absolute top-0 left-0 z-[-1] h-1/2 w-full bg-[#f3f4fe] lg:h-[45%] xl:h-1/2"
        ></div>
        <div class="container px-4">
            <div class="-mx-4 flex flex-wrap items-center">
                <div class="w-full px-4 lg:w-7/12 xl:w-8/12">
                    <div class="ud-contact-content-wrapper">
                        <div class="ud-contact-title mb-12 lg:mb-[150px]">
                <span class="mb-5 text-base font-semibold text-dark">
                  {{$post->settings['signup_title'] ?? ''}}
                </span>
                            <h2 class="text-[35px] font-semibold">
                                {{$post->settings['signup_subtitle'] ?? ''}}
                            </h2>
                        </div>
                        <div class="mb-12 flex flex-wrap justify-between lg:mb-0">
                            <div class="lg:max-w-lg">
                                <dl class="mt-3 max-w-xl space-y-2 text-base leading-7 text-gray-600 lg:max-w-none">

                                    @if(!empty($post->settings['signup_reasons']))
                                        @foreach($post->settings['signup_reasons'] as $reason)

                                            <div class="relative pl-9">

                                                {{-- SVG Checkmark, does not require external path--}}

                                                <dt class="inline font-semibold text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="absolute top-1 left-1 h-5 w-5 text-indigo-600" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg> {{$reason}}</dt>
                                            </div>

                                        @endforeach
                                    @endif

                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-5/12 xl:w-4/12">
                    <div class="rounded-lg bg-white py-10 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]">
                        <h3 class="mb-4 text-2xl font-semibold md:text-[26px]">
                            {{$post->settings['signup_section_name'] ?? __('Sign Up')}}
                        </h3>

                        <form method="post" action="{{$base_url}}/signup">


                            @if ($errors->any())
                                <div class="mb-4" id="has_signup_errors">
                                    @foreach ($errors->all() as $error)
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-2 rounded relative" role="alert">{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-6">
                                    <label for="first_name" class="block text-xs text-dark">{{__('First Name')}}</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="{{__('First Name')}}" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"/>
                                </div>
                                <div class="mb-6">
                                    <label for="last_name" class="block text-xs text-dark">{{__('Last Name')}}</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="{{__('Last Name')}}" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"/>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="email" class="block text-xs text-dark">{{__('Email')}}</label>
                                <input type="email" name="email" id="email" placeholder="{{__('Enter your email')}}" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" value="{{old('email')}}" />
                            </div>

                            <div class="mb-6">
                                <label for="password" class="block text-xs text-dark">{{__('Password')}}</label>
                                <input type="password" name="password" id="password" placeholder="{{__('Choose a Password')}}" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" value="{{old('password')}}" />
                            </div>

                            <div class="mb-6">
                                <label for="password_confirmation" class="block text-xs text-dark">{{__('Confirm Password')}}</label>
                                <input type="password" id="password_confirmation" placeholder="{{__('Retype Password')}}" name="password_confirmation" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"/>
                            </div>

                            <div class="mb-6">
                                <button type="submit" class="inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">{{__('Get Started')}}</button>
                            </div>

                                <div class="mb-2">
                                    <small class="text-gray-300">{{__('By clicking the button, you agree to our Terms of Service and have read and acknowledge our Privacy Statement.')}}</small>
                                </div>

                                <div class="mb-3">
                                    <small>
                                        <a class="text-blue-400" href="{{$base_url}}/privacy-policy">{{__('Privacy Policy')}}</a> | <a class="text-blue-400" href="{{$base_url}}/terms-of-service">{{__('Terms of Service')}}</a>
                                    </small>
                                </div>

                                <div class="mb-0">
                                    {{__('Already have an account?')}} <a class="text-primary" href="{{$base_url}}/office/login">{{__('Sign in')}}</a>
                                </div>

                            @csrf

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="bg-[#f3f4fe] pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
        <div class="container">
            <div class="bg-white">
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="items-center justify-between overflow-hidden border lg:flex">
                            <div class="w-full py-12 px-7 sm:px-12 md:p-16 lg:max-w-[565px] lg:py-9 lg:px-16 xl:max-w-[640px] xl:p-[70px]">
                                <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
                                    {{$post->settings['about_section_title'] ?? ''}}
                                </h2>
                                <p class="mb-9 text-base leading-relaxed text-body-color">
                                    {{$post->settings['about_section_subtitle'] ?? ''}}
                                </p>
                            </div>
                            <div class="text-center">
                                <div class="relative z-10 inline-block">
                                    @if(!empty($post->settings['hero_image']))
                                        <img
                                            src="{{config('app.url')}}/uploads/{{$post->settings['hero_image']}}"
                                            alt="{{$post->title ?? ''}}"
                                            class="mx-auto lg:ml-auto"
                                        />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== About Section End -->

    <!-- ====== Pricing Section Start -->
    <section
        id="pricing"
        class="relative z-20 overflow-hidden bg-white pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]"
    >
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                            {{$post->settings['pricing_section_title'] ?? ''}}
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            {{$post->settings['pricing_section_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-center">

                @foreach($subscription_plans as $subscription_plan)

                    <div class="w-full md:w-1/2 lg:w-1/3">
                        <div class="relative z-10 mb-10 overflow-hidden rounded-xl {{$subscription_plan->is_featured ? 'bg-primary bg-gradient-to-b from-primary to-[#179BEE]' : 'border border-primary border-opacity-20'}} bg-white py-10 px-8 text-center shadow-pricing sm:p-12 lg:py-10 lg:px-6 xl:p-12">

                            @if($subscription_plan->is_featured)
                                <span class="mb-5 inline-block rounded-full border border-white bg-white py-2 px-6 text-base font-semibold uppercase text-primary">{{$subscription_plan->featured_text ?? __('Popular')}}</span>
                            @endif


                            <span class="mb-2 block text-base font-medium uppercase {{$subscription_plan->is_featured ? 'text-white' : 'text-dark'}}">{{$subscription_plan->name ?? ''}}</span>

                            @if($subscription_plan->price_monthly && $subscription_plan->price_monthly > 0)
                                <h2 class="mb-9 text-[28px] font-semibold {{$subscription_plan->is_featured ? 'text-white' : 'text-primary'}}">
                                    {{formatCurrency($subscription_plan->price_monthly ?? '',getWorkspaceCurrency($super_settings), true)}}/{{__('month')}}
                                </h2>
                            @elseif($subscription_plan->price_yearly && $subscription_plan->price_yearly > 0)

                                <h2 class="mb-9 text-[28px] font-semibold {{$subscription_plan->is_featured ? 'text-white' : 'text-primary'}}">
                                    {{formatCurrency($subscription_plan->price_yearly ?? '',getWorkspaceCurrency($super_settings), true)}}/{{__('year')}}
                                </h2>

                            @endif



                            @if(!empty($subscription_plan->features))
                                <div class="mb-10">
                                    @foreach($subscription_plan->features as $feature)
                                        <p class="mb-1 text-base font-medium leading-loose {{$subscription_plan->is_featured ? 'text-white' : 'text-body-color'}}">{{$feature}}</p>
                                    @endforeach
                                </div>
                            @endif


                            <div class="w-full">
                                <a href="#signup" class="{{$subscription_plan->is_featured ? 'inline-block rounded-full border border-white bg-white py-4 px-11 text-center text-base font-medium text-dark transition duration-300 ease-in-out hover:border-dark hover:bg-dark hover:text-white' : 'inline-block rounded-full border border-[#D4DEFF] bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white'}}">
                                    {{__('Free Trial')}}
                                </a>
                            </div>
                            <span class="absolute left-0 bottom-0 z-[-1] block h-14 w-14 rounded-tr-full bg-primary">
              </span>
                        </div>
                    </div>

                @endforeach


            </div>
        </div>
    </section>
    <!-- ====== Pricing Section End -->

    <!-- ====== Faq Section Start -->
    <section id="faq" class="relative z-20 overflow-hidden bg-[#f3f4ff] pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20"><span class="mb-2 block text-lg font-semibold text-primary">
                {{$post->settings['faq_section_name'] ?? __('FAQ')}}</span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
                            {{$post->settings['faq_section_title'] ?? ''}}
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            {{$post->settings['faq_section_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="-mx-4 flex flex-wrap">

                @if(!empty($post->settings['faq_questions']))
                    @foreach($post->settings['faq_questions'] as $key => $question)
                        <div class="w-full px-4 lg:w-1/2">
                            <div class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8">
                                <div class="faq-btn flex w-full items-center text-left">
                                    <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                        <svg
                                            width="17"
                                            height="10"
                                            viewBox="0 0 17 10"
                                            class="icon fill-current"
                                        >
                                            <path
                                                d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                                fill="#3056D3"
                                                stroke="#3056D3"
                                            />
                                        </svg>
                                    </div>
                                    <div class="w-full cursor-pointer">
                                        <h4 class="text-base font-semibold text-black sm:text-lg">
                                            {{$question}}
                                        </h4>
                                    </div>
                                </div>
                                <div class="faq-content hidden pl-[62px]">
                                    <p class="py-3 text-base leading-relaxed text-body-color">
                                        {{$post->settings['faq_answers'][$key] ?? ''}}
                                    </p>
                                </div>
                            </div>


                        </div>

                    @endforeach
                @endif


            </div>
        </div>

        <div class="absolute bottom-0 right-0 z-[-1]">
            <img src="{{config('app.url')}}/assets/images/website/pattern-3.svg">
        </div>
    </section>
    <!-- ====== Faq Section End -->

    <!-- ====== Testimonials Start ====== -->
    <section id="customers" class="pt-20 md:pt-[120px]">
        <div class="container px-4">

            <div class="flex flex-wrap">
                <div class="mx-4 w-full">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
                            {{$post->settings['testimonials_section_title'] ?? ''}}
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            {{$post->settings['testimonials_section_subtitle'] ?? ''}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">

                @if(!empty($post->settings['testimonials']))

                    @foreach($post->settings['testimonials'] as $key => $testimonial)

                        <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                            <div class="ud-single-testimonial mb-12 bg-white p-8 shadow-testimonial">
                                <div class="ud-testimonial-content mb-6">
                                    <p class="text-base tracking-wide text-body-color">
                                        {{$testimonial}}
                                    </p>
                                </div>
                                <div class="ud-testimonial-info flex items-center">
                                    <div class="ud-testimonial-meta">
                                        <h4 class="text-sm font-semibold">{{$post->settings['testimonials_author'][$key] ?? ''}}</h4>
                                        <p class="text-xs text-[#969696]">{{$post->settings['testimonials_author_title'][$key] ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif



            </div>

        </div>
    </section>
@endsection
