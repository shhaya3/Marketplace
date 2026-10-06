<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/ca.css', 'resources/js/templates/ca.js'])
</head>
<body>

<div class="preview-toolbar">
    <div class="preview-toolbar-left">
        <span class="preview-badge">PREVIEW</span>
        <span class="preview-name">{{ $template->name }}</span>
        <span class="preview-badge">{{ $template->category->name }}</span>
    </div>
    <div class="preview-toolbar-right">
        <a href="{{ route('templates.show', $template->slug) }}" class="preview-btn-back">← Back to details</a>
        <a href="{{ route('contact') }}" class="preview-btn-enquire">Get this template</a>
    </div>
</div>

<nav class="hnav">
    <button class="mobile-menu-btn" aria-label="Open menu">☰</button>
    <div class="hnav-brand">TrustLedger CA</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Services</a>
        <a href="#">Team</a>
        <a href="#">Resources</a>
        <a href="#">Contact</a>
    </div>
    <a href="#" class="hnav-cta">Book consultation</a>
</nav>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">TrustLedger CA</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Services</a>
        <a href="#">Team</a>
        <a href="#">Resources</a>
        <a href="#">Contact</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">Book consultation</a>
    </div>
</div>

<section class="hero">
    <div class="hero-inner anim-el anim-up visible">
        <span class="eyebrow">CA Firm · ICAI Registered · Est. 2005</span>
        <h1 class="h1">Financial clarity for your business</h1>
        <p class="body-text">Expert accounting, taxation, and compliance services for SMEs and individuals across India. 20 years of trust, delivered with precision.</p>
        <div class="actions">
            <a href="#" class="btn-p">Book a free consultation</a>
            <a href="#" class="btn-s">Our services</a>
        </div>
    </div>
</section>

<div class="panel-wrap">
    <div class="hero-panel anim-el anim-up reveal">
        <div class="hero-panel-badge">✓ Filed & Verified</div>
        <div class="hero-panel-row">
            <div class="hero-panel-label">Income Tax Return</div>
            <div class="hero-panel-value done"><span class="hero-panel-check">✓</span> Filed</div>
        </div>
        <div class="hero-panel-row">
            <div class="hero-panel-label">GST Filing (Q3)</div>
            <div class="hero-panel-value done"><span class="hero-panel-check">✓</span> Filed</div>
        </div>
        <div class="hero-panel-row">
            <div class="hero-panel-label">Compliance Score</div>
            <div class="hero-panel-value">100%</div>
        </div>
        <div class="hero-panel-row">
            <div class="hero-panel-label">Next Filing Due</div>
            <div class="hero-panel-value">15 Mar 2027</div>
        </div>
    </div>
</div>

<div class="hero-badges-strip">
    <div class="hero-badges anim-stagger stagger">
        <div class="hero-badge anim-el anim-up">
            <div class="hero-badge-icon">🏛️</div>
            <div>
                <div class="hero-badge-text">ICAI Registered</div>
                <div class="hero-badge-sub">Membership No. 123456</div>
            </div>
        </div>
        <div class="hero-badge anim-el anim-up">
            <div class="hero-badge-icon">🔒</div>
            <div>
                <div class="hero-badge-text">ISO 9001:2015</div>
                <div class="hero-badge-sub">Quality certified</div>
            </div>
        </div>
        <div class="hero-badge anim-el anim-up">
            <div class="hero-badge-icon">⭐</div>
            <div>
                <div class="hero-badge-text">500+ Clients</div>
                <div class="hero-badge-sub">20 years of practice</div>
            </div>
        </div>
    </div>
</div>

