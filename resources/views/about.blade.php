@extends('layouts.app')

@section('title', 'About Us — BizMarket')
@section('meta_description', 'Learn about BizMarket — helping Indian local businesses get professional websites live within 48 hours.')

@section('content')

{{-- Hero --}}
<section class="section about-hero">
    <div class="container">
        {{-- Elegant fade up --}}
        <nav class="breadcrumb reveal-up" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>›</span>
            <span>About</span>
        </nav>
        <div class="about-hero-inner">
            <div class="reveal-up">
                <p class="section-label">Our story</p>
                <h1 class="page-title">Built for India's<br/><em>local businesses</em></h1>
                <p class="about-hero-body">
                    We saw thousands of hospitals, schools, restaurants, and local shops
                    losing customers simply because they had no online presence.
                    BizMarket exists to fix that — with ready-made, affordable websites
                    that work from day one.
                </p>
                {{-- stats-bar-inner triggers the number counting JS, stagger fades them in sequentially --}}
                <div class="about-stats stats-bar-inner ">
                    <div class="about-stat">
                        <div class="about-stat-num stats-bar-number">11</div>
                        <div class="about-stat-lbl">Categories</div>
                    </div>
                    <div class="about-stat">
                        <div class="about-stat-num stats-bar-number">240+</div>
                        <div class="about-stat-lbl">Businesses</div>
                    </div>
                    <div class="about-stat">
                        <div class="about-stat-num stats-bar-number">48h</div>
                        <div class="about-stat-lbl">Avg launch</div>
                    </div>
                </div>
            </div>
            
            {{-- stagger automatically animates the children inside it sequentially --}}
            <div class="about-hero-cards stagger" aria-hidden="true">
                <div class="about-hero-card">
                    <div class="about-hero-card-icon" style="background:var(--gold-light)">🎯</div>
                    <div>
                        <div class="about-hero-card-title">Purpose-built templates</div>
                        <div class="about-hero-card-desc">Each template is designed specifically for that business type — not a generic layout renamed.</div>
                    </div>
                </div>
                <div class="about-hero-card">
                    <div class="about-hero-card-icon" style="background:#E1F5EE">🚀</div>
                    <div>
                        <div class="about-hero-card-title">Launch in 48 hours</div>
                        <div class="about-hero-card-desc">From enquiry to live website in two days — domain, hosting, everything configured.</div>
                    </div>
                </div>
                <div class="about-hero-card">
                    <div class="about-hero-card-icon" style="background:#EEEDFE">📱</div>
                    <div>
                        <div class="about-hero-card-title">Mobile-first, always</div>
                        <div class="about-hero-card-desc">Every template is tested across Android and iOS before it reaches a client.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission --}}
<section class="about-mission">
    <div class="container text-center reveal-up">
        <p class="section-label" style="color:rgba(255,255,255,.5);">What we believe</p>
        <blockquote class="mission-quote">
            "Every local business in India deserves a website that
            <em class="mission-highlight">actually works for them</em>
            — not something cobbled together overnight, but a real, professional
            presence that earns trust from the first click."
        </blockquote>
        <p class="mission-author">— The BizMarket team, Nagpur</p>
    </div>
</section>

{{-- Values --}}
<section class="section bg-ivory">
    <div class="container">
        <div class="section-header text-center reveal-up">
            <p class="section-label">What drives us</p>
            <h2 class="section-title">Our values</h2>
        </div>
        
        {{-- stagger will ripple the 3 value cards into view one by one --}}
        <div class="values-grid stagger">
            <div class="value-card">
                <div class="value-icon">🎯</div>
                <h3 class="value-title">Purpose over template</h3>
                <p class="value-desc">Every design decision serves the business type — a hospital website and a restaurant website have completely different goals, and our templates reflect that.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">⚡</div>
                <h3 class="value-title">Speed without shortcuts</h3>
                <p class="value-desc">48-hour delivery doesn't mean cutting corners. It means we've done the hard work upfront so the setup process is genuinely fast.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Honest pricing</h3>
                <p class="value-desc">No hidden costs, no surprise fees. What we quote is what you pay — and we tell you exactly what you're getting before you commit.</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-band">
    <div class="container text-center reveal-up">
        <h2 class="cta-title">Ready to get your business online?</h2>
        <p class="cta-subtitle">Browse our template library or send us a message.</p>
        <div class="cta-actions">
            <a href="{{ route('templates.index') }}" class="btn btn-primary btn-lg">Browse templates →</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Talk to us</a>
        </div>
    </div>
</section>

@endsection