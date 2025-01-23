CREATE DATABASE Youdemy;
USE Youdemy;

CREATE TABLE Roles (
    idRole INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(55) NOT NULL
);

CREATE TABLE users (
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active', 'suspended') DEFAULT 'active',
    status_enseignant ENUM('en_attente', 'accepter', 'refuser') DEFAULT 'en_attente',
    idRole INT NOT NULL,
    FOREIGN KEY (idRole) REFERENCES Roles(idRole) ON DELETE CASCADE
);


-- Table des catégories
CREATE TABLE categories (
    idCategory INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    imageCategy text
);

-- Table des cours
CREATE TABLE cours (
    idCours INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    contenu TEXT,
    type ENUM('text','video') not null,
    categorie_id INT,
    enseignant_id INT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (enseignant_id) REFERENCES users(idUser) ON DELETE CASCADE,
    FOREIGN KEY (categorie_id) REFERENCES categories(idCategory) ON DELETE CASCADE
);

-- Table des tags
CREATE TABLE tags (
    idTag INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL UNIQUE
);

-- Table cours_tags 
CREATE TABLE cours_tags (
    cours_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (cours_id, tag_id),
    FOREIGN KEY (cours_id) REFERENCES cours(idCours) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(idTag) ON DELETE CASCADE
);

-- Table des inscriptions 
CREATE TABLE inscriptions (
    idInscription INT AUTO_INCREMENT PRIMARY KEY,
    cours_id INT NOT NULL,
    etudiant_id INT NOT NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cours_id) REFERENCES cours(idCours) ON DELETE CASCADE,
    FOREIGN KEY (etudiant_id) REFERENCES users(idUser) ON DELETE CASCADE
);