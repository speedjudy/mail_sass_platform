@switch($share->type)

    @case('image')

        @if($share->extension)

            @switch($share->extension)

                @case('jpg')
                @case('jpeg')
                @case('png')
                @case('gif')
                    <img alt="{{$share->title}}" src="{{config('app.url')}}/uploads/{{$share->path}}" class="img-fluid">
                    @break


            @endswitch


        @endif

        @break

    @case('video')

        @if($share->extension)

            @switch($share->extension)

                @case('mp4')
                @case('webm')
                @case('ogg')

                    <video class="img-fluid rounded-3" controls>
                        <source src="{{config('app.url')}}/uploads/{{$share->path}}" type="video/{{$share->extension}}">
                    </video>

                    @break

            @endswitch

        @endif

        @break

    @case('url')

        <a href="{{$share->url}}" target="_blank">{{$share->url}}</a>

        @break

    @case('text_snippet')

        <pre>{{$share->content}}</pre>

        @break

    @default

        <div class="text-center">
            <a class="btn btn-lg btn-primary" href="{{$base_url}}/office/download-shared-file/{{$share->uuid}}">{{__('Download')}}</a>
        </div>

    @break

@endswitch
