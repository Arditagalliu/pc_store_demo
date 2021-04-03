-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 06 Ιουλ 2020 στις 03:37:55
-- Έκδοση διακομιστή: 10.1.40-MariaDB
-- Έκδοση PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `pcstore`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`title`, `description`, `image`) VALUES
('Mobile Devices', 'Decide between the top tablets and smartphones of the year. Including Sumsung, Apple, Huawei, Xiaomi.', 'smartphone.png'),
('Personal Computers', 'Decide between the top laptops and desktops of the year. Including MAC All-in-One, Sony, MS Surface, MacBooks, HP, Lenovo.', 'laptop.png');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `comments`
--

CREATE TABLE `comments` (
  `cuser` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(50) NOT NULL,
  `date` datetime NOT NULL,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `address` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int(10) NOT NULL,
  `payment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costs` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`user`, `id`, `date`, `products`, `quantities`, `cost`, `address`, `city`, `postcode`, `payment`, `costs`) VALUES
('username', 1, '2020-07-05 10:33:00', '..Apple Ipad 2007..Apple Iphone 12..Huawei P40..Sumsung Note 9..Sumsung Tab S6', '..5..3..5..1..2', 10915, 'panepistimiou 18', 'athens', 34235, 'cash', '..342..1079..721..599..879'),
('john', 2, '2020-07-04 04:04:18', '..Apple Iphone 12..Huawei P40..Sumsung Note 9..Sumsung Tab S6..Xiaomi Mi A2', '..3..3..4..4..1', 11567, 'syntagmatos 188', 'peiraias', 19016, 'cash', '..1079..721..599..879..249'),
('john', 3, '2020-07-04 04:05:29', '..Dell Inspiron 15..MacBook Air 19..Microsoft Surface..ThinkCenter M720', '..1..2..4..2', 7453, 'panepistimiou 10', 'athens', 11111, 'card', '..621..1059..799..759');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pictures`
--

CREATE TABLE `pictures` (
  `picid` int(100) NOT NULL,
  `picname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picuser` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picdate` date NOT NULL,
  `picrate` float NOT NULL,
  `picraters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE `products` (
  `proname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proprice` float NOT NULL,
  `proimage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `procategory` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`proname`, `proprice`, `proimage`, `prodescription`, `procategory`) VALUES
('Apple Ipad 2007', 342, 'ipad.jpg', '9,7 \" 2048 x 1536 pixels IPS, CPU Dual-Core 2GB 1.84GHz, OS iOS', 'Mobile Devices'),
('Apple Iphone 12', 1079, 'iphone12.jpg', '6.1\" 2340 x 1080 pixels IPS, CPU Dual-Core 4GB 2.2GHz, OS IOS', 'Mobile Devices'),
('Dell Inspiron 15', 621, 'dellinspiron15.jpg', 'CPU: AMD Ryzen 5 2GHz, RAM: 8GB, 256GB SSD, GPU: AMD Radeon Vega 8, Windows 10', 'Personal Computers'),
('HP Envy 32', 998, 'hpenvy32.jpg', 'CPU: Intel Core i5 1.60GHz, RAM: 8GB, 128GB SSD, GPU: Intel UHD Graphics 620, Windows 10', 'Personal Computers'),
('Huawei P40', 721, 'huaweip40.jpeg', '6.1\" 2340 x 1080 pixels oled, CPU Dual-Core 8GB 2.86GHz, OS Android', 'Mobile Devices'),
('MacBook Air 19', 1059, 'macbook.webp', 'CPU: Intel Core i5 1.6GHz, RAM: 8GB, 128GB SSD, GPU: Intel UHD Graphics 617, macOS', 'Personal Computers'),
('Microsoft Surface', 799, 'mssurface.png', 'Touchscreen, CPU: Intel Core i5 2.5GHz, RAM: 4GB, 128GB SSD, GPU: Intel HD Graphics 620, Windows 10', 'Personal Computers'),
('Sony Vaio', 498, 'vaio.jpg', 'CPU: Intel Core i3 , RAM: 4GB , 128GB SSD , GPU: Intel UHD Graphics 617 , Windows 8.1', 'Personal Computers'),
('Sumsung Note 9', 599, 'sumsungnote9.jpg', '10.5\" 2960 x 1440 pixels Amoled, CPU Exynos 6GB 2.7GHz, OS Android', 'Mobile Devices'),
('Sumsung Tab S6', 879, 'samtabs6.jpg', '10.5\" 2560 x 1600 pixels Amoled, CPU Exynos 8GB 2.84GHz, OS Android', 'Mobile Devices'),
('ThinkCenter M720', 759, 'thinkcenterm720.jpg', 'Intel Core i3 7100T, 3.4GHz, RAM: 4GB DDR4, 500GB HDD, GPU: Intel HD Graphics 630, Windows 10', 'Personal Computers'),
('Xiaomi Mi A2', 249, 'xiaomimia2.jpeg', '5.99 \" 2160 x 1080 pixels IPS, CPU Dual-Core 4GB 2.2GHz, OS Android', 'Mobile Devices');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(20) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`username`, `password`, `firstname`, `surname`, `email`, `phone`, `type`) VALUES
('username', '5365edd5a9141fa972602effcdd74733', 'TestUser', 'User', 'test@email.com', 2100000000, 'normal');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`title`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picid`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`proname`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
