CREATE DATABASE IF NOT EXISTS projects CHARSET utf8mb4;
USE projects;

CREATE TABLE IF NOT EXISTS `grant`(
    id_grant INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS `account`(
    id_account INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    pseudo VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    id_a_grant INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `project`(
    id_project INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `folder` (
	id_folder INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `file` (
	id_file INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    font_familly VARCHAR(50) NOT NULL,
    font_style VARCHAR(50),
    font_size INT,
    text_align VARCHAR(50),
    text_content TEXT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `account_project` (
    id_ap_account INT NOT NULL,
    id_ap_project INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `project_folder` (
    id_pf_project INT NOT NULL,
    id_pf_folder INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `folder_file` (
    id_ff_folder INT NOT NULL,
    id_ff_file INT NOT NULL
)ENGINE=InnoDB;

ALTER TABLE `account`
ADD CONSTRAINT fk_attribute_grant
FOREIGN KEY (id_a_grant)
REFERENCES `grant`(id_grant)
ON DELETE CASCADE;

ALTER TABLE `account_project`
ADD CONSTRAINT fk_watch_account
FOREIGN KEY (id_ap_account)
REFERENCES `account` (id_account)
ON DELETE CASCADE;

ALTER TABLE `account_project`
ADD CONSTRAINT fk_watch_project_account
FOREIGN KEY (id_ap_project)
REFERENCES `project` (id_project)
ON DELETE CASCADE;

ALTER TABLE `project_folder`
ADD CONSTRAINT fk_watch_project_folder
FOREIGN KEY (id_pf_project)
REFERENCES `project` (id_project)
ON DELETE CASCADE;

ALTER TABLE `project_folder`
ADD CONSTRAINT fk_watch_folder
FOREIGN KEY (id_pf_folder)
REFERENCES `folder` (id_folder)
ON DELETE CASCADE;

ALTER TABLE `folder_file`
ADD CONSTRAINT fk_watch_folder_file
FOREIGN KEY (id_ff_folder)
REFERENCES `folder` (id_folder)
ON DELETE CASCADE;

ALTER TABLE `folder_file`
ADD CONSTRAINT fk_watch_file
FOREIGN KEY (id_ff_file)
REFERENCES `file` (id_file)
ON DELETE CASCADE;
