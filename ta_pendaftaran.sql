-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 02:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `kdagama` varchar(20) NOT NULL,
  `nmagama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`kdagama`, `nmagama`) VALUES
('A002', 'Buddha'),
('A08382', 'Konghucu'),
('A0993', 'Protestan'),
('A11', 'Khatolik'),
('A3234', 'Hindu'),
('A9992', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `agama` varchar(16) NOT NULL,
  `sekolah_asal` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_siswa`
--

INSERT INTO `calon_siswa` (`id`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `sekolah_asal`) VALUES
(1, 'Priscili Ayuliani', 'Jl. Mangga No. 3, Mataram', 'perempuan', 'Islam', 'SMPN 32 Ampenan');

-- --------------------------------------------------------

--
-- Table structure for table `ijin_tinggal`
--

CREATE TABLE `ijin_tinggal` (
  `id` int(10) NOT NULL,
  `nama_penjamin` varchar(100) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `warga_negara` varchar(20) NOT NULL,
  `no_passpor` varchar(8) NOT NULL,
  `jenis_permohonan` varchar(100) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ijin_tinggal`
--

INSERT INTO `ijin_tinggal` (`id`, `nama_penjamin`, `nama_pemohon`, `warga_negara`, `no_passpor`, `jenis_permohonan`, `berkas`, `tanggal_permohonan`, `status`, `email`, `ket`) VALUES
(2, 'potak', 'peot', 'ameriak', '34sdfs', 'Itas Baru 1 Tahun', '2.Contoh Data Dukung Pembangunan.pdf', '2022-06-14', 'Ditolak', '', 'tidak bagus'),
(3, 'shaka', 'ari', 'indonesia', '345', 'Itas Baru 6 Bulan', '3.Contoh Data Dukung Pembangunan.pdf', '2022-07-26', 'Diterima', '', 'Diterima'),
(4, 'shaka', 'dona', 'Amerika', '13hnfs7', 'Itas Baru 1 Tahun', '4.Contoh Data Dukung Pembangunan.pdf', '2022-07-27', 'Diterima', 'putra.khery@gmail.com', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `kapal_berangkat`
--

CREATE TABLE `kapal_berangkat` (
  `nomor_permohonan` varchar(50) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `perihal` text NOT NULL,
  `tanggal_datang` date NOT NULL,
  `nama_kapal` varchar(50) NOT NULL,
  `jenis_kapal` varchar(100) NOT NULL,
  `jumlah_crew` int(11) NOT NULL,
  `jumlah_passanger` int(11) NOT NULL,
  `next_port` text NOT NULL,
  `id` int(50) NOT NULL,
  `file_permohonan` varchar(100) NOT NULL,
  `UPT` varchar(150) NOT NULL,
  `baca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kapal_berangkat`
--

INSERT INTO `kapal_berangkat` (`nomor_permohonan`, `tanggal_permohonan`, `perihal`, `tanggal_datang`, `nama_kapal`, `jenis_kapal`, `jumlah_crew`, `jumlah_passanger`, `next_port`, `id`, `file_permohonan`, `UPT`, `baca`) VALUES
('sda', '2021-09-24', 'da', '2021-09-25', 'adw', 'OIL TANKER', 10, 12, 'ds', 1, '1.RALPH REYNOLD JORDAN PECHO.pdf', 'IMIGRASI KELAS II TPI SORONG', 'sudah dibaca'),
('WJHSDSAD', '2021-09-17', 'nn', '2021-10-01', 'nn', 'PASSANGER SHIP', 10, 12, 'bm', 2, '2.ALCHIE DIGNO DE LA CRUZ.pdf', 'IMIGRASI KELAS II TPI SORONG', 'sudah dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `kapal_datang`
--

CREATE TABLE `kapal_datang` (
  `nomor_permohonan` varchar(50) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `perihal` text NOT NULL,
  `tanggal_datang` date NOT NULL,
  `nama_kapal` varchar(50) NOT NULL,
  `jenis_kapal` varchar(50) NOT NULL,
  `jumlah_crew` int(11) NOT NULL,
  `jumlah_passanger` int(11) NOT NULL,
  `next_port` text NOT NULL,
  `id` int(50) NOT NULL,
  `file_permohonan` varchar(50) NOT NULL,
  `UPT` varchar(50) NOT NULL,
  `baca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kapal_datang`
--

INSERT INTO `kapal_datang` (`nomor_permohonan`, `tanggal_permohonan`, `perihal`, `tanggal_datang`, `nama_kapal`, `jenis_kapal`, `jumlah_crew`, `jumlah_passanger`, `next_port`, `id`, `file_permohonan`, `UPT`, `baca`) VALUES
('zdcfs', '2021-09-25', 'sda', '2021-09-24', 'sda', 'PASSANGER SHIP', 10, 12, 'sdad', 1, '1.ALCHIE DIGNO DE LA CRUZ.pdf', 'IMIGRASI KELAS II NON TPI MANOKWARI', 'sudah dibaca'),
('dsfsd', '2021-09-17', 'asd', '2021-09-16', 'sda', 'OIL TANKER', 10, 12, 'sf', 2, '2.RALPH REYNOLD JORDAN PECHO.pdf', 'IMIGRASI KELAS II TPI SORONG', 'sudah dibaca'),
('aswedq', '2021-09-16', 'wre', '2021-09-24', 'erfw', 'OIL TANKER', 10, 12, 'zxd', 3, '3.ARNOLD ASMA HERMOSURA.pdf', 'IMIGRASI KELAS II TPI SORONG', 'sudah dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `kdpekerjaan` varchar(20) NOT NULL,
  `nmpekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`kdpekerjaan`, `nmpekerjaan`) VALUES
