<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Atur Menu</title>
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
<section id = "aturmenu">
    <div class = "title">
        <h1>Atur Menu</h1>
    </div>
    <div class = "content">
        <div class = "button">
            <a href="{{ url('tambahmenu')}}">
                <button type="submit" class="buttontambahmenu">Tambah Menu</button>
            </a>

        </div>
        <div class = "garis">

        </div>

        @foreach ($aturMenu as $hasilAturMenu)
        <a href="{{ url('editmenu/'.$hasilAturMenu->ID_MENU)}}">
            <div class = "kotak">
                <div class = "text">
                    <h3>{{$hasilAturMenu->NAMA_MENU}}</h3>
                    <h3>Rp. {{$hasilAturMenu->HARGA}}</h3>
                </div>
            </div>
        </a>
        @endforeach

    </div>
</section>
</body>
</html>
