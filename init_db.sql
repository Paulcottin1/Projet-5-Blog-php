-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 16, 2020 at 01:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_p5`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `publish` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `img` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `img`, `chapo`) VALUES
(69, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:16', '033221e6171dcf787996f8ea506c89c9.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(70, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:20', '088a5c73165587ae38e4601ba9c4ee5b.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(71, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:24', 'ce6ef0d3c85dfcd1774d4ddcc0300e28.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(72, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:26', '4e6efec3ab40fb9bdd460a9c0f8362c2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(73, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:29', 'fa5a55d723e7493d0710c3ebcc6471be.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(74, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:31', '2cb31890d8f129ea7350cca25c7badea.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(75, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:33', '36546c1640fbe18268cda1c682886e16.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(76, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:35', '2da9ac62e3a526f75cff7cd9ba309c9b.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(77, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:37', 'dbe7c3e0a078f3b564c6bfc73670090e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(78, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:39', '9c9602c85bf8e53254e67592ec22223d.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(79, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:57', 'dd579f2654a3c1a2f15ecb4caeab9562.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(80, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:38:59', '042134df678c10a254ad32cde7428da7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(82, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:39:02', 'fb7117173c53f5291c8b1afefa47ad8b.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(83, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:39:05', '5c8c156c3d5800ae2bcda7341eaad06d.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(84, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:39:17', 'd3c6abd897748e984ca4070004b6a7e8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(85, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:39:19', '712f0bd20c4d7d3bc5b729dcc67c758e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(86, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.\r\n\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:39:22', 'edaec1ac55b7c493438d7bf0139edcf9.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(87, 'Loremi ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor. Diam maecenas sed enim ut sem viverra aliquet eget sit. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Interdum posuere lorem ipsum dolor sit amet. Et odio pellentesque diam volutpat. At risus viverra adipiscing at in tellus integer. Id interdum velit laoreet id donec ultrices tincidunt. Pulvinar elementum integer enim neque volutpat.<br />\r\n<br />\r\nNunc lobortis mattis aliquam faucibus purus in massa tempor. Malesuada fames ac turpis egestas integer. Euismod nisi porta lorem mollis aliquam ut porttitor. Nulla pharetra diam sit amet. Enim neque volutpat ac tincidunt vitae semper quis lectus. Purus non enim praesent elementum facilisis leo vel fringilla est. Accumsan tortor posuere ac ut consequat semper viverra nam libero. Nisl pretium fusce id velit ut. Quam vulputate dignissim suspendisse in est. Justo donec enim diam vulputate ut pharetra sit. Tempus imperdiet nulla malesuada pellentesque. Ipsum dolor sit amet consectetur. Sed felis eget velit aliquet sagittis. Nisi est sit amet facilisis. Dolor magna eget est lorem ipsum dolor. Aliquet sagittis id consectetur purus.', '2020-07-23 17:39:23', '8abe4aa19dba6036318365321855190c.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
