use customcupcakes;

LOAD DATA LOCAL INFILE '/home/nathan/Documents/Kustom-Kupcake/data/CustomCupcakesDBData-Users.csv' INTO TABLE users FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 LINES (UserID, onMailingList, givenName, surname, streetAddress, city, state, zipCode, email, password, telephone);

LOAD DATA LOCAL INFILE '/home/nathan/Documents/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.csv' INTO TABLE favorites FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (FavoriteID, UserID, cupcakeID, icingID, fillingID);

LOAD DATA LOCAL INFILE '/home/nathan/Documents/Kustom-Kupcake/data/CustomCupcakesDBData-ToppingsBridge.csv' INTO TABLE toppingBridge FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (bridgeID, favoriteID, toppingID);
