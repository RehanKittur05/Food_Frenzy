-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 01:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'CAC29D7A34687EB14B37068EE4708E7B', 'admin@mail.com', '', '2022-05-27 13:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, 'Yorkshire Lamb Patties', 'Lamb patties which melt in your mouth, and are quick and easy to make. Served hot with a crisp salad.', '14.00', '62908867a48e4.jpg'),
(2, 1, 'Lobster Thermidor', 'Lobster Thermidor is a French dish of lobster meat cooked in a rich wine sauce, stuffed back into a lobster shell, and browned.', '36.00', '629089fee52b9.jpg'),
(3, 4, 'Chicken Madeira', 'Chicken Madeira, like Chicken Marsala, is made with chicken, mushrooms, and a special fortified wine. But, the wines are different;', '23.00', '62908bdf2f581.jpg'),
(4, 1, 'Stuffed Jacket Potatoes', 'Deep fry whole potatoes in oil for 8-10 minutes or coat each potato with little oil. Mix the onions, garlic, tomatoes and mushrooms. Add yoghurt, ginger, garlic, chillies, coriander', '8.00', '62908d393465b.jpg'),
(5, 2, 'Pink Spaghetti Gamberoni', 'Spaghetti with prawns in a fresh tomato sauce. This dish originates from Southern Italy and with the combination of prawns, garlic, chilli and pasta. Garnish each with remaining tablespoon parsley.', '21.00', '606d7491a9d13.jpg'),
(6, 2, 'Cheesy Mashed Potato', 'Deliciously Cheesy Mashed Potato. The ultimate mash for your Thanksgiving table or the perfect accompaniment to vegan sausage casserole. Everyone will love it s fluffy, cheesy.', '5.00', '606d74c416da5.jpg'),
(7, 2, 'Crispy Chicken Strips', 'Fried chicken strips, served with special honey mustard sauce.', '8.00', '606d74f6ecbbb.jpg'),
(8, 2, 'Lemon Grilled Chicken And Pasta', 'Marinated rosemary grilled chicken breast served with mashed potatoes and your choice of pasta.', '11.00', '606d752a209c3.jpg'),
(9, 3, 'Vegetable Fried Rice', 'Chinese rice wok with cabbage, beans, carrots, and spring onions.', '5.00', '606d7575798fb.jpg'),
(10, 3, 'Prawn Crackers', '12 pieces deep-fried prawn crackers', '7.00', '606d75a7e21ec.jpg'),
(11, 3, 'Spring Rolls', 'Lightly seasoned shredded cabbage, onion and carrots, wrapped in house made spring roll wrappers, deep fried to golden brown.', '6.00', '606d75ce105d0.jpg'),
(12, 3, 'Manchurian Chicken', 'Chicken pieces slow cooked with spring onions in our house made manchurian style sauce.', '11.00', '606d7600dc54c.jpg'),
(13, 4, ' Buffalo Wings', 'Fried chicken wings tossed in spicy Buffalo sauce served with crisp celery sticks and Blue cheese dip.', '11.00', '606d765f69a19.jpg'),
(14, 4, 'Mac N Cheese Bites', 'Served with our traditional spicy queso and marinara sauce.', '9.00', '606d768a1b2a1.jpg'),
(15, 4, 'Signature Potato Twisters', 'Spiral sliced potatoes, topped with our traditional spicy queso, Monterey Jack cheese, pico de gallo, sour cream and fresh cilantro.', '6.00', '606d76ad0c0cb.jpg'),
(16, 4, 'Meatballs Penne Pasta', 'Garlic-herb beef meatballs tossed in our house-made marinara sauce and penne pasta topped with fresh parsley.', '10.00', '606d76eedbb99.jpg'),
(17, 2, 'Alfredo Pasta', 'it tastes good', '10.00', '63c88d055c042.png'),
(18, 1, 'ravioli', 'it tastes better when shared', '0.00', '63c88ea3e7308.png'),
(19, 1, 'd', 'a', '0.00', '63c88f3e3664c.png'),
(20, 1, 's', 'a', '0.00', '63c88fb68302b.png'),
(21, 3, 'a', 'a', '0.00', '63c890b5c9541.png'),
(22, 1, 'c', 'y', '0.00', '63c89125b9634.png');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `u_id`, `address`, `cdate`) VALUES
(1, 12, 'White field,Bangalore', '2023-01-20 02:27:33'),
(2, 8, 'banashankari 5th stage,Bangalore', '2023-01-20 02:55:24'),
(3, 9, 'HSR layout ,Bangalore', '2023-01-20 03:07:26'),
(4, 7, 'RR nagar,Bangalore', '2023-01-20 15:38:35'),
(5, 9, 'BR layout ,Bangalore', '2023-01-20 16:02:10'),
(6, 7, 'abbbb', '2023-01-20 16:39:52'),
(7, 7, 'abbbb', '2023-01-20 16:41:09'),
(8, 7, 'aadddddvv', '2023-01-20 16:41:16'),
(9, 7, 'aadddddvv', '2023-01-20 16:42:02'),
(10, 7, 'pooo', '2023-01-20 16:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03'),
(13, 11, 'closed', 'delivered!!', '2023-01-13 16:00:58'),
(14, 14, 'closed', 'delivered!!', '2023-01-13 19:12:31'),
(15, 21, 'closed', 'delivered.', '2023-01-19 14:23:56'),
(16, 21, 'closed', 'delivered...', '2023-01-19 14:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(1, 1, 'North Street Tavern', 'nthavern@mail.com', '3547854700', 'www.northstreettavern.com', '8am', '8pm', 'mon-sat', '1128 North St, White Plains', '6290877b473ce.jpg', '2022-05-27 08:10:35'),
(2, 2, 'Eataly', 'eataly@gmail.com', '0557426406', 'www.eataly.com', '11am', '9pm', 'Mon-Sat', '800 Boylston St, Boston', '606d720b5fc71.jpg', '2022-05-27 08:06:41'),
(3, 3, 'Nan Xiang Xiao Long Bao', 'nanxiangbao45@mail.com', '1458745855', 'www.nanxiangbao45.com', '9am', '8pm', 'mon-sat', 'Queens, New York', '6290860e72d1e.jpg', '2022-05-27 08:04:30'),
(4, 4, 'Highlands Bar & Grill', 'hbg@mail.com', '6545687458', 'www.hbg.com', '7am', '8pm', 'mon-sat', '812 Walter Street', '6290af6f81887.jpg', '2022-05-27 11:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Continental', '2022-05-27 08:07:35'),
(2, 'Italian', '2021-04-07 08:45:23'),
(3, 'Chinese', '2021-04-07 08:45:25'),
(4, 'American', '2021-04-07 08:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'eric', 'Eric', 'Lopez', 'eric@mail.com', '1458965547', 'a32de55ffd7a9c4101a0c5c8788b38ed', '87 Armbrester Drive', 1, '2022-05-27 08:40:36'),
(2, 'harry', 'Harry', 'Holt', 'harryh@mail.com', '3578545458', 'bc28715006af20d0e961afd053a984d9', '33 Stadium Drive', 1, '2022-05-27 08:41:07'),
(3, 'james', 'James', 'Duncan', 'james@mail.com', '0258545696', '58b2318af54435138065ee13dd8bea16', '67 Hiney Road', 1, '2022-05-27 08:41:37'),
(4, 'christine', 'Christine', 'Moore', 'christine@mail.com', '7412580010', '5f4dcc3b5aa765d61d8327deb882cf99', '114 Test Address', 1, '2022-05-01 05:14:42'),
(5, 'scott', 'Scott', 'Miller', 'scott@mail.com', '7896547850', '5f4dcc3b5aa765d61d8327deb882cf99', '63 Charack Road', 1, '2022-05-27 10:53:51'),
(6, 'liamoore', 'Liam', 'Moore', 'liamoore@mail.com', '7896969696', '5f4dcc3b5aa765d61d8327deb882cf99', '122 Bleck Street', 1, '2022-05-27 12:57:00'),
(7, 'rehan', 'rehan ', 'kittur', 'rehan@gmail.com', '6362010850', 'd35101883d6894ff4c6592f191ce3bd7', 'pooo', 1, '2023-01-20 11:12:10'),
(8, 'ani', 'Aniket', 'Dey', 'ani@gmail.com', '8895452316', '185e1a3a41e1463e1a60901060bcfefc', 'banashankari 5th stage,Bangalore', 1, '2023-01-19 21:25:24'),
(9, 'shubhu', 'Shubhankar', 'Sharma', 'shu@gmail.com', '8960235123', '6c64862e5c5263bde7097d9e2842f537', 'BR layout ,Bangalore', 1, '2023-01-20 10:32:10'),
(10, 'rishav', 'rishav', 'singh', 'ris@gmail.com', '6362010850', '2d47a2fc7899da939c4837196f89fc13', 'nanjappa layout.', 1, '2023-01-19 20:08:27'),
(11, 'priyanshu', 'priyanshu', 'mishra', 'p@gmail.com', '8877445511', 'fe7ced405a04f5b6e8d1e01276e812c9', 'srinivaspura,bangalore', 1, '2023-01-19 20:32:11'),
(12, 'ty', 'tyler', 'durden', 'ty@gmail.com', '5588774499', 'ty123', 'White field,Bangalore', 1, '2023-01-19 20:57:33'),
(13, 'sachin', 'Sachin', 'Kumar', 'sachin@gmail.com', '7894561230', '15285722f9def45c091725aee9c387cb', 'bbabbba', 1, '2023-01-20 11:31:47');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `logs` AFTER UPDATE ON `users` FOR EACH ROW INSERT INTO logs VALUES(null,OLD.u_id,NEW.address,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(1, 4, 'Spring Rolls', 2, '6.00', 'rejected', '2022-05-27 11:43:26'),
(2, 4, 'Prawn Crackers', 1, '7.00', 'closed', '2022-05-27 11:11:41'),
(3, 5, 'Chicken Madeira', 1, '23.00', 'closed', '2022-05-27 11:42:35'),
(4, 5, 'Cheesy Mashed Potato', 1, '5.00', 'in process', '2022-05-27 11:42:55'),
(5, 5, 'Meatballs Penne Pasta', 1, '10.00', 'closed', '2022-05-27 13:18:03'),
(6, 5, 'Yorkshire Lamb Patties', 1, '14.00', NULL, '2022-05-27 11:40:51'),
(7, 6, 'Yorkshire Lamb Patties', 1, '14.00', 'closed', '2022-05-27 13:04:33'),
(8, 6, 'Lobster Thermidor', 1, '36.00', 'closed', '2022-05-27 13:05:24'),
(9, 6, 'Stuffed Jacket Potatoes', 1, '8.00', 'rejected', '2022-05-27 13:03:53'),
(12, 8, 'Pink Spaghetti Gamberoni', 1, '21.00', NULL, '2023-01-13 15:56:15'),
(13, 8, 'Cheesy Mashed Potato', 1, '5.00', NULL, '2023-01-13 15:56:15'),
(14, 9, 'Pink Spaghetti Gamberoni', 1, '21.00', 'closed', '2023-01-13 19:12:31'),
(15, 9, 'Stuffed Jacket Potatoes', 1, '8.00', NULL, '2023-01-13 18:04:21'),
(18, 36, 'Stuffed Jacket Potatoes', 1, '8.00', NULL, '2023-01-18 22:46:23'),
(21, 11, 'Pink Spaghetti Gamberoni', 1, '21.00', 'closed', '2023-01-19 14:23:56'),
(22, 7, 'Yorkshire Lamb Patties', 1, '14.00', NULL, '2023-01-20 10:38:36'),
(24, 13, 'Yorkshire Lamb Patties', 1, '14.00', NULL, '2023-01-20 11:42:57'),
(25, 13, 'Cheesy Mashed Potato', 1, '5.00', NULL, '2023-01-20 11:44:52');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order`
-- (See below for the actual view)
--
CREATE TABLE `v_order` (
`o_id` int(222)
,`u_id` int(222)
,`title` varchar(222)
,`quantity` int(222)
,`price` decimal(10,2)
,`status` varchar(222)
,`date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order1`
-- (See below for the actual view)
--
CREATE TABLE `v_order1` (
`o_id` int(222)
,`u_id` int(222)
,`title` varchar(222)
,`quantity` int(222)
,`price` decimal(10,2)
,`status` varchar(222)
,`date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order2`
-- (See below for the actual view)
--
CREATE TABLE `v_order2` (
`o_id` int(222)
,`u_id` int(222)
,`title` varchar(222)
,`quantity` int(222)
,`price` decimal(10,2)
,`status` varchar(222)
,`date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order4`
-- (See below for the actual view)
--
CREATE TABLE `v_order4` (
`o_id` int(222)
,`u_id` int(222)
,`title` varchar(222)
,`quantity` int(222)
,`price` decimal(10,2)
,`status` varchar(222)
,`date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_ss`
-- (See below for the actual view)
--
CREATE TABLE `v_ss` (
`id` int(11)
,`u_id` int(11)
,`address` varchar(100)
,`cdate` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `v_order`
--
DROP TABLE IF EXISTS `v_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `v_order`  AS SELECT `users_orders`.`o_id` AS `o_id`, `users_orders`.`u_id` AS `u_id`, `users_orders`.`title` AS `title`, `users_orders`.`quantity` AS `quantity`, `users_orders`.`price` AS `price`, `users_orders`.`status` AS `status`, `users_orders`.`date` AS `date` FROM `users_orders``users_orders`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_order1`
--
DROP TABLE IF EXISTS `v_order1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `v_order1`  AS SELECT `users_orders`.`o_id` AS `o_id`, `users_orders`.`u_id` AS `u_id`, `users_orders`.`title` AS `title`, `users_orders`.`quantity` AS `quantity`, `users_orders`.`price` AS `price`, `users_orders`.`status` AS `status`, `users_orders`.`date` AS `date` FROM `users_orders` WHERE `users_orders`.`u_id` = 77  ;

-- --------------------------------------------------------

--
-- Structure for view `v_order2`
--
DROP TABLE IF EXISTS `v_order2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `v_order2`  AS SELECT `users_orders`.`o_id` AS `o_id`, `users_orders`.`u_id` AS `u_id`, `users_orders`.`title` AS `title`, `users_orders`.`quantity` AS `quantity`, `users_orders`.`price` AS `price`, `users_orders`.`status` AS `status`, `users_orders`.`date` AS `date` FROM `users_orders` WHERE `users_orders`.`u_id` = 77  ;

-- --------------------------------------------------------

--
-- Structure for view `v_order4`
--
DROP TABLE IF EXISTS `v_order4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `v_order4`  AS SELECT `users_orders`.`o_id` AS `o_id`, `users_orders`.`u_id` AS `u_id`, `users_orders`.`title` AS `title`, `users_orders`.`quantity` AS `quantity`, `users_orders`.`price` AS `price`, `users_orders`.`status` AS `status`, `users_orders`.`date` AS `date` FROM `users_orders` WHERE `users_orders`.`u_id` = 1313  ;

-- --------------------------------------------------------

--
-- Structure for view `v_ss`
--
DROP TABLE IF EXISTS `v_ss`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `v_ss`  AS SELECT `logs`.`id` AS `id`, `logs`.`u_id` AS `u_id`, `logs`.`address` AS `address`, `logs`.`cdate` AS `cdate` FROM `logs``logs`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
