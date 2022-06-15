@if (Session::has('owner') || Session::has('staff'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Pilih Meja</title>

    <!-- <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script> -->

    <!-- <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);

        window.onunload = function () { null };
    </script> -->

    <script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
    </script>

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

            <a href="{{ url('getmeja/'.$hasilPilihMeja->ID_MEJA)}}">
                <div class = "kotak">
                    <div class = "text">
                        <h3><?php echo "$hasilPilihMeja->NO_MEJA"; ?></h3>
                    </div>
                </div>
            </a>

        @endforeach


    </div>
</section>


</body>
</html>

@else
<meta http-equiv="Refresh" content="0; url='/'" />
@endif
