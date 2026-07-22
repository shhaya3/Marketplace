@extends('layouts.app')

@section('title', 'Contact — BizMarket')
@section('meta_description', 'Get in touch with BizMarket. We respond to every enquiry within one working day.')

@section('content')

{{-- Page Hero --}}
<div class="page-header">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>›</span>
            <span>Contact</span>
        </nav>
        <h1 class="page-title">Let's talk about<br/><em>your business</em></h1>
        <p class="page-subtitle">Tell us what you need and we'll match you with the right template.</p>
    </div>
</div>

{{-- Split Layout --}}
<div class="contact-layout">

    {{-- Info Panel --}}
    <aside class="contact-info-panel" aria-label="Contact information">
        <h2 class="contact-info-title">We're here to help</h2>
        <p class="contact-info-sub">Fill the form or reach us directly — whichever is easier.</p>
        <div class="contact-items">
            <div class="contact-item">
                <div class="contact-item-icon">📧</div>
                <div>
                    <div class="contact-item-label">Email</div>
                    <div class="contact-item-value">
                        <a href="mailto:hello@bizmarket.in">hello@bizmarket.in</a>
                    </div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon">📱</div>
                <div>
                    <div class="contact-item-label">Phone / WhatsApp</div>
                    <div class="contact-item-value">
                        <a href="tel:+919876543210">+91 98765 43210</a>
                    </div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon">📍</div>
                <div>
                    <div class="contact-item-label">Office</div>
                    <div class="contact-item-value">Nagpur, Maharashtra, India</div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon">🕐</div>
                <div>
                    <div class="contact-item-label">Working hours</div>
                    <div class="contact-item-value">Mon–Sat, 9 AM to 7 PM IST</div>
                </div>
            </div>
        </div>
        <div class="contact-response-badge">
            <div class="response-dot" aria-hidden="true"></div>
            <p>We reply within <strong>1 working day.</strong> Usually much faster.</p>
        </div>
    </aside>

    {{-- Form --}}
    <main class="contact-form-panel">
        @if(session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif

        <h2 class="contact-form-title">Send us a message</h2>
        <p class="contact-form-sub">Tell us about your business and what kind of website you're looking for.</p>

        <form method="POST" action="{{ route('enquiries.store') }}" novalidate>
            @csrf
            <div class="form-row-2">
                <div class="form-group">
                    <label class="form-label" for="full_name">Full name</label>
                    <input type="text" id="full_name" name="full_name"
                           class="form-input-line {{ $errors->has('full_name') ? 'input-error' : '' }}"
                           value="{{ old('full_name') }}" required placeholder="Rajesh Kumar"/>
                    @error('full_name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" name="email"
                           class="form-input-line {{ $errors->has('email') ? 'input-error' : '' }}"
                           value="{{ old('email') }}" required placeholder="rajesh@business.com"/>
                    @error('email')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-row-2">
                <div class="form-group">
                    <label class="form-label" for="phone">Phone / WhatsApp</label>
                    <input type="tel" id="phone" name="phone"
                           class="form-input-line"
                           value="{{ old('phone') }}" placeholder="+91 98765 43210"/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="business_name">Business name</label>
                    <input type="text" id="business_name" name="business_name"
                           class="form-input-line"
                           value="{{ old('business_name') }}" placeholder="Kumar Hospitals"/>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="business_category">Business type</label>
                <select id="business_category" name="business_category" class="form-input-line">
                    <option value="">Select your business category</option>
                    <option value="hospital">🏥 Hospital</option>
                    <option value="school">🏫 School</option>
                    <option value="restaurant">🍽️ Restaurant</option>
                    <option value="hotel">🏨 Hotel</option>
                    <option value="real-estate">🏠 Real Estate</option>
                    <option value="ca">📊 Chartered Accountant</option>
                    <option value="lawyer">⚖️ Lawyer</option>
                    <option value="manufacturer">🏭 Manufacturer</option>
                    <option value="temple">🛕 Temple</option>
                    <option value="coaching">📚 Coaching Institute</option>
                    <option value="ecommerce">🛒 Ecommerce</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="message">Your message</label>
                <textarea id="message" name="message"
                          class="form-input-line {{ $errors->has('message') ? 'input-error' : '' }}"
                          required rows="4"
                          placeholder="Tell us what pages you need, your timeline, or anything else…">{{ old('message') }}</textarea>
                @error('message')<p class="form-error">{{ $message }}</p>@enderror
                <p class="form-hint">The more detail you give, the better we can help you.</p>
            </div>
            <div class="form-submit-row">
                <button type="submit" class="btn btn-navy btn-lg">Send message →</button>
                <p class="form-privacy">No spam. We never share your data.</p>
            </div>
        </form>
    </main>
</div>

@endsection