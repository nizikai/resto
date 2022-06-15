@if (Session::has('owner'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Edit Meja</title>
</head>
<body>

    @if (Session::has('success'))
        <div class="alertalert-successalert-block">
            <span class="button" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    @if (Session::has('loginError'))
        <div class="alertalert-dangeralert-dismissiblefadeshow">
            <span class="button" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif

    <br>
    <h1 id = "editmejatitle">Edit Meja</h1>
    <center>
        <section id = "inputMeja">
            <form action="/editmeja" method="post">
                @csrf
                <input type="text" id="tboxNewTable" name="NewTable" placeholder="Masukkan meja baru" required>
                <button type="submit" class="buttonsmall">OK</button>
            </form>
        </section>
    </center>
    <hr class = "line">

    {{-- disini nanti buat auto generate semua meja yang ada --}}
    <section id="allTable">

        {{-- @foreach ($editMeja as $hasilEditMeja)

            //echo "<div class = 'tableCard'>";
                //echo "<h6> $hasilEditMeja->NO_MEJA";
                // echo "<a href='/hapusmeja/$hasilEditMeja->NO_MEJA'>";
                // echo "<a href='{{ route('routeHapusMeja', ['noMeja' => $hasilEditMeja->NO_MEJA]) }}'>";
                //echo "<a href='{{ url(\'hapusmeja/\''.$hasilEditMeja->NO_MEJA') }}'>";

                    //   <a href="{{ url('user/'.$user->id . '/'.$user->name) }}">  Get user detail </a>

                //echo '<img src="..\resource\Trash.png" alt=""> </a>';
                //echo "</h6>";
                //echo "</div>";

        @endforeach --}}

        @foreach ($editMeja as $hasilEditMeja)

            <div class = 'tableCard'>
                <h6> <?php echo "$hasilEditMeja->NO_MEJA"; ?>
                    <a href="{{ url('hapusmeja/'.$hasilEditMeja->NO_MEJA)}}">
                        <img src="..\resource\Trash.png" alt="">
                    </a>
                </h6>
            </div>

        @endforeach

    </section>
</body>
</html>

@else
<meta http-equiv="Refresh" content="0; url='/'" />
@endif
