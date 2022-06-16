@if (Session::has('owner') || Session::has('staff'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Konfirmasi Pesanan</title>
</head>

<body>
<section id = "konfirmpesanan">
    <div class="title">
        <h1>Konfirmasi Pesanan</h1>
        @foreach ($displayTampilkanTotalHarga as $hasildisplayTampilkanTotalHarga)
        <h2>Meja {{$hasildisplayTampilkanTotalHarga->NO_MEJA}}</h2>
        {{-- <h2>Meja {{$displayTampilkanTotalHarga->NO_MEJA}}</h2> --}}

        @endforeach
        <div class = "garis">

        </div>
    </div>
    <table>
        <tr>
            <th>Menu</th>
            <th style="text-align:center">Jumlah</th>
            <th style="text-align:right">Harga</th>
            <!-- <th>Hapus</th> -->
        </tr>
        @foreach ($displayTampilkanPesanan as $hasildisplayTampilkanPesanan)
        <tr>
            <td>{{$hasildisplayTampilkanPesanan->NAMA_MENU}}</td>
            <td style="text-align:center">{{$hasildisplayTampilkanPesanan->TOTAL_JUMLAH}}</td>
            <td style="text-align:right">{{$hasildisplayTampilkanPesanan->TOTAL_HARGA_MENU}}</td>
            <!-- <th><img src="..\resource\Trash.png" alt=""></th> -->
        </tr>
        @if($hasildisplayTampilkanPesanan->NOTE_PESANAN != "-")
                <tr>
                    <td style="font-style:italic;">
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{$hasildisplayTampilkanPesanan->NOTE_PESANAN}}
                    </td>
                </tr>
        @endif
        @endforeach
        {{-- <tr>
            <td>Ayam Bakar</td>
            <td>1 pcs</td>
            <td>Rp. 23.000</td>
            <!-- <th><img src="..\resource\Trash.png" alt=""></th> -->
        </tr> --}}
    </table>

    <div class = "garisabu">
    </div>

    <div class = "pembayaran">
        @foreach ($displayTampilkanTotalHarga as $hasilDisplayTampilkanTotalHarga)
            <div class = "flex1">
                <h4>Total Pembayaran</h4>
                <h4>Rp. {{number_format($hasilDisplayTampilkanTotalHarga->TOTAL_HARGA, 2, '.')}}</h4>
                {{-- <h4>{{$displayTampilkanTotalHarga->TOTAL_HARGA}}</h4> --}}

            </div>
        @endforeach

        <div class = "button">

            {{-- UPDATE TRANSAKSI BERDASARKAN MWNU YANG BARU DI INPUT DI PAGE SEBELUMNYA --}}
        @foreach ($displayTampilkanTotalHarga as $hasildisplayTampilkanTotalHarga)

            <form action="{{ url('konfirmasitransaksi/'.$hasildisplayTampilkanTotalHarga->ID_MEJA)}}" method="post">
                @csrf
            <button type="submit" class="buttonkonfirm">Konfirmasi Pesanan</button>
            </form>
        @endforeach
        </div>
    </div>
</section>
</body>
</html>
@else
<meta http-equiv="Refresh" content="0; url='/'" />
@endif
