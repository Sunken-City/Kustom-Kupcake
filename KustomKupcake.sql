/*Kustom Kupcake database desinged by Joe St. Angelo and Anthony Cloudy*/
/*Used for Kustom Kupcakes, a website designed by cd msc/ */

DROP DATABASE IF EXISTS customcupcakes;
CREATE DATABASE customcupcakes;

use customcupcakes;

CREATE TABLE users (
   UserID int NOT NULL,
   onMailingList varchar(3) NOT NULL,
   employee varchar(3) NOT NULL,
   givenName varchar(50) NOT NULL,
   surname varchar(50) NOT NULL,
   streetAddress varchar(50) NOT NULL,
   city varchar(50) NOT NULL,
   state varchar(2) NOT NULL,
   zipCode int NOT NULL,
   email varchar(50) NOT NULL,
   password varchar(50) NOT NULL,
   telephone int NOT NULL,
   PRIMARY KEY(email),
   UNIQUE KEY(UserID)   
) engine = innodb;

CREATE TABLE flavor (
   flavorID int NOT NULL,
   flavorName varchar(50),
   picLoc varchar(100),
   PRIMARY KEY(flavorID)
) engine = innodb;

CREATE TABLE cupcakes (
   flavorID int NOT NULL,
   cupcakeID int NOT NULL,
   cost int NOT NULL,
   PRIMARY KEY(cupcakeID),
   CONSTRAINT FOREIGN KEY(flavorID) REFERENCES flavor(flavorID)
) engine = innodb;

CREATE TABLE topping (
   toppingID int NOT NULL,
   toppingName varchar(50) NOT NULL,
   PRIMARY KEY(toppingID)
) engine = innodb;

CREATE TABLE toppingBridge (
   cupcakeID int NOT NULL,
   toppingID int NOT NULL,
   bridgeID int NOT NULL,
   PRIMARY KEY(bridgeID),
   CONSTRAINT FOREIGN KEY(cupcakeID) REFERENCES cupcakes(cupcakeID),
   CONSTRAINT FOREIGN KEY(toppingID) REFERENCES topping(toppingID)
) engine = innodb;

CREATE TABLE filling (
   fillingID int NOT NULL,
   fillingName varchar(50),
   picLoc varchar(100),
   PRIMARY KEY(fillingID)
) engine = innodb;

CREATE TABLE icing (
   icingID int NOT NULL,
   icingName varchar(50) NOT NULL,
   picLoc varchar(100),
   PRIMARY KEY(icingID)
) engine = innodb;

CREATE TABLE purchases (
   purchaseID int NOT NULL,
   quantity int NOT NULL,
   cupcakeID int NOT NULL,
   fillingID int NOT NULL,
   icingID int NOT NULL,
   email varchar(50) NOT NULL,
   PRIMARY KEY(purchaseID, cupcakeID, email),
   CONSTRAINT FOREIGN KEY(email) REFERENCES users(email),
   CONSTRAINT FOREIGN KEY(cupcakeID) REFERENCES cupcakes(cupcakeID),
   CONSTRAINT FOREIGN KEY(fillingID) REFERENCES filling(fillingID),
   CONSTRAINT FOREIGN KEY(icingID) REFERENCES icing(icingID)
) engine = innodb;

CREATE TABLE favorites (
   favoriteID int NOT NULL,
   email varchar(50) NOT NULL,
   cupcakeName varchar(20) NOT NULL,
   cupcakeID int NOT NULL,
   fillingID int NOT NULL,
   icingID int NOT NULL,
   PRIMARY KEY(cupcakeID, email),
   CONSTRAINT FOREIGN KEY(email) REFERENCES users(email),
   CONSTRAINT FOREIGN KEY(cupcakeID) REFERENCES cupcakes(cupcakeID),
   CONSTRAINT FOREIGN KEY(fillingID) REFERENCES filling(fillingID),
   CONSTRAINT FOREIGN KEY(icingID) REFERENCES icing(icingID)
) engine = innodb;

use customcupcakes;

INSERT into flavor VALUES(1, 'Banana', 'banana.PNG');
INSERT into flavor VALUES(2, 'Carrot', 'carrot.PNG');
INSERT into flavor VALUES(3, 'Chocolate', 'chocolate.PNG');
INSERT into flavor VALUES(4, 'Coconut', 'coconut.PNG');
INSERT into flavor VALUES(5, 'Cranberry', 'cranberry.PNG');
INSERT into flavor VALUES(6, 'Dark Chocolate', 'dark_chocolate.PNG');
INSERT into flavor VALUES(7, 'Grape', 'grape.PNG');
INSERT into flavor VALUES(8, 'Kiwi', 'kiwi,PNG');
INSERT into flavor VALUES(9, 'Lemon', 'lemon.PNG');
INSERT into flavor VALUES(10, 'Milk Chocolate', 'milk_chocolate.PNG');
INSERT into flavor VALUES(11, 'Orange', 'orange.PNG');
INSERT into flavor VALUES(12, 'Pineapple', 'pineapple.PNG');
INSERT into flavor VALUES(13, 'Red Velvet', 'redvelvet.PNG');
INSERT into flavor VALUES(14, 'Vanilla', 'vanilla.PNG');

