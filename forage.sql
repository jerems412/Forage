-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 24 avr. 2022 à 10:25
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forage`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `dateAbonnement` date NOT NULL,
  `numeroAbonnement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptif` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nameClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresseClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephoneClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etatClient` int(11) NOT NULL,
  `id_Village` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compteurs`
--

CREATE TABLE `compteurs` (
  `id` int(11) NOT NULL,
  `numeroCompteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CumulConsommationCompteur` decimal(10,0) NOT NULL,
  `statutCompteur` int(11) NOT NULL,
  `id_abonnement` int(11) DEFAULT NULL,
  `etatCompteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `consommations`
--

CREATE TABLE `consommations` (
  `id` int(11) NOT NULL,
  `moisConsommation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consommationC` decimal(10,0) NOT NULL,
  `consommationCL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_compteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL,
  `dateF` date NOT NULL,
  `prixUnitaireF` int(11) NOT NULL,
  `etatF` int(11) NOT NULL,
  `id_clientF` int(11) DEFAULT NULL,
  `id_consommationF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reglements`
--

CREATE TABLE `reglements` (
  `id` int(11) NOT NULL,
  `id_facture` int(11) DEFAULT NULL,
  `etatReglement` int(11) NOT NULL,
  `dateReglement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nameRole` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nameRole`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_GESCLIENTELE'),
(3, 'ROLE_GESCOMMERCIALE'),
(4, 'ROLE_GESCOMPTEUR ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_roles` int(11) DEFAULT NULL,
  `identifiantUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastNameUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdpUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etatUser` int(11) NOT NULL,
  `nombreConnexion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villages`
--

CREATE TABLE `villages` (
  `id` int(11) NOT NULL,
  `nameVillage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameChef` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4788B767E173B1B8` (`id_client`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C82E745F4CEF46` (`id_Village`);

--
-- Index pour la table `compteurs`
--
ALTER TABLE `compteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EDFAEB4B9098E86C` (`id_abonnement`);

--
-- Index pour la table `consommations`
--
ALTER TABLE `consommations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_232F9E3F1DD9F740` (`id_compteur`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_647590B88E64327` (`id_clientF`),
  ADD KEY `IDX_647590BCBB48B79` (`id_consommationF`);

--
-- Index pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_648F2671201BCD60` (`id_facture`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1483A5E958BB6FF7` (`id_roles`);

--
-- Index pour la table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compteurs`
--
ALTER TABLE `compteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `consommations`
--
ALTER TABLE `consommations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reglements`
--
ALTER TABLE `reglements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `FK_4788B767E173B1B8` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `FK_C82E745F4CEF46` FOREIGN KEY (`id_Village`) REFERENCES `villages` (`id`);

--
-- Contraintes pour la table `compteurs`
--
ALTER TABLE `compteurs`
  ADD CONSTRAINT `FK_EDFAEB4B9098E86C` FOREIGN KEY (`id_abonnement`) REFERENCES `abonnements` (`id`);

--
-- Contraintes pour la table `consommations`
--
ALTER TABLE `consommations`
  ADD CONSTRAINT `FK_232F9E3F1DD9F740` FOREIGN KEY (`id_compteur`) REFERENCES `compteurs` (`id`);

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `FK_647590B88E64327` FOREIGN KEY (`id_clientF`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `FK_647590BCBB48B79` FOREIGN KEY (`id_consommationF`) REFERENCES `consommations` (`id`);

--
-- Contraintes pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD CONSTRAINT `FK_648F2671201BCD60` FOREIGN KEY (`id_facture`) REFERENCES `factures` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E958BB6FF7` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
