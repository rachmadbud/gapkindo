<nav class="navbar navbar-default my-2">
    <div class="container">
        <!-- Brand and toggle get grouped for   better mobile display -->
        <div class="navbar-header my-2">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="" href="/"><img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}"
                    style="width:73px; height:76px; margin-buttom:10px;" alt=""></a> <br>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse yamm" id="navigation">
            {{-- <div class="button navbar-right">
                <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.open('register.html')"
                    data-wow-delay="0.45s">Login</button>
                <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.open('submit-property.html')"
                    data-wow-delay="0.48s">Submit</button>
            </div> --}}
            <ul class="main-nav nav navbar-nav navbar-right">
                <li class="wow fadeInDown" data-wow-delay="0.1s">
                    <a href="{{ url('/') }}" style="font-size: 22px">{{ __('global.home') }}</a>
                </li>
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 22px">{{ __('global.tentangKami') }} <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="{{ route('sejarah') }}">{{ __('global.sejarah') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('cabang') }}">{{ __('global.cabang') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 22px">Media <b class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="{{ route('galeri') }}">{{ __('global.galeri') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('berita') }}">{{ __('global.news') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.4s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 22px">{{ __('global.regulasi') }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5>Mitra Nasional</h5>
                                        <ul>
                                            <li>
                                                <a href="https://www.ekon.go.id/" target="_blank">KEMENTERIAN
                                                    KOORDINATOR BIDANG
                                                    PEREKONOMIAN</a>
                                            </li>
                                            <li>
                                                <a href="https://www.pertanian.go.id/" target="_blank">KEMENTERIAN
                                                    PERTANIAN</a>
                                            </li>
                                            <li>
                                                <a href="https://kemenperin.go.id/" target="_blank">KEMENTERIAN
                                                    PERINDUSTRIAN</a>
                                            </li>
                                            <li>
                                                <a href="https://dephub.go.id/" target="_blank">KEMENTERIAN
                                                    PERHUBUNGAN</a>
                                            </li>
                                            <li>
                                                <a href="https://kadin.id/" target="_blank">KADIN INDONESIA</a>
                                            </li>
                                            <li>
                                                <a href="https://www.kemenkeu.go.id/home" target="_blank">KEMENTERIAN
                                                    KEUANGAN</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Mitra Internasional</h5>
                                        <ul>
                                            <li><a href="https://www.thainr.com/en/?" target="_blabk">The Thai Rubber
                                                    Association</a>
                                            <li><a href="https://www.lgm.gov.my/webv2/home" target="_blabk">Malaysian
                                                    Rubber Board</a>
                                            </li>
                                            <li><a href="https://www.rtas.sg/" target="_blabk">Rubber Trade Association
                                                    of Singapore</a>
                                            </li>
                                            <li><a href="https://www.vra.com.vn/gioi-thieu.html" target="_blabk">THE
                                                    VIET NAM RUBBER ASSOCIATION</a>
                                            </li>
                                            <li><a href="https://www.anrpc.org/" target="_blabk">Association of Natural
                                                    Rubber Producing Countries
                                                    (ANRPC)</a>
                                            </li>
                                            <li><a href="https://ircorubber.com/about-us/" target="_blabk">International
                                                    Rubber
                                                    Consortium Limited (IRCo)</a>
                                            </li>
                                            <li><a href="https://sustainablenaturalrubber.org/" target="_blabk">Global
                                                    Platform for Sustainable Natural Rubber</a>
                                            </li>
                                            <li><a href="https://www.sgx.com/" target="_blabk">Singapore Exchange</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>

                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 22px">{{ __('global.anggota') }} <b class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="{{ route('anggota') }}">{{ __('global.anggota') }}</a>
                        </li>
                </li>

            </ul>

            <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="{{ route('kontak') }}"
                    style="font-size: 22px">{{ __('global.kontak') }}</a></li>
            <li class="dropdown ymm-sw" data-wow-delay="0.1s">
                <a href="#" style="font-size: 22px" class="dropdown-toggle" data-toggle="dropdown"
                    data-hover="dropdown" data-delay="200">
                    {{ __('global.lang') }} <b class="caret"></b>
                </a>
                <ul class="dropdown-menu navbar-nav">
                    @foreach (['en' => 'English', 'id' => 'Indonesia'] as $lang => $language)
                        <li>
                            <a href="{{ route('langSwitch', $lang) }}"
                                class="{{ app()->getLocale() === $lang ? 'active' : '' }}">
                                {{ $language }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- End of nav bar -->
