-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 10:56 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_12_120450_create_students_table', 1),
(4, '2018_04_12_120530_create_teachers_table', 1),
(5, '2018_04_12_120546_create_subjects_table', 1),
(6, '2018_04_12_131441_create_questions_table', 1),
(7, '2018_04_12_131455_create_tests_table', 1),
(8, '2018_04_12_131507_create_results_table', 1),
(9, '2018_07_28_124402_create_answers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `b` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `c` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `subject`, `bobot`, `question`, `a`, `b`, `c`, `d`, `correct_answer`, `created_at`, `updated_at`) VALUES
(63, 53, 'Matematika', 1, '<p>Pada kompetisi sepak bola tim yang menang mendapat nilai 3, seri mendapat nilai 1 dan kalah tidak mendapat nilai. Jika tim A bermain 32 kali dengan rincian 25 kali menang dan 2 kali kalah, maka nilai dari tim A adalah&hellip;.</p>', '<p>75</p>', '<p>80</p>', '<p>90</p>', '<p>92</p>', 'b', '2018-08-04 13:26:13', '2018-08-04 13:26:13'),
(64, 53, 'Matematika', 1, '<p>Persediaan&nbsp; makanan sebuah asrama cukup untuk 200 anak selama 6 hari. Jika ditambah 40 anak lagi persediaan makanan tersebut cukup selama&hellip;.</p>', '<p>3 hari</p>', '<p>4 hari</p>', '<p>5 hari</p>', '<p>6 hari</p>', 'c', '2018-08-04 13:31:40', '2018-08-04 13:31:40'),
(65, 53, 'Matematika', 1, '<p>Anisa menabung sebesar Rp200.000,00 di sebuah bank. Jika bunga bank 30% pertahun, maka jumlah tabungan Anisa setelah 8 bulan besarta bunganya adalah ....</p>', '<p>Rp230.000,00</p>', '<p>Rp240.000,00</p>', '<p>Rp260.000,00</p>', '<p>Rp350.000,00</p>', 'b', '2018-08-04 13:32:59', '2018-08-04 13:32:59'),
(66, 53, 'Matematika', 1, '<p>Seorang pedagang membeli 2 lusin mainan seharga Rp640.000,00.Karena ada 8 mainan yang rusak, maka sisa mainan ia jual dengan harga Rp34.000,00 tiap satuan. Persentase kerugian pedagang tersebut adalah ..</p>', '<p>18 %</p>', '<p>15 %</p>', '<p>1,8 %</p>', '<p>1,5 %</p>', 'b', '2018-08-04 13:33:55', '2018-08-04 13:33:55'),
(67, 53, 'Matematika', 1, '<p>Ahmad menabung pada bulan pertama Rp. 10.000,- pada bulan kedua Rp. 12.000,- dan pada bulan ketiga Rp. 14.000,-. Begitu seterusnya. Pada bulan kelima belas ahmad menabung sebesar ....</p>', '<p>Rp. 36.000,-</p>', '<p>Rp. 38.000,-</p>', '<p>Rp. 40.000,-</p>', '<p>Rp. 42.000,-</p>', 'b', '2018-08-04 13:35:01', '2018-08-04 13:35:01'),
(68, 53, 'Matematika', 1, '<p>Suatu deret geometri diketahui suku ke-2 = 6 dan suku&nbsp;&nbsp;&nbsp;&nbsp; ke-4 = 54. Jumlah deret lima suku pertamanya adalah....</p>', '<p>80</p>', '<p>81</p>', '<p>242</p>', '<p>243</p>', 'a', '2018-08-04 13:35:45', '2018-08-04 13:35:45'),
(69, 53, 'Matematika', 1, '<p>hasil dari&nbsp;<img alt=\"\" height=\"57\" src=\"http://localhost/cbt/public/photos/53/silvia/1.JPG\" width=\"134\" />&nbsp;adalah ....&nbsp;</p>', '<p><img alt=\"\" height=\"57\" src=\"http://localhost/cbt/public/photos/53/a.JPG\" width=\"131\" /></p>', '<p><img alt=\"\" height=\"70\" src=\"http://localhost/cbt/public/photos/53/b.JPG\" width=\"139\" /></p>', '<p><img alt=\"\" height=\"68\" src=\"http://localhost/cbt/public/photos/53/c.JPG\" width=\"138\" /></p>', '<p><img alt=\"\" height=\"64\" src=\"http://localhost/cbt/public/photos/53/d.JPG\" width=\"153\" /></p>', 'a', '2018-08-04 13:43:47', '2018-08-04 13:43:47'),
(70, 53, 'Matematika', 1, '<p><img alt=\"\" height=\"60\" src=\"http://localhost/cbt/public/photos/53/image.png\" width=\"405\" /></p>', '<p><img alt=\"\" height=\"33\" src=\"http://localhost/cbt/public/photos/53/a1.JPG\" width=\"76\" /></p>', '<p><img alt=\"\" height=\"33\" src=\"http://localhost/cbt/public/photos/53/b1.JPG\" width=\"75\" /></p>', '<p><img alt=\"\" height=\"29\" src=\"http://localhost/cbt/public/photos/53/c1.JPG\" width=\"76\" /></p>', '<p><img alt=\"\" height=\"35\" src=\"http://localhost/cbt/public/photos/53/d1.JPG\" width=\"71\" /></p>', 'a', '2018-08-04 13:48:32', '2018-08-04 13:48:32'),
(71, 53, 'Matematika', 1, '<p>Tabel di bawah ini menunjukkan data berat badan dari sekelompok siswa &hellip;&hellip;.</p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" style=\"width:120.45pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-color:black; vertical-align:top; width:59.65pt\">\r\n			<p>Berat Badan (Kg)</p>\r\n			</td>\r\n			<td style=\"border-color:black; vertical-align:top; width:60.8pt\">\r\n			<p>Frekwensi</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:black; vertical-align:top; width:59.65pt\">\r\n			<p>35</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:60.8pt\">\r\n			<p>5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:black; vertical-align:top; width:59.65pt\">\r\n			<p>37</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:60.8pt\">\r\n			<p>3</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:black; vertical-align:top; width:59.65pt\">\r\n			<p>39</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:60.8pt\">\r\n			<p>5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:black; vertical-align:top; width:59.65pt\">\r\n			<p>41</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:60.8pt\">\r\n			<p>4</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:black; vertical-align:top; width:59.65pt\">\r\n			<p>43</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:60.8pt\">\r\n			<p>3</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Banyak siswa yang mempunyai berat badan <em>kurang dari</em> berat rata-rata adalah &hellip;&hellip;&hellip;.</p>', '<p>5 orang</p>', '<p>7 orang</p>', '<p>8 orang</p>', '<p>13 orang</p>', 'c', '2018-08-04 13:49:48', '2018-08-04 13:49:48'),
(72, 53, 'Matematika', 1, '<p><img alt=\"\" height=\"155\" src=\"http://localhost/cbt/public/photos/53/lingkaran.JPG\" width=\"158\" /></p>\r\n\r\n<p>Dari 250 juta penduduk Indonesia diagram kegiatan dapat dilihat pada diagram di atas. Banyak penduduk Indonesia yang masih sekolah adalah &hellip;</p>', '<p>25 juta</p>', '<p>37,5 juta</p>', '<p>50 juta</p>', '<p>137,5 juta</p>', 'c', '2018-08-04 13:51:57', '2018-08-04 13:51:57'),
(73, 53, 'Matematika', 1, '<p>Banyak bidang diagonal &nbsp;pada balok adalah&hellip;.</p>', '<p>4 buah</p>', '<p>6 buah</p>', '<p>8 buah</p>', '<p>12 buah</p>', 'b', '2018-08-04 13:53:19', '2018-08-04 13:53:19'),
(74, 53, 'Matematika', 1, '<p>Perhatikan gambar di bawah !</p>\r\n\r\n<p><img alt=\"\" height=\"129\" src=\"http://localhost/cbt/public/photos/53/segitiga.JPG\" width=\"136\" /></p>\r\n\r\n<p>Dari gambar di atas nilai dari a + b = &hellip; .</p>', '<p><img alt=\"\" height=\"40\" src=\"http://localhost/cbt/public/photos/53/a2.JPG\" width=\"42\" /></p>', '<p><img alt=\"\" height=\"42\" src=\"http://localhost/cbt/public/photos/53/b2.JPG\" width=\"45\" /></p>', '<p><img alt=\"\" height=\"39\" src=\"http://localhost/cbt/public/photos/53/c2.JPG\" width=\"46\" /></p>', '<p><img alt=\"\" height=\"42\" src=\"http://localhost/cbt/public/photos/53/d2.JPG\" width=\"44\" /></p>', 'd', '2018-08-04 13:56:51', '2018-08-04 13:56:51'),
(75, 53, 'Matematika', 1, '<p>Pernyataan yang benar tentang segitiga sama kaki adalah&hellip;.</p>', '<p>Dua sisinya sama panjang</p>', '<p>Tiga sisinya sama panjang</p>', '<p>Tiga sudutnya sama besar</p>', '<p>Salah satu sudutnya 90˚</p>', 'a', '2018-08-04 13:57:55', '2018-08-04 13:57:55'),
(76, 53, 'Matematika', 1, '<p>Diketahui sistem persamaan <img alt=\"\" height=\"21\" src=\"file:///C:/Users/Evan/AppData/Local/Temp/msohtmlclip1/01/clip_image002.gif\" width=\"76\" />&nbsp;3x + 3y = 3&nbsp; dan 2x - 4y = 14 .&nbsp;Nilai dari 4x - 3y = ...</p>', '<p>-10</p>', '<p>-12</p>', '<p>16</p>', '<p>18</p>', 'a', '2018-08-04 14:00:20', '2018-08-04 14:00:20'),
(77, 53, 'Matematika', 1, '<p>Pada suatu sekolah diketahui 194 siswa berusia kurang dari 15 tahun, 128 siswa berusia lebih dari 12 tahun sedangkan 85 siswa berusia diantara 12 tahun dan 15 tahun. Banyak siswa di sekolah itu adalah&hellip;.siswa</p>', '<p>185 siswa</p>', '<p>200 siswa</p>', '<p>237&nbsp;siswa</p>', '<p>395 siswa</p>', 'c', '2018-08-04 14:02:11', '2018-08-04 14:02:11'),
(78, 53, 'Matematika', 1, '<p>Perhatikan gambar!<img alt=\"\" height=\"202\" src=\"http://localhost/cbt/public/photos/53/123.JPG\" style=\"float:right\" width=\"190\" /></p>\r\n\r\n<p>Relasi <em>f</em> dari A ke B pada diagram panah di samping dapat dinyatakan dengan <em>f</em>(<em>x</em>) = ....</p>', '<p><em>x </em>&ndash; 3</p>', '<p>3 &ndash; 2<em>x</em></p>', '<p>3 &ndash; <em>x</em></p>', '<p>2<em>x</em> &ndash; 3</p>', 'b', '2018-08-04 14:05:17', '2018-08-04 14:05:17'),
(79, 53, 'Matematika', 1, '<p>Diketahui sebuah limas dan kubus dimana luas alas limas sama dengan alas kubus. Tinggi limas 1/3 tinggi kubus. Maka perbandingan volume limas dan kubus adalah &hellip;</p>', '<p>1 : 3</p>', '<p>1 : 6</p>', '<p>3 : 1</p>', '<p>1 : 9</p>', 'd', '2018-08-04 14:06:32', '2018-08-04 14:06:32'),
(80, 53, 'Matematika', 1, '<p>Jika pada jaring-jaring kubus di bawah ini daerah yang diarsir adalah alas kubus, maka tutup kubus adalah nomor ....</p>\r\n\r\n<p><img alt=\"\" height=\"175\" src=\"http://localhost/cbt/public/photos/53/3151.JPG\" width=\"174\" /></p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'c', '2018-08-04 14:08:16', '2018-08-04 14:08:16'),
(81, 53, 'Matematika', 1, '<p><img alt=\"\" height=\"140\" src=\"http://localhost/cbt/public/photos/53/kotak2.JPG\" width=\"238\" /></p>\r\n\r\n<p>Segitiga KMN kongruen dengan segitiga PQR. Berikut ini yang benar adalah ... .</p>', '<p>​​<img alt=\"\" height=\"26\" src=\"http://localhost/cbt/public/photos/53/a3.JPG\" width=\"99\" /></p>', '<p>QR = MN</p>', '<p>KM = 20 cm</p>', '<p>PR = 16 cm</p>', 'd', '2018-08-04 14:11:26', '2018-08-04 14:11:26'),
(82, 53, 'Matematika', 1, '<p><img alt=\"\" height=\"145\" src=\"http://localhost/cbt/public/photos/53/roda2.JPG\" width=\"312\" /></p>\r\n\r\n<p>Diketahui A dan B merupakan titik singgung. AP = 15 cm, BQ = 8 cm dan AB = 24 cm. Panjang PQ adalah ..</p>', '<p>25 cm</p>', '<p>26&nbsp;cm</p>', '<p>27&nbsp;cm</p>', '<p>28&nbsp;cm</p>', 'a', '2018-08-04 14:12:45', '2018-08-04 14:12:45'),
(85, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Berdasarkan perlakuan zat cair dibawah, sifat yang dimiliki oleh zat cair adalah&hellip;<img alt=\"\" height=\"147\" src=\"http://localhost/cbt/public/photos/59/Try out 1/1.JPG\" width=\"245\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>Massa berubah, volume tetap</p>', '<p>Massa tetap, volume berubah</p>', '<p>Massa tetap, volume tetap</p>', '<p>Massa berubah, volume berubah</p>', 'c', '2018-08-04 17:22:43', '2018-08-04 17:27:10'),
(86, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Sebuah bimetal terbuat dari lempengan tembaga dan besi yang disatukan kemudian dipanaskan. Jika koefisien muai panjang tembaga 17.10-6 oC-1 dan koefisien muai panjang besi 12. 10-6 oC-1, maka bentuk bimetal yang terjadi adalah....</p>', '<p><img alt=\"\" height=\"132\" src=\"http://localhost/cbt/public/photos/59/Try out 1/a.JPG\" width=\"204\" /></p>', '<p><img alt=\"\" height=\"133\" src=\"http://localhost/cbt/public/photos/59/Try out 1/b.JPG\" width=\"221\" /></p>', '<p><img alt=\"\" height=\"128\" src=\"http://localhost/cbt/public/photos/59/Try out 1/c.JPG\" width=\"200\" /></p>', '<p><img alt=\"\" height=\"124\" src=\"http://localhost/cbt/public/photos/59/Try out 1/d.JPG\" width=\"222\" /></p>', 'd', '2018-08-04 17:26:14', '2018-08-04 17:26:14'),
(87, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Perhatikan grafik pemanasan dibawah!</p>\r\n\r\n<p><img alt=\"\" height=\"126\" src=\"http://localhost/cbt/public/photos/59/Try out 1/2.JPG\" width=\"184\" /></p>\r\n\r\n<p>Jika massa es = 2 kg. kalor jenis es 2100 J/kg 0C, , dan kalor lebur es 336.000 J/kg kalor jenis air 4200 J/kg 0C maka besarnya kalor yang diperlukan&nbsp; pada saat proses dari B ke C adalah &hellip;.</p>', '<p>672.000 Joule</p>', '<p>693.000 Joule</p>', '<p>1.092.000 Joule</p>', '<p>1.113.000 Joule</p>', 'a', '2018-08-04 17:29:52', '2018-08-04 17:29:52'),
(88, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Perhatikan Gambar berikut</p>\r\n\r\n<p><img alt=\"\" height=\"95\" src=\"http://localhost/cbt/public/photos/59/Try out 1/3.JPG\" width=\"465\" /></p>\r\n\r\n<p>Besar usaha yang dilakukan oleh F1 dan F2 adalah...</p>', '<p>5 Joule</p>', '<p>6,25 Joule</p>', '<p>500 Joule</p>', '<p>625 Joule</p>', 'a', '2018-08-04 17:32:18', '2018-08-04 17:32:18'),
(89, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Ayah Andi akan menaikkan beberapa peti yang berisi kubis ke dalam mobil. Prinsip pesawat sederhana yang dapat digunakan untuk mempermudah pekerjaan Ayah Andi adalah&hellip;</p>', '<p>Tuas</p>', '<p>Bidang miring</p>', '<p>Pengungkit</p>', '<p>Katrol</p>', 'b', '2018-08-04 17:33:38', '2018-08-04 17:33:38'),
(90, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Rahman memiliki peti kayu berbentuk balok dengan ukuran 0,5m x 1m x 2m dan memiliki massa 5 kg. Tekanan paling besar yang dapat dilakukan peti kayu jika g=10m/s2&nbsp;adalah&hellip;</p>', '<p>12,5 N/m</p>', '<p>25 N/m</p>', '<p>50 N/m</p>', '<p>100 N/m</p>', 'd', '2018-08-04 17:34:48', '2018-08-04 17:34:48'),
(91, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Perhatikan gambar!</p>\r\n\r\n<p><img alt=\"\" height=\"147\" src=\"http://localhost/cbt/public/photos/59/Try out 1/4.JPG\" width=\"210\" /></p>\r\n\r\n<p>Satu getaran yang benar adalah gerakan dari....</p>', '<p>A &ndash; B &ndash; A &ndash; C &ndash; A</p>', '<p>C &ndash; A &ndash; B &ndash; C &ndash; A</p>', '<p>B &ndash; A &ndash; B &ndash; A &ndash; C</p>', '<p>A &ndash; B &ndash; C &ndash; B &ndash; A</p>', 'd', '2018-08-04 17:36:31', '2018-08-04 17:36:31'),
(92, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Bunyi di dalam ruangan akan terasa lebih keras bila dibandingkan bunyi di lapangan terbuka. Hal ini disebabkan adanya...</p>', '<p>Penguatan bunyi oleh dinding</p>', '<p>Gaung</p>', '<p>Gema</p>', '<p>Penyerapan bunyi oleh dinding</p>', 'a', '2018-08-04 17:37:19', '2018-08-04 17:37:19'),
(93, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Lukisan pembentukan bayangan sebuah benda di depan cermin cekung yang benar ditunjukkan gambar....</p>', '<p><img alt=\"\" height=\"117\" src=\"http://localhost/cbt/public/photos/59/Try out 1/a1.JPG\" width=\"307\" /></p>', '<p><img alt=\"\" height=\"127\" src=\"http://localhost/cbt/public/photos/59/Try out 1/b1.JPG\" width=\"314\" /></p>', '<p><img alt=\"\" height=\"125\" src=\"http://localhost/cbt/public/photos/59/Try out 1/c1.JPG\" width=\"316\" /></p>', '<p><img alt=\"\" height=\"122\" src=\"http://localhost/cbt/public/photos/59/Try out 1/d1.JPG\" width=\"320\" /></p>', 'b', '2018-08-04 17:40:23', '2018-08-04 17:40:23'),
(94, 59, 'Ilmu Pengetahuan Alam', 1, '<h2 style=\"font-style:italic;\"><tt>Hasil dari fermentasi air kelapa dengan bantuan mikroba Acetobacter Xylinum adalah &hellip;.</tt></h2>', '<h2 style=\"font-style:italic;\">Keju</h2>', '<h2 style=\"font-style:italic;\">Tempe</h2>', '<h2 style=\"font-style:italic;\">Nata de coco</h2>', '<h2 style=\"font-style:italic;\">Yoghurt</h2>', 'c', '2018-08-04 17:42:00', '2018-08-04 17:42:00'),
(95, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Itik memiliki paruh seperti sekop. Hal ini merupakan adaptasi untuk&hellip;.</p>', '<p>mendapatkan makanan yang cocok</p>', '<p>menyesuaikan mengambil makanan dalam lumpur</p>', '<p>mempertahankan diri dari musuh</p>', '<p>mengambil air dan menyesuaikan dengan lingkungannya</p>', 'b', '2018-08-04 17:42:50', '2018-08-04 17:42:50'),
(96, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Salah satu sifat pertumbuhan adalah kuantitatif, artinya&hellip;.</p>', '<p>dapat diukur</p>', '<p>selalu bertambah panjang</p>', '<p>tidak dapat mengecil lagi</p>', '<p>tidak terbatas</p>', 'a', '2018-08-04 17:43:27', '2018-08-04 17:43:27'),
(97, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Gerak ujung akar kecambah menuju pusat gaya grafitasi bumi disebut &hellip;.</p>', '<p>geotropi</p>', '<p>heliotropi</p>', '<p>kemotropi</p>', '<p>Tigmotropi</p>', 'a', '2018-08-04 17:44:32', '2018-08-04 17:44:32'),
(98, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Hal-hal berikut ini berhubungan dengan gerak<br />\r\n1. rangsang<br />\r\n2. urat saraf motorik<br />\r\n3. otak<br />\r\n4. urat saraf sensorik<br />\r\n5. neuron perantara<br />\r\n6. gerakan<br />\r\nUrutan gerak sadar yang benar adalah ....</p>', '<p>1-2-5-4-6</p>', '<p>1-4-3-2-6</p>', '<p>1-4-5-2-6</p>', '<p>1-5-4-2-6</p>', 'b', '2018-08-04 17:45:20', '2018-08-04 17:45:20'),
(99, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Perhatikan gambar di bawah ini !</p>\r\n\r\n<p><img alt=\"\" height=\"180\" src=\"http://localhost/cbt/public/photos/59/Try out 1/5.JPG\" width=\"190\" /></p>\r\n\r\n<p>Yang berfungsi sebagai filtrasi, absorpsi dan augmentasi adalah. ....</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'a', '2018-08-04 17:46:50', '2018-08-04 17:46:50'),
(100, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Perhatikan otot pada lengan berikut :</p>\r\n\r\n<p><img alt=\"\" height=\"182\" src=\"http://localhost/cbt/public/photos/59/Try out 1/6.JPG\" width=\"324\" /></p>\r\n\r\n<p>Kerja kedua otot tersebut adalah&nbsp; ....</p>', '<p>Sinergis</p>', '<p>Antagonis</p>', '<p>Kontraksi</p>', '<p>Relaksasi</p>', 'b', '2018-08-04 17:48:28', '2018-08-04 17:48:28'),
(101, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Pada pernafasan perut jika otot diafragma berkontraksi, maka .....</p>', '<p>diafragma melengkung, rongga dada membesar</p>', '<p>diafragma mendatar, rongga dada mengecil</p>', '<p>diafragma melengkung, rongga dada mengecil</p>', '<p>diafragma mendatar, rongga dada membesar</p>', 'd', '2018-08-04 17:49:09', '2018-08-04 17:49:09'),
(102, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Perhatikan tabel dibawah ini;</p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" style=\"width:413.0pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:28.05pt\">\r\n			<p>No</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:63.7pt\">\r\n			<p>Organ</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:109.05pt\">\r\n			<p>Enzim yang Dihasilkan</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:212.2pt\">\r\n			<p>Fungsi Enzim</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:28.05pt\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>2</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>3</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>4</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:63.7pt\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Usus Halus</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Lambung</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Usus 12 jari</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Mulut</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:109.05pt\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Amilase</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Pepsin</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Lipase</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Ptialin</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:212.2pt\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Mengubah karbohidrat menjadi amilum</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Mengubah protein menjadi peptone</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>Mengubah lemak menjadi asam lemak &amp; gliserol</p>\r\n\r\n			<p><br />\r\n			Mengubah karbohidrat menjadi asam amino</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Pasangan manakah yang tepat dari data tersebut?</p>', '<p>1 dan 3</p>', '<p>2 dan 3</p>', '<p>3 dan 4</p>', '<p>4 dan 1</p>', 'b', '2018-08-04 17:51:05', '2018-08-04 17:51:05'),
(103, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Pada peredaran darah kecil, vena pulmonalis membawa darah yang banyak mengandung&hellip;..</p>', '<p>CO2</p>', '<p>O2</p>', '<p>HbO2</p>', '<p>HbCO2</p>', 'b', '2018-08-04 17:51:45', '2018-08-04 17:51:45'),
(104, 59, 'Ilmu Pengetahuan Alam', 1, '<p>Perhatikan gambar kumparan berikut ini!</p>\r\n\r\n<p><img alt=\"\" height=\"191\" src=\"http://localhost/cbt/public/photos/59/Try out 1/7.JPG\" width=\"285\" /></p>\r\n\r\n<p>Pada peristiwa disamping, faktor yang tidak mempengaruhi besarnya penyimpangan pada galvanometer adalah&hellip;</p>', '<p>Orang yang melakukan percobaan</p>', '<p>Kekuatan magnet</p>', '<p>Banyaknya lilitan</p>', '<p>Kecepatan gerak magnet</p>', 'a', '2018-08-04 17:53:57', '2018-08-04 17:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `true` int(11) NOT NULL,
  `false` int(11) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `nis`, `class`, `created_at`, `updated_at`) VALUES
(2, 3, '4090', 'IX-A', '2018-07-12 02:10:29', '2018-07-12 02:10:29'),
(3, 4, '4098', 'IX-A', '2018-07-12 02:13:27', '2018-07-12 02:13:27'),
(4, 5, '4049', 'IX-A', '2018-07-12 02:14:36', '2018-07-12 02:14:36'),
(5, 6, '4858', 'IX-A', '2018-07-12 02:15:05', '2018-07-12 02:15:05'),
(6, 7, '4202', 'IX-A', '2018-07-12 02:15:37', '2018-07-12 02:15:37'),
(7, 8, '4241', 'IX-A', '2018-07-12 02:16:17', '2018-07-12 02:16:17'),
(8, 9, '4254', 'IX-A', '2018-07-12 02:17:55', '2018-07-12 02:17:55'),
(9, 10, '4435', 'IX-A', '2018-07-12 02:18:35', '2018-07-12 02:18:35'),
(10, 11, '4459', 'IX-A', '2018-07-12 02:19:19', '2018-07-12 02:19:19'),
(11, 12, '4603', 'IX-A', '2018-07-12 02:20:13', '2018-07-12 02:20:13'),
(12, 13, '4618', 'IX-A', '2018-07-12 02:21:13', '2018-07-12 02:21:13'),
(13, 14, '4653', 'IX-A', '2018-07-12 02:21:55', '2018-07-12 02:21:55'),
(14, 15, '4684', 'IX-A', '2018-07-12 02:22:23', '2018-07-12 02:22:23'),
(15, 16, '4810', 'IX-A', '2018-07-12 02:22:47', '2018-07-12 02:22:47'),
(16, 17, '4892', 'IX-A', '2018-07-12 02:23:05', '2018-07-12 02:23:05'),
(17, 18, '4671', 'IX-A', '2018-07-12 02:24:24', '2018-07-12 02:24:24'),
(18, 19, '4911', 'IX-A', '2018-07-12 02:24:48', '2018-07-12 02:24:48'),
(19, 20, '4145', 'IX-A', '2018-07-12 02:25:19', '2018-07-12 02:25:19'),
(20, 21, '4668', 'IX-A', '2018-07-12 02:25:56', '2018-07-12 02:25:56'),
(21, 22, '4863', 'IX-A', '2018-07-12 02:26:37', '2018-07-12 02:26:37'),
(22, 23, '4917', 'IX-A', '2018-07-12 02:27:55', '2018-07-12 02:27:55'),
(23, 24, '4167', 'IX-A', '2018-07-12 02:28:23', '2018-07-12 02:28:23'),
(24, 25, '4339', 'IX-A', '2018-07-12 02:28:54', '2018-07-12 02:28:54'),
(25, 26, '4585', 'IX-A', NULL, NULL),
(26, 27, '4110', 'IX-A', '2018-07-12 02:37:12', '2018-07-12 02:37:12'),
(27, 28, '4184', 'IX-A', '2018-07-12 02:37:51', '2018-07-12 02:37:51'),
(28, 29, '4307', 'IX-A', '2018-07-12 02:38:34', '2018-07-12 02:38:34'),
(29, 30, '4308', 'IX-A', '2018-07-12 02:47:18', '2018-07-12 02:47:18'),
(30, 31, '4432', 'IX-A', '2018-07-12 02:48:37', '2018-07-12 02:48:37'),
(31, 32, '4489', 'IX-A', '2018-07-12 02:49:07', '2018-07-12 02:49:07'),
(32, 33, '4495', 'IX-A', '2018-07-12 02:50:32', '2018-07-12 02:50:32'),
(33, 34, '4569', 'IX-A', '2018-07-12 02:51:01', '2018-07-12 02:51:01'),
(34, 35, '4583', 'IX-A', '2018-07-12 02:51:32', '2018-07-12 02:51:32'),
(35, 36, '4600', 'IX-A', '2018-07-12 02:52:24', '2018-07-12 02:52:24'),
(36, 37, '4789', 'IX-A', '2018-07-12 02:52:53', '2018-07-12 02:52:53'),
(37, 38, '4920', 'IX-A', '2018-07-12 02:53:39', '2018-07-12 02:53:39'),
(38, 39, '4111', 'IX-A', '2018-07-12 02:54:14', '2018-07-12 02:54:14'),
(39, 40, '4542', 'IX-A', '2018-07-12 02:54:38', '2018-07-12 02:54:38'),
(40, 41, '4797', 'IX-A', '2018-07-12 02:55:17', '2018-07-12 02:55:17'),
(41, 42, '4847', 'IX-A', '2018-07-12 02:55:42', '2018-07-12 02:55:42'),
(42, 43, '4609', 'IX-A', '2018-07-12 02:56:05', '2018-07-12 02:56:05'),
(43, 44, '4678', 'IX-A', '2018-07-12 02:56:25', '2018-07-12 02:56:25'),
(44, 45, '4692', 'IX-A', '2018-07-12 02:56:47', '2018-07-12 02:56:47'),
(45, 46, '4148', 'IX-A', '2018-07-12 02:57:19', '2018-07-12 02:57:19'),
(46, 47, '4208', 'IX-A', '2018-07-12 02:58:06', '2018-07-12 02:58:06'),
(47, 48, '4643', 'IX-A', '2018-07-12 02:58:38', '2018-07-12 02:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Indonesia', NULL, NULL),
(2, 'Bahasa Inggris', NULL, NULL),
(3, 'Matematika', NULL, NULL),
(4, 'Ilmu Pengetahuan Alam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `nip`, `subject`, `created_at`, `updated_at`) VALUES
(3, 51, '9473', 'Bahasa Inggris', '2018-07-16 15:39:06', '2018-08-04 12:19:10'),
(4, 52, '7271', 'Ilmu Pengetahuan Alam', '2018-07-16 15:40:03', '2018-08-04 12:19:15'),
(5, 53, '2005', 'Matematika', '2018-08-04 13:00:53', '2018-08-04 13:00:53'),
(6, 54, '2006', 'Bahasa Inggris', '2018-08-04 13:01:47', '2018-08-04 13:04:33'),
(7, 55, '7059', 'Bahasa Indonesia', '2018-08-04 13:03:09', '2018-08-04 13:03:09'),
(8, 56, '7060', 'Bahasa Indonesia', '2018-08-04 13:03:39', '2018-08-04 13:03:39'),
(9, 57, '9474', 'Matematika', '2018-08-04 13:04:27', '2018-08-04 13:04:27'),
(10, 58, '9912', 'Bahasa Inggris', '2018-08-04 13:05:03', '2018-08-04 13:05:03'),
(11, 59, '1123', 'Ilmu Pengetahuan Alam', '2018-08-04 13:05:21', '2018-08-04 13:05:21'),
(12, 60, '1125', 'Ilmu Pengetahuan Alam', '2018-08-04 13:05:49', '2018-08-04 13:05:49'),
(13, 61, '2004', 'Bahasa Inggris', '2018-08-04 13:14:56', '2018-08-04 13:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_test` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_questions` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `subject`, `subject_test`, `num_questions`, `time`, `type`, `start`, `start_time`, `end_time`, `token`, `created_at`, `updated_at`) VALUES
(11, 53, 'Matematika', 'Try Out Matematika 1', 20, 2, NULL, '05-August-2018', '2018-08-05 01:00:00', '2018-08-05 03:00:00', 'asd', '2018-08-05 07:38:05', '2018-08-05 07:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 3, '$2y$10$x96rpbh8daFNvx0SIU4QVu7anixjPVlb9UBDPHp4/gEXbbx11gNpi', 'mHzPNcuH500ez0VndpGs6LFqVIziozB6UgTNSxVRar9ErRz2iSBb5WcqX86V', NULL, '2018-08-05 09:22:39'),
(3, 'ACEP MULYA DIWARGANA', '50414090', 1, '$2y$10$l2MIbc86jC8TbOgjqx6LK.4H.nJ5IzKiqUlBFSNls0CWWBnP.Zb4G', 'dz1scbkenfO6fXLr4Am36ilnMrMo1dMklOIlcgp383YMVLrsoJpeWZWihKmV', '2018-07-12 02:10:29', '2018-08-05 09:21:54'),
(4, 'ACHMAD ARSYIL WIRADINATA', '50414098', 1, '$2y$10$FzCfF66d21tvCsZRsHtJ.eV9LmWuDVC2tbkslF2KumlWcCt5wm.VS', 'LtcraOv6TUZGaptJikF6l5HzBtpKvNCOBhhkmzWOsf0kO296VL2WhVSekP9Z', '2018-07-12 02:13:27', '2018-08-04 12:40:10'),
(5, 'ANDI MUHADIR AMIN', '51414049', 1, '$2y$10$dpKhPCTtoxhWcIkJgq6dAOphxDfMVnXjTSLA/./5JHIfSTm6ntDei', 'skC0b9bFbM62udkpGpJRpl4SZguKbiuImnoyJ47lGv6HTsaslWMnn6QBhi8Y', '2018-07-12 02:14:36', '2018-08-04 12:41:07'),
(6, 'AXEL ARYOWIBOWO', '51414858', 1, '$2y$10$BGLH9xWaexgq3uxvog9pLOwNQoGy6cQG1QWjIhxSYdd904x6tZTeO', 'U5d7Sa8j2sEvks4Ul6biFqITCTT5aFMsiKLmMT67Qe9xQZvR7ZxMtJNx0VVr', '2018-07-12 02:15:05', '2018-08-04 12:41:31'),
(7, 'BISMA DWIKI ANANDA TOMY', '52414202', 1, '$2y$10$uYk361oNYTm5TxZuRkEZtuc133Qcd2I2Rgjvdbh9A8LDlNwrbKy..', '1CHT9I0lbabv1EXedMPqJqJ4DkjM1XRvTAILZSaQopdHKiEKJZoegpAShNrC', '2018-07-12 02:15:37', '2018-08-04 12:41:47'),
(8, 'BUDIMAN ABDUL AZIZ', '52414241', 1, '$2y$10$vQSCc/37uZGFBViw8mlOz.vnOJXIZb6d3.MENFc2GhDbj1IXUV.Q6', 'GUZDkbYbYInDtEfDySPwiwOl6zph02GYCkuEgwF5cyWEZLSBdf3tzA6TfaGn', '2018-07-12 02:16:16', '2018-08-04 12:42:00'),
(9, 'BURANUDDIN ROBBANI MUSLIM', '52414254', 1, '$2y$10$FXtcW4OVbhvJoT/DPNLA5.llPqTWfUuOUQkU9WcFCkFtB86DqgV3.', 'wCULgJeihbFLGHY1sxpc0JqXHoiPJx6C73aQisIragL01CHLKl3lfq664x58', '2018-07-12 02:17:55', '2018-08-04 12:42:22'),
(10, 'EKA PUSPA SARI', '53414435', 1, '$2y$10$OahrNIzOXAHKJ4zimZkE1.IXjfpNn3Yj553WnClSJx0g.EvUU.Efe', 'BMcDmFATYaHEAbWSSIGHqlk6GLKRFpcoGTTt3cISkBOh0Nkpgoo9dVe5qruh', '2018-07-12 02:18:35', '2018-08-04 12:42:37'),
(11, 'EKO DEWANTORO', '53414459', 1, '$2y$10$.oOQA87SezaF4N7kXw3iguf.UYb8jBQ7R9l/YOLMxWBAlihYVESxO', 'k64tFLMQDGsiCz1hWwe24C8ZjuhlqAYy1B7GVYddCXOmU2nk5PWyfJp1rrGv', '2018-07-12 02:19:19', '2018-08-04 12:43:10'),
(12, 'ERICO STANLEY HUTAMA JEIR', '53414603', 1, '$2y$10$ZhdhDc9yZe7pFrC/wxlYAO9y8EljDUecWUM0L8nbEfqK3OU/cRMOG', '7b326QZliq08zk80Q4wOlHReL8oTAKsqxyUehcZxJEzgv1N6qEeOQKi1yxZJ', '2018-07-12 02:20:13', '2018-08-04 12:43:23'),
(13, 'ERLANDIKA RENALDI', '53414618', 1, '$2y$10$8NGZM4KSY5h7ZlYSQ/YVYOmMEoJoZXSrIhEinLGiiShpn5iNcl5A2', 'ikFgaT496pFgP5wWXVQGeLTU1mllaR7zp2iMuaN0rQPcv9bdVKFu0SeOdpfi', '2018-07-12 02:21:13', '2018-08-04 12:43:52'),
(14, 'ERWINDI', '53414653', 1, '$2y$10$IfPkJy1UJZX2b/SDm0I6QOm0MwAspt6aJ8g8y99ib7o.orMKJYwD2', 'eI58dpH1yZ50gyN9NBVwjCuB0Dwc5MvICUHCktS9lMLAZtOfNSSnzV8zclf5', '2018-07-12 02:21:55', '2018-08-04 12:44:09'),
(15, 'EVAN NADA VIRGIAWAN', '53414684', 1, '$2y$10$euJEnz/SQoiVRyBALuEM9OBHJnSOmpE/TrgC5qeMPwmEHUW/JuoVi', 'pOoKAE8XWIa4j8eWOt2mQO6hI0AoOdqQnsNAJvzCW6rfN0IWbwferFqLmwy0', '2018-07-12 02:22:23', '2018-08-04 12:38:16'),
(16, 'FAISAL AMIRUL FIRDAUS', '53414810', 1, '$2y$10$CFdTGddyukCc1DOY4b.UDe016K333oRiJSnADMl5vLGeeZpgzvFaO', 'IJh6dSZdv65U41xkk6gOPues5ColhUtHFICrUEwT6VKOT8pluW6cCEyEycp8', '2018-07-12 02:22:47', '2018-08-04 12:44:30'),
(17, 'FAJRI YUSUF', '53414892', 1, '$2y$10$qLUBP43lNLcUdVvi7SWJBeDYrnhAdKm4MruU5yz8PcoLLLyvpZ38G', 'zH52GnqGSPnoTRwdGlEd2PxCxZUG5iOkzAdxLsANdxNG1Amh6AV9U3Adsd9A', '2018-07-12 02:23:05', '2018-08-04 12:44:44'),
(18, 'HAFIDZ HAQUE HARIADI', '54414671', 1, '$2y$10$Wre9HtoF.Mlv.GpQE7.DBOoDW8QnzvIAl8xcrdRXaEFI27n99cMx.', 'qAz9Eg6izrFAGTkLzLe2utNpbekqQjXjmw9RPffFQRz8XAGM93dFP3R5zsPe', '2018-07-12 02:24:24', '2018-08-04 12:44:56'),
(19, 'HENGGAR TRI WIJAYANTO', '54414911', 1, '$2y$10$m1eMMCeyBLmbTK.R8OtfaOOP3.LnqaI7fpQ40J0mO5MRioJUaCagm', 'M7RVX7pCXrVV7XZVCNYkzk9DLqaLLS3FAQsuCIr1vtOG0EZLITcMVcrFva8B', '2018-07-12 02:24:48', '2018-08-04 12:45:10'),
(20, 'IKHSAN FAUZAN ADZIMA', '55414145', 1, '$2y$10$Dr1tjyiC1m1yu1EEfjwFEuZZVuP5zI6OJzZoyRViUlR3k55vtP4/C', 'ZEjd7v0odMohSVZ1WMjlxQHTZaPKZmaqKhohykCkyD9MPvjWP38zByqzKzqX', '2018-07-12 02:25:19', '2018-08-04 12:45:25'),
(21, 'JOAOGINHO CARVALHO WIDIYA', '55414668', 1, '$2y$10$hZiTKQeAkw2y..UOTO0Yw.eQA62Az1LL18Rw/55Y40xBcm5YPC74e', 'e4rFn9Js4kpyOkWCoiD7tTInYyCf79GRqpzbsR8546sDSaMyQlOF6yA5mKT3', '2018-07-12 02:25:56', '2018-08-04 12:45:49'),
(22, 'KHIAN SAYOGYO RAHMADI', '55414863', 1, '$2y$10$Ch3Ze1eHpzZqqlrKoNrgQekbMdShDAagTMtYtWXyJKe3jMrAmyNfa', 'I6gXcuGiLxkz25wsFoFTk3OJTNRFyrDRUO9uheMDNcwrhhViQHSLeROjfuIH', '2018-07-12 02:26:37', '2018-08-04 12:46:02'),
(23, 'KRISNA ARIEF BUDIMAN', '55414917', 1, '$2y$10$Mxn0.S.mESLxMQwvjoMp6uqy5XCzbvveusIJJF61eQCl1MjzoLETy', 'klauiJxoGsxkyJPCxbKDMYeTTMovsHQBD6oHe4SniSHqdk68hCL6ZGKQ3TUh', '2018-07-12 02:27:55', '2018-08-04 12:46:17'),
(24, 'LUNGGUH SYAM PRAMBUDI', '56414167', 1, '$2y$10$V1svK4t5hdBxAyHQB9R57eLIMw1h75q9Nc1XX9DTjb1sSdzzJPnA2', 's43GJrN3OvyOxeF44xfzY6wfLaVXGlepiUM9L9TFxTMDah79zOzYGsaStMw1', '2018-07-12 02:28:23', '2018-08-04 12:46:41'),
(25, 'MALIK ABDUL AZIZ', '56414339', 1, '$2y$10$JAvMuzHwsdx.Xa1TQBSnSuZ13pGDhYKPJQfsbnxuRbyQYd5vYoJdK', 'kkH7S1n8Edjcgadoe6LGgAlxj2xM59TkXf12gPaZrJtoHBtwPJ0WQZ1jWHmP', '2018-07-12 02:28:54', '2018-08-04 12:47:03'),
(26, 'MELTHA ALHIDAYA PUTRA', '56414585', 1, '$2y$10$GJohKWVpeRvvc5db5.D9quLQsAaWw6tLrFuj.aYVGxhtVyWqhTk12', 'mqW0Zal7dGNpH2PRkDHqYcKFXYa1YSiJXZHO5nmN49frO8hvOU1L8eSU9PG3', '2018-07-12 02:31:23', '2018-08-04 12:47:23'),
(27, 'MUHAMMAD ASEP AWALUDDIN', '57414110', 1, '$2y$10$tmSX5Ix4y9va1eV5chWJ5OyO1iyVUa/8YSGiadOcAvqxwc3RF6faa', '3xWhYAp7VPp6RPycIjR5Mcnr4NdQ4UaJwur47K1OjwCInrc3WS3qp0nkBoyl', '2018-07-12 02:37:12', '2018-08-04 12:47:44'),
(28, 'MUHAMMAD FADIL FIDRIAN', '57414184', 1, '$2y$10$GgUloxcwPiWxJHCDxUowEeTc/r2VG08AZi60lD5sraOV7qQFskfYO', 'RAl7Os3L7dGdZNz65zrysL9ndIFyCEbx5SmYSR8QeaQIiboi4wO2nZ8gdsel', '2018-07-12 02:37:51', '2018-08-04 12:48:14'),
(29, 'MUHAMMAD HILMY H', '57414307', 1, '$2y$10$tixqPPhA80l0GqLMxjkcZeQL8ONeUfccnRjdWnX7md1NP0UOzQdee', 'eiL9fQIlcNw2SVPMPB6kvFQKCMwhKRalNTTXRxdKo1425guyytHSxllS56oZ', '2018-07-12 02:38:34', '2018-08-04 12:48:25'),
(30, 'MUHAMMAD HIMAWAN NOER ADIYASA', '57414308', 1, '$2y$10$J1AbXaM7KGMI7Hbb2wpvqucCKISeDebbMU1tux5MAyxlIc27PQx8u', 'rFGrXiadyPBU5xmKt9T1wzEIM1TgRsV2Ta5M4znqu5WZyA5YKCbwZx2aVW8x', '2018-07-12 02:47:18', '2018-08-04 12:48:44'),
(31, 'MUHAMMAD NIZAR AULIA', '57414432', 1, '$2y$10$vhgGs3oO38wCdm0i.asm/OFqXTT6J34QOoTIAnSVwH2PMcYp1gaFK', 'QG685XkwoYlv5QRL0d38a6hrMZqWvYnMEYnFfnnDXKRIu8W5gBIS0wSFqcYw', '2018-07-12 02:48:36', '2018-08-04 12:48:54'),
(32, 'MUHAMMAD REZA SULAIMAN', '57414489', 1, '$2y$10$kgS0KxGjWSfG80L1NGNNvud0FFJ0cPexfuN9wqpgJF./.HfVQvlue', 'YcNNZDNcWjR8TnqXlYiacmJVU7SxC9mXJZaTPqNKWBYOYhw2cwiCyUvBvvtV', '2018-07-12 02:49:07', '2018-08-04 12:49:25'),
(33, 'MUHAMMAD RIDWAN', '57414495', 1, '$2y$10$ZkMu/cVhwa1rpMmieW8yxeg7UN/D9y6fOnl2AjZjhVxtiSsXKIbp6', 'fOGRxdsN7ukzgamsiZ5hxTogDB0R9s8f76q3KL9Wbuiw6yN3ILJxszk5G87S', '2018-07-12 02:50:32', '2018-08-04 12:49:42'),
(34, 'MUHAMMAD TOMI A', '57414569', 1, '$2y$10$sAbw0J4bPz8Ni3m4ONu0PugxuroNikTp2me3J4QhwajsXmRkAMBUO', 'iIqyQSIFqoacdtoJfGRRDvT6yofRWVJIIxzZSp5o1w6cI2aQ8re8JNCl1vPd', '2018-07-12 02:51:01', '2018-08-04 12:49:58'),
(35, 'MUHAMMAD WILDAN AVIANTO', '57414583', 1, '$2y$10$2b3rvWC6xPuPjkhlMtFF/eRSCl6bm5y4tE3iQXgeEJ8SR/SiK/yF6', 'kIWqg0qyERtfQIWp3P0wqTmHhUg4KTo6MwCvtOFTUqjI75VHI165pP49k17N', '2018-07-12 02:51:32', '2018-08-04 12:50:32'),
(36, 'MUHAMMAD ZAIM MILZAM', '57414600', 1, '$2y$10$Z00wBvKARtFMdaO8Q5cTOe/UwM6xAKDN5vDp0SqyPAuqVpJgJi.yu', 'g2rCkjfFcecmzF2Cfl4vwQaujnf0huIbcLne2Q5x2Jnns2lIt64CWvVAmc8P', '2018-07-12 02:52:24', '2018-08-04 12:50:46'),
(37, 'NALOM MARULI TUA', '57414789', 1, '$2y$10$kIDxCrYtPT0QTl4Tycwd5OpILHjRkYcc.FffvLnZQcGguYWjtD4Yu', 'e2OZZyiVX7eftdbGKBp5f9Y9OxqqgWlRnuOx6Bu59n31nn9TUMa8A5KgsRbd', '2018-07-12 02:52:53', '2018-08-04 12:51:05'),
(38, 'NICKO FAJAR VERNANDO', '57414920', 1, '$2y$10$srnwVExFDINN49EBvid0QOPbmuj2YPrfvO8uVXu1QN7wYVe4dJZxO', 't3TxnPYNOIOgJw8LPzakjztTBj8aXnFOWnlShREsesKaB57Qz0ydDFzZ9Kjl', '2018-07-12 02:53:39', '2018-08-04 12:51:23'),
(39, 'NUGROHO ALI MURTOPO', '58414111', 1, '$2y$10$w62JETFpGcOwtrTGo/mr8eAGyCdaPVT0ULJbrQkcwp4EU177E1dcS', 'Krl7uBfGtajLRFT1nS66ZfhnRv0DanthFCYa6PnCcfn5JJzZacP3f2jdLBZi', '2018-07-12 02:54:14', '2018-08-04 12:51:36'),
(40, 'PUJA PUTRALAKSANA', '58414542', 1, '$2y$10$SDHfmpmWNg5RLc0ISiFHWe0.oWgswIO0uBnXAk8TPO/PsVZbuvX5m', '6V3s9dNYINkUI8PdITUrkLjT80YlIXxJZpPZuLcEOvMl37ramLK3A3bUmR7x', '2018-07-12 02:54:38', '2018-08-04 12:51:53'),
(41, 'RAHMAD BURHANUDIN', '58414797', 1, '$2y$10$P3i/1ezUBdKQIVqyZji90Ovo.g6izTzloFedgxfYY5gZKn8sa5q3i', 'gAupuoCNV24piHsNAYEdZok6nYQGqonLNswaQ2ChU8RPyuFUyxHssn19vSdz', '2018-07-12 02:55:17', '2018-08-04 12:52:12'),
(42, 'RAKA GILANG PRAKARSA', '58414847', 1, '$2y$10$fm7DfTLi5TWVH46XtYRb3OY9XWQlhiL7QJFynKkVVZqCPceOzXola', 'aDBFM2oro5Pd56IscN5tFAka5Cq54QaA7vP7VPvtuEhLcODY208uVo0x1VHr', '2018-07-12 02:55:42', '2018-08-04 12:54:17'),
(43, 'RIZKI ARIMA', '59414609', 1, '$2y$10$dCirv62RzqUpr.aqSqqsxu2I0Zm9CarkHakDCt/XwhE2hS3TCK4E2', '33z120278Q30yrrRuADlVoF2OFYbOUOvesuC2DumVh7S71DWOCju8eRo096W', '2018-07-12 02:56:04', '2018-08-04 12:54:35'),
(44, 'TAUFIK HIDAYAT', '5A414678', 1, '$2y$10$lgEwItR70P0JjoMwuq1FpOeducW.QhboY.t2QBT/nyaK4CbI6NY/O', 'kjMzKdhbTHfNxcWvJMgJ13lVPRqad9ZC2ij7qIxtsJsKq8SdHzSwNr6q4Kmj', '2018-07-12 02:56:25', '2018-08-04 12:54:53'),
(45, 'TEDI WILDANI', '5A414692', 1, '$2y$10$q8QKtq2FkOIJY78okodCueZ40dbaS1ObUk3tugAwBdfnBjdvg4lB2', 'yUAI1uiQWpcSv47mQDRAHRYB4ogpeQXA7eAzkii46di7JsYQ3VOuNOmmBGxh', '2018-07-12 02:56:47', '2018-08-04 12:55:42'),
(46, 'WAHYU RIYANSYAH', '5C414148', 1, '$2y$10$eKkYOqsmhLguyrLfuewJ9uKqzvetUu5ndR4Pi4/tKAw/hpybMoYzK', 'l4oZB9bwfJT5JrhMTuCyGOobmvKxs7NUCDAKrQFi4IJtpRee3BkMqLXuzLmx', '2018-07-12 02:57:18', '2018-08-04 12:55:56'),
(47, 'WIDIA TRIPURNAMASARI', '5C414208', 1, '$2y$10$NxVuCWZAxMVo737RUZCSTeVYBWFi1/0mvx8p0XSgrCJI205kbJUTm', 'AUNJRjnBjHYvuhoVLZbpwCFpzpr4F7JlvUVEcyOuDLWC3bSNVQhpZQUGA4ws', '2018-07-12 02:58:06', '2018-08-04 12:56:39'),
(48, 'ZAKARIA AHMAD FAUZI', '5C414643', 1, '$2y$10$mk7ZqkQSqbcNhSAxE4BDdu7K9XuxepckR4rFyg5PZhrqCxJvOfKvi', 'a3Cu46tePwId1qJxRyMc4ijgr3fMuUDK9q42f6EAczfl8cPz4N33TGcLpeHv', '2018-07-12 02:58:38', '2018-08-04 12:57:15'),
(51, 'Didik, S. Pd.', '9473', 2, '$2y$10$O9UxXnveUtJlx6Ie0i0yXekLGn4XjQg8M9xY/t30FdspoBa0dOLB6', 'jKiYOBQeBs8svnmrD5GqXhHmzI3F92rbDv555W7e4pBskXb2iNBa3kmjHskm', '2018-07-16 15:39:06', '2018-08-04 20:16:14'),
(52, 'Nur Komariah, S. Pd.', '7271', 2, '$2y$10$sZOhoDMQs1H5qbIvYZDIPuyAJwpUYwkL0Fpg7sDwZ.iyPLn0UOhIK', 'GERtA7D01UPozCOedOOil4ZdNydKsizt4a42Kh6gbiMeio42Y3kT7YsWyBGo', '2018-07-16 15:40:03', '2018-08-04 13:02:19'),
(53, 'Silvia', '2005', 2, '$2y$10$pp.Gv3xyVR40BSZjyZF6YePD8WQq7Fa0JOxUNwmhZDyqZhBtuyATG', 'cYVCQJRXrtjNmmTKEOUCOrLIFuFHOQ5e2mybuYddK9SaeRnX7a8huaxbQn8c', '2018-08-04 13:00:53', '2018-08-04 13:02:45'),
(54, 'Adinda', '2006', 2, '$2y$10$GNiB4ss53SiMLMccvyaqp.qcu7Q6Ud9uKnkZdmLGaIwL2zyLJkQgy', 'lwGoLErYe79CXmaGdvXBdxIdZWgnkJ3qDZyPcHt4LyLNmfGmOiUpdZqryq7q', '2018-08-04 13:01:47', '2018-08-04 13:04:33'),
(55, 'Lutfiya', '7059', 2, '$2y$10$f.LZiQLESlBvSTgH855GtuCMP1CJsZS/OESUOBP2bpQXxuQlwWbNO', 'mVDT10jXsQSQmMzC1d8D8gNqbNTIKzOXlQUKR9v31BDh22r95zjA7bvAYVM3', '2018-08-04 13:03:09', '2018-08-04 13:03:09'),
(56, 'Ganesa', '7060', 2, '$2y$10$khZKcmhadBbMjrRLodMhMuTOe1ZKE57yZbqkOtXJTvfud9dao/lEi', '27rZbu4zk7aDnrBJttMbGBAR6s7Yh21phP4bE870GvYgt5ps8uMKDwe3o1oM', '2018-08-04 13:03:39', '2018-08-04 13:03:39'),
(57, 'Ariganesha', '9474', 2, '$2y$10$kGcUXasMyliFE4Ah1qzjpuXsiNPgASGf4E0wFdYrdrDQYLs3rwLv6', 'gekIAyHZBGga43PY1fDFrynkYhhyThhxdzEI2E74bJQqEBLi0Dxekkl1rkAc', '2018-08-04 13:04:27', '2018-08-04 13:04:27'),
(58, 'Kholifah', '9912', 2, '$2y$10$iJlqvxzeHMn6y41ho6ckwuitn7UjS4H1O2C9ijpN7L3I2M5.1Q4ra', 'jbdAM4hezwoITG5jrlPfRYYhbVNJiPLOfqMWG3Q7of068HMMR85vQGCdflJP', '2018-08-04 13:05:03', '2018-08-04 13:05:03'),
(59, 'Anita', '1123', 2, '$2y$10$2HcbERvZanDdAGNJWsb8nePesm4CiMZUs48FqiygKxOqYI/86RncK', 'v0oi87KKHOWcfS5ad7PtDRnvgivj2wHdWuhbK72CueiIs2GGzeqr0pvkMBBL', '2018-08-04 13:05:21', '2018-08-04 13:05:21'),
(60, 'Diwargana', '1125', 2, '$2y$10$HY5feEdjaWfLtDImHJNjAeLA/gBW0W4zS7PwUsEg805r2ia5VVHAa', 'C1hCsb04mrucyJ4Qs3JVa0GundydTQea1CCHNjFEaAiFnNvj8L9vftYWMg1n', '2018-08-04 13:05:49', '2018-08-04 13:05:49'),
(61, 'Purwanti', '2004', 2, '$2y$10$qdvo/QitZbuUw7uK.JG3yOF4k0QQWzYgu/G7dn3CKfrK1yZqQey8q', 'noxWVReln9OruptB3CjHs6BY4YxF8oJD6PbGulYScm4F9lq3MzCkljGNNkKK', '2018-08-04 13:14:56', '2018-08-04 13:14:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_user_id_foreign` (`user_id`),
  ADD KEY `answers_test_id_foreign` (`test_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_user_id_foreign` (`user_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_test_id_foreign` (`test_id`),
  ADD KEY `results_user_id_foreign` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
