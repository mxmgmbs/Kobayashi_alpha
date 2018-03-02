drop database if exists kobayashi_IA;
create database kobayashi_IA;
	use kobayashi_IA;

CREATE TABLE user(
	usrID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	usrNom varchar(30),
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
	vidAutorName varchar(30),
	foreign key (vidAutorID) references user(usrID)
);

DROP TRIGGER IF exists ajout_Nom_User;
delimiter //
CREATE TRIGGER ajout_Nom_User 
before insert on video
for each row
begin
declare nom varchar(30);
select usrNom into nom from user where usrID = new.vidAutorID;
set new.vidAutorName = nom ;
END //
delimiter ;

INSERT INTO video (vidNom, vidChemin, vidDescription, vidDate, vidHour,vidVues, vidAutorID)
VALUES
	('Shell Linux : Les principes de base','video/video2.mp4','YAY oe mon frère',curdate(),curtime(),'34230',1),
	('Youtube : Mettre le thème sombre','video/video2.mp4','Description super de ma nouvelle video',curdate(),curtime(),'430',2);


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




