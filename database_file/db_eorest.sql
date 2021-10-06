-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2021 pada 11.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eorest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_menu`
--

CREATE TABLE `gambar_menu` (
  `id_gambar` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_menu`
--

INSERT INTO `gambar_menu` (`id_gambar`, `id_menu`, `gambar`) VALUES
(2, 2, '22092021172127mie-ayam.jpg'),
(3, 2, '22092021174747miee2.jpg'),
(5, 2, '22092021175050mi2asd.jpg'),
(6, 1, '22092021180735Bakso_mi_bihun.jpg'),
(7, 1, '220920211807421140357898.jpg'),
(8, 8, '0610202109160311Jugosylicuadosquetequitanlaansiedadyteayudanabajardepeso.jpg'),
(9, 8, '06102021091612Esjerukphotography.jpg'),
(10, 7, '06102021091833Sips-KatieChrist.jpg'),
(12, 7, '06102021091907EsTehSerai-LemongrassIceTea.jpg'),
(14, 16, '06102021092328orange-coconutmilkshake.jpg'),
(16, 16, '06102021092756024b5b71-b655-4e9b-9f7e-fc37ed0eb720.jpg'),
(17, 16, '06102021092845TheBestStrawberryMilkshake-BakingMischief.jpg'),
(19, 12, '06102021093111NasiGoreng(IndonesianFriedRice).jpg'),
(20, 12, '06102021093206BrownRiceNasiGoreng(IndonesianFriedRice)IGeorgieEats.jpg'),
(21, 13, '061020210934115d4481d7-66a4-4e4a-82f6-de49b246e92d.jpg'),
(24, 13, '06102021093658SateKambingYangEmpuk.jpg'),
(25, 15, '06102021093836SopBuntut_IndonesianOxtailSoup.jpg'),
(26, 11, '06102021093956ResepSotoLamonganAsliJawaTimurDenganSuwiranAyamDanKuahKuning.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `nomor_meja` varchar(50) NOT NULL,
  `kapasitas_meja` int(11) NOT NULL,
  `keterangan_meja` varchar(40) NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `nomor_meja`, `kapasitas_meja`, `keterangan_meja`) VALUES
(1, '1', 4, 'Tersedia'),
(3, '5', 10, 'Tidak Tersedia (Sudah Dibooking)'),
(4, '3', 6, 'Tersedia'),
(5, '2', 2, 'Tersedia'),
(6, '4', 10, 'Tersedia'),
(8, '6', 20, 'Tidak Tersedia (Sudah Dibooking)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `detail_menu` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL DEFAULT 'Tersedia',
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `detail_menu`, `kategori`, `stok`, `harga`) VALUES
(1, 'Bakso', 'Bakso Daging', 'Makanan', 'Tersedia', 20000),
(2, 'Mie Ayam', 'Topping Ayam, Topping Jamur ', 'Makanan', 'Tersedia', 15000),
(7, 'Es Teh', 'Jasmine, Lychee, Oolong', 'Minuman', 'Tersedia', 8000),
(8, 'Es Jeruk', 'Nipis, Lemon, Jeruk Asli', 'Minuman', 'Tersedia', 10000),
(11, 'Soto Lamongan ', 'Dengan Topping ayam', 'Makanan', 'Tersedia', 15000),
(12, 'Nasi Goreng', 'Jawa, Mawut, Seafood', 'Makanan', 'Tersedia', 25000),
(13, 'Sate Daging', 'Ayam asli, Kambing, Sapi', 'Makanan', 'Tersedia', 25000),
(15, 'Sop Buntut', 'Buntut Sapi', 'Makanan', 'Tersedia', 35000),
(16, 'Milkshake', 'Coklat, Vanila, Greentea, Strawberry', 'Minuman', 'Tersedia', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(12) NOT NULL,
  `nama_merchant` varchar(250) NOT NULL,
  `atas_nama` varchar(250) NOT NULL,
  `kode_pembayaran` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `nama_merchant`, `atas_nama`, `kode_pembayaran`) VALUES
