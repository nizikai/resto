<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Edit Menu</title>
</head>
<body>
<section id = "editmenu">
    <div class = "title">
        <h1>Edit Menu</h1>
    </div>

    <div class = "content">
        <h4>Pilih Kategori Menu</h4>
        <section id="menukategori">

    @foreach ($executeDisplayEditMenu as $displayEditMenu)
    <form action="{{ url('updatemenu/'.$displayEditMenu->ID_MENU)}}" method="POST">
     @csrf
            @if (substr($displayEditMenu->ID_MENU,0,1) == "F")
                <label>
                    <input type="radio" name="radio" value="Fbawaan" checked>
                    <img src="../resource/food.png">
                </label>

                <label>
                    <input type="radio" name="radio" value="drink">
                    <img src="../resource/drink.png">
                </label>

                <label>
                    <input type="radio" name="radio" value="snack">
                    <img src="../resource/snack.png">
                </label>


            @endif

            @if (substr($displayEditMenu->ID_MENU,0,1) == "D")
                <label>
                    <input type="radio" name="radio" value="food" >
                    <img src="../resource/food.png">
                </label>

                <label>
                    <input type="radio" name="radio" value="drink" checked>
                    <img src="../resource/drink.png">
                </label>

                <label>
                    <input type="radio" name="radio" value="snack">
                    <img src="../resource/snack.png">
                </label>


            @endif

            @if (substr($displayEditMenu->ID_MENU,0,1) == "S")
                <label>
                    <input type="radio" name="radio" value="food">
                    <img src="../resource/food.png">
                </label>

                <label>
                    <input type="radio" name="radio" value="drink">
                    <img src="../resource/drink.png">
                </label>

                <label>
                    <input type="radio" name="radio" value="snack" checked>
                    <img src="../resource/snack.png">
                </label>


            @endif

            <div class = "input">
                <div class = "nama">
                    <input type="text" id="tboxnamamenubaru" name="idmenu" value="{{$displayEditMenu->ID_MENU}}" disabled>
                </div>
            </div>

            </section>
            <div class = "input">
                <div class = "nama">
                    <h4>Nama Menu</h4>
                    <input type="text" id="tboxnamamenubaru" name="menubaru" value="{{$displayEditMenu->NAMA_MENU}}" required>
                </div>
                <div class = "harga">
                    <h4>Harga Menu</h4>
                    <input type="text" id="tboxhargamenubaru" name="hargabaru" value="{{$displayEditMenu->HARGA}}" required>
                </div>
                <div class = "button">
                    <a href="{{ url('updatemenu/'.$displayEditMenu->ID_MENU)}}">
                    <button type="submit" class="buttonsimpanmenu">Simpan Menu</button>
                    </a>
                    <button type="submit" class="buttonhapusmenu">Hapus Menu</button>
                </div>
            </div>
        </div>

    @endforeach
    </form>
</section>

</body>
</html>
