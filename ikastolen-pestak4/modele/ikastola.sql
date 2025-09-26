-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 21 Septembre 2019 à 19:22
-- Version du serveur :  10.1.41-MariaDB-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ikastola`
--

-- --------------------------------------------------------

--
-- Structure de la table `aimer`
--

CREATE TABLE `aimer` (
  `idF` bigint(20) NOT NULL,
  `mailU` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `aimer`
--

INSERT INTO `aimer` (`idF`, `mailU`) VALUES
(1, 'elorri.ipar@gmail.com'),
(1, 'ikas@snir.eus'),
(1, 'iker.andueza@euskaltel.eus'),
(1, 'jokin.zarzabal@gmail.com'),
(1, 'patxi.garat@gmail.com'),
(2, 'antton.eramuzpe@euskaltel.eus'),
(2, 'ikas@snir.eus'),
(2, 'iker.andueza@euskaltel.eus'),
(2, 'jokin.zarzabal@gmail.com'),
(3, 'antton.eramuzpe@euskaltel.eus'),
(3, 'elorri.ipar@gmail.com'),
(3, 'ikas@snir.eus'),
(3, 'jokin.zarzabal@gmail.com'),
(4, 'elorri.ipar@gmail.com'),
(4, 'ikas@snir.eus'),
(4, 'jokin.zarzabal@gmail.com'),
(4, 'patxi.garat@gmail.com'),
(5, 'elorri.ipar@gmail.com'),
(5, 'ikas@snir.eus'),
(5, 'patxi.garat@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `critiquer`
--

CREATE TABLE `critiquer` (
  `idF` bigint(20) NOT NULL,
  `mailU` varchar(150) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `commentaire` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `critiquer`
--

INSERT INTO `critiquer` (`idF`, `mailU`, `note`, `commentaire`) VALUES
(1, 'antton.eramuzpe@euskaltel.eus', 4, 'Super ambiance, bons vins et grillades de rêve :)'),
(1, 'ikas@snir.eus', 5, 'Araba est chaleureuse, bonne musique et de quoi faire plaisir au palais, que du plaisir :)'),
(1, 'iker.andueza@euskaltel.eus', 3, 'J\'ai découvert le txakoli d\'Araba, très bon !'),
(1, 'jokin.zarzabal@gmail.com', 3, 'Les talo sont toujours aussi bon, surtout avec un bon vin :)'),
(2, 'antton.eramuzpe@euskaltel.eus', 3, 'Moi qui adore les pintxo et le txakoli j\'ai été gâté !'),
(2, 'ikas@snir.eus', 5, 'Ambiance chaleureuse, bonne musique et de quoi faire plaisir au palais, que du plaisir :)'),
(2, 'iker.andueza@euskaltel.eus', 4, 'Gipuzkoa est un piège à palais tellement tout est bon :)'),
(2, 'jokin.zarzabal@gmail.com', 3, 'Je découvre l\'Araba et j\'y reviendrai, que du bonheur !'),
(2, 'patxi.garat@gmail.com', 4, 'Les bizkaitar sont vraiment des gourmants :)'),
(3, 'antton.eramuzpe@euskaltel.eus', 4, 'Cette année j\'ai mangé à la cidrerie Zapiain, c\'était vraiment bon !'),
(3, 'ikas@snir.eus', 5, 'Herri Urrats un plaisir qui ne s\'érode pas :)'),
(3, 'jokin.zarzabal@gmail.com', 3, 'J\'apprécie toujours autant le casse-croûte du matin avant que la foule n\'arrive.'),
(4, 'antton.eramuzpe@euskaltel.eus', 4, 'L\'omelette à la morue...un délice !'),
(4, 'ikas@snir.eus', 5, 'Gipuzkoa, ses trainières, ses plages et sa gastronomie conviviale et goûteuse'),
(4, 'jokin.zarzabal@gmail.com', 4, 'Le cidre cette année était particulièrement bon.'),
(5, 'ikas@snir.eus', 5, 'Nafarroa, ses pintxo et ses vins si bons, la gaita et une culture forte.');

-- --------------------------------------------------------

--
-- Structure de la table `fete`
--

CREATE TABLE `fete` (
  `idF` bigint(20) NOT NULL,
  `nomF` varchar(255) DEFAULT NULL,
  `numAdrF` varchar(20) DEFAULT NULL,
  `voieAdrF` varchar(255) DEFAULT NULL,
  `cpF` char(5) DEFAULT NULL,
  `villeF` varchar(255) DEFAULT NULL,
  `latitudeDegF` float DEFAULT NULL,
  `longitudeDegF` float DEFAULT NULL,
  `descF` text,
  `horairesF` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `fete`
--

INSERT INTO `fete` (`idF`, `nomF`, `numAdrF`, `voieAdrF`, `cpF`, `villeF`, `latitudeDegF`, `longitudeDegF`, `descF`, `horairesF`) VALUES
(1, 'Araba Euskaraz', '101', 'Gaztelako Atea', '01007', 'Gasteiz', 42.8383, -2.69398, 'Fêtes des ikastola d\'Araba', '<table>\n    <thead>\n    <tr>\n        <th>Activités</th><th>Concert</th><th>Danses</th>\n    </tr>\n    </thead>\n    <tbody>\n    <tr><TH ROWSPAN=3 class=\"label\">Matin</TH>\n        <td class=\"cell\">10h Concert </td><td class=\"cell\">09h30 Spect. 1</td></tr>\n    <tr><td class=\"cell\">11h Concert 2</td><td class=\"cell\">10h30 Spect. 2</tr>\n    <tr><td class=\"cell\">12h Concert 3</td></tr>\n    </tr>\n    <tr><TH ROWSPAN=6 class=\"label\">Après-midi</TH>\n    <td class=\"cell\">13h Concert 4</td></tr>\n    <tr><td class=\"cell\">14h Concert 5</td><td class=\"cell\">14h30 Spect. 3</td></tr>\n    <tr><td class=\"cell\">15h Concert 6</td></tr>\n    <tr><td class=\"cell\">16h Concert 7</td><td class=\"cell\">15h30 Spect. 4</td></tr>\n    <tr><td class=\"cell\">17h Concert 8</td></tr>\n    <tr><td class=\"cell\">18h Concert 9</td></tr>\n    </tr>\n    </tbody>\n</table>\n\n'),
(2, 'Ibilaldia', '3', 'San Pio X Kalea', '48230', 'Elorrio', 43.1306, -2.54493, 'Fêtes des ikastola de Bizkaia', '<table>\n    <thead>\n    <tr>\n        <th>Activités</th><th>Concert</th><th>Danses</th>\n    </tr>\n    </thead>\n    <tbody>\n    <tr><TH ROWSPAN=3 class=\"label\">Matin</TH>\n        <td class=\"cell\">10h Concert </td><td class=\"cell\">09h30 Spect. 1</td></tr>\n    <tr><td class=\"cell\">11h Concert 2</td><td class=\"cell\">10h30 Spect. 2</tr>\n    <tr><td class=\"cell\">12h Concert 3</td></tr>\n    </tr>\n    <tr><TH ROWSPAN=6 class=\"label\">Après-midi</TH>\n    <td class=\"cell\">13h Concert 4</td></tr>\n    <tr><td class=\"cell\">14h Concert 5</td><td class=\"cell\">14h30 Spect. 3</td></tr>\n    <tr><td class=\"cell\">15h Concert 6</td></tr>\n    <tr><td class=\"cell\">16h Concert 7</td><td class=\"cell\">15h30 Spect. 4</td></tr>\n    <tr><td class=\"cell\">17h Concert 8</td></tr>\n    <tr><td class=\"cell\">18h Concert 9</td></tr>\n    </tr>\n    </tbody>\n</table>\n\n'),
(3, 'Herri Urrats', NULL, 'Aintzira/Lac', '64310', 'Senpere', 43.3464, -1.52296, 'Fêtes des ikastola d\'Iparralde.', '<table>\r\n    <thead>\r\n    <tr>\r\n        <th>Activités</th><th>Concert</th><th>Danses</th>\r\n    </tr>\r\n    </thead>\r\n    <tbody>\r\n    <tr><TH ROWSPAN=3 class=\"label\">Matin</TH>\r\n        <td class=\"cell\">10h Concert </td><td class=\"cell\">09h30 Spect. 1</td></tr>\r\n    <tr><td class=\"cell\">11h Concert 2</td><td class=\"cell\">10h30 Spect. 2</tr>\r\n    <tr><td class=\"cell\">12h Concert 3</td></tr>\r\n    </tr>\r\n    <tr><TH ROWSPAN=6 class=\"label\">Après-midi</TH>\r\n    <td class=\"cell\">13h Concert 4</td></tr>\r\n    <tr><td class=\"cell\">14h Concert 5</td><td class=\"cell\">14h30 Spect. 3</td></tr>\r\n    <tr><td class=\"cell\">15h Concert 6</td></tr>\r\n    <tr><td class=\"cell\">16h Concert 7</td><td class=\"cell\">15h30 Spect. 4</td></tr>\r\n    <tr><td class=\"cell\">17h Concert 8</td></tr>\r\n    <tr><td class=\"cell\">18h Concert 9</td></tr>\r\n    </tr>\r\n    </tbody>\r\n</table>\r\n\r\n'),
(4, 'Kilometroak', NULL, NULL, '64210', 'Zarautz', 43.2842, -2.15907, 'Fêtes des ikastola de Gipuzkoa', '<table>\n    <thead>\n    <tr>\n        <th>Activités</th><th>Concert</th><th>Danses</th>\n    </tr>\n    </thead>\n    <tbody>\n    <tr><TH ROWSPAN=3 class=\"label\">Matin</TH>\n        <td class=\"cell\">10h Concert </td><td class=\"cell\">09h30 Spect. 1</td></tr>\n    <tr><td class=\"cell\">11h Concert 2</td><td class=\"cell\">10h30 Spect. 2</tr>\n    <tr><td class=\"cell\">12h Concert 3</td></tr>\n    </tr>\n    <tr><TH ROWSPAN=6 class=\"label\">Après-midi</TH>\n    <td class=\"cell\">13h Concert 4</td></tr>\n    <tr><td class=\"cell\">14h Concert 5</td><td class=\"cell\">14h30 Spect. 3</td></tr>\n    <tr><td class=\"cell\">15h Concert 6</td></tr>\n    <tr><td class=\"cell\">16h Concert 7</td><td class=\"cell\">15h30 Spect. 4</td></tr>\n    <tr><td class=\"cell\">17h Concert 8</td></tr>\n    <tr><td class=\"cell\">18h Concert 9</td></tr>\n    </tr>\n    </tbody>\n</table>\n\n'),
(5, 'Nafarroa Oinez', NULL, 'Fontellas', '31512', 'Tutera', 42.0311, -1.58393, 'Fêtes des ikastola de Nafarroa', '<table>\n    <thead>\n    <tr>\n        <th>Activités</th><th>Concert</th><th>Danses</th>\n    </tr>\n    </thead>\n    <tbody>\n    <tr><TH ROWSPAN=3 class=\"label\">Matin</TH>\n        <td class=\"cell\">10h Concert </td><td class=\"cell\">09h30 Spect. 1</td></tr>\n    <tr><td class=\"cell\">11h Concert 2</td><td class=\"cell\">10h30 Spect. 2</tr>\n    <tr><td class=\"cell\">12h Concert 3</td></tr>\n    </tr>\n    <tr><TH ROWSPAN=6 class=\"label\">Après-midi</TH>\n    <td class=\"cell\">13h Concert 4</td></tr>\n    <tr><td class=\"cell\">14h Concert 5</td><td class=\"cell\">14h30 Spect. 3</td></tr>\n    <tr><td class=\"cell\">15h Concert 6</td></tr>\n    <tr><td class=\"cell\">16h Concert 7</td><td class=\"cell\">15h30 Spect. 4</td></tr>\n    <tr><td class=\"cell\">17h Concert 8</td></tr>\n    <tr><td class=\"cell\">18h Concert 9</td></tr>\n    </tr>\n    </tbody>\n</table>\n\n');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idP` bigint(20) NOT NULL,
  `cheminP` varchar(255) DEFAULT NULL,
  `idF` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idP`, `cheminP`, `idF`) VALUES
(0, 'sagarnoa.jpg', 4),
(2, 'aeTxakoli.jpg', 1),
(3, 'ibPintxo2.jpg', 1),
(4, 'charcuterie.jpg', 5),
(6, 'ibPintxo.jpg', 2),
(8, 'kiPintxo.jpg', 2),
(9, 'pintxo.jpg', 4),
(10, 'aeGrillades.jpg', 1),
(11, 'pouletRoti.jpg', 5),
(12, 'kiPintxo.png', 4),
(13, 'kiPintxo2.jpg', 5),
(14, 'noArnoa.jpg', 5),
(15, 'omeletteMorue.jpg', 4),
(16, 'aeArnoa.jpg', 1),
(18, 'txakoli.jpg', 4),
(19, 'txuleta.jpg', 4),
(20, 'txuleta2.jpg', 2),
(21, 'HUZikiroa.JPG', 3),
(22, 'arabaEuskaraz.png', 1),
(23, 'ibilaldia.png', 2),
(24, 'HerriUrrats.png', 3),
(25, 'kilometroak.png', 4),
(26, 'NafarroaOinez.jpg', 5),
(27, 'HU2019.jpg', 3),
(28, 'HUKontzertua.JPG', 3),
(29, 'txuletaSagardotegi.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `preferer`
--

CREATE TABLE `preferer` (
  `mailU` varchar(150) NOT NULL,
  `idTG` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `preferer`
--

INSERT INTO `preferer` (`mailU`, `idTG`) VALUES
('antton.eramuzpe@euskaltel.eus', 1),
('antton.eramuzpe@euskaltel.eus', 2),
('antton.eramuzpe@euskaltel.eus', 3),
('elorri.ipar@gmail.com', 1),
('elorri.ipar@gmail.com', 2),
('elorri.ipar@gmail.com', 3),
('elorri.ipar@gmail.com', 4),
('iker.andueza@euskaltel.eus', 1),
('iker.andueza@euskaltel.eus', 2),
('iker.andueza@euskaltel.eus', 3),
('iker.andueza@euskaltel.eus', 4),
('jokin.zarzabal@gmail.com', 1),
('jokin.zarzabal@gmail.com', 2),
('jokin.zarzabal@gmail.com', 3),
('jokin.zarzabal@gmail.com', 4);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE `proposer` (
  `idF` bigint(20) NOT NULL,
  `idTG` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `proposer`
--

INSERT INTO `proposer` (`idF`, `idTG`) VALUES
(1, 1),
(1, 10),
(1, 11),
(1, 12),
(1, 14),
(2, 3),
(2, 8),
(2, 10),
(2, 11),
(3, 2),
(3, 5),
(3, 7),
(3, 9),
(3, 11),
(4, 4),
(4, 8),
(4, 11),
(5, 6),
(5, 10),
(5, 14);

-- --------------------------------------------------------

--
-- Structure de la table `typeGastronomie`
--

CREATE TABLE `typeGastronomie` (
  `idTG` bigint(20) NOT NULL,
  `libelleTG` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `typeGastronomie`
--

INSERT INTO `typeGastronomie` (`idTG`, `libelleTG`) VALUES
(1, 'Araba'),
(2, 'Baxenabarre'),
(3, 'Bizkaia'),
(4, 'Gipuzkoa'),
(5, 'Lapurdi'),
(6, 'Nafarroa'),
(7, 'Zuberoa'),
(8, 'poisson'),
(9, 'cidrerie'),
(10, 'pintxo'),
(11, 'grillade'),
(12, 'Txakoli'),
(13, 'Cidre'),
(14, 'Vins de qualité');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `mailU` varchar(150) NOT NULL,
  `mdpU` varchar(50) DEFAULT NULL,
  `pseudoU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mailU`, `mdpU`, `pseudoU`) VALUES
('antton.eramuzpe@euskaltel.eus', 'se3NdlrMxhQyg', 'Antton'),
('elorri.ipar@gmail.com', 'se3NdlrMxhQyg', 'Elorri'),
('ikas@snir.eus', 'se3NdlrMxhQyg', 'ikas'),
('iker.andueza@euskaltel.eus', 'se3NdlrMxhQyg', 'Iker'),
('jokin.zarzabal@gmail.com', 'se3NdlrMxhQyg', 'jokin'),
('patxi.garat@gmail.com', 'se3NdlrMxhQyg', 'patxi');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `aimer`
--
ALTER TABLE `aimer`
  ADD PRIMARY KEY (`idF`,`mailU`),
  ADD KEY `mailU` (`mailU`);

--
-- Index pour la table `critiquer`
--
ALTER TABLE `critiquer`
  ADD PRIMARY KEY (`idF`,`mailU`),
  ADD KEY `mailU` (`mailU`);

--
-- Index pour la table `fete`
--
ALTER TABLE `fete`
  ADD PRIMARY KEY (`idF`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `idR` (`idF`);

--
-- Index pour la table `preferer`
--
ALTER TABLE `preferer`
  ADD PRIMARY KEY (`mailU`,`idTG`),
  ADD KEY `idTC` (`idTG`);

--
-- Index pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD PRIMARY KEY (`idF`,`idTG`),
  ADD KEY `idTC` (`idTG`);

--
-- Index pour la table `typeGastronomie`
--
ALTER TABLE `typeGastronomie`
  ADD PRIMARY KEY (`idTG`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`mailU`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `aimer`
--
ALTER TABLE `aimer`
  ADD CONSTRAINT `aimer_ibfk_1` FOREIGN KEY (`idF`) REFERENCES `fete` (`idF`),
  ADD CONSTRAINT `aimer_ibfk_2` FOREIGN KEY (`mailU`) REFERENCES `utilisateur` (`mailU`);

--
-- Contraintes pour la table `critiquer`
--
ALTER TABLE `critiquer`
  ADD CONSTRAINT `critiquer_ibfk_1` FOREIGN KEY (`idF`) REFERENCES `fete` (`idF`),
  ADD CONSTRAINT `critiquer_ibfk_2` FOREIGN KEY (`mailU`) REFERENCES `utilisateur` (`mailU`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idF`) REFERENCES `fete` (`idF`);

--
-- Contraintes pour la table `preferer`
--
ALTER TABLE `preferer`
  ADD CONSTRAINT `preferer_ibfk_1` FOREIGN KEY (`mailU`) REFERENCES `utilisateur` (`mailU`),
  ADD CONSTRAINT `preferer_ibfk_2` FOREIGN KEY (`idTG`) REFERENCES `typeGastronomie` (`idTG`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `proposer_ibfk_1` FOREIGN KEY (`idF`) REFERENCES `fete` (`idF`),
  ADD CONSTRAINT `proposer_ibfk_2` FOREIGN KEY (`idTG`) REFERENCES `typeGastronomie` (`idTG`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
