SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- Database: `urls`

-- Table structure for table `link`

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
