-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jun 2018 pada 13.46
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_akses`
--

CREATE TABLE `t_akses` (
  `id_akses` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_akses`
--

INSERT INTO `t_akses` (`id_akses`, `username`, `password`, `nip`) VALUES
(3, 'tes', 'EÚ#7³0É°•×œò;I•F\0àÔxè­+ù:­ø', 0),
(4, 'nur', 'M&3¸7…˜¹ÎÕ™¦:HÂFSà€,A¿ø}«3Zÿõ', 2017080125);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_coba`
--

CREATE TABLE `t_coba` (
  `id` int(11) NOT NULL,
  `hasil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_coba`
--

INSERT INTO `t_coba` (`id`, `hasil`) VALUES
(29, 'Terisi'),
(30, 'Terisi'),
(31, 'Tidak terisi'),
(32, 'Tidak terisi'),
(33, 'Tidak terisi'),
(34, 'Tidak terisi'),
(35, 'Tidak terisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hasil_ujian`
--

CREATE TABLE `t_hasil_ujian` (
  `id_hasil` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `hasil` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hasil_ujian`
--

INSERT INTO `t_hasil_ujian` (`id_hasil`, `no_peserta`, `id_soal`, `hasil`) VALUES
(372, 12018, 3, 'benar'),
(373, 12018, 4, 'benar'),
(374, 12018, 6, 'salah'),
(375, 12018, 7, 'salah'),
(376, 12018, 8, 'salah'),
(377, 12018, 9, 'salah'),
(378, 12018, 10, 'salah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurusan`
--

CREATE TABLE `t_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'REKAYASA PERANGKAT LUNAK (RPL)'),
(2, 'MULTIMEDIA (MM)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurusan_peserta`
--

CREATE TABLE `t_jurusan_peserta` (
  `id_jp` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `keterangan` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jurusan_peserta`
--

INSERT INTO `t_jurusan_peserta` (`id_jp`, `no_peserta`, `id_jurusan`, `keterangan`) VALUES
(1, 12018, 1, 'kunci');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_log_soal_peserta`
--

CREATE TABLE `t_log_soal_peserta` (
  `id_log` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `waktu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_log_soal_peserta`
--

INSERT INTO `t_log_soal_peserta` (`id_log`, `no_peserta`, `hari`, `waktu`) VALUES
(2, 12018, 'Tuesday', '19/06/2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_nilai_ujian`
--

CREATE TABLE `t_nilai_ujian` (
  `id_nilai` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `nip` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jabatan` text NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `status_nikah` varchar(15) NOT NULL,
  `status_kerja` text NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pegawai`
--

INSERT INTO `t_pegawai` (`nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenkel`, `agama`, `jabatan`, `pendidikan`, `no_hp`, `alamat`, `status_nikah`, `status_kerja`, `tanggal_masuk`) VALUES
(2017080125, 'Nur Abadi', '', '', '', '', '', '', '', 'Jakarta', '', '', ''),
(2018100406, 'tes', 'tes', '10/06/2018', 'LAKI-LAKI', 'ISLAM', 'tes', 'S3', '08', 'tes', 'KAWIN', 'tes', '04/06/2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_peserta`
--

CREATE TABLE `t_peserta` (
  `id_peserta` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `ijazah` text NOT NULL,
  `asal_sekolah` varchar(60) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_peserta`
--

INSERT INTO `t_peserta` (`id_peserta`, `no_peserta`, `username`, `password`, `nama`, `jenkel`, `tanggal`, `alamat`, `foto`, `ijazah`, `asal_sekolah`, `no_hp`, `email`, `keterangan`) VALUES
(3, 12018, 'tes', 'ÞF!0°g†ÍåÂ‚Èói—GVë‡.º÷.¨2Q©ô', 'abadigantilagi', 'LAKI-LAKI', '07/03/2018', 'tesa', 'php-code.jpg', 'php-code.jpg', 'tes2', '89797', 'nur@gmail.com', 'Tes54321'),
(4, 22018, 'set', 'ß!m³;€µ•ÕÏ¡m\Z•CTáƒ+Fîú) 3Uý­', 'setdah', 'LAKI-LAKI', '05/23/2018', 'tesb', 'php-code.jpg', 'php-code.jpg', 'tes3', '78787878', 'tes@gmail.com', ''),
(5, 12019, 'ets', 'Ž#mäf†Ê¶ÇÔ”ò?O—@¶„*F¸Cû/ª`P©­', 'ETS', 'LAKI-LAKI', '06/29/2018', 'TESC', 'php-code.jpg', 'php-code.jpg', 'smp', '7878787', 'nur@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_soal`
--

CREATE TABLE `t_soal` (
  `id_soal` int(11) NOT NULL,
  `no_urut_soal` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `soal` text NOT NULL,
  `pilihan1` text NOT NULL,
  `pilihan2` text NOT NULL,
  `pilihan3` text NOT NULL,
  `pilihan4` text NOT NULL,
  `pilihan5` text NOT NULL,
  `jawaban` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_soal`
--

INSERT INTO `t_soal` (`id_soal`, `no_urut_soal`, `id_jurusan`, `soal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `jawaban`) VALUES
(3, 1, 1, 'Urutan prosedur penyiapan perangkat lunak komputer untuk dapat digunakan adalah', 'partisi - format - instalasi OS - instalasi aplikasi', 'format-instalasi-instalasi aplikasi- partisi', 'instalasi OS - instalasi aplikasi - partisi - format', 'instalasi aplikasi - partisi - format - instalasi OS', 'format - partisi - instalasi OS - instalasi aplikasi', 'a'),
(4, 2, 1, 'Di bawah ini adalah salah satu ciri website perdagangan elektronik atau E-Commerce yang baik, kecuali', 'website yang dengan mudah dicari oleh mesin pencari internet ', 'website yang memberi fasilitas pada pengunjung untuk menawar harga', 'website yang dapat mendorong pengunjung untuk merekomendasikan situs kita kepada orang lain ', 'website yang terus dikunjungi ( repeated traffic) ', 'website yang pengunjung merasa senang dan berlama-lama untuk melihat dan membaca', 'B'),
(6, 3, 1, 'Saat ini, web basis CMS banyak digunakan. Web jenis ini termasuk dalam kategori', 'web yang mengutamakan management ', 'web yang contentnya tetap ', 'web stastis', 'web dinamis', 'web paket yang siap diinstall ', 'D'),
(7, 4, 1, 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', 't'),
(8, 5, 1, 'tes2', 'tes2', 'tes2', 'tes2', 'tes2', 'tes2', 'a'),
(9, 6, 1, 'tes3', 'tes3', 'tes3', 'tes3', 'tes3', 'tes3', 'd'),
(10, 7, 1, 'tes4', 'tes4', 'tes4', 'tes4', 'tes4', 'tes4', 'b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_akses`
--
ALTER TABLE `t_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `t_coba`
--
ALTER TABLE `t_coba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_hasil_ujian`
--
ALTER TABLE `t_hasil_ujian`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `t_jurusan_peserta`
--
ALTER TABLE `t_jurusan_peserta`
  ADD PRIMARY KEY (`id_jp`);

--
-- Indexes for table `t_log_soal_peserta`
--
ALTER TABLE `t_log_soal_peserta`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `t_nilai_ujian`
--
ALTER TABLE `t_nilai_ujian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `t_peserta`
--
ALTER TABLE `t_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `t_soal`
--
ALTER TABLE `t_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_akses`
--
ALTER TABLE `t_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_coba`
--
ALTER TABLE `t_coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `t_hasil_ujian`
--
ALTER TABLE `t_hasil_ujian`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_jurusan_peserta`
--
ALTER TABLE `t_jurusan_peserta`
  MODIFY `id_jp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_log_soal_peserta`
--
ALTER TABLE `t_log_soal_peserta`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_nilai_ujian`
--
ALTER TABLE `t_nilai_ujian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_peserta`
--
ALTER TABLE `t_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_soal`
--
ALTER TABLE `t_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
