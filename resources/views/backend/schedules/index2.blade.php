{{-- <!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            navLinks: true,
            selectable: true,
            navLinkDayClick: function(date, jsEvent) {
                console.log('day', date.toISOString());
                console.log('coords', jsEvent.pageX, jsEvent.pageY);
            },
            initialView: 'dayGridMonth',
            events: [
                {
                    title: 'Belajar',
                    start: '2024-11-12T10:30:00',
                    end: '2024-11-13T11:30:00',
                    extendedProps: {
                        department: 'BioChemistry'
                    },
                    description: 'Lecture'
                }
            ],
            eventClick: function(info) {
                window.location = "http://www.google.com";
                // alert('Event: ' + info.event.title);
                // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                // alert('View: ' + info.view.type);

                // change the border color just for fun
                info.el.style.borderColor = 'red';
            }
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div class="row" style="margin: 50px 200px">
        <div id='calendar'></div>
    </div>
  </body>
</html> --}}
{{--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Date Range Picker</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
  <h1>Hotel Booking - Select Date Range</h1>
  <form>
    <label for="dateRangePicker">Choose your stay:</label>
    <input type="text" id="dateRangePicker" placeholder="Select a date range" required>
    <button type="submit">Submit</button>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    // Hardcoded disabled dates
    const disabledDates = [
      "2024-11-01",
      "2024-11-02",
      "2024-11-10",
      "2024-11-22",
      "2024-11-25",
      "2024-11-30",
    ];

    // Initialize Flatpickr
    flatpickr("#dateRangePicker", {
      mode: "range", // Enable range selection
      dateFormat: "Y-m-d", // Format of the selected dates
      disable: disabledDates, // Use hardcoded disabled dates
      minDate: "today", // Disable past dates
      onChange: function(selectedDates, dateStr, instance) {
        console.log("Selected range:", dateStr); // Debug selected range
      },
    });

  </script>
</body>
</html>

 --}}
{{--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Date Range Picker</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<body>
  <h1>Hotel Booking - Select Date Range</h1>
  <form>
    <div>
        <label for="check-in">Check-In & Range</label>
        <input type="text" id="check-in" placeholder="Pilih tanggal range">
    </div>
    <div>
        <label for="check-out">Check-Out</label>
        <input type="text" id="check-out" placeholder="Tanggal check-out" readonly>
    </div>
    <button type="submit">Submit</button>

  </form>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
  flatpickr("#check-in", {
    mode: "range", // Gunakan mode range
    dateFormat: "d/m/Y",
    minDate: "today", // Tidak bisa memilih tanggal sebelum hari ini
    onChange: function (selectedDates, dateStr, instance) {
      if (selectedDates.length === 2) {
        // Ambil tanggal pertama (check-in) dan tanggal kedua (check-out)
        const [checkInDate, checkOutDate] = selectedDates;

        // Masukkan tanggal pertama ke input check-in
        document.getElementById("check-in").value = instance.formatDate(checkInDate, "d/m/Y");

        // Masukkan tanggal kedua ke input check-out
        document.getElementById("check-out").value = instance.formatDate(checkOutDate, "d/m/Y");
      }
    },
  });

  // Inisialisasi check-out picker untuk tampilan (opsional, jika readonly)
  flatpickr("#check-out", {
    dateFormat: "d/m/Y",
    clickOpens: false, // Nonaktifkan pembukaan manual
  });
});

</script>
</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-light-subtle">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-4 shadow-sm border-0">
          <h5 class="card-title">Pilih Tanggal</h5>
          <div class="mb-3">
            <label for="check-in" class="form-label">Check-In</label>
            <input type="text" id="check-in" class="form-control" placeholder="Pilih tanggal check-in">
          </div>
          <div class="mb-3">
            <label for="check-out" class="form-label">Check-Out</label>
            <input type="text" id="check-out" class="form-control" placeholder="Tanggal check-out" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      flatpickr("#check-in", {
        mode: "range", // Aktifkan mode range
        dateFormat: "d/m/Y",
        minDate: "today", // Hanya tanggal dari hari ini yang dapat dipilih
        onChange: function (selectedDates, dateStr, instance) {
          if (selectedDates.length === 2) {
            const [checkInDate, checkOutDate] = selectedDates;

            // Tampilkan hanya tanggal awal di input Check-In
            document.getElementById("check-in").value = instance.formatDate(checkInDate, "d/m/Y");

            // Masukkan tanggal akhir ke input Check-Out
            document.getElementById("check-out").value = instance.formatDate(checkOutDate, "d/m/Y");
          }
        },
      });
    });
  </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar Example</title>
  <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       /* Wrapper untuk carousel */
.carousel-wrapper {
  position: relative;
  width: 100%;
  overflow: hidden;
}

/* Carousel */
.carousel {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.carousel img {
  width: 100%;
  height: 300px; /* Tinggi tetap */
  object-fit: cover;
}

/* Tombol Panah */
.carousel-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255, 255, 255, 0.619); /* Tombol dengan background transparan */
  color: #fff;
  border: none;
  padding: 5px 17px;
  cursor: pointer;
  font-size: 24px;
  border-radius: 50%;
  z-index: 10;
  display: none; /* Sembunyikan secara default */
}

.left-arrow {
  left: 10px;
}

.right-arrow {
  right: 10px;
}

/* Tampilkan tombol saat hover */
.carousel-wrapper:hover .carousel-arrow {
  display: block;
}


    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</head>
<body class="bg-light-subtle">
<div class="container mt-4">
  <div class="row">
    <div class="col-md-4">
      <div class="property border-0 shadow">
        <!-- Slick Carousel -->
        <div class="carousel-wrapper position-relative">
            <div class="carousel">
                <img src="{{ asset('frontend/img/room/room-1.jpg') }}" alt="Image 1">
                <img src="{{ asset('frontend/img/room/room-2.jpeg') }}" alt="Image 2">
                <img src="{{ asset('frontend/img/room/room-3.jpg') }}" alt="Image 3">
            </div>

            {{-- <button class="carousel-arrow left-arrow">&#8249;</button>
            <button class="carousel-arrow right-arrow">&#8250;</button> --}}
        </div>
        <!-- Info Properti -->
        <div class="property-info m-3">
          <h5>Lovina, Indonesia</h5>
          <p>Berjarak 468 kilometer</p>
          <p>8–13 Des</p>
          <p class="text-success fw-bold pb-3">Rp5.122.928/malam</p>
        </div>
      </div>
    </div>

    <!-- Ulangi untuk properti lainnya -->
  </div>
</div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  $(document).ready(function () {
    $('.carousel').slick({
      dots: true,
      arrows: true,
      prevArrow: '<button class="carousel-arrow left-arrow">&#8249;</button>',
      nextArrow: '<button class="carousel-arrow right-arrow">&#8250;</button>',
      autoplay: true,
      autoplaySpeed: 3000,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
  });
</script>
</body>
</html>
