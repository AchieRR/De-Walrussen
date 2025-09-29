-- =========================================
-- WALRUS • Complete menukaart (aanmaken + vullen)
-- =========================================

CREATE DATABASE IF NOT EXISTS walrus
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_0900_ai_ci;
USE walrus;

DROP TABLE IF EXISTS menu_items;

CREATE TABLE menu_items (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  subcategory VARCHAR(40) NOT NULL,      -- 'Diner' | 'Maaltijdsalades' | 'Soepen' | 'Lunch'
  category    VARCHAR(80) NOT NULL,      -- linker kolom per subcategory
  name        VARCHAR(255) NOT NULL,
  description TEXT NULL,
  price       DECIMAL(8,2) NOT NULL,
  sort_order  INT NOT NULL DEFAULT 0,    -- bepaalt volgorde binnen categorie
  is_active   TINYINT(1) NOT NULL DEFAULT 1,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_subcat (subcategory),
  KEY idx_cat (category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- =========================
-- D I N E R  • DESSERT
-- =========================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Diner','DESSERT','FRANGIPANE','Taartje van amandelspijs, lemoncurd en vers fruit',9.75,10),
('Diner','DESSERT','VLOEIBAAR CHOCOLADETAARTJE','Chocoladeroomijs en slagroom',9.75,20),
('Diner','DESSERT','IJS VAN MARGJE24','3 bollen ambachtelijk ijs met vruchtjes, aardbeiensaus en slagroom.',9.75,30),
('Diner','DESSERT','LEKKERS VOOR BIJ DE KOFFIE','Brownie, boterkoek, Red velvet cake en bonbon met karamel vulling',6.75,40),
('Diner','DESSERT','GRAND DESSERT','(prijs p.p.) vanaf 2 personen te bestellen',11.75,50),
('Diner','DESSERT','RED VELVET','Vanille crème fraîche en citroensorbetijs',9.75,60);

-- =========================
-- D I N E R  • VEGETARISCH
-- =========================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Diner','VEGETARISCHE GERECHTEN','ZOETE AARDAPPEL CURRY','Geserveerd met naanbrood en rijst',21.75,10),
('Diner','VEGETARISCHE GERECHTEN','SPINAZIE-RICOTTA RAVIOLI','Met roomsaus van pompoen en bospeen geserveerd met basilicumolie',21.75,20);

-- =========================
-- D I N E R  • VIS
-- =========================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Diner','VIS GERECHTEN','KIBBELING','Met remouladesaus',24.75,10),
('Diner','VIS GERECHTEN','ZEEBAARSFILET','Met tagliatelle van inktvis, roomsaus en een krokant van wasabi',26.75,20);

-- =========================
-- D I N E R  • VLEES
-- =========================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Diner','VLEESGERECHTEN','MC WALRUSBURGER','Kropsla, rode uienringen, baconjam, augurk, cheddar en Walrussaus',22.75,10),
('Diner','VLEESGERECHTEN','SATÉ VAN KIPPENDIJ','Zoetzure komkommer, cassave, seroendeng en satésaus',23.75,20),
('Diner','VLEESGERECHTEN','MIXED GRILL','Varken, rund en kip geserveerd met twee sauzen',29.75,30),
('Diner','VLEESGERECHTEN','RUNDER RIBEYE','Uienringen, champignons en zalf van bospeen en zoete aardappel geserveerd met peperroomsaus',29.75,40),
('Diner','VLEESGERECHTEN','SPARERIBS','Geserveerd met twee sauzen',27.75,50),
('Diner','VLEESGERECHTEN','RENDANG VAN VARKEN','Rijst, zoetzure komkommer en papadum',24.75,60);

-- =========================
-- D I N E R  • VOORGERECHTEN
-- =========================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Diner','VOORGERECHTEN','RUNDER CARPACCIO','Olijven, cherrytomaat, pittenmix, Parmezaanse kaas en truffelmayonaise',14.75,10),
('Diner','VOORGERECHTEN','ZACHTGEGAARDE VARKENSPROCUREUR','Paksoi, cashewnoten en hoisinsaus',13.75,20),
('Diner','VOORGERECHTEN','ITALIAANSE MOUSSE','Tomatensalsa en basilicumolie',11.75,30),
('Diner','VOORGERECHTEN','TONIJNBURGER','Wakame, krokante glasnoodles, sesamzaadjes en chili-mayonaise',13.75,40),
('Diner','VOORGERECHTEN','ROERGEBAKKEN GAMBA\'S','Oosterse groente en soja-sesamsaus',12.75,50),
('Diner','VOORGERECHTEN','PROEVERIJ VAN VOORGERECHTEN','Wisselende combinatie van koude en warme voorgerechten (te bestellen vanaf 2 personen, prijs p.p.)',14.75,60);

-- =========================
-- D I N E R  • KIDSMENU
-- =========================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Diner','KIDSMENU','FRIKANDEL, KROKET, KIPNUGGETS OF SPIESJE VAN BITTERBAL, FRIKANDEL EN KIPNUGGET','Met friet, appelmoes en mayonaise',9.75,10),
('Diner','KIDSMENU','KINDERSOEPJE','Tomatensoep, mosterdsoep of kerriesoep',3.50,20),
('Diner','KIDSMENU','CROISSANTJE','Met chocopasta, jam, ham of kaas',5.00,30),
('Diner','KIDSMENU','BIEFSTUK OF KIBBELING','Met friet, appelmoes en mayonaise',10.75,40),
('Diner','KIDSMENU','PIZZA PUNTJES','Tomatensaus, kaas en rucola',9.75,50),
('Diner','KIDSMENU','POFFERTJES',NULL,6.75,60),
('Diner','KIDSMENU','PANNENKOEK',NULL,6.75,70),
('Diner','KIDSMENU','KIPPENDIJFILET','Met friet, appelmoes en mayonaise',10.25,80),
('Diner','KIDSMENU','BOEVENBORD','Steel stiekem iets lekkers van je ouders bord!',0.00,90),
('Diner','KIDSMENU','MINI HAMBURGER. DOE ER OP WAT JIJ LEKKER VINDT!','Met friet, appelmoes en mayonaise',10.25,100);

-- ==================================
-- M A A L T I J D S A L A D E S
-- ==================================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Maaltijdsalades','LUNCH EN DINER SALADES','CAESAR SALADE','Spekjes, kip, croutons, cherrytomaat, kaas, uienringen, komkommer en caesardressing',15.75,10),
('Maaltijdsalades','LUNCH EN DINER SALADES','SALADE GEITENKAAS','Olijven, croutons, walnoten, cherrytomaat, komkommer en bosvruchtendressing',14.75,20),
('Maaltijdsalades','LUNCH EN DINER SALADES','SALADE ZALM','Cherrytomaat, uienringen, wakamé en citroenmayonaise',16.75,30),
('Maaltijdsalades','LUNCH EN DINER SALADES','SALADE CARPACCIO','Olijven, cherrytomaat, pittenmix, Parmezaanse kaas en truffelmayonaise',16.75,40),
('Maaltijdsalades','LUNCH EN DINER SALADES','SALADE SURF&TURF','Biefreepjes, gamba’s, haricots verts, cashewnoten, cherrytomaat, champignons en soja-sesamsaus',18.75,50);

-- ==================
-- S O E P E N
-- ==================
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Soepen','LUNCH EN DINER SOEPEN','BROODPLANKJE','Brood, dips en olijven',9.75,10),
('Soepen','LUNCH EN DINER SOEPEN','ROMIGE TOMATENSOEP','Prei en gehaktballetjes',7.00,20),
('Soepen','LUNCH EN DINER SOEPEN','ROMIGE MOSTERDSOEP','Spekjes en bieslook',7.00,30),
('Soepen','LUNCH EN DINER SOEPEN','KERRIESOEP','Kip en lente-ui',7.00,40),
('Soepen','LUNCH EN DINER SOEPEN','PROEVERIJ VAN 3 SOEPJES','Geserveerd met stokbrood',7.75,50);

-- ==============
-- L U N C H
-- ==============
-- BROODJES
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Lunch','BROODJES','TWEE KROKETTEN','Onze kroketten zijn ook veganistisch te bestellen',11.75,10),
('Lunch','BROODJES','RUNDERCARPACCIO','Truffelmayonaise, olijven, cherrytomaat, pittenmix en Parmezaanse kaas',14.75,20),
('Lunch','BROODJES','PULLED MUSHROOM','Zoetzure komkommer en gefrituurde uitjes',14.75,30),
('Lunch','BROODJES','KIPKERRIE UIT DE OVEN','Gegratineerd met oude kaas',14.75,40),
('Lunch','BROODJES','WARME BEENHAM','Mosterd-honingsaus',11.75,50),
('Lunch','BROODJES','GEROOKTE ZALM','Cherrytomaat, uienringen, wakamé, citroenmayonaise en zwarte sesamzaadjes',15.75,60),
('Lunch','BROODJES','TONIJNSALADE','Met rode ui en tomaat',12.75,70),
('Lunch','BROODJES','BRIE UIT DE OVEN','Honing en walnoten',12.75,80),
('Lunch','BROODJES','PULLED PORK','Zoet-zure komkommer en BBQ-saus',14.75,90);

-- LUNCHSPECIALS
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Lunch','LUNCHSPECIALS','DAYDREAM','Broodje carpaccio, broodje kroket en een soepje naar keuze',15.75,10),
('Lunch','LUNCHSPECIALS','CLUBSANDWICH','Baconjam, kippendij, tomaat, sla, remouladesaus en friet',12.75,20),
('Lunch','LUNCHSPECIALS','HOLLANDSE BAL GEHAKT','Met satésaus en mayonaise geserveerd met brood of friet',15.75,30),
('Lunch','LUNCHSPECIALS','MC WALRUSBURGER','Kropsla, uienringen, baconjam, augurk, cheddar en Walrussaus',19.75,40),
('Lunch','LUNCHSPECIALS','SATÉ VAN KIPPENDIJ','Zoetzure komkommer, seroendeng, satésaus geserveerd met brood of friet',19.75,50),
('Lunch','LUNCHSPECIALS','ROERGEBAKKEN BIEFSTUK','Gebakken uien, champignons en soja-sesamsaus geserveerd met brood of friet',19.75,60),
('Lunch','LUNCHSPECIALS','KIBBELING','Geserveerd met friet, salade en remouladesaus',22.75,70);

-- TOSTI'S
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order) VALUES
('Lunch',"TOSTI'S",'3 DUBBELE TOSTI','Ham en/of kaas',7.25,10),
('Lunch',"TOSTI'S",'TOSTI KIP','Kipfilet, pesto, cheddar en chili-mayonaise',11.75,20),
('Lunch',"TOSTI'S",'TOSTI CAPRESE','Mozzarella, tomaat en pesto',9.75,30);

-- LUNCH • KIDSMENU = kopie van Diner KIDSMENU
INSERT INTO menu_items (subcategory, category, name, description, price, sort_order)
SELECT 'Lunch','KIDSMENU', name, description, price, sort_order
FROM menu_items
WHERE subcategory='Diner' AND category='KIDSMENU';

-- Klaar.
