<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Nota</title>
</head>
<body>
<section id = "nota">
    <div class="title">
        <div class = "flex">
            <img src="..\resource\RestoBlack.png" alt="">
            <div class = "flex2">
                <h1>Panorama Resto & Cafe</h1>
                <h5>Jl. Gundaling Berastagi - 081397265797 <img src="..\resource\instagram.png" style="width:10%; height:10%;">panoramarestoguesthouse</h5>
            </div>

    @foreach ($dataprintExt as $hasildataprintExt)
        <h2>{{$hasildataprintExt->NO_MEJA}}</h2>
        <h2>{{$hasildataprintExt->TANGGAL}}</h2>
    @endforeach

        </div>
            <div class = "garis">
        </div>
    </div>

    <table>
        <tr>
            <th>Menu</th>
            <th style="text-align:center">Jumlah</th>
            <th>Harga</th>
        </tr>
        @foreach ($dataprint as $hasildataprint)
        <tr>
            <td>{{$hasildataprint->NAMA_MENU}}</td>
            <td style="text-align:center">{{$hasildataprint->TOTAL_JUMLAH}}</td>
            <td>{{$hasildataprint->TOTAL_HARGA_MENU}}</td>
            <!-- <th><img src="..\resource\Trash.png" alt=""></th> -->
        </tr>
        <tr>
            <td style="font-style:italic;">
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{$hasildataprint->NOTE_PESANAN}}
            </td>
        </tr>
        @endforeach
    </table>

    <div class = "garisabu">

    </div>

    @foreach ($dataprintExt as $hasildataprintExt)
    <div class = "flex1">
        <h4>Total Pembayaran</h4>
        <h4>$hasildataprintExt->TOTAL_HARGA</h4>
    </div>
    @endforeach

    <div class = "thxu">
        <center>
            <br>
            <br>
        <h4>Terima kasih atas kunjungan anda</h4>
        <h4>Selamat datang kembali</h4>
        </center>
    </div>

</section>
</body>

<script type="text/javascript">
    window.print();
</script>

<meta http-equiv="Refresh" content='100000000; url="/pesanan"'/>

</html>


