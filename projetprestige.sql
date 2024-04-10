-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 31 mars 2024 à 16:24
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
  `_date` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `idService` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', 'Test', 'test', '2024-03-28', NULL),
(5, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', 'Test2', 'test2', '2024-03-28', NULL),
(7, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', 'test3', 'test3', '2024-03-28', 1),
(8, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', 'test3', 'test3', '2024-03-28', 1),
(9, 'Guillemin', 'Quentin', 'quentin-guillemin@orange.fr', '&lt;script&gt;alert(&#039;TEST INJECTION&#039;);&lt;/script&gt;', 'TEST INJECTION CODE', '2024-03-28', 1),
(10, 'Visiteur', 'Visiteur', 'visiteur@visiteur.fr', 'Tes connexion base', 'Test connexion base', '2024-03-29', NULL),
(11, 'Visiteur', 'Visiteur', 'visiteur@visiteur.fr', 'Test 2 connexion base', 'Test 2 connexion base', '2024-03-29', NULL),
(12, 'Visiteur', 'Visiteur', 'visiteur@visiteur.fr', 'Test connexion base', 'TEST', '2024-03-29', NULL),
(13, 'Visiteur', 'Visiteur', 'visiteur@visiteur.fr', 'Test View Managerer', 'Test View Managerer', '2024-03-29', NULL),
(14, 'Visiteur', 'Visiteur', 'visiteur@visiteur.fr', 'Dernier test des message', 'Dernier test des message', '2024-03-29', NULL),
(15, 'Visiteur', 'Visiteur', 'visiteur@visiteur.fr', 'Essai', 'Essai', '2024-03-29', NULL),
(16, 'Visiteur', 'Visiteur', 'visiteur@visiteur.fr', 'Test', 'test', '2024-03-29', NULL),
(17, 'Visiteur', 'Visiteur', 'toto@toto.fr', 'Test', 'test', '2024-03-31', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `touse`
--

CREATE TABLE `touse` (
  `idService` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'visiteur@visiteur.fr', '$2y$10$5B71WkNs8xrfve.4i7C9kOGFcblfZiqvkflkqsltr1EcO1rObkLZ6', 'Visiteur', 'Visiteur', 102030405, 0);

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
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
