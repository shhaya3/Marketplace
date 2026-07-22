@extends('layouts.app')

@section('title', 'Admin Login — BizMarket')

@section('content')
<div class="login-page">
    <div class="login-wrap">
        <a href="{{ route('home') }}" class="login-back">← Back to BizMarket</a>
        <div class="login-card">
            <div class="login-card-top-border" aria-hidden="true"></div>
            <div class="login-card-body">
                <div class="login-brand">
                    <div class="login-brand-mark" aria-hidden="true">🏪</div>
                    <div class="login-brand-name">Biz<span class="brand-accent">Market</span></div>
                </div>
                <h1 class="login-title">Admin login</h1>
                <p class="login-sub">Sign in to manage templates and enquiries.</p>

                @if($errors->any())
                <div class="alert alert-error">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" id="email" name="email"
                               class="form-input"
                               value="{{ old('email') }}" required
                               placeholder="admin@bizmarket.in"
                               autocomplete="email"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password"
                               class="form-input"
                               required placeholder="••••••••••"
                               autocomplete="current-password"/>
                    </div>
                    <button type="submit" class="btn btn-navy login-submit-btn">
                        Sign in to dashboard →
                    </button>
                </form>
            </div>
            <div class="login-card-footer">
                <span class="login-card-footer-text">Not an admin?</span>
                <a href="{{ route('contact') }}" class="login-card-footer-link">
                    Contact us to enquire about a template →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection