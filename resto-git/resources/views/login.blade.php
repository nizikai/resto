<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Login</title>
</head>
<body>
@if (Session::has('success'))
            <div class="alertalert-successalert-block">
                <span class="button" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>{{ Session::get('success') }}</strong>
            </div>
@endif


@if(session()->has('loginError'))

<div class="alertalert-dangeralert-dismissiblefadeshow" role="alert">
    {{ session('loginError') }}
    <span class="button" onclick="this.parentElement.style.display='none';">&times;</span>
    </button>
</div>

@endif


<section id = 'login'>
    <center>
        <img src="..\resource\logo.png" alt="">
    </center>

    <form action="{{url('/login')}}" method="POST">
        @csrf
        <div class = "box-login">
                <div class="mb-3 row">
                    <label for="email"  class="col-sm-2 col-form-label" >Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name = 'loginEmail' id="email" aria-describedby="emailHelp" placeholder="" required value="{{ old('email') }}">
                   {{-- @error('email')
                       <div class="invalid-feedback">
                       {{$message}}
                       </div>
                   @enderror --}}
                    </div>
                </div>
                <div class="mb-3 row">
                   <label for="password" class="col-sm-2 col-form-label">Password</label>
                   <div class="col-sm-10">
                        <input type="password" class="form-control" name = 'loginPassword' id="password"  aria-describedby="emailHelp" placeholder="" required>
                        <span>
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                        </span>
                    </div>
                </div>
        </div>
   <form>

    <center>
        <a href="#">
            <button type="submit" class="buttonlong">Masuk</button>
        </a>
    </center>

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
