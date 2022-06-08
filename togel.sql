-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 05:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `togel`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `namabrand` varchar(20) NOT NULL,
  `gambarbrand` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `namabrand`, `gambarbrand`) VALUES
(1, 'Xiaomi', 'brand1654607273.png'),
(2, 'Oppo', 'brand1654606639.png'),
(3, 'Samsung', 'brand1654606654.png'),
(5, 'Asus', 'brand1654607898.png'),
(6, 'Apple', 'brand1654607919.png'),
(7, 'Canon', 'brand1654607931.png');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `judulh` varchar(100) NOT NULL,
  `deskripsih` varchar(200) NOT NULL,
  `gambarh` varchar(100) NOT NULL,
  `gambare` varchar(100) NOT NULL,
  `judule` varchar(100) NOT NULL,
  `deskripsie` varchar(200) NOT NULL,
  `linke` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `haribuka` varchar(50) NOT NULL,
  `jambuka` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `logo`, `judulh`, `deskripsih`, `gambarh`, `gambare`, `judule`, `deskripsie`, `linke`, `alamat`, `haribuka`, `jambuka`, `facebook`, `instagram`, `youtube`) VALUES
(2, 'konten1654436387.png', 'Beli Gadget Berkualitas!', 'Online Store Paling Terpercaya Dalam Penjualan Gadget Di Indonesia', 'konten1654436586.png', 'konten1654435350.jpg', 'Mi Band 6', 'Mi Smart Band 6 Saat Ini Hadir Dengan Fitur Pengukuran SpO2 Yang Memungkinkan Pengguna Mengukur Kandungan Oksigan Dalam Darah. Fitur Ini Dapat Dipakai Pula Mengukur Kualitas Pernapasan Saat Tidur.', '', 'Jl. Ketintang No.156, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231', 'Buka Setiap Hari', '08:00 - 21:00', 'Https://id-id.facebook.com/zuck', 'Https://www.instagram.com/zuck/', 'Https://www.youtube.com/user/pewdiepie/videos?app=desktop');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_telp` varchar(50) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `admin_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`admin_id`, `admin_nama`, `username`, `password`, `admin_telp`, `admin_mail`, `admin_alamat`) VALUES
(3, 'Rizki', 'bisma', '1c55c22b9adee496da6f89deb87475b9', '085815243464', 'ardiyansabisma@gmail.com', 'Perumahan Sukorejo Indah Jl. Perkutut Blok GG No.20, Katang, Sukorejo, Ngasem, Kediri Regency, East Java 64182'),
(5, 'Xander', 'xander', 'c4ca4238a0b923820dcc509a6f75849b', '0882284491000', 'achmadxander13@gmail.com', 'Jl Masjid Glatik, Kec Ngoro, Kab Mojokerto'),
(6, 'Yori', 'yori', '39567f6cd69c53e6a7d398e2c0570e76', '085546430176', 'ilhamyori@gmail.com', 'Jl. Raya Sumokali 2012, Hyamplung, Sumokali, Kec. Candi, Kabupaten Sidoarjo, Jawa Timur 61271');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(25) NOT NULL,
  `kategori_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`kategori_id`, `kategori_nama`, `kategori_gambar`) VALUES
(13, 'Smartwatch', 'produk1654245646.jpg'),
(16, 'Smartphone', 'produk1654265884.png'),
(25, 'Laptop', 'kategori1654316402.jpg'),
(27, 'Tablet', 'kategori1654316807.png'),
(28, 'Kamera', 'kategori1654317020.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_product`
--

