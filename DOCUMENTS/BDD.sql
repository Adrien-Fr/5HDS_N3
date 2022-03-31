CREATE TABLE IF NOT EXISTS Utilisateur(
    id INTEGER PRIMARY KEY auto_increment,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    roleUser VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    update_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS Produit(
    id INTEGER PRIMARY KEY auto_increment,
    nom VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    prix DECIMAL(3,1) NOT NULL,
    stock INT NOT NULL,
    reference VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    update_at DATETIME NOT NULL
);