<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query)
{
    global $conn;
    //ambil data dari tabel film / query data film
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $released = htmlspecialchars($data["released"]);
    $genre = htmlspecialchars($data["genre"]);
    $director = htmlspecialchars($data["director"]);
    $actors = htmlspecialchars($data["actors"]);
    $image = htmlspecialchars($data["image"]);


    //querry insert data
    $query = "INSERT INTO film 
                VALUES
                ('', '$title','$released','$genre','$director','$actors','$image')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    $query = "DELETE FROM film WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $released = htmlspecialchars($data["released"]);
    $genre = htmlspecialchars($data["genre"]);
    $director = htmlspecialchars($data["director"]);
    $actors = htmlspecialchars($data["actors"]);
    $image = htmlspecialchars($data["image"]);


    //querry update data
    $query = "UPDATE film SET
                title = '$title',
                released = '$released',
                genre = '$genre',
                director = '$director',
                actors = '$actors',
                image = '$image'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
