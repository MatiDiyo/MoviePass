CREATE DATABASE moviepass;

USE moviepass;

CREATE TABLE IF NOT EXISTS users(
	id_user INT AUTO_INCREMENT,
	mail VARCHAR(50) NOT NULL,
	pass VARCHAR(50) NOT NULL,
	CONSTRAINT pk_users PRIMARY KEY (id_user),
	CONSTRAINT unq_user UNIQUE (mail)
);

CREATE TABLE IF NOT EXISTS profileusers(
	id_profile INT AUTO_INCREMENT,
	surname VARCHAR (50) NOT NULL,
	dni INT NOT NULL,
	user_name VARCHAR (50) NOT NULL,
	id_user INT NOT NULL,
	CONSTRAINT pk_profile PRIMARY KEY (id_profile),
	CONSTRAINT fk_profile_users FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT unq_dni UNIQUE (dni)
);

CREATE TABLE IF NOT EXISTS roleusers(
	id_role INT AUTO_INCREMENT,
	description_user VARCHAR (20) NOT NULL,
	id_user INT NOT NULL,
	CONSTRAINT pk_role PRIMARY KEY (id_role),
	CONSTRAINT fk_role_users FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT unq_role UNIQUE (id_role, id_user)
);


INSERT INTO roleusers (description_user, id_user) VALUES ('user_admin', 3);
INSERT INTO roleusers (description_user, id_user) VALUES ('user_admin', 5);
INSERT INTO roleusers (description_user, id_user) VALUES ('user_normal', 1);

SELECT * FROM users u INNER JOIN roleusers r ON u.id_user = r.id_user;
SELECT * FROM users INNER JOIN roleusers r WHERE 3 = r.id_user;
SELECT * FROM roleusers;

SELECT * FROM users u INNER JOIN roleusers r ON r.id_user = u.id_user WHERE u.id_user = 3;

SELECT * FROM profileusers;
SELECT * FROM users;

DROP TABLE profileusers;
DROP TABLE users;
DROP TABLE roleusers;
