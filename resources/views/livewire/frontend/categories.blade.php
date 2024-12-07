<div>

    {{-- @dd($categories) --}}
    {{-- @dd($subcategories) --}}
    <!-- Breadcrumb Start -->
    @include('components.breadcrumb')
    <!-- Breadcrumb End -->
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ $currentCategory->name }}</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none"
                                    href="{{ route('category', ['slug' => $currentCategory->slug, 'id' => $currentCategory->id]) }}">View
                                    All</a>
                            </div>
                        </div>
                        {{-- @dd($currentCategory) --}}
                        @if ($currentCategory->parent_id == null)
                            @foreach ($categories as $category)
                                @foreach ($category->news->sortByDesc('created_at')->take(4) as $item)
                                    {{-- @dd($item) --}}
                                    <div class="col-lg-6">
                                        <div class="position-relative mb-3">
                                            <img class="img-fluid w-100" src="{{ asset('storage/' . $item->image) }}"
                                                style="object-fit: cover;">
                                            <div class="overlay position-relative bg-light">
                                                <div class="mb-2" style="font-size: 14px;">
                                                    <a
                                                        href="{{ route('category', ['slug' => $category->id, 'id' => $category->id]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                    <span class="px-1 text-dark">/</span>
                                                    <span class="text-dark">
                                                        {{ $item->created_at->format('F d, Y') }}
                                                    </span>
                                                </div>
                                                <a class="h4"
                                                    href="{{ route('single.news', $item->slug) }}">{{ $item->title ?? 'coming soon .......' }}
                                                </a>
                                                <p class="m-0">{{ $item->meta_description ?? 'coming soon...' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- ads hare --}}
                            @endforeach
                        @else
                            {{-- $subcategories --}}
                            @foreach ($subcategories as $category)
                                @foreach ($category->news as $item)
                                    <div class="col-lg-6">
                                        <div class="position-relative mb-3">
                                            <img class="img-fluid w-100" src="{{ asset('storage/' . $item->image) }}"
                                                style="object-fit: cover;">
                                            <div class="overlay position-relative bg-light">
                                                <div class="mb-2" style="font-size: 14px;">
                                                    <a
                                                        href="{{ route('category', ['slug' => $category->id, 'id' => $category->id]) }}">{{ $category->name }}</a>
                                                    <span class="px-1 text-dark">/</span>
                                                    <span class="text-dark">
                                                        {{ $item->created_at->format('F d, Y') }}</span>
                                                </div>
                                                <a class="h4"
                                                    href="{{ route('single.news', $item->slug) }}">{{ $item->title }}</a>
                                                <p class="m-0">{{ $item->meta_description ?? 'coming soon ....' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- ads hare --}}
                            @endforeach
                        @endif

                    </div>
                    {{-- ads hare  --}}
                    @include('components.Ads.headerAds')

                    <div class="row">
                        @if ($currentCategory->parent_id == null)
                            @foreach ($categories as $category)
                                @foreach ($category->news as $item)
                                    <div class="col-lg-6">
                                        <div class="d-flex mb-3">
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                                style="height: 100px;">
                                                <div class="mb-1" style="font-size: 13px;">
                                                    <a
                                                        href="{{ route('category', ['slug' => $category->id, 'id' => $category->id]) }}">{{ $category->name }}</a>
                                                    <span class="px-1 text-dark">/</span>
                                                    <span
                                                        class="text-dark">{{ $item->created_at->format('F d, Y') }}</span>
                                                </div>
                                                <a class="h6 m-0"
                                                    href="{{ route('single.news', $item->slug) }}">{{ $item->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($subcategories as $category)
                                @foreach ($category->news as $item)
                                    <div class="col-lg-6">
                                        <div class="d-flex mb-3">
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                                style="height: 100px;">
                                                <div class="mb-1" style="font-size: 13px;">
                                                    <a
                                                        href="{{ route('category', ['slug' => $category->id, 'id' => $category->id]) }}">{{ $category->name }}</a>
                                                    <span class="px-1 text-dark">/</span>
                                                    <span
                                                        class="text-dark">{{ $item->created_at->format('F d, Y') }}</span>
                                                </div>
                                                <a class="h6 m-0"
                                                    href="{{ route('single.news', $item->slug) }}">{{ $item->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                            {{-- <div class="col-lg-6">
                            <div class="d-flex mb-3">
                                <img src="{{ asset('frontend/img/news-100x100-1.jpg') }}"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                    style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Technology</a>
                                        <span class="px-1">/</span>
                                        <span>January 01, 2045</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>                         --}}
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                @include('components.layouts.sidebar')

            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
</div>
