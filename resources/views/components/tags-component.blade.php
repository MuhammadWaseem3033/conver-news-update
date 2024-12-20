<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Tags</h3>
    </div>
    <div class="d-flex flex-wrap m-n1">
        @foreach ($allTags as $tag)
            <a href="{{ route('news.byTag', trim($tag)) }}"
                class="btn btn-sm btn-outline-secondary m-1">
                @if (trim($tag) !== '')
                    {{ trim($tag) }}
                @endif
            </a>
        @endforeach
        {{-- <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a> --}}
    </div>
</div>