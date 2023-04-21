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
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(250) NOT NULL,
    chapo VARCHAR(500) NOT NULL,
    content TEXT NOT NULL,
    author INT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (author) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS tags(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    badge VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS post_tag(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    post_id INT NOT NULL,
    tag_id INT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

CREATE TABLE IF NOT EXISTS comments(
    id INT PRIMARY KEY NOT NULL,
    content TEXT NOT NULL,
    post_id INT NOT NULL,
    author INT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (author) REFERENCES users(id)
);

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `isAdmin`) VALUES 
('1', 'Lisa', 'VINCENT', 'lisa.vincent31150@gmail.com', 'lisaVINCENT1234', '1');

INSERT INTO `tags` (`id`, `name`, `badge`, `created_at`, `updated_at`) VALUES 
('1', 'HTML', 'success', '23-04-10 08:01:00', '23-04-10 08:01:00'),
('2', 'CSS', 'primary', '23-04-10 08:31:00', '23-04-10 08:31:00'),
('3', 'JavaScript', 'warning', '23-04-10 09:01:00', '23-04-10 09:01:00'),
('4', 'Angular', 'danger', '23-04-10 09:31:00', '23-04-10 09:31:00'),
('5', 'PHP', 'secondary', '23-04-10 10:01:00', '23-04-10 10:01:00'),
('6', 'Python', 'dark', '23-04-10 10:31:00', '23-04-10 10:31:00');

INSERT INTO `posts` (`id`, `title`, `chapo`, `content`, `author`, `created_at`, `updated_at`) VALUES
('1', 'Mon premier article', 'Venez découvrir mon premier article qui parlera de HTML', 'Vous apprendrez dans cet article comment il est facile de se lancer dans le développement web', '1', '23-04-11 08:01:00', '23-04-11 08:01:23'),
('2', 'Mon second article', 'Venez découvrir mon second article qui parlera de CSS', 'Vous apprendrez dans cet article comment il est facile de mettre en forme une page HTML', '1', '23-04-11 08:31:23', '23-04-11 08:31:23');

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES 
('1', '1', '1', '23-04-11 08:01:00', '23-04-10 08:01:00'),
('2', '2', '2', '23-04-11 08:31:00', '23-04-1 08:31:00');
