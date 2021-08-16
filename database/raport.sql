-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 05:45 AM
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
-- Database: `raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `no_telp`) VALUES
(1, 'Admin', 'admin', 'admin', '085647456670');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id_anggota_kelas` int(11) NOT NULL,
  `id_kelas_tahunan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id_anggota_kelas`, `id_kelas_tahunan`, `id_siswa`, `status`) VALUES
(5, 95, 27, ''),
(6, 95, 26, '');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` char(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `password`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `pendidikan`, `foto`) VALUES
(1, '12345', 'guru', 'Siswanto', 'klaten', '2021-04-29', 'karangnongko', '082341265333', 'S3', ''),
(2, '333', '333', 'MARTANTI', 'klaten', '2021-01-13', 'gondang', '082341265333', 'S2', ''),
(3, '111', 'guru', 'Aris', 'klaten', '2021-01-05', 'bareng lor', '082341265311', 'S2', ''),
(4, '2', 'guru', 'Agus', 'klaten', '2020-02-04', 'majegan', '08574646463', 'S2', ''),
(5, '222', 'guru', 'Hariyono', 'klaten', '2010-02-16', 'Pluneng', '082341265333', 'D3', ''),
(6, '444', 'guru', 'Dewi', 'klaten', '2017-02-14', 'Srowot', '082341265311', 'S3', '');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas_tahunan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_mapel`
--

INSERT INTO `guru_mapel` (`id_guru_mapel`, `id_guru`, `id_mapel`, `id_kelas_tahunan`) VALUES
(27, 4, 1, 95),
(25, 6, 4, 95);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `id_program_keahlian` int(11) NOT NULL,
  `kelompok` char(2) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_program_keahlian`, `kelompok`, `nama_kelas`) VALUES
(3, 'X', 3, '1', 'TKJ 1'),
(6, 'X', 2, '2', 'OT 1'),
(7, 'X', 4, '3', 'TEL1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_tahunan`
--