('P002', 'Petani'),
('P0022', 'Wiraswasta'),
('P0023', 'Pegawai Swasta'),
('P0032', 'Kepala desa'),
('P03002', 'LAinnya'),
('P0302', 'Tidak Bekerja'),
('P03023', 'Parbotot'),
('P0323', 'PNS'),
('P99', 'Aparat');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaan_on_call`
--

CREATE TABLE `pelaksanaan_on_call` (
  `id` int(11) NOT NULL,
  `nomor_spt` varchar(50) NOT NULL,
  `tanggal_spt` date NOT NULL,
  `jumlah_petugas` int(11) NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `jumlah_foto` int(11) NOT NULL,
  `UPT` varchar(150) NOT NULL,
  `baca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaksanaan_on_call`
--

INSERT INTO `pelaksanaan_on_call` (`id`, `nomor_spt`, `tanggal_spt`, `jumlah_petugas`, `lokasi_kegiatan`, `jumlah_foto`, `UPT`, `baca`) VALUES
(1, 'SFSA', '2021-09-30', 2, 'SDSAS', 4, 'IMIGRASI KELAS II NON TPI MANOKWARI', 'sudah dibaca'),
(2, 'sda', '2021-09-24', 2, 'sda', 1, 'IMIGRASI KELAS II TPI SORONG', 'sudah dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `kdpendaftar` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenkel` varchar(14) NOT NULL,
  `kdagama` varchar(20) NOT NULL,
  `tpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `statusanak` varchar(17) NOT NULL,
  `nmayah` varchar(50) NOT NULL,
  `kdpendidikana` varchar(20) NOT NULL,
  `kdpekerjaana` varchar(20) NOT NULL,
  `penghasilanayah` varchar(20) NOT NULL,
  `nmibu` varchar(50) NOT NULL,
  `kdpendidikani` varchar(20) NOT NULL,
  `kdpekerjaani` varchar(20) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `kdtk` varchar(20) NOT NULL,
  `statusdaftar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`kdpendaftar`, `nama`, `jenkel`, `kdagama`, `tpt_lahir`, `tgl_lahir`, `alamat`, `statusanak`, `nmayah`, `kdpendidikana`, `kdpekerjaana`, `penghasilanayah`, `nmibu`, `kdpendidikani`, `kdpekerjaani`, `nohp`, `kdtk`, `statusdaftar`) VALUES
