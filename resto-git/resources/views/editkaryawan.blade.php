@if (Session::has('owner'))
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Edit Karyawan</title>
</head>
<body>

<section id = "editkaryawan">
    <div class = "title">

    <br><h1>Edit Karyawan</h1>
    </div>

    <div class = "button">
        <a href="/tambahkaryawan">
            <button type="submit" class="buttoneditkaryawan">Tambah Karyawan</button>
        </a>
    </div>

<div class="kotak" style="margin-top:20px;">
    @foreach ($semuaKaryawan as $hasilSemuaKaryawan)

    <div class="container-md" style="background-color: #fff4e4; width: 90%; border-radius: 15px; height: 22vh;"><br>
      <div class="row" style="padding-bottom:15px; margin-top: 7px;background-color: transparent;display:flex;">
        <div class = "flexnama">
          <div class = "flexbutton">
            <div class="nama" style="font-weight: bold; margin-right:9vw; margin-bottom:2vh;margin-left: 2vw;">{{$hasilSemuaKaryawan->NAMA}}</div>
            <a href="{{ url('hapuskaryawan/'.$hasilSemuaKaryawan->ID_ADMIN)}}">
              <div class="col"><button type="button" class="btn btn-warning" style="height: 5vh; width: 35vw;margin-bottom:0%;margin-top:-5%; background-color:#ff7c04; color:white;font-weight: bold;border-radius: 10px;margin-left: 3vw;">Hapus Akun</button></div>
            </a>
          </div>
        </div>
          <div class="col" style="font-weight: bold; margin-right:9vw; margin-left: 2vw;">{{$hasilSemuaKaryawan->EMAIL}}</div>
        </div>
        <div class="passwordflex">
          <input type="password" class="tboxeditkaryawan" name ="Password" id = "password" placeholder="{{$hasilSemuaKaryawan->PASSWORD}}"><br><br><br><br><br><br>
        </div>
      </div>

      <div class='container' style="padding-bottom: 20px;background-color: transparent;">
          <!-- <div class='center'>
            <div class='image'>
                <div class="input-group">
                <input class="form-control border-end-0 border rounded-pill" type="search" value="search"
                  id="example-search-input" style="background-color: white;border-radius: 15px;">
                <span class="input-group-append">
                  <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5"
                    type="button">
                    <i class="fa fa-eye"></i>
                  </button>
                </span>
              </div> -->
            <!-- </div>
          </div> -->
      </div>
    </div>
    <br>
    @endforeach
</div>

<!-- <script>
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector(".tboxeditkaryawan");

  togglePassword.addEventListener("click", function () {
      // toggle the type attribute
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);

      // toggle the icon
      this.classList.toggle("bi-eye");
  });
</script> -->
</body>
</html>
@else
<meta http-equiv="Refresh" content="0; url='/'" />
@endif
