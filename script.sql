CREATE DATABASE agregadorDeClipes;
USE agregadorDeClipes;

CREATE TABLE `agregadorDeClipes`.`opiniao` (
   `id_opinion` INT NOT NULL AUTO_INCREMENT,
   `criador` VARCHAR(255) NOT NULL,
   `titulo` VARCHAR(255) NOT NULL,
   `link` VARCHAR(255) NOT NULL,
   `descricao` TEXT NOT NULL,
   `data` TIMESTAMP NOT NULL,
   PRIMARY KEY (`id_opinion`)
);

CREATE TABLE `agregadorDeClipes`.`comentario` (
   `id_comment` INT NOT NULL AUTO_INCREMENT,
   `criador` VARCHAR(255) NOT NULL,
   `nome` VARCHAR(255) NOT NULL,
   `descricao` TEXT NOT NULL,
   `data` TIMESTAMP NOT NULL,
   PRIMARY KEY (`id_comment`)
);

CREATE TABLE `agregadorDeClipes`.`usuarios` (
   `id_usuario` INT NOT NULL AUTO_INCREMENT,
   `nome` VARCHAR(255) NOT NULL,
   `email` VARCHAR(255) UNIQUE NOT NULL,
   `senha` VARCHAR(255) NOT NULL,
   PRIMARY KEY (`id_usuario`)
);