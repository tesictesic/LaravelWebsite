@extends('layout')
@section('content')
    <section id="service" class="service">
        <div class="container">
            <div class="service-content">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service-item">
                            <div class="single-service-icon">
                                <i class="flaticon-car"></i>
                            </div>
                            <h2><a href="#">largest dealership <span> of</span> car</a></h2>
                            <p>
                                The title of the largest car dealership is bestowed upon this establishment due to its expansive inventory, diverse selection of vehicles, and exceptional service
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service-item">
                            <div class="single-service-icon">
                                <i class="flaticon-car-repair"></i>
                            </div>
                            <h2><a href="#">unlimited repair warrenty</a></h2>
                            <p>
                                Offering an unlimited repair warranty, ensuring customers peace of mind and confidence in the longevity of their vehicle investment
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service-item">
                            <div class="single-service-icon">
                                <i class="flaticon-car-1"></i>
                            </div>
                            <h2><a href="#">insurence support</a></h2>
                            <p>
                                Comprehensive insurance support, providing a safety net for unforeseen circumstances and offering peace of mind to our valued customers
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->

    </section>
    <section id="new-cars" class="new-cars">
        <div class="container">
            <div class="section-header">
                <p>checkout <span>the</span> latest cars</p>
                <h2>newest cars</h2>
            </div><!--/.section-header-->
            <div class="new-cars-content">
                <div class="owl-carousel owl-theme" id="new-cars-carousel">
                    <div class="new-cars-item">
                        <div class="single-new-cars-item">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="new-cars-img">
                                        <img src="assets/images/new-cars-model/ncm1.png" alt="img"/>
                                    </div><!--/.new-cars-img-->
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="new-cars-txt">
                                        <h2><a href="#">chevrolet camaro <span> za100</span></a></h2>
                                        <p>
                                            The Chevrolet Camaro ZA100 is a high-performance sports car that is designed to deliver a thrilling driving experience. This iconic vehicle boasts a powerful engine, a sleek exterior, and a comfortable interior.
                                        </p>
                                        <p class="new-cars-para2">
                                            The Camaro ZA100 is equipped with advanced technology features, including a user-friendly infotainment system and a suite of driver assistance features. It also offers a smooth and agile ride, making it an ideal choice for driving enthusiasts.
                                        </p>
                                        <button class="welcome-btn new-cars-btn" onclick="window.location.href='/cars'">
                                            view details
                                        </button>
                                    </div><!--/.new-cars-txt-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.single-new-cars-item-->
                    </div><!--/.new-cars-item-->
                    <div class="new-cars-item">
                        <div class="single-new-cars-item">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="new-cars-img">
                                        <img src="assets/images/new-cars-model/ncm2.png" alt="img"/>
                                    </div><!--/.new-cars-img-->
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="new-cars-txt">
                                        <h2><a href="#">BMW series-3 wagon</a></h2>
                                        <p>
                                            Experience the perfect blend of style, performance, and versatility with the BMW 3 Series Wagon. This sleek and sophisticated vehicle combines the iconic design elements of the BMW 3 Series with the added practicality of a spacious wagon.
                                        </p>
                                        <p class="new-cars-para2">
                                            The Series 3 Wagon offers a harmonious fusion of luxury and functionality, boasting a refined interior, cutting-edge technology, and ample cargo space.
                                        </p>
                                        <button class="welcome-btn new-cars-btn" onclick="window.location.href='/cars'">
                                            view details
                                        </button>
                                    </div><!--/.new-cars-txt-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.single-new-cars-item-->
                    </div><!--/.new-cars-item-->
                    <div class="new-cars-item">
                        <div class="single-new-cars-item">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="new-cars-img">
                                        <img src="assets/images/new-cars-model/ncm3.png" alt="img"/>
                                    </div><!--/.new-cars-img-->
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="new-cars-txt">
                                        <h2><a href="#">ferrari 488 superfast</a></h2>
                                        <p>
                                            The Ferrari 488 Pista is powered by the most powerful V8 engine in the Maranello marque’s history and is the company’s special series sports car with the highest level yet of technological transfer from racing.
                                        </p>
                                        <p class="new-cars-para2">
                                            In fact the name, meaning ‘track’ in Italian, was chosen specifically to testify to Ferrari’s unparalleled heritage in motor sports.
                                        </p>
                                        <button class="welcome-btn new-cars-btn" onclick="window.location.href='/cars'">
                                            view details
                                        </button>
                                    </div><!--/.new-cars-txt-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.single-new-cars-item-->
                    </div><!--/.new-cars-item-->
                </div><!--/#new-cars-carousel-->
            </div><!--/.new-cars-content-->
        </div><!--/.container-->

    </section>
@endsection
