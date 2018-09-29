
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(50),
    `usuario` VARCHAR(32) NOT NULL,
    `clave` VARCHAR(60),
    `correo` VARCHAR(255),
    `estado` VARCHAR(32),
    `imagen` VARCHAR(255),
    `administrador` TINYINT(1) DEFAULT 0,
    `validado` TINYINT(1) DEFAULT 1,
    `ultimo_ingreso` DATE,
    `tema` VARCHAR(255),
    `frase` VARCHAR(255),
    `genero` VARCHAR(30),
    `fecha_nacimiento` DATE,
    `nombre_completo` VARCHAR(320),
    `empresa` VARCHAR(320),
    `logo` VARCHAR(200),
    `activo` TINYINT(1) DEFAULT 1,
    `tipo_usuario` VARCHAR(320),
    `observaciones` TEXT,
    `primer_nombre` VARCHAR(200),
    `segundo_nombre` VARCHAR(200),
    `primer_apellido` VARCHAR(200),
    `segundo_apellido` VARCHAR(200),
    `puesto` VARCHAR(200),
    `departamento` VARCHAR(300),
    `jefe` VARCHAR(300),
    `fecha_alta` DATE,
    `sueldo` DOUBLE,
    `usuario_jefe` INTEGER,
    `token` VARCHAR(150),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `llave` (`usuario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- perfil
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(100) DEFAULT '',
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- menu_seguridad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `menu_seguridad`;

CREATE TABLE `menu_seguridad`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(100) DEFAULT '',
    `credencial` VARCHAR(100),
    `modulo` VARCHAR(100),
    `icono` VARCHAR(50),
    `accion` VARCHAR(100),
    `superior` INTEGER,
    `orden` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuario_perfil
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_perfil`;

CREATE TABLE `usuario_perfil`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `perfil_id` INTEGER,
    `usuario_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `usuario_perfil_FI_1` (`perfil_id`),
    INDEX `usuario_perfil_FI_2` (`usuario_id`),
    CONSTRAINT `usuario_perfil_FK_1`
        FOREIGN KEY (`perfil_id`)
        REFERENCES `perfil` (`id`),
    CONSTRAINT `usuario_perfil_FK_2`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- correlativo_codigo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `correlativo_codigo`;

CREATE TABLE `correlativo_codigo`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `numero_asginar` INTEGER,
    `prefijo` VARCHAR(50),
    `tipo` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- parametro
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `parametro`;

CREATE TABLE `parametro`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(50),
    `slogan` TEXT,
    `logo` VARCHAR(150),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- alerta_ausencia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `alerta_ausencia`;

CREATE TABLE `alerta_ausencia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha` DATE,
    `estado` VARCHAR(150),
    `usuario_modero` VARCHAR(150),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `alerta_ausencia_FI_1` (`usuario_id`),
    CONSTRAINT `alerta_ausencia_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud_ausencia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_ausencia`;

CREATE TABLE `solicitud_ausencia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha` DATE,
    `motivo` VARCHAR(250),
    `observaciones` TEXT,
    `estado` VARCHAR(150) DEFAULT 'Pendiente',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `jefe` INTEGER,
    `usuario_modero` VARCHAR(150),
    `comentario_modero` TEXT,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    `fecha_fin` DATE,
    PRIMARY KEY (`id`),
    INDEX `solicitud_ausencia_FI_1` (`usuario_id`),
    CONSTRAINT `solicitud_ausencia_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ausencia_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ausencia_detalle`;

CREATE TABLE `ausencia_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `solicitud_ausencia_id` INTEGER,
    `dia` DATE,
    PRIMARY KEY (`id`),
    INDEX `ausencia_detalle_FI_1` (`usuario_id`),
    INDEX `ausencia_detalle_FI_2` (`solicitud_ausencia_id`),
    CONSTRAINT `ausencia_detalle_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `ausencia_detalle_FK_2`
        FOREIGN KEY (`solicitud_ausencia_id`)
        REFERENCES `solicitud_ausencia` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud_vacacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_vacacion`;

CREATE TABLE `solicitud_vacacion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha_inicio` DATE,
    `fecha_fin` DATE,
    `dia` INTEGER,
    `motivo` VARCHAR(250),
    `observaciones` TEXT,
    `usuario_modero` VARCHAR(150),
    `estado` VARCHAR(150) DEFAULT 'Pendiente',
    `comentario_modero` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `jefe` INTEGER,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`),
    INDEX `solicitud_vacacion_FI_1` (`usuario_id`),
    CONSTRAINT `solicitud_vacacion_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud_finquito
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_finquito`;

CREATE TABLE `solicitud_finquito`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_graba` INTEGER,
    `usuario_retiro` INTEGER,
    `fecha_retiro` DATE,
    `motivo` VARCHAR(250),
    `observaciones` TEXT,
    `estado` VARCHAR(150),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `jefe` INTEGER,
    `usuario_modero` VARCHAR(150),
    `comentario_modero` TEXT,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`),
    INDEX `solicitud_finquito_I_1` (`usuario_graba`),
    INDEX `solicitud_finquito_I_2` (`usuario_retiro`),
    CONSTRAINT `solicitud_finquito_FK_1`
        FOREIGN KEY (`usuario_graba`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `solicitud_finquito_FK_2`
        FOREIGN KEY (`usuario_retiro`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- vacacion_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `vacacion_usuario`;

CREATE TABLE `vacacion_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `periodo` INTEGER,
    `fecha_inicio` DATE,
    `fecha_fin` DATE,
    `valor` DOUBLE,
    `dias` INTEGER,
    `observaciones` TEXT,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`),
    INDEX `vacacion_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `vacacion_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- aumento_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `aumento_usuario`;

CREATE TABLE `aumento_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha_aumento` DATE,
    `sueldo_anterior` DOUBLE,
    `puesto_anterior` VARCHAR(250),
    `sueldo` DOUBLE,
    `nuevo_puesto` VARCHAR(250),
    `observaciones` TEXT,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`),
    INDEX `aumento_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `aumento_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- capacitacion_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `capacitacion_usuario`;

