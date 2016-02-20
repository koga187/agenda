SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema agendamento
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `agendamento` ;
CREATE SCHEMA IF NOT EXISTS `agendamento` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `agendamento` ;

-- -----------------------------------------------------
-- Table `agendamento`.`projeto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agendamento`.`projeto` ;

CREATE TABLE IF NOT EXISTS `agendamento`.`projeto` (
  `id` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(100) NULL,
  `descricao` VARCHAR(200) NULL,
  `data_in` DATETIME NULL,
  `data_delete` DATETIME NULL,
  `deleted` BIT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agendamento`.`tarefa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agendamento`.`tarefa` ;

CREATE TABLE IF NOT EXISTS `agendamento`.`tarefa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `descricao` VARCHAR(250) NULL,
  `horas` INT NULL,
  `data_inicio` VARCHAR(45) NULL,
  `deleted` BIT NULL,
  `data_in` DATETIME NULL,
  `data_delete` DATETIME NULL,
  `projeto_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `projeto_id`),
  INDEX `fk_tarefa_projeto1_idx` (`projeto_id` ASC),
  CONSTRAINT `fk_tarefa_projeto1`
    FOREIGN KEY (`projeto_id`)
    REFERENCES `agendamento`.`projeto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agendamento`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agendamento`.`status` ;

CREATE TABLE IF NOT EXISTS `agendamento`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `conta_horas` BIT NULL,
  `data_in` DATETIME NULL,
  `data_delete` DATETIME NULL,
  `deleted` BIT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agendamento`.`status__tarefa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agendamento`.`status__tarefa` ;

CREATE TABLE IF NOT EXISTS `agendamento`.`status__tarefa` (
  `status_id` INT NOT NULL,
  `tarefa_id` INT NOT NULL,
  `date_in` DATETIME NULL,
  `date_out` DATETIME NULL,
  PRIMARY KEY (`status_id`, `tarefa_id`),
  INDEX `fk_status_has_tarefa_tarefa1_idx` (`tarefa_id` ASC),
  INDEX `fk_status_has_tarefa_status_idx` (`status_id` ASC),
  CONSTRAINT `fk_status_has_tarefa_status`
    FOREIGN KEY (`status_id`)
    REFERENCES `agendamento`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_has_tarefa_tarefa1`
    FOREIGN KEY (`tarefa_id`)
    REFERENCES `agendamento`.`tarefa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
