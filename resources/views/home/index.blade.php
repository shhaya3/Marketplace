@extends('layouts.app')

@section('title', 'BizMarket — Website Templates for Indian Local Businesses')
@section('meta_description', 'Professional, ready-made website templates for hospitals, schools, restaurants, hotels, and 7 more Indian business types. Get your website live in 48 hours.')
@section('og_title', 'BizMarket — Get Your Business Online Today')
@section('og_description', '11 business categories. Browse, preview, and launch a professional website in 48 hours.')

@section('content')

@push('structured_data')
@php
$schema = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Organization',
            'name' => 'BizMarket',
            'url' => url('/'),
            'description' => 'Professional, ready-made website templates for Indian local businesses.',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Nagpur',
                'addressRegion' => 'Maharashtra',
                'addressCountry' => 'IN',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'telephone' => '+91-98765-43210',
                'email' => 'hello@bizmarket.in',
                'areaServed' => 'IN',
            ],
        ],
        [
            '@type' => 'WebSite',
            'name' => 'BizMarket',
            'url' => url('/'),
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

{{-- Hero --}}
<section class="hero-section">
    <div class="hero-blob hero-blob-1"></div>
    <div class="hero-blob hero-blob-2"></div>
    <div class="container">
        <div class="hero-inner">
            {{-- Slide in gracefully from left --}}
            <div class="hero-content reveal-left">
                <p class="section-label">11 Business Categories · Ready to Launch</p>
                <h1 class="hero-title">
                    Get your business<br/>
                    <em class="hero-title-em">online today.</em>
                </h1>
                <p class="hero-body">
                    Professional, ready-made websites for hospitals, schools, restaurants,
                    hotels, and 7 more Indian business types. Browse, preview, and get your
                    site live — without starting from scratch.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('templates.index') }}" class="btn btn-primary btn-lg">
                        Browse all templates →
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline btn-lg">
                        Talk to us
                    </a>
                </div>
                <div class="hero-trust">
                    <div class="trust-avatars" aria-hidden="true">
                        <div class="trust-avatar">👨‍⚕️</div>
                        <div class="trust-avatar">👩‍🏫</div>
                        <div class="trust-avatar">🧑‍🍳</div>
                        <div class="trust-avatar">👨‍💼</div>
                    </div>
                    <p class="trust-text">
                        <strong>240+ businesses</strong> across India already have their website
                    </p>
                </div>
            </div>
            
            {{-- Clip-path reveal for mockup from right --}}
            <div class="hero-visual reveal-clip" aria-hidden="true">
                <div class="hero-mockup">
                    <div class="mockup-browser-bar">
                        <span class="browser-dot red"></span>
                        <span class="browser-dot yellow"></span>
                        <span class="browser-dot green"></span>
                    </div>
                    <div class="mockup-body">
                        <div class="mockup-hero-img">🏥</div>
                        <div class="mockup-lines">
                            <div class="mockup-line long"></div>
                            <div class="mockup-line medium"></div>
                            <div class="mockup-line short"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats Bar --}}
<section class="stats-bar">
    <div class="container">
        {{-- Stagger triggers the sequential animation and the counter --}}
        <div class="stats-bar-inner stagger">
            <div class="stats-bar-item">
                <div class="stats-bar-number">11</div>
                <div class="stats-bar-label">Business categories</div>
            </div>
            <div class="stats-bar-item">
                <div class="stats-bar-number">240+</div>
                <div class="stats-bar-label">Businesses launched</div>
            </div>
            <div class="stats-bar-item">
                <div class="stats-bar-number">48h</div>
                <div class="stats-bar-label">Average delivery</div>
            </div>
            <div class="stats-bar-item">
                <div class="stats-bar-number">100%</div>
                <div class="stats-bar-label">Mobile responsive</div>
            </div>
        </div>
    </div>
</section>

{{-- Categories --}}
<section class="section bg-ivory">
    <div class="container">
        <div class="section-header text-center reveal-up">
            <p class="section-label">What we cover</p>
            <h2 class="section-title">Templates for every local business</h2>
            <p class="section-subtitle mx-auto">
                Pick your industry and get a website built specifically for how
                your customers think and what they need from you.
            </p>
        </div>
        <div class="category-grid stagger">
            @foreach($categories as $category)
            <a href="{{ route('templates.category', $category->slug) }}" class="category-card">
                <span class="category-emoji">{{ $category->icon }}</span>
                <div class="category-name">{{ $category->name }}</div>
                <span class="category-arrow">→</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- How It Works --}}
<section class="section bg-ivory-dark">
    <div class="container">
        <div class="section-header text-center reveal-up">
            <p class="section-label">The process</p>
            <h2 class="section-title">From browsing to live website in three steps</h2>
        </div>
        <div class="steps-grid stagger">
            <div class="step-card">
                <div class="step-icon">🔍</div>
                <h3 class="step-title">Browse & preview</h3>
                <p class="step-desc">Filter by your business type, open a full-screen preview, and explore every page before committing.</p>
            </div>
            <div class="step-card">
                <div class="step-icon">📩</div>
                <h3 class="step-title">Send an enquiry</h3>
                <p class="step-desc">Tell us your business name, what you need, and any customisations. We'll respond within one working day.</p>
            </div>
            <div class="step-card">
                <div class="step-icon">🚀</div>
                <h3 class="step-title">Go live</h3>
                <p class="step-desc">We set up your domain, deploy the template, and hand you a fully working website — usually within 48 hours.</p>
            </div>
        </div>
    </div>
</section>

{{-- Featured Templates --}}
<section class="section bg-ivory">
    <div class="container">
        <div class="section-header-row reveal-up">
            <div>
                <p class="section-label">Hand-picked</p>
                <h2 class="section-title mb-0">Featured templates</h2>
            </div>
            <a href="{{ route('templates.index') }}" class="btn btn-outline">View all →</a>
        </div>
        <div class="featured-grid stagger">
            @foreach($featured as $template)
            <article class="card">
                <div class="template-preview-thumb" style="background:linear-gradient(135deg,var(--navy),var(--blue));">
                    <span class="template-preview-icon">{{ $template->category->icon }}</span>
                </div>
                <div class="card-body">
                    <span class="badge badge-gold mb-sm">{{ $template->category->icon }} {{ $template->category->name }}</span>
                    <h3 class="template-card-name">{{ $template->name }}</h3>
                    <p class="template-card-desc">{{ $template->short_description }}</p>
                    <div class="template-card-footer">
                        <span class="template-views">👁 {{ $template->view_count }} views</span>
                        <a href="{{ route('templates.show', $template->slug) }}" class="template-link">Details →</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-band">
    <div class="container text-center reveal-up">
        <p class="section-label" style="color:var(--gold-light);">Ready to start?</p>
        <h2 class="cta-title">Your business deserves to be found online</h2>
        <p class="cta-subtitle">Browse 11 template categories and get your website live within 48 hours.</p>
        <div class="cta-actions">
            <a href="{{ route('templates.index') }}" class="btn btn-primary btn-lg">Browse all templates →</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Get in touch</a>
        </div>
        <p class="cta-note">🔒 No upfront payment required · Talk to us first</p>
    </div>
</section>

@endsection