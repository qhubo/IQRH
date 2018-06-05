
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
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `nombre_completo` VARCHAR(320),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `llave` (`usuario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- banco
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `banco`;

CREATE TABLE `banco`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(260) DEFAULT '' NOT NULL,
    `nombre_cuenta` VARCHAR(100),
    `no_cuenta` VARCHAR(100),
    `tipo_cuenta` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cliente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nit` VARCHAR(60),
    `nombre_completo` VARCHAR(260) DEFAULT '' NOT NULL,
    `direccion` VARCHAR(60),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- proveedor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nit` VARCHAR(60),
    `nombre_completo` VARCHAR(260) DEFAULT '' NOT NULL,
    `direccion` VARCHAR(60),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(60),
    `nombre` VARCHAR(260) DEFAULT '' NOT NULL,
    `precio` DOUBLE,
    `cantidad` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- catalogo_cuenta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `catalogo_cuenta`;

CREATE TABLE `catalogo_cuenta`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(60),
    `nombre` VARCHAR(260) DEFAULT '' NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- servicio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `servicio`;

CREATE TABLE `servicio`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(60),
    `nombre` VARCHAR(260) DEFAULT '' NOT NULL,
    `precio` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- operacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `operacion`;

CREATE TABLE `operacion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `cliente_id` INTEGER,
    `nombre` VARCHAR(200),
    `fecha` DATETIME,
    `nit` VARCHAR(100),
    `direccion` VARCHAR(350) DEFAULT '' NOT NULL,
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `valor_total` DOUBLE,
    `estatus` VARCHAR(300),
    `dia_credito` INTEGER,
    `valor_pagado` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `operacion_FI_1` (`cliente_id`),
    CONSTRAINT `operacion_FK_1`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- operacion_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `operacion_detalle`;

CREATE TABLE `operacion_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `producto_id` INTEGER,
    `cantidad` INTEGER,
    `operacion_id` INTEGER,
    `servicio_id` INTEGER,
    `valor_unitario` DOUBLE,
    `valor_total` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `operacion_detalle_FI_1` (`producto_id`),
    INDEX `operacion_detalle_FI_2` (`operacion_id`),
    INDEX `operacion_detalle_FI_3` (`servicio_id`),
    CONSTRAINT `operacion_detalle_FK_1`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `operacion_detalle_FK_2`
        FOREIGN KEY (`operacion_id`)
        REFERENCES `operacion` (`id`),
    CONSTRAINT `operacion_detalle_FK_3`
        FOREIGN KEY (`servicio_id`)
        REFERENCES `servicio` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- operacion_pago
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `operacion_pago`;

CREATE TABLE `operacion_pago`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `operacion_id` INTEGER,
    `fecha_pago` DATETIME,
    `tipo` VARCHAR(100),
    `banco_id` INTEGER,
    `referencia` VARCHAR(32),
    `valor` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `operacion_pago_FI_1` (`operacion_id`),
    INDEX `operacion_pago_FI_2` (`banco_id`),
    CONSTRAINT `operacion_pago_FK_1`
        FOREIGN KEY (`operacion_id`)
        REFERENCES `operacion` (`id`),
    CONSTRAINT `operacion_pago_FK_2`
        FOREIGN KEY (`banco_id`)
        REFERENCES `banco` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- compra
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `compra`;

CREATE TABLE `compra`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `proveedor_id` INTEGER,
    `nombre` VARCHAR(200),
    `fecha` DATETIME,
    `nit` VARCHAR(100),
    `direccion` VARCHAR(350) DEFAULT '' NOT NULL,
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `valor_total` DOUBLE,
    `estatus` VARCHAR(300),
    `dia_credito` INTEGER,
    `valor_pagado` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `compra_FI_1` (`proveedor_id`),
    CONSTRAINT `compra_FK_1`
        FOREIGN KEY (`proveedor_id`)
        REFERENCES `proveedor` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- compra_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `compra_detalle`;

CREATE TABLE `compra_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `producto_id` INTEGER,
    `cantidad` INTEGER,
    `compra_id` INTEGER,
    `servicio_id` INTEGER,
    `valor_unitario` DOUBLE,
    `valor_total` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `compra_detalle_FI_1` (`producto_id`),
    INDEX `compra_detalle_FI_2` (`compra_id`),
    INDEX `compra_detalle_FI_3` (`servicio_id`),
    CONSTRAINT `compra_detalle_FK_1`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `compra_detalle_FK_2`
        FOREIGN KEY (`compra_id`)
        REFERENCES `compra` (`id`),
    CONSTRAINT `compra_detalle_FK_3`
        FOREIGN KEY (`servicio_id`)
        REFERENCES `servicio` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- compra_pago
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `compra_pago`;

CREATE TABLE `compra_pago`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `compra_id` INTEGER,
    `fecha_pago` DATETIME,
    `tipo` VARCHAR(100),
    `banco_id` INTEGER,
    `referencia` VARCHAR(32),
    `valor` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `compra_pago_FI_1` (`compra_id`),
    INDEX `compra_pago_FI_2` (`banco_id`),
    CONSTRAINT `compra_pago_FK_1`
        FOREIGN KEY (`compra_id`)
        REFERENCES `compra` (`id`),
    CONSTRAINT `compra_pago_FK_2`
        FOREIGN KEY (`banco_id`)
        REFERENCES `banco` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- partida
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `partida`;

CREATE TABLE `partida`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `fecha` DATETIME,
    `tipo` VARCHAR(32),
    `identificador` INTEGER,
    `comentario` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- partida_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `partida_detalle`;

CREATE TABLE `partida_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `partida_id` INTEGER,
    `detalle` VARCHAR(200),
    `cuenta` VARCHAR(50),
    `debito` DOUBLE,
    `credito` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `partida_detalle_FI_1` (`partida_id`),
    CONSTRAINT `partida_detalle_FK_1`
        FOREIGN KEY (`partida_id`)
        REFERENCES `partida` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mobiliario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mobiliario`;

CREATE TABLE `mobiliario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `valor` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cuota_depreciacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cuota_depreciacion`;

CREATE TABLE `cuota_depreciacion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mobiliario_id` INTEGER,
    `cuota` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `cuota_depreciacion_FI_1` (`mobiliario_id`),
    CONSTRAINT `cuota_depreciacion_FK_1`
        FOREIGN KEY (`mobiliario_id`)
        REFERENCES `mobiliario` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
