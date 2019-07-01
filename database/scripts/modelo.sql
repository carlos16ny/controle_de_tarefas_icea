-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema controle_de_tarefas
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `controle_de_tarefas` ;

-- -----------------------------------------------------
-- Schema controle_de_tarefas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controle_de_tarefas` DEFAULT CHARACTER SET latin1 ;
USE `controle_de_tarefas` ;

-- -----------------------------------------------------
-- Table `controle_de_tarefas`.`class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controle_de_tarefas`.`class` ;

CREATE TABLE IF NOT EXISTS `controle_de_tarefas`.`class` (
  `id` VARCHAR(6) NOT NULL,
  `name` VARCHAR(70) NOT NULL,
  `workload` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `controle_de_tarefas`.`course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controle_de_tarefas`.`course` ;

CREATE TABLE IF NOT EXISTS `controle_de_tarefas`.`course` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `semesters` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `controle_de_tarefas`.`course_has_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controle_de_tarefas`.`course_has_class` ;

CREATE TABLE IF NOT EXISTS `controle_de_tarefas`.`course_has_class` (
  `course_id` INT(11) NOT NULL,
  `class_id` VARCHAR(6) NOT NULL,
  `type` ENUM('Obrigatória', 'Eletiva') NOT NULL,
  `semester` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`course_id`, `class_id`),
  INDEX `fk_course_has_class_class1_idx` (`class_id` ASC),
  CONSTRAINT `fk_course_has_class_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `controle_de_tarefas`.`class` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_has_class_course`
    FOREIGN KEY (`course_id`)
    REFERENCES `controle_de_tarefas`.`course` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `controle_de_tarefas`.`dependence`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controle_de_tarefas`.`dependence` ;

CREATE TABLE IF NOT EXISTS `controle_de_tarefas`.`dependence` (
  `course_id` INT(11) NOT NULL,
  `class_id` VARCHAR(6) NOT NULL,
  `course_id_dep` INT(11) NOT NULL,
  `class_id_dep` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`course_id`, `class_id`, `course_id_dep`, `class_id_dep`),
  INDEX `fk_course_has_class_has_course_has_class_course_has_class2_idx` (`course_id_dep` ASC, `class_id_dep` ASC),
  INDEX `fk_course_has_class_has_course_has_class_course_has_class1_idx` (`course_id` ASC, `class_id` ASC),
  CONSTRAINT `fk_course_has_class_has_course_has_class_course_has_class1`
    FOREIGN KEY (`course_id` , `class_id`)
    REFERENCES `controle_de_tarefas`.`course_has_class` (`course_id` , `class_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_has_class_has_course_has_class_course_has_class2`
    FOREIGN KEY (`course_id_dep` , `class_id_dep`)
    REFERENCES `controle_de_tarefas`.`course_has_class` (`course_id` , `class_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `controle_de_tarefas`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controle_de_tarefas`.`student` ;

CREATE TABLE IF NOT EXISTS `controle_de_tarefas`.`student` (
  `registration` INT(11) NOT NULL,
  `name` VARCHAR(200) NOT NULL,
  `surname` VARCHAR(200) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `password` VARCHAR(245) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_id` INT(11) NOT NULL,
  PRIMARY KEY (`registration`),
  UNIQUE INDEX `emil_UNIQUE` (`email` ASC),
  INDEX `fk_student_course1_idx` (`course_id` ASC),
  CONSTRAINT `fk_student_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `controle_de_tarefas`.`course` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `controle_de_tarefas`.`student_has_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controle_de_tarefas`.`student_has_class` ;

CREATE TABLE IF NOT EXISTS `controle_de_tarefas`.`student_has_class` (
  `student_registration` INT(11) NOT NULL,
  `class_id` VARCHAR(6) NOT NULL,
  `skips` INT(11) NOT NULL,
  `status` INT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_registration`, `class_id`),
  INDEX `fk_student_has_class_class1_idx` (`class_id` ASC),
  INDEX `fk_student_has_class_student1_idx` (`student_registration` ASC),
  CONSTRAINT `fk_student_has_class_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `controle_de_tarefas`.`class` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_class_student1`
    FOREIGN KEY (`student_registration`)
    REFERENCES `controle_de_tarefas`.`student` (`registration`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `controle_de_tarefas`.`tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controle_de_tarefas`.`tasks` ;

CREATE TABLE IF NOT EXISTS `controle_de_tarefas`.`tasks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_registration` INT(11) NOT NULL,
  `class_id` VARCHAR(6) NOT NULL,
  `name` VARCHAR(70) NOT NULL,
  `total` FLOAT UNSIGNED NOT NULL,
  `nota` FLOAT UNSIGNED NULL DEFAULT NULL,
  `data_ini` DATETIME NULL DEFAULT NULL,
  `data_fin` DATETIME NULL DEFAULT NULL,
  `color` CHAR(7) NULL DEFAULT NULL,
  PRIMARY KEY (`student_registration`, `class_id`, `id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_tasks_student_has_class1`
    FOREIGN KEY (`student_registration` , `class_id`)
    REFERENCES `controle_de_tarefas`.`student_has_class` (`student_registration` , `class_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = latin1;


DELIMITER $$
USE `controle_de_tarefas`$$
DROP TRIGGER IF EXISTS `controle_de_tarefas`.`student_AFTER_INSERT` $$
USE `controle_de_tarefas`$$
CREATE
DEFINER=`root`@`%`
TRIGGER `controle_de_tarefas`.`student_AFTER_INSERT`
AFTER INSERT ON `controle_de_tarefas`.`student`
FOR EACH ROW
BEGIN

declare materia_id varchar(6); 
declare num_rows int default 0; 
declare done int default false; 
declare materias cursor for select class_id from course_has_class where `course_id` = NEW.course_id; 
declare continue handler for not found set done = true; 
open materias; 

my_loop: loop
    set done = false;
    fetch materias into materia_id; 
    if done then
      leave my_loop;
    end if;
    insert into student_has_class values (NEW.registration, materia_id, 0, 0);
end loop my_loop; 
close materias; 
END$$


DELIMITER ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
