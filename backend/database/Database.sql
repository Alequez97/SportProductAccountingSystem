CREATE DATABASE IF NOT EXISTS jurec_sanja;

USE jurec_sanja;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(256) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `categories` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `category` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `products` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `color` VARCHAR(50) NOT NULL,
    `quantity` INT NOT NULL,
    `details` VARCHAR(1000),
    `categoryId` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`categoryId`) REFERENCES categories(`id`)
);

CREATE TABLE IF NOT EXISTS `transactions` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `price` DECIMAL(8, 2) NOT NULL,
    `type` VARCHAR(50) NOT NULL,
    `details` VARCHAR(10000),
    `creation_date` DATETIME,
    PRIMARY KEY (`id`)
);

INSERT INTO `categories` (`category`)
VALUES ('Fitness'); 
