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

INSERT INTO `categories` (`category`)
VALUES ('Fitness'); 

INSERT INTO `products` (`name`, `color`, `quantity`, `details`, `categoryId`)
VALUES ('Resistance band', 'Green', 8, NULL, 1),
('Resistance band', 'Purple', 8, NULL, 1),
('Resistance band', 'Black', 8, NULL, 1),
('Resistance band', 'Red', 8, NULL, 1),
('Resistance band', 'Yellow', 8, NULL, 1);