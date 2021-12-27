<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data dari tabel film / query data film
$result = mysqli_query($conn, "SELECT * FROM film");

if (!$result) {
    echo mysqli_error($conn);
}

// ambil data (fetch) film dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array assosiative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object() // mengembalikan object

// foreach ($result as $r) {
//     var_dump($r);
// }


// while ($film = mysqli_fetch_assoc($result)) {
//     var_dump($film);
// };








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
    <h1>Daftar Mahasiswa</h1>
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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row["id"]; ?></td>
                <td>
                    <a href="">Change</a> |
                    <a href="">Delete</a>
                </td>
                <td><img src="<?= $row["image"]; ?>" alt=""></td>
                <td><?= $row["title"]; ?></td>
                <td><?= $row["released"]; ?></td>
                <td><?= $row["genre"]; ?></td>
                <td><?= $row["director"]; ?></td>
                <td><?= $row["actors"]; ?></td>
            </tr>

        <?php endwhile; ?>
    </table>
</body>

</html>