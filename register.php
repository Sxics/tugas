<?php
include "koneksi.php";
if(isset($_POST['Username'])){

    $username = $_POST['Username']; 
    $password = md5($_POST['Password']);
    $nama = $_POST['nama'];
    $Status_login = 'admin';


    $insert = mysqli_query($koneksi, "INSERT INTO  user (Username,Password,Status_login,nama) VALUES ('$username','$password','$Status_login','$nama')");

    if($insert){
        $cek = mysqli_query($koneksi, "SELECT*FROM user WHERE username='$username'");
        $data = mysqli_fetch_array($cek);
        $_SESSION['user'] =$data;
        echo '<script>alert("Registrasi Berhasil");location.href="index.php" </script>';
    }else{
        '<script>alert("Registrasi gagal ");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrasi</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registrasi</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name= "nama"placeholder="Masukan Nama" />
                                                <label for="inputEmail">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name= "Username"placeholder="Masukan Username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password"name="Password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name= "Status_login"placeholder="Masukan Username" />
                                                <label for="inputEmail">Status</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button type="submit" name="login" class="btn btn-primary w-100" >Registrasi</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Sudah punya akun?Login !</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
