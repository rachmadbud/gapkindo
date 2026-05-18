{{--
    ===================================================
    GAPKINDO PREMIUM FOOTER
    Self-contained styles + 4-column layout
    Mempertahankan data: $newsFooter, multi-language
    ===================================================
--}}

<style>
    .gpk-footer {
        background: var(--c-bg-dark);
        color: rgba(255, 251, 242, 0.85);
        font-family: var(--f-body);
        position: relative;
        overflow: hidden;
    }
    .gpk-footer::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 800px 600px at 0% 0%, rgba(44, 85, 48, 0.18), transparent 60%),
            radial-gradient(ellipse 600px 400px at 100% 100%, rgba(184, 145, 30, 0.08), transparent 60%);
        pointer-events: none;
    }

    .gpk-footer__top {
        position: relative;
        z-index: 1;
        max-width: 1320px;
        margin: 0 auto;
        padding: clamp(4rem, 9vh, 6rem) clamp(1.5rem, 4vw, 3rem) 4rem;
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    @media (min-width: 640px) { .gpk-footer__top { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1024px) { .gpk-footer__top { grid-template-columns: 1.6fr 1fr 1.4fr 1.2fr; gap: 3rem; } }

    .gpk-footer__col-title {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.28em;
        text-transform: uppercase;
        color: var(--c-gold-soft);
        margin: 0 0 1.6rem;
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
    }
    .gpk-footer__col-title::before {
        content: "";
        width: 24px;
        height: 1px;
        background: var(--c-gold-soft);
    }

    /* ===== About Column ===== */
    .gpk-footer__logo {
        width: 64px;
        height: 66px;
        object-fit: contain;
        margin-bottom: 1.4rem;
        border-radius: 4px;
        background: rgba(255, 251, 242, 0.06);
        padding: 6px;
    }
    .gpk-footer__about {
        font-size: 0.92rem;
        line-height: 1.7;
        color: rgba(255, 251, 242, 0.7);
        margin-bottom: 1.6rem;
        max-width: 380px;
    }
    .gpk-footer__address {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 0.9rem;
    }
    .gpk-footer__address li {
        display: flex;
        gap: 0.8rem;
        align-items: flex-start;
        font-size: 0.85rem;
        line-height: 1.55;
        color: rgba(255, 251, 242, 0.75);
    }
    .gpk-footer__address svg {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
        margin-top: 3px;
        stroke: var(--c-gold-soft);
        stroke-width: 1.4;
        fill: none;
    }

    /* ===== Tautan Column ===== */
    .gpk-footer__list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 0.7rem;
    }
    .gpk-footer__link {
        font-size: 0.85rem;
        font-weight: 500;
        line-height: 1.4;
        color: rgba(255, 251, 242, 0.7);
        text-decoration: none;
        transition: color 0.25s var(--ease-out), padding 0.3s var(--ease-out);
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }
    .gpk-footer__link::before {
        content: "→";
        color: var(--c-gold-soft);
        opacity: 0;
        transform: translateX(-6px);
        transition: opacity 0.3s var(--ease-out), transform 0.3s var(--ease-out);
    }
    .gpk-footer__link:hover {
        color: var(--c-gold-soft);
    }
    .gpk-footer__link:hover::before {
        opacity: 1;
        transform: translateX(0);
    }

    /* ===== Berita Terbaru Column ===== */
    .gpk-footer__news {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 1.4rem;
    }
    .gpk-footer__news-item {
        display: grid;
        grid-template-columns: 70px 1fr;
        gap: 0.9rem;
        align-items: start;
        text-decoration: none;
        transition: opacity 0.3s var(--ease-out);
    }
    .gpk-footer__news-item:hover { opacity: 0.85; }

    .gpk-footer__news-thumb {
        position: relative;
        aspect-ratio: 4 / 3;
        background: rgba(255, 251, 242, 0.05);
        overflow: hidden;
    }
    .gpk-footer__news-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s var(--ease-out);
    }
    .gpk-footer__news-item:hover .gpk-footer__news-thumb img { transform: scale(1.08); }

    .gpk-footer__news-content { min-width: 0; }
    .gpk-footer__news-date {
        font-family: var(--f-mono);
        font-size: 0.62rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--c-gold-soft);
        margin-bottom: 0.4rem;
        display: block;
    }
    .gpk-footer__news-title {
        font-family: var(--f-display);
        font-size: 0.92rem;
        font-weight: 500;
        line-height: 1.25;
        color: rgba(255, 251, 242, 0.92);
        margin: 0;
        letter-spacing: -0.005em;
    }

    /* ===== Sekretariat Column ===== */
    .gpk-footer__person {
        padding-bottom: 1.4rem;
        margin-bottom: 1.4rem;
        border-bottom: 1px solid rgba(212, 177, 67, 0.15);
    }
    .gpk-footer__person:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .gpk-footer__person-name {
        font-family: var(--f-display);
        font-size: 1.1rem;
        font-weight: 500;
        line-height: 1.2;
        color: var(--c-cream);
        margin: 0 0 0.3rem;
        letter-spacing: -0.01em;
    }
    .gpk-footer__person-role {
        font-family: var(--f-mono);
        font-size: 0.66rem;
        font-weight: 500;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--c-gold-soft);
    }

    /* ===== Bottom Bar ===== */
    .gpk-footer__bottom {
        position: relative;
        z-index: 1;
        border-top: 1px solid rgba(212, 177, 67, 0.15);
        padding: 1.8rem clamp(1.5rem, 4vw, 3rem);
    }
    .gpk-footer__bottom-inner {
        max-width: 1320px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
        align-items: center;
        justify-content: space-between;
        text-align: center;
    }
    @media (min-width: 720px) {
        .gpk-footer__bottom-inner { flex-direction: row; text-align: left; }
    }
    .gpk-footer__copyright {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        letter-spacing: 0.15em;
        color: rgba(255, 251, 242, 0.5);
        margin: 0;
    }
    .gpk-footer__copyright a { color: inherit; text-decoration: none; transition: color 0.3s var(--ease-out); }
    .gpk-footer__copyright a:hover { color: var(--c-gold-soft); }

    .gpk-footer__signature {
        font-family: var(--f-display);
        font-style: italic;
        font-size: 0.92rem;
        font-weight: 400;
        color: rgba(255, 251, 242, 0.55);
    }
    .gpk-footer__signature em {
        font-style: normal;
        color: var(--c-gold-soft);
    }
