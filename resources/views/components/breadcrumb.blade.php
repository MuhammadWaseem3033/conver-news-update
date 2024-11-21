<div class="container-fluid">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb bg-transparent m-0 p-0">
            @php
                $breadcrumbs = generateBreadcrumbs();
            @endphp
            @foreach ($breadcrumbs as $key => $breadcrumb)
                @if ($key + 1 < count($breadcrumbs))
                    <a class="breadcrumb-item" href="{{ $breadcrumb['url'] }}">
                        {{ $breadcrumb['label'] }}
                    </a>
                @else
                    <span class="breadcrumb-item active">{{ $breadcrumb['label'] }}</span>
                @endif
            @endforeach
            {{-- <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Category</a>
            <span class="breadcrumb-item active">{{ $currentCategory->name }}</span> --}}
        </nav>
    </div>
</div>