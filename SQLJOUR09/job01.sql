-- Création de la base de données
CREATE DATABASE IF NOT EXISTS jour9;
USE jour9;

-- Table etudiants
CREATE TABLE IF NOT EXISTS etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    naissance DATE,
    sexe VARCHAR(25),
    email VARCHAR(255)
);

-- Table etage
CREATE TABLE IF NOT EXISTS etage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    numero INT,
    superficie INT
);

-- Table salles
CREATE TABLE IF NOT EXISTS salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    id_etage INT,
    capacite INT,
    FOREIGN KEY (id_etage) REFERENCES etage(id)
);
