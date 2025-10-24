@include('guest.partials.head')

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- Body content -->

@include('guest.partials.nav')

@yield('content')

<!-- Footer area-->
<div class="footer-area">

    <div class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h3>{{ __('global.tentangKami') }}</h3>
                        <div class="footer-title-line"></div>

                        <img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}" alt="" class="wow pulse"
                            data-wow-delay="1s">
                        <p>{{ __('global.footerP') }}</p>
                        <ul class="footer-address">
                            <li>
                                <div class="address-item">
                                    <img src="{{ asset('guest/assets/img/placeholder.png') }}" alt="maps">
                                    <p>Jl. Cideng Barat No.62-A, RT.14/RW.2, Cideng, Kecamatan Gambir, Kota Jakarta
                                        Pusat, DKI Jakarta 10150</p>
                                </div>
                            </li>
                            <li>
                                <div class="address-item">
                                    <img src="{{ asset('guest/assets/img/email.png') }}" alt="email">
                                    <p>gapkindo.pusat@gmail.com</p>
                                </div>
                            </li>
                            <li>
                                <div class="address-item">
                                    <img src="{{ asset('guest/assets/img/phone.png') }}" alt="phone">
                                    <p>(62-21) 3501510, 3501511, 3846813</p>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-2 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h3>{{ __('global.tautan') }}</h3>
                        <div class="footer-title-line"></div>
                        <ul class="footer-menu">
                            <li><a href="https://www.ekon.go.id/" target="_blank">KEMENTERIAN
                                    KOORDINATOR BIDANG
                                    PEREKONOMIAN</a></li>
                            <li><a href="https://www.pertanian.go.id/" target="_blank">KEMENTERIAN PERTANIAN</a></li>
                            <li><a href="https://kemenperin.go.id/" target="_blank">KEMENTERIAN PERINDUSTRIAN</a></li>
                            <li><a href="https://dephub.go.id/" target="_blank">KEMENTERIAN PERHUBUNGAN</a></li>
                            <li><a href="https://kadin.id/" target="_blank">KADIN INDONESIA</a></li>
                            <li><a href="https://www.kemenkeu.go.id/home" target="_blank">KEMENTERIAN KEUANGAN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h3>{{ __('global.lastNews') }}</h3>
                        <div class="footer-title-line"></div>
                        <ul class="footer-blog">
                            @foreach ($newsFooter as $item)
                                <li>
                                    <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                        <a href="{{ route('soon') }}">
                                            <img src="{{ asset('guest/assets/img/news/' . $item->image) }}">
                                        </a>
                                        <span
                                            class="blg-date">{{ \Carbon\Carbon::parse($item->created_at)->format('d m y') }}</span>

                                    </div>
                                    <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                        <h6> <a
                                                href="{{ route('soon') }}">{{ \Illuminate\Support\Str::limit($item->title, 30) }}</a>
                                        </h6>
                                        <p style="line-height: 17px; padding: 8px 2px;">
                                            {{ \Illuminate\Support\Str::limit($item->content, 50) }}</p>
                                    </div>
                                </li> <br>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h3>{{ __('global.gapkindoSekretariat') }}</h3>
                        <div class="footer-title-line"></div>
                        {{-- FFA600 --}}
                        <ul class="footer-menu">
                            <li>
                                <p class="name">Erwin Tunas</p>
                                <p class="title">{{ __('global.direkturEksekutif') }}</p>
                            </li>
                            <li>
                                <p class="name">Uhendi Haris</p>
                                <p class="title">{{ __('global.asistenDirekturEksekutif') }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copy text-center">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <span><a href="#">(C) Sekretariat GAPKINDO, 2025</a></span>
                </div>
                {{-- <div class="bottom-menu pull-right">
                    <ul>
                        <li><a class="wow fadeInUp animated" href="{{ '/' }}" data-wow-delay="0.2s">Home</a>
                        </li>
                        <li><a class="wow fadeInUp animated" href="{{ '/' }}"
                                data-wow-delay="0.3s">Property</a></li>
                        <li><a class="wow fadeInUp animated" href="{{ '/' }}" data-wow-delay="0.4s">Faq</a>
                        </li>
                        <li><a class="wow fadeInUp animated" href="{{ route('kontak') }}"
                                data-wow-delay="0.6s">Contact</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>

</div>

@include('guest.partials.scripts')
