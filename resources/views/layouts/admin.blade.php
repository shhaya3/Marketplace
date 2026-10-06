<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Admin — BizMarket')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">

<div class="admin-shell">
    <!-- Mobile Header Bar (Hidden on desktop) -->
    <header class="admin-mobile-bar">
        <button type="button" class="admin-menu-toggle" aria-label="Open menu">☰</button>
        <a href="{{ route('home') }}" class="admin-mobile-brand">
            Biz<span class="brand-accent">Market</span>
        </a>
        <span class="admin-mobile-badge">Admin</span>
    </header>

    <!-- Mobile Drawer Backdrop -->
    <div class="admin-overlay"></div>

    <!-- Sidebar (Docked on desktop, drawer on mobile) -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <div>
                <a href="{{ route('home') }}" class="admin-sidebar-brand">
                    Biz<span class="brand-accent">Market</span>
                </a>
                <div class="admin-sidebar-tag">Admin panel</div>
            </div>
            <button type="button" class="admin-sidebar-close" aria-label="Close menu">✕</button>
        </div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.templates.index') }}" class="{{ request()->routeIs('admin.templates*') ? 'active' : '' }}">
                🎨 Templates
            </a>
            <a href="{{ route('admin.enquiries.index') }}" class="{{ request()->routeIs('admin.enquiries*') ? 'active' : '' }}">
                📩 Enquiries
            </a>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                🏷️ Categories
            </a>
        </nav>

        <div class="admin-sidebar-footer">
            <div class="admin-sidebar-user">{{ auth()->user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="admin-signout">Sign out →</button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        <div class="admin-content">
            @yield('content')
        </div>
    </main>
</div>

</body>
</html>