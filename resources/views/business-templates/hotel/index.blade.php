<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/hotel.css', 'resources/js/templates/hotel.js'])
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

<section class="hero">
    <nav class="hnav">
        <button class="mobile-menu-btn" aria-label="Open menu">☰</button>
        <div class="hnav-brand">Grand Stay Hotel</div>
        <div class="hnav-links">
            <a href="#">Home</a>
            <a href="#">Departments</a>
            <a href="#">Doctors</a>
            <a href="#">Appointments</a>
            <a href="#">Emergency</a>
        </div>
        <a href="#" class="hnav-cta">Book Appointment</a>
    </nav>

    <div class="menu-overlay"></div>
    <div class="mobile-drawer">
        <div class="mobile-drawer-header">
            <div class="mobile-drawer-brand">Grand Stay Hotel</div>
            <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
        </div>
        <div class="mobile-drawer-links">
            <a href="#">Home</a>
            <a href="#">Departments</a>
            <a href="#">Doctors</a>
            <a href="#">Appointments</a>
            <a href="#">Emergency</a>
        </div>
        <div class="mobile-drawer-cta">
            <a href="#" class="btn-p">Book Appointment</a>
        </div>
    </div>

    <!-- Added reveal to hero content -->
    <div class="hero-inner reveal">
        <span class="eyebrow">Welcome to Nagpur</span>
        <h1 class="h1">A sanctuary of<br/>refined luxury.</h1>
        <p class="body-text">Experience timeless elegance and uncompromised hospitality in the heart of the city.</p>
        <div class="actions">
            <a href="#" class="btn-p">Discover our rooms</a>
        </div>
    </div>
</section>

<!-- Added reveal to book widget -->
<div class="book-wrap reveal">
    <div class="book-widget">
        <div class="book-field">
            <div class="book-label">Check in</div>
            <div class="book-value"><input type="text" value="14 Feb 2025" readonly/></div>
        </div>
        <div class="book-field">
            <div class="book-label">Check out</div>
            <div class="book-value"><input type="text" value="16 Feb 2025" readonly/></div>
        </div>
        <div class="book-field">
            <div class="book-label">Guests</div>
            <div class="book-value">
                <select>
                    <option>2 Adults, 1 Room</option>
                    <option>2 Adults, 2 Children</option>
                    <option>4 Adults, 2 Rooms</option>
                </select>
            </div>
        </div>
        <button class="book-btn">Check availability</button>
    </div>
</div>

<div class="amenity-strip">
    <div class="amenity-row stagger">
        <div class="amenity-item"><div class="amenity-icon">🏊</div><div class="amenity-name">Swimming pool</div></div>
        <div class="amenity-item"><div class="amenity-icon">💆</div><div class="amenity-name">Spa & wellness</div></div>
        <div class="amenity-item"><div class="amenity-icon">🍴</div><div class="amenity-name">Fine dining</div></div>
        <div class="amenity-item"><div class="amenity-icon">💼</div><div class="amenity-name">Conference rooms</div></div>
        <div class="amenity-item"><div class="amenity-icon">🚗</div><div class="amenity-name">Valet parking</div></div>
    </div>
</div>

<div class="split">
    <div class="split-photos reveal">
        <div class="split-photo split-photo-main">
            <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=700&q=75" alt="Hotel lobby"/>
        </div>
        <div class="split-photo split-photo-accent">
            <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=500&q=75" alt="Hotel pool"/>
        </div>
    </div>
    <div class="reveal">
        <p class="sec-label">The Grand Stay experience</p>
        <h2 class="split-title">A stay designed around you</h2>
        <p class="split-body">From the moment you arrive, every detail is considered — personalised check-in, curated room amenities, and a concierge team available around the clock.</p>
        <div class="check-list stagger">
            <div class="check-item"><span class="check-icon">✓</span> Complimentary breakfast with every stay</div>
            <div class="check-item"><span class="check-icon">✓</span> 24-hour concierge and room service</div>
            <div class="check-item"><span class="check-icon">✓</span> Free high-speed WiFi throughout</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header reveal">
        <h2 class="sec-title">Choose your room</h2>
    </div>
    <div class="room-scroll stagger">
        <div class="room-card">
            <div class="room-photo">
                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=500&q=75" alt="Deluxe room"/>
                <div class="room-price-tag">₹3,500 <span>/night</span></div>
            </div>
            <div class="room-info">
                <div class="room-name">Deluxe Room</div>
                <div class="room-feat">King bed · City view · 280 sq ft</div>
            </div>
        </div>
        <div class="room-card">
            <div class="room-photo">
                <img src="https://images.unsplash.com/photo-1591088398332-8a7791972843?auto=format&fit=crop&w=500&q=75" alt="Executive suite"/>
                <div class="room-price-tag">₹5,500 <span>/night</span></div>
            </div>
            <div class="room-info">
                <div class="room-name">Executive Suite</div>
                <div class="room-feat">Separate living · Pool view · 480 sq ft</div>
            </div>
        </div>
        <div class="room-card">
            <div class="room-photo">
                <img src="https://images.unsplash.com/photo-1611048268330-53de574cae3b?auto=format&fit=crop&w=500&q=75" alt="Presidential suite"/>
                <div class="room-price-tag">₹9,000 <span>/night</span></div>
            </div>
            <div class="room-info">
                <div class="room-name">Presidential Suite</div>
                <div class="room-feat">Full floor · Panoramic · 900 sq ft</div>
            </div>
        </div>
        <div class="room-card">
            <div class="room-photo">
                <img src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061?auto=format&fit=crop&w=500&q=75" alt="Family room"/>
                <div class="room-price-tag">₹4,200 <span>/night</span></div>
            </div>
            <div class="room-info">
                <div class="room-name">Family Room</div>
                <div class="room-feat">Two queen beds · Garden view · 360 sq ft</div>
            </div>
        </div>
    </div>
</div>

<div class="testi reveal">
    <div class="testi-mark">"</div>
    <p class="testi-quote">Celebrated our anniversary here. The staff went above and beyond to make every moment special — truly a five-star experience.</p>
    <p class="testi-author"><strong>Sneha & Vikram Patil</strong> — Anniversary stay</p>
</div>

<div class="appt">
    <h2>Plan your perfect stay</h2>
    <p>Book directly for best rates and complimentary room upgrades when available.</p>
    <a href="#" class="appt-btn">Book now</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">Grand Stay Hotel</div>
            <p class="footer-desc">5-star luxury hospitality in the heart of Nagpur since 2010.</p>
        </div>
        <div>
            <div class="footer-col-title">Rooms</div>
            <div class="footer-links">
                <a href="#">Deluxe Room</a>
                <a href="#">Executive Suite</a>
                <a href="#">Presidential Suite</a>
                <a href="#">Family Room</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Amenities</a>
                <a href="#">Gallery</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Civil Lines, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ reservations@grandstay.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 Grand Stay Hotel, Nagpur</span>
        <span>Reservations: +91 98765 43210</span>
    </div>
</footer>

</body>
</html>