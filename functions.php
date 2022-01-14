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

    // upload gambar
    $image = upload();
    if (!$image) {
        return false;
    }


    //querry insert data
    $query = "INSERT INTO film 
                VALUES
                ('', '$title','$released','$genre','$director','$actors','$image')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES["image"]["name"];
    $ukuranFile = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];


    //cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "
            <script>
                alert('Masukan gambar terlebih dahulu');
            </script>
            ";
        return false;
    }
    $ekstensiGambarFalid = ["png", "jpg", "jpeg"];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // cek apakah yang diupload gambar
    if (!in_array($ekstensiGambar, $ekstensiGambarFalid)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar');
            </script>
            ";
    }
    // cek jika ukurannya terlalu besar


    if ($ukuranFile >= 1000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar');
                </script>
                ";
        return false;
    }
    // lolos pengecekan, gambar siap di u[pload
    // generate nama gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;



    move_uploaded_file($tmpName, "img/" . $namaFileBaru);
    return $namaFileBaru;
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user piih gambar baru atau tidak
    if ($_FILES["image"]["error"] === 4) {
        $image = $gambarLama;
    } else {

        $image = upload();
    }

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

function cari($keyword)
{
    $query = "SELECT * FROM film
                WHERE 
                title LIKE '%$keyword%' OR
                released LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' OR
                director LIKE '%$keyword%' OR
                actors LIKE '%$keyword%' 
                ";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username yang anda masukan sudah ada!');
            </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai!');
            </>
        ";
        return false;
    }
    // enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);

    // tambhakan userbaru ke database
    $query = "INSERT INTO user 
                VALUES(
                    '','$username','$password'
                )";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
