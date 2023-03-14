<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h4>{{config('app.name')}}</h4>
                <p>{{__('App Version')}}: {{config('app.version')}}</p>
                <p>{{__('Running on')}}: {{__('PHP')}}-{{PHP_VERSION ?? ''}}</p>
            </div>
        </div>
    </div>
</div>
