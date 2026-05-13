CREATE DATABASE todo_app;

USE todo_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username) VALUES 
('user1'),
('user2'),
('user3');

INSERT INTO tasks (title, user_id) VALUES 
('Task 1', 1),
('Task 2', 1),
('Task 3', 2),
