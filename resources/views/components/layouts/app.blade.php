@include('components.layouts.header')

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WP6JXN32" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('components.layouts.navbar')

    {{ $slot }}

    @include('components.layouts.footer')

    @include('components.layouts.scripts')

</body>

</html>
