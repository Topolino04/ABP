SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
-- -----------------------------------------------------
-- Schema Gimnasio_BD
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `Gimnasio_BD` DEFAULT CHARACTER SET utf8 ;
USE `Gimnasio_BD` ;

-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Deportista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Deportista` (
    `Usuario` VARCHAR(12) NOT NULL,
    `Password` VARCHAR(128) NOT NULL,
    `Nombre` VARCHAR(45) NOT NULL,
    `Apellidos` VARCHAR(45) NOT NULL,
    `FOTO` varchar(100) DEFAULT NULL,
    `DNI` VARCHAR(10) NOT NULL,
    `Email` VARCHAR(45) NOT NULL,
    `FechaNac` DATE NOT NULL,
    `Telefono` INT NOT NULL,
    `Tipo` ENUM('TDU','PEF') NULL,
    PRIMARY KEY (`DNI`))
ENGINE = InnoDB;

INSERT INTO `Deportista` (`Usuario`, `Password`, `Nombre`, `Apellidos`,`FOTO`, `DNI`, `Email`, `FechaNac`, `Telefono`, `Tipo`) VALUES
('ADMIN', '73acd9a5972130b75066c82595a1fae3', 'Pablo', 'Gonzalez Rodriguez','321.jpg', '39476158B', 'pablopeiboll@gmail.com', '2016-11-05', 321313, 'TDU');


-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Entrenador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Entrenador` (
    `Usuario` VARCHAR(12) NOT NULL,
    `Password` VARCHAR(128) NOT NULL,
    `Nombre` VARCHAR(45) NOT NULL,
    `Apellidos` VARCHAR(45) NOT NULL,
    `FOTO` varchar(100) DEFAULT NULL,
    `DNI` VARCHAR(10) NOT NULL,
    `Email` VARCHAR(45) NOT NULL,
    `FechaNac` DATE NOT NULL,
    `Telefono` INT NOT NULL,
    `Tipo` ENUM('Baile','Fitnes') NULL,
  PRIMARY KEY (`DNI`))
ENGINE = InnoDB;

INSERT INTO `Entrenador` (`Usuario`, `Password`, `Nombre`, `Apellidos`,`FOTO`,`DNI`, `Email`, `FechaNac`, `Telefono`, `Tipo`) VALUES
('MONITOR', 'ff3e179b3cc64393841107ccba0d6e48', 'MONITOR1', 'PACO GIMENEZ','321.jpg','1213131', 'mario_cafeina@hotmail.com', '2016-11-11', 2147483647, 'Baile');

