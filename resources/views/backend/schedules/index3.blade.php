<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Card</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <style>
    .price-info {
      font-size: 1.5rem;
      font-weight: bold;
    }
    .price-breakdown {
      font-size: 0.9rem;
      color: #6c757d;
    }
    .btn-book {
      background: linear-gradient(90deg, #f43b47, #ec008c);
      color: #fff;
    }
    .btn-book:hover {
      background: linear-gradient(90deg, #ec008c, #f43b47);
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <!-- Harga per malam -->
                    <div class="mb-3">
                    <span class="price-info">Rp6.337.790</span> <small>/ malam</small>
                    </div>

                    <!-- Form Check-in & Check-out -->
                    <form>
                    <div class="row g-2 mb-3">
                        <div class="col">
                            <label for="checkin" class="form-label small text-muted">CHECK-IN</label>
                            <input type="text" id="check-in" class="form-control" placeholder="Pilih tanggal check-in">
                        </div>
                        <div class="col">
                            <label for="checkout" class="form-label small text-muted">CHECK-OUT</label>
                            <input type="text" id="check-out" class="form-control" placeholder="Tanggal check-out" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="guests" class="form-label small text-muted">TAMU</label>
                        <select id="guests" class="form-select">
                        <option selected>1 tamu</option>
                        <option>2 tamu</option>
                        <option>3 tamu</option>
                        <option>4 tamu</option>
                        </select>
                    </div>
                    <!-- Tombol Pesan -->
                    <button type="button" class="btn btn-book w-100">Pesan</button>
                    </form>

                    <!-- Informasi Biaya -->
                    <p class="text-center mt-3 mb-1 small text-muted">Anda belum dikenakan biaya</p>
                    <div class="d-flex justify-content-between price-breakdown">
                    <span>Rp6.337.790 x 6 malam</span>
                    <span>Rp38.026.740</span>
                    </div>
                    <div class="d-flex justify-content-between price-breakdown">
                    <span>Biaya kebersihan</span>
                    <span>Rp475.334</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                    <span class="fw-bold">Total sebelum pajak</span>
                    <span class="fw-bold">Rp38.502.074</span>
                    </div>
                </div>
                </div>
        </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    const disabledDates = [
      "2024-11-01",
      "2024-11-02",
      "2024-11-10",
      "2024-11-22",
      "2024-11-25",
      "2024-11-30",
    ];

    document.addEventListener('DOMContentLoaded', function () {
      flatpickr("#check-in", {
        mode: "range", // Aktifkan mode range
        disable: disabledDates, // Use hardcoded disabled dates
        dateFormat: "d-M-Y",
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
</html>
