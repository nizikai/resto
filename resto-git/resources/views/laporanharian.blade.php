<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
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
{{-- <h6>Pemasukan</h6> --}}
<section id = "lapharian1">
    <h4 id = "pemasukan">Pemasukan</h4>
    <input type="text" class="tboxpemasukan"><br>
    <h4 id = "totalpesanan">Total Pesanan</h4>
<input type="text" class="tboxtpesanan"><br>
</section>

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
  padding: 8px;
}

</style>
</head>
<body>

<hr class = "line">

<table>
  <tr>
    <th>Meja</th>
    <th>Total Pembayaran</th>
    {{-- <th>Country</th> --}}
  </tr>
  <tr>
    <td>1.11</td>
    <td>Rp. 44.000</td>
    {{-- <td>Germany</td> --}}
  </tr>
  <tr>
    <td>1.12</td>
    <td>Rp. 64.000</td>
    {{-- <td>Mexico</td> --}}
  </tr>
  <tr>
    <td>1.14</td>
    <td>Rp. 90.000</td>
    {{-- <td>Mexico</td> --}}
  </tr>
</table>
