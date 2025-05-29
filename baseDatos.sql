CREATE DATABASE asianFood;
USE asianFood;

    CREATE TABLE banners (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    imagenUrl VARCHAR(1000) NOT NULL
    );



CREATE TABLE chefs (
id INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(255) NOT NULL,
descripcion VARCHAR(255) NOT NULL, 
imagenUrl VARCHAR(1000) NOT NULL   
);

CREATE TABLE menu (
id INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(255) NOT NULL
);


CREATE TABLE plato (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio VARCHAR(255) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    menu_id INT NOT NULL,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);

CREATE TABLE testimonios (
id INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(255) NOT NULL,
opinion VARCHAR(255) NOT NULL
);



CREATE TABLE usuario (
id INT PRIMARY KEY AUTO_INCREMENT,
nombreUsuario VARCHAR(255) NOT NULL,
passwordUsuario VARCHAR(255) NOT NULL,
correo VARCHAR(255) NOT NULL
);


CREATE TABLE sugerencias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    mensaje VARCHAR(1000) NOT NULL
);



INSERT INTO usuario (nombreUsuario, passwordUsuario, correo) 
VALUES 
('laura', '1234', 'laura@gmail.com'),
('yesid', '1234', 'yesid@gmail.com');


INSERT INTO menu (nombre) VALUES ('Entradas');
INSERT INTO menu (nombre) VALUES ('Platos fuertes');
INSERT INTO menu (nombre) VALUES ('Postres');
INSERT INTO menu (nombre) VALUES ('Bebidas');


 