-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 avr. 2022 à 14:56
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_cephas`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_offres`
--

CREATE TABLE `categorie_offres` (
  `id_categorie` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_offres`
--

INSERT INTO `categorie_offres` (`id_categorie`, `titre`, `couleur`) VALUES
(1, 'Emploi', '#CC0000'),
(2, 'Stage', '#0099CC'),
(3, 'Interim', 'HFF8800'),
(4, 'Freelance', '#007E33'),
(5, 'Consultant', '#9933CC');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formation` int(11) NOT NULL,
  `titre` longtext NOT NULL,
  `contenu` longtext NOT NULL,
  `cible` longtext NOT NULL,
  `duree` varchar(255) NOT NULL,
  `objectif` longtext NOT NULL,
  `debut` varchar(255) NOT NULL,
  `lieu` longtext NOT NULL,
  `tarif` longtext NOT NULL,
  `date_pub` date NOT NULL,
  `date_exp` date NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `etat` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `titre`, `contenu`, `cible`, `duree`, `objectif`, `debut`, `lieu`, `tarif`, `date_pub`, `date_exp`, `description`, `image`, `etat`) VALUES
(8, 'CyberSécurité', 'Formré les étudiants doué de qualification', 'Etudiants ', '3mois', 'Apprendre à la jeunesse actuelle l\'importance informatique', '20/04/2022', 'Abidjan ', '30000', '2022-03-17', '2022-03-27', 'dgfhgjhkjlkm', 'GHLOGO.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_mem` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_ins` datetime NOT NULL,
  `statut` varchar(255) NOT NULL,
  `apparence` varchar(255) NOT NULL DEFAULT 'dark'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_mem`, `nom`, `prenoms`, `pseudo`, `mdp`, `email`, `date_ins`, `statut`, `apparence`) VALUES
(27, 'MAHOUAN ', 'Tomekpa Elie', 'Ozil', '6bb2c19af8e9c0e44893df45dc5db6b7586dd3fc', 'tomekpa.mahouan@gmail.com', '2022-03-17 01:50:34', 'Admin-Principal', 'dark'),
(42, 'Bamba', 'karime', 'BK', 'e734b55acf5ccaefb2bdb4711ec741037b2aa8d7', 'bambakarime@gmail.com', '2022-03-21 16:56:42', 'Admin-Principal', 'dark'),
(36, 'MAHOUAN ', 'Tomekpa Elie', 'elCodeur', '4ec0bbffa3744794f36b5a019b017185d8d17b33', 'tomekpa.mahouan@uvci.edu.ci', '2022-03-21 18:07:52', 'Admin-Principal', 'dark'),
(37, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '2022-03-21 18:09:19', 'Admin-Principal', 'dark'),
(38, 'admin2', 'admin2', 'admin2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin2@gmail.com', '2022-03-21 18:10:05', 'Admin-Sécondaire', 'dark'),
(39, 'OZON', 'ESTHER', 'Dolard', 'cfc9be49b53afecb4090a384ac6c4c0a51a2cbf2', 'esther.ozon03@gmail.com', '2022-03-21 18:16:52', 'Admin-Sécondaire', 'dark'),
(40, 'aaaaaaaaaaaa', 'ppppppp', 'ag', 'c6efae9869218c6d45b92a3090bce129f27c070d', 'a.p@gmail.com', '2022-03-21 16:46:34', 'Admin-Principal', 'dark'),
(41, 'MAWEAN', 'GBATO MARC', 'Ablo', 'd33c80bc45d65303e33ca83108a9952b745af9ef', 'marc.mawian@gmail.com', '2022-03-21 16:49:50', 'Admin-Sécondaire', 'dark'),
(43, 'MAWEAN', 'MOUSSA', 'yachou40', '137591da2ecd87f03256981c7b539487e5f2b4ef', 'moussa@gmail.com', '2022-03-21 16:59:41', 'Admin-Sécondaire', 'dark'),
(44, 'MAWEAN', 'MOUSSA', 'yachou40', 'f8b777ad39f70817acd62ee94f74648694dbea48', 'moussaB@gmail.com', '2022-03-21 17:02:09', 'Admin-Sécondaire', 'dark');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id_offre` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `profil_post` longtext NOT NULL,
  `candidature` longtext NOT NULL,
  `metiers` longtext NOT NULL,
  `niveaux` longtext NOT NULL,
  `experiences` longtext NOT NULL,
  `lieu` longtext NOT NULL,
  `logo` longtext NOT NULL,
  `date_pub` date NOT NULL,
  `date_exp` date NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id_offre`, `titre`, `description`, `profil_post`, `candidature`, `metiers`, `niveaux`, `experiences`, `lieu`, `logo`, `date_pub`, `date_exp`, `categorie_id`, `mem_id`, `etat`) VALUES
(8, 'Mecanique', 'bon', 'Meilleur', 'M@gmail.com', 'Agronomie', 'BAC+4', '4 ans', 'Daoukro', 'IMG_20200626_132443.jpg', '2020-10-01', '2020-10-01', 5, 3, 0),
(9, 'Touriste', 'bon poste', 'Meilleure personne', 't@gmail.com', 'Agriculture', 'BAC+7 et plus', '3 ans', 'Bingerville', 'lacoste.png', '2020-10-01', '2020-10-08', 4, 3, 0),
(7, 'Electronicien', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing ', 'Agronomie, CollectivitÃ©s Territoriales', 'BAC+6', '3 ans', 'Koumassi', '1486849_635397773188038_2037079880_n.jpg', '2020-10-01', '2020-10-03', 5, 3, 1),
(3, 'Developpeur desktop', 'desc', 'prof', 'doss', 'Informatique de Gestion', 'BAC+3', '4 ans', 'cocody', 'images (1).png', '2020-09-30', '2020-10-02', 1, 3, 1),
(10, 'Entrepreneur', 'bon poste', 'bon poste', 'c@gmail.com', 'Commerce et Administration des Entreprises', 'BAC+3', '1 an', 'Dubai', 'images.jpg', '2020-10-01', '2020-10-06', 5, 3, 0),
(11, 'Electromecanique', 'bon poste', 'Personne assidut', 'i@gmail.com', 'AgroÃ©conomie', 'BAC+3', '4 ans', 'San-Pedro', 'telechargement (3).jpg', '2020-10-01', '2020-10-23', 3, 3, 1),
(13, 'dev', 'bon ', 'meilleur', 'm@gmail.com', 'Agronomie', 'BAC+7 et plus', '4 ans', 'Beoumi', '8_MOZ_types-de-logos.jpg', '2020-10-03', '2020-10-17', 3, 3, 0),
(12, 'Infographe', 'je voulais ce poste pour m\'ameliorer', 'bon poste', 'info@gmail.com', 'Infographie', 'BAC+3', '2 ans', 'Port-Bouet', 'zozor 2.png', '2020-10-02', '2020-10-25', 1, 3, 0),
(16, 'comptable', 'ComptabilitÃ©', 'Maitriser le langage saari', 'info@gmail.com', 'AÃ©ronautique', 'BAC+7 et plus', '3 ans', 'Koumassi', '1596844757006.jpg', '2020-10-27', '2020-10-09', 3, 3, 0),
(17, 'Developpeur Python', 'votre mission est de faire les calculs Ã  travers le langage Python  ', 'il s\'agit de developper des Applications Ã  travers le langage Python', 'kon@gmail.com', 'Informatique', 'BAC+4', '4 ans', 'Plateau', '3.jpg', '2020-11-02', '2020-11-11', 5, 3, 0),
(18, 'Developpeur C++', 'ce poste consiste Ã  Developper des Applications avec le Langage C++', 'Etre capable de Developper des Applications avec le Langage C++,faire aussi des calculs', 'ann@gmail.com', 'Informatique, Informatique de Gestion', 'BAC+4', '2 ans', 'Treichville', '30-maison.jpg', '2020-11-13', '2020-11-28', 2, 3, 0),
(19, 'Developpeur Web', 'mlkjhgfhjk', 'mlkjhgj', 'lkjkhjl@gmail.com', 'AgroÃ©conomie', 'BAC+4', '4 ans', 'yop', '30-maison.jpg', '2020-11-20', '2020-11-21', 5, 3, 0),
(20, 'Developpeur Web', 'kmljkhgcbjxvhcjbn', 'kjhkvhcvb', 'k@gmail.com', 'Auxiliaire en pharmacie', 'BAC+3', '4 ans', 'Dubai', '6-dc2b63dd7c510437611988b6f179f2c0-750x410.jpg', '2020-11-22', '2020-11-28', 2, 3, 0),
(23, 'poster', 'iuytre', 'vvvvvvvvvvvv', 'iiiiiiiiiiiii', 'Agriculture', 'BAC+2', '1 an', 'Yopougon_sicogi', 'RAPHA INTER2.1.jpg', '2022-03-17', '2022-03-31', 3, 26, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `date_fab` date NOT NULL,
  `date_exp` date NOT NULL,
  `details` longtext NOT NULL,
  `prix` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `libelle`, `date_fab`, `date_exp`, `details`, `prix`, `image`, `type_id`) VALUES
(1, 'Diaman noir', '2020-10-08', '2020-10-24', 'esrdtfyuiop', 25, '009.png', 2),
(2, 'Diaman noir', '2020-10-08', '2020-10-24', 'esrdtfyuiop', 25, '009.png', 2),
(13, 'Bijoux', '2020-11-08', '2020-11-08', 'mlkjhghfdgfhg', 15000, '40e327ccd89a040cdddd3de56d3e7921.jpg', 1),
(4, 'Or', '2020-10-21', '2020-11-12', 'poiuytreza', 32, 'IMG_20200626_132445.jpg', 1),
(5, 'Bouffe', '2020-10-15', '2020-10-24', 'hjhgrzerfiu(-\'z\'&quot;sxcfgvjojfdteqxchgrejkklcgxds', 25, 'adidas.png', 2),
(6, 'Chaussure', '2020-10-15', '2020-10-19', 'nvbbvvjfhhhffsofouifffhjfdsÃ¹pdpovdÃ§fezfuyhfiudxvxhgfduhkjdhbcsqcvgccugfjfoi', 15000, 'lacoste.png', 1),
(12, 'Diaman noir', '2020-10-04', '2020-10-18', 'mlkjhgfg', 15000, '1597851364489.jpg', 2),
(8, 'Parfum', '2020-10-04', '2020-10-03', 'bonne Odeur', 10000, 'adidas.png', 1),
(11, 'Medaille d\'OR', '2020-10-15', '2020-10-11', 'medaille d\'Or composÃ© de Diamant et de Argent', 55000, 'nestle2.jpg', 1),
(14, 'Bouffe', '2020-11-15', '2020-11-15', 'lkjhgfdsfdgh', 32, '20201030_170844.jpg', 2),
(15, 'Parfum', '2020-11-25', '2020-11-24', 'mlkjhgfdfgh', 25, 'cerelac_wheat-1.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_produit`
--

CREATE TABLE `type_produit` (
  `id_type` int(11) NOT NULL,
  `libelle_type` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_produit`
--

INSERT INTO `type_produit` (`id_type`, `libelle_type`) VALUES
(1, 'Cosmetique'),
(2, 'Alimentaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_offres`
--
ALTER TABLE `categorie_offres`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_mem`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `type_produit`
--
ALTER TABLE `type_produit`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_offres`
--
ALTER TABLE `categorie_offres`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_mem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `type_produit`
--
ALTER TABLE `type_produit`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
