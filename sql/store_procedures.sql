-- *********** Facultad de Contaduria y Administracion ***********
-- 					Diplomado de BASES DE DATOS
-- 		Scripts de Lalos Burger				Junio, 2021.
-- ***************************************************************

--Procedimiento para ingresar a un nuevo cliente
CREATE PROCEDURE SP_AltaCliente
	@nombre VARCHAR(100),
	@aPaterno VARCHAR(100),
	@aMaterno VARCHAR(100),
	@direccion VARCHAR(200),
	@telefono VARCHAR(15),
	@correo VARCHAR(100),
    @contrasenia VARCHAR(128),
	@fechaNac DATE
AS
	--Variables locales
	--DECLARE @contra_cifrada BINARY(255);
    --DECLARE @VECTOR VARCHAR(255);
    --Cifrar la contraseña antes de guardarla en la base de datos
    --SET @VECTOR = SUBSTRING(HEX(@correo),1,50);
    --SET @contra_cifrada = AES_ENCRYPT(@contrasenia,@VECTOR);
    --SELECT AES_DECRYPT(@pss_enc, @VECTOR);

    --InsertandoDatos
	INSERT INTO cliente(cliente_nombre,cliente_apaterno,cliente_amaterno,
                cliente_direccion,cliente_correo,cliente_contrasenia,
                cliente_telefono, cliente_fechaNac) 
        VALUES (@nombre, @aPaterno, @aMaterno, @direccion, @telefono, @correo,@contraseña, @fechaNac);
;

    SET @VECTOR = SUBSTRING(HEX(@correo),1,50);
    SELECT AES_ENCRYPT(@contrasenia,@VECTOR);

--Actualizar los datos del usuario
CREATE PROCEDURE SP_ActualizarCliente(
	in sp_NoCliente int(11),
	in sp_nombre VARCHAR(100),
	in sp_aPaterno VARCHAR(100),
	in sp_aMaterno VARCHAR(100),
	in sp_direccion VARCHAR(200),
    	in sp_correo VARCHAR(100),
    	in sp_contrasenia VARCHAR(255),
	in sp_telefono VARCHAR(15),
	in sp_fechaNac DATE)
update cliente
	set
    	cliente_nombre = sp_nombre,
    	cliente_apaterno = sp_aPaterno,
    	cliente_amaterno = sp_aMaterno,
    	cliente_direccion = sp_direccion,
    	cliente_correo = sp_correo,
   	cliente_contrasenia = sp_contrasenia,
    	cliente_telefono = sp_telefono,
    	cliente_fechaNac = sp_fechaNac
	where NoCliente = sp_NoCliente
;

CREATE PROCEDURE SP_BorrarCliente(in sp_correo VARCHAR(100))
    delete from cliente where cliente_correo = sp_correo;

--Hice este compa por si el que esta arriba no te funciona por que a mi no me jalaba jajaja
/*
CREATE PROCEDURE SP_AltaCliente(
	in sp_nombre VARCHAR(100),
	in sp_aPaterno VARCHAR(100),
	in sp_aMaterno VARCHAR(100),
	in sp_direccion VARCHAR(200),
    in sp_correo VARCHAR(100),
    in sp_contrasenia VARCHAR(255),
	in sp_telefono VARCHAR(15),
	in sp_fechaNac DATE)
INSERT INTO cliente(cliente_nombre,cliente_apaterno,cliente_amaterno,
                cliente_direccion,cliente_correo,cliente_contrasenia,
                cliente_telefono, cliente_fechaNac) 
	VALUES (sp_nombre, sp_aPaterno, sp_aMaterno, sp_direccion,sp_correo,sp_contrasenia, sp_telefono, sp_fechaNac);
;
*/
