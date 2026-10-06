<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>{{ $template->name }} — Preview | BizMarket</title>
    @vite(['resources/css/pages/templates/ecommerce.css', 'resources/js/templates/ecommerce.js'])
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

<div class="top-utility"><span>🎉 Free delivery on orders above ₹499 · Easy 7-day returns</span></div>

<nav class="hnav">
    <button class="mobile-menu-btn" aria-label="Open menu">☰</button>
    <div class="hnav-brand">ShopEase</div>
    <div class="hnav-search">
        <input type="text" placeholder="Search for products, brands and more"/>
        <button>🔍</button>
    </div>
    <div class="hnav-right">
        <a href="#" class="hnav-icon-link"><span class="icon">👤</span><span>Account</span></a>
        <a href="#" class="hnav-icon-link"><span class="icon">♡</span><span>Wishlist</span></a>
        <a href="#" class="hnav-icon-link cart-badge"><span class="icon">🛒</span><span class="cart-count">3</span><span>Cart</span></a>
    </div>
</nav>

<div class="category-strip">
    <a href="#" class="cat-link active">All Categories</a>
    <a href="#" class="cat-link">👗 Fashion</a>
    <a href="#" class="cat-link">📱 Electronics</a>
    <a href="#" class="cat-link">🏠 Home & Living</a>
    <a href="#" class="cat-link">💄 Beauty</a>
    <a href="#" class="cat-link">👟 Footwear</a>
    <a href="#" class="cat-link">🎁 Gifts</a>
    <a href="#" class="cat-link">🧸 Kids & Toys</a>
</div>

<!-- Standardized Mobile Drawer -->
<div class="menu-overlay"></div>
<div class="mobile-drawer">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">ShopEase</div>
        <button class="mobile-drawer-close" aria-label="Close menu">✕</button>
    </div>
    <div class="mobile-drawer-links">
        <a href="#">All Categories</a>
        <a href="#">Fashion</a>
        <a href="#">Electronics</a>
        <a href="#">Home & Living</a>
        <a href="#">Beauty</a>
        <a href="#">Track Order</a>
        <a href="#">My Account</a>
    </div>
    <div class="mobile-drawer-cta">
        <a href="#" class="btn-p">Download the app</a>
    </div>
</div>

<section class="hero">
    <div class="hero-inner anim-el anim-up visible">
        <div>
            <p class="hero-eyebrow">Big Billion Days</p>
            <h1 class="h1">Up to 70% off on fashion & electronics</h1>
            <p class="body-text">Shop the season's best deals across 50,000+ products from verified sellers. Limited time offer.</p>
            <a href="#" class="btn-p">Shop the sale</a>
        </div>
        <div class="hero-visual">🛍️</div>
    </div>
    <div class="hero-dots">
        <span class="hero-dot active"></span>
        <span class="hero-dot"></span>
        <span class="hero-dot"></span>
    </div>
</section>

<div class="deal-strip">
    <div class="deal-inner">
        <span class="deal-label">⚡ Flash Sale ends in</span>
        <div class="deal-timer">
            <span class="deal-time-box" id="dealH">03</span>
            <span class="deal-time-box" id="dealM">24</span>
            <span class="deal-time-box" id="dealS">18</span>
        </div>
        <span class="deal-cta">Grab deals before they're gone →</span>
    </div>
</div>

<div class="trust-row">
    <div class="trust-inner">
        <div class="trust-item"><span class="trust-icon">🚚</span><span class="trust-text">Free delivery ₹499+</span></div>
        <div class="trust-item"><span class="trust-icon">↩️</span><span class="trust-text">7-day easy returns</span></div>
        <div class="trust-item"><span class="trust-icon">🔒</span><span class="trust-text">Secure payments</span></div>
        <div class="trust-item"><span class="trust-icon">✅</span><span class="trust-text">Verified sellers</span></div>
    </div>
</div>

<div class="prod-section">
    <div class="prod-section-header anim-el anim-up reveal">
        <h2 class="prod-section-title">🔥 Trending Deals</h2>
        <a href="#" class="prod-section-link">View all →</a>
    </div>
    <div class="prod-grid anim-stagger stagger">
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">👗<div class="prod-sale-tag">30% OFF</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Women's Cotton Kurti Set — Floral Print</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.3 ★</span><span class="prod-rating-count">(2,140)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹799</span><span class="prod-old">₹1,149</span></div>
                <div class="prod-discount">Save ₹350</div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🎧<div class="prod-sale-tag">24% OFF</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Wireless Bluetooth Earbuds — Noise Cancelling</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.5 ★</span><span class="prod-rating-count">(8,902)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹1,899</span><span class="prod-old">₹2,499</span></div>
                <div class="prod-discount">Save ₹600</div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">👟<div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Men's Running Shoes — Mesh Sole</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.2 ★</span><span class="prod-rating-count">(1,567)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹1,499</span></div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🏮<div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Decorative LED Lamp Set — Set of 2</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.6 ★</span><span class="prod-rating-count">(940)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹1,299</span></div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">💄<div class="prod-sale-tag">NEW</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Skincare Gift Set — 5 Piece Combo</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.4 ★</span><span class="prod-rating-count">(3,215)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹649</span></div>
            </div>
        </div>
    </div>
