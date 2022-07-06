-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2019 at 01:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akademik`
--

CREATE TABLE `tb_akademik` (
  `id_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `status_akademik` varchar(20) NOT NULL,
  `kurikulum` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akademik`
--

INSERT INTO `tb_akademik` (`id_akademik`, `tahun_akademik`, `status_akademik`, `kurikulum`) VALUES
(1, '2018/2019', 'NONATIF', '2013'),
(3, '2017/2018', 'NONATIF', '2019-2020'),
(8, '2019/2020', 'AKTIF', '2134'),
(9, '2020/2021', 'NONATIF', 'KURNAS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(25) NOT NULL,
  `nomor_hp_guru` varchar(25) NOT NULL,
  `alamat_guru` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `kelas_id`, `nip`, `nama_guru`, `nomor_hp_guru`, `alamat_guru`, `jenis_kelamin`, `username`, `password`, `level`) VALUES
(2, 0, '12345678', 'yudi candra', '0867578242', 'moro seneng bumi agung', 'laki-laki', '', '', ''),
(3, 0, '57668768', 'rico ronaldo', '4546565475745', 'fgdffdfsdfsfs', 'laki-laki', '', '', ''),
(4, 0, '56576576576585', 'dgdfgdfg', '56456546546', 'fhdfgfdgdfgdgdfgfd', 'laki-laki', '', '', ''),
(5, 0, '57454435345', 'cibex temi', '5654654', 'rtretertre', 'laki-laki', '', '', ''),
(6, 0, '112233', 'alfino', '54545687', 'moro seneng baw', 'laki-laki', 'guru', '$2y$10$gGVAlz41X6JmyP0UwdxSQu51tYCpnNPIvDgBR4Dq/NG1efQvIa3bq', 'guru'),
(7, 0, '54321', 'sebex', '243546', 'baw', 'Laki-Laki', '', '$2y$10$n8ec6R7eNsvyovI22oJc2e2zgE9us4WW1bxck20hRz0EsFcLa4.Xq', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hari`
--

CREATE TABLE `tb_hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hari`
--

INSERT INTO `tb_hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Ju\'mat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam_mulai` varchar(20) NOT NULL,
  `jam_selesai` varchar(20) NOT NULL,
  `waktu_istirahat` varchar(20) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_mapel`, `id_kelas`, `id_guru`, `jam_mulai`, `jam_selesai`, `waktu_istirahat`, `id_hari`, `id_akademik`) VALUES
(3, 1, 4, 6, '1', '', '', 2, 1),
(5, 2, 4, 2, '1', '', '', 2, 8),
(7, 4, 4, 7, '1', '', '', 3, 8),
(8, 5, 3, 3, '1', '', '', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `kelas`, `jurusan`) VALUES
(2, '12IPS1', '12', '2'),
(3, '10IPA2', '10', '1'),
(4, '11IPA2', '11', '1'),
(5, '10IPS1', '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(25) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `tingkat`, `id_jurusan`) VALUES
(1, 'MATEMATIKA', '11', 1),
(2, 'Bahasa indonesia', '11', 1),
(3, 'KIMIA', '10', 1),
(4, 'KIMIA', '11', 1),
(5, 'Biologi', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_raport`
--

