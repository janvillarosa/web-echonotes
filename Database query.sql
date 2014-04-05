/*CREATE/RECREATE DB*/
CREATE DATABASE IF NOT EXISTS echonotes DEFAULT CHARACTER SET utf8;
USE echonotes;

DROP TABLE IF EXISTS Echonote_Tag;
DROP TABLE IF EXISTS Tags;
DROP TABLE IF EXISTS ImageAnnotations;
DROP TABLE IF EXISTS TextAnnotations;
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
	duration integer NOT NULL,
	userId char(64)  NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	PRIMARY KEY (noteId),
	FOREIGN KEY (userId)
		REFERENCES Users(email)
);

CREATE TABLE TextAnnotations(
	annotationId integer NOT NULL AUTO_INCREMENT,
	timestamp integer NOT NULL,
	content Text NOT NULL,
	noteId integer NOT NULL,
	PRIMARY KEY (annotationId),
	FOREIGN KEY (noteId)
		REFERENCES Echonotes(noteId)
);


CREATE TABLE ImageAnnotations(
	annotationId integer NOT NULL AUTO_INCREMENT,
	timestamp integer NOT NULL,
	imageURL char(255) NOT NULL,
	noteId integer NOT NULL,
	PRIMARY KEY (annotationId),
	FOREIGN KEY (noteId)
		REFERENCES Echonotes(noteId)
);

CREATE TABLE Tags(
	tagName char(255) NOT NULL,
	color char(64) NOT NULL,
	noteId integer NOT NULL,
	PRIMARY KEY (tagName, color),
	FOREIGN KEY (noteId)
		REFERENCES Echonotes (noteId)
);

CREATE TABLE Echonote_Tag(
	noteId integer NOT NULL,
	tagName char(255) NOT NULL,
	color char(64) NOT NULL,
	PRIMARY KEY (noteId, tagName, color),
	FOREIGN KEY (noteId)
		REFERENCES Echonotes (noteId),
	FOREIGN KEY (tagName, color)
		REFERENCES Tags (tagName, color)
);