<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title', 'BizMarket — Website Templates for Indian Local Businesses')</title>
    <meta name="description" content="@yield('meta_description', 'Professional, ready-made website templates for hospitals, schools, restaurants, hotels, and 7 more Indian business types. Get your website live in 48 hours.')"/>

    {{-- Open Graph (social sharing previews) --}}
    <meta property="og:title" content="@yield('og_title', 'BizMarket — Website Templates for Indian Local Businesses')"/>
    <meta property="og:description" content="@yield('og_description', 'Professional website templates for 11 Indian business types. Browse, preview, and launch in 48 hours.')"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.png'))"/>
    <meta property="og:site_name" content="BizMarket"/>

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="@yield('og_title', 'BizMarket')"/>
    <meta name="twitter:description" content="@yield('og_description', 'Professional website templates for Indian local businesses.')"/>

    {{-- Canonical URL — prevents duplicate content issues --}}
    <link rel="canonical" href="{{ url()->current() }}"/>

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/mobile-menu.js', 'resources/js/scroll-reveal.js'])
    @stack('styles')
    @stack('structured_data')
</head>
<body>
    @include('components.navbar')
    <main>
        @yield('content')
    </main>
    @include('components.footer')
    @stack('scripts')
</body>
</html>