CREATE TABLE test(
    id INT(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id)
);

CREATE TABLE users(
    id INT(11) NOT NULL AUTO_INCREMENT,
    email varchar(100) NOT NULL,
    username varchar(30) NOT NULL,
    name varchar(30) NOT NULL,
    pwd varchar(255) NOT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    verified BOOLEAN DEFAULT FALSE NOT NULL,

    PRIMARY KEY(id)
);

CREATE TABLE about(
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    links TEXT NOT NULL,
    about_text TEXT NOT NULL,
    birthday DATE,

    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE

);

CREATE TABLE follows(
    id INT(11) NOT NULL AUTO_INCREMENT,

    user_who_follow INT(11) NOT NULL,
    user_who_is_followed INT(11) NOT NULL,

    UNIQUE(user_who_follow, user_who_is_followed),

    PRIMARY KEY(id),
    FOREIGN KEY(user_who_follow) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY(user_who_is_followed) REFERENCES users(id) ON DELETE CASCADE

);

CREATE TABLE posts(
    id INT(11) NOT NULL AUTO_INCREMENT,

    post_text TEXT NOT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    author INT(11) NOT NULL,
    reposted_from INT(11) DEFAULT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(author) REFERENCES users(id) ON DELETE CASCADE

);

CREATE TABLE likes(
    id INT(11) NOT NULL AUTO_INCREMENT,

    user INT(11) NOT NULL,
    post_id INT(11) NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY(post_id) REFERENCES posts(id) ON DELETE CASCADE

);

CREATE TABLE reposts(
    id INT(11) NOT NULL AUTO_INCREMENT,

    user INT(11) NOT NULL,
    post_id INT(11) NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY(post_id) REFERENCES posts(id) ON DELETE CASCADE

);

CREATE TABLE stars(
    id INT(11) NOT NULL AUTO_INCREMENT,

    user INT(11) NOT NULL,
    post_id INT(11) NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY(post_id) REFERENCES posts(id) ON DELETE CASCADE

);

CREATE TABLE hashtag(
    id INT(11) NOT NULL AUTO_INCREMENT,

    hashtag varchar(30) NOT NULL,
    post_id INT(11) NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(post_id) REFERENCES posts(id) ON DELETE CASCADE

);

CREATE TABLE comments(
    id INT(11) NOT NULL AUTO_INCREMENT,

    comments_text TEXT NOT NULL,
    post INT(11) NOT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    author INT(11) NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(post) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY(author) REFERENCES users(id) ON DELETE CASCADE

);

CREATE TABLE sitting(
    id INT(11) NOT NULL AUTO_INCREMENT,
    user INT(11) NOT NULL,
    lang varchar(30) NOT NULL,
    theme varchar(30) NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user) REFERENCES users(id) ON DELETE CASCADE

);

CREATE TABLE notification(
    id INT(11) NOT NULL AUTO_INCREMENT,
    user INT(11) NOT NULL,
    post INT(11) NOT NULL,
    notification_text TEXT NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY(post) REFERENCES posts(id) ON DELETE CASCADE

);



-- ============================================================================



INSERT INTO users (email, username, name, pwd, verified) VALUES('A@gmail.com', 'A', 'mr. A', '123', false);