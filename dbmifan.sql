-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2022 pada 06.57
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmifan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `footer`
--

CREATE TABLE `footer` (
  `id` int(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `footer`
--

INSERT INTO `footer` (`id`, `konten`, `created_at`, `updated_at`) VALUES
(1, 'Mifan-2022', NULL, '2022-06-09 02:01:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Tiket Masuk', 'tiket-masuk', '2022-06-10 00:19:30', '2022-06-11 20:33:35'),
(5, 'Penginapan', 'penginapan', '2022-07-14 18:45:09', '2022-08-26 11:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(7, 'Fasilitas', 'fasilitas', '2022-06-07 07:17:40', '2022-08-14 09:32:23'),
(8, 'Informasi', 'informasi', '2022-06-07 07:21:11', '2022-08-14 09:32:11'),
(9, 'Berita', 'berita', '2022-06-07 08:10:36', '2022-06-08 20:03:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_user` int(20) UNSIGNED NOT NULL,
  `id_transaksi` int(20) UNSIGNED NOT NULL,
  `gambar` blob NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_order` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id`, `id_user`, `id_transaksi`, `gambar`, `deskripsi`, `created_at`, `updated_at`, `status_order`) VALUES
(65, 29, 123, 0x313636313439363733362d737472756b2e6a7067, 'pembayaran tiket', '2022-08-26 06:52:16', '2022-08-26 08:00:07', '3'),
(66, 30, 125, 0x313636313530323135362d50656d6261796172616e2d53686f7065652d5472616e736665722d42616e6b2d313732783330302e6a7067, 'penginapan', '2022-08-26 08:22:36', '2022-08-28 23:54:50', '3'),
(67, 23, 126, 0x313636313732363030302d62756b74692d7472616e736665722d626572686173696c2e706e67, 'pembayaran tiket masuk', '2022-08-28 22:33:20', '2022-08-28 22:33:58', '3'),
(68, 38, 128, 0x313636313938353234392d62756b74692074662e6a7067, 'transfer bank', '2022-08-31 22:34:09', '2022-08-31 22:34:57', '3'),
(69, 40, 129, 0x313636323030353530392d62756b74692074662e6a7067, 'lunas', '2022-09-01 04:11:50', '2022-09-01 04:12:20', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_penginapan`
--

CREATE TABLE `konfirmasi_penginapan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi_penginapan` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_order` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfirmasi_penginapan`
--

INSERT INTO `konfirmasi_penginapan` (`id`, `id_user`, `id_transaksi_penginapan`, `gambar`, `deskripsi`, `status_order`, `created_at`, `updated_at`) VALUES
(11, 29, 40, '1661499585-bukti-transfer-berhasil.png', 'pembayaran penginapan', '3', '2022-08-26 07:39:45', '2022-08-26 08:02:29'),
(12, 30, 41, '1661503226-bukti-transfer-berhasil.png', 'penginapan cottage olivera', '3', '2022-08-26 08:40:26', '2022-08-26 08:41:06'),
(13, 26, 45, '1661977949-Bukti-Transfer.jpg', 'tidakada', '3', '2022-08-31 20:32:29', '2022-08-31 20:33:50'),
(14, 38, 48, '1661984035-buktitf.jpg', 'transfer penginapan cottage-deluxe', '3', '2022-08-31 22:13:55', '2022-08-31 22:15:08'),
(15, 24, 46, '1661986004-tf.jpeg', 'lunas', '2', '2022-08-31 22:46:44', '2022-08-31 22:46:44'),
(16, 40, 49, '1662005708-tf.jpeg', 'lunas', '3', '2022-09-01 04:15:08', '2022-09-01 04:15:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `id` int(20) UNSIGNED NOT NULL,
  `gambar` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 0x6c6f676f2e6a7067, NULL, '2022-08-08 15:17:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_07_092219_create_kategori_table', 1),
(5, '2022_06_07_150656_create_post_table', 2),
(6, '2022_06_08_031917_add_id_kategori_to_post_table', 3),
(7, '2022_06_08_142913_create_gambar_table', 4),
(8, '2022_06_09_034747_create_logo_table', 5),
(9, '2022_06_09_064016_create_footer_table', 6),
(10, '2022_06_09_070022_create_logo_table', 7),
(11, '2022_06_09_070348_create_footer_table', 7),
(12, '2022_06_09_102929_create_jenis_table', 8),
(13, '2022_06_10_065922_create_jenis_table', 9),
(14, '2022_06_10_070800_create_jenis_table', 10),
(15, '2022_06_10_074103_create_tmasuk_table', 11),
(16, '2022_06_10_081347_create_tiket_table', 12),
(17, '2022_06_11_040002_add_id_jenis_to_tiket_table', 13),
(18, '2022_06_12_042203_create_wahana_table', 14),
(19, '2022_06_15_071824_add_hp_to_users_table', 15),
(20, '2022_06_15_073217_add_address_to_users_table', 16),
(21, '2022_06_15_074345_add_telp_to_users_table', 17),
(22, '2022_06_15_074502_add_address_to_users_table', 18),
(23, '2022_06_15_094332_create_permission_tables', 19),
(24, '2022_06_16_165258_create_transaksi_table', 20),
(25, '2022_06_18_102059_create_table_transaksi', 21),
(26, '2022_06_19_032934_create_transaksi_table', 22),
(27, '2022_06_19_035054_create_transaksi_table', 23),
(28, '2022_06_21_021941_create_transaksi_table', 24),
(29, '2022_06_21_091838_add_id_tiket_to_transaksi_table', 25),
(30, '2022_06_22_034716_add_harga_tiket_to_transaksi_table', 26),
(31, '2022_06_22_035449_add_harga_tiket_to_transaksi_table', 27),
(32, '2022_06_22_094002_create_konfirmasi_table', 28),
(33, '2022_06_22_101721_add_id_transaksi_to_konfirmasi_table', 29),
(34, '2022_06_22_121616_add_nama_cust_to_konfirmasi_table', 30),
(35, '2022_06_23_043111_add_id_user_to_transaksi_table', 31),
(36, '2022_06_25_130530_add_id_user_to_konfirmasi_table', 32),
(37, '2022_06_28_150331_create_status_table', 33),
(38, '2022_06_28_152408_create_status_table', 34),
(39, '2022_06_28_152617_add_aksi_status_to_transaksi_table', 35),
(40, '2022_06_29_034014_add_status_order_to_transaksi_table', 36),
(41, '2022_06_29_042435_add_status_to_transaksi_table', 37),
(42, '2022_06_29_044736_add_status_order_to_konfirmasi_table', 38),
(43, '2022_07_06_043027_create_type_penginapan', 39),
(44, '2022_07_06_043027_create_tipe_penginapan', 40),
(45, '2022_07_06_075202_create_tipe_penginapan', 41),
(46, '2022_07_06_094908_add_id_jenis_to_tipe_penginapan_table', 42),
(47, '2022_07_07_084826_create_transaksi_penginapan_table', 43),
(48, '2022_07_30_082038_add_id_tipe_to_transaksi_penginapan_table', 44),
(49, '2022_07_30_084108_add_id_harga_to_transaksi_penginapan_table', 45),
(50, '2022_07_30_084536_add_id_harga_penginapan_to_transaksi_penginapan_table', 46),
(51, '2022_08_06_085248_add_jumlah_hari_to_transaksi_penginapan_table', 47),
(52, '2022_08_06_111906_add_id_tiket_to_transaksi_penginapan_table', 48),
(53, '2022_08_11_095150_add_jumlah_hari_to_transaksi_penginapan_table', 49),
(54, '2022_08_12_022759_add_status_to_transaksi_penginapan_table', 50),
(55, '2022_08_12_023142_add_status_to_transaksi_penginapan_table', 51),
(56, '2022_08_12_042348_create_konfirmasi_penginapan_table', 52),
(57, '2022_08_12_043725_create_konfirmasi_penginapan_table', 53),
(58, '2022_08_12_071447_create_konfirmasi_penginapan_table', 54),
(59, '2022_08_12_073045_add_id_transaksi_penginapan_to_konfirmasi_penginapan_table', 55),
(60, '2022_08_12_073343_add_id_user_to_konfirmasi_penginapan_table', 56),
(61, '2022_08_12_073550_add_id_user_to_transaksi_penginapan_table', 57),
(62, '2022_08_15_224240_create_rekening_table', 58),
(63, '2022_08_17_041132_add_foto_to_rekening_table', 59),
(64, '2022_08_17_112218_add_gambar_to_rekening_table', 60),
(65, '2022_08_24_142301_add_unit_to_tipe_penginapan_table', 61),
(66, '2022_08_24_185535_create_jenis_penginapan_table', 62),
(67, '2022_08_25_133800_create_jumlah_kamar_table', 63),
(68, '2022_08_25_151917_add_id_jumlahkamar_to_tipe_penginapan_table', 64),
(69, '2022_08_25_154827_add_jumlahkamar_to_tipe_penginapan_table', 65),
(70, '2022_08_25_155159_add_jumlahkamar_to_tipe_penginapan_table', 66),
(71, '2022_08_25_194014_add_jumlah_unit_to_transaksi_penginapan_table', 67),
(72, '2022_08_25_232644_add_tamu_to_tipe_penginapan_table', 68);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 35),
(1, 'App\\Models\\User', 36),
(1, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 42),
(3, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dasrialefendi@gmail.com', '$2y$10$zTVQic39sKIyB2GGJFSdJO.g0rfm2DIUPKh5LX3gqTQerV2aVau4i', '2022-08-31 21:53:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_kategori` int(20) UNSIGNED NOT NULL,
  `banner` blob NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `id_kategori`, `banner`, `judul`, `konten`, `slug`, `created_at`, `updated_at`) VALUES
(8, 9, 0x313635393833303837382d776168616e612e504e47, 'Water Park dan Dry Park di Mifan Water Park', '<p>Mifan Waterpark menyediakan 14 wahana drypark yang dapat dikunjungi oleh pengunjung diantaranya:</p><ol><li>Bom bom car</li><li>Cinema 4D</li><li>Jump A Round</li><li>UFO</li><li>Mini Coaster</li><li>Mini Train &amp; Segway</li><li>Faris Wheel</li></ol><p>Sedangkan waterpark yang terdapat di Mifan Water Park ialah:</p><ol><li>Kiddy Pool</li><li>Ember Tumpah</li><li>Open Slide</li><li>Slide Ban</li><li>Multi Racel Slide</li><li>Kolam Ombak</li><li>Kolam Arus</li><li>Kolam Olympic</li><li>Kolam Wanita</li></ol>', 'water-park-dan-dry-park-di-mifan-water-park', '2022-06-07 20:48:06', '2022-08-14 09:51:45'),
(9, 9, 0x313635393833303633312d726567756c61722e6a7067, 'Peningkatan jumlah wisatawan Mifan Water Park', '<p>Diutarakan oleh <strong>Direktur Mifan Waterpark, Desrial Efendi jumlah </strong>pengunjung Mifan mengalami peningkatan. Bahkan beberapa waktu lalu, kegiatan IGTKI(Ikatan Guru Taman Kanak-kanak Indonesia) se-Sumatera Barat yang mengadakan acara di Mifan. Bahkan berbagai wahana drypark dilakukan renovasi dengan harga tiket yang masih sama. Tidak hanya itu Mifan dipilih sebagai tujuan wisata karena fasilitas yang terus di<i>upgrade</i> sehingga membuat nyaman pengunjung.</p>', 'peningkatan-jumlah-wisatawan-mifan-water-park', '2022-06-07 20:57:16', '2022-08-06 17:03:51'),
(10, 8, 0x313636303439353330312d64656c757865332e6a7067, 'Penginapan Mifan Water Park', '<p><strong>Peraturan untuk reservasi di Penginapan Mifan Water Park ialah:</strong></p><ul><li>Chek-in Penginapan dilakukan pada jam 14.00 WIB dan Check-Out jam 12.00 WIB</li><li>Pembatalan Reservasi dilakukan sebelum hari H dikenakan biaya Charge 50%</li><li>Pembatalan Reservasi ketika hari -H dikenakan biaya 100%</li><li>Informasi untuk Pembatalan Reservasi diharapkan menghubungi admin di Whatsapp 0853 2222 4132</li></ul>', 'penginapan-mifan-water-park', '2022-06-08 02:36:13', '2022-08-14 09:41:41'),
(11, 8, 0x313636303439363431322d70656e67616461616e2e6a7067, 'Fasilitas yang terdapat di Mifan Water Park', '<p>Berikut fasilitas yang terdapat di Mifan Water Park:</p><ul><li>Water Park</li><li>Dry Park</li><li>Out Bound Area</li><li>Meeting Room</li><li>Mifan Resto</li><li>Mifan Auditorium</li><li>House Service 24 Jam</li><li>Kereta Wisata</li><li>Klinik&nbsp;</li><li>Loker Room</li></ul>', 'fasilitas-yang-terdapat-di-mifan-water-park', '2022-08-14 10:00:12', '2022-08-14 10:00:12'),
(12, 7, 0x313636313639303730302d313636313532313739333735372e6a7067, 'Ruang Meeting / Aula Yang Terdapat Di Mifan Water park', '<p>Mifan Water Park telah menyediakan beberapa paket ruang meeting yang telah di gunakan oleh berbagai pihak seperti acara pernikahan, acara dinas Kota Padang Panjang maupun event penting lainnya. Berikut beberapa paket yang terdapat di Mifan Water Park:</p><figure class=\"table\"><table><thead><tr><th>No</th><th>Ruang Meeting / Hiburan</th><th>Harga</th></tr></thead><tbody><tr><td>1.</td><td>Audi Mini</td><td>Rp 2.500.000</td></tr><tr><td>2.</td><td>Audi Mini Orgen</td><td>Rp. 4.500.000</td></tr><tr><td>3.</td><td>Audi Mini Orgen dan Kim</td><td>Rp. 5.500.000</td></tr><tr><td>4.</td><td>Panggung Satelit</td><td>Rp. 3.000.000</td></tr><tr><td>5.</td><td>Panggung Satelit Orgen</td><td>Rp. 5.000.000</td></tr><tr><td>6.</td><td>Panggung Satelit Orgen dan Kim</td><td>Rp. 7.000.000</td></tr><tr><td>7.</td><td>Auditorium</td><td>Rp. 10.000.000</td></tr><tr><td>8.</td><td>Auditorium 2</td><td>Rp. 7.000.000</td></tr></tbody></table></figure>', 'ruang-meeting-aula-yang-terdapat-di-mifan-water-park', '2022-08-28 12:45:00', '2022-09-01 02:16:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) UNSIGNED NOT NULL,
  `bank` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` blob NOT NULL,
  `nama_akun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `bank`, `gambar`, `nama_akun`, `nomor_rekening`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Bni', 0x313636303737373131302d50696e436c69706172742e636f6d5f62726f6b656e2d70696767792d62616e6b2d636c69706172745f313035313732392e706e67, 'PT NIAGARA FANTASI ISLAND', '0815248506', '<ol><li>Gunakan ATM / Banking / mBanking / setor tunai untuk transfer ke rekening diatas</li><li>Silahkan upload bukti pembayaran&nbsp;</li><li>Demi keamanan transaksi, mohon untuk tidak membagikan bukti atau konfirmasi pembayaran pesanan kepada siapapun , selain mengunggah di pemesanan Mifan Water Park.</li></ol>', '2022-08-17 09:23:12', '2022-08-17 15:58:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-06-15 02:46:18', '2022-06-15 02:46:18'),
(2, 'customer', 'web', '2022-06-15 02:46:29', '2022-06-15 02:46:29'),
(3, 'pemilik', 'web', '2022-08-19 23:20:20', '2022-08-19 23:20:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(20) UNSIGNED NOT NULL,
  `banner` blob NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `banner`, `judul`, `slug`, `created_at`, `updated_at`) VALUES
(1, 0x313635343730333236362d5044494b4d31312e6a7067, 'Lokasi yang dekat dengan PDIKM', 'lokasi-yang-dekat-dengan-pdikm', '2022-06-08 08:47:46', '2022-08-14 10:01:58'),
(4, 0x313635343734353135312d6b6f6c616d2e6a7067, 'Seluncuran karpet di Mifan Water Park', 'seluncuran-karpet-di-mifan-water-park', '2022-06-08 20:25:52', '2022-08-14 10:01:40'),
(5, 0x313636313532343730352d313636313532313835383830382e6a7067, 'Kolam Ombak Water Park', 'kolam-ombak-water-park', '2022-08-26 13:11:56', '2022-08-26 14:38:25'),
(6, 0x313636313532353836352d313636313532313934313738302e6a7067, 'Ruang Meeting / Aula Di Mifan Water Park', 'ruang-meeting-aula-di-mifan-water-park', '2022-08-26 14:39:41', '2022-08-26 14:57:45'),
(7, 0x313636313939383735332d313636313532323432383731382e6a7067, 'Wahana Komedi Putar', 'wahana-komedi-putar', '2022-08-26 14:51:14', '2022-09-01 02:19:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_jenis` int(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(20) NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `id_jenis`, `judul`, `konten`, `harga`, `slug`, `created_at`, `updated_at`) VALUES
(5, 2, 'Tiket Reguler', 'Harga berlaku untuk Water park', 50000, 'tiket-reguler', '2022-06-11 20:46:03', '2022-08-14 09:33:28'),
(10, 2, 'Tiket Terusan', 'Harga berlaku untuk Water park dan Dry park', 90000, 'tiket-terusan', '2022-07-29 10:01:48', '2022-08-14 09:33:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_penginapan`
--

CREATE TABLE `tipe_penginapan` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_jenis` int(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` blob NOT NULL,
  `kamar` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(20) NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_unit` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tipe_penginapan`
--

INSERT INTO `tipe_penginapan` (`id`, `id_jenis`, `nama`, `gambar`, `kamar`, `tamu`, `deskripsi`, `harga`, `slug`, `jumlah_unit`, `status`, `created_at`, `updated_at`) VALUES
(12, 5, 'Rumah Gadang Rajo Babandiang', 0x313636303139373231352d72756d61685f72616a6f5f62616e6469616e672e6a7067, '4', '30 s/d 40', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 2850000, 'rumah-gadang-rajo-babandiang', '1', '1', '2022-07-29 20:31:02', '2022-08-25 23:40:54'),
(13, 5, 'Rumah Tabuik', 0x313636303139373034372d74616275696b2e6a7067, '3', '20 s/d 30', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 2000000, 'rumah-tabuik', '1', '1', '2022-07-29 20:32:25', '2022-08-25 23:40:03'),
(14, 5, 'Rumah Gadang Gajah Maharam', 0x313635393738373636392d494d472d32303232303731382d5741303030382e6a7067, '4', '30 s/d 40', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 2750000, 'rumah-gadang-gajah-maharam', '1', '1', '2022-08-06 05:07:49', '2022-08-25 23:41:34'),
(15, 5, 'Rumah Gadang Puti Bungsu', 0x313636303139313734312d72756d61685f707574695f62756e6773752e6a7067, '5', '30 s/d 40', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 3000000, 'rumah-gadang-puti-bungsu', '1', '1', '2022-08-08 08:19:51', '2022-08-25 23:42:06'),
(16, 5, 'Rumah Gadang Kajang Padati', 0x313636303139373531312d6b616a616e675f7061646174692e6a7067, '4', '30 s/d 40', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 3250000, 'rumah-gadang-kajang-padati', '1', '1', '2022-08-10 22:58:31', '2022-08-25 23:38:05'),
(17, 5, 'Rumah Gadang Rantau Pasisia', 0x313636303139373630392d72756d61685f70616e7461695f70617369722e6a7067, '3', '20 s/d 30', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 2250000, 'rumah-gadang-rantau-pasisia', '1', '1', '2022-08-10 23:00:09', '2022-08-25 23:37:19'),
(18, 5, 'Luhak Agam', 0x313636303139373733362d6c7568616b5f6167616d2e6a7067, '2', '10 s/d 20', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 1500000, 'luhak-agam', '1', '1', '2022-08-10 23:02:16', '2022-08-25 23:36:26'),
(19, 5, 'Rumah Gadang Nuansa Alam', 0x313636303139373835332d6e75616e73615f616c616d2e6a7067, '6', '60', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 6000000, 'rumah-gadang-nuansa-alam', '1', '1', '2022-08-10 23:04:13', '2022-08-25 23:35:42'),
(20, 5, 'Balairung', 0x313636303139373935332d72756d61685f62616c616972756e672e6a7067, '3', '20 s/d 30', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 3000000, 'balairung', '1', '1', '2022-08-10 23:05:53', '2022-08-25 23:35:07'),
(21, 5, 'Rumah Merapi', 0x313636303139383035312d72756d61685f6d65726170692e6a7067, '2', '10 s/d 20', '<ul><li><strong>2 Single Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 1350000, 'rumah-merapi', '1', '1', '2022-08-10 23:07:31', '2022-08-25 23:34:18'),
(22, 5, 'Rumah Nusantara', 0x313636303139383135342d72756d61685f6e7573616e746172612e6a7067, '4', '40 s/d 50', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 4000000, 'rumah-nusantara', '1', '1', '2022-08-10 23:09:14', '2022-08-25 23:32:57'),
(23, 5, 'Rumah Bulat', 0x313636303139383233352d72756d61685f62756c61742e6a7067, '2', '20', '<ul><li><strong>2 Single Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 1500000, 'rumah-bulat', '0', '1', '2022-08-10 23:10:35', '2022-08-25 23:33:23'),
(24, 5, 'Olivera House', 0x313636303139383336382d6f6c69766572615f686f7573652e6a7067, '2', '15 s/d 20', '<ul><li><strong>2 Single Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 2750000, 'olivera-house', '0', '1', '2022-08-10 23:12:48', '2022-08-25 23:31:00'),
(25, 5, 'Rumah Apung', 0x313636303139383433342d72756d61685f6170756e672e6a7067, '2', '20 s/d 25', '<ul><li><strong>King Bed/Kamar</strong></li><li><strong>Alat masak</strong></li><li><strong>Dispenser</strong></li><li><strong>Extra Bed</strong></li></ul>', 4000000, 'rumah-apung', '1', '1', '2022-08-10 23:13:54', '2022-08-25 23:30:23'),
(26, 2, 'Cottage-Superior', 0x313636303139383738352d7375706572696f722e6a7067, '1', '4', '<ul><li><strong>Hot &amp; Cold Water</strong></li><li><strong>Dispenser</strong></li></ul>', 750000, 'cottage-superior', '30', '1', '2022-08-10 23:19:45', '2022-08-25 23:24:25'),
(27, 5, 'Cottage-Deluxe', 0x313636313334393435312d64656c757865332e6a7067, '1', '4', '<ul><li><strong>Hot &amp; Cold Water</strong></li><li><strong>Dispenser</strong></li></ul>', 850000, 'cottage-deluxe', '17', '1', '2022-08-24 13:57:31', '2022-08-25 23:21:39'),
(28, 5, 'Cottage-Excecutive Deluxe', 0x313636313334393537392d657863656375746963655f64656c757865652e6a7067, '1', '4', '<ul><li><strong>Hot &amp; Cold Water</strong></li><li><strong>Dispenser</strong></li></ul>', 1050000, 'cottage-excecutive-deluxe', '2', '1', '2022-08-24 13:59:39', '2022-08-25 23:21:06'),
(29, 5, 'Rumah Pohon', 0x313636313334393636342d72756d6168706f686f6e2e6a7067, '1', '4', '<ul><li><strong>Hot &amp; Cold Water</strong></li><li><strong>Dispenser</strong></li></ul>', 1250000, 'rumah-pohon', '1', '1', '2022-08-24 14:01:05', '2022-08-25 23:20:27'),
(30, 5, 'Cottage-Olivera', 0x313636313335313232332d6f6c6976657261636f74746167652e6a7067, '1', '4', '<ul><li><strong>Hot &amp; Cold Water</strong></li><li><strong>Dispenser</strong></li></ul>', 850000, 'cottage-olivera', '3', '1', '2022-08-24 14:27:03', '2022-08-25 23:19:50'),
(31, 5, 'Cottage-Rioviera', 0x313636313335313238312d72696f76657261636f74746167652e6a7067, '1', '4', '<ul><li><strong>Hot &amp; Cold Water</strong></li><li><strong>Dispenser</strong></li></ul>', 750000, 'cottage-rioviera', '3', '1', '2022-08-24 14:28:01', '2022-08-28 12:27:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_user` int(20) UNSIGNED NOT NULL,
  `id_tiket` int(20) UNSIGNED NOT NULL,
  `harga_tiket` int(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_tiket`, `harga_tiket`, `tanggal`, `nama`, `alamat`, `jumlah`, `email`, `telp`, `total`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(123, 29, 10, 90000, '2022-08-27', 'Tommy Alexy', 'Batusangkar', '5', 'tommyalexy2@gmail.com', '083801963697', '450000', 'tommy-alexy', '3', '2022-07-29 06:29:36', '2022-08-26 08:00:07'),
(125, 30, 5, 50000, '2022-08-27', 'Iqbal Ramadhan', 'Bandung', '4', 'iqbalramadhan@gmail.com', '082390908765', '200000', 'iqbal-ramadhan', '3', '2022-08-26 08:21:48', '2022-08-28 23:54:50'),
(126, 23, 5, 50000, '2022-08-30', 'Ani', 'Padang', '2', 'ani@gmail.com', '082390908967', '100000', 'ani', '3', '2022-08-28 22:32:42', '2022-08-28 22:33:58'),
(127, 30, 10, 90000, '2022-09-01', 'Iqbal Ramadhan', 'Bandung', '2', 'iqbalramadhan@gmail.com', '087867654323', '180000', 'iqbal-ramadhan', '1', '2022-08-28 23:46:41', '2022-08-28 23:46:41'),
(128, 38, 5, 50000, '2022-09-02', 'Aura Syifa Listi', 'Padang Panjang', '2', 'aurasyifalisti2@gmail.com', '089512345677', '100000', 'aura-syifa-listi', '3', '2022-08-31 22:33:45', '2022-08-31 22:34:58'),
(129, 40, 10, 90000, '2022-09-02', 'Putri Ramadhan', 'Padang Panjang', '2', 'putriramadhan@gmail.com', '082390908765', '180000', 'putri-ramadhan', '3', '2022-09-01 04:07:58', '2022-09-01 04:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penginapan`
--

CREATE TABLE `transaksi_penginapan` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_tipe` int(20) UNSIGNED NOT NULL,
  `harga_penginapan` int(20) UNSIGNED NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `jumlah_hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_unit` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_penginapan`
--

INSERT INTO `transaksi_penginapan` (`id`, `id_user`, `id_tipe`, `harga_penginapan`, `checkin`, `checkout`, `jumlah_hari`, `jumlah_unit`, `nama`, `alamat`, `email`, `telp`, `total`, `catatan`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(40, 29, 24, 2750000, '2022-08-27', '2022-08-28', '1', 1, 'Tommy Alexy', 'Batusangkar', 'tommyalexy2@gmail.com', '082356543434', '2750000', 'tidak ada', 'tommy-alexy', '3', '2022-08-26 07:23:59', '2022-08-26 08:02:29'),
(41, 30, 30, 850000, '2022-09-27', '2022-09-28', '1', 1, 'Iqbal Ramadhan', 'Bandung', 'iqbalramadhan@gmail.com', '082390908765', '850000', 'yang dekat dengan kolam', 'iqbal-ramadhan', '3', '2022-07-31 08:18:49', '2022-07-31 08:41:06'),
(42, 14, 26, 750000, '2022-08-26', '2022-08-27', '1', 1, 'Customer', 'Padang', 'customer@gmail.com', '087867654323', '750000', 'tidak ada', 'customer', '1', '2022-08-28 21:38:13', '2022-08-28 21:38:13'),
(43, 30, 26, 750000, '2022-08-30', '2022-08-31', '1', 1, 'Iqbal Ramadhan', 'Bandung', 'iqbalramadhan@gmail.com', '087867654323', '750000', 'tidak ada', 'iqbal-ramadhan', '1', '2022-08-28 23:43:17', '2022-08-28 23:43:17'),
(44, 23, 31, 750000, '2022-08-30', '2022-08-31', '1', 1, 'Ani', 'Padang', 'ani@gmail.com', '083801963697', '750000', 'tidak ada', 'ani', '1', '2022-08-29 02:55:01', '2022-08-29 02:55:01'),
(45, 26, 26, 750000, '2022-09-02', '2022-09-03', '1', 1, 'Gaga Muhammad', 'Jakarta', 'gaga@gmail.com', '082345676543', '750000', 'tidakada', 'gaga-muhammad', '3', '2022-08-31 20:28:41', '2022-08-31 20:33:50'),
(46, 24, 23, 1500000, '2022-09-05', '2022-09-06', '1', 2, 'Icha', 'Padang Panjang', 'icha@gmail.com', '082356543434', '1500000', 'tidak ada', 'icha', '2', '2022-08-31 20:39:27', '2022-08-31 22:46:44'),
(48, 38, 27, 850000, '2022-09-02', '2022-09-03', '1', 1, 'Aura Syifa Listi', 'Aceh', 'aurasyifalisti2@gmail.com', '089512345677', '850000', 'posisi tengah', 'aura-syifa-listi', '3', '2022-08-31 22:12:51', '2022-08-31 22:15:08'),
(49, 40, 29, 1250000, '2022-09-02', '2022-09-03', '1', 1, 'Putri Ramadhan', 'Padang Panjang', 'putriramadhan@gmail.com', '08239090879', '1250000', 'tidak ada', 'putri-ramadhan', '3', '2022-09-01 04:14:30', '2022-09-01 04:15:34');

--
-- Trigger `transaksi_penginapan`
--
DELIMITER $$
CREATE TRIGGER `penjualan_unit` AFTER INSERT ON `transaksi_penginapan` FOR EACH ROW BEGIN
UPDATE tipe_penginapan SET jumlah_unit=jumlah_unit-NEW.jumlah_unit
WHERE id = NEW.id_tipe;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'min', 'min@gmail.com', '2022-06-14 07:48:28', '$2y$10$YP3axyd82FsRP0zn0zw3g.4ZT2M9u6XU4iNzDlYrGB.3qHyAjeVMy', 'MfK8akmNzIBzeyuh1HE0KPA683unLtHh3mfJ2855oUUSTogU13ZwFJH627Od', '2022-06-14 02:21:32', '2022-06-14 21:34:25'),
(14, 'customer', 'customer@gmail.com', '2022-06-21 00:42:52', '$2y$10$y4ObkqH4PTBJ0yzAaie7vuUTGi1IWjQA.X.xB9L8780UE/A3DqZj6', NULL, '2022-06-15 21:11:40', '2022-06-21 00:42:53'),
(21, 'pengunjung', 'pengunjung@gmail.com', '2022-08-07 23:33:10', '$2y$10$0U5mIewfxxEtS8/aWGea.uDUY7cFDhwQc0msaOlifa2gC4Pu/Cs4C', NULL, '2022-08-07 23:30:20', '2022-08-07 23:33:10'),
(23, 'ani', 'ani@gmail.com', '2022-08-14 15:07:44', '$2y$10$Gj2.XrQMRM8XuDYtWPatq.4JKSGutJmQUQwahaa5bs8/X4P7jhjQe', NULL, '2022-08-14 10:08:29', '2022-08-14 15:07:44'),
(24, 'icha', 'icha@gmail.com', '2022-08-19 04:02:01', '$2y$10$IxM2HXVicDrGnVbLoMpLSuFVMFOyIKkEQEEnYhdJJn3tVDC2FwsI.', NULL, '2022-08-19 01:40:53', '2022-08-19 04:02:01'),
(25, 'Nelson Septiadi', 'nelson@gmail.com', '2022-08-20 15:37:51', '$2y$10$PPcfzNxB6q6wqAOCLEVQT.QRdy0.y//ltNkm2onZBizHfanBIPRWu', NULL, '2022-08-20 00:55:26', '2022-08-20 15:37:51'),
(26, 'gaga', 'gaga@gmail.com', '2022-08-24 03:13:21', '$2y$10$yECjLLA4Pa.hq9REtszJFuttyPw8Uf1.0B3xNad4l/R6v/eQNvPPW', NULL, '2022-08-24 03:11:23', '2022-08-24 03:13:21'),
(27, 'Farah', 'farah123@gmail.com', NULL, '$2y$10$RQwN4tYih9tO1.HNJROM2OIqHVDSsLVLr6cVUuhslDcB453J2vmUS', NULL, '2022-08-24 03:20:44', '2022-08-24 03:20:44'),
(28, 'Lia', 'lia@gmail.com', '2022-08-24 04:02:11', '$2y$10$kZuePDHuOkL.no/foY35cOERDGoPYsR244S5yb0jvmBWZWvkqAtky', NULL, '2022-08-24 03:56:07', '2022-08-24 04:02:11'),
(29, 'Tommy Alexy', 'tommyalexy2@gmail.com', '2022-08-26 06:26:51', '$2y$10$o66WQutJax9Kcus9hgFD7uthHrJYpXItXfykYilhPASGxHTMf6zoG', NULL, '2022-08-26 06:25:43', '2022-08-26 06:26:51'),
(30, 'Iqbal Ramadhan', 'iqbalramadhan@gmail.com', '2022-08-26 08:05:26', '$2y$10$iljL6gRGhmjxGpaB6c06MeK3pF311kmOJa1mknyrfcmxXZiRef7p6', NULL, '2022-08-26 08:03:52', '2022-08-26 08:05:26'),
(32, 'Youra', 'youra123@gmail.com', NULL, '$2y$10$TUTjdJOumTX9v/KWjLDkY.79FmDmCk2xtAVV7zQAaRPnoBlNnrP3a', NULL, '2022-08-28 22:54:07', '2022-08-28 22:54:07'),
(33, 'Tri Veramita', 'trvrmta@gmail.com', '2022-08-31 21:18:59', '$2y$10$T7fMxC0CBPW5oUK8xrikve7rXVkTn7i.n3K8a1JlWyFVDHUO9JB.m', 'iCkY3MngKJ4ea5ep2cq01TWLYYi8GfZiPw2GGsH0hhJWm326ERNMbEDi8ZQ8', '2022-08-31 21:15:20', '2022-08-31 21:44:51'),
(34, 'Dasrial Efendi', 'dasrialefendi@gmail.com', '2022-08-31 21:52:25', '$2y$10$4qsTt0N2xe4/FSyLcJErzOmZxBCdpXjsvKU6jwndyuxlAsYmG74Kq', NULL, '2022-08-31 21:49:09', '2022-08-31 21:52:25'),
(35, 'AI Ingland Fernanda', 'fernanda13@gmail.com', '2022-08-31 21:58:01', '$2y$10$BHz5a58Kc/WZhPNgzSml5OADW7mwuiq0/0F6Bveu7NMjGplbg7lnC', NULL, '2022-08-31 21:56:04', '2022-08-31 21:58:01'),
(36, 'Deah Aida Putri', 'deahaida@gmail.com', '2022-08-31 22:04:49', '$2y$10$T5vQIDeUGgrChOMnYG.0yO7q0lRAtXqtiQ6K5ak8RYcJL2Dpm.mRG', NULL, '2022-08-31 22:01:01', '2022-08-31 22:04:49'),
(37, 'Andri Ferianza', 'andrvrnza@gmail.co.id', NULL, '$2y$10$Dr8tq2Xh.SjyjP1LiQSgCOICeqdmlfU0Vn4pBUN7/5Q1Ex11xrmnW', NULL, '2022-08-31 22:02:40', '2022-08-31 22:02:40'),
(38, 'Aura Syifa Listi', 'aurasyifalisti2@gmail.com', '2022-08-31 22:10:31', '$2y$10$1odL0epNrvGYrtJrvB5dDuf9zAOEduGYBsqcg5FIzcU4nFB4IFECS', NULL, '2022-08-31 22:10:10', '2022-08-31 22:10:31'),
(40, 'Putri Ramadhan', 'putriramadhan@gmail.com', '2022-09-01 04:05:47', '$2y$10$DA7vfC6i4ufiDeIh.YswzeG1phrGqfC5a.p.r9nZybwHGUfUfPXie', NULL, '2022-09-01 04:04:53', '2022-09-01 04:05:47'),
(41, 'putri', 'putri@y.com', '2022-09-01 05:17:36', '$2y$10$Ila/uEhEeVE1dA1CDBgZwuESk/IQaCz6mzI5pZARfdKeNR358Hvzy', NULL, '2022-09-01 05:15:52', '2022-09-01 05:17:36'),
(42, 'aku', 'aku@gmail.com', '2022-09-12 00:06:19', '$2y$10$CMLVGmqV9mXgqApJ6RKfNO/XqlXQz/smrgLVlWA32SY4Ir1QfAbPu', NULL, '2022-09-11 23:57:39', '2022-09-12 00:06:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi_penginapan`
--
ALTER TABLE `konfirmasi_penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_penginapan`
--
ALTER TABLE `tipe_penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_penginapan`
--
ALTER TABLE `transaksi_penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_penginapan`
--
ALTER TABLE `konfirmasi_penginapan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tipe_penginapan`
--
ALTER TABLE `tipe_penginapan`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `transaksi_penginapan`
--
ALTER TABLE `transaksi_penginapan`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
