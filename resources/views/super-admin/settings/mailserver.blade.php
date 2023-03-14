<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form novalidate="novalidate" method="post" action="{{route('office.save-settings')}}" id="form-MailApi"
                data-form="refresh" data-btn-id="btn-save-contact">

                    <h4>{{ __('Mail Server API Connection') }}</h4>

                    <div class="mb-3">
                        <label for="mailserver_hostname" class="form-label">{{ __('Mail Server Hostname') }}</label>
                        <input type="text" class="form-control" id="mailserver_hostname" name="mailserver_hostname"
                            value="" placeholder="mx.mailbux.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">{{ __('Username') }}</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="" placeholder="Mail Server Username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Mail Server Password" required />
                    </div>

                    <div class="mb-3">
                        <label for="apiToken" class="form-label">{{ __('API Token') }}</label>
                        <input type="text" class="form-control" id="apiToken" placeholder="Auth Token"
                            value=""
                            disabled />
                    </div>

                    <button type="submit" class="btn btn-primary" id="btn-get-authToken">{{ __('Get Token') }}</button>

                </form>
            </div>
        </div>
    </div>
</div>
