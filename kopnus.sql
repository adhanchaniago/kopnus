-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2019 pada 05.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopnus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `id_angsuran` int(100) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `norek` varchar(10) NOT NULL,
  `angsuran_ke` int(2) NOT NULL,
  `angsuran` decimal(65,2) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_angsuran`
--

INSERT INTO `tb_angsuran` (`id_angsuran`, `id_pinjaman`, `norek`, `angsuran_ke`, `angsuran`, `tanggal`, `status`) VALUES
(1, 1, '0000000002', 1, '1720588.24', '2019-07-23', 1),
(2, 1, '0000000002', 2, '1720588.24', '2019-07-28', 0),
(3, 1, '0000000002', 3, '1720588.24', '2019-10-23', 0),
(4, 1, '0000000002', 4, '1720588.24', '2019-11-23', 0),
(5, 1, '0000000002', 5, '1720588.24', '2019-12-23', 0),
(6, 1, '0000000002', 6, '1720588.24', '2020-01-23', 0),
(7, 1, '0000000002', 7, '1720588.24', '2020-02-23', 0),
(8, 1, '0000000002', 8, '1720588.24', '2020-03-23', 0),
(9, 1, '0000000002', 9, '1720588.24', '2020-04-23', 0),
(10, 1, '0000000002', 10, '1720588.24', '2020-05-23', 0),
(11, 1, '0000000002', 11, '1720588.24', '2020-06-23', 0),
(12, 1, '0000000002', 12, '1720588.24', '2020-07-23', 0),
(13, 1, '0000000002', 13, '1720588.24', '2020-08-23', 0),
(14, 1, '0000000002', 14, '1720588.24', '2020-09-23', 0),
(15, 1, '0000000002', 15, '1720588.24', '2020-10-23', 0),
(16, 1, '0000000002', 16, '1720588.24', '2020-11-23', 0),
(17, 1, '0000000002', 17, '1720588.24', '2020-12-23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `norek` varchar(10) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `slip` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `foto_diri` varchar(50) NOT NULL,
  `karip` varchar(50) NOT NULL,
  `ktp_suami_istri` varchar(50) NOT NULL,
  `sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas`
--

INSERT INTO `tb_berkas` (`norek`, `kk`, `slip`, `npwp`, `foto_diri`, `karip`, `ktp_suami_istri`, `sk`) VALUES
('0000000002', 'WhatsApp_Image_2019-06-25_at_21_15_331.jpeg', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` int(10) NOT NULL,
  `norek` varchar(10) NOT NULL,
  `pinjaman` int(20) NOT NULL,
  `angsuran` decimal(65,2) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `berkas` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjaman`, `norek`, `pinjaman`, `angsuran`, `bayar`, `sisa`, `berkas`, `tanggal`, `status`) VALUES
(1, '0000000002', 25000000, '1720588.24', 1720588, 27529412, '', '2019-07-23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `norek` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(16) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`norek`, `nama`, `password`, `alamat`, `no_tlp`, `foto`) VALUES
('0000000001', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Jln.SelamatRadi', '08213454', 'input.png'),
('0000000002', 'Ivan Darmawan', 'e10adc3949ba59abbe56e057f20f883e', 'Jln.Sabutung', '08213469', 'default.png'),
('0000000003', 'Aprianto', 'e10adc3949ba59abbe56e057f20f883e', 'Jln.Bulusaraung no.123', '08334685', 'default.png'),
('0000000004', 'Calvin Thouw', 'e10adc3949ba59abbe56e057f20f883e', 'Jln.Bulusaraung no.123', '08134675174546', 'default.png'),
('0000000005', 'Dodo', 'e10adc3949ba59abbe56e057f20f883e', 'fjhdakjfksjhjah', '16546151645', 'default.png'),
('0000000006', 'Dodo1', 'e10adc3949ba59abbe56e057f20f883e', 'fjhdakjfksjhjah', '16546151645', 'default.png'),
('0000000007', 'Dodo1', 'e10adc3949ba59abbe56e057f20f883e', 'fjhdakjfksjhjah', '16546151645', 'default.png'),
('0000000008', 'Dodo1', 'e10adc3949ba59abbe56e057f20f883e', 'fjhdakjfksjhjah', '16546151645', 'default.png'),
('0000000009', 'jfkjdsbfjbdjbk', 'ef4753431fb8ee27cafd9d891923e8f2', 'dsbdajbfsjkbsfj', '454164165', 'default.png'),
('0000000010', 'jfkjdsbfjbdjbk', 'ef4753431fb8ee27cafd9d891923e8f2', 'dsbdajbfsjkbsfj', '454164165', 'default.png'),
('0000000011', 'jfkjdsbfjbdjbk', 'ef4753431fb8ee27cafd9d891923e8f2', 'dsbdajbfsjkbsfj', '454164165', 'default.png'),
('0000000012', 'daffsfsafsa', 'e10adc3949ba59abbe56e057f20f883e', 'dsafafafsaf', '123456789', 'default.png'),
('0000000013', 'sddsafdasfas', '25f9e794323b453885f5181f1b624d0b', 'dafadfasfsa', '123456789', 'default.png'),
('0000000014', 'gjgbbjbfsbj', 'e10adc3949ba59abbe56e057f20f883e', 'sdnfjabfkj', '12318919188', 'default.png'),
('0000000015', 'gjgbbjbfsbj', 'e10adc3949ba59abbe56e057f20f883e', 'sdnfjabfkj', '12318919188', 'default.png'),
('0000000016', 'gjgbbjbfsbj', 'e10adc3949ba59abbe56e057f20f883e', 'sdnfjabfkj', '12318919188', 'default.png'),
('0000000017', 'gjgbbjbfsbj', 'e10adc3949ba59abbe56e057f20f883e', 'sdnfjabfkj', '12318919188', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indeks untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`norek`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `id_angsuran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
