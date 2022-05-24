<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Pilih Meja</title>
</head>
<body>
<section id = "pilihmeja">
    <div class = "title">
        <h1>Pilih Meja</h1>
        <div class = "garis">

        </div>
    </div>
    <div class = "content">

        @foreach ($pilihMeja as $hasilPilihMeja)

            <a href="{{ url('menu/'.$hasilPilihMeja->NO_MEJA)}}">
                <div class = "kotak">
                    <div class = "text">
                        <h3><?php echo "$hasilPilihMeja->NO_MEJA"; ?></h3>
                    </div>
                </div>
            </a>

        @endforeach

        {{-- <a href = "http://localhost:8000/owner">
            <div class = "kotak">
                <div class = "text">
                    <h3>Meja 1.1</h3>
                </div>
            </div>
        </a>
        <div class = "kotak">
            <div class = "text">
                <h3>Meja 1.2</h3>
            </div>
        </div>
        <div class = "kotak">
            <div class = "text">
                <h3>Meja 1.3</h3>
            </div>
        </div>
        <div class = "kotak">
            <div class = "text">
                <h3>Meja 1.4</h3>
            </div>
        </div> --}}
    </div>
</section>
</body>
</html>
