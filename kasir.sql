-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2024 pada 15.51
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_20_161021_create_pembelians_table', 1),
(6, '2024_02_20_161112_create_supliers_table', 1),
(7, '2024_02_20_161139_create_pembelian_details_table', 1),
(8, '2024_02_20_161148_create_tokos_table', 1),
(9, '2024_02_20_161201_create_penjualans_table', 1),
(10, '2024_02_20_161211_create_produks_table', 1),
(11, '2024_02_20_161238_create_pelanggans_table', 1),
(12, '2024_02_20_161305_create_penjualan_details_table', 1),
(13, '2024_02_20_161330_create_produk_kategoris_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `toko_id`, `nama_pelanggan`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jelita Puput Nuraini', 'Ds. Samanhudi No. 475, Gorontalo 72445, Jambi', '023 4319 785', '2024-02-23 00:31:45', '2024-02-23 00:31:45'),
(2, 2, 'Cemani Marpaung', 'Psr. Yap Tjwan Bing No. 671, Parepare 15882, Sulbar', '(+62) 286 4053 0236', '2024-02-23 00:31:45', '2024-02-23 00:31:45'),
(3, 3, 'Salimah Nasyiah', 'Ds. Ters. Buah Batu No. 73, Bogor 63083, Jambi', '(+62) 878 356 080', '2024-02-23 00:31:45', '2024-02-23 00:31:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
--

CREATE TABLE `pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `suplier_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelians`
--

INSERT INTO `pembelians` (`id`, `toko_id`, `user_id`, `no_faktur`, `tanggal_pembelian`, `suplier_id`, `total`, `bayar`, `sisa`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1', '2024-02-23', 1, 100, 100000, 0, 'Lunas', '2024-02-23 07:46:16', '2024-02-23 07:46:16'),
(2, 2, 4, '2', '2024-02-23', 2, 100, 200000, 0, 'Lunas', '2024-02-23 07:46:16', '2024-02-23 07:46:16'),
(3, 3, 6, '3', '2024-02-23', 3, 100, 300000, 0, 'Lunas', '2024-02-23 07:46:16', '2024-02-23 07:46:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_details`
--

CREATE TABLE `pembelian_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembelian_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_details`
--

INSERT INTO `pembelian_details` (`id`, `pembelian_id`, `produk_id`, `qty`, `harga_beli`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, 100000, '2024-02-23 07:47:40', '2024-02-23 07:47:40'),
(2, 2, 2, 100, 200000, '2024-02-23 07:47:40', '2024-02-23 07:47:40'),
(3, 3, 3, 100, 300000, '2024-02-23 07:47:40', '2024-02-23 07:47:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualans`
--

INSERT INTO `penjualans` (`id`, `toko_id`, `user_id`, `tanggal_penjualan`, `pelanggan_id`, `total`, `bayar`, `sisa`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-02-23', 1, 1, 1100, 100, 'Lunas', '2024-02-23 01:47:33', '2024-02-23 05:54:26'),
(2, 1, 3, '2024-02-23', 1, 1, 1100, 100, 'Lunas', '2024-02-23 01:47:33', '2024-02-23 01:47:33'),
(3, 2, 4, '2024-02-23', 2, 1, 2200, 200, 'Lunas', '2024-02-23 01:47:33', '2024-02-23 01:47:33'),
(4, 2, 5, '2024-02-23', 2, 1, 2200, 200, 'Lunas', '2024-02-23 01:47:33', '2024-02-23 01:47:33'),
(5, 3, 6, '2024-02-23', 3, 1, 3300, 300, 'Lunas', '2024-02-23 01:47:33', '2024-02-23 01:47:33'),
(6, 3, 7, '2024-02-23', 3, 1, 3300, 300, 'Lunas', '2024-02-23 01:47:33', '2024-02-23 01:47:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_details`
--

CREATE TABLE `penjualan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan_details`
--

INSERT INTO `penjualan_details` (`id`, `penjualan_id`, `produk_id`, `qty`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1000, 1100, '2024-02-23 01:47:41', '2024-02-23 05:54:26'),
(2, 2, 1, 1, 1000, 1100, '2024-02-23 01:47:41', '2024-02-23 01:47:41'),
(3, 3, 2, 1, 2000, 2200, '2024-02-23 01:47:41', '2024-02-23 01:47:41'),
(4, 4, 2, 1, 2000, 2200, '2024-02-23 01:47:41', '2024-02-23 01:47:41'),
(5, 5, 3, 1, 3000, 3300, '2024-02-23 01:47:41', '2024-02-23 01:47:41'),
(6, 6, 3, 1, 3000, 3300, '2024-02-23 01:47:41', '2024-02-23 01:47:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `toko_id`, `nama_produk`, `kategori_id`, `stok`, `satuan`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kopi', 1, 198, 'Pcs', 1000, 1100, '2024-02-23 02:40:46', '2024-02-23 05:54:26'),
(2, 2, 'Rokok', 2, 198, 'Pack', 2000, 2200, '2024-02-23 02:40:46', '2024-02-23 02:40:46'),
(3, 3, 'Mie Instan', 3, 198, 'Dus', 3000, 3300, '2024-02-23 02:40:46', '2024-02-23 02:40:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategoris`
--

CREATE TABLE `produk_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_kategoris`
--

INSERT INTO `produk_kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Kategori 1', '2024-02-21 15:32:50', '2024-02-21 15:32:50'),
(2, 'Kategori 2', '2024-02-21 15:32:50', '2024-02-21 15:32:50'),
(3, 'Kategori 3', '2024-02-21 15:32:50', '2024-02-21 15:32:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supliers`
--

CREATE TABLE `supliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` bigint(20) UNSIGNED NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `tlp_hp` varchar(255) NOT NULL,
  `alamat_suplier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supliers`
--

INSERT INTO `supliers` (`id`, `toko_id`, `nama_suplier`, `tlp_hp`, `alamat_suplier`, `created_at`, `updated_at`) VALUES
(1, 1, 'PJ Tarihoran Tbk', '0292 1502 688', 'Jr. Otto No. 32, Administrasi Jakarta Barat 31559, Jateng', '2024-02-23 00:33:08', '2024-02-23 00:33:08'),
(2, 2, 'CV Waskita', '0267 2151 263', 'Ki. Banceng Pondok No. 256, Pekalongan 90795, Maluku', '2024-02-23 00:33:08', '2024-02-23 00:33:08'),
(3, 3, 'PD Yulianti Yolanda', '0776 7222 525', 'Ds. Rajawali Barat No. 988, Administrasi Jakarta Utara 26584, Jateng', '2024-02-23 00:33:08', '2024-02-23 00:33:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokos`
--

CREATE TABLE `tokos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tlp_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tokos`
--

INSERT INTO `tokos` (`id`, `nama_toko`, `alamat`, `tlp_hp`, `created_at`, `updated_at`) VALUES
(1, 'Toko 1', 'Ki. Tentara Pelajar No. 213, Palembang 77132, Sumbar', '0760 0584 606', '2024-02-23 00:04:54', '2024-02-23 00:04:54'),
(2, 'Toko 2', 'Gg. Baik No. 815, Pasuruan 31492, Lampung', '0821 4272 4196', '2024-02-23 00:04:54', '2024-02-23 00:04:54'),
(3, 'Toko 3', 'Ki. Bara No. 304, Batu 32681, DIY', '(+62) 439 1423 7545', '2024-02-23 00:04:54', '2024-02-23 00:04:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `access_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `toko_id`, `username`, `email`, `password`, `nama_lengkap`, `alamat`, `access_level`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 'admin@example.com', '$2y$12$y4xgOQsvLkQN0Hx5cmPQnudX66egNQnM0AvS9RzGpbL2NTs7j/kom', 'Azalea Vicky Usada S.Ked', 'Ds. Lembong No. 862, Tual 94761, NTT', 'admin', '2024-02-23 00:10:55', '2024-02-23 00:10:55'),
(2, 1, 'manajer1toko1', 'manajer1toko1@example.com', '$2y$12$y4xgOQsvLkQN0Hx5cmPQnudX66egNQnM0AvS9RzGpbL2NTs7j/kom', 'Ajeng Hasanah', 'Kpg. Gotong Royong No. 639, Padangpanjang 29267, Kalsel', 'manajer', '2024-02-23 00:10:55', '2024-02-23 00:10:55'),
(3, 1, 'kasir1toko1', 'kasir1toko1@example.com', '$2y$12$y4xgOQsvLkQN0Hx5cmPQnudX66egNQnM0AvS9RzGpbL2NTs7j/kom', 'Puput Patricia Suartini S.I.Kom', 'Ki. K.H. Wahid Hasyim (Kopo) No. 174, Bandung 82177, Sulsel', 'kasir', '2024-02-23 00:10:55', '2024-02-23 00:10:55'),
(4, 2, 'manajer1toko2', 'manajer1toko2@example.com', '$2y$12$y4xgOQsvLkQN0Hx5cmPQnudX66egNQnM0AvS9RzGpbL2NTs7j/kom', 'Carub Hutapea', 'Ki. Thamrin No. 657, Tarakan 68580, Kepri', 'manajer', '2024-02-23 00:10:55', '2024-02-23 00:10:55'),
(5, 2, 'kasir1toko2', 'kasir1toko2@example.com', '$2y$12$y4xgOQsvLkQN0Hx5cmPQnudX66egNQnM0AvS9RzGpbL2NTs7j/kom', 'Ratna Winda Puspita', 'Gg. Abang No. 154, Pasuruan 97307, Sultra', 'kasir', '2024-02-23 00:10:55', '2024-02-23 00:10:55'),
(6, 3, 'manajer1toko3', 'manajer1toko3@example.com', '$2y$12$y4xgOQsvLkQN0Hx5cmPQnudX66egNQnM0AvS9RzGpbL2NTs7j/kom', 'Emas Ghani Mahendra S.Farm', 'Jr. Bahagia  No. 543, Padangsidempuan 33385, Bengkulu', 'manajer', '2024-02-23 00:10:55', '2024-02-23 00:10:55'),
(7, 3, 'kasir1toko3', 'kasir1toko3@example.com', '$2y$12$y4xgOQsvLkQN0Hx5cmPQnudX66egNQnM0AvS9RzGpbL2NTs7j/kom', 'Titi Winarsih', 'Dk. Baik No. 104, Palu 15884, DIY', 'kasir', '2024-02-23 00:10:55', '2024-02-23 00:10:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_details`
--
ALTER TABLE `pembelian_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_kategoris`
--
ALTER TABLE `produk_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian_details`
--
ALTER TABLE `pembelian_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_kategoris`
--
ALTER TABLE `produk_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