CREATE TABLE `tb_nilai_raport` (
  `id_nilai` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kkm` varchar(10) NOT NULL,
  `rata_rata_nilai_tugas` varchar(10) NOT NULL,
  `rata_rata_nilai_ulangan_harian` varchar(10) NOT NULL,
  `nilai_uts` varchar(10) NOT NULL,
  `nilai_uas` varchar(11) NOT NULL,
  `nilai_akhir` varchar(30) NOT NULL,
  `predikat` varchar(10) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_raport`
--

INSERT INTO `tb_nilai_raport` (`id_nilai`, `id_akademik`, `id_semester`, `id_siswa`, `id_mapel`, `id_kelas`, `kkm`, `rata_rata_nilai_tugas`, `rata_rata_nilai_ulangan_harian`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `predikat`, `keterangan`) VALUES
(1, 8, 1, 1, 1, 4, '75', '80', '70', '85', '88', '80.75', 'A', 'Tuntas'),
(2, 8, 1, 2, 1, 4, '75', '67', '55', '89', '67', '69.5', 'C', 'Tidak Tuntas'),
(3, 8, 1, 4, 1, 4, '75', '67', '54', '56', '67', '61', 'C', 'Tidak Tuntas'),
(4, 8, 1, 5, 1, 4, '75', '95', '90', '90', '75', '87.5', 'A', 'Tuntas'),
(5, 8, 1, 1, 4, 4, '75', '55', '44', '77', '99', '68.75', 'C', 'Tidak Tuntas'),
(6, 8, 1, 2, 4, 4, '75', '77', '55', '99', '77', '77', 'B', 'Tuntas'),
(7, 8, 1, 4, 4, 4, '75', '66', '44', '66', '66', '60.5', 'C', 'Tidak Tuntas'),
(8, 8, 1, 5, 4, 4, '75', '55', '33', '77', '88', '63.25', 'C', 'Tidak Tuntas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil_sekolah`
--

CREATE TABLE `tb_profil_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `kepala_sekolah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil_sekolah`
--

INSERT INTO `tb_profil_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `logo`, `kepala_sekolah`) VALUES
(1, 'SMA N 1 BUAY BAHUGA', 'JL. MESIR ILIR NO.3 BUMI HARJO, BUAY BAHUGA, WAY KANAN, LAMPUNG,34763', 'smansa.png', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `kode_semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `kode_semester`) VALUES
(1, 'ganjil'),
(2, 'genap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(30) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nama_lengkap_siswa` varchar(30) NOT NULL,
  `jenis_kelamin_siswa` varchar(20) NOT NULL,
  `nomor_hp_siswa` varchar(20) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `tahun_angkatan` varchar(10) NOT NULL,
  `nama_siswa_ayah` varchar(25) NOT NULL,
  `nama_siswa_ibu` varchar(25) NOT NULL,
  `pekerjaan_siswa_ayah` varchar(25) NOT NULL,
  `pekerjaan_siswa_ibu` varchar(25) NOT NULL,
  `nomor_hp_ortu_siswa` varchar(25) NOT NULL,
  `alamat_ortu_siswa` text NOT NULL,
  `nama_wali_siswa` varchar(25) NOT NULL,
  `nomor_hp_wali_siswa` varchar(25) NOT NULL,
  `alamat_wali_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nisn`, `nama_lengkap_siswa`, `jenis_kelamin_siswa`, `nomor_hp_siswa`, `tingkat`, `alamat_siswa`, `tahun_angkatan`, `nama_siswa_ayah`, `nama_siswa_ibu`, `pekerjaan_siswa_ayah`, `pekerjaan_siswa_ibu`, `nomor_hp_ortu_siswa`, `alamat_ortu_siswa`, `nama_wali_siswa`, `nomor_hp_wali_siswa`, `alamat_wali_siswa`) VALUES
(1, '123456', '09876543345', 'alfino adijaya alonso', 'laki-laki', '086655431234', '10', 'moro seneng', '', '', '', '', '', '', '', '', '', ''),
(2, '304', '2345678', 'rico ronaldo', 'Laki-Laki', '098734545', '10', 'moro seneng', '', '', '', '', '', '', '', '', '', ''),
(3, '432', '54321', 'rapido alonso', 'Laki-Laki', '0987654', '11', 'baw dong', '', '', '', '', '', '', '', '', '', ''),
(4, '9876', '09765635454545', 'adit ', 'Laki-Laki', '366787656', '10', 'moroseeng baw', '', '', '', '', '', '', '', '', '', ''),
(5, '6767', '87797979', 'yudi candra', 'Laki-Laki', '0987654', '12', 'dffddgfhfhfhfhfh', '', '', '', '', '', '', '', '', '', ''),
(6, '243545', '5767', 'test', 'Laki-Laki', '07755454', '', 'alamat siswa', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa_kelas`
--

CREATE TABLE `tb_siswa_kelas` (
  `id_siswa_kelas` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenjang` varchar(20) NOT NULL,
  `status` enum('1','0','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa_kelas`
--

INSERT INTO `tb_siswa_kelas` (`id_siswa_kelas`, `siswa_id`, `id_akademik`, `id_kelas`, `jenjang`, `status`) VALUES
(1, 3, 3, 3, '10', '1'),
(2, 4, 3, 3, '10', '1'),
(47, 1, 8, 4, '11', '1'),
(48, 2, 8, 4, '11', '1'),
(49, 3, 8, 2, '12', '1'),
(50, 4, 8, 4, '11', '1'),
(51, 5, 8, 4, '11', '1'),
(212, 1, 1, 0, '', '0'),
(213, 2, 1, 0, '', '0'),
(214, 3, 1, 0, '', '0'),
(215, 4, 1, 0, '', '0'),
(216, 5, 1, 0, '', '0'),
(217, 6, 8, 0, '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$Pndd4lxZrtnIq1m7UvXeluZIWfz/1noUHZCC2a8nObBYmY51Q0A5m', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_walikelas`, `id_guru`, `id_kelas`, `id_akademik`, `status`) VALUES
(1, 5, 2, 8, '0'),
(2, 7, 3, 8, '0'),
(3, 6, 4, 8, '0'),
(4, 3, 5, 8, '0'),
(6, 7, 3, 9, '0'),
(7, 6, 4, 9, '0'),
(8, 3, 5, 9, '0'),
(9, 5, 2, 1, '0'),
(10, 7, 3, 1, '0'),
(11, 6, 4, 1, '0'),
(12, 3, 5, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akademik`
--
ALTER TABLE `tb_akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_hari`
--
ALTER TABLE `tb_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_nilai_raport`
--
ALTER TABLE `tb_nilai_raport`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_profil_sekolah`
--
ALTER TABLE `tb_profil_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_siswa_kelas`
--
ALTER TABLE `tb_siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akademik`
--
ALTER TABLE `tb_akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_hari`
--
ALTER TABLE `tb_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_nilai_raport`
--
ALTER TABLE `tb_nilai_raport`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_profil_sekolah`
--
ALTER TABLE `tb_profil_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_siswa_kelas`
--
ALTER TABLE `tb_siswa_kelas`
  MODIFY `id_siswa_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