</style>


<footer class="gpk-footer" role="contentinfo">
    <div class="gpk-footer__top">

        {{-- 1. TENTANG --}}
        <div class="gpk-footer__col">
            <h4 class="gpk-footer__col-title">{{ __('global.tentangKami') }}</h4>
            <img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}" alt="GAPKINDO" class="gpk-footer__logo">
            <p class="gpk-footer__about">{{ __('global.footerP') }}</p>
            <ul class="gpk-footer__address">
                <li>
                    <svg viewBox="0 0 24 24"><path d="M12 2c-4.4 0-8 3.6-8 8 0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>Jl. Cideng Barat No.62-A, RT.14/RW.2, Cideng, Kecamatan Gambir, Kota Jakarta Pusat, DKI Jakarta 10150</span>
                </li>
                <li>
                    <svg viewBox="0 0 24 24"><path d="M3 7l9 6 9-6M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M3 7l2-2h14l2 2"/></svg>
                    <a href="mailto:gapkindo.pusat@gmail.com" style="color:inherit;text-decoration:none;transition:color 0.25s;" onmouseover="this.style.color='var(--c-gold-soft)'" onmouseout="this.style.color='inherit'">gapkindo.pusat@gmail.com</a>
                </li>
                <li>
                    <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.86 19.86 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.86 19.86 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg>
                    <span>(62-21) 3501510, 3501511, 3846813</span>
                </li>
            </ul>
        </div>

        {{-- 2. TAUTAN --}}
        <div class="gpk-footer__col">
            <h4 class="gpk-footer__col-title">{{ __('global.tautan') }}</h4>
            <ul class="gpk-footer__list">
                <li><a href="https://www.ekon.go.id/" target="_blank" rel="noopener" class="gpk-footer__link">Kemenko Perekonomian</a></li>
                <li><a href="https://www.pertanian.go.id/" target="_blank" rel="noopener" class="gpk-footer__link">Kementerian Pertanian</a></li>
                <li><a href="https://kemenperin.go.id/" target="_blank" rel="noopener" class="gpk-footer__link">Kementerian Perindustrian</a></li>
                <li><a href="https://dephub.go.id/" target="_blank" rel="noopener" class="gpk-footer__link">Kementerian Perhubungan</a></li>
                <li><a href="https://www.kemenkeu.go.id/home" target="_blank" rel="noopener" class="gpk-footer__link">Kementerian Keuangan</a></li>
                <li><a href="https://kadin.id/" target="_blank" rel="noopener" class="gpk-footer__link">KADIN Indonesia</a></li>
            </ul>
        </div>

        {{-- 3. BERITA TERBARU --}}
        <div class="gpk-footer__col">
            <h4 class="gpk-footer__col-title">{{ __('global.lastNews') }}</h4>
            <div class="gpk-footer__news">
                @if(isset($newsFooter))
                    @foreach ($newsFooter as $item)
                        <a href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($item->id)) }}" class="gpk-footer__news-item">
                            <div class="gpk-footer__news-thumb">
                                <img src="{{ asset('guest/assets/img/news/' . $item->image) }}" alt="{{ $item->title }}" loading="lazy">
                            </div>
                            <div class="gpk-footer__news-content">
                                <span class="gpk-footer__news-date">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</span>
                                <h5 class="gpk-footer__news-title">{{ \Illuminate\Support\Str::limit($item->title, 60) }}</h5>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- 4. SEKRETARIAT --}}
        <div class="gpk-footer__col">
            <h4 class="gpk-footer__col-title">{{ __('global.gapkindoSekretariat') }}</h4>
            <div class="gpk-footer__person">
                <h5 class="gpk-footer__person-name">Erwin Tunas</h5>
                <div class="gpk-footer__person-role">{{ __('global.direkturEksekutif') }}</div>
            </div>
            <div class="gpk-footer__person">
                <h5 class="gpk-footer__person-name">Uhendi Haris</h5>
                <div class="gpk-footer__person-role">{{ __('global.asistenDirekturEksekutif') }}</div>
            </div>
        </div>

    </div>

    {{-- BOTTOM BAR --}}
    <div class="gpk-footer__bottom">
        <div class="gpk-footer__bottom-inner">
            <p class="gpk-footer__copyright">
                © {{ date('Y') }} <a href="{{ url('/') }}">Sekretariat GAPKINDO</a> · All rights reserved.
            </p>
            <div class="gpk-footer__signature">
                Memajukan <em>karet alam</em> Indonesia
            </div>
        </div>
    </div>
</footer>
