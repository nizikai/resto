<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Edit Pesanan</title>
</head>
<body>
<section id = "editpesanan">
    <div class="title">
        <h1>Edit Pesanan</h1>
        <h2>Meja 1.12</h2>
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
        <tr>
            <td>Ayam Goreng</td>
            <td>2 pcs</td>
            <td>Rp 44.000</td>
            <td class = "gambar" onclick="openPopup()"><img src="..\resource\Trash.png"></td>
            <!-- <td class = "gambar"><a href="#"><img src="..\resource\Trash.png"></td></a> -->
            <div id = "popup">
                <h5>Lakukan konfirmasi pesanan belum diproses dengan staff dapur sebelum lakukan pembatalan pesanan!</h5>
                <div class = "buttonflex">
                    <button type="submit" class="buttonkembali" onclick="closePopup()">Kembali</button>
                    <button type="submit" class="buttonbatalkanpesanan">Batalkan Pesanan</button>
                </div>
            </div>
        </tr>
        <tr>
            <td>Ayam Bakar</td>
            <td>1 pcs</td>
            <td>Rp 23.000</td>
            <td class = "gambar"><img src="..\resource\Trash.png"></td>
        </tr>
    </table>
    <div class = "garisabu">

    </div>

    <div class = "bawahflex">
        <div class = "button">
            <button type="submit" class="buttonsimpan">Simpan</button>
        </div>
    </div>
</section>

<script>
    let popup = document.getElementById("popup")
    function openPopup(){
        popup.classList.add("open-popup");
    }
    function closePopup(){
        popup.classList.remove("open-popup");
    }
</script>

</body>
</html>