CREATE TABLE `capacitacion_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `nombre` VARCHAR(250),
    `fecha` DATE,
    `observaciones` TEXT,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`),
    INDEX `capacitacion_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `capacitacion_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bitacora_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bitacora_usuario`;

CREATE TABLE `bitacora_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `usuario_jefe` INTEGER,
    `motivo` TEXT,
    `leido` TINYINT(1) DEFAULT 0,
    `tipo` VARCHAR(50),
    `identificador` VARCHAR(250),
    `fecha` DATETIME,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`),
    INDEX `bitacora_usuario_FI_1` (`usuario_id`),
    CONSTRAINT `bitacora_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- catalogo_solicitud
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `catalogo_solicitud`;

CREATE TABLE `catalogo_solicitud`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) DEFAULT '',
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_usuario`;

CREATE TABLE `solicitud_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `fecha` DATE,
    `catalogo_solicitud_id` INTEGER,
    `observaciones` TEXT,
    `estado` VARCHAR(150) DEFAULT 'Pendiente',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `jefe` INTEGER,
    `usuario_modero` VARCHAR(150),
    `comentario_modero` TEXT,
    `archivo_uno` VARCHAR(150),
    `archivo_dos` VARCHAR(150),
    PRIMARY KEY (`id`),
    INDEX `solicitud_usuario_FI_1` (`usuario_id`),
    INDEX `solicitud_usuario_FI_2` (`catalogo_solicitud_id`),
    CONSTRAINT `solicitud_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `solicitud_usuario_FK_2`
        FOREIGN KEY (`catalogo_solicitud_id`)
        REFERENCES `catalogo_solicitud` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- recibo_encabezado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `recibo_encabezado`;

CREATE TABLE `recibo_encabezado`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `Planilla_Resumen_id` INTEGER,
    `empleado` VARCHAR(150),
    `empleado_proyecto_id` INTEGER,
    `sueldo_base` DOUBLE,
    `bonificacion_base` VARCHAR(50),
    `dias_ausencias` DOUBLE,
    `dias_suspendido` DOUBLE,
    `septimos` DOUBLE,
    `total_descuentos` DOUBLE,
    `total_ingresos` DOUBLE,
    `total_extras` DOUBLE,
    `total_sueldo_liquido` DOUBLE,
    `alta` VARCHAR(150),
    `baja` VARCHAR(150),
    `codigo` VARCHAR(150),
    `puesto` VARCHAR(150),
    `departamento` VARCHAR(150),
    `dias_base` DOUBLE,
    `bloque` VARCHAR(50),
    `inicio` VARCHAR(50),
    `fin` VARCHAR(50),
    `numero` VARCHAR(50),
    `laborados` DOUBLE,
    `cabecera_in` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- recibo_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `recibo_detalle`;

CREATE TABLE `recibo_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `id_c` INTEGER,
    `planilla_resumen_id` INTEGER,
    `tipo` VARCHAR(20),
    `afeca_ss` INTEGER,
    `descripcion` VARCHAR(200),
    `monto` DOUBLE,
    `debe` DOUBLE,
    `haber` DOUBLE,
    `identificar` VARCHAR(10),
    `cabecera_in` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- recibo_cabecera
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `recibo_cabecera`;

CREATE TABLE `recibo_cabecera`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `planilla` VARCHAR(100),
    `inicio` VARCHAR(15),
    `fin` VARCHAR(15),
    `proyecto` VARCHAR(200),
    `empresa` VARCHAR(200),
    `razon_social` VARCHAR(200),
    `direccion` VARCHAR(300),
    `email` VARCHAR(10),
    `telefono` VARCHAR(10),
    `nombre_comercial` VARCHAR(300),
    `texto` TEXT,
    `cabecera_in` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_ausencia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_ausencia`;

CREATE TABLE `tipo_ausencia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa` VARCHAR(300),
    `observacioes` TEXT,
    `dia` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
