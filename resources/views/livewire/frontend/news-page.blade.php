<div>
    <!-- Breadcrumb Start -->
    @include('components.breadcrumb')
    <!-- Breadcrumb End -->

    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h1 class="m-0 h3">All News</h1>
                {{-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> --}}
            </div>
            <div class="row">
                @foreach ($News as $item)
                    <div class="col-lg-3 py-3 my-3">
                        <div class="position-relative overflow-hidden shadow" style="height: 300px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $item->image) }}"
                                style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a class="text-primary" href="{{ route('category',['slug'=>$item->category->slug,'id'=>$item->category->id]) }}">{{ $item->category->name }}</a>
                                    <span class="px-1 text-white">/</span>
                                    <a class="text-white" href="">{{ $item->created_at->format('F d, Y') }}</a>
                                </div>
                                <a class="h4 m-0 text-white" href="{{ route('single.news',$item->slug) }}">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