-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Ejercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Ejercicio` (
  `id_Ejercicio` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Tiempo` TIME NULL,
  `Repeticiones` INT NULL,
  `Peso` INT NULL,
  `Series` INT NULL,
  `Descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`id_Ejercicio`))
ENGINE = InnoDB;

INSERT INTO `Ejercicio`(`Tipo`, `Nombre`, `Tiempo`, `Repeticiones`, `Peso`, `Series`, `Descripcion`) VALUES
    ('tipo1','nombre1','00:00:01',2,25,3,'Descripcion1'),
    ('tipo1','nombre2','00:00:02',3,20,4,'Descripcion2'),
    ('tipo2','nombre3','00:00:03',3,10,5,'Descripcion3'),
    ('tipo2','nombre4','00:00:04',8,50,6,'Descripcion4'),
    ('tipo3','nombre5','00:00:05',2,75,7,'Descripcion5');



-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Tabla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Tabla` (
  `id_Tabla` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id_Tabla`))
ENGINE = InnoDB;

INSERT INTO `Tabla`(`Nombre`) VALUES
    ('Ejercicios Basicos'),
    ('Ejercicios Avazados'),
    ('Ejercicios HARDCORE'),
    ('Mantenimiento'),
    ('Musculacion'),
    ('Mata Sanos');


-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Actividad` (
  `id_Actividad` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Duracion` TIME NOT NULL,
  `Hora` TIME NOT NULL,
  `Lugar` VARCHAR(45) NOT NULL,
  `Plazas` INT NOT NULL,
  `Dificultad` ENUM('FACIL','MEDIA','DIFICIL') NOT NULL,
  `Descripcion` VARCHAR(150),
  PRIMARY KEY (`id_Actividad`))
ENGINE = InnoDB;

INSERT INTO `Actividad`(`Nombre`, `Duracion`, `Hora`, `Lugar`, `Plazas`, `Dificultad`, `Descripcion`)
VALUES ('Baile','00:30:00','18:00:00','Aula3','20','FACIL','Clase de baile');
-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Gestion_Ejercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Gestion_Ejercicio` (
  `Entrenador_id_Usuario` VARCHAR(10) NOT NULL,
  `Ejercicio_id_Ejercicio` INT NOT NULL,
  PRIMARY KEY (`Entrenador_id_Usuario`, `Ejercicio_id_Ejercicio`),
  INDEX `fk_Entrenador_has_Ejercicio_Ejercicio1_idx` (`Ejercicio_id_Ejercicio` ASC),
  INDEX `fk_Entrenador_has_Ejercicio_Entrenador1_idx` (`Entrenador_id_Usuario` ASC),
  CONSTRAINT `fk_Entrenador_has_Ejercicio_Entrenador1`
    FOREIGN KEY (`Entrenador_id_Usuario`)
    REFERENCES `Gimnasio_BD`.`Entrenador` (`DNI`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Entrenador_has_Ejercicio_Ejercicio1`
    FOREIGN KEY (`Ejercicio_id_Ejercicio`)
    REFERENCES `Gimnasio_BD`.`Ejercicio` (`id_Ejercicio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Gestion_Tabla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Gestion_Tabla` (
  `Entrenador_id_Usuario` VARCHAR(10) NOT NULL,
  `Tabla_id_Tabla` INT NOT NULL,
  PRIMARY KEY (`Entrenador_id_Usuario`, `Tabla_id_Tabla`),
  INDEX `fk_Entrenador_has_Tabla_Tabla1_idx` (`Tabla_id_Tabla` ASC),
  INDEX `fk_Entrenador_has_Tabla_Entrenador1_idx` (`Entrenador_id_Usuario` ASC),
  CONSTRAINT `fk_Entrenador_has_Tabla_Entrenador1`
    FOREIGN KEY (`Entrenador_id_Usuario`)
    REFERENCES `Gimnasio_BD`.`Entrenador` (`DNI`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Entrenador_has_Tabla_Tabla1`
    FOREIGN KEY (`Tabla_id_Tabla`)
    REFERENCES `Gimnasio_BD`.`Tabla` (`id_Tabla`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Gestion_Actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Gestion_Actividad` (
  `Entrenador_id_Usuario` VARCHAR(10) NOT NULL,
  `Actividad_id_Actividad` INT NOT NULL,
  PRIMARY KEY (`Entrenador_id_Usuario`, `Actividad_id_Actividad`),
  INDEX `fk_Entrenador_has_Actividad_Actividad1_idx` (`Actividad_id_Actividad` ASC),
  INDEX `fk_Entrenador_has_Actividad_Entrenador1_idx` (`Entrenador_id_Usuario` ASC),
  CONSTRAINT `fk_Entrenador_has_Actividad_Entrenador1`
    FOREIGN KEY (`Entrenador_id_Usuario`)
    REFERENCES `Gimnasio_BD`.`Entrenador` (`DNI`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Entrenador_has_Actividad_Actividad1`
    FOREIGN KEY (`Actividad_id_Actividad`)
    REFERENCES `Gimnasio_BD`.`Actividad` (`id_Actividad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Deportista_reserva_Actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Deportista_reserva_Actividad` (
  `Deportista_id_Usuario` VARCHAR(10) NOT NULL,
  `Actividad_id_Actividad` INT NOT NULL,
  `Fecha` DATETIME NOT NULL,
  PRIMARY KEY (`Deportista_id_Usuario`, `Actividad_id_Actividad`),
  INDEX `fk_Deportista_has_Actividad_Actividad1_idx` (`Actividad_id_Actividad` ASC),
  INDEX `fk_Deportista_has_Actividad_Deportista1_idx` (`Deportista_id_Usuario` ASC),
  CONSTRAINT `fk_Deportista_has_Actividad_Deportista1`
    FOREIGN KEY (`Deportista_id_Usuario`)
    REFERENCES `Gimnasio_BD`.`Deportista` (`DNI`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Deportista_has_Actividad_Actividad1`
    FOREIGN KEY (`Actividad_id_Actividad`)
    REFERENCES `Gimnasio_BD`.`Actividad` (`id_Actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(40) NOT NULL,
  `COMENTARIO` varchar(240) NOT NULL,
  `FECHATIME` datetime NOT NULL,
  `USUARIOORIGEN` varchar(40) NOT NULL,
  `VISTO` tinyint(1) NOT NULL,
  `FOTO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`ID`, `USUARIO`, `COMENTARIO`, `FECHATIME`, `USUARIOORIGEN`, `VISTO`, `FOTO`) VALUES
(129, 'MONITOR', 'Bienvenido', '2016-12-03 20:16:40', 'LORENA', 1, '321.jpg'),
(133, 'ADMIN', 'Bienvenido', '2016-12-03 20:29:30', 'Juan', 1, '321.jpg');

-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Tabla_contiene_Ejercicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gimnasio_BD`.`Tabla_contiene_Ejercicios` (
  `Tabla_id_Tabla` INT NOT NULL,
  `Ejercicio_id_Ejercicio` INT NOT NULL,
  PRIMARY KEY (`Tabla_id_Tabla`, `Ejercicio_id_Ejercicio`),
  INDEX `fk_Tabla_has_Ejercicio_Ejercicio1_idx` (`Ejercicio_id_Ejercicio` ASC),
  INDEX `fk_Tabla_has_Ejercicio_Tabla1_idx` (`Tabla_id_Tabla` ASC),
  CONSTRAINT `fk_Tabla_has_Ejercicio_Tabla1`
    FOREIGN KEY (`Tabla_id_Tabla`)
    REFERENCES `Gimnasio_BD`.`Tabla` (`id_Tabla`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Tabla_has_Ejercicio_Ejercicio1`
    FOREIGN KEY (`Ejercicio_id_Ejercicio`)
    REFERENCES `Gimnasio_BD`.`Ejercicio` (`id_Ejercicio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `Gimnasio_BD`.`Tabla_contiene_Ejercicios` VALUES (1,1),(1,2),(1,3),(1,4),(2,1),(3,1),(4,1);

-- -----------------------------------------------------
-- Table `Gimnasio_BD`.`Sesion`
-- -----------------------------------------------------

DROP TABLE IF EXISTS Sesion;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Sesion (

  Deportista_id_Usuario varchar(10) NOT NULL,
  Fecha datetime NOT NULL,
  Comentario varchar(150) DEFAULT NULL,
  Tabla_id int(11) NOT NULL,
  PRIMARY KEY (Deportista_id_Usuario,Fecha),
  KEY fk_Entrenador_has_Deportista_Deportista1_idx (Deportista_id_Usuario),  
  KEY idx_Sesion_Tabla_id (Tabla_id),
  CONSTRAINT fk_Sesion_has_Tabla FOREIGN KEY (Tabla_id) REFERENCES Tabla (id_Tabla) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_Entrenador_has_Deportista_Deportista1 FOREIGN KEY (Deportista_id_Usuario) REFERENCES Deportista (DNI) ON DELETE CASCADE ON UPDATE CASCADE
 
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sesion`
--
INSERT INTO Sesion VALUES ('1213131','39476158B','0000-00-00 00:00:00','asdad',1);
--
--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`ID`);

-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
