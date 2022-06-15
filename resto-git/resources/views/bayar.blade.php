@if (Session::has('owner') || Session::has('staff'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Bayar</title>
</head>
<body>
<section id = "bayar">
    <div class="title">
        <h1>Bayar</h1>
        @foreach ($displayTotalBayar as $hasilDisplayTotalBayar)
            <h2>Meja {{$hasilDisplayTotalBayar->NO_MEJA}}</h2>
        @endforeach
        <div class = "garis">

        </div>
    </div>
    <table>
        <tr>
            <th>Menu</th>
            <th style="text-align:center">Jumlah</th>
            <th style="text-align:right">Harga</th>
        </tr>
        @foreach ($displayBayar as $hasilDisplayBayar)
        <tr>
            <td style="max-width:18vw;">{{$hasilDisplayBayar->NAMA_MENU}}</td>
            <td style="text-align:center">{{$hasilDisplayBayar->TOTAL_JUMLAH}}</td>
            <td style="text-align:right">{{$hasilDisplayBayar->TOTAL_HARGA_MENU}}</td>
        </tr>
        @if($hasilDisplayBayar->NOTE_PESANAN != "-")
                <tr>
                    <td style="font-style:italic;">
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{$hasilDisplayBayar->NOTE_PESANAN}}
                    </td>
                </tr>
        @endif
        @endforeach
        {{-- <tr>
            <td>Ayam Goreng</td>
            <td>2 pcs</td>
            <td>Rp 44.000</td>
        </tr>
        <tr>
            <td>Ayam Bakar</td>
            <td>1 pcs</td>
            <td>Rp 23.000</td>
        </tr> --}}
    </table>
    <div class = "garisabu">

    </div>
    <div class = "pembayaran">
        <form action="" method ="GET">
            @csrf
        @foreach ($displayTotalBayar as $hasilDisplayTotalBayar)

        <div class = "flex1">
            <h4>Total Pembayaran</h4>
            <h4>Rp. {{$hasilDisplayTotalBayar->TOTAL_HARGA}}</h4>
        </div>

            <div class = "flex2">
                <input type="number" id="tboxbayar" name="bayar" placeholder="Masukkan jumlah uang yang diterima" required>
                <input type="number" id="tboxtotalhargagaib" name="total" value= {{$hasilDisplayTotalBayar->TOTAL_HARGA}} required>

                <button type="submit" class="buttonok" name = "sub">OK</button>
            </div>
        @endforeach

            <?php
                $c = 0;
                if (isset($_GET['sub'])) {
                    $a=$_GET['total'];
                    $b=$_GET['bayar'];
                    $c=$b-$a;
                }
            ?>

        </form>
    </div>

    <div class = "bawahflex">
        <div class = "text">
            <h4>Kembalian</h4>
            <h4>Rp. {{$c}}</h4>
        </div>

    @foreach ($displayTotalBayar as $hasilDisplayTotalBayar)

    <form action="{{ url('paymentprocess/update/table/go/'.$hasilDisplayTotalBayar->NO_MEJA)}}" method="POST">
        @csrf
        <div class = "button">
            <button type="submit" class="buttonbayar">Bayar</button>
        </div>
        <br>
    </form>

    @endforeach


    </div>
</section>
</body>
</html>

@else
<meta http-equiv="Refresh" content="0; url='/'" />
@endif
