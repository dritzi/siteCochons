-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- structure de la base pour cochon_db
CREATE DATABASE IF NOT EXISTS `cochon_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cochon_db`;



-- structure de la table cochon_db.cochon
CREATE TABLE IF NOT EXISTS `cochon` (
  `coc_id` int(11) NOT NULL AUTO_INCREMENT,
  `coc_nom` varchar(50) UNIQUE NOT NULL,
  `coc_poids` int(11) NOT NULL,
  `coc_duree_vie` int(11) NOT NULL,
  `coc_date_naissance` datetime NOT NULL,
  `coc_sexe` varchar(1) NOT NULL,
  `coc_image` varchar(100),
  CONSTRAINT `cochon_pk` PRIMARY KEY (`coc_id`)
) COMMENT='carcactéristiques des cochons';




/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

