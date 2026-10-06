<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/restaurant.css', 'resources/js/templates/restaurant.js'])
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
    <div class="hnav-brand">Spice Garden</div>
    <div class="hnav-links">
        <a href="#">Home</a>
        <a href="#">Menu</a>
        <a href="#">Reservations</a>
        <a href="#">Gallery</a>
        <a href="#">About</a>
    </div>
    <a href="#" class="hnav-cta">Reserve a table</a>
</nav>

<!-- Premium Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">Spice Garden</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">Home</a>
        <a href="#">Menu</a>
        <a href="#">Reservations</a>
        <a href="#">Gallery</a>
        <a href="#">About</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p" style="display: block; text-align: center;">Reserve a table</a>
    </div>
</div>

<section class="hero">
    <div class="hero-bg" id="hero-parallax"></div>
    <div class="hero-inner">
        <span class="eyebrow anim-el anim-up">Authentic Indian Cuisine · Est. 2010</span>
        <h1 class="h1 anim-el anim-up" style="transition-delay: 0.15s;">Where every meal<br/>tells a story</h1>
        <p class="body-text anim-el anim-up" style="transition-delay: 0.3s;">Spice Garden brings the rich culinary traditions of Maharashtra to your table. Handcrafted recipes, fresh ingredients, warm hospitality.</p>
        <div class="actions anim-el anim-up" style="transition-delay: 0.45s;">
            <a href="#" class="btn-p">Reserve a table</a>
            <a href="#" class="btn-s">View our menu</a>
        </div>
    </div>
</section>

<!-- Floating Info Cards -->
<div class="info-wrap anim-el anim-up" style="transition-delay: 0.6s;">
    <div class="info-card anim-stagger">
        <div class="info-item anim-el anim-up">
            <div class="info-icon">🕐</div>
            <div class="info-title">Open daily</div>
            <div class="info-sub">12 PM – 11 PM</div>
        </div>
        <div class="info-item anim-el anim-up">
            <div class="info-icon">📍</div>
            <div class="info-title">Civil Lines</div>
            <div class="info-sub">Nagpur, Maharashtra</div>
        </div>
        <div class="info-item anim-el anim-up">
            <div class="info-icon">📞</div>
            <div class="info-title">Reservations</div>
            <div class="info-sub">+91 98765 43210</div>
        </div>
    </div>
</div>

<div class="trust-strip">
    <div class="marquee">
        <span class="marquee-item">🌶️ Authentic Recipes</span>
        <span class="marquee-item">🌿 Fresh Daily Ingredients</span>
        <span class="marquee-item">⭐ 4.8 Rated on Zomato</span>
        <span class="marquee-item">🍽️ Private Dining Available</span>
        <span class="marquee-item">🚗 Home Delivery</span>
        <!-- Duplicated for seamless loop -->
        <span class="marquee-item">🌶️ Authentic Recipes</span>
        <span class="marquee-item">🌿 Fresh Daily Ingredients</span>
        <span class="marquee-item">⭐ 4.8 Rated on Zomato</span>
        <span class="marquee-item">🍽️ Private Dining Available</span>
        <span class="marquee-item">🚗 Home Delivery</span>
    </div>
</div>

