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
    <title>Pembayaran Selesai</title>
</head>
<body>
<section id = "pembayaranselesai">
    <h1>Pembayaran<br>Selesai.</h1>

    <a href="/print/nota">
    <form action="/print/notabayar" method = "get">
        @csrf
        <button type="submit" id="printnota" class="buttonps">Print Nota</button>
    </form>
    </a>
</section>
<style>
    #pembayaranselesai{
    margin-left: 5vw;
}

#pembayaranselesai h1 {
    font-weight: bold;
    margin-left: 2vw;
    font-weight: 5vw;
    font-size: 9vw;
    margin-top: 60%;
    padding-bottom: 3vh;
    padding-left: 16vw;
    padding-top: 10vh;
}

#pembayaranselesai .buttonps{
    width: 60%;
    background-color: #FF7C04;
    border: 2px solid #FF7C04;
    font-weight: bold;
    border-color: #FF7C04;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    font-size: 14px;
    transition-duration: 0.4s;
    cursor: pointer;
    height: 4.5vh;
    margin-left: 17vw;
}
</style>
</body>
</html>
