
@include('components.layouts.header')

    <body >
        @include('components.layouts.navbar')  

        {{ $slot }}

        @include('components.layouts.footer')

        @include('components.layouts.scripts')

    </body>
</html>
