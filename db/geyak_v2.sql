-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema geyaklk
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `geyaklk` ;

-- -----------------------------------------------------
-- Schema geyaklk
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `geyaklk` DEFAULT CHARACTER SET latin1 ;
USE `geyaklk` ;

-- -----------------------------------------------------
-- Table `geyaklk`.`t_city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geyaklk`.`t_city` ;

CREATE TABLE IF NOT EXISTS `geyaklk`.`t_city` (
  `c_id` INT(11) NOT NULL AUTO_INCREMENT,
  `c_name` VARCHAR(100) NULL DEFAULT NULL,
  `c_code` VARCHAR(12) NULL DEFAULT NULL,
  PRIMARY KEY (`c_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geyaklk`.`t_subscribe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geyaklk`.`t_subscribe` ;

CREATE TABLE IF NOT EXISTS `geyaklk`.`t_subscribe` (
  `co_id` INT(11) NOT NULL AUTO_INCREMENT,
  `co_fname` VARCHAR(55) NOT NULL,
  `co_email` VARCHAR(45) NOT NULL,
  `co_number` VARCHAR(45) NULL,
  `co_msg` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`co_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geyaklk`.`t_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geyaklk`.`t_user` ;

CREATE TABLE IF NOT EXISTS `geyaklk`.`t_user` (
  `u_id` INT(11) NOT NULL AUTO_INCREMENT,
  `u_fname` VARCHAR(45) NULL DEFAULT NULL,
  `u_lname` VARCHAR(45) NULL DEFAULT NULL,
  `u_email` VARCHAR(45) NOT NULL,
  `u_pass` VARCHAR(45) NULL DEFAULT NULL,
  `u_role` VARCHAR(45) NULL DEFAULT 'user',
  `u_contact` INT(11) NULL DEFAULT NULL,
  `u_joined` DATE NULL DEFAULT NULL,
  `u_fb` VARCHAR(50) NULL,
  PRIMARY KEY (`u_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `u_email_UNIQUE` ON `geyaklk`.`t_user` (`u_email` ASC);

CREATE UNIQUE INDEX `u_contact_UNIQUE` ON `geyaklk`.`t_user` (`u_contact` ASC);


-- -----------------------------------------------------
-- Table `geyaklk`.`t_promotion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geyaklk`.`t_promotion` ;

CREATE TABLE IF NOT EXISTS `geyaklk`.`t_promotion` (
  `p_id` INT NOT NULL AUTO_INCREMENT,
  `p_startdate` DATE NULL,
  `p_enddate` DATE NULL,
  `p_cost` INT NULL,
  PRIMARY KEY (`p_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `geyaklk`.`t_property`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geyaklk`.`t_property` ;

CREATE TABLE IF NOT EXISTS `geyaklk`.`t_property` (
  `p_id` INT(10) NOT NULL AUTO_INCREMENT,
  `p_type` VARCHAR(25) NULL DEFAULT NULL,
  `p_address` VARCHAR(300) NULL DEFAULT NULL,
  `p_title` VARCHAR(45) NULL DEFAULT NULL,
  `p_hiretype` VARCHAR(12) NULL DEFAULT NULL,
  `p_price` INT NULL,
  `p_population` VARCHAR(12) NULL DEFAULT NULL,
  `p_rating` VARCHAR(12) NULL DEFAULT NULL,
  `p_note` VARCHAR(600) NULL DEFAULT NULL,
  `p_addedon` DATE NULL DEFAULT NULL,
  `p_lat` VARCHAR(12) NULL DEFAULT NULL,
  `p_lon` VARCHAR(12) NULL DEFAULT NULL,
  `p_approval` INT(1) NULL DEFAULT 0 COMMENT 'Admin Approval:\n0= not approved.\n1= approved.',
  `p_uid` INT(11) NOT NULL,
  `p_cid` INT(11) NOT NULL,
  `t_promotion_p_id` INT NOT NULL,
  PRIMARY KEY (`p_id`, `t_promotion_p_id`),
  CONSTRAINT `fk_t_property_t_city1`
    FOREIGN KEY (`p_cid`)
    REFERENCES `geyaklk`.`t_city` (`c_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_t_property_t_user`
    FOREIGN KEY (`p_uid`)
    REFERENCES `geyaklk`.`t_user` (`u_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_t_property_t_promotion1`
    FOREIGN KEY (`t_promotion_p_id`)
    REFERENCES `geyaklk`.`t_promotion` (`p_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_t_property_t_user_idx` ON `geyaklk`.`t_property` (`p_uid` ASC);

CREATE INDEX `fk_t_property_t_city1_idx` ON `geyaklk`.`t_property` (`p_cid` ASC);

CREATE INDEX `fk_t_property_t_promotion1_idx` ON `geyaklk`.`t_property` (`t_promotion_p_id` ASC);


-- -----------------------------------------------------
-- Table `geyaklk`.`t_feature`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geyaklk`.`t_feature` ;

CREATE TABLE IF NOT EXISTS `geyaklk`.`t_feature` (
  `f_id` INT(11) NOT NULL AUTO_INCREMENT,
  `f_bedrooms` VARCHAR(45) NULL DEFAULT 'not specified',
  `f_bathrooms` VARCHAR(45) NULL DEFAULT 'not specified',
  `f_summary` VARCHAR(500) NULL,
  `f_pid` INT(11) NOT NULL,
  PRIMARY KEY (`f_id`),
  CONSTRAINT `fk_t_feature_t_property1`
    FOREIGN KEY (`f_pid`)
    REFERENCES `geyaklk`.`t_property` (`p_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_t_feature_t_property1_idx` ON `geyaklk`.`t_feature` (`f_pid` ASC);


-- -----------------------------------------------------
-- Table `geyaklk`.`t_photo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geyaklk`.`t_photo` ;

CREATE TABLE IF NOT EXISTS `geyaklk`.`t_photo` (
  `pi_id` INT(11) NOT NULL AUTO_INCREMENT,
  `pi_url` VARCHAR(500) NULL DEFAULT NULL,
  `pi_caption` VARCHAR(500) NULL DEFAULT NULL,
  `pi_alt` VARCHAR(45) NULL DEFAULT NULL,
  `pi_pid` INT(11) NOT NULL,
  `pi_parentid` INT(11) NOT NULL,
  PRIMARY KEY (`pi_id`, `pi_parentid`),
  CONSTRAINT `fk_t_photo_t_property1`
    FOREIGN KEY (`pi_pid`)
    REFERENCES `geyaklk`.`t_property` (`p_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_t_photo_t_photo1`
    FOREIGN KEY (`pi_parentid`)
    REFERENCES `geyaklk`.`t_photo` (`pi_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_t_photo_t_property1_idx` ON `geyaklk`.`t_photo` (`pi_pid` ASC);

CREATE INDEX `fk_t_photo_t_photo1_idx` ON `geyaklk`.`t_photo` (`pi_parentid` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
