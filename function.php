<?php
    
    session_start();

    //connection
    $con = mysqli_connect("localhost","root","","kasir");

    //login
    if(isset($_POST["login"])){
        //variable
        $username = $_POST["username"];
        $password = $_POST["password"];

        $check = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' and password = '$password'");
        $hitung = mysqli_num_rows($check);

        if($hitung > 0){
            //jika data ditemukan maka berhasil login

            $_SESSION['login'] = 'True';
            header('location:index.php');
            exit;
        }
        else {
            //jika data tidak ditemukan

            echo '
            <script>alert("Username atau Password Salah");
            window.location.href="login.php"
            </script>';
            exit;
        }
    }
    
    if (isset($_POST['tambahbarang'])) {
        $namaproduk = $_POST['nama_produk'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $insert = mysqli_query($con, "insert into produk (nama_produk, deskripsi,  harga, stok) values ('$namaproduk', $deskripsi', $harga',
        '$stok') ");

        if ($insert) {
            header('location:stok.php');
        }
        else {
            echo '
            <script>alert("Gagal menambah barang baru");
            window.location.href="stok.php"
            </script>';
            exit;
        }
    }

?>