-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2019 pada 10.51
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
(1, 1, '0000000002', 1, '2300000.00', '2019-08-22', 1),
(2, 1, '0000000002', 2, '2300000.00', '2019-07-20', 1),
(3, 1, '0000000002', 3, '2300000.00', '2019-07-21', 0),
(4, 1, '0000000002', 4, '2300000.00', '2019-11-23', 0),
(5, 1, '0000000002', 5, '2300000.00', '2019-12-24', 0),
(6, 1, '0000000002', 6, '2300000.00', '2020-01-24', 0),
(7, 1, '0000000002', 7, '2300000.00', '2020-02-24', 0),
(8, 1, '0000000002', 8, '2300000.00', '2020-03-26', 0),
(9, 1, '0000000002', 9, '2300000.00', '2020-04-26', 0),
(10, 1, '0000000002', 10, '2300000.00', '2020-05-27', 0),
(11, 1, '0000000002', 11, '2300000.00', '2020-06-27', 0),
(12, 1, '0000000002', 12, '2300000.00', '2020-07-28', 0),
(13, 1, '0000000002', 13, '2300000.00', '2020-08-28', 0),
(14, 1, '0000000002', 14, '2300000.00', '2020-09-28', 0),
(15, 1, '0000000002', 15, '2300000.00', '2020-10-29', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas_foto_diri`
--

CREATE TABLE `tb_berkas_foto_diri` (
  `norek` varchar(10) NOT NULL,
  `foto_diri` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas_foto_diri`
--

INSERT INTO `tb_berkas_foto_diri` (`norek`, `foto_diri`, `status`) VALUES
('0000000002', '', 0),
('0000000003', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas_karip`
--

CREATE TABLE `tb_berkas_karip` (
  `norek` varchar(10) NOT NULL,
  `karip` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas_karip`
--

INSERT INTO `tb_berkas_karip` (`norek`, `karip`, `status`) VALUES
('0000000002', '', 0),
('0000000003', 'P80728-094902.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas_kk`
--

CREATE TABLE `tb_berkas_kk` (
  `norek` varchar(10) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas_kk`
--

INSERT INTO `tb_berkas_kk` (`norek`, `kk`, `status`) VALUES
('0000000002', 'default.png', 0),
('0000000003', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas_ktp_suami_istri`
--

CREATE TABLE `tb_berkas_ktp_suami_istri` (
  `norek` varchar(10) NOT NULL,
  `ktp_suami_istri` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas_ktp_suami_istri`
--

INSERT INTO `tb_berkas_ktp_suami_istri` (`norek`, `ktp_suami_istri`, `status`) VALUES
('0000000002', 'P80726-054005.jpg', 0),
('0000000003', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas_npwp`
--

CREATE TABLE `tb_berkas_npwp` (
  `norek` varchar(10) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas_npwp`
--

INSERT INTO `tb_berkas_npwp` (`norek`, `npwp`, `status`) VALUES
('0000000002', 'input.png', 0),
('0000000003', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas_sk`
--

CREATE TABLE `tb_berkas_sk` (
  `norek` varchar(10) NOT NULL,
  `sk` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas_sk`
--

INSERT INTO `tb_berkas_sk` (`norek`, `sk`, `status`) VALUES
('0000000002', 'P80726-054628.jpg', 0),
('0000000003', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas_slip`
--

CREATE TABLE `tb_berkas_slip` (
  `norek` varchar(10) NOT NULL,
  `slip` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas_slip`
--

INSERT INTO `tb_berkas_slip` (`norek`, `slip`, `status`) VALUES
('0000000002', 'input.png', 0),
('0000000003', '', 0);

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
(1, '0000000002', 30000000, '2300000.00', 4600000, 29900000, 'Perjanjian_Kredit_IVAN_DARMAWAN.pdf', '2019-07-22', 0);

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
('0000000003', 'Aprianto', 'e10adc3949ba59abbe56e057f20f883e', 'Jln.Bulusaraung no.123', '08334685', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indeks untuk tabel `tb_berkas_foto_diri`
--
ALTER TABLE `tb_berkas_foto_diri`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `tb_berkas_karip`
--
ALTER TABLE `tb_berkas_karip`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `tb_berkas_kk`
--
ALTER TABLE `tb_berkas_kk`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `tb_berkas_ktp_suami_istri`
--
ALTER TABLE `tb_berkas_ktp_suami_istri`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `tb_berkas_npwp`
--
ALTER TABLE `tb_berkas_npwp`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `tb_berkas_sk`
--
ALTER TABLE `tb_berkas_sk`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `tb_berkas_slip`
--
ALTER TABLE `tb_berkas_slip`
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
  MODIFY `id_angsuran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
