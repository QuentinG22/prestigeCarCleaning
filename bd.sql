-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 avr. 2024 à 19:07
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetprestige`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `idComment` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `_date` date DEFAULT current_timestamp(),
  `active` tinyint(1) DEFAULT 0,
  `idService` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`idComment`, `text`, `note`, `_date`, `active`, `idService`, `idUser`) VALUES
(4, 'Lorem ipsum dolor sit amet consectetur adipiscing, elit laoreet fermentum proin litora ad facilisi, feugiat metus at senectus molestie. Taciti nascetur pellentesque non habitant himenaeos risus quam ultricies, tellus eget volutpat inceptos sagittis aptent per, at integer rutrum velit ut ullamcorper dignissim. Pretium nam ante id penatibus class tortor suscipit fames dictum, ad bibendum himenaeos condimentum neque senectus praesent dui metus, vitae fusce faucibus dignissim odio vestibulum nascetur aenean. Imperdiet dapibus egestas enim vel conubia litora pellentesque netus pretium porttitor porta torquent, aenean fringilla dui dis diam aliquam taciti eu suscipit nam. Nullam aenean himenaeos erat pellentesque venenatis class neque imperdiet, ac eget cum donec consequat netus dis non, ut quam porta facilisis facilisi ante vehicula.', 4, '2024-04-05', 1, 92, 3),
(5, 'Lorem ipsum dolor sit amet consectetur adipiscing elit proin, cubilia aliquam orci tellus mollis aptent duis bibendum justo, potenti aliquet mi parturient eget eleifend facilisi. Fringilla ac eu euismod arcu ut malesuada diam natoque quis quam, aenean pharetra mus facilisis torquent auctor ad laoreet hendrerit, cras eleifend sociosqu aliquam lectus magnis per cum habitant. Massa inceptos magnis bibendum nascetur lacinia placerat metus maecenas non venenatis, nisi hendrerit auctor ornare pellentesque blandit integer ut dis convallis ultricies, ultrices turpis suspendisse aenean dictumst et porttitor mauris eleifend. Maecenas ac inceptos diam facilisis felis sapien urna tempor et elementum orci, scelerisque massa condimentum augue accumsan ante praesent pulvinar ad. Nisi lacinia nam purus pretium orci ante suscipit, duis himenaeos porttitor quam ornare consequat libero, iaculis ac lectus hendrerit natoque venenatis.', 5, '2024-04-05', 1, 95, 4),
(6, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, ultricies commodo sapien eget torquent vitae, elementum blandit fusce justo viverra tortor. Dui suscipit nascetur odio est aliquam lacinia quis mollis sed facilisis, posuere pretium metus accumsan malesuada ridiculus auctor venenatis sem nostra varius, tellus neque lacus dictum elementum cras sagittis vitae taciti. Volutpat pellentesque mattis netus aenean primis justo vitae gravida ultrices velit ridiculus, lectus et consequat eros nam ut metus imperdiet quam tempus ad eleifend, luctus bibendum torquent aliquet hac sed urna curabitur litora lacus. Vehicula non fusce et id accumsan nisl taciti quis, nam urna morbi consequat velit nibh ultrices tempus per, parturient varius eu donec justo quam feugiat. Vivamus cubilia cursus per neque sapien dapibus dictum luctus orci, pharetra habitant pellentesque euismod arcu torquent quis purus mattis, convallis lobortis feugiat nunc etiam interdum varius senectus. Sagittis potenti auctor augue ut etiam cras tempus duis, convallis orci gravida eros nam faucibus accumsan.', 3, '2024-04-05', 1, 93, 5),
(7, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, porta auctor pulvinar aliquam senectus fermentum tincidunt ridiculus, ante tortor mi eget est augue. Nec morbi odio luctus mus nisl lobortis facilisi, duis ullamcorper dui sodales mauris platea, a suspendisse nisi velit lacus volutpat. Mollis mattis maecenas nascetur lacinia vel venenatis eleifend sed, nisi magna primis volutpat fames etiam suspendisse dictum, erat vehicula dui tellus quisque platea nam. Ligula lacinia suscipit nunc vel commodo eleifend maecenas nostra hac lacus, ultricies habitasse posuere cum pellentesque augue diam tincidunt. Mollis rhoncus aliquam penatibus scelerisque aliquet, ante ultrices lectus neque nibh, eget posuere class iaculis, integer purus venenatis duis. Turpis quam egestas id duis per volutpat quisque euismod, pulvinar etiam venenatis sapien leo pharetra justo, convallis mollis a vehicula nam rhoncus aptent. Curabitur ornare cras integer iaculis cum felis litora eros imperdiet, vehicula sollicitudin lectus per dapibus volutpat in platea vulputate fermentum, ac fames urna tempus ultrices consequat mauris gravida.', 5, '2024-04-05', 1, 94, 6),
(8, 'TEST', 1, '2024-04-05', 0, 95, 1),
(9, 'test2', 1, '2024-04-08', 0, 92, 1),
(10, 'test  3', 5, '2024-04-08', 1, 95, 1),
(11, 'Test4', 3, '2024-04-08', 0, 92, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `idContact` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `object` varchar(250) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`idContact`, `name`, `firstname`, `email`, `object`, `text`, `_date`, `idUser`) VALUES
(1, 'Dupond', 'Pierre', 'dupond-pierre@exemple.com', 'Test', 'Lorem ipsum dolor sit amet consectetur adipiscing elit fermentum et aenean quis molestie lobortis, suspendisse tincidunt mauris conubia magnis a integer erat lectus imperdiet ridiculus. Pellentesque taciti nec netus est feugiat quis eros tellus egestas convallis, elementum mus tempor luctus sociosqu dictum ridiculus per tincidunt inceptos, ultricies lacus odio sodales nisl velit cubilia ultrices curae. Diam pharetra praesent massa pulvinar porttitor fringilla vivamus, aptent euismod mattis bibendum ridiculus blandit justo tincidunt, dictum nullam nunc ac nisl iaculis. Per natoque hendrerit pulvinar lacinia volutpat et enim nulla faucibus, dis fames suspendisse nisi pellentesque ad interdum sociosqu feugiat facilisis, potenti ultrices rhoncus montes nostra turpis ac quis.', '2024-03-27', NULL),
(5, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', 'Test2', 'test2', '2024-03-28', NULL),
(7, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', 'test3', 'test3', '2024-03-28', 1),
(9, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', '&lt;script&gt;alert(&#039;TEST INJECTION&#039;);&lt;/script&gt;', 'TEST INJECTION CODE', '2024-03-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`idProduct`, `nameProduct`, `description`) VALUES
(13, 'Produit 1', 'Lorem ipsum dolor sit amet consectetur adipiscing elit, primis nisl ultricies accumsan pellentesque curae ac, mus eleifend aenean pharetra tellus facilisis. Per libero sollicitudin aliquet semper parturient, integer nisi nec.'),
(14, 'Produit 2', 'Lorem ipsum dolor sit amet consectetur adipiscing elit nunc velit eros, nisl sociosqu justo rutrum laoreet arcu ligula id egestas non, penatibus ultricies dapibus risus scelerisque pulvinar cras purus imperdiet.'),
(15, 'Produit 3', 'Lorem ipsum dolor sit amet consectetur adipiscing, elit eleifend sociis malesuada imperdiet, habitant fringilla venenatis leo ornare. Auctor vestibulum tempor pellentesque facilisi, in conubia porta aliquet felis, ullamcorper odio class.'),
(16, 'Produit 4', 'Lorem ipsum dolor sit amet consectetur adipiscing elit gravida nullam pharetra, himenaeos sodales quam platea facilisi aenean maecenas praesent quisque lacus, dui rutrum donec pretium vehicula iaculis velit nulla sed.'),
(17, 'Produit 5', 'Lorem ipsum dolor sit amet consectetur adipiscing elit lacinia porttitor mollis, morbi facilisis mauris convallis parturient fermentum bibendum rhoncus malesuada magnis, tincidunt posuere montes scelerisque dictumst pulvinar blandit turpis egestas.');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `idService` int(11) NOT NULL,
  `nameService` varchar(100) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`idService`, `nameService`, `text`, `price`) VALUES
(92, 'Prestation ECO', 'INTERIEUR :\r\nAspirateur complète du véhicule\r\nNettoyage vitres\r\nDestruction odeurs\r\n\r\nEXTERIEUR :\r\nShampoing carrosserie\r\nNettoyage jantes', 90.00),
(93, 'Prestation CONFORT', 'INTERIEUR :\r\nAspirateur complète du véhicule\r\nNettoyage vitres\r\nDépoussiérage microfibre\r\nDestruction odeurs\r\nNettoyage tapis\r\n\r\nEXTERIEUR :\r\nShampoing carrosserie\r\nNettoyage jantes\r\nBrillance carrosserie', 120.00),
(94, 'Prestation PREMIUM', 'INTERIEUR :\r\nAspirateur complète du véhicule\r\nNettoyage vitres\r\nDépoussiérage microfibre\r\nDestruction odeurs\r\nNettoyage tapis\r\nRénovation tapis / moquettes\r\nDressing complet des plastiques / joints\r\nShampouinage sièges\r\n\r\nEXTERIEUR :\r\nShampoing carrosserie au pinceau\r\nNettoyage jantes / pneus\r\nBrillance carrosserie\r\nMousse active\r\nDémoustiquant / dégoudronnant\r\nDressing pneus', 170.00),
(95, 'Prestation 4', 'Lorem ipsum dolor sit amet consectetur adipiscing elit taciti netus, ac mus tortor hac blandit lacinia nam molestie nisi, purus eget nullam urna vestibulum aliquam lobortis pulvinar. Hac habitasse semper ullamcorper ultricies nam a ultrices, primis aliquam malesuada tempor integer class mi himenaeos, vivamus mattis aliquet ad curabitur \r\n&lt;br&gt;&lt;br&gt;\r\nvehicula. Accumsan erat platea eros in malesuada dapibus laoreet nunc molestie, vestibulum dictumst senectus id gravida curae penatibus lacus tellus sociis, vulputate vehicula risus mi nam rhoncus inceptos lacinia. Orci suscipit natoque eu inceptos proin hendrerit netus ac pharetra ut, libero nibh non sociis eros potenti mauris tincidunt ultrices, porttitor et urna arcu duis sapien fusce mi vehicula. Suscipit duis gravida purus non pellentesque sociis, velit dictum volutpat class justo molestie aliquet, condimentum nisl mauris penatibus lectus. ', 200.00);

-- --------------------------------------------------------

--
-- Structure de la table `touse`
--

CREATE TABLE `touse` (
  `idService` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `touse`
--

INSERT INTO `touse` (`idService`, `idProduct`) VALUES
(92, 13),
(92, 14),
(93, 13),
(93, 14),
(93, 15),
(94, 13),
(94, 14),
(94, 15),
(94, 16),
(95, 13),
(95, 14),
(95, 15),
(95, 16),
(95, 17);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `password`, `name`, `firstname`, `phone`, `isAdmin`) VALUES
(1, 'quentin-guillemin@orange.fr', '$2y$10$0co6Cuk4YZ1RGbnXCkOdTeWqrAmEjIcORlNlGdJ9J6Ki6VKS1IywK', 'Guillemin', 'Quentin', 770301953, 1),
(2, 'visiteur@visiteur.fr', '$2y$10$5B71WkNs8xrfve.4i7C9kOGFcblfZiqvkflkqsltr1EcO1rObkLZ6', 'Visiteur', 'Visiteur', 102030405, 0),
(3, 'pierre@dupond.fr', '$2y$10$dAmBaQfbUvQX7veGVDntp.k75hXEDiqA4dopP/7otUNMWdT3wHZNy', 'Dupond', 'Pierre', 102030405, 0),
(4, 'fontaine@marie.fr', '$2y$10$aV6LkktND3WpCr2iptD0M.vuADrZ5r7mf8WagJxx7vJGyyj/Jjlc.', 'Fontaine', 'Marie', 606060606, 0),
(5, 'michael@smith.fr', '$2y$10$V18bIsLHufiDM.Od6zEtGOwzQX4UyoZ/vktJZHVSRTuniSsXMswQu', 'Smith', 'Michael', 607060706, 0),
(6, 'olivia@martinez.fr', '$2y$10$zysIKK/U3B/3QDlMGbjpr.OTK3BGkvn.e4PSGUTSuiqWlf2zBlueK', 'Martinez', 'Olivia', 607060700, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idService` (`idService`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`idService`);

--
-- Index pour la table `touse`
--
ALTER TABLE `touse`
  ADD PRIMARY KEY (`idService`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `services` (`idService`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `touse`
--
ALTER TABLE `touse`
  ADD CONSTRAINT `touse_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `services` (`idService`),
  ADD CONSTRAINT `touse_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
