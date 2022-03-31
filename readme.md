
# 5HDS - API

API pour le 5HDS sur la gestion d'utilisateurs et de produits


## Fonctionnalités

- Ajouter / Modifier / Supprimer / Lister un ou des utilisateurs
- Ajouter / Modifier / Supprimer / Lister un ou des produits
- Gestion des erreurs en fonction du type d'appel (GET / POST / PUT / DELETE)
- Gestion des erreurs si problème de paramètres


## Installation

Pour éxécuter le projet il faut un serveur web (Comme apache2) et un SGBDR (Comme MariaDB)

Il faut créer une base de donnée appelé : `api_5HDS_gestion_stock`, puis exécuter le code SQL suivant :

```sql
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
```
## Variables à redéfinir

Pour exécuter ce projet, vous devrez redéfinir les variables de la BDD dans le fichier BDD.php

`server` IP de la BDD

`username` Nom d'utilisateur de la BDD

`password` Mot de passe de la BDD


## API Référence

Les paramètres sont à passer dans le header lors de l'appel HTTP

#### Utilisateurs

```http
  POST /user/ajouter.php
```

| Paramètre | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Utilisateur` | `Utilisateur` | **Required**. L'utilisateur à ajouter |

```http
  PUT /user/modifier.php
```

| Paramètre | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Utilisateur` | `UtilisateurUpdate` | **Required**. L'utilisateur à modifier |

```http
  DELETE /user/supprimer.php
```

| Paramètre | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `idUser` | `int` | **Required**. L'id utilisateur à supprimer |

```http
  GET /user/afficher.php
```
**Affiche les utilisateurs**

#### Produits

```http
  POST /produit/ajouter.php
```

| Paramètre | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Produit` | `Produit` | **Required**. Le produit à ajouter |

```http
  PUT /produit/modifier.php
```

| Paramètre | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Produit` | `ProduitUpdate` | **Required**. Le produit à modifier |

```http
  DELETE /produit/supprimer.php
```

| Paramètre | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `idProduit` | `int` | **Required**. L'id du produit à supprimer |

```http
  GET /produit/afficher.php
```
**Affiche les utilisateurs**

### Objets JSON

```json
Utilisateur
    - nom: "...",
    - prenom: "...",
    - role: "..."

Produit
    - nom: "...",
    - description: "...",
    - prix: 0,
    - stock: 0,
    - reference: "..."

UtilisateurUpdate
    - nom: "...",
    - prenom: "...",
    - role: "..."
    - id: 0

ProduitUpdate
    - nom: "...",
    - description: "...",
    - prix: 0,
    - stock: 0,
    - reference: "..."
    - id: 0

```



## Authors

- [@Adrien-Fr](https://github.com/Adrien-Fr)

