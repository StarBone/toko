<?php
    
    session_start();

    //connection
    $con = mysqli_connect("localhost","root","","kasir");

    //login
    if(isset($_POST["login"])){
        //variable
        $username = $_POST["username"];
        $password = $_POST["password"];

        $check = mysqli_query($c, "SELECT * FROM user WHERE username = '$username' and password = '$password'");
        $hitung = mysqli_num_rows($check);

        if($hitung>0){
            //jika data ditemukan maka berhasil login

            $_SESSION['login'] = 'True';
            header('location:index.php');
        }
        else {
            //jika data tidak ditemukan

            echo "<script>
            alert('Username atau Password salah');
            window.location.href='login.php'
            </script>";
        }
    }

?>