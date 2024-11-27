<div>
    <!-- Breadcrumb Start -->
    @include('components.breadcrumb')
    <!-- Breadcrumb End -->

    {{-- @dd($Categories) --}}
    <!-- Top News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @foreach ($Categories as $Category)
                    @foreach ($Category->news->sortByDesc('created_at')->take(7) as $item)
                        <div class="d-flex">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                style="width: 80px; height: 80px; object-fit: cover;">
                            <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                                <a class="text-secondary font-weight-semi-bold"
                                    href="{{ route('single.news', $item->slug) }}">
                                    {{ $item->title }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <!-- Top News Slider End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @foreach ($Categories as $Category)
                            @foreach ($Category->news->sortByDesc('created_at')->take(10) as $item)
                                <div class="position-relative overflow-hidden" style="height: 435px;">
                                    <img class="img-fluid h-100" src="{{ asset('storage/' . $item->image) }}"
                                        style="object-fit: cover;">
                                    <div class="overlay">
                                        <div class="mb-1">
                                            <a class="text-white"
                                                href="{{ route('category', ['slug' => $Category->slug, 'id' => $Category->id]) }}">Technology</a>
                                            <span class="px-2 text-white">/</span>
                                            <a class="text-white"
                                                href="">{{ $item->created_at->diffForHumans() }}</a>
                                        </div>
                                        <a class="h2 m-0 text-white font-weight-bold"
                                            href="{{ route('single.news', $item->slug) }}">{{ $item->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-4 bg-light">
                    @php
                        $CategoriesToShow = $Categories->take(5);
                        $RemainingCategories = $Categories->skip(5);
                    @endphp
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="javascript::void()"
                            id="readMoreButton">View More</a>
                    </div>
                    @foreach ($CategoriesToShow as $Category)
                        <div class="position-relative overflow-hidden mb-3 bg-primary"
                            style="height: 50px; background-color:#f88133;border-radius:5px;">
                            {{-- <img class="img-fluid w-100 h-100" src="{{ asset('frontend/img/cat-500x80-1.jpg') }}"
                            style="object-fit: cover;"> --}}
                            <h1 class="h5">
                                <a href="{{ route('category', ['slug' => $Category->slug, 'id' => $Category->id]) }}"
                                    class="overlay align-items-center justify-content-center m-0 py-2 text-white text-decoration-none">
                                    {{ $Category->name }}
                                </a>
                            </h1>
                        </div>
                    @endforeach
                    <div id="moreCategories"style="display: none;">
                        @foreach ($RemainingCategories as $Category)
                            <div class="position-relative overflow-hidden mb-3"
                                style="height: 50px; background-color:#ff6600;border-radius:5px;">
                                {{-- <img class="img-fluid w-100 h-100" src="{{ asset('frontend/img/cat-500x80-1.jpg') }}"
                                style="object-fit: cover;"> --}}
                                <h1 class="h5">
                                    <a href="{{ route('category', ['slug' => $Category->slug, 'id' => $Category->id]) }}"
                                        class="overlay align-items-center justify-content-center m-0 py-2 text-white text-decoration-none">
                                        {{ $Category->name }}
                                    </a>
                                </h1>
                            </div>
                        @endforeach
                    </div>
                    {{-- <!-- Read More button -->
                    @if ($Categories->count() > 5)
                        <div class="mb-3" style="height: 50px;background-color:#ff6600;border-radius:5px;">
                            <p id="readMoreButton" class="py-3 text-white font-bold align-items-center justify-content-center text-center">Read More
                            </p>
                        </div>
                    @endif --}}


                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    {{-- <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Featured</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('frontend/img/news-300x300-1.jpg') }}"
                        style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('frontend/img/news-300x300-2.jpg') }}"
                        style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('frontend/img/news-300x300-3.jpg') }}"
                        style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('frontend/img/news-300x300-4.jpg') }}"
                        style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('frontend/img/news-300x300-5.jpg') }}"
                        style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Featured News Slider End -->

    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @forelse ($Categories as $Category)
                    <div class="col-lg-6 py-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h1 class="m-0 h3">{{ $Category->name }}</h1>
                        </div>
                        <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                            @foreach ($Category->news as $News)
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{ asset('storage/' . $News->image) }}"
                                        style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 13px;">
                                            <a
                                                href="{{ route('category', ['slug' => $Category->slug, 'id' => $Category->id]) }}">{{ $Category->name }}</a>
                                            <span class="px-1 text-dark">/</span>
                                            <span class="text-dark">{{ $News->created_at->diffForHumans() }}</span>
                                        </div>
                                        <a class="h4 m-0"
                                            href="{{ route('single.news', $News->slug) }}">{{ $News->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    No Cateogry Found
                @endforelse

                {{-- <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Technology</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('frontend/img/news-500x280-4.jpg')}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('frontend/img/news-500x280-5.jpg')}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('frontend/img/news-500x280-6.jpg')}}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Category News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Popular</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>
                        </div>
                        @foreach ($PopularNews as $item)
                            <div class="col-lg-6">
                                <div class="d-flex mb-3">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a
                                                href="{{ route('category', ['slug' => $item->category->slug, 'id' => $item->category->id]) }}">{{ $item->category->name }}</a>
                                            <span class="px-1 text-dark">/</span>
                                            <span class="text-dark">{{ $item->created_at->format('F d, Y') }}</span>
                                        </div>
                                        <a class="h6 m-0"
                                            href="{{ route('single.news', $item->slug) }}">{{ $item->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="{{ asset('frontend/img/ads-700x70.jpg') }}"
                                alt=""></a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Latest</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>
                        </div>
                        @foreach ($LatestNews->take(16) as $item)
                            <div class="col-lg-6">
                                <div class="d-flex mb-3">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a
                                                href="{{ route('category', ['slug' => $item->category->slug, 'id' => $item->category->id]) }}">{{ $item->category->name }}</a>
                                            <span class="px-1 text-dark">/</span>
                                            <span class="text-dark">{{ $item->created_at->format('F d, Y') }}</span>
                                        </div>
                                        <a class="h6 m-0"
                                            href="{{ route('single.news', $item->slug) }}">{{ $item->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{ asset('frontend/img/news-500x280-6.jpg') }}"
                                    style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">Technology</a>
                                        <span class="px-1">/</span>
                                        <span>January 01, 2045</span>
                                    </div>
                                    <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                    <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum,
                                        clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="{{ asset('frontend/img/news-100x100-2.jpg') }}"
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
                            <div class="d-flex mb-3">
                                <img src="{{ asset('frontend/img/news-100x100-3.jpg') }}"
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
                        </div> --}}
                    </div>
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Social Follow Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Follow Us</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #39569E;">
                                <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Newsletter</h3>
                        </div>
                        <div class="bg-light text-center p-4 mb-3">
                            <p>Stay updated with the latest news, exclusive offers, and more! Subscribe to our
                                newsletter and get fresh content delivered straight to your inbox.</p>
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                            <small class="text-dark">We respect your privacy. Unsubscribe at any time.</small>
                        </div>
                    </div>

                    <!-- Newsletter End -->

                    <!-- Ads Start -->
                    {{-- <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                    </div> --}}
                    @include('components.Ads.headerAds')

                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tranding</h3>
                        </div>
                        @include('components.tranding-news')
                        {{-- <div class="d-flex mb-3">
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
                        </div> --}}

                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    @include('components.tags-component')
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreButton = document.getElementById('readMoreButton');
        const moreCategories = document.getElementById('moreCategories');

        if (readMoreButton) {
            readMoreButton.addEventListener('click', function() {
                if (moreCategories.style.display === 'none') {
                    moreCategories.style.display = 'block';
                    readMoreButton.textContent = 'View Less';
                } else {
                    moreCategories.style.display = 'none';
                    readMoreButton.textContent = 'View More';
                }
            });
        }
    });
</script>
