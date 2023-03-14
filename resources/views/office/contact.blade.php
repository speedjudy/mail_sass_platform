@extends('office.layout')
@section('title',__('Contact'))
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form novalidate="novalidate" method="post" action="{{route('office.contact')}}" id="form-contact" data-form="redirect" data-btn-id="btn-save-contact">

                        <h4>{{__('Contact Details')}}</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name">{{__('First Name')}}</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$contact->first_name ?? ''}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name">{{__('Last Name')}}</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$contact->last_name ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$contact->title ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$contact->email ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="phone">{{__('Phone')}}</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$contact->phone ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="address">{{__('Address')}}</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$contact->address ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="city">{{__('City')}}</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$contact->city ?? ''}}">
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="state">{{__('State')}}</label>
                                    <input type="text" class="form-control" id="state" name="state" value="{{$contact->state ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="zip">{{__('Zip')}}</label>
                                    <input type="text" class="form-control" id="zip" name="zip" value="{{$contact->zip ?? ''}}">
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="notes">{{__('Notes')}}</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3">{{$contact->notes ?? ''}}</textarea>
                        </div>

                        <input type="hidden" name="uuid" value="{{$contact->uuid ?? ''}}">

                        <button type="submit" class="btn btn-primary" id="btn-save-contact">{{__('Save')}}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
