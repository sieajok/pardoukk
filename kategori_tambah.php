<?php
 include "do.php";
?>
<h1 class="mt-4 bg text-white">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <form method="post">
                <?php
                    if(isset($_POST['submit'])) {
                        $kategori = $_POST['kategori'];
                        
                        // Validasi apakah kategori sudah ada di database
                        $cek_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori = '$kategori'");
                        if(mysqli_num_rows($cek_kategori) > 0) {
                            echo '<script>alert("Maaf Kategori yang Anda Masukan Sudah Ada.");</script>';
                        } else {
                            $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES ('$kategori')");

                            if($query) {
                                echo '<script>alert("Tambah data berhasil.");</script>';
                            } else {
                                echo '<script>alert("Tambah data gagal.");</script>';
                            }
                        }
                    }
                ?>
                <div class="row mb-3">
                <div class="col-md-2 text-black">Nama Kategori</div>
                <div class="col-md-8"><input type="text" class="form-control" name="kategori"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>  
    </div>
    </div>
</div>