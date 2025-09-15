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
                    <a href="{{ url('/') }}" style="font-size: 23px">{{ __('global.home') }}</a>
                </li>
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 23px">{{ __('global.tentangKami') }} <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="{{ route('sejarah') }}">{{ __('global.sejarah') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 23px">Media <b class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="{{ route('galeri') }}">{{ __('global.galeri') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('berita') }}">{{ __('global.news') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 23px">{{ __('global.regulasi') }} <b class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="https://www.ekon.go.id/" target="_blank">KEMENTERIAN KOORDINATOR BIDANG
                                PEREKONOMIAN</a>
                        </li>
                        <li>
                            <a href="https://www.pertanian.go.id/" target="_blank">KEMENTERIAN PERTANIAN</a>
                        </li>
                        <li>
                            <a href="https://kemenperin.go.id/" target="_blank">KEMENTERIAN PERINDUSTRIAN</a>
                        </li>
                        <li>
                            <a href="https://dephub.go.id/" target="_blank">KEMENTERIAN PERHUBUNGAN</a>
                        </li>
                        <li>
                            <a href="https://kadin.id/" target="_blank">KADIN INDONESIA</a>
                        </li>
                        <li>
                            <a href="https://www.kemenkeu.go.id/home" target="_blank">KEMENTERIAN KEUANGAN</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" style="font-size: 23px">{{ __('global.anggota') }} <b class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="{{ route('anggotaTpp') }}">{{ __('global.anggota') }} (TPP)</a>
                        </li>
                        <li>
                            <a href="{{ route('cabang') }}">{{ __('global.cabang') }}</a>
                        </li>
                </li>

            </ul>

            <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="{{ route('kontak') }}"
                    style="font-size: 23px">{{ __('global.kontak') }}</a></li>
            <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                <a href="index.html" style="font-size: 23px" class="dropdown-toggle " data-toggle="dropdown"
                    data-hover="dropdown" data-delay="200">{{ trans('global.lang') }}<b class="caret"></b></a>
                <ul class="dropdown-menu navbar-nav">
                    @foreach (['en' => 'English', 'id' => 'Indonesia'] as $lang => $language)
                        <li>
                            <a href="{{ route('langSwitch', $lang) }}">{{ $language }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- End of nav bar -->
