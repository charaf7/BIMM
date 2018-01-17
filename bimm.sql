-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 jan. 2018 à 11:16
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bimm`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `axe` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `axe`, `text`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 1, 'Vestibulum pharetra dolor nec enim hendrerit eleifend.'),
(3, 1, 'Suspendisse varius urna nec orci dapibus dictum.'),
(4, 1, 'Cras et quam ac erat posuere finibus eu sed magna.'),
(5, 1, 'Proin venenatis felis eu orci rutrum viverra.'),
(6, 1, 'Mauris consequat nulla lacinia euismod tincidunt.'),
(7, 2, 'Mauris consequat nulla lacinia euismod tincidunt.'),
(8, 2, 'Mauris consequat nulla lacinia euismod tincidunt.'),
(9, 2, 'Mauris consequat nulla lacinia euismod tincidunt.'),
(10, 2, 'Mauris consequat nulla lacinia euismod tincidunt.'),
(11, 2, 'Mauris consequat nulla lacinia euismod tincidunt.'),
(12, 3, 'Pellentesque aliquam ante sit amet ligula imperdiet interdum.'),
(13, 3, 'Pellentesque aliquam ante sit amet ligula imperdiet interdum.'),
(14, 3, 'Pellentesque aliquam ante sit amet ligula imperdiet interdum.'),
(15, 3, 'Pellentesque aliquam ante sit amet ligula imperdiet interdum.'),
(16, 3, 'Pellentesque aliquam ante sit amet ligula imperdiet interdum.'),
(17, 2, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(18, 3, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(19, 4, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(20, 4, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(21, 4, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(22, 4, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(23, 4, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(24, 4, 'Sed vel nisl eget magna cursus posuere et at sapien.'),
(25, 5, 'Integer maximus tortor sed lectus condimentum, in cursus sem vulputate.'),
(26, 5, 'Integer maximus tortor sed lectus condimentum, in cursus sem vulputate.'),
(27, 5, 'Integer maximus tortor sed lectus condimentum, in cursus sem vulputate.'),
(28, 5, 'Integer maximus tortor sed lectus condimentum, in cursus sem vulputate.'),
(29, 5, 'Integer maximus tortor sed lectus condimentum, in cursus sem vulputate.'),
(30, 5, 'Integer maximus tortor sed lectus condimentum, in cursus sem vulputate.'),
(31, 6, 'Integer maximus tortor sed lectus condimentum, in cursus sem vulputate.'),
(32, 6, 'Donec id massa pretium, sodales nisl in, lobortis metus.'),
(33, 6, 'Donec id massa pretium, sodales nisl in, lobortis metus.'),
(34, 6, 'Donec id massa pretium, sodales nisl in, lobortis metus.'),
(35, 6, 'Donec id massa pretium, sodales nisl in, lobortis metus.'),
(36, 6, 'Donec id massa pretium, sodales nisl in, lobortis metus.');

-- --------------------------------------------------------

--
-- Structure de la table `useraxes`
--

DROP TABLE IF EXISTS `useraxes`;
CREATE TABLE IF NOT EXISTS `useraxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `questionId` (`questionId`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `useraxes`
--

INSERT INTO `useraxes` (`id`, `userId`, `questionId`, `value`) VALUES
(77, 12, 1, 3),
(78, 12, 2, 1),
(79, 12, 3, 2),
(80, 12, 4, 3),
(81, 12, 5, 4),
(82, 12, 6, 5),
(83, 12, 7, 1),
(84, 12, 8, 1),
(85, 12, 9, 1),
(86, 12, 10, 1),
(87, 12, 11, 1),
(88, 12, 12, 0),
(89, 12, 13, 0),
(90, 12, 14, 0),
(91, 12, 15, 0),
(92, 12, 16, 0),
(93, 12, 17, 1),
(94, 12, 18, 0),
(95, 12, 19, 3),
(96, 12, 20, 3),
(97, 12, 21, 3),
(98, 12, 22, 3),
(99, 12, 23, 3),
(100, 12, 24, 3),
(101, 12, 25, 4),
(102, 12, 26, 4),
(103, 12, 27, 4),
(104, 12, 28, 4),
(105, 12, 29, 4),
(106, 12, 30, 4),
(107, 12, 31, 5),
(108, 12, 32, 5),
(109, 12, 33, 5),
(110, 12, 34, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `entreprise` varchar(100) NOT NULL,
  `siret` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fonction` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `password`, `entreprise`, `siret`, `email`, `fonction`) VALUES
(12, 'skiker', 'charaf', '$2y$10$Z78kRtqmXCg81ulmJOcGv.F6K6wTuZabFey2MlmILGVzF35sy/H5y', 'alzkaaaaaa', '12345678912345', 'charaf297@gmail.com', 'aazddazza');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `useraxes`
--
ALTER TABLE `useraxes`
  ADD CONSTRAINT `useraxes_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `useraxes_ibfk_2` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
