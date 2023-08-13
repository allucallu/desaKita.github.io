-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 08:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desakita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aparat`
--

CREATE TABLE `tb_aparat` (
  `id_aparat` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_aparat`
--

INSERT INTO `tb_aparat` (`id_aparat`, `nama`, `jabatan`, `kontak`, `foto`) VALUES
(4, 'Hamsah', 'Kepala desa', '1234567', 'EOiwZsnoCq2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `profil`) VALUES
(1, '<p>Dengan perintah di atas, kita memerintahkan untuk mengambil semua data dari table artikel, kategori dan pengguna. Dengan menghubungkan relasi dari artikel_id dan kategori_id. Karena di sini pada kolum artikel_id menyimpan id_kategori, begitu juga dengan artikel_author yang menyimpan id pengguna yang menulis artikel tersebut. Kita membuat relasi artikel_author pengguna ke id pengguna atay kolum pengguna_id. Kemudian kita juga menambahkan perintah order by artikel_id desc untuk menampilkan dari id artikel yang terbesar. Jadi artikel-artikel terbaru akan tampil pada bagian di bawah.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','penulis') NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `username`, `password`, `level`, `status`) VALUES
(1, 'Syahrul', 'syahrul@gmail.com', 'Callu', '12345', 'admin', 1),
(2, 'Hamsa', 'hamsa@gmail.com', 'Hamsa', '12345', 'penulis', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aparat`
--
ALTER TABLE `tb_aparat`
  ADD PRIMARY KEY (`id_aparat`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aparat`
--
ALTER TABLE `tb_aparat`
  MODIFY `id_aparat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
