/*Kustom Kupcake database desinged by Joe St. Angelo and Anthony Cloudy*/
/*Used for Kustom Kupcakes, a website designed by cd msc/ */

DROP DATABASE IF EXISTS customcupcakes;
CREATE DATABASE customcupcakes;

use customcupcakes;

CREATE TABLE users (
   fName varchar(20) NOT NULL,
   lName varchar(20) NOT NULL,
   mailing int default '1',
   employee int default '0',
   email varchar(50) NOT NULL,
   password varchar(20) NOT NULL,
   telephone varchar(10) NOT NULL,
   address varchar(30) NOT NULL,
   city varchar(20) NOT NULL,
   state varchar(2) NOT NULL,
   zip int NOT NULL,
   PRIMARY KEY(email)
);

CREATE TABLE cupcakes (
   flavor varchar(20) NOT NULL,
   icing varchar(20) NOT NULL,
   filling int NOT NULL,
   toppings int NOT NULL,
   cupcakeID int NOT NULL,
   cost int NOT NULL,
   PRIMARY KEY(cupcakeID)
);

CREATE TABLE purchases (
   purchaseID int NOT NULL,
   quantity int NOT NULL,
   cupcakeID int NOT NULL,
   email varchar(50) NOT NULL,
   PRIMARY KEY(purchaseID),
   CONSTRAINT FOREIGN KEY(email) REFERENCES users(email),
   CONSTRAINT FOREIGN KEY(cupcakeID) REFERENCES cupcakes(cupcakeID)
);

CREATE TABLE favorites (
   cupcakeID int NOT NULL,
   email varchar(50) NOT NULL,
   cupcakeName varchar(20) NOT NULL,
   CONSTRAINT FOREIGN KEY(email) REFERENCES users(email),
   CONSTRAINT FOREIGN KEY(cupcakeID) REFERENCES cupcakes(cupcakeID)
);
