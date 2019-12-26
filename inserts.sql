# inserts to users
INSERT INTO users VALUES (NULL, 'user', 'Axel', 'Espinosa', 'axelespinosa','axeldavid45@gmail.com',
                          'root',
                          '',
                          null,
                          CURTIME(), CURTIME());
INSERT INTO users VALUES (NULL, 'user', 'Diana', 'Espinosa', 'dianaespinosa','diana@gmail
.com',
                          'root',
                          '',
                          null,
                          CURTIME(), CURTIME());
INSERT INTO users VALUES (NULL, 'user', 'Juan', 'Perez', 'juanperez','juan@gmail.com',
                          'root',
                          '',
                          null,
                          CURTIME(), CURTIME());

#inserts a images
INSERT INTO images VALUES (NULL, 1, 'test1.jpg', 'descripcion prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES (NULL, 1, 'arena1.jpg', 'descripcion arena 1', CURTIME(), CURTIME());
INSERT INTO images VALUES (NULL, 1, 'playa1.jpg', 'descripcion playa 1', CURTIME(), CURTIME());
INSERT INTO images VALUES (NULL, 3, 'familia.jpg', 'descripcion familia 3', CURTIME(), CURTIME());

#inserts to comments
INSERT INTO comments VALUES(NULL, 1, 4, 'Buena foto de familia', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 1, 'Buen test!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 4, 'Buena foto de familia, tio', CURTIME(), CURTIME());

#Inserts likes
INSERT INTO likes VALUES (null, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES (null, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES (null, 3, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES (null, 3, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES (null, 2, 1, CURTIME(), CURTIME());
