-- Generation Time: Nov 08, 2021 at 10:44 AM
-- Server version: 5.7.35-38
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `key_holders`
--

CREATE TABLE `key_holders` (
  `name` varchar(64) NOT NULL,
  `key` varchar(16) NOT NULL DEFAULT '',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `order` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `key_holders`
--

INSERT INTO `key_holders` (`name`, `key`, `active`, `order`) VALUES
('Aimee', 'master', 1, 1),
('Bob', 'front_door', 0, 2),
('Cynthia', 'safe', 1, 3),
('Dean', 'front_door', 1, 4),
('Eileen', 'front_door', 1, 5),
('Frank', 'master', 1, 6),
('Georgia', 'safe', 0, 7),
('Henry', 'front_door', 1, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `key_holders`
--
ALTER TABLE `key_holders`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