</div>

<div class="mid-banner">
    <div class="mid-banner-card electronics anim-el anim-left reveal">
        <div class="mid-banner-text">
            <h3>Electronics Fest</h3>
            <p>Up to 40% off on headphones, speakers & more</p>
            <a href="#" class="mid-banner-link">Shop now →</a>
        </div>
        <div class="mid-banner-icon">📱</div>
    </div>
    <div class="mid-banner-card fashion anim-el anim-right reveal">
        <div class="mid-banner-text">
            <h3>Fashion Weekend</h3>
            <p>Flat 50% off on ethnic wear collection</p>
            <a href="#" class="mid-banner-link">Shop now →</a>
        </div>
        <div class="mid-banner-icon">👗</div>
    </div>
</div>

<div class="prod-section">
    <div class="prod-section-header anim-el anim-up reveal">
        <h2 class="prod-section-title">✨ New Arrivals</h2>
        <a href="#" class="prod-section-link">View all →</a>
    </div>
    <div class="prod-grid anim-stagger stagger">
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">⌚<div class="prod-sale-tag">NEW</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Smart Watch — Fitness Tracker</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.1 ★</span><span class="prod-rating-count">(512)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹2,299</span></div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🎒<div class="prod-sale-tag">NEW</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Laptop Backpack — Water Resistant</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.3 ★</span><span class="prod-rating-count">(788)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹1,199</span></div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🧴<div class="prod-sale-tag">NEW</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Organic Face Wash — 200ml</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.5 ★</span><span class="prod-rating-count">(1,102)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹349</span></div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🪑<div class="prod-sale-tag">NEW</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Folding Study Chair — Ergonomic</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.0 ★</span><span class="prod-rating-count">(266)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹2,799</span></div>
            </div>
        </div>
        <div class="prod-card anim-el anim-up">
            <div class="prod-photo">🧸<div class="prod-sale-tag">NEW</div><div class="prod-fav">♡</div></div>
            <div class="prod-body">
                <div class="prod-name">Soft Toy Bundle — Kids Set of 3</div>
                <div class="prod-rating"><span class="prod-rating-badge">4.7 ★</span><span class="prod-rating-count">(1,890)</span></div>
                <div class="prod-price-row"><span class="prod-price">₹899</span></div>
            </div>
        </div>
    </div>
</div>

<div class="testi anim-el anim-up reveal">
    <div class="testi-stars">★★★★★</div>
    <p class="testi-quote">"Ordered a kurti set and it arrived in 3 days, exactly as shown. Return process was effortless when I needed a size exchange."</p>
    <p class="testi-author"><strong>Ananya Rao</strong> — Verified buyer, Pune</p>
</div>

<div class="appt anim-el anim-up reveal">
    <h2>Get the ShopEase app</h2>
    <p>Faster checkout, exclusive app-only deals, and real-time order tracking.</p>
    <a href="#" class="appt-btn">📲 Download the app</a>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div class="footer-brand-col">
            <div class="footer-brand">ShopEase</div>
            <p class="footer-desc">India's trusted marketplace for fashion, electronics, and home essentials.</p>
            <div class="footer-social"><span>📘</span><span>📷</span><span>🐦</span></div>
        </div>
        <div>
            <div class="footer-col-title">Shop</div>
            <div class="footer-links">
                <a href="#">Fashion</a>
                <a href="#">Electronics</a>
                <a href="#">Home & Living</a>
                <a href="#">Beauty</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Customer Service</div>
            <div class="footer-links">
                <a href="#">Track Order</a>
                <a href="#">Returns & Refunds</a>
                <a href="#">Shipping Info</a>
                <a href="#">FAQs</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Company</div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Careers</a>
                <a href="#">Sell on ShopEase</a>
                <a href="#">Press</a>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Contact</div>
            <div class="footer-links">
                <a href="#">📍 Nagpur, Maharashtra</a>
                <a href="#">📞 1800-123-4567</a>
                <a href="#">✉️ support@shopease.in</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 ShopEase. All rights reserved.</span>
        <span>GSTIN: 27XXXXX1234Z1ZX</span>
    </div>
</footer>

</body>
</html>