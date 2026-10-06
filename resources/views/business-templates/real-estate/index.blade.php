<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/real-estate.css', 'resources/js/templates/real-estate.js'])
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
    <div class="hnav-brand">ProProperty</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Buy</a>
        <a href="#">Rent</a>
        <a href="#">Agents</a>
        <a href="#">About</a>
    </div>
    <a href="#" class="hnav-cta">List your property</a>
</nav>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">ProProperty</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Buy</a>
        <a href="#">Rent</a>
        <a href="#">Agents</a>
        <a href="#">About</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">List your property</a>
    </div>
</div>

<section class="hero">
    <div class="hero-inner anim-el anim-up visible">
        <span class="eyebrow">Trusted · Transparent · Fast</span>
        <h1 class="h1">Find your perfect property in Nagpur</h1>
        <p class="body-text">500+ verified listings across Nagpur and Maharashtra. Zero brokerage surprises, ever.</p>
        <div class="search-bar">
            <div class="search-field">
                <div class="search-field-label">Property type</div>
                <select><option>All types</option><option>Apartment</option><option>House</option><option>Plot</option></select>
            </div>
            <div class="search-field">
                <div class="search-field-label">Location</div>
                <select><option>All Nagpur</option><option>Civil Lines</option><option>Dharampeth</option></select>
            </div>
            <div class="search-field">
                <div class="search-field-label">Budget</div>
                <select><option>Any budget</option><option>Under ₹30L</option><option>₹30L–60L</option></select>
            </div>
            <button class="search-btn">Search</button>
        </div>
    </div>
</section>

<!-- NO ANIMATION CLASSES HERE (As requested by Screenshots) -->
<div class="stats-strip">
    <div class="stats-inner">
        <div class="stat"><div class="stat-num">500+</div><div class="stat-lbl">Active listings</div></div>
        <div class="stat"><div class="stat-num">15+</div><div class="stat-lbl">Years in Nagpur</div></div>
        <div class="stat"><div class="stat-num">0%</div><div class="stat-lbl">Hidden brokerage</div></div>
        <div class="stat"><div class="stat-num">4.8★</div><div class="stat-lbl">Client rating</div></div>
    </div>
</div>

<div class="split">
    <!-- Map uses the new soft zoom -->
    <div class="split-map-wrap anim-el anim-zoom reveal">
        <img src="assets/screenshots/map.png" alt="Nagpur city map view"/>
        <div class="map-pin p1"></div>
        <div class="map-pin p2"></div>
        <div class="map-pin p3"></div>
    </div>
    
    <!-- Text side uses a staggered cascade -->
    <div class="anim-stagger stagger">
        <p class="sec-label anim-el anim-up">Why choose us</p>
        <h2 class="split-title anim-el anim-up">Local expertise, city-wide reach</h2>
        <p class="split-body anim-el anim-up">We've mapped every neighbourhood in Nagpur so you don't have to guess. Every listing is personally verified by our team before it goes live.</p>
        <div class="check-list">
            <div class="check-item anim-el anim-up"><span class="check-icon">✓</span> Every property physically verified before listing</div>
            <div class="check-item anim-el anim-up"><span class="check-icon">✓</span> Zero hidden brokerage or agent fees</div>
            <div class="check-item anim-el anim-up"><span class="check-icon">✓</span> Dedicated agent support through closing</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <h2 class="sec-title">Featured listings</h2>
        <div class="tab-filters">
            <div class="tab-filter active">All</div>
            <div class="tab-filter">Buy</div>
            <div class="tab-filter">Rent</div>
        </div>
    </div>
    <div class="listing-grid anim-stagger stagger">
        <div class="listing-card listing-feature anim-el anim-up">
            <div class="listing-photo">
                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?auto=format&fit=crop&w=700&q=75" alt="Villa"/>
                <div class="listing-tag">New Launch</div>
                <div class="listing-fav">♡</div>
            </div>
            <div class="listing-body">
                <div class="listing-price">₹1.2 Crore</div>
                <div class="listing-name">4 BHK Villa, Wardhaman Nagar</div>
                <div class="listing-meta"><span>🛏 4 Beds</span><span>🛁 3 Baths</span><span>📐 2,400 sq ft</span></div>
            </div>
        </div>
        <div class="listing-card anim-el anim-up">
            <div class="listing-photo">
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=500&q=75" alt="Apartment"/>
                <div class="listing-tag">For Sale</div>
                <div class="listing-fav">♡</div>
            </div>
            <div class="listing-body">
                <div class="listing-price">₹65 Lakhs</div>
                <div class="listing-name">3 BHK, Dharampeth</div>
                <div class="listing-meta"><span>🛏 3</span><span>🛁 2</span><span>📐 1,200 sq ft</span></div>
            </div>
        </div>
        <div class="listing-card anim-el anim-up">
            <div class="listing-photo">
                <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=500&q=75" alt="Rental home"/>
                <div class="listing-tag">For Rent</div>
                <div class="listing-fav">♡</div>
            </div>
            <div class="listing-body">
                <div class="listing-price">₹18,000/mo</div>
                <div class="listing-name">2 BHK, Civil Lines</div>
                <div class="listing-meta"><span>🛏 2</span><span>🛁 1</span><span>📐 850 sq ft</span></div>
            </div>
        </div>
    </div>
</div>

<div class="agents-bg">
    <div class="agents-inner">
        <div class="anim-el anim-up reveal">
            <p class="sec-label">Our team</p>
            <h2 class="sec-title">Meet our agents</h2>
        </div>
        <div class="agent-row anim-stagger stagger">
            <div class="agent-badge anim-el anim-up">
                <div class="agent-avatar"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=200&q=75" alt="Vikram Deshmukh"/></div>
                <div class="agent-name">Vikram Deshmukh</div>
                <div class="agent-role">Senior Agent</div>
            </div>
            <div class="agent-badge anim-el anim-up">
                <div class="agent-avatar"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=200&q=75" alt="Kavita Rao"/></div>
                <div class="agent-name">Kavita Rao</div>
                <div class="agent-role">Residential Specialist</div>
            </div>
            <div class="agent-badge anim-el anim-up">
                <div class="agent-avatar"><img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&fit=crop&w=200&q=75" alt="Sanjay Bhosale"/></div>
                <div class="agent-name">Sanjay Bhosale</div>
                <div class="agent-role">Commercial Agent</div>
            </div>
            <div class="agent-badge anim-el anim-up">
                <div class="agent-avatar"><img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=200&q=75" alt="Neha Agarwal"/></div>
                <div class="agent-name">Neha Agarwal</div>
                <div class="agent-role">Luxury Properties</div>
            </div>
        </div>
    </div>
</div>

<!-- NO ANIMATION CLASSES HERE (As requested by Screenshots) -->
<div class="appt">
    <h2>Ready to find your next home?</h2>
    <p>Browse 500+ verified listings or talk to one of our agents today.</p>
    <a href="#" class="appt-btn">Browse listings</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">ProProperty</div>
            <p class="footer-desc">Nagpur's trusted real estate marketplace. 500+ verified listings, zero hidden fees.</p>
        </div>
        <div>
            <div class="footer-col-title">Explore</div>
            <div class="footer-links">
                <a href="#">Buy a Home</a>
                <a href="#">Rent a Home</a>
                <a href="#">Sell Property</a>
                <a href="#">New Launches</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Our Agents</a>
                <a href="#">Careers</a>
                <a href="#">Blog</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Civil Lines, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ info@proproperty.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2025 ProProperty, Nagpur</span>
        <span>RERA Reg: MH-12345</span>
    </div>
</footer>

</body>
</html>