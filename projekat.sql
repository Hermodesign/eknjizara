-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 08:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(3) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresa` varchar(100) DEFAULT NULL,
  `grad` varchar(40) DEFAULT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `broj` varchar(6) DEFAULT NULL,
  `privilegija` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `username`, `password`, `email`, `adresa`, `grad`, `telefon`, `broj`, `privilegija`) VALUES
(13, 'Nikola Mitic', 'nikola', '$2y$10$OIxKOgJ.T7tLZm7tBbQF8.VjXf7n8QPN0VsUI.CJsFHa4m0V/xYBe', 'hermodesign@gmail.com', 'Silovo', 'Gnjilane', '382525552', '38252', 0),
(14, 'Nikola Mitic', 'hermodesign', '$2y$10$dMVCGowhVTujz5/z64is2OPMl1QFFa0KiL9beNRoSG8eOC.J.6tvm', 'alokin_gl@hotmail.com', 'Silovo', 'Gnjilane', '06553410496', '38252', 0);

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

CREATE TABLE `porudzbine` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_proizvoda` int(5) NOT NULL,
  `kolicina` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `cena` int(5) NOT NULL,
  `opis` varchar(500) NOT NULL,
  `popust` int(5) NOT NULL,
  `kolicina` int(3) NOT NULL,
  `slika` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `cena`, `opis`, `popust`, `kolicina`, `slika`) VALUES
(1, 'Čovečanstvo', 1099, '„Ova knjiga me je navela da sagledam čovečanstvo iz sasvim novog ugla i da preispitam mnoga davno prihvaćena uverenja. Toplo je preporučujem svima.“', 20, 40, 'proizvod01.jpg'),
(2, 'Neočekivana braća', 799, '„Složeni triler koji je intrigantan na više nivoa.“\r\n– L\'Orient Littéraire', 0, 65, 'proizvod02.jpg'),
(3, 'Čovek iz nehata', 989, 'Čovek iz nehata je priča o Beograđaninu koji uporno beži od sukoba sa ocem, od Majčice Es, a ponajviše od sebe.', 5, 15, 'proizvod03.jpg'),
(4, 'Biblija', 630, '„Novi zavet beogradskog antihrista!“ Marko Vidojković', 0, 23, 'proizvod04.jpg'),
(5, 'Fric i Dobrila', 756, 'NOVA KNJIGA SRĐANA VALJAREVIĆA DECENIJU I PO NAKON PROSLAVLJENOG ROMANA „KOMO“!', 0, 20, 'proizvod05.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `porudzbine`
--
ALTER TABLE `porudzbine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