<div class="stats-block">
    <div class="section-header anim-el anim-up reveal">
        <span class="sec-label">By the numbers</span>
        <h2 class="sec-title">Two decades of trusted practice</h2>
    </div>
    <div class="stats-row anim-stagger stagger">
        <div class="stat anim-el anim-up"><div class="stat-num">20+</div><div class="stat-lbl">Years in practice</div></div>
        <div class="stat anim-el anim-up"><div class="stat-num">500+</div><div class="stat-lbl">Clients served</div></div>
        <div class="stat anim-el anim-up"><div class="stat-num">₹40Cr+</div><div class="stat-lbl">Filings handled</div></div>
        <div class="stat anim-el anim-up"><div class="stat-num">100%</div><div class="stat-lbl">Compliance record</div></div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <span class="sec-label">What we do</span>
        <h2 class="sec-title">Our services</h2>
    </div>
    <div class="svc-list anim-stagger stagger">
        <div class="svc-row anim-el anim-left">
            <div class="svc-num">01</div>
            <div class="svc-icon">📑</div>
            <div class="svc-content">
                <div>
                    <div class="svc-name">Income Tax Filing</div>
                    <div class="svc-desc">Individual and corporate ITR preparation, e-filing, and refund tracking for all income sources.</div>
                </div>
                <div class="svc-arrow">→</div>
            </div>
        </div>
        <div class="svc-row anim-el anim-left">
            <div class="svc-num">02</div>
            <div class="svc-icon">📋</div>
            <div class="svc-content">
                <div>
                    <div class="svc-name">GST Compliance</div>
                    <div class="svc-desc">GST registration, monthly and quarterly returns, and annual reconciliation filing.</div>
                </div>
                <div class="svc-arrow">→</div>
            </div>
        </div>
        <div class="svc-row anim-el anim-left">
            <div class="svc-num">03</div>
            <div class="svc-icon">📈</div>
            <div class="svc-content">
                <div>
                    <div class="svc-name">Audit & Assurance</div>
                    <div class="svc-desc">Statutory audit, internal audit, tax audit under Sec 44AB, and company law compliance.</div>
                </div>
                <div class="svc-arrow">→</div>
            </div>
        </div>
        <div class="svc-row anim-el anim-left">
            <div class="svc-num">04</div>
            <div class="svc-icon">🏢</div>
            <div class="svc-content">
                <div>
                    <div class="svc-name">Company Registration</div>
                    <div class="svc-desc">Pvt Ltd, LLP, OPC, and Partnership firm registration with MCA and ROC filings included.</div>
                </div>
                <div class="svc-arrow">→</div>
            </div>
        </div>
    </div>
</div>

<div class="team-bg">
    <div class="team-inner">
        <div class="section-header anim-el anim-up reveal">
            <span class="sec-label">Our team</span>
            <h2 class="sec-title">Meet the partners</h2>
        </div>
        <div class="team-grid anim-stagger stagger">
            <div class="team-card anim-el anim-up">
                <div class="team-avatar"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=200&q=75" alt="CA Vinod Sharma"/></div>
                <div class="team-name">CA Vinod Sharma</div>
                <div class="team-role">Managing Partner</div>
                <div class="team-cred">FCA · 22 years</div>
            </div>
            <div class="team-card anim-el anim-up">
                <div class="team-avatar"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=200&q=75" alt="CA Ritu Agarwal"/></div>
                <div class="team-name">CA Ritu Agarwal</div>
                <div class="team-role">Tax Partner</div>
                <div class="team-cred">FCA · 15 years</div>
            </div>
            <div class="team-card anim-el anim-up">
                <div class="team-avatar"><img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&fit=crop&w=200&q=75" alt="CA Manish Joshi"/></div>
                <div class="team-name">CA Manish Joshi</div>
                <div class="team-role">Audit Partner</div>
                <div class="team-cred">FCA · 12 years</div>
            </div>
            <div class="team-card anim-el anim-up">
                <div class="team-avatar"><img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=200&q=75" alt="CA Pooja Nair"/></div>
                <div class="team-name">CA Pooja Nair</div>
                <div class="team-role">Compliance Head</div>
                <div class="team-cred">ACA · 8 years</div>
            </div>
        </div>
    </div>
</div>

<div class="testi anim-up reveal">
    <div class="testi-mark">"</div>
    <p class="testi-quote">TrustLedger handled our company registration and GST setup flawlessly. Precise, prompt, and always available for questions.</p>
    <p class="testi-author"><strong>Rajesh Malhotra</strong> — Founder, Malhotra Textiles</p>
</div>

<div class="appt">
    <h2>Schedule a free consultation</h2>
    <p>30-minute call with a senior CA. No commitment, no fees.</p>
    <a href="#" class="appt-btn">Book now</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">TrustLedger CA</div>
            <p class="footer-desc">Chartered accountancy practice in Nagpur since 2005. ICAI registered, 500+ clients served.</p>
        </div>
        <div>
            <div class="footer-col-title">Services</div>
            <div class="footer-links">
                <a href="#">Tax Filing</a>
                <a href="#">GST Compliance</a>
                <a href="#">Audit & Assurance</a>
                <a href="#">Company Registration</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Our Team</a>
                <a href="#">Resources</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Dharampeth, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ info@trustledger.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 TrustLedger CA, Nagpur</span>
        <span>CA Firm Reg: 123456W</span>
    </div>
</footer>

</body>
</html>