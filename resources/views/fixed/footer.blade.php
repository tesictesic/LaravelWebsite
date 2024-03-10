<section id="brand"  class="brand">
    <div class="container">
        <div class="brand-area">
            <div class="owl-carousel owl-theme brand-item">
                <div class="item">
                    <a href="#">
                        <img src="{{asset('assets/images/brand/br1.png')}}" alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src="{{asset('assets/images/brand/br2.png')}}" alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src="{{asset('assets/images/brand/br3.png')}}" alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src="{{asset('assets/images/brand/br4.png')}}" alt="brand-image" />
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#">
                        <img src="{{asset('assets/images/brand/br5.png')}}" alt="brand-image" />
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#">
                        <img src="{{asset('assets/images/brand/br6.png')}}" alt="brand-image" />
                    </a>
                </div><!--/.item-->
            </div><!--/.owl-carousel-->
        </div><!--/.users-area-->

    </div><!--/.container-->

</section>
<footer id="contact"  class="contact">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <a href="{{route('home')}}">carvilla</a>
                        </div>
                        <p>
                            As a leading car dealership website, CarVilla offers a curated selection of top-tier vehicles, combining quality, reliability, and unparalleled service to elevate your car-buying journey
                        </p>
                        <div class="footer-contact">
                            <p>info@themesine.com</p>
                            <p>+1 (885) 2563154554</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="single-footer-widget">
                        <h2>about devloon</h2>
                        <ul>
                            <li><a href="#">about us</a></li>
                            <li><a href="#">career</a></li>
                            <li><a href="#">terms <span> of service</span></a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="{{asset('dokumentacija.pdf')}}" target="_blank">Documentation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="single-footer-widget">
                        <h2>top brands</h2>
                        <div class="row">
                            <div class="col-md-7 col-xs-6">
                                <ul>
                                    <li><a href="#">BMW</a></li>
                                    <li><a href="#">lamborghini</a></li>
                                    <li><a href="#">camaro</a></li>
                                    <li><a href="#">audi</a></li>
                                    <li><a href="#">infiniti</a></li>
                                    <li><a href="#">nissan</a></li>
                                </ul>
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <ul>
                                    <li><a href="#">ferrari</a></li>
                                    <li><a href="#">porsche</a></li>
                                    <li><a href="#">land rover</a></li>
                                    <li><a href="#">aston martin</a></li>
                                    <li><a href="#">mersedes</a></li>
                                    <li><a href="#">opel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h2>news letter</h2>
                        <div class="footer-newsletter">
                            <p>
                                Subscribe to get latest news  update and informations
                            </p>
                        </div>
                        <div class="hm-foot-email">
                            <div class="foot-email-box">
                                <input type="text" class="form-control" placeholder="Add Email">
                            </div><!--/.foot-email-box-->
                            <div class="foot-email-subscribe">
                                <span><i class="fa fa-arrow-right"></i></span>
                            </div><!--/.foot-email-icon-->
                        </div><!--/.hm-foot-email-->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="row">
                <div class="col-sm-6">
                    <p>
                        &copy; copyright.designed and developed by <a href="https://www.themesine.com/">themesine</a>.
                    </p><!--/p-->
                </div>
                <div class="col-sm-6">
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div><!--/.footer-copyright-->
    </div><!--/.container-->

    <div id="scroll-Top">
        <div class="return-to-top">
            <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
        </div>

    </div><!--/.scroll-Top-->

</footer>
@include('fixed.scripts')
