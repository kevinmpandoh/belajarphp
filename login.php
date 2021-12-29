<?php
// mengecek jika tombol sudah ditekan
if (isset($_POST["submit"])) {
    // jika password benar, redirect ke halaman dashboard
    if ($_POST['username'] == "kevinmpandoh" && $_POST['password'] == "123") {
        header("Location: admin.php");
        exit;
        //jika salah tampilkan pesan kesalahan
    } else {
        $error = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>

<body>
    <h1>Login Admin</h1>
    <?php if (isset($error)) : ?>
        <p style="color:red; font-style:italic;">username / password yang anda masukkan salah!</p>
    <?php endif; ?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
        </form>



    </ul>



</body>

</html>