(8, 'Nimrod napitupulu', 'Laki-laki', 'A0993', 'medan', '1994-12-12', 'Medan Petisah', 'Tiri', 'Hotner', 'PN9392', 'P0022', '3000000', 'Lesinta Marbun', 'P77823', 'P77823', '082362612222', 'T00201', 'Diterima'),
(11, '2', 'Laki-laki', 'A002', '2', '0000-00-00', '2', 'kandung', '2', 'P000', 'P002', '2', '2', 'P000', 'P000', '2', 'T000', 'Diterima'),
(12, 'Ayu', 'Perempuan', 'A0993', 'Medan', '1994-12-12', 'medan sunggal', 'Tiri', 'LOntong', 'PN0302', 'P002', '4000000', 'Lintah', 'P0201', 'P0201', '0828277122', 'T0032', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `kdpendidikan` varchar(20) NOT NULL,
  `nmpendidikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`kdpendidikan`, `nmpendidikan`) VALUES
('P000', 'Tidak Sekolah'),
('P0201', 'S3'),
('P77823', 'S2'),
('PN0302', 'SD'),
('Pn21', 'S1'),
('PN7372', 'SMP'),
('PN9392', 'Diploma 3');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_on_call`
--

CREATE TABLE `rencana_on_call` (
  `id` int(50) NOT NULL,
  `nomor_permohonan` varchar(50) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `perihal` text NOT NULL,
  `jumlah_permohonan` int(11) NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `kontak_person` varchar(50) NOT NULL,
  `nomor_hp` int(11) NOT NULL,
  `file_permohonan` varchar(200) NOT NULL,
  `UPT` varchar(150) NOT NULL,
  `baca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rencana_on_call`
--

INSERT INTO `rencana_on_call` (`id`, `nomor_permohonan`, `tanggal_permohonan`, `perihal`, `jumlah_permohonan`, `lokasi_kegiatan`, `kontak_person`, `nomor_hp`, `file_permohonan`, `UPT`, `baca`) VALUES
(1, '123466373737', '2021-09-25', 'ghfg', 2, 'hd', 'dfhd', 45, '1.ARNOLD ASMA HERMOSURA.pdf', 'IMIGRASI KELAS II TPI SORONG', ''),
(2, 'WJHSDSAD', '2021-09-24', 'kl;ik', 6, 'hk', 'h', 243, '2.JEFFREY PEREZ LACANILAO.pdf', 'IMIGRASI KELAS II TPI SORONG', '');

-- --------------------------------------------------------

--
-- Table structure for table `tk`
--

CREATE TABLE `tk` (
  `kdtk` varchar(12) NOT NULL,
  `namatk` varchar(50) NOT NULL,
  `alamat_tk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tk`
--

INSERT INTO `tk` (`kdtk`, `namatk`, `alamat_tk`) VALUES
('T000', 'Lainnya', 'Lainnya'),
('T00201', 'Paud Anak Negeri', 'Panombean Panei'),
('T0032', 'Paud Ta\"am', 'Jln . medan'),
('T020q8', 'TK santa Tomas Medan', 'Jalan medan dekat medan'),
('T0301', 'Taman Kanak-kanak santa mulia', 'Jalan Patuan nagari No 12 Pematangsiantarr');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` int(10) NOT NULL,
  `UPT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `UPT`) VALUES
('etik.itami@gmail.com', 1234, 'ADMIN'),
('putra.khery@gmail.com', 1234, 'PENJAMIN'),
('shaka.haidar@gmail.com', 1234, 'ADMIN '),
('nurwahid.hendi1991@gmail.com', 1234, 'ADMIN '),
('lpp.manokwari12@gmail.com', 1234, 'ADMIN '),
('ari.susanto@gmail.com', 5678, 'PENJAMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`kdagama`);

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapal_berangkat`
--
ALTER TABLE `kapal_berangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapal_datang`
--
ALTER TABLE `kapal_datang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`kdpekerjaan`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`kdpendaftar`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`kdpendidikan`);

--
-- Indexes for table `tk`
--
ALTER TABLE `tk`
  ADD PRIMARY KEY (`kdtk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `kdpendaftar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
