CREATE DATABASE mythicscans;
USE mythicscans;

CREATE TABLE roles(
	id_role INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE users(
	id_user INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    date_inscription DATETIME,
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES roles(id_role)
    );
    
CREATE TABLE types(
	id_type INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE series(
	id_serie INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    author VARCHAR(50) NOT NULL,
    description TEXT,
    status VARCHAR(50) NOT NULL,
    cover_image VARCHAR(50) NOT NULL,
    id_type INT,
    FOREIGN KEY (id_type) REFERENCES types(id_type)
);
 
CREATE TABLE chapters(
	id_chapter INT PRIMARY KEY AUTO_INCREMENT,
    chapter_number INT NOT NULL,
    chapter_title VARCHAR(50),
    added_at DATETIME,
    content TEXT,
    id_serie INT,
    FOREIGN KEY (id_serie) REFERENCES series(id_serie)
);

CREATE TABLE rates(
	id_rate INT PRIMARY KEY AUTO_INCREMENT,
    score INT NOT NULL,
    id_serie INT,
    id_user INT,
    FOREIGN KEY (id_serie) REFERENCES series(id_serie),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE favorites(
	id_favorite INT PRIMARY KEY AUTO_INCREMENT,
    id_serie INT,
    id_user INT,
	FOREIGN KEY (id_serie) REFERENCES series(id_serie),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE comments(
	id_comment INT PRIMARY KEY AUTO_INCREMENT,
	content TEXT NOT NULL,
    commented_at DATETIME NOT NULL,
    id_chapter INT,
    id_serie INT,
    id_user INT,
    FOREIGN KEY (id_chapter) REFERENCES chapters(id_chapter),
	FOREIGN KEY (id_serie) REFERENCES series(id_serie),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE progress(
	id_progress INT PRIMARY KEY AUTO_INCREMENT,
	id_chapter INT,
    id_serie INT,
    id_user INT,
    FOREIGN KEY (id_chapter) REFERENCES chapters(id_chapter),
	FOREIGN KEY (id_serie) REFERENCES series(id_serie),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

INSERT INTO types (name) VALUES ('Webtoon'),('Manga'),('Light Novel');

-- Webtoons
INSERT INTO series (title, author, description, status, cover_image, id_type) VALUES
('Solo Leveling', 'Inconnnu', 'Description à compléter', 'En cours', './public/img/Webtoon/Solo.svg', 1),
('Infinite Mage', 'Inconnnu', 'Description à compléter', 'En cours', './public/img/Webtoon/Infinite.svg', 1),
('Wind Breaker', 'Inconnnu', 'Description à compléter', 'En cours', './public/img/Webtoon/Wind.svg', 1),
('Revenge of The Iron-Blooded ...', 'Inconnnu', 'Description à compléter', 'En cours', './public/img/Webtoon/Revenge.svg', 1);

-- Mangas
INSERT INTO series (title, author, description, status, cover_image, id_type) VALUES
('One Piece', 'Eiichiro Oda', 'Description à compléter', 'En cours', './public/img/Manga/One.svg', 2),
('Naruto', 'Masashi Kishimoto', 'Description à compléter', 'Terminé', './public/img/Manga/Naruto.svg', 2),
('Black Clover', 'Yūki Tabata', 'Description à compléter', 'En cours', './public/img/Manga/Black.svg', 2),
('Shingeki No Kyojin', 'Hajime Isayama', 'Description à compléter', 'Terminé', './public/img/Manga/SNK.svg', 2);

-- Light Novels
INSERT INTO series (title, author, description, status, cover_image, id_type) VALUES
('The Beginning After The End', 'TurtleMe', 'Description à compléter', 'En cours', './public/img/LN/TBATE.svg', 3),
('Sword Art Online', 'Reki Kawahara', 'Description à compléter', 'En cours', './public/img/LN/SAO.svg', 3),
('Danmachi', 'Fujino Ōmori', 'Description à compléter', 'En cours', './public/img/LN/Danmachi.svg', 3),
('Re:Zero', 'Tappei Nagatsuki', 'Description à compléter', 'En cours', './public/img/LN/Re.svg', 3);

INSERT INTO series (title, author, description, status, cover_image, id_type) VALUES
('GOAT', 'Eiichiro Oda', 'Description à compléter', 'En cours', './public/img/waiting-wait.gif', 1);
