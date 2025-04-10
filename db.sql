CREATE DATABASE IF NOT EXISTS d_php3_migonzv;

USE d_php3_migonzv;

CREATE TABLE IF NOT EXISTS usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(30),
  password VARCHAR(32),
  nombre VARCHAR(30),
  apellido VARCHAR(30),
  cedula INT,
  tipo VARCHAR(30),
  PRIMARY KEY(id_usuario)
);

CREATE TABLE IF NOT EXISTS compra (
  id_compra INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  fecha DATE,
  total FLOAT,
  PRIMARY KEY(id_compra),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE IF NOT EXISTS producto (
  id_producto INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(30),
  precio FLOAT,
  cantidad INT NOT NULL,
  descripcion VARCHAR(100),
  imagen LONGBLOB,
  PRIMARY KEY(id_producto)
);

CREATE TABLE IF NOT EXISTS carrito (
  id_carrito INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  id_producto INT NOT NULL,
  cantidad INT NOT NULL,
  fecha DATE,
  PRIMARY KEY(id_carrito),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario),
  FOREIGN KEY(id_producto) REFERENCES producto(id_producto)
);

INSERT INTO usuario (email, password, nombre, apellido, cedula, tipo)
VALUES ('jose@gmail.com', md5('123'), 'jose', 'perez', '321', 'Administrador'),
('carlos@gmail.com', md5('456'), 'carlos', 'jimenez', '654', 'usuario'),
('maria@gmail.com', md5('789'), 'maria', 'herrera', '987', 'usuario');