CREATE TABLE `tabel_product` (
  `product_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `product_nama` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_deskripsi` text NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `yt` varchar(250) NOT NULL,
  `updatestok` datetime NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_product`
--

INSERT INTO `tabel_product` (`product_id`, `kategori_id`, `brand`, `product_nama`, `product_price`, `product_deskripsi`, `product_image`, `stok`, `yt`, `updatestok`, `product_status`, `date_create`) VALUES
(2, 13, '1', 'Mi Smart Band 4', 379000, '<ul>\r\n	<li>* Tahan air hingga 50m. Tahan air ini berdasarkan standar GB/T 30106-2013. Pengujian dilakukan oleh National Quality Supervision and Inspection Center for Watches. Nomor laporan tahan air Mi Smart Band 4: QT1902005.</li>\r\n	<br />\r\n	<li>* Mi Smart Band 4 bertahan hingga 20 hari dalam 1x pengisian baterai, berdasarkan hasil pengujian Laboratorium Huami. Pengujian menggunakan setelan sistem, dengan mengaktifkan 30 menit otomatis pemantauan detak jantung, menerima 100 notifikasi/hari, 2 alarm/hari, bergetar untuk 5 menit, menyentuh tombol sentuh 10 kali/hari, dan menyinkronkan aplikasi sekali sehari. Hasil mungkin akan berbeda tergantung dari lingkungan, penggunaan, dan setelan.</li>\r\n	<br />\r\n	<li>* &quot;Ukuran layar 39,9% lebih besar&quot; dibandingkan dengan Mi Band 3. Ukuran layar Mi Band 3 adalah panjang 17,26mm dan lebar 9,66mm. Ukuran Mi Smart Band 4 adalah panjang 21,6mm dan lebar 10,8mm. Dengan perhitungan (10,8*21,6 - 9,66*17,26) / (9,66*17,26), maka layar Mi Smart Band 4 adalah 39,9% lebih besar dibandingkan dengan layar Mi Band 3.</li>\r\n</ul>\r\n', 'produk1654323142.jpg', 40, 'https://www.youtube.com/embed/cuRYQtwIXV0', '2022-06-07 10:05:39', 1, '2022-03-20 11:54:31'),
(9, 13, '1', 'Mi Smart Band 6', 414000, '<p>*Merek wearable band No.1 di dunia.</p>\r\n\r\n<p>Perkiraan Canalys untuk pengiriman tingkat model wearable band, kategori band standar, Kuartal 4 2020</p>\r\n\r\n<p>*Ukuran layar Mi Smart Band 6 kira-kira 50% lebih besar dibanding Mi Smart Band 5. Data dari Huami Labs.</p>\r\n\r\n<p>*Tampilan kustom: Beberapa tampilan band kompatibel untuk menampilkan konten khusus. Dengan begitu, fitur favorit atau yang paling sering digunakan bisa ditampilkan di layar sesuai kebutuhan.</p>\r\n\r\n<p>*Pelacakan kesehatan perempuan: Jangan gunakan atau andalkan fitur ini untuk tujuan medis apa pun. Fitur ini mungkin kurang akurat memprediksi siklus haid atau informasi terkait. Hanya gunakan semua data dan pelacakan untuk referensi pribadi saja.*Jangan gunakan atau andalkan fitur SpO2 untuk tujuan medis apa pun. Hanya gunakan semua data dan pelacakan untuk referensi pribadi saja. Jika kamu merasakan ketidaknyamanan, konsultasikan dengan doktermu.</p>\r\n\r\n<p>Tahan air 50 m*: Tahan air dengan kedalaman 50 m didasarkan pada standar GB/T 30106-2013 dan telah diuji oleh China National Horological Quality Supervision and Testing Center. Nomor laporan tahan air: Mi Smart Band 6: QT2012060. Peringkat tahan air adalah 5 ATM (setara dengan kedalaman 50 m di dalam air), sehingga memungkinkan perangkat dipakai saat sedang mandi atau berenang, tetapi tidak saat melakukan sauna atau selama menyelam;</p>\r\n', 'produk1654320035.jpg', 70, 'https://www.youtube.com/embed/TI3a9yPyBOk', '2022-06-07 10:10:22', 1, '2022-03-25 03:45:52'),
(21, 25, '5', 'ASUS TUF FX505GE Red Fushion', 12000000, '<ul>\r\n	<li>Operating System : Windows 10 (64bit)</li>\r\n	<li>Processor : Intel Core i7-8750H</li>\r\n	<li>Memory : 8GB DDR4 2666MHz RAM, Hard Drive : 128GB NVME SSD + 1TB HDD</li>\r\n	<li>Graphics : NVIDIA GeForce GTX 1050Ti 4GB GDDR5</li>\r\n	<li>Display : 15.6 Inch (16:9) LED backlit FHD (1920x1080) Display</li>\r\n</ul>\r\n', 'produk1654320618.jpg', 2, 'https://www.youtube.com/embed/O7I6lvLHO-A', '2022-06-07 10:11:42', 1, '2022-06-04 05:30:18'),
(22, 27, '', 'Apple iPad Air 4 Gray 64GB', 10990000, '<p>Apple iPad Air 4 adalah tablet dengan layar IPS 10.9&quot; dan resolusi 1640 x 2360pixels. Hadir dengan bobot 458g, tablet ini dilengkapi dengan kapasitas baterai 7606mAh dan resolusi kamera belakang 12MP. Untuk mendukung performanya, tablet Apple ini juga menggunakan CPU Apple A14 Bionic (5 nm), RAM 4GB, dan kapasitas penyimpanan 64GB. Tertarik beli? Dapatkan penawaran harga Apple iPad Air 4 warna Abu-abu yang termurah mulai dari IDR10990000&nbsp;</p>\r\n', 'produk1654320946.jpg', 12, '', '2022-06-04 07:01:47', 1, '2022-06-04 05:33:40'),
(24, 16, '6', 'iPhone 13 128GB', 14699000, '<p>iPhone 13. Sistem kamera ganda paling canggih yang pernah ada di iPhone. Chip A15 Bionic yang secepat kilat. Lompatan besar dalam kekuatan baterai. Desain kokoh. Dan layar Super Retina XDR yang lebih cerah.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Poin-poin fitur utama</strong></p>\r\n\r\n<ul>\r\n	<li>Layar Super Retina XDR 6,1 inci1</li>\r\n	<li>Mode Sinematik menambahkan kedalaman bidang yang dangkal dan pindah fokus secara otomatis di video Anda</li>\r\n	<li>Sistem kamera ganda canggih dengan kamera Wide dan Ultra Wide 12 MP; Gaya Fotografi, Smart HDR 4, mode Malam, perekaman HDR 4K Dolby Vision</li>\r\n	<li>Kamera depan TrueDepth 12 MP dengan mode Malam, perekaman HDR 4K Dolby Vision</li>\r\n	<li>Chip A15 Bionic untuk performa secepat kilat</li>\r\n	<li>Pemutaran video hingga 19 jam2</li>\r\n	<li>Desain kokoh dengan Ceramic Shield</li>\r\n	<li>Level ketahanan air IP68 terdepan di industri3</li>\r\n	<li>iOS 15 dilengkapi berbagai fitur baru untuk melakukan lebih banyak hal dengan iPhone4</li>\r\n	<li>Mendukung aksesori MagSafe untuk kemudahan pemasangan dan pengisian daya nirkabel yang lebih cepat5</li>\r\n</ul>\r\n', 'produk1654611969.png', 12, 'https://www.youtube.com/embed/m43rh-pI0P0', '2022-06-07 10:13:23', 1, '2022-06-07 14:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `userid`, `password`, `aktif`, `nama`, `alamat`, `email`, `hp`) VALUES
(13, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Y', '1', '1', '1', '1'),
(12, 'fwp', '202cb962ac59075b964b07152d234b70', 'Y', 'fwp', 'fwp', 'fwp@gmail.com', '085'),
(11, 'adi', '202cb962ac59075b964b07152d234b70', 'Y', 'adi', 'adi', 'adi@gmail.com', '085'),
(8, 'xanderr', '93099d4cf64aabe90c8b29d3429ef7fc', 'Y', 'xanderr', 'xanderr', 'xanderr', 'xanderr'),
(10, 'a', '0cc175b9c0f1b6a831c399e269772661', 'Y', 'a', 'a', 'a', 'a'),
(9, 's', '03c7c0ace395d80182db07ae2c30f034', 'Y', 's', 's', 's', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tabel_product`
--
ALTER TABLE `tabel_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tabel_product`
--
ALTER TABLE `tabel_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
