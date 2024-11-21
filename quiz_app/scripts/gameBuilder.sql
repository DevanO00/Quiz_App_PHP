DROP DATABASE IF EXISTS gamesdb;
CREATE DATABASE gamesdb;
USE gamesdb;

CREATE TABLE Game
(
    gameID INT NOT NULL AUTO_INCREMENT,
    gameName VARCHAR(90) NOT NULL,
    gameDescription VARCHAR(90) NOT NULL,
    gameLength INT NOT NULL,
    releaseYear INT NOT NULL, 
    PRIMARY KEY (gameID)
);

-- game inserts
INSERT INTO Game VALUES (1, 'Dark Souls', 'Brutal adventure RPG', 30, 2011);
INSERT INTO Game VALUES (2, 'Elden Ring', 'Open world fantasy RPG', 50, 2022);
INSERT INTO Game VALUES (3, 'The Witcher 3', 'Story-driven RPG', 60, 2015);
INSERT INTO Game VALUES (4, 'Skyrim', 'Open world RPG', 100, 2011);
INSERT INTO Game VALUES (5, 'Hades', 'Action roguelike', 20, 2020);
INSERT INTO Game VALUES (6, 'Celeste', 'Platformer with heart', 10, 2018);
INSERT INTO Game VALUES (7, 'Hollow Knight', 'Metroidvania adventure', 40, 2017);
INSERT INTO Game VALUES (8, 'Stardew Valley', 'Farming simulation RPG', 100, 2016);
INSERT INTO Game VALUES (9, 'Undertale', 'Indie story-driven RPG', 8, 2015);
INSERT INTO Game VALUES (10, 'Resident Evil 4', 'Survival horror', 15, 2005);
INSERT INTO Game VALUES (11, 'Minecraft', 'Creative sandbox game', 500, 2011);
INSERT INTO Game VALUES (12, 'Red Dead Redemption 2', 'Western action RPG', 70, 2018);
INSERT INTO Game VALUES (13, 'Cyberpunk 2077', 'Futuristic open world RPG', 50, 2020);
INSERT INTO Game VALUES (14, 'Fortnite', 'Battle royale shooter', 200, 2017);
INSERT INTO Game VALUES (15, 'Apex Legends', 'Hero shooter battle royale', 150, 2019);
INSERT INTO Game VALUES (16, 'Overwatch', 'Team-based hero shooter', 100, 2016);
INSERT INTO Game VALUES (17, 'League of Legends', 'Multiplayer online battle', 300, 2009);
INSERT INTO Game VALUES (18, 'Valorant', 'Tactical shooter', 200, 2020);
INSERT INTO Game VALUES (19, 'Call of Duty: Warzone', 'Battle royale shooter', 120, 2020);
INSERT INTO Game VALUES (20, 'Among Us', 'Social deduction game', 5, 2018);
INSERT INTO Game VALUES (21, 'Fallout 4', 'Post-apocalyptic RPG', 50, 2015);
INSERT INTO Game VALUES (22, 'Ghost of Tsushima', 'Open world samurai adventure', 40, 2020);
INSERT INTO Game VALUES (23, 'Final Fantasy VII', 'Classic JRPG', 40, 1997);
INSERT INTO Game VALUES (24, 'The Legend of Zelda: Breath of the Wild', 'Open world action-adventure', 100, 2017);
INSERT INTO Game VALUES (25, 'Darkest Dungeon', 'Roguelike RPG', 30, 2016);
INSERT INTO Game VALUES (26, 'Animal Crossing: New Horizons', 'Life simulation game', 200, 2020);
INSERT INTO Game VALUES (27, 'Doom Eternal', 'First-person shooter', 15, 2020);
INSERT INTO Game VALUES (28, 'Sekiro: Shadows Die Twice', 'Action-adventure game', 30, 2019);
INSERT INTO Game VALUES (29, 'The Last of Us Part II', 'Narrative-driven action-adventure', 25, 2020);
INSERT INTO Game VALUES (30, 'Ghost Recon: Wildlands', 'Tactical shooter', 60, 2017);