<div>
    <!-- Breadcrumb Start -->
    @include('components.breadcrumb')   
    <!-- Breadcrumb End -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">About Us</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h6 class="font-weight-bold">Get in touch</h6>
                <p>{{$getData->content}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- The whole world belongs to you. --}}
</div>
