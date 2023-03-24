CREATE DATABASE IF NOT EXISTS myblog;
USE myblog;

CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(150) NOT NULL,
    email VARCHAR(250) NOT NULL,
    password VARCHAR(250) NOT NULL,
    isAdmin BOOLEAN NOT NULL DEFAULT(0)
);

CREATE TABLE IF NOT EXISTS posts(
    id INT PRIMARY KEY NOT NULL,
    title VARCHAR(250) NOT NULL,
    chapô VARCHAR(500) NOT NULL,
    content TEXT NOT NULL,
    author INT NOT NULL,
    FOREIGN KEY (author) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS comments(
    id INT PRIMARY KEY NOT NULL,
    content TEXT NOT NULL,
    post_id INT NOT NULL,
    author INT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (author) REFERENCES users(id)
);

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `isAdmin`) VALUES
(1, `Lisa`, `VINCENT`, `lisa.vincent31150@gmail.com`, `lisaVINCENT1234`, 1);