-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 10:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE `tb_account` (
  `no_account` varchar(50) NOT NULL,
  `nama_account` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`no_account`, `nama_account`) VALUES
('AC001', 'Bank BRI'),
('AC002', 'Bank BCA'),
('AC003', 'Bank Cimb'),
('AC004', 'Bank Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ap_dtl`
--

CREATE TABLE `tb_ap_dtl` (
  `no_ap` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `no_btb` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_btb` date DEFAULT NULL,
  `no_po` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `no_so` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `no_do` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `jumlah_tagihan` int(50) DEFAULT NULL,
  `diskon` int(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `sisa_tagihan` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ap_dtl`
--

INSERT INTO `tb_ap_dtl` (`no_ap`, `no_btb`, `tgl_btb`, `no_po`, `no_so`, `no_do`, `jumlah_tagihan`, `diskon`, `total`, `sisa_tagihan`) VALUES
('AP-00002', 'BTB00002', '0000-00-00', 'PO-00004', '--', '', 16120000, 50, 8060000, 8060000),
('AP-00003', 'BTB00002', '0000-00-00', 'PO-00004', '-', '', 16120000, 50, 8060000, 8060000),
('AP-00004', 'BTB00006', '0000-00-00', 'PO-00002', '-', '', 21120000, 20, 0, -2000000),
('AP-00005', 'BTB00007', '2020-01-24', 'PO-00004', '--', '', 112840000, 50, 56420000, 58580000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ap_hd`
--

CREATE TABLE `tb_ap_hd` (
  `no_ap` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_ap` date DEFAULT NULL,
  `kode_suplier` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_suplier` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `no_account` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_account` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `jumlah_uang` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ap_hd`
--

INSERT INTO `tb_ap_hd` (`no_ap`, `tgl_ap`, `kode_suplier`, `nama_suplier`, `no_account`, `nama_account`, `keterangan`, `jumlah_uang`) VALUES
('AP-00001', '2020-01-18', 'SP0002', 'Nama Suplier 2', '<br /><b>Notice</b>:  Undefined variable: no_accou', '', 'test', 2000000),
('AP-00002', '0000-00-00', 'SP0002', 'Nama Suplier 2', 'AC004', '', '', 2000000),
('AP-00003', '2020-01-18', 'SP0002', 'Nama Suplier 2', 'AC004', 'Bank BRI', 'test', 2000000),
('AP-00004', '2020-01-23', 'SP0001', 'Nama Suplier 1', 'AC004', '', 'test', 2000000),
('AP-00005', '2020-01-24', 'SP0002', 'Nama Suplier 2', 'AC004', '', 'TEST DOANG', 115000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ar_dtl`
--

CREATE TABLE `tb_ar_dtl` (
  `no_ar` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `no_inv` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_inv` date DEFAULT NULL,
  `jumlah_tagihan` int(50) DEFAULT NULL,
  `diskon` int(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ar_dtl`
--

INSERT INTO `tb_ar_dtl` (`no_ar`, `no_inv`, `tgl_inv`, `jumlah_tagihan`, `diskon`, `total`) VALUES
('AR-00001', 'Inv00001', '2020-01-23', 0, 50, 1975356),
('AR-00002', 'Inv00001', '2020-01-23', 3950711, 10, 3555640),
('AR-00003', 'Inv00002', '2020-01-24', 3950711, 10, 3555640);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ar_hd`
--

CREATE TABLE `tb_ar_hd` (
  `no_ar` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_ar` date DEFAULT NULL,
  `no_account` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_account` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `jumlah_uang` int(50) DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ar_hd`
--

INSERT INTO `tb_ar_hd` (`no_ar`, `tgl_ar`, `no_account`, `nama_account`, `jumlah_uang`, `keterangan`) VALUES
('AR-00001', '2020-01-24', 'AC004', 'Bank Cimb', 7000000, 'test'),
('AR-00002', '2020-01-25', 'AC004', 'Bank Cimb', 5000000, 'test test'),
('AR-00003', '0000-00-00', 'AC004', 'Bank Cimb', 5000000, 'TEST DOANG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(200) DEFAULT NULL,
  `ukuran_panjang_barang` int(10) DEFAULT NULL,
  `ukuran_lebar_barang` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `jenis_barang` varchar(20) DEFAULT NULL,
  `stok_barang` int(50) NOT NULL,
  `satuan_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `ukuran_panjang_barang`, `ukuran_lebar_barang`, `harga_barang`, `jenis_barang`, `stok_barang`, `satuan_barang`) VALUES
('BR0001', 'Nama Barang 1', 10, 100, 100000, 'jenis barang 1', 1000, 'KG'),
('BR0002', 'Nama Barang 2', 20, 200, 20000, 'jenis barang 2', 2000, 'ROLL'),
('BR0003', 'Nama Barang 3', 30, 300, 300000, 'jenis barang 3', 3000, 'LBR'),
('BR0004', 'Nama Barang 4', 40, 400, 400000, 'jenis barang 4', 4000, 'LBR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_btb_dtl`
--

CREATE TABLE `tb_btb_dtl` (
  `no_btb` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode_produk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode_barang` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_barang` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `qty_barang` int(50) DEFAULT NULL,
  `qty_diterima` int(50) DEFAULT NULL,
  `total_harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_btb_dtl`
--

INSERT INTO `tb_btb_dtl` (`no_btb`, `kode_produk`, `kode_barang`, `nama_barang`, `qty_barang`, `qty_diterima`, `total_harga`) VALUES
('BTB00001', 'PRD00002', 'BR0002', 'Nama Barang 2', 22, 22, 0),
('BTB00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 0),
('BTB00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 0),
('BTB00002', 'PRD00004', 'BR0003', 'Nama Barang 3', 44, 44, 13200000),
('BTB00002', 'PRD00006', 'BR0001', 'Nama Barang 1', 1, 1, 100000),
('BTB00002', 'PRD00006', 'BR0002', 'Nama Barang 2', 2, 2, 40000),
('BTB00002', 'PRD00006', 'BR0003', 'Nama Barang 3', 3, 3, 900000),
('BTB00002', 'PRD00007', 'BR0001', 'Nama Barang 1', 3, 3, 300000),
('BTB00002', 'PRD00007', 'BR0002', 'Nama Barang 2', 4, 4, 80000),
('BTB00002', 'PRD00007', 'BR0003', 'Nama Barang 3', 5, 5, 1500000),
('BTB00003', 'PRD00002', 'BR0002', 'Nama Barang 2', 22, 22, 440000),
('BTB00003', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 3300000),
('BTB00003', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 3300000),
('BTB00004', 'PRD00002', 'BR0002', 'Nama Barang 2', 22, 22, 440000),
('BTB00004', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 3740000),
('BTB00004', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 7040000),
('BTB00005', 'PRD00002', 'BR0002', 'Nama Barang 2', 22, 22, 0),
('BTB00005', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 0),
('BTB00005', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 0),
('BTB00006', 'PRD00002', 'BR0002', 'Nama Barang 2', 22, 22, 7040000),
('BTB00006', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 7040000),
('BTB00006', 'PRD00003', 'BR0001', 'Nama Barang 1', 33, 33, 7040000),
('BTB00007', 'PRD00004', 'BR0003', 'Nama Barang 3', 44, 44, 16120000),
('BTB00007', 'PRD00006', 'BR0001', 'Nama Barang 1', 1, 1, 16120000),
('BTB00007', 'PRD00006', 'BR0002', 'Nama Barang 2', 2, 2, 16120000),
('BTB00007', 'PRD00006', 'BR0003', 'Nama Barang 3', 3, 3, 16120000),
('BTB00007', 'PRD00007', 'BR0001', 'Nama Barang 1', 3, 3, 16120000),
('BTB00007', 'PRD00007', 'BR0002', 'Nama Barang 2', 4, 4, 16120000),
('BTB00007', 'PRD00007', 'BR0003', 'Nama Barang 3', 5, 5, 16120000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_btb_hd`
--

CREATE TABLE `tb_btb_hd` (
  `no_btb` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_btb` date DEFAULT NULL,
  `no_po` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_so` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_sj` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kode_suplier` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_suplier` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `alamat_suplier` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_btb_hd`
--

INSERT INTO `tb_btb_hd` (`no_btb`, `tgl_btb`, `no_po`, `no_so`, `no_sj`, `kode_suplier`, `nama_suplier`, `alamat_suplier`) VALUES
('BTB-00001', '2020-01-11', 'PO-00001', '', 'DO-0001', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1'),
('BTB00001', '2020-01-11', 'PO-00002', '', 'DO-0001', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1'),
('BTB00002', '0000-00-00', 'PO-00004', '', 'DO-0002', 'SP0002', 'Nama Suplier 2', 'Alamat Suplier 2'),
('BTB00003', '0000-00-00', 'PO-00001', '', '', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1'),
('BTB00004', '0000-00-00', 'PO-00001', '', '', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1'),
('BTB00005', '0000-00-00', 'PO-00002', '', '', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1'),
('BTB00006', '0000-00-00', 'PO-00002', '', '', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1'),
('BTB00007', '2020-01-24', 'PO-00004', '', '--', 'SP0002', 'Nama Suplier 2', 'Alamat Suplier 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `no_fax` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`kode`, `nama`, `alamat`, `kota`, `pic`, `jabatan`, `jenis`, `no_telp`, `no_fax`, `no_hp`, `email`, `website`) VALUES
('Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 'Jabatan Cut 1', 'PIC Cust 1', 'Jenis Cust 1', '01111', '00001', '010101', 'Email Cust 1', 'Website Cust 1'),
('Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 'Jabatan Cut 2', 'PIC Cust 2', 'Jenis Cust 2', '02222', '00002', '020202', 'Email Cust 2', 'Website Cust 2'),
('Cust0003', 'Nama Cust 3', 'Alamat Cust 3', 'Kota Cust 3', 'Jabatan Cut 3', 'PIC Cust 3', 'Jenis Cust 3', '03333', '00003', '030303', 'Email Cust 3', 'Website Cust 3'),
('Cust0004', 'Nama Cust 4', 'Alamat Cust 4', 'Kota Cust 4', 'Jabatan Cust 4', 'PIC Cust 4', 'Jenis Cust 4', '04444', '040404', '00440044', 'Email CUst 4', 'Website Cust 4'),
('Cust0005', 'Nama Cust 5', 'Alamat Cust 5', 'Kota Cust 5', 'Jabatan Cut 5', 'PIC Cust 5', 'Jenis Cust 5', '055555', '00055', '050505', 'Email Cust 5', 'Website Cust 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice_dtl`
--

CREATE TABLE `tb_invoice_dtl` (
  `no_inv` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode_produk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_produk` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `ukuran_panjang_produk` int(50) DEFAULT NULL,
  `ukuran_lebar_produk` int(50) DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `satuan_produk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sub_total` int(50) DEFAULT NULL,
  `total_all` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice_dtl`
--

INSERT INTO `tb_invoice_dtl` (`no_inv`, `kode_produk`, `nama_produk`, `ukuran_panjang_produk`, `ukuran_lebar_produk`, `qty`, `satuan_produk`, `sub_total`, `total_all`) VALUES
('Inv-00001', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 888000, 3950711),
('Inv-00001', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 3062703, 3950711),
('Inv-00001', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 8, 3950711),
('Inv-00001', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 888000, 3950711),
('Inv-00001', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 3062703, 3950711),
('Inv-00001', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 8, 3950711),
('Inv00001', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 888000, 3950711),
('Inv00001', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 3062703, 3950711),
('Inv00001', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 8, 3950711),
('Inv00002', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 888000, 3950711),
('Inv00002', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 3062703, 3950711),
('Inv00002', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 8, 3950711);

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice_hd`
--

CREATE TABLE `tb_invoice_hd` (
  `no_inv` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_inv` date DEFAULT NULL,
  `kode` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `kota` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `total_qty` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice_hd`
--

INSERT INTO `tb_invoice_hd` (`no_inv`, `tgl_inv`, `kode`, `nama`, `alamat`, `kota`, `total_qty`) VALUES
('Inv-00001', '2020-01-06', 'Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 7),
('Inv00001', '2020-01-23', 'Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 7),
('Inv00002', '2020-01-24', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penawaran`
--

CREATE TABLE `tb_penawaran` (
  `no_pn` varchar(50) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `tanggal_pn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penawaran`
--

INSERT INTO `tb_penawaran` (`no_pn`, `kode`, `nama`, `alamat`, `kota`, `pic`, `no_telp`, `tanggal_pn`) VALUES
('PN0001', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 'Jabatan Cut 2', '02222', '0000-00-00'),
('PN0002', 'Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 'Jabatan Cut 1', '01111', '0000-00-00'),
('PN0003', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 'Jabatan Cut 2', '02222', '0000-00-00'),
('PN0004', 'Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 'Jabatan Cut 1', '01111', '2019-12-20'),
('PN0005', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 'Jabatan Cut 2', '02222', '0000-00-00'),
('PN0006', 'Cust0004', 'Nama Cust 4', 'Alamat Cust 4', 'Kota Cust 4', 'Jabatan Cust 4', '04444', '2020-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penawaran_dtl`
--

CREATE TABLE `tb_penawaran_dtl` (
  `no_pn` varchar(50) NOT NULL,
  `kode_produk` varchar(50) DEFAULT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `ukuran_panjang_produk` int(50) NOT NULL,
  `ukuran_lebar_produk` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `satuan_produk` varchar(50) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `total_all` int(50) NOT NULL,
  `status_so` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penawaran_dtl`
--

INSERT INTO `tb_penawaran_dtl` (`no_pn`, `kode_produk`, `nama_produk`, `ukuran_panjang_produk`, `ukuran_lebar_produk`, `qty`, `satuan_produk`, `harga_produk`, `total`, `total_all`, `status_so`) VALUES
('PN0002', 'PRD00002', 'Nama Produk 2', 22, 222, 2, 'Lebar', 220000, 440000, 0, 0),
('PN0002', 'PRD00003', 'Nama Produk 2', 30, 300, 2, 'Lebar', 3330000, 6660000, 0, 0),
('PN0003', 'PRD00003', 'Nama Produk 2', 30, 300, 3, 'Lebar', 3330000, 9990000, 11766000, 0),
('PN0003', 'PRD00004', 'Nama Produk 4', 44, 444, 4, 'Meter', 444000, 1776000, 11766000, 0),
('PN0004', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 444000, 888000, 3950711, 0),
('PN0004', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 1020901, 3062703, 3950711, 0),
('PN0004', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 4, 8, 3950711, 0),
('PN0005', 'PRD00002', 'Nama Produk 2', 22, 222, 3, 'Lebar', 220000, 660000, 13980000, 0),
('PN0005', 'PRD00003', 'Nama Produk 2', 30, 300, 4, 'Lebar', 3330000, 13320000, 13980000, 0),
('PN0006', 'PRD00004', 'Nama Produk 4', 44, 444, 6, 'Meter', 444000, 2664000, 2664000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_po_dtl`
--

CREATE TABLE `tb_po_dtl` (
  `no_po` varchar(50) DEFAULT NULL,
  `tgl_po` date DEFAULT NULL,
  `no_so` varchar(50) DEFAULT NULL,
  `kode_produk` varchar(50) DEFAULT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(200) DEFAULT NULL,
  `ukuran_panjang_barang` int(50) DEFAULT NULL,
  `ukuran_lebar_barang` int(50) DEFAULT NULL,
  `qty_barang` int(50) DEFAULT NULL,
  `satuan_barang` varchar(50) DEFAULT NULL,
  `sub_total` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_po_dtl`
--

INSERT INTO `tb_po_dtl` (`no_po`, `tgl_po`, `no_so`, `kode_produk`, `kode_barang`, `nama_barang`, `ukuran_panjang_barang`, `ukuran_lebar_barang`, `qty_barang`, `satuan_barang`, `sub_total`) VALUES
('PO-00001', '2020-01-06', 'SO-00001', 'PRD00002', 'BR0002', 'Nama Barang 2', 20, 200, 22, 'ROLL', 440000),
('PO-00001', '2020-01-06', 'SO-00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 'KG', 3300000),
('PO-00001', '2020-01-06', 'SO-00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 'KG', 3300000),
('PO-00002', '2020-01-07', 'SO-00001', 'PRD00002', 'BR0002', 'Nama Barang 2', 20, 200, 22, 'ROLL', 440000),
('PO-00002', '2020-01-07', 'SO-00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 'KG', 3300000),
('PO-00002', '2020-01-07', 'SO-00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 'KG', 3300000),
('PO-00003', '2020-01-07', 'SO-00001', 'PRD00002', 'BR0002', 'Nama Barang 2', 20, 200, 22, 'ROLL', 440000),
('PO-00003', '2020-01-07', 'SO-00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 'KG', 3300000),
('PO-00003', '2020-01-07', 'SO-00001', 'PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 'KG', 3300000),
('PO-00004', '2020-01-07', 'SO-00002', 'PRD00004', 'BR0003', 'Nama Barang 3', 30, 300, 44, 'LBR', 13200000),
('PO-00004', '2020-01-07', 'SO-00002', 'PRD00006', 'BR0001', 'Nama Barang 1', 10, 100, 1, 'KG', 100000),
('PO-00004', '2020-01-07', 'SO-00002', 'PRD00006', 'BR0002', 'Nama Barang 2', 20, 200, 2, 'ROLL', 40000),
('PO-00004', '2020-01-07', 'SO-00002', 'PRD00006', 'BR0003', 'Nama Barang 3', 30, 300, 3, 'LBR', 900000),
('PO-00004', '2020-01-07', 'SO-00002', 'PRD00007', 'BR0001', 'Nama Barang 1', 10, 100, 3, 'KG', 300000),
('PO-00004', '2020-01-07', 'SO-00002', 'PRD00007', 'BR0002', 'Nama Barang 2', 20, 200, 4, 'ROLL', 80000),
('PO-00004', '2020-01-07', 'SO-00002', 'PRD00007', 'BR0003', 'Nama Barang 3', 30, 300, 5, 'LBR', 1500000),
('PO-00005', '0000-00-00', 'SO-00004', 'PRD00004', 'BR0003', 'Nama Barang 3', 30, 300, 44, 'LBR', 13200000),
('PO-00005', '0000-00-00', 'SO-00004', 'PRD00006', 'BR0001', 'Nama Barang 1', 10, 100, 1, 'KG', 100000),
('PO-00005', '0000-00-00', 'SO-00004', 'PRD00006', 'BR0002', 'Nama Barang 2', 20, 200, 2, 'ROLL', 40000),
('PO-00005', '0000-00-00', 'SO-00004', 'PRD00006', 'BR0003', 'Nama Barang 3', 30, 300, 3, 'LBR', 900000),
('PO-00005', '0000-00-00', 'SO-00004', 'PRD00007', 'BR0001', 'Nama Barang 1', 10, 100, 3, 'KG', 300000),
('PO-00005', '0000-00-00', 'SO-00004', 'PRD00007', 'BR0002', 'Nama Barang 2', 20, 200, 4, 'ROLL', 80000),
('PO-00005', '0000-00-00', 'SO-00004', 'PRD00007', 'BR0003', 'Nama Barang 3', 30, 300, 5, 'LBR', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_po_hd`
--

CREATE TABLE `tb_po_hd` (
  `no_po` varchar(50) NOT NULL,
  `tgl_po` date DEFAULT NULL,
  `no_so` varchar(50) DEFAULT NULL,
  `kode_suplier` varchar(50) DEFAULT NULL,
  `nama_suplier` varchar(200) DEFAULT NULL,
  `alamat_suplier` varchar(200) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `alamat_kirim` varchar(200) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `total_all` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_po_hd`
--

INSERT INTO `tb_po_hd` (`no_po`, `tgl_po`, `no_so`, `kode_suplier`, `nama_suplier`, `alamat_suplier`, `no_telp`, `tgl_kirim`, `alamat_kirim`, `email`, `status`, `total_all`) VALUES
('PO-00001', '2020-01-06', 'SO-00001', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1', '0001', '2020-01-07', 'TEST', 'Email Suplier 1', 2, 3300000),
('PO-00002', '2020-01-07', 'SO-00001', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1', '0001', '2020-01-08', 'TEST ', 'Email Suplier 1', 2, 3300000),
('PO-00003', '2020-01-07', 'SO-00001', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1', '0001', '2020-01-11', 'TEST', 'Email Suplier 1', 2, 0),
('PO-00004', '2020-01-07', 'SO-00002', 'SP0002', 'Nama Suplier 2', 'Alamat Suplier 2', '0002', '2020-01-11', 'TEST', 'Email Suplier 2', 2, 16120000),
('PO-00005', '0000-00-00', 'SO-00004', 'SP0001', 'Nama Suplier 1', 'Alamat Suplier 1', '0001', '0000-00-00', 'test doang', 'Email Suplier 1', 2, 16120000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_dtl`
--

CREATE TABLE `tb_produk_dtl` (
  `kode_produk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode_barang` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_barang` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `ukuran_panjang_barang` int(50) DEFAULT NULL,
  `ukuran_lebar_barang` int(50) DEFAULT NULL,
  `qty_barang` int(50) DEFAULT NULL,
  `harga_barang` int(50) DEFAULT NULL,
  `jenis_barang` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `satuan_barang` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `total_all` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_dtl`
--

INSERT INTO `tb_produk_dtl` (`kode_produk`, `kode_barang`, `nama_barang`, `ukuran_panjang_barang`, `ukuran_lebar_barang`, `qty_barang`, `harga_barang`, `jenis_barang`, `satuan_barang`, `total`, `total_all`) VALUES
('PRD00001', 'BR0002', 'Nama Barang 2', 20, 200, 22, 20000, 'jenis barang 2', 'ROLL', 440000, 10340000),
('PRD00001', 'BR0003', 'Nama Barang 3', 30, 300, 33, 300000, 'jenis barang 3', 'LBR', 9900000, 10340000),
('PRD00002', 'BR0002', 'Nama Barang 2', 20, 200, 22, 20000, 'jenis barang 2', 'ROLL', 440000, 440000),
('PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 100000, 'jenis barang 1', 'KG', 3300000, 3300000),
('PRD00003', 'BR0001', 'Nama Barang 1', 10, 100, 33, 100000, 'jenis barang 1', 'KG', 3300000, 3300000),
('PRD00004', 'BR0003', 'Nama Barang 3', 30, 300, 44, 300000, 'jenis barang 3', 'LBR', 13200000, 13200000),
('PRD00005', 'BR0002', 'Nama Barang 2', 20, 200, 3, 20000, 'jenis barang 2', 'ROLL', 60000, 960000),
('PRD00005', 'BR0003', 'Nama Barang 3', 30, 300, 3, 300000, 'jenis barang 3', 'LBR', 900000, 960000),
('PRD00006', 'BR0001', 'Nama Barang 1', 10, 100, 1, 100000, 'jenis barang 1', 'KG', 100000, 1040000),
('PRD00006', 'BR0002', 'Nama Barang 2', 20, 200, 2, 20000, 'jenis barang 2', 'ROLL', 40000, 1040000),
('PRD00006', 'BR0003', 'Nama Barang 3', 30, 300, 3, 300000, 'jenis barang 3', 'LBR', 900000, 1040000),
('PRD00007', 'BR0001', 'Nama Barang 1', 10, 100, 3, 100000, 'jenis barang 1', 'KG', 300000, 1880000),
('PRD00007', 'BR0002', 'Nama Barang 2', 20, 200, 4, 20000, 'jenis barang 2', 'ROLL', 80000, 1880000),
('PRD00007', 'BR0003', 'Nama Barang 3', 30, 300, 5, 300000, 'jenis barang 3', 'LBR', 1500000, 1880000),
('PRD00009', 'BR0001', 'Nama Barang 1', 10, 100, 91, 100000, 'jenis barang 1', 'KG', 9100000, 10920000),
('PRD00009', 'BR0002', 'Nama Barang 2', 20, 200, 91, 20000, 'jenis barang 2', 'ROLL', 1820000, 10920000),
('PRD00010', 'BR0004', 'Nama Barang 4', 40, 400, 5, 400000, 'jenis barang 4', 'LBR', 2000000, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_hd`
--

CREATE TABLE `tb_produk_hd` (
  `kode_produk` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_produk` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `ukuran_panjang_produk` int(50) DEFAULT NULL,
  `ukuran_lebar_produk` int(50) DEFAULT NULL,
  `satuan_produk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `harga_produk` int(50) DEFAULT NULL,
  `total_all` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_hd`
--

INSERT INTO `tb_produk_hd` (`kode_produk`, `nama_produk`, `ukuran_panjang_produk`, `ukuran_lebar_produk`, `satuan_produk`, `harga_produk`, `total_all`) VALUES
('PRD00001', 'Nama Produk 1', 10, 100, 'Meter', 1000000, 10340000),
('PRD00002', 'Nama Produk 2', 22, 222, 'Lebar', 220000, 440000),
('PRD00003', 'Nama Produk 2', 30, 300, 'Lebar', 3330000, 3300000),
('PRD00004', 'Nama Produk 4', 44, 444, 'Meter', 444000, 13200000),
('PRD00005', '', 0, 0, '', 0, 960000),
('PRD00006', 'Nama Produk 6', 83, 92, 'Meter', 1020901, 1040000),
('PRD00007', 'Nama Produk 1 Ety', 5, 6, 'Meter', 4, 1880000),
('PRD00008', '', 0, 0, '', 0, 0),
('PRD00009', 'Nama Produk 9', 99, 990, 'KG', 90999, 10920000),
('PRD00010', 'Nama Produk 10', 100, 1000, 'Meter', 1000000, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sj_dtl`
--

CREATE TABLE `tb_sj_dtl` (
  `no_sj` varchar(50) DEFAULT NULL,
  `kode_produk` varchar(50) DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `ukuran_panjang_produk` int(50) DEFAULT NULL,
  `ukuran_lebar_produk` int(50) DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `satuan_produk` varchar(50) DEFAULT NULL,
  `sub_total` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sj_dtl`
--

INSERT INTO `tb_sj_dtl` (`no_sj`, `kode_produk`, `nama_produk`, `ukuran_panjang_produk`, `ukuran_lebar_produk`, `qty`, `satuan_produk`, `sub_total`) VALUES
('SJ-00001', 'PRD00002', 'Nama Produk 2', 22, 222, 3, 'Lebar', 660000),
('SJ-00001', 'PRD00003', 'Nama Produk 2', 30, 300, 4, 'Lebar', 13320000),
('SJ-00002', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 888000),
('SJ-00002', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 3062703),
('SJ-00002', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 8),
('SJ-00003', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 888000),
('SJ-00003', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 3062703),
('SJ-00003', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sj_hd`
--

CREATE TABLE `tb_sj_hd` (
  `no_sj` varchar(50) NOT NULL,
  `tgl_sj` date DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `total_qty` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sj_hd`
--

INSERT INTO `tb_sj_hd` (`no_sj`, `tgl_sj`, `kode`, `nama`, `alamat`, `kota`, `total_qty`) VALUES
('SJ-00001', '2019-12-29', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 7),
('SJ-00002', '0000-00-00', 'Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 7),
('SJ-00003', '2020-01-06', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_so_dtl`
--

CREATE TABLE `tb_so_dtl` (
  `no_so` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kode_produk` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama_produk` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ukuran_panjang_produk` int(50) NOT NULL,
  `ukuran_lebar_produk` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `satuan_produk` varchar(50) CHARACTER SET latin1 NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `total_all` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_so_dtl`
--

INSERT INTO `tb_so_dtl` (`no_so`, `kode_produk`, `nama_produk`, `ukuran_panjang_produk`, `ukuran_lebar_produk`, `qty`, `satuan_produk`, `harga_produk`, `total`, `total_all`) VALUES
('SO-00001', 'PRD00002', 'Nama Produk 2', 22, 222, 3, 'Lebar', 220000, 660000, 13980000),
('SO-00001', 'PRD00003', 'Nama Produk 2', 30, 300, 4, 'Lebar', 3330000, 13320000, 13980000),
('SO-00002', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 444000, 888000, 13980000),
('SO-00002', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 1020901, 3062703, 13980000),
('SO-00002', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 4, 8, 13980000),
('SO-00003', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 444000, 888000, 3950711),
('SO-00003', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 1020901, 3062703, 3950711),
('SO-00003', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 4, 8, 3950711),
('SO-00004', 'PRD00004', 'Nama Produk 4', 44, 444, 2, 'Meter', 444000, 888000, 3950711),
('SO-00004', 'PRD00006', 'Nama Produk 6', 83, 92, 3, 'Meter', 1020901, 3062703, 3950711),
('SO-00004', 'PRD00007', 'Nama Produk 1 Ety', 5, 6, 2, 'Meter', 4, 8, 3950711);

-- --------------------------------------------------------

--
-- Table structure for table `tb_so_hd`
--

CREATE TABLE `tb_so_hd` (
  `no_so` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_so` date DEFAULT NULL,
  `no_pn` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `kota` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_so_hd`
--

INSERT INTO `tb_so_hd` (`no_so`, `tgl_so`, `no_pn`, `kode`, `nama`, `alamat`, `kota`, `status`) VALUES
('SO-00001', '2019-12-28', 'PN0005', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 1),
('SO-00002', '2019-12-27', 'PN0004', 'Cust0002', 'Nama Cust 2', 'Alamat Cust 2', 'Kota Cust 2', 1),
('SO-00003', '2019-12-29', 'PN0004', 'Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 1),
('SO-00004', '2020-01-24', 'PN0004', 'Cust0001', 'Nama Cust 1', 'Alamat Cust 1', 'Kota Cust 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `kode_suplier` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_suplier` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `alamat_suplier` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `no_telp` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_suplier`
--

INSERT INTO `tb_suplier` (`kode_suplier`, `nama_suplier`, `alamat_suplier`, `no_telp`, `email`) VALUES
('SP0001', 'Nama Suplier 1', 'Alamat Suplier 1', '0001', 'Email Suplier 1'),
('SP0002', 'Nama Suplier 2', 'Alamat Suplier 2', '0002', 'Email Suplier 2'),
('SP0003', 'Nama Suplier 3', 'Alamat Suplier 3', '0003', 'Email Suplier 3'),
('SP0004', 'Nama Suplier 4', 'Alamat Suplier 4', '04444', 'Email Suplier4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`no_account`);

--
-- Indexes for table `tb_ap_dtl`
--
ALTER TABLE `tb_ap_dtl`
  ADD KEY `no_ap` (`no_ap`),
  ADD KEY `no_btb` (`no_btb`);

--
-- Indexes for table `tb_ap_hd`
--
ALTER TABLE `tb_ap_hd`
  ADD PRIMARY KEY (`no_ap`);

--
-- Indexes for table `tb_ar_dtl`
--
ALTER TABLE `tb_ar_dtl`
  ADD KEY `no_ar` (`no_ar`),
  ADD KEY `no_inv` (`no_inv`);

--
-- Indexes for table `tb_ar_hd`
--
ALTER TABLE `tb_ar_hd`
  ADD PRIMARY KEY (`no_ar`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_btb_dtl`
--
ALTER TABLE `tb_btb_dtl`
  ADD KEY `no_btb` (`no_btb`);

--
-- Indexes for table `tb_btb_hd`
--
ALTER TABLE `tb_btb_hd`
  ADD PRIMARY KEY (`no_btb`),
  ADD KEY `no_po` (`no_po`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_invoice_dtl`
--
ALTER TABLE `tb_invoice_dtl`
  ADD KEY `no_inv` (`no_inv`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `tb_invoice_hd`
--
ALTER TABLE `tb_invoice_hd`
  ADD PRIMARY KEY (`no_inv`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  ADD PRIMARY KEY (`no_pn`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `tb_penawaran_dtl`
--
ALTER TABLE `tb_penawaran_dtl`
  ADD KEY `no_pn` (`no_pn`),
  ADD KEY `no_pn_2` (`no_pn`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `tb_po_dtl`
--
ALTER TABLE `tb_po_dtl`
  ADD KEY `no_po` (`no_po`),
  ADD KEY `no_so` (`no_so`),
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_po_hd`
--
ALTER TABLE `tb_po_hd`
  ADD PRIMARY KEY (`no_po`),
  ADD KEY `no_so` (`no_so`),
  ADD KEY `kode_suplier` (`kode_suplier`);

--
-- Indexes for table `tb_produk_dtl`
--
ALTER TABLE `tb_produk_dtl`
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_produk_hd`
--
ALTER TABLE `tb_produk_hd`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tb_sj_dtl`
--
ALTER TABLE `tb_sj_dtl`
  ADD KEY `no_sj` (`no_sj`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `tb_sj_hd`
--
ALTER TABLE `tb_sj_hd`
  ADD PRIMARY KEY (`no_sj`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `tb_so_dtl`
--
ALTER TABLE `tb_so_dtl`
  ADD KEY `no_so` (`no_so`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `tb_so_hd`
--
ALTER TABLE `tb_so_hd`
  ADD PRIMARY KEY (`no_so`),
  ADD KEY `no_pn` (`no_pn`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`kode_suplier`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ap_dtl`
--
ALTER TABLE `tb_ap_dtl`
  ADD CONSTRAINT `fk_ap_dtl_btb_hd` FOREIGN KEY (`no_btb`) REFERENCES `tb_btb_hd` (`no_btb`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ap_dtl_hd` FOREIGN KEY (`no_ap`) REFERENCES `tb_ap_hd` (`no_ap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ar_dtl`
--
ALTER TABLE `tb_ar_dtl`
  ADD CONSTRAINT `fk_ar_dtl_hd` FOREIGN KEY (`no_ar`) REFERENCES `tb_ar_hd` (`no_ar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ar_dtl_inv` FOREIGN KEY (`no_inv`) REFERENCES `tb_invoice_hd` (`no_inv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_btb_dtl`
--
ALTER TABLE `tb_btb_dtl`
  ADD CONSTRAINT `fk_btb_dtl_hd` FOREIGN KEY (`no_btb`) REFERENCES `tb_btb_hd` (`no_btb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_btb_hd`
--
ALTER TABLE `tb_btb_hd`
  ADD CONSTRAINT `fk_btb_po` FOREIGN KEY (`no_po`) REFERENCES `tb_po_hd` (`no_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_invoice_dtl`
--
ALTER TABLE `tb_invoice_dtl`
  ADD CONSTRAINT `fk_invoice_dtl_hd` FOREIGN KEY (`no_inv`) REFERENCES `tb_invoice_hd` (`no_inv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invoice_dtl_produk` FOREIGN KEY (`kode_produk`) REFERENCES `tb_produk_hd` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_invoice_hd`
--
ALTER TABLE `tb_invoice_hd`
  ADD CONSTRAINT `fk_invoice_hd_customer` FOREIGN KEY (`kode`) REFERENCES `tb_customer` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  ADD CONSTRAINT `fk_penawaran_customer` FOREIGN KEY (`kode`) REFERENCES `tb_customer` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penawaran_dtl`
--
ALTER TABLE `tb_penawaran_dtl`
  ADD CONSTRAINT `fk_penawaran_dtl_penawaran` FOREIGN KEY (`no_pn`) REFERENCES `tb_penawaran` (`no_pn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penawaran_dtl_produk_hd` FOREIGN KEY (`kode_produk`) REFERENCES `tb_produk_hd` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_po_dtl`
--
ALTER TABLE `tb_po_dtl`
  ADD CONSTRAINT `fk_po_dtl_hd` FOREIGN KEY (`no_po`) REFERENCES `tb_po_hd` (`no_po`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_dtl_produk_dtl_kode_barang` FOREIGN KEY (`kode_barang`) REFERENCES `tb_produk_dtl` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_dtl_produk_dtl_kode_produk` FOREIGN KEY (`kode_produk`) REFERENCES `tb_produk_dtl` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_dtl_so_dtl` FOREIGN KEY (`no_so`) REFERENCES `tb_so_dtl` (`no_so`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_po_hd`
--
ALTER TABLE `tb_po_hd`
  ADD CONSTRAINT `fk_po_hd_so_dtl` FOREIGN KEY (`no_so`) REFERENCES `tb_so_dtl` (`no_so`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_hd_suplier` FOREIGN KEY (`kode_suplier`) REFERENCES `tb_suplier` (`kode_suplier`);

--
-- Constraints for table `tb_produk_dtl`
--
ALTER TABLE `tb_produk_dtl`
  ADD CONSTRAINT `fk_produk_dtl_barang` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produk_dtl_hd` FOREIGN KEY (`kode_produk`) REFERENCES `tb_produk_hd` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sj_dtl`
--
ALTER TABLE `tb_sj_dtl`
  ADD CONSTRAINT `fk_sj_dtl_hd` FOREIGN KEY (`no_sj`) REFERENCES `tb_sj_hd` (`no_sj`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sj_dtl_produk_hd` FOREIGN KEY (`kode_produk`) REFERENCES `tb_produk_hd` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sj_hd`
--
ALTER TABLE `tb_sj_hd`
  ADD CONSTRAINT `fk_sj_hd_customer` FOREIGN KEY (`kode`) REFERENCES `tb_customer` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_so_dtl`
--
ALTER TABLE `tb_so_dtl`
  ADD CONSTRAINT `fk_so_dtl_hd` FOREIGN KEY (`no_so`) REFERENCES `tb_so_hd` (`no_so`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_so_dtl_produk` FOREIGN KEY (`kode_produk`) REFERENCES `tb_produk_hd` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_so_hd`
--
ALTER TABLE `tb_so_hd`
  ADD CONSTRAINT `fk_so_customer` FOREIGN KEY (`kode`) REFERENCES `tb_customer` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_so_penawaran` FOREIGN KEY (`no_pn`) REFERENCES `tb_penawaran` (`no_pn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
