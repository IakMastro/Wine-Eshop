DROP DATABASE IF EXISTS eshop;

CREATE DATABASE eshop;

USE eshop;

CREATE TABLE account (
    account_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR (200),
    username VARCHAR (200),
    password VARCHAR (200),
    type VARCHAR (200)
);

CREATE TABLE product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (200),
    type VARCHAR (200),
    cost_per_litre FLOAT
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    account_id INT,
    product_id INT,
    final_cost FLOAT,
    litre FLOAT,
    approved BOOLEAN,
    FOREIGN KEY (account_id) REFERENCES account(account_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

INSERT INTO account (email, username, password, type) VALUES (
    "admin@kerkidopoulos.gr", "admin", "123", "admin"
);

INSERT INTO product (name, type, cost_per_litre) VALUES (
    "Εμφιαλωμένο κόκκινο κράσι", "emfaliwmeno", 5
);

INSERT INTO product (name, type, cost_per_litre) VALUES (
    "Χύμα κόκκινο κράσι", "xuma", 10
);