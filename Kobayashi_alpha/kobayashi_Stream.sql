drop database if exists kobayashi_IA;
create database kobayashi_IA;
	use kobayashi_IA;

CREATE TABLE user(
	usrID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	usrNom varchar(20),
	usrEmail varchar(255),
	usrPassword varchar(20),
	usrDateNaissance date,
	usrPays varchar(20),
	usrDateInscription date
);

INSERT INTO user (usrNom,usrEmail,usrPassword,usrDateInscription, usrPays,usrDateNaissance)
	VALUES
	('Paul','paulderiot@gmail.com','azerty',curdate(),'France','1995-02-04'),
	('Henri','henridadelle77@hotmail.fr','toto',curdate(),'Italie','1993-01-12'),
	('Peyo','pierreblottiere@gmail.com','peyoo',curdate(),'France','1995-02-10');

CREATE TABLE video(
	vidID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	vidNom varchar(80),
	vidChemin varchar(255),
	vidDescription varchar(255),
	vidDate date,
	vidHour time,
	vidVues int(255),
	vidAutorID int,
	foreign key (vidAutorID) references user(usrID)
);

INSERT INTO video (vidNom, vidChemin, vidDescription, vidDate, vidHour,vidVues, vidAutorID)
	VALUES
	('Youtube : Comment passer le thème en sombre','video/video1.mp4','Une ptite vidéo la comme ca',curdate(),curtime(),'250','2'),
	('Shell Linux : Les principes de base','video/video2.mp4','YAY oe mon frère',curdate(),curtime(),'34230','1');

CREATE TABLE comment(
	comID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	comContent text(255),
	comDate date,
	comHour time,
	comAutorID int,
	comVideoID int,

	foreign key (comAutorID) references user(usrID),
	foreign key (comVideoID) references video(vidID)
);

INSERT INTO comment (comContent, comDate, comHour, comAutorID, comVideoID)
	VALUES
	('Super vidéo, merci !',curdate(),curtime(),'2','1'),
	('HELP, Je n\'arrive pas a lancer le terminal !',curdate(),curtime(),'1','2');




















