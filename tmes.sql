-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Nov 2021 pada 04.26
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`, `ket`) VALUES
(1, 'Anggota', ''),
(2, 'Pengurus', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `id_master` int(11) NOT NULL,
  `nm_master` varchar(50) NOT NULL,
  `klasifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`id_master`, `nm_master`, `klasifikasi`) VALUES
(1, 'Belum Kawin', 'STSANGGOTA'),
(2, 'Kawin', 'STSANGGOTA'),
(3, 'Cerai Hidup', 'STSANGGOTA'),
(4, 'Cerai Mati', 'STSANGGOTA'),
(5, 'Lainnya', 'STSANGGOTA'),
(7, 'Islam', 'AGAMA'),
(8, 'Katolik', 'AGAMA'),
(9, 'Protestan', 'AGAMA'),
(10, 'Hindu', 'AGAMA'),
(11, 'Budha', 'AGAMA'),
(12, 'Lainnya', 'AGAMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menu_name` varchar(125) DEFAULT NULL,
  `controller_name` varchar(225) DEFAULT NULL,
  `menu_order` int(11) NOT NULL,
  `icon` varchar(125) DEFAULT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `project_id`, `level`, `parent_id`, `menu_name`, `controller_name`, `menu_order`, `icon`, `deleted`) VALUES
