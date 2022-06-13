<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Pesanan</title>
</head>
<body>
<section id = "pesanan">
    <div class = "content">
        <div class = "kotakstick">
            <div class = "title">
                <h1>Pesanan</h1>
            </div>
            <div class = "button">
                <a href="/pilihmeja">
                    <button type="submit" class="buttontambahpesanan">Tambah Pesanan</button>
                </a>
            </div>
            <br>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        @foreach ($pesananOngoing as $pesanan)
            <div class = "kotak">
                <div class = "text">
                    <h3>{{$pesanan->NO_MEJA}}</h3>
                    <h3>Rp. {{$pesanan->TOTAL_HARGA}}</h3>
                </div>
                <div class = "button2">
                    <a href="{{ url('edit/'.$pesanan->NO_MEJA)}}">
                        <button type="submit" class="buttonedit">Edit</button>
                    </a>
                    <a href="{{ url('bayar/'.$pesanan->NO_MEJA)}}">
                        <button type="submit" class="buttonbayar">Bayar</button>
                    </a>
                </div>
            </div>
        @endforeach
        <br>
    </div>
</section>
</body>
</html>
