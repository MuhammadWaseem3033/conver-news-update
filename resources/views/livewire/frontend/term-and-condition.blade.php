<div>
     <!-- Breadcrumb Start -->
     @include('components.breadcrumb')
     <!-- Breadcrumb End -->
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container-fluid py-3">
        <div class="container">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0 text-center">Our Terms and Conditions</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-light mb-3 text-dark" style="padding: 30px;">
                        <div>{!! $getData->content ?? ''!!}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
