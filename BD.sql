-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 29 Juillet 2012 à 18:46
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `reps`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nomeve` varchar(255) NOT NULL,
  `lien` varchar(255) default NULL,
  `desc` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `iduser`, `nomeve`, `lien`, `desc`) VALUES
(1, 42, 'test', 'http://reps.mozilla-tunisia.org/', 'test description event');

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
  `question` varchar(250) character set latin1 collate latin1_general_ci NOT NULL,
  `reponse` varchar(250) character set latin1 collate latin1_general_ci NOT NULL,
  `dervisit` int(11) NOT NULL,
  `rang` tinyint(4) default '2',
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`, `email`, `nom`, `prenom`, `datenais`, `avatar`, `sexe`, `dateinscri`, `question`, `reponse`, `dervisit`, `rang`, `propos`, `wiki`, `twitter`, `fb`, `irc`, `linkedin`, `diaspora`, `flickr`, `site`, `location`, `tel`, `adresse`) VALUES
(3, 'william', '1234', 'william@live.fr', 'bejaoui', 'rami', '1/1/1986', '1275073917.jpg', 'M', 1273152584, 'Meilleur ami?', 'chay', 1275154792, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'admin', 'admin', 'hajjejfiras@gmail.com', 'hajjej', 'firas', '17/11/345', '1275290323.gif', 'M', 1273178969, 'Votre premier animal?', 'loulou', 1343408562, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'test', 'lol', 'lol@mdr.com', 'lol', 'mdr', '1/1/1986', '1273228474.png', 'M', 1273217727, 'lol', 'mdr', 1273949920, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'njareb', 'njareb', 'njareb@njareb.com', 'njareb', 'njareb', '1/1/1990', '1273417847.jpg', 'M', 1273415081, 'njareb', 'njareb', 1274087494, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'hhhhhhhh', 'azer', 'hhhhh@jjjj.com', 'hhhhhh', 'hhhhhhhhh', '1/1/1986', '1274524542.gif', 'M', 1274524542, 'hhhhhh', 'hbh', 1274524542, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'ffffffffff', 'azr', 'ffffff@hhhh.com', 'ffffffffff', 'ffffffffffff', '1/1/1986', 'pasimage.jpg', 'M', 1274525323, 'qsd', 'qsd', 1274525323, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'ggggggg', 'gggg', 'ggg@ggg.ggg', 'ggg', 'gggg', '1/1/1989', '1274543945.gif', 'M', 1274543945, 'gggg', 'gggg', 1275153984, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'question', 'question', 'question@question.com', 'question', 'question', '1/1/1990', 'pasimage.jpg', 'M', 1274616496, 'Meilleur ami?', 'question', 1274616496, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'rabi3', 'nidhal', 'nidhal@esprit.com', 'grami', 'nidhal', '7/11/1986', '1274694838.jpg', 'M', 1274694838, 'Meilleur ami?', 'selim', 1275154398, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'ala', 'ala', 'ala@gmail.com', 'ala', 'hajjej', '28/5/1979', '1275155632.jpg', 'M', 1275155632, 'Meilleur ami?', 'nono', 1275209438, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '', '', '', 'root', '', '//', 'pasimage.jpg', '', 0, '', '', 0, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'MedFiras', 'admin', 'medhajfiras@gmail.com', 'Hajjej', 'Mohamed Firas', '23/10/1986', '1343408812.jpg', 'M', 1343408812, 'Meilleur ami?', 'mozilla', 1343544699, 2, 'mozilla reps mozilla reps mozilla reps mozilla reps \r\nmozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps mozilla reps \r\nmozilla reps mozilla reps mozilla reps mozi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'date', 'date', 'date@date.dt', 'date', 'date', '18/01/2012', 'pasimage.jpg', 'M', 1343532144, 'Meilleur ami?', 'date', 1343532178, 2, 'date date date', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
