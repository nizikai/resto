@if (Session::has('owner'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Laporan Harian</title>
</head>
<body>
<br>
<h1 id = "laphariantitle">Laporan Harian</h1><br>

<section id = "lapharian1">
    {{-- <input type="text" class="tboxpemasukan"><br> --}}
    <section id="allTable">
    <h4 id = "pemasukan">Pemasukan</h4>
        <div class = "pemasukanCard">
            <h6>
                @foreach ($pemasukanHarian as $hasilPemasukanHarian)
                    Rp. {{$hasilPemasukanHarian->pemasukanHari}}
                @endforeach
            </h6>
        </div>

    <h4 id = "totalpesanan">Total Pesanan</h4>
        <div class = "pesananCard">
            <h6>
                @foreach ($pemasukanHarian as $hasilPemasukanHarian)
                    {{$hasilPemasukanHarian->countMejaHarian}}
                @endforeach

            </h6>
        </div>
    </section>
{{-- <input type="text" class="tboxtpesanan"><br> --}}
</section>
<br>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

}

td, th {
  border: 0px solid #dddddd;
  text-align: left;
  padding: 15px;
  /* right-padding: 30px; */
}
</style>
</head>
<body>

<hr class = "line">

<section id = "laphariantable">
  <table id = "tabelmeja">
  <tr>
    <th id = "judullh">Meja</th>
    <th id = "judullh">Total Pembayaran</th>
    {{-- <th>Country</th> --}}
  </tr>
  @foreach ($lapHarian as $hasilLapHarian)

  <tr>

    <td id="hasillh">{{$hasilLapHarian->NO_MEJA}}</td>
    <td id="hasillh">Rp. {{$hasilLapHarian->TOTAL_HARGA}}</td>
    {{-- <td>Germany</td> --}}
  </tr>
  @endforeach

  </table>
</section>

</body>

@else
<meta http-equiv="Refresh" content="0; url='/'" />
@endif

