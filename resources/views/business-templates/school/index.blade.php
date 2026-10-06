<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/school.css', 'resources/js/templates/school.js'])
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
    <div class="hnav-brand">🏫 Sunrise School</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Academics</a>
        <a href="#">Admissions</a>
        <a href="#">Faculty</a>
        <a href="#">Events</a>
    </div>
    <a href="#" class="hnav-cta">Apply Now</a>
</nav>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">🏫 Sunrise</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Academics</a>
        <a href="#">Admissions</a>
        <a href="#">Faculty</a>
        <a href="#">Events</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">Apply Now</a>
    </div>
</div>

<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-inner anim-el anim-up visible">
        <span class="eyebrow"><span class="eyebrow-dot"></span> CBSE Affiliated · Since 1985</span>
        <h1 class="h1">Shaping futures,<br><em>one student at a time</em></h1>
        <p class="body-text">Sunrise Public School has been delivering exceptional education for 40 years. We nurture academic excellence, character, and creativity in every child.</p>
        <div class="actions">
            <a href="#" class="btn-p">Apply for 2025-26 →</a>
            <a href="#" class="btn-s">Download prospectus</a>
        </div>
    </div>
</section>

<!-- Reactivated Floating Stats -->
<div class="stat-float-wrap anim-el anim-up reveal">
    <div class="stat-float">
        <div class="stat-float-item">
            <div class="stat-float-num">98%</div>
            <div class="stat-float-lbl">Pass Rate</div>
        </div>
        <div class="stat-float-item">
            <div class="stat-float-num">450+</div>
            <div class="stat-float-lbl">Students</div>
        </div>
        <div class="stat-float-item">
            <div class="stat-float-num">40</div>
            <div class="stat-float-lbl">Years</div>
        </div>
        <div class="stat-float-item">
            <div class="stat-float-num">60+</div>
            <div class="stat-float-lbl">Teachers</div>
        </div>
    </div>
</div>


<div class="split">
    <div class="split-photos anim-el anim-left reveal">
        <div class="split-photo">
            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=500&q=75" alt="School classroom"/>
        </div>
        <div class="split-photo tall">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=500&q=75" alt="Students learning"/>
        </div>
    </div>
    <div class="anim-el anim-right reveal">
        <p class="sec-label">Why choose us</p>
        <h2 class="split-title">Excellence built on<br><em>40 years of trust</em></h2>
        <p class="split-body">Sunrise Public School combines a rigorous CBSE curriculum with holistic development — sports, arts, and technology — to prepare students for life, not just exams.</p>
        <div class="check-list">
            <div class="check-item"><span class="check-icon">✓</span> Experienced, qualified faculty across all subjects</div>
            <div class="check-item"><span class="check-icon">✓</span> Smart classrooms with modern teaching technology</div>
            <div class="check-item"><span class="check-icon">✓</span> Strong track record of board exam results</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up reveal">
        <p class="sec-label">Our programmes</p>
        <h2 class="sec-title">Academic Streams</h2>
    </div>
    <div class="course-grid anim-stagger stagger">
        <div class="course-card anim-el anim-up">
            <div class="course-tag">Primary (I–V)</div>
            <div class="course-name">Foundation Years</div>
            <div class="course-desc">Holistic learning with focus on literacy, numeracy, and creative development through activity-based teaching.</div>
        </div>
        <div class="course-card anim-el anim-up">
            <div class="course-tag">Middle (VI–VIII)</div>
            <div class="course-name">Discovery Years</div>
            <div class="course-desc">Structured academics with introduction to Science, Mathematics, Social Studies, and Language Arts.</div>
        </div>
        <div class="course-card anim-el anim-up">
            <div class="course-tag">Senior (IX–XII)</div>
            <div class="course-name">Excellence Years</div>
            <div class="course-desc">Board exam preparation with Science, Commerce, and Humanities streams. Career counselling included.</div>
        </div>
    </div>
</div>

<div class="doc-bg">
    <div class="section-header anim-el anim-up reveal">
        <p class="sec-label">Our faculty</p>
        <h2 class="sec-title">Meet our Teachers</h2>
    </div>
    <div class="doc-grid anim-stagger stagger">
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?auto=format&fit=crop&w=400&q=75" alt="Mrs. Anjali Deshmukh"/></div>
            <div class="doc-info">
                <div class="doc-name">Mrs. Anjali Deshmukh</div>
                <div class="doc-spec">Principal</div>
                <div class="doc-exp">25 years experience</div>
            </div>
        </div>
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=400&q=75" alt="Mr. Vivek Rao"/></div>
            <div class="doc-info">
                <div class="doc-name">Mr. Vivek Rao</div>
                <div class="doc-spec">Head of Science</div>
                <div class="doc-exp">18 years experience</div>
            </div>
        </div>
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=400&q=75" alt="Mrs. Kavita Joshi"/></div>
            <div class="doc-info">
                <div class="doc-name">Mrs. Kavita Joshi</div>
                <div class="doc-spec">Head of Mathematics</div>
                <div class="doc-exp">15 years experience</div>
            </div>
        </div>
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=75" alt="Mr. Sameer Khan"/></div>
            <div class="doc-info">
                <div class="doc-name">Mr. Sameer Khan</div>
                <div class="doc-spec">Sports Director</div>
                <div class="doc-exp">12 years experience</div>
            </div>
        </div>
    </div>
</div>

<div class="testi">
    <p class="testi-quote">"Sunrise gave my daughter the confidence and academic foundation she needed. The teachers genuinely care about every student's growth."</p>
    <p class="testi-author"><strong>Meera Kulkarni</strong> — Parent, Nagpur</p>
</div>

<div class="appt">
    <h2>Admissions open for 2025-26</h2>
    <p>Limited seats available. Apply early to secure your child's future.</p>
    <a href="#" class="appt-btn">Apply now →</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">🏫 Sunrise School</div>
            <p class="footer-desc">CBSE-affiliated school in Nagpur since 1985. Trusted by 450+ families for quality education.</p>
        </div>
        <div>
            <div class="footer-col-title">Academics</div>
            <div class="footer-links">
                <a href="#">Primary School</a>
                <a href="#">Middle School</a>
                <a href="#">Senior School</a>
                <a href="#">Curriculum</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Our Faculty</a>
                <a href="#">Admissions</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Ramdaspeth, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ admissions@sunriseschool.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 Sunrise Public School, Nagpur</span>
        <span>Admissions: +91 98765 43210</span>
    </div>
</footer>

</body>
</html>