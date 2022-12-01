
CREATE DATABASE db_tutorias CHARACTER SET utf8mb4;
Use db_tutorias;

/*-----------------------TABLA TRIGGER  LOGEO------------------------------*/
CREATE TABLE `historial_logeo` (
    `cod_logueo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Accion` VARCHAR(900) NULL,
    `correo` VARCHAR(900) NULL,
    PRIMARY KEY (`cod_logueo`));
/*--------------------------------TABLA ROLES-------------------------*/
CREATE TABLE `rol_usuario` (
	`cod_rol` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom_rol` VARCHAR(45) NULL,
	PRIMARY KEY (`cod_rol`));
    
    INSERT INTO rol_usuario VALUES(1, 'Administrador');
    INSERT INTO rol_usuario VALUES(2, 'Asesor');
    INSERT INTO rol_usuario VALUES(3, 'Tutor');
    INSERT INTO rol_usuario VALUES(4, 'Alumno');
    
/*--------------------------------TABLA USUARIO-------------------------*/
CREATE TABLE `usuario` (
    `cod_usuario` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fk_rol_usuario` INT UNSIGNED NOT NULL,
    `nombre_usuario` VARCHAR(45) NULL,
    `ape_paterno` VARCHAR(45) NULL,
    `ape_materno` VARCHAR(45) NULL,
    `correo_usuario` VARCHAR(100) NULL,
    `contra_usuario` VARCHAR(200) NULL,
    `matricula` VARCHAR(100) NULL,
    FOREIGN KEY (fk_rol_usuario) REFERENCES rol_usuario(cod_rol));
    
/*--------------------------------TABLA TIPOS DE SERVICIO-------------------------*/
CREATE TABLE `tipo_servicio` (
	`cod_servicio` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fk_cod_tutor` INT UNSIGNED NOT NULL,
	`img` VARCHAR(100) NULL,
	`nom_servicio` VARCHAR(45) NULL,
	`tipo_servicio` VARCHAR(45) NULL,
    `descripcion` VARCHAR(400) NOT NULL,
	FOREIGN KEY (fk_cod_tutor) REFERENCES usuario(cod_usuario));

    /*--------------------------------ORDEN DE EVENTO-------------------------*/
CREATE TABLE `tutoria` (
    `cod_tutoria` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fk_cod_alumno` INT UNSIGNED NOT NULL,
    `fk_cod_servicio` INT UNSIGNED NOT NULL,
    `fecha` VARCHAR(20) NULL,
    `hora_evento` VARCHAR(10) NULL,
	FOREIGN KEY (fk_cod_servicio) REFERENCES tipo_servicio(cod_servicio),
	FOREIGN KEY (fk_cod_alumno) REFERENCES usuario(cod_usuario));

CREATE TABLE `recuperacion` (
    `id_recup` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `preg_seguridad` VARCHAR(100) NOT NULL,
    `resp_seguridad` VARCHAR(100) NOT NULL,
    `fk_cod_usuario` INT UNSIGNED NOT NULL,
	FOREIGN KEY (fk_cod_usuario) REFERENCES usuario(cod_usuario));

