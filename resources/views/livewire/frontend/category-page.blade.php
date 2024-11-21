<div>
    <!-- Breadcrumb Start -->
    @include('components.breadcrumb')
    <!-- Breadcrumb End -->
    <div class="container-fluid py-3">
        <div class="container mt-3">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h1 class="m-0 h3">All News Category</h1>
                {{-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> --}}
            </div>
            <div class="row">
                @foreach ($Categories as $item)
                    <div class="col-lg-4">
                        <div class="d-flex mb-3">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                style="height: 60px;border-radius:10px">
                                <h1 class="h3 text-center m-4">
                                    <a class="text-dark"
                                        href="{{ route('category', ['slug' => $item['slug'], 'id' => $item['id']]) }}">{{ $item['name'] }}</a>
                                </h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container my-5">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h1 class="m-0 h3"> All News Sub Category</h1>
                {{-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> --}}
            </div>
            <div class="row">
                @foreach ($Categories as $item)
                    @foreach ($item['subcategories'] as $item)
                        <div class="col-lg-4">
                            <div class="d-flex mb-3">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                    style="height: 60px;border-radius:10px">
                                    <h1 class="h3 text-center m-4">
                                        <a class="text-dark"
                                            href="{{ route('category', ['slug' => $item['slug'], 'id' => $item['id']]) }}">{{ $item['name'] }}</a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
