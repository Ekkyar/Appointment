-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2020 pada 05.10
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_appointment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(126) DEFAULT NULL,
  `description` text,
  `color` varchar(24) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` varchar(64) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(7, 'Bimbingan TA', '2020-11-19 00:00:00', '2020-11-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `topic` text NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id`, `id_user`, `id_dosen`, `topic`, `update_time`) VALUES
(2, 19, 4, 'minta ttd', '2020-12-15 12:02:30'),
(3, 18, 14, 'asdasd', '2020-12-22 12:12:54'),
(4, 23, 11, 'asdasd', '2020-12-22 12:16:08'),
(5, 23, 8, 'sasd', '2020-12-22 13:17:51'),
(6, 5, 4, 'llo', '2020-12-27 12:32:22'),
(7, 18, 14, 'dasd', '2020-12-27 12:35:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_confirm`
--

CREATE TABLE `tb_confirm` (
  `id_confirm` int(11) NOT NULL,
  `nama_confirm` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_confirm`
--

INSERT INTO `tb_confirm` (`id_confirm`, `nama_confirm`) VALUES
(1, 'Accept'),
(2, 'Decline'),
(3, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_event`
--

CREATE TABLE `tb_event` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `status` enum('waiting','reject','accept','busy') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'MIF'),
(2, 'TIF'),
(3, 'TKK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reply_chat`
--

CREATE TABLE `tb_reply_chat` (
  `id` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `from_by` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_reply_chat`
--

INSERT INTO `tb_reply_chat` (`id`, `id_chat`, `id_role`, `from_by`, `message`, `update_time`) VALUES
(1, 1, 2, '9', 'halo\r\n', '2020-12-04 06:49:49'),
(2, 1, 3, '19', 'halo juga', '2020-12-05 11:07:53'),
(3, 1, 3, '19', 'iya sama sama kakak', '2020-12-05 11:13:14'),
(4, 1, 3, '19', 'siap bang jago', '2020-12-06 05:43:40'),
(5, 1, 2, '9', 'halo juga pak', '2020-12-06 06:06:12'),
(6, 1, 3, '19', 'kamu udah makan belum ?', '2020-12-06 06:06:41'),
(7, 1, 2, '9', 'udah nih', '2020-12-06 06:06:54'),
(0, 2, 3, '19', 'haloo\n', '2020-12-15 12:02:40'),
(0, 3, 3, '5', 'cok\n', '2020-12-17 06:41:30'),
(0, 3, 2, '4', 'opo cok\n', '2020-12-17 06:41:56'),
(0, 2, 2, '4', 'haloo\n', '2020-12-20 03:39:10'),
(0, 2, 2, '4', 'halo', '2020-12-21 03:58:16'),
(0, 3, 3, '18', 'halo pak\n', '2020-12-22 12:13:03'),
(0, 4, 3, '23', 'halsodo\n', '2020-12-22 12:16:14'),
(0, 5, 3, '23', 'jjhj\n', '2020-12-22 13:18:02'),
(0, 5, 2, '8', 'hkhkl\n', '2020-12-22 13:18:15'),
(0, 6, 3, '5', 'halo\n', '2020-12-27 12:32:34'),
(0, 7, 3, '18', 'asdahsdasd\n', '2020-12-27 12:35:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(128) NOT NULL,
  `color` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `nama_status`, `color`, `jam`) VALUES
(1, 'Open', '#1cc88a', 'Pagi-Sore'),
(2, 'Close', '#e74a3b', 'Closed'),
(3, 'Pagi', '#f6c23e', 'Pagi-Siang'),
(4, 'Sore', '#fd7e14', 'Siang-Sore');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nip/nim` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(258) NOT NULL,
  `id_role` int(1) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `nip/nim`, `email`, `password`, `id_role`, `id_prodi`, `image`, `date_created`) VALUES
(1, 'Ekky Aulia Rahman', '0', 'ekkyrahmanx1@gmail.com', '123456', 1, 0, 'default.png', 1602140297),
(4, 'Syamsul Arifin, S.Kom, M.Cs', '19810615 200604 1 002', 'syamsularifin@gmail.com', '123456', 2, 1, 'facf73e44eb1bb418f99310752bd6ee8.png', 1602222965),
(5, 'Dewi Ratih', 'E31180222', 'dewiratih01@gmail.com', '123456', 3, 1, 'default.png', 1602223209),
(8, 'Yogiswara, ST, MT', '19700929 200312 1 001', 'yogiswara@gmail.com', '123456', 2, 3, 'default.png', 1602693159),
(9, 'Hendra Yufit Riskiawan, S.Kom, M.Cs', '19830203 200604 1 003', 'hendrayufit@gmail.com', '123456', 2, 1, 'default.png', 1602697890),
(11, 'Victor Phoa, S.Si, M.Cs', '19851031 201803 1 001', 'victor@gmail.com', '123456', 2, 3, 'default.png', 1602737890),
(14, 'Aji Seto Arifianto, S.ST., M.T.', '19851128 200812 1 002', 'ajiseto@gmail.com', '123456', 2, 2, 'default.png', 1602742596),
(18, 'M Aldo Rizkaya', 'E31170509', 'aldorizkaya@gmail.com', '123456', 3, 2, 'default.png', 1602747889),
(19, 'M Badar Pamungkas', 'E31180510', 'badarp@gmail.com', '123456', 3, 1, 'default.png', 1602747938),
(23, 'M Haris', 'E31160509', 'haris@gmail.com', '123456', 3, 3, 'default.png', 1602748138),
(25, 'Wiji', '00988812312143', 'wiji@gmail.com', '123456', 2, 2, 'default.png', 1605686221);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_confirm`
--
ALTER TABLE `tb_confirm`
  ADD PRIMARY KEY (`id_confirm`);

--
-- Indeks untuk tabel `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_confirm`
--
ALTER TABLE `tb_confirm`
  MODIFY `id_confirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
