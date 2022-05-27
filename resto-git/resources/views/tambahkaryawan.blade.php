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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
            <input type="text" class="tboxKaryawan" name ="Nama" placeholder="Nama" required>
            <input type="text" class="tboxKaryawan" name ="Email" placeholder="Email" required><br>
            <div class="passwordflex">
                <input type="password" class="tboxKaryawan" name ="Password" id = "password" placeholder="Password" required><br><br><br><br><br><br>
                    <span>
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </span>
            </div>

            <button type="submit" id="ok" class="buttonlong">OK</button>
        <form>
    </section>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });
</script>
</body>
</html>
