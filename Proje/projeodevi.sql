-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "bilgilerim" -----------------------------------
CREATE TABLE `bilgilerim` ( 
	`bilgi_id` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`bilgi_fotograf` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`bilgi_isim` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`bilgi_hakkinda` VarChar( 500 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`bilgi_ikamet` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`bilgi_mail` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`bilgi_telefon` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `bilgi_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "genelayarlar" ---------------------------------
CREATE TABLE `genelayarlar` ( 
	`site_id` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`site_yazi` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`site_adres` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`site_bilgi` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`site_anahtar` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`site_altkisim` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `site_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "islerim" --------------------------------------
CREATE TABLE `islerim` ( 
	`is_id` Int( 11 ) NOT NULL,
	`is_adi` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`is_link` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`is_aciklama` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`is_tarih` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`is_devam` VarChar( 5 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `is_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "okullarim" ------------------------------------
CREATE TABLE `okullarim` ( 
	`okul_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`okul_adi` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`okul_aciklama` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`okul_tarihi` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`okul_devam` VarChar( 5 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `okul_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------


-- CREATE TABLE "paketprogrambilgisi_yeteneklerim" -------------
CREATE TABLE `paketprogrambilgisi_yeteneklerim` ( 
	`paketprogrambilgisi_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`paketprogrambilgisi_adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`paketprogrambilgisi_yuzde` Int( 3 ) NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `paketprogrambilgisi_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 12;
-- -------------------------------------------------------------


-- CREATE TABLE "paketprogram_gecmis" --------------------------
CREATE TABLE `paketprogram_gecmis` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	`yuzde` Int( 3 ) NULL DEFAULT NULL,
	`paket_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "projelerim" -----------------------------------
CREATE TABLE `projelerim` ( 
	`proje_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`proje_adi` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`proje_link` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`proje_aciklama` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`proje_tarih` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `proje_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------


-- CREATE TABLE "rozetler" -------------------------------------
CREATE TABLE `rozetler` ( 
	`rozet_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`rozet_adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`rozet_aciklama` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `rozet_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------


-- CREATE TABLE "sosyalbeceri_gecmis" --------------------------
CREATE TABLE `sosyalbeceri_gecmis` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	`yuzde` Int( 3 ) NULL DEFAULT NULL,
	`sosyal_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "sosyalbeceri_yeteneklerim" --------------------
CREATE TABLE `sosyalbeceri_yeteneklerim` ( 
	`sosyalbeceri_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`sosyalbeceri_adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`sosyalbeceri_yuzde` Int( 3 ) NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `sosyalbeceri_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------


-- CREATE TABLE "sosyalmedya" ----------------------------------
CREATE TABLE `sosyalmedya` ( 
	`sosyal_id` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`sosyal_github` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`sosyal_linkedin` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`sosyal_facebook` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`sosyal_reddit` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`sosyal_instagram` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`sosyal_twitter` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`sosyal_pinterest` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `sosyal_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "uye_admin" ------------------------------------
CREATE TABLE `uye_admin` ( 
	`admin_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`admin_kadi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`admin_sifre` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `admin_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "yabancidil_gecmis" ----------------------------
CREATE TABLE `yabancidil_gecmis` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	`yuzde` Int( 3 ) NULL DEFAULT NULL,
	`yabancidil_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "yabancidil_yeteneklerim" ----------------------
CREATE TABLE `yabancidil_yeteneklerim` ( 
	`yabancidil_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`yabancidil_isim` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`yabancidil_yuzde` Int( 3 ) NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `yabancidil_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 10;
-- -------------------------------------------------------------


-- CREATE TABLE "yazilimdili_gecmis" ---------------------------
CREATE TABLE `yazilimdili_gecmis` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	`yuzde` Int( 3 ) NULL DEFAULT NULL,
	`yazilimdili_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "yazilimdili_yeteneklerim" ---------------------
CREATE TABLE `yazilimdili_yeteneklerim` ( 
	`yazilimdiliyetenek_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`yazilimdiliyetenek_adi` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`yazilimdiliyetenek_yuzde` Int( 3 ) NOT NULL,
	`kullanici_id` Int( 11 ) NULL DEFAULT NULL,
	PRIMARY KEY ( `yazilimdiliyetenek_id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 10;
-- -------------------------------------------------------------


-- Dump data of "bilgilerim" -------------------------------
INSERT INTO `bilgilerim`(`bilgi_id`,`bilgi_fotograf`,`bilgi_isim`,`bilgi_hakkinda`,`bilgi_ikamet`,`bilgi_mail`,`bilgi_telefon`) VALUES 
( '1', 'http://localhost/yetenhack/resimler/logo.png', 'Yetenhack Kullanıcısı', 'İpucu : Hakkında bölümünü kendinizi en iyi özetleyecek şekilde doldurmanız öne çıkmanızı sağlayacaktır. :)', 'Sakarya / Serdivan', 'yetenhack@localhost.com', '0000 000 00 00' );
-- ---------------------------------------------------------


-- Dump data of "genelayarlar" -----------------------------
INSERT INTO `genelayarlar`(`site_id`,`site_yazi`,`site_adres`,`site_bilgi`,`site_anahtar`,`site_altkisim`) VALUES 
( '1', 'Yetenhack.', 'http://localhost/yetenhack/', 'Yetenhack. kullanıcılar için özelleştirilmiş cv sayfaları oluşturmaya olanak sağlar.', 'yetenhack,staj,iş,bağlantı', 'Tüm hakları saklıdır.' );
-- ---------------------------------------------------------


-- Dump data of "islerim" ----------------------------------
INSERT INTO `islerim`(`is_id`,`is_adi`,`is_link`,`is_aciklama`,`is_tarih`,`is_devam`,`kullanici_id`) VALUES 
( '1', 'Yazılım Geliştircisi', 'http://localhost/yetenhack/', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate.
', '2017.01.01 ~ 2017.07.08', '0', '1' ),
( '2', 'Yazılım Geliştirici', 'https://www.facebook.com/', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate.
', '2017.08.01 - 2018.01.30', '0', '1' ),
( '3', 'Yazılım Geliştirici', 'https://www.youtube.com/', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, corporis. Est iure id enim quasi pariatur. Eligendi minima quo obcaecati voluptatem beatae. Minima sunt debitis iste, beatae enim amet inventore.
', '2018.02.15 -', '1', '1' );
-- ---------------------------------------------------------


-- Dump data of "okullarim" --------------------------------
INSERT INTO `okullarim`(`okul_id`,`okul_adi`,`okul_aciklama`,`okul_tarihi`,`okul_devam`,`kullanici_id`) VALUES 
( '1', 'A İlkokulu', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate. ', '2006.09.20 - 2010.09.20', '0', '1' ),
( '2', 'B Ortaokulu', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate. ', '2010.09.20 - 2013.09.20', '0', '1' ),
( '3', 'C Lisesi', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate. ', '2010.09.20 - 2017.09.20', '0', '1' ),
( '4', 'D Üniversitesi', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate. ', '2018.09.20 - ', '1', '1' );
-- ---------------------------------------------------------


-- Dump data of "paketprogrambilgisi_yeteneklerim" ---------
INSERT INTO `paketprogrambilgisi_yeteneklerim`(`paketprogrambilgisi_id`,`paketprogrambilgisi_adi`,`paketprogrambilgisi_yuzde`,`kullanici_id`) VALUES 
( '1', 'Matlab', '50', '1' ),
( '2', 'Adobe XD', '80', '1' ),
( '3', '3ds Max', '40', '1' ),
( '4', 'CAD', '40', '1' ),
( '5', 'Proteus', '74', '1' ),
( '9', 'melih', '75', '1' ),
( '10', 'deneme2', '89', '1' ),
( '11', 'deneme', '78', '1' );
-- ---------------------------------------------------------


-- Dump data of "paketprogram_gecmis" ----------------------
INSERT INTO `paketprogram_gecmis`(`id`,`adi`,`yuzde`,`paket_id`) VALUES 
( '1', 'Proteus', '66', '5' );
-- ---------------------------------------------------------


-- Dump data of "projelerim" -------------------------------
INSERT INTO `projelerim`(`proje_id`,`proje_adi`,`proje_link`,`proje_aciklama`,`proje_tarih`,`kullanici_id`) VALUES 
( '1', 'Admin Panelli Blog Sitesi', 'http://localhost/yetenhack/', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate. ', '2019.05.21', '1' ),
( '2', 'MVC Yapısında E-Ticaret Sitesi', 'http://localhost/yetenhack/', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga beatae commodi consequuntur officia aliquam error voluptatem! Ipsam quaerat eos ut asperiores, placeat eaque, et aspernatur veniam quia laudantium suscipit cupiditate. ', '2018.05.14', '1' );
-- ---------------------------------------------------------


-- Dump data of "rozetler" ---------------------------------
INSERT INTO `rozetler`(`rozet_id`,`rozet_adi`,`rozet_aciklama`,`kullanici_id`) VALUES 
( '1', 'sosyalkullanici', 'Kullanıcı 5\'ten fazla sosyal medya hesabı eklemişse bu rozet sergilenir.', NULL ),
( '2', 'merakli', 'Kullanıcı 10\'dan fazla yazılım dili hesabı eklemişse bu rozet sergilenir. ', NULL );
-- ---------------------------------------------------------


-- Dump data of "sosyalbeceri_gecmis" ----------------------
-- ---------------------------------------------------------


-- Dump data of "sosyalbeceri_yeteneklerim" ----------------
INSERT INTO `sosyalbeceri_yeteneklerim`(`sosyalbeceri_id`,`sosyalbeceri_adi`,`sosyalbeceri_yuzde`,`kullanici_id`) VALUES 
( '1', 'Empati', '75', '1' ),
( '2', 'Hitabet', '65', '1' ),
( '3', 'Liderlik', '80', '1' ),
( '4', 'Uyum', '75', '1' ),
( '5', 'Cesaret', '60', '1' );
-- ---------------------------------------------------------


-- Dump data of "sosyalmedya" ------------------------------
INSERT INTO `sosyalmedya`(`sosyal_id`,`sosyal_github`,`sosyal_linkedin`,`sosyal_facebook`,`sosyal_reddit`,`sosyal_instagram`,`sosyal_twitter`,`sosyal_pinterest`,`kullanici_id`) VALUES 
( '1', 'https://www.github.com/', 'https://www.linkedin.com/', 'https://www.facebook.com/', 'https://www.reddit.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.pinterest.com/', '1' );
-- ---------------------------------------------------------


-- Dump data of "uye_admin" --------------------------------
INSERT INTO `uye_admin`(`admin_id`,`admin_kadi`,`admin_sifre`) VALUES 
( '1', 'admin', 'e10adc3949ba59abbe56e057f20f883e' );
-- ---------------------------------------------------------


-- Dump data of "yabancidil_gecmis" ------------------------
-- ---------------------------------------------------------


-- Dump data of "yabancidil_yeteneklerim" ------------------
INSERT INTO `yabancidil_yeteneklerim`(`yabancidil_id`,`yabancidil_isim`,`yabancidil_yuzde`,`kullanici_id`) VALUES 
( '6', 'Almanca', '75', '1' ),
( '8', 'Rusça', '74', '1' );
-- ---------------------------------------------------------


-- Dump data of "yazilimdili_gecmis" -----------------------
-- ---------------------------------------------------------


-- Dump data of "yazilimdili_yeteneklerim" -----------------
INSERT INTO `yazilimdili_yeteneklerim`(`yazilimdiliyetenek_id`,`yazilimdiliyetenek_adi`,`yazilimdiliyetenek_yuzde`,`kullanici_id`) VALUES 
( '1', 'C++', '45', '1' ),
( '2', 'C#', '55', '1' ),
( '3', 'Python', '70', '1' ),
( '4', 'Javascript', '55', '1' ),
( '5', 'Php', '75', '1' ),
( '7', 'Ruby', '50', '1' ),
( '8', 'rastgele', '75', NULL ),
( '9', 'deneme', '35', NULL );
-- ---------------------------------------------------------


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `islerim`( `kullanici_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `okullarim`( `kullanici_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `paketprogrambilgisi_yeteneklerim`( `kullanici_id` );
-- -------------------------------------------------------------



delimiter $$$ 
-- CREATE TRIGGER "paketprogramguncellenince" ------------------
CREATE DEFINER=`root`@`localhost` TRIGGER paketprogramguncellenince
AFTER UPDATE ON paketprogrambilgisi_yeteneklerim
FOR EACH ROW
BEGIN
INSERT INTO paketprogram_gecmis SET 
paket_id = OLD.paketprogrambilgisi_id,
adi = OLD.paketprogrambilgisi_adi,
yuzde = OLD.paketprogrambilgisi_yuzde;
END;
-- -------------------------------------------------------------

$$$ delimiter ;


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `projelerim`( `kullanici_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `rozetler`( `kullanici_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `sosyalbeceri_yeteneklerim`( `kullanici_id` );
-- -------------------------------------------------------------



delimiter $$$ 
-- CREATE TRIGGER "sosyalbeceriguncellenince" ------------------
CREATE DEFINER=`root`@`localhost` TRIGGER sosyalbeceriguncellenince
AFTER UPDATE ON sosyalbeceri_yeteneklerim
FOR EACH ROW
BEGIN
INSERT INTO sosyalbeceri_gecmis SET 
	sosyal_id = OLD.sosyalbeceri_id,
	adi = OLD.sosyalbeceri_adi,
	yuzde = OLD.sosyalbeceri_yuzde;
END;
-- -------------------------------------------------------------

$$$ delimiter ;


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `sosyalmedya`( `kullanici_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `yabancidil_yeteneklerim`( `kullanici_id` );
-- -------------------------------------------------------------



delimiter $$$ 
-- CREATE TRIGGER "yabancidilguncellenince" --------------------
CREATE DEFINER=`root`@`localhost` TRIGGER yabancidilguncellenince
AFTER UPDATE ON yabancidil_yeteneklerim
FOR EACH ROW
BEGIN
INSERT INTO yabancidil_gecmis SET 
	yabancidil_id = OLD.yabancidil_id,
	adi = OLD.yabancidil_isim,
	yuzde = OLD.yabancidil_yuzde;
END;
-- -------------------------------------------------------------

$$$ delimiter ;


-- CREATE INDEX "kullanici_id" ---------------------------------
CREATE INDEX `kullanici_id` USING BTREE ON `yazilimdili_yeteneklerim`( `kullanici_id` );
-- -------------------------------------------------------------



delimiter $$$ 
-- CREATE TRIGGER "yazilimdiliguncellenince" -------------------
CREATE DEFINER=`root`@`localhost` TRIGGER yazilimdiliguncellenince
AFTER UPDATE ON yazilimdili_yeteneklerim
FOR EACH ROW
BEGIN
INSERT INTO yazilimdili_gecmis SET 
	yazilimdili_id = OLD.yazilimdiliyetenek_id,
	adi = OLD.yazilimdiliyetenek_adi,
	yuzde = OLD.yazilimdiliyetenek_yuzde;
END;
-- -------------------------------------------------------------

$$$ delimiter ;


-- CREATE LINK "islerim_ibfk_1" --------------------------------
ALTER TABLE `islerim`
	ADD CONSTRAINT `islerim_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "okullarim_ibfk_1" ------------------------------
ALTER TABLE `okullarim`
	ADD CONSTRAINT `okullarim_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "paketprogrambilgisi_yeteneklerim_ibfk_1" -------
ALTER TABLE `paketprogrambilgisi_yeteneklerim`
	ADD CONSTRAINT `paketprogrambilgisi_yeteneklerim_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "projelerim_ibfk_1" -----------------------------
ALTER TABLE `projelerim`
	ADD CONSTRAINT `projelerim_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "rozetler_ibfk_1" -------------------------------
ALTER TABLE `rozetler`
	ADD CONSTRAINT `rozetler_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "sosyalbeceri_yeteneklerim_ibfk_1" --------------
ALTER TABLE `sosyalbeceri_yeteneklerim`
	ADD CONSTRAINT `sosyalbeceri_yeteneklerim_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "sosyalbeceri_yeteneklerim_ibfk_2" --------------
ALTER TABLE `sosyalbeceri_yeteneklerim`
	ADD CONSTRAINT `sosyalbeceri_yeteneklerim_ibfk_2` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "sosyalbeceri_yeteneklerim_ibfk_3" --------------
ALTER TABLE `sosyalbeceri_yeteneklerim`
	ADD CONSTRAINT `sosyalbeceri_yeteneklerim_ibfk_3` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "sosyalmedya_ibfk_1" ----------------------------
ALTER TABLE `sosyalmedya`
	ADD CONSTRAINT `sosyalmedya_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "yabancidil_yeteneklerim_ibfk_1" ----------------
ALTER TABLE `yabancidil_yeteneklerim`
	ADD CONSTRAINT `yabancidil_yeteneklerim_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "yazilimdili_yeteneklerim_ibfk_1" ---------------
ALTER TABLE `yazilimdili_yeteneklerim`
	ADD CONSTRAINT `yazilimdili_yeteneklerim_ibfk_1` FOREIGN KEY ( `kullanici_id` )
	REFERENCES `uye_admin`( `admin_id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE FUNCTION~PROCEDURE "getIs()" ---------------
DELIMITER 
CREATE PROCEDURE getIs(IN is_id INT(11))
BEGIN
SELECT is_id FROM islerim isler WHERE isler.is_id = is_id;
END 
DELIMITER ;
-- -------------------------------------------------------------

-- CREATE FUNCTION~PROCEDURE "getOkul()" ---------------
DELIMITER 
CREATE PROCEDURE getOkul(IN okul_id INT(11))
BEGIN
SELECT okul_id FROM okullarim okul WHERE okul.okul_id = okul_id;
END 
DELIMITER ;
-- -------------------------------------------------------------

-- CREATE FUNCTION~PROCEDURE "getProje()" ---------------
DELIMITER 
CREATE PROCEDURE getProje(IN proje_id INT(11))
BEGIN
SELECT proje_id FROM projelerim proje WHERE proje.proje_id = proje_id;
END 
DELIMITER ;
-- -------------------------------------------------------------

-- CREATE FUNCTION~PROCEDURE "getRozet()"---------------
DELIMITER 
CREATE PROCEDURE getRozet(IN rozet_id INT(11))
BEGIN
SELECT rozet_id FROM rozetlerim rozet WHERE rozet.rozet_id = rozet_id;
END 
DELIMITER ;
-- -------------------------------------------------------------

-- CREATE FUNCTION~PROCEDURE "getYabanciDil()"---------------
DELIMITER 
CREATE PROCEDURE getYabanciDil(IN yabancidil_id INT(11))
BEGIN
SELECT yabancidil_id FROM yabancidil_yeteneklerim yabancidil WHERE yabancidil.yabancidil_id = yabancidil_id;
END 
DELIMITER ;
-- -------------------------------------------------------------


    


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