<div class="split">
    <div class="split-photos anim-el anim-left">
        <div class="split-photo-round">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80" alt="Restaurant interior"/>
        </div>
        <div class="split-photo-polaroid" id="polaroid-parallax">
            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=400&q=80" alt="Chef cooking"/>
            <div class="split-photo-polaroid-caption">— from our kitchen</div>
        </div>
    </div>
    <div class="split-content anim-el anim-right">
        <p class="sec-label">Our story</p>
        <h2 class="split-title">Recipes passed down,<br/>flavours perfected</h2>
        <p class="split-body">Every dish at Spice Garden is rooted in traditional Maharashtrian cooking, refined over 15 years by our head chef using recipes from his grandmother's kitchen.</p>
        <div class="check-list">
            <div class="check-item"><span class="check-icon">✓</span> Fresh ingredients sourced daily from local markets</div>
            <div class="check-item"><span class="check-icon">✓</span> Traditional clay-oven and slow-cook techniques</div>
            <div class="check-item"><span class="check-icon">✓</span> Private dining rooms for special occasions</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header anim-el anim-up">
        <p class="sec-label">Today's specialities</p>
        <h2 class="sec-title">From our kitchen</h2>
    </div>
    <div class="menu-list anim-stagger">
        <div class="menu-row anim-el anim-up">
            <div class="menu-thumb"><img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?auto=format&fit=crop&w=200&q=80" alt="Dal Makhani"/></div>
            <div class="menu-row-main">
                <div class="menu-row-top">
                    <span class="menu-row-name">Dal Makhani</span>
                    <span class="menu-row-badge">Chef's special</span>
                    <span class="menu-row-leader"></span>
                    <span class="menu-row-price">₹220</span>
                </div>
                <div class="menu-row-desc">Slow-cooked black lentils in rich tomato-butter gravy.</div>
            </div>
        </div>
        <div class="menu-row anim-el anim-up">
            <div class="menu-thumb"><img src="https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?auto=format&fit=crop&w=200&q=80" alt="Butter Chicken"/></div>
            <div class="menu-row-main">
                <div class="menu-row-top">
                    <span class="menu-row-name">Butter Chicken</span>
                    <span class="menu-row-badge">Popular</span>
                    <span class="menu-row-leader"></span>
                    <span class="menu-row-price">₹320</span>
                </div>
                <div class="menu-row-desc">Tender chicken in velvety tomato-cream sauce.</div>
            </div>
        </div>
        <div class="menu-row anim-el anim-up">
            <div class="menu-thumb"><img src="https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?auto=format&fit=crop&w=200&q=80" alt="Paneer Tikka"/></div>
            <div class="menu-row-main">
                <div class="menu-row-top">
                    <span class="menu-row-name">Paneer Tikka</span>
                    <span class="menu-row-badge">Vegetarian</span>
                    <span class="menu-row-leader"></span>
                    <span class="menu-row-price">₹280</span>
                </div>
                <div class="menu-row-desc">Marinated cottage cheese grilled in tandoor.</div>
            </div>
        </div>
        <div class="menu-row anim-el anim-up">
            <div class="menu-thumb"><img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=200&q=80" alt="Garlic Naan"/></div>
            <div class="menu-row-main">
                <div class="menu-row-top">
                    <span class="menu-row-name">Garlic Naan</span>
                    <span class="menu-row-badge">Bread basket</span>
                    <span class="menu-row-leader"></span>
                    <span class="menu-row-price">₹60</span>
                </div>
                <div class="menu-row-desc">Freshly baked leavened bread with garlic and butter.</div>
            </div>
        </div>
    </div>
</div>

<div class="testi">
    <div class="testi-inner anim-el anim-up">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-quote">"The Dal Makhani is the best I've had outside of Delhi. Warm ambiance and exceptional service every time."</p>
        <p class="testi-author"><strong>Priya Sharma</strong> — Regular customer, Nagpur</p>
        <div class="testi-divider"></div>
    </div>
</div>

<div class="appt anim-el anim-up">
    <h2>Reserve your table today</h2>
    <p>Open daily for lunch and dinner. Private dining available for special occasions.</p>
    <a href="#" class="appt-btn">Book a table</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div class="anim-el anim-up">
            <div class="footer-brand">Spice Garden</div>
            <p class="footer-desc">Authentic Maharashtrian cuisine in Nagpur since 2010. Loved by 10,000+ diners.</p>
        </div>
        <div class="anim-el anim-up" style="transition-delay: 0.1s;">
            <div class="footer-col-title">Menu</div>
            <div class="footer-links">
                <a href="#">Starters</a>
                <a href="#">Main Course</a>
                <a href="#">Breads</a>
                <a href="#">Desserts</a>
            </div>
        </div>
        <div class="anim-el anim-up" style="transition-delay: 0.2s;">
            <div class="footer-col-title">Quick Links</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Gallery</a>
                <a href="#">Reservations</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div class="anim-el anim-up" style="transition-delay: 0.3s;">
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Civil Lines, Nagpur</a>
                <a href="#">📞 +91 98765 43210</a>
                <a href="#">✉️ reservations@spicegarden.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 Spice Garden, Nagpur</span>
        <span>Reservations: +91 98765 43210</span>
    </div>
</footer>

</body>
</html>