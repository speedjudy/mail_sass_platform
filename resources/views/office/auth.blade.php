@extends('layouts.base')
@section('base_content')
    <div class="container">
        <div class="card mx-auto max-width-450 mt-5">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="{{$base_url}}" class="app-brand-link gap-2 mb-3">
                        @if(!empty($settings['logo']))
                            <img src="{{config('app.url')}}/uploads/{{$settings['logo']}}" alt="{{$settings['workspace_name'] ?? config('app.name')}}" class="max-height-45 py-1 my-1">
                        @else
                            <img src="{{config('app.url')}}/uploads/system/logo.png" alt="{{$settings['workspace_name'] ?? config('app.name')}}" class="max-height-45 py-1 my-1">
                        @endif
                    </a>
                </div>

                @switch($type)

                    @case('login')
                    @case('super_admin_login')

                        <h4 class="mb-2 text-center">{{ __('Hey, Welcome!') }}</h4>
                        <p class="mb-2 text-center">{{ __('Sign in to continue.') }}</p>

                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif

                        <form novalidate="novalidate" method="post" action="{{$base_url}}/office/login" id="form-auth" data-form="{{$base_url}}{{($type == 'login') ? '/office/dashboard' : '/super-admin/dashboard'}}" data-btn-id="btn-auth">

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" required/>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" required/>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" id="btn-auth" type="submit">{{ __('Sign In') }}</button>
                            </div>

                        </form>

                        <div class="mt-4">
                            <a href="{{$base_url}}/office/forgot-password">{{ __('Forgot Password?') }}</a>
                        </div>

                        @if(config('app.env') === 'demo')
                            <div class="my-3">
                                <a href="{{$base_url}}/office/automatic-login/admin" class="btn btn-primary d-grid w-100 mt-4" id="btn-auth" type="submit">{{ __('Demo Login') }}</a>
                            </div>
                        @endif

                    @break

                    @case('signup')

                        <h3 class="mb-2">{{ __('Get Started') }}</h3>
                        <p class="mb-4">{{ __('Create an account to continue.') }}</p>

                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif

                        <form novalidate="novalidate" method="post" action="{{$base_url}}/signup" id="form-auth" data-form="{{$base_url}}/office/dashboard" data-btn-id="btn-auth">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" required/>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" required/>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required/>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" id="btn-auth" type="submit">{{ __('Create Account') }}</button>
                            </div>

                        </form>

                        <div class="mt-4">
                            <a href="{{$base_url}}/office/login">{{ __('Already have an account?') }}</a>
                        </div>



                        @break

                    @case('forgot_password')

                        <h4 class="mb-2 text-center">{{ __('Forgot Password') }}</h4>
                        <p class="mb-2 text-center">{{ __('Enter your email address and we will send you a link to reset your password.') }}</p>

                        <form novalidate="novalidate" method="post" action="{{$base_url}}/office/forgot-password" id="form-auth" data-form="{{$base_url}}/office/login" data-btn-id="btn-auth">

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" required/>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" id="btn-auth" type="submit">{{ __('Send Password Reset Link') }}</button>
                            </div>

                        </form>

                        @break

                    @case('password_reset')

                        <h4 class="mb-2 text-center">{{ __('Set new password') }}</h4>

                        <form novalidate="novalidate" method="post" action="{{$base_url}}/office/password-reset" id="form-auth" data-form="{{$base_url}}/office/login" data-btn-id="btn-auth">

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" required/>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required/>
                            </div>

                            <input type="hidden" name="token" value="{{$token}}">
                            <input type="hidden" name="uuid" value="{{$uuid}}">

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" id="btn-auth" type="submit">{{ __('Save') }}</button>
                            </div>

                        </form>

                        @break

                @endswitch



            </div>
        </div>
    </div>
@endsection
