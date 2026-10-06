<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/hospital.css', 'resources/js/templates/hospital.js'])
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
    <button class="mobile-menu-btn" onclick="document.querySelector('.mobile-drawer').classList.add('open'); document.querySelector('.menu-overlay').classList.add('open');">☰</button>
    <div class="hnav-brand">🏥 CarePoint</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Departments</a>
        <a href="#">Doctors</a>
        <a href="#">Appointments</a>
        <a href="#">Emergency</a>
    </div>
    <a href="#" class="hnav-cta">Book Appointment</a>
</nav>

<!-- Premium Mobile Drawer -->
<div class="menu-overlay" onclick="document.querySelector('.mobile-drawer').classList.remove('open'); document.querySelector('.menu-overlay').classList.remove('open');"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">🏥 CarePoint</div>
        <button class="mobile-drawer-close" onclick="document.querySelector('.mobile-drawer').classList.remove('open'); document.querySelector('.menu-overlay').classList.remove('open');">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Departments</a>
        <a href="#">Doctors</a>
        <a href="#">Appointments</a>
        <a href="#">Emergency</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p" style="display: block; text-align: center;">Book Appointment</a>
    </div>
</div>

<section class="hero">
    <div class="hero-bg" id="hero-parallax"></div>
    <div class="hero-inner">
        <span class="eyebrow anim-el anim-up"><span class="eyebrow-dot"></span> Multi-Speciality Care · Est. 1998</span>
        <h1 class="h1 anim-el anim-up" style="transition-delay: 0.1s;">Your health is our highest priority</h1>
        <p class="body-text anim-el anim-up" style="transition-delay: 0.2s;">World-class medical care across 18 specialities. Expert doctors, modern equipment, and compassionate staff — all under one roof in Nagpur.</p>
        <div class="actions anim-el anim-up" style="transition-delay: 0.3s;">
            <a href="#" class="btn-p">Book an appointment →</a>
            <a href="#" class="btn-s">View departments</a>
        </div>
    </div>
</section>

<!-- Stats uses stats-container to trigger the JS counter -->
<div class="stat-float-wrap">
    <div class="stat-float stats-container anim-stagger">
        <div class="stat-float-item anim-el anim-up">
            <div class="stat-float-num" data-val="18" data-suffix="+">0+</div>
            <div class="stat-float-lbl">Specialities</div>
        </div>
        <div class="stat-float-item anim-el anim-up">
            <div class="stat-float-num" data-val="120" data-suffix="+">0+</div>
            <div class="stat-float-lbl">Expert doctors</div>
        </div>
        <div class="stat-float-item anim-el anim-up">
            <div class="stat-float-num" data-val="50" data-suffix="k+">0k+</div>
            <div class="stat-float-lbl">Patients served</div>
        </div>
        <div class="stat-float-item anim-el anim-up">
            <div class="stat-float-num" data-val="24" data-suffix="/7">0/7</div>
            <div class="stat-float-lbl">Emergency care</div>
        </div>
    </div>
</div>

<div class="trust-strip">
    <div class="marquee">
        <span class="marquee-item">🏅 NABH Accredited</span>
        <span class="marquee-item">🔬 ISO 9001:2015</span>
        <span class="marquee-item">❤️ 50,000+ Patients Treated</span>
        <span class="marquee-item">🏥 18 Specialities</span>
        <span class="marquee-item">👨‍⚕️ 120+ Expert Doctors</span>
        <!-- Duplicated for seamless loop -->
        <span class="marquee-item">🏅 NABH Accredited</span>
        <span class="marquee-item">🔬 ISO 9001:2015</span>
        <span class="marquee-item">❤️ 50,000+ Patients Treated</span>
        <span class="marquee-item">🏥 18 Specialities</span>
        <span class="marquee-item">👨‍⚕️ 120+ Expert Doctors</span>
    </div>
</div>

