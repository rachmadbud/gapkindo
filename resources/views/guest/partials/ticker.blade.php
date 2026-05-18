{{--
    ============================================================
    TICKER GAPKINDO — Date + Running Text Band
    Reusable partial, include di bawah banner setiap halaman:
    @include('guest.partials.ticker')
    ============================================================
--}}

<style>
    /* ============================================
       DATE + RUNNING TEXT TICKER
       ============================================ */
    .gpk-ticker {
        background: linear-gradient(135deg, #2C5530 0%, #1A2E1F 100%);
        color: #FFFBF2;
        border-bottom: 1px solid rgba(184, 145, 30, 0.25);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.05);
        position: relative;
        overflow: hidden;
    }
    .gpk-ticker::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 600px 100px at 20% 50%, rgba(184, 145, 30, 0.08), transparent 70%),
            radial-gradient(ellipse 500px 100px at 80% 50%, rgba(90, 64, 240, 0.06), transparent 70%);
        pointer-events: none;
    }

    .gpk-ticker__inner {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        padding: 0.85rem 16px;
        max-width: 100%;
        position: relative;
        z-index: 1;
    }

    /* DATE DISPLAY (kiri) */
    .gpk-ticker__date {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        flex-shrink: 0;
        font-family: 'Manrope', 'Open Sans', sans-serif;
        font-size: 1.84rem;
        font-weight: 700;
        color: #FFFFFF;
        letter-spacing: 0.02em;
        padding-right: 1.2rem;
        border-right: 1px solid rgba(255, 251, 242, 0.18);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }
    .gpk-ticker__icon {
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        color: #FFFFFF;
    }
    .gpk-ticker__date span {
        white-space: nowrap;
    }

    /* RUNNING TEXT (kanan, scroll) */
    .gpk-ticker__rail {
        flex: 1;
        overflow: hidden;
        min-width: 250px;
        position: relative;
        mask-image: linear-gradient(to right, transparent 0, black 30px, black calc(100% - 30px), transparent 100%);
        -webkit-mask-image: linear-gradient(to right, transparent 0, black 30px, black calc(100% - 30px), transparent 100%);
    }
    .gpk-ticker__text {
        display: inline-block;
        white-space: nowrap;
        animation: gpk-ticker-scroll 38s linear infinite;
        font-family: 'Manrope', 'Open Sans', sans-serif;
        font-size: 1.8rem;
        font-weight: 500;
        color: #FFFBF2;
        padding-left: 100%;
        letter-spacing: 0.01em;
    }
    .gpk-ticker__text strong {
        color: #B8911E;
        font-weight: 700;
    }
    .gpk-ticker__text .dot {
        color: rgba(184, 145, 30, 0.7);
        margin: 0 1.2rem;
        font-weight: 700;
    }

    @keyframes gpk-ticker-scroll {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    /* Pause on hover */
    .gpk-ticker__rail:hover .gpk-ticker__text {
        animation-play-state: paused;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .gpk-ticker__inner {
            flex-direction: column;
            align-items: stretch;
            gap: 0.6rem;
            padding: 0.7rem 12px;
        }
        .gpk-ticker__date {
            justify-content: center;
            border-right: none;
            padding-right: 0;
            padding-bottom: 0.6rem;
            border-bottom: 1px solid rgba(255, 251, 242, 0.18);
            font-size: 1.4rem;
        }
        .gpk-ticker__icon {
            width: 28px;
            height: 28px;
        }
        .gpk-ticker__rail {
            width: 100%;
            min-width: 100%;
        }
        .gpk-ticker__text {
            font-size: 1.4rem;
        }
    }
</style>

<section class="gpk-ticker" role="banner">
    <div class="gpk-ticker__inner">
        <div class="gpk-ticker__date" aria-label="Tanggal hari ini">
            <svg class="gpk-ticker__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            <span id="gpkTickerDate">—</span>
        </div>
        <div class="gpk-ticker__rail" aria-live="polite">
            <div class="gpk-ticker__text">
                <strong>📢 INFO EUDR:</strong> EUDR kembali ditunda untuk kedua kalinya sehingga akan berlaku mulai
                <strong>30 Desember 2026</strong> untuk perusahaan besar (selaku operator) dan
                <strong>30 Juni 2027</strong> untuk usaha kecil (selaku UKM)
                <span class="dot">•</span>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    'use strict';

    // Update jam Indonesia real-time (per detik)
    function updateGpkTickerDate() {
        const el = document.getElementById('gpkTickerDate');
        if (!el) return;

        const now = new Date();
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const day = days[now.getDay()];
        const date = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();
        const hour = String(now.getHours()).padStart(2, '0');
        const minute = String(now.getMinutes()).padStart(2, '0');
        const second = String(now.getSeconds()).padStart(2, '0');

        el.textContent = `${day}, ${date} ${month} ${year} — ${hour}:${minute}:${second} WIB`;
    }

    // Initial render + tick per detik
    updateGpkTickerDate();
    setInterval(updateGpkTickerDate, 1000);
})();
</script>
