<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Tambah Menu</title>
</head>
<body>


<section id = "tambahmenu">
    <div class = "title">
        <h1>Tambah Menu</h1>
    </div>
    <form action="{{ url('insertmenu')}}" method="POST">
        @csrf

    <div class = "content">
        <h4>Pilih Kategori Menu</h4>
        <section id="menukategori">
        @foreach ($idbaru as $hasilidbaru)

                <label>
                    <input type="radio" name="radiomenubaru" value="{{$hasilidbaru->ffood}}" checked>
                    <img src="./resource/food.png">
                </label>
                <label>
                    <input type="radio" name="radiomenubaru" value="{{$hasilidbaru->fdrink}}">
                    <img src="./resource/drink.png">
                </label>
                <label>
                    <input type="radio" name="radiomenubaru" value="{{$hasilidbaru->fsnack}}">
                    <img src="./resource/snack.png">
                </label>


        @endforeach
        </section>
        <div class = "input">
            <div class = "nama">
                <h4>Masukkan nama menu baru</h4>
                <input type="text" id="tboxnamamenubaru" name="menubaru" placeholder="Nama Menu" required
            </div>
            <div class = "harga">
                <h4>Masukkan harga menu baru</h4>
                <input type="number" id="tboxhargamenubaru" name="hargabaru" placeholder="Harga Menu" required>
            </div>
            <div class = "button">
                <a href="{{ url('insertmenu')}}">
                <button type="submit" class="buttontambahmenu">Tambah Menu</button>
                </a>
            </div>

        </div>
    </div>
    </form>
</section>
</body>
</html>