CREATE TABLE `kelas_tahunan` (
  `id_kelas_tahunan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_tahunan`
--

INSERT INTO `kelas_tahunan` (`id_kelas_tahunan`, `id_kelas`, `id_ta`, `id_guru`) VALUES
(95, 7, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `kkm` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kkm`) VALUES
(1, 'Bahasa Indonesia', '65'),
(2, 'Bahasa Inggris', '75'),
(3, 'Bahasa Jawa', '75'),
(4, 'Matematika', '80'),
(5, 'FISIKA', '75'),
(6, 'KIMIA', '75');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_semester`
--

CREATE TABLE `nilai_semester` (
  `id_nilai_semester` int(11) NOT NULL,
  `id_guru_mapel` int(11) NOT NULL,
  `id_anggota_kelas` int(11) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `nilai_pengetahuan` int(11) NOT NULL,
  `nilai_keterampilan` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `predikat` varchar(5) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_semester`
--

INSERT INTO `nilai_semester` (`id_nilai_semester`, `id_guru_mapel`, `id_anggota_kelas`, `semester`, `nilai_pengetahuan`, `nilai_keterampilan`, `nilai_akhir`, `predikat`, `deskripsi`) VALUES
(18, 25, 5, 'I', 80, 86, 84, 'B', 'alskd\r\n'),
(19, 25, 6, 'I', 90, 80, 83, 'B', 'lskdj');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_anggota_kelas` int(11) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_anggota_kelas`, `semester`, `tanggal`, `keterangan`) VALUES
(7, 5, 'I', '2021-08-12', 'S'),
(8, 6, 'I', '2021-08-12', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `program_keahlian`
--

CREATE TABLE `program_keahlian` (
  `id_program_keahlian` int(11) NOT NULL,
  `nama_program` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_keahlian`
--

INSERT INTO `program_keahlian` (`id_program_keahlian`, `nama_program`) VALUES
(2, 'OTOMOTIF'),
(3, 'TKJ'),
(4, 'TELKOM');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_ortu` varchar(255) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `jml_saudara` int(11) NOT NULL,
  `anak_ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `password`, `password_ortu`, `nama_siswa`, `agama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jk`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `no_telp`, `foto`, `jml_saudara`, `anak_ke`) VALUES
(1, '2020', 'SISWA', '', 'RENI', 'Islam', 'KLATEN', '2021-04-29', 'KARANGNONGKO', 'P', 'ardi', 'asnah', 'buruh', 'buruh', 'karangnongko', '082341265311', '', 3, 4),
(2, '2021', 'siswa', '', 'Siska', 'Islam', 'klaten', '2021-04-06', 'pedan', 'L', 'sotopo', 'rahma', 'buruh', 'buruh', 'pedan', '0856464132151', '', 3, 3),
(3, '1', 'siswa', '', 'Akbar', 'Islam', 'klaten', '2021-01-03', 'mojayan', 'L', 'prapto', 'anis', 'swasta', 'buruh', 'mojayan', '08564646221', '', 1, 1),
(4, '2', 'siswa', '', 'Saulung', 'Islam', 'klaten', '2021-07-01', 'sambeng', 'L', 'hariono', 'sumiyati', 'buruh', 'ibu rumah tangga', 'sambeng', '0857464643', '', 2, 2),
(5, '3', 'siswa', '', 'davis', 'Islam', 'klaten', '2021-07-02', 'sambeng', 'L', 'danang', 'heni', 'buruh', 'buruh', 'sambeng', '082266465', '', 2, 1),
(6, '4', 'siswa', '', 'Henny', 'Islam', 'klaten', '2021-07-05', 'Manisrenggo', 'P', 'danang', 'puji', 'swasta', 'ibu rumah tangga', 'Manisrenggo', '0822464326', '', 3, 2),
(7, '5', 'siswa', '', 'Friska', 'Islam', 'klaten', '2021-07-10', 'Sambeng', 'P', 'Sunardi', 'mujiyem', 'buruh', 'buruh', 'Sambeng', '085647464344', '', 2, 1),
(8, '6', 'siswa', '', 'Aulia', 'Islam', 'klaten', '2021-07-07', 'Bayat', 'P', 'Rendi', 'Marni', 'swasta', 'buruh', 'Bayat', '08767644645', '', 1, 1),
(9, '7', 'siswa', '', 'Febri', 'Islam', 'klaten', '2019-06-18', 'klaten utara', 'L', 'Tarno', 'Reni', 'buruh', 'buruh', 'klaten utara', '0856467435', '', 2, 1),
(10, '8', 'siswa', '', 'Andi', 'Islam', 'klaten', '2018-02-07', 'Gondang', 'L', 'Hariyanto', 'Mariyanti', 'buruh', 'buruh', 'Gondang', '08564765441', '', 2, 2),
(11, '9', 'siswa', '', 'Roni', 'Islam', 'klaten', '2019-06-05', 'somopuro', 'L', 'sotopo', 'rahma', 'buruh', 'buruh', 'somopuro', '0856464634', '', 3, 3),
(12, '10', 'siswa', '', 'Rendi', 'Islam', 'klaten', '2019-02-13', 'jatinom', 'L', 'danang', 'anis', 'swasta', 'ibu rumah tangga', 'jatinom', '082341265300', '', 2, 1),
(13, '11', 'siswa', '', 'Riska', 'Islam', 'klaten', '2017-02-08', 'sambeng', 'P', 'untung', 'sumiyati', 'buruh', 'ibu rumah tangga', 'sambeng', '085784394535', '', 2, 2),
(14, '12', 'siswa', '', 'fadli', 'Islam', 'klaten', '2020-06-09', 'gondang', 'L', 'Murtopo', 'rahma', 'wiraswasta', 'wiraswasta', 'gondang', '0856464132151', '', 1, 1),
(15, '13', 'siswa', '', 'Denik', 'Islam', 'klaten', '2018-06-13', 'Miran ', 'L', 'parno', 'heni', 'wiraswasta', 'buruh', 'Miran', '0856464132151', '', 2, 1),
(16, '14', 'siswa', '', 'dodit', 'Islam', 'klaten', '2021-02-24', 'mojosongo', 'L', 'Madek', 'Maryanti', 'buruh', 'buruh', 'mojosongo', '085784394535', '', 1, 1),
(17, '15', 'siswa', '', 'Roy', 'Islam', 'klaten', '2018-06-05', 'samiran', 'L', 'danang', 'anisa', 'wiraswasta', 'buruh', 'samiran', '082341265300', '', 2, 2),
(18, '16', 'siswa', '', 'Bagas', 'Islam', 'klaten', '2018-02-08', 'somopuro', 'L', 'suryo', 'rahma', 'buruh', 'buruh', 'somopuro', '082256464674', '', 2, 1),
(19, '17', 'siswa', '', 'Afifa', 'Islam', 'klaten', '2018-05-08', 'sambeng', 'P', 'hariono', 'asnah', 'buruh', 'buruh', 'sambeng', '0877646464', '', 1, 1),
(20, '18', 'siswa', '', 'Leni', 'Islam', 'klaten', '2019-02-12', 'Srowot', 'P', 'sunardi', 'heni', 'buruh', 'ibu rumah tangga', 'Srowot', '082341265333', '', 3, 2),
(21, '19', 'siswa', '', 'Nabila', 'Islam', 'klaten', '2018-06-13', 'Plawikan', 'L', 'Darmadi', 'anis', 'wiraswasta', 'buruh', 'Plawikan', '0856464132151', '', 1, 1),
(22, '20', 'siswa', '', 'Niken', 'Islam', 'klaten', '2019-06-03', 'njoso', 'P', 'Mardi', 'Astuti', 'buruh', 'ibu rumah tangga', 'njoso', '0856464132151', '', 1, 1),
(23, '21', 'siswa', '', 'natasha', 'Islam', 'klaten', '2020-06-16', 'rejoso', 'P', 'haryono', 'Astuti', 'wiraswasta', 'wiraswasta', 'rejoso', '082341265300', '', 3, 2),
(24, '22', 'SISWA', '', 'Rudi', 'Islam', 'klaten', '2018-06-05', 'gergunung', 'L', 'prapto', 'Astuti', 'buruh', 'buruh', 'gergunung', '082341265333', '', 1, 1),
(25, '23', 'siswa', '', 'Abdul', 'Islam', 'klaten', '2016-06-14', 'mojayan', 'L', 'hardi', 'Astuti', 'buruh', 'wiraswasta', 'mojayan', '0856464132151', '', 2, 2),
(26, '24', 'siswa', '', 'husnah', 'Islam', 'klaten', '2019-03-08', 'nglinggi', 'P', 'danang', 'puji', 'buruh', 'ibu rumah tangga', 'nglinggi', '082341265311', '', 3, 1),
(27, '25', 'siswa', 'ortu', 'Nur Arifin', 'Islam', 'klaten', '2017-02-15', 'Pluneng', 'L', 'sunardi', 'mujiyem', 'wiraswasta', 'wiraswasta', 'Pluneng', '082341265333', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `id_ta` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`id_ta`, `tahun_ajaran`) VALUES
(1, '2020/2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD PRIMARY KEY (`id_anggota_kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`),
  ADD KEY `id_guru` (`id_guru`,`id_mapel`,`id_kelas_tahunan`),
  ADD KEY `id_kelas` (`id_kelas_tahunan`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_program_keahlian` (`id_program_keahlian`);

--
-- Indexes for table `kelas_tahunan`
--
ALTER TABLE `kelas_tahunan`
  ADD PRIMARY KEY (`id_kelas_tahunan`),
  ADD KEY `id_kelas` (`id_kelas`,`id_ta`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai_semester`
--
ALTER TABLE `nilai_semester`
  ADD PRIMARY KEY (`id_nilai_semester`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_anggota_kelas` (`id_anggota_kelas`) USING BTREE;

--
-- Indexes for table `program_keahlian`
--
ALTER TABLE `program_keahlian`
  ADD PRIMARY KEY (`id_program_keahlian`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  MODIFY `id_anggota_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas_tahunan`
--
ALTER TABLE `kelas_tahunan`
  MODIFY `id_kelas_tahunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_semester`
--
ALTER TABLE `nilai_semester`
  MODIFY `id_nilai_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_keahlian`
--
ALTER TABLE `program_keahlian`
  MODIFY `id_program_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ta`
--
ALTER TABLE `ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `guru_mapel_ibfk_1` FOREIGN KEY (`id_kelas_tahunan`) REFERENCES `kelas_tahunan` (`id_kelas_tahunan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_mapel_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_mapel_ibfk_4` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_program_keahlian`) REFERENCES `program_keahlian` (`id_program_keahlian`);

--
-- Constraints for table `kelas_tahunan`
--
ALTER TABLE `kelas_tahunan`
  ADD CONSTRAINT `kelas_tahunan_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_tahunan_ibfk_2` FOREIGN KEY (`id_ta`) REFERENCES `ta` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
