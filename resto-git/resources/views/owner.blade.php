@if (Session::has('owner'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>owner</title>
</head>
<body>
<section id = "owner">
    <div class = "title">
      <h1>Owner</h1>
    </div>
    <!-- <button class="accordion">Laporan Harian</button> -->
    <div class = "harian">
    <h5>Laporan Harian</h5>
    <form action="{{ url('hitunghari')}}" method="GET">
      <input type = "date" id = "kalender" name = "datepicker">
      <button class = "submitharian">OK</button>
    </form>
    </div>
    <!-- <button class="accordion">Laporan Bulanan</button> -->
    <div class = "bulanan">
      <h5>Laporan Bulanan</h5>
    <form action="{{ url('hitungbulan')}}" method="GET">
      <input type = "month" name = "monthpicker" >
      <button class = "submitbulanan">OK</button>
    </form>
    </div>
    <div class = "buttonowner">
      <button type="button" id = "editkaryawan"><h6>Edit Karyawan</h6></button>
      <button type="button" id = "editmeja"><h6>Edit Meja</h6></button>
      <button type="button" id = "editmenu"><h6>Edit Menu</h6></button>
    </div>
</section>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     this.classList.toggle("active");
//     var panel = this.nextElementSibling;
//     if (panel.style.display === "block") {
//       panel.style.display = "none";
//     } else {
//       panel.style.display = "block";
//     }
//   });
// }

function setFocused() {
  var results = document.querySelectorAll('.harian');
  for (result of results) {
    result.classList.add('focused');
  }
}

function unsetFocused() {
  var results = document.querySelectorAll('.harian');
  for (result of results) {
    result.classList.remove('focused');
  }
}

var results = document.querySelectorAll('input[type="date"]');
for (result of results) {
  result.addEventListener("focusin", setFocused);
  result.addEventListener("focusout", unsetFocused);
}
</script>
</body>
</html>
@else
<meta http-equiv="Refresh" content="0; url='/'" />
@endif
