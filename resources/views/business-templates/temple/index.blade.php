<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/temple.css', 'resources/js/templates/temple.js'])
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
    <div class="hnav-brand">Shree Mandir</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Events</a>
        <a href="#">Schedule</a>
        <a href="#">Gallery</a>
        <a href="#">Donations</a>
    </div>
    <a href="#" class="hnav-cta">Donate Online</a>
</nav>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">Shree Mandir</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Events</a>
        <a href="#">Schedule</a>
        <a href="#">Gallery</a>
        <a href="#">Donations</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">Donate Online</a>
    </div>
</div>

<section class="hero">
    <div class="hero-inner anim-el anim-up visible">
        <span class="eyebrow">🪔 Est. 1874 · Nagpur, Maharashtra</span>
        <h1 class="h1">A place of devotion, peace & community</h1>
        <p class="body-text">Shree Mandir has been a centre of spiritual life and community service in Nagpur for over 150 years. All are welcome — come to pray, participate, or simply find peace.</p>
        <div class="actions">
            <a href="#" class="btn-p">View today's schedule</a>
            <a href="#" class="btn-s">Donate online</a>
        </div>
    </div>
</section>

<div class="timing-wrap">
    <div class="timing-float anim-el anim-up reveal">
        <div class="timing-header">🛕 Darshan & Pooja Schedule — Today</div>
        <div class="timing-grid">
            <div class="timing-item">
                <div class="timing-time">5:00 AM</div>
                <div class="timing-label">Mangala Aarti</div>
            </div>
            <div class="timing-item">
                <div class="timing-time">12:00 PM</div>
                <div class="timing-label">Madhyan Aarti</div>
            </div>
            <div class="timing-item">
                <div class="timing-time">7:00 PM</div>
                <div class="timing-label">Sandhya Aarti</div>
            </div>
            <div class="timing-item">
                <div class="timing-time">9:00 PM</div>
                <div class="timing-label">Shayan Aarti</div>
            </div>
        </div>
    </div>
</div>

<div class="trust-strip">
    <div class="marquee">
        <span class="marquee-item">🪔 150+ Years of Devotion</span>
        <span class="marquee-item">🙏 Free Daily Darshan</span>
        <span class="marquee-item">🍚 Community Annadaan</span>
        <span class="marquee-item">🎉 Festivals Celebrated Yearly</span>
        <span class="marquee-item">🕉️ Trust Registered</span>
        <span class="marquee-item">🪔 150+ Years of Devotion</span>
        <span class="marquee-item">🙏 Free Daily Darshan</span>
        <span class="marquee-item">🍚 Community Annadaan</span>
        <span class="marquee-item">🎉 Festivals Celebrated Yearly</span>
        <span class="marquee-item">🕉️ Trust Registered</span>
    </div>
</div>

