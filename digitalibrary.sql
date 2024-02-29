-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 05:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(225) DEFAULT NULL,
  `penulis` varchar(225) DEFAULT NULL,
  `penerbit` varchar(225) DEFAULT NULL,
  `tahun_terbit` varchar(225) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`) VALUES
(17, 14, 'dilan 1990', 'pidi Baiq', 'pidi Baiq', '2014', 'bercerita tentang anak sekolah'),
(18, 15, 'naruto', 'masashi kishimoto', 'shueisha', '2012', 'anime kartun'),
(19, 16, 'sejarah sumatra', 'william marsden', 'pardo', '2015', 'sejarah sumatra'),
(22, 18, 'pocong', 'pardo', 'smk 3 pariman', '2024', 'yang meceritakan tentang hantu pocong\"'),
(23, 19, 'anak baik', 'pardo', 'joe', '2024', 'bercerita tentang anak baik');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(14, 'novel'),
(15, 'komik'),
(16, 'sejarah'),
(18, 'horor'),
(19, 'cerita');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `id_kategoribuku` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `id_koleksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`id_koleksi`, `id_user`, `id_buku`) VALUES
(33, 15, 17),
(34, 15, 23);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_peminjaman` varchar(225) DEFAULT NULL,
  `tanggal_pengembalian` varchar(225) DEFAULT NULL,
  `status_peminjaman` enum('dipinjam','dikembalikan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(17, 16, 17, '2024-02-27', '2024-02-27', 'dipinjam'),
(31, 15, 17, '2024-02-08', '2024-02-02', 'dipinjam'),
(33, 15, 18, '2024-02-10', '2024-02-03', 'dipinjam'),
(44, 15, 18, '2024-02-09', '2024-02-13', 'dipinjam'),
(45, 15, 23, '2024-02-17', '2024-02-16', 'dipinjam'),
(46, 15, 22, '2024-02-08', '2024-02-14', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_user`, `id_buku`, `ulasan`, `rating`) VALUES
(11, 15, 17, 'bagus', 7),
(12, 15, 18, 'sangat bagus', 7),
(14, 16, 22, 'serem bangett dan mengerikan', 6),
(15, 15, 23, 'buku sangat bagus', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(225) DEFAULT NULL,
  `level` enum('admin','petugas','peminjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `no_telepon`, `level`) VALUES
(13, 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 'Pasaman Barat', '08232423443', 'admin'),
(14, 'petugas', 'petugas', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas@gmail.com', 'Pariaman', '08232423443', 'admin'),
(15, 'peminjam', 'peminjam', '827ccb0eea8a706c4c34a16891f84e7b', 'peminjam@gmaail.com', 'Pasaman Barat', '08232467868', 'peminjam'),
(16, 'peminjam2', 'peminjam2', '827ccb0eea8a706c4c34a16891f84e7b', 'peminjam2@gmail.com', 'Pariaman', '082324234567', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `deskripsi` (`deskripsi`) USING HASH,
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`id_kategoribuku`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`),
  ADD UNIQUE KEY `id_kategori_2` (`id_kategori`),
  ADD UNIQUE KEY `id_buku` (`id_buku`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `id_kategoribuku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
