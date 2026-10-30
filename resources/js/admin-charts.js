import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('[data-charts]');
    if (!root) return;

    const data = JSON.parse(root.dataset.charts);
    const isMobile = window.matchMedia('(max-width: 600px)').matches;

    Chart.defaults.font.family = "'DM Sans', system-ui, sans-serif";
    Chart.defaults.font.size = isMobile ? 11 : 12;
    Chart.defaults.color = '#6B7280';

    const NAVY  = '#1A3A5C';
    const GOLD  = '#C9A227';
    const GREEN = '#16A34A';
    const BLUE  = '#2563EB';

    const shorten = (label, max) =>
        label.length > max ? label.slice(0, max - 1) + '…' : label;

    const hasData = (values) => values.some((v) => v > 0);

    const showEmpty = (canvasId) => {
        const box = document.getElementById(canvasId).closest('.chart-box');
        const msg = document.createElement('p');
        msg.className = 'chart-empty';
        msg.textContent = 'No data available';
        box.classList.add('is-empty');
        box.replaceChildren(msg);
    };

    // ── Status doughnut ──
    if (hasData(data.status.values)) {
        new Chart(document.getElementById('chartStatus'), {
            type: 'doughnut',
            data: {
                labels: data.status.labels,
                datasets: [{
                    data: data.status.values,
                    backgroundColor: [GOLD, BLUE, GREEN],
                    borderWidth: 0,
                }],
            },
            options: {
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, padding: isMobile ? 10 : 16 },
                    },
                },
            },
        });
    } else {
        showEmpty('chartStatus');
    }

    // ── Daily line ──
    if (hasData(data.daily.values)) {
        new Chart(document.getElementById('chartDaily'), {
            type: 'line',
            data: {
                labels: data.daily.labels,
                datasets: [{
                    label: 'Enquiries',
                    data: data.daily.values,
                    borderColor: NAVY,
                    backgroundColor: 'rgba(26,58,92,.08)',
                    fill: true,
                    tension: 0.35,
                    pointRadius: isMobile ? 2 : 3,
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 0,
                            autoSkip: true,
                            maxTicksLimit: isMobile ? 5 : 8,
                        },
                        grid: { display: false },
                    },
                    y: { beginAtZero: true, ticks: { precision: 0 } },
                },
            },
        });
    } else {
        showEmpty('chartDaily');
    }

    // ── Top templates bar ──
    if (hasData(data.top.values)) {
        new Chart(document.getElementById('chartTop'), {
            type: 'bar',
            data: {
                labels: data.top.labels,
                datasets: [{
                    label: 'Views',
                    data: data.top.values,
                    backgroundColor: NAVY,
                    borderRadius: 6,
                }],
            },
            options: {
                maintainAspectRatio: false,
                indexAxis: 'y',
                plugins: { legend: { display: false } },
                scales: {
                    x: { beginAtZero: true, ticks: { precision: 0, maxTicksLimit: isMobile ? 5 : 8 } },
                    y: {
                        ticks: {
                            callback(value) {
                                return shorten(this.getLabelForValue(value), isMobile ? 12 : 24);
                            },
                        },
                        grid: { display: false },
                    },
                },
            },
        });
    } else {
        showEmpty('chartTop');
    }
});