<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-paypal" aria-controls="navs-paypal" aria-selected="true">{{__('PayPal')}}</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-stripe" aria-controls="navs-stripe" aria-selected="false">{{__('Stripe')}}</button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="navs-paypal" role="tabpanel">
            <form novalidate="novalidate" method="post" action="{{route('super-admin.save-payment-gateway')}}" id="form-paypal" data-form="refresh" data-btn-id="btn-save-paypal-gateway">

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" value="1" id="paypal_gateway_enabled" {{($gateways['paypal']->is_active ?? false) ? 'checked': '' }} >
                        <label class="form-check-label" for="paypal_gateway_enabled">{{__('Enabled?')}}</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="paypal_gateway_name">{{__('Gateway Name')}}</label>
                    <input name="name" class="form-control" id="paypal_gateway_name" value="{{$gateways['paypal']->name ?? __('PayPal')}}">
                </div>

                <div class="mb-3">
                    <label for="paypal_public_key">{{__('Paypal Client ID')}}</label>
                    <input name="api_key" class="form-control" id="paypal_public_key" value="{{$gateways['paypal']->api_key ?? ''}}">
                </div>

                <div class="mb-3">
                    <label for="paypal_private_key">{{__('Paypal Client Secret')}}</label>
                    <input type="password" name="api_secret" id="paypal_private_key" class="form-control" value="{{$gateways['paypal']->api_secret ?? ''}}">
                </div>

                <input type="hidden" name="api_name" value="paypal">

                <button type="submit" class="btn btn-primary" id="btn-save-paypal-gateway">{{__('Save')}}</button>

            </form>
        </div>
        <div class="tab-pane fade" id="navs-stripe" role="tabpanel">
            <form novalidate="novalidate" method="post" action="{{route('super-admin.save-payment-gateway')}}" id="form-stripe" data-form="refresh" data-btn-id="btn-save-stripe-gateway">

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" value="1" id="stripe_gateway_enabled" {{($gateways['stripe']->is_active ?? false) ? 'checked': '' }} >
                        <label class="form-check-label" for="stripe_gateway_enabled">{{__('Enabled?')}}</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="stripe_gateway_name">{{__('Gateway Name')}}</label>
                    <input name="name" class="form-control" id="stripe_gateway_name" value="{{$gateways['stripe']->name ?? __('Stripe')}}">
                </div>

                <div class="mb-3">
                    <label for="stripe_public_key">{{__('Public Key')}}</label>
                    <input name="api_key" class="form-control" id="stripe_public_key" value="{{$gateways['stripe']->api_key ?? ''}}">
                </div>

                <div class="mb-3">
                    <label for="stripe_private_key">{{__('Private Key')}}</label>
                    <input type="password" name="api_secret" id="stripe_private_key" class="form-control" value="{{$gateways['stripe']->api_secret ?? ''}}">
                </div>

                <input type="hidden" name="api_name" value="stripe">

                <button type="submit" class="btn btn-primary" id="btn-save-stripe-gateway">{{__('Save')}}</button>

            </form>
        </div>
    </div>
</div>
