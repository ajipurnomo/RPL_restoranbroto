-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2019 pada 11.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayam_geprek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `stok_bahan` int(4) NOT NULL,
  `satuan` varchar(4) NOT NULL,
  `status_bahan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `id_pegawai`, `nama_bahan`, `stok_bahan`, `satuan`, `status_bahan`) VALUES
('BH002', '', 'mama', 2, 'Gram', 'TERSEDIA');

--
-- Trigger `bahan_baku`
--
DELIMITER $$
CREATE TRIGGER `detail_belanja` AFTER INSERT ON `bahan_baku` FOR EACH ROW INSERT INTO detail_belanja VALUES(NEW.id_bahan_baku,'','','','')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_bahan_baku` varchar(10) NOT NULL,
  `id_belanja` varchar(10) NOT NULL,
  `harga_bahan` int(8) NOT NULL,
  `jumlah_beli` int(4) NOT NULL,
  `sub_total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_kuisioner`
--

CREATE TABLE `hasil_kuisioner` (
  `kode_pembayaran` varchar(10) NOT NULL,
  `id_kuisioner` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `jawaban` varchar(126) NOT NULL,
  `saran` varchar(126) NOT NULL,
  `umur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(2) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `pertanyaan` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `id_pegawai`, `pertanyaan`) VALUES
(1, 'PG001', 'Bagaimana Restoran Kami ?'),
(2, '', 'a'),
(3, '', 'b'),
(4, '', 'c'),
(5, '', 'd'),
(6, '', 'e'),
(7, '', 'ab'),
(8, '', 'ac');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `no_meja` int(5) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`no_meja`, `status`) VALUES
(1, 'ada'),
(2, 'ada'),
(3, 'ada'),
(4, 'ada'),
(5, 'ada'),
(6, 'penuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga_menu` int(8) NOT NULL,
  `status_menu` varchar(15) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `status_menu`, `kategori`) VALUES
('1', 'Ayam Geprek Original', 15000, 'ada', 'makanan'),
('2', 'Ayam Geprek Sambal Ijo', 20000, 'ada', 'makanan'),
('3', 'Ayam Geprek Sambal Merah', 20000, 'ada', 'makanan'),
('4', 'Es Jeruk', 10000, 'ada', 'minuman'),
('5', 'Es Teh', 5000, 'ada', 'minuman'),
('6', 'Es Kelapa', 10000, 'habis', 'minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `no_telp`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `jabatan`, `status`, `password`) VALUES
('PG001', 'Retno Widya Sari', '087786708960', 'Jl. Kertajati No.30', 'Wanita', '1990-08-01', 'pelayan', '', 'retno123'),
('PG002', 'Rahmat Efendi', '083157899012', 'Jl.Sekeloa No.123', 'Pria', '1980-08-01', 'pantry', '', 'rahmat123'),
('PG003', 'Wijayanto', '085760908774', 'Jl.Ir H Juanda No.108', 'Pria', '1980-12-07', 'koki', '', 'wijayanto123'),
('PG004', 'Ilham Sastro', '082250497084', 'Jl. Surapati No.99', 'Pria', '1993-07-18', 'kasir', '', 'ilham123'),
('PG005', 'Aji Purnomo', '082251008392', 'Jl.Sekeloa No.28', 'Pria', '1999-03-03', 'owner', '', 'aji123'),
('PG006', 'Dewi Lestari', '083150127089', 'Jl. Dago Atas No.45', 'Wanita', '1997-12-22', 'cs', '', 'dewi123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `jumlah_pelanggan` int(3) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jumlah_pelanggan`, `no_telp`) VALUES
('PL001', 'qwe', 3, '087786708960');

--
-- Trigger `pelanggan`
--
DELIMITER $$
CREATE TRIGGER `tabelpesanan` AFTER INSERT ON `pelanggan` FOR EACH ROW insert into pesanan values ('',NEW.id_pelanggan,'','','','','')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_pembayaran` varchar(10) NOT NULL,
  `no_pesanan` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(8) NOT NULL,
  `total_bayar` int(8) NOT NULL,
  `kembalian` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`kode_pembayaran`, `no_pesanan`, `id_pegawai`, `tanggal`, `total_harga`, `total_bayar`, `kembalian`) VALUES
('PY003', '', '', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_belanja` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `tgl_belanja` date NOT NULL,
  `total_belanja` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_belanja`, `id_pegawai`, `tgl_belanja`, `total_belanja`) VALUES
('BL001', 'PG001', '2019-08-14', 500000),
('BL002', '', '0000-00-00', 0);

--
-- Trigger `pembelian`
--
DELIMITER $$
CREATE TRIGGER `detailbelanja` BEFORE INSERT ON `pembelian` FOR EACH ROW INSERT INTO detail_belanja VALUES('',NEW.id_belanja,'','','')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` varchar(10) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `no_meja` int(5) NOT NULL,
  `id_reservasi` varchar(10) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `status_pesanan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `id_pelanggan`, `id_pegawai`, `no_meja`, `id_reservasi`, `tgl_pesanan`, `status_pesanan`) VALUES
('', 'PL001', '', 0, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_menu` varchar(10) NOT NULL,
  `id_bahan_baku` varchar(10) NOT NULL,
  `jumlah_bahan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pesanan`
--

CREATE TABLE `rincian_pesanan` (
  `no_pesanan` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `jumlah_pesanan` int(3) NOT NULL,
  `sub_total` int(8) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`) USING BTREE,
  ADD KEY `Id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD KEY `Id_bahan_baku` (`id_bahan_baku`),
  ADD KEY `Id_belanja` (`id_belanja`);

--
-- Indeks untuk tabel `hasil_kuisioner`
--
ALTER TABLE `hasil_kuisioner`
  ADD KEY `Kode_pembayaran` (`kode_pembayaran`),
  ADD KEY `Id_kuisioner` (`id_kuisioner`) USING BTREE;

--
-- Indeks untuk tabel `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`) USING BTREE,
  ADD KEY `Id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`) USING BTREE,
  ADD KEY `No_pesanan` (`no_pesanan`,`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_belanja`) USING BTREE,
  ADD KEY `id_pegawai` (`id_pegawai`) USING BTREE;

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `Id_pelanggan` (`id_pelanggan`,`id_pegawai`,`no_meja`,`id_reservasi`) USING BTREE,
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `no_meja` (`no_meja`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD KEY `Id_menu` (`id_menu`,`id_bahan_baku`) USING BTREE,
  ADD KEY `id_bahan_baku` (`id_bahan_baku`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `rincian_pesanan`
--
ALTER TABLE `rincian_pesanan`
  ADD KEY `No_pesanan` (`no_pesanan`,`id_menu`) USING BTREE,
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_kuisioner` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
