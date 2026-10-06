<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/coaching.css', 'resources/js/templates/coaching.js'])
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
    <div class="hnav-brand">EduReach Institute</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Courses</a>
        <a href="#">Results</a>
        <a href="#">Faculty</a>
        <a href="#">Enrol</a>
    </div>
    <a href="#" class="hnav-cta">Enrol now</a>
</nav>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">EduReach Institute</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Courses</a>
        <a href="#">Results</a>
        <a href="#">Faculty</a>
        <a href="#">Enrol</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">Enrol now</a>
    </div>
</div>

<section class="hero">
    <div class="hero-inner anim-el anim-up visible">
        <span class="eyebrow">JEE · NEET · UPSC · MHT-CET</span>
        <h1 class="h1">Your rank starts here, not in the exam hall</h1>
        <p class="body-text">120+ IIT and 200+ NEET selections in the last 5 years. Small batches, expert faculty, and a proven methodology that works.</p>
        <div class="actions">
            <a href="#" class="btn-p">Enrol for 2026 batch</a>
            <a href="#" class="btn-s">View results</a>
        </div>
    </div>
</section>

<div class="board-wrap">
    <div class="result-board anim-el anim-up reveal">
        <div class="rb-header">
            <span class="rb-header-title">🏆 Top results — Recent batch</span>
            <span class="rb-header-tag">Live rankings</span>
        </div>
        <div class="rb-row">
            <div class="rb-rank">🥇</div>
            <div class="rb-name">Anjali Sharma</div>
            <div class="rb-score">JEE Advanced · AIR 142</div>
            <div class="rb-badge">IIT Bombay</div>
        </div>
        <div class="rb-row">
            <div class="rb-rank">🥈</div>
            <div class="rb-name">Rohan Kulkarni</div>
            <div class="rb-score">NEET · 712/720</div>
            <div class="rb-badge">AIIMS Delhi</div>
        </div>
        <div class="rb-row">
            <div class="rb-rank">🥉</div>
            <div class="rb-name">Priya Nair</div>
            <div class="rb-score">JEE Main · 99.8%ile</div>
            <div class="rb-badge">IIT Madras</div>
        </div>
        <div class="rb-row">
            <div class="rb-rank">4</div>
            <div class="rb-name">Arjun Mehta</div>
            <div class="rb-score">NEET · 698/720</div>
            <div class="rb-badge">KEM Mumbai</div>
        </div>
    </div>
</div>

<div class="trust-strip">
    <div class="marquee">
        <span class="marquee-item">🏆 120+ IIT Selections</span>
        <span class="marquee-item">🩺 200+ NEET Selections</span>
        <span class="marquee-item">👨‍🏫 40+ Expert Faculty</span>
        <span class="marquee-item">📚 15 Years of Results</span>
        <span class="marquee-item">🎯 Small Batch Sizes</span>
        <span class="marquee-item">🏆 120+ IIT Selections</span>
        <span class="marquee-item">🩺 200+ NEET Selections</span>
        <span class="marquee-item">👨‍🏫 40+ Expert Faculty</span>
        <span class="marquee-item">📚 15 Years of Results</span>
        <span class="marquee-item">🎯 Small Batch Sizes</span>
    </div>
</div>

<div class="split">
    <div class="split-photos anim-el anim-left reveal">
        <div class="split-photo">
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=500&q=75" alt="Students studying"/>
        </div>
        <div class="split-photo tall">
            <img src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=500&q=75" alt="Classroom lecture"/>
        </div>
    </div>
    <div class="anim-el anim-right reveal">
        <p class="sec-label">Why EduReach</p>
        <h2 class="split-title">A methodology built on results, not promises</h2>
        <p class="split-body">Our faculty have coached students for 15 years, refining a teaching system focused on concept clarity, weekly testing, and individual doubt-solving — not just covering the syllabus.</p>
        <div class="check-list">
            <div class="check-item"><span class="check-icon">✓</span> Batches capped at 30 students for personal attention</div>
            <div class="check-item"><span class="check-icon">✓</span> Weekly tests with All-India ranking benchmarks</div>
            <div class="check-item"><span class="check-icon">✓</span> Dedicated doubt-clearing sessions every day</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <p class="sec-label">Programmes</p>
        <h2 class="sec-title">Choose your track</h2>
    </div>
    <div class="course-grid anim-stagger stagger">
        <div class="course-card featured anim-el anim-up">
            <div class="course-ribbon">Most popular</div>
            <div class="course-tag">JEE Main + Advanced</div>
            <div class="course-name">Engineering Entrance</div>
            <div class="course-meta">2-Year programme · Batch starts 1 June · 30 seats</div>
            <div class="course-fee-row">
                <div class="course-fee">₹85,000</div>
                <div class="course-fee-unit">/ year</div>
            </div>
        </div>
        <div class="course-card anim-el anim-up">
            <div class="course-tag">NEET UG</div>
            <div class="course-name">Medical Entrance</div>
            <div class="course-meta">2-Year programme · Batch starts 1 June · 25 seats</div>
            <div class="course-fee-row">
                <div class="course-fee">₹75,000</div>
                <div class="course-fee-unit">/ year</div>
            </div>
        </div>
        <div class="course-card anim-el anim-up">
            <div class="course-tag">MHT-CET</div>
            <div class="course-name">Maharashtra Engineering</div>
            <div class="course-meta">1-Year programme · Batch starts 15 May · 35 seats</div>
            <div class="course-fee-row">
                <div class="course-fee">₹45,000</div>
                <div class="course-fee-unit">/ year</div>
            </div>
        </div>
    </div>
</div>

<div class="testi anim-el anim-up reveal">
    <div class="testi-mark">"</div>
    <p class="testi-quote">EduReach didn't just prepare me for JEE — the weekly testing and doubt sessions built the discipline I still use today.</p>
    <p class="testi-author"><strong>Anjali Sharma</strong> — AIR 142, IIT Bombay</p>
</div>

<div class="appt anim-el anim-up reveal">
    <h2>Batches filling fast</h2>
    <p>Limited seats per batch to ensure quality attention. Enrol today to secure your place.</p>
    <a href="#" class="appt-btn">Enrol now</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">EduReach Institute</div>
            <p class="footer-desc">Coaching for JEE, NEET, and MHT-CET in Nagpur. 120+ IIT and 200+ NEET selections.</p>
        </div>
        <div>
            <div class="footer-col-title">Programmes</div>
            <div class="footer-links">
                <a href="#">JEE Main + Advanced</a>
                <a href="#">NEET UG</a>
                <a href="#">MHT-CET</a>
                <a href="#">Foundation Courses</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Faculty</a>
                <a href="#">Results</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Dharampeth, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ info@edureach.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 EduReach Institute, Nagpur</span>
        <span>Admissions open for 2026-27</span>
    </div>
</footer>

</body>
</html>