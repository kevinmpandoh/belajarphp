<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require "functions.php";

$films = query("SELECT * FROM film");

// tombol cari di tekan
if (isset($_POST["cari"])) {
    $films = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Film</h1>
    <a href="tambah.php">Tambah Data Film</a>

    <form action="" method="post">

        <input type="text" name="keyword" id="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>


    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Image</th>
            <th>Title</th>
            <th>Released</th>
            <th>Genre</th>
            <th>Director</th>
            <th>Actors</th>
        </tr>
        <?php //while ($row = mysqli_fetch_assoc($result)) : 
        ?>
        <?php $i = 1; ?>
        <?php foreach ($films as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Change</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick=" return confirm('Yakin ?')">Delete</a>
                </td>
                <td><img src="img/<?= $row["image"] ?>" alt="" width="40"></td>
                <td><?= $row["title"]; ?></td>
                <td><?= $row["released"]; ?></td>
                <td><?= $row["genre"]; ?></td>
                <td><?= $row["director"]; ?></td>
                <td><?= $row["actors"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        <?php //endwhile; 
        ?>
    </table>
</body>

</html>