<div class="split">
    <div class="split-photos anim-el anim-left">
        <div class="split-photo">
            <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=500&q=80" alt="Hospital corridor"/>
        </div>
        <div class="split-photo tall">
            <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=500&q=80" alt="Medical equipment"/>
        </div>
    </div>
    <div class="anim-el anim-right">
        <p class="sec-label">Why choose us</p>
        <h2 class="split-title">Modern medicine, <em>delivered with care</em></h2>
        <p class="split-body">Every department at CarePoint is equipped with the latest diagnostic and treatment technology, staffed by specialists who treat every patient like family.</p>
        <div class="check-list">
            <div class="check-item"><span class="check-icon">✓</span> Board-certified specialists across 18 departments</div>
            <div class="check-item"><span class="check-icon">✓</span> 24/7 emergency and trauma care</div>
            <div class="check-item"><span class="check-icon">✓</span> Cashless insurance with 40+ providers</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up">
        <p class="sec-label">Our departments</p>
        <h2 class="sec-title">Specialised care for every need</h2>
    </div>
    <div class="dept-grid anim-stagger">
        <div class="dept-card anim-el anim-up"><div class="dept-icon">❤️</div><div class="dept-name">Cardiology</div><div class="dept-count">8 specialists</div></div>
        <div class="dept-card anim-el anim-up"><div class="dept-icon">🧠</div><div class="dept-name">Neurology</div><div class="dept-count">5 specialists</div></div>
        <div class="dept-card anim-el anim-up"><div class="dept-icon">🦷</div><div class="dept-name">Dental</div><div class="dept-count">6 specialists</div></div>
        <div class="dept-card anim-el anim-up"><div class="dept-icon">👁️</div><div class="dept-name">Ophthalmology</div><div class="dept-count">4 specialists</div></div>
        <div class="dept-card anim-el anim-up"><div class="dept-icon">🦴</div><div class="dept-name">Orthopaedics</div><div class="dept-count">7 specialists</div></div>
        <div class="dept-card anim-el anim-up"><div class="dept-icon">🩺</div><div class="dept-name">General Medicine</div><div class="dept-count">12 specialists</div></div>
        <div class="dept-card anim-el anim-up"><div class="dept-icon">🤱</div><div class="dept-name">Gynaecology</div><div class="dept-count">6 specialists</div></div>
        <div class="dept-card anim-el anim-up"><div class="dept-icon">👶</div><div class="dept-name">Paediatrics</div><div class="dept-count">5 specialists</div></div>
    </div>
</div>

<div class="doc-bg">
    <div class="section-header anim-el anim-up">
        <p class="sec-label">Our doctors</p>
        <h2 class="sec-title">Meet our specialists</h2>
    </div>
    <div class="doc-grid anim-stagger">
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80" alt="Dr. Ramesh Kulkarni"/></div>
            <div class="doc-info">
                <div class="doc-name">Dr. Ramesh Kulkarni</div>
                <div class="doc-spec">Cardiologist</div>
                <div class="doc-exp">22 years experience</div>
            </div>
        </div>
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=400&q=80" alt="Dr. Priya Sharma"/></div>
            <div class="doc-info">
                <div class="doc-name">Dr. Priya Sharma</div>
                <div class="doc-spec">Neurologist</div>
                <div class="doc-exp">18 years experience</div>
            </div>
        </div>
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=400&q=80" alt="Dr. Anil Mehta"/></div>
            <div class="doc-info">
                <div class="doc-name">Dr. Anil Mehta</div>
                <div class="doc-spec">Orthopaedic</div>
                <div class="doc-exp">15 years experience</div>
            </div>
        </div>
        <div class="doc-card anim-el anim-up">
            <div class="doc-photo"><img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=400&q=80" alt="Dr. Sunita Patil"/></div>
            <div class="doc-info">
                <div class="doc-name">Dr. Sunita Patil</div>
                <div class="doc-spec">Gynaecologist</div>
                <div class="doc-exp">20 years experience</div>
            </div>
        </div>
    </div>
</div>

<div class="testi anim-el anim-up">
    <p class="testi-quote">"CarePoint saved my father's life during a cardiac emergency. The doctors and staff were incredibly professional and compassionate throughout."</p>
    <p class="testi-author"><strong>Rohit Deshmukh</strong> — Patient family, Nagpur</p>
</div>

<div class="appt anim-el anim-up">
    <h2>Book your appointment today</h2>
    <p>Available Monday to Saturday, 8 AM to 8 PM. Emergency services 24/7.</p>
    <a href="#" class="appt-btn">Book now →</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">🏥 CarePoint Hospital</div>
            <p class="footer-desc">Multi-speciality healthcare in Nagpur since 1998. Trusted by 50,000+ patients across Maharashtra.</p>
        </div>
        <div>
            <div class="footer-col-title">Departments</div>
            <div class="footer-links">
                <a href="#">Cardiology</a>
                <a href="#">Neurology</a>
                <a href="#">Orthopaedics</a>
                <a href="#">Paediatrics</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Our Doctors</a>
                <a href="#">Appointments</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 12 Civil Lines, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ info@carepoint.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 CarePoint Hospital, Nagpur</span>
        <span>Emergency: +91 98765 43210</span>
    </div>
</footer>
</body>
</html>