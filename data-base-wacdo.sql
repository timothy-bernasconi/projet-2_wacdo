CREATE DATABASE wacdo;

USE wacdo;

DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ;


/** pour créer de base des mdp j'ai utilisé la commande 
php -r "echo password_hash('admin123', PASSWORD_BCRYPT);" 
php -r "echo password_hash('accueil', PASSWORD_BCRYPT);"
php -r "echo password_hash('prep123', PASSWORD_BCRYPT);" **/
INSERT INTO `employees` VALUES 

(1,'admin@wacdo.fr','$2y$10$/8/sgYP5IlCLXR5QvUELKukZoyNXHsWV.HnN3limlsoXfJhXMPx8m','Roger','Federer'),
(2,'accueil@wacdo.fr','$2y$10$6h49csdasj5ecl7s0kNyCezGO51ikFc5PqH0TeeKkJKRiAH3Cyr6a','Rafael','Nadal'),
(3,'preparateur@wacdo.fr','$2y$10$MRNJYKLHpAWiF5N6IFILaeW67CvwyZh3AZiCMeaVs/88sdzyP9R7.','Novak','Djokovic');

CREATE TABLE `categories` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(80) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
) ;

INSERT INTO `categories` VALUES 
(1, 'menus'),
(2, 'burgers'),
(3, 'boissons'),
(4, 'frites'),
(5, 'encas'),
(6, 'wraps'),
(7, 'salades'),
(8, 'desserts'),
(9, 'sauces');

CREATE TABLE `products` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `price` decimal(6,2) NOT NULL,
    `category_id` int NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
) ;

INSERT INTO `products`  VALUES
(1,'Menu Le 280',8.80,1),
(2,'Menu Big Tasty',10.60,1),
(3,'Menu Big Tasty Bacon',10.90,1),
(4,'Menu Big Mac',8.00,1),
(5,'Menu CBO',10.90,1),
(6,'Menu MC Chicken',9.30,1),
(7,'Menu MC Crispy',7.20,1),
(8,'Menu MC Fish',7.20,1),
(9,'Menu Royal Bacon',7.05,1),
(10,'Menu Royal Cheese',6.40,1),
(11,'Menu Royal Deluxe',7.40,1),
(12,'Menu Signature BBQ Beef 2 viandes',13.50,1),
(13,'Menu Signature Beef BBQ',11.90,1),
(14,'Le 280',6.80,2),
(15,'Big Tasty',8.60,2),
(16,'Big Tasty Bacon',8.90,2),
(17,'Big Mac',6.00,2),
(18,'CBO',8.90,2),
(19,'MC Chicken',7.30,2),
(20,'MC Crispy',5.30,2),
(21,'MC Fish',4.85,2),
(22,'Royal Bacon',5.10,2),
(23,'Royal Cheese',4.40,2),
(24,'Royal Deluxe',5.40,2),
(25,'Signature BBQ Beef 2 viandes',11.40,2),
(26,'Signature Beef BBQ',10.30,2),
(27,'Coca Cola',1.90,3),
(28,'Coca Sans Sucres',1.90,3),
(29,'Eau',1.00,3),
(30,'Fanta Orange',1.90,3),
(31,'Ice Tea Pêche',1.90,3),
(32,'Ice Tea Citron',1.90,3),
(33,'Jus d''Orange',2.10,3),
(34,'Jus de Pommes Bio',2.30,3),
(35,'Petite Frite',1.45,4),
(36,'Moyenne Frite',2.75,4),
(37,'Grande Frite',3.50,4),
(38,'Potatoes',2.15,4),
(39,'Grande Potatoes',3.40,4),
(40,'Cheeseburger',2.60,5),
(41,'Croc MCdo',3.20,5),
(42,'Nuggets x4',4.20,5),
(43,'Nuggets x20',13.00,5),
(44,'Brownie',2.60,8),
(45,'Cheesecake chocolat M&M''S',3.10,8),
(46,'Cheesecake Fraise',3.10,8),
(47,'Cookie',3.20,8),
(48,'Donut',2.60,8),
(49,'Macarons',2.70,8),
(50,'MC Fleury',4.40,8),
(51,'Muffin',3.60,8),
(52,'Sunday',1.00,8),
(53,'Classic Barbecue',0.70,9),
(54,'Classic Moutarde',0.70,9),
(55,'Creamy Deluxe',0.70,9),
(56,'Ketchup',0.70,9),
(57,'Chinoise',0.70,9),
(58,'Curry',0.70,9),
(59,'Pommes Frites',0.70,9),
(60,'Petite Salade',3.30,7),
(61,'Cesar Classic',8.80,7),
(62,'Italienne Mozza',8.80,7),
(63,'MC Wrap chevre',3.10,6),
(64,'MC Wrap Poulet Bacon',3.30,6),
(65,'Ptit Wrap Chevre',2.60,6),
(66,'Ptit Wrap Ranch',2.60,6);