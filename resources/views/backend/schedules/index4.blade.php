<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Image Gallery</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <style>
    .gallery-image {
      object-fit: cover;
      border-radius: 5px;
    }
    .view-all-btn {
      position: absolute;
      bottom: 10px;
      left: 10px;
      background-color: white;
      padding: 5px 15px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .view-all-btn:hover {
      background-color: #f1f1f1;
    }

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
    .facility-list {
            border: none;
            padding: 0.75rem;
            display: flex;
            align-items: center;
            font-size: 1rem;
        }
        .facility-list i {
            font-size: 1.2rem;
            margin-right: 10px;
            color: red;
        }
        .facility-list .text-muted {
            color: #6c757d;
        }

        .btn-outline-primary {
            border-color: red;
            color: red;
        }
        .btn-outline-primary:hover {
            background-color: red;
            color: white;
        }
  </style>
</head>
<body>
  <div class="container mt-5">
    <!-- Gallery Grid -->
    <div class="row g-2 position-relative">
      <!-- Big Image -->
      <div class="col-md-6">
        <img src="https://via.placeholder.com/600x400" class="w-100 h-100 gallery-image" alt="Main Image">
      </div>
      <!-- Smaller Images -->
      <div class="col-md-6">
        <div class="row g-2">
          <div class="col-6">
            <img src="https://via.placeholder.com/300x200" class="w-100 gallery-image" alt="Image 1">
          </div>
          <div class="col-6">
            <img src="https://via.placeholder.com/300x200" class="w-100 gallery-image" alt="Image 2">
          </div>
          <div class="col-6">
            <img src="https://via.placeholder.com/300x200" class="w-100 gallery-image" alt="Image 3">
          </div>
          <div class="col-6 position-relative">
            <img src="https://via.placeholder.com/300x200" class="w-100 gallery-image" alt="Image 4">
            <!-- View All Button -->
            <button class="view-all-btn" data-bs-toggle="modal" data-bs-target="#imageGalleryModal">Tampilkan semua foto</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-7">
            <h4>Fasilitas yang Ditawarkan</h4>
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="facility-list"><i class="bi bi-house-door"></i> Dapur</li>
                        <li class="facility-list"><i class="bi bi-laptop"></i> Area kerja khusus</li>
                        <li class="facility-list"><i class="bi bi-water"></i> Kolam renang pribadi</li>
                        <li class="facility-list"><i class="bi bi-snow"></i> AC</li>
                        <li class="facility-list text-muted"><i class="bi bi-x-circle"></i> Alarm karbon monoksida (Tidak tersedia)</li>
                    </ul>
                </div>
                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="facility-list"><i class="bi bi-wifi"></i> Wifi</li>
                        <li class="facility-list"><i class="bi bi-car-front"></i> Parkir gratis di lokasi</li>
                        <li class="facility-list"><i class="bi bi-tv"></i> TV</li>
                        <li class="facility-list"><i class="bi bi-bathtub"></i> Bak mandi</li>
                        <li class="facility-list text-muted"><i class="bi bi-x-circle"></i> Alarm asap (Tidak tersedia)</li>
                    </ul>
                </div>
            </div>
            <!-- Tombol untuk membuka modal -->
            <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#fasilitasModal">Tampilkan ke-41 fasilitas</button>

        </div>
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

  <!-- Modal for Image Gallery -->
  <div class="modal fade" id="imageGalleryModal" tabindex="-1" aria-labelledby="imageGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageGalleryModalLabel">Semua Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Carousel -->
          <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <!-- Image 1 -->
              <div class="carousel-item active">
                <img src="https://via.placeholder.com/800x500" class="d-block w-100" alt="Image 1">
              </div>
              <!-- Image 2 -->
              <div class="carousel-item">
                <img src="https://via.placeholder.com/800x500" class="d-block w-100" alt="Image 2">
              </div>
              <!-- Image 3 -->
              <div class="carousel-item">
                <img src="https://via.placeholder.com/800x500" class="d-block w-100" alt="Image 3">
              </div>
              <!-- Image 4 -->
              <div class="carousel-item">
                <img src="https://via.placeholder.com/800x500" class="d-block w-100" alt="Image 4">
              </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- Modal untuk melihat semua fasilitas -->
<div class="modal fade" id="fasilitasModal" tabindex="-1" aria-labelledby="fasilitasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-white text-black">
                <h5 class="modal-title" id="fasilitasModalLabel">Semua Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="facility-list"><i class="bi bi-house-door"></i> Dapur</li>
                    <li class="facility-list"><i class="bi bi-laptop"></i> Area kerja khusus</li>
                    <li class="facility-list"><i class="bi bi-water"></i> Kolam renang pribadi</li>
                    <li class="facility-list"><i class="bi bi-snow"></i> AC</li>
                    <li class="facility-list"><i class="bi bi-wifi"></i> Wifi</li>
                    <li class="facility-list"><i class="bi bi-car-front"></i> Parkir gratis di lokasi</li>
                    <li class="facility-list"><i class="bi bi-tv"></i> TV</li>
                    <li class="facility-list"><i class="bi bi-bathtub"></i> Bak mandi</li>
                    <li class="facility-list text-muted"><i class="bi bi-x-circle"></i> Alarm karbon monoksida (Tidak tersedia)</li>
                    <li class="facility-list text-muted"><i class="bi bi-x-circle"></i> Alarm asap (Tidak tersedia)</li>
                    <!-- Tambahkan lebih banyak fasilitas jika diperlukan -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
