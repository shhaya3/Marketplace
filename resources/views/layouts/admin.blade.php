<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Admin — BizMarket')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="admin-shell">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('home') }}" class="admin-sidebar-brand">
                Biz<span class="brand-accent">Market</span>
            </a>
            <div class="admin-sidebar-tag">Admin panel</div>
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