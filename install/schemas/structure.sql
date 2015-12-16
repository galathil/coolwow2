DROP TABLE IF EXISTS `bansite`;
CREATE TABLE `bansite` (
  `id_ban` int(10) NOT NULL AUTO_INCREMENT,
  `ip_ban` varchar(15) DEFAULT NULL,
  `date_debut_ban` int(11) DEFAULT NULL,
  `date_fin_ban` int(11) DEFAULT NULL,
  `par_ban` varchar(50) DEFAULT NULL,
  `raison_ban` longtext,
  PRIMARY KEY (`id_ban`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `boutique`;
CREATE TABLE `boutique` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ID_item` int(10) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '1',
  `price` int(10) NOT NULL,
  `class` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=574 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bug_signalant`;
CREATE TABLE `bug_signalant` (
  `id_bug` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bugreport`;
CREATE TABLE `bugreport` (
  `id_bug` int(11) NOT NULL AUTO_INCREMENT,
  `type_bug` varchar(255) NOT NULL DEFAULT '',
  `description_bug` longtext NOT NULL,
  `auteur_bug` varchar(255) NOT NULL DEFAULT 'Inconnu',
  `statut_bug` varchar(255) NOT NULL DEFAULT 'En attente',
  `mg_bug` varchar(255) NOT NULL DEFAULT 'Aucuns',
  `commentaire` longtext NOT NULL,
  `date_bug` int(11) NOT NULL DEFAULT '0',
  `reponse_bug` varchar(255) NOT NULL DEFAULT 'Non',
  `nb_signaler` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_bug`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `chatbox`;
CREATE TABLE `chatbox` (
  `id_msg` int(10) NOT NULL AUTO_INCREMENT,
  `msg` tinytext NOT NULL,
  `auteur_msg` varchar(100) NOT NULL DEFAULT '',
  `ip_msg` varchar(15) NOT NULL DEFAULT '127.0.0.1',
  `date_msg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gmlevel` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `connectes`;
CREATE TABLE `connectes` (
  `ip` varchar(15) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `account` varchar(50) DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_acces_cat`;
CREATE TABLE `forum_acces_cat` (
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_acces_forum`;
CREATE TABLE `forum_acces_forum` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `forum_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_categorie`;
CREATE TABLE `forum_categorie` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `cat_ordre` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`cat_id`),
  KEY `cat_ordre` (`cat_ordre`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_config`;
CREATE TABLE `forum_config` (
  `config_name` varchar(255) NOT NULL DEFAULT '',
  `config_value` varchar(255) NOT NULL DEFAULT '0',
  `config_value2` varchar(255) NOT NULL DEFAULT '0',
  `config_value3` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_forum`;
CREATE TABLE `forum_forum` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_cat_id` mediumint(8) NOT NULL DEFAULT '0',
  `forum_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `forum_desc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `forum_ordre` mediumint(8) NOT NULL DEFAULT '0',
  `forum_last_post_id` int(11) NOT NULL DEFAULT '0',
  `forum_topic` mediumint(8) NOT NULL DEFAULT '0',
  `forum_post` mediumint(8) NOT NULL DEFAULT '0',
  `auth_view` tinyint(4) NOT NULL DEFAULT '0',
  `auth_post` tinyint(4) NOT NULL DEFAULT '0',
  `auth_topic` tinyint(4) NOT NULL DEFAULT '0',
  `auth_annonce` tinyint(4) NOT NULL DEFAULT '0',
  `auth_modo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_groups`;
CREATE TABLE `forum_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_nom` varchar(50) NOT NULL DEFAULT '',
  `group_description` varchar(150) NOT NULL DEFAULT 'Auncune',
  `group_droit` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_post`;
CREATE TABLE `forum_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_createur` int(11) NOT NULL DEFAULT '0',
  `post_texte` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `post_time` int(11) NOT NULL DEFAULT '0',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `post_forum_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_ranks`;
CREATE TABLE `forum_ranks` (
  `rank_id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_nom` varchar(50) NOT NULL DEFAULT '',
  `rank_special` int(1) NOT NULL DEFAULT '0',
  `rank_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `forum_topic`;
CREATE TABLE `forum_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL DEFAULT '0',
  `topic_titre` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `topic_createur` int(11) NOT NULL DEFAULT '0',
  `topic_vu` mediumint(8) NOT NULL DEFAULT '0',
  `topic_time` int(11) NOT NULL DEFAULT '0',
  `topic_genre` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `topic_last_post` int(11) NOT NULL DEFAULT '0',
  `topic_first_post` int(11) NOT NULL DEFAULT '0',
  `topic_post` mediumint(8) NOT NULL DEFAULT '0',
  `sticked` tinyint(3) NOT NULL DEFAULT '0',
  `closed` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_last_post` (`topic_last_post`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `itemdisplayinfo`;
CREATE TABLE `itemdisplayinfo` (
  `id` bigint(20) NOT NULL,
  `icon` text NOT NULL COMMENT 'Interface icon used for item.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `log_achat`;
CREATE TABLE `log_achat` (
  `id_achat` int(10) NOT NULL AUTO_INCREMENT,
  `id_item` int(10) NOT NULL,
  `id_membre` int(10) NOT NULL,
  `id_perso` int(10) NOT NULL,
  `date_achat` datetime NOT NULL,
  `id_boutique` int(10) NOT NULL,
  PRIMARY KEY (`id_achat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `log_login`;
CREATE TABLE `log_login` (
  `id_conn` int(10) NOT NULL AUTO_INCREMENT,
  `type_conn` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_account` int(10) NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n/a',
  PRIMARY KEY (`id_conn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `log_register`;
CREATE TABLE `log_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `nb_register` int(10) NOT NULL DEFAULT '0',
  `nb_activation` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `membres`;
CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL DEFAULT 'none',
  `pseudo` varchar(50) NOT NULL DEFAULT 'none',
  `membre_lang` varchar(50) NOT NULL DEFAULT 'french',
  `membre_mdp` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `membre_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `membre_sexe` varchar(30) NOT NULL DEFAULT 'inconnu',
  `membre_msn` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `membre_siteweb` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `membre_avatar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `membre_signature` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `membre_localisation` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `membre_inscrit` int(11) NOT NULL DEFAULT '0',
  `membre_derniere_visite` int(11) NOT NULL DEFAULT '0',
  `membre_gmlevel` tinyint(4) NOT NULL DEFAULT '0',
  `membre_post` int(11) NOT NULL DEFAULT '0',
  `cacher_email` int(1) NOT NULL DEFAULT '1',
  `membre_rank` int(1) NOT NULL DEFAULT '1',
  `membre_ip` varchar(15) NOT NULL DEFAULT '127.0.0.1',
  `nb_point_vote` int(10) NOT NULL DEFAULT '0',
  `total_vote` int(10) NOT NULL DEFAULT '0',
  `date_vote` datetime NOT NULL DEFAULT '2009-07-01 21:00:00',
  `chatban` int(10) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `membres_groups`;
CREATE TABLE `membres_groups` (
  `group_id` int(11) DEFAULT NULL,
  `membre_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `mp`;
CREATE TABLE `mp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) NOT NULL DEFAULT '',
  `expediteur` varchar(255) NOT NULL DEFAULT '',
  `destinataire` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0',
  `vu` enum('0','1') NOT NULL DEFAULT '0',
  `efface` enum('0','1','2') NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `idnews` int(10) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL DEFAULT '',
  `news` longtext NOT NULL,
  `auteur` varchar(100) NOT NULL DEFAULT '',
  `date_news` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_maj` datetime DEFAULT NULL,
  `maj_par` varchar(100) DEFAULT NULL,
  `archive` int(1) DEFAULT '0',
  `nb_com` int(10) DEFAULT '0',
  PRIMARY KEY (`idnews`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `news_commentaire`;
CREATE TABLE `news_commentaire` (
  `id_com` int(10) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_com`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `site_config`;
CREATE TABLE `site_config` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL DEFAULT '0',
  `config_value2` varchar(255) NOT NULL DEFAULT '0',
  `config_value3` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `site_config_admin`;
CREATE TABLE `site_config_admin` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL DEFAULT '0',
  `config_value2` varchar(255) NOT NULL DEFAULT '0',
  `config_value3` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `skillline`;
CREATE TABLE `skillline` (
  `id` bigint(20) NOT NULL,
  `ref_category` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `ref_icon` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sondages`;
CREATE TABLE `sondages` (
  `id_sondage` int(11) NOT NULL AUTO_INCREMENT,
  `title_sondage` varchar(255) NOT NULL,
  `question_sondage` varchar(255) NOT NULL,
  `date_sondage` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `etat_sondage` varchar(255) NOT NULL DEFAULT 'Ouvert',
  `total_vote` int(10) NOT NULL DEFAULT '0',
  `option1` varchar(255) NOT NULL,
  `nb_vote1` int(10) NOT NULL DEFAULT '0',
  `option2` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote2` int(10) NOT NULL DEFAULT '0',
  `option3` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote3` int(10) NOT NULL DEFAULT '0',
  `option4` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote4` int(10) NOT NULL DEFAULT '0',
  `option5` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote5` int(10) NOT NULL DEFAULT '0',
  `option6` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote6` int(10) NOT NULL DEFAULT '0',
  `option7` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote7` int(10) NOT NULL DEFAULT '0',
  `option8` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote8` int(10) NOT NULL DEFAULT '0',
  `option9` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote9` int(10) NOT NULL DEFAULT '0',
  `option10` varchar(255) NOT NULL DEFAULT 'n/a',
  `nb_vote10` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sondage`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sondages_votant`;
CREATE TABLE `sondages_votant` (
  `id_sondage` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `statistique`;
CREATE TABLE `statistique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `talent`;
CREATE TABLE `talent` (
  `id` bigint(20) NOT NULL,
  `ref_tab` bigint(20) NOT NULL,
  `row` bigint(20) NOT NULL,
  `col` bigint(20) NOT NULL,
  `rank1` bigint(20) NOT NULL,
  `rank2` bigint(20) NOT NULL,
  `rank3` bigint(20) NOT NULL,
  `rank4` bigint(20) NOT NULL,
  `rank5` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `talenttab`;
CREATE TABLE `talenttab` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `refmask_chrclasses` bigint(20) NOT NULL,
  `tab_number` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `account_name` varchar(255) NOT NULL DEFAULT '',
  `date_vote1` datetime NOT NULL DEFAULT '2009-07-01 09:00:00',
  `date_vote2` datetime NOT NULL DEFAULT '2009-07-01 09:00:00',
  `date_vote3` datetime NOT NULL DEFAULT '2009-07-01 09:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;