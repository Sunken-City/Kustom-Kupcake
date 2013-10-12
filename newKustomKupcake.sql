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
   PRIMARY KEY(UserID),
   UNIQUE KEY (email)   
) engine = innodb;

CREATE TABLE flavor (
   flavorID int NOT NULL,
   flavorName varchar(50),
   picLoc varchar(100),
   PRIMARY KEY(flavorID)
) engine = innodb;

CREATE TABLE topping (
   toppingID int NOT NULL,
   toppingName varchar(50) NOT NULL,
   PRIMARY KEY(toppingID),
   UNIQUE KEY(toppingName)
) engine = innodb;

CREATE TABLE filling (
   fillingID int NOT NULL,
   fillingName varchar(50),
   rgbVal varchar(10),
   PRIMARY KEY(fillingID),
   UNIQUE KEY(fillingName)
) engine = innodb;

CREATE TABLE icing (
   icingID int NOT NULL,
   icingName varchar(50) NOT NULL,
   picLoc varchar(100),
   PRIMARY KEY(icingID),
   UNIQUE KEY(icingName)
) engine = innodb;

CREATE TABLE purchases (
   purchaseID int NOT NULL,
   quantity int NOT NULL,
   cupcakeID int NOT NULL,
   fillingID int NOT NULL,
   icingID int NOT NULL,
   UserID int NOT NULL,
   UNIQUE KEY(purchaseID, cupcakeID, UserID),
   CONSTRAINT FOREIGN KEY(UserID) REFERENCES users(UserID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(cupcakeID) REFERENCES flavor(flavorID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(fillingID) REFERENCES filling(fillingID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(icingID) REFERENCES icing(icingID)
      on update cascade
) engine = innodb;

CREATE TABLE favorites (
   favoriteID int NOT NULL,
   userID int NOT NULL,
   cupcakeName varchar(20) NOT NULL,
   cupcakeID int NOT NULL,
   fillingID int NOT NULL,
   icingID int NOT NULL,
   PRIMARY KEY(favoriteID),
   UNIQUE KEY(cupcakeID, UserID),
   CONSTRAINT FOREIGN KEY(UserID) REFERENCES users(UserID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(cupcakeID) REFERENCES flavor(flavorID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(fillingID) REFERENCES filling(fillingID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(icingID) REFERENCES icing(icingID)
      on update cascade
) engine = innodb;

CREATE TABLE toppingBridge (
   bridgeID int NOT NULL,
   favoriteID int NOT NULL,
   toppingID int NOT NULL,
   purchaseID int NOT NULL,
   PRIMARY KEY(bridgeID),
   CONSTRAINT FOREIGN KEY(purchaseID) REFERENCES pruchases(purchaseID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(favoriteID) REFERENCES favorites(favoriteID)
      on update cascade,
   CONSTRAINT FOREIGN KEY(toppingID) REFERENCES topping(toppingID)
      on update cascade
) engine = innodb;

#load data local infile '/home/joe/Kustom-Kupcake/data/CustomCupcakesDBData-Users.csv' into table users fields terminated by ',' optionally enclosed by '"' lines terminated by '\n' (UserID, onMailingList, givenName, surname, streetAddress, city, state, zipCode, email, password, telephone);

#load data local infile '/home/joe/Kustom-Kupcake/data/CustomCupcakesDBData-ToppingsBridge.csv' into #table toppingBridge fields terminated by ',' lines terminated by '\n' (bridgeID, cupcakeID, #toppingID);



