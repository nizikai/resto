<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>
    <?php
    $hari = $_GET['datepicker'];
    // echo $result;
    ?>
    <meta http-equiv="Refresh" content='0; url="{{ url('laporanharian/'.$hari)}}"'/>

</body>
</html>
