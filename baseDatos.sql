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

INSERT INTO plato (nombre, precio, menu_id, foto) VALUES
('Sushi', '35000', 2, 'https://www.oliveradatenea.com/wp-content/uploads/2023/06/Sushi-rolls-de-salmon-y-Olivada-Olivera-dAtenea.jpg
'),
('Ramen', '40000', 2, 'https://www.hola.com/horizon/landscape/2f899a0850e1-ramen-adobe-t.jpg
'),
('Té verde', '15000', 4, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7BpWiiRIQAxGlFTiHvUSO7ctizHgJDeyU5A&s
'),
('Fanta', '5500', 4, 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgHNZRkQ3NxRta9B_GWp3paE_47NP7pawjp6YbOQQ26NYBzoBmUPEadoG2MCEQSmZCUrWznPosisFLNE3swVH2axRRRUc2EdpohcnTTKDIvf7ts8lRqm_B1BCtovxiohODyF6eMYBRDRTo6/s1600/Fanta+Japonesa+-+Degustaci%25C3%25B3n.jpg
'),
('Mochi', '12500', 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI926y-L6M9sGb7rewJoqOUm8-La3ZtvKlSg&s
'),
('Tempura', '35000', 2, 'https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480_1_5x/img/recipe/ras/Assets/E3AF6E67-0180-4A0A-8E8F-FF8CF8C97939/Derivates/759c5ff9-a816-41f1-8ae5-dd05dd304856.jpg
'),
('Ensalada chirashi', '27000', 1, 'https://es-mycooktouch.group-taurus.com/image/recipe/545x395/ensalada-de-sushi?rev=1748634221610
'),
('Pollo karaage', '26000', 1, 'https://sal-pimienta.com/wp-content/uploads/2020/10/Thumbnail_September-2020.jpg
'),
('Tayakis', '14000', 3, 'https://eaqxr36k8gu.exactdn.com/wp-content/uploads/2022/02/postres-tipicos-Japon-tayakis.jpg?lossy=0&ssl=1
');


