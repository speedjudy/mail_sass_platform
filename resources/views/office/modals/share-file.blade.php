<h5>{{__('Share')}}</h5>

<div class="mb-3">
    <input class="form-control" id="input-copy-value" value="{{$base_url}}/office/view/file/{{$media_file->uuid}}?access_key={{$media_file->access_key}}">
</div>

<button type="button" data-modal-copy-to-clipboard="input-copy-value" class="btn btn-primary">{{__('Copy URL')}}</button>
<a href="{{$base_url}}/office/view/file/{{$media_file->uuid}}?access_key={{$media_file->access_key}}" target="_blank" class="btn btn-primary">{{__('Open')}}</a>
