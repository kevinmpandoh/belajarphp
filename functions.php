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
