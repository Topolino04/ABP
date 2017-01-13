CREATE DATABASE  IF NOT EXISTS `Gimnasio_BD` /*!40100 DEFAULT CHARACTER SET latin1 */;
CREATE DATABASE  IF NOT EXISTS `Gimnasio_BD` /*!40100 DEFAULT CHARACTER SET latin1 */;
CREATE DATABASE  IF NOT EXISTS `Gimnasio_BD` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Gimnasio_BD`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: Gimnasio_BD
-- ------------------------------------------------------
-- Server version 5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Actividad`
--

DROP TABLE IF EXISTS Actividad;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Actividad (
  id_Actividad int(11) NOT NULL,
  Nombre varchar(45) NOT NULL,
  Duracion time NOT NULL,
  Hora time NOT NULL,
  Lugar varchar(45) NOT NULL,
  Plazas int(11) NOT NULL,
  Dificultad enum('FACIL','MEDIA','DIFICIL') NOT NULL,
  Descripcion varchar(150) DEFAULT NULL,
  PRIMARY KEY (id_Actividad)
);
/*!40101 SET character_set_client = @saved_cs_client */;
ALTER TABLE `Actividad`
  MODIFY `id_Actividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- Dumping data for table `Actividad`
--

INSERT INTO Actividad VALUES (1,'Baile','00:30:00','18:00:00','Aula3',20,'FACIL','Clase de baile');

--
-- Table structure for table `Deportista`
--



DROP TABLE IF EXISTS Deportista;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Deportista (
  Usuario varchar(12) NOT NULL,
  `Password` varchar(128) NOT NULL,
  Nombre varchar(45) NOT NULL,
  Apellidos varchar(45) NOT NULL,
  FOTO varchar(100) DEFAULT NULL,
  DNI varchar(10) NOT NULL,
  Email varchar(45) NOT NULL,
  FechaNac date NOT NULL,
  Telefono int(11) NOT NULL,
  Tipo enum('TDU','PEF') DEFAULT NULL,
  PRIMARY KEY (DNI)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Deportista`
--

--
-- `Deportista` por defecto para poder crear Actividad 
--

INSERT INTO Deportista (`Usuario`,`Password`,`Nombre`,`Apellidos`,`FOTO`,`DNI`,`Email`,`FechaNac`,`Telefono`,`Tipo`)VALUES ('default','default','default','default','default','default','default',0,0,'TDU');

INSERT INTO Deportista VALUES ('ADMIN','73acd9a5972130b75066c82595a1fae3','Pablo','Gonzalez Rodriguez','321.jpg','39476158B','pablopeiboll@gmail.com','2016-11-05',321313,'TDU');

--
-- Table structure for table `Deportista_reserva_actividad`
--

