-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2025 at 12:24 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devtibro_food-park`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_link` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `title`, `main_title`, `description`, `video_link`, `created_at`, `updated_at`) VALUES
(1, 'uploads/about_page_image/1822158911907716.jpg', 'About Company', 'Helathy Foods Provider', '<p style=\"margin: 15px 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aspernatur molestiae minima pariatur consequatur voluptate sapiente deleniti soluta, animi ab necessitatibus optio similique quasi fuga impedit corrupti obcaecati neque consequatur sequi.</p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-wrap: wrap; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\"><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Delicious & Healthy Foods</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Spacific Family & Kids Zone</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Best Price & Offers</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Made By Fresh Ingredients</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Music & Other Facilities</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Delicious & Healthy Foods</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Spacific Family & Kids Zone</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Best Price & Offers</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Made By Fresh Ingredients</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;\">Delicious & Healthy Foods</li></ul>', 'http://127.0.0.1:8000/', '2025-01-24 13:15:56', '2025-01-24 13:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_area_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `type` enum('home','office') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `delivery_area_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'MD. Faysal Hossain', 'Tibro', 'faysaltibro@gmail.com', '01734449023', 'Adabor, Dhaka-1207', 'home', '2025-01-17 12:25:13', '2025-01-20 02:57:57'),
(3, 2, 1, 'Nasima', 'Hossain', 'sufyxyhuc@mailinator.com', '+1 (187) 815-8512', 'Monsurabad, Adabor, Dhaka', 'office', '2025-01-17 13:40:35', '2025-01-20 02:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `app_download_sections`
--

CREATE TABLE `app_download_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `play_store_link` varchar(255) DEFAULT NULL,
  `apple_store_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_download_sections`
--

INSERT INTO `app_download_sections` (`id`, `image`, `title`, `short_description`, `play_store_link`, `apple_store_link`, `created_at`, `updated_at`) VALUES
(1, 'uploads/app_download_image/1821980477840947.png', 'download our mobile apps', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque assumenda tenetur, provident earum consequatur, ut voluptas laboriosam fuga error aut eaque architecto quo pariatur. Vel dolore omnis quisquam. Lorem ipsum dolor, sit amet consectetur adipisicing elit Cumque.', 'http://127.0.0.1:8000/Play/Store', 'http://127.0.0.1:8000/Apple/Store', '2025-01-22 13:19:02', '2025-01-22 14:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `banner_sliders`
--

CREATE TABLE `banner_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_sliders`
--

INSERT INTO `banner_sliders` (`id`, `banner`, `title`, `sub_title`, `url`, `status`, `created_at`, `updated_at`) VALUES
(3, 'uploads/banner_slider_image/1821946587539509.png', 'Red Chicken', 'Lorem ipsum dolor sit amet consectetur.', 'http://127.0.0.1:8000/', 1, '2025-01-22 05:01:06', '2025-01-22 05:01:06'),
(4, 'uploads/banner_slider_image/1821946631207298.png', 'Red Chicken', 'Lorem ipsum dolor sit amet consectetur.', 'http://127.0.0.1:8000/', 1, '2025-01-22 05:01:48', '2025-01-22 05:01:48'),
(5, 'uploads/banner_slider_image/1821946713036621.png', 'Red Chicken', 'Lorem ipsum dolor sit amet consectetur.', 'http://127.0.0.1:8000/', 1, '2025-01-22 05:02:26', '2025-01-23 05:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `image`, `title`, `slug`, `description`, `seo_title`, `seo_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'uploads/blog_image/1822054885199784.jpg', 'Different Spice For A Different Cheese Bruschetta', 'different-spice-for-a-different-cheese-bruschetta', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p>', NULL, NULL, 1, '2025-01-23 09:42:29', '2025-01-23 09:42:29'),
(3, 1, 4, 'uploads/blog_image/1822054972669840.jpg', 'Competently supply customized initiatives', 'competently-supply-customized-initiatives', '<p><span style=\"color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\">Sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem our asIpsum gen erators on the Internet tend to repeat predefined chunks as the as necessliary, making this the first true generator on the Internet. It uses a dictionary of over 200 our asliatin words, combined with a handful of model sentence structures</span></p><p><span style=\"color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\">Sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem our asIpsum gen erators on the Internet tend to repeat predefined chunks as the as necessliary, making this the first true generator on the Internet. It uses a dictionary of over 200 our asliatin words, combined with a handful of model sentence structures</span></p><p><span style=\"color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\">Sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem our asIpsum gen erators on the Internet tend to repeat predefined chunks as the as necessliary, making this the first true generator on the Internet. It uses a dictionary of over 200 our asliatin words, combined with a handful of model sentence structures</span><span style=\"color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\"></span><span style=\"color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\"></span></p>', NULL, NULL, 1, '2025-01-23 09:43:50', '2025-01-23 09:47:03'),
(4, 1, 3, 'uploads/blog_image/1822055062519460.jpg', 'Quality Foods Requirments For Every Human Body’s', 'quality-foods-requirments-for-every-human-bodys', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have ered alteration in some form, by injected humour, or randomised word which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsulm you need to sure there isn\'t anything embarrassing hidden in the middle of text.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Erators on the Internet tend to repeat predefined chunks as necessiary, making this the true generator on the Internet. It uses a dictionary of over 200 Latin words, combinedss handful of model sentence structures</p>', NULL, NULL, 1, '2025-01-23 09:45:16', '2025-01-23 09:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Chicken', 'chicken', 1, '2025-01-23 05:40:31', '2025-01-23 09:45:50'),
(3, 'Pasta', 'pasta', 1, '2025-01-23 05:41:03', '2025-01-23 09:46:23'),
(4, 'Burger', 'burger', 1, '2025-01-23 05:41:36', '2025-01-23 09:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 'Hello..', 1, '2025-01-24 03:51:37', '2025-01-24 05:23:51'),
(3, 4, 2, 'Good Post.', 1, '2025-01-24 03:51:55', '2025-01-24 05:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('email_settings', 'a:7:{s:11:\"mail_driver\";s:11:\"Mail Driver\";s:9:\"mail_host\";s:21:\"Mail Driver Mail Host\";s:9:\"mail_port\";s:9:\"Mail Port\";s:13:\"mail_username\";s:13:\"Mail Username\";s:13:\"mail_password\";s:27:\"Mail Username Mail Password\";s:17:\"mail_from_address\";s:17:\"Mail Form Address\";s:20:\"mail_receive_address\";s:20:\"Mail Receive Address\";}', 2053325784),
('gatewaySettings', 'a:23:{s:11:\"paypal_logo\";s:55:\"uploads/payment_gateway_logo_image/1821608872744447.jpg\";s:13:\"paypal_status\";s:1:\"1\";s:19:\"paypal_account_mode\";s:7:\"sandbox\";s:14:\"paypal_country\";s:2:\"US\";s:15:\"paypal_currency\";s:3:\"USD\";s:11:\"paypal_rate\";s:1:\"1\";s:14:\"paypal_api_key\";s:80:\"ATuJHBqlMjkerCkxRbjR-25Y4-4oU3Bl8wf-M5HOe8cuwxCAehnwNSaDjbs6LDXd5Qt9yp7017pVoGjd\";s:17:\"paypal_secret_key\";s:80:\"EI5A9lWJAAwHXU6JBvH0R4qU8BxMjryHyhEXNy709uXNNvk8_DarX8fXCAFtIT5J1qvSwtgzyGvAjw5i\";s:13:\"paypal_app_id\";s:13:\"Paypal App Id\";s:11:\"stripe_logo\";s:55:\"uploads/payment_gateway_logo_image/1821763259591232.png\";s:13:\"stripe_status\";s:1:\"1\";s:14:\"stripe_country\";s:2:\"US\";s:15:\"stripe_currency\";s:3:\"USD\";s:11:\"stripe_rate\";s:1:\"1\";s:14:\"stripe_api_key\";s:107:\"pk_test_51Q9RrjEyouwRyXGhG5vz3N7Jf8HfWH2ExjN03ZJTDkZ6REBVdtgIK8aQKjwkZ2384TWBwyUn3ZyxkvePZsqfYgew008VacSwHF\";s:17:\"stripe_secret_key\";s:107:\"sk_test_51Q9RrjEyouwRyXGhtKOLMtTKGqZWSkKFnHZOqbIs8mYpi6B9RG7GAz4gl6rS6sOZi748l7FiJ7UDymxUkFDjNNCa00HRrLJtwZ\";s:13:\"razorpay_logo\";s:56:\"uploads/payment_gateway_logo_image/1821763931811965.webp\";s:15:\"razorpay_status\";s:1:\"1\";s:16:\"razorpay_country\";s:2:\"IN\";s:17:\"razorpay_currency\";s:3:\"INR\";s:13:\"razorpay_rate\";s:5:\"86.55\";s:16:\"razorpay_api_key\";s:23:\"rzp_test_K7CipNQYyyMPiS\";s:19:\"razorpay_secret_key\";s:24:\"zSBmNMorJrirOrnDrbOd1ALO\";}', 2052756224),
('mail_settings', 'a:7:{s:11:\"mail_driver\";s:4:\"smtp\";s:9:\"mail_host\";s:24:\"sandbox.smtp.mailtrap.io\";s:9:\"mail_port\";s:4:\"2525\";s:13:\"mail_username\";s:14:\"82b060d0bdcdae\";s:13:\"mail_password\";s:14:\"d68da9c95e3655\";s:17:\"mail_from_address\";s:21:\"faysaltibro@gmail.com\";s:20:\"mail_receive_address\";s:21:\"faysaltibro@gmail.com\";}', 2053682921),
('settings', 'a:21:{s:9:\"site_name\";s:9:\"Food Park\";s:21:\"site_default_currency\";s:3:\"USD\";s:18:\"site_currency_icon\";s:1:\"$\";s:27:\"site_currency_icon_position\";s:4:\"left\";s:10:\"site_email\";s:21:\"faysaltibro@gmail.com\";s:10:\"site_phone\";s:11:\"01712261035\";s:11:\"mail_driver\";s:4:\"smtp\";s:9:\"mail_host\";s:24:\"sandbox.smtp.mailtrap.io\";s:9:\"mail_port\";s:4:\"2525\";s:13:\"mail_username\";s:14:\"82b060d0bdcdae\";s:13:\"mail_password\";s:14:\"d68da9c95e3655\";s:17:\"mail_from_address\";s:21:\"faysaltibro@gmail.com\";s:20:\"mail_receive_address\";s:21:\"faysaltibro@gmail.com\";s:4:\"logo\";s:39:\"uploads/logo_image/1822756501017819.png\";s:11:\"footer_logo\";s:39:\"uploads/logo_image/1822760575851017.png\";s:7:\"favicon\";s:39:\"uploads/logo_image/1822761550164824.png\";s:10:\"breadcrumb\";s:39:\"uploads/logo_image/1822757118642737.jpg\";s:10:\"site_color\";s:7:\"#d14141\";s:9:\"seo_title\";s:6:\"google\";s:15:\"seo_description\";s:15:\"Seo Description\";s:12:\"seo_keywords\";s:10:\"food,Tibro\";}', 2053682921),
('test@gmail.com|127.0.0.1', 'i:1;', 1736239615),
('test@gmail.com|127.0.0.1:timer', 'i:1736239615;', 1736239615),
('user@gmail.com11|127.0.0.1', 'i:1;', 1737397558),
('user@gmail.com11|127.0.0.1:timer', 'i:1737397558;', 1737397558);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dresserts', 'dresserts', 1, 1, '2025-01-11 06:30:34', '2025-01-11 07:06:50'),
(2, 'Pizza', 'pizza', 1, 1, '2025-01-11 07:08:45', '2025-01-11 07:08:45'),
(3, 'Chicken', 'chicken', 1, 1, '2025-01-11 07:09:21', '2025-01-11 07:09:21'),
(4, 'Burger', 'burger', 1, 1, '2025-01-11 07:09:31', '2025-01-13 02:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `in` varchar(255) DEFAULT NULL,
  `x` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `image`, `name`, `title`, `fb`, `in`, `x`, `web`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(2, 'uploads/chefs_image/1821966168271992.jpg', 'Khandakar Rashed', 'Senior Chef', NULL, NULL, NULL, NULL, 1, 1, '2025-01-22 10:12:20', '2025-01-22 10:12:20'),
(3, 'uploads/chefs_image/1821966283623076.jpg', 'Olivia', 'Senior Chef', NULL, NULL, NULL, NULL, 1, 1, '2025-01-22 10:14:10', '2025-01-22 10:14:10'),
(4, 'uploads/chefs_image/1821966347969019.jpg', 'Emma', 'Senior Chef', NULL, NULL, NULL, NULL, 1, 1, '2025-01-22 10:15:11', '2025-01-22 10:15:11'),
(5, 'uploads/chefs_image/1821969540807286.jpg', 'Charlotte', 'Senior Chef', NULL, NULL, NULL, NULL, 1, 1, '2025-01-22 11:05:56', '2025-01-22 11:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(255) DEFAULT NULL,
  `phone_two` varchar(255) DEFAULT NULL,
  `mail_one` varchar(255) DEFAULT NULL,
  `mail_two` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone_one`, `phone_two`, `mail_one`, `mail_two`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(1, '+1347-430-9510', '+9658745554002', 'websolutionus1@gmail.com', 'example@gmail.com', '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.8318789773!2d90.33728815181978!3d23.780975728157546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1737917590327!5m2!1sbn!2sbd', '2025-01-26 12:38:25', '2025-01-26 12:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `counter_icon_one` varchar(255) NOT NULL,
  `counter_count_one` varchar(255) NOT NULL,
  `counter_name_one` varchar(255) NOT NULL,
  `counter_icon_two` varchar(255) NOT NULL,
  `counter_count_two` varchar(255) NOT NULL,
  `counter_name_two` varchar(255) NOT NULL,
  `counter_icon_three` varchar(255) NOT NULL,
  `counter_count_three` varchar(255) NOT NULL,
  `counter_name_three` varchar(255) NOT NULL,
  `counter_icon_four` varchar(255) NOT NULL,
  `counter_count_four` varchar(255) NOT NULL,
  `counter_name_four` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `background`, `counter_icon_one`, `counter_count_one`, `counter_name_one`, `counter_icon_two`, `counter_count_two`, `counter_name_two`, `counter_icon_three`, `counter_count_three`, `counter_name_three`, `counter_icon_four`, `counter_count_four`, `counter_name_four`, `created_at`, `updated_at`) VALUES
(1, 'uploads/counter_background_image/1822031158684441.jpg', 'fas fa-glass-martini-alt', '85000', 'Customer Serve', 'fab fa-snapchat', '120', 'Experience Chef', 'fas fa-handshake', '72000', 'Happy Customer', 'fas fa-trophy', '30', 'Winning Award', '2025-01-23 03:24:05', '2025-01-23 04:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_purchase_amount` int(11) NOT NULL DEFAULT 0,
  `expire_date` date NOT NULL,
  `discount_type` enum('percent','amount') NOT NULL,
  `discount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `quantity`, `min_purchase_amount`, `expire_date`, `discount_type`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flat 50', 'FLAR50', 100, 100, '2025-01-31', 'amount', 50, 1, '2025-01-16 10:14:53', '2025-01-16 10:33:15'),
(3, 'P10', 'P10', 100, 50, '2025-01-31', 'percent', 10, 1, '2025-01-16 11:56:25', '2025-01-16 11:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `custom_page_builders`
--

CREATE TABLE `custom_page_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_page_builders`
--

INSERT INTO `custom_page_builders` (`id`, `name`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Custom Page', 'custom-page', '<p></p><h1 style=\"margin-top: 3px; margin-bottom: 0px; font-family: Nunito, &quot;Segoe UI&quot;, arial; color: rgb(52, 57, 94); font-size: 24px; display: inline-block;\">Custom Page</h1>', 1, '2025-01-29 02:44:43', '2025-01-29 02:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `daily_offers`
--

CREATE TABLE `daily_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_offers`
--

INSERT INTO `daily_offers` (`id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2025-01-22 02:33:00', '2025-01-22 02:33:00'),
(3, 3, 1, '2025-01-22 02:33:07', '2025-01-22 02:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_areas`
--

CREATE TABLE `delivery_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `min_delivery_time` varchar(255) NOT NULL,
  `max_delivery_time` varchar(255) NOT NULL,
  `delivery_fee` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_areas`
--

INSERT INTO `delivery_areas` (`id`, `area_name`, `min_delivery_time`, `max_delivery_time`, `delivery_fee`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mohammadpur', '15m', '20m', 10, 1, '2025-01-17 11:19:41', '2025-01-17 11:26:56'),
(3, 'Adabor', '5m', '10m', 5, 1, '2025-01-17 12:03:40', '2025-01-17 12:03:40'),
(4, 'Dhanmondi', '20m', '30m', 20, 1, '2025-01-17 12:04:17', '2025-01-31 12:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_infos`
--

CREATE TABLE `footer_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_info` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_infos`
--

INSERT INTO `footer_infos` (`id`, `short_info`, `address`, `phone`, `email`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'There are many variations of Lorem Ipsum available, but the majority have suffered.', '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States', '+1347-430-9510', 'websolutionus1@gmail.com', 'Copyright 2022 FoodPark All Rights Reserved.', '2025-01-28 01:20:22', '2025-01-28 01:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_10_115228_create_sliders_table', 2),
(6, '2025_01_11_080728_create_section_titles_table', 3),
(7, '2025_01_11_080553_create_why_choose_us_table', 4),
(8, '2025_01_11_104528_create_categories_table', 5),
(9, '2025_01_12_114201_create_products_table', 6),
(10, '2025_01_12_174456_create_product_galleries_table', 7),
(11, '2025_01_12_183417_create_product_sizes_table', 8),
(12, '2025_01_13_073439_create_product_options_table', 9),
(13, '2025_01_14_070437_create_settings_table', 10),
(14, '2025_01_16_155257_create_coupons_table', 11),
(15, '2025_01_17_162603_create_delivery_areas_table', 12),
(17, '2025_01_17_173703_create_addresses_table', 13),
(26, '2025_01_18_153809_create_payment_gateway_settings_table', 15),
(29, '2025_01_18_090923_create_orders_table', 16),
(30, '2025_01_18_090952_create_order_items_table', 16),
(31, '2025_01_22_071927_create_daily_offers_table', 17),
(32, '2025_01_22_100958_create_banner_sliders_table', 18),
(33, '2025_01_22_120455_create_chefs_table', 19),
(34, '2025_01_22_184448_create_app_download_sections_table', 20),
(35, '2025_01_23_073832_create_testimonials_table', 21),
(37, '2025_01_23_085610_create_counters_table', 22),
(38, '2025_01_23_111321_create_blog_categories_table', 23),
(39, '2025_01_23_114320_create_blogs_table', 24),
(40, '2025_01_24_085900_create_blog_comments_table', 25),
(42, '2025_01_24_185400_create_abouts_table', 26),
(43, '2025_01_25_080432_create_privacy_policies_table', 27),
(44, '2025_01_25_082508_create_trams_and_conditions_table', 28),
(45, '2025_01_26_182438_create_contacts_table', 29),
(46, '2025_01_27_090821_create_reservation_times_table', 30),
(47, '2025_01_27_110319_create_reservations_table', 31),
(48, '2025_01_27_180420_create_subscribers_table', 32),
(49, '2025_01_27_185348_create_social_links_table', 33),
(50, '2025_01_28_070854_create_footer_infos_table', 34),
(51, '2025_01_29_081157_create_custom_page_builders_table', 35),
(55, '2025_01_29_090653_create_product_ratings_table', 36),
(56, '2025_01_30_173548_create_wishlists_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `delivery_charge` double NOT NULL DEFAULT 0,
  `subtotal` double NOT NULL,
  `grand_total` double NOT NULL,
  `product_qty` int(11) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_approve_date` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `coupon_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`coupon_info`)),
  `currency_name` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `user_id`, `address`, `discount`, `delivery_charge`, `subtotal`, `grand_total`, `product_qty`, `payment_method`, `payment_status`, `payment_approve_date`, `transaction_id`, `coupon_info`, `currency_name`, `order_status`, `address_id`, `created_at`, `updated_at`) VALUES
(2, '5725252046', 2, 'Monsurabad, Adabor, Dhaka, Aria: Mohammadpur', 10, 10, 100, 100, 1, 'Razorpay', 'COMPLETED', '2025-01-20 12:51:53', 'pay_PlnqY5M9YBZ2od', '{\"code\": \"P10\", \"discount\": \"10.00\"}', 'USD', 'delivered', 3, '2025-01-31 12:50:46', '2025-01-31 06:27:04'),
(3, '7652252103', 2, 'Monsurabad, Adabor, Dhaka, Aria: Mohammadpur', 10, 10, 100, 100, 1, 'Stripe', 'COMPLETED', '2025-01-21 01:36:40', 'pi_3Qjc0oEyouwRyXGh0rfnn5RK', '{\"code\": \"P10\", \"discount\": \"10.00\"}', 'usd', 'in_process', 3, '2025-01-21 01:36:03', '2025-01-21 10:12:47'),
(4, '5809252103', 2, 'Monsurabad, Adabor, Dhaka, Aria: Mohammadpur', 20, 10, 200, 190, 2, 'Stripe', 'COMPLETED', '2025-01-21 02:40:39', 'pi_3Qjd0iEyouwRyXGh19mBn9jO', '{\"code\": \"P10\", \"discount\": \"20.00\"}', 'usd', 'delivered', 3, '2025-01-21 02:40:03', '2025-01-21 05:28:52'),
(5, '5745253114', 2, 'Monsurabad, Adabor, Dhaka, Aria: Mohammadpur', 0, 10, 100, 110, 1, 'Stripe', 'COMPLETED', '2025-01-31 06:23:51', 'pi_3QnJGDEyouwRyXGh1MDlHRTv', 'null', 'usd', 'delivered', 3, '2025-01-31 06:23:14', '2025-01-31 06:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `product_size` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_size`)),
  `product_option` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_option`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_id`, `unit_price`, `qty`, `product_size`, `product_option`, `created_at`, `updated_at`) VALUES
(2, 2, 'Maxican Pizza', 1, 80, 1, '{\"id\": 6, \"name\": \"Medium\", \"price\": 10}', '[{\"id\": 3, \"name\": \"7up\", \"price\": 10}]', '2025-01-20 12:50:46', '2025-01-20 12:50:46'),
(3, 3, 'Chicken Burger', 3, 80, 1, '{\"id\": 3, \"name\": \"Medium\", \"price\": 10}', '[{\"id\": 1, \"name\": \"Coca-Cola\", \"price\": 10}]', '2025-01-21 01:36:03', '2025-01-21 01:36:03'),
(4, 4, 'Chicken Burger', 3, 80, 1, '{\"id\": 3, \"name\": \"Medium\", \"price\": 10}', '[{\"id\": 1, \"name\": \"Coca-Cola\", \"price\": 10}]', '2025-01-21 02:40:03', '2025-01-21 02:40:03'),
(5, 4, 'Maxican Pizza', 1, 80, 1, '{\"id\": 6, \"name\": \"Medium\", \"price\": 10}', '[{\"id\": 3, \"name\": \"7up\", \"price\": 10}]', '2025-01-21 02:40:03', '2025-01-21 02:40:03'),
(6, 5, 'Chicken Burger', 3, 80, 1, '{\"id\": 3, \"name\": \"Medium\", \"price\": 10}', '[{\"id\": 1, \"name\": \"Coca-Cola\", \"price\": 10}]', '2025-01-31 06:23:14', '2025-01-31 06:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_settings`
--

CREATE TABLE `payment_gateway_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateway_settings`
--

INSERT INTO `payment_gateway_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'paypal_logo', 'uploads/payment_gateway_logo_image/1821608872744447.jpg', '2025-01-18 11:21:58', '2025-01-18 11:33:16'),
(2, 'paypal_status', '1', '2025-01-18 11:21:58', '2025-01-20 12:03:44'),
(3, 'paypal_account_mode', 'sandbox', '2025-01-18 11:21:58', '2025-01-18 11:21:58'),
(4, 'paypal_country', 'US', '2025-01-18 11:21:58', '2025-01-18 11:21:58'),
(5, 'paypal_currency', 'USD', '2025-01-18 11:21:58', '2025-01-18 11:21:58'),
(6, 'paypal_rate', '1', '2025-01-18 11:21:58', '2025-01-18 11:21:58'),
(7, 'paypal_api_key', 'ATuJHBqlMjkerCkxRbjR-25Y4-4oU3Bl8wf-M5HOe8cuwxCAehnwNSaDjbs6LDXd5Qt9yp7017pVoGjd', '2025-01-18 11:21:58', '2025-01-18 13:31:34'),
(8, 'paypal_secret_key', 'EI5A9lWJAAwHXU6JBvH0R4qU8BxMjryHyhEXNy709uXNNvk8_DarX8fXCAFtIT5J1qvSwtgzyGvAjw5i', '2025-01-18 11:21:58', '2025-01-18 13:31:34'),
(9, 'paypal_app_id', 'Paypal App Id', '2025-01-18 11:21:58', '2025-01-18 11:21:58'),
(10, 'stripe_logo', 'uploads/payment_gateway_logo_image/1821763259591232.png', '2025-01-19 13:14:18', '2025-01-20 04:27:13'),
(11, 'stripe_status', '1', '2025-01-19 13:14:18', '2025-01-19 13:16:26'),
(12, 'stripe_country', 'US', '2025-01-19 13:14:18', '2025-01-19 13:16:26'),
(13, 'stripe_currency', 'USD', '2025-01-19 13:14:18', '2025-01-19 13:16:26'),
(14, 'stripe_rate', '1', '2025-01-19 13:14:18', '2025-01-20 04:27:21'),
(15, 'stripe_api_key', 'pk_test_51Q9RrjEyouwRyXGhG5vz3N7Jf8HfWH2ExjN03ZJTDkZ6REBVdtgIK8aQKjwkZ2384TWBwyUn3ZyxkvePZsqfYgew008VacSwHF', '2025-01-19 13:14:18', '2025-01-19 13:44:30'),
(16, 'stripe_secret_key', 'sk_test_51Q9RrjEyouwRyXGhtKOLMtTKGqZWSkKFnHZOqbIs8mYpi6B9RG7GAz4gl6rS6sOZi748l7FiJ7UDymxUkFDjNNCa00HRrLJtwZ', '2025-01-19 13:14:18', '2025-01-19 13:44:30'),
(17, 'razorpay_logo', 'uploads/payment_gateway_logo_image/1821763931811965.webp', '2025-01-20 04:31:20', '2025-01-20 04:37:52'),
(18, 'razorpay_status', '1', '2025-01-20 04:31:20', '2025-01-20 04:57:28'),
(19, 'razorpay_country', 'IN', '2025-01-20 04:31:20', '2025-01-20 04:57:28'),
(20, 'razorpay_currency', 'INR', '2025-01-20 04:31:20', '2025-01-20 04:57:28'),
(21, 'razorpay_rate', '86.55', '2025-01-20 04:31:20', '2025-01-20 04:57:28'),
(22, 'razorpay_api_key', 'rzp_test_K7CipNQYyyMPiS', '2025-01-20 04:31:20', '2025-01-20 04:57:28'),
(23, 'razorpay_secret_key', 'zSBmNMorJrirOrnDrbOd1ALO', '2025-01-20 04:31:20', '2025-01-20 04:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-family: var(--headingFont); text-transform: capitalize;\">Your agreement:</h3><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-family: var(--headingFont); text-transform: capitalize;\">Main responsibilities:</h3><ul style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\"><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><ul style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\"><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p>', '2025-01-25 02:13:26', '2025-01-25 02:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `price` double NOT NULL,
  `offer_price` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `category_id`, `short_description`, `long_description`, `price`, `offer_price`, `quantity`, `sku`, `seo_title`, `seo_description`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Maxican Pizza', 'maxican-pizza', 'uploads/product_thumb_image/1821057617536194.png', 4, 'Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients, which is then baked at a high temperature, traditionally in a wood-fired oven. A small pizza is sometimes called a pizzetta.', '<p style=\"margin: 25px 0px 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Ipsum dolor, sit amet consectetur adipisicing elit. Doloribus consectetur ullam in? Beatae, dolorum ad ea deleniti ratione voluptatum similique omnis voluptas tempora optio soluta vero veritatis reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate tempora ea incidunt iste, corporis, quo cumque facere doloribus possimus nostrum sed magni quasi, assumenda autem! Repudiandae nihil magnam provident illo alias vero odit repellendus, ipsa nemo itaque. Aperiam fuga, magnam quia illum minima blanditiis tempore. vero veritatis reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate tempora ea incidunt iste, corporis, quo cumque facere doloribus possimus nostrum sed magni quasi</p><ul style=\"margin: 15px 0px 0px; padding: 0px; list-style: none; display: flex; flex-wrap: wrap; justify-content: space-between; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\"><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus consectetur ullam in</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Dolor sit amet consectetur adipisicing elit. Earum itaque nesciunt.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Corporis, quo cumque facere doloribus possimus nostrum sed magni quasi.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate tempora ea.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Incidunt iste, corporis, quo cumque facere doloribus possimus nostrum sed magni quasi</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Architecto. Debitis nesciunt inventore voluptate tempora ea incidunt iste corporis.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Earum itaque nesciunt dolor laudantium placeat sed velit aspernatur.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Laudantium placeat sed velit aspernatur, nobis quos quibusdam distinctio voluptatum.</li></ul><p style=\"margin: 25px 0px 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum itaque nesciunt dolor laudantium placeat sed velit aspernatur, nobis quos quibusdam distinctio voluptatum officia vel sapiente enim, reprehenderit impedit beatae molestias dolorum. A laborum consectetur sed quis exercitationem optio consequatur, unde neque est odit, pariatur quae incidunt quasi dolorem nihil aliquid ut veritatis porro eaque cupiditate voluptatem vel ad! Asperiores, praesentium. sit amet consectetur adipisicing elit. Doloribus consectetur ullam in? Beatae, dolorum ad ea deleniti ratione voluptatum similique omnis voluptas tempora optio soluta</p><ul style=\"margin: 15px 0px 0px; padding: 0px; list-style: none; display: flex; flex-wrap: wrap; justify-content: space-between; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;\"><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate tempora ea.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Incidunt iste, corporis, quo cumque facere doloribus possimus nostrum sed magni quasi</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Architecto. Debitis nesciunt inventore voluptate tempora ea incidunt iste corporis.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Earum itaque nesciunt dolor laudantium placeat sed velit aspernatur.</li><li style=\"margin: 10px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; color: var(--paraColor); position: relative; width: 635.031px;\">Laudantium placeat sed velit aspernatur, nobis quos quibusdam distinctio voluptatum.</li></ul><p style=\"margin: 25px 0px 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus consectetur ullam in? Beatae, dolorum ad ea deleniti ratione voluptatum similique omnis voluptas tempora optio soluta vero veritatis reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate tempora ea incidunt iste, corporis, quo cumque facere doloribus possimus nostrum sed magni quasi, assumenda autem! Repudiandae nihil magnam provident illo alias vero odit repellendus, ipsa nemo itaque. Aperiam fuga, magnam quia illum minima blanditiis tempore.</p>', 100, 80, 100, 'PIZZA-100', 'Seo Title.', 'Seo Description.', 1, 1, '2025-01-12 07:07:59', '2025-01-14 02:50:42'),
(3, 'Chicken Burger', 'chicken-burger', 'uploads/product_thumb_image/1821118992837421.jpg', 4, 'Short Description', '<p><span style=\"color: rgb(52, 57, 94); font-size: 12px; letter-spacing: 0.5px;\"><b>Long Description</b></span></p>', 100, 80, 5, 'BURGER-100', 'Seo Title.', 'Seo Description.', 1, 1, '2025-01-13 01:46:52', '2025-01-16 12:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 3, 'uploads/product_gallery_image/1821124742356792.jpg', '2025-01-13 03:18:14', '2025-01-13 03:18:14'),
(3, 3, 'uploads/product_gallery_image/1821124750730961.jpg', '2025-01-13 03:18:22', '2025-01-13 03:18:22'),
(4, 3, 'uploads/product_gallery_image/1821124758613598.jpg', '2025-01-13 03:18:30', '2025-01-13 03:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 'Coca-Cola', 10, '2025-01-13 01:48:32', '2025-01-13 01:48:32'),
(2, 3, '7up', 20, '2025-01-13 01:48:57', '2025-01-13 01:48:57'),
(3, 1, '7up', 10, '2025-01-13 01:54:26', '2025-01-13 01:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `user_id`, `product_id`, `rating`, `review`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 5, 'Good Product', 1, '2025-01-29 11:28:17', '2025-01-29 11:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(2, 3, 'Small', 5, '2025-01-13 01:47:35', '2025-01-13 01:47:35'),
(3, 3, 'Medium', 10, '2025-01-13 01:47:56', '2025-01-13 01:47:56'),
(4, 3, 'Large', 15, '2025-01-13 01:48:05', '2025-01-13 01:48:05'),
(5, 1, 'Small', 5, '2025-01-13 01:53:43', '2025-01-13 01:53:43'),
(6, 1, 'Medium', 10, '2025-01-13 01:53:53', '2025-01-13 01:53:53'),
(8, 1, 'Large', 20, '2025-01-13 02:00:23', '2025-01-13 02:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `persons` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_times`
--

CREATE TABLE `reservation_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_times`
--

INSERT INTO `reservation_times` (`id`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(2, '10:00 AM', '11:00 AM', 1, '2025-01-27 03:38:07', '2025-01-27 03:38:07'),
(3, '11:00 AM', '12:00 PM', 1, '2025-01-27 03:38:41', '2025-01-27 03:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `section_titles`
--

CREATE TABLE `section_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_titles`
--

INSERT INTO `section_titles` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'why_choose_top_title', 'why choose us', '2025-01-11 02:37:13', '2025-01-11 02:41:27'),
(2, 'why_choose_main_title', 'why choose us', '2025-01-11 02:37:13', '2025-01-11 02:37:51'),
(3, 'why_choose_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', '2025-01-11 02:37:13', '2025-01-11 02:37:51'),
(4, 'daily_offer_top_title', 'daily offer', '2025-01-22 03:12:12', '2025-01-22 04:03:41'),
(5, 'daily_offer_main_title', 'up to 75% off for this day', '2025-01-22 03:12:12', '2025-01-22 04:03:41'),
(6, 'daily_offer_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', '2025-01-22 03:12:12', '2025-01-22 04:03:41'),
(7, 'chef_top_title', 'our team', '2025-01-22 12:25:39', '2025-01-22 12:25:39'),
(8, 'chef_main_title', 'meet our expert chefs', '2025-01-22 12:25:39', '2025-01-22 12:25:39'),
(9, 'chef_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', '2025-01-22 12:25:40', '2025-01-22 12:25:40'),
(10, 'testimonial_top_title', 'testimonial', '2025-01-23 02:20:31', '2025-01-23 02:20:31'),
(11, 'testimonial_main_title', 'our customar feedbacks', '2025-01-23 02:20:31', '2025-01-23 02:20:31'),
(12, 'testimonial_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', '2025-01-23 02:20:31', '2025-01-23 02:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('05cPlhwP1Gg8AmYMAOTQONwdtUp4it9vQh80IkGq', NULL, '3.144.253.199', 'CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM29XdkJPd0VzemZGMGRMV2RKY3F4M0hpQWJxZ2hLWG5rZUNLZGNRRCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741957675),
('0KQwy7ZWWYvgGE3QBUCfLWGnspCycPQQEBQDHKeR', NULL, '3.80.146.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.75 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkNBazcyWHJkTVhRTmlqRG9wVXNGWU1kcnNjWWoyelJlWVpvT0poMCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovL3d3dy5mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741548648),
('0lq7Pp03s2G0wdLmjnqORkld1FTKKEHyDmE2mto8', NULL, '54.36.149.83', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRTZLNFBVMW9MRjgyckdoaERYUXhYNnNxN2h5VUdJdGNiSmpmTjZlQiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo3ODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2NvbXBldGVudGx5LXN1cHBseS1jdXN0b21pemVkLWluaXRpYXRpdmVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741569204),
('0vIVqmrmcz5RVjRBmihaVE347vUqYDVKcK10y9Iu', NULL, '54.36.148.144', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidk9hbG93c3VUVk9tZFp5cG5HSFdtQU4xdmZMZWt5aFlPd2RYV0VsbyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740948214),
('1GPnBmxDiOxrXj2DFXqtaB0YFAwdQ5xI6ZoNpqLK', NULL, '49.51.52.250', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicW5iRnhqYWViVldmcXlySUhlRHhxbUZxQ0swUkFTMFp2cElPdTlsYiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740684844),
('1hrFeE0vr3k11CcMxbnFP23T3G93W0q41zBJJ61w', NULL, '54.36.148.24', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWkdGMmwxZk52N0h2dUs2MHo3QXU4VU1hMnBwTXdlT1VxRGVVUElGQyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742070922),
('1hZAkmKERTIdSAolQ7u3fGGAYY923vYl9oP7z0eP', NULL, '43.153.19.83', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkFWNGRDVmZ2czd5QW5BVWxjRHhoUWhEd3dkdWoyM2M2U2FYYUs1SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9jYXJ0LXByb2R1Y3QtcmVtb3ZlLzpyb3dJZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741983705),
('1nqIPJGsyq7cYlNTFHOClqFwvnTmNdM0vagEnkqy', NULL, '43.157.170.13', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkxWMVNRVzJwaTlvOWVsRWllRmhhWlFZbTVYaFBIdGl2NzJJUUQ0NyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741321541),
('1Sb0i4S5LWgZkCr98EJjDAera0PJG5zVzErkXgev', NULL, '54.36.148.136', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTGtoVU9ySHZPazZ5Y2ZJY25RY1pSSjVGbE9TTnlMVWYyaGFSODY0NSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741862546),
('1wz04Bs2o0EUIGULZJHdDOpbrVdbZq3Mby2or8e3', NULL, '3.140.190.124', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTHZUd0NtWGpTVjgzQXQ4UjNEbk5JSEsxSlo4SURPUGxOOERMV3BsWSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741218244),
('29kySrhF82MgqpHN5iU1XMNNbPFjcjUPA1TBYMYy', NULL, '54.36.148.253', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWdBRGNUZnMySzRJR1VXdFY2b3F6ajlZR1N2UkRneTd3RWZ3ZHZYaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9wcm9kdWN0L2luZGV4Lmh0bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740873433),
('2Fcoqmc1XY6GpLYgB2dMFegVjeABiLGyVimYSAOD', NULL, '54.36.148.112', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWpwNFVoNUsybzVkeXlvZ2ZicnRtaTlXUXU5bENueVVaazlCTWFsZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL3F1YWxpdHktZm9vZHMtcmVxdWlybWVudHMtZm9yLWV2ZXJ5LWh1bWFuLWJvZHlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742039360),
('3ESqLtQ8dSYa0TwmxcMCiZbRbsQ5KTfKYuU0w8Gy', NULL, '43.131.243.61', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXVJdTYyQmV2RlJJMmZoY21FQktuWkIxb3N3Und6TEF6MklKRHFRcSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741717881),
('3xBKPEg6S6XTLCozrQ9HPHlgSpw6puzPatFTTvfP', NULL, '54.36.148.195', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0tBSlg3NzNFSUNLaG1Wdm1oQVZ3UkxLU3MwSmRZR0d6bmoxTDd1MSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo3ODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2NvbXBldGVudGx5LXN1cHBseS1jdXN0b21pemVkLWluaXRpYXRpdmVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741099692),
('4doxSItbeSWGiDnrNzxNmsjBnySYpucgnw75LSdD', NULL, '185.191.171.3', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVE9KUXN1VUFiMFF3QXFlYmxydlc3elJleld4VHF6UmYxRUFUajJqdSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741313659),
('4Eo1fFTJjxenste2eVXXSrpnq6M9PiSbmd83WkLZ', NULL, '180.95.238.206', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSzQ0Y01wNDcwekhxY3lSWWpXSU05VHkyMm80NmlYYlgyM2R5QmNmdiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741624617),
('4MLy0ONakmN7kRpzSVCnptLsfKVRr7mctXwPBAGJ', NULL, '54.36.149.5', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaVVXSmNVRUNrdEhFbUJJaEdrTXJMbUdBaHBqT1laeklkR1BhNnQ1WSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740949769),
('4o7h2HSqpT8jMIrAbrlp02yCJjdwIq5Lm2qtWkae', NULL, '43.128.156.124', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmpJdGFuY0VhYXMzQlRaMmo2Z1BadU5tQlE0d3BDcG1ZWEdvV3JrYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS93aXNobGlzdC86cHJvZHVjdElkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741983254),
('4URdQXAZuZZGUVnSvkqmk0re59WuolBBluJhmKGu', NULL, '43.159.128.247', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3VyeGQzSjVhaHBOV3daaFlFcFJQUG4xR2ZHRUxRUDVVVjcwTmhqaiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741526331),
('5czPS9bVcJLJhcCqUnOZCzlqhCe7By9lpVQCceW6', NULL, '54.36.148.219', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSEtFOWhvZU5QUzJRYkFzMk1WY1hycGdSTlk2SHRKNkY0WUxYM0J5aSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741847185),
('5ggeE3XkJn4XP5IsNCb9mtjAEws9CEIvH4AvMYbT', NULL, '47.82.11.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDFmRVJ1WElPOGdmMlk5SGtldUNmOUxocDdtS1FXZE5CbDZlb0Z5ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9jYXJ0LWRlc3Ryb3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742035003),
('6bwsBLI0u5OFyPYc2saaev8b0KM9CtJ1l8gjUpHI', NULL, '54.36.148.130', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU0trT2JrQzgxOHhPSjA3eXpxWVdFSUJLMTg2azE0REtkcG1FajZMayI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741385473),
('6lKuAOqJPRrzAONdCs9sbXN0JBGun6mFos6ZMEj5', NULL, '43.130.57.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzBIc1N0SVBjNThWODFvQjVYOHcwQkhxU3IwVVF3YXREdmVqNDJxSyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741981553),
('71viC9vnVPADjh5GEHD93tb22knp99Ng3z3YZED1', NULL, '43.173.2.116', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia09TdXdxRGNGdUtTVThSS3lrWFkxYjlTY0hXellROGFwRWpwVTgxTSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741845118),
('7ccmwPPDkDc1B7tDJf9Of7C3PeSAwpbvkLSammxb', NULL, '63.33.62.73', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRTRKMUtxMzVNM1lsSm95ODNUNDlRR2djdksyUzRZVHZPNDBDUFg1NSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741245309),
('7dcxWBK2aKaXK4ko6TOSaYuo0XttxHjkUD2YSH3q', NULL, '54.36.148.243', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOWFhQzA1Tld2SFRQTE1SbmowQVg4MVJNbEhHWXNFc25LTEt6OVVFdSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL3F1YWxpdHktZm9vZHMtcmVxdWlybWVudHMtZm9yLWV2ZXJ5LWh1bWFuLWJvZHlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741556144),
('7O7Ga0fVOnnUMZQS3vS74Cn3POd6DyyvrHAj8kcV', NULL, '43.153.87.54', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnQzMjNNT0V6R1g4VmJlUHdFenFFYkVjMmN2MlkyQWVMUnlJbXpOQiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740681836),
('83rf6wjlquHCKnfocHC4zT5Z5tbzvTRGkH7U7iMc', NULL, '43.131.253.14', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWWdDU056ZnpMMDhEN3hWQ0lSQTQ1Wms0VTdrWGpBVmNFOERaa1pkZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742089806),
('8F6KagohgjNZiLxV5kNBVherUHlwq5sdcH1Q0dAN', NULL, '54.36.148.156', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1hoejEza1Fla0t2aWpNRlJ2Vm5YbGpCdzhocXVmaDFZa2RSSTFNSSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741851969),
('8ILgZ6Y6PraoyAmj8iCzWA04adK1wV9mzlKdCN8l', NULL, '66.249.64.132', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.6943.141 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaG1KZTZIbjF1ektnMnl1OVkxMzN4UVVqTGFFMXc0blI1WEFDYzZzSCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741947080),
('960aVxNUBf5zaD91Jt5OTteCs4RUASYuly8sO9Zy', NULL, '54.36.148.102', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWnZLbVFHVjcyTmVoQmhySW1rYmNBbkdRYnZSUlNwbTJMTnZvMnBDTCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740956723),
('9DyVlxlvVfofaUkH86qIhQRKMK2n9FCNmqqgKJeL', NULL, '43.159.149.216', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia05nTk9IQ0RReDdoOGRYS0RiZmg1eGRVZDJvMkhKbERPZFNvd3BtZCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741340967),
('9OpM7EjrE3KMrsUtkb0uXFRUNO0IdG172QxwKtzU', NULL, '49.51.52.250', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidUdzOGVmYWVxS3dtdlZSWmxXOXNQRHdheU1lUkJFZG15NG1hZk9DUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740687909),
('b7et5VlvS48lICJ72OqiXqJlNuYsMnNuSvYP7lgg', NULL, '54.36.148.17', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnFPYTkxZFRqN2JEcHRjcENoOUFLaWRpdkdmaUxBNXZXVWJ2UFNrUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741404001),
('BmXltLE1PukLkLWhRGRMXSTH9R7ZIMsVEkETw7jT', NULL, '54.36.148.7', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU05LTk1QdmhlcVVjWkw4YmNXNmZLNkY5WUJLN1FuMllWeXRsUnRDbCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWNoaWNrZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740660656),
('bN4ZsIl070mwgqFoSUw5tyIDKcFycYfdB8sd9w4l', NULL, '43.133.187.11', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS09sNGxtTk5lMzBvZjlEUnA1R29jVnlwNmFRRXFDTUJGR3RWNEdMTyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742065512),
('BN82JXGorZsKSVrHGW8FONAYdlS15gqsMM6ZdnHD', NULL, '85.208.96.207', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1pCR0RPM0RXeUxBWllNTFpLYmYwSVdnTzMyU25PWTFDYnd4SjY4TCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2RpZmZlcmVudC1zcGljZS1mb3ItYS1kaWZmZXJlbnQtY2hlZXNlLWJydXNjaGV0dGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741325585),
('cjwtTUUamuDbqrxBMcYVGQUNyeNrA5xl7Hdvzdub', NULL, '54.36.148.150', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUlNqQThpVEo2VXp1UFgycTVRbjlrQnFGQlJnNnJmeWoyNFRIaWZlZyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741234394),
('cxXZXXAKf6DX7QlGNKSLhVoBNDKbiifIWotrUU8A', NULL, '43.165.70.220', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWnQ4Q3Zwa2FGZFVLbTNWeFQxNHdHZkRkUlpTRFJlbEpFcFl2RGVFMyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PXBhc3RhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740685484),
('CZICPDkZ02RA1WGNOF0hcpSexRhyicLZTUgZrBGl', NULL, '85.208.96.212', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmJSd0wxU3phM1NGbUVGVW9PSXFYVUxNWEUwUVBndjRVVURjVjBJTyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo3ODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2NvbXBldGVudGx5LXN1cHBseS1jdXN0b21pemVkLWluaXRpYXRpdmVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741310582),
('D0YlkZcMhRxW5ah4J29AaGGBRNexJs1dsSZeD831', NULL, '43.156.168.214', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTmNzMUdYYlhpQVUyUXpTTnpNRzZDTGF6STQ1NjgyRWlHZThmVVZYYiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740684098),
('dtK4E7gtPrl8miYPxQwYyUdxJHER2vOHeEWrH565', NULL, '43.130.37.243', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMlRWaWVvanJDWWd5QkdXQ21jdTdvRjBJSFhtMHM5WFhDN25FNVk2RyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741437120),
('dzZ7C4E93r2wgsB2Wrk9rKNebLquRbabavxN8OAB', NULL, '54.36.148.133', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2FpNTl1cXE3NThlNGZPSkVoZjNMajY4RVdmU1ZneGNaWE1TOUhLMiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2RpZmZlcmVudC1zcGljZS1mb3ItYS1kaWZmZXJlbnQtY2hlZXNlLWJydXNjaGV0dGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742027602),
('E8FawZjGPm0SJ9H9aiGIJq0l4hz5iJ59skNxIhWf', NULL, '170.106.140.110', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWJGanM1M3NRdEJ1UFFCZXc1dUsyZXVRMjZhcGFxRnFibFNKVEh6RCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742044815),
('edNw2HPSNcwK4hb92Z7Kb8DLzBBoatwoV5ZKT8T2', NULL, '43.130.57.76', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTG9GZjlndlB0ekZOZlNDSHJDbDU1R1NRZ2E2NGpUeExRQXFPOHNDNyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741610847),
('eFfdg8AYaeTGcjvnryJrtWYDNTI6qo4DVgIVYgCW', NULL, '66.249.64.131', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTHpYR2JaWDUxSmMzU1NUV2tzS1pUUmM0d0dLQ3l6Y1p2SEtDbXg0SyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741948426),
('eHjCHLBOlPbYmk2UqmGhJBanyJzQYOFJn2PoNgrp', NULL, '43.159.132.207', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVG54cFdkNjhtMzVyWEJKSVF2UmZhYVdNT1ZHengxQ25zVU9MWnM2UCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741470452),
('eliCPKcXPXwKJN2NeqxxOiWht2stQHdUyG9XgEsI', NULL, '170.106.73.216', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicFVMWmhZcVhqcm9BOTd0YllkVlFIYm91eURVYWl1NE52SVNBSFRIeCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740688533),
('eQqEBkUhD6BzPn3EbnkjAVSSshhnxbXoLcAXFw0S', NULL, '185.191.171.18', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWVZqV0N4WlhKTUZoZG5Fd0FSc1VRbjYyTTY2S3dJVE5ZWWhhaHNHcCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741815383),
('eTXF9ke5KgWi9ssBC701z0eezdDd67yNrQhdhsum', NULL, '43.166.136.24', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTk95emNTUHdaUFNuN3N2TGx0d0prQVJPbmM1WTFudUM2S0hubTBnMyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741663575),
('eU5iStmDVdQJ1HCUk5FmLROhP66ei9f4J0cKPrnK', NULL, '49.51.196.42', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaUYwelQzeXBaMTB0SzJ3ZmpaaURIekluY0dJazRwSmkyaUx1Z2x2QSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741635343),
('EUMn8nIiha05P3d3NSDYG8DThrnl76W06tYSo2t9', NULL, '45.39.130.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.3', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWkxaQUJuV3QyYnJGMUFKdWZSTFhpbjNVY2FqWjRMZW5XVlhiWlRYciI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740873446),
('euNMK0zftOphQBlF09zVkRRyMbfEWPpnyB6kaRQH', NULL, '119.28.177.175', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaGMyamJoemlZMnQ5SUdqck5jRG1pdm5XWTRXNjMzUXl0c2p2UjM4ZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741921784),
('f8gJjfidSpm4iws4EfkcfYONNMknjTqBjrJ5zeWe', NULL, '66.249.64.131', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDIxU0tJZ2YyaGw0clRlcWNaa3N6bVdRU1d1emtZUTEzdjI4ckk3RSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741949122),
('F98plyc9mko9CRzgMecSG4oJTD9Iz9QRRfb3p2Pk', NULL, '43.130.78.203', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWENHbnB4ek5wUjF0aE1lSUV0VDBOc1c4Nm91bG1XaEIyS09IaEJueCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741863123),
('f9bAauLdNBM5JXDE6ha25dInqGSrVr6zkZPSz50X', NULL, '54.36.149.53', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM1Nuc3JTd2RHT2w1OG1nb0Exd2NFZXhPdHdyQWtNcU1pNEFEdmZrVyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741387542),
('fIUDQHBaO0IWUbNcGtiWynzoc5YmgOxxGMNUNXJO', NULL, '85.208.96.212', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiam9rR2dVUUVTeDRYS0dxSmg2RzQ5bWF2RG5LcDNtOVhSMjVGamtnTyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvY2hpY2tlbi1idXJnZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741345769),
('fK3EdgA5C4J1aGJqSFkAswVNhNCBr8QDpdlhdazt', NULL, '54.36.148.207', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHRibmxudk05VE9la3dqeUphTzE0RGE2VkFablZkaXZnRmZNUzVPQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9ibG9ncy9jaGVja19vdXQuaHRtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740715224),
('FpUyz14c0NIo1ginipPSlLx1jW0IMGRW793glVIG', NULL, '43.135.144.126', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHA2T0ZwQ1U2YmJ4UWhYWkJOUGxtMlRwbnF5ZnZRWkx3WHJENXJmNiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741881324),
('FsWJNtPzqgEozMAkTeZayw7MCqIykZYzilPLuQc8', NULL, '47.79.0.217', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1N4cW5Sb3cxbE0wbTh1aWtjMHBqN1hLaWp6RmJ4d285YUlIemRkMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9ibG9ncy9pbmRleC5odG1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741034227),
('FtFV0e0GaHupr2ZGg83uDBnG6oVQCGTTnXB9SBX0', NULL, '20.171.207.102', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHhNM0J0NVBHREY1TjFvNlozeU5zYmk1VngzY0xPQTlxUjFZUFlDMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9sb2FkLXByb2R1Y3QtbW9kYWwvOnByb2R1Y3RJZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741907521),
('fUnC5ESBDG2g1qX5YPAppbvqChRdrlUcyV7ZFYTK', NULL, '51.8.102.221', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYnFldDR0S2dqa1U2SDRMZkg1RGNmbWNHcFc4cE41MlBnWG9FSHowZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741451731),
('FyzjefMfdXYR8Rvu95NVAEg0kTLb9wUOzdrnroKa', NULL, '43.128.156.124', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOExPQVZkNlB5YnI3Tk1CbmhzYnU0Y2poV2l1V1NXSTVmUnVXaUVvSCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741823657),
('g08MB0Ppvte8K7GAwdhgjaVRBppeaVkFDo14FvuS', NULL, '185.191.171.3', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUE1wcWRkbHk3NDEwb3hBNnJLd2lRWjFvNzB4VDNuaUxHM2ZJeDZqYyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741303099),
('G882UvnV8bsAX2lzlgk2wSMl5MWC1EcvDqVSUxHF', NULL, '23.27.145.76', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNHFHOEphdEsyT0tXRndSdmZNaDYyTWIzQ01PeXU0UVoybjdQVUNqcCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740667182),
('gck9j3KwL5XWaoCpNs06JvwEbWiThUrLDU9u9pq5', NULL, '54.36.148.213', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoickd1VzhtdUVQRW1UdFNIUnh3VkJSdkx1MmpRc21HdnJ4ZUtpdXBuTCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvY2hpY2tlbi1idXJnZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740763491),
('gRTQk1xZvxXiW7LXQVdW9jDCORAzHLPfnwYV4CH7', NULL, '54.36.149.51', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZnF5V1ZudFkzMGl2V0M1eUJPY3h2U0owSHdKcGVTTE9PbEg3T0FRRSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL3F1YWxpdHktZm9vZHMtcmVxdWlybWVudHMtZm9yLWV2ZXJ5LWh1bWFuLWJvZHlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740615448),
('gURhMms2WOcVOM9oiVRBJJ2kfQRsWh9McfIjsN45', NULL, '170.106.163.84', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSWM5b0dBUXkxcEQzTGVyUkJhaTNjQ1piVG1KRlRnRWE4VkhlQTJRdCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741978393),
('GXUxzJo8eO64fBro5NKqYyYxhVoiDXoejzewmQHl', NULL, '54.36.149.61', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid0Q4cVp2MWxxSmxBYWM1bG5pQUx1bkd4VXA0c09YOUFLZ0M3WmhkZCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741855002),
('gYHuNFuWtv9LweVouorAmgG16w25itkaNXvex5wO', NULL, '23.27.145.27', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY1RJOWt2MUNBTVcwZmNTMGVzeGZBYjhKb0U2cmhRRHAzUEMyOG1tdiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740716416),
('HNPqoPfoc1ybPCBj0ZbBElRpmufruArlHuvc4D2t', NULL, '43.165.65.75', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkhTaU9aRklPVXBwVzBpWTlvUDhXYW5SSFFPSTYxbktObW9NbUc5RyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741139210),
('hOTpo844EED0WYpFF7gs0vIyLmsWajzHr1H8Vf7c', NULL, '213.209.143.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnZtYzZQR2x4a2VZanhUVXpnVHQxWE16aGRRZU9wMXNZbmtGcUNwciI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740618638),
('HqyR8NRM3pQKH6xidOWy7sbEvRgWdXiCEpoDEt8u', NULL, '101.198.0.188', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYnljRWtiSjJ3NGNvaTRlTXplVVI0dXlVRmVJMmJxazJuY3lDZjJIZyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741624904),
('HWmdQhief2JCIztZQCoBeE6dlOtXJ6UsHzg1NPRI', NULL, '43.157.156.190', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicmlGY0s3VHljQzJRNXI3R053RDBOdzNRbGlOSGZab2lpTjlWRnhwZyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741141470),
('HXdrM0fCC9AVvyQgvLcwkeFpaCKmzB0NBJAC1maR', NULL, '185.191.171.18', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkk1cG9VcHZaSGxGeEtOa0VQODJJbDlPVFZLUUxHOGw3VVVjMk80MiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWJ1cmdlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741330691),
('i6y6DmXHhEJBXvxkrty8NoZpOKyiJJmCpkiRYMUC', NULL, '43.155.195.141', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoienVnRWMxVVNkVG1oc2labFZxQzVtQkVNZVhWd1QwbHJ4RTVpZDhyMSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741452768),
('IGF2BIcVV2ibFMoNXBpOv94kEd9HKqNLgLAyHW5R', NULL, '43.157.201.184', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkFEaTd3eHl2M2dPenBZQ1VnSktJSVIwY0JiMWlQSTZwNnpvQVhxRCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741941326),
('ih85Xu8iZD3HZgekgm5IvVcb5znUCWwZ8dqQqX4B', NULL, '54.36.148.129', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZlBRODFjdlZkQWpkc2dROXlxRXMyWEZMU2ZvWUNmbVBmUnVvdm1yNyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741645276),
('InPADFhIOoUEmP9FUiEWsC6C3qPqIRJky28WGwjZ', NULL, '192.241.179.235', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaTJINVZwaVgzaHBoMzlzbUk3dnFyM2ZqdGVZMGFpVjJsYms3RkZESSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741465701),
('IPFBjb1OGwH629PmsOSz5vfqxo3AbzQs3V6ruQZK', NULL, '185.191.171.3', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3YxcjdHekd4RjUzd0pwR2hQUE12NFZQR3laaU0xNFpYS0thNm81eCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741307058),
('IpXhHAndCzIRg27Lzq5cYYpYEVfA0OJCC0rOeFDu', NULL, '54.36.148.31', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMlRtQk01cTM4RTBuSTBvMmhBZVJTMndQSHYzUlg5eFQzbW9oRXNiZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740964613),
('ir9MJyB9k6TceolxntPb53wrbQPs74ZM9F7bCPwF', NULL, '43.157.201.184', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMkF6TjZpeHFVQmI5YkNyVTZUeWxrYjdsNUowS2Rad2pkaHFWZ3NSdiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741138619),
('ITjcUEjxQhaa2ONgYPSPybo8ksWZcn27mnBvaWqy', NULL, '54.36.148.241', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU3JWTTRQZnNjVE93SXh4NUVvUUVlcUlSRjZjM2tBRXNXWXk1VUtVRSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741394913),
('ITYCXx4RElhbREI0E8D3OgoaVKZCm9cloj7E6clH', NULL, '54.36.148.109', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibHkwcHF1alY4UHdNQW1JeUdweFJ4am92dTNLMDlRNkNKbGNuakZNeCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PXBhc3RhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741664472),
('j17FtH0ZipQmGlj2vQdWUMHp6z7hzGBhNP1hGydL', NULL, '49.51.253.26', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZllWZ3I4TkJTS3VzUlN2VmhybUQzTHJiZ0U5ZDE5N0g0cmptdHkwWSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742001321),
('J3VxStc4drZFTDsV4bfc9b5xV98vXrbvcSSfoGIY', NULL, '54.36.148.23', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWw5ck5QYzlWZUVJUmxNRVFkbW8xdDB1WmVia0xQc243UUxDTGo4ZSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741379914),
('jfRdbGWsNen7kPbIrFiOYy57ZCPRGOe5XZbFna11', NULL, '54.36.148.249', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkJMNUlSZ0hqNVFLcFN4MFZuSUNrbzN5bmdvNW9RdVpWZFFmR2RaSiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741380960),
('jL1A0spu7eI3yYWuEd4FTHj5g7PEjzHf22CfPcK0', NULL, '54.36.148.133', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDg4MDJvamxnTU5VbHdSZEw0Q3N6QlFNTFlJU1YwWERZV3I5ODhTUiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PXBhc3RhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741183113),
('jNBPL23VjYYFdt6pUlvJusQaocDVZsBjHwqZtpvo', NULL, '23.27.145.176', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM1NUVGZiN1NWYjJKZDJCaXdoTUxkZGFGNDJsSXFOU0dORERmU0ZFdCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740671303),
('jqbkNuLvfq7z3EZl0m60ojBtTYWyRIMrrfRXoDkk', NULL, '66.249.77.46', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.6943.53 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiajdwRmxhaEdLcU56cHZWRlphMWFQbDl0clZSVnh4WlB2dUhwS2JhSCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741186995),
('jSmT57NTSCLOLqKGTcCSabE7I79N8Q3rL39AUGAw', NULL, '147.182.149.242', 'Mozilla/5.0 (compatible)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSlp5V3FONmg0Q1c2ejVIanVmdndmeGd4VEtTU0R3QkRRRWZkRXU1ayI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741366722),
('jXagkRjufveO4xZEvBdnf9LkhLtL8BalN0c2I60R', NULL, '85.208.96.195', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNXVRdEE2OXNYRzBvRG1zb3dwbGdCOUg0cTFzMHFuSEl4dlloM1pDciI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWNoaWNrZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741354030),
('JZWHLSgrJz5j9ZYV7340NZUdhe9CmvaiicRBwjpa', NULL, '43.130.39.254', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaXJ0azZKUlNRbEVBajVadDFNYWJxck94N3pTUFd1dGRpMk9DWXBFVCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741490219),
('KlIl2B6pvRWo7zKYgjiINav4KTyj9zpVZUYYfkvz', NULL, '54.36.148.255', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibjF6bFJRVE9kaTdITndJcko3RDNxa2FySEFEeXRrcnBhc21HMHF1ciI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvbWF4aWNhbi1waXp6YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741376338),
('kLnJSieYHpsjkZIYggW8PBvfyEs0ehZQARo6s9Sc', NULL, '66.249.66.199', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.6943.53 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicDlLNGlTd2g4RVpFQkRCMlBURnp5MEIwWFlFV3RPcEJMNElHa0NkUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL3F1YWxpdHktZm9vZHMtcmVxdWlybWVudHMtZm9yLWV2ZXJ5LWh1bWFuLWJvZHlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741107495),
('lCrKjnnapS03jOhRimmUGjQTzFJzTZY6RiGRzI09', NULL, '66.249.66.195', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUDhGQVVCZnlFdUQ3RGluNUdwWVJrQ2lwcFFuOUNnME5wb0ZzQmxlWSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740950036),
('LitVwH5uon9M5xAuFYGrjSuM9Pz8C7YzYQgKd1kH', NULL, '54.36.149.27', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHVWR3NOQ0lhOFB5Y2piaGRZaFF2V1hqb3JFd1h5bVBTc1p3NkQ3cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9wcm9kdWN0L2NoZWNrX291dC5odG1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740865778),
('LL9MRBvElAOVLvt0vBhVT7UrlyXxaJ4ngWoXlcpD', NULL, '43.135.186.135', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSDhXVHNraWNHaVBLRVhiTFpxUFdJWHZHdzFBWVppbWxtbVcwZDBuayI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL3F1YWxpdHktZm9vZHMtcmVxdWlybWVudHMtZm9yLWV2ZXJ5LWh1bWFuLWJvZHlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741982103),
('lnGBOyGDCqQxlwrhfWc1GpJ3A15tEIDC0ZIlB06J', NULL, '27.115.124.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibm9CV1hLcGhoUlJxYVVkTHF3TW1UOHlRNkpBdXFSbkJCbjBzeTRYUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741619157),
('LXF0HadJKUaUaUSLBdgt29A0N5KCosFjXhaPdKYx', NULL, '66.249.66.195', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.6943.53 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGhBM1dCZjd2cDBWNFFZWlAxbjFiQVJkZzhHTFJzd1pUbW4yeFFGQiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740638542);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('M5JAU6aIfupVWH9waYoHe2DaB8gT8GNTt71fLON6', NULL, '54.36.149.21', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM2JKQlNXUDZCRGJSMEtaNE84emVjdFdHcVJBWHh0cVZvRGI1ZkNOYyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWJ1cmdlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741666741),
('mbgiEunt9cccQ3pCFBsxPyHHjm87nvAPkAvFtxMR', NULL, '3.8.90.37', 'Mozilla/5.0 (Linux; Android 7.0; SM-G892A Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTndyVjBZbFJneXhyYXFBWGx0aTUwa29UTDlwUGo4UDBYU2kwS1czcSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742032250),
('MdbFePRbV6E8CEcmUmusguPCqhZ8f0Tp9sVd0Dtm', NULL, '43.130.39.254', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVh1azdsRFNtdlFuWXRRbnFOME41UlFlTEJleTdmWlhGdXk0WUY2eCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741399920),
('mGcQCjpSkcxmhZtOrxGZ4AXYh6PnmsttFA9qERkH', NULL, '54.36.149.24', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQk1GNjlhaU5IOThXYkp3VWVWTm1NaHh0dmxRbmt5c2RMWVpXOGhodiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvbWF4aWNhbi1waXp6YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741933034),
('mmMq7QPeeLaNFyDRc64WzWcHbowkqELHJMfBy98a', NULL, '101.199.254.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1hjRXhNN3R2RXlwbGNiQkZINnV6ckhLaDN5SzVRTkNnUHhYbUl6aiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741622873),
('mYfaLIYjq8BxEqwTMVRaAqE06YNC9INukhEqcsrY', NULL, '85.208.96.195', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOEQ5SWRsSHhRUkJKNWVPa1RQNGtqOTRlYVlIWHo3VlMzU3pHTTFCUSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvbWF4aWNhbi1waXp6YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741314289),
('nAN5mTtESPHYn4GoZveQt7vHYLCIrSthfTshlcUx', NULL, '54.36.149.96', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzFHTnEzbWNWVDVxWXMxdHE0emY0OTJJMEVuck9WUWZHMURJbnJBNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9ibG9ncy9pbmRleC5odG1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740716183),
('nDag1xo4uT2sWpZGXTj0Ui64PH1OX4p2RAZbVuhv', NULL, '43.153.19.83', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY2RIZkxkVG1ZdUtHYW1CU2gyR1BSVFpXbzl1TjBLaDQzZ3o0eVMwMyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741971969),
('NH0lSFubTdgOx9I2sc1LpAtC0degbrsoXsQiC2Yz', NULL, '172.178.141.141', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXJDM1RPNmw4UzZscTZUNVdDVWF5ODRaVHhBeVV2Umo4emF5V1FJOCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741444498),
('NlUrIh3d7ubxYT7TbxSGzC7YBQTUPfT4X6RD2cXl', NULL, '54.36.148.15', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEpDazhUN3JFb3RVTkJTb0ljVTJpb1lpeUtXM3VSSUV1NzVLeXFZMyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2RpZmZlcmVudC1zcGljZS1mb3ItYS1kaWZmZXJlbnQtY2hlZXNlLWJydXNjaGV0dGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741539058),
('nOERo85B1cmKTeZRLgZJEMvjq8Z4JFRS0860nkDs', NULL, '43.153.10.83', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWRad1RIbWdBWFNWMmVleW9KTVRGWGxoTktuQ0trVzBzTTJsODg5ZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741586064),
('nRduiFhzWF9o2kCOvRQuJfag7pGjHRvkExv7BBYB', NULL, '43.157.251.48', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQXFZNDFDam40ZWMyWXZwbDd4U3BRbFN6WFZaR0pvRDRNZklWbzkyZCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741142158),
('NSVPScfFzVQa6zlnwFakev8xLrQnRylmEjr7mTbF', NULL, '54.36.148.203', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia2ljQWdyRHNjVVRxN3ZCdDdDc1RndWUzMnBVcmVmMnN0SG8xSTFvNSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo3ODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2NvbXBldGVudGx5LXN1cHBseS1jdXN0b21pemVkLWluaXRpYXRpdmVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740620186),
('OBp334Y7qWj29IgEDtZX9bRuJEH63dnPVaFtjqKP', NULL, '54.36.148.113', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieExmcWJZQ2RRTVFVOU14QmYzWnRzZUVvbUhJSWVVcGpEZ0NXMnRIUiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PXBhc3RhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740680260),
('OCSFe6Gbp8PwRcmfTA49HSVP8xgez6wbco3k0BJR', NULL, '101.199.254.235', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1FlaDJDQWdQUmhVdHowVEloU2owVDhNdHpaZUlGWmNWcEVsVm5PVCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741622844),
('oddxMAbc7uGDBXO3VajarUQRQEH885C7vyqNaafC', NULL, '54.36.149.37', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTG10eDlSY0JVaEY2SDg5TVZGTW1WNFIyUm1jdkxPaWtkQVBQbk5oRSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741849659),
('OkGjM09Bf8hZiA8aFPizTUK9Xzo8Dw4wSJ0v8H1K', NULL, '185.247.137.87', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUldzS2dhOXk2cWR5ckpPaXlTOG11SVpUenlXNmlmNkZ2Rm16MlQ3VyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovL3d3dy5mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740846488),
('okSVYJnIsc5pRaccn2ujKW6E3wxwt7y3oHHe7yLY', NULL, '170.106.192.3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkZzUEE2QTd3cmdLYzR1S09NT2xjNzNrMFlYVmVPWFVWeFlpT1p0MSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741803143),
('OqZUejyygzwFr25luO0s0dORC4cYcq1c6vW63tpr', NULL, '43.153.135.208', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSHgyS0JBWVBjZjlCVVZtczVHUkVRMURYSzNIS3lRQW1OOG5SQXF2WiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741383674),
('Ou96mti4GvGYjTjrfKhEYlUwuN51YcAKRi6nap4J', NULL, '3.140.190.124', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5977.400 LBBROWSER/10.1.3752.400', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlZzWW94WjkzRVJqeDIwM21XU3Z2OXJEUmk3QnJEU3RGQWJpUHliUiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741218244),
('OW6aFXGOzRHQDEQGnoWJ7sDxztQrpf7DSH4soelP', NULL, '185.191.171.12', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV0ZHbTFUYUc4ZnM2a1ZrVmpVM3JDWUVXSWp5SVZWSEhLZ2dSTHhPeiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741350194),
('P0T8wl7tFlPi3ydb5RtxYuAZJjTFvh2qR3Uiq3A8', NULL, '13.250.118.192', 'facebookscraper/1.0( http://www.facebook.com/sharescraper_help.php)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWEFyakZBTURXZ3Q1SVhFMkVKUXVWNUJMcTZzOWZEYVlMM0JCNENqeiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740680372),
('pdhLGMDxLGSB0TuAiH54oMYNmoZuDoKnlEang1Fc', NULL, '124.156.157.91', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYnVHaFc2ZHZma1FkbXdPQ2ZyMjVBaGlXUVRLT0FGQTFWUnhCeTYzYSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741557144),
('pEAcZoutqxXq58ZxrL0vyudf3zR6cXiGu9Yr8v0S', NULL, '185.191.171.12', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaE4wZ1hrYVFjYVRrekFJdjFvZWlOaXkzRURoVEtYeGFYaHRXOFRjMiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741325184),
('PFzM46knIdLkBgVmecEpYLfORanTvHHiC1dgpe2l', NULL, '101.198.0.151', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUHlMcXp2VGxYdzNwcXZFZ21IOTZkeTluakpzMWNvUjNDOGRmZHc2SSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovL3d3dy5mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741625360),
('PTEoHp6Kl3LxcixnfzOSTLlv0fhK9EjPCm4qhLkV', NULL, '101.32.208.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicE56aW5XdWVoNElhWWFoSWdoZ0lMSEZwTGRBRlFnM1NrT3VZTFFGNiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741135828),
('Q2DuvxW40GOdiY3cMc5BIODMXJNtmYS9IJlRiycJ', NULL, '213.209.143.233', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3835.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1JETkJPaDlQY0hOVzRBeTh3T2JuNXMzNzZuaXZLenp2bkhvSDUwdyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740618638),
('qF5OyJmAEIU2oaoMvW4h8Ql2xLRzSyTauskjQACZ', NULL, '3.140.190.124', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU2s3MlB4b1hqcHpWYjRxMXFrN29LYnNZWE5WM09FNk1sYVBIcUpJQSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovL3d3dy5mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741183702),
('QmVcoaodfvihXDrMvZXIysXSp5r8S2j1KgQLpNW1', NULL, '43.157.158.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnBhdnBZdWV0dmJtc1dDcUQwMjVLNTI3N1FqSkhMZHNjMVkwd3dpUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740686105),
('qq0lJEQlAGTNxFtplJnU8wC29Lv2Pqnt3LCkJhxZ', NULL, '66.249.66.195', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicjk1ZDhIcTN5dWZnMHBVSHFpQnVmWTdUWUxxTHRCNFV6SDA4aTBRYyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740950036),
('qQ9XCZ4dX50MoVY80zuFjgKI9T75r4vQK7x4Atb5', NULL, '47.79.122.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0RxYlRQTUFWS1hsOHN5UXpRVWJYTVJsdHh3NjVUcmUyeGU0YVNpUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9jYXJ0LWRlc3Ryb3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741623951),
('qqoaWSmBVpOhLp9OVaJjjtnrHGj5DvUrxr9ux37I', NULL, '3.140.190.124', 'Mozilla/5.0 (Linux; Android 7.0; SM-T819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.111 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZmVjZmtlSVJKV2dhYVYwOFJ5TVFTaUlZejV5T3pzVzVnQlhGNmlIUSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741183702),
('R7ltotJJyJmAEhohsLtGwCixQI4SQ5jknL0bt4Ux', NULL, '66.249.64.130', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.6943.141 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYThEaVFqWEo4TXlhSFJiNHdjTUMxWVJOSlVqUmVLcDQxWWl5N0V5ZCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741949013),
('rJ2fQgdnYiPbgyBydqGIycYsB2Tv30J1trAn570Q', NULL, '43.157.38.228', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWZndDBRcjhJeUN3ZFpTc2RDbXhZdHN2UDRGaE5zT3hIUkt2bWpiMyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NoZWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741142804),
('roYLu01OBIQMQTUrmsXoR0Krb53ftCxIOF2T3mYa', NULL, '34.253.197.213', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVlpwUkM0cEhoQk5nRzFLRGZsMk1yTlprQXRCNVBaZHl3QkhlMURBVSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740780080),
('RTGzrNo3ESIh9e6aO7kmFENUPqq1OnTLRi8ULVl2', NULL, '54.36.148.181', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRlU1YWlWTnpnQ1MyRjZCVzh3TkdKYUNrQ2k2SWpxa251dUppUFNHZyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWJ1cmdlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740678744),
('ruaGROZCncjMwP7m4wPGaKb6dDRLBCr7XIQxeYvS', NULL, '170.106.35.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieU9SNkJBU1lBSGNveGhhNExnbnU1cVFkZ2RDajNCVUhBaHBTUTJMeSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742024648),
('s6o4otZSKFmIWHZVbBi85PVWw07A8z68nfnfm5cp', NULL, '106.75.66.166', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 9_2) AppleWebKit/535.54 (KHTML, like Gecko) Chrome/99.0.2504 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibXd4N0tQUmRFN1FwRXJCbGk5Y2F5c2Z4eVlXbEV2NFBMOTZnSEp6VyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741818631),
('sEWndpZpdhkWei1AiWeHSEukhow8m1b2TyVlu1rG', NULL, '20.171.207.102', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUNkYWxvY1pCam9veEExMFZxT2RXdThuUXhiQjV4MTVxNlAxdm82ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS93aXNobGlzdC86cHJvZHVjdElkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741907821),
('SxC9RDlzXemVjZq4zDoyTpRUixbk6Ssau4ppPt4a', NULL, '44.242.250.16', 'Mozilla/5.0 (compatible; wpbot/1.3; +https://forms.gle/ajBaxygz9jSR8p8G9)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEFaVTJCeWllQVllcVhxbmtEeHRUUmQ0VmZZQzhNMUswOFh4ZnVrTyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741899214),
('t3N8CuYUoK5n1gUsl8Ry0nix3gJEWEnXCVWInwCC', NULL, '54.36.149.27', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicjZyc09oWnJyVnF3YnhGRzB1ZXhqeERucVdnbEVGWDZCdDFPMDdJeCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741842468),
('T3PvtkBFLnZz7Zw8eYqT0DyAgwXW3eaI9yE145G5', NULL, '85.208.96.201', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMmNHVndGUEp1RTUyWFNCM3FiQUhzV3RhSWJDWmdvWjdDUHJGNkNjeiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741348836),
('tdS36YoL4gGRB6H0zKNl4gDoDxUx5UOpvcbFFj8J', NULL, '54.36.148.64', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNlVLSDNkcFBLekFUeWZOSkNpdkR4eXF5VUd1aVo3ZGRWZkh2eEFIUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL3F1YWxpdHktZm9vZHMtcmVxdWlybWVudHMtZm9yLWV2ZXJ5LWh1bWFuLWJvZHlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741096801),
('TplO3WKczAKrZtwaVLEZmSAsujoUHhbr95xdN6qu', NULL, '54.36.148.252', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTUdJbVlhVjRRckZtRmRiSWtNb0Y4cEZ5U2pnbkI2YkU2UXM2dmsxMSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWNoaWNrZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741654760),
('tpOssyDCavgxdjGn8sC2BzDueeVGtBjgx8urBO1t', NULL, '85.208.96.202', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib3Zoc2ZlZVJkdjExVWxtZzVRT0pDTWh5TGcwOFNKZkpRekl4anROcyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PXBhc3RhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741352937),
('tromJeagMiS4EjDTPEUmcFYp9Ux8c6ZgRxjzHu0d', NULL, '54.36.148.140', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQklObEI1Y1MyU1JyQTl2S1NJdVNWdUlpYUQ3YXRBcnI3OXdXSWlGbiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvbWF4aWNhbi1waXp6YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740879758),
('ttDQra7PxcMKyujTvoeK9JVNvJad6G6tKEcFo7My', NULL, '85.208.96.212', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3lsRk16a1ZaWENVNnhqT1lvZHNZTzFRVzR3NTBNZnVrblRmNkY1SyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL3F1YWxpdHktZm9vZHMtcmVxdWlybWVudHMtZm9yLWV2ZXJ5LWh1bWFuLWJvZHlzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741362589),
('TtSCoPSMAGbqoXCWD0HF6YVWrqOk98qKsGWGvNa8', NULL, '20.171.207.102', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkxyNWpDOXhrbXJ2RHBuRElaQTdHYVhQQUdOcXFsaU1ZMHJwSVZ2QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9nZXQtY2FydC1wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741907325),
('Txc5UczHAsX92yHT4alZb5HLOiivdSbRQkUl3npv', NULL, '54.36.148.119', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieGVtQ29rM1R5d05BZW5rcm1NTnBvNjFUcTFGTkNqWDZoR25qNThIVCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWJ1cmdlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741187453),
('TZDBhjEQd3ZPTLsKZIGkikuW3K48XMzqP8A4T59D', NULL, '170.106.180.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidTZtcm0xQ0N6VTU5S1o0MGN1cEVDZ3JhRnQ4cnhQTlJOdTkxNVJ2SyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741545817),
('TzRPeHyxlz6Q9iiA6EC8wJ9lORPvLZWOrYMYTn8D', NULL, '54.36.149.91', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWDd4M3h5djZ5b2ZDMFdhdHV6R1NYbDVFODRSNFNmRXQ0U1F1SjR4byI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvY2hpY2tlbi1idXJnZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741290540),
('u6zEo8tpletC2xYZQgpyhGWDtqkTQrpOaZUrXleN', NULL, '44.193.78.48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.75 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidm1qazJJampJUVpnMjJDRU8wVWRyZFl6eXhTM0NOSHY2a3dhcUFodSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovL3d3dy5mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740836633),
('UI55pjdTvDMRjbzIQEG3UHMGFBy7DGJzq5r23Ppo', NULL, '20.171.207.102', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlRvUEMyTWdEOXg3REtDQWI1R0thN1hrZjU2TmZVYUd6RXhiUVJ6ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHBzOi8vZm9vZC1wYXJrLmRldnRpYnJvLmNvbS9jYXJ0LXByb2R1Y3QtcmVtb3ZlLzpyb3dJZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741907241),
('Uug0vq1ucvQwNfYQxQlAZnxgCyOxovi5A9vJ6dtH', NULL, '43.157.179.227', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieHRKODdTbEw3VnRRQmZWSlFjRkVpdnVPcTh0V0lYemJ2MXdLQlNUQyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvbWF4aWNhbi1waXp6YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741139761),
('vCx5juFP6FB1wwiloOxDeNKtEZgL1jsa7tjF6ykg', NULL, '124.156.226.179', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMlUwQk0zbEl6MFpDWVBMN3ZoaWxjOE9yVjVuTmQyRWIxSER4N0w4VyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741984857),
('viVNpLhyn5pPYMBDlkSaqDBdj4h0DREe3Lc3LUKd', NULL, '20.171.207.102', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieTg0TXc1dkgwNUNzd2J1RXg0ZlZhVGxWVnhXQXh2QURwM0o2M1NBViI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741907174),
('vRZi4KebrURVWg70uA3spyT1vPhywl5kLrAa0t0N', NULL, '54.36.148.191', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQlp1MFdMdU8weEE2UHFzckRnUUhRQ0NSdWF2eU54NEVLdTRzREJTZSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741377556),
('VtaHEt90lDiWkAMizPEl2QR7RJC1gznSwh2U1t6x', NULL, '52.81.87.90', 'Mozilla/5.0 (Windows NT 8_1_1; Win64; x64) AppleWebKit/560.53 (KHTML, like Gecko) Chrome/52.0.127 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMDZ6SW1wV1pwZlUzZ2JnSWUxdGRCbXF5bzNJaWtvR0pvb2VmeW9JdCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741818582),
('wHKlqMgEMUK2x309rakVoL9zN6Z3WrzTcadrZWxA', NULL, '43.166.136.24', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidndhb2N2MzNobE14MXNSZ2ZmcHQ1V3duQlhqSENYcU80NGY3c3M2QSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741686655),
('WhN9BvXdCPeHavE7l7dvmlqmyk2F8aomjreaNt5V', NULL, '49.51.252.146', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRVJseElZT1Rrc0Y0S2JjeUF6WEM3RktmS3NOWkxOd0VIWTM0TzU4NyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3QvbWF4aWNhbi1waXp6YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740689055),
('WmpTsKgbBpM2Sa9G5qRbwILphCuauYW60wXfX2EH', NULL, '23.158.56.51', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:125.0) Gecko/20100101 Firefox/125.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmlydDZoVFA1ZlpDTDF4b1l1QVU4V3pzSG1pSGFmbmlUQzhPVldvZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741847908),
('WRA9WDdkyPXbnvOyuCghJuHi2pWXvBIFVbBKU3z1', NULL, '54.36.148.112', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRHo2NVpxMEExdTAyR2dHWW5FTnVQVmFVdG9pNzI4Q0RudzBDUUdhWiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo3ODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2NvbXBldGVudGx5LXN1cHBseS1jdXN0b21pemVkLWluaXRpYXRpdmVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741564990),
('wRubboPNSCagjAsDaLr75z5vE0N6x24fiVgGPTRe', NULL, '147.182.149.242', 'Mozilla/5.0 (compatible)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUTdDbTVaSXNSSWVlb2ZaM1VFbkxiTDdhc0lPeTZvMDBGV2xKRlJSRCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovL3d3dy5mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741366722),
('x0PpIrRbSXOKIMeeEAWN6xRhg91dSIWrZ77BhKUo', NULL, '23.27.145.1', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUVl4YUpMakRGZ2lOb2dGUGF0VmlqcVVuNmV6Z0RybEhlVnc4RmM0SSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740712746),
('X6yEgWxuVxc0T7g3hQIDoAehwtKDfio6fcQpqKOS', NULL, '49.51.203.164', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYldTZjdySWN6Znh5UVc5VjNTTWw2SklRbmx6OVFPVmZES01vYjBsZCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2Zvb2QtcGFyay5kZXZ0aWJyby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741902416),
('xEFd22nw8vfn7rBuOk9yQBB8eABICEJhywnlzylz', NULL, '54.36.148.218', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEJGWDhma0psalhKRDlQcWxwd2Z2TmJVa0NZbzk2WW1WV1BtWUdQZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo3ODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2NvbXBldGVudGx5LXN1cHBseS1jdXN0b21pemVkLWluaXRpYXRpdmVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742058606),
('XpGHv7IqSbjxEIjTQI5FEbfemvceFboilAfOjiEq', NULL, '49.51.183.220', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVlPWlpUUnd4Zm5ETDlYUXlOSW9jWlZ5MHpTc081UW81SmlwaHZxUCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741985423),
('YKKVo8nwB3sj4yntHZyXg3xnqwQNLwakZfeQKkdz', NULL, '54.36.149.43', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRjVaa0ZIQWVIYXJNR0VoTVZLdzJ1SHRQV0JYVDNzUlVhY1R5RTJGdiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740815457),
('YNe0fsNUS9rrZLfjhVYAwQVIkfm5MeoXkLvtLwtq', NULL, '54.36.149.73', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid1FqOGNwMkFObTlUU0UyeUxnMDVtd05hSk5xNm44M3hnS3EyeVdCcSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740955245),
('Z3lZmezYJWb93wZFHy9wCouX7auzIsd48SjzKZ5d', NULL, '23.158.56.51', 'Mozilla/5.0 (Kubuntu; Linux x86_64; rv:122.0) Gecko/20100101 Firefox/122.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibzFRdlJQaVRZUGR4STEzbUswMXppREZQRGtjSjFKYzhVMlBsMXFvcSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741682368),
('Z7cXDxNkF1eE0lK7DB63WUGPrjJIlhlHcz5lNkgp', NULL, '23.27.145.168', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZGFHRlB2RUM3WElWQ0l0aWlQMEJFOTVNQTZnQ25vMkZtbWxpamxjQiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cHM6Ly93d3cuZm9vZC1wYXJrLmRldnRpYnJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740663646),
('Zfim9gnEmVg4lWiTmbyRnqKOSNzpZYGKg731kNjx', NULL, '54.36.149.61', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYjNZVDlBNkRnR2ZIU0YxRDZJSlZsYUFLbHBJaDNxN2pibUpUeHluUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzP2NhdGVnb3J5PWNoaWNrZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741161560),
('zqiADiBKfiRRpPgbraers7iKiosVqQXPiN9HK2HP', NULL, '54.36.149.39', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGFCQTdGeklEUGF2VVMwQzdsMEVlYktzYlBFRUNLSEs2TE5rSElRMCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2NvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740951740),
('zqlsxURoi4PI38rRavXspUFDbNvSj6GGn4Rrrjp0', NULL, '54.36.148.86', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRkJoOVQ2NnpaSGZndUJrS21hUjN5Y1UwVEs3RWU0ZTZoR1IzSm1LbCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4NjoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tL2Jsb2dzL2RpZmZlcmVudC1zcGljZS1mb3ItYS1kaWZmZXJlbnQtY2hlZXNlLWJydXNjaGV0dGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741077518),
('zxP7LJDsKcD4uHj7uiC3EEw81D8kLZG5pZZpTd4F', NULL, '54.154.233.80', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNmZjM3BTMFYxZ21OcUc5Y0NDQmRPSEw2bFpWVUFYdVhKS2tjTGpRaiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9mb29kLXBhcmsuZGV2dGlicm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741239192);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Food Park', '2025-01-14 01:46:06', '2025-01-14 02:27:32'),
(2, 'site_default_currency', 'USD', '2025-01-14 01:46:06', '2025-01-18 11:19:17'),
(3, 'site_currency_icon', '$', '2025-01-14 01:46:06', '2025-01-18 11:19:17'),
(4, 'site_currency_icon_position', 'left', '2025-01-14 01:46:06', '2025-01-14 02:47:55'),
(5, 'site_email', 'faysaltibro@gmail.com', '2025-01-14 02:34:02', '2025-01-14 02:34:02'),
(6, 'site_phone', '01712261035', '2025-01-14 02:34:02', '2025-01-14 02:34:02'),
(7, 'mail_driver', 'smtp', '2025-01-27 01:49:07', '2025-01-27 02:27:11'),
(8, 'mail_host', 'sandbox.smtp.mailtrap.io', '2025-01-27 01:49:07', '2025-01-27 02:27:11'),
(9, 'mail_port', '2525', '2025-01-27 01:49:07', '2025-01-27 02:27:11'),
(10, 'mail_username', '82b060d0bdcdae', '2025-01-27 01:49:07', '2025-01-27 02:27:11'),
(11, 'mail_password', 'd68da9c95e3655', '2025-01-27 01:49:07', '2025-01-27 02:27:11'),
(12, 'mail_from_address', 'faysaltibro@gmail.com', '2025-01-27 01:49:07', '2025-01-27 02:27:11'),
(13, 'mail_receive_address', 'faysaltibro@gmail.com', '2025-01-27 01:49:07', '2025-01-27 02:27:32'),
(15, 'logo', 'uploads/logo_image/1822756501017819.png', '2025-01-31 03:30:45', '2025-01-31 03:34:20'),
(16, 'footer_logo', 'uploads/logo_image/1822760575851017.png', '2025-01-31 03:37:00', '2025-01-31 04:39:06'),
(17, 'favicon', 'uploads/logo_image/1822761550164824.png', '2025-01-31 03:41:18', '2025-01-31 04:54:35'),
(18, 'breadcrumb', 'uploads/logo_image/1822757118642737.jpg', '2025-01-31 03:43:58', '2025-01-31 03:44:09'),
(19, 'site_color', '#d14141', '2025-01-31 05:05:47', '2025-01-31 05:05:47'),
(20, 'seo_title', 'google', '2025-01-31 05:21:25', '2025-01-31 05:24:33'),
(21, 'seo_description', 'Seo Description', '2025-01-31 05:21:25', '2025-01-31 05:26:34'),
(22, 'seo_keywords', 'food,Tibro', '2025-01-31 05:21:25', '2025-01-31 05:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `offer`, `title`, `sub_title`, `short_description`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(4, 'uploads/slider_image/1820886365297143.jpg', '70% Off', 'Eat healthy. Stay healthy.', 'Fast Food & Restaurants', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.', 'http://127.0.0.1:8000/', 1, '2025-01-10 12:09:20', '2025-01-11 01:46:57'),
(6, 'uploads/slider_image/1820936577373485.jpg', '35% Off', 'Different spice for a Different taste', 'Fast Food & Restaurants', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.', 'http://127.0.0.1:8000/', 1, '2025-01-11 01:27:28', '2025-01-11 01:46:52'),
(7, 'uploads/slider_image/1820936668316018.png', '100% Off', 'Great food. Tastes good. tibro', 'Fast Food & Restaurants', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.', 'http://127.0.0.1:8000/', 1, '2025-01-11 01:28:52', '2025-02-20 01:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `icon`, `name`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'fab fa-facebook-f', 'Facebook', 'http://127.0.0.1:8000/Facebook', 1, '2025-01-27 13:18:35', '2025-01-27 13:18:35'),
(3, 'fab fa-whatsapp', 'Whatsapp', 'http://127.0.0.1:8000/Whatsapp', 1, '2025-01-27 13:18:53', '2025-01-27 13:18:53'),
(4, 'fab fa-twitter', 'Twitter', 'http://127.0.0.1:8000/Twitter', 1, '2025-01-27 13:19:18', '2025-01-27 13:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '2025-01-27 12:06:48', '2025-01-27 12:06:48'),
(2, 'admin@gmail.com', '2025-01-27 12:09:49', '2025-01-27 12:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `title`, `review`, `rating`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(2, 'uploads/testimonial_image/1822026521515609.png', 'Isita Islam', 'nyc usa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam', 3, 1, 1, '2025-01-23 02:11:37', '2025-01-23 02:33:14'),
(3, 'uploads/testimonial_image/1822026589290117.png', 'sumon mahmud', 'nyc usa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam', 5, 1, 1, '2025-01-23 02:12:42', '2025-01-23 02:33:03'),
(4, 'uploads/testimonial_image/1822026661631572.jpg', 'israt jahan', 'nyc usa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam', 4, 1, 1, '2025-01-23 02:13:51', '2025-01-23 02:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `trams_and_conditions`
--

CREATE TABLE `trams_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trams_and_conditions`
--

INSERT INTO `trams_and_conditions` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-family: var(--headingFont); text-transform: capitalize;\">Your agreement:</h3><h4 style=\"margin-bottom: 0px; font-family: Nunito, \" segoe=\"\" ui\",=\"\" arial;=\"\" line-height:=\"\" 28px;=\"\" color:=\"\" rgb(108,=\"\" 117,=\"\" 125);=\"\" font-size:=\"\" 16px;=\"\" padding-right:=\"\" 10px;\"=\"\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p></h4><h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-family: var(--headingFont); text-transform: capitalize;\">Main responsibilities:</h3><h4 style=\"margin-bottom: 0px; font-family: Nunito, \" segoe=\"\" ui\",=\"\" arial;=\"\" line-height:=\"\" 28px;=\"\" color:=\"\" rgb(108,=\"\" 117,=\"\" 125);=\"\" font-size:=\"\" 16px;=\"\" padding-right:=\"\" 10px;\"=\"\"><ul style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px; font-weight: 400;\"><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p><ul style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px; font-weight: 400;\"><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Solve the problem with code.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work on Client\'s projects &amp; In-house products as well.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Analyze the product\'s needs and find out the best solutions.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Work as a team and lead the junior developer.</li><li style=\"margin: 15px 0px 0px; padding: 0px 0px 0px 25px; list-style: none; color: var(--paraColor); position: relative;\">Collaborate with other teams by providing code review and technical direction.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores iusto error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus quo quae repudiandae earum facere eum ad qui voluptatum eaque.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p></h4>', '2025-01-25 02:32:31', '2025-01-25 02:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '/uploads/avatar.png',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'uploads/profile_image/1820585056673452.png', 'Admin user', 'admin@gmail.com', 'admin', NULL, '$2y$12$U3wrr3NE0yd6kEJK/gdNVunOTBJWOgh64o9Plr7Wwirg477QIXXza', NULL, NULL, '2025-01-31 14:04:24'),
(2, 'uploads/profile_image/1820860885500538.png', 'User', 'user@gmail.com', 'user', NULL, '$2y$12$h2qdpTp1qeq94mzAJFszAOHHaF0CLvzr2b.TooaNgIqV6qoXX3Cum', NULL, NULL, '2025-01-10 05:24:20'),
(3, '/uploads/avatar.png', 'Garth Garner', 'dibuz@mailinator.com', 'user', NULL, '$2y$12$nWcbMDd.s4ohTVI4CaHnbeG6wgukfNAeQEHc8UmDAqEQVNng1clW.', 'SkADO3zFIn9QQ8nA8oLwoFN6U5zQNO9V5kufnUpBVr3Y1RledVr6L1HfHpgo', '2025-01-07 01:46:24', '2025-01-07 02:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-percent',
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `icon`, `title`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-snapchat-ghost', 'Fast Serve On Table', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .', 1, '2025-01-11 03:20:58', '2025-01-11 03:20:58'),
(2, 'fas fa-cocktail', 'Fresh Healthy Foods', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .', 1, '2025-01-11 03:21:31', '2025-01-11 03:21:31'),
(3, 'fas fa-percent', 'Discount Voucher', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .', 1, '2025-01-11 03:22:27', '2025-01-11 03:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2025-01-30 11:53:15', '2025-01-30 11:53:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_delivery_area_id_foreign` (`delivery_area_id`);

--
-- Indexes for table `app_download_sections`
--
ALTER TABLE `app_download_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_sliders`
--
ALTER TABLE `banner_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_page_builders`
--
ALTER TABLE `custom_page_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_offers`
--
ALTER TABLE `daily_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_offers_product_id_foreign` (`product_id`);

--
-- Indexes for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_infos`
--
ALTER TABLE `footer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateway_settings`
--
ALTER TABLE `payment_gateway_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ratings_user_id_foreign` (`user_id`),
  ADD KEY `product_ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_times`
--
ALTER TABLE `reservation_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_titles`
--
ALTER TABLE `section_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trams_and_conditions`
--
ALTER TABLE `trams_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `app_download_sections`
--
ALTER TABLE `app_download_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_sliders`
--
ALTER TABLE `banner_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_page_builders`
--
ALTER TABLE `custom_page_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_offers`
--
ALTER TABLE `daily_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_infos`
--
ALTER TABLE `footer_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_gateway_settings`
--
ALTER TABLE `payment_gateway_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation_times`
--
ALTER TABLE `reservation_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section_titles`
--
ALTER TABLE `section_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trams_and_conditions`
--
ALTER TABLE `trams_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_delivery_area_id_foreign` FOREIGN KEY (`delivery_area_id`) REFERENCES `delivery_areas` (`id`),
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `daily_offers`
--
ALTER TABLE `daily_offers`
  ADD CONSTRAINT `daily_offers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
