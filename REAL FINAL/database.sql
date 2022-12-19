-- NOM DE LA DB: loginsignup

-- IL FAUT METTRE UN VRAI EMAIL
CREATE TABLE users (
    usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersName varchar(128) NOT NULL,
    usersEmail varchar(128) NOT NULL,
    usersUid varchar(128) NOT NULL,
    usersPwd varchar(128) NOT NULL,
    token varchar(128) NOT NULL
);


-- NOM DE LA DB: restau3
CREATE TABLE restaurants(
    restaurantsId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    adresse varchar(255) NOT NULL,
    note FLOAT(5),
    pwd varchar(255) NOT NULL,
    categories varchar(255),
    description varchar(1500),
    prix int(1),
    ville varchar(255),
    token varchar(128) NOT NULL
)

CREATE TABLE commentaires(
    commentsId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    restaurantsId int(11) NOT NULL,
    usersId int(11) NOT NULL,
    note int(1) NOT NULL,
    titre VARCHAR(255),
    description varchar(1500)
)

-- CREER DES RESTAURANTS POUR LE TEST
INSERT INTO restaurants (restaurantsId,name,email,adresse,pwd,categories,description,prix,ville)
VALUES (1,'Auberge du Vieux Puits','email1@gmail.com','5 Av. Saint-Victor','test','français','La route vers Fontjoncouse serpente au coeur de l’Aude dans un décor sauvage à quelques minutes de Narbonne, Port-la-Nouvelle, Carcassonne ou Perpignan. Après la garrigue, les vignes et quelques barres rocheuses, au bout, l’Auberge du Vieux Puits inspire le bonheur avec son univers de caractère, son atmosphère confortable et bien sûr sa cuisine d’exception.',5,'Fontjoncouse'),
(2,'Restaurant Gordon Ramsay','email2@gmail.com','68-69 Royal Hospital Road','test','français','L’établissement vedette de Gordon Ramsay est à la fois élégant et décontracté, et géré avec un grand professionnalisme par le charmant Jean-Claude. Chef et co-propriétaire, Matt Abé donne naissance à des assiettes d’élaboration classique mais jamais rétrogrades, révélant des contrastes de saveurs parfaitement étudiés et une touche de simplicité.',5,'Londres'),
(3,'Guy Savoy','email3@gmail.com','11 quai de Conti','test','créative',"Dans le cadre exceptionnel de l'hôtel de la Monnaie, Guy Savoy rédige chaque jour un nouveau chapitre de cette histoire entamée quelques décennies plus tôt : lorsque, jeune garçon, il passait la tête au-dessus des casseroles familiales dans la cuisine de la Buvette de l'Esplanade, à Bourgoin-Jallieu… Ici, il a vu les choses en grand : six salles parées de toiles contemporaines et de sculptures – dont un grand nombre prêté par François Pinault –, avec des fenêtres à huisseries anciennes donnant sur la Seine. Autant de faste ne détourne pas le chef de son travail : cette gastronomie vécue comme une fête, hommage renouvelé à la cuisine française. On retrouve notamment la soupe d’artichaut et truffes, plat emblématique de la maison, à déguster avec sa brioche tartinée de beurre de truffes…",5,'Paris'),
(4,'Hélène Darroze at The Connaught','email4@gmail.com','Carlos Place','test','moderne','’adresse londonienne d’Hélène Darroze arbore désormais un visage plus féminin et moins formel, mais peut toujours compter sur une équipe aguerrie pour s’assurer que l’on prend soin de tous. Les plats misent quant à eux sur leur ingrédient principal, toujours d’une qualité exceptionnelle, du homard des Cornouailles à la grouse galloise.',5,'Londres'),
(5,"Le Louis XV - Alain Ducasse à l'Hôtel de Paris",'email5@gmail.com','Place du Casino','test','méditerranéenne','Difficile de présenter le Louis XV, sans évoquer Alain Ducasse. Son existence se conjugue au superlatif. L’enfant d’Orthez, aux amours méditerranéennes, chef et homme d’affaires brillant, devenu citoyen monégasque, se trouve à la tête d’un empire de plus de 30 établissements sur tous les continents du monde.',5,'Monaco'),
(6,'Kanda','email6@gmail.com','1-1-1 Atago, Minato-ku','test','japonaise','Hiroyuki Kanda understands the essence of Japanese cuisine and incorporates his innovative ideas into the menu. He puts his own unique touch on the dishes while respecting the natural flavours of the ingredients. Based on the experience in Paris, he uses caviar and truffles effectively. Out of his respect for Tokushima as his hometown, he gets hamo, awabi and tai shipped in from there. The ‘Soba Porridge’ is a simple local dish.',5,'Tokyo'),
(7,'Kei','email7@gmail.com','5 rue du Coq-Héron','test','moderne'," 'Kei', c'est Kei Kobayashi, chef né à Nagano, au Japon, et formé à l’école prestigieuse des triples étoilés Gilles Goujon (L’Auberge du Vieux Puits, Fontjoncouse) et Alain Ducasse (Plaza Athénée, Paris 8e). Son père était cuisinier dans un restaurant traditionnel kaiseki (gastronomie servie en petits plats, comparable à la grande cuisine occidentale), mais sa vocation naît véritablement en regardant un documentaire sur la cuisine française. Aujourd'hui, son travail tutoie la perfection : virtuose des alliances de saveurs, toujours juste dans la conception de ses assiettes, il magnifie des produits de grande qualité. Un exemple ? Ce bœuf Wagyu de Kagoshima (extrême sud de l'île de Kyushu), superbement persillé, à la chair fondante et nourrie par le gras, au goût fumé et de noisette, accompagné de beaux gnocchis poêlés… Au dessert, le chef pâtissier Toshiya Takatsuka est un autre voyageur du goût dont les créations sucrées atteignent des sommets de raffinement.",5,'Paris'),
(8,'Joël Robuchon','email8@gmail.com','1-13-1 Mita, Meguro-ku','test','français','Joël Robuchon has been hailed as the chef of the 20th century and as a leader of modern French gastronomy, with a long list of accomplishments. Kenichiro Sekiya is in charge of the kitchen here and he charms gourmets with his many specialities. Robuchon’s influence is evident everywhere, even in the pureed potato side dish.',5,'Tokyo'),
(9,'Pic','email9@gmail.com','285 avenue Victor-Hugo','test','français',"La Maison Pic, dans la Drôme, c’est d’abord une atmosphère particulière. Salle tamisée, où la lumière n’éclaire que l’assiette ; créations florales ; moquette épaisse qui suspend le pas de la brigade, mixte, en tenue classique. Ici, on sert à l’ancienne, à l'assiette clochée en porcelaine… On retrouve dans l'assiette les sublimes obsessions – culte du Japon, souci de l’assemblage inédit – de celle que l’on a surnommé 'la funambule des saveurs'. Anne-Sophie Pic propose désormais une invitation au voyage autour d'un menu unique en 10 haltes. Membre du club très fermé des femmes trois étoiles, très engagée, la célèbre cheffe dirige aujourd'hui la fondation 'Donnons du goût à l’enfance'. Au-delà de son talent débordant, un indispensable symbole.",5,'Valence'),
(10,'Le Palais','email10@gmail.com','3, Section 1, Chengde Road, Datong District','test','français','The longstanding Macanese chef never fails to wow with his exquisite cooking. His Cantonese-style crispy roast duck is especially impressive; consider pre-ordering it to avoid missing out. Chinese spinach and salted egg dumplings are the dim sum of choice with colourful filling enrobed in a translucent skin. White gourd stuffed with shrimp and crab meat is another painstakingly-made speciality; pre-order it at least two days in advance.',5,'Taipei');

