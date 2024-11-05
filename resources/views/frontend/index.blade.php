@extends('frontend.layouts.template')
@section('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Salu Amana Residence Wonosobo</h1>
                        <p>Hotel Berbasis Syariah yang berada di pusat kota Wonosobo</p>
                        <a href="{{ route('frontend.bookings') }}" class="primary-btn">Booking Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Booking Salu Amana Hotel</h3>
                        <form action="{{ route('frontend.bookings') }}">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest">
                                    <option value="">2 Adults</option>
                                    <option value="">3 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                    <option value="">2 Room</option>
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('/frontend/img/hero/hero-1.jpeg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('/frontend/img/hero/hero-2.jpeg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('/frontend/img/hero/hero-3.jpeg') }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Tentang Kami</span>
                            <h2>Salu Amana <br />Residence Wonosobo</h2>
                        </div>
                        <p class="f-para">Menginap di Salu Amana Residence Wonosobo bukan hanya memudahkan Anda menjelajahi keindahan Wonosobo, tetapi juga memberikan suasana nyaman untuk beristirahat dengan tenang.</p>
                        <p class="s-para">Salu Amana Residence adalah rekomendasi ideal bagi Anda, para backpacker yang mencari akomodasi ramah anggaran namun tetap mengutamakan kenyamanan selama menginap.</p>
                        <a href="#" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('/frontend/img/about/about-1.jpeg') }}" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('/frontend/img/about/about-2.jpeg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Apa Yang Kami Lakukan</span>
                        <h2>Temukan Layanan Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Travel Plan</h4>
                        <p>Jelajahi destinasi Wonosobo dengan mudah dan nyaman menggunakan layanan Travel Plan kami. Tim kami siap membantu Anda merencanakan perjalanan wisata yang sesuai dengan minat dan jadwal Anda, memastikan Anda dapat menikmati pengalaman yang berkesan selama menginap di hotel kami.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Laundry</h4>
                        <p>Nikmati kenyamanan layanan laundry hotel kami, yang dirancang untuk memastikan pakaian Anda selalu bersih dan rapi selama menginap. Kami menawarkan beberapa pilihan layanan laundry yang disesuaikan dengan kebutuhan Anda</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Pickup Driver </h4>
                        <p>Kami memahami pentingnya perjalanan yang nyaman dan bebas stres dari atau menuju hotel. Layanan Driver Penjemputan kami memastikan Anda dapat menikmati perjalanan yang aman dan nyaman, baik dari bandara, stasiun, terminal, atau lokasi lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('/frontend/img/room/room-1.jpeg') }}">
                            <div class="hr-text">
                                <h3>Single Room</h3>
                                <h2>Rp. 217.000<span>/Pernight</span></h2>
                                <h5><s>Rp. 310.000</s> <span class="discount">30%</span></h5>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size</td>
                                            <td>: 30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity</td>
                                            <td>: Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed</td>
                                            <td>: King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services</td>
                                            <td>: Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('/frontend/img/room/room-2.jpeg') }}">
                            <div class="hr-text">
                                <h3>Medium Room</h3>
                                <h2>Rp. 247.000<span>/Pernight</span></h2>
                                <h5><s>Rp. 353.000</s> <span class="discount">30%</span></h5>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size</td>
                                            <td>:30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>: Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed</td>
                                            <td>: King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>: Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('/frontend/img/room/room-3.jpeg') }}">
                            <div class="hr-text">
                                <h3>Fighter Room</h3>
                                <h2>Rp. 317.000<span>/Pernight</span></h2>
                                <h5><s>Rp. 453.000</s> <span class="discount">30%</span></h5>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size</td>
                                            <td>: 30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>: Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>: King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>: Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>What Customers Say?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                            <p>After a construction project took longer than expected, my husband, my daughter and I
                                needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                                city, neighborhood and the types of housing options available and absolutely love our
                                vacation at Sona Hotel.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Alexander Vasquez</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <div class="ts-item">
                            <p>After a construction project took longer than expected, my husband, my daughter and I
                                needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                                city, neighborhood and the types of housing options available and absolutely love our
                                vacation at Sona Hotel.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Alexander Vasquez</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->
@endsection
