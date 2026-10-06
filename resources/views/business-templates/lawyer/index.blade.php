<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/lawyer.css', 'resources/js/templates/lawyer.js'])
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
    <div class="hnav-brand">Lexis Law Firm</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Practice Areas</a>
        <a href="#">Attorneys</a>
        <a href="#">Case Studies</a>
        <a href="#">Contact</a>
    </div>
    <a href="#" class="hnav-cta">Free Consultation</a>
</nav>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">Lexis Law Firm</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Practice Areas</a>
        <a href="#">Attorneys</a>
        <a href="#">Case Studies</a>
        <a href="#">Contact</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">Free Consultation</a>
    </div>
</div>

<section class="hero">
    <div class="hero-inner anim-el anim-up visible">
        <span class="eyebrow">Advocates & Solicitors · 25 Years</span>
        <h1 class="h1">Justice is not just our job — it's our calling</h1>
        <p class="body-text">Expert legal counsel across civil, criminal, corporate, and family law. 25 years of results in courts across Maharashtra and the Supreme Court.</p>
        <div class="actions">
            <a href="#" class="btn-p">Book Consultation</a>
            <a href="#" class="btn-s">Our Practice Areas</a>
        </div>
    </div>
</section>

<div class="stats">
    <div class="stats-inner anim-stagger stagger reveal">
        <div class="anim-el anim-up"><div class="stat-num">25+</div><div class="stat-lbl">Years at the Bar</div></div>
        <div class="anim-el anim-up"><div class="stat-num">1200+</div><div class="stat-lbl">Cases handled</div></div>
        <div class="anim-el anim-up"><div class="stat-num">94%</div><div class="stat-lbl">Success rate</div></div>
        <div class="anim-el anim-up"><div class="stat-num">8</div><div class="stat-lbl">Practice areas</div></div>
    </div>
</div>

<div class="practice-section">
    <div class="practice-grid anim-el anim-up reveal">
        <div class="practice-nav">
            <div class="practice-nav-item active" data-practice="civil">Civil Litigation</div>
            <div class="practice-nav-item" data-practice="corporate">Corporate Law</div>
            <div class="practice-nav-item" data-practice="family">Family Law</div>
            <div class="practice-nav-item" data-practice="criminal">Criminal Defence</div>
        </div>
        <div class="practice-detail">
            <div class="practice-detail-tag">Civil Litigation</div>
            <h3 class="practice-detail-title">Resolving disputes with strategic clarity</h3>
            <p class="practice-detail-desc">We represent clients in property disputes, contract breaches, and civil recovery matters — combining thorough preparation with courtroom experience across Maharashtra.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <span class="sec-label">Our attorneys</span>
        <h2 class="sec-title">Meet the team</h2>
    </div>
    <div class="atty-grid anim-stagger stagger">
        <div class="atty-card anim-el anim-up">
            <div class="atty-photo"><img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=400&q=75" alt="Adv. Suresh Iyer"/></div>
            <div class="atty-info">
                <div class="atty-name">Adv. Suresh Iyer</div>
                <div class="atty-role">Senior Partner</div>
                <div class="atty-exp">25 years at the Bar</div>
            </div>
        </div>
        <div class="atty-card anim-el anim-up">
            <div class="atty-photo"><img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=400&q=75" alt="Adv. Meena Kapoor"/></div>
            <div class="atty-info">
                <div class="atty-name">Adv. Meena Kapoor</div>
                <div class="atty-role">Partner</div>
                <div class="atty-exp">18 years at the Bar</div>
            </div>
        </div>
        <div class="atty-card anim-el anim-up">
            <div class="atty-photo"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=75" alt="Adv. Rajan Mishra"/></div>
            <div class="atty-info">
                <div class="atty-name">Adv. Rajan Mishra</div>
                <div class="atty-role">Associate</div>
                <div class="atty-exp">10 years at the Bar</div>
            </div>
        </div>
        <div class="atty-card anim-el anim-up">
            <div class="atty-photo"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&q=75" alt="Adv. Sonal Desai"/></div>
            <div class="atty-info">
                <div class="atty-name">Adv. Sonal Desai</div>
                <div class="atty-role">Associate</div>
                <div class="atty-exp">8 years at the Bar</div>
            </div>
        </div>
    </div>
</div>

<div class="cases-bg">
    <div class="cases-inner">
        <div class="section-header anim-el anim-up reveal">
            <span class="sec-label">Track record</span>
            <h2 class="sec-title">Case studies</h2>
        </div>
        <div class="anim-stagger stagger">
            <div class="case-row anim-el anim-left">
                <div class="case-tag">Civil Litigation</div>
                <div class="case-title">Property dispute resolved in 8 months</div>
                <div class="case-desc">Successfully represented a family in a decade-long inherited property dispute, securing full ownership rights.</div>
            </div>
            <div class="case-row anim-el anim-left">
                <div class="case-tag">Corporate Law</div>
                <div class="case-title">Merger completed with zero litigation</div>
                <div class="case-desc">Advised on a ₹40 crore merger between two manufacturing firms, ensuring full regulatory compliance.</div>
            </div>
            <div class="case-row anim-el anim-left">
                <div class="case-tag">Family Law</div>
                <div class="case-title">Amicable settlement in custody case</div>
                <div class="case-desc">Negotiated a mutually agreeable custody arrangement, avoiding prolonged court proceedings for the family.</div>
            </div>
        </div>
    </div>
</div>

<div class="appt">
    <h2>Get expert legal advice today</h2>
    <p>Free 30-minute consultation with a senior advocate. Confidential and no obligation.</p>
    <a href="#" class="appt-btn">Book Consultation</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">Lexis Law Firm</div>
            <p class="footer-desc">Advocates and solicitors serving Nagpur and Maharashtra since 2000.</p>
        </div>
        <div>
            <div class="footer-col-title">Practice Areas</div>
            <div class="footer-links">
                <a href="#">Civil Litigation</a>
                <a href="#">Corporate Law</a>
                <a href="#">Family Law</a>
                <a href="#">Criminal Defence</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Attorneys</a>
                <a href="#">Case Studies</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Civil Lines, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ contact@lexislaw.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 Lexis Law Firm, Nagpur</span>
        <span>Bar Council Reg: MH/1234</span>
    </div>
</footer>

</body>
</html>