-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 19 mars 2020 à 13:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `torkimmo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D76E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `roles`) VALUES
(1, 'admin@admin.fr', '$2y$13$bc4BZ7vOMK9odYmHJB5eueVeW2MZLZ8q2.IwpvIHgAJ5QvMqgAKdW', 'null'),
(2, 'test@test.fr', '$2y$13$GMQfr1AhpNqdsWxu69Hpp.RgGYjOfavK9.Sn/KCUajYfbgua320P2', '[\"ROLE_ADMIN\"]');

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_ht` decimal(10,2) NOT NULL,
  `longitude` decimal(10,10) NOT NULL,
  `latitude` decimal(10,10) NOT NULL,
  `nombre_chambre` decimal(5,0) NOT NULL,
  `surface` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_envoi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `prenom`, `nom`, `email`, `message`, `sujet`, `date_envoi`) VALUES
(1, 'Cédric', 'Leclercq', 'fhggfhgfh@gfdg.fr', '-\'', 'hhttryr', '2020-03-04 15:05:25'),
(2, 'Thierry', 'Diplo', 'titidiplo@gmail.com', 'Bonjour, pouvez-vous me contacter', 'La maison de mes rêves', '2020-03-10 10:13:01'),
(3, 'Cédric', 'Leclercq', 'torkhan@wanadoo.fr', 'Non', 'as tu vu Emeu', '2020-03-10 10:14:18'),
(4, 'Cédric', 'Leclercq', 'torkhan@wanadoo.fr', 'jg', 'as tu vu Emeu', '2020-03-10 12:56:10'),
(5, 'Cédric', 'Leclercq', 'torkhan@wanadoo.fr', 'jhgjghjhjhh', 'as tu vu Emeu', '2020-03-10 12:59:21'),
(6, 'Cédric', 'Leclercq', 'torkhan@wanadoo.fr', 'op', 'as tu vu Emeu', '2020-03-10 13:00:10');

-- --------------------------------------------------------

--
-- Structure de la table `loc_achat`
--