-- CREER DES UTILISATEURS POUR LE TEST
INSERT INTO users (usersId, usersName, usersEmail, usersUid, usersPwd)
VALUES (1, 'utilisateur1', 'users1@gmail.com', 'users1', 'test'),
(2, 'utilisateur2', 'users2@gmail.com', 'users2', 'test'),
(3, 'utilisateur3', 'users3@gmail.com', 'users3', 'test'),
(4, 'utilisateur4', 'users4@gmail.com', 'users4', 'test'),
(5, 'utilisateur5', 'users5@gmail.com', 'users5', 'test'),
(6, 'utilisateur6', 'users6@gmail.com', 'users6', 'test'),
(7, 'utilisateur7', 'users7@gmail.com', 'users7', 'test'),
(8, 'utilisateur8', 'users8@gmail.com', 'users8', 'test'),
(9, 'utilisateur9', 'users9@gmail.com', 'users9', 'test'),
(10, 'utilisateur10', 'users10@gmail.com', 'users10', 'test');

-- CREER DES COMMENTAIRES POSTES PAR LES UTILISATEURS
INSERT INTO commentaires (commentsId,restaurantsId,usersId,note,titre, description)
VALUES 
(1, 1, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(2, 1, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(3, 1, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(4, 2, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(5, 2, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(6, 2, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(7, 3, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(8, 3, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(9, 3, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(10, 4, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(11, 4, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(12, 4, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(13, 5, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(14, 5, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(15, 5, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(16, 6, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(17, 6, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(18, 6, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(19, 7, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(20, 7, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(21, 7, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(22, 8, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(23, 8, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(24, 8, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(25, 9, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(26, 9, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(27, 9, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),

(28, 10, 1, 5,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(29, 10, 1, 4,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.'),
(30, 10, 1, 3,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus, sem vel scelerisque condimentum, diam odio commodo sapien, id blandit mauris dolor sed lectus. Mauris sagittis, diam sit amet ullamcorper pellentesque, est tortor malesuada lacus, eu feugiat ante tortor sed tortor.');