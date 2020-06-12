--  Création de la base
CREATE DATABASE IF NOT EXISTS api_pal
Character set utf8mb4 COLLATE utf8mb4_unicode_ci;

USE api_pal;

--  Création de la table "species"
CREATE TABLE IF NOT EXISTS species (
  id INT(4) NOT NULL AUTO_INCREMENT,
  family VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  deep_min INT(4) NOT NULL,
  deep_max INT(4) NOT NULL,
  life_time INT(4) NULL,
  weight INT(4) NULL,
  size INT(4) NULL,
  life_area VARCHAR(255) NULL,
  description TEXT NOT NULL,
  image_link VARCHAR(255) NULL,
  image_alt VARCHAR(255) NULL,
  reproduction VARCHAR(255) NULL,
  food VARCHAR(255) NULL,
  video_link VARCHAR(255) NULL,
  video_alt VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
)ENGINE=innodb;
