-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Bulan Mei 2026 pada 04.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_musik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Album`
--

CREATE TABLE `Album` (
  `ID` int(11) NOT NULL,
  `Artis_ID` int(11) NOT NULL,
  `Judul_Album` int(11) NOT NULL,
  `Tahun_Rilis` int(11) NOT NULL,
  `Label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `artis`
--

CREATE TABLE `artis` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Negara_Asal` varchar(255) NOT NULL,
  `Genre_Utama` varchar(255) NOT NULL,
  `Tahun_Debut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lagu`
--

CREATE TABLE `lagu` (
  `ID` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Artis` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Tahun_Rilis` int(11) NOT NULL,
  `Durasi` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lagu`
--

INSERT INTO `lagu` (`ID`, `Judul`, `Artis`, `Genre`, `Tahun_Rilis`, `Durasi`) VALUES
(101, 'Baby', 'Justin Bieber', 'Pop', 2010, 3.40),
(110, 'Dynamite', 'BTS', 'KPop', 2020, 3.19),
(123, 'Shape of You', 'Ed Sheeran', 'Pop', 2017, 4.24),
(303, 'Yellow', 'Coldplay', 'Rock', 2000, 4.29),
(321, 'Perfect', 'Ed Sheeran', 'Pop', 2017, 4.23),
(490, 'Fix You', 'Coldplay', 'Rock', 2005, 4.54),
(560, 'Someone Like You', 'Adele', 'Pop', 2011, 4.45),
(567, 'DNA', 'BTS', 'KPop', 2017, 3.45),
(777, 'Love Scenario', 'iKON', 'KPop', 2018, 3.29),
(911, 'YOU!', 'Lany', 'Pop', 2020, 1.34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lagu_playlist`
--

CREATE TABLE `lagu_playlist` (
  `ID` int(11) NOT NULL,
  `Lagu_ID` int(11) NOT NULL,
  `Playlist_ID` int(11) NOT NULL,
  `Urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlist`
--

CREATE TABLE `playlist` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Nama_Playlist` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Tanggal_Dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Tanggal_Daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID`, `Username`, `Email`, `Password`, `Tanggal_Daftar`) VALUES
(1, 'Regina', 'reginasimanjuntak07@gmail.com', 'regina2502', '2026-05-01 00:00:00'),
(2, 'Admin', 'adminbest@gmail.com', 'adminminmin', '2026-05-02 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Artis_ID` (`Artis_ID`);

--
-- Indeks untuk tabel `artis`
--
ALTER TABLE `artis`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `lagu`
--
ALTER TABLE `lagu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `lagu_playlist`
--
ALTER TABLE `lagu_playlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Lagu_ID` (`Lagu_ID`,`Playlist_ID`),
  ADD KEY `Playlist_ID` (`Playlist_ID`);

--
-- Indeks untuk tabel `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Album`
--
ALTER TABLE `Album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `artis`
--
ALTER TABLE `artis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lagu`
--
ALTER TABLE `lagu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=912;

--
-- AUTO_INCREMENT untuk tabel `lagu_playlist`
--
ALTER TABLE `lagu_playlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `playlist`
--
ALTER TABLE `playlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Album`
--
ALTER TABLE `Album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`Artis_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lagu_playlist`
--
ALTER TABLE `lagu_playlist`
  ADD CONSTRAINT `lagu_playlist_ibfk_1` FOREIGN KEY (`Lagu_ID`) REFERENCES `lagu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lagu_playlist_ibfk_2` FOREIGN KEY (`Playlist_ID`) REFERENCES `playlist` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
