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

            </section>
            <div class = "input">
                <div class = "nama">
                    <h4>Nama Menu</h4>
                    <input type="text" id="tboxnamamenubaru" name="menubaru" value="{{$displayEditMenu->NAMA_MENU}}">
                </div>
                <div class = "harga">
                    <h4>Harga Menu</h4>
                    <input type="text" id="tboxhargamenubaru" name="hargabaru" value="{{$displayEditMenu->HARGA}}">
                </div>
                <div class = "button">
                    <button type="submit" class="buttonsimpanmenu">Simpan Menu</button>
                    <button type="submit" class="buttonhapusmenu">Hapus Menu</button>
                </div>
            </div>
        </div>

    @endforeach

</section>

</body>
</html>
