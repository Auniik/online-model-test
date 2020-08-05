@if (filled($attachments))
    <ul class="list-group ml-lg-5">
        @foreach($attachments ?? [] as $attachment)
            <li class="list-group-item d-flex justify-content-between align-items-center
                                    file-item ">
                <a href="/{{$attachment->path}}" target="_blank">{{$attachment->name}}</a>

                <button data-url="{{route('attachments.destroy', $attachment)}}"
                        class="btn btn-sm btn-default delete-file" style="padding: 0"><i
                        class="fa fa-trash"></i></button>
            </li>
        @endforeach
    </ul>
@endif
