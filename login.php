<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Ke Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    body {
    background-image: url('assets/img/yik.jpg');
    background-size: 50%;
    background-position: left;
    background-size: cover;
    background-color: #f8f9fa;
    color: rgba(255, 255, 255, 0.9); /* Warna teks dengan opasitas 90% */
    padding-right: 40px;
    background-position: center;
    padding-top: 0px;
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
<body>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login Perpustakaan Digital</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                if(isset($_POST['login'])) {
                                    $username = $_POST['username'];
                                    $password = md5($_POST['password']);

                                    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                                    $cek = mysqli_num_rows($data);
                                    if($cek > 0 ){
                                        $_SESSION['user'] = mysqli_fetch_array($data);
                                        echo '<script>alert("Selamat datang, Login Berhasil"); location.href="index.php";</script>';
                                    }else{
                                        echo '<script>alert("Maaf, Username/Password salah")</script>';
                                    }
                                }
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Username</label>
                                        <input class="form-control py-4" id="inputEmailAddress" type="text" name="username" placeholder="Enter username " />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter Password" />
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                                        <a class="btn btn-danger" href="register.php">Register</a>
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
</body>
</html>