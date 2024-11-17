@extends('frontend.layouts.template')

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
                @foreach ($roomTypes as $room)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('storage' . $room->main_image) }}" alt="">
                        <div class="ri-text">
                            <h4>{{ $room->name }}</h4>
                            <h3>Rp {{ number_format($room->price - ($room->price * ($room->discount / 100))) }}<span>/Pernight</span></h3>
                            <h5 class="mb-2"><s>Rp. {{ number_format($room->price) }}</s> <span class="text-danger">Discount {{ $room->discount }}%</span></h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size</td>
                                        <td>: {{ $room->size }} m²</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity</td>
                                        <td>: Max persion {{ $room->capacity }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed</td>
                                        <td>: {{ $room->capacity }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>: Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('frontend.room-types.detail', ['name' => $room->name]) }}" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                @endforeach

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
