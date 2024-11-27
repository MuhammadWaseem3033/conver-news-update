@php
    $categories = \App\Models\Category::whereNull('parent_id')->with('subcategories', 'news')->has('news')->get();
    // Collect all tags from news and make them unique
    $allTags = $categories
        ->flatMap(function ($category) {
            return $category->news->pluck('tag');
        })
        ->filter()
        ->flatMap(function ($tag) {
            return explode(',', $tag);
        })
        ->map(function ($tag) {
            return trim($tag);
        })
        ->unique();

@endphp
<!-- Footer Start -->
<div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="{{ route('index') }}" class="text-decoration-none">
                <h1 class=" h4 text-uppercase mb-3" style="font-size: 1.6rem">Cover<span class="text-primary"> News </span>
                    Update</h1>
            </a>
            <p style="color:#000">Stay updated with the latest news, stories, and exclusive content. Cover News Update is
                your trusted source for timely and relevant news.</p>

            {{-- <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-youtube"></i></a>
            </div> --}}
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Categories</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach ($categories as $category)
                    <a href="{{ route('category', ['slug' => $category->slug, 'id' => $category->id]) }}"
                        class="btn btn-sm btn-outline-secondary m-1">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Tags</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach ($allTags as $tag)
                    <a href="{{ route('news.byTag', trim($tag)) }}" class="btn btn-sm btn-outline-secondary m-1">
                        @if (trim($tag) !== '')
                            {{ trim($tag) }}
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Pages</h4>
            <div class="d-flex flex-column justify-content-start font-weight-set">
                <a class="text-secondary" href="{{ route('contect.us') }}"><i
                        class="fa fa-angle-right text-dark mr-2"></i>Contact us</a>
                <a class="text-secondary mb-2" href="{{ route('about.us') }}"><i
                        class="fa fa-angle-right text-dark mr-2"></i>About us</a>
                <a class="text-secondary mb-2" href="{{ route('privacy.and.policy') }}"><i
                        class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                <a class="text-secondary mb-2" href="{{ route('terms.conditions') }}"><i
                        class="fa fa-angle-right text-dark mr-2"></i>Terms &
                    conditions</a>
                <a class="text-secondary mb-2" href="#"><i
                        class="fa fa-angle-right text-dark mr-2"></i>Advertise</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5">
    <p class="m-0 text-center" style="color:#000">
        &copy; <a class="font-weight-bold" href="{{ route('index') }}">CoverNewsUpdate</a>. All Rights Reserved.
        Designed by <a class="font-weight-bold"
            href="https://www.linkedin.com/in/muhammad-waseem-full-stack-laravel-developer/" target="_blank">Rana
            Waseem</a>
    </p>
</div>
<!-- Footer End -->
