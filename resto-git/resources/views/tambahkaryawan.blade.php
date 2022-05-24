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
    <title>Tambah Karyawan</title>
</head>
<body>
    <br>
    <br>
    <h1 id = "editkaryawantitle">Tambah Karyawan</h1>
    <section id = "tambahkaryawan">
        <form action="/tambahkaryawan" method="POST">
            @csrf

            <h4 id = "masukkan">Masukan email dan password karyawan</h4>
            <input type="text" class="tboxKaryawan" name ="Nama" placeholder="Nama">
            <input type="text" class="tboxKaryawan" name ="Email" placeholder="Email"><br>
            <input type="text" class="tboxKaryawan" name ="Password" placeholder="Password"><br><br><br><br><br><br>
            <button type="submit" id="ok" class="buttonlong">OK</button>
        <form>
    </section>
</body>
</html>
