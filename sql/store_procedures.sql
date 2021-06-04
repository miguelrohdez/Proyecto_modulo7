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
	DECLARE @contra_cifrada BINARY(255);
    DECLARE @VECTOR VARCHAR(255);
    --Cifrar la contraseña antes de guardarla en la base de datos
    SET @VECTOR = SUBSTRING(HEX(@correo),1,50);
    SET @contra_cifrada = AES_ENCRYPT(@contrasenia,@VECTOR);
    --SELECT AES_DECRYPT(@pss_enc, @VECTOR);

    --InsertandoDatos
	INSERT INTO cliente(cliente_nombre,cliente_apaterno,cliente_amaterno,
                cliente_direccion,cliente_correo,cliente_contrasenia,
                cliente_telefono, cliente_fechaNac) 
        VALUES (@nombre, @aPaterno, @aMaterno, @direccion, @telefono, @correo,@contraseña, @fechaNac);
;

