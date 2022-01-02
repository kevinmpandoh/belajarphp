<?php
require "functions.php";

//ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$film = query("SELECT * FROM film WHERE id = $id")[0];



// cek apakah tombol submit sudah di tekan
if (isset($_POST['submit'])) {



    // cek apakah data berhasil ditambahkan
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil diubah!');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!')
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
    <h1>Update Data Film</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $film["id"] ?>">
        <ul>
            <li>
                <label for="title">Judul Film :</label>
                <input type="text" name="title" id="title" value="<?= $film["title"] ?>">
            </li>
            <li>
                <label for="released">Rilis :</label>
                <input type="text" name="released" id="released" value="<?= $film["released"] ?>">
            </li>
            <li>
                <label for="genre">Genre :</label>
                <input type="text" name="genre" id="genre" value="<?= $film["genre"] ?>">
            </li>
            <li>
                <label for="director">Direktor :</label>
                <input type="text" name="director" id="director" value="<?= $film["director"] ?>">
            </li>
            <li>
                <label for="actors">Aktor :</label>
                <input type="text" name="actors" id="actors" value="<?= $film["actors"] ?>">
            </li>
            <li>
                <label for="image">Gambar :</label>
                <input type="text" name="image" id="image" value="<?= $film["image"] ?>">
            </li>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>


        </ul>


    </form>
</body>

</html>