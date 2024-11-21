@foreach ($TrandingNews as $item)
    <div class="d-flex mb-3">
        <img src="{{ asset('storage/' . $item->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
            <div class="mb-1" style="font-size: 13px;">
                <a
                    href="{{ route('category', ['slug' => $item->category->slug, 'id' => $item->category->id]) }}">{{ $item->category->name }}</a>
                <span class="px-1 text-dark">/</span>
                <span class="text-dark">{{ $item->created_at->format('F d, Y') }}</span>
            </div>
            <a class="h6 m-0" href="{{ route('single.news', $item->slug) }}">{{ $item->title }}</a>
        </div>
    </div>
@endforeach
