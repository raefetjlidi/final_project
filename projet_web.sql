-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 déc. 2021 à 00:11
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(11) NOT NULL,
  `nom_blog` varchar(255) NOT NULL,
  `contenu_blog` longtext NOT NULL,
  `categorie_blog` varchar(255) NOT NULL,
  `image_blog` varchar(255) NOT NULL,
  `date_blog` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nom_editeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blogs`
--

INSERT INTO `blogs` (`id_blog`, `nom_blog`, `contenu_blog`, `categorie_blog`, `image_blog`, `date_blog`, `nom_editeur`) VALUES
(3, 'Moeness', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'testtest', '../../Front-office/assets/img/latest-news/image.jpg', '2021-12-03 10:58:10', 'testtesttest'),
(4, 'Moeness', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'testtest', '../../Front-office/assets/img/latest-news/image.jpg', '2021-12-06 20:16:51', 'testtesttest'),
(6, 'zina', 'teeeeeeeeeeeeeeeeeeeeeeeeeeest', 'test test', '../../Front-office/assets/img/latest-news/happy-1836445_640.jpg', '2021-12-08 09:22:27', 'test test test'),
(8, 'Moeness', 'aaaaaaaaaaaaaaaaaaaa', 'test test', '../../Front-office/assets/img/latest-news/news-bg-1.jpg', '2021-12-09 18:28:27', 'testtesttest'),
(9, 'jihed', 'ccccccccccccccccccc', 'testtest', '../../Front-office/assets/img/latest-news/news-bg-3.jpg', '2021-12-09 18:32:48', 'test'),
(10, 'Moeness', 'nnnnnnnnnnnn', 'testtest', '../../Front-office/assets/img/latest-news/news-bg-6.jpg', '2021-12-09 18:34:10', 'tessst'),
(11, 'bea', 'qqqqqqqqqqqqqqq', 'testtest', '../../Front-office/assets/img/latest-news/news-bg-5.jpg', '2021-12-09 18:36:37', 'Test'),
(14, 'Salima', 'lllllllllllllllll', 'testtest', '../../Front-office/assets/img/latest-news/news-bg-6.jpg', '2021-12-10 09:32:17', 'test'),
(16, 'rania', 'yyyyyyyyyyyyyyyyy', 'testtest', '../../Front-office/assets/img/latest-news/news-bg-2.jpg', '2021-12-10 10:05:51', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `date_commentaire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contenu_commentaire` longtext NOT NULL,
  `blogs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `date_commentaire`, `contenu_commentaire`, `blogs`) VALUES
(49, '2021-12-11 13:45:19', ' Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à ', 6),
(52, '2021-12-10 10:19:57', 'azerty', 16),
(62, '2021-12-11 16:21:35', 'aaaaaa', 6),
(63, '2021-12-13 17:25:00', 'aaaaa', 6),
(64, '2021-12-14 17:56:31', 'bonjour', 6),
(65, '2021-12-14 17:56:31', 'bonjour', 6),
(66, '2021-12-14 18:31:51', 'busjqjejbfeizljk jhiserzhizfekbefzkhbefzkjbef ghqfdbhcdbhkwcbkhwsgdyhbqs sidbqiksfbqdsj ', 6);

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id`, `type`) VALUES
(1, 'Reclamatio'),
(2, 'Demande_Di');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `explication` text NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `name`, `email`, `phone`, `subject`, `explication`, `idUtilisateur`) VALUES
(1, 'test', 'test@test.com', '5555', 'test', 'raefet', 0),
(2, 'test', 'raefet.jlidi@esprit.tn', '22323', 'sdsdsd', 'eee', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation_motif`
--

CREATE TABLE `reclamation_motif` (
  `motif_id` int(11) NOT NULL,
  `recla_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamation_motif`
--

INSERT INTO `reclamation_motif` (`motif_id`, `recla_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IdUt` int(11) NOT NULL,
  `NomClient` varchar(50) NOT NULL,
  `PrenomClient` varchar(50) NOT NULL,
  `EmailDeConfirmation` varchar(100) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  `NumeroDeTelephonne` int(11) NOT NULL,
  `Sexe` varchar(50) NOT NULL,
  `RoleUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUt`, `NomClient`, `PrenomClient`, `EmailDeConfirmation`, `MDP`, `NumeroDeTelephonne`, `Sexe`, `RoleUser`) VALUES
(1, 'Jenhani', 'Salima', 'salima.jenhani@esprit.tn', 'c', 50937524, 'femme', 0),
(2, 'test', 'ben test', 'test@esprit.tn', '12345678910', 21778410, 'homme', 0),
(3, 'admin', 'ben admin', 'admin@test.com', '12345678', 50973777, 'homme', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `fk_idBlog` (`blogs`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation_motif`
--
ALTER TABLE `reclamation_motif`
  ADD KEY `motif_id` (`motif_id`),
  ADD KEY `recla_id` (`recla_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IdUt`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IdUt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_idBlog` FOREIGN KEY (`blogs`) REFERENCES `blogs` (`id_blog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reclamation_motif`
--
ALTER TABLE `reclamation_motif`
  ADD CONSTRAINT `reclamation_motif_ibfk_1` FOREIGN KEY (`recla_id`) REFERENCES `reclamation` (`id`),
  ADD CONSTRAINT `reclamation_motif_ibfk_2` FOREIGN KEY (`motif_id`) REFERENCES `motif` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
