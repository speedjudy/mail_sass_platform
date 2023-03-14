<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form novalidate="novalidate" method="post" action="{{route('office.save-settings')}}" id="form-contact" data-form="refresh" data-btn-id="btn-save-contact">

                    <h4>{{__('OpenAI')}}</h4>

                    <div class="mb-3">
                        <label for="openai_api_key">{{__('OpenAI API Key')}}</label>
                        <input type="text" class="form-control" id="openai_api_key" name="openai_api_key" value="{{$settings['openai_api_key'] ?? ''}}">
                    </div>

                    <input type="hidden" name="type" value="integrations_openai">

                    <button type="submit" class="btn btn-primary" id="btn-save-contact">{{__('Save')}}</button>

                </form>
            </div>
        </div>
    </div>
</div>
