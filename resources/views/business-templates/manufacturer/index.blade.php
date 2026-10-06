<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/manufacturer.css', 'resources/js/templates/manufacturer.js'])
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
    <div class="hnav-brand">IndusTech</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Capabilities</a>
        <a href="#">Certifications</a>
        <a href="#">Contact</a>
    </div>
    <a href="#" class="hnav-cta">Request Quote</a>
</nav>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">IndusTech</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Capabilities</a>
        <a href="#">Certifications</a>
        <a href="#">Contact</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">Request Quote</a>
    </div>
</div>

<section class="hero">
    <div class="hero-inner anim-el anim-up visible">
        <span class="eyebrow">ISO Certified Manufacturer · Since 1992</span>
        <h1 class="h1">Precision engineering at industrial scale</h1>
        <p class="body-text">IndusTech manufactures high-precision industrial components for automotive, aerospace, and construction sectors. ISO 9001:2015 certified, export-ready.</p>
        <div class="actions">
            <a href="#" class="btn-p">Request a quote</a>
            <a href="#" class="btn-s">Download catalogue</a>
        </div>
    </div>
</section>

<div class="cert-wrap">
    <div class="cert-float anim-stagger stagger reveal">
        <div class="cert-item anim-el anim-up">
            <div class="cert-icon">🏅</div>
            <div class="cert-title">ISO 9001:2015</div>
            <div class="cert-sub">Certified</div>
        </div>
        <div class="cert-item anim-el anim-up">
            <div class="cert-icon">✅</div>
            <div class="cert-title">CE Certified</div>
            <div class="cert-sub">EU Compliant</div>
        </div>
        <div class="cert-item anim-el anim-up">
            <div class="cert-icon">🇮🇳</div>
            <div class="cert-title">Make in India</div>
            <div class="cert-sub">100% domestic</div>
        </div>
        <div class="cert-item anim-el anim-up">
            <div class="cert-icon">🌍</div>
            <div class="cert-title">Export Approved</div>
            <div class="cert-sub">30+ countries</div>
        </div>
    </div>
</div>

<div class="trust-strip">
    <div class="marquee">
        <span class="marquee-item">⚙️ 30+ Years Manufacturing</span>
        <span class="marquee-item">🏭 3 Production Facilities</span>
        <span class="marquee-item">📦 500+ SKUs</span>
        <span class="marquee-item">🌍 Exports to 30+ Countries</span>
        <span class="marquee-item">✅ Zero Defect Policy</span>
        <span class="marquee-item">⚙️ 30+ Years Manufacturing</span>
        <span class="marquee-item">🏭 3 Production Facilities</span>
        <span class="marquee-item">📦 500+ SKUs</span>
        <span class="marquee-item">🌍 Exports to 30+ Countries</span>
        <span class="marquee-item">✅ Zero Defect Policy</span>
    </div>
</div>

<div class="split">
    <div class="split-photos anim-el anim-left reveal">
        <div class="split-photo">
            <img src="https://images.unsplash.com/photo-1565043589221-1a6fd9ae45c7?auto=format&fit=crop&w=500&q=75" alt="Factory floor"/>
        </div>
        <div class="split-photo tall">
            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af2176?auto=format&fit=crop&w=500&q=75" alt="Precision machinery"/>
        </div>
    </div>
    <div class="anim-el anim-right reveal">
        <p class="sec-label">Why manufacturers choose us</p>
        <h2 class="split-title">Engineered to exact tolerances</h2>
        <p class="split-body">Every component that leaves our facility passes through rigorous quality control — from CNC precision machining to final dimensional inspection.</p>
        <div class="check-list">
            <div class="check-item"><span class="check-icon">✓</span> CNC machining tolerance of ±0.01mm</div>
            <div class="check-item"><span class="check-icon">✓</span> In-house quality lab with full traceability</div>
            <div class="check-item"><span class="check-icon">✓</span> On-time delivery rate above 98%</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <p class="sec-label">Products</p>
        <h2 class="sec-title">Our product range</h2>
    </div>
    <div class="prod-grid anim-stagger stagger">
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">⚙️</div>
            <div class="prod-body">
                <div class="prod-cat">Automotive</div>
                <div class="prod-name">Precision Gears</div>
                <div class="prod-desc">CNC-machined steel gears for automotive drivetrains. Tolerance ±0.01mm.</div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🔩</div>
            <div class="prod-body">
                <div class="prod-cat">Fasteners</div>
                <div class="prod-name">High-Tensile Bolts</div>
                <div class="prod-desc">Grade 8.8 and 10.9 bolts in M6–M42. ISO 4014/4017 standard.</div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🔧</div>
            <div class="prod-body">
                <div class="prod-cat">Components</div>
                <div class="prod-name">Shaft Couplings</div>
                <div class="prod-desc">Rigid and flexible couplings for industrial motors and pumps.</div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🏗️</div>
            <div class="prod-body">
                <div class="prod-cat">Structural</div>
                <div class="prod-name">Steel Fabrication</div>
                <div class="prod-desc">Custom structural steel fabrication for construction and infrastructure.</div>
            </div>
        </div>
    </div>
</div>

<div class="process-bg">
    <div class="process-inner">
        <div class="section-header anim-el anim-up reveal">
            <p class="sec-label">How we work</p>
            <h2 class="sec-title">From spec to shipment</h2>
        </div>
        <div class="process-grid anim-stagger stagger">
            <div class="process-step anim-el anim-up">
                <div class="process-num">01</div>
                <div class="process-name">Design Review</div>
                <div class="process-desc">Our engineers review your specifications and confirm feasibility.</div>
            </div>
            <div class="process-step anim-el anim-up">
                <div class="process-num">02</div>
                <div class="process-name">Prototyping</div>
                <div class="process-desc">Sample units produced and dimensionally verified before full runs.</div>
            </div>
            <div class="process-step anim-el anim-up">
                <div class="process-num">03</div>
                <div class="process-name">Production</div>
                <div class="process-desc">Full-scale manufacturing with in-line quality checkpoints.</div>
            </div>
            <div class="process-step anim-el anim-up">
                <div class="process-num">04</div>
                <div class="process-name">QC & Dispatch</div>
                <div class="process-desc">Final inspection, documentation, and on-time dispatch.</div>
            </div>
        </div>
    </div>
</div>

<div class="appt">
    <h2>Request a quote today</h2>
    <p>Send us your specifications and we'll respond within 24 hours with pricing and lead times.</p>
    <a href="#" class="appt-btn">Get a quote</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">IndusTech</div>
            <p class="footer-desc">Precision manufacturing in Nagpur since 1992. ISO 9001:2015 certified, exporting to 30+ countries.</p>
        </div>
        <div>
            <div class="footer-col-title">Products</div>
            <div class="footer-links">
                <a href="#">Precision Gears</a>
                <a href="#">Fasteners</a>
                <a href="#">Shaft Couplings</a>
                <a href="#">Steel Fabrication</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Capabilities</a>
                <a href="#">Certifications</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 MIDC Industrial Area, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ sales@industech.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 IndusTech Manufacturing, Nagpur</span>
        <span>GST: 27XXXXX1234Z1ZX</span>
    </div>
</footer>

</body>
</html>