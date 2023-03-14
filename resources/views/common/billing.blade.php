<div class="row mb-6">

    @foreach($subscription_plans as $subscription_plan)

        <div class="col-xl-4">

            <!-- Card -->
            <div class="card border-0 py-6 px-4 mb-6 mb-xl-3 {{$subscription_plan->is_featured ? 'text-bg-primary' : ''}} ">
                <div class="card-body">
                    <h2 class="card-title h4 text-uppercase {{$subscription_plan->is_featured ? 'text-white' : ''}} text-secondary text-center mb-3">{{$subscription_plan->name}}</h2>

                    @if($subscription_plan->price_monthly && $subscription_plan->price_monthly > 0)
                        <h3 class="card-text display-3 {{$subscription_plan->is_featured ? 'text-white' : ''}} text-center">
                            {{formatCurrency($subscription_plan->price_monthly ?? '',getWorkspaceCurrency($super_settings), true)}} <span class="fs-3 fw-normal {{$subscription_plan->is_featured ? 'text-white' : 'text-secondary'}}">/{{__('month')}}</span>
                        </h3>
                    @elseif($subscription_plan->price_yearly && $subscription_plan->price_yearly > 0)

                        <h3 class="card-text display-3 {{$subscription_plan->is_featured ? 'text-white' : ''}} text-center">
                            {{formatCurrency($subscription_plan->price_yearly ?? '',getWorkspaceCurrency($super_settings), true)}} <span class="fs-3 fw-normal {{$subscription_plan->is_featured ? 'text-white' : 'text-secondary'}}">/{{__('year')}}</span>
                        </h3>

                    @endif

                    @if($subscription_plan->price_yearly && $subscription_plan->price_yearly > 0)

                        <h5 class="text-center {{$subscription_plan->is_featured ? 'text-white' : ''}} mb-4">{{formatCurrency($subscription_plan->price_yearly ?? '',getWorkspaceCurrency($super_settings), true)}} <span class="text-muted">/{{__('year')}}</span></h5>

                    @endif


                    <div class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{__('Subscribe')}}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{$base_url}}/office/subscribe/{{$subscription_plan->uuid}}?term=monthly">{{__('Pay Monthly')}}</a></li>
                                <li><a class="dropdown-item" href="{{$base_url}}/office/subscribe/{{$subscription_plan->uuid}}?term=yearly">{{__('Pay Yearly')}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <ul class="list-unstyled mb-7">

                        @if(!empty($subscription_plan->features))
                            @foreach($subscription_plan->features as $feature)
                                <li class="mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12" class="me-2 {{$subscription_plan->is_featured ? 'text-white' : 'text-primary'}}"><path d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z" style="fill: currentColor"></path></svg>
                                    {{$feature}}
                                </li>
                            @endforeach
                        @endif


                    </ul>

                </div>
            </div>
        </div>

    @endforeach


</div>
