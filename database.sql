DROP DATABASE IF EXISTS `vanibao`;

CREATE DATABASE IF NOT EXISTS vanibao DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vanibao`;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS vb_news;
DROP TABLE IF EXISTS vb_browse_log;
DROP TABLE IF EXISTS vb_order_book;
DROP TABLE IF EXISTS vb_orders;
DROP TABLE IF EXISTS vb_address;
DROP TABLE IF EXISTS vb_shoppingcart;
DROP TABLE IF EXISTS vb_users;
DROP TABLE IF EXISTS vb_books;
DROP TABLE IF EXISTS vb_auther;
DROP TABLE IF EXISTS vb_category;
DROP TABLE IF EXISTS vb_publisher;



CREATE TABLE vb_users (
    user_id INT(9) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(30),
    password VARCHAR(30),
    email VARCHAR(30),
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    address VARCHAR(90),
    head_img VARCHAR(60));

INSERT INTO vb_users VALUES
    (1, "admin", "admin", "admin@vanibao.com", "fname", "lmae", "1234 College St Montreal", "000.png");

INSERT INTO vb_users VALUES
    (2, "user", "user", "user@mail.com", "fname", "lmae", "2222 College St Montreal", "001.jpeg");

INSERT INTO vb_users VALUES
    (3, "user1", "user", "user1@mail.com", "fname", "lmae", "3333 College St Montreal", "002.jpeg");

INSERT INTO vb_users VALUES
    (4, "user2", "user", "user2@mail.com", "fname", "lmae", "4444 College St Montreal", "003.jpeg");

CREATE TABLE vb_category (
    id INT(9) PRIMARY KEY AUTO_INCREMENT,
    class INT(9),
    base_id INT(9),
    category VARCHAR(30));

INSERT INTO vb_category VALUES (1, 1, 0, "Computer");
INSERT INTO vb_category VALUES (2, 1, 0, "Mathematic");
INSERT INTO vb_category VALUES (3, 1, 0, "Medicine");
INSERT INTO vb_category VALUES (4, 1, 0, "Accounting");
INSERT INTO vb_category VALUES (5, 2, 1, "Data Structure");
INSERT INTO vb_category VALUES (6, 2, 1, "Operating System");
INSERT INTO vb_category VALUES (7, 2, 1, "Database");
INSERT INTO vb_category VALUES (8, 2, 2, "Pure Mathematics");
INSERT INTO vb_category VALUES (9, 2, 2, "Computational Mathematics");
INSERT INTO vb_category VALUES (10, 2, 2, "Probability and Statistics");
INSERT INTO vb_category VALUES (11, 2, 2, "Applied Mathematics");
INSERT INTO vb_category VALUES (12, 2, 2, "Operations Research");


CREATE TABLE vb_auther (
    id INT(9) PRIMARY KEY AUTO_INCREMENT,
    auther VARCHAR(60),
    detail VARCHAR(200));

INSERT INTO vb_auther VALUES (1, "Donald Knuth", "Donald Ervin Knuth is an American computer scientist, mathematician, and professor emeritus at Stanford University. He is the 1974 recipient of the ACM");

INSERT INTO vb_auther VALUES (2, "Alan Turing", "Alan Mathison Turing OBE FRS was an English mathematician, computer scientist, logician, cryptanalyst, philosopher, and theoretical biologist.");

INSERT INTO vb_auther VALUES (3, "Joan Clarke", "Joan Elisabeth Lowther Murray, MBE was an English cryptanalyst and numismatist best known for her work as a code-breaker at Bletchley Park");



CREATE TABLE vb_publisher (
    id INT(9) PRIMARY KEY AUTO_INCREMENT,
    publisher VARCHAR(60));

INSERT INTO vb_publisher VALUES (1, "Milestone Memories Press");
INSERT INTO vb_publisher VALUES (2, "Simon & Schuster Ltd");
INSERT INTO vb_publisher VALUES (3, "Surrey Books");


CREATE TABLE vb_books (
    book_id INT(9) PRIMARY KEY AUTO_INCREMENT,
    book_name VARCHAR(60),
    category1_id INT(9),
    category2_id INT(9),
    keywords VARCHAR(100),
    auther_id INT(9),
    publisher_id INT(9),
    language VARCHAR(30),
    edtion VARCHAR(30),
    isbn VARCHAR(30),
    book_price DOUBLE(9,2),
    book_summary VARCHAR(500),
    book_descrip VARCHAR(900),
    book_img1 VARCHAR(60),
    book_img2 VARCHAR(60),
    book_img3 VARCHAR(60),
    book_img4 VARCHAR(60),
    FOREIGN KEY (category1_id) REFERENCES vb_category(id),
    FOREIGN KEY (category2_id) REFERENCES vb_category(id),
    FOREIGN KEY (auther_id) REFERENCES vb_auther(id),
    FOREIGN KEY (publisher_id) REFERENCES vb_publisher(id));

INSERT INTO vb_books VALUES (1, "Data Structures IV Edition", 1, 5, "Computer", 1, 1, "English", "IV", "1912883619", 13.99, "data structure", "A data structure is a particular way of organizing data in a computer so that it can be used effectively. For example, we can store a list of items having the same data-type using the array data structure.", "computer_01.jpg", "computer_02.jpg", "computer_03.jpg", "computer_04.jpg");

INSERT INTO vb_books VALUES (2, "Coding Interview", 1, 6, "Computer", 1, 1, "English", "IV", "1912883619", 13.99, "data structure", "A data structure is a particular way of organizing data in a computer so that it can be used effectively. For example, we can store a list of items having the same data-type using the array data structure.", "computer_11.jpg", "computer_12.jpg", "computer_13.jpg", "computer_14.jpg");

INSERT INTO vb_books VALUES (3, "Python Algorithm", 1, 5, "Computer", 1, 1, "English", "IV", "1912883619", 13.99, "data structure", "A data structure is a particular way of organizing data in a computer so that it can be used effectively. For example, we can store a list of items having the same data-type using the array data structure.", "computer_21.jpg", "computer_22.jpg", "computer_23.jpg", "computer_24.jpg");

INSERT INTO vb_books VALUES (4, "Python Interview", 1, 7, "Computer", 1, 1, "English", "IV", "1912883619", 13.99, "data structure", "A data structure is a particular way of organizing data in a computer so that it can be used effectively. For example, we can store a list of items having the same data-type using the array data structure.", "computer_31.jpg", "computer_32.jpg", "computer_33.jpg", "computer_34.jpg");

INSERT INTO vb_books VALUES (5, "Mathematics for Machine Learning", 2, 11, "Computer", 1, 1, "English", "IV", "1912883619", 13.99, "data structure", "A data structure is a particular way of organizing data in a computer so that it can be used effectively. For example, we can store a list of items having the same data-type using the array data structure.", "math_01.jpg", "math_02.jpg", "math_03.jpg", "math_04.jpg");


CREATE TABLE vb_orders (
    order_id INT(9) PRIMARY KEY AUTO_INCREMENT,
    order_num VARCHAR(30),
    user_id INT(9),
    order_status VARCHAR(10),
    create_date DATETIME,
    payment_date DATETIME,
    ship_date DATETIME,
    order_tax DOUBLE(9,2),
    order_price DOUBLE(9,2),
    books_count INT(3),
    address_id INT(9),
    ship_fee DOUBLE(9,2),
    paidoff BOOLEAN,
    shipped BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES vb_users(user_id),
    FOREIGN KEY (address_id) REFERENCES vb_address(address_id));

CREATE TABLE vb_order_book (
    id INT(9) PRIMARY KEY AUTO_INCREMENT,
    order_id INT(9),
    book_id INT(9),
    book_name VARCHAR(60),
    book_price DOUBLE(9,2),
    book_count INT(3),
    FOREIGN KEY (order_id) REFERENCES vb_orders(order_id),
    FOREIGN KEY (book_id) REFERENCES vb_books(book_id));

CREATE TABLE vb_shoppingcart (
    id INT(9) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(9),
    book_id INT(9),
    book_count INT(3),
    book_price DOUBLE(9,2),
    instock BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES vb_users(user_id),
    FOREIGN KEY (book_id) REFERENCES vb_books(book_id));

INSERT INTO vb_shoppingcart VALUES (1, 1, 1, 2, 13.00, true);
INSERT INTO vb_shoppingcart VALUES (2, 1, 2, 3, 13.99, true);
INSERT INTO vb_shoppingcart VALUES (3, 1, 3, 1, 5.99, true);

CREATE TABLE vb_browse_log (
    id INT(9) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(9),
    browse_date DATETIME,
    book_id INT(9),
    book_name VARCHAR(60),
    FOREIGN KEY (user_id) REFERENCES vb_users(user_id),
    FOREIGN KEY (book_id) REFERENCES vb_books(book_id));


CREATE TABLE vb_news (
    news_id INT(9) PRIMARY KEY AUTO_INCREMENT,
    news_title VARCHAR(200),
    publish_date  DATETIME,
    auther VARCHAR(80),
    news_content VARCHAR(200));

