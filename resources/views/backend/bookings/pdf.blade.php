<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Invoice Salu Amana </title>
    <style>
        header {
            top: 0cm;
            left: 0cm;
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
        * {
            font-family: 'Times New Roman', Times, serif;
        }
        body{
            max-height: 100vh
        }
        #halaman{
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            font-size: 13px;
            margin-top: 50px;
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
        <img src="header-invoice.png" width="100%"/>
    </header>
    <div id="halaman">
        <h1 style="text-align: center">Invoice</h1>

        <div class="isi mt-5">
            <table class="table " style="border: 0px; font-size: 18px">
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
                    <td>Tipe Kamar</td>
                    <td>:</td>
                    <td>{{ $booking->roomType->name }}</td>
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
        <img src="footer-invoice.png" width="100%"/>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
