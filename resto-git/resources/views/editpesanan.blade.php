{{-- <meta http-equiv="Refresh" content='0;' /> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Edit Pesanan</title>
</head>
<body>
<section id = "editpesanan">
    <div class="title">
        <h1>Edit Pesanan</h1>
        @foreach ($displayEditTotalBayar as $hasilDisplayEditId)
            <h2>Meja {{$hasilDisplayEditId->NO_MEJA}}</h2>
        @endforeach
        <div class = "garis">

        </div>
    </div>
    <table>
        <tr>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Hapus</th>
        </tr>
        @foreach ($displayEdit as $hasilDisplayEdit)
            <tr>
                <td>{{$hasilDisplayEdit->NAMA_MENU}}</td>
                <td>{{$hasilDisplayEdit->TOTAL_JUMLAH}}</td>
                <td>{{$hasilDisplayEdit->TOTAL_HARGA_MENU}}</td>
                <td class = "gambar">
                    <a href="{{url('hapuspesanan/'.$displayEditTotalBayar[0]->NO_MEJA,''.$hasilDisplayEdit->ID_MENU)}}">
                        <img src="..\resource\Trash.png">
                    </a>
                </td>
                {{-- <td class = "gambar" onclick="tooglePopup()"><img src="..\resource\Trash.png"></td> --}}
                {{-- <div class = "popup" id = "popup-editpesanan">
                    <div class="overlay">
                        <div class = "content">
                            <h5>Lakukan konfirmasi dengan staff dapur bahwa pesanan belum dimasak sebelum melakukan pembatalan pesanan!</h5>
                            <button class="buttonkembali" onclick="tooglePopup()"> Kembali </button>
                            <form action="{{url('hapuspesanan/'.$displayEditTotalBayar[0]->NO_MEJA,''.$hasilDisplayEdit->ID_MENU)}}" method = "POST">
                                @csrf
                                    <button type ="submit" class="buttonbatalkanpesanan">Batalkan pesanan </button>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </tr>
        @endforeach
    </table>
    <div class = "garisabu">

    </div>

    <div class = "bawahflex">
        <div class = "button">
            <a href="#">
                <button type="submit" class="buttonsimpan">Simpan</button>
            </a>
        </div>
    </div>
</section>

<script>
    function tooglePopup(){
        document.getElementById("popup-editpesanan").classList.toggle("active");
    }
</script>

</body>
</html>
