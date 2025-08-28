@include('guest.partials.head')

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- Body content -->

@include('guest.partials.header')

@include('guest.partials.nav')


@yield('content')

<!-- Footer area-->
<div class="footer-area">

    <div class=" footer">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>Tentang Kami</h4>
                        <div class="footer-title-line"></div>

                        <img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}" alt="" class="wow pulse"
                            data-wow-delay="1s">
                        <p>Perusahaan Karet Indonesia (GAPKINDO) adalah asosiasi perusahaan-perusahaan Indonesia yang
                            bergerak di industri karet alam. Tujuan GAPKINDO adalah untuk mengembangkan dan meningkatkan
                            produksi, pengolahan, dan pemasaran karet alam Indonesia sebagai salah satu komoditas ekspor
                            utama Indonesia..</p>
                        <ul class="footer-adress">
                            <li><i class="pe-7s-map-marker strong"> </i> Jl. Cideng Barat No.62-A 14, RT.14/RW.2,
                                Cideng, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150</li>
                            <li><i class="pe-7s-mail strong"> </i> gapkindo.pusat@gmail.com</li>
                            <li><i class="pe-7s-call strong"> </i> (62-21) 3846811, 3500368</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>Tautan cepat</h4>
                        <div class="footer-title-line"></div>
                        <ul class="footer-menu">
                            <li><a href="{{ route('soon') }}">Soon</a> </li>
                            <li><a href="{{ route('soon') }}">Services</a> </li>
                            <li><a href="{{ route('soon') }}">Submit property </a></li>
                            <li><a href="{{ route('soon') }}">Contact us</a></li>
                            <li><a href="{{ route('soon') }}">fqa</a> </li>
                            <li><a href="{{ route('soon') }}">Terms </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>Last News</h4>
                        <div class="footer-title-line"></div>
                        <ul class="footer-blog">
                            <li>
                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                    <a href="{{ route('soon') }}">
                                        <img src="{{ asset('guest/assets/img/demo/small-proerty-2.jpg') }}">
                                    </a>
                                    <span class="blg-date">12-12-2016</span>

                                </div>
                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                    <h6> <a href="{{ route('soon') }}">Add news functions </a></h6>
                                    <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla
                                        ...</p>
                                </div>
                            </li>

                            <li>
                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                    <a href="{{ route('soon') }}">
                                        <img src="{{ asset('guest/assets/img/demo/small-proerty-2.jpg') }}">
                                    </a>
                                    <span class="blg-date">12-12-2016</span>

                                </div>
                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                    <h6> <a href="{{ route('soon') }}">Add news functions </a></h6>
                                    <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla
                                        ...</p>
                                </div>
                            </li>

                            <li>
                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                    <a href="{{ route('soon') }}">
                                        <img src="{{ asset('guest/assets/img/demo/small-proerty-2.jpg') }}">
                                    </a>
                                    <span class="blg-date">12-12-2016</span>

                                </div>
                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                    <h6> <a href="{{ route('soon') }}">Add news functions </a></h6>
                                    <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla
                                        ...</p>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer news-letter">
                        <h4>Stay in touch</h4>
                        <div class="footer-title-line"></div>
                        <p>Lorem ipsum dolor sit amet, nulla suscipit similique quisquam molestias. Vel unde,
                            blanditiis.</p>

                        <form>
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="E-mail ... ">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary subscribe" type="button"><i
                                            class="pe-7s-paper-plane pe-2x"></i></button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>

                        <div class="social pull-right">
                            <ul>
                                <li><a class="wow fadeInUp animated" href="https://twitter.com/kimarotec"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a class="wow fadeInUp animated" href="https://www.facebook.com/kimarotec"
                                        data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="wow fadeInUp animated" href="https://plus.google.com/kimarotec"
                                        data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec"
                                        data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec"
                                        data-wow-delay="0.6s"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-copy text-center">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <span> (C) <a href="#">KimaroTheme</a> , All rights reserved 2016 </span>
                </div>
                <div class="bottom-menu pull-right">
                    <ul>
                        <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                        <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Property</a></li>
                        <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.4s">Faq</a></li>
                        <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

@include('guest.partials.scripts')
