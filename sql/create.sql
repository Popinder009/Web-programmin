CREATE DATABASE test;
-- use test;

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
    product_bid int DEFAULT 0,
    time_end int NOT NULL, -- ymdHi stand for: year month day hour minutes 20-04-31-22-60   ok
    user_id int NOT NULL,
    PRIMARY KEY (product_id),
    FOREIGN KEY (product_category) REFERENCES category (category_id),
    FOREIGN KEY (user_id) REFERENCES user_account (user_id)
);
CREATE TABLE review (
    product_id int NOT NULL,
    user_id int NOT NULL,
    review VARCHAR(300) NOT NULL,
    date VARCHAR(20) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product (product_id),
    FOREIGN KEY (user_id) REFERENCES user_account (user_id)
);