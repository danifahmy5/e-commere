-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jul 2019 pada 00.29
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
-- Database: `tugasbesar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`banner_id`, `banner`, `gambar`, `link`, `status`) VALUES
(1, 'Apple Iphone 6', 'banner1.png', 'index.php?page=detail&barang_id=5', 'on'),
(2, 'Samsung A3 A300H', 'banner2.png', 'index.php?page=detail&barang_id=6', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(10) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `spesifikasi` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` tinyint(1) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `spesifikasi`, `gambar`, `harga`, `stok`, `status`) VALUES
(1, 1, 'Galaxy Note 3', 'Layar 5.7\", 16GB Memori <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'samsung-galaxy-note-3.png', 7800000, 9, 'on'),
(2, 1, 'lenovo A7000 Dual SIM', 'Layar 5.5\", 8GB Memori <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'Lenovo-A7000.png', 2200000, 10, 'on'),
(3, 1, 'Mi 4i', 'Layar 5\", 16GB Memori <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\r\n</p>', 'mi-4i.png', 2800000, 1, 'on'),
(4, 1, 'Samsung Grand Prime', 'Layar 5\", 8GB Memori <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'samsung-galaxy-grand-prime.png', 2250000, 9, 'on'),
(5, 1, 'Apple iPhone 6', '<p>Layar 4,7&quot;, 128GB Memori</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p><p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.</p>', 'iphone-6-silver.png', 12700000, 2, 'on'),
(6, 1, 'Samsung A3 A300H', 'Layar 4.5\", 16GB Memori <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'Samsung Galaxy-A3.png', 2900000, 6, 'on'),
(7, 1, 'Samsung Galaxy A8', 'Layar 5.7\", 32GB Memori <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'samsung-galaxy-A8.png', 6134000, 5, 'on'),
(8, 1, 'Asus Zenfone C ZC451CG', 'Layar 4.5\", 8GB Memori <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'asus-zenfone.png', 1325000, 3, 'on'),
(9, 3, 'Nikon D5200 Lensa Kit 18-55mm', 'Layar 3\", 24.1 MP <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'nikon-d5200.png', 6000000, 9, 'on'),
(10, 3, 'Nikon D3200 Lensa Kit VR II 18-55mm', 'Layar 3\", 24.1 MP <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'nikon-d3200.png', 4800000, 4, 'on'),
(11, 3, 'Canon Eos 750D Kit 18-55mm IS STM', 'Layar 3\", 24 MP <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'canon-eos-750d.png', 10100000, 2, 'on'),
(12, 3, 'Canon EOS 700D 18.0 MP 18-55mm IS STM', 'Layar 3\", 18 MP <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'canon-eos-700d.png', 7250000, 9, 'on'),
(13, 2, 'LG 32\" LED TV - 32LF550A', 'Layar 32\", Triple XD Engine <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'lg-32-led-tv-32LF550A.png', 2700000, 8, 'on'),
(14, 2, 'LG LED TV 32\" - 32LF520A', 'Layar 32\" <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'lg-led-tv32-32LF520A.png', 2750000, 3, 'on'),
(15, 2, 'Sharp 32\" LED LC-32LE265i', 'Layar 32\" <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis aliquam sagittis. Aliquam tristique neque elit, at ullamcorper ante sollicitudin quis. Fusce dictum sollicitudin aliquam. Aenean ut mi pretium, porta leo eget, consectetur nulla. Cras ut turpis ullamcorper, pharetra mi interdum, varius velit. Donec sagittis urna et dolor fringilla, fringilla hendrerit sapien vulputate. Nulla vel commodo leo. Ut sit amet eleifend nisl, vitae dictum tortor. Praesent ac vestibulum erat. Sed nec ligula vitae dui ornare vulputate. Vestibulum ante sem, elementum nec vestibulum in, pretium vitae arcu. Aenean ultricies commodo bibendum. Proin tempus, erat eget euismod luctus, lorem sapien laoreet ipsum, ut scelerisque ante mi non erat. Integer efficitur semper massa.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget feugiat felis. Donec aliquam odio arcu, ac sollicitudin nisi volutpat vitae. Nulla facilisi. Nam ex leo, molestie nec augue id, rutrum cursus enim. Nullam tempus iaculis velit. Praesent feugiat velit faucibus magna tristique sollicitudin. Mauris eu lectus velit. Phasellus sagittis diam velit, a hendrerit risus euismod at. Nullam at dignissim massa, vitae facilisis eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida sagittis hendrerit. Cras id arcu ornare sem feugiat malesuada quis auctor orci. Curabitur euismod finibus sagittis.\n</p>', 'sharp-32-led-32LE265i.png', 2750000, 7, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(1, 'Smartphone', 'on'),
(2, 'Televisi', 'on'),
(3, 'Kamera', 'on'),
(4, 'Radio', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(10) NOT NULL,
  `pesanan_id` int(10) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `tanggal_transfer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`konfirmasi_id`, `pesanan_id`, `nomor_rekening`, `nama_account`, `tanggal_transfer`) VALUES
(1, 2, '0008888', 'Jeong', '2016-06-19'),
(2, 3, '0008888', 'Lee', '2016-06-19'),
(3, 4, '0008888', 'Jeong', '2016-06-19'),
(4, 6, '09876666', 'dani', '2018-11-13'),
(5, 7, '09876666', 'dani', '2018-11-06'),
(6, 8, '09876543', 'dRos', '2018-11-19'),
(7, 9, '12345678', 'dRos', '2018-11-17'),
(8, 10, '0986377', 'dRos', '2018-11-15'),
(9, 12, '0987666', 'ros', '2018-12-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(10) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `tarif` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `kota`, `tarif`, `status`) VALUES
(1, 'Jakarta', 6000, 'on'),
(2, 'Bandung', 8000, 'on'),
(3, 'Surabaya', 11000, 'on'),
(4, 'Semarang', 9000, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(10) NOT NULL,
  `kota_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `kota_id`, `user_id`, `nama_penerima`, `nomor_telepon`, `alamat`, `tanggal_pemesanan`, `status`) VALUES
(2, 2, 2, 'Jeong', '00000', 'Jl. XXXXX', '2016-10-08 06:11:24', 1),
(3, 3, 6, 'Lee', '0000', 'Jl. aaaa', '2016-10-08 10:48:45', 2),
(4, 1, 6, 'Lee', '0000', 'Jl. AAA', '2016-10-08 12:01:55', 2),
(5, 1, 7, 'dani', '08561767263', 'jajar sukosewu bojonegoro', '2018-11-23 04:01:00', 0),
(6, 1, 7, 'dani', '0987666', 'jajar sukosewu', '2018-11-23 06:43:00', 2),
(7, 3, 8, 'ros', '0987666', 'sukosewi', '2018-11-23 07:00:00', 2),
(8, 3, 2, 'fahmy', '085649434331', 'jajar sukosewu bojonegoro rt27 rw03', '2018-11-23 16:15:00', 1),
(9, 1, 7, 'tya', '08676364728', 'jajar sukosewu bojonegoro', '2018-11-23 16:17:00', 1),
(10, 1, 9, 'tya', '086755372727', 'jl.xxxxx', '2018-11-24 01:42:00', 2),
(11, 3, 7, 'dani', '08163721762', 'jl.xxxx', '2018-12-03 09:08:00', 0),
(12, 3, 7, 'dani fahmy rosyid', '08563498992', 'jajar sukosewu Surabaya rt:27 rw:03', '2018-12-05 10:48:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_id`, `barang_id`, `quantity`, `harga`) VALUES
(2, 6, 1, 2900000),
(2, 5, 1, 12700000),
(3, 13, 1, 2700000),
(3, 1, 1, 7800000),
(3, 11, 1, 10100000),
(4, 7, 2, 6134000),
(4, 12, 1, 7250000),
(5, 11, 2, 10100000),
(6, 9, 1, 6000000),
(7, 4, 1, 2250000),
(8, 4, 2, 2250000),
(8, 9, 3, 6000000),
(9, 14, 1, 2750000),
(10, 15, 3, 2750000),
(11, 8, 1, 1325000),
(12, 12, 3, 7250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(160) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `email`, `alamat`, `phone`, `password`, `status`) VALUES
(2, 'superadmin', 'admin', 'admin@weshop.com', 'jl weshop', '08889999', '81dc9bdb52d04dc20036dbd8313ed055', 'on'),
(6, 'customer', 'customer', 'customer1@aaa.com', 'jl.Customer Weshop', '088888', '5f4dcc3b5aa765d61d8327deb882cf99', 'on'),
(7, 'custemer', 'dani fahmy', 'ros@gmail.com', 'jl.xxx', '0876244155', '81dc9bdb52d04dc20036dbd8313ed055', 'on'),
(8, 'custemer', 'dani', 'danifahmy5@gmail.com', 'jl.xxx', '0876244155', '81dc9bdb52d04dc20036dbd8313ed055', 'on'),
(9, 'custemer', 'sdasd', 'dros@gmail.com', 'jl.xxxxx', '09182217627', '81dc9bdb52d04dc20036dbd8313ed055', 'on'),
(10, 'customer', 'dani', 'danifa@gmail.com', 'jajar', '0857232312', '202cb962ac59075b964b07152d234b70', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `kota_id` (`kota_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
