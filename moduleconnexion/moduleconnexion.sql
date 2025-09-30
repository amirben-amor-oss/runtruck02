CREATE DATABASE IF NOT EXISTS moduleconnexion;
USE moduleconnexion;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    password VARCHAR(255) NOT NULL
);

INSERT INTO utilisateurs (login, prenom, nom, password)
VALUES ('admin', 'admin', 'admin', '$2y$10$D9JZ3bW1pMdkMEK/aX29EeUw.K5nhBdwf5L5rJ6n5NvNGpbptuW6C');
