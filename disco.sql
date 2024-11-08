-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 10 fév. 2021 à 22:09
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `disco`
--

-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

CREATE TABLE `chanson` (
  `id` int(11) NOT NULL,
  `idalbum` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chanson`
--

INSERT INTO `chanson` (`id`, `idalbum`, `titre`) VALUES
(1, 1, 'Brown Sugar'),
(2, 1, 'Sway');

-- --------------------------------------------------------

--
-- Structure de la table `disques`
--

CREATE TABLE `disques` (
  `id` int(11) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `artiste` varchar(255) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `disques`
--

INSERT INTO `disques` (`id`, `album`, `artiste`, `genre`) VALUES
(1, 'Sticky Fingers', 'Rolling Stones', 1),
(2, 'Voodoo Lounge', 'Rolling Stones', 1),
(3, 'Abbey Roads', 'Beatles', 1),
(4, 'Help !', 'Beatles', 1),
(5, 'Physical Graffiti', 'Led Zeppelin', 2),
(6, 'Led Zeppelin IV', 'Led Zeppelin', 2),
(7, 'Hotel California', 'The Eagles', 3),
(8, 'Desperado', 'The Eagles', 3),
(9, 'Cosmos Factory', 'Credence Clearwater Revival', 1),
(10, 'Bayou Country', 'Credence Clearwater Revival', 1);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(1, 'Rock'),
(2, 'Hard Rock'),
(3, 'Country Rock');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `password`) VALUES
(1, 'yvon@gmail.com', '$2y$10$fwkLRx6bpyY7QIqDO1EJKu43b9c3rL7DJuOqcqNIcBkrekvatZ0dK'),
(3, 'nouveau_toto@gmail.com', '$2y$10$Bo1SHoHyQvjM8/bPgO51huw9Mz9zlAZUFZ3EQZaVjaZCOKWTePBhS');

--
-- Déclencheurs `utilisateurs`
--
DELIMITER $$
CREATE TRIGGER `before_utilisateur_update` AFTER UPDATE ON `utilisateurs` FOR EACH ROW INSERT INTO audit
 SET action = 'update',
     user_id = OLD.id,
     email = OLD.email,
     newemail = NEW.email,
     changedate = NOW()
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chanson`
--
ALTER TABLE `chanson`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `disques`
--
ALTER TABLE `disques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chanson`
--
ALTER TABLE `chanson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `disques`
--
ALTER TABLE `disques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
