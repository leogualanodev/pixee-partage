-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 21 fév. 2023 à 15:39
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pixeepartage`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment_picture`
--

DROP TABLE IF EXISTS `comment_picture`;
CREATE TABLE IF NOT EXISTS `comment_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_picture` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_picture` (`id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comment_video`
--

DROP TABLE IF EXISTS `comment_video`;
CREATE TABLE IF NOT EXISTS `comment_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_video` (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path_post` varchar(255) NOT NULL,
  `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `desc_post` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pictures_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `id_user`, `title`, `path_post`, `date_publication`, `desc_post`) VALUES
(1, 1, 'première phptp ', 'deaf730da85a3bf76da591b845269a58.png', '2023-02-21 09:21:24', 'youkmdodjzfksd,fzkd,pk'),
(4, 1, 'encore et toujours ', '9bf5aaed2b30d76b99c18f7d9ef08a99.jpeg', '2023-02-21 15:03:24', 'on essaie encore et encore ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT 'default_avatar.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `password`, `avatar`) VALUES
(1, 'momodulocal', 'leogua@gmail.com', '$2y$10$vlmjiY28t111sxJfy5FrEeE4HWW6o0l174xv3VMGNNFDWjH71JjQu', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `path_post` varchar(255) NOT NULL,
  `desc_post` varchar(255) NOT NULL,
  `type_video` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_videos_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `id_user`, `title`, `date_publication`, `path_post`, `desc_post`, `type_video`) VALUES
(1, 1, 'Premiere video ', '2023-02-21 09:18:26', 'b17e6f8ba770775a22c1cdfe73e8d8da.webm', 'youuuhouuuuu', 'webM');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment_picture`
--
ALTER TABLE `comment_picture`
  ADD CONSTRAINT `comment_picture_ibfk_1` FOREIGN KEY (`id_picture`) REFERENCES `pictures` (`id`);

--
-- Contraintes pour la table `comment_video`
--
ALTER TABLE `comment_video`
  ADD CONSTRAINT `comment_video_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`);

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `id_pictures_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `id_videos_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
