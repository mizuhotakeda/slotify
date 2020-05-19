-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2020 at 01:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slotify`
--
CREATE DATABASE IF NOT EXISTS `slotify` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `slotify`;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Mickey Moussey', 1, 3, 'assets/images/artwork/mickey_moussey.jpg'),
(2, 'Buddha Zen', 2, 5, 'assets/images/artwork/buddha_zen.jpg'),
(3, 'Nuts Rock', 3, 1, 'assets/images/artwork/nuts_rock.jpg'),
(4, 'Cat War', 4, 2, 'assets/images/artwork/cat_war.jpg'),
(5, 'If I Were A Sheep', 5, 8, 'assets/images/artwork/if_i_were_a_sheep.jpg'),
(6, 'All I Want For Christmas Is Lobster', 6, 7, 'assets/images/artwork/all_i_want_for_christmas_is_lobster.jpg'),
(7, 'Bacon and Egg', 1, 10, 'assets/images/artwork/bacon_and_egg.jpg'),
(8, 'Fake 4ce', 2, 6, 'assets/images/artwork/fake_force.jpg'),
(9, 'Gyudon-don', 6, 4, 'assets/images/artwork/gyudon_don.jpg'),
(10, 'Coffee and Milk', 5, 9, 'assets/images/artwork/coffee_and_milk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Mickey Mouse'),
(2, 'Baby Yoda'),
(3, 'Carmelove'),
(4, 'Ginger Meow'),
(5, 'Shiro Poo'),
(6, 'KW');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Classical'),
(4, 'Metal'),
(5, 'Techno'),
(6, 'Hip-Hop'),
(7, 'R&B'),
(8, 'Jazz'),
(9, 'Country'),
(10, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(1, 'Playlist1', 'admin', '2020-05-12 00:00:00'),
(4, 'my new playlist', 'admin', '2020-05-17 00:00:00'),
(5, 'Lucky songs', 'admin', '2020-05-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistSongs`
--

CREATE TABLE `playlistSongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlistSongs`
--

