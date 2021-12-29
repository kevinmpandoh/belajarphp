<?php
require "functions.php";

// cek apakah tombol submit sudah di tekan
if (isset($_POST['submit'])) {



    // cek apakah data berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil di tambahkan!');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan!')
            document.location.href = 'admin.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Film</title>
</head>

<body>
    <h1>Tambah Data Film</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="title">Judul Film :</label>
                <input type="text" name="title" id="title">
            </li>
            <li>
                <label for="released">Rilis :</label>
                <input type="text" name="released" id="released">
            </li>
            <li>
                <label for="genre">Genre :</label>
                <input type="text" name="genre" id="genre">
            </li>
            <li>
                <label for="director">Direktor :</label>
                <input type="text" name="director" id="director">
            </li>
            <li>
                <label for="actors">Aktor :</label>
                <input type="text" name="actors" id="actors">
            </li>
            <li>
                <label for="image">Gambar :</label>
                <input type="text" name="image" id="image">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>


        </ul>


    </form>
</body>

</html>