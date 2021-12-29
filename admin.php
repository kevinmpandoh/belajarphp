<?php
require "functions.php";

$films = query("SELECT * FROM film");






// ambil data (fetch) film dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array assosiative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object() // mengembalikan object

// foreach ($result as $r) {
//     var_dump($r);
// }

//Cara 1
// while ($film = mysqli_fetch_assoc($result)) {
//     var_dump($film);
// };


//cara 2
// foreach ($result as $r) {
//     var_dump($r);
// }








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
    <h1>Daftar Film</h1>
    <a href="tambah.php">Tambah Data Film</a>


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
                    <a href="">Change</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick=" return confirm('Yakin ?')">Delete</a>
                </td>
                <td><img src="<?= $row["image"]; ?>" alt=""></td>
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