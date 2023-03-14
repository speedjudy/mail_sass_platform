<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="fs-5">{{__('Recent Documents')}}</h1>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_document">
            {{__('New Document')}}
        </button>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        @foreach($recent_documents as $recent_document)
            <div class="col-md-3">
                <a href="{{$base_url}}/office/document?uuid={{$recent_document->uuid}}">
                    <div class="card">
                        <div class="card-body p-2 text-dark">
                            <div class="mb-2 fw-bold">{{$recent_document->title}}</div>
                            <div>
                                <div class="mb-1"><span class="text-muted">{{__('Last Open')}}:</span> {{$recent_document->last_opened_at->diffForHumans()}}</div>
                                @if(!empty($users[$recent_document->user_id]))
                                    <div><span class="text-muted">{{__('By')}}:</span> {{$users[$recent_document->user_id]->first_name}} {{$users[$recent_document->user_id]->last_name}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