DROP TABLE IF EXISTS Deportista_reserva_actividad;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Deportista_reserva_actividad (
  Deportista_id_Usuario varchar(10) NOT NULL,
  Actividad_id_Actividad int(11) NOT NULL,
  Fecha datetime NOT NULL,
  Asistencia tinyint(1) DEFAULT 0,
  PRIMARY KEY (Deportista_id_Usuario,Actividad_id_Actividad,Fecha),
  KEY fk_Deportista_has_Actividad_Actividad1 (Actividad_id_Actividad),
  KEY fk_Deportista_has_Actividad_Deportista1 (Deportista_id_Usuario),
  KEY fk_Deportista_has_Actividad_Fecha1 (Fecha),
  CONSTRAINT fk_Deportista_has_Actividad_Actividad1 FOREIGN KEY (Actividad_id_Actividad) REFERENCES Actividad (id_Actividad) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT fk_Deportista_has_Actividad_Deportista1 FOREIGN KEY (Deportista_id_Usuario) REFERENCES Deportista (DNI) ON DELETE CASCADE ON UPDATE NO ACTION
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Deportista_reserva_actividad`
--
INSERT INTO Deportista_reserva_actividad VALUES ('39476158B',1,'now()',1);

--
-- Table structure for table `Ejercicio`
--

DROP TABLE IF EXISTS Ejercicio;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Ejercicio (
  id_Ejercicio int(11) NOT NULL,
  Tipo varchar(45) NOT NULL,
  Nombre varchar(45) NOT NULL,
  Tiempo time DEFAULT NULL,
  Repeticiones int(11) DEFAULT NULL,
  Peso int(11) DEFAULT NULL,
  Series int(11) DEFAULT NULL,
  Descripcion varchar(100) DEFAULT NULL,
  PRIMARY KEY (id_Ejercicio)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ejercicio`
--
ALTER TABLE `Ejercicio`
  MODIFY `id_Ejercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

INSERT INTO Ejercicio VALUES (1,'tipo1','nombre1','00:00:01',2,25,3,'Descripcion1');
INSERT INTO Ejercicio VALUES (2,'tipo1','nombre2','00:00:02',3,20,4,'Descripcion2');
INSERT INTO Ejercicio VALUES (3,'tipo2','nombre3','00:00:03',3,10,5,'Descripcion3');
INSERT INTO Ejercicio VALUES (4,'tipo2','nombre4','00:00:04',8,50,6,'Descripcion4');
INSERT INTO Ejercicio VALUES (5,'tipo3','nombre5','00:00:05',2,75,7,'Descripcion5');

--
-- Table structure for table `Entrenador`
--

DROP TABLE IF EXISTS Entrenador;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Entrenador (
  Usuario varchar(12) NOT NULL,
  `Password` varchar(128) NOT NULL,
  Nombre varchar(45) NOT NULL,
  Apellidos varchar(45) NOT NULL,
  FOTO varchar(100) DEFAULT NULL,
  DNI varchar(10) NOT NULL,
  Email varchar(45) NOT NULL,
  FechaNac date NOT NULL,
  Telefono int(11) NOT NULL,
  Tipo enum('Baile','Fitnes') DEFAULT NULL,
  PRIMARY KEY (DNI)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entrenador`
--

INSERT INTO Entrenador VALUES ('MONITOR','ff3e179b3cc64393841107ccba0d6e48','MONITOR1','PACO GIMENEZ','321.jpg','1213131','mario_cafeina@hotmail.com','2016-11-11',2147483647,'Baile');

--
-- Table structure for table `Gestion_actividad`
--

DROP TABLE IF EXISTS Gestion_actividad;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Gestion_actividad (
  Entrenador_id_Usuario varchar(10) NOT NULL,
  Actividad_id_Actividad int(11) NOT NULL,
  identificador_deportista varchar(11) NOT NULL,
  fecha datetime NOT NULL,
  PRIMARY KEY (Entrenador_id_Usuario,Actividad_id_Actividad,identificador_deportista),
  KEY fk_Entrenador_has_Actividad_Actividad1 (Actividad_id_Actividad),
  KEY fk_Entrenador_has_Actividad_Entrenador1 (Entrenador_id_Usuario),
  KEY fk_deportista (identificador_deportista),
  CONSTRAINT fk_Entrenador_has_Actividad_Actividad1 FOREIGN KEY (Actividad_id_Actividad) REFERENCES Actividad (id_Actividad) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT fk_Entrenador_has_Actividad_Entrenador1 FOREIGN KEY (Entrenador_id_Usuario) REFERENCES Entrenador (DNI) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT fk_deportista FOREIGN KEY (identificador_deportista) REFERENCES Deportista (DNI) ON DELETE CASCADE ON UPDATE NO ACTION
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gestion_actividad`
--
INSERT INTO Gestion_actividad VALUES ('1213131',1,'default','0');
INSERT INTO Gestion_actividad VALUES ('1213131',1,'39476158B','0000-00-00 00:00:00');

--
-- Table structure for table `Gestion_deportistas_entrenador`
--

DROP TABLE IF EXISTS Gestion_deportistas_entrenador;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Gestion_deportistas_entrenador (
  deportista_dni varchar(11) NOT NULL,
  entrenador_dni varchar(11) NOT NULL,
  fechatimer datetime NOT NULL,
  PRIMARY KEY (deportista_dni,entrenador_dni,fechatimer)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gestion_deportistas_entrenador`
--


--
-- Table structure for table `Gestion_ejercicio`
--

DROP TABLE IF EXISTS Gestion_ejercicio;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Gestion_ejercicio (
  Entrenador_id_Usuario varchar(10) NOT NULL,
  Ejercicio_id_Ejercicio int(11) NOT NULL,
  PRIMARY KEY (Entrenador_id_Usuario,Ejercicio_id_Ejercicio),
  KEY fk_Entrenador_has_Ejercicio_Ejercicio1_idx (Ejercicio_id_Ejercicio),
  KEY fk_Entrenador_has_Ejercicio_Entrenador1_idx (Entrenador_id_Usuario),
  CONSTRAINT fk_Entrenador_has_Ejercicio_Ejercicio1 FOREIGN KEY (Ejercicio_id_Ejercicio) REFERENCES Ejercicio (id_Ejercicio) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_Entrenador_has_Ejercicio_Entrenador1 FOREIGN KEY (Entrenador_id_Usuario) REFERENCES Entrenador (DNI) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gestion_ejercicio`
--


--
-- Table structure for table `Gestion_tabla`
--

DROP TABLE IF EXISTS Gestion_tabla;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Gestion_tabla (
  Entrenador_id_Usuario varchar(10) NOT NULL,
  Tabla_id_Tabla int(11) NOT NULL,
  PRIMARY KEY (Entrenador_id_Usuario,Tabla_id_Tabla),
  KEY fk_Entrenador_has_Tabla_Tabla1_idx (Tabla_id_Tabla),
  KEY fk_Entrenador_has_Tabla_Entrenador1_idx (Entrenador_id_Usuario),
  CONSTRAINT fk_Entrenador_has_Tabla_Entrenador1 FOREIGN KEY (Entrenador_id_Usuario) REFERENCES Entrenador (DNI) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_Entrenador_has_Tabla_Tabla1 FOREIGN KEY (Tabla_id_Tabla) REFERENCES Tabla (id_Tabla) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gestion_tabla`
--


--
-- Table structure for table `Notificacion`
--

DROP TABLE IF EXISTS Notificacion;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Notificacion (
  `ID` int(11) NOT NULL,
  USUARIO varchar(40) NOT NULL,
  COMENTARIO varchar(240) NOT NULL,
  FECHATIME datetime NOT NULL,
  USUARIOORIGEN varchar(40) NOT NULL,
  VISTO tinyint(1) NOT NULL,
  FOTO varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Notificacion`
--

INSERT INTO `Notificacion` (`ID`, `USUARIO`, `COMENTARIO`, `FECHATIME`, `USUARIOORIGEN`, `VISTO`, `FOTO`) VALUES
(400, 'MONITOR', 'Bienvenido', '2016-12-03 20:16:40', 'LORENA', 1, '321.jpg'),
(133, 'ADMIN', 'Bienvenido', '2016-12-03 20:29:30', 'Juan', 1, '321.jpg');
--
-- Table structure for table `Sesion`
--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`ID`);

-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `Notificacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;



DROP TABLE IF EXISTS Sesion;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Sesion (

  Deportista_id_Usuario varchar(10) NOT NULL,
  Fecha datetime NOT NULL,
  Comentario varchar(150) DEFAULT NULL,
  Tabla_id int(11) NOT NULL,
  PRIMARY KEY (Deportista_id_Usuario,Fecha,Tabla_id),
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
-- Table structure for table `Tabla`
--

DROP TABLE IF EXISTS Tabla;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Tabla (
  id_Tabla int(11) NOT NULL,
  Nombre varchar(25) NOT NULL,
  PRIMARY KEY (id_Tabla)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tabla`
--

INSERT INTO Tabla VALUES (1,'Ejercicios Basicos');
INSERT INTO Tabla VALUES (2,'Ejercicios Avazados');
INSERT INTO Tabla VALUES (3,'Ejercicios HARDCORE');
INSERT INTO Tabla VALUES (4,'Mantenimiento');
INSERT INTO Tabla VALUES (5,'Musculacion');
INSERT INTO Tabla VALUES (6,'Mata Sanos');

--
-- Table structure for table `Tabla_contiene_ejercicios`
--

DROP TABLE IF EXISTS Tabla_contiene_ejercicios;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Tabla_contiene_ejercicios (
  Tabla_id_Tabla int(11) NOT NULL,
  Ejercicio_id_Ejercicio int(11) NOT NULL,
  PRIMARY KEY (Tabla_id_Tabla,Ejercicio_id_Ejercicio),
  KEY fk_Tabla_has_Ejercicio_Ejercicio1_idx (Ejercicio_id_Ejercicio),
  KEY fk_Tabla_has_Ejercicio_Tabla1_idx (Tabla_id_Tabla),
  CONSTRAINT fk_Tabla_has_Ejercicio_Ejercicio1 FOREIGN KEY (Ejercicio_id_Ejercicio) REFERENCES Ejercicio (id_Ejercicio) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_Tabla_has_Ejercicio_Tabla1 FOREIGN KEY (Tabla_id_Tabla) REFERENCES Tabla (id_Tabla) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tabla_contiene_ejercicios`
--

INSERT INTO Tabla_contiene_ejercicios VALUES (1,1);
INSERT INTO Tabla_contiene_ejercicios VALUES (1,2);
INSERT INTO Tabla_contiene_ejercicios VALUES (1,3);
INSERT INTO Tabla_contiene_ejercicios VALUES (1,4);
INSERT INTO Tabla_contiene_ejercicios VALUES (2,1);
INSERT INTO Tabla_contiene_ejercicios VALUES (3,1);
INSERT INTO Tabla_contiene_ejercicios VALUES (4,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