(1, 'Dana', 'Budi S', '085212349852'),
(2, 'Bank BCA', 'Budi Sudiman', '8952317234'),
(4, 'LinkAja', 'Siti Nurjanah', '082398521045'),
(5, 'GoPay', 'Budi Sudirman', '085912394855');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `email`, `alamat`, `password`, `telepon`, `jenis_kelamin`, `jabatan`) VALUES
(1, 'Ardan Anjung Kusuma', 'ardan@gmail.com', 'Jl. Senggani, Kota Malang', '81dc9bdb52d04dc20036dbd8313ed055', '081279109122', 'Pria', 'pegawai'),
(2, 'Dina Lisuardi', 'dina@gmail.com', 'Jl. Semanggi Barat, Kota Malang', '81dc9bdb52d04dc20036dbd8313ed055', '085645121991', 'Wanita', 'pegawai'),
(3, 'Bos Admin', 'admin@gmail.com', 'Jl. Anggrek 51 Malang', '21232f297a57a5a743894a0e4a801fc3', '0851248238', 'Pria', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_usaha`
--

CREATE TABLE `profil_usaha` (
  `id` int(12) NOT NULL,
  `nama_usaha` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nomor_telepon` varchar(17) NOT NULL,
  `email` varchar(100) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `maps_link` text NOT NULL,
  `foto_usaha_1` text NOT NULL,
  `foto_usaha_2` text NOT NULL,
  `foto_usaha_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_usaha`
--

INSERT INTO `profil_usaha` (`id`, `nama_usaha`, `alamat`, `nomor_telepon`, `email`, `instagram`, `facebook`, `maps_link`, `foto_usaha_1`, `foto_usaha_2`, `foto_usaha_3`) VALUES
(1, 'Flamingo Cafe & Resto', 'Jl. Diponegoro No.15 Bojonegoro, Jawa Timur', '081252430912', 'flamingocafe@gmail.com', 'flamingocafepreston', 'Flamingo-café-restaurant-101136125017024', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.7349883071597!2d111.87995031459427!3d-7.156607694832594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77818cc20c2111%3A0x9133efd296da42a6!2sJl.%20Diponegoro%2049-59%2C%20Sukorejo%20Lor%2C%20Sukorejo%2C%20Kec.%20Bojonegoro%2C%20Kabupaten%20Bojonegoro%2C%20Jawa%20Timur%2062115!5e0!3m2!1sid!2sid!4v1633341565083!5m2!1sid!2sid\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'michael-browning-MtqG1lWcUw0-unsplash.jpg', 'nick-karvounis-Ciqxn7FE4vE-unsplash.jpg', 'shawnanggg-nmpW_WwwVSc-unsplash.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran_kritik`
--

CREATE TABLE `saran_kritik` (
  `id_saran` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saran_kritik`
--

INSERT INTO `saran_kritik` (`id_saran`, `nama_pelanggan`, `email`, `tanggal`, `saran`) VALUES
(15, 'Nay', 'znyh@gmail.com', '2021-09-20', 'Rumah makan atau restoran adalah istilah umum untuk menyebut usaha gastronomi yang menyajikan hidangan kepada masyarakat dan menyediakan tempat untuk menikmati hidangan tersebut serta menetapkan tarif tertentu untuk makanan dan pelayanannya. Meski pada umumnya rumah makan menyajikan makanan di tempat, tetapi ada juga beberapa yang menyediakan layanan take-out dining dan delivery service sebagai salah satu bentuk pelayanan kepada konsumennya. Rumah makan biasanya memiliki spesialisasi dalam jenis makanan yang dihidangkannya. Sebagai contoh yaitu rumah makan chinese food, rumah makan Padang, rumah makan cepat saji (fast food restaurant) dan sebagainya.'),
(16, 'Yuni Kurnia Taramita', 'yuni186@gmail.com', '2021-10-01', 'Restoran ini tempatnya nyaman dan bersih. Pelayanannya pun sangat baik dan ramah. Dan tentunya menu yang ditawarkan juga enak. '),
(17, 'Ardan', 'ardananjungkusuma@gmail.com', '2021-10-04', 'Tolong kebersihan ditingkatkan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar_menu`
--
ALTER TABLE `gambar_menu`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `profil_usaha`
--
ALTER TABLE `profil_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saran_kritik`
--
ALTER TABLE `saran_kritik`
  ADD PRIMARY KEY (`id_saran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar_menu`
--
ALTER TABLE `gambar_menu`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profil_usaha`
--
ALTER TABLE `profil_usaha`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `saran_kritik`
--
ALTER TABLE `saran_kritik`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
