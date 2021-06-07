-- *********** Facultad de Contaduria y Administracion ***********
-- 					Diplomado de BASES DE DATOS
-- 		Scripts de Lalos Burger				Junio, 2021.
-- ***************************************************************


CREATE DATABASE lalos_burger;

USE lalos_burger;

CREATE TABLE cliente(
    NoCliente INT(11) AUTO_INCREMENT,
    cliente_nombre VARCHAR(100) NOT NULL,
    cliente_apaterno VARCHAR(100) NOT NULL,
    cliente_amaterno VARCHAR(100),
    cliente_direccion VARCHAR(200),
    cliente_correo VARCHAR(100) NOT NULL,
    cliente_contrasenia VARCHAR(255),
    cliente_telefono INT(15) NOT NULL,
    cliente_fechaNac DATE NOT NULL,
    PRIMARY KEY(NoCliente)
    );

CREATE TABLE menu(
    codigo INT(11) AUTO_INCREMENT,
    menu_nombre VARCHAR(100) NOT NULL,
    menu_precio DECIMAL(8,2) NOT NULL,
    menu_tipo VARCHAR(100) NOT NULL,
    menu_descripcion VARCHAR(100) NOT NULL,
    menu_imagen VARCHAR(255),
    PRIMARY KEY(codigo)
    );

CREATE TABLE pedidoDetalle(
    NoPedido INT(11) AUTO_INCREMENT,
    pedido_fecha DATE NOT NULL,
    cliente INT(11) NOT NULL,
    codigo INT (11) NOT NULL,
    cantidad INT (11) NOT NULL,
    precioTotal FLOAT NOT NULL,
    PRIMARY KEY (NoPedido),
    FOREIGN KEY (cliente) REFERENCES cliente(NoCliente),
    FOREIGN KEY (codigo) REFERENCES menu(codigo)
);
--Carlos
CREATE TABLE contacto(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	asunto VARCHAR(100) NOT NULL,
	mensaje TEXT NOT NULL
);
