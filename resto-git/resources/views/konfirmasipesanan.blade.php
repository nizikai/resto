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
            <th>Jumlah</th>
            <th>Harga</th>
            <!-- <th>Hapus</th> -->
        </tr>
        @foreach ($displayTampilkanPesanan as $hasildisplayTampilkanPesanan)
        <tr>
            <td>{{$hasildisplayTampilkanPesanan->NAMA_MENU}}</td>
            <td>{{$hasildisplayTampilkanPesanan->TOTAL_JUMLAH}}</td>
            <td>{{$hasildisplayTampilkanPesanan->TOTAL_HARGA_MENU}}</td>
            <!-- <th><img src="..\resource\Trash.png" alt=""></th> -->
        </tr>
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
                <h4>{{$hasilDisplayTampilkanTotalHarga->TOTAL_HARGA}}</h4>
                {{-- <h4>{{$displayTampilkanTotalHarga->TOTAL_HARGA}}</h4> --}}

            </div>
        @endforeach

        <div class = "button">
            {{-- DISINI INSERT KE TRANSAKSI YANG BARU DI INSERT 4 KOLOM--}}
            <button type="submit" class="buttonkonfirm">Konfirmasi Pesanan</button>
        </div>
    </div>
</section>
</body>
</html>