INSERT into icing VALUES(1, 'Banana Pie', 'banana_pie_frosting.png');
INSERT into icing VALUES(2, 'Blueberry Cheesecake', 'blueberry_cheesecake_frosting.png');
INSERT into icing VALUES(3, 'Buttered Popcorn', 'buttered_popcorn_frosting.png');
INSERT into icing VALUES(4, 'Caramel Mudslide', 'caramel_mudslide_frosting.png');
INSERT into icing VALUES(5, 'Chai Latte', 'chai_latte_frosting.png');
INSERT into icing VALUES(6, 'Chocolate', 'chocolate_frosting.png');
INSERT into icing VALUES(7, 'Chocolate Hazelnut', 'chocolate_hazelnut_frosting.png');
INSERT into icing VALUES(8, 'Chocolate Orange', 'chocolate_organge_frosting.png');
INSERT into icing VALUES(9, 'Cinnamon Toast', 'cinnamon_toast_frosting.png');
INSERT into icing VALUES(10, 'Cookie Dough', 'cookie_dough_frosting.png');
INSERT into icing VALUES(11, 'Creme Cheese', 'creme_cheese_frosting.png');
INSERT into icing VALUES(12, 'Earl Grey', 'earl_grey_frosting.png');
INSERT into icing VALUES(13, 'Honey Rosemary', 'honey_rosemary_frosting.png');
INSERT into icing VALUES(14, 'Lavender Caramel', 'lavender_caramel_frosting.png');
INSERT into icing VALUES(15, 'Lemon', 'lemon_frosting.png');
INSERT into icing VALUES(16, 'Lemon Poppyseed', 'lemon_poppyseed_forsting.png');
INSERT into icing VALUES(17, 'Raspberry Ripple', 'raspberry_ripple_frosting.png');
INSERT into icing VALUES(18, 'Raspberry White Chocolate', 'raspberry_white_chocolate_frosting.png');
INSERT into icing VALUES(19, 'Salted Caramel', 'salted_caramel_frosting.png');
INSERT into icing VALUES(20, 'Strawberries Creame', 'strawberries_creame_frosting.png');
INSERT into icing VALUES(21, 'Toffee Apple', 'toffee_apple_frosting.png');
INSERT into icing VALUES(22, 'Vanilla', 'vanilla_frosting.png');
INSERT into icing VALUES(23, 'Vanilla Rose', 'vanilla_rose_frosting.png');
INSERT into icing VALUES(24, 'Vegan Vanilla', 'vegan_vanilla_frosting.png');

INSERT into filling VALUES(0, 'None', '');
INSERT into filling VALUES(1, 'Banana Pie', 'banana_pie_frosting.png');
INSERT into filling VALUES(2, 'Blueberry Cheesecake', 'blueberry_cheesecake_frosting.png');
INSERT into filling VALUES(3, 'Buttered Popcorn', 'buttered_popcorn_frosting.png');
INSERT into filling VALUES(4, 'Caramel Mudslide', 'caramel_mudslide_frosting.png');
INSERT into filling VALUES(5, 'Chai Latte', 'chai_latte_frosting.png');
INSERT into filling VALUES(6, 'Chocolate', 'chocolate_frosting.png');
INSERT into filling VALUES(7, 'Chocolate Hazelnut', 'chocolate_hazelnut_frosting.png');
INSERT into filling VALUES(8, 'Chocolate Orange', 'chocolate_organge_frosting.png');
INSERT into filling VALUES(9, 'Cinnamon Toast', 'cinnamon_toast_frosting.png');
INSERT into filling VALUES(10, 'Cookie Dough', 'cookie_dough_frosting.png');
INSERT into filling VALUES(11, 'Creme Cheese', 'creme_cheese_frosting.png');
INSERT into filling VALUES(12, 'Earl Grey', 'earl_grey_frosting.png');
INSERT into filling VALUES(13, 'Honey Rosemary', 'honey_rosemary_frosting.png');
INSERT into filling VALUES(14, 'Lavender Caramel', 'lavender_caramel_frosting.png');
INSERT into filling VALUES(15, 'Lemon', 'lemon_frosting.png');
INSERT into filling VALUES(16, 'Lemon Poppyseed', 'lemon_poppyseed_forsting.png');
INSERT into filling VALUES(17, 'Raspberry Ripple', 'raspberry_ripple_frosting.png');
INSERT into filling VALUES(18, 'Raspberry White Chocolate', 'raspberry_white_chocolate_frosting.png');
INSERT into filling VALUES(19, 'Salted Caramel', 'salted_caramel_frosting.png');
INSERT into filling VALUES(20, 'Strawberries Creame', 'strawberries_creame_frosting.png');
INSERT into filling VALUES(21, 'Toffee Apple', 'toffee_apple_frosting.png');
INSERT into filling VALUES(22, 'Vanilla', 'vanilla_frosting.png');
INSERT into filling VALUES(23, 'Vanilla Rose', 'vanilla_rose_frosting.png');
INSERT into filling VALUES(24, 'Vegan Vanilla', 'vegan_vanilla_frosting.png');

INSERT into topping VALUES(1, 'Sprinkles');
INSERT into topping VALUES(2, 'Bacon');
INSERT into topping VALUES(3, 'M&Ms');
INSERT into topping VALUES(4, 'Reeses Pieces');
INSERT into topping VALUES(5, 'Skittles');
INSERT into topping VALUES(6, 'Mini Chocolate Chips');
INSERT into topping VALUES(7, 'Oreo Bits');
INSERT into topping VALUES(8, 'Twix Bits');
INSERT into topping VALUES(9, 'Butterginger Bits');
INSERT into topping VALUES(10, 'Snicker Bits');
INSERT into topping VALUES(11, 'Mini Marshmellows');





