<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Invoice Salu Amana </title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;

        }
        header {
            top: 0cm;
            margin-left: 1.5cm;
            right: 0cm;
            padding: 0px;
            position: relative;
        }
        /** Define the footer rules **/
        footer {
            padding: 0px;
            position: absolute;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
        }

        body{
            max-height: 100vh
        }
        #halaman{
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            margin-top: 150px;
        }
        .kop{
            float: left;
        }
        .kop-alamat{
            clear: left;
            border: 2px solid purple;
            width: 100%;
            font-size: 8px;
        }
        .head{
            color: purple;
            line-height: 0.7cm;
        }

        .isi p{
            margin: 0;
        }
        table.mahasiswa tr th{
            border: 1px solid black;
        }
        table.mahasiswa tr td{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <header>
        <img src="main-logo.png" style="float: left;" width="150px" />
        <div style="float: right; margin-top: 10px">
            @if ($booking->booking_status_id == 1 || $booking->booking_status_id == 5)
                <h2 style="color: red; font-size: 25px">Belum Dibayar</h2>
            @else
                <h2 style="color: green; font-size: 25px">Terbayarkan</h2>
            @endif
            <p>
                0812-6655-7555 <br>
                Jalan Kyai Sabuk Alu Nomer 3, Pagerkukuh <br>
                Wonosobo, 56314, Jawa Tengah <br>
                saluamana03@gmail.com
            </p>
        </div>
    </header>
    <div id="halaman">
        <hr>
        <div class="isi">
            <div style="background-color: #eee; padding: 10px">
                <h1 style="font-size: 18px;">Invoice #{{ substr($booking->booking_id, 8, 13) }}</h1>
                <p>Tanggal Faktur :
                    {{ Carbon\Carbon::parse($booking->created_at)->translatedFormat('d M Y') }}
                </p>
            </div>
            <table class="table " style="border: 0px; font-size: 18px; margin-top: 30px">
                <tr>
                    <td style="width: 30%">Nomor/ Tanggal</td>
                    <td>:</td>
                    <td style="width: 70%"><b>{{ $booking->booking_id }} /</b> {{ Carbon\Carbon::parse($booking->created_at)->translatedFormat('d M Y') }}</td>
                </tr>
                <tr>
                    <td>Tanggal Cek in</td>
                    <td>:</td>
                    <td>{{ Carbon\Carbon::parse($booking->check_in)->translatedFormat('d M Y') }}</th>
                </tr>
                <tr>
                    <td>Tanggal Cek Out</td>
                    <td>:</td>
                    <td>{{ Carbon\Carbon::parse($booking->check_out)->translatedFormat('d M Y') }}</th>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $booking->user->name }}</td>
                </tr>
                <tr>
                    <td>No Hp / Email</td>
                    <td>:</td>
                    <td>{{ $booking->user->phone }} / {{ $booking->user->email }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $booking->user->address ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tipe Kamar</td>
                    <td>:</td>
                    <td>{{ $booking->roomType->name }}</td>
                </tr>
                <tr>
                    <td>Jumlah Kamar</td>
                    <td>:</td>
                    <td>{{ $booking->total_room }} Kamar</td>
                </tr>
                <tr>
                    <td>Jumlah Tamu</td>
                    <td>:</td>
                    <td>{{ $booking->total_guest }} Tamu , {{ $booking->total_child }} Anak</td>
                </tr>
                <tr>
                    <td>Layanan Sarapan</td>
                    <td>:</td>
                    <td>
                        @if ($booking->is_breakfast)
                            Termasuk
                        @else
                            Tidak Termasuk
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Total Tagihan </td>
                    <td>:</td>
                    <td> <b> Rp. {{ number_format($booking->total_amount) }} </b> (Termasuk biaya pajak 10%)</td>
                </tr>
            </table>

            <table style="border: 1px; font-size: 18px; width: 100%; margin-top: 100px">
                <tr>
                    <td style="text-align: center">
                        <b>Tamu Menginap</b>
                    </td>
                    <td style="text-align: center">
                        <b>Resepsionis</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <br>
                        <br>
                        <br>
                        <br>
                        {{ $booking->user->name }}
                    </td>
                    <td style="text-align: center">
                        <br>
                        <br>
                        <br>
                        <br>
                        (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                    </td>
                </tr>
                {{-- <tr>
                    <td style="width: 70%"></td>
                    <td style="width: 150px"><b>Tamu Menginap</b> <br> Menyetujui </td>
                </tr>
                <br>
                <br>
                <br>
                <tr>
                    <td style="width: 70%"></td>
                    <td style="width: 150px; padding: 20px">
                        {{ $booking->user->name }}
                        <br>
                    </td>
                </tr> --}}
            </table>
            <footer>
                <img src="footer-invoice.png" width="50%"/>
            </footer>
            <div  style="margin-top: 510px">
                <img src="main-logo.png" style="float: left; left: 0px;" width="150px" />
                <div style="float: right; margin-top: 10px">
                    <p>
                        0812-6655-7555 <br>
                        Jalan Kyai Sabuk Alu Nomer 3, Pagerkukuh <br>
                        Wonosobo, 56314, Jawa Tengah <br>
                        saluamana03@gmail.com
                    </p>
                </div>
            </div>
            <hr style="margin-top: 130px"">
            <p>Saya tamu berdasarkan invoice Nomor <span style="font-weight: 700">#{{ substr($booking->booking_id, 8, 13) }}</span> , tanggal  <span style="font-weight: 700">{{ Carbon\Carbon::parse($booking->created_at)->translatedFormat('d M Y') }}</span> Menerangkan dan Menyatakan : </p>
            <ol>
                <li>Saya dan tamu yang bersama saya adalah benar pasangan saya (suami/istri) yang sah secara hukum dan agama.</li>
                <li>Saya dan tamu yang bersama saya adalah benar rekan kerja / sahabat / saudara / tim regu saya, yang akan bermain bersama saya atas sebab yang halal dan tidak bertentangan dengan asusila atau hal-hal buruk lainya yang bertentangan dengan ketertiban sosial, agama dan budaya.</li>
                <li>Saya dan tamu yang bersama saya akan menaati aturan tata tertib selama menginap di SALU AMANA <i>Residence</i> Wonosobo.</li>
                <li>Saya dan tamu yang bersama saya bersedia menjaga ketenangan dan ketertiban selama menginap di SALU AMANA <i>Residence</i> Wonosobo.</li>
                <li>Barang yang tertinggal maximal 3x24 jam tidak diambil maka tidak menjadi tanggung jawab pihak SALU AMANA <i>residence</i> Wonosobo.</li>
                <li>
                    <ol type="a">
                        <li>
                            SALU AMANA Residence Wonosobo tidak bertanggung jawab atas kehilangan atau kerusakan barang-barang pribadi tamu, termasuk tetapi tidak terbatas pada uang, perhiasan, atau barang berharga lainnya, kecuali jika kehilangan atau kerusakan tersebut disebabkan oleh pihak SALU AMANA <i>Residence</i> Wonosobo atau staf secara langsung.
                        </li>
                        <li>
                            SALU AMANA <i>Residence</i> Wonosobo juga tidak bertanggung jawab atas kehilangan atau kerusakan apa pun atas barang-barang tamu yang tertinggal.
                        </li>
                    </ol>
                </li>
                <li>
                    Saya dan tamu yang bersama saya menyatakan melepaskan hak atas barang- barang kami yang tertinggal di SALU AMANA <i>Residence</i> Wonosobo dan melepaskan SALU AMANA <i>Residence</i> Wonosobo dari segala tuntutan, gugatan dan laporan sehubungan dengan barang yang tertinggal tersebut. Namun demikian, SALU AMANA <i>Residence</i> Wonosobo berkomitmen dengan itikad baik akan menyimpan barang-barang tamu yang tertinggal selama 2 x 24 jam. Tamu bertanggung jawab atas biaya penyimpanan dan pengiriman barang.
                </li>
                <li>
                    Saya dan tamu yang bersama saya bersedia dikenakan denda sesuai ketentuan kebijakan SALUAMANA <i>Residence</i> Wonosobo apabila melakukan hal-hal sebagai berikut :
                    <ol type="a">
                        <li>
                            Merokok di area yang tidak sepatutnya, dikenakan denda sebesar Rp 1.000.000,00 (satu juta rupiah).
                        </li>
                        <li>
                            Merusak barang dan/atau menghilangkan, dikenakan denda sesuai dengan nilai barang.
                        </li>
                    </ol>
                </li>


            </ul>
            <table class="table text-center mt-5" style="border: 0px; font-size: 18px">
                <tr>
                    <td style="width: 70%"></td>
                    <td style="width: 150px"><b>Tamu Menginap</b> <br> Menyetujui </td>
                </tr>
                <br>
                <br>
                <br>
                <tr>
                    <td style="width: 70%"></td>
                    <td style="width: 150px; padding: 20px">
                        {{ $booking->user->name }}
                        <br>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    <footer>
        <img src="footer-invoice.png" width="50%"/>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
