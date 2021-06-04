CREATE DATABASE lalos_buguer;

USE lalos_buguer;

CREATE TABLE cliente(
    NoCliente INT(11) AUTO_INCREMENT,
    cliente_nombre VARCHAR(100) NOT NULL,
    cliente_apaterno VARCHAR(100) NOT NULL,
    cliente_amaterno VARCHAR(100),
    cliente_direccion VARCHAR(200),
    cliente_correo VARCHAR(100) NOT NULL,
    cliente_contrasenia VARCHAR(100),
    cliente_telefono INT(10) NOT NULL,
    cliente_fechaNac DATE NOT NULL,
    PRIMARY KEY(NoCliente)
    );

CREATE TABLE menu(
    codigo INT(11) AUTO_INCREMENT,
    menu_nombre VARCHAR(100) NOT NULL,
    menu_precio DECIMAL(5,2) NOT NULL,
    menu_tipo VARCHAR(100) NOT NULL,
    menu_descripcion VARCHAR(100) NOT NULL,
    PRIMARY KEY(codigo)
    );