(1, 1, 0, 0, 'Projects', '', 100, 'fa-list-alt', 0),
(2, 1, 1, 1, 'Group Menus', 'appsmanagement/Group_menus', 101, '', 0),
(3, 1, 1, 1, 'Group User', 'appsmanagement/Group_user', 102, '', 0),
(4, 1, 0, 0, 'Master Data', '', 200, 'fa-archive', 0),
(5, 1, 1, 4, 'Menus', 'appsmanagement/Menus', 201, '', 0),
(6, 1, 1, 4, 'Users', 'appsmanagement/Users', 202, '', 0),
(7, 1, 1, 4, 'Roles', 'appsmanagement/Roles', 203, '', 0),
(8, 1, 0, 0, 'Project', 'appsmanagement/Projects', 204, 'fa-database', 1),
(9, 1, 0, 4, 'Project', 'appsmanagement/Projects', 204, 'fa-database', 1),
(10, 1, 1, 4, 'Project', 'appsmanagement/Projects', 204, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_group`
--

CREATE TABLE `menu_group` (
  `menu_group_id` int(11) NOT NULL,
  `project_group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_group`
--

INSERT INTO `menu_group` (`menu_group_id`, `project_group_id`, `menu_id`, `deleted`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 1, 7, 0),
(8, 1, 10, 0),
(9, 1, 10, 1),
(10, 2, 1, 0),
(11, 2, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `msdepartement`
--

CREATE TABLE `msdepartement` (
  `id_depart` int(11) NOT NULL,
  `nm_depart` varchar(25) NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msdepartement`
--

INSERT INTO `msdepartement` (`id_depart`, `nm_depart`, `ket`) VALUES
(1, 'A01', ''),
(2, 'A02', ''),
(3, 'A03', ''),
(4, 'A04', ''),
(5, 'A05', ''),
(6, 'A06', ''),
(7, 'A07', ''),
(8, 'A08', ''),
(9, 'ABJ', ''),
(10, 'AGS', ''),
(11, 'AHI', ''),
(12, 'AKGI', ''),
(13, 'AKJ', ''),
(14, 'AKT', ''),
(15, 'AKW', ''),
(16, 'ALD', ''),
(17, 'AMF', ''),
(18, 'ASB', ''),
(19, 'ATM', ''),
(20, 'D01', ''),
(21, 'D03', ''),
(22, 'D04', ''),
(23, 'D06', ''),
(24, 'D08', ''),
(25, 'D09', ''),
(26, 'D10', ''),
(27, 'D11', ''),
(28, 'DAS', ''),
(29, 'DBJ', ''),
(30, 'DDP', ''),
(31, 'DGS', ''),
(32, 'DHI', ''),
(33, 'DKGI', ''),
(34, 'DKJ', ''),
(35, 'DKM', ''),
(36, 'DKW', ''),
(37, 'DSB', ''),
(38, 'K01', ''),
(39, 'K02', ''),
(40, 'K03', ''),
(41, 'K05', ''),
(42, 'K06', ''),
(43, 'K07', ''),
(44, 'K08', ''),
(45, 'K09', ''),
(46, 'K10', ''),
(47, 'K11', ''),
(48, 'KAS', ''),
(49, 'KBJ', ''),
(50, 'KDP', ''),
(51, 'KGS', ''),
(52, 'KHI', ''),
(53, 'KKJ', ''),
(54, 'KKM', ''),
(55, 'KKW', ''),
(56, 'KSB', ''),
(57, 'P01', ''),
(58, 'P02', ''),
(59, 'P03', ''),
(60, 'P04', ''),
(61, 'P05', ''),
(62, 'P06', ''),
(63, 'P07', ''),
(64, 'P08', ''),
(65, 'PBJ', ''),
(66, 'PDP', ''),
(67, 'PGS', ''),
(68, 'PH', ''),
(69, 'PHI', ''),
(70, 'PKGI', ''),
(71, 'PKJ', ''),
(72, 'PKM', ''),
(73, 'PKW', ''),
(74, 'PSB', ''),
(75, 'SDM', ''),
(76, 'SIM', ''),
(77, 'SIT', ''),
(78, 'SKO', ''),
(79, 'SKR', ''),
(80, 'SKU', ''),
(81, 'SPD', ''),
(82, 'SPS', ''),
(83, 'SSP', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_employee`
--

CREATE TABLE `m_employee` (
  `employee_id` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 NOT NULL,
  `identitas` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_depart` int(11) DEFAULT NULL,
  `id_kerja` int(11) NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `kota` varchar(255) NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `aktif` enum('Y','T') NOT NULL,
  `image` varchar(225) DEFAULT 'default.jpg',
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_employee`
--

INSERT INTO `m_employee` (`employee_id`, `nama`, `identitas`, `jk`, `tmp_lahir`, `tgl_lahir`, `id_status`, `id_agama`, `id_depart`, `id_kerja`, `alamat`, `kota`, `notelp`, `tgl_daftar`, `id_jabatan`, `aktif`, `image`, `project_id`) VALUES
(1, 'Muhammad Iqbal', '3175040411910001', 'L', 'Jakarta', '1991-11-04', 2, 7, 1, 3, 'Jl. Cililitan Kecil 1 Rt.008 Rw.007 No.63 Jakarta Timur', 'DKI Jakarta', '082299716264', '2021-11-05', 2, 'Y', 'default.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_project`
--

CREATE TABLE `m_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(225) NOT NULL,
  `project_address` text,
  `controller_name` varchar(255) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_project`
--

INSERT INTO `m_project` (`project_id`, `project_name`, `project_address`, `controller_name`, `deleted`) VALUES
(1, 'Application Management', NULL, 'appsmanagement/Home', 0),
(2, 'Klinik Tiara Medika HO', NULL, NULL, 0),
(3, 'Tiara Medika Site 1 ', NULL, NULL, 0),
(4, 'Tiara Medika Site 2', NULL, NULL, 0),
(5, 'Tiara medika site 3', 'address', 'tm3/home', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_kerja` int(11) NOT NULL,
  `jenis_kerja` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_kerja`, `jenis_kerja`) VALUES
(3, 'Karyawan Swasta'),
(4, 'Guru'),
(99, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_group`
--

CREATE TABLE `project_group` (
  `project_group_id` int(11) NOT NULL,
  `project_group_name` varchar(225) NOT NULL,
  `project_id` int(11) NOT NULL,
  `description` text,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project_group`
--

INSERT INTO `project_group` (`project_group_id`, `project_group_name`, `project_id`, `description`, `deleted`) VALUES
(1, 'SUPER USER', 1, '', 0),
(2, 'ADMINISTRATOR', 1, NULL, 0),
(3, 'SUPER USER', 2, NULL, 0),
(4, 'ADMINISTRATOR', 2, NULL, 0),
(5, 'SUPER USER', 3, NULL, 0),
(6, 'ADMINISTRATOR', 3, NULL, 0),
(7, 'SUPER USER', 4, NULL, 0),
(8, 'ADMINISTRATOR', 4, NULL, 0),
(9, 'testing 1', 2, 'testing desc', 1),
(10, 'sdsd', 1, '', 1),
(11, 'gggggg', 1, '', 1),
(12, 'fffff', 1, '', 1),
(13, 'ddddd', 1, '', 1),
(14, 'ererer', 1, '', 1),
(15, 'vvvv', 1, '', 1),
(16, 'aaaa', 1, '', 1),
(17, 'hhhhh', 1, '', 1),
(18, 'sssss', 1, '', 1),
(19, 'hhhhh', 1, 'fgfgfg', 1),
(20, 'ttttt', 1, 'dfdfdf', 1),
(21, 'sdsd', 1, 'sdsd', 1),
(22, 'testing 2', 1, 'test insert desc', 1),
(23, '', 1, 'ree', 1),
(24, 'terrraa', 1, 'tess', 1),
(25, 'tesss', 1, 'terrr', 1),
(26, 'dfdfdf', 1, 'dfdfd', 1),
(27, 'aaaaa', 1, 'aaaaaaa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 NOT NULL,
  `identitas` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_depart` int(11) DEFAULT NULL,
  `id_kerja` int(11) NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `kota` varchar(255) NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `aktif` enum('Y','T') NOT NULL,
  `image` varchar(225) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id`, `nama`, `identitas`, `jk`, `tmp_lahir`, `tgl_lahir`, `id_status`, `id_agama`, `id_depart`, `id_kerja`, `alamat`, `kota`, `notelp`, `tgl_daftar`, `id_jabatan`, `aktif`, `image`) VALUES
('0109213', 'Muhammad Iqbal', '0109213', 'L', 'Jakarta', '1991-11-04', 2, 7, 1, 3, 'JL. CILILITAN KECIL 1 RT.008 RW.007 NO.63', 'DKI JAKARTA', '082299716264', '2021-08-25', 2, 'Y', 'default.jpg'),
('0190058', 'A.A Sudyanto, Drs.', '0190058', 'L', '', '0000-00-00', 5, 5, 1, 4, '', '', '', '2018-01-25', 1, 'Y', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` bigint(20) NOT NULL,
  `opsi_key` varchar(255) NOT NULL,
  `opsi_val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `opsi_key`, `opsi_val`) VALUES
(1, 'nama_lembaga', ' Koperasi Karyawan PENABUR Jakarta'),
(2, 'nama_ketua', ' '),
(3, 'hp_ketua', ' '),
(4, 'alamat', ''),
(5, 'telepon', ' '),
(6, 'kota', ' '),
(7, 'email', 'admin@kopkarpenaburjkt.org'),
(8, 'web', ' www.kopkarpenaburjkt.org');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(60) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `employee_id`, `username`, `password`, `last_login`, `created_at`, `updated_at`, `deleted`) VALUES
(10, 1, 'balqqi.muhammad@gmail.com', '', '2021-11-27 13:00:28', '2019-12-28 11:42:45', '2021-11-27 19:00:28', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `user_group_id` int(11) NOT NULL,
  `project_group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `project_group_id`, `user_id`, `deleted`) VALUES
(1, 1, 10, 0),
(2, 3, 10, 0),
(3, 5, 10, 0),
(4, 7, 10, 1),
(5, 8, 10, 1),
(6, 7, 10, 1),
(7, 7, 10, 1),
(8, 7, 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_group`
--
ALTER TABLE `menu_group`
  ADD PRIMARY KEY (`menu_group_id`);

--
-- Indexes for table `msdepartement`
--
ALTER TABLE `msdepartement`
  ADD PRIMARY KEY (`id_depart`);

--
-- Indexes for table `m_employee`
--
ALTER TABLE `m_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_depart` (`id_depart`),
  ADD KEY `id_kerja` (`id_kerja`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `m_project`
--
ALTER TABLE `m_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_kerja`);

--
-- Indexes for table `project_group`
--
ALTER TABLE `project_group`
  ADD PRIMARY KEY (`project_group_id`);

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_depart` (`id_depart`),
  ADD KEY `id_kerja` (`id_kerja`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu_group`
--
ALTER TABLE `menu_group`
  MODIFY `menu_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `msdepartement`
--
ALTER TABLE `msdepartement`
  MODIFY `id_depart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `m_employee`
--
ALTER TABLE `m_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_project`
--
ALTER TABLE `m_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `project_group`
--
ALTER TABLE `project_group`
  MODIFY `project_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
