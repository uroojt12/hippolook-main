-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2025 at 01:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herosol_hippoglasses`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(600) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `cat_id`, `title`, `slug`, `detail`, `image`, `meta_description`, `meta_keywords`, `date`) VALUES
(1, 1, 'Why you should care about eSports', 'why-you-should-care-about-esports', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa at aliquid explicabo maxime voluptas rem libero facere qui enim harum facilis totam, eos amet adipisci reiciendis accusamus! Provident, adipisci autem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore hic repellendus, placeat tempora atque neque quos, consectetur ducimus, ipsam quo iure cupiditate veritatis delectus dolore quidem ratione dicta pariatur illum!</p>\r\n\r\n<h3>Nulla quis veniam necessitatibus possimus omnis qui repellendus ad suscipit quam, veritatis similique, odio ex blanditiis praesentium non esse sunt dolores ut?</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis debitis enim id cum, praesentium ut dolore. Fugit doloribus maiores possimus, aliquam similique molestias, ut corrupti itaque cumque voluptatem ex tempora!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat sint eligendi facere atque reiciendis at ut, voluptate minima id iusto consequatur labore ducimus! Perspiciatis, at. Iste exercitationem quaerat voluptates vitae?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis corporis dolor quaerat, perspiciatis et doloribus deserunt amet quibusdam natus harum temporibus repellat quidem repellendus alias distinctio debitis, veniam reprehenderit laboriosam.</p>\r\n', '42e7aaa88b48137a16a1acd04ed91125_1623395939_4274.jpg', 'test', 'test', '2020-12-22 00:00:00'),
(2, 2, '5 products that will change your PC', '5-products-that-will-change-your-pc', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa at aliquid explicabo maxime voluptas rem libero facere qui enim harum facilis totam, eos amet adipisci reiciendis accusamus! Provident, adipisci autem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore hic repellendus, placeat tempora atque neque quos, consectetur ducimus, ipsam quo iure cupiditate veritatis delectus dolore quidem ratione dicta pariatur illum!</p>\r\n\r\n<h3>Nulla quis veniam necessitatibus possimus omnis qui repellendus ad suscipit quam, veritatis similique, odio ex blanditiis praesentium non esse sunt dolores ut?</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis debitis enim id cum, praesentium ut dolore. Fugit doloribus maiores possimus, aliquam similique molestias, ut corrupti itaque cumque voluptatem ex tempora!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat sint eligendi facere atque reiciendis at ut, voluptate minima id iusto consequatur labore ducimus! Perspiciatis, at. Iste exercitationem quaerat voluptates vitae?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis corporis dolor quaerat, perspiciatis et doloribus deserunt amet quibusdam natus harum temporibus repellat quidem repellendus alias distinctio debitis, veniam reprehenderit laboriosam.</p>\r\n', 'eeb69a3cb92300456b6a5f4162093851_1623396016_1984.jpg', 'test', 'test', '2020-12-17 00:00:00'),
(3, 3, 'Peripherals stocking stuffers gift guide', 'peripherals-stocking-stuffers-gift-guide', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa at aliquid explicabo maxime voluptas rem libero facere qui enim harum facilis totam, eos amet adipisci reiciendis accusamus! Provident, adipisci autem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore hic repellendus, placeat tempora atque neque quos, consectetur ducimus, ipsam quo iure cupiditate veritatis delectus dolore quidem ratione dicta pariatur illum!</p>\r\n\r\n<h3>Nulla quis veniam necessitatibus possimus omnis qui repellendus ad suscipit quam, veritatis similique, odio ex blanditiis praesentium non esse sunt dolores ut?</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis debitis enim id cum, praesentium ut dolore. Fugit doloribus maiores possimus, aliquam similique molestias, ut corrupti itaque cumque voluptatem ex tempora!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat sint eligendi facere atque reiciendis at ut, voluptate minima id iusto consequatur labore ducimus! Perspiciatis, at. Iste exercitationem quaerat voluptates vitae?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis corporis dolor quaerat, perspiciatis et doloribus deserunt amet quibusdam natus harum temporibus repellat quidem repellendus alias distinctio debitis, veniam reprehenderit laboriosam.</p>\r\n', '5b8add2a5d98b1a652ea7fd72d942dac_1623396035_2571.jpg', 'test', 'test', '2020-12-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_categories`
--

CREATE TABLE `tbl_blog_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog_categories`
--

