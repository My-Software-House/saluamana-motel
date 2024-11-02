@extends('frontend.template.template')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumb-text">
              <h2>Rooms</h2>
              <div class="bt-option">
                <a href="{{ route('frontend.home') }}">Home</a>
                <span>Rooms</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/template/img/room/room-1.jpeg') }}" alt="">
                        <div class="ri-text">
                            <h4>Single Room</h4>
                            <h3>Rp 217.000<span>/Pernight</span></h3>
                            <h5 class="mb-2"><s>Rp. 310.000</s> <span class="text-danger">Discount 30%</span></h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size</td>
                                        <td>: 13 m²</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity</td>
                                        <td>: Max persion 1</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed</td>
                                        <td>: 1 Single Bed</td>
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
                    <div class="room-item">
                        <img src="{{ asset('/template/img/room/room-2.jpeg') }}" alt="">
                        <div class="ri-text">
                            <h4>Middle Room</h4>
                            <h3>Rp. 247.000<span>/Pernight</span></h3>
                            <h5 class="mb-2"><s>Rp. 353.000</s> <span class="text-danger">Discount 30%</span></h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size</td>
                                        <td>: 17 m²</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity</td>
                                        <td>: Max persion 2</td>
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
                    <div class="room-item">
                        <img src="{{ asset('/template/img/room/room-3.jpeg') }}" alt="">
                        <div class="ri-text">
                            <h4>Fighter Room</h4>
                            <h3>Rp. 317.000<span>/Pernight</span></h3>
                            <h5 class="mb-2"><s>Rp. 453.000</s> <span class="text-danger">Discount 30%</span></h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size</td>
                                        <td>: 21 m²</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity</td>
                                        <td>Max persion 2</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed</td>
                                        <td>: 1 Double Bed</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/template/img/room/room-4.jpeg') }}" alt="">
                        <div class="ri-text">
                            <h4>Middle Room Moutain View</h4>
                            <h3>Rp. 247.000<span>/Pernight</span></h3>
                            <h5 class="mb-2"><s>Rp. 353.000</s> <span class="text-danger">Discount 30%</span></h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size</td>
                                        <td>: 17 m²</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity</td>
                                        <td>: Max persion 2</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed</td>
                                        <td>: King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">View:</td>
                                        <td>Gunung Sindoro Sumbing.</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/template/img/room/room-5.jpeg') }}" alt="">
                        <div class="ri-text">
                            <h4>Fighter Room Moutain View</h4>
                            <h3>Rp. 317.000<span>/Pernight</span></h3>
                            <h5 class="mb-2"><s>Rp. 453.000</s> <span class="text-danger">Discount 30%</span></h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size</td>
                                        <td>: 21 m²</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity</td>
                                        <td>Max persion 2</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed</td>
                                        <td>: 1 Double Bed</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">View:</td>
                                        <td>Gunung Sindoro Sumbing.</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="room-pagination">
                        <a href="#">1</a>
                        <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
@endsection
