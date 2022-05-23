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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit Karyawan</title>
</head>
<body>

<section id = "editkaryawan">
    <div class = "title">
        <h1>Edit Karyawan</h1>
    </div>

    <div class = "button">
            <button type="submit" class="buttoneditkaryawan">Edit Karyawan</button>
    </div>

    <div class="container mt-3" style="background-color:yellow ; height:200px;">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <div class="col-sm-3 p-3"><button type="button" class="btn btn-warning">Hapus Akun</button></div>
        </div>
        <div class="mb-3 row">

            <div class="col-sm-10 col-bg-dark">
            <input type="text text-success" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
            </div>
        </div>
    </div>
    </div>

</section>



<!--
<section id = "editkaryawan">
    <div class = "title">
        <h1>Edit Karyawan</h1>
    </div>
    <div class = "content">
        <div class = "button">
            <button type="submit" class="buttoneditkaryawan">Edit Karyawan</button>
        </div>
        <div class = "kotak">
        <div class = "text">
                        <h3>budi23@gmail.com</h3>
        <div class="tombol">
            <button type="submit" class="buttonhapusakun">Hapus Akun</button>
        </div>
                    <div class="pass"
                        <input type="password" class="form-control-editkaryawan" name = 'PasswordEditKaryawan' id="password"  aria-describedby="emailHelp" placeholder="" required>
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </div>
            </div>
        </div>
    </div>
</section> -->
</body>
</html>
