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
CREATE TABLE product(
	product_id int NOT NULL AUTO_INCREMENT,
	product_name VARCHAR(30) NOT NULL,
    product_description VARCHAR(60) NOT NULL,
    product_image VARCHAR(60) NOT NULL,
    product_category int NOT NULL,
    PRIMARY KEY (product_id),
    FOREIGN KEY (product_category) REFERENCES category (category_id)
);