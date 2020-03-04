CREATE DATABASE library OWNER postgres;
CREATE SCHEMA library;

CREATE TABLE book(
  id SERIAL NOT NULL PRIMARY KEY,
  isbn CHAR(13) NOT NULL UNIQUE,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  stock SMALLINT NOT NULL DEFAULT 0,
  price FLOAT,
  img_uri VARCHAR(255) DEFAULT NULL
);

CREATE INDEX book_title ON book(title);

INSERT INTO book (isbn, title, author, stock, price, img_uri)
	VALUES ('9780882339726', '1984', 'George Orwell', 12, 7.50, 'img/1984.jpg'),
	('9789724621081', '1Q84', 'Haruki Murakami', 9, 9.75, 'img/1Q84.jpg'),
	('9780736692427', 'Animal Farm', 'George Orwell', 8, 3.50, 'img/Animal Farm.jpg'),
	('9780307350169', 'Dracula', 'Bram Stoker', 30, 10.15, 'img/Dracula.jpg'),
	('9780753179246', 'Nineteen Minutes', 'Jodi Picoult', 0, 10, 'img/Nineteen Minutes.jpg'),
  ('9789505472062','The Lord of the Rings: The Two Towers', 'J.R.R. Tolkien', 0, 4, 'img/The Lord of the Rings The Two Towers.jpg'),
  ('9781416500360', 'The Odyssey', 'Homer', 0, 4.23, 'img/The Odyssey.jpg'),
  ('9788187981954', 'Peter Pan', 'J. M. Barrie', 0, 2.34, 'img/Peter Pan.jpg'),
  ('9781412108614', 'The Iliad', 'Homer', 0, 9.25, 'img/The Iliad.jpg');
