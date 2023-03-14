<div class="modal fade action-sheet" id="add_event_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Add Event')}}</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form_save_event">


                    <div class="mb-3">
                        <label for="input_title">{{__('Title')}}</label>
                        <input type="text" name="title" id="input_title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="input_start">{{__('Start')}}</label>
                        <input type="datetime-local" name="start" id="input_start" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="input_end">{{__('End')}}</label>
                        <input type="datetime-local" name="end" id="input_end" class="form-control">
                    </div>

                    <div class="mb-3">
                        <div class="form-check mb-1">
                            <input type="checkbox" class="form-check-input" id="event_all_day" name="all_day" value="1">
                            <label class="form-check-label" for="event_all_day">{{__('All day event?')}}</label>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <input type="hidden" name="id" id="input_event_id" value="">
                        <button type="submit" id="btn_save_event" class="btn btn-primary">{{__('Save')}}</button>
                        <a href="#" id="btn_delete_event" class="btn btn-danger d-none">{{__('Delete')}}</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
