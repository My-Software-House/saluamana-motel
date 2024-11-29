@extends('backend.layouts.template')

@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Tipe Kamar {{ $roomType->name }}</h4>
            <img src="{{ asset('storage' . $roomType->main_image) }}" alt="" width="100%">

            <div class="row mt-4">
                <div class="col-md-6">
                    <h4 class="my-3">Detail Tipe Kamar</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td>:</td>
                                <td>30 ft</td>
                            </tr>
                            <tr>
                                <td>Capacity:</td>
                                <td>:</td>

                                <td>Max persion 5</td>
                            </tr>
                            <tr>
                                <td>Bed:</td>
                                <td>:</td>

                                <td>King Beds</td>
                            </tr>
                            <tr>
                                <td>Services:</td>
                                <td>:</td>

                                <td>Wifi, Television, Bathroom,...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h4 class="my-3">Detail Fasilitas</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>
                                    <a href="{{ route('backend.rooms-types.create-amenity', ['id' => $roomType->id]) }}" class="btn btn-primary btn-sm">Tambah Fasilitas Kamar</a>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                @if ($roomType->amenities()->count() == 0)
                                    <span>Belum ada fasilitas</span>
                                @endif
                                @foreach ($roomType->amenities()->get() as $amenity)
                                    <span class="badge badge-light">
                                        <i class="{{ $amenity->icon }} text-primary"></i> {{ $amenity->name }}
                                    </span>
                                @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
