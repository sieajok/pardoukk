<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('assets/img/w.jpg'); /* Ganti dengan path gambar Anda */
            background-size: cover; /* Untuk menyesuaikan ukuran gambar dengan layar */
            background-repeat: no-repeat;
            color: #fff; /* Warna teks */
            padding-right: 40px;
            background-position: center;
            padding-top: 0px; /* Ruang di bagian atas untuk memperhitungkan navbar */
        }    
        .card {
            background-color: whitesmoke; /* Warna latar belakang semi-transparan untuk konten */
            color: white; /* Warna teks untuk konten */
        }
        /* Tambahkan warna pada tabel */
       
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Dashboard</a>
    </nav>

    <!-- Konten -->
    <div class="container">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Cards -->
        <div class="row">
            <!-- Isi dengan card-card Anda -->
        </div>

        <!-- Informasi user -->
        <div class="card">
            <div class="card-body ">
                <table class="table table-bordered">
                    <tr>
                        <td width="200">Nama</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="100">Level User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['level']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Tanggal Login</td>
                        <td width="1">:</td>
                        <td><?php echo date('d-m-Y'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
