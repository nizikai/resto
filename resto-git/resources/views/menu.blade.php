<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Menu</title>
</head>
<body>

    <br>
    <section id = "topdimenu">
        @if (Session::has('success'))
        <div class="alertalert-successalert-block">
            <span class="button" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
        <br>
        <h1 id = "menutitle">Menu</h1>
        <section id = "sectionmenumeja">
            @foreach ($displayMejaMenu as $hasilDisplayMejaMenu)
                <h6 id = "labelmenumeja">Meja {{$hasilDisplayMejaMenu->NO_MEJA}}</h6>
            @endforeach
            <button type="submit" id="buttonpilihmeja" onclick="tooglePopupmenu()">Ganti Meja</button>
            <div class = "popup" id = "popup-menu">
                <div class="overlay">
                    <div class = "content">
                        <h6>Semua menu yang dipilih akan dihapus. Lakukan order ulang setelah memilih meja yang baru </h6>
                        <div class = "kontenflex">
                            <button type ="submit" class="buttonkembali" onclick="tooglePopupmenu()"> kembali </button>
                            <form action="{{ url('hapustransaksi/'.$hasilDisplayMejaMenu->ID_MEJA)}}" method="post">
                                @csrf
                                <button type ="submit" class="buttongantimeja">Ganti meja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class = "line">



        {{-- <section id="menukategori">
            <label>
                <input type="radio" name="radio" value="food" checked>
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
        </section> --}}

        <center>
            <section id = "inputMeja">
                {{-- <form action="{{ url('menu/'.$displayMejaMenu[0]->ID_MEJA.'/')}}" method="get"> --}}
                <form action="{{ url('menu/'.$displayMejaMenu[0]->ID_MEJA)}}" method="get">

                    <input type="text" id="tboxMenuSearch" name="menuSearch" placeholder="Cari menu" value="{{request('menuSearch')}}">
                    <button type="submit" class="buttonsmall"><img src="../resource/Search.png"></button>
                </form>

            </section>
        </center>

    </section>

    <br>
    <section id="allMenu">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class = "menuCard">
            @foreach ($displaySearchMenu as $hasilDisplaySearchMenu)
            <form action="{{ url('insertpesanan/'.$displayMejaMenu[0]->ID_MEJA)}}" method="post">
            @csrf

                    <h6>
                        <section id = "menuCardPosition">

                            <section id = "menuCardDetail">
                                {{$hasilDisplaySearchMenu->NAMA_MENU}}
                                <p>Rp. {{$hasilDisplaySearchMenu->HARGA}}</p>
                            </section>
                            <section id = "inputJumlah">
                                <input type="number" id="tboxJumlahMenu" name="menuJumlah" placeholder="Jumlah" required>
                                    <button type="submit" class="buttonok">OK</button>
                            </section>

                        </section>
                    </h6>
                <input type="text" id="tboxNote" name="menuCatatan" placeholder="Catatan" value = "">
                <input type="text" id="tboxMenuHidden" name="menuIdMenu" placeholder="menuIdMenu" value = {{$hasilDisplaySearchMenu->ID_MENU}} required>
                <input type="text" id="tboxMenuHidden" name="menuIdMeja" placeholder="Id Meja" value = {{$displayMejaMenu[0]->ID_MEJA}} required>
            </form>
            @endforeach
        </div>
    </section>

    <section id="buttonlongbottom">
        @foreach ($displayMejaMenu as $hasilDisplayMejaMenu)
            {{-- <form action="{{ url('konfirmasipesanan/'.$hasilDisplayMejaMenu->NO_MEJA)}}" method="post">
            @csrf --}}
            <a href="{{ url('konfirmasipesanan/'.$hasilDisplayMejaMenu->ID_MEJA)}}">
                <button type="submit" class="buttonlong">Lanjut</button>

            </a>
            {{-- </form> --}}
        @endforeach
    </section>
    <br>
    <br>
    <br>
    <br>


<script>
    function tooglePopupmenu(){
        document.getElementById("popup-menu").classList.toggle("active");
    }
</script>
</body>
</html>