<div class="split">
    <div class="split-photos anim-el anim-left reveal">
        <div class="split-photo">
            <img src="https://images.unsplash.com/photo-1590766940554-153e08a80c46?auto=format&fit=crop&w=500&q=75" alt="Temple architecture"/>
        </div>
        <div class="split-photo tall">
            <img src="https://images.unsplash.com/photo-1609619385076-36a873425636?auto=format&fit=crop&w=500&q=75" alt="Evening aarti"/>
        </div>
    </div>
    <div class="anim-el anim-right reveal">
        <p class="sec-label">Our tradition</p>
        <h2 class="split-title">Serving the community since 1874</h2>
        <p class="split-body">Shree Mandir has stood as a spiritual anchor for generations of families in Nagpur — hosting daily worship, community meals, and the city's most cherished festivals.</p>
        <div class="check-list">
            <div class="check-item"><span class="check-icon">✓</span> Free daily darshan open to all visitors</div>
            <div class="check-item"><span class="check-icon">✓</span> Daily community meal (Annadaan) service</div>
            <div class="check-item"><span class="check-icon">✓</span> Major festivals celebrated with full rituals</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <p class="sec-label">Daily rituals</p>
        <h2 class="sec-title">Complete Darshan Timings</h2>
    </div>
    <div class="schedule-list anim-stagger stagger">
        <div class="schedule-row anim-el anim-up">
            <div class="schedule-time">5:00 AM</div>
            <div><div class="schedule-name">Mangala Aarti</div><div class="schedule-desc">Morning prayer service — open to all devotees</div></div>
        </div>
        <div class="schedule-row anim-el anim-up">
            <div class="schedule-time">6:30 AM</div>
            <div><div class="schedule-name">Abhishek Pooja</div><div class="schedule-desc">Sacred bath ritual of the deity</div></div>
        </div>
        <div class="schedule-row anim-el anim-up">
            <div class="schedule-time">12:00 PM</div>
            <div><div class="schedule-name">Madhyan Aarti</div><div class="schedule-desc">Midday prayer, bhog offered to the deity</div></div>
        </div>
        <div class="schedule-row anim-el anim-up">
            <div class="schedule-time">7:00 PM</div>
            <div><div class="schedule-name">Sandhya Aarti</div><div class="schedule-desc">Evening prayer with prasad distribution</div></div>
        </div>
        <div class="schedule-row anim-el anim-up">
            <div class="schedule-time">9:00 PM</div>
            <div><div class="schedule-name">Shayan Aarti</div><div class="schedule-desc">Night prayer — temple closes at 9:30 PM</div></div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <p class="sec-label">Upcoming</p>
        <h2 class="sec-title">Events this Month</h2>
    </div>
    <div class="event-grid anim-stagger stagger">
        <div class="event-card anim-el anim-up">
            <div class="event-photo">🪔</div>
            <div class="event-body">
                <div class="event-date">14 Jan · Makar Sankranti</div>
                <div class="event-name">Special Sankranti Pooja</div>
                <div class="event-time">5:00 AM – 10:00 AM · All welcome</div>
            </div>
        </div>
        <div class="event-card anim-el anim-up">
            <div class="event-photo">🎭</div>
            <div class="event-body">
                <div class="event-date">26 Jan · Republic Day</div>
                <div class="event-name">Bhajan & Kirtan Sandhya</div>
                <div class="event-time">6:00 PM – 9:00 PM · Free entry</div>
            </div>
        </div>
        <div class="event-card anim-el anim-up">
            <div class="event-photo">🌸</div>
            <div class="event-body">
                <div class="event-date">29 Jan · Basant Panchami</div>
                <div class="event-name">Saraswati Pooja & Prasad</div>
                <div class="event-time">7:00 AM – 12:00 PM</div>
            </div>
        </div>
    </div>
</div>

<div class="testi">
    <p class="testi-quote">"My family has visited Shree Mandir for three generations. The sense of peace and community here is something we've never found anywhere else."</p>
    <p class="testi-author"><strong>Meera Deshpande</strong> — Devotee, Nagpur</p>
</div>

<div class="appt">
    <h2>Support our community initiatives</h2>
    <p>Your contribution helps us continue daily worship, Annadaan, and festival celebrations for the community.</p>
    <a href="#" class="appt-btn">Donate now</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">Shree Mandir</div>
            <p class="footer-desc">A center of spiritual life and community service in Nagpur since 1874.</p>
        </div>
        <div>
            <div class="footer-col-title">Visit</div>
            <div class="footer-links">
                <a href="#">Darshan Timings</a>
                <a href="#">Upcoming Events</a>
                <a href="#">Photo Gallery</a>
                <a href="#">How to Reach</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Get Involved</div>
            <div class="footer-links">
                <a href="#">Donate Online</a>
                <a href="#">Volunteer</a>
                <a href="#">Sponsor a Pooja</a>
                <a href="#">Annadaan Seva</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Mandir Road, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ info@shreemandir.org</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 Shree Mandir Trust, Nagpur</span>
        <span>Registered Trust</span>
    </div>
</footer>

</body>
</html>