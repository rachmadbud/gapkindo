<nav class="navbar navbar-default my-2">
    <div class="container">
        <!-- Brand and toggle get grouped for   better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ asset('guest/assets/img/logo2.jpg') }}"
                    style="width:150px; height:49px;" alt=""></a> <br>
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
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="{{ route('berita') }}">Berita</a>
                </li>

                <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="{{ route('kontak') }}">Kontak</a></li>
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200">{{ trans('global.lang') }}<b class="caret"></b></a>
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
