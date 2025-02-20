-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 04:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_website`
--
CREATE DATABASE IF NOT EXISTS `shopping_website` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shopping_website`;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'kunal', 'kunal@gmail.com', 'its user experience is outstanding', '2025-02-02 18:20:57'),
(2, 'Prem Bhunjwa', 'gprem6783@gmail.com', 'best experience ', '2025-02-02 19:58:25'),
(3, 'anam ', 'anam@anam.com', 'hello guys\r\n', '2025-02-03 05:31:27'),
(4, 'nancy ', 'nancy@nancy.com', 'hello nancy ', '2025-02-04 15:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending Payment',
  `payment_proof` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `city`, `state`, `zip`, `country`, `total`, `order_date`, `payment_method`, `status`, `payment_proof`) VALUES
(1, 'Prem Bhunjwa', 'gprem6783@gmail.com', '555555555556', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 899.00, '2025-02-10 06:27:56', 'UPI', 'Confirmed', 'WhatsApp Image 2025-02-07 at 15.13.08_0ac0d294.jpg'),
(2, 'Prem Bhunjwa', 'gprem6783@gmail.com', '666666665', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 06:43:09', 'Cash on Delivery', 'Pending Payment', NULL),
(3, 'Prem Bhunjwa', 'gprem6783@gmail.com', '666666665', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 06:44:04', 'UPI', 'Confirmed', 'screen.png'),
(4, 'Prem Bhunjwa', 'gprem6783@gmail.com', '888888855', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 06:49:47', 'Cash on Delivery', 'Pending Payment', NULL),
(5, 'Prem Bhunjwa', 'gprem6783@gmail.com', '888888855', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 06:50:07', 'UPI', 'Confirmed', 'Screenshot (2).png'),
(6, 'manoj bhunjwa', 'gprem6783@gmail.com', '4820011212121', '035 sarkari kua gautam nagar ghamapur', 'ग्राम/शहर चुनिये', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 12:23:45', 'UPI', 'Confirmed', 'screen.png'),
(7, 'Prem Bhunjwa', 'gprem6783@gmail.com', '55555556', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 12:33:12', 'Cash on Delivery', 'Pending Payment', NULL),
(8, 'Prem Bhunjwa', 'gprem6783@gmail.com', '55555556', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 12:35:07', 'Cash on Delivery', 'Pending Payment', NULL),
(9, 'Prem Bhunjwa', 'gprem6783@gmail.com', '55555556', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 12:35:13', 'UPI', 'Pending Payment', NULL),
(10, 'Prem Bhunjwa', 'gprem6783@gmail.com', '55555556', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59000.00, '2025-02-10 12:35:25', 'Cash on Delivery', 'Confirmed', NULL),
(11, 'seemaaa', 'seema@seema.com', '2558565655', 'rampur', 'satna', 'mp ', '0011', '0', 59000.00, '2025-02-10 12:42:01', 'UPI', 'Confirmed', 'screen.png'),
(12, 'Prem Bhunjwa', 'prem@prem.com', '6666665', 'Ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59899.00, '2025-02-10 12:44:28', 'UPI', 'Rejected', 'screen.png'),
(13, 'Prem guptaaa', 'prem@prem.com', '6666665', 'Ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 59899.00, '2025-02-10 12:49:46', 'UPI', 'Confirmed', 'Screenshot (2).png'),
(14, 'Prem Bhunjwa', 'gprem6783@gmail.com', '8103107158', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 90899.00, '2025-02-10 12:56:51', 'Cash on Delivery', 'Confirmed', NULL),
(15, 'premg ', 'gprem6783@gmail.com', '9399143925', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 90899.00, '2025-02-10 12:57:19', 'UPI', 'Confirmed', 'screen.png'),
(16, 'manoj ', 'gprem6783@gmail.com', '9999999998', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 60699.00, '2025-02-10 13:07:08', 'Cash on Delivery', 'Confirmed', NULL),
(17, 'manoj ', 'gprem6783@gmail.com', '9999999998', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 60699.00, '2025-02-10 13:07:14', 'UPI', 'Confirmed', 'Screenshot (2).png'),
(18, 'Prem Bhunjwa', 'gprem6783@gmail.com', '482001', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 62398.00, '2025-02-10 15:28:25', 'UPI', 'Pending Payment', NULL),
(19, 'Prem Bhunjwa', 'gprem6783@gmail.com', '482001', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 62398.00, '2025-02-10 15:31:28', 'UPI', 'Confirmed', '12.png'),
(20, 'sonali gupta', 'spnali@gupta.com', '32547985124', 'Ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 62897.00, '2025-02-10 15:53:29', 'UPI', 'Rejected', 'Screenshot (2).png'),
(21, 'naveen', 'naveen@naveen.com', '888896524', 'bombay nagar', 'mumbai', 'maharashtra', '6552', '0', 62897.00, '2025-02-10 16:05:51', 'UPI', 'Rejected', 'Screenshot (2).png'),
(22, 'yash', 'yash@yash.com', '6666652222', 'kachghar', 'jabalpur', 'mp', '6552', '0', 1100.00, '2025-02-10 16:13:31', 'UPI', 'Confirmed', 'Screenshot (2).png'),
(23, 'Prembhai ', 'gprem6783@gmail.com', '456454', 'sarkari kua bai ka baghicha ghamapur', 'Jabalpur', 'Madhya Pradesh', '482001', '0', 1100.00, '2025-02-10 16:16:49', 'Cash on Delivery', 'Confirmed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'manoj@manoj.com', '5ac28c97a0b64e35d46042f323b644f666667fc5f738b36648de34b1b3e6456c7c463367fb79d5c9cb805354ec1af970904f', '2025-02-07 00:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Moto Buds ', 1999.00, 'images/buds1.png', 'Large 12.4mm dynamic driver with Hi-Res Audio certified and triple mic for clear vocals. Enhanced Bass and Clear Audio with Segment leading 50dB Dynamic Active Noise Cancellation.'),
(2, 'realmi buds', 1999.00, 'images/buds2.png', 'Truly Wireless in-Ear Earbuds with 50dB ANC, 12.4mm Mega Titanized Dynamic Bass Driver, Upto 38Hrs Battery with Fast Charging & 45ms Ultra-Low Latency'),
(3, 'Boat 71', 899.00, 'images/boat71.png', 'Experience uninterrupted music with boAt Airdopes 71 Wireless Earbuds featuring 40 Hours Playback, 6mm Drivers, ENx™ Technology, BEAST™ Mode, ASAP™'),
(4, 'Bose QuietComfort', 35990.00, 'images/headphone3.png', 'Bose New QuietComfort Ultra Wireless Noise Cancelling Headphones with Spatial Audio, Over-The-Ear Headphones with Mic, Up to 24 Hours of Battery Life, Sandstone - Limited Edition'),
(5, 'Apple AirPods Max', 59000.00, 'images/headphone1.png', 'Wireless Over-Ear Headphones, Pro-Level Active Noise Cancellation, Transparency Mode, Personalised Spatial Audio, USB-C Charging, Bluetooth Headphones for iPhone - Blue'),
(6, 'Sony WH-1000XM5', 31000.00, 'images/headphone2.png', 'Best Active Noise Cancelling Wireless Bluetooth Over Ear Headphones with Mic for Clear Calling, up to 40 Hours Battery -Black'),
(7, 'Oneplus Bullets Z2', 1499.00, 'images/band1.png', 'Bluetooth Wireless in Ear Earphones with Mic, Bombastic Bass - 12.4 mm Drivers, 10 Mins Charge - 20 Hrs Music, 30 Hrs Battery Life, IP55 Dust and Water Resistant (Magico Black)'),
(8, 'Sony WI-XB400', 1699.00, 'images/band2.png', ' Wireless Extra Bass in-Ear Headphones with 15 hrs Battery, Quick Charge, Magnetic Earbuds, Tangle Free Cord, BT Ver 5.0, Work from home,Bluetooth Headset with Mic for Phone Calls (Blue)'),
(9, 'boAt Rockerz 205 neo', 1100.00, 'images/band3.png', '40HRS Battery, Fast Charge, IPX7, Dual Pairing, Low Latency, Magnetic Earbuds, Bluetooth Neckband, Wireless with Mic Earphones (Active .black)'),
(10, 'boAt Stone 580 ', 20000.00, 'images/speaker1.png', 'Bluetooth Speaker with 12W RMS Stereo Sound, LED Lights, Up to 8 HRS Playtime, TWS Feature, FM Radio, Multi-Compatibility Mode, IPX4(Midnight Black)\r\n3.7 out of 5 stars 1,008'),
(11, 'Zebronics ZEB-COUNTY', 499.00, 'images/speaker2.png', ' 3W Wireless Bluetooth Portable Speaker With Supporting Carry Handle, USB, SD Card, AUX, FM & Call Function. (Black)'),
(12, 'Amazon Echo Dot (5th Gen)', 4999.00, 'images/speaker3.png', ' Smart speaker with Bigger sound, Motion Detection, Temperature Sensor, Alexa and Bluetooth| gray');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Prem Gupta ', 'premg@prem.com', '123'),
(2, 'mansi', 'mansi@mansi.com', '000'),
(3, 'rahul ', 'rahul@r.com', '222'),
(4, 'sahil ', 'sahil@sahil.com', '$2y$10$rGscYNNBZXfYNkeI4m1Lg.ZI6uxTGakqBN2PW4CWujmbmSN4JpxbC'),
(5, 'rahul', 'r@r.com', '$2y$10$JwAk/QOTie8kb/IcP0tIS.bspyPhe6qhvilgaAcPQbJbDXZeOcYO.'),
(6, 'paras', 'paras@gmail.com', '$2y$10$5BL71StRw4487Gj0cCHFkuDBEpyBMrCMZxM7orcARO753Nra1wSHC'),
(7, 'manoj gupta', 'manoj@manoj.com', '$2y$10$kRiH1SjXx8ps0u6Tz23WNeHZWtiMWd5t3ToE4RvpYqK091zf3lIkC'),
(8, 'neha tiwari', 'neha@neha.com', '$2y$10$iVf2sNGM60F3kq3fpBcqD.vp6BekQf8Xy7Db9mYM39ej.pzt5Ul.2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);