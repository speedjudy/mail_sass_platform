@extends('office.layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form novalidate="novalidate" method="post" action="{{route('office.save-settings')}}" id="form-contact" data-form="{{$base_url}}/office/mail-api/" data-btn-id="btn-save-contact">

                        <h4>{{__('Your API Details')}}</h4>

                        <div class="mb-3">
                            <label for="api_name">{{__('Username(DomainAdmin)')}}</label>
                            <input type="text" class="form-control" id="api_name" disabled name="name" value="{{$api->name ?? 'testing4'}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="api_key">{{__('Password')}}</label>
                            <input type="text" id="api_password" class="form-control" value="{{$api->key ?? '@@1020304050@@aA'}}">
                        </div>

                        <div class="mb-3">
                            <label for="api_key">{{__('Token')}}</label>
                            <input type="text" id="api_token" class="form-control" disabled value="{{$api->key ?? 'Woy1D6tHXVc1heFmzDnSZ5svoR81IbW5fxbA2lZq'}}">
                            <code>Available for 24 hours, auto regenerated</code>
                        </div>

                        <input type="hidden" name="uuid" value="{{--$api->uuid--}}">
                        <input type="hidden" name="type" value="api-key">


                        <div class="d-flex justify-content-between align-items-center mb-3">
                                <button type="button" class="btn btn-primary" id="btn-save-password-api">
                                   Save
                                </button>
                            <div>
                                 <button type="submit" class="btn" id="btn-regenerate-api">{{__('Regenerate token')}}</button>
                            </div>
                        </div>
                       

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                     <h4>{{__('API Docs')}}</h4>
                    <strong>{{__('Link')}}:</strong> <code><a href="https://mailbux.com/help/hosted-email/api/v1/index.htm" target="_blank">https://mailbux.com/help/hosted-email/api/v1/index.htm</a></code>
                    <hr/>
                    <h4>{{__('Sample API Request - Obtain authorization')}} <a href="https://mailbux.com/help/hosted-email/api/v1/auth_post/index.htm" target="_blank">(Reference)</a></h4>
                    <strong>{{__('POST Request')}}:</strong> <code>https://mx.mailbux.com/api/v1/auth/</code>
                  
                    <p class="mt-3">{{__('Parameters')}}</p>
                    <ul>
                        <li><code>username(Required)</code> - <code>testing4</code></li>
                        <li><code>password(Required)</code> - @1020304050@@aA</li>
                        <li><code>otp(Optional)</code> - one time password</li>
                    </ul>
                     <strong>{{__('Example request (curl)')}}:</strong> <code>curl -X POST https://mx.mailbux.com/api/v1/auth/ -d '{ "username" : "testing4", "@1020304050@aA" : "2xtoC5UGjMNieTBpGsAO" }' -H "Content-Type: application/json"</code><br/><br/>
                    <strong>{{__('Response')}}:</strong>
                    <code>
                        {'auth': {'auth_token': 'Woy1D6tHXVc1heFmzDnSZ5svoR81IbW5fxbA2lZq',
                              'message': 'Successfully logged in',
                              'perm_level': 'DomainAdmin',
                              'status': 'success',
                              'username': 'testing4',
                              'valid_from': 1582536047,
                              'valid_to': 1582622447}}   
                    </code>
                    <hr/>
                    <h4>{{__('Sample API Request - Adding Domain')}} <a href="https://mailbux.com/help/hosted-email/api/v1/domains_post/index.htm" target="_blank">(Reference)</a></h4>
                    <strong>{{__('POST Request')}}:</strong> <code>https://mx.mailbux.com/api/v1/domains/</code>
                  
                    <p class="mt-3">{{__('Parameters')}}</p>
                    <ul>
                        <li><code>domain(Required)</code> - <code>your-domain.com</code></li>

                    </ul>
                     <strong>{{__('Example request (Python)')}}:</strong> <code>import requests<br/>
                        import json<br/>
                        from pprint import pprint<br/><br/>

                        url = "https://mx.mailbux.com/api/v1/domains/"<br/>
                        data = {<br/>
                        "domain" : "your-domain.com"<br/>
                        }<br/>
                        r = requests.post(url, json=data, auth=("testing4","Woy1D6tHXVc1heFmzDnSZ5svoR81IbW5fxbA2lZq"))<br/>
                        try:<br/>
                            pprint(r.json())<br/>
                        except: <br/>
                            print(r.text)</code><br/><br/>
                    <strong>{{__('Response')}}:</strong>
                    <code>
                       {'domain': 'your-domain.com',
 'expire_time': 1583548002,
 'status': 'pending_verification',
 'verification_code': 'nms-domain-verification=173121280786',
 'verification_type': 'DNS TXT'}
                    </code>
                </div>
            </div>
        </div>
    </div>
@endsection
