document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('templateSearch');
    const results = document.getElementById('templatesResults');
    if (!input || !results) return;

    const form = input.closest('form');
    const categoryInput = form.querySelector('input[name="category"]');
    const apiUrl = results.dataset.api;
    const clearUrl = results.dataset.clear;
    const countBadge = document.getElementById('searchCount');
    const resultCount = document.getElementById('resultCount');
    let timer = null;
    let controller = null;

    const esc = (value) => String(value ?? '').replace(/[&<>"']/g, (c) => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[c]));

    const cardHtml = (t) => `
        <article class="t-card">
            <div class="t-preview" style="background:linear-gradient(140deg,var(--navy),var(--blue));">
                ${esc(t.category.icon)}
                <div class="t-overlay">
                    <a href="${esc(t.preview_url)}" class="t-overlay-btn primary">Preview template</a>
                    <a href="${esc(t.url)}" class="t-overlay-btn secondary">View details</a>
                </div>
            </div>
            <div class="t-body">
                <span class="badge badge-gold">${esc(t.category.icon)} ${esc(t.category.name)}</span>
                <h2 class="t-name">${esc(t.name)}</h2>
                <p class="t-desc">${esc(t.short_description)}</p>
                <div class="t-meta">
                    <span class="t-views">👁 ${esc(t.view_count)} views</span>
                    <a href="${esc(t.url)}" class="t-action">Details →</a>
                </div>
            </div>
        </article>`;

    const emptyHtml = `
        <div class="empty-state">
            <div class="empty-state-icon">🔍</div>
            <h3 class="empty-state-title">No templates found</h3>
            <p class="empty-state-desc">Try a different search term or clear the category filter.</p>
            <a href="${esc(clearUrl)}" class="btn btn-primary">Clear filters</a>
        </div>`;

    const render = (json) => {
        const items = json.data || [];
        const total = json.meta ? json.meta.total : items.length;

        results.innerHTML = items.length
            ? `<div class="templates-grid">${items.map(cardHtml).join('')}</div>`
            : emptyHtml;

        [countBadge, resultCount].forEach((el) => {
            const strong = el && el.querySelector('strong');
            if (strong) strong.textContent = total;
        });
    };

    const run = async () => {
        if (controller) controller.abort();
        controller = new AbortController();

        const params = new URLSearchParams();
        const term = input.value.trim();
        if (term) params.set('search', term);
        if (categoryInput && categoryInput.value) params.set('category', categoryInput.value);

        const apiParams = new URLSearchParams(params);
        apiParams.set('per_page', '50');

        results.classList.add('is-loading');
        try {
            const response = await fetch(`${apiUrl}?${apiParams}`, {
                headers: { Accept: 'application/json' },
                signal: controller.signal,
            });
            if (!response.ok) throw new Error('Request failed');
            render(await response.json());
            history.replaceState(null, '', params.toString() ? `?${params}` : window.location.pathname);
        } catch (error) {
            if (error.name !== 'AbortError') form.submit();
        } finally {
            results.classList.remove('is-loading');
        }
    };

    input.addEventListener('input', () => {
        clearTimeout(timer);
        timer = setTimeout(run, 300);
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        clearTimeout(timer);
        run();
    });
});