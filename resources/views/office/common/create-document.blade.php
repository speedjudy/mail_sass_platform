<div class="modal fade" id="create_document">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{__('New Document')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form novalidate="novalidate" method="post" action="{{route('office.save-document')}}" id="form-document" data-form="redirect" data-btn-id="btn-save-document">

                    <div class="mb-3">
                        <label for="input_title">{{__('Title')}}</label>
                        <input type="text" class="form-control" required id="input_title" name="title">
                    </div>

                    <input type="hidden" name="type" value="word">

                    <button type="submit" class="btn btn-primary" id="btn-save-document">{{__('Save')}}</button>

                </form>
            </div>
        </div>
    </div>
</div>
