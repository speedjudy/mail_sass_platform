@section('head')
    @if(!empty($payment_gateways['stripe']) && !empty($payment_gateways['stripe']->api_key))
        <script src="https://js.stripe.com/v3/"></script>
    @endif
    @if(!empty($payment_gateways['paypal']) && !empty($payment_gateways['paypal']->api_key && !empty($subscription_plan->paypal_plan_id)))
        <script src="https://www.paypal.com/sdk/js?client-id={{$payment_gateways['paypal']->api_key}}&vault=true&intent=subscription"></script>
    @endif
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <h4>{{$subscription_plan->name}}</h4>

                    @if(empty($payment_gateways))
                        <div class="alert alert-warning">
                            {{__('No payment gateway is configured.')}}
                        </div>
                    @endif

                        @if(!empty($payment_gateways['stripe']) && !empty($payment_gateways['stripe']->api_key))
                            <div class="mb-4">
                                <h5>{{__('Pay with Credit or Debit Card')}}</h5>
                                <form action="{{$base_url}}/office/payment-stripe" method="post" id="payment-form">
                                    <div class="form-row">
                                        <label for="card-element">
                                            {{__('Credit or debit card')}}
                                        </label>
                                        <div id="card-element" class="form-control">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>

                                    <input type="hidden" name="plan_id" value="{{$subscription_plan->uuid}}">
                                    <input type="hidden" name="term" value="{{$term}}">

                                    @csrf

                                    <button class="btn btn-primary mt-4" id="btnStripeSubmit">{{__('Submit Payment')}}</button>

                                </form>
                            </div>
                        @endif

                        @if(!empty($payment_gateways['paypal']) && !empty($payment_gateways['paypal']->api_key))
                            <div class="mb-4">
                                <h5>{{__('Pay with PayPal')}}</h5>
                                <div id="paypal-button-container"></div>
                            </div>
                        @endif


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
                @if(!empty($payment_gateways['stripe']) && !empty($payment_gateways['stripe']->api_key))
                // Dynamic JS for Stripe
                const stripe = Stripe('{{$payment_gateways['stripe']->api_key}}');
                const elements = stripe.elements();
                const style = {
                    base: {
                        color: '#32325d',
                        lineHeight: '18px',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };
                const card = elements.create('card', {style: style});
                card.mount('#card-element');
                card.addEventListener('change', function (event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });
                const form = document.getElementById('payment-form');
                const btnStripeSubmit = document.getElementById('btnStripeSubmit');

                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    btnStripeSubmit.disabled = true;
                    stripe.createToken(card).then(function (result) {
                        if (result.error) {
                            // Inform the user if there was an error.
                            let errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                            btnStripeSubmit.disabled = false;
                        } else {
                            // Send the token to your server.
                            stripeTokenHandler(result.token);

                        }
                    });
                });

                function stripeTokenHandler(token) {
                    let hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'token_id');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }

                @endif

                @if(!empty($payment_gateways['paypal']) && !empty($payment_gateways['paypal']->api_key && !empty($subscription_plan->paypal_plan_id)))
                paypal.Buttons({
                    createSubscription: function(data, actions) {
                        return actions.subscription.create({
                            'plan_id': '{{$subscription_plan->paypal_plan_id}}' // Creates the subscription
                        });
                    },
                    onApprove: function(data, actions) {
                        window.location = '{{$base_url}}/office/validate-paypal-subscription?subscription_id=' + data.subscriptionID;
                    }
                }).render('#paypal-button-container'); // Renders the PayPal button
                @endif

            });
        })();
    </script>
@endsection
