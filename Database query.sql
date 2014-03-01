/*CREATE/RECREATE DB*/
CREATE DATABASE IF NOT EXISTS echonotes;
USE echonotes;

DROP TABLE IF EXISTS Tags;
DROP TABLE IF EXISTS ImageAnnotations;
DROP TABLE IF EXISTS TextAnnotations;
DROP TABLE IF EXISTS Annotations;
DROP TABLE IF EXISTS Echonotes;
DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
	email char(64) NOT NULL,
	name char(255) NOT NULL,
	password char(64) NOT NULL,
	PRIMARY KEY (email)
);

CREATE TABLE Echonotes(
	noteId integer  NOT NULL AUTO_INCREMENT,
	noteName char(255)  NOT NULL,
	audioURL char(255)  NOT NULL,
	userId char(64)  NOT NULL,
	PRIMARY KEY (noteId),
	FOREIGN KEY (userId)
		REFERENCES Users(email)
);

CREATE TABLE TextAnnotations(
	annotationId integer NOT NULL AUTO_INCREMENT,
	timestamp integer NOT NULL,
	content Text NOT NULL,
	noteId integer,
	PRIMARY KEY (annotationId),
	FOREIGN KEY (noteId)
		REFERENCES Echonotes(noteId)
);


CREATE TABLE ImageAnnotations(
	annotationId integer NOT NULL,
	timestamp integer NOT NULL,
	imageBlob longblob NOT NULL,
	noteId integer,
	PRIMARY KEY (annotationId),
	FOREIGN KEY (noteId)
		REFERENCES Echonotes(noteId)
);

CREATE TABLE Tags(
	tagId integer NOT NULL,
	tagName char(255) NOT NULL,
	color char(64) NOT NULL,
	noteId integer NOT NULL,
	PRIMARY KEY (tagId),
	FOREIGN KEY (noteId)
		REFERENCES Echonotes (noteId)
);