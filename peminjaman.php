<?php
 include "do.php";
?>
<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
                <br><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>   
                            <th>Aksi</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user = " . $_SESSION['user']['id_user']);
                        while ($data = mysqli_fetch_array($query)) {
                            $nama = $data['nama'];
                            $judul = $data['judul'];
                            $tglpeminjam = $data['tanggal_peminjaman'];
                            $tglkembali = $data['tanggal_pengembalian'];
                            $status = $data['status_peminjaman'];
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $nama; ?></td>
                                <td><?= $judul; ?></td>
                                <td><?= $tglpeminjam; ?></td>
                                <td><?= $tglkembali; ?></td>
                                <td><?= $status; ?></td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Actions" style="padding: 10px;">
                                    <?php if ($status != 'dikembalikan') : ?>
                                        <a href="?page=peminjaman_ubah&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-info" style="margin-right: 5px; border-radius: 20px; min-width: 100px;">Ubah</a>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-danger" style="margin-right: 5px; border-radius: 20px; min-width: 100px;">Hapus</a>
                                        <form method="post" action="simpan_koleksi.php" style="margin-right: 5px;">
                                            <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman']; ?>">
                                            <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">
                                            <button type="submit" name="simpan" class="btn btn-success" style="border-radius: 20px; min-width: 100px;" onclick="return confirm('Apakah anda yakin menyimpan data ini?'); this.innerHTML = 'Tersimpan';">Simpan</button>
                                        </form>
                                    <?php endif; ?>
                                </div>

                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
 </div>
