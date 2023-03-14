<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <form novalidate="novalidate" method="post" action="{{route('super-admin.save-user')}}" id="form-user" data-form="{{$base_url}}/super-admin/settings?tab=users" data-btn-id="btn-save-user">

                    <h4>{{__('Details')}}</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name">{{__('First Name')}}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$current_user->first_name ?? ''}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name">{{__('Last Name')}}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$current_user->last_name ?? ''}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$current_user->email ?? ''}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone">{{__('Phone')}}</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$current_user->phone ?? ''}}">
                    </div>

                    <div class="mb-3">
                        <label for="password">{{__('Password')}}</label>
                        <input type="password" class="form-control" id="password" name="password" value="" @if(empty($current_user)) required @endif>
                        @if(!empty($current_user))
                            <span class="text-muted">{{__('Keep this field blank not to change the password. ')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation">{{__('Confirm Password')}}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="" @if(empty($current_user)) required @endif>
                    </div>

                    @if(!empty($current_user))
                        <input type="hidden" name="current_user" value="{{$current_user->uuid}}">
                    @endif


                    <button type="submit" class="btn btn-primary" id="btn-save-user">{{__('Save')}}</button>

                </form>
            </div>
        </div>
    </div>
</div>
