SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `phone3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `contacts` (`id`, `lastName`, `firstName`, `email`, `companyName`, `position`, `phone1`, `phone2`, `phone3`) VALUES
(13, 'Willis', 'Bruce', 'bruce@willis.com', 'Hollywood', 'Actor', '123', '456', '789'),
(16, 'Cruze', 'Tom', 'tom@cruze.com', 'Hollywood', 'Actor', '234', '567', '890'),
(17, 'Gusling', 'Ryan', 'ryan@gusling.com', 'Hollywood', 'Actor', '345', '678', '901'),
(18, 'de Niro', 'Robert', 'robert@deNiro.com', 'Hollywood', 'Actor', '456', '789', '012'),
(19, 'Diaz', 'Cameron', 'cameron@diaz.ru', 'Hollywood', 'Actor', '567', '890', '123'),
(20, 'Theron', 'Charlize', 'charlize@theron.com', 'Hollywood', 'Actor', '678', '901', '234'),
(21, 'Smith', 'Will', 'will@smith.com', 'Hollywood', 'Actor', '789', '012', '345'),
(22, 'Chan', 'Jackie', 'jackie@chan.com', 'Hollywood', 'Actor', '890', '123', '456'),
(23, 'Cooper', 'Bradley', 'bradley@cooper.com', 'Hollywood', 'Actor', '901', '234', '567'),
(24, 'Knightley', 'Keira', 'keira@knightley.com', 'Hollywood', 'Actor', '012', '345', '567'),
(25, 'Spacey', 'Kevin', 'kevin@spacey.com', 'Hollywood', 'Actor', '123', '456', '789');


ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
