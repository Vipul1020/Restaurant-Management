-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 09:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'Abhi', 'abhishek@admin.com', '$2y$10$0DjDLNLXKv5szfKnrVKXd.InlXFPJYzB2RHZUDE.t9RCh35E3NDB2');

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `admin_id` int(11) NOT NULL,
  `notifications` tinyint(1) DEFAULT NULL,
  `theme` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `page_link`, `category`, `price`, `description`, `image`) VALUES
(1, 'Idlie Sambhar', 'Food/dist/idliesambar.html', 'Breakfast', 199.00, 'Rice, Lentil Batter', 'Food/items/IdlieSambar.jpg'),
(2, 'Upma', 'Food/dist/upma.html', 'Breakfast', 199.00, 'Sooji, Vegetables, Carrots', 'Food/items/upma.jpg'),
(3, 'Paratha', 'Food/dist/paratha.html', 'Breakfast', 149.00, 'Wheat flour, Mashed potatoes', 'Food/items/paratha.jpeg'),
(4, 'Dosa', 'Food/dist/dosa.html', 'Breakfast', 249.00, 'Ground Rice, Lentils', 'Food/items/Dosa.jpg'),
(5, 'Poha', 'Food/dist/poha.html', 'Breakfast', 149.00, 'Flattened rice, Curry leaves, Onions, Mustard seeds', 'Food/items/Pohha.jpg'),
(6, 'Poori- Bhaji', 'Food/dist/pooribhaji.html', 'Breakfast', 99.00, 'Whole wheat flour, Bread', 'Food/items/poori_bhaji.jpg'),
(7, 'Uttapam', 'Food/dist/uttapam.html', 'Breakfast', 149.00, 'Rice, Lentils, Chopped onions', 'Food/items/Uttapam.jpg'),
(8, 'Mendu vada', 'Food/dist/menduvada.html', 'Breakfast', 29.00, 'Black gram, Spices', 'Food/items/mendu_vada.jpg'),
(9, 'Paneer Tikka Masala', 'Food/dist/paneertikkamasala.html', 'Lunch', 799.00, 'Paneer, Yogurt, Spices', 'Food/items/paneer_tikka_masala.jpeg'),
(10, 'Rogan Josh', 'Food/dist/roganjosh.html', 'Lunch', 699.00, 'Meat, Spices, Onions', 'Food/items/Rogan_josh.jpeg'),
(11, 'Butter Chicken', 'Food/dist/butterchicken.html', 'Lunch', 999.00, 'Chicken, Tomato, Butter', 'Food/items/Butter_chicken.jpg'),
(12, 'Chicken Tikka Masala', 'Food/dist/chickentikkamasala.html', 'Lunch', 799.00, 'Chicken, Tomato Masala sauce, Yogurt', 'Food/items/chicken_tikka_masala.jpg'),
(13, 'Steamed Basmati Rice', 'Food/dist/steamrice.html', 'Lunch', 349.00, 'Long grained rice, Steam', 'Food/items/steam_rice.jpg'),
(14, 'Daal Makhani', 'Food/dist/dalmakhani.html', 'Lunch', 499.00, 'Black lentils, Kidney beans, Tomato', 'Food/items/dal_makhni.jpg'),
(15, 'Goan Fish Curry', 'Food/dist/goanfishcurry.html', 'Lunch', 799.00, 'Fish fillets, Coconut curry, Spices', 'Food/items/goan_fish_curry.jpg'),
(16, 'Egg Fried Rice', 'Food/dist/eggfriedrice.html', 'Lunch', 499.00, 'Jasmine rice, Scrambled eggs, Vegetables', 'Food/items/egg_fried_rice.jpg'),
(17, 'Jeera Rice', 'Food/dist/jeerarice.html', 'Dinner', 399.00, 'Basmati rice, Cumin seeds, Whole spices', 'Food/items/jeera_rice.jpg'),
(18, 'Saffron Rice', 'Food/dist/saffronrice.html', 'Dinner', 399.00, 'Basmati rice, Saffron threads', 'Food/items/saffron_rice.jpg'),
(19, 'Butter Naan', 'Food/dist/butternaan.html', 'Dinner', 79.00, 'Butter, Ghee, Tandoor', 'Food/items/butter_naan.jpg'),
(20, 'Vegetable Fried Rice', 'Food/dist/vegfriedrice.html', 'Dinner', 449.00, 'Jasmine rice, Diced vegetables, Eggs', 'Food/items/vegetable_fried_rice.jpg'),
(21, 'Dum Aloo', 'Food/dist/dumaloo.html', 'Dinner', 339.00, 'Baby potatoes, Tomato gravy, Yogurt', 'Food/items/dum_aloo.jpeg'),
(22, 'Gajar ka Halwa', 'Food/dist/gajarhalwa.html', 'Desserts', 199.00, 'Grated carrots, Ghee, Milk, Sugar', 'Food/items/gajar_halwa.jpg'),
(23, 'Phirni', 'Food/dist/phirni.html', 'Desserts', 249.00, 'Ground rice, Milk, Sugar', 'Food/items/phrini.jpg'),
(24, 'Rasgulla', 'Food/dist/rasgulla.html', 'Desserts', 199.00, 'Cheese dumplings, Sugar syrup', 'Food/items/rasgulla.jpg'),
(25, 'Coconut Barfi', 'Food/dist/coconutbarfi.html', 'Desserts', 149.00, 'Grated coconut, Condensed milk, Sugar', 'Food/items/coconut_barfi.jpg'),
(26, 'Badam Kheer', 'Food/dist/badamkheer.html', 'Desserts', 249.00, 'Ground almonds, Milk, Sugar', 'Food/items/badam_kheer.jpg'),
(27, 'Chardonnay', 'Food/dist/chardonnay.html', 'Wine Card', 499.00, 'Ripe apple, Pear, Tropical fruits', 'Food/items/chardonnay.jpg'),
(28, 'Sauvignon Blanc', 'Food/dist/sauvignonblanc.html', 'Wine Card', 499.00, 'Citrus, Green apple, Grassy notes', 'Food/items/sauvignon_blanc.jpg'),
(29, 'Riesling', 'Food/dist/riesling.html', 'Wine Card', 499.00, 'Peach, Apricot, Floral notes', 'Food/items/riesling_wine.jpg'),
(30, 'Cabernet Sauvignon', 'Food/dist/cabernet.html', 'Wine Card', 999.00, 'Blackcurrant, Plum, Cedar', 'Food/items/cabernet_sauvignon.jpg'),
(31, 'Merlot', 'Food/dist/merlot.html', 'Wine Card', 999.00, 'Soft tannins, Cherry, Chocolate', 'Food/items/merlot.jpg'),
(32, 'Pinot Noir', 'Food/dist/pinotnoir.html', 'Wine Card', 999.00, 'Red berries, Cherry, Earthy notes', 'Food/items/pinot_noir.jpg'),
(33, 'Prosecco', 'Food/dist/prosecco.html', 'Wine Card', 999.00, 'Green apple, Pear, Citrus zest', 'Food/items/prosecco_wine.jpg'),
(34, 'Rose Wine', 'Food/dist/rosewine.html', 'Wine Card', 899.00, 'Strawberry, Watermelon, Floral notes', 'Food/items/Rose_wine.jpg'),
(35, 'Mango Lassi', 'Food/dist/mangolassi.html', 'Drinks & Tea', 149.00, 'Ripe mangoes, Sugar, Cardamom', 'Food/items/mango_lassi.jpg'),
(36, 'Virgin Mojito', 'Food/dist/virginmojito.html', 'Drinks & Tea', 129.00, 'Mint leaves, Lime juice, Sugar', 'Food/items/virgin_mojito.jpg'),
(37, 'Fresh Lime Soda', 'Food/dist/freshlimesoda.html', 'Drinks & Tea', 129.00, 'Lime juice, Sugar syrup, Soda water', 'Food/items/fresh_lime_soda.jpg'),
(38, 'Masala Chai', 'Food/dist/masalachai.html', 'Drinks & Tea', 49.00, 'Black tea leaves, Milk, Sugar', 'Food/items/masala_chai.jpg'),
(39, 'Darjeeling Tea', 'Food/dist/darjeelingtea.html', 'Drinks & Tea', 129.00, 'Floral aroma, Milk, Sugar', 'Food/items/darjeeling_tea.jpeg'),
(40, 'Assam Tea', 'Food/dist/assamtea.html', 'Drinks & Tea', 129.00, 'Black tea leaves, Milk, Sugar', 'Food/items/assam_tea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) DEFAULT 0.00,
  `status` enum('pending','completed','cancelled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `address`, `payment_method`, `order_date`, `total_amount`, `discount_amount`, `status`) VALUES
(40, 'test11@gmail.com', 'ranchi', 'credit_card', '2024-07-23 10:58:09', 258.00, 0.00, 'pending'),
(41, 'test11@gmail.com', 'Goa', 'credit_card', '2024-07-23 14:41:37', 1227.00, 0.00, 'pending'),
(42, 'test11@gmail.com', 'manipur', 'credit_card', '2024-07-23 14:49:02', 1396.00, 0.00, 'pending'),
(43, '', '', '', '2024-07-24 00:09:53', 29.99, 0.00, 'completed'),
(44, 'test11@gmail.com', 'Goa', 'credit_card', '2024-07-24 00:23:21', 2296.00, 0.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_name`, `item_price`, `quantity`, `created_at`) VALUES
(79, '44', 'Chicken Tikka Masala', 799.00, 2, '2024-07-23 18:53:21'),
(80, '44', 'Vegetable Fried Rice', 449.00, 1, '2024-07-23 18:53:21'),
(81, '44', 'Dosa', 249.00, 1, '2024-07-23 18:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `check_in` date NOT NULL,
  `time` time NOT NULL,
  `guest_count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `check_in`, `time`, `guest_count`, `created_at`) VALUES
(1, 'abhi', 'vipultech0001@gmail.com', '2233445567', '0000-00-00', '01:00:00', 4, '2024-07-23 04:54:57'),
(2, 'Test2', 'test2@gmail.com', '1234567888', '2024-08-24', '03:00:00', 2, '2024-07-23 05:16:28'),
(3, 'Test2', 'test2@gmail.com', '1234567888', '2024-08-24', '04:00:00', 2, '2024-07-23 05:16:42'),
(4, 'test6', 'test6@gmail.com', '2345678987', '2024-09-17', '16:30:00', 2, '2024-07-23 05:42:55'),
(5, 'test11', 'test11@gmail.com', '3456765878', '2024-07-03', '06:45:00', 2, '2024-07-23 08:37:36'),
(6, 'nimki', 'nimki@gmail.com', '5675489908', '2024-07-12', '21:00:00', 2, '2024-07-23 08:45:35'),
(7, 'test10', 'test@gmail.com', '8898898745', '2024-07-09', '16:00:00', 1, '2024-07-23 09:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `online_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `address`, `password`, `online_status`) VALUES
(1, 'abhi', 'vipultech0001@gmail.com', '7633866449', 'ranchi', '$2y$10$2HNw0ipROHJC0TuLQ6GUSOdBbi5fg0Zdc6.SG3H64BGC.jNo3m1ze', 0),
(3, 'test2', 'asjajsfgajhf@gmail.com', '2323456787', 'ranchi', '$2y$10$iBZuZptq6TlgDgRLSDmeJO1OfFqjsDedA2phU1xMS3IVijQbohQDC', 0),
(4, 'ramu', 'askjfajf@gmail.com', '7676767676', 'ranchi', '$2y$10$pLzQP7AqK9.mZmMaSsq2g.e7dUd46mNuXus1SMgN9gFS3WuPcVcxa', 0),
(5, 'test4', 'asfasfaf@gmail.com', '4398798989', 'ranchi', '$2y$10$yZljufBWS9g67pGCxWp13eGgurbQ8Zuigt9ewW70M1Vesn2kZ9skO', 0),
(6, 'mr_robot', 'robot@gmail.com', '6969696969', 'ranchi', '$2y$10$eiV4j.09to7xBj2HkKpCLec1wJoDuzkK/3F7UGQ3DxIZRtbRbe/kO', 0),
(7, 'mr_robot', 'robot@gmail.com', '6969696969', 'ranchi', '$2y$10$uE9KiaJ7XABb0ywTrXMk6eXkn.Ghl/qkKmrHY1oE5Gx77r7IAsU9W', 0),
(8, 'test7', 'vipultech0001@gmail.com', '3456789569', 'ranchi', '$2y$10$HmoxbSjcSE3byUF7uu2gVe9jMkrVjsMYdaLwSubtHFjNi2K2EJfdm', 0),
(9, 'test8', 'vipultech0001@gmail.com', '4445556667', 'goa', '$2y$10$4MOQnr64D75qSqOZvohdle8B.ksYKOF02iVogeSzK.vH/j1DqdAta', 0),
(10, 'test9', 'ASFAFSAF@GMAIL.COM', '2222222222', 'goa', '$2y$10$D.wAOEn5dmTDvkLmRv.l9ObI1OR0NuQYWLmIr.bl.QshpiJmjVFW6', 0),
(11, 'Abhi', 'abhishek8thy@gmail.com', '2222222222', 'Goa', '$2y$10$bli.jVWpDPV1Q1k38evCh.9G8Xxtsy4Je/3EzsQtEY91/ed.Ro912', 0),
(12, 'suny', 'suny@gmail.com', '1234566666', 'ranchi', '$2y$10$K2LPBatjWWiYEiS0S1fEr.A.fdDa4CW1lcU6oATrAIRIywOMmpPyS', 0),
(13, 'test11', 'test11@gmail.com', '7777666688', 'chennai', '$2y$10$IhHrJaCc4IeD4IEMmiH2Puf99D2t7ZtKQu60iq6dYD8OT7TqUtHj6', 0),
(14, 'testuser', 'test@example.com', '', '', 'password_hash', 1),
(15, 'testuser', 'test@example.com', '', '', 'password_hash', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