DROP TABLE IF EXISTS `loc_achat`;
CREATE TABLE IF NOT EXISTS `loc_achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `loc_achat`
--

INSERT INTO `loc_achat` (`id`, `type`) VALUES
(1, 'Achat'),
(5, 'Location');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200302085416', '2020-03-02 08:54:49'),
('20200302091450', '2020-03-02 09:15:11'),
('20200302091847', '2020-03-02 09:18:56'),
('20200302092027', '2020-03-02 09:20:33'),
('20200302092130', '2020-03-02 09:21:35'),
('20200302095013', '2020-03-02 09:50:30'),
('20200302130612', '2020-03-02 13:06:34'),
('20200302132627', '2020-03-02 13:26:40'),
('20200302140150', '2020-03-02 14:02:00'),
('20200302151048', '2020-03-02 15:11:06'),
('20200305143103', '2020-03-05 14:32:07');

-- --------------------------------------------------------

--
-- Structure de la table `par_date`
--

DROP TABLE IF EXISTS `par_date`;
CREATE TABLE IF NOT EXISTS `par_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_achat_id` int(11) DEFAULT NULL,
  `type_produits_id` int(11) DEFAULT NULL,
  `date_de_creation` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_93C0151E992DBAB2` (`loc_achat_id`),
  KEY `IDX_93C0151E8608755E` (`type_produits_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_ht` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_chambre` decimal(6,0) NOT NULL,
  `surface` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_creation` date NOT NULL,
  `type_produits_id` int(11) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `loc_achat_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BE2DDF8C8608755E` (`type_produits_id`),
  KEY `IDX_BE2DDF8CA73F0036` (`ville_id`),
  KEY `IDX_BE2DDF8C992DBAB2` (`loc_achat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `adresse`, `prix_ht`, `nombre_chambre`, `surface`, `longitude`, `latitude`, `date_de_creation`, `type_produits_id`, `ville_id`, `loc_achat_id`, `description`, `image`, `updated_at`, `image1`, `image2`, `image3`, `image4`, `nom`, `prix`) VALUES
(13, 'Faubourg de Béthune', 'Loyer 980€/mois', '4', '110 m²', '3.06149', '50.3816', '2019-03-03', 1, 1, 5, 'Agréable maison rénovée offrant 110 m² hab. comprenant : entrée, cuisine équipée ouverte sur séjour, salle de bains, WC, 1 chambre au rdc. A l\'étage : 2 chambres et bureau, salle de jeux, chauffage gaz, double vitrage et volets. 2 garages,  cave, terrasse', 'maisons-5e5f901b47e54432612976.jpg', '2020-03-04 12:10:21', 'maisons2-5e5f9aad25fd9578991050.jpg', 'maisons3-5e5f9aad287c2424048694.jpg', '', '', 'maison', 920),
(14, 'rue des Augustin', 'Loyer 945 €/mois', '4', '85 m²', '3.087765', '50.379385', '2019-03-03', 2, 1, 5, 'Appartement  de 85m² comprenant un hall d\'entrée avec placards ,double séjour, cuisine meublée et équipée, trois chambres, une salle de bains, un WC, une lingerie, un balcon, une cave, un garage et une place de parking couverte.', 'appart-5e5f92e216aeb239994092.jpg', '2020-03-04 13:11:10', 'appart1-5e5fa8ee28689245660656.jpg', 'appart2-5e5fa8ee2a9a4324674802.jpg', '', '', 'Appartement', 945),
(15, 'rue de Lambres', 'Loyer 1100 €/mois', '0', '118 m²', '3.0753891051531355', '50.360588034768334', '2019-03-03', 3, 1, 5, 'Grand local commercial pouvant accueillir de la restauration, bureaux, commerces.             comprenant une salle de 50m² environ, deux salles de 20 m², deux WC, et une cave.             Situé sur la grande route pour plus de visibilité.             Une', 'bar-5e5f8f0cce756604750368.jpg', '2020-03-04 13:33:20', 'bar2-5e5fae2098dbf864134131.jpg', '', '', '', 'Local', 1100),
(16, 'Faubourg de Béthune', '145000', '4', '110 m²', '3.06149', '50.3816', '2019-03-03', 1, 1, 1, 'Agréable maison rénovée offrant 110 m² hab. comprenant : entrée, cuisine équipée ouverte sur séjour, salle de bains, WC, 1 chambre au rdc. A l\'étage : 2 chambres et bureau, salle de jeux, chauffage gaz, double vitrage et volets. 2 garages,  cave, terrasse', 'maisons-5e5fbaceb9700987600299.jpg', '2020-03-04 14:27:26', 'maisons2-5e5fbacebc1a5530297927.jpg', 'maisons3-5e5fbacebdda8670611347.jpg', '', '', 'Maison', 145000),
(17, 'rue des Augustin', '174000 €', '4', '85 m²', '3.087765', '50.379385', '2019-03-03', 2, 1, 1, 'Appartement  de 85m² comprenant un hall d\'entrée avec placards ,double séjour, cuisine meublée et équipée, trois chambres, une salle de bains, un WC, une lingerie, un balcon, une cave, un garage et une place de parking.', 'appart-5e620c65747b0356674713.jpg', '2020-03-06 08:40:05', 'appart1-5e620c6577119389915729.jpg', 'appart2-5e620c65782f1284963298.jpg', '', '', 'Appartement', 174000),
(18, 'rue de Lambres', '85000 €', '0', '118 m²', '3.0753891051531355', '50.360588034768334', '2019-03-03', 3, 1, 1, 'Grand local commercial pouvant accueillir de la restauration, bureaux, commerces.             comprenant une salle de 50m² environ, deux salles de 20 m², deux WC, et une cave.             Situé sur la grande route pour plus de visibilité.             Une', 'bar-5e620f698a8bc904335760.jpg', '2020-03-06 08:52:57', 'bar2-5e620f698d23c133693891.jpg', '', '', '', 'Bar', 85000),
(19, 'Rue de Meppen', '170000 €', '3', '121', '3.0667', '50.3667', '2020-03-07', 1, 1, 1, 'Venez découvrir en exclusivité cette maison de style 1930 d\'une superficie de 121 m² située dans un secteur très prisé de DOUAI.', '2731894a-5e6370a44c525568241259.jpg', '2020-03-07 10:00:04', '2731894b-5e6370a44e469695582615.jpg', '2731894c-5e6370a44f2a0223655062.jpg', NULL, NULL, 'Maison', 170000),
(20, 'Rue Victor Hugo', '140000 €', '4', '97', '3.0667', '50.3667', '2020-03-06', 1, 1, 1, 'Venez découvrir cette superbe maison semi-individuelle avec passage côté T4 de 97 m². Elle se compose d\'une pièce de vie de plus de 30m² ainsi que d\'une belle cuisine ouverte sur la salle à manger. Cette maison compte trois chambres, un bureau ainsi qu\'un sous-sol  aménagé.', '2715601a-5e6371d80c049480152505.jpg', '2020-03-07 10:05:12', '2715601b-5e6371d80dda7553903814.jpg', '2715601c-5e6371d80e90f075701176.jpg', '2715601d-5e6371d80f421403840713.jpg', NULL, 'Maison', 140000),
(21, 'Rue de Verdun', '110000 €', '3', '99', '3.0667', '50.3667', '2020-03-07', 1, 1, 1, 'DOUAI, dans un cadre bucolique, cette maison vous offrira tous ses atouts, elle comporte 5 pièces réparties sur 99 m² ( le tout sur 291 m² de terrain). Elle est dotée de 3 chambres pleines de charme,', '2465369a-5e63727c4a17a661791004.jpg', '2020-03-07 10:07:56', '2465369b-5e63727c4c588675229590.jpg', '2465369c-5e63727c500c0884720833.jpg', '2465369d-5e63727c50c5e427900263.jpg', '2465369e-5e63727c516fa135799188.jpg', 'Maison', 110000);

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

DROP TABLE IF EXISTS `recherche`;
CREATE TABLE IF NOT EXISTS `recherche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_produits_id` int(11) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `loc_achat_id` int(11) DEFAULT NULL,
  `prix_ht` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_chambre` decimal(6,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B4271B468608755E` (`type_produits_id`),
  KEY `IDX_B4271B46A73F0036` (`ville_id`),
  KEY `IDX_B4271B46992DBAB2` (`loc_achat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_produit`
--

DROP TABLE IF EXISTS `type_produit`;
CREATE TABLE IF NOT EXISTS `type_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_produit`
--

INSERT INTO `type_produit` (`id`, `type`) VALUES
(1, 'Maison'),
(2, 'Appartement'),
(3, 'Local commercial'),
(4, 'Agence');

-- --------------------------------------------------------

--
-- Structure de la table `zip`
--

DROP TABLE IF EXISTS `zip`;
CREATE TABLE IF NOT EXISTS `zip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `zip`
--

INSERT INTO `zip` (`id`, `nom_ville`, `zip_code`) VALUES
(1, 'Douai', '59500'),
(2, 'Flers en Escrebieux', '59128'),
(3, 'Sin le Noble', '59450'),
(4, 'Cuincy', '59553'),
(5, 'Dechy', '59187'),
(6, 'Lambres lez douai', '59552');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `par_date`
--
ALTER TABLE `par_date`
  ADD CONSTRAINT `FK_93C0151E8608755E` FOREIGN KEY (`type_produits_id`) REFERENCES `type_produit` (`id`),
  ADD CONSTRAINT `FK_93C0151E992DBAB2` FOREIGN KEY (`loc_achat_id`) REFERENCES `loc_achat` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_BE2DDF8C8608755E` FOREIGN KEY (`type_produits_id`) REFERENCES `type_produit` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8C992DBAB2` FOREIGN KEY (`loc_achat_id`) REFERENCES `loc_achat` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8CA73F0036` FOREIGN KEY (`ville_id`) REFERENCES `zip` (`id`);

--
-- Contraintes pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD CONSTRAINT `FK_B4271B468608755E` FOREIGN KEY (`type_produits_id`) REFERENCES `type_produit` (`id`),
  ADD CONSTRAINT `FK_B4271B46992DBAB2` FOREIGN KEY (`loc_achat_id`) REFERENCES `loc_achat` (`id`),
  ADD CONSTRAINT `FK_B4271B46A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `zip` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