INSERT INTO `playlistSongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(1, 2, 1, 1),
(6, 14, 4, 1),
(7, 16, 5, 1),
(8, 5, 4, 2),
(9, 33, 5, 2),
(10, 35, 4, 3),
(11, 1, 4, 4),
(12, 13, 5, 3),
(13, 14, 5, 4),
(14, 2, 5, 5),
(15, 6, 1, 5),
(16, 28, 4, 5),
(17, 38, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Acoustic Breeze', 1, 1, 1, '2:37', 'assets/music/acousticbreeze.mp3', 1, 5),
(2, 'Dance', 2, 2, 2, '2:57', 'assets/music/dance.mp3', 1, 8),
(3, 'Extreme Action', 3, 3, 3, '8:03', 'assets/music/extremeaction.mp3', 1, 4),
(4, 'Groovy Hip-Hop', 4, 4, 4, '4:00', 'assets/music/groovyhiphop.mp3', 1, 5),
(5, 'India', 5, 5, 5, '4:13', 'assets/music/india.mp3', 1, 2),
(6, 'Inspire', 6, 6, 6, '4:13', 'assets/music/inspire.mp3', 1, 6),
(7, 'Jazzy Frenchy', 1, 7, 7, '1:44', 'assets/music/jazzyfrenchy.mp3', 1, 7),
(8, 'Psychedelic', 2, 8, 8, '2:56', 'asseets/music/psychedelic.mp3', 1, 12),
(9, 'Sci-fi', 6, 9, 9, '4:44', 'assets/music/scifi.mp3', 1, 10),
(10, 'Slow Motion', 5, 10, 10, '3:26', 'assets/music/slowmotion.mp3', 1, 5),
(11, '899', 1, 1, 5, '3:54', 'assets/music/899.mp3', 2, 3),
(12, 'Wild Bush Man', 2, 8, 8, '2:46', 'assets/music/wildbushman.mp3', 2, 4),
(13, 'Acoustic Breeze', 5, 5, 8, '2:37', 'assets/music/bensound-acousticbreeze.mp3', 6, 1),
(14, 'A new beginning', 5, 5, 1, '2:35', 'assets/music/bensound-anewbeginning.mp3', 2, 0),
(15, 'Better Days', 5, 5, 2, '2:33', 'assets/music/bensound-betterdays.mp3', 3, 13),
(16, 'Buddy', 5, 5, 3, '2:02', 'assets/music/bensound-buddy.mp3', 4, 0),
(17, 'Clear Day', 5, 5, 4, '1:29', 'assets/music/bensound-clearday.mp3', 5, 1),
(18, 'Going Higher', 5, 10, 1, '4:04', 'assets/music/bensound-goinghigher.mp3', 2, 2),
(19, 'Funny Song', 4, 4, 2, '3:07', 'assets/music/bensound-funnysong.mp3', 2, 4),
(20, 'Funky Element', 1, 1, 3, '3:08', 'assets/music/bensound-funkyelement.mp3', 5, 5),
(21, 'Extreme Action', 1, 1, 4, '8:03', 'assets/music/bensound-extremeaction.mp3', 3, 4),
(22, 'Epic', 4, 4, 5, '2:58', 'assets/music/bensound-epic.mp3', 3, 6),
(23, 'Energy', 1, 1, 6, '2:59', 'assets/music/bensound-energy.mp3', 4, 2),
(24, 'Dubstep', 5, 10, 7, '2:03', 'assets/music/bensound-dubstep.mp3', 3, 7),
(25, 'Happiness', 6, 6, 8, '4:21', 'assets/music/bensound-happiness.mp3', 5, 3),
(26, 'Happy Rock', 6, 6, 9, '1:45', 'assets/music/bensound-happyrock.mp3', 4, 3),
(27, 'Jazzy Frenchy', 6, 6, 10, '1:44', 'assets/music/bensound-jazzyfrenchy.mp3', 3, 5),
(28, 'Little Idea', 6, 6, 1, '2:49', 'assets/music/bensound-littleidea.mp3', 2, 6),
(29, 'Memories', 6, 6, 2, '3:50', 'assets/music/bensound-memories.mp3', 6, 4),
(30, 'Moose', 1, 7, 1, '2:43', 'assets/music/bensound-moose.mp3', 5, 4),
(31, 'November', 1, 7, 2, '3:32', 'assets/music/bensound-november.mp3', 4, 2),
(32, 'Of Elias Dream', 1, 7, 3, '4:58', 'assets/music/bensound-ofeliasdream.mp3', 3, 5),
(33, 'Pop Dance', 6, 9, 2, '2:42', 'assets/music/bensound-popdance.mp3', 2, 2),
(34, 'Retro Soul', 1, 7, 5, '3:36', 'assets/music/bensound-retrosoul.mp3', 2, 2),
(35, 'Sad Day', 2, 2, 1, '2:28', 'assets/music/bensound-sadday.mp3', 2, 6),
(36, 'Sci-fi', 5, 10, 2, '4:44', 'assets/music/bensound-scifi.mp3', 4, 9),
(37, 'Slow Motion', 2, 2, 3, '3:26', 'assets/music/bensound-slowmotion.mp3', 3, 5),
(38, 'Sunny', 2, 2, 4, '2:20', 'assets/music/bensound-sunny.mp3', 4, 4),
(39, 'Sweet', 2, 2, 5, '5:07', 'assets/music/bensound-sweet.mp3', 5, 8),
(40, 'Tenderness ', 3, 3, 7, '2:03', 'assets/music/bensound-tenderness.mp3', 4, 3),
(41, 'The Lounge', 3, 3, 8, '4:16', 'assets/music/bensound-thelounge.mp3 ', 3, 3),
(42, 'Ukulele', 3, 3, 9, '2:26', 'assets/music/bensound-ukulele.mp3 ', 2, 1),
(43, 'Tomorrow', 3, 3, 1, '4:54', 'assets/music/bensound-tomorrow.mp3 ', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(2, 'mizuhot123', 'Mizuho123', 'Takeda123', 'Takemi@gmail.com123', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2020-04-06 00:00:00', 'assets/images/profile-pics/blank-profilePic.png'),
(3, 'ouhioygfe', 'Apiyhrpie', 'Iaaaoguryg', 'Poo@poo.com', '76419c58730d9f35de7ac538c2fd6737', '2020-04-07 00:00:00', 'assets/images/profile-pics/blank-profilePic.png'),
(4, 'kwilczynski', 'Krzysztof', 'Wilczynski', 'Kw@linux.com', 'b5db229e05093570ab6116e76c5217a2', '2020-04-13 00:00:00', 'assets/images/profile-pics/blank-profilePic.png'),
(5, 'qwertyuiop', 'Qwert', 'Yuiop', 'Qwertyuiop@abc.com', 'e807f1fcf82d132f9bb018ca6738a19f', '2020-04-17 00:00:00', 'assets/images/profile-pics/blank-profilePic.png'),
(6, 'admin', 'Mizuho', 'Takeda', 'Admin@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', '2020-05-02 00:00:00', 'assets/images/profile-pics/blank-profilePic.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
