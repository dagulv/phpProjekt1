CREATE DATABASE bookstoreDB (

CREATE TABLE book (
    bookID INT NOT NULL AUTO-INCREMENT,
    bookTitle VARCHAR(50),
    bookAuthor VARCHAR(50),
    categoryID INT NOT NULL,
    bookPublished DATE,
    bookPrice INT,
    bookDescription VARCHAR(255),
    bookIsbn VARCHAR(50),
    bookQuantity INT,
    PRIMARY KEY(bookID),
    FOREIGN KEY(categoryID) REFERENCES category(categoryID)
);

CREATE TABLE category (
    categoryID INT NOT NULL AUTO-INCREMENT,
    categoryName VARCHAR(50),
    PRIMARY KEY (categoryID)
);

CREATE TABLE customer (
    customerID INT NOT NULL AUTO-INCREMENT,
    customerName VARCHAR(50),
    customerAddress VARCHAR(50),
    customerPhoneNumber VARCHAR(50),
    customerPersonNumber VARCHAR(50),
    customerEmail VARCHAR(50),
    customerPassword VARCHAR(50),
    customerDate VARCHAR(50),
    PRIMARY KEY(customerID)
);

CREATE TABLE employee (
    employeeID INT NOT NULL AUTO-INCREMENT,
    employeeName VARCHAR(50) NOT NULL,
    employeePassword VARCHAR(255) NOT NULL,
    roleID INT NOT NULL,
    employeeEmail VARCHAR(50),
    PRIMARY	KEY (employeeID),
    FOREIGN KEY(roleID) REFERENCES role(roleID)
);


CREATE TABLE role (
    roleID INT NOT NULL AUTO-INCREMENT,
    roleName VARCHAR(50) NULL,
    PRIMARY KEY(roleID),
);
);

Skapa en databas som heter bookstoreDB och lägg till dessa tables var för sig i den.