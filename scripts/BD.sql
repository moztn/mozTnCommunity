-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 16 Septembre 2012 à 15:19
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `reps`
--

-- --------------------------------------------------------

--
-- Structure de la table `bug`
--

CREATE TABLE `bug` (
  `id` int(11) NOT NULL auto_increment,
  `titre` text NOT NULL,
  `url` text NOT NULL,
  `descr` text NOT NULL,
  `prio` int(11) NOT NULL,
  `mail` text NOT NULL,
  `etat` int(11) NOT NULL,
  `datedec` int(11) NOT NULL,
  `dateres` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Structure de la table `enligne`
--

CREATE TABLE `enligne` (
  `id` int(11) NOT NULL auto_increment,
  `pseudoligne` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL auto_increment,
  `nomeve` varchar(255) NOT NULL,
  `lien` varchar(255) default NULL,
  `description` text,
  `org` varchar(255) default NULL,
  `hashtag` varchar(255) default NULL,
  `datedeb` int(11) default NULL,
  `datefin` int(11) default NULL,
  `heuredeb` varchar(100) NOT NULL,
  `heurefin` varchar(100) NOT NULL,
  `city` varchar(250) NOT NULL,
  `lieu` varchar(255) default NULL,
  `map` text NOT NULL,
  `nbpart` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Structure de la table `eventuser`
--

CREATE TABLE `eventuser` (
  `id` int(11) NOT NULL auto_increment,
  `iduser` int(11) NOT NULL,
  `idevent` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;


-- --------------------------------------------------------

--
-- Structure de la table `interet`
--

CREATE TABLE `interet` (
  `id` int(11) NOT NULL auto_increment,
  `iduser` int(11) NOT NULL,
  `nomint` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1268 ;

-- --------------------------------------------------------

--
-- Structure de la table `mp`
--

CREATE TABLE `mp` (
  `id` int(11) NOT NULL auto_increment,
  `sujet` varchar(255) collate utf8_bin NOT NULL default '',
  `expediteur` varchar(255) collate utf8_bin NOT NULL default '',
  `destinataire` varchar(255) collate utf8_bin NOT NULL default '',
  `message` text collate utf8_bin NOT NULL,
  `timestamp` bigint(20) NOT NULL default '0',
  `vu` enum('0','1') collate utf8_bin NOT NULL default '0',
  `efface` enum('0','1','2') collate utf8_bin NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `pseudo` varchar(30) character set latin1 collate latin1_general_ci NOT NULL,
  `mdp` varchar(32) character set latin1 collate latin1_general_ci NOT NULL,
  `email` varchar(250) character set latin1 collate latin1_general_ci NOT NULL,
  `nom` varchar(250) character set latin1 collate latin1_general_ci NOT NULL,
  `prenom` varchar(250) character set latin1 collate latin1_general_ci NOT NULL,
  `datenais` varchar(100) NOT NULL,
  `avatar` varchar(100) character set latin1 collate latin1_general_ci NOT NULL default '1273417847.jpg',
  `sexe` varchar(1) character set latin1 collate latin1_general_ci NOT NULL,
  `dateinscri` int(11) NOT NULL,
  `dervisit` int(11) NOT NULL,
  `rang` tinyint(4) default '1',
  `propos` text NOT NULL,
  `wiki` varchar(255) default NULL,
  `twitter` varchar(255) default NULL,
  `fb` varchar(255) default NULL,
  `irc` varchar(255) default NULL,
  `linkedin` varchar(255) default NULL,
  `diaspora` varchar(255) default NULL,
  `flickr` varchar(255) default NULL,
  `site` varchar(255) default NULL,
  `location` varchar(255) default NULL,
  `tel` varchar(255) default NULL,
  `adresse` varchar(255) default NULL,
  `cle_activation` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `users`
--

-- le mot de passe par défaut du compte admin est admin
-- adresse mail est : medhajfiras@gmail.com

INSERT INTO `users` (`id`, `pseudo`, `mdp`, `email`, `nom`, `prenom`, `datenais`, `avatar`, `sexe`, `dateinscri`, `dervisit`, `rang`, `propos`, `wiki`, `twitter`, `fb`, `irc`, `linkedin`, `diaspora`, `flickr`, `site`, `location`, `tel`, `adresse`, `cle_activation`) VALUES
(42, 'MedFiras', '21232f297a57a5a743894a0e4a801fc3', 'medhajfiras@gmail.com', 'Hajjej', 'Mohamed Firas', '23/10/1986', '1343626716.jpg', 'M', 1343408812, 1347477299, 4, 'mozilla reps mozilla reps mozilla reps mozilla reps \r\nmozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps \r\nmozilla reps mozilla reps mozilla reps mozi', 'http://reps.mozilla-tunisia.org', '@firas', 'firas', 'irc', 'linkedin', 'diaspora', 'flickr', 'site', NULL, '22781934', 'adresse', ''),