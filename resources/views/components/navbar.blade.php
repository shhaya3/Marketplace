<nav class="navbar">
    <div class="navbar-inner">
        <button class="mobile-menu-btn" aria-label="Open menu">☰</button>
        <a href="{{ route('home') }}" class="brand">
            <div class="brand-mark">🏪</div>
            Biz<span class="brand-accent">Market</span>
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('templates.index') }}" class="{{ request()->routeIs('templates*') ? 'active' : '' }}">Templates</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
        <div class="nav-right">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost btn-sm">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Admin Login</a>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Get in touch</a>
            @endauth
        </div>
    </div>
</nav>

<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">Biz<span style="color:var(--gold)">Market</span></div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('templates.index') }}">Templates</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>
    <div class="mobile-drawer-cta">
        @auth
            <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-ghost">Admin Login</a>
            <a href="{{ route('contact') }}" class="btn btn-primary">Get in touch</a>
        @endauth
    </div>
</div>