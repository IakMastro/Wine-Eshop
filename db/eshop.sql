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
    final_cost FLOAT,
    payment VARCHAR (200),
    approved BOOLEAN,
    FOREIGN KEY (account_id) REFERENCES account(account_id)
);

CREATE TABLE order_details (
    order_id INT,
    product_id INT,
    litre INT,
    cost FLOAT,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

INSERT INTO account (email, username, password, type) VALUES (
    "admin@kerkopoulos.gr", "admin", "$2y$10$VYBAknNZYUKkGcwG0A6r.OQjIB.rWs5rQnEHUq7v7u4LM0S/DdPVa", "admin"
);

INSERT INTO product (name, type, cost_per_litre) VALUES (
    "Εμφιαλωμένο κόκκινο κράσι", "emfialomeno", 5
);

INSERT INTO product (name, type, cost_per_litre) VALUES (
    "Χύμα κόκκινο κράσι", "xuma", 10
);