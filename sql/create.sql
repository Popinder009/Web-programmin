CREATE DATABASE test;

CREATE TABLE category (
	category_id int NOT NULL AUTO_INCREMENT,
	category_name VARCHAR(30),
	PRIMARY KEY (category_id)
);

CREATE TABLE user_account (
	user_id int NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    PRIMARY KEY (user_id)
);