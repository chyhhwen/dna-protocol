drop database if exists dna;
create database dna default character set utf8 collate utf8_general_ci;
grant all on dna. * to 'staff' @'localhost' identified by 'password';
use dna;

CREATE TABLE list
(
     id int AUTO_INCREMENT PRIMARY KEY,
     family varchar(255) not null,
     dispatch varchar(255) not null,
     target varchar(255) not null,
     time varchar(255) not null
);

CREATE TABLE product
(
    id int AUTO_INCREMENT PRIMARY KEY,
    family varchar(255) not null,
    time varchar(255) not null
);

CREATE TABLE action
(
    id int AUTO_INCREMENT PRIMARY KEY,
    aid varchar(255) not null,
    thing varchar(255) not null,
    time varchar(255) not null
);


INSERT INTO `text` VALUES('',"text","123");