INSERT INTO `tbl_blog_categories` (`id`, `title`, `status`) VALUES
(1, 'Shopping', 0),
(2, 'Payments', 0),
(3, 'Fashion', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL DEFAULT 0,
  `session_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `size` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `shape` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `glasses` varchar(30) DEFAULT NULL,
  `logic_lens_type` varchar(6) DEFAULT NULL,
  `lens_type` varchar(255) DEFAULT NULL,
  `lens_type_price` float DEFAULT NULL,
  `classic_lenses` varchar(255) DEFAULT NULL,
  `classic_lenses_price` float DEFAULT NULL,
  `od_left_sph` varchar(5) DEFAULT NULL,
  `od_left_cyl` varchar(5) DEFAULT NULL,
  `od_left_axis` varchar(5) DEFAULT NULL,
  `od_left_pd` varchar(5) DEFAULT NULL,
  `od_left_add` varchar(5) DEFAULT NULL,
  `os_right_sph` varchar(5) DEFAULT NULL,
  `os_right_cyl` varchar(5) DEFAULT NULL,
  `os_right_axis` varchar(5) DEFAULT NULL,
  `os_right_pd` varchar(5) DEFAULT NULL,
  `os_right_add` varchar(5) DEFAULT NULL,
  `lens_color` varchar(30) DEFAULT NULL,
  `lens_property` varchar(255) DEFAULT NULL,
  `lens_property_price` float DEFAULT NULL,
  `prescription_file` varchar(255) DEFAULT NULL,
  `prescription_file_name` varchar(255) DEFAULT NULL,
  `promocode` varchar(100) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `mem_id`, `session_id`, `p_id`, `size`, `color`, `shape`, `material`, `qty`, `price`, `glasses`, `logic_lens_type`, `lens_type`, `lens_type_price`, `classic_lenses`, `classic_lenses_price`, `od_left_sph`, `od_left_cyl`, `od_left_axis`, `od_left_pd`, `od_left_add`, `os_right_sph`, `os_right_cyl`, `os_right_axis`, `os_right_pd`, `os_right_add`, `lens_color`, `lens_property`, `lens_property_price`, `prescription_file`, `prescription_file_name`, `promocode`, `discount_amount`, `date`) VALUES
(34, 0, '30689eb115e9f593194912c9939a4eee83ae01c3', 6, 'Medium', NULL, 'Rectangle', NULL, 1, '15', 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-28 07:44:52'),
(46, 0, '3ad4dc7ac67742cb5f9a2b61527bec2326c78a3e', 3, 'Wide', NULL, 'Cat Eye', NULL, 1, '14', 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-29 12:48:45'),
(47, 1, NULL, 30, 'Wide', NULL, 'Oval', NULL, 1, '11', 'Polarized Lens', 'second', 'Prescription', 20, 'Standard Index 1.56', 30, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, 'Gradient Green', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-29 12:55:50'),
(48, 7, NULL, 5, 'Medium', NULL, 'Round', NULL, 1, '12', 'Polarized Lens', 'second', 'Prescription', 20, 'Advanced Index 1.67', 67, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, 'Light Pink', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-29 13:08:29'),
(70, 10, NULL, 3, 'Wide', NULL, 'Cat Eye', NULL, 1, '14', 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-30 16:22:42'),
(72, 0, '32d87f5b506c21a6503098ee577f26ea5f8f648e', 15, 'Medium', NULL, 'Cat Eye', NULL, 1, '12', 'Polarized Lens', NULL, 'Normal', 5, 'High Index 1.61', 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gradient Green', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-31 06:44:22'),
(75, 12, NULL, 30, 'Wide', NULL, 'Oval', NULL, 1, '11', 'Prescription Lens', NULL, 'Classic Lenses', 10, 'Standard Index 1.56', 10, '+1.00', '+1.25', '6', '27.0', NULL, '+2.00', '+2.00', '5', '27.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-31 15:55:25'),
(76, 0, 'eabef5473e00c87034c31e88a49c9c99411d1588', 12, 'Narrow', NULL, 'Round', NULL, 1, '12', 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 06:56:56'),
(77, 0, '9d8d9888c1998eae8739b1f6230b903aeb59df8b', 1, 'Medium', NULL, 'Rectangle', NULL, 1, '1', 'Transition Lens', 'second', 'Prescription', 30, 'Advanced Index 1.67', 30, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, NULL, 'Blue Light Blocking', 20, NULL, NULL, NULL, NULL, '2023-12-02 19:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `type` enum('product') DEFAULT 'product',
  `slug` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `parent_id`, `type`, `slug`, `name`, `status`) VALUES
(1, 0, 'product', 'eyeglasses', 'Eyeglasses', 1),
(2, 0, 'product', 'sunglasses', 'Sunglasses', 1),
(3, 0, 'product', 'kids', 'Kids', 1),
(5, 0, 'product', 'premium', 'Premium', 1),
(6, 0, 'product', 'new-in', 'New In', 1),
(8, 0, 'product', 'highlights', 'Highlights', 1),
(9, 0, 'product', 'flash-sale', 'Flash Sale', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) UNSIGNED NOT NULL,
  `city` varchar(155) DEFAULT '',
  `state` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `city`, `state`) VALUES
(6, 'Irvine', 'CA'),
(7, 'Long Beach', 'CA'),
(10, 'Santa Monica', 'CA'),
(17, 'Jersey City, NJ', NULL),
(29, 'Marietta', 'GA'),
(46, 'Brooklyn', 'NY'),
(59, 'Fresno', 'CA'),
(60, 'Huntington Beach', 'CA'),
(63, 'Pasadena', 'CA'),
(64, 'Santa Clarita', 'CA'),
(67, 'Atlanta', 'GA'),
(68, 'Alpharetta', 'GA'),
(69, 'Sandy Springs', 'GA'),
(70, 'Duluth', 'GA'),
(71, 'Albany', 'NY'),
(72, 'Long Island', 'NY'),
(73, 'Buffalo', 'NY'),
(74, 'Rochester', 'NY'),
(75, 'Kennesaw', 'GA'),
(76, 'Woodstock', 'GA'),
(77, 'Decatur', 'GA'),
(78, 'Roswell', 'GA'),
(79, 'Middletown', 'NY'),
(80, 'Syracuse', 'NY'),
(81, 'Los Angeles', 'CA'),
(82, 'San Diego', 'CA'),
(83, 'San Francisco', 'CA'),
(84, 'Santa Monica', 'CA'),
(85, 'San Jose', 'CA'),
(86, 'Long Beach', 'CA'),
(87, 'Sacramento', 'GA'),
(88, 'Savannah', 'GA'),
(89, 'Mableton', 'GA'),
(90, 'Cumming', 'GA'),
(91, 'Buford', 'GA'),
(92, 'Athens', 'GA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`id`, `title`, `image`) VALUES
(1, 'Dark Green', '5d44ee6f2c3f71b73125876103c8f6c4_1622016712_3678.jpg'),
(2, 'Gradient Green', '74bba22728b6185eec06286af6bec36d_1622016760_9971.jpg'),
(3, 'Full Brown', '4e0928de075538c593fbdabb0c5ef2c3_1622016775_5865.jpg'),
(4, 'Gradient Brown', '2823f4797102ce1a1aec05359cc16dd9_1622016792_9666.jpg'),
(5, 'Light Gray', '2b8a61594b1f4c4db0902a8a395ced93_1622016810_5166.jpg'),
(6, 'Gradient Gray', '3dd48ab31d016ffcbf3314df2b3cb9ce_1622016828_3786.jpg'),
(7, 'Full Black', 'da0d1111d2dc5d489242e60ebcbaf988_1622016844_1296.jpg'),
(8, 'Gradient Purple', '42e77b63637ab381e8be5f8318cc28a2_1622016874_7079.jpg'),
(9, 'Gradient Light Gray', '1f50893f80d6830d62765ffad7721742_1622016887_5819.jpg'),
(10, 'Gradient Light Green', '5f93f983524def3dca464469d2cf9f3e_1622016907_2423.jpg'),
(11, 'Gradient Light Tea', '069d3bb002acd8d7dd095917f9efe4cb_1622016929_5326.jpg'),
(12, 'Gradient Light Blue', '48ab2f9b45957ab574cf005eb8a76760_1622016942_9557.jpg'),
(13, 'Gradient Light Pink', 'f29c21d4897f78948b91f03172341b7b_1622016955_9590.jpg'),
(14, 'Gradient Light Purple', '37a749d808e46495a8da1e5352d03cae_1622016973_9183.jpg'),
(15, 'Light Brown', '6e2713a6efee97bacb63e52c54f0ada0_1622016985_9459.jpg'),
(16, 'Light Tea', 'e3796ae838835da0b6f6ea37bcf8bcb7_1622016998_9554.jpg'),
(17, 'Light Blue', '013a006f03dbc5392effeb8f18fda755_1622017008_8182.jpg'),
(18, 'Light Pink', 'b83aac23b9528732c23cc7352950e880_1622017021_1414.jpg'),
(19, 'Light Purple', 'fae0b27c451c728867a567e8c1bb4e53_1622017033_4602.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(11) NOT NULL,
  `shortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `delivery_cost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `shortname`, `name`, `phonecode`, `delivery_cost`) VALUES
(2, 'AL', 'Albania', 355, 5),
(3, 'DZ', 'Algeria', 213, 5),
(4, 'AS', 'American Samoa', 1684, 5),
(5, 'AD', 'Andorra', 376, 5),
(6, 'AO', 'Angola', 244, 5),
(7, 'AI', 'Anguilla', 1264, 5),
(8, 'AQ', 'Antarctica', 0, 5),
(9, 'AG', 'Antigua And Barbuda', 1268, 5),
(10, 'AR', 'Argentina', 54, 5),
(11, 'AM', 'Armenia', 374, 5),
(12, 'AW', 'Aruba', 297, 5),
(13, 'AU', 'Australia', 61, 5),
(14, 'AT', 'Austria', 43, 5),
(15, 'AZ', 'Azerbaijan', 994, 5),
(16, 'BS', 'Bahamas The', 1242, 5),
(17, 'BH', 'Bahrain', 973, 5),
(18, 'BD', 'Bangladesh', 880, 5),
(19, 'BB', 'Barbados', 1246, 5),
(20, 'BY', 'Belarus', 375, 5),
(21, 'BE', 'Belgium', 32, 5),
(22, 'BZ', 'Belize', 501, 5),
(23, 'BJ', 'Benin', 229, 5),
(24, 'BM', 'Bermuda', 1441, 5),
(25, 'BT', 'Bhutan', 975, 5),
(26, 'BO', 'Bolivia', 591, 5),
(27, 'BA', 'Bosnia and Herzegovina', 387, 5),
(28, 'BW', 'Botswana', 267, 5),
(29, 'BV', 'Bouvet Island', 0, 5),
(30, 'BR', 'Brazil', 55, 5),
(31, 'IO', 'British Indian Ocean Territory', 246, 5),
(32, 'BN', 'Brunei', 673, 5),
(33, 'BG', 'Bulgaria', 359, 5),
(34, 'BF', 'Burkina Faso', 226, 5),
(35, 'BI', 'Burundi', 257, 5),
(36, 'KH', 'Cambodia', 855, 5),
(37, 'CM', 'Cameroon', 237, 5),
(38, 'CA', 'Canada', 1, 5),
(39, 'CV', 'Cape Verde', 238, 5),
(40, 'KY', 'Cayman Islands', 1345, 5),
(41, 'CF', 'Central African Republic', 236, 5),
(42, 'TD', 'Chad', 235, 5),
(43, 'CL', 'Chile', 56, 5),
(44, 'CN', 'China', 86, 5),
(45, 'CX', 'Christmas Island', 61, 5),
(46, 'CC', 'Cocos (Keeling) Islands', 672, 5),
(47, 'CO', 'Colombia', 57, 5),
(48, 'KM', 'Comoros', 269, 5),
(49, 'CG', 'Republic Of The Congo', 242, 5),
(50, 'CD', 'Democratic Republic Of The Congo', 242, 5),
(51, 'CK', 'Cook Islands', 682, 5),
(52, 'CR', 'Costa Rica', 506, 5),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225, 5),
(54, 'HR', 'Croatia (Hrvatska)', 385, 5),
(55, 'CU', 'Cuba', 53, 5),
(56, 'CY', 'Cyprus', 357, 5),
(57, 'CZ', 'Czech Republic', 420, 5),
(58, 'DK', 'Denmark', 45, 5),
(59, 'DJ', 'Djibouti', 253, 5),
(60, 'DM', 'Dominica', 1767, 5),
(61, 'DO', 'Dominican Republic', 1809, 5),
(62, 'TP', 'East Timor', 670, 5),
(63, 'EC', 'Ecuador', 593, 5),
(64, 'EG', 'Egypt', 20, 5),
(65, 'SV', 'El Salvador', 503, 5),
(66, 'GQ', 'Equatorial Guinea', 240, 5),
(67, 'ER', 'Eritrea', 291, 5),
(68, 'EE', 'Estonia', 372, 5),
(69, 'ET', 'Ethiopia', 251, 5),
(70, 'XA', 'External Territories of Australia', 61, 5),
(71, 'FK', 'Falkland Islands', 500, 5),
(72, 'FO', 'Faroe Islands', 298, 5),
(73, 'FJ', 'Fiji Islands', 679, 5),
(74, 'FI', 'Finland', 358, 5),
(75, 'FR', 'France', 33, 5),
(76, 'GF', 'French Guiana', 594, 5),
(77, 'PF', 'French Polynesia', 689, 5),
(78, 'TF', 'French Southern Territories', 0, 5),
(79, 'GA', 'Gabon', 241, 5),
(80, 'GM', 'Gambia The', 220, 5),
(81, 'GE', 'Georgia', 995, 5),
(82, 'DE', 'Germany', 49, 5),
(83, 'GH', 'Ghana', 233, 5),
(84, 'GI', 'Gibraltar', 350, 5),
(85, 'GR', 'Greece', 30, 5),
(86, 'GL', 'Greenland', 299, 5),
(87, 'GD', 'Grenada', 1473, 5),
(88, 'GP', 'Guadeloupe', 590, 5),
(89, 'GU', 'Guam', 1671, 5),
(90, 'GT', 'Guatemala', 502, 5),
(91, 'XU', 'Guernsey and Alderney', 44, 5),
(92, 'GN', 'Guinea', 224, 5),
(93, 'GW', 'Guinea-Bissau', 245, 5),
(94, 'GY', 'Guyana', 592, 5),
(95, 'HT', 'Haiti', 509, 5),
(96, 'HM', 'Heard and McDonald Islands', 0, 5),
(97, 'HN', 'Honduras', 504, 5),
(98, 'HK', 'Hong Kong S.A.R.', 852, 5),
(99, 'HU', 'Hungary', 36, 5),
(100, 'IS', 'Iceland', 354, 5),
(101, 'IN', 'India', 91, 5),
(102, 'ID', 'Indonesia', 62, 5),
(103, 'IR', 'Iran', 98, 5),
(104, 'IQ', 'Iraq', 964, 5),
(105, 'IE', 'Ireland', 353, 5),
(106, 'IL', 'Israel', 972, 5),
(107, 'IT', 'Italy', 39, 5),
(108, 'JM', 'Jamaica', 1876, 5),
(109, 'JP', 'Japan', 81, 5),
(110, 'XJ', 'Jersey', 44, 5),
(111, 'JO', 'Jordan', 962, 5),
(112, 'KZ', 'Kazakhstan', 7, 5),
(113, 'KE', 'Kenya', 254, 5),
(114, 'KI', 'Kiribati', 686, 5),
(115, 'KP', 'Korea North', 850, 5),
(116, 'KR', 'Korea South', 82, 5),
(117, 'KW', 'Kuwait', 965, 5),
(118, 'KG', 'Kyrgyzstan', 996, 5),
(119, 'LA', 'Laos', 856, 5),
(120, 'LV', 'Latvia', 371, 5),
(121, 'LB', 'Lebanon', 961, 5),
(122, 'LS', 'Lesotho', 266, 5),
(123, 'LR', 'Liberia', 231, 5),
(124, 'LY', 'Libya', 218, 5),
(125, 'LI', 'Liechtenstein', 423, 5),
(126, 'LT', 'Lithuania', 370, 5),
(127, 'LU', 'Luxembourg', 352, 5),
(128, 'MO', 'Macau S.A.R.', 853, 5),
(129, 'MK', 'Macedonia', 389, 5),
(130, 'MG', 'Madagascar', 261, 5),
(131, 'MW', 'Malawi', 265, 5),
(132, 'MY', 'Malaysia', 60, 5),
(133, 'MV', 'Maldives', 960, 5),
(134, 'ML', 'Mali', 223, 5),
(135, 'MT', 'Malta', 356, 5),
(136, 'XM', 'Man (Isle of)', 44, 5),
(137, 'MH', 'Marshall Islands', 692, 5),
(138, 'MQ', 'Martinique', 596, 5),
(139, 'MR', 'Mauritania', 222, 5),
(140, 'MU', 'Mauritius', 230, 5),
(141, 'YT', 'Mayotte', 269, 5),
(142, 'MX', 'Mexico', 52, 5),
(143, 'FM', 'Micronesia', 691, 5),
(144, 'MD', 'Moldova', 373, 5),
(145, 'MC', 'Monaco', 377, 5),
(146, 'MN', 'Mongolia', 976, 5),
(147, 'MS', 'Montserrat', 1664, 5),
(148, 'MA', 'Morocco', 212, 5),
(149, 'MZ', 'Mozambique', 258, 5),
(150, 'MM', 'Myanmar', 95, 5),
(151, 'NA', 'Namibia', 264, 5),
(152, 'NR', 'Nauru', 674, 5),
(153, 'NP', 'Nepal', 977, 5),
(154, 'AN', 'Netherlands Antilles', 599, 5),
(155, 'NL', 'Netherlands The', 31, 5),
(156, 'NC', 'New Caledonia', 687, 5),
(157, 'NZ', 'New Zealand', 64, 5),
(158, 'NI', 'Nicaragua', 505, 5),
(159, 'NE', 'Niger', 227, 5),
(160, 'NG', 'Nigeria', 234, 5),
(161, 'NU', 'Niue', 683, 5),
(162, 'NF', 'Norfolk Island', 672, 5),
(163, 'MP', 'Northern Mariana Islands', 1670, 5),
(164, 'NO', 'Norway', 47, 5),
(165, 'OM', 'Oman', 968, 5),
(166, 'PK', 'Pakistan', 92, 5),
(167, 'PW', 'Palau', 680, 5),
(168, 'PS', 'Palestinian Territory Occupied', 970, 5),
(169, 'PA', 'Panama', 507, 5),
(170, 'PG', 'Papua new Guinea', 675, 5),
(171, 'PY', 'Paraguay', 595, 5),
(172, 'PE', 'Peru', 51, 5),
(173, 'PH', 'Philippines', 63, 5),
(174, 'PN', 'Pitcairn Island', 0, 5),
(175, 'PL', 'Poland', 48, 5),
(176, 'PT', 'Portugal', 351, 5),
(177, 'PR', 'Puerto Rico', 1787, 5),
(178, 'QA', 'Qatar', 974, 5),
(179, 'RE', 'Reunion', 262, 5),
(180, 'RO', 'Romania', 40, 5),
(181, 'RU', 'Russia', 70, 5),
(182, 'RW', 'Rwanda', 250, 5),
(183, 'SH', 'Saint Helena', 290, 5),
(184, 'KN', 'Saint Kitts And Nevis', 1869, 5),
(185, 'LC', 'Saint Lucia', 1758, 5),
(186, 'PM', 'Saint Pierre and Miquelon', 508, 5),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784, 5),
(188, 'WS', 'Samoa', 684, 5),
(189, 'SM', 'San Marino', 378, 5),
(190, 'ST', 'Sao Tome and Principe', 239, 5),
(191, 'SA', 'Saudi Arabia', 966, 5),
(192, 'SN', 'Senegal', 221, 5),
(193, 'RS', 'Serbia', 381, 5),
(194, 'SC', 'Seychelles', 248, 5),
(195, 'SL', 'Sierra Leone', 232, 5),
(196, 'SG', 'Singapore', 65, 3.5),
(197, 'SK', 'Slovakia', 421, 5),
(198, 'SI', 'Slovenia', 386, 5),
(199, 'XG', 'Smaller Territories of the UK', 44, 5),
(200, 'SB', 'Solomon Islands', 677, 5),
(201, 'SO', 'Somalia', 252, 5),
(202, 'ZA', 'South Africa', 27, 5),
(203, 'GS', 'South Georgia', 0, 5),
(204, 'SS', 'South Sudan', 211, 5),
(205, 'ES', 'Spain', 34, 5),
(206, 'LK', 'Sri Lanka', 94, 5),
(207, 'SD', 'Sudan', 249, 5),
(208, 'SR', 'Suriname', 597, 5),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47, 5),
(210, 'SZ', 'Swaziland', 268, 5),
(211, 'SE', 'Sweden', 46, 5),
(212, 'CH', 'Switzerland', 41, 5),
(213, 'SY', 'Syria', 963, 5),
(214, 'TW', 'Taiwan', 886, 5),
(215, 'TJ', 'Tajikistan', 992, 5),
(216, 'TZ', 'Tanzania', 255, 5),
(217, 'TH', 'Thailand', 66, 5),
(218, 'TG', 'Togo', 228, 5),
(219, 'TK', 'Tokelau', 690, 5),
(220, 'TO', 'Tonga', 676, 5),
(221, 'TT', 'Trinidad And Tobago', 1868, 5),
(222, 'TN', 'Tunisia', 216, 5),
(223, 'TR', 'Turkey', 90, 5),
(224, 'TM', 'Turkmenistan', 7370, 5),
(225, 'TC', 'Turks And Caicos Islands', 1649, 5),
(226, 'TV', 'Tuvalu', 688, 5),
(227, 'UG', 'Uganda', 256, 5),
(228, 'UA', 'Ukraine', 380, 5),
(229, 'AE', 'United Arab Emirates', 971, 5),
(230, 'GB', 'United Kingdom', 44, 5),
(231, 'US', 'United States', 1, 5),
(232, 'UM', 'United States Minor Outlying Islands', 1, 5),
(233, 'UY', 'Uruguay', 598, 5),
(234, 'UZ', 'Uzbekistan', 998, 5),
(235, 'VU', 'Vanuatu', 678, 5),
(236, 'VA', 'Vatican City State (Holy See)', 39, 5),
(237, 'VE', 'Venezuela', 58, 5),
(238, 'VN', 'Vietnam', 84, 5),
(239, 'VG', 'Virgin Islands (British)', 1284, 5),
(240, 'VI', 'Virgin Islands (US)', 1340, 5),
(241, 'WF', 'Wallis And Futuna Islands', 681, 5),
(242, 'EH', 'Western Sahara', 212, 5),
(243, 'YE', 'Yemen', 967, 5),
(244, 'YU', 'Yugoslavia', 38, 5),
(245, 'ZM', 'Zambia', 260, 5),
(246, 'ZW', 'Zimbabwe', 263, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_educational_videos`
--

CREATE TABLE `tbl_educational_videos` (
  `id` int(11) NOT NULL,
  `video_type` enum('youtube','video') DEFAULT NULL,
  `video_code` varchar(255) DEFAULT NULL,
  `video_file` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_educational_videos`
--

INSERT INTO `tbl_educational_videos` (`id`, `video_type`, `video_code`, `video_file`, `title`, `image`, `date`) VALUES
(2, 'video', 'X_zf0n0PC-w', '4e4b5fbbbb602b6d35bea8460aa8f8e5_1625825494_1445.mp4', 'Holiday Peripheriegeräte mit Geschenkartikeln', '7504adad8bb96320eb3afdd4df6e1f60_1621326831_1261.jpg', '2021-05-18 13:33:51'),
(3, 'video', NULL, 'f5f8590cd58a54e94377e6ae2eded4d9_1625861805_3962.mp4', 'Hippolook introduction', 'b73dfe25b4b8714c029b37a6ad3006fa_1625861804_3326.png', '2021-07-09 15:16:45'),
(4, 'video', NULL, '6883966fd8f918a4aa29be29d2c386fb_1625873168_3785.mp4', 'Prescription Introduction', '98b297950041a42470269d56260243a1_1625873346_2001.png', '2021-07-09 18:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE `tbl_faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `sort_order` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_faqs`
--

INSERT INTO `tbl_faqs` (`id`, `question`, `answer`, `status`, `sort_order`) VALUES
(1, 'I don\'t know how to track my order. Please assist.', '<p>After we had sent the product, we will provide you the Tracking Number. Just click at the tracking number and it will link you to the infomation of your product.</p>\r\n', 1, 1),
(2, 'Can I get a full refund?', '<p><span style=\"color:#0f0f0f\">You can only get the refund when there is out of stock. After payment, if the timing is too long I am sorry to say that it is difficult to get refund as we may in the process of making your glasses. You can try to email us at support@hippolook.com and we will get back to you asap.</span></p>\r\n', 1, 2),
(3, 'I received an item as a gift. Can I return it?', '<p><span style=\"color: rgb(15, 15, 15); font-family: &quot;ABeeZee Regular&quot;; font-size: 11px;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span><br></p>', 1, 3),
(4, 'Can I order online and pick up at a store?', '<p><span style=\"color:#0f0f0f\">No. Meanwhile our store is based in Singapore, we will see there is any need in future.</span></p>\r\n', 1, 4),
(5, 'I have a new prescription. What can I do?', '<p><span style=\"color:#0f0f0f\">You can fill in the new prescription in your next order.</span></p>\r\n', 1, 5),
(6, 'What type of payment methods do you accept?', '<p><span style=\"color:#0f0f0f\">We can accept Paypal and Credit Cards. All transactions are in US dollars.</span></p>\r\n', 1, 6),
(8, 'I didn\'t receive an order confirmation. Why not?', '<p><span style=\"color:#0f0f0f\">Pls wait for about two hrs for the confirmation. Some emails may take longer time to reach you. If you still never receive the confirmation you can email us at support@hippolook.com</span></p>\r\n', 1, 7),
(9, 'I\'ve just placed an order, is it still possible to modify or cancel my order?', '<p><span style=\"color:#0f0f0f\">If the payment is just made you can quickly email us at support@hippolook.com, we will contact you asap.</span></p>\r\n', 1, 8),
(10, 'What do I do if my package was damaged?', '<p><span style=\"color:#0f0f0f\">Pls take some pictures and send to us at support@hippolook.com, we will do a replacement for you. We will only do one time replacement.</span></p>\r\n', 1, 9),
(11, 'What countries do you ship to?', '<p>We can ship almost all countries. In case we could not reach your country we can refund you and cancel the order.</p>\r\n', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorites`
--

CREATE TABLE `tbl_favorites` (
  `mem_id` int(11) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `ref_type` enum('product') DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_favorites`
--

INSERT INTO `tbl_favorites` (`mem_id`, `ref_id`, `ref_type`, `date`) VALUES
(1, 4, 'product', '2021-05-21 07:32:22'),
(1, 5, 'product', '2021-05-28 14:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_id` int(10) UNSIGNED DEFAULT NULL,
  `ref_type` enum('product') DEFAULT 'product',
  `image` varchar(255) DEFAULT NULL,
  `main` tinyint(1) DEFAULT 0,
  `admin` tinyint(1) DEFAULT 0,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `ref_id`, `ref_type`, `image`, `main`, `admin`, `date`) VALUES
(1, 5, 'product', 'd34ab169b70c9dcd35e62896010cd9ff_1621586453_2323.jpg', 0, 0, '2021-05-21 04:40:53'),
(2, 5, 'product', 'df877f3865752637daa540ea9cbc474f_1621586453_4861.jpg', 0, 0, '2021-05-21 04:40:54'),
(4, 1, 'product', '7fe1f8abaad094e0b5cb1b01d712f708_1623529313_8758.PNG', 0, 0, '2021-06-12 16:21:54'),
(5, 1, 'product', 'c6e19e830859f2cb9f7c8f8cacb8d2a6_1623529314_1874.PNG', 0, 0, '2021-06-12 16:21:55'),
(6, 18, 'product', '11b921ef080f7736089c757404650e40_1627074575_9310.jpg', 0, 0, '2021-07-23 17:09:35'),
(7, 18, 'product', '1fc214004c9481e4c8073e85323bfd4b_1627074816_5891.jpg', 0, 0, '2021-07-23 17:13:36'),
(9, 18, 'product', 'c9892a989183de32e976c6f04e700201_1627074883_4681.jpg', 0, 0, '2021-07-23 17:14:43'),
(10, 18, 'product', 'e94550c93cd70fe748e6982b3439ad3b_1627074883_4538.jpg', 0, 0, '2021-07-23 17:14:43'),
(11, 18, 'product', '49ae49a23f67c759bf4fc791ba842aa2_1627074883_3627.jpg', 0, 0, '2021-07-23 17:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_glasses`
--

CREATE TABLE `tbl_glasses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type_first_price` float DEFAULT NULL,
  `type_second_price` float DEFAULT NULL,
  `property_first_price` float DEFAULT NULL,
  `property_second_price` float DEFAULT NULL,
  `classic_first_price` float DEFAULT NULL,
  `classic_second_price` float DEFAULT NULL,
  `classic_third_price` float DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_glasses`
--

INSERT INTO `tbl_glasses` (`id`, `title`, `type_first_price`, `type_second_price`, `property_first_price`, `property_second_price`, `classic_first_price`, `classic_second_price`, `classic_third_price`, `detail`) VALUES
(1, 'Frame Only', 2, 4, NULL, NULL, NULL, NULL, NULL, 'a:10:{s:8:\"overview\";s:29:\"Lens without any prescription\";s:16:\"type_first_title\";s:12:\"Clear Lenses\";s:17:\"type_first_detial\";s:49:\"For everyday use, standard anti-reflective lenses\";s:17:\"type_second_title\";s:19:\"Blue Light Blocking\";s:18:\"type_second_detial\";s:55:\"Blocks more blue light from digital screens and the sun\";s:9:\"main_icon\";s:52:\"05f971b5ec196b8c65b75d2ef8267331_1625123049_5761.svg\";s:15:\"type_first_icon\";s:52:\"86b122d4358357d834a87ce618a55de0_1625473905_5804.svg\";s:16:\"type_second_icon\";s:52:\"2a79ea27c279e471f4d180b08d62b00a_1625473905_9595.svg\";s:17:\"type_first_detail\";s:19:\"Normal clear lenses\";s:18:\"type_second_detail\";s:49:\"Block blue light from monitor, cell phone and sun\";}'),
(2, 'Prescription Lens', 10, 12, NULL, NULL, 10, 20, 30, 'a:23:{s:8:\"overview\";s:76:\"Your eye prescription using certain abbreviations and specified measurements\";s:9:\"main_icon\";s:52:\"acf4b89d3d503d8252c9c4ba75ddbf6d_1625123260_7455.svg\";s:16:\"type_first_title\";s:14:\"Classic Lenses\";s:17:\"type_first_detial\";s:49:\"For everyday use, standard anti-reflective lenses\";s:17:\"type_second_title\";s:19:\"Blue Light Blocking\";s:18:\"type_second_detial\";s:55:\"Blocks more blue light from digital screens and the sun\";s:15:\"type_first_icon\";s:52:\"0e65972dce68dad4d52d063967f0a705_1625473923_1268.svg\";s:16:\"type_second_icon\";s:52:\"dc5689792e08eb2e219dce49e64c885b_1625473923_3246.svg\";s:19:\"classic_first_title\";s:19:\"Standard Index 1.56\";s:20:\"classic_first_detial\";s:10:\"1.56 Index\";s:20:\"classic_second_title\";s:15:\"High Index 1.61\";s:21:\"classic_second_detial\";s:10:\"1.61 index\";s:19:\"classic_third_title\";s:19:\"Advanced Index 1.67\";s:20:\"classic_third_detial\";s:10:\"1.67 index\";s:18:\"classic_first_icon\";s:52:\"c24cd76e1ce41366a4bbe8a49b02a028_1625124813_2869.svg\";s:19:\"classic_second_icon\";s:52:\"9461cce28ebe3e76fb4b931c35a169b0_1625124813_3817.svg\";s:18:\"classic_third_icon\";s:52:\"58e4d44e550d0f7ee0a23d6b02d9b0db_1625124813_2941.svg\";s:17:\"type_first_detail\";s:19:\"Normal clear lenses\";s:18:\"type_second_detail\";s:49:\"Block blue light from monitor, cell phone and sun\";s:20:\"classic_first_detail\";s:68:\"Common use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";s:20:\"classic_third_detail\";s:67:\"Thin lens for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";s:22:\"classic_second_detaill\";s:10:\"1.61 index\";s:21:\"classic_second_detail\";s:66:\"Best use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";}'),
(3, 'Polarized Lens', 5, 20, NULL, NULL, 30, 50, 67, 'a:22:{s:8:\"overview\";s:48:\"Special chemical applied to filter bright light.\";s:9:\"main_icon\";s:52:\"9fd81843ad7f202f26c1a174c7357585_1625123304_8187.svg\";s:16:\"type_first_title\";s:6:\"Normal\";s:17:\"type_first_detial\";s:49:\"For everyday use, standard anti-reflective lenses\";s:17:\"type_second_title\";s:12:\"Prescription\";s:18:\"type_second_detial\";s:55:\"Blocks more blue light from digital screens and the sun\";s:19:\"classic_first_title\";s:19:\"Standard Index 1.56\";s:20:\"classic_first_detial\";s:10:\"1.56 Index\";s:20:\"classic_second_title\";s:15:\"High Index 1.61\";s:21:\"classic_second_detial\";s:10:\"1.61 index\";s:19:\"classic_third_title\";s:19:\"Advanced Index 1.67\";s:20:\"classic_third_detial\";s:10:\"1.67 index\";s:15:\"type_first_icon\";s:52:\"85422afb467e9456013a2a51d4dff702_1625473939_2412.svg\";s:16:\"type_second_icon\";s:52:\"559cb990c9dffd8675f6bc2186971dc2_1625820711_2272.svg\";s:18:\"classic_first_icon\";s:52:\"a4a042cf4fd6bfb47701cbc8a1653ada_1625125536_7151.svg\";s:19:\"classic_second_icon\";s:52:\"df877f3865752637daa540ea9cbc474f_1625125536_5584.svg\";s:18:\"classic_third_icon\";s:52:\"49ae49a23f67c759bf4fc791ba842aa2_1625125536_6302.svg\";s:17:\"type_first_detail\";s:27:\"Lenses without prescription\";s:18:\"type_second_detail\";s:76:\"Your eye prescription using certain abbreviations and specified measurements\";s:20:\"classic_first_detail\";s:70:\"Common use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\r\n\";s:21:\"classic_second_detail\";s:66:\"Best use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";s:20:\"classic_third_detail\";s:67:\"Thin lens for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";}'),
(4, 'Transition Lens', 20, 30, 0, 20, 10, 20, 30, 'a:30:{s:8:\"overview\";s:71:\"Protect your eyes from bright sun outdoors and artificial light indoors\";s:9:\"main_icon\";s:52:\"303ed4c69846ab36c2904d3ba8573050_1625123328_8251.svg\";s:16:\"type_first_title\";s:10:\"Clear Lens\";s:17:\"type_first_detial\";s:49:\"For everyday use, standard anti-reflective lenses\";s:17:\"type_second_title\";s:12:\"Prescription\";s:18:\"type_second_detial\";s:55:\"Blocks more blue light from digital screens and the sun\";s:20:\"property_first_title\";s:11:\"Normal Lens\";s:21:\"property_first_detial\";s:49:\"For everyday use, standard anti-reflective lenses\";s:21:\"property_second_title\";s:19:\"Blue Light Blocking\";s:22:\"property_second_detial\";s:55:\"Blocks more blue light from digital screens and the sun\";s:19:\"classic_first_title\";s:19:\"Standard Index 1.56\";s:20:\"classic_first_detial\";s:10:\"1.56 Index\";s:20:\"classic_second_title\";s:15:\"High Index 1.61\";s:21:\"classic_second_detial\";s:10:\"1.61 index\";s:19:\"classic_third_title\";s:19:\"Advanced Index 1.67\";s:20:\"classic_third_detial\";s:10:\"1.67 index\";s:15:\"type_first_icon\";s:52:\"13f9896df61279c928f19721878fac41_1625474005_1556.svg\";s:16:\"type_second_icon\";s:52:\"5e9f92a01c986bafcabbafd145520b13_1625820768_6745.svg\";s:19:\"property_first_icon\";s:52:\"d64a340bcb633f536d56e51874281454_1625820970_6311.svg\";s:20:\"property_second_icon\";s:52:\"1ecfb463472ec9115b10c292ef8bc986_1625820970_7642.svg\";s:18:\"classic_first_icon\";s:52:\"6855456e2fe46a9d49d3d3af4f57443d_1625126272_9972.svg\";s:19:\"classic_second_icon\";s:52:\"ca9c267dad0305d1a6308d2a0cf1c39c_1625126272_1802.svg\";s:18:\"classic_third_icon\";s:52:\"e2230b853516e7b05d79744fbd4c9c13_1625126272_8875.svg\";s:17:\"type_first_detail\";s:27:\"Lenses without prescription\";s:18:\"type_second_detail\";s:55:\"Blocks more blue light from digital screens and the sun\";s:21:\"property_first_detail\";s:32:\"No anti-blue light block coating\";s:22:\"property_second_detail\";s:49:\"Block blue light from monitor, cell phone and sun\";s:20:\"classic_first_detail\";s:68:\"Common use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";s:21:\"classic_second_detail\";s:68:\"Best use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\r\n\";s:20:\"classic_third_detail\";s:67:\"Thin lens for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";}'),
(5, 'Progressive Lens', 0, 15, 0, 30, 60, 70, 90, 'a:32:{s:8:\"overview\";s:70:\"Additional correction required to see clearly at all viewing distances\";s:9:\"main_icon\";s:52:\"d34ab169b70c9dcd35e62896010cd9ff_1625123362_6501.svg\";s:16:\"type_first_title\";s:13:\"Normal Lenses\";s:17:\"type_first_detial\";s:49:\"For everyday use, standard anti-reflective lenses\";s:17:\"type_second_title\";s:19:\"Blue Light Blocking\";s:18:\"type_second_detial\";s:55:\"Blocks more blue light from digital screens and the sun\";s:16:\"type_third_title\";s:17:\"Transition Lenses\";s:17:\"type_third_detial\";s:64:\"Anti-reflective, clear lenses that darken (gray) in the sunlight\";s:19:\"classic_first_title\";s:19:\"Standard Index 1.56\";s:20:\"classic_first_detial\";s:10:\"1.56 Index\";s:20:\"classic_second_title\";s:15:\"High Index 1.61\";s:21:\"classic_second_detial\";s:10:\"1.61 index\";s:19:\"classic_third_title\";s:19:\"Advanced Index 1.67\";s:20:\"classic_third_detial\";s:10:\"1.67 index\";s:15:\"type_first_icon\";s:52:\"fb89705ae6d743bf1e848c206e16a1d7_1625473976_7766.svg\";s:16:\"type_second_icon\";s:52:\"fe73f687e5bc5280214e0486b273a5f9_1625473976_5051.svg\";s:15:\"type_third_icon\";s:52:\"bcbe3365e6ac95ea2c0343a2395834dd_1625821050_4591.svg\";s:18:\"classic_first_icon\";s:52:\"605ff764c617d3cd28dbbdd72be8f9a2_1625126730_9171.svg\";s:19:\"classic_second_icon\";s:52:\"3def184ad8f4755ff269862ea77393dd_1625126730_8007.svg\";s:18:\"classic_third_icon\";s:52:\"2b8a61594b1f4c4db0902a8a395ced93_1625126730_4601.svg\";s:17:\"type_first_detail\";s:32:\"No anti-blue light block coating\";s:18:\"type_second_detail\";s:49:\"Block blue light from monitor, cell phone and sun\";s:17:\"type_third_detail\";s:72:\"Protects your eyes from bright sun outdoors and artificial light indoors\";s:20:\"classic_first_detail\";s:68:\"Common use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";s:21:\"classic_second_detail\";s:66:\"Best use for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";s:20:\"classic_third_detail\";s:67:\"Thin lens for all frame.\r\nAnti-scratch coat.\r\nAnti-reflective coat.\";s:20:\"property_first_title\";s:13:\"Normal Lenses\";s:21:\"property_first_detail\";s:25:\"Lenses without Transition\";s:21:\"property_second_title\";s:17:\"Transition Lenses\";s:22:\"property_second_detail\";s:64:\"Anti-reflective, clear lenses that darken (gray) in the sunlight\";s:19:\"property_first_icon\";s:52:\"9872ed9fc22fc182d371c3e9ed316094_1627391141_7527.svg\";s:20:\"property_second_icon\";s:52:\"892c91e0a653ba19df81a90f89d99bcd_1627391141_3706.svg\";}'),
(6, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:2:{s:8:\"overview\";s:25:\"Same as the picture shown\";s:9:\"main_icon\";s:52:\"3871bd64012152bfb53fdf04b401193f_1625123964_6060.svg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materials`
--

CREATE TABLE `tbl_materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materials`
--

INSERT INTO `tbl_materials` (`id`, `title`) VALUES
(1, 'Acetate'),
(2, 'Plastic'),
(3, 'Metal'),
(4, 'Titanium'),
(5, 'TR90'),
(6, 'Nylon'),
(7, 'Wood');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `mem_id` int(11) NOT NULL,
  `mem_remember` varchar(255) DEFAULT NULL,
  `mem_token` varchar(100) DEFAULT NULL,
  `mem_type` enum('member') DEFAULT NULL,
  `mem_social_type` varchar(255) DEFAULT 'website',
  `mem_social_id` varchar(255) DEFAULT NULL,
  `mem_fname` varchar(255) DEFAULT NULL,
  `mem_lname` varchar(255) DEFAULT NULL,
  `mem_email` varchar(255) DEFAULT NULL,
  `mem_pswd` varchar(255) DEFAULT NULL,
  `mem_code` varchar(255) DEFAULT NULL,
  `mem_phone` varchar(255) DEFAULT NULL,
  `mem_sex` enum('male','female','other') DEFAULT NULL,
  `mem_dob` date DEFAULT NULL,
  `mem_company` varchar(255) DEFAULT NULL,
  `mem_website` varchar(255) DEFAULT NULL,
  `mem_about` text DEFAULT NULL,
  `mem_profile_heading` varchar(255) DEFAULT NULL,
  `mem_image` varchar(100) DEFAULT NULL,
  `mem_cover_image` varchar(255) DEFAULT NULL,
  `mem_location` varchar(100) DEFAULT NULL,
  `mem_address1` varchar(255) DEFAULT NULL,
  `mem_house_number` varchar(255) DEFAULT NULL,
  `mem_city` varchar(255) DEFAULT NULL,
  `mem_state` varchar(2) DEFAULT NULL,
  `mem_zip` varchar(100) DEFAULT NULL,
  `mem_country` varchar(255) DEFAULT NULL,
  `mem_ssn` varchar(50) DEFAULT NULL,
  `mem_dln` varchar(50) DEFAULT NULL,
  `mem_contact_name` varchar(255) DEFAULT NULL,
  `mem_contact_phone` varchar(255) DEFAULT NULL,
  `mem_ip` varchar(255) DEFAULT NULL,
  `mem_note` varchar(255) DEFAULT NULL,
  `mem_referral_code` varchar(6) DEFAULT NULL,
  `mem_fb_link` varchar(255) DEFAULT NULL,
  `mem_twitter_link` varchar(255) DEFAULT NULL,
  `mem_linkedin_link` varchar(255) DEFAULT NULL,
  `mem_youtube_link` varchar(255) DEFAULT NULL,
  `mem_paypal` varchar(255) DEFAULT NULL,
  `mem_stripe_id` varchar(255) DEFAULT NULL,
  `mem_map_lat` varchar(500) DEFAULT NULL,
  `mem_map_lng` varchar(500) DEFAULT NULL,
  `mem_phone_code` varchar(6) DEFAULT NULL,
  `mem_phone_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mem_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mem_status` tinyint(1) NOT NULL DEFAULT 1,
  `mem_featured` tinyint(1) DEFAULT 0,
  `mem_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mem_reminder_email` tinyint(1) DEFAULT 0,
  `mem_reminder_calendar_email` tinyint(1) DEFAULT 0,
  `mem_last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_fname` varchar(255) DEFAULT NULL,
  `ship_lname` varchar(255) DEFAULT NULL,
  `ship_company` varchar(255) DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_house_number` varchar(255) DEFAULT NULL,
  `ship_zip` varchar(20) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_country` varchar(255) DEFAULT NULL,
  `ship_phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `mem_remember`, `mem_token`, `mem_type`, `mem_social_type`, `mem_social_id`, `mem_fname`, `mem_lname`, `mem_email`, `mem_pswd`, `mem_code`, `mem_phone`, `mem_sex`, `mem_dob`, `mem_company`, `mem_website`, `mem_about`, `mem_profile_heading`, `mem_image`, `mem_cover_image`, `mem_location`, `mem_address1`, `mem_house_number`, `mem_city`, `mem_state`, `mem_zip`, `mem_country`, `mem_ssn`, `mem_dln`, `mem_contact_name`, `mem_contact_phone`, `mem_ip`, `mem_note`, `mem_referral_code`, `mem_fb_link`, `mem_twitter_link`, `mem_linkedin_link`, `mem_youtube_link`, `mem_paypal`, `mem_stripe_id`, `mem_map_lat`, `mem_map_lng`, `mem_phone_code`, `mem_phone_verified`, `mem_verified`, `mem_status`, `mem_featured`, `mem_date`, `mem_reminder_email`, `mem_reminder_calendar_email`, `mem_last_login`, `ship_fname`, `ship_lname`, `ship_company`, `ship_address`, `ship_house_number`, `ship_zip`, `ship_city`, `ship_country`, `ship_phone`) VALUES
(1, NULL, '083b84a90eb1b2878195fa57915ab0c8997cfbb6', 'member', 'website', NULL, 'Jack', 'Sparrow', 'test@gmail.com', 'i5c3u3r484q4p4w4y486z453', '15b4g4v3n3s4u4k375u5p5t275j3a3f3u39304u4j3157353', '132456798', NULL, '2021-04-13', NULL, '', 'This is testing Profile bio', NULL, '432aca3a1e345e339f35a30c8f65edce_1626086118_8534.jpg', '', NULL, 'st chowk', '12', 'Evergreen', 'CO', '10001', 'Canada', NULL, NULL, NULL, NULL, '', NULL, 'NE9PLI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2020-12-28 13:26:08', 0, 0, '2021-07-29 14:17:26', 'Asad', 'Ali', '', 'st chowk', '324', 'test', 'Calgary', 'Canada', '2223214555'),
(2, NULL, NULL, 'member', 'website', NULL, 'Ali', 'Khan', 'ali@gmail.com', 'i5c3u3r484q4p4w4y486z453', '75s3s4h4p3t4k5r4a595q5n4w4m4i3m484n3u216j3459453', '3039640929', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '29310 Buchanan Dr', 'house 56 street 2', '', NULL, '80439', 'USA', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-01-13 10:47:44', 0, 0, '2021-01-13 10:47:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, '083b84a90eb1b2878195fa57915ab0c8997cfbb6', 'member', 'website', NULL, 'Sarim', 'Khan', 'sarim@gmail.com', 'i5c3u3r484q4p4w4y486z453', '', '3039640928', NULL, '1999-01-01', NULL, '', NULL, NULL, NULL, '', NULL, '29310 Buchanan Dr', 'House 54 streeet 2', '', NULL, '80439', 'USA', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, '2021-01-13 10:55:57', 0, 0, '2021-07-29 14:17:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'deb2b0a6a7a9573fd903fe38cd7d0c84371dd31f', 'member', 'website', NULL, 'Reewr', 'Werwer', 'jutt7@gmail.com', 'i5c3u3r484q4p4w4y486z453', 'w483t2i484a525v2z464k4i4i504a3g48473z2n52464u253', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'RIMCG0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-01-27 09:23:24', 0, 0, '2021-07-09 10:07:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, 'ff31c8b68b573f0d3a7ba89b88a816255bc1acdb', 'member', 'website', NULL, 'rol', 'Roland', 'rolandtch@gmail.com', 'v4p3h3r4m3q455x2z486l5x2', '', '96281633', NULL, NULL, NULL, '', NULL, NULL, '1141938ba2c2b13f5505d7c424ebae5f_1626086141_3419.jpg', '', NULL, '103B Depot Road #02-533', '12', '', NULL, '102103', 'Singapore', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2021-06-12 10:31:11', 0, 0, '2021-08-04 06:26:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, 'member', 'website', NULL, 'Asad', 'fdfdsf', 'konimbonisdfdsfm7@gmail.com', '85c3y3c47484a5i4k58485f4j5z2t313', 'f5r213m4549554g4j58474k4j5z2m3d404c3o3q52445a49334x2q2a4e555w4p4y3x2f4s4u465e4a4x4m35323', '03020000001', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, 'office 7, rehman trade center, university road sargodha', 'dsfdsf', '', NULL, '40100', 'Pakistan', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-07-29 13:11:47', 0, 0, '2021-07-29 13:11:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, 'member', 'website', NULL, 'Daniel', 'Pardo', 'albacetenio@hotmail.com', '15c3g4o474t4d4q4j584b4m455m4q3l4z3s3w3w544n4y2t4q3s32333', '75s3s4a4x395y4j4l5t445p4h504x25374b333142475g3k4b4e3u2c4f544x2o4n3f33513', '85025044', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '103b depot road ', '02-533', '', NULL, '102103', 'Singapore', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-07-29 13:48:54', 0, 0, '2021-07-29 13:48:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, 'member', 'website', NULL, 'wen', 'lv', '18916070505@163.com', 'x4p3h3o4m3q4l4x4j5u4h553', 'v4p3b4u2l36595u4z486j4t2x4h3q353n3o3z336g3t5o3q4b4u3p2v2v4m4g453', '+8618916070505', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, 'Lane 799', '201', '', NULL, '200000', 'Singapore', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-07-30 05:58:16', 0, 0, '2021-07-30 05:58:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'member', 'website', NULL, 'Test', 'Test', 'test@test.com', '45c3u3r484t4s5s4b564j4s4x4j4h313', 'i5c3u3r484r4m4v2b5a5w4s2w4m4i3m484n3u224j3o4h453', '09496770378', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '9D, Capel Street', '118', '', NULL, 'le14 4np', 'United Kingdom', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-07-30 14:45:59', 0, 0, '2021-07-30 14:45:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, 'member', 'website', NULL, 'Daniel', 'Pardo', 'albacetenio@gmail.com', '15c3g4o474t4d4p3i595w4t2i5k3w2l4n3l373e4', '75s3s4a4x395y4j4l5t445p4h504x25304q2v2l51475t4p424x2y2m4t42524x2n3s3j493', '85025044', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '103b depot road', '635', '', NULL, '102103', 'Singapore', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-07-31 03:27:35', 0, 0, '2021-07-31 03:27:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, 'member', 'website', NULL, 'Abida', 'Rehman', 'abidaa.rehman@gmail.com', 'v4p3d3q4l3t5m4c345v5t553', '75s3i3h4y3t4q4f4x4w5s4g4h5k3p28484b4c3r52475g3k4b4e3u2c4f544x2o4n3v3p5y4', '03001234567', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, 'Sargodha', '62', '', NULL, '40100', 'Pakistan', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2021-07-31 15:42:27', 0, 0, '2021-07-31 15:42:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, 'member', 'website', NULL, 'wen', 'lv', '648004026@qq.com', 'x4p3h3o4m3q4l4x4j5u4i5n4k5g41313', 'w4b4p3t2l3q4l4v2y4q4r4u215l3a3o4m3d4o3z52435u2s4r3h4c433', '+8618916070505', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, 'Lane 799', '201', '', NULL, '200000', 'China', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-08-03 03:10:53', 0, 0, '2021-08-03 03:10:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, 'member', 'website', NULL, 'Daniel', 'Pardo ', 'cyberpardo@hotmail.com', 'v4p3h3r4m3q455x2z486l553', '75s2g4a4y3a5u4u4a5a5s4f4i5x263f484r2s3x5t375i4n4p3k4j3o4f515x2v2m3h4z493', '85025044', NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '103b depot road', '54', '', NULL, '102103', 'Singapore', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2021-08-03 14:22:01', 0, 0, '2021-08-03 14:22:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, 'member', 'website', NULL, 'Muhammad', 'Naeem', 'mnaeem.hsol@gmail.com', 'r4t3e324h395y4c4b576o4t4w4x3m3u3', 'g5s3x294y39565r4x4v5m5u4i5z2o45304q2v2l51475t4p424x2y2m4t425q3v2n3s3j493', '013245679', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'herosolutions', 'vcvx', NULL, NULL, '5621', 'Armenia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2025-02-27 12:47:30', 0, 0, '2025-02-27 12:47:30', 'Muhammad', 'Naeem', 'gfd', 'herosolutions', 'vcvx', '5621', 'Sadfd', 'Armenia', '013245679');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `id` int(11) NOT NULL,
  `mem_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `mem_id`, `email`) VALUES
(2, NULL, 'ali@gmail.com'),
(6, NULL, 'test@gmail.com'),
(7, NULL, 'ninja@herosolutions.com.pk'),
(8, NULL, 'abidaa.rehman@gmail.com'),
(9, NULL, '648004026@qq.com'),
(10, NULL, 'cyberpardo@hotmail.com'),
(11, NULL, 'mnaeem.hsol@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(11) NOT NULL,
  `encoded_id` varchar(255) DEFAULT NULL,
  `mem_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `txt` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `cat` enum('comments','subscribed','notes','other') NOT NULL,
  `note_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('new','seen') NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL DEFAULT 0,
  `contact_email` varchar(255) DEFAULT NULL,
  `ship_fname` varchar(255) DEFAULT NULL,
  `ship_lname` varchar(255) DEFAULT NULL,
  `ship_company` varchar(255) DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_house_number` varchar(255) DEFAULT NULL,
  `ship_zip` varchar(20) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_country` varchar(255) DEFAULT NULL,
  `ship_phone` varchar(100) DEFAULT NULL,
  `billing_fname` varchar(255) DEFAULT NULL,
  `billing_lname` varchar(255) DEFAULT NULL,
  `billing_company` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_house_number` varchar(255) DEFAULT NULL,
  `billing_zip` varchar(20) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(100) DEFAULT NULL,
  `discount_code` varchar(100) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `delivery_cost` float DEFAULT NULL,
  `shipping_msg` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `paid` tinyint(1) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `mem_id`, `contact_email`, `ship_fname`, `ship_lname`, `ship_company`, `ship_address`, `ship_house_number`, `ship_zip`, `ship_city`, `ship_country`, `ship_phone`, `billing_fname`, `billing_lname`, `billing_company`, `billing_address`, `billing_house_number`, `billing_zip`, `billing_city`, `billing_country`, `billing_phone`, `discount_code`, `discount_amount`, `tax`, `delivery_cost`, `shipping_msg`, `status`, `paid`, `date`) VALUES
(1, 1, 'test@gmail.com', 'Asad', 'Ali', '', 'st chowk', '324', 'test', 'Calgary', 'Canada', '2223214555', 'Asad', 'Ali', '', 'st chowk', '324', 'test', 'Calgary', 'Canada', '2223214555', NULL, NULL, 0, 0, NULL, 0, 1, '2021-07-27 13:14:58'),
(2, 1, 'test@gmail.com', 'Asad', 'Ali', '', 'st chowk', '324', 'test', 'Calgary', 'Canada', '2223214555', 'Asad', 'Ali', '', 'st chowk', '324', 'test', 'Calgary', 'Canada', '2223214555', NULL, NULL, 0, 0, NULL, 0, 1, '2021-07-28 10:07:51'),
(3, 6, 'rolandtch@gmail.com', 'rol', 'Roland', 'Matson Packaging System P L', '1 Ang Mo Kio Ind. Park 2A #05-09', '12', '568049', 'Singapore', 'Singapore', '96281633', 'rol', 'Roland', 'Matson Packaging System P L', '1 Ang Mo Kio Ind. Park 2A #05-09', '12', '568049', 'Singapore', 'Singapore', '96281633', 'rol1', 234, 0, 0, NULL, 0, 1, '2021-07-29 05:28:40'),
(4, 8, 'albacetenio@hotmail.com', 'Daniel ', 'Pardo ', '', '103b depot road ', '02-533', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel ', 'Pardo ', '', '103b depot road ', '02-533', '102103', 'Singapore', 'Singapore', '85025044', 'daniel', 13, 0, 5, NULL, 0, 0, '2021-07-29 13:56:04'),
(5, 8, 'albacetenio@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '02-533', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '02-533', '102103', 'Singapore', 'Singapore', '85025044', '12345', 91, 0, 0, NULL, 0, 0, '2021-07-29 14:03:55'),
(6, 8, 'albacetenio@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '654', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '654', '102103', 'Singapore', 'Singapore', '85025044', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-29 14:11:03'),
(7, 8, 'albacetenio@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '567', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '567', '102103', 'Singapore', 'Singapore', '85025044', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-29 14:22:38'),
(8, 8, 'albacetenio@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '648', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '648', '102103', 'Singapore', 'Singapore', '85025044', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-29 14:24:58'),
(9, 8, 'albacetenio@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '637', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '637', '102103', 'Singapore', 'Singapore', '85025044', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-29 14:26:52'),
(10, 6, 'rolandtch@gmail.com', 'Tan', 'Roland', '', '103B Depot Road #02-533', '111', '102103', 'Singapore', 'Singapore', '96281633', 'Tan', 'Roland', '', '103B Depot Road #02-533', '111', '102103', 'Singapore', 'Singapore', '96281633', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-29 22:04:53'),
(11, 6, 'rolandtch@gmail.com', 'Tan', 'Roland', '', '103B Depot Road #02-533', '111', '102103', 'Singapore', 'Singapore', '96281633', 'Tan', 'Roland', '', '103B Depot Road #02-533', '111', '102103', 'Singapore', 'Singapore', '96281633', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-29 22:16:28'),
(12, 6, 'rolandtch@gmail.com', 'Roland', 'Tan', '', 'Ash', '12', '102103', 'Singapore ', 'Singapore', '96281633', 'Roland', 'Tan', '', 'Ash', '12', '102103', 'Singapore ', 'Singapore', '96281633', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-29 22:43:58'),
(13, 6, 'rolandtch@gmail.com', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', '12', 146, 0, 0, NULL, 0, 0, '2021-07-30 05:08:15'),
(14, 6, 'rolandtch@gmail.com', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', '123', 50, 0, 0, NULL, 0, 0, '2021-07-30 05:15:46'),
(15, 6, 'rolandtch@gmail.com', 'Tan', 'Roland', '', '103B Depot Road #02-533', '02-533', '102103', 'Singapore', 'Singapore', '96281633', 'Tan', 'Roland', '', '103B Depot Road #02-533', '02-533', '102103', 'Singapore', 'Singapore', '96281633', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-30 05:55:29'),
(16, 9, '18916070505@163.com', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'Singapore', '+8618916070505', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'Singapore', '+8618916070505', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-30 05:59:55'),
(17, 9, '648004026@qq.com', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'Singapore', '+8618916070505', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'Singapore', '+8618916070505', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-30 06:08:14'),
(18, 9, '648004026@qq.com', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'China', '+8618916070505', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'China', '+8618916070505', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-30 06:45:16'),
(19, 9, '648004026@qq.com', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'China', '+8618916070505', 'Wen', 'Lyu', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'China', '+8618916070505', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-30 07:04:18'),
(20, 6, 'rolandtch@gmail.com', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', '1234', 13, 0, 5, NULL, 0, 1, '2021-07-30 07:08:09'),
(21, 10, 'test@test.com', 'Test', 'Test', '', '9D, Capel Street', '118', 'le14 4np', 'London', 'United Kingdom', '09496770378', 'Test', 'Test', '', '9D, Capel Street', '118', 'le14 4np', 'London', 'United Kingdom', '09496770378', NULL, NULL, 0, 5, NULL, 0, 0, '2021-07-30 14:46:24'),
(22, 11, 'albacetenio@gmail.com', 'Daniel', 'Pardo', '', '103b depot road', '635', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '635', '102103', 'Singapore', 'Singapore', '85025044', NULL, NULL, 0, 5, NULL, 0, 1, '2021-07-31 03:27:55'),
(23, 12, 'abidaa.rehman@gmail.com', 'Abida', 'Rehman', 'Hero solutions', 'Sargodha', '62', '40100', 'Sargodha', 'Pakistan', '03001234567', 'Abida', 'Rehman', 'Hero solutions', 'Sargodha', '62', '40100', 'Sargodha', 'Pakistan', '03001234567', NULL, NULL, 0, 0, NULL, 0, 1, '2021-07-31 15:42:55'),
(24, 6, 'rolandtch@gmail.com', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', 'Tan', 'Roland', '', '103B Depot Road #02-533', '11', '102103', 'Singapore', 'Singapore', '96281633', NULL, NULL, 0, 5, NULL, 0, 0, '2021-08-01 23:05:17'),
(25, 13, '648004026@qq.com', 'wen', 'lv', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'China', '+8618916070505', 'wen', 'lv', '', 'Lane 799', '201', '200000', 'SHANGHAI', 'China', '+8618916070505', NULL, NULL, 0, 5, NULL, 0, 0, '2021-08-03 03:25:43'),
(26, 14, 'cyberpardo@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '54', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '54', '102103', 'Singapore', 'Singapore', '85025044', '123456', 2, 0, 5, NULL, 0, 0, '2021-08-03 14:22:30'),
(27, 14, 'cyberpardo@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', '123456', 2, 0, 5, NULL, 0, 0, '2021-08-03 14:26:02'),
(28, 14, 'cyberpardo@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', '123456', 2, 0, 5, NULL, 0, 1, '2021-08-03 14:30:49'),
(29, 14, 'cyberpardo@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', '123456', 2, 0, 3.5, NULL, 0, 0, '2021-08-03 14:36:12'),
(30, 14, 'cyberpardo@hotmail.com', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', 'Daniel', 'Pardo', '', '103b depot road', '22', '102103', 'Singapore', 'Singapore', '85025044', '123456', 2, 0, 3.5, NULL, 0, 0, '2021-08-03 14:42:30'),
(31, 6, 'rolandtch@gmail.com', 'Roland', 'Tan', 'Mat', 'Gsb', '11', '102103', 'Singapore ', 'Singapore', '96281633', 'Roland', 'Tan', 'Mat', 'Gsb', '11', '102103', 'Singapore ', 'Singapore', '96281633', '123456', 2, 0, 3.5, NULL, 0, 1, '2021-08-03 14:52:16'),
(32, 6, 'rolandtch@gmail.com', 'Dd', 'Sd', 'Dd', 'Dd', '12', '103102', 'Sd', 'Singapore', '223', 'Dd', 'Sd', 'Dd', 'Dd', '12', '103102', 'Sd', 'Singapore', '223', NULL, NULL, 0, 3.5, NULL, 0, 0, '2021-08-03 15:03:39'),
(33, 6, 'rolandtch@gmail.com', 'Roland', 'Tan', 'Matson', '1 amk', '05-09', '569439', 'Singapore ', 'Singapore', '96281633', 'Roland', 'Tan', 'Matson', '1 amk', '05-09', '569439', 'Singapore ', 'Singapore', '96281633', NULL, NULL, 0, 3.5, NULL, 0, 1, '2021-08-04 05:28:58'),
(34, 15, 'mnaeem.hsol@gmail.com', 'Muhammad', 'Naeem', 'gfd', 'herosolutions', 'vcvx', '5621', 'Sadfd', 'Armenia', '013245679', 'Muhammad', 'Naeem', 'gfd', 'herosolutions', 'vcvx', '5621', 'Sadfd', 'Armenia', '013245679', NULL, NULL, 0, 5, NULL, 0, 1, '2025-02-27 12:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL DEFAULT 0,
  `p_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `shape` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `glasses` varchar(30) DEFAULT NULL,
  `logic_lens_type` varchar(6) DEFAULT NULL,
  `lens_type` varchar(255) DEFAULT NULL,
  `lens_type_price` float DEFAULT NULL,
  `classic_lenses` varchar(255) DEFAULT NULL,
  `classic_lenses_price` float DEFAULT NULL,
  `od_left_sph` varchar(5) DEFAULT NULL,
  `od_left_cyl` varchar(5) DEFAULT NULL,
  `od_left_axis` varchar(5) DEFAULT NULL,
  `od_left_pd` varchar(5) DEFAULT NULL,
  `od_left_add` varchar(5) DEFAULT NULL,
  `os_right_sph` varchar(5) DEFAULT NULL,
  `os_right_cyl` varchar(5) DEFAULT NULL,
  `os_right_axis` varchar(5) DEFAULT NULL,
  `os_right_pd` varchar(5) DEFAULT NULL,
  `os_right_add` varchar(5) DEFAULT NULL,
  `lens_color` varchar(30) DEFAULT NULL,
  `lens_property` varchar(255) DEFAULT NULL,
  `lens_property_price` float DEFAULT NULL,
  `prescription_file` varchar(255) DEFAULT NULL,
  `prescription_file_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `review` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `o_id`, `p_id`, `qty`, `size`, `color`, `shape`, `material`, `price`, `glasses`, `logic_lens_type`, `lens_type`, `lens_type_price`, `classic_lenses`, `classic_lenses_price`, `od_left_sph`, `od_left_cyl`, `od_left_axis`, `od_left_pd`, `od_left_add`, `os_right_sph`, `os_right_cyl`, `os_right_axis`, `os_right_pd`, `os_right_add`, `lens_color`, `lens_property`, `lens_property_price`, `prescription_file`, `prescription_file_name`, `status`, `review`) VALUES
(1, 1, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Progressive Lens', NULL, 'Blue Light Blocking', 15, 'High Index 1.61', 70, '0.00', '0.00', 'None', '0.00', '0.00', '0.00', '0.00', 'None', '0.00', '0.00', NULL, 'Transition Lense', 30, NULL, NULL, 0, NULL),
(2, 2, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 12.95, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(3, 2, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 12.95, 'Transition Lens', NULL, 'Clear Lens', 20, 'Standard Index 1.56', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Normal Lens', 0, NULL, NULL, 0, NULL),
(4, 2, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 12.95, 'Polarized Lens', NULL, 'Normal', 5, 'Standard Index 1.56', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dark Green', NULL, NULL, NULL, NULL, 0, NULL),
(5, 2, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 12.95, 'Progressive Lens', NULL, 'Normal Lenses', 0, 'Standard Index 1.56', 60, '-4.25', '0.00', 'None', '0.00', '0.00', '0.00', '0.00', 'None', '0.00', '0.00', NULL, 'Normal Lenses', 0, '10a7cdd970fe135cf4f7bb55c0e3b59f_1627465354_4023.jpg', 'find-hire-freelancers.jpg', 0, NULL),
(6, 3, 6, 1, 'Medium', NULL, 'Rectangle', NULL, 15, 'Transition Lens', NULL, 'Clear Lens', 20, 'High Index 1.61', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Blue Light Blocking', 20, NULL, NULL, 0, NULL),
(7, 3, 6, 1, 'Medium', NULL, 'Rectangle', NULL, 15, 'Transition Lens', NULL, 'Prescription', 30, 'High Index 1.61', 20, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, NULL, 'Normal Lens', 0, NULL, NULL, 0, NULL),
(8, 3, 6, 1, 'Medium', NULL, 'Rectangle', NULL, 15, 'Transition Lens', NULL, 'Prescription', 30, 'Advanced Index 1.67', 30, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, NULL, 'Blue Light Blocking', 20, NULL, NULL, 0, NULL),
(9, 4, 3, 1, 'Wide', NULL, 'Cat Eye', NULL, 14, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(10, 5, 3, 1, 'Wide', NULL, 'Cat Eye', NULL, 14, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(11, 5, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(12, 5, 4, 1, 'Narrow', NULL, 'Others', NULL, 20, 'Prescription Lens', NULL, 'Blue Light Blocking', 12, 'Advanced Index 1.67', 30, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(13, 6, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(14, 7, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(15, 8, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(16, 9, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(17, 10, 7, 1, 'Medium', NULL, 'Rectangle', NULL, 11, 'Prescription Lens', NULL, 'Classic Lenses', 10, 'Standard Index 1.56', 10, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, NULL, NULL, NULL, 'b0b183c207f46f0cca7dc63b2604f5cc_1627595952_8462.jpg', '1.jpg', 0, NULL),
(18, 11, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Prescription Lens', NULL, 'Blue Light Blocking', 12, 'High Index 1.61', 20, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(19, 12, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(20, 13, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Progressive Lens', NULL, 'Blue Light Blocking', 15, 'Advanced Index 1.67', 90, '0.00', '0.00', 'None', '0.00', '0.00', '0.00', '0.00', 'None', '0.00', '0.00', NULL, 'Transition Lenses', 30, NULL, NULL, 0, NULL),
(21, 14, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Prescription Lens', NULL, 'Blue Light Blocking', 12, 'Advanced Index 1.67', 30, '0.00', '0.00', 'None', '0.00', NULL, '0.00', '0.00', 'None', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(22, 15, 7, 1, 'Medium', NULL, 'Rectangle', NULL, 11, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(23, 16, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Prescription Lens', NULL, 'Blue Light Blocking', 12, 'High Index 1.61', 20, '0.00', '-1.25', 'None', '0.00', NULL, '0.00', '-1.00', 'None', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(24, 17, 3, 1, 'Wide', NULL, 'Cat Eye', NULL, 14, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(25, 18, 30, 1, 'Wide', NULL, 'Oval', NULL, 11, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(26, 19, 3, 1, 'Wide', NULL, 'Cat Eye', NULL, 14, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(27, 20, 5, 1, 'Medium', NULL, 'Round', NULL, 12, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(28, 21, 3, 1, 'Wide', NULL, 'Cat Eye', NULL, 14, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(29, 22, 10, 1, 'Medium', NULL, 'Geometric', NULL, 4, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(30, 23, 3, 1, 'Wide', NULL, 'Cat Eye', NULL, 14, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(31, 23, 20, 1, 'Wide', NULL, 'Geometric', NULL, 15, 'Progressive Lens', NULL, 'Blue Light Blocking', 15, 'Standard Index 1.56', 60, '+0.25', '+0.50', '2', '27.5', '+0.75', '+1.00', '+1.00', '13', '26.0', '+1.00', NULL, 'Transition Lenses', 30, NULL, NULL, 0, NULL),
(32, 24, 7, 1, 'Medium', NULL, 'Rectangle', NULL, 11, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(33, 25, 3, 1, 'Wide', NULL, 'Cat Eye', NULL, 14, 'Non Prescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(34, 26, 10, 1, 'Medium', NULL, 'Geometric', NULL, 4, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(35, 27, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(36, 28, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(37, 29, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(38, 30, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(39, 31, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(40, 32, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(41, 33, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Clear Lenses', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(42, 34, 1, 1, 'Medium', NULL, 'Rectangle', NULL, 1, 'Frame Only', NULL, 'Blue Light Blocking', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_methods`
--

CREATE TABLE `tbl_payment_methods` (
  `id` int(11) NOT NULL,
  `encoded_id` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `last_digits` varchar(4) DEFAULT NULL,
  `expiry` varchar(100) DEFAULT NULL,
  `method_token` varchar(500) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `paypal` varchar(255) DEFAULT NULL,
  `stripe_customer_id` varchar(199) NOT NULL,
  `stripe_bank_id` varchar(255) NOT NULL,
  `acc_swift_code` varchar(255) NOT NULL,
  `acc_type` enum('Checking','Saving') DEFAULT NULL,
  `acc_routing_number` varchar(255) NOT NULL,
  `acc_bank_name` varchar(255) NOT NULL,
  `acc_title` varchar(255) NOT NULL,
  `acc_number` varchar(100) NOT NULL,
  `acc_city` varchar(255) NOT NULL,
  `acc_state` varchar(255) NOT NULL,
  `acc_country` varchar(255) NOT NULL,
  `default_method` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_payment_methods`
--

INSERT INTO `tbl_payment_methods` (`id`, `encoded_id`, `mem_id`, `last_digits`, `expiry`, `method_token`, `image`, `paypal`, `stripe_customer_id`, `stripe_bank_id`, `acc_swift_code`, `acc_type`, `acc_routing_number`, `acc_bank_name`, `acc_title`, `acc_number`, `acc_city`, `acc_state`, `acc_country`, `default_method`) VALUES
(1, 'h5c3s2l4l335h483', 3, NULL, NULL, NULL, NULL, NULL, '', '', '132', 'Checking', '1111112334', 'ubl', 'Sitter Khan', '312645978', 'New York', 'New York', 'United States', 0),
(23, 'h5c3s2l4l3s5x483', 3, '4242', 'February, 2021', 'card_1H9x4kJXIsF9AzPJrTcIPUP1', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(24, 'h5c3s2l4l3s51583', 1, '4242', 'February, 2022', 'card_1H9x6EJXIsF9AzPJCHFNm184', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(25, 'h5c3s2l4l3s55583', 19, '4242', 'March, 2021', 'card_1HEa2KJXIsF9AzPJ0fqbWQBr', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(26, 'h5c3s2l4l3s59583', 20, '4242', 'March, 2022', 'card_1HF0l8JXIsF9AzPJIXE4h8S3', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(27, 'h5c3s2l4l3s5j583', 22, '4242', 'March, 2022', 'card_1HFznVJXIsF9AzPJrgayzHrb', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(28, 'h5c3s2l4l3s5n583', 26, '4242', 'February, 2021', 'card_1HHnFJJXIsF9AzPJE0Q1FfaH', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(29, 'h5c3s2l4l3s5r583', 26, '4242', 'February, 2021', 'card_1HHnFdJXIsF9AzPJBu21TS5K', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(30, 'h5c3s2l4l386l483', 26, '4242', 'February, 2021', 'card_1HHnGXJXIsF9AzPJxQYGn7Qt', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(31, 'h5c3s2l4l386p483', 26, '4242', 'February, 2021', 'card_1HHnHUJXIsF9AzPJbOTmJR5a', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(32, 'h5c3s2l4l386t483', 27, '4242', 'February, 2021', 'card_1HHoqRJXIsF9AzPJQ2QDPyZE', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(33, 'h5c3s2l4l386x483', 27, '4242', 'February, 2021', 'card_1HHou2JXIsF9AzPJCah3MH7P', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(34, 'h5c3s2l4l3861583', 27, '4242', 'February, 2021', 'card_1HHouYJXIsF9AzPJMAKXVTwv', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(35, 'h5c3s2l4l3865583', 27, '4242', 'February, 2021', 'card_1HHouhJXIsF9AzPJ1aastjP2', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(36, 'h5c3s2l4l3869583', 27, '4242', 'February, 2021', 'card_1HHovKJXIsF9AzPJfhmnkTjH', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(37, 'h5c3s2l4l386j583', 27, '4242', 'February, 2021', 'card_1HHp0IJXIsF9AzPJ56yWNyJj', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(38, 'h5c3s2l4l386n583', 27, '4242', 'February, 2021', 'card_1HHpcCJXIsF9AzPJcfDAOrUJ', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(39, 'h5c3s2l4l386r583', 27, '4242', 'February, 2021', 'card_1HHpdUJXIsF9AzPJd4Wz3z4T', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(40, 'h5c3s2l4m3q4l483', 27, '4242', 'February, 2021', 'card_1HHpfiJXIsF9AzPJ0ex8dZ5D', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(41, 'h5c3s2l4m3q4p483', 27, '4242', 'February, 2021', 'card_1HHpgjJXIsF9AzPJnmYNjlBM', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(42, 'h5c3s2l4m3q4t483', 38, '4242', 'January, 2021', 'card_1HIL2bJXIsF9AzPJ4yWMxyAu', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(43, 'h5c3s2l4m3q4x483', 38, '4242', 'February, 2022', 'card_1HIL52JXIsF9AzPJ21PUD8ST', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(44, 'h5c3s2l4m3q41583', 38, '4242', 'April, 2023', 'card_1HILDtJXIsF9AzPJd8ZOtX98', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(45, 'h5c3s2l4m3q45583', 39, '4242', 'February, 2021', 'card_1HILJqJXIsF9AzPJBnHMkRJh', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(46, 'h5c3s2l4m3q49583', 41, '4242', 'February, 2023', 'card_1HILSDJXIsF9AzPJnTzTdmGQ', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(47, 'h5c3s2l4m3q4j583', 41, '4242', 'May, 2023', 'card_1HILTpJXIsF9AzPJXQAw01dg', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(48, 'h5c3s2l4m3q4n583', 41, '4242', 'May, 2023', 'card_1HILV8JXIsF9AzPJOrRM7cBJ', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(49, 'h5c3s2l4m3q4r583', 42, '4242', 'January, 2022', 'card_1HIY3mJXIsF9AzPJjaYyOUeM', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(50, 'h5c3s2l4m365l483', 43, '4242', 'February, 2022', 'card_1HIZrLJXIsF9AzPJRM7bfSzH', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(51, 'h5c3s2l4m365p483', 45, '4242', 'March, 2022', 'card_1HIwwnJXIsF9AzPJns2jyLnM', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(52, 'h5c3s2l4m365t483', 48, '4242', 'March, 2022', 'card_1HJm14JXIsF9AzPJA2xCwDVt', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(53, 'h5c3s2l4m365x483', 50, '4242', 'February, 2022', 'card_1HK6AGJXIsF9AzPJyShndRLL', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(54, 'h5c3s2l4m3651583', 51, '4242', 'February, 2022', 'card_1HMws7JXIsF9AzPJXhhD6le4', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(55, 'h5c3s2l4m3655583', 52, '4242', 'January, 2022', 'card_1HMx3vJXIsF9AzPJkVC7uE0x', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(56, 'h5c3s2l4m3659583', 55, '4242', 'February, 2021', 'card_1HNkrhJXIsF9AzPJrBlB2OXs', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(57, 'h5c3s2l4m365j583', 57, '4242', 'February, 2021', 'card_1HPn0XJXIsF9AzPJGe5Yis1U', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(58, 'h5c3s2l4m365n583', 3, '4242', 'February, 2021', 'card_1HSMt7JXIsF9AzPJug6e0Y1Y', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(59, 'h5c3s2l4m365r583', 1, '4242', 'February, 2021', 'card_1HSNC0JXIsF9AzPJCIIx8iAk', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(60, 'h5c3s2l4m3s5l483', 1, '4242', 'January, 2021', 'card_1HSNdbJXIsF9AzPJdExHii2I', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(61, 'h5c3s2l4m3s5p483', 1, '4242', 'January, 2021', 'card_1HSNhYJXIsF9AzPJ6RTFEWyZ', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(62, 'h5c3s2l4m3s5t483', 1, '4242', 'January, 2021', 'card_1HSNk3JXIsF9AzPJgA6OXkK2', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(63, 'h5c3s2l4m3s5x483', 1, '4242', 'January, 2021', 'card_1HSO2wJXIsF9AzPJ2XinUsB1', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(64, 'h5c3s2l4m3s51583', 4, '4242', 'February, 2021', 'card_1HTpGPJXIsF9AzPJmBCjnA2M', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(65, 'h5c3s2l4m3s55583', 4, '4242', 'February, 2021', 'card_1HTpHcJXIsF9AzPJlNUU8v3J', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(66, 'h5c3s2l4m3s59583', 4, '4242', 'February, 2021', 'card_1HTpI0JXIsF9AzPJpSmFKKhZ', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(67, 'h5c3s2l4m3s5j583', 4, '4242', 'February, 2021', 'card_1HTpJOJXIsF9AzPJkf2uYIZ8', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(68, 'h5c3s2l4m3s5n583', 59, '4242', 'February, 2021', 'card_1HZByWJXIsF9AzPJ7ST6lL5A', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(69, 'h5c3s2l4m3s5r583', 56, '4242', 'January, 2022', 'card_1HoUJRJXIsF9AzPJXiMzMnwD', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(70, 'h5c3s2l4m386l483', 58, '4242', 'March, 2022', 'card_1HpXuwJXIsF9AzPJ4Fncf5Ky', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(71, 'h5c3s2l4m386p483', 1, '4242', 'February, 2021', 'card_1Hri7eJXIsF9AzPJ0RaYBmEj', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(72, 'h5c3s2l4m386t483', 3, '4242', 'March, 2021', 'card_1HrjhiJXIsF9AzPJkKINS8Qc', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(73, 'h5c3s2l4m386x483', 3, '4242', 'March, 2021', 'card_1HrjkjJXIsF9AzPJy6OZ1GZ5', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(74, 'h5c3s2l4m3861583', 3, '4242', 'March, 2021', 'card_1HrjruJXIsF9AzPJE4wHkUPv', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(75, 'h5c3s2l4m3865583', 3, '4242', 'February, 2021', 'card_1Hrk1BJXIsF9AzPJ9LKbS4y9', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(76, 'h5c3s2l4m3869583', 3, '4242', 'February, 2021', 'card_1Hrk6iJXIsF9AzPJVj8otdK4', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(77, 'h5c3s2l4m386j583', 3, '4242', 'February, 2021', 'card_1Hrk8LJXIsF9AzPJOYkEKb0e', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(78, 'h5c3s2l4m386n583', 1, '4242', 'April, 2022', 'card_1HyvpHJXIsF9AzPJNDcah0Ef', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(79, 'h5c3s2l4m386r583', 1, '4242', 'April, 2022', 'card_1HyvqmJXIsF9AzPJsAq6FAze', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1),
(80, 'h5c3s2l4n3q4l483', 3, '4242', 'January, 2021', 'card_1HywSDJXIsF9AzPJnzZ35Ug7', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(81, 'h5c3s2l4n3q4p483', 3, '4242', 'February, 2022', 'card_1HywT1JXIsF9AzPJbWguPvPQ', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 0),
(82, 'h5c3s2l4n3q4t483', 3, '4242', 'February, 2022', 'card_1HywU3JXIsF9AzPJWzJeSmBW', 'visa.png', NULL, '', '', '', NULL, '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`id`, `permission`) VALUES
(1, 'Members'),
(2, 'Products Management'),
(3, 'Glasses'),
(4, 'Orders'),
(5, 'Promo Codes'),
(6, 'Blog Management'),
(7, 'Educational Videos'),
(8, 'FAQ\'s'),
(9, 'Newsletter'),
(10, 'Countries Management'),
(11, 'Manage Pages');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions_admin`
--

CREATE TABLE `tbl_permissions_admin` (
  `admin_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_permissions_admin`
--

INSERT INTO `tbl_permissions_admin` (`admin_id`, `permission_id`) VALUES
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 11),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preferences`
--

CREATE TABLE `tbl_preferences` (
  `pref_id` int(11) NOT NULL,
  `pref_key` varchar(50) NOT NULL,
  `pref_title` varchar(500) NOT NULL,
  `pref_short_desc` varchar(1000) NOT NULL,
  `pref_detail` text NOT NULL,
  `pref_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_preferences`
--

INSERT INTO `tbl_preferences` (`pref_id`, `pref_key`, `pref_title`, `pref_short_desc`, `pref_detail`, `pref_image`) VALUES
(1, 'privacypolicy', 'Privacy Policy', '', '<p>We take our ethical responsibilities, the security of your personal information, and your privacy seriously. We have a strong commitment to providing excellent service to all our customers and visitors of this web site, including respecting your concerns about privacy. This Privacy Policy discloses how we collect, protect, use, And share information gathered about you on our website. If you use this site you explicitly agree to this Privacy Policy and the Terms Of Use in effect at the time of your accessing this website as set forth here. We hope that this disclosure will help increase your confidence in our web site. Therefore, in conformity with our goal of exceeding industry standards and the regulations enacted by federal and state authoritative bodies, we abide the following privacy policy.</p>\r\n\r\n<h3>Browsing</h3>\r\n\r\n<p>This website does collect personally identifiable information from your computer when you browse this website and request pages from our servers. This means that, unless you voluntarily and knowingly provide us with personally identifiable information, we will not know your name, your email address, or any other personally identifiable information. We may use IP addresses, browser types and access times to analyze trends, administer the site, improve site performance and gather broad demographic information for aggregate use. When you request a page from our website, our servers log the information provided in the HTTP request header including the IP number, the time of the request, the URL of your request, and other information that is provided in the HTTP header. We collect the HTTP request header information in order to make our website function correctly and provide you the functionality that you see on this website. We also use this information to better understand how visitors use our website and how we can better tune it, its contents and functionality to meet your needs.</p>\r\n\r\n<h3>Information collected and its uses</h3>\r\n\r\n<p>We collect your personal information if you decide to retain our services, participate in our affiliate marketing program, complete an application form, or transact other business with us. We need to collect personally identifiable information from you to execute the requested transaction, provide you with a particular service, and/or to further enhance and protect your account. At any time, we may ask you to voluntarily supply us with additional information needed. We will ask you for information such as, but not limited to: name, current and/or billing address, your e-mail address, telephone number and, other personal information, such as your date of birth, address, and loan account information. We may ask for your email address to send confirmations and, if necessary, we might use the other information to contact you for help in processing your requests.</p>\r\n\r\n<p>All information provided gives Crainly or an affiliate to contact you directly or indirectly. You give full permission to contact you through any and all devices and methods available to us whether it be manual or automated..</p>\r\n\r\n<p>We may also use the information we collect about you In order To, but Not limited To:</p>\r\n\r\n<ul>\r\n	<li>learn more about your interest In the products or services we offer and provide you with information;</li>\r\n	<li>enroll merchants who desire our services</li>\r\n	<li>open merchant files and establish their accounts</li>\r\n	<li>provide customer service</li>\r\n	<li>negotiate settlement of our merchants&rsquo; debts (according to the terms and conditions of their written agreements)</li>\r\n	<li>learn how to improve our products or services</li>\r\n	<li>evaluate your suitability for and provide opportunities for our affiliates and other companies to inform you about the products or services they offer that may interest you</li>\r\n</ul>\r\n\r\n<p>Aside from the ways mentioned above, we may use your personally identifiable information In many other ways, including sending you promotional materials, and sharing your information with third parties and Crainly affiliate so that these third parties and affiliate can send you promotional materials. (By &quot;promotional materials,&quot; we mean communications that directly promote the use Of web sites, or the purchase of products or services.). However, you may &quot;opt-out&quot; of certain uses of your personal information.</p>\r\n\r\n<h3>Disclosure of Information to third parties</h3>\r\n\r\n<p>We may disclose your personally identifiable information In order to effect or carry out any transaction that you have requested of us or As necessary to complete our contractual obligations with you. WE RESERVE THE RIGHT TO SELL, RENT OR TRANSFER YOUR PERSONAL INFORMATION TO THIRD PARTIES OR Crainly AFFILIATES FOR ANY PURPOSE IN OUR SOLE DISCRETION. Crainly may share your personally identifiable information with affiliated companies that are directly or indirectly controlled by, or under common control of Crainly. We may send personally identifiable information about you to non-affiliated companies that are not directly or indirectly controlled by, or under common control of Crainly. The personal information collected on this site and by third parties will be used to operate the site and to provide the services or products or carry out the transactions you have requested or authorized. We may change or broaden the use of your personal information at any time. We may use your personal information to provide promotional offers by means of email advertising, telephone marketing, direct mail marketing, banner advertising, and other possible uses.</p>\r\n\r\n<h3>Choice/opt-out</h3>\r\n\r\n<p>As indicated above, we provide you the opportunity to &#39;opt-out&rsquo; of having your personally identifiable information used for certain purposes, when we ask for or when you provide this information. For example, if you purchase a product/service but do not wish to receive any additional marketing material from us, you can indicate your preference on our order form. You may not, however, opt-out of any service that we deem to be required for us, our affiliates, transferees, or assignees to effectively and efficiently implement our services.</p>\r\n\r\n<p>If you no longer wish to receive promotional communications, you may opt-out of receiving them by following the instructions included in each newsletter or communication or by emailing or calling us per the information contained on our contact page.</p>\r\n\r\n<p>If you do not wish to have your applicable personal information collected, shared, or used by any third party that is not our affiliate/agent/service provider, please contact our customer service department to actively opt-out of having your personal information shared. Customer Service Contact Information:</p>\r\n\r\n<h3>Crainly</h3>\r\n\r\n<ul>\r\n	<li>Email: <a href=\"mailto:help@crainly.com\">help@crainly.com</a></li>\r\n	<li>Phone: <a href=\"tel:1-888-349-6226\">1-888-349-6226</a></li>\r\n</ul>\r\n', ''),
(2, 'termsservices', 'Terms of Service', '', '<p>We take our ethical responsibilities, the security of your personal information, and your privacy seriously. We have a strong commitment to providing excellent service to all our customers and visitors of this web site, including respecting your concerns about privacy. This term&#39;s of services discloses how we collect, protect, use, And share information gathered about you on our website. If you use this site you explicitly agree to this term&#39;s of services and the Terms Of Use in effect at the time of your accessing this website as set forth here. We hope that this disclosure will help increase your confidence in our web site. Therefore, in conformity with our goal of exceeding industry standards and the regulations enacted by federal and state authoritative bodies, we abide the following term&#39;s of services.</p>\r\n\r\n<h3>Browsing</h3>\r\n\r\n<p>This website does collect personally identifiable information from your computer when you browse this website and request pages from our servers. This means that, unless you voluntarily and knowingly provide us with personally identifiable information, we will not know your name, your email address, or any other personally identifiable information. We may use IP addresses, browser types and access times to analyze trends, administer the site, improve site performance and gather broad demographic information for aggregate use. When you request a page from our website, our servers log the information provided in the HTTP request header including the IP number, the time of the request, the URL of your request, and other information that is provided in the HTTP header. We collect the HTTP request header information in order to make our website function correctly and provide you the functionality that you see on this website. We also use this information to better understand how visitors use our website and how we can better tune it, its contents and functionality to meet your needs.</p>\r\n\r\n<h3>Information collected and its uses</h3>\r\n\r\n<p>We collect your personal information if you decide to retain our services, participate in our affiliate marketing program, complete an application form, or transact other business with us. We need to collect personally identifiable information from you to execute the requested transaction, provide you with a particular service, and/or to further enhance and protect your account. At any time, we may ask you to voluntarily supply us with additional information needed. We will ask you for information such as, but not limited to: name, current and/or billing address, your e-mail address, telephone number and, other personal information, such as your date of birth, address, and loan account information. We may ask for your email address to send confirmations and, if necessary, we might use the other information to contact you for help in processing your requests.</p>\r\n\r\n<p>All information provided gives Crainly or an affiliate to contact you directly or indirectly. You give full permission to contact you through any and all devices and methods available to us whether it be manual or automated..</p>\r\n\r\n<p>We may also use the information we collect about you In order To, but Not limited To:</p>\r\n\r\n<ul>\r\n	<li>learn more about your interest In the products or services we offer and provide you with information;</li>\r\n	<li>enroll merchants who desire our services</li>\r\n	<li>open merchant files and establish their accounts</li>\r\n	<li>provide customer service</li>\r\n	<li>negotiate settlement of our merchants&rsquo; debts (according to the terms and conditions of their written agreements)</li>\r\n	<li>learn how to improve our products or services</li>\r\n	<li>evaluate your suitability for and provide opportunities for our affiliates and other companies to inform you about the products or services they offer that may interest you</li>\r\n</ul>\r\n\r\n<p>Aside from the ways mentioned above, we may use your personally identifiable information In many other ways, including sending you promotional materials, and sharing your information with third parties and Crainly affiliate so that these third parties and affiliate can send you promotional materials. (By &quot;promotional materials,&quot; we mean communications that directly promote the use Of web sites, or the purchase of products or services.). However, you may &quot;opt-out&quot; of certain uses of your personal information.</p>\r\n\r\n<h3>Disclosure of Information to third parties</h3>\r\n\r\n<p>We may disclose your personally identifiable information In order to effect or carry out any transaction that you have requested of us or As necessary to complete our contractual obligations with you. WE RESERVE THE RIGHT TO SELL, RENT OR TRANSFER YOUR PERSONAL INFORMATION TO THIRD PARTIES OR Crainly AFFILIATES FOR ANY PURPOSE IN OUR SOLE DISCRETION. Crainly may share your personally identifiable information with affiliated companies that are directly or indirectly controlled by, or under common control of Crainly. We may send personally identifiable information about you to non-affiliated companies that are not directly or indirectly controlled by, or under common control of Crainly. The personal information collected on this site and by third parties will be used to operate the site and to provide the services or products or carry out the transactions you have requested or authorized. We may change or broaden the use of your personal information at any time. We may use your personal information to provide promotional offers by means of email advertising, telephone marketing, direct mail marketing, banner advertising, and other possible uses.</p>\r\n\r\n<h3>Choice/opt-out</h3>\r\n\r\n<p>As indicated above, we provide you the opportunity to &#39;opt-out&rsquo; of having your personally identifiable information used for certain purposes, when we ask for or when you provide this information. For example, if you purchase a product/service but do not wish to receive any additional marketing material from us, you can indicate your preference on our order form. You may not, however, opt-out of any service that we deem to be required for us, our affiliates, transferees, or assignees to effectively and efficiently implement our services.</p>\r\n\r\n<p>If you no longer wish to receive promotional communications, you may opt-out of receiving them by following the instructions included in each newsletter or communication or by emailing or calling us per the information contained on our contact page.</p>\r\n\r\n<p>If you do not wish to have your applicable personal information collected, shared, or used by any third party that is not our affiliate/agent/service provider, please contact our customer service department to actively opt-out of having your personal information shared. Customer Service Contact Information:</p>\r\n\r\n<h3>Crainly</h3>\r\n\r\n<ul>\r\n	<li>Email: <a href=\"mailto:help@crainly.com\">help@crainly.com</a></li>\r\n	<li>Phone: <a href=\"tel:1-888-349-6226\">1-888-349-6226</a></li>\r\n</ul>\r\n\r\n<p>We take our ethical responsibilities, the security of your personal information, and your privacy seriously. We have a strong commitment to providing excellent service to all our customers and visitors of this web site, including respecting your concerns about privacy. This term&#39;s of services discloses how we collect, protect, use, And share information gathered about you on our website. If you use this site you explicitly agree to this term&#39;s of services and the Terms Of Use in effect at the time of your accessing this website as set forth here. We hope that this disclosure will help increase your confidence in our web site. Therefore, in conformity with our goal of exceeding industry standards and the regulations enacted by federal and state authoritative bodies, we abide the following term&#39;s of services.</p>\r\n\r\n<h3>Browsing</h3>\r\n\r\n<p>This website does collect personally identifiable information from your computer when you browse this website and request pages from our servers. This means that, unless you voluntarily and knowingly provide us with personally identifiable information, we will not know your name, your email address, or any other personally identifiable information. We may use IP addresses, browser types and access times to analyze trends, administer the site, improve site performance and gather broad demographic information for aggregate use. When you request a page from our website, our servers log the information provided in the HTTP request header including the IP number, the time of the request, the URL of your request, and other information that is provided in the HTTP header. We collect the HTTP request header information in order to make our website function correctly and provide you the functionality that you see on this website. We also use this information to better understand how visitors use our website and how we can better tune it, its contents and functionality to meet your needs.</p>\r\n\r\n<h3>Information collected and its uses</h3>\r\n\r\n<p>We collect your personal information if you decide to retain our services, participate in our affiliate marketing program, complete an application form, or transact other business with us. We need to collect personally identifiable information from you to execute the requested transaction, provide you with a particular service, and/or to further enhance and protect your account. At any time, we may ask you to voluntarily supply us with additional information needed. We will ask you for information such as, but not limited to: name, current and/or billing address, your e-mail address, telephone number and, other personal information, such as your date of birth, address, and loan account information. We may ask for your email address to send confirmations and, if necessary, we might use the other information to contact you for help in processing your requests.</p>\r\n\r\n<p>All information provided gives Crainly or an affiliate to contact you directly or indirectly. You give full permission to contact you through any and all devices and methods available to us whether it be manual or automated..</p>\r\n\r\n<p>We may also use the information we collect about you In order To, but Not limited To:</p>\r\n\r\n<ul>\r\n	<li>learn more about your interest In the products or services we offer and provide you with information;</li>\r\n	<li>enroll merchants who desire our services</li>\r\n	<li>open merchant files and establish their accounts</li>\r\n	<li>provide customer service</li>\r\n	<li>negotiate settlement of our merchants&rsquo; debts (according to the terms and conditions of their written agreements)</li>\r\n	<li>learn how to improve our products or services</li>\r\n	<li>evaluate your suitability for and provide opportunities for our affiliates and other companies to inform you about the products or services they offer that may interest you</li>\r\n</ul>\r\n\r\n<p>Aside from the ways mentioned above, we may use your personally identifiable information In many other ways, including sending you promotional materials, and sharing your information with third parties and Crainly affiliate so that these third parties and affiliate can send you promotional materials. (By &quot;promotional materials,&quot; we mean communications that directly promote the use Of web sites, or the purchase of products or services.). However, you may &quot;opt-out&quot; of certain uses of your personal information.</p>\r\n\r\n<h3>Disclosure of Information to third parties</h3>\r\n\r\n<p>We may disclose your personally identifiable information In order to effect or carry out any transaction that you have requested of us or As necessary to complete our contractual obligations with you. WE RESERVE THE RIGHT TO SELL, RENT OR TRANSFER YOUR PERSONAL INFORMATION TO THIRD PARTIES OR Crainly AFFILIATES FOR ANY PURPOSE IN OUR SOLE DISCRETION. Crainly may share your personally identifiable information with affiliated companies that are directly or indirectly controlled by, or under common control of Crainly. We may send personally identifiable information about you to non-affiliated companies that are not directly or indirectly controlled by, or under common control of Crainly. The personal information collected on this site and by third parties will be used to operate the site and to provide the services or products or carry out the transactions you have requested or authorized. We may change or broaden the use of your personal information at any time. We may use your personal information to provide promotional offers by means of email advertising, telephone marketing, direct mail marketing, banner advertising, and other possible uses.</p>\r\n\r\n<h3>Choice/opt-out</h3>\r\n\r\n<p>As indicated above, we provide you the opportunity to &#39;opt-out&rsquo; of having your personally identifiable information used for certain purposes, when we ask for or when you provide this information. For example, if you purchase a product/service but do not wish to receive any additional marketing material from us, you can indicate your preference on our order form. You may not, however, opt-out of any service that we deem to be required for us, our affiliates, transferees, or assignees to effectively and efficiently implement our services.</p>\r\n\r\n<p>If you no longer wish to receive promotional communications, you may opt-out of receiving them by following the instructions included in each newsletter or communication or by emailing or calling us per the information contained on our contact page.</p>\r\n\r\n<p>If you do not wish to have your applicable personal information collected, shared, or used by any third party that is not our affiliate/agent/service provider, please contact our customer service department to actively opt-out of having your personal information shared. Customer Service Contact Information:</p>\r\n\r\n<h3>Crainly</h3>\r\n\r\n<ul>\r\n	<li>Email:&nbsp;<a href=\"mailto:help@crainly.com\">help@crainly.com</a></li>\r\n	<li>Phone:&nbsp;<a href=\"tel:1-888-349-6226\">1-888-349-6226</a></li>\r\n</ul>\r\n', ''),
(3, 'bannerimage', '', '', '', 'image_1547197860_6034.png'),
(4, 'contact', 'Contact us', 'Get in Touch', 'Address & Info', 'Location Info'),
(7, 'footer_section', 'Find the right fit or it’s free.', 'We guarantee you’ll find the right tutor, or we’ll cover the first hour of your lesson.', 'What would you like to see next?', 'Submit a Feature Request');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `cat_ids` varchar(255) DEFAULT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `shape` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `old_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc_image` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `new_in` tinyint(1) DEFAULT NULL,
  `premium` tinyint(1) DEFAULT NULL,
  `best_seller` tinyint(1) DEFAULT NULL,
  `flash_sale` tinyint(1) DEFAULT NULL,
  `frame_only` tinyint(1) DEFAULT NULL,
  `sunglasses` tinyint(1) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `pcondition` varchar(255) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT 0,
  `featured` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `cat_ids`, `sub_cat_id`, `brand`, `gender`, `material`, `color`, `shape`, `size`, `title`, `price`, `old_price`, `image`, `desc_image`, `detail`, `meta_description`, `meta_keywords`, `new_in`, `premium`, `best_seller`, `flash_sale`, `frame_only`, `sunglasses`, `stock`, `pcondition`, `availability`, `featured`, `status`, `date`) VALUES
(1, '1,2', 0, NULL, 'Male,Female', NULL, NULL, 'Rectangle', 'Medium', 'both Occeus Geometric Purple-Tortoise Glasses', 1, 0, '0e65972dce68dad4d52d063967f0a705_1623529243_2025.PNG', '2ca65f58e35d9ad45bf7f3ae5cfd08f1_1621599894_8482.jpg', '<p>Made with high-quality material, these frames are very lightweight, only about 9.1 g. It is the best choice for people who pursuit comfy. To reduce the friction with the skin, we design the arms smoothly. Adjustable nose pads also bring you a comfortable experience.</p>\r\n\r\n<ul>\r\n	<li>Item:&nbsp;<strong>ZOI224692-02</strong></li>\r\n	<li>Frame Weight:&nbsp;<strong>9.1 g</strong></li>\r\n	<li>Gender:&nbsp;<strong>Men</strong></li>\r\n	<li>Rim:&nbsp;<strong>Full rim</strong></li>\r\n	<li>Materials:&nbsp;<strong>Titanium</strong></li>\r\n	<li>Shape:&nbsp;<strong>Square</strong></li>\r\n	<li>Spring Hinge:&nbsp;<strong>NO</strong></li>\r\n</ul>\r\n', 'Both Occeus Geometric Purple-Tortoise Glasses', 'Occeus Geometric Purple-Tortoise Glasses', 1, 0, 1, 0, 0, 0, 6, NULL, 0, 0, 1, '2021-08-03 10:06:45'),
(3, '2', 0, NULL, 'Male', NULL, NULL, 'Cat Eye', 'Wide', 'Tomika Geometric Black Glasses', 14, 25, '959a557f5f6beb411fd954f3f34b21c3_1621426273_1241.jpg', '698d51a19d8a121ce581499d7b701668_1621599912_7055.jpg', '<p>Made with high-quality material, these frames are very lightweight, only about 9.1 g. It is the best choice for people who pursuit comfy. To reduce the friction with the skin, we design the arms smoothly. Adjustable nose pads also bring you a comfortable experience.</p>\r\n\r\n<ul>\r\n	<li>Item:&nbsp;<strong>ZOI224692-02</strong></li>\r\n	<li>Frame Weight:&nbsp;<strong>9.1 g</strong></li>\r\n	<li>Gender:&nbsp;<strong>Men</strong></li>\r\n	<li>RX Range:&nbsp;<strong>-20.00~+12.00</strong></li>\r\n	<li>Rim:&nbsp;<strong>Full rim</strong></li>\r\n	<li>PD Range:&nbsp;<strong>54~78</strong></li>\r\n	<li>Materials:&nbsp;<strong>Titanium</strong></li>\r\n	<li>Progressive:&nbsp;<strong>YES</strong></li>\r\n	<li>Shape:&nbsp;<strong>Square</strong></li>\r\n	<li>Spring Hinge:&nbsp;<strong>NO</strong></li>\r\n</ul>\r\n', 'Tomika Geometric Black Glasses', 'Tomika Geometric Black Glasses', 0, 0, 0, 1, 1, 1, 5, NULL, 0, 0, 1, '2021-07-09 06:12:31'),
(4, '6', 0, NULL, 'Male', NULL, NULL, 'Others', 'Narrow', 'Stacy Square Gray Sunglasses', 20, 25, '07563a3fe3bbe7e3ba84431ad9d055af_1621429026_4717.jpg', '67f7fb873eaf29526a11a9b7ac33bfac_1622017158_4085.jpg', '<p>test</p>\r\n', 'Stacy Square Gray Sunglasses', 'Stacy Square Gray Sunglasses', 0, 0, 1, 0, 0, 0, 9, NULL, 0, 0, 1, '2021-06-12 23:14:21'),
(5, '1', 0, NULL, 'Male', NULL, NULL, 'Round', 'Medium', 'Hidalgo Round Rose-Gold Glasses', 12, 25, 'a8baa56554f96369ab93e4f3bb068c22_1621586611_7033.jpg', 'fc221309746013ac554571fbd180e1c8_1621598602_3981.jpg', '<p>Made with high-quality material, these frames are very lightweight, only about 9.1 g. It is the best choice for people who pursuit comfy. To reduce the friction with the skin, we design the arms smoothly. Adjustable nose pads also bring you a comfortable experience.</p>\r\n\r\n<ul>\r\n	<li>Item:&nbsp;<strong>ZOI224692-02</strong></li>\r\n	<li>Frame Weight:&nbsp;<strong>9.1 g</strong></li>\r\n	<li>Gender:&nbsp;<strong>Men</strong></li>\r\n	<li>RX Range:&nbsp;<strong>-20.00~+12.00</strong></li>\r\n	<li>Rim:&nbsp;<strong>Full rim</strong></li>\r\n	<li>PD Range:&nbsp;<strong>54~78</strong></li>\r\n	<li>Materials:&nbsp;<strong>Titanium</strong></li>\r\n	<li>Progressive:&nbsp;<strong>YES</strong></li>\r\n	<li>Shape:&nbsp;<strong>Square</strong></li>\r\n	<li>Spring Hinge:&nbsp;<strong>NO</strong></li>\r\n</ul>\r\n', 'Hidalgo Round Rose-Gold Glasses', 'Hidalgo Round Rose-Gold Glasses', 0, 1, 0, 0, 0, 0, 0, NULL, 0, 0, 1, '2021-06-12 11:30:51'),
(6, '1', 0, NULL, 'Male,Female', NULL, NULL, 'Rectangle', 'Medium', 'test 1', 15, 22, '854d9fca60b4bd07f9bb215d59ef5561_1623536179_4306.PNG', NULL, '', 'test', 'test111', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 1, '2021-07-28 09:08:03'),
(7, '1', 0, NULL, 'Male', NULL, NULL, 'Rectangle', 'Medium', 'test2', 11, 22, '0f49c89d1e7298bb9930789c8ed59d48_1623536249_4684.PNG', NULL, '', 'test', 'test', 0, 0, 0, 0, 0, 0, 11, NULL, 0, 0, 1, '2021-06-12 23:17:29'),
(8, '1', 0, NULL, 'Male', NULL, NULL, 'Rectangle', 'Medium', 'test3', 33, 0, '3e89ebdb49f712c7d90d1b39e348bbbf_1623536303_1893.PNG', NULL, '', '222', '333', 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 1, '2021-06-22 23:36:14'),
(9, '1', 0, NULL, 'Male', NULL, NULL, 'Geometric', 'Narrow', 'test4', 23, 44, '90794e3b050f815354e3e29e977a88ab_1623536394_8754.PNG', NULL, '', '22', '11', 0, 0, 0, 0, 0, 0, 1, NULL, 0, 0, 1, '2021-06-12 23:19:54'),
(10, '1', 0, NULL, 'Male', NULL, NULL, 'Geometric', 'Medium', 'test5', 4, 55, '82f2b308c3b01637c607ce05f52a2fed_1623536523_3189.PNG', NULL, '', '22', '11', 0, 0, 0, 0, 0, 0, 111, NULL, 0, 0, 1, '2021-06-12 23:22:03'),
(11, '1', 0, NULL, 'Male', NULL, NULL, 'Rectangle', 'Medium', 'test6', 12, 123, 'f0adc8838f4bdedde4ec2cfad0515589_1623536485_1607.PNG', NULL, '', '11111', '33344', 0, 0, 0, 0, 0, 0, 12, NULL, 0, 0, 1, '2021-06-12 23:21:25'),
(12, '1', 0, NULL, 'Male', NULL, NULL, 'Round', 'Narrow', 'test7', 12, 55, 'abd815286ba1007abfbb8415b83ae2cf_1623536639_6859.PNG', NULL, '', '4141', '1141', 0, 0, 0, 0, 0, 0, 5, NULL, 0, 0, 1, '2021-06-12 23:23:59'),
(13, '1', 0, NULL, 'Male', NULL, NULL, 'Others', 'Custom', 'test8', 33, 44, '470e7a4f017a5476afb7eeb3f8b96f9b_1623536686_2079.PNG', NULL, '', '512t', 'wgrg', 0, 0, 0, 0, 0, 0, 2, NULL, 0, 0, 1, '2021-06-12 23:24:46'),
(14, '1', 0, NULL, 'Male', NULL, NULL, 'Geometric', 'Narrow', 'test9', 12, 45, '1f4477bad7af3616c1f933a02bfabe4e_1623536926_5046.PNG', NULL, '', 'sg', 'sgf', 0, 0, 0, 0, 0, 0, 5, NULL, 0, 0, 1, '2021-06-12 23:28:46'),
(15, '1', 0, NULL, 'Male', NULL, NULL, 'Cat Eye', 'Medium', 'test10', 12, 23, '4c56ff4ce4aaf9573aa5dff913df997a_1623536963_4549.PNG', NULL, '', 'we', 'sg', 0, 0, 0, 0, 0, 0, 12, NULL, 0, 0, 1, '2021-06-12 23:29:23'),
(16, '1', 0, NULL, 'Male', NULL, NULL, 'Rectangle', 'Wide', 'test11', 10, 9, 'c32d9bf27a3da7ec8163957080c8628e_1623537004_4043.PNG', NULL, '', 'qdqf', 'sfwf', 0, 0, 0, 0, 0, 0, 11, NULL, 0, 0, 1, '2021-06-12 23:30:04'),
(17, '2', NULL, NULL, 'Both', NULL, NULL, 'Round', 'Medium', 'Gucci Style Sunglasses For Both', 340, 0, '903ce9225fca3e988c2af215d4e544d3_1624525416_1350.jpg', '37bc2f75bf1bcfe8450a1a41c200364c_1624525385_6814.jpg', '<p>Made with high-quality material, these frames are very lightweight, only about 9.1 g. It is the best choice for people who pursuit comfy. To reduce the friction with the skin, we design the arms smoothly. Adjustable nose pads also bring you a comfortable experience.</p>\r\n', 'Made with high-quality material, these frames are very lightweight, only about 9.1 g. It is the best choice for people who pursuit comfy. To reduce the friction with the skin, we design the arms smoothly. Adjustable nose pads also bring you a comfortable experience.', 'Gucci Sunglasses', 1, 0, 1, 0, NULL, 1, 5, NULL, 0, 0, 0, '2021-06-24 10:05:39'),
(18, '1', NULL, NULL, 'Male,Female', NULL, NULL, 'Cat Eye', 'Medium', '2001', 10, 0, '0ff8033cf9437c213ee13937b1c4c455_1627074816_4429.jpg', '1651cf0d2f737d7adeab84d339dbabd3_1627074575_2841.jpg', '<p>aaaaaaaaaaaa</p>\r\n', 'cat', 'cat', 1, 0, 1, 1, 0, 0, 1, NULL, 0, 0, 1, '2021-07-23 22:16:27'),
(19, '1', NULL, NULL, 'Male', NULL, NULL, 'Round', 'Medium', 'test12', 20, 0, '024d7f84fff11dd7e8d9c510137a2381_1627452665_4064.jpg', NULL, '', '123', '12345', 0, 0, 0, 0, 0, 0, 12, NULL, 0, 0, 1, '2021-07-28 07:11:05'),
(20, '1', NULL, NULL, 'Male', NULL, NULL, 'Geometric', 'Wide', 'test13', 15, 0, 'cee631121c2ec9232f3a2f028ad5c89b_1627452733_2364.jpg', NULL, '', 'sdsgsdg', 'sgsshh', 0, 0, 0, 0, 0, 0, 11, NULL, 0, 0, 1, '2021-07-28 07:12:13'),
(21, '1', NULL, NULL, 'Female', NULL, NULL, 'Round', 'Medium', 'test14', 14, 0, 'b7bb35b9c6ca2aee2df08cf09d7016c2_1627452780_9384.jpg', NULL, '', 'dfffh', 'djdgmfmf', 0, 0, 0, 0, 0, 0, 20, NULL, 0, 0, 1, '2021-07-28 07:13:00'),
(22, '1', NULL, NULL, 'Female', NULL, NULL, 'Geometric', 'Medium', '15', 15, 0, 'dbe272bab69f8e13f14b405e038deb64_1627452819_6732.jpg', NULL, '', 'adgsf', 'sfhdf', 0, 0, 0, 0, 0, 0, 11, NULL, 0, 0, 1, '2021-07-28 07:13:39'),
(23, '1', NULL, NULL, 'Female', NULL, NULL, 'Round', 'Medium', 'test16', 10, 0, 'f7e6c85504ce6e82442c770f7c8606f0_1627452915_8250.jpg', NULL, '', 'shs', 'djdjg', 0, 0, 0, 0, 0, 0, 12, NULL, 0, 0, 1, '2021-07-28 07:15:15'),
(24, '1', NULL, NULL, 'Male,Female', NULL, NULL, 'Round', 'Medium', 'test17', 12, 0, '1f50893f80d6830d62765ffad7721742_1627452995_8519.jpg', NULL, '', 'sbshs', 'ddghd', 0, 0, 0, 0, 0, 0, 11, NULL, 0, 0, 1, '2021-07-28 07:16:35'),
(25, '1,6,9', NULL, NULL, 'Male', NULL, NULL, 'Geometric', 'Medium', 'test18', 15, 0, 'da8ce53cf0240070ce6c69c48cd588ee_1627453055_1185.jpg', NULL, '', 'adgfh', 'hdhdh', 0, 0, 0, 0, 0, 0, 12, NULL, 0, 0, 1, '2021-07-28 07:17:35'),
(26, '1', NULL, NULL, 'Female', NULL, NULL, 'Geometric', 'Medium', 'test18', 12, 0, '7d04bbbe5494ae9d2f5a76aa1c00fa2f_1627453101_5685.jpg', NULL, '', 'hd', 'dg', 0, 0, 0, 0, 0, 0, 12, NULL, 0, 0, 1, '2021-07-28 07:18:21'),
(27, '1', NULL, NULL, 'Female', NULL, NULL, 'Oval', 'Medium', 'test19', 12, 0, '371bce7dc83817b7893bcdeed13799b5_1627453217_3931.jpg', NULL, '', 'shshf', 'sfdndf', 0, 0, 0, 0, 0, 0, 1, NULL, 0, 0, 1, '2021-07-28 07:20:17'),
(28, '1', NULL, NULL, 'Female', NULL, NULL, 'Geometric', 'Medium', 'test20', 12, 0, '1fc214004c9481e4c8073e85323bfd4b_1627453263_4318.jpg', NULL, '', '4re', 'f2', 0, 0, 0, 0, 0, 0, 11, NULL, 0, 0, 1, '2021-07-28 07:21:03'),
(29, '1', NULL, NULL, 'Female', NULL, NULL, 'Round', 'Medium', 'test21', 8, 0, 'ab817c9349cf9c4f6877e1894a1faa00_1627453319_4844.jpg', NULL, '', 'dgsg', 'sfhsh', 0, 0, 0, 0, 0, 0, 12, NULL, 0, 0, 1, '2021-07-28 07:21:59'),
(30, '2', NULL, NULL, 'Female', NULL, NULL, 'Oval', 'Wide', 'test23', 11, 0, 'a2557a7b2e94197ff767970b67041697_1627453564_2600.jpg', NULL, '', 'sdgs', 'ddg', 0, 0, 0, 0, 0, 0, 1, NULL, 0, 0, 1, '2021-07-28 07:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocodes`
--

CREATE TABLE `tbl_promocodes` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `code_type` enum('percent','fixed') NOT NULL DEFAULT 'percent',
  `amount` float NOT NULL DEFAULT 0,
  `codes` int(11) DEFAULT 0,
  `code_used` int(11) DEFAULT 0,
  `expiry_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_promocodes`
--

INSERT INTO `tbl_promocodes` (`id`, `code`, `code_type`, `amount`, `codes`, `code_used`, `expiry_date`, `status`) VALUES
(2, 'test2', 'fixed', 50, 5, 2, '2020-07-31', 0),
(3, 'test3', 'percent', 20, 2, 0, '2020-08-20', 0),
(4, 'tryitout1', 'fixed', 10, 2, 2, '2021-08-30', 0),
(7, 'rol1', 'fixed', 234, 1, 1, '2021-07-30', 0),
(10, '12', 'fixed', 146, 1, 1, '2021-07-31', 0),
(13, '123456', 'fixed', 2, 6, 6, '2021-08-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ref_signups`
--

CREATE TABLE `tbl_ref_signups` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `ref_mem_id` int(11) NOT NULL,
  `reward` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_ref_signups`
--

INSERT INTO `tbl_ref_signups` (`id`, `mem_id`, `ref_mem_id`, `reward`) VALUES
(2, 1, 61, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`id`, `mem_id`, `profile_id`, `reason`, `date`) VALUES
(1, 1, 3, 'test', '2020-08-14 18:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `from_id` int(11) NOT NULL,
  `od_id` int(10) UNSIGNED DEFAULT NULL,
  `ref_id` int(11) NOT NULL,
  `ref_type` enum('product') DEFAULT NULL,
  `rating` float NOT NULL,
  `comment` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `parent_id`, `mem_id`, `from_id`, `od_id`, `ref_id`, `ref_type`, `rating`, `comment`, `image`, `date`) VALUES
(1, NULL, NULL, 1, 1, 1, 'product', 5, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, '2021-07-06 11:56:30'),
(2, NULL, NULL, 6, 8, 3, 'product', 5, 'Look ok', NULL, '2021-07-10 02:49:16'),
(3, NULL, NULL, 1, 14, 1, 'product', 5, 'koi masla ni ok ha', 'd045c59a90d7587d8d671b5f5aec4e7c_1626099090_2569.jpg', '2021-07-12 14:11:30'),
(4, NULL, NULL, 6, 3, 1, 'product', 5, 'just recived', '2a79ea27c279e471f4d180b08d62b00a_1626238760_9514.PNG', '2021-07-14 04:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shapes`
--

CREATE TABLE `tbl_shapes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shapes`
--

INSERT INTO `tbl_shapes` (`id`, `title`) VALUES
(2, 'Cat Eye'),
(3, 'Round'),
(4, 'Oval'),
(6, 'Geometric'),
(7, 'Rectangle'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siteadmin`
--

CREATE TABLE `tbl_siteadmin` (
  `site_id` int(11) NOT NULL,
  `site_username` varchar(255) DEFAULT NULL,
  `site_password` varchar(255) DEFAULT NULL,
  `site_admin_name` varchar(255) DEFAULT NULL,
  `site_admin_type` enum('admin','subadmin') NOT NULL DEFAULT 'admin',
  `site_domain` varchar(100) DEFAULT NULL,
  `site_name` varchar(500) DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `site_noreply_email` varchar(255) DEFAULT NULL,
  `site_phone` varchar(255) DEFAULT NULL,
  `site_fax` varchar(255) DEFAULT NULL,
  `site_paypal_sandox` tinyint(1) DEFAULT 0,
  `site_sandbox_paypal` varchar(255) DEFAULT NULL,
  `site_live_paypal` varchar(255) DEFAULT NULL,
  `site_ip` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_icon` varchar(255) DEFAULT NULL,
  `site_thumb` varchar(255) DEFAULT NULL,
  `site_address` varchar(255) DEFAULT NULL,
  `site_about` text DEFAULT NULL,
  `site_city` varchar(100) DEFAULT NULL,
  `site_state` varchar(100) DEFAULT NULL,
  `site_zip` varchar(25) DEFAULT NULL,
  `site_country` varchar(100) DEFAULT NULL,
  `site_lastlogindate` timestamp NOT NULL DEFAULT current_timestamp(),
  `site_copyright` varchar(1000) DEFAULT NULL,
  `site_facebook` varchar(255) DEFAULT NULL,
  `site_twitter` varchar(255) DEFAULT NULL,
  `site_google` varchar(255) DEFAULT NULL,
  `site_instagram` varchar(255) DEFAULT NULL,
  `site_linkedin` varchar(255) DEFAULT NULL,
  `site_youtube` varchar(255) DEFAULT NULL,
  `site_contact_map` text DEFAULT NULL,
  `site_google_ad` text DEFAULT NULL,
  `site_meta_desc` text DEFAULT NULL,
  `site_meta_keyword` varchar(1000) DEFAULT NULL,
  `site_meta_copyright` varchar(500) DEFAULT NULL,
  `site_meta_author` varchar(255) DEFAULT NULL,
  `site_how_to_pay` text DEFAULT NULL,
  `site_status` int(11) NOT NULL DEFAULT 1,
  `sub_location` int(20) DEFAULT NULL,
  `site_chat` text DEFAULT NULL,
  `site_scripts` longtext DEFAULT NULL,
  `sub_featured` int(30) DEFAULT NULL,
  `site_version` int(11) NOT NULL DEFAULT 0,
  `site_tex_percentage` float NOT NULL DEFAULT 0,
  `site_off_heading` varchar(255) DEFAULT NULL,
  `site_off_detail` text DEFAULT NULL,
  `site_covid19_heading` varchar(255) DEFAULT NULL,
  `site_covid19_detail` text DEFAULT NULL,
  `site_livechat_link` varchar(255) DEFAULT NULL,
  `site_livechat_tagline` varchar(255) DEFAULT NULL,
  `site_whatsappchat_link` varchar(255) DEFAULT NULL,
  `site_whatsappchat_tagline` varchar(255) DEFAULT NULL,
  `site_free_shipping` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_siteadmin`
--

INSERT INTO `tbl_siteadmin` (`site_id`, `site_username`, `site_password`, `site_admin_name`, `site_admin_type`, `site_domain`, `site_name`, `site_email`, `site_noreply_email`, `site_phone`, `site_fax`, `site_paypal_sandox`, `site_sandbox_paypal`, `site_live_paypal`, `site_ip`, `site_logo`, `site_icon`, `site_thumb`, `site_address`, `site_about`, `site_city`, `site_state`, `site_zip`, `site_country`, `site_lastlogindate`, `site_copyright`, `site_facebook`, `site_twitter`, `site_google`, `site_instagram`, `site_linkedin`, `site_youtube`, `site_contact_map`, `site_google_ad`, `site_meta_desc`, `site_meta_keyword`, `site_meta_copyright`, `site_meta_author`, `site_how_to_pay`, `site_status`, `sub_location`, `site_chat`, `site_scripts`, `sub_featured`, `site_version`, `site_tex_percentage`, `site_off_heading`, `site_off_detail`, `site_covid19_heading`, `site_covid19_detail`, `site_livechat_link`, `site_livechat_tagline`, `site_whatsappchat_link`, `site_whatsappchat_tagline`, `site_free_shipping`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administration', 'admin', 'www.hippolook.com', 'Hippolook', 'support@hippolook.com', 'no-reply@hippolook.com', '+6597877993', '', 0, 'testr@gmail.com', 'rolandtch@gmail.com', '::1', 'hippolook-logo.svg', 'hippolook-icon.png', 'hippolook-thumb.png', '<em>P.O. Box 102103</br>\r\n103B Depot Road #02-533 </em>', 'Whether you need in-home dog boarding, pet sitting, dog walking, or day care, Puppy Friends Social Club connects pet parents with dog people who’ll treat their pets like family.', 'New York', 'WA', '75350', 'USA', '2025-02-27 02:21:16', '2018', 'https://www.facebook.com/hippolook', 'https://www.twitter.com/hippolook', 'https://plus.google.com/mrservicecard', 'https://www.instagram.com/hippolook', 'https://www.linkedin.com/pfsc', 'https://www.youtube.com/channel/hippolook', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3318.7250567536676!2d-84.34897039425!3d33.71606266992961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f501790d22f717%3A0x7ff91decdaf344dc!2s1264+Custer+Ave+SE%2C+Atlanta%2C+GA+30316!5e0!3m2!1sen!2s!4v1493122321821', '', 'Hippolook - Stylish Prescription Glasses, Affordable Eyeglasses online', 'Hippolook', 'New Admin &copy; 2018 All Rights Reserved.', 'Administration', '', 1, 20, 'window.fcWidget.init({\r\ntoken: \"89884c16-15cc-484d-926f-ec74202a584d\",\r\nhost: \"https://wchat.freshchat.com\"\r\n});', '', 30, 45, 0, 'Free shipping when you spend above US$60.00', '1. Shipping is based on our courier partners.\r\n2. Automatic apply\r\n3. Free shipping is for per invoice only.', 'COVID-19', 'The one and half meters is valid in our shop/Cough and sneeze into your elbow/Avoid busy place in the shop/Use paper tissues to blow your nose and discard them after using it/place sanitaze your hand before coming into the shop/Mouth masks are not mandatory.\r\nThank you for your cooperation.', 'https://livechat.com', 'Do you have any questions about your order. you can chat with us life from 09:00 to 23:00', 'https://wa.me/+923015588899?text=helllo!', 'Contact us on whatsup from 09:00 to 23:00', 60),
(2, 'ajay', '098f6bcd4621d373cade4e832627b4f6', 'Malik Ajay Jones', 'subadmin', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-06 15:00:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'assadali', '16d7a4fca7442dda3ad93c9a726597e4', 'Ass Adli', 'subadmin', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-18 13:26:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'mattabedin', '12bce374e7be15142e8172f668da00d8', 'Matt', 'subadmin', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-20 21:33:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'darren', 'dd0d260e8a01c5a2ed64817d546be9f5', 'Darren', 'subadmin', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-02 06:47:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sitecontent`
--

CREATE TABLE `tbl_sitecontent` (
  `id` int(11) NOT NULL,
  `ckey` varchar(80) NOT NULL,
  `code` text DEFAULT NULL,
  `full_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_sitecontent`
--

INSERT INTO `tbl_sitecontent` (`id`, `ckey`, `code`, `full_code`) VALUES
(1, 'login', 'a:5:{s:10:\"page_title\";s:7:\"Sign in\";s:16:\"meta_description\";s:7:\"Sign in\";s:13:\"meta_keywords\";s:7:\"Sign in\";s:7:\"heading\";s:7:\"Sign in\";s:10:\"short_desc\";s:24:\"Enter your details below\";}', NULL),
(2, 'signup', 'a:5:{s:10:\"page_title\";s:7:\"Sign up\";s:16:\"meta_description\";s:7:\"Sign up\";s:13:\"meta_keywords\";s:7:\"Sign up\";s:7:\"heading\";s:7:\"Sign up\";s:10:\"short_desc\";s:110:\"Register for free and enjoy all our benefits. With your information you can log in and log out in our webshop.\";}', NULL),
(3, 'forgot', 'a:5:{s:10:\"page_title\";s:15:\"Forgot Password\";s:16:\"meta_description\";s:15:\"Forgot Password\";s:13:\"meta_keywords\";s:15:\"Forgot Password\";s:7:\"heading\";s:25:\"Reset your password here!\";s:10:\"short_desc\";s:122:\"Don’t worry. Just enter the email address you registered with and we’ll email you instructions to reset your password.\";}', NULL),
(4, 'reset', 'a:5:{s:10:\"page_title\";s:14:\"Reset Password\";s:16:\"meta_description\";s:14:\"Reset Password\";s:13:\"meta_keywords\";s:14:\"Reset Password\";s:7:\"heading\";s:14:\"Reset Password\";s:10:\"short_desc\";s:38:\"Enter a new password for your account.\";}', NULL),
(5, 'email_verify', 'a:2:{s:15:\"everify_heading\";s:18:\"Email Verification\";s:14:\"everify_detail\";s:260:\"<p>Please verify your email address, We’ve sent a verify email to your email address. If you don’t see the email, check your spam folder. If you didn\'t get email click on resend email link, or if you want to change email address click the link below.</p>\r\n\";}', NULL),
(6, 'phone_verify', 'a:2:{s:15:\"pverify_heading\";s:18:\"Phone Verification\";s:14:\"pverify_detail\";s:289:\"<p>We are going to send you a text message for Phone verification if you want to verify your phone number, Please make sure your phone number is correct before verification. Click the link below to verify your phone number or if you want to change Phone Number click the link below .</p>\r\n\";}', NULL),
(7, 'search', '', NULL),
(8, 'home', 'a:47:{s:14:\"second_heading\";s:24:\"Buy glasses at Hippolook\";s:17:\"second_short_desc\";s:191:\"Rich in style and well-crafted, Hippolook optical sell affordable designers\' frames and high quality lens, help many people to see clearly, and claim their fashion statement at the same time.\";s:12:\"second_link1\";s:5:\"Women\";s:12:\"second_link2\";s:3:\"Men\";s:12:\"second_link3\";s:8:\"Sunglass\";s:12:\"second_link4\";s:4:\"Kids\";s:12:\"second_link5\";s:7:\"Premium\";s:12:\"second_link6\";s:4:\"Kids\";s:12:\"second_link7\";s:7:\"Premium\";s:13:\"third_heading\";s:6:\"New In\";s:12:\"fourth_link1\";s:40:\"http://localhost/clients/hippolook/store\";s:12:\"fourth_link2\";s:40:\"http://localhost/clients/hippolook/store\";s:13:\"fifth_heading\";s:18:\"Premium Collection\";s:19:\"sixth_small_heading\";s:12:\"NEW FOR 2021\";s:13:\"sixth_heading\";s:12:\"Best Sellers\";s:12:\"sixth_detail\";s:238:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, labore eveniet. Amet, illo aspernatur veritatis corrupti exercitationem ut quod autem mollitia deleniti minima provident temporibus pariatur sunt necessitatibus ducimus ipsam?\";s:17:\"sixth_button_text\";s:7:\"BUY NOW\";s:17:\"sixth_button_link\";s:40:\"http://localhost/clients/hippolook/store\";s:13:\"seventh_link1\";s:40:\"http://localhost/clients/hippolook/store\";s:13:\"seventh_link2\";s:40:\"http://localhost/clients/hippolook/store\";s:13:\"eight_heading\";s:10:\"Flash Sale\";s:9:\"last_link\";s:40:\"http://localhost/clients/hippolook/store\";s:6:\"image1\";s:52:\"30ef30b64204a3088a26bc2e6ecf7602_1621342872_6112.jpg\";s:12:\"first_image1\";s:52:\"42998cf32d552343bc8e460416382dca_1625482508_1483.jpg\";s:12:\"first_image2\";s:52:\"a5cdd4aa0048b187f7182f1b9ce7a6a7_1625482508_7834.jpg\";s:12:\"first_image3\";s:52:\"86b122d4358357d834a87ce618a55de0_1621342872_9910.jpg\";s:13:\"fourth_image1\";s:52:\"872488f88d1b2db54d55bc8bba2fad1b_1621342872_5326.jpg\";s:13:\"fourth_image2\";s:52:\"6e7b33fdea3adc80ebd648fffb665bb8_1621342872_9305.jpg\";s:14:\"seventh_image1\";s:52:\"1385974ed5904a438616ff7bdb3f7439_1621342872_3638.jpg\";s:14:\"seventh_image2\";s:52:\"b5b41fac0361d157d9673ecb926af5ae_1621342872_2332.jpg\";s:13:\"second_image1\";s:52:\"979d472a84804b9f647bc185a877a8b5_1624756449_3785.JPG\";s:13:\"second_image2\";s:52:\"f90f2aca5c640289d0a29417bcb63a37_1624756119_3984.JPG\";s:13:\"second_image3\";s:52:\"3435c378bb76d4357324dd7e69f3cd18_1624756119_4004.JPG\";s:13:\"second_image4\";s:52:\"cdc0d6e63aa8e41c89689f54970bb35f_1624756119_4627.JPG\";s:13:\"second_image5\";s:53:\"96b9bff013acedfb1d140579e2fbeb63_1624756537_6864.WEBP\";s:13:\"second_image6\";s:52:\"be3159ad04564bfb90db9e32851ebf9c_1621342922_3119.jpg\";s:13:\"second_image7\";s:52:\"2b44928ae11fb9384c4cf38708677c48_1621342922_8333.jpg\";s:15:\"second_heading1\";s:5:\"Women\";s:15:\"second_heading2\";s:3:\"Men\";s:15:\"second_heading3\";s:8:\"Sunglass\";s:15:\"second_heading4\";s:4:\"Kids\";s:15:\"second_heading5\";s:7:\"Premium\";s:15:\"second_heading6\";s:4:\"Kids\";s:15:\"second_heading7\";s:7:\"Premium\";s:11:\"first_link1\";s:60:\"http://herosolutions.com.pk/sarim/hippolook/store/eyeglasses\";s:11:\"first_link2\";s:117:\"http://herosolutions.com.pk/sarim/hippolook//uploads/educational/f5f8590cd58a54e94377e6ae2eded4d9_1625861805_3962.mp4\";s:11:\"first_link3\";s:60:\"http://herosolutions.com.pk/sarim/hippolook/store/eyeglasses\";}', NULL),
(9, 'about', 'a:31:{s:10:\"page_title\";s:8:\"About us\";s:16:\"meta_description\";s:8:\"About us\";s:13:\"meta_keywords\";s:8:\"About us\";s:18:\"first_left_heading\";s:58:\"Our Site is Most Popular, Clean and Recommended Eyeglasses\";s:13:\"first_heading\";s:66:\"All of our services are backed by our 100% satisfaction guarantee.\";s:12:\"first_detail\";s:585:\"<p>Quo, deleniti vel, id reprehenderit, ullam sit quas minus odit voluptates iusto corrupti odio nesciunt ut temporibus voluptatem suscipit molestias! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia quae eos facilis voluptas, blanditiis nisi doloribus quaerat similique adipisci debitis sequi rerum eius laudantium numquam!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia delectus illum dolorum consectetur hic dolores earum laudantium atque saepe! Iste praesentium impedit repudiandae aliquam ratione animi ipsam accusamus ea beatae.</p>\r\n\";s:13:\"third_heading\";s:20:\"How are we doing it?\";s:14:\"third_heading1\";s:16:\"Care and Comfort\";s:11:\"third_text1\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:14:\"third_heading2\";s:13:\"Daily Updates\";s:11:\"third_text2\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:14:\"third_heading3\";s:24:\"Expert and Professionals\";s:11:\"third_text3\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:14:\"third_heading4\";s:8:\"Our Goal\";s:11:\"third_text4\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:14:\"third_heading5\";s:17:\" Cashless Payment\";s:11:\"third_text5\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:14:\"third_heading6\";s:23:\"Providing Great Service\";s:11:\"third_text6\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:14:\"fourth_heading\";s:21:\"Hippolook at a Glance\";s:13:\"fourth_detail\";s:627:\"<h3>All of our services are backed by our 100% satisfaction guarantee.</h3>\r\n\r\n<p>Ullam sit quas minus odit voluptates iusto corrupti odio nesciunt ut temporibus voluptatem suscipit molestias! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia quae eos facilis voluptas, blanditiis nisi doloribus quaerat similique adipisci debitis sequi rerum eius laudantium numquam!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia delectus illum dolorum consectetur hic dolores earum laudantium atque saepe! Iste praesentium impedit repudiandae aliquam ratione animi ipsam accusamus ea beatae.</p>\r\n\";s:6:\"image1\";s:52:\"51d92be1c60d1db1d2e5e7a07da55b26_1620308225_6827.jpg\";s:6:\"image2\";s:52:\"788d986905533aba051261497ecffcbb_1620308225_3442.jpg\";s:6:\"image3\";s:52:\"10a5ab2db37feedfdeaab192ead4ac0e_1620308225_6422.jpg\";s:12:\"third_image1\";s:52:\"1e056d2b0ebd5c878c550da6ac5d3724_1620308225_9493.svg\";s:12:\"third_image2\";s:52:\"7f5d04d189dfb634e6a85bb9d9adf21e_1620308225_5769.svg\";s:12:\"third_image3\";s:52:\"da8ce53cf0240070ce6c69c48cd588ee_1620308225_7265.svg\";s:12:\"third_image4\";s:52:\"69adc1e107f7f7d035d7baf04342e1ca_1620308225_1869.svg\";s:12:\"third_image5\";s:52:\"24b16fede9a67c9251d3e7c7161c83ac_1620308225_7694.svg\";s:12:\"third_image6\";s:52:\"f1c1592588411002af340cbaedd6fc33_1620308225_2462.svg\";s:11:\"second_link\";s:40:\"http://localhost/clients/hippolook/store\";}', NULL),
(10, 'contact', 'a:8:{s:10:\"page_title\";s:10:\"Contact us\";s:16:\"meta_description\";s:10:\"Contact us\";s:13:\"meta_keywords\";s:10:\"Contact us\";s:6:\"detail\";s:813:\"<p style=\"margin-bottom: 15px;\" abeezee=\"\" regular\";\"=\"\">If you contact us via hier, we process the referring website and which page you are on when you start the chat in addition to the above data. We use this information to provide you with the best possible service and as quickly as possible and we can help you as well as possible with follow-up questions.</p><ul class=\"list\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\" abeezee=\"\" regular\";\"=\"\"><li style=\"display: block;\">Read all about the use of your personal data by</li><li style=\"display: block;\">FrancescoMaccardo policy</li><li style=\"display: block;\">Delivery policy</li><li style=\"display: block;\">Return policy</li><li style=\"display: block;\">Secured pay policy</li><li style=\"display: block;\">Cookies</li></ul>\";s:10:\"right_text\";s:2785:\"<div class=\"_head\" style=\"\" abeezee=\"\" regular\";\"=\"\">CONTACT</div><p style=\"margin-bottom: 15px;\" abeezee=\"\" regular\";\"=\"\">The FrancescoMaccardo Customer Contact Center is happy to answer all your questions. Available every day via chat, WhatsApp and social from 09:00 - 23:00 and by phone from 08:00 - 18:00.</p><div class=\"_head\" style=\"\" abeezee=\"\" regular\";\"=\"\">FREQUENTLY ASKED QUESTIONS</div><p style=\"margin-bottom: 15px;\" abeezee=\"\" regular\";\"=\"\">Do you have a question regarding the FrancescoMaccardo Shop and products? Via the link below you will see a handy overview with answers to frequently asked questions. Is your question not listed? Then contact us.</p><p style=\"margin-bottom: 15px;\" abeezee=\"\" regular\";\"=\"\">View frequently asked questions</p><div class=\"_head\" style=\"\" abeezee=\"\" regular\";\"=\"\">TO CHAT</div><p style=\"margin-bottom: 15px;\" abeezee=\"\" regular\";\"=\"\">Our employees are ready to answer all your questions via chat. You can chat with us via the chat button at the bottom right of deBijenkorf.nl.</p><div class=\"_head\" style=\"\" abeezee=\"\" regular\";\"=\"\">WHATSAPPING</div><p style=\"margin-bottom: 15px;\" abeezee=\"\" regular\";\"=\"\">Add 0614928578 to WhatsApp, ask your question and receive an answer within 10 minutes</p><div class=\"_head\" style=\"\" abeezee=\"\" regular\";\"=\"\">SOCIAL MEDIA</div><p style=\"margin-bottom: 15px;\" abeezee=\"\" regular\";\"=\"\">You can also reach the Customer Contact Center every day via social media.</p><ul class=\"list\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\" abeezee=\"\" regular\";\"=\"\"><li style=\"display: block;\"><a href=\"https://www.instagram.com/FrancescoMaccardo\" style=\"word-break: break-word; display: inline-block; transition: all 0.5s ease 0s; outline: none !important;\">Instagram</a></li><li style=\"display: block;\"><a href=\"https://www.facebook.com/FrancescoMaccardo\" style=\"word-break: break-word; display: inline-block; transition: all 0.5s ease 0s; outline: none !important;\">Facebook</a></li><li style=\"display: block;\"><a href=\"http://twitter.com/francesomaccardo\" style=\"word-break: break-word; display: inline-block; transition: all 0.5s ease 0s; outline: none !important;\">Twitter</a></li><li style=\"display: block;\"><br></li></ul><ul class=\"list\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\" abeezee=\"\" regular\";\"=\"\"><li style=\"display: block;\"><a href=\"tel:020 8229880\" style=\"word-break: break-word; display: inline-block; transition: all 0.5s ease 0s; outline: none !important;\">020 8229880</a>&nbsp;(local rate)</li><li style=\"display: block;\"><a href=\"mailto:info@Francescomaccardo.com\" style=\"word-break: break-word; display: inline-block; transition: all 0.5s ease 0s; outline: none !important;\">info@Francescomaccardo.com</a></li></ul>\";s:7:\"heading\";s:28:\"Don\'t Hesitate to Contact Us\";s:14:\"second_heading\";s:30:\"Let’s start the conversation\";s:6:\"image1\";s:52:\"5705e1164a8394aace6018e27d20d237_1620321534_2596.jpg\";}', NULL),
(11, 'choose_us', 'a:22:{s:10:\"page_title\";s:13:\"Why choose us\";s:16:\"meta_description\";s:13:\"Why choose us\";s:13:\"meta_keywords\";s:13:\"Why choose us\";s:14:\"fourth_heading\";s:45:\"Officiis doloribus dolore earum voluptate in!\";s:13:\"fourth_detail\";s:594:\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, minima sint consectetur, temporibus reprehenderit commodi eaque maxime eos ad ratione delectus repudiandae similique laboriosam excepturi assumenda. Nostrum commodi est quis.</p>\r\n\r\n<p>Doloremque, perferendis laboriosam? Maxime facere sequi impedit explicabo obcaecati. Eos quaerat ullam nulla consectetur consequatur animi rerum, atque tempora autem repellat sapiente?</p>\r\n\r\n<p>Odio ducimus consequuntur minima quo ipsam est obcaecati, eius, cupiditate labore nam corrupti ex aut sit ad ab sequi. Nisi, vitae nesciunt?</p>\r\n\";s:14:\"second_heading\";s:17:\"Why to choose us?\";s:15:\"second_heading1\";s:16:\"Care and Comfort\";s:12:\"second_text1\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:15:\"second_heading2\";s:13:\"Daily Updates\";s:12:\"second_text2\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:15:\"second_heading3\";s:24:\"Expert and Professionals\";s:12:\"second_text3\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:15:\"second_heading4\";s:8:\"Our Goal\";s:12:\"second_text4\";s:208:\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus id ex odit, quo porro nesciunt. Vel magni id dolores quas repudiandae accusantium, ipsum quia nobis. Perspiciatis totam error veniam repudiandae.\";s:6:\"image1\";s:52:\"9232fe81225bcaef853ae32870a2b0fe_1620640949_9702.jpg\";s:6:\"image2\";s:52:\"a597e50502f5ff68e3e25b9114205d4a_1620640949_1739.jpg\";s:13:\"second_image1\";s:52:\"ef4e3b775c934dada217712d76f3d51f_1620641020_4369.svg\";s:13:\"second_image2\";s:52:\"9b698eb3105bd82528f23d0c92dedfc0_1620641020_2135.svg\";s:13:\"second_image3\";s:52:\"9f53d83ec0691550f7d2507d57f4f5a2_1620641020_2077.svg\";s:13:\"second_image4\";s:52:\"d2ed45a52bc0edfa11c2064e9edee8bf_1620641020_8861.svg\";s:13:\"first_heading\";s:45:\"Officiis doloribus dolore earum voluptate in!\";s:12:\"first_detail\";s:594:\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, minima sint consectetur, temporibus reprehenderit commodi eaque maxime eos ad ratione delectus repudiandae similique laboriosam excepturi assumenda. Nostrum commodi est quis.</p>\r\n\r\n<p>Doloremque, perferendis laboriosam? Maxime facere sequi impedit explicabo obcaecati. Eos quaerat ullam nulla consectetur consequatur animi rerum, atque tempora autem repellat sapiente?</p>\r\n\r\n<p>Odio ducimus consequuntur minima quo ipsam est obcaecati, eius, cupiditate labore nam corrupti ex aut sit ad ab sequi. Nisi, vitae nesciunt?</p>\r\n\";}', NULL),
(12, 'faq', 'a:5:{s:10:\"page_title\";s:26:\"Frequently Asked Questions\";s:16:\"meta_description\";s:26:\"Frequently Asked Questions\";s:13:\"meta_keywords\";s:26:\"Frequently Asked Questions\";s:7:\"heading\";s:20:\"How can we help you?\";s:6:\"image1\";s:52:\"f9b902fc3289af4dd08de5d1de54f68f_1620641671_6029.jpg\";}', NULL),
(13, 'blog', 'a:4:{s:10:\"page_title\";s:13:\"Blog Articles\";s:16:\"meta_description\";s:13:\"Blog Articles\";s:13:\"meta_keywords\";s:13:\"Blog Articles\";s:6:\"image1\";s:52:\"e00da03b685a0dd18fb6a08af0923de0_1620641768_2498.jpg\";}', NULL),
(14, 'educational_videos', 'a:11:{s:10:\"page_title\";s:18:\"Educational Videos\";s:16:\"meta_description\";s:18:\"Educational Videos\";s:13:\"meta_keywords\";s:18:\"Educational Videos\";s:6:\"detail\";s:605:\"<p><u>FrancescoMaccardo is one of the leading online brand and store with excellent quality clothing and other fashionable accessories. We strive to be exciting and innovative and offering our customers the high quality of our brand. We want to seduce and inspire our audience and customers by mean of provocative style and fashion and terrific design that stimulate.<br>Founded in 2020, we\'ve build our repitation as a leader in netherlands fashion organization. Thanks to our innovation and our striking designs, we have been the fasters leading brand in the Netherlands brands organization.</u><br></p>\";s:13:\"right_heading\";s:12:\"MOTO & PATLO\";s:10:\"right_text\";s:893:\"In the dialogues Plato is most celebrated and admired for, Socrates is concerned with human and political virtue, has a distinctive personality, and friends and enemies who \"travel\" with him from dialogue to dialogue. This is not to say that Socrates is consistent: a man who is his friend in one dialogue may be an adversary or subject of his mockery in another. For example, Socrates praises the wisdom of Euthyphro many times in the Cratylus, but makes him look like a fool in the Euthyphro. He disparages sophists generally, and Prodicus specifically in the Apology, whom he also slyly jabs in the Cratylus for charging the hefty fee of fifty drachmas for a course on language and grammar. However, Socrates tells Theaetetus in his namesake dialogue that he admires Prodicus and has directed many pupils to him. Socrates\' ideas are also not consistent within or between or among dialogues.\";s:6:\"image4\";s:52:\"9e3cfc48eccf81a0d57663e129aef3cb_1611734678_7248.png\";s:6:\"image1\";s:52:\"cc1aa436277138f61cda703991069eaf_1620657688_3439.jpg\";s:6:\"image2\";s:52:\"5751ec3e9a4feab575962e78e006250d_1611734677_8269.jpg\";s:6:\"image3\";s:52:\"20aee3a5f4643755a79ee5f6a73050ac_1611734677_4876.jpg\";s:7:\"heading\";s:18:\"Educational Videos\";}', NULL),
(15, 'shipping_handling', 'a:4:{s:10:\"page_title\";s:21:\"Shipping and Handling\";s:16:\"meta_description\";s:21:\"Shipping and Handling\";s:13:\"meta_keywords\";s:21:\"Shipping and Handling\";s:6:\"image1\";s:52:\"f4be00279ee2e0a53eafdaa94a151e2c_1620645581_9595.jpg\";}', '<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">Our Shipping and Handling Policy forms part of and must be read in conjunction with, website Terms and Conditions. We reserve the right to change this Shipping and Handling Policy at any time.</span></span></span></span></p>\r\n\r\n<h1 style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"color:black\">We (www.hippolook.com) know that your order arriving on time for your event is VITAL. You shall order with our free standard turnaround time, we never take an order unless we are 100% sure that we can guarantee your deadline. The total delivery time is Order Processing Time + Delivery Time. </span></span></h1>\r\n\r\n<h1 style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"color:black\">All orders are shipped through our courier partners. </span></span></h1>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">Our standard delivery time is about 12 to 24 days. </span>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free. <span style=\"color:black\">Due to Covid19 it may take longer time.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">In some cases, shipping may take longer based on your location, which will be communicated to the buyer at the time of the order. Generally, items ship as soon as possible.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">Customs taxes according to the nature of each country shall be borne by the customer and he must be aware of its details according to his country.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">When your package is scanned by our shipping provider, it automatically sends you an email with the tracking number included. Please refer to your tracking information to get an estimate on when you will receive your item(s). </span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">If you have any other questions, please contact us at <strong>support@hippolook.com</strong></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">Standard shipping shall apply to all the products.</span> </span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"color:black\">ORDER CANCEL:</span> </span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">Please accept our apologies, occasionally we have to cancel orders for some reasons:</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"color:black\">Product unavailability:</span></strong><span style=\"color:black\">&nbsp;We try to get as much choice as possible onto our website, and occasionally we have to cancel orders when the ordered product is unavailable.<br />\r\n<strong>Customer cancellation</strong>:&nbsp;If you have requested to cancel part or all of your order provided we have come to an agreement.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong>UNETHICAL ORDER &amp; CANCELLATION POLICY</strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">In case of any product purchase made through unethical means; by taking advantage of a technical glitch; or by misusing/ the offer terms/guidelines/codes - the particular order/s will be canceled whatsoever and <strong><span style=\"background-color:white\">https://</span></strong><strong>www.hippolook.com</strong> will not be liable to pay any refund to you in all such cases.</span></span></span></li>\r\n</ul>\r\n'),
(16, 'cookies', 'a:4:{s:10:\"page_title\";s:7:\"Cookies\";s:16:\"meta_description\";s:7:\"Cookies\";s:13:\"meta_keywords\";s:7:\"Cookies\";s:6:\"image1\";s:52:\"8f53295a73878494e9bc8dd6c3c7104f_1620652834_2360.jpg\";}', '<p>WHAT ARE COOKIES?</p>\r\n\r\n<p>When we talk about cookies, we are talking about small (temporary) text files that we send to your device. We may also use similar digital techniques, such as JavaScript, HTML 5, device fingerprints, etc. We collectively refer to these digital techniques as &ldquo;cookies&rdquo; in this Cookie Policy.</p>\r\n\r\n<div abeezee=\"\" regular=\"\">&nbsp;</div>\r\n\r\n<p>WHY DO WE USE COOKIES?</p>\r\n\r\n<p>Cookies can be used for many different purposes. In the first place, these cookies enable you to use the basic functionality of the website: they remember your selection and the choices you make to improve your experience on our website. They help with the cart creation and checkout process, as well as security issues and regulatory compliance. We call them &ldquo;functional cookies&rdquo;.</p>\r\n\r\n<p>Cookies can also be used to further develop and improve the functionality of our website by analyzing usage. In some cases, they improve the speed at which we can process your request and allow us to remember the site preferences you have selected. You can choose not to agree to our use of these &ldquo;analytical cookies&rdquo;.</p>\r\n\r\n<p>These cookies pass data to our data analysis tools. When you visit our website, we can determine which marketing channel you came from (eg Google AdWords, email newsletter), which pages you viewed, which items you added to your shopping cart and which products you purchased. We also receive information about how you use and interact with our websites and the time you spend there. Our website&#39;s server also collects basic information related to the request made from your browser when you visit the websites. This data may include information about the date and time of your last visit, the time of the browser request, your IP address, basic http header information (such as a referral URL and a user agent) and a previous URL provided by your browser has been requested.</p>\r\n\r\n<p>Third, &ldquo;social media and advertising cookies&rdquo; allow you to connect to social networks and share content from our website on social media. Information we obtain through advertising cookies is used to store your personal advertising profile. These cookies also help us to include you in a particular online audience in our Data Management Platform (DMP).</p>\r\n\r\n<p>The DMP collects information about how our consumers respond to our products, brand and advertisements. This information is collected from various sources that are available to us offline, online and mobile, for example when you visit our website. In addition, it is enriched with information collected by others, such as data about the local weather. Based on that information, the DMP can help our marketing teams find and define relevant segments of online audiences to best tailor marketing campaigns to them, both within and beyond Calvin Klein&#39;s digital channels. If your digital marketing profile falls within such a segment, you are likely to receive our advertisements, tailored to the interests of the segment in which we have placed you on Facebook, Google properties, online properties of so-called affiliates and other online and offline locations and materials , which is targeted advertising.</p>\r\n\r\n<p>We may also use the data for retargeting by showing you a targeted ad on a third party website that is associated with an event on our website, for example a specific purchase that has been canceled.</p>\r\n\r\n<p>In addition, Facebook, Google and other online actors can independently register your use of our advertisements. Please read the privacy policies of such third parties as we are not responsible for the personal data they process for their own purposes.</p>\r\n\r\n<p>You can choose not to agree to our use of these &ldquo;social media and advertising cookies&rdquo;.</p>\r\n\r\n<p>The actual cookies we use are listed and described here.</p>\r\n'),
(17, 'return_policy', 'a:4:{s:10:\"page_title\";s:13:\"Return Policy\";s:16:\"meta_description\";s:24:\"Return and Refund Policy\";s:13:\"meta_keywords\";s:24:\"Return and Refund Policy\";s:6:\"image1\";s:52:\"142949df56ea8ae0be8b5306971900a4_1620652662_9710.jpg\";}', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Calibri,sans-serif\"><strong>RETURN AND REFUND POLICY</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">Our Return and Refund Policy forms part of and must be read in conjunction with, website Terms and Conditions. We reserve the right to change this Return and Refund Policy at any time.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Calibri,sans-serif\"><strong><u><span style=\"color:black\">RETURN POLICY</span></u></strong></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">After confirmation of the order, you are not allowed to request a refund of the order as we had sent your order for processing. It takes at least 7 days to process the lens. If you have just ordered and want to do alteration or refund, you may email us ASAP. We will try our best to help you. If we are in the processing of your order there will be no refund.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">If you had received damaged item you must take some pictures and email us ASAP. We will investigate and replace you. If you have used the items, we are not allow to accept any return. We only do one replacement and will not entertain second return for the same item.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Calibri,sans-serif\">Note: Hippolook.com reserves the right of any changes to the return policy. Any changes will be updated on our website.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">Any sale or promotional items that are sold are non-refundable and non-<span style=\"color:black\">exchangeable. Voucher Exchanges to be used on our website within 30 days of issuance.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:black\">All refunds will be an issue as per our refund policy. Please contact us via email, we will respond within 3 (Three) business days.</span></span></p>\r\n\r\n<h1 style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#2e74b5\"><span style=\"color:black\">Moreover, if we remove or suspend you for your breach of the website terms then you will not receive a refund for our service.</span></span></span></h1>\r\n\r\n<h1 style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"color:#2e74b5\"><span style=\"color:black\">In a determination to accomplish user satisfaction, if there is an issue, you can contact us through our email </span><span style=\"color:black\">support@hippolook.com.</span></span></span></h1>\r\n'),
(18, 'customer_service', 'a:4:{s:10:\"page_title\";s:17:\"Customer Services\";s:16:\"meta_description\";s:17:\"Customer Services\";s:13:\"meta_keywords\";s:17:\"Customer Services\";s:6:\"image1\";s:52:\"e1e32e235eee1f970470a3a6658dfdd5_1620652525_8813.jpg\";}', '<h1>Coming Soon</h1>\r\n'),
(19, 'disclaimer', 'a:4:{s:10:\"page_title\";s:11:\"Disclaimers\";s:16:\"meta_description\";s:11:\"Disclaimers\";s:13:\"meta_keywords\";s:11:\"Disclaimers\";s:6:\"image1\";s:52:\"959a557f5f6beb411fd954f3f34b21c3_1620652586_6645.jpg\";}', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">This Disclaimer forms part of and must be read in conjunction with, website Terms and Conditions. We HIPPOLOOK EYEWEAR the right to change this Disclaimer at any time.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">The information contained on this website is for general information purposes only. The information is provided by <strong><span style=\"background-color:white\">http://www.hippolook.com</span></strong> (&ldquo;<strong>HIPPOLOOK EYEWEAR</strong>&rdquo; or &ldquo;<strong>we</strong>&rdquo;).</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">You understand and agree that we (a) do not guarantee the accuracy, completeness, validity, or timeliness of information listed by us or any third parties; and (b) shall not be responsible for any materials posted by us or any third party. You shall use your judgment, caution, and common sense in evaluating any prospective methods or offers and any information provided by us or any third party.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Further, we shall not be liable for direct, indirect consequential, or any other form of loss or damage that may be suffered by a user through the use of the </span></span><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">www.hippolook.com</span></span></strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\"> Website including loss of data or information or any kind of financial or physical loss or damage.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">General: </span></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">The website, its content, and service are provided on an &ldquo;as is&rdquo; and &ldquo;as available&rdquo; basis without any warranties of any kind, including that the website will operate error-free or that the website, its servers, its content, or its service are free of computer viruses or similar contamination or destructive features. Although <span style=\"background-color:white\">we<strong> </strong></span>seek to maintain safe, secure, accurate, and well-functioning services, we cannot guarantee the continuous operation of or access to our services, and there may at times be inadvertent technical or factual errors or inaccuracies.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">No warranties.</span></strong> </span></span></span></p>\r\n\r\n<p style=\"margin-left:51px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">We </span></span><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">specifically (but without limitation) disclaims </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:51px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Any implied warranties of merchantability, fitness for a particular purpose, quiet enjoyment, or non-infringement; and </span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Any warranties arising out of course-of-dealing, usage, or trade. You assume all risk for any/all damages that may result from your use of or access to the services. We<strong> </strong>shall not be responsible for the loss of, damage to, or unavailability of any information you have made available through the services, and you are solely responsible for ensuring that you have backup copies of any information you have made available through the services.</span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">No guarantee of accuracy.</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:51px; text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">We</span></span><strong> </strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">do not guarantee the accuracy of and disclaim all liability for, any errors or other inaccuracies in the information, content, recommendations, and materials made available through the services.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">No warranties regarding third parties</span></strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">. <span style=\"color:black\">we</span><strong> </strong>make no representations, warranties, or guarantees, express or implied, regarding any third-party service or advice provided by a third party.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Every effort is made to keep the website up and running smoothly. However, <strong><span style=\"background-color:white\">HIPPOLOOK EYEWEAR </span></strong>takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">If you require any more information or have any questions about our site&#39;s disclaimer, please feel free to contact us by email at support@hippolook.com. </span></span></span></p>\r\n'),
(20, 'payment_policy', 'a:4:{s:10:\"page_title\";s:14:\"Payment Policy\";s:16:\"meta_description\";s:14:\"Payment Policy\";s:13:\"meta_keywords\";s:14:\"Payment Policy\";s:6:\"image1\";s:52:\"e8c0653fea13f91bf3c48159f7c24f78_1620656726_3764.jpg\";}', '<p>At the moment we offer the following different payment options:</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li>Paypal</li>\r\n	<li>Mastercard</li>\r\n	<li>Visa</li>\r\n	<li>American express</li>\r\n	<li>Others</li>\r\n</ul>\r\n\r\n<div abeezee=\"\" regular=\"\">&nbsp;</div>\r\n\r\n<p>Payment with PayPal:</p>\r\n\r\n<p>When you select PayPal as your payment method, you will be automatically redirected to the PayPal website. If you have a PayPal account, you can log in with your user details to confirm the payment.</p>\r\n\r\n<p>If you don&#39;t have a PayPal account, you can create one and proceed with the payment.</p>\r\n\r\n<p>Refunds on returns will be made to the registered PayPal account respectively.</p>\r\n\r\n<p>For your security, your billing name and address must match that of the credit card used for payment. We reserve the right to cancel orders that do not meet these requirements.</p>\r\n\r\n<div abeezee=\"\" regular=\"\">&nbsp;</div>\r\n');
INSERT INTO `tbl_sitecontent` (`id`, `ckey`, `code`, `full_code`) VALUES
(21, 'privacy_policy', 'a:4:{s:10:\"page_title\";s:14:\"Privacy Policy\";s:16:\"meta_description\";s:14:\"privacy policy\";s:13:\"meta_keywords\";s:14:\"privacy policy\";s:6:\"image1\";s:52:\"a0a080f42e6f13b3a2df133f073095dd_1620643551_5293.jpg\";}', '<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:24.0pt\"><span style=\"color:black\">Privacy Policy</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Last updated</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">&nbsp;[July 16<sup>th</sup>, 2021]</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">Our Privacy Policy forms part of and must be read in conjunction with, website Terms and Conditions. We have the right to change this Privacy Policy at any time.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We respect the privacy of our users and every person who visits our site <strong>www.hippolook.com</strong>. Here, </span></span><strong><span style=\"font-size:14.0pt\">HIPPOLOOK EYEWEAR</span></strong><strong> </strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">refers to as (&ldquo;we&rdquo;, &ldquo;us&rdquo;, or &ldquo;our&rdquo;). We are committed to protecting your personal information and your right to privacy under this Privacy Policy. If you have any questions or concerns about our policy or our practices with regards to your personal information, please contact us at&nbsp;<strong>support@hippolook.com</strong>.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">When you visit our website&nbsp;<strong>www.hippolook.com</strong>&nbsp;(&ldquo;Site&rdquo;) and use our services, you trust us with your personal information. We take your privacy very seriously.&nbsp;In this privacy notice, we describe our privacy policy.&nbsp;We seek to explain to you in the clearest way possible what information we collect, how we use it, and what rights you have concerning it.&nbsp;We hope you take some time to read through it carefully, as it is important. If there are any terms in this privacy policy that you do not agree with, please discontinue the use of our site and our services.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">ABOUT</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\"> <strong>US</strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><em><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"><span style=\"color:black\">At hippolook.com, we offer you a meticulously designed website where we are selling glasses frames, a prescription lens with frames, sunglasses with prescriptions. Customers with prescription must fill in the detail themselves or also can upload to us. </span></span></span></em></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"><span style=\"color:black\">We are located in Singapore.</span></span></span></em></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Please read this privacy policy carefully as it will help you make informed decisions about sharing your personal information with us. &nbsp;</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">WHAT INFORMATION DO WE COLLECT?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">The personal information you disclose to us</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We collect personal information that you voluntarily provide to us when expressing an interest in obtaining information about us or our products when participating in activities on the Site or otherwise contacting us.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">The personal information that we collect depends on the context of your interactions with us and the Site, the choices you make, and the products and features you use. The personal information we collect can include the following:</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Name and Contact Data.</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">&nbsp;We collect your first and last name, email address, postal address, phone number, and other similar contact data.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Credentials.</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">&nbsp;We collect passwords, password hints, and similar security information used for authentication and account access.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">Information automatically collected</span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We automatically collect certain information when you visit, use, or navigate the Site. This information does not reveal your specific identity (like your name or contact information) but may include device and usage information, such as your IP address, browser, and device characteristics, operating system, language preferences, referring URLs, device name, country, location, information about how and when you use our Site and other technical information. &nbsp;If you access our site with your mobile device, we may automatically collect device information (such as your mobile device ID, model, and manufacturer), operating system, version information, and IP address. This information is primarily needed to maintain the security and operation of our Site, and for our internal analytics and reporting purposes.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Like many businesses, we also collect information through cookies and similar technologies. You can find out more about this in our&nbsp;<u>Cookie Policy</u>.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">Information collected from other Sources</span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We may obtain information about you from other sources, such as public databases, joint marketing partners, social media platforms (such as Facebook, Instagram, Tiktok, Twitter), as well as from other third parties. </span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">If you have chosen to subscribe to our newsletter, your first name, last name and e-mail address will be shared with our newsletter provider.&nbsp;This is to keep you updated with information and offers for marketing purposes. We send email content to our customers that may include the following: Transaction mail, Shipping notification, Weekly deal, Promotion, Activity.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">HOW DO WE USE YOUR INFORMATION?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We use your personal information for these purposes in reliance on our legitimate business interests (&ldquo;Business Purposes&rdquo;), to enter into or perform a contract with you (&ldquo;Contractual&rdquo;), with your consent (&ldquo;Consent&rdquo;), and/or for compliance with our legal obligations (&ldquo;Legal Reasons&rdquo;). We indicate the specific processing grounds we rely on next to each purpose listed below. &nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We use the information we collect or receive: &nbsp;</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">To send administrative information to you</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\"> related to your account, our business purposes, and/or for legal reasons. We may use your personal information to send you a product, and new feature information, and/or information about changes to our terms, conditions, and policies.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Deliver targeted advertising to you&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">for our Business Purposes and/or with your Consent. We may use your information to develop and display content and advertising (and work with third parties who do so) tailored to your interests and/or location and to measure its effectiveness. [For more information, see our&nbsp;<u>Cookie Policy</u>.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Request Feedback&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">for our Business Purposes and/or with your Consent. We may use your information to request feedback and to contact you about your use of our Site.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">To protect our Site&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">for Business Purposes and/or Legal Reasons. &nbsp;We may use your information as part of our efforts to keep our Site safe and secure (for example, for fraud monitoring and prevention).</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">To enable user-to-user communications&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">with your consent. We may use your information to enable user-to-user communications with each user&rsquo;s consent.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">To enforce our terms, conditions, and policies</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">&nbsp;for our business purposes and as legally required.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">To respond to legal requests and prevent harm&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">as legally required. If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">For other Business Purposes</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">. We may use your information for other Business Purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns, and evaluating and improve our Site, products, services, and marketing.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">WILL YOUR INFORMATION BE SHARED WITH ANYONE?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We only share and disclose your information in the following situations:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Compliance with Laws</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">. We may disclose your information where we are legally required to do so to comply with applicable law, governmental requests, a judicial proceeding, court order, or legal processes, such as in response to a court order or a subpoena (including in response to public authorities to meet national security or law enforcement requirements).</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Vital Interests and Legal Rights</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">. We may disclose your information where we believe it is necessary to investigate, prevent, or take action regarding potential violations of our policies, suspected fraud, situations involving potential threats to the safety of any person, and illegal activities, or as evidence in litigation in which we are involved.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Vendors, Consultants, and Other Third-Party Service Providers</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">. We may share your data with third-party vendors, service providers, contractors, or agents who perform services for us or on our behalf and require access to such information to do that work. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Business Transfers</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">. We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Third-Party Advertisers</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">. We may use third-party advertising companies to serve ads when you visit the Site. These companies may use information about your visits to our Site and other websites that are contained in web cookies and other tracking technologies to provide advertisements about goods and services of interest to you.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Affiliates.&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">We may share your information with our affiliates, in which case we will require those affiliates to honor this privacy policy. Affiliates include our parent company and any subsidiaries, joint venture partners, or other companies that we control or that are under common control with us.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Business Partners.&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">We may share your information with our business partners to offer you certain products, services, or promotions.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">With your Consent.&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">We may disclose your personal information for any other purpose with your consent.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Other Users.&nbsp;</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">When you share personal information (for example, by posting comments, contributions, or other content to the Site) or otherwise interact with public areas of the Site, such personal information may be viewed by all users and may be publicly distributed outside the Site in perpetuity.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We may use cookies and similar tracking technologies (like web beacons and pixels) to access or store information. Specific information about how we use such technologies and how you can refuse certain cookies is set out in our&nbsp;<u>Cookie Policy</u>.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">IS YOUR INFORMATION TRANSFERRED INTERNATIONALLY?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"><span style=\"color:black\">Information collected from you may be stored and processed globally in various countries in which our Company or agents or contractors maintain facilities, and by accessing our sites and using our services, you consent to any such transfer of information outside of your country. </span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\"><span style=\"color:black\">Such countries may have laws that are different, and potentially not as protective, as the laws of your own country. Whenever we share personal data originating in the European Economic Area we will rely on lawful measures to transfer that data, such as the Privacy Shield or the EU standard contractual clauses. If you reside in the EEA or other regions with laws governing data collection and use, please note that you are agreeing to the transfer of your personal data to the United States and other countries in which we operate. By providing your personal data, you consent to any transfer and processing in accordance with this Policy. We will not transfer your personal information to an overseas recipient.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">WHAT IS OUR STANCE ON THIRD-PARTY WEBSITES?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">The Site may contain advertisements from third parties that are not affiliated with us and which may link to other websites, online services, or mobile applications. We cannot guarantee the safety and privacy of the data you provide to any third parties. Any data collected by third parties is not covered by this privacy policy. We are not responsible for the content or privacy and security practices and policies of any third parties, including other websites, services, or applications that may be linked to or from the Site. You should review the policies of such third parties and contact them directly to respond to your questions.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">HOW LONG DO WE KEEP YOUR INFORMATION?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We will only keep your personal information for as long as it is necessary for the purposes set out in this privacy policy unless a longer retention period is required or permitted by law (such as tax, accounting, or other legal requirements). </span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymize it, or, if this is not possible (for example, because your personal information has been stored in backup archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">HOW DO WE KEEP YOUR INFORMATION SAFE?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We have implemented appropriate technical and organizational security measures designed to protect the security of any personal information we process. However, please also remember that we cannot guarantee that the internet itself is 100% secure. Although we will do our best to protect your personal information, the transmission of personal information to and from our Site is at your own risk. You should only access the services within a secure environment.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">DO WE COLLECT INFORMATION FROM MINORS?</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We do not knowingly solicit data from or market to children under 16 years of age. &nbsp;By using the Site, you represent that you are at least 16 or that you are the parent or guardian of such a minor and consent to such minor dependent&rsquo;s use of the Site. &nbsp;If we learn that personal information from users less than 16 years of age has been collected, we will deactivate the account and take reasonable measures to promptly delete such data from our records. &nbsp;If you become aware of any data we have collected from children under age 16, please contact us at&nbsp;<strong>support@hippolook.com</strong>.</span></span></span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">WHAT ARE YOUR PRIVACY RIGHTS?</span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em><span style=\"font-size:12.0pt\"><span style=\"color:black\">.</span></span></em><span style=\"font-size:14.0pt\"><span style=\"color:black\">Personal Information</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">You may at any time review or change the information in your account or terminate your account by:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Contacting us using the contact information provided below</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, some information may be retained in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our Terms of Use, and/or comply with legal requirements.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Cookies and similar technologies</span></span></strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">: Most Web browsers are set to accept cookies by default. If you prefer, you can usually choose to set your browser to remove cookies and to reject cookies. If you choose to remove cookies or reject cookies, this could affect certain features or services of our Site. </span></span></span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">DO WE MAKE UPDATES TO THIS POLICY?</span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">We may update this privacy policy from time to time. The updated version will be indicated by an updated &ldquo;Revised&rdquo; date and the updated version will be effective as soon as it is accessible. If we make material changes to this privacy policy, we may notify you either by prominently posting a notice of such changes or by directly sending you a notification. We encourage you to review this privacy policy frequently to be informed of how we are protecting your information.</span></span></span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:22.0pt\"><span style=\"color:black\">HOW CAN YOU CONTACT US ABOUT THIS POLICY?</span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">If you have questions or comments about this policy, email us at&nbsp;<strong>support@hippolook.com</strong>.</span></span></span></span></p>\r\n');
INSERT INTO `tbl_sitecontent` (`id`, `ckey`, `code`, `full_code`) VALUES
(22, 'terms_conditions', 'a:4:{s:10:\"page_title\";s:18:\"Terms & Conditions\";s:16:\"meta_description\";s:18:\"Terms & Conditions\";s:13:\"meta_keywords\";s:18:\"Terms & Conditions\";s:6:\"image1\";s:52:\"a4300b002bcfb71f291dac175d52df94_1620643973_9596.jpg\";}', '<h1 style=\"text-align:justify\"><span style=\"font-size:24pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">This Agreement was last revised on&nbsp;July 16<sup>th</sup>, 2021.</span></span></span></strong></span></span></h1>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078636\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">INTRODUCTION</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">www.hippolook.com </span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">(&ldquo;Website&rdquo;) owned and managed by </span></span></span><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">HIPPOLOOK EYEWEAR</span></span></strong><strong>&nbsp;</strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">(&ldquo;<u>we,</u>&rdquo; &ldquo;<u>us,</u>&rdquo; or &ldquo;<u>our</u>&rdquo;) welcomes you. &nbsp;</span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">We offer you access to our product through our &ldquo;website&rdquo; (defined below) subject to&nbsp;the subsequent&nbsp;Terms of this Agreement,&nbsp;which can&nbsp;be updated by us from time to time. We strongly recommend you kindly&nbsp;undergo&nbsp;these Terms and Conditions. By accessing and using this Website, you acknowledge&nbsp;that you have read, understood, comply, and lawfully bound by these Terms and Conditions and our Privacy Policy, which are hereby incorporated by reference (collectively, this &ldquo;Agreement&rdquo;).&nbsp;In case&nbsp;you are not&nbsp;accepting any&nbsp;of these&nbsp;Terms, then please&nbsp;don&#39;t&nbsp;use&nbsp;the web site&nbsp;.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078637\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">DEFINITIONS</span></span></span></strong></a></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">&ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Agreement</span></strong>&rdquo; refers to this Terms and Conditions and the Privacy Policy and other documents provided to you by the Website;&nbsp;</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">&ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Product</span></strong>&rdquo; or &ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Item</span></strong>&rdquo; refers to the product or goods available for sale on the website.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">&ldquo;Service&rdquo; or &ldquo;Services&rdquo; </span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">refers to the services available on the website (e.g. placing an order or writing a customer review)</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">&ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">User</span></strong>&rdquo;, &ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">You</span></strong>&rdquo; and &ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">your</span></strong>&rdquo; refers to the person who is accessing or taking any service from us. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">&ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Customer</span></strong>&rdquo; refers to the user who accesses the website and makes the payment for purchasing products available on the Website;</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">&ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">We</span></strong>&rdquo;, &ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">us</span></strong>&rdquo;, &ldquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">our</span></strong>&rdquo; are references to<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"> HIPPOLOOK EYEWEAR</span></strong>;</span></span> </span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">&rdquo;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Website</span></strong>&rdquo; shall mean and include&nbsp;</span></span><span style=\"font-size:14.0pt\"><span style=\"color:#555555\">&quot;</span></span><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">https://www.hippolook.com</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">, and any successor Website or any of our affiliates;</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078638\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">&quot;<strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Customer</span></strong> <strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Account</span></strong>&rdquo; shall mean an electronic account opened for</span></span></span></a><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"> the customer for purchasing products offered on the website;</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc50590667\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">INTERPRETATION</span></span></span></strong></a></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">All references to the singular include the plural and vice versa and the word &quot;includes&quot; should be construed as &quot;without limitation&quot;.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">Words importing any gender shall include all the other genders.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">Reference to any statute, ordinance, or other law includes all regulations and other instruments and all consolidations, amendments, re-enactments, or replacements for the time being in force.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">All headings, bold typing, and italics (if any) have been inserted for convenience of reference only and do not define limit, or affect the meaning or interpretation of the terms of this Agreement.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078639\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">INTRODUCTION AND SCOPE</span></span></span></strong></a></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Scope</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">.&nbsp;These Terms govern your use of the Website and the Services. Except as otherwise specified, these Terms do not apply to Third-Party Products or Services, which are governed by their terms of service.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify; text-indent:2.25pt\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Eligibility</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">: Certain Service of the Website is not available to users under the age of 16 or any users suspended or removed from the system by us for any reason. </span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify; text-indent:2.25pt\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Electronic Communication:</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">&nbsp;When you use this Website or send e-mails and other electronic communications from your desktop or mobile device to us, you are communicating with us electronically. By sending, you agree to receive a reply communications from us electronically in the same format and you can keep copies of these communications for your records.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078640\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">SERVICES</span></span></span></strong></a></span></span></p>\r\n\r\n<h1 style=\"text-align:justify\"><span style=\"font-size:24pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><a name=\"_Toc67816931\"><em><span style=\"font-size:14.0pt\"><span style=\"color:black\">At hippolook.com, we offer you a meticulously designed website where we are selling glasses frames, a prescription lens with frames, sunglasses with prescriptions. Customers with prescription must fill in the detail themselves or also can upload to us. </span></span></em></a></strong></span></span></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc67816933\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">MODIFICATIONS TO THE SERVICE</span></span></span></strong></a><strong> </strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We reserve the authority , at our discretion, to change, modify, add to, or remove portions of the Terms (collectively, &ldquo;Changes&rdquo;), at any time. We may notify you of changes by posting a Revised Version of the Terms incorporating the changes to its Website. Your continued use of the website following the posting of changes will mean that you simply accept and comply with the Changes.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc50590674\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">ACCOUNT</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">For accessing the web site and using certain Resources, you&#39;ll be required to supply specific information and to make a user ID and password to determine an account.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">You accept that the content you provide concerning establishing an account are correct which you&#39;ll keep your details up-to-date. you&#39;re liable for the safety of all of your user names, passwords, and registration information (such as unique account identifiers or historical billing information), and you&#39;re solely liable for any use (authorized or not) of your accounts. You comply with notify us immediately about any unauthorized activity regarding any of your accounts or other breaches of security. We may at our discretion suspend or terminate any of your user names and passwords at any time.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc50590676\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">ORDERING</span></span></span></strong></a></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">All the purchases from this website shall be governed by our terms and conditions.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">If you make an Order for buying any product from our website. At the time of order, while providing your details you must be careful and warrant that the information provided is true and accurate. </span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">You will only be charged as soon as you select product, quantity, shipping information, and enter your payment information.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Payment mode shall be:&nbsp;&nbsp;</span></span></span></span></span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">Online: Credit Cards and Debit cards;</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">PayPal</span></span></span></span></span></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">Any order to purchase a product that you place with us is subject to acceptance by us. </span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">If there is an error in the order confirmation, please contact us immediately by email at Info@hippolook.com.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">Customer is responsible for the order once they place the order.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc18621736\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">We may refuse or be unable to process your order if:</span></span></span></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Your card or PayPal account does not give authorization for the payment of the purchase price.</span></span></span></span></span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">You do not meet the eligibility to order criteria set out above.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">The refund shall be applicable as per our Refund Policy.</span></span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">We are happy to support you if there is any issue you can contact our back-office team for any inquiry or problem.</span></span></span> <a name=\"_Toc43885591\"></a></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:24px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We take customer feedback very seriously and use it to constantly improve our products.</span></span></span></strong><strong> </strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc29855587\"><strong><span style=\"font-size:20.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">GENERAL CONDITIONS</span></span></span></strong></a></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">We don&#39;t guarantee the accuracy, completeness, validity, or timeliness of the data listed by us.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">We make material changes to our terms and conditions from time to time, we may notify you either by prominently posting a notice of such changes or via email communication.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">The website is licensed to you on a limited, non-exclusive, non-transferable, non-sublicensable basis, solely to be utilized in reference to the Service for your private, personal, non-commercial use, subject to all or any the terms and conditions of this Agreement as they apply to the Service. Any breach of this Agreement shall lead to the immediate revocation of the license granted in this paragraph without warning to you.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">You might not reproduce, distribute, display, sell, lease, transmit, create derivative works from, translate, modify, reverse- engineer, disassemble, decompile or otherwise exploit this Site or any portion of it unless expressly permitted by hippolook.com in writing.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">You might not make any commercial use of any of the data provided on the location or make any use of the location for the advantage of another business unless explicitly permitted by hippolook.com beforehand .</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:black\">We reserve the proper for any printing errors on this site as well because the final sales of products. We don&#39;t guarantee that the pictures reflect the precise appearance of the products as a particular color difference may occur counting on the monitor, photo quality, and resolution. We always try our best to show the products as accurately as possible.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc50590679\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">GEOGRAPHIC RESTRICTION</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We reserve the right, to limit the usage or supply of any service to any person, geographic region, or jurisdiction. We may use this right as per necessity. We reserve the right to suspend any Service at any time. Any offer to provide any Service made on this Website is invalid where banned.</span></span></span> </span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc50590680\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">USER RESPONS</span></span></span></strong></a><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">IBILITIES</span></span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You shall use the Service and Website for a lawful purpose and comply with all the applicable laws while using the Website;</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You shall not use or access the Website for collecting any market research for some competing business;</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You shall not misrepresent or impersonate any person or entity for any false or illegal purpose;</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You will not use any device, scraper, or any automated thing to access the Website for any means without taking permission.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You will inform us about anything that is inappropriate or&nbsp; you can inform us if you find something illegal;</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You will not interfere with or try to interrupt the proper operation of the Website through the use of any virus, device, transmission mechanism, software, or routine, or access or try to gain access to any data, files, or passwords connected to the Website through hacking, password or data mining, or any other means;</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You shall not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead hippolook.com or third parties as to the origin of any Submissions or Content.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You warrant that your Submissions, in whole or in part, are clear and free of any IP right infringement, disputes, or third-party claims.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">You will let us know about the unsuitable content of which you become aware. &nbsp;If you discover something that infringes any law, please let us know, and we&rsquo;ll review it.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We reserve the right, in our sole and absolute discretion, to deny you access to the Website or any service, or any portion of the Website or service, without notice, and to remove any content.<a name=\"_Toc12078648\"></a></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:22.0pt\"><span style=\"color:#222222\">EXCLUSION OF LIABILITY</span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We take no responsibility for any indirect damage which will result from the merchandise . www.hippolook.com isn&#39;t liable for late deliveries for special occasions, or other events. We encourage customers to put their orders in time to make sure there&#39;s enough time to receive their items.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We accept no responsibility for delays/errors because of circumstances outside of our ruling (Force Majeure). These circumstances may be, for instance , labor conflict, fire, war, government decisions, reduced or non-delivery from the supplier.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">You understand and agree that we (a) don&#39;t guarantee the accuracy, completeness, validity, or timeliness of data listed by us or any third parties; and (b) shall not be liable for any materials posted by us or any third party. You shall use your judgment, caution, and customary sense in evaluating any prospective methods or offers and any information provided by us or any third party.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Further, we shall not be responsible for direct, indirect consequential, or the other kind of loss or damage which will be suffered by a user through the utilization of the www.hippolook.com Website including loss of information or information or any reasonably financial or physical loss or damage.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">In no event shall HIPPOLOOK EYEWEAR, nor its Owner, directors, employees, partners, agents, suppliers, or affiliates, be answerable for any indirect, incidental, special, eventful, or exemplary costs, including without limitation, loss of proceeds, figures, usage, goodwill, or other intangible losses, consequential from (i) your use or access of or failure to access or use the Service; (ii) any conduct or content of any third party on the Service; and (iii) unlawful access, use or alteration of your transmissions or content, whether or not supported guarantee, agreement, domestic wrong (including carelessness) or the other lawful concept, whether or not we&#39;ve been aware of the possibility of such damage.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">TYPOGRAPHICAL ERRORS</span></span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">While hippolook.com strives to provide accurate product and pricing information, pricing or typographical errors may occur. </span></span></span><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">www.hippolook.com</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\"> cannot confirm the price of an item until after you order. If an item is listed at an incorrect price or with incorrect information due to an error in pricing or product information, hippolook.com shall have the right, at our sole discretion, to refuse or cancel any orders placed for that item. If an item is mispriced, </span></span></span><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">hippolook.com</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\"> may, at our discretion, either contact you with instructions or cancel your order and notify you of such cancellation.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc50590682\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">NO RESPONSIBILITY</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We are not responsible to you for: </span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">any losses you suffer because the information you put into our website is inaccurate or incomplete; or</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">any losses you suffer because you cannot use our website at any time; or</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">any errors in or omissions from our website; or</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">any unauthorized access or loss of personal information that is beyond our control.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc50590683\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">THIRD-PARTY LINKS</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">The Website may comprise links to external or third-party Websites (&ldquo;<u>External Sites</u>&rdquo;). &nbsp;These links are provided exclusively as ease to you and not as an authorization by us of the content on such External Sites. &nbsp;The content of such External Sites is created and used by others. &nbsp;You can communicate with the site administrator for those External Sites. &nbsp;We are not accountable for the content provided in the link of any External Sites and do not provide any representations about the content or correctness of the information on such External Sites. &nbsp;You should take safety measures when you are downloading files from all these Websites to safeguards your computer from viruses and other critical programs. &nbsp;If you agree to access linked External Sites, you do so at your own risk.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><a name=\"_Toc12078653\"><strong><span style=\"font-size:22.0pt\"><span style=\"color:#222222\">PERSONAL INFORMATION AND PRIVACY POLICY</span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">By accessing or using this Website, you approve us to use, store, or otherwise process your personal information as per our Privacy Policy.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078654\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">ERRORS, INACCURACIES, AND OMISSIONS</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Every effort has been taken to ensure that the information offered on this Website is accurate and error-free. We apologize for any errors or omissions that may have occurred. We cannot give you any warranty that usage of the Website will be error-free or fit for purpose, timely, that defects will be amended, or that the site or the server that makes it available are free of viruses or bugs or signifies the full functionality, accuracy, reliability of the Website and we do not make any warranty whatsoever, whether express or implied, relating to fitness for purpose, or accuracy.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078655\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">The website and the service are provided on an &ldquo;as is&rdquo; and &ldquo;as available&rdquo; basis without any warranties of any kind, including that the website will operate error-free or that the website, its servers, or its content or service are free of computer viruses or similar contamination or destructive features.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">We disclaim all licenses or warranties, including, but not limited to, licenses or warranties of title, merchantability, non-violation of third parties rights, and fitness for a particular purpose and any warranties arising from a matter of dealing, course of performance, or usage of trade. In relation with any warranty, contract, or common law tort claims: (i) we shall not be liable for any unintended, incidental, or substantial damages, lost profits, or damages resulting from lost data or business stoppage resulting from the use or inability to access and use the website or the content, even if we have been recommended of the possibility of such damages.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"color:black\">The website may comprise technical incorrectness or typographical errors or omissions. Unless required by applicable laws, we are not accountable for any such typographical, technical, or pricing errors recorded on the website. &nbsp;The website may contain information on certain services, not all of which are available in every location. &nbsp;A reference to a service on the websites does not suggest that such service is or will be accessible in your location. &nbsp;We reserve the right to do changes, corrections, and/or improvements to the website at any time without notice.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078656\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">COPYRIGHT AND TRADEMARK</span></span></span></strong></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">The Website contains material, such as software, text, graphics, images, designs, sound recordings, audiovisual works, and other material provided by or on behalf of us (collectively referred to as the &ldquo;Content&rdquo;). &nbsp;The Content may be possessed by us or third parties. &nbsp;&nbsp;Unauthorized use of the Content may infringe copyright, trademark, and other laws. &nbsp;You have no rights in or to the Content, and you will not take the Content except as allowed under this Agreement. &nbsp;No other use is allowed without prior written consent from us. &nbsp;You must recollect all copyright and other proprietary notices contained in the original Content on any copy you make of the Content. &nbsp;You may not transfer, provide license or sub-license, sell, or modify the Content or reproduce, display, publicly perform, make a derivative version of, distribute, or otherwise use the Content in any way for any public or commercial purpose. &nbsp;The use or posting of the Content on any other Website or in a networked computer environment for any purpose is expressly prohibited.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">If you infringe any part of this Agreement, your permission to access and/or use the Content and the Website automatically terminates and you must immediately destroy any copies you have made of the Content.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Our trademarks, service marks, and logos used and displayed on the Website are registered and unregistered trademarks or service marks of us. &nbsp;Other product and service names located on the Website may be trademarks or service marks owned by others (the &ldquo;Third-Party Trademarks,&rdquo; and, collectively with us, the &ldquo;Trademarks&rdquo;). &nbsp;Nothing on the Website should be construed as granting, by implication, estoppel, or otherwise, any license or right to use the Trademarks, without our prior written permission specific for each such use. &nbsp; &nbsp;None of the Content may be retransmitted without our express, written consent for every instance.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078657\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">INDEMNIFICATIO</span></span></span></strong></a><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">N</span></span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">You agree to defend, indemnify, and hold us and our officers, directors, employees, successors, licensees, and assigns harmless from and against any claims, actions, or demands, including, without limitation, reasonable legal and accounting fees, arising or resulting from your breach of this Agreement or your misuse of the Content or the Website. &nbsp;We shall provide notice to you of any such claim, suit, or proceeding and shall assist you, at your expense, in defending any such claim, suit, or proceeding. &nbsp;We reserve the right, at your expense, to assume the exclusive defense and control of any matter that is subject to indemnification under this section. &nbsp;In such case, you agree to cooperate with any reasonable requests assisting our defense of such matter.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><a name=\"_Toc12078658\"><strong><span style=\"font-size:22.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">MISCELLANEOUS</span></span></span></strong></a></span></span></p>\r\n\r\n<h3 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f4e79\"><a name=\"_Toc18570254\"><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Calibri Light&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">SEVERABILITY</span></span></span></strong></a></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">If any provision of these Terms is found to be unenforceable or invalid, that provision will be limited or eliminated to the minimum extent necessary so that the Terms will otherwise remain in full force and effect and enforceable.</span></span></span></span></span></p>\r\n\r\n<h3 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f4e79\"><a name=\"_Toc12078660\"><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Calibri Light&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">TERMINATION</span></span></span></strong></a></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Term</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">.&nbsp;The Services will be provided to you can be canceled or terminated by us. We may terminate these Services at any time, with or without cause, upon written notice. We will have no liability to you or any third party because of such termination. Termination of these Terms will terminate all of your Services subscriptions.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Effect of Termination</span></span></span></strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">.&nbsp;Upon termination of these Terms for any reason, or cancellation or expiration of your Services:&nbsp;(a) We will cease providing the Services;&nbsp;(b)&nbsp;you will not be entitled to any refunds or usage fees, or any other fees, pro-rata or otherwise;&nbsp;(c)&nbsp;any fees you owe to us will immediately become due and payable in full, and (d)&nbsp;we may delete your archived data within 30 days. All sections of the Terms that expressly provide for survival, or by their nature should survive, will survive termination of the Terms, including, without limitation, indemnification, warranty disclaimers, and limitations of liability.</span></span></span></span></span></p>\r\n\r\n<h3 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f4e79\"><a name=\"_Toc12078661\"><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Calibri Light&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ENTIRE AGREEMENT</span></span></span></strong></a></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><a name=\"_Toc12078662\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">This Agreement constitutes the entire agreement between the parties hereto concerning the subject matter contained in this Agreement.</span></span></span></a></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">GOVERNING LAW AND JUDICIAL RECOURSE</span></span></span></strong> </span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">The terms herein will be governed by and construed under the laws of Singapore without giving effect to any principles of conflicts of law. The Courts of Singapore shall have exclusive jurisdiction over any dispute arising from the use of the Website.</span></span></span></span></span></span></p>\r\n\r\n<h3 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f4e79\"><a name=\"_Toc18570257\"><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Calibri Light&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">FORCE MAJEURE</span></span></span></strong></a></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We will have no liability to you, your users, or any third party for any failure us to perform its obligations under these Terms if such non-performance arises as a result of the occurrence of an event beyond the reasonable control of us, including, without limitation, an act of war or terrorism, natural disaster, failure of electricity supply, riot, civil disorder, or civil commotion or other force majeure event.</span></span></span></span></span></p>\r\n\r\n<h3><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f4e79\"><a name=\"_Toc12078665\"><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Calibri Light&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ARBITRATION</span></span></span></strong></a></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">For any claim arising between you and www.hippolook.com (excluding claims for injunctive or other equitable relief), the party requesting relief may elect to resolve the dispute cost-effectively through binding non-appearance-based arbitration. A party electing arbitration must initiate such arbitration through an established alternative dispute resolution (&quot;ADR&quot;) provider mutually agreed upon by the parties. The ADR provider and the parties must comply with the following rules: (a) the arbitration will be conducted by telephone, online, and/or be solely based on written submissions, the specific manner will be chosen by the party initiating the arbitration; (b) the arbitration will not involve any personal appearance by the parties or witnesses unless otherwise mutually agreed by the parties, and (c) if an arbitrator renders an award the party receiving the award may enter any judgment on the award in any court of competent jurisdiction.</span></span></span></span></span></span></p>\r\n\r\n<h3 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f4e79\"><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Calibri Light&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ASSIGNMENT</span></span></span></strong></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">We shall have the right to assign/transfer this agreement to any third party including our holding, subsidiaries, affiliates, associates, and group companies, without any consent of the User.</span></span></span></span></span></p>\r\n\r\n<h3 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f4e79\"><a name=\"_Toc12078666\"><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Calibri Light&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">CONTACT INFORMATION</span></span></span></strong></a></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">If you have any questions about these Terms, please contact us at&nbsp;</span></span></span><strong><span style=\"font-size:14.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">support@hippolook.com.</span></span></span></strong></span></span></p>\r\n');
INSERT INTO `tbl_sitecontent` (`id`, `ckey`, `code`, `full_code`) VALUES
(34, 'design_guide', 'a:19:{s:7:\"heading\";s:15:\"Our Frame Sizes\";s:8:\"heading1\";s:11:\"Frame Width\";s:7:\"detail1\";s:73:\"Frame Width is the measurement horizontally across the back of the frame.\";s:8:\"heading2\";s:10:\"Lens Width\";s:7:\"detail2\";s:57:\"Lens Width is the width of each lens at its widest point.\";s:8:\"heading3\";s:11:\"Lens Height\";s:7:\"detail3\";s:158:\"Lens Height is the vertical distance of the lens at its tallest point. If you want to order progressive, the lens height of the frame should be at least 33mm.\";s:8:\"heading4\";s:12:\"Bridge Width\";s:7:\"detail4\";s:79:\"Bridge Width is the shortest distance (in millimeters) between your two lenses.\";s:8:\"heading5\";s:13:\"Temple Length\";s:7:\"detail5\";s:102:\"Temple Length is the length of the temple to its temple tip, including the bend that sits on your ear.\";s:8:\"heading6\";s:0:\"\";s:7:\"detail6\";s:0:\"\";s:11:\"footer_text\";s:143:\"Due to the different measurements methods, the measurements printed on the inside of the temple arm may vary from those showing on our website.\";s:6:\"image1\";s:52:\"25ddc0f8c9d3e22e03d3076f98d83cb2_1627299860_4319.jpg\";s:6:\"image2\";s:52:\"82f2b308c3b01637c607ce05f52a2fed_1627299860_4365.jpg\";s:6:\"image3\";s:52:\"170c944978496731ba71f34c25826a34_1627299860_3855.jpg\";s:6:\"image4\";s:52:\"3dd48ab31d016ffcbf3314df2b3cb9ce_1627299860_2382.jpg\";s:6:\"image5\";s:52:\"faa9afea49ef2ff029a833cccc778fd0_1627299860_4280.jpg\";}', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Size Frame</td>\r\n			<td>Width(mm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Narrow</td>\r\n			<td>&lt;128mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Medium</td>\r\n			<td>129mm - 138mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wide</td>\r\n			<td>&ge;139mm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><small>We suggest you measure your frame dimensions to make sure your new glasses correctly fit your face.</small></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_texts`
--

CREATE TABLE `tbl_site_texts` (
  `txt_id` int(11) NOT NULL,
  `txt_type` varchar(50) DEFAULT NULL,
  `txt_label` varchar(100) DEFAULT NULL,
  `txt_key` text DEFAULT NULL,
  `txt_value` text DEFAULT NULL,
  `txt_subject` text DEFAULT NULL,
  `txt_msg` varchar(160) DEFAULT NULL,
  `txt_is_sms` tinyint(1) DEFAULT NULL,
  `txt_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_site_texts`
--

INSERT INTO `tbl_site_texts` (`txt_id`, `txt_type`, `txt_label`, `txt_key`, `txt_value`, `txt_subject`, `txt_msg`, `txt_is_sms`, `txt_status`) VALUES
(1, 'email', 'Signup Email', 'signup', '<h3>Dear {$name}</h3>\r\n\r\n<p>Thank you for your registration.</p>\r\n\r\n<p>Please click on the link below to verify your email address.</p>\r\n', 'Thank you for registering', NULL, 0, 1),
(2, 'email', 'Forgot Password Email', 'forgot_password', '<h3>Dear {$name}<!--?= $name ?--></h3>\r\n\r\n<p>Please click on the link below to reset your password.</p>\r\n', 'Reset your Password', NULL, 0, 1),
(3, 'email', 'Change Email', 'change_email', '<h3>Dear $name</h3>\r\n\r\n<p>You have changed your email.</p>\r\n\r\n<p>Please click on the link below to verify your email address.</p>\r\n', 'Verify Your Email', NULL, 0, 1),
(4, 'email', 'Verify Email', 'verify_email', '<h3>Dear $name</h3>\r\n\r\n<p>Please click on the link below to verify your email address.</p>\r\n', 'Verify Your Email', NULL, 0, 1),
(5, 'alert', 'Profile Complete Alert', 'profile_completion', 'Thanks for registering with Hippolook. Please fill in the profile information.', NULL, NULL, 0, 1),
(6, 'alert', 'Registration Alert', 'registration', 'You are register successfully. And we’ve sent a verify email to your email address. If you don’t see the email, check your spam folder', NULL, NULL, 0, 1),
(7, 'alert', 'Sent Verification Email Alert', 'verify_email', 'Verification Email has been sent.', NULL, NULL, 0, 1),
(8, 'alert', 'Email Verfication Alert', 'email_verification', 'Thanks for registering with Hippolook. Please verify your email.', NULL, NULL, 0, 1),
(9, 'email', 'Welcome Member Email', 'welcome', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:707px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">\r\n			<div align=\"center\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:707px\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"height:15pt\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<p><span style=\"background-color:transparent; color:#373e4a; font-size:21px\">Hi {$name},</span></p>\r\n\r\n						<p>&nbsp;<br />\r\n						Thanks for signing up. We&rsquo;re so glad you&rsquo;re here!&nbsp;<br />\r\n						<br />\r\n						Until next time,&nbsp;<br />\r\n						The Hippolook&nbsp;Team</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'Welcome Member', NULL, 0, 1),
(10, 'email', 'New Order', 'order', '<p><strong>Do you have a question?</strong><br />\r\nTake a look at the frequently asked questions on our customer service page. You will find all sort for questions, about order, payment, shipping and order cancelling. You can contact our customer service by calling, emailling or Live chats. We are happy to help you.</p>\r\n\r\n<hr />\r\n<p><strong>Not satisfied with your purchase?</strong><br />\r\nJust contact us within: 14 days of delivery<br />\r\nShip items back to us within: 15 days of delivery<br />\r\nWe have a 15-day return policy, which means you have 15 days after receiving your item to request a return.<br />\r\n<br />\r\nTo be eligible for a return, your item must be in the same condition that you received it, unworn or unused, with tags, and in its original packaging. You&rsquo;ll also need the receipt or proof of purchase.</p>\r\n', 'Order Confirmation', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sizes`
--

CREATE TABLE `tbl_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sizes`
--

INSERT INTO `tbl_sizes` (`id`, `title`) VALUES
(1, 'Narrow'),
(2, 'Medium'),
(3, 'Wide'),
(4, 'Custom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` char(2) DEFAULT '',
  `name` varchar(128) DEFAULT '',
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `code`, `name`, `status`) VALUES
(1, 'AL', 'Alabama', 0),
(2, 'AK', 'Alaska', 0),
(3, 'AS', 'American Samoa', 0),
(4, 'AZ', 'Arizona', 0),
(5, 'AR', 'Arkansas', 0),
(6, 'CA', 'California', 1),
(7, 'CO', 'Colorado', 0),
(8, 'CT', 'Connecticut', 0),
(9, 'DE', 'Delaware', 0),
(10, 'DC', 'District of Columbia', 0),
(11, 'FM', 'Federated States of Micronesia', 0),
(12, 'FL', 'Florida', 0),
(13, 'GA', 'Georgia', 1),
(14, 'GU', 'Guam', 0),
(15, 'HI', 'Hawaii', 0),
(16, 'ID', 'Idaho', 0),
(17, 'IL', 'Illinois', 0),
(18, 'IN', 'Indiana', 0),
(19, 'IA', 'Iowa', 0),
(20, 'KS', 'Kansas', 0),
(21, 'KY', 'Kentucky', 0),
(22, 'LA', 'Louisiana', 0),
(23, 'ME', 'Maine', 0),
(24, 'MH', 'Marshall Islands', 0),
(25, 'MD', 'Maryland', 0),
(26, 'MA', 'Massachusetts', 0),
(27, 'MI', 'Michigan', 0),
(28, 'MN', 'Minnesota', 0),
(29, 'MS', 'Mississippi', 0),
(30, 'MO', 'Missouri', 0),
(31, 'MT', 'Montana', 0),
(32, 'NE', 'Nebraska', 0),
(33, 'NV', 'Nevada', 0),
(34, 'NH', 'New Hampshire', 0),
(35, 'NJ', 'New Jersey', 0),
(36, 'NM', 'New Mexico', 0),
(37, 'NY', 'New York', 1),
(38, 'NC', 'North Carolina', 0),
(39, 'ND', 'North Dakota', 0),
(40, 'MP', 'Northern Mariana Islands', 0),
(41, 'OH', 'Ohio', 0),
(42, 'OK', 'Oklahoma', 0),
(43, 'OR', 'Oregon', 0),
(44, 'PW', 'Palau', 0),
(45, 'PA', 'Pennsylvania', 0),
(46, 'PR', 'Puerto Rico', 0),
(47, 'RI', 'Rhode Island', 0),
(48, 'SC', 'South Carolina', 0),
(49, 'SD', 'South Dakota', 0),
(50, 'TN', 'Tennessee', 0),
(51, 'TX', 'Texas', 0),
(52, 'UT', 'Utah', 0),
(53, 'VT', 'Vermont', 0),
(54, 'VI', 'Virgin Islands', 0),
(55, 'VA', 'Virginia', 0),
(56, 'WA', 'Washington', 0),
(57, 'WV', 'West Virginia', 0),
(58, 'WI', 'Wisconsin', 0),
(59, 'WY', 'Wyoming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `id` int(11) NOT NULL,
  `type` enum('owner','sitter') DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_testimonials`
--

INSERT INTO `tbl_testimonials` (`id`, `type`, `name`, `text`, `about`, `image`, `rating`) VALUES
(1, 'owner', 'Sujutha Maturo', 'I have been a client of Puppy Friends Social Club for more than 2 year now and Auntie Kyss has always insured my Dawson has had the best of care with or without her service is impeccable, and I am proud that Dawson was one the first official Puppy Friends Social Club Kids.', '', 'image_1580912680_8554.jpg', 5),
(2, 'owner', 'Lori R', 'My sweet fur baby, Ziggy, had the wonderful opportunity of staying with Kyss and her family for 5 days.  He came home exhausted!  Kyss sent me photos and videos of Ziggy playing and having fun with his new friends - he was having a blast!', '', 'image_1580915021_6898.jpg', 5),
(3, 'sitter', 'Kate C', 'PFSC platform is easy to use, and I am able to grow my business.', '', 'image_1580915187_8519.jpg', NULL),
(4, 'sitter', 'Sara M', 'Working for PFSC is a lot of fun and very appealing because you get to set your own rates and make your own schedule. It was very rewarding and I had good relationships with all of my clients as well as the veterinarian staff who is on call for when you have a pet that gets sick or injured.', '', 'image_1580915229_9678.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `charge_id` varchar(255) DEFAULT NULL,
  `trx_detail` longtext DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `mem_id`, `order_id`, `amount`, `note`, `charge_id`, `trx_detail`, `status`, `date`) VALUES
(1, 1, 1, 57.95, 'Payment against order#000001', 'ch_1IzjFpJXIsF9AzPJSr3B4OaG', NULL, 1, '2021-06-07 10:16:43'),
(2, 1, 2, 17.95, 'Payment against order#000002', 'ch_1J0lqAJXIsF9AzPJa2B44rUr', NULL, 1, '2021-06-10 07:14:31'),
(3, 6, 3, 143.9, 'Payment against order#000003', 'ch_1J1U9xJXIsF9AzPJX8PoeMhy', NULL, 1, '2021-06-12 06:33:50'),
(4, 6, 4, 51, 'Payment against order#000004', 'ch_1J37tQJXIsF9AzPJHbYSJOP8', NULL, 1, '2021-06-16 19:11:34'),
(5, 6, 5, 61, 'Payment against order#000005', 'ch_1J65TEJXIsF9AzPJ4o6TDTHf', NULL, 1, '2021-06-24 23:12:46'),
(6, 6, 6, 211, 'Payment against order#000006', 'ch_1JCC1hJXIsF9AzPJKVm23vPS', NULL, 1, '2021-07-11 19:25:35'),
(7, 1, 7, 73.85, 'Payment against order#000007', 'ch_1JCPnnJXIsF9AzPJhyHBTp0G', NULL, 1, '2021-07-12 10:08:09'),
(8, 1, 8, 47.95, 'Payment against order#000008', 'ch_1JCQGNJXIsF9AzPJgnsOcoHW', NULL, 1, '2021-07-12 10:37:41'),
(9, 1, 9, 37.95, 'Payment against order#000009', 'ch_1JCR0eJXIsF9AzPJfrjiNGaE', NULL, 1, '2021-07-12 11:25:30'),
(10, 6, 10, 74.95, 'Payment against order#000010', 'ch_1JCtueJXIsF9AzPJuCC4UwQZ', NULL, 1, '2021-07-13 18:17:13'),
(11, 1, 16, 75, 'Payment against order#000016', 'ch_1JD7BlJXIsF9AzPJu5h6PAxy', NULL, 1, '2021-07-14 08:27:47'),
(12, 1, 1, 127, 'Payment against order#000001', 'ch_1JHq7ZJXIsF9AzPJYDNUvm2t', NULL, 1, '2021-07-27 09:14:58'),
(13, 1, 2, 178.8, 'Payment against order#000002', 'ch_1JI9g2JXIsF9AzPJfa94OVLb', NULL, 1, '2021-07-28 06:07:51'),
(14, 6, 3, 1, 'Payment against order#000003', 'ch_1JIRnPLIfntuPiXgeE1Ulir7', NULL, 1, '2021-07-29 01:28:41'),
(15, 6, 20, 6, 'Payment against order#000020', 'ch_1JIppELIfntuPiXgNI5Bx9Jn', NULL, 1, '2021-07-30 03:08:10'),
(16, 11, 22, 0, 'Payment against order#000022', '1RH48383W1167691S', NULL, 1, '2021-07-30 23:33:47'),
(17, 12, 23, 0, 'Payment against order#000023', '4LA70616NS1317409', NULL, 1, '2021-07-31 11:43:44'),
(18, 14, 28, 0, 'Payment against order#000028', '69T91749MA856661K', NULL, 1, '2021-08-03 10:34:10'),
(19, 6, 31, 0, 'Payment against order#000031', '2XF93290JA6625001', NULL, 1, '2021-08-03 10:55:32'),
(20, 6, 33, 6.5, 'Payment against order#000033', 'ch_3JKceyLIfntuPiXg1TzZ0j9J', NULL, 1, '2021-08-04 01:28:58'),
(21, 15, 34, 10, 'Payment against order#000034', 'ch_3Qx6WHJXIsF9AzPJ1EJxcOVL', NULL, 1, '2025-02-27 07:48:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_categories`
--
ALTER TABLE `tbl_blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_educational_videos`
--
ALTER TABLE `tbl_educational_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_id` (`ref_id`),
  ADD KEY `ref_type` (`ref_type`),
  ADD KEY `main` (`main`);

--
-- Indexes for table `tbl_glasses`
--
ALTER TABLE `tbl_glasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_materials`
--
ALTER TABLE `tbl_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `from_id` (`from_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `tbl_payment_methods`
--
ALTER TABLE `tbl_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_preferences`
--
ALTER TABLE `tbl_preferences`
  ADD PRIMARY KEY (`pref_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocodes`
--
ALTER TABLE `tbl_promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ref_signups`
--
ALTER TABLE `tbl_ref_signups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shapes`
--
ALTER TABLE `tbl_shapes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siteadmin`
--
ALTER TABLE `tbl_siteadmin`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `tbl_sitecontent`
--
ALTER TABLE `tbl_sitecontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_texts`
--
ALTER TABLE `tbl_site_texts`
  ADD PRIMARY KEY (`txt_id`);

--
-- Indexes for table `tbl_sizes`
--
ALTER TABLE `tbl_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blog_categories`
--
ALTER TABLE `tbl_blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `tbl_educational_videos`
--
ALTER TABLE `tbl_educational_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_glasses`
--
ALTER TABLE `tbl_glasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_materials`
--
ALTER TABLE `tbl_materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_payment_methods`
--
ALTER TABLE `tbl_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_preferences`
--
ALTER TABLE `tbl_preferences`
  MODIFY `pref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_promocodes`
--
ALTER TABLE `tbl_promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_ref_signups`
--
ALTER TABLE `tbl_ref_signups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_shapes`
--
ALTER TABLE `tbl_shapes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_siteadmin`
--
ALTER TABLE `tbl_siteadmin`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sitecontent`
--
ALTER TABLE `tbl_sitecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_site_texts`
--
ALTER TABLE `tbl_site_texts`
  MODIFY `txt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sizes`
--
ALTER TABLE `tbl_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
