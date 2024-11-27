@php
    $categories = \App\Models\Category::whereNull('parent_id')->with('subcategories')->has('news')->get();

    $activeId = request()->id; // Current category or subcategory ID
    $currentCategory = $activeId ? \App\Models\Category::find($activeId) : null; // Current category/subcategory
    // dd($currentCategory);
    $parentCategoryId = $currentCategory->parent_id ?? ($currentCategory->id ?? null); // Find parent category

    $breadcrumbs = generateBreadcrumbs();
    // dd($breadcrumbs);
@endphp



{{-- @dd()  --}}
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center bg-light px-lg-5">
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-between">
                <div class="bg-primary text-white text-center py-2" style="width: 10rem;">Tranding News</div>
                <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                    style="width: calc(100% - 100px); padding-left: 90px;">
                    @forelse ($categories as $category)
                        @foreach ($category->news as $item)
                            <div class="text-truncate">
                                <a class="text-secondary" href="{{ route('single.news',$item->slug) }}">
                                    {{ $item->title }}
                                </a>
                            </div>
                        @endforeach
                    @empty
                        <div class="text-truncate"><a class="text-secondary" href="">Gubergren elitr amet eirmod
                                et
                                lorem diam elitr, ut est erat Gubergren elitr amet eirmod et lorem diam elitr, ut est
                                erat</a></div>
                    @endforelse


                </div>
            </div>
        </div>
        {{-- <div class="col-md-4 text-right d-none d-md-block">
             {{ \Carbon\Carbon::now()->isoFormat('dddd, MMMM DD, YYYY') }}
         </div> --}}
        <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
            <input type="text" class="form-control" placeholder="Keyword">
            <div class="input-group-append">
                <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    @if(View::exists('components.Ads.headerAds') && !empty(View::make('components.Ads.headerAds')->render()))
    <div class="row align-items-center py-2 px-lg-5 ">
        <div class="col-lg-4">
            <a href="{{ route('index') }}" class="navbar-brand d-none d-lg-block ">
                <h1 class="m-0  h2 text-uppercase ">Cover<span class="text-primary"> News </span> Update</h1>
            </a>
        </div>
        @include('components.Ads.headerAds')
    </div>
    @else
    <div class="row align-items-center py-2 px-lg-5 justify-content-center">
        <div class="col-lg-4">
            <a href="{{ route('index') }}" class="navbar-brand d-none d-lg-block ">
                <h1 class="m-0  h2 text-uppercase ">Cover<span class="text-primary"> News </span> Update</h1>
            </a>
        </div>
        {{-- @include('components.Ads.headerAds') --}}
    </div>
    @endif
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            {{-- <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1> --}}
            <h1 class="m-0 text-uppercase" title="Cover News Update" style="font-size: 1.3rem">Cover<span
                    class="text-primary"> News </span> Update</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0 justify-content-center w-100">
                <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
                {{-- <a href="{{ route('all.news') }}" class="nav-item nav-link">News</a> --}}
                {{-- @dd($categories) --}}

                @forelse ($categories as $category)
                    <a href="{{ route('category', ['slug' => $category->slug, 'id' => $category->id]) }}"
                        wire:click.prevent="toggleCategory({{ $category->id }})"
                        class="nav-link {{ $parentCategoryId == $category->id ? 'active' : '' }}"
                        data-toggle="collapse{{ $category->id }}" data-target="#dropdownNavbar{{ $category->id }}"
                        role="button" aria-controls="dropdownNavbar"
                        aria-expanded="{{ $parentCategoryId == $category->id ? 'true' : 'false' }}">
                        {{ $category->name }}
                    </a>
                @empty
                @endforelse
                {{-- <a href="{{ route('contect.us') }}" class="nav-item nav-link">Contact</a> --}}
            </div>
            {{-- <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                 <input type="text" class="form-control" placeholder="Keyword">
                 <div class="input-group-append">
                     <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                 </div>
             </div> --}}
        </div>
    </nav>
    <!-- Collapsible Navbar for Dropdown Items -->
    @foreach ($categories as $category)
        <div class="collapse {{ $parentCategoryId == $category->id ? 'show' : '' }} "
            id="dropdownNavbar{{ $category->id }}">
            <div class="bg-light d-block d-md-flex justify-content-center text-center hovernavbar">
                @foreach ($category->subcategories as $subcategory)
                    <div class="nav-item nav-link-container">
                        <a href="{{ route('category', ['slug' => $category->slug, 'id' => $subcategory->id]) }}"
                            class="nav-item nav-link {{ $activeId == $subcategory->id ? 'active' : '' }} ">{{ $subcategory->name }}</a>
                        <!-- Subcategory Dropdown (will be shown on hover) -->
                        @if ($subcategory->subcategories->isNotEmpty())
                            <div class="subcategories-dropdown">
                                @foreach ($subcategory->subcategories as $subSubcategory)
                                    <a href="{{ route('category', ['slug' => $category->slug, 'id' => $subSubcategory->id]) }}"
                                        class="nav-item nav-link {{ $activeId == $subSubcategory->id ? 'active' : '' }}">
                                        {{ $subSubcategory->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach


</div>

<!-- Navbar End -->
<style>
    #dropdownNavbar {
        border: 1px ridge black;
        border-left: none;
        border-right: none;
        box-shadow: #000;
    }

    #dropdownNavbar .nav-link {
        margin: 5px 0 5px 0;
        /* Adds space between items */

    }

    .hovernavbar .nav-link {
        padding: 5px 10px;
        /* Adjust padding for better alignment */
        white-space: nowrap;
        /* Prevents text wrapping */
    }

    .hovernavbar a {
        color: #000;

    }

    /* Main subcategory link container */
    .nav-item.nav-link-container {
        position: relative;
        /* Ensure dropdown is positioned relative to this container */
    }

    /* Initially hide the subcategory dropdown */
    .subcategories-dropdown {
        display: none;
        position: absolute;
        top: 100%;
        /* Position the dropdown below the parent link */
        left: 0;
        /* Align it with the left of the parent category */
        background-color: #fff;
        /* Light background */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        min-width: 200px;
        z-index: 9999;
        /* Make sure it's on top of other elements */
    }

    /* Show subcategories when hovering over the parent link */
    .nav-item.nav-link-container:hover .subcategories-dropdown {
        display: block;
        /* Show dropdown on hover */
    }

    /* Optional: Style for nested subcategories */
    .subcategories-dropdown a {
        display: block;
        padding: 5px;
        text-decoration: none;
        color: #000;
        font-weight: 400
    }

    .subcategories-dropdown a:hover {
        background-color: #ddd;
    }
</style>
<script>
    document.querySelectorAll('.nav-item.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            const parent = this.closest('.collapse');
            if (parent) {
                parent.classList.add('show');
            }
        });
    });

    document.querySelectorAll('.nav-item.nav-link-container').forEach(function(container) {
        container.addEventListener('mouseenter', function() {
            let dropdown = this.querySelector('.subcategories-dropdown');
            if (dropdown) {
                dropdown.style.display = 'block';
            }
        });

        container.addEventListener('mouseleave', function() {
            let dropdown = this.querySelector('.subcategories-dropdown');
            if (dropdown) {
                dropdown.style.display = 'none';
            }
        });
    });
</script>
