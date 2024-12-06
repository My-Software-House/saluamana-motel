<li class="nav-item">
    <a class="nav-link" href="{{ route('backend.dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#room" aria-expanded="false" aria-controls="room">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Manajemen Kamar</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="room">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('backend.rooms-types.index') }}">Tipe Kamar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('backend.amenities.index') }}">Fasilitas</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#booking" aria-expanded="false" aria-controls="booking">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Booking</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="booking">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('backend.bookings.index') }}">Semua Booking</a></li>

            @foreach (App\Models\BookingStatus::all() as $booking)
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.bookings.index', ['booking_status_id' => $booking->id]) }}">{{ $booking->name }}</a></li>
            @endforeach
        </ul>
    </div>
</li>
{{-- <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="icon-printer menu-icon"></i>
        <span class="menu-title">Voucher</span>
    </a>
</li> --}}
{{-- <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="icon-book menu-icon"></i>
        <span class="menu-title">Pembayaran</span>
    </a>
</li> --}}
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#jadwalbooking" aria-expanded="false" aria-controls="booking">
        <i class="fa-regular fa-calendar menu-icon"></i>
        <span class="menu-title">Jadwal Booking</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="jadwalbooking">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="#">Tambah Jadwal </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> Jadwal</a>
            </li>
        </ul>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link" href="{{ route('backend.customers.index') }}">
        <i class="fa-solid fa-users menu-icon"></i>
        <span class="menu-title">Customer</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fa-regular fa-user menu-icon"></i>
        <span class="menu-title">User Admin</span>
    </a>
</li>
