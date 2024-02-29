<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Ke Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
         body {
    background-image: url('assets/img/yik.jpg');
    background-size: 100%;
    background-position: left;
    background-size: cover;
    background-color: #f8f9fa;
    color: rgba(255, 255, 255, 0.9); /* Warna teks dengan opasitas 90% */
    padding-right: 40px;
    background-position: center;
    padding-top: 0px;
   background-attachment: fixed;
}

.card {
    background-color: rgba(155, 155, 155, 0.2); /* Latar belakang semi-transparan untuk konten */
    color: rgba(155, 155, 155, 0.9); /* Warna teks untuk konten */
    border: none;
    border-radius: 15px;
    box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

.card-header {
    background-color: rgba(255, 255, 255, 0.9); /* Latar belakang semi-transparan untuk header kartu */
    border-bottom: none;
    text-align: center;
    padding-top: 40px;
    padding-bottom: 40px;
    border-radius: 20px 20px 5px 5px;
}

.card-body {
    padding: 40px;
}

.form-group {
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
    transition: background-color 1.5s, border-color 1.5s;
}

.btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2653d4;
}

.btn-danger {
    background-color: #e74a3b;
    border-color: #e74a3b;
    transition: background-color 0.2s, border-color 0.2s;
}

.btn-danger:hover {
    background-color: #d63026;
    border-color: #c92a22;
}

.small {
    color: rgba(255, 255, 255, 0.7); /* Warna teks dengan opasitas 70% */
}
</style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_POST['register'])) {
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $alamat = $_POST['alamat'];
                                                $no_telepon = $_POST['no_telepon'];
                                                $username = $_POST['username'];
                                                $level = $_POST['level'];
                                                $password = md5($_POST['password']);
                                        
                                                $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,password,level) VALUES('$nama','$email','$alamat','$no_telepon','$username','$password','$level')");

                                                if($insert){
                                                    echo '<script>alert("Selamat, register berhasil. Silahkan Login"); location.href="login.php"</script>';
                                                }else{
                                                    echo '<script>alert("Register gagal, Silahkan ulangi kembali.");</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control py-4" type="text" required name="nama" placeholder="Masukkan Nama Lengkap " />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control py-4" type="text" required name="email" placeholder="Masukkan Email " />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">No. Telepon</label>
                                                <input class="form-control py-4" type="text" required name="no_telepon" placeholder="Masukkan No. Telepon " />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Alamat</label>
                                                <textarea name="alamat" cols="5" required class="form-control"></textarea >
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Username</label>
                                                <input class="form-control py-4"  type="username" required name="username" placeholder="Masukkan Username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" required name="password" type="password" placeholder="Masukkan Password" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Level</label>
                                                <select name="level" required class="form-control">
                                                    <option value="peminjam">Peminjam</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-danger" href="login.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            &copy; 2024 Perpustakaan Digital.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
