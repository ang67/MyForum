-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 mars 2019 à 11:21
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myforum`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_subject` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_user` (`id_user`),
  KEY `id_subject` (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `title`, `text`, `date`, `time`, `id_user`, `id_subject`) VALUES
(5, 'je veux savoir comment inclure un fichier html dans mon code', 'utilise include()', '2018-03-06', '20:17:11', 'avatar', 2),
(6, 'j\'ai une erreur de code 404. Aidez moi SVP', 'montre moi ton code j\'ai eu un problÃ¨me pareil', '2018-03-06', '20:22:00', 'rio', 16),
(28, 'j\'ai une erreur de code 404. Aidez moi SVP', 'Vous allez maintenant crÃ©er les tables destinÃ©es Ã  contenir les donnÃ©es. Les sections qui suivent dÃ©taillent les quatre tables Ã  crÃ©er pour la base magasin, les tables client, commande, article et ligne.Vous allez maintenant crÃ©er les tables destinÃ©es Ã  contenir les donnÃ©es. Les sections qui suivent dÃ©taillent les quatre tables Ã  crÃ©er pour la base magasin, les tables client, commande, article et ligne.Vous allez maintenant crÃ©er les tables destinÃ©es Ã  contenir les donnÃ©es. Les sections qui suivent dÃ©taillent les quatre tables Ã  crÃ©er pour la base magasin, les tables client, commande, article et ligne.Vous allez maintenant crÃ©er les tables destinÃ©es Ã  contenir les donnÃ©es. Les sections qui suivent dÃ©taillent les quatre tables Ã  crÃ©er pour la base magasin, les tables client, commande, article et ligne.Vous allez maintenant crÃ©er les tables destinÃ©es Ã  contenir les donnÃ©es. Les sections qui suivent dÃ©taillent les quatre tables Ã  crÃ©er pour la base magasin, les tables client, commande, article et ligne.Vous allez maintenant crÃ©er les tables destinÃ©es Ã  contenir les donnÃ©es. Les sections qui suivent dÃ©taillent les quatre tables Ã  crÃ©er pour la base magasin, les tables client, commande, article et ligne.Vous allez maintenant crÃ©er les tables destinÃ©es Ã  contenir les donnÃ©es. Les sections qui suivent dÃ©taillent les quatre tables Ã  crÃ©er pour la base magasin, les tables client, commande, article et ligne.', '2018-03-07', '00:51:39', 'rio', 16),
(29, 'je veux savoir comment inclure un fichier html dans mon code', 'personne pour m\'aider???', '2018-03-07', '03:27:31', 'rio', 2),
(30, 'comment afficher un texte en php', 'j\'ai un gros problÃ¨me pour afficher du text', '2018-03-07', '03:36:58', 'alpha7', 70),
(32, 'comment afficher un texte en php', 'tu n\'as qu Ã  utiliser echo ', '2018-03-07', '03:41:36', 'rio', 70),
(34, 'je veux savoir comment inclure un fichier html dans mon code', 'include() fera l\'affaire', '2018-03-07', '08:44:01', 'alpha7', 2),
(36, 'sujet de test', 'voila mon message aider moi ', '2018-03-07', '10:34:28', 'alpha7', 71),
(37, 'sujet de test', 'je te reponds', '2018-03-07', '10:35:32', 'avatar', 71),
(38, 'Un editeur de texte pour java', 'je suis Ã  la recherche d\'un puissant editeur de texte pour JAVA', '2018-03-07', '23:11:02', 'toto', 72),
(39, 'Un editeur de texte pour java', 'tu pourras utiliser eclipse', '2018-03-07', '23:11:59', 'alpha7', 72),
(40, 'Un editeur de texte pour java', 'moi je te conseillerais NetBean \r\nil est bien meilleur et permet de faire de l\'intÃ©gration continue', '2018-03-07', '23:14:12', 'avatar', 72),
(41, 'j\'ai une erreur de code 404. Aidez moi SVP', 'essai de redemarrer Wamp server', '2018-03-08', '01:42:53', 'avatar', 16),
(42, 'comment afficher un texte en php', 'n\'oublie pas de mettre les doubles quote et \r\nechapper s\'il le faut', '2018-03-09', '08:58:52', 'avatar2', 70),
(43, 'test', 'c\'est un test', '2018-03-09', '14:44:39', 'alpha7', 73),
(44, 'test', 'rÃ©ponse au test', '2018-03-09', '14:45:55', 'avatar2', 73),
(45, 'tert', 'eee', '2018-03-09', '14:55:10', 'test', 74),
(46, 'cours de sÃ©curitÃ© dans de domaine de l\'informatique', 'Aidez moi Ã  avoir des cours de sÃ©curitÃ© bien pointus', '2018-03-10', '10:43:01', 'toto', 75),
(47, 'cours de sÃ©curitÃ© dans de domaine de l\'informatique', 'je te proposerais (Securite Informatique - Ethical Hacking)', '2018-03-10', '10:47:36', 'alpha7', 75),
(48, 'comment appliquer un style Ã  plusieurs feuilles de style', 'j\'ai un veritable problÃ¨me avec mais page\r\nje n\'arrive pas Ã  appliquer ma feuille de style par defaut Ã  toutes mes pages', '2018-03-10', '11:17:57', 'alpha7', 43),
(49, 'commentaire css', 'comment foit-on un commentaire en css? je n\'y arrive pas', '2018-03-10', '11:19:44', 'alpha7', 76),
(54, 'sujet pour le test', 'c\'est un test', '2018-03-14', '10:40:16', 'alpha7', 79),
(55, 'sujet pour le test', 'oui un test', '2018-03-14', '10:40:50', 'alpha7', 79),
(56, 'sujet pour le test', 'bon test !', '2018-03-14', '10:41:24', 'rio', 79),
(60, 'tert', 'test', '2018-03-14', '11:25:27', 'raz', 74),
(61, 'tert', 'je reponds', '2018-03-14', '11:25:58', 'rio', 81),
(62, 'jefs', 'sfsf', '2018-03-14', '11:32:27', 'rio', 82),
(63, 'tst', 'tset', '2018-03-15', '10:28:08', 'toto', 83),
(64, 'tst', 'reponse', '2018-03-15', '10:28:51', 'toto', 83),
(65, 'ok', 'cc', '2018-03-15', '10:48:59', 'toto', 84),
(66, 'ok', 'cc', '2018-03-15', '10:51:09', 'toto', 84),
(67, 'voyage', 'merci bcp', '2018-03-15', '10:57:53', 'toto', 85),
(68, 'messageok', 'vendre', '2018-03-15', '10:59:11', 'toto', 85),
(69, 'voyage', 'desolÃ© pour tous', '2018-03-15', '10:59:38', 'toto', 85),
(70, 'voyage', 'merci bcp', '2018-03-15', '11:00:25', 'toto', 85),
(71, 'espion', 'voici', '2018-03-15', '11:14:48', 'charles', 87),
(72, 'espion', 'pas de problem', '2018-03-15', '11:15:52', 'toto', 87),
(73, 'tatatz', 'Jdjdidkd difbeie', '2018-05-17', '11:21:17', 'rio', 88),
(74, 'commentaire css', '/*commentaire*/', '2018-05-31', '15:49:33', 'rio', 76),
(75, 'problem', 'description\r\n', '2019-02-25', '17:01:54', 'trello', 89);

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id_subject` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_theme` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_subject`),
  KEY `id_user` (`id_user`),
  KEY `id_theme` (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `subjects`
--

INSERT INTO `subjects` (`id_subject`, `title`, `date`, `time`, `id_user`, `id_theme`) VALUES
(2, 'je veux savoir comment inclure un fichier html dans mon code', '2018-03-05', '16:35:29', 'rio', 2),
(16, 'j\'ai une erreur de code 404. Aidez moi SVP', '2018-03-05', '17:33:09', 'rio', 1),
(43, 'comment appliquer un style Ã  plusieurs feuilles de style', '2018-03-06', '10:48:39', 'alpha7', 3),
(56, 'Comment arreter un script en cours?', '2018-03-06', '22:38:03', 'rio', 1),
(70, 'comment afficher un texte en php', '2018-03-07', '03:36:58', 'alpha7', 1),
(71, 'sujet de test', '2018-03-07', '10:34:28', 'alpha7', 1),
(72, 'Un editeur de texte pour java', '2018-03-07', '23:11:02', 'toto', 4),
(73, 'test', '2018-03-09', '14:44:39', 'alpha7', 1),
(74, 'tert', '2018-03-09', '14:55:10', 'test', 1),
(75, 'cours de sÃ©curitÃ© dans de domaine de l\'informatique', '2018-03-10', '10:43:01', 'toto', 6),
(76, 'commentaire css', '2018-03-10', '11:19:44', 'alpha7', 3),
(77, 'tes', '2018-03-13', '08:23:02', 'alpha7', 1),
(79, 'sujet pour le test', '2018-03-14', '10:40:16', 'alpha7', 1),
(81, 'tert', '2018-03-14', '11:25:27', 'raz', 1),
(82, 'jefs', '2018-03-14', '11:32:27', 'rio', 1),
(83, 'tst', '2018-03-15', '10:28:08', 'toto', 2),
(84, 'ok', '2018-03-15', '10:48:59', 'toto', 2),
(85, 'voyage', '2018-03-15', '10:57:53', 'toto', 4),
(86, 'voyage', '2018-03-15', '11:00:25', 'toto', 4),
(87, 'espion', '2018-03-15', '11:14:48', 'charles', 5),
(88, 'tatatz', '2018-05-17', '11:21:17', 'rio', 2),
(89, 'problem', '2019-02-25', '17:01:54', 'trello', 1);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `id_theme` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id_theme`, `name`, `description`) VALUES
(1, 'Programmation en PHP', 'aide pour toutes vos questions sur le langage php'),
(2, 'Programmation en HTML', 'vos preoccupations sur le HTML'),
(3, 'Programmation en CSS', 'pour vos soucis sur votre feuille de style'),
(4, 'Programmation JAVA', 'pour vous remettre en jambe'),
(5, 'Etique en programmation', 'question de bonne pratique en\r\nprogrammation'),
(6, 'SÃ©curitÃ© informatique', 'pour vos question de securite');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` varchar(15) NOT NULL,
  `passwd` varchar(15) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `passwd`, `name`, `firstname`, `email`) VALUES
('alpha7', 'angui', 'Angui', 'Bini kouadio josias', 'binikouadiojosias@gmail.com'),
('avatar', 'azerty', 'yao', 'kouassi', 'kouassi@gmail.com'),
('avatar2', 'reza', 'rere', 'rara', 'rere@yahoo.fr'),
('charles', 'charlesjoel', 'koffi', 'aya', 'charlesjoel@gmail.com'),
('guhaze', 'toto', 'tfguiho', 'yugiu', 'ygouij@live.com'),
('raz', 'azert', 'raz', 'raz', 'raz@gmail.com'),
('rio', 'rioas', 'toto', 'titi', 'titi@gmail.com'),
('tata', 'tata', 'tata', 'tete', 'tata@gmail.com'),
('test', 'test', 'test', 'tester', 'test@gmail.com'),
('toto', 'toto', 'toto', 'titi', 'tititoto@gmail.com'),
('trello', 'trello', 'toto', 'titi yo', 'gggg@gmail.com'),
('vartol', 'vartol', 'var', 'varia', 'vat@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
