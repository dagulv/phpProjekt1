CREATE DATABASE bookstoreDB

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
CREATE TABLE category
CREATE TABLE customer
CREATE TABLE employee
CREATE TABLE role