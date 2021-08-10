/*
SQLyog Community v9.20 
MySQL - 5.5.46 : Database - comprastockproduccion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`comprastockproduccion` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `comprastockproduccion`;

/*Table structure for table `ajustecabecera` */

DROP TABLE IF EXISTS `ajustecabecera`;

CREATE TABLE `ajustecabecera` (
  `idAjuste` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Notas` varchar(45) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigoalmacen` int(11) NOT NULL,
  `Idsucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAjuste`),
  KEY `fk_AjusteCabecera_Almacen1_idx` (`codigoalmacen`),
  KEY `fk_AjusteCabecera_Sucursal1_idx` (`Idsucursal`),
  KEY `fk_AjusteCabecera_CategoriaDeProductos1_idx` (`idcategoria`),
  CONSTRAINT `fk_AjusteCabecera_Almacen1` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_AjusteCabecera_CategoriaDeProductos1` FOREIGN KEY (`idcategoria`) REFERENCES `categoriadeproductos` (`idcategoria`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_AjusteCabecera_Sucursal1` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ajustecabecera` */

insert  into `ajustecabecera`(`idAjuste`,`Fecha`,`Notas`,`idcategoria`,`codigoalmacen`,`Idsucursal`) values (1,'2018-11-20','una mas',1,1,1),(2,'2018-11-08','notas de una ma',5,14,1),(3,'2018-11-08','notas de una ma',5,14,1),(4,'2018-11-08','notas de una ma',5,14,1),(5,'2018-11-08','notas de una ma',5,14,1),(6,'2018-11-08','notas de una ma',5,14,1),(7,'2018-11-08','notas de una ma',7,14,1),(8,'2018-11-08','notas de una ma',7,14,1),(9,'2018-11-08','notas de una ma',7,14,1),(10,'2018-11-08','notas de una ma',7,14,1),(11,'2018-11-08','notas de una ma',7,14,1),(12,'2018-11-08','notas de una ma',7,14,1),(13,'2018-11-08','notas de una ma',7,14,1),(14,'2018-11-08','notas de una ma',7,14,1),(15,'2018-11-01','ajuste realizado por aldo arevlo',7,11,1),(16,'2018-11-09','nuevo ajuste realizado por aldo arevalo',7,14,16),(17,'2018-11-09','nuevo ajuste realizado por aldo arevalo',7,11,1),(18,'2018-11-09','nuevo ajuste realizado por aldo arevalo',7,11,1),(19,'2018-11-09','nuevo ajuste realizado por aldo arevalo',7,11,1);

/*Table structure for table `ajustedetalle` */

DROP TABLE IF EXISTS `ajustedetalle`;

CREATE TABLE `ajustedetalle` (
  `idAjuste` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `Esperada` double NOT NULL,
  `deportada` double NOT NULL,
  `Faltante` double NOT NULL,
  `Sobrante` double NOT NULL,
  `codigoalmacen` int(11) NOT NULL,
  PRIMARY KEY (`idAjuste`,`codigoproducto`),
  KEY `codigoproducto` (`codigoproducto`),
  KEY `fk_AjusteDetalle_almacen` (`codigoalmacen`),
  CONSTRAINT `fk_AjusteDetalle_almacen` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `ajustedetalle_ibfk_1` FOREIGN KEY (`idAjuste`) REFERENCES `ajustecabecera` (`idAjuste`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `ajustedetalle_ibfk_2` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ajustedetalle` */

insert  into `ajustedetalle`(`idAjuste`,`codigoproducto`,`Esperada`,`deportada`,`Faltante`,`Sobrante`,`codigoalmacen`) values (1,1,55,1,1,1,1),(6,1,32000,33000,0,1000,14),(6,2,33000,35000,0,2000,14),(7,1,32000,33000,0,1000,14),(7,39,500,800,0,300,14),(8,1,32000,31000,1000,1000,14),(8,39,500,800,0,300,14),(9,1,32000,800,31200,-31200,14),(10,28,32000,31000,1000,0,14),(11,28,32000,31999,1,0,14),(11,40,685685,99,0,-685586,14),(12,28,32000,31999,1,0,14),(12,40,685685,99,0,-685586,14),(13,1,32000,5,0,-31995,14),(13,40,685685,555,685130,0,14),(14,1,32000,33000,0,-31995,14),(14,40,685685,555,685130,0,14),(15,2,33000,34000,0,1000,11),(15,28,32000,35000,0,3000,11),(15,40,685685,5,685680,0,11),(16,2,33000,31000,2000,0,14),(16,28,32000,33000,0,1000,14),(16,40,685685,5,685680,0,14),(16,49,55,5,50,0,14),(17,3,55000,5,54995,0,11),(18,3,55000,5,54995,0,11),(19,3,55000,5,54995,0,11),(19,40,685685,55,685630,0,11);

/*Table structure for table `almacen` */

DROP TABLE IF EXISTS `almacen`;

CREATE TABLE `almacen` (
  `codigoalmacen` int(11) NOT NULL AUTO_INCREMENT,
  `almacen` varchar(45) NOT NULL,
  `Idsucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoalmacen`),
  KEY `FK_almacen` (`Idsucursal`),
  CONSTRAINT `FK_almacen` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `almacen` */

insert  into `almacen`(`codigoalmacen`,`almacen`,`Idsucursal`) values (1,'deposito de materias primas',1),(2,'nuievo al',1),(3,'nuevo almacen',1),(4,'nuevo almacen',1),(5,'nuevvvvvv',1),(6,'ggg',9),(7,'mae',1),(8,'materias primas',1),(9,'centro salon de ventas',1),(11,'centro salon de ventas',1),(12,'centro salon de ventas',1),(13,'nuevo almacen',1),(14,'almacen dos',16),(15,'uno',1);

/*Table structure for table `aperturaycierredecaja` */

DROP TABLE IF EXISTS `aperturaycierredecaja`;

CREATE TABLE `aperturaycierredecaja` (
  `id_AperturayCierreDeCaja` int(11) NOT NULL,
  `FechaDeApertura` datetime NOT NULL,
  `FechaDeCierre` datetime NOT NULL,
  `MontoInicial` double NOT NULL,
  `MontoFinal` double NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idPuntodeventa` int(11) NOT NULL,
  `mont_cierreef` int(11) NOT NULL,
  `monto_cierretarg` int(11) NOT NULL,
  `monto_cierrecheq` int(11) NOT NULL,
  PRIMARY KEY (`id_AperturayCierreDeCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aperturaycierredecaja` */

/*Table structure for table `arqueodecaja` */

DROP TABLE IF EXISTS `arqueodecaja`;

CREATE TABLE `arqueodecaja` (
  `idArqueo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idAperturayCierreDeCaja` int(11) NOT NULL,
  `monto_ef` int(11) NOT NULL,
  `monto_cheq` int(11) NOT NULL,
  `monto_targ` int(11) NOT NULL,
  `monto_cierre` int(11) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idArqueo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `arqueodecaja` */

/*Table structure for table `bancos` */

DROP TABLE IF EXISTS `bancos`;

CREATE TABLE `bancos` (
  `idcuentabanco` int(11) NOT NULL,
  `NumeroSipap` int(11) NOT NULL,
  `CuentaBanco` varchar(45) NOT NULL,
  PRIMARY KEY (`idcuentabanco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bancos` */

insert  into `bancos`(`idcuentabanco`,`NumeroSipap`,`CuentaBanco`) values (1,28,'BNF'),(3,28,'VISION');

/*Table structure for table `categoriadeproductos` */

DROP TABLE IF EXISTS `categoriadeproductos`;

CREATE TABLE `categoriadeproductos` (
  `idcategoria` int(11) NOT NULL,
  `nombrecategoria` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT 'aldo',
  `codigosubrubro` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`),
  KEY `FK_categoriadeproductos` (`codigosubrubro`),
  CONSTRAINT `FK_categoriadeproductos` FOREIGN KEY (`codigosubrubro`) REFERENCES `subrubros` (`codigosubrubro`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `categoriadeproductos` */

insert  into `categoriadeproductos`(`idcategoria`,`nombrecategoria`,`usuario`,`codigosubrubro`) values (1,'productos nuev','aldo',44),(2,'otro codigo','aldo',1),(3,'insumos','aldo',1),(4,'ttt','aldo',1),(5,'bbbbbb','aldo',2),(7,'categoria otra','aldo',2),(8,'diexz','aldo',1),(9,'categiria desiss','aldo',8548);

/*Table structure for table `centrodecostos` */

DROP TABLE IF EXISTS `centrodecostos`;

CREATE TABLE `centrodecostos` (
  `idCentroDeCosto` int(11) NOT NULL,
  `nombrecentro` varchar(45) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimamodificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Idsucursal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCentroDeCosto`),
  KEY `FK_centrodecostos` (`Idsucursal`),
  KEY `FK_centrodecostos1` (`idusuario`),
  CONSTRAINT `FK_centrodecostos` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_centrodecostos1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `centrodecostos` */

insert  into `centrodecostos`(`idCentroDeCosto`,`nombrecentro`,`fecharegistro`,`ultimamodificacion`,`Idsucursal`,`idusuario`) values (1,'casa central produccion','2017-12-16 10:37:39','2017-12-16 10:37:44',1,1),(2,'SUCURSAL LAMBARE','2018-09-30 17:42:16','2018-09-30 17:44:01',8,1),(3,'SUCURSAL LAMBARE','2018-09-30 17:44:40','0000-00-00 00:00:00',1,1),(4,'SUCURSAL LAMBARE','2018-09-30 17:44:47','0000-00-00 00:00:00',2,1),(5,'','2018-10-03 21:05:58','0000-00-00 00:00:00',16,1),(6,'costo tesddd','2018-10-22 20:52:23','2018-11-10 14:13:04',7,1);

/*Table structure for table `centrodeproduccion` */

DROP TABLE IF EXISTS `centrodeproduccion`;

CREATE TABLE `centrodeproduccion` (
  `idCentroDeProduccion` int(11) NOT NULL,
  `centrodeproduccion` varchar(45) NOT NULL,
  PRIMARY KEY (`idCentroDeProduccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `centrodeproduccion` */

insert  into `centrodeproduccion`(`idCentroDeProduccion`,`centrodeproduccion`) values (1,'produccion cocinaoooo'),(2,'produccion rotiseriasssss'),(3,'nuevo cetro'),(4,'nuevo cetro'),(5,'costo dosssssssss'),(6,'cento'),(7,''),(9,'ottro mas');

/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `codigociudad` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `codigopais` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigociudad`),
  KEY `FK_ciudad` (`codigopais`),
  CONSTRAINT `FK_ciudad` FOREIGN KEY (`codigopais`) REFERENCES `pais` (`codigopais`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ciudad` */

insert  into `ciudad`(`codigociudad`,`descripcion`,`codigopais`) values (1,'ASUNCION',1),(2,'LUQUE',1),(3,'Mariano Roque Alonso',1),(4,'Nueva Colombia',1),(5,'CAPIATA',1);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `Ci_cliente` int(11) NOT NULL,
  `clinombres` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `codigociudad` int(11) NOT NULL,
  `codigopais` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`Ci_cliente`,`id`),
  KEY `FK_cliente` (`codigociudad`),
  KEY `FK_cliente1` (`codigopais`),
  CONSTRAINT `FK_cliente` FOREIGN KEY (`codigociudad`) REFERENCES `ciudad` (`codigociudad`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_cliente1` FOREIGN KEY (`codigopais`) REFERENCES `pais` (`codigopais`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`Ci_cliente`,`clinombres`,`Direccion`,`Telefono`,`codigociudad`,`codigopais`,`id`) values (4444,'aldo','fafdf',21458,1,1,6),(455877,'mariano','ffff',22447,1,1,7),(4524242,'ALDO AREVALOS','OPTASIANO GOMEZ Y ESPERANZA',99450469,1,1,1),(4524242,'alo','500',21444,2,1,3),(4542224,'arevalos','ootasuiab66',2556,4,1,5),(6484477,'MARIO ARIEL AREVALO ORTIZ','OPTASIANO GOMEZ C/ ESPERANZA',972772404,1,2,4),(45242423,'aldo arevalos ortiz','mariano',21900001,2,2,2);

/*Table structure for table `cobrocabecera` */

DROP TABLE IF EXISTS `cobrocabecera`;

CREATE TABLE `cobrocabecera` (
  `idCobroCabecera` int(11) NOT NULL,
  `idPuntodeventa` int(11) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `Ci_cliente` int(11) NOT NULL,
  `idFormasDePago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `notas` varchar(45) NOT NULL,
  PRIMARY KEY (`idCobroCabecera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cobrocabecera` */

/*Table structure for table `cobrodetalle` */

DROP TABLE IF EXISTS `cobrodetalle`;

CREATE TABLE `cobrodetalle` (
  `idCobroCabecera` int(11) NOT NULL,
  `idCuentasACobrar` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `cuenta_monto` int(11) NOT NULL,
  PRIMARY KEY (`idCobroCabecera`,`idCuentasACobrar`,`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cobrodetalle` */

/*Table structure for table `compracabecera` */

DROP TABLE IF EXISTS `compracabecera`;

CREATE TABLE `compracabecera` (
  `id_compra` int(11) NOT NULL,
  `nrcomprobante` double NOT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  `fecha` date DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `RucProveedor` varchar(45) DEFAULT NULL,
  `Idsucursal` int(11) DEFAULT NULL,
  `idCentroDeCosto` int(11) DEFAULT NULL,
  `idordencompra` int(11) DEFAULT NULL,
  `TipoDeComprobante` varchar(45) DEFAULT NULL,
  `vencimientotimbrado` date DEFAULT NULL,
  `terminosdepago` varchar(45) DEFAULT NULL,
  `Notas` varchar(45) DEFAULT NULL,
  `cantidaddecuotas` int(11) DEFAULT '1',
  `plazodecredito` int(11) DEFAULT NULL,
  `idcuentabanco` int(11) DEFAULT '1',
  `codigoalmacen` int(11) DEFAULT NULL,
  `iva` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `FK_compracabecera` (`RucProveedor`),
  KEY `FK_compracabecera2` (`idcuentabanco`),
  KEY `FK_compracabecera3` (`codigoalmacen`),
  KEY `FK_compracabecera4` (`idCentroDeCosto`),
  KEY `FK_compracabecera5` (`Idsucursal`),
  KEY `FK_compracabecera6` (`idordencompra`),
  CONSTRAINT `FK_compracabecera` FOREIGN KEY (`RucProveedor`) REFERENCES `proveedor` (`RucProveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_compracabecera2` FOREIGN KEY (`idcuentabanco`) REFERENCES `bancos` (`idcuentabanco`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_compracabecera3` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_compracabecera4` FOREIGN KEY (`idCentroDeCosto`) REFERENCES `centrodecostos` (`idCentroDeCosto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_compracabecera5` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_compracabecera6` FOREIGN KEY (`idordencompra`) REFERENCES `ordencompracabecera` (`idordencompra`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `compracabecera` */

insert  into `compracabecera`(`id_compra`,`nrcomprobante`,`estado`,`fecha`,`fecharegistro`,`RucProveedor`,`Idsucursal`,`idCentroDeCosto`,`idordencompra`,`TipoDeComprobante`,`vencimientotimbrado`,`terminosdepago`,`Notas`,`cantidaddecuotas`,`plazodecredito`,`idcuentabanco`,`codigoalmacen`,`iva`) values (1,127,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,0,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,127,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,127,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,127,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,127,NULL,NULL,'0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,127,NULL,NULL,'0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,127,'ACTIVO','2018-08-22','0000-00-00 00:00:00',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,127,'ACTIVO','2018-08-24','0000-00-00 00:00:00',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,127,'ACTIVO','2018-08-24','2018-08-29 14:04:39',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,127,'ACTIVO','2018-08-24','2018-08-29 14:29:42','80022302-6',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,127,'ACTIVO','2018-08-24','2018-08-29 14:30:02','8002141-6',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,127,'ACTIVO','2018-08-31','2018-08-29 19:41:31','80022302-6',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,127,'ACTIVO','2018-08-31','2018-08-29 19:41:51','80022302-6',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,127,'ACTIVO','2018-08-31','2018-08-29 19:44:02','80022302-6',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,127,'ACTIVO','2018-08-31','2018-08-29 19:53:47','80022302-6',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,127,'ACTIVO','2018-08-17','2018-08-29 19:56:51','80022302-6',1,1,6,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(26,127,'ACTIVO','2018-08-25','2018-08-29 20:01:31','80022302-6',1,1,1,'Factura',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,127,'ACTIVO','2018-08-25','2018-08-29 20:04:44','80022302-6',1,1,4,'Factura','2018-08-31',NULL,NULL,1,NULL,NULL,NULL,NULL),(28,127,'ACTIVO','2018-08-25','2018-08-29 20:06:48','80022302-6',1,1,5,'Factura','2018-08-31','Credito',NULL,1,NULL,NULL,NULL,NULL),(29,127,'ACTIVO','2018-08-25','2018-08-29 20:08:55','80022302-6',1,1,6,'Factura','2018-08-31','Credito','nota nueva',1,NULL,NULL,NULL,NULL),(30,127,'ACTIVO','2018-08-25','2018-08-29 20:36:05','8002141-6',1,1,4,'Factura','2018-08-31','Credito','notas compra',1,31,NULL,NULL,NULL),(31,127,'ACTIVO','2018-08-25','2018-08-29 20:56:44','80022302-6',1,1,3,'Factura','2018-08-31','Credito','notas compra',1,31,1,4,NULL),(32,127,'ACTIVO','2018-08-22','2018-08-30 19:04:09','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(33,127,'ACTIVO','2018-08-22','2018-08-30 19:05:45','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(34,127,'ACTIVO','2018-08-22','2018-08-30 19:07:23','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(35,127,'ACTIVO','2018-08-22','2018-08-30 19:08:10','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(36,127,'ACTIVO','2018-08-22','2018-08-30 19:12:48','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(37,127,'ACTIVO','2018-08-22','2018-08-30 19:17:05','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(38,127,'ACTIVO','2018-08-22','2018-08-30 19:17:33','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(39,1003010250,'ACTIVO','2018-08-22','2018-08-30 19:24:30','8002141-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(40,0,'ACTIVO','2018-08-22','2018-08-30 19:40:36','8002141-6',1,1,2,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(41,5544488841,'ACTIVO','2018-08-22','2018-08-30 19:45:04','8002141-6',1,1,2,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(42,5544488841,'ACTIVO','2018-08-22','2018-08-30 19:53:57','8002141-6',1,1,5,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(43,5544488841,'ACTIVO','2018-08-22','2018-08-30 20:22:42','80022302-6',1,1,6,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(44,5544488841,'ACTIVO','2018-08-22','2018-08-30 20:27:01','80022302-6',1,1,3,'Factura','2018-08-15','Contado','notas or',1,31,1,5,NULL),(45,5544488841,'ACTIVO','2018-08-22','2018-08-30 20:56:48','8002141-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(46,5544488841,'ACTIVO','2018-08-22','2018-08-30 20:59:45','80022302-6',1,1,1,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(47,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:00:46','8002141-6',1,1,3,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(48,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:02:28','80022302-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(49,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:03:35','8002141-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(50,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:14:18','80022302-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(51,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:16:16','80022302-6',1,1,1,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(52,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:18:19','80022302-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,'80022302-4'),(53,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:20:45','80022302-6',1,1,1,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,''),(54,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:22:53','80022302-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(55,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:26:08','8002141-6',1,1,1,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(56,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:29:17','8002141-6',1,1,4,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(57,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:29:43','8002141-6',1,1,4,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(58,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:31:35','80022302-6',1,1,1,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(59,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:32:18','8002141-6',1,1,4,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(60,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:33:41','80022302-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(61,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:44:37','80022302-6',1,1,5,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(62,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:47:07','80022302-6',1,1,5,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(63,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:48:11','8002141-6',1,1,4,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(64,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:48:43','80022302-6',1,1,1,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(65,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:50:17','80022302-6',1,1,1,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(66,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:50:56','8002141-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(67,5544488841,'ACTIVO','2018-08-22','2018-08-30 21:52:54','8002141-6',1,1,2,'Factura','2018-08-15','Contado','nueva orden',1,31,1,5,NULL),(68,100200300,'ACTIVO','2018-09-29','2018-09-01 09:16:14','8002141-6',1,1,2,'Factura','2018-09-20','Contado','compra primra jornada',1,26,1,1,NULL),(69,100200300,'ACTIVO','2018-09-29','2018-09-01 09:16:36','8002141-6',1,1,2,'Factura','2018-09-20','Contado','compra primra jornada',1,26,1,1,NULL),(70,100200300,'ACTIVO','2018-09-29','2018-09-01 09:20:10','80022302-6',1,1,2,'Factura','2018-09-20','Contado','compra primra jornada',1,26,1,1,NULL),(71,100200300,'ACTIVO','2018-09-29','2018-09-01 09:20:46','80022302-6',1,1,2,'Factura','2018-09-20','Contado','compra primra jornada',1,26,1,1,NULL),(72,100200300,'ACTIVO','2018-09-29','2018-09-01 09:32:52','80022302-6',1,1,2,'Factura','2018-09-20','Contado','compra primra jornada',1,26,1,1,NULL),(73,10023003,'ACTIVO','2018-09-27','2018-09-01 14:08:04','8002141-6',1,1,2,'Factura','2018-09-12','Credito','nota nueva',1,22,1,1,NULL),(74,100236554,'ACTIVO','2018-09-13','2018-09-01 16:54:44','8002141-6',1,1,2,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(75,100236554,'ACTIVO','2018-09-13','2018-09-01 16:55:12','8002141-6',1,1,2,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(76,100236554,'ACTIVO','2018-09-13','2018-09-01 16:56:32','8002141-6',1,1,2,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(77,100236554,'ACTIVO','2018-09-13','2018-09-01 16:57:03','8002141-6',1,1,2,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(78,100236554,'ACTIVO','2018-09-13','2018-09-01 16:57:37','8002141-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(79,100236554,'ACTIVO','2018-09-13','2018-09-01 17:01:58','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(80,100236554,'ACTIVO','2018-09-13','2018-09-01 17:02:48','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(81,100236554,'ACTIVO','2018-09-13','2018-09-01 17:03:33','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(82,100236554,'ACTIVO','2018-09-13','2018-09-01 17:04:41','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,''),(83,100236554,'ACTIVO','2018-09-13','2018-09-01 17:07:27','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,''),(84,100236554,'ACTIVO','2018-09-13','2018-09-01 17:07:53','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,''),(85,100236554,'ACTIVO','2018-09-13','2018-09-01 17:08:47','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(86,100236554,'ACTIVO','2018-09-13','2018-09-01 17:09:15','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(87,100236554,'ACTIVO','2018-09-13','2018-09-01 17:11:23','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(88,100236554,'ACTIVO','2018-09-13','2018-09-01 17:11:52','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(89,100236554,'ACTIVO','2018-09-13','2018-09-01 17:12:19','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(90,100236554,'ACTIVO','2018-09-13','2018-09-01 17:13:20','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(91,100236554,'ACTIVO','2018-09-13','2018-09-01 17:14:07','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(92,100236554,'ACTIVO','2018-09-13','2018-09-01 17:15:48','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(93,100236554,'ACTIVO','2018-09-13','2018-09-01 17:16:56','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(94,100236554,'ACTIVO','2018-09-13','2018-09-01 17:17:09','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(95,100236554,'ACTIVO','2018-09-13','2018-09-01 17:18:19','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(96,100236554,'ACTIVO','2018-09-13','2018-09-01 17:19:11','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(97,100236554,'ACTIVO','2018-09-13','2018-09-01 17:19:35','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(98,100236554,'ACTIVO','2018-09-13','2018-09-01 17:20:12','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(99,100236554,'ACTIVO','2018-09-13','2018-09-01 17:20:23','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(100,100236554,'ACTIVO','2018-09-13','2018-09-01 17:20:43','80022302-6',1,1,6,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(101,100236554,'ACTIVO','2018-09-13','2018-09-01 17:21:10','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(102,100236554,'ACTIVO','2018-09-13','2018-09-01 17:21:39','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(103,100236554,'ACTIVO','2018-09-13','2018-09-01 17:24:15','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(104,100236554,'ACTIVO','2018-09-13','2018-09-01 17:25:25','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(105,100236554,'ACTIVO','2018-09-13','2018-09-01 17:26:04','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(106,100236554,'ACTIVO','2018-09-13','2018-09-01 17:27:08','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(107,100236554,'ACTIVO','2018-09-13','2018-09-01 17:30:56','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(108,100236554,'ACTIVO','2018-09-13','2018-09-01 17:31:29','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(109,100236554,'ACTIVO','2018-09-13','2018-09-01 17:31:41','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(110,100236554,'ACTIVO','2018-09-13','2018-09-01 17:32:25','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(111,100236554,'ACTIVO','2018-09-13','2018-09-01 17:32:29','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(112,100236554,'ACTIVO','2018-09-13','2018-09-01 17:32:41','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(113,100236554,'ACTIVO','2018-09-13','2018-09-01 17:32:51','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(114,100236554,'ACTIVO','2018-09-13','2018-09-01 17:35:46','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(115,100236554,'ACTIVO','2018-09-13','2018-09-01 17:36:21','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(116,100236554,'ACTIVO','2018-09-13','2018-09-01 17:36:24','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(117,100236554,'ACTIVO','2018-09-13','2018-09-01 17:36:57','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(118,100236554,'ACTIVO','2018-09-13','2018-09-01 17:37:14','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(119,100236554,'ACTIVO','2018-09-13','2018-09-01 17:38:52','80022302-6',1,1,3,'Factura','2018-09-26','Contado','compra numero dos',1,22,1,1,NULL),(120,100200300,'ACTIVO','2018-09-27','2018-09-02 18:06:04','8002141-6',1,1,4,'Factura','2018-09-26','Credito','compra primra jornada',1,29,1,1,NULL),(121,100200300,'ACTIVO','2018-10-10','2018-10-06 11:00:04','80000-1',1,1,1,'Factura','2018-10-03','Contado','notas or',1,11,1,1,NULL),(122,100200123,'ACTIVO','2018-11-01','2018-11-18 19:53:12','80000-1',1,1,1,'Cheque','2018-11-01','Contado','compra numero dos',1,10,1,1,NULL);

/*Table structure for table `compradetalle` */

DROP TABLE IF EXISTS `compradetalle`;

CREATE TABLE `compradetalle` (
  `id_compra` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `iva5` double DEFAULT NULL,
  `iva10` int(11) DEFAULT NULL,
  `id` varchar(250) NOT NULL,
  PRIMARY KEY (`id_compra`,`codigoproducto`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `compradetalle` */

insert  into `compradetalle`(`id_compra`,`codigoproducto`,`cantidad`,`precio`,`descuento`,`iva5`,`iva10`,`id`) values (0,1,1,500,NULL,NULL,NULL,'0'),(16,2,4,33000,NULL,NULL,NULL,'5b86dc13dd865'),(16,2,4,33000,NULL,NULL,NULL,'5b86dc13e2629'),(16,40,4,685685,NULL,NULL,NULL,'5b86dc13e5a58'),(17,2,77,33000,NULL,NULL,NULL,'5b86dc43cf187'),(17,2,78,33000,NULL,NULL,NULL,'5b86dc43d406c'),(17,29,477,5000,NULL,NULL,NULL,'5b86dc43e8454'),(17,40,4,685685,NULL,NULL,NULL,'5b86dc43d734a'),(17,40,7,685685,NULL,NULL,NULL,'5b86dc43e3804'),(18,2,77,33000,NULL,NULL,NULL,'5b86df9d8c0b5'),(18,2,78,33000,NULL,NULL,NULL,'5b86df9d91a07'),(18,29,477,5000,NULL,NULL,NULL,'5b86df9da5d9b'),(18,40,4,685685,NULL,NULL,NULL,'5b86df9d9dc61'),(18,40,7,685685,NULL,NULL,NULL,'5b86df9da299a'),(19,1,45,32000,NULL,NULL,NULL,'5b86e367e3b2e'),(19,1,4,32000,NULL,NULL,NULL,'5b86e367f0fbd'),(19,2,4,33000,NULL,NULL,NULL,'5b86e1ccc172b'),(19,2,4,33000,NULL,NULL,NULL,'5b86e1ccc8d79'),(20,1,4,32000,NULL,NULL,NULL,'5b872e48370e0'),(20,1,4,32000,NULL,NULL,NULL,'5b872e483f388'),(20,29,4,5000,NULL,NULL,NULL,'5b872dbc5a73b'),(20,29,4,5000,NULL,NULL,NULL,'5b872dbc664e5'),(20,29,4,5000,NULL,NULL,NULL,'5b872de5de4dd'),(20,29,4,5000,NULL,NULL,NULL,'5b872de5e8a00'),(20,40,4,685685,NULL,NULL,NULL,'5b872dbc6eaea'),(20,40,4,685685,NULL,NULL,NULL,'5b872de5f3ef3'),(20,47,4,55,NULL,NULL,NULL,'5b872e484715c'),(21,30,5,5000,NULL,NULL,NULL,'5b872f2b8ed82'),(21,30,5,5000,NULL,NULL,NULL,'5b872f2b96d3d'),(22,30,5,5000,NULL,NULL,NULL,'5b872f4004eae'),(22,30,5,5000,NULL,NULL,NULL,'5b872f400d244'),(23,2,4,33000,NULL,NULL,NULL,'5b8731aa35b60'),(23,30,5,5000,NULL,NULL,NULL,'5b872fc27b382'),(23,30,5,5000,NULL,NULL,NULL,'5b872fc2836e8'),(23,49,9,55,NULL,NULL,NULL,'5b8731aa49df1'),(24,40,4,685685,NULL,NULL,NULL,'5b87320b16058'),(24,40,4,685685,NULL,NULL,NULL,'5b87320b1df64'),(24,40,4,685685,NULL,NULL,NULL,'5b873273c5011'),(24,40,4,685685,NULL,NULL,NULL,'5b873273d992f'),(24,40,4,685685,NULL,NULL,NULL,'5b873273e1c43'),(25,29,4,5000,NULL,NULL,NULL,'5b8732c391b6a'),(28,40,4,685685,NULL,NULL,NULL,'5b87351844a80'),(28,40,4,685685,NULL,NULL,NULL,'5b8735184cc57'),(29,30,4,5000,NULL,NULL,NULL,'5b8735974ece0'),(29,30,4,5000,NULL,NULL,NULL,'5b87359757037'),(31,2,4,33000,NULL,NULL,NULL,'5b88757dd17c5'),(31,2,4,33000,NULL,NULL,NULL,'5b88757ddfc88'),(31,2,4,33000,NULL,NULL,NULL,'5b8875edb94ca'),(31,2,4,33000,NULL,NULL,NULL,'5b8875edc3b75'),(31,30,4,5000,NULL,NULL,NULL,'5b8740cd124d3'),(31,30,4,5000,NULL,NULL,NULL,'5b8740cd1a48e'),(32,39,4,500,NULL,NULL,NULL,'5b8877b6112d9'),(32,39,4,500,NULL,NULL,NULL,'5b8877b621ae3'),(32,39,4,500,NULL,NULL,NULL,'5b8877e929c72'),(32,39,4,500,NULL,NULL,NULL,'5b8877e931cb1'),(33,39,4,500,NULL,NULL,NULL,'5b88784935323'),(33,39,4,500,NULL,NULL,NULL,'5b887849423c1'),(34,39,0,500,NULL,NULL,NULL,'5b8878ab539b3'),(34,39,0,500,NULL,NULL,NULL,'5b8878ab61241'),(35,39,0.4,500,NULL,NULL,NULL,'5b8878dab60db'),(35,39,0.4,500,NULL,NULL,NULL,'5b8878dabe027'),(36,39,0.4,500,NULL,NULL,NULL,'5b8879b535c09'),(36,39,0.4,500,NULL,NULL,NULL,'5b8879b54a3c7'),(36,39,0.4,500,NULL,NULL,NULL,'5b8879f0385ed'),(36,39,0.4,500,NULL,NULL,NULL,'5b8879f040783'),(36,39,0.4,500,NULL,NULL,NULL,'5b887a4cae559'),(36,39,0.4,500,NULL,NULL,NULL,'5b887a4cc0a87'),(37,39,0.4,500,NULL,NULL,NULL,'5b887a68a429b'),(37,39,0.4,500,NULL,NULL,NULL,'5b887a68b2226'),(37,39,0.4,500,NULL,NULL,NULL,'5b887a94ec6ce'),(37,39,0.4,500,NULL,NULL,NULL,'5b887a950a9da'),(37,39,0.4,500,NULL,NULL,NULL,'5b887af172be2'),(37,39,0.4,500,NULL,NULL,NULL,'5b887af17ac6e'),(38,39,0.4,500,NULL,NULL,NULL,'5b887b0d1da5e'),(38,39,0.4,500,NULL,NULL,NULL,'5b887b0d2610d'),(39,39,0.4,500,NULL,NULL,NULL,'5b887c38c9209'),(39,39,0.4,500,NULL,NULL,NULL,'5b887c38d754e'),(39,39,0.4,500,NULL,NULL,NULL,'5b887c7c59115'),(39,39,0.4,500,NULL,NULL,NULL,'5b887c7c6c4a6'),(39,39,0.4,500,NULL,NULL,NULL,'5b887c9166bd3'),(39,39,0.4,500,NULL,NULL,NULL,'5b887c9176dc2'),(39,39,0.4,500,NULL,NULL,NULL,'5b887cae1ef10'),(39,39,0.4,500,NULL,NULL,NULL,'5b887cae2453d'),(40,2,4,33000,NULL,NULL,NULL,'5b888074ede53'),(40,2,4,33000,NULL,NULL,NULL,'5b888074f417a'),(41,39,4,500,NULL,NULL,NULL,'5b8881802bba6'),(41,39,4,500,NULL,NULL,NULL,'5b88818031185'),(42,29,5,5000,NULL,NULL,NULL,'5b888395acade'),(42,29,4,5000,NULL,NULL,NULL,'5b888395b20c2'),(43,1,4,32000,NULL,NULL,NULL,'5b8888850fa00'),(43,1,1,32000,NULL,NULL,NULL,'5b88888516da2'),(43,1,4,32000,NULL,NULL,NULL,'5b8888993ff1d'),(43,1,1,32000,NULL,NULL,NULL,'5b8888996ea4f'),(43,30,4,5000,NULL,NULL,NULL,'5b8889bfcf760'),(43,30,4,5000,NULL,NULL,NULL,'5b8889bfdca74'),(43,30,1,5000,NULL,NULL,NULL,'5b8889bfe3054'),(43,30,3,5000,NULL,NULL,NULL,'5b8889bfe8620'),(43,30,4,5000,1111,NULL,NULL,'5b888a52cdb4c'),(43,30,4,5000,0,NULL,NULL,'5b888a52d3069'),(44,29,4,5000,4000,NULL,NULL,'5b888b55c7db1'),(44,29,4,5000,2000,NULL,NULL,'5b888b55cd3b8'),(44,29,4,5000,4000,NULL,NULL,'5b888b55d2a42'),(44,29,4,5000,0,NULL,NULL,'5b888b55d80cf'),(45,1,2,32000,0,NULL,NULL,'5b888c8557ffb'),(45,1,2,32000,0,NULL,NULL,'5b888c856807c'),(45,1,3,32000,15000,NULL,NULL,'5b888c856e4e4'),(45,1,2,32000,0,NULL,NULL,'5b888c8573b8d'),(45,1,2,32000,0,NULL,NULL,'5b888c85791e1'),(45,1,1,32000,1,NULL,NULL,'5b888c857e885'),(45,1,2,32000,0,NULL,NULL,'5b888ca62efc2'),(45,1,2,32000,0,NULL,NULL,'5b888ca63b13e'),(45,1,3,32000,15000,NULL,NULL,'5b888ca64078b'),(45,1,2,32000,0,NULL,NULL,'5b888ca645d91'),(45,1,2,32000,0,NULL,NULL,'5b888ca64b42d'),(45,1,1,32000,1,2909.0990909,NULL,'5b888ca650a8f'),(50,2,4,33000,444,NULL,NULL,'5b88966a3129f'),(50,2,3,33000,0,NULL,NULL,'5b88966a37807'),(51,2,4,33000,4,NULL,NULL,'5b8896e0828b9'),(52,1,4,32000,0,NULL,NULL,'5b88975b117a8'),(53,1,4,32000,4000,NULL,NULL,'5b8897ed2f2ad'),(53,2,4,33000,4,NULL,NULL,'5b8897ed34b25'),(54,1,4,32000,4,NULL,NULL,'5b88986d5cc93'),(54,1,4,32000,4,NULL,NULL,'5b8898a1d80d4'),(54,1,4,32000,0,NULL,NULL,'5b8898a1e76cc'),(54,2,4,33000,4,NULL,NULL,'5b88986d62303'),(55,1,4,32000,4,NULL,NULL,'5b8898c30ff0c'),(55,1,4,32000,0,NULL,NULL,'5b8898c31d045'),(55,1,4,32000,0,NULL,NULL,'5b88993070281'),(55,1,4,32000,0,NULL,NULL,'5b889930758e4'),(57,2,4,33000,4,2,NULL,'5b889a07b9c59'),(57,2,4,33000,0,2,NULL,'5b889a07c1774'),(58,1,4,32000,44,1,NULL,'5b889a775cc2e'),(58,2,4,33000,0,2,NULL,'5b889a7763605'),(67,3,4,460651065016,0,NULL,NULL,'5b889f76e0925'),(67,3,4,460651065016,0,NULL,NULL,'5b889f76e70b0'),(70,3,4,460651065016,400,NULL,NULL,'5b8a920ae264e'),(70,3,4,460651065016,0,NULL,NULL,'5b8a920ae7d92'),(71,3,4,460651065016,400,NULL,NULL,'5b8a922eed4cb'),(71,3,4,460651065016,0,NULL,NULL,'5b8a922ef2b47'),(72,3,4,460651065016,400,NULL,NULL,'5b8a9504f3614'),(72,3,4,460651065016,0,NULL,NULL,'5b8a950505c6e'),(73,2,4,33000,500,NULL,NULL,'5b8ad584a39f5'),(73,40,6,685685,0,NULL,NULL,'5b8ad584a90ce'),(81,29,1,5000,0,NULL,NULL,'5b8afea5cfd74'),(81,29,1,5000,0,NULL,NULL,'5b8afea5d55d6'),(82,29,1,5000,0,NULL,NULL,'5b8afee9a04be'),(82,29,1,5000,0,NULL,NULL,'5b8afee9a5c52'),(83,29,1,5000,0,NULL,NULL,'5b8aff8f37c93'),(83,29,1,5000,0,NULL,NULL,'5b8aff8f418c8'),(84,29,1,5000,0,NULL,NULL,'5b8affaa0079c'),(84,29,1,5000,0,NULL,NULL,'5b8affaa087f8'),(85,29,1,5000,0,NULL,NULL,'5b8affe005409'),(85,29,1,5000,0,NULL,NULL,'5b8affe00b6fe'),(86,29,1,5000,0,NULL,NULL,'5b8afffc01197'),(86,29,1,5000,0,NULL,NULL,'5b8afffc067e8'),(88,29,1,5000,0,NULL,NULL,'5b8b00986599f'),(88,29,1,5000,0,NULL,NULL,'5b8b00986c509'),(90,29,1,5000,0,NULL,NULL,'5b8b00f0e51e4'),(90,29,1,5000,0,NULL,NULL,'5b8b00f0ebe86'),(91,29,1,5000,0,NULL,NULL,'5b8b011fcb290'),(91,29,1,5000,0,NULL,NULL,'5b8b011fd1edc'),(94,29,1,5000,0,1523.8095238095239,NULL,'5b8b01d5df771'),(94,29,1,5000,0,1523.8095238095239,NULL,'5b8b01d5e8e27'),(95,3,5,460651065016,0,1523.8095238095239,NULL,'5b8b021b90365'),(95,29,1,5000,0,1523.8095238095239,NULL,'5b8b021b82c11'),(95,29,1,5000,0,1523.8095238095239,NULL,'5b8b021b8987f'),(102,1,4,32000,0,1523.8095238095239,NULL,'5b8b02e3eacc4'),(102,1,4,32000,0,1523.8095238095239,NULL,'5b8b02e404491'),(102,2,4,33000,0,1523.8095238095239,NULL,'5b8b02e40b019'),(103,1,4,32000,0,1523.8095238095239,NULL,'5b8b037f51468'),(103,1,4,32000,0,1523.8095238095239,NULL,'5b8b037f5802c'),(103,1,4,32000,0,1523.8095238095239,NULL,'5b8b037f69881'),(103,40,4,685685,0,1523.8095238095239,NULL,'5b8b037f617c5'),(118,1,4,32000,0,1571.4285714285713,NULL,'5b8b068ac5ce7'),(118,1,4,32000,0,1571.4285714285713,NULL,'5b8b068acc56f'),(118,1,4,32000,0,1571.4285714285713,NULL,'5b8b068ad73ea'),(118,40,4,685685,0,1571.4285714285713,NULL,'5b8b068ad1bf3'),(119,1,4,32000,0,NULL,NULL,'5b8b06ece8aa6'),(119,1,4,32000,0,NULL,NULL,'5b8b06ecef686'),(119,1,4,32000,0,NULL,NULL,'5b8b06ed074cc'),(119,40,4,685685,0,NULL,NULL,'5b8b06ed01e54'),(120,1,5,32000,500,NULL,NULL,'5b8c5e52955e7'),(120,1,4,32000,0,NULL,NULL,'5b8c5e529da12'),(120,1,5,32000,500,NULL,NULL,'5b8c5eccaefe5'),(120,1,4,32000,0,NULL,NULL,'5b8c5eccb72ee'),(121,1,4,32000,0,NULL,NULL,'5bb8cdf4d2ced'),(121,64,4,500,0,NULL,NULL,'5bb8cdf4d8347'),(122,1,4,32000,500,NULL,NULL,'5bf1ed586be44'),(122,70,4,522,4,NULL,NULL,'5bf1ed5873fa6');

/*Table structure for table `controldecalidadcabecera` */

DROP TABLE IF EXISTS `controldecalidadcabecera`;

CREATE TABLE `controldecalidadcabecera` (
  `idControlDeCalidad` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `PersonaAcargo` varchar(45) NOT NULL,
  `Observacion` varchar(45) NOT NULL,
  `EstadodeProducto` varchar(45) NOT NULL,
  `CondicionParaLaventa` varchar(45) DEFAULT NULL,
  `codigoalmacen` int(11) NOT NULL,
  `idIngreso` int(11) NOT NULL,
  PRIMARY KEY (`idControlDeCalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `controldecalidadcabecera` */

/*Table structure for table `controldecalidaddetalle` */

DROP TABLE IF EXISTS `controldecalidaddetalle`;

CREATE TABLE `controldecalidaddetalle` (
  `idControlDeCalidad` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidadverififcada` int(11) NOT NULL,
  `precio` double NOT NULL,
  `cantidad_aprobada` int(11) NOT NULL,
  PRIMARY KEY (`idControlDeCalidad`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `controldecalidaddetalle` */

/*Table structure for table `controldecostos` */

DROP TABLE IF EXISTS `controldecostos`;

CREATE TABLE `controldecostos` (
  `idControlDeCostos` int(11) NOT NULL,
  `idorden` int(11) NOT NULL,
  `idFormulas` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  PRIMARY KEY (`idControlDeCostos`,`idorden`,`idFormulas`,`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `controldecostos` */

/*Table structure for table `creditodebitocabeceraventa` */

DROP TABLE IF EXISTS `creditodebitocabeceraventa`;

CREATE TABLE `creditodebitocabeceraventa` (
  `idCreditoDebitoVenta` int(11) NOT NULL,
  `Empresa` varchar(45) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `Ci_cliente` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `NumeroDeComprobante` int(11) NOT NULL,
  `NumeroDeFactura` int(11) NOT NULL,
  `tipodecomprobante` varchar(45) NOT NULL,
  `codigoalmacen` int(11) NOT NULL,
  PRIMARY KEY (`idCreditoDebitoVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `creditodebitocabeceraventa` */

/*Table structure for table `creditodebitoventadetalle` */

DROP TABLE IF EXISTS `creditodebitoventadetalle`;

CREATE TABLE `creditodebitoventadetalle` (
  `idCreditoDebitoVenta` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `iva 5` int(11) NOT NULL,
  `iva 10` int(11) NOT NULL,
  `codigoalmacen` int(11) NOT NULL,
  PRIMARY KEY (`idCreditoDebitoVenta`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `creditodebitoventadetalle` */

/*Table structure for table `creditoydebitocabecera` */

DROP TABLE IF EXISTS `creditoydebitocabecera`;

CREATE TABLE `creditoydebitocabecera` (
  `idcreditodebito` int(11) NOT NULL,
  `nrcomprobante` int(11) NOT NULL,
  `rucempresa` varchar(45) NOT NULL,
  `nrfactura` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `notas` varchar(45) NOT NULL,
  `RucProveedor` varchar(45) NOT NULL,
  `id_compra` int(11) DEFAULT NULL,
  `tipodecomprobante` varchar(45) DEFAULT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`idcreditodebito`),
  KEY `FK_creditoydebitocabecera` (`id_compra`),
  KEY `FK_creditoydebitocabecera1` (`RucProveedor`),
  KEY `FK_creditoydebitocabecera2` (`rucempresa`),
  CONSTRAINT `FK_creditoydebitocabecera` FOREIGN KEY (`id_compra`) REFERENCES `compracabecera` (`id_compra`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_creditoydebitocabecera1` FOREIGN KEY (`RucProveedor`) REFERENCES `proveedor` (`RucProveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_creditoydebitocabecera2` FOREIGN KEY (`rucempresa`) REFERENCES `empresa` (`rucempresa`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `creditoydebitocabecera` */

insert  into `creditoydebitocabecera`(`idcreditodebito`,`nrcomprobante`,`rucempresa`,`nrfactura`,`fecha`,`notas`,`RucProveedor`,`id_compra`,`tipodecomprobante`,`estado`) values (1,5000,'80022202-4',1002011,'2018-11-22 11:36:35','notas','8002141-6',1,'credito','ACTIVO'),(2,10010014,'80022202-4',127,'2018-11-09 00:00:00','nota nueva','80000-1',2,'Para Nota de Credito','ACTIVO'),(3,10010014,'80022202-4',127,'2018-11-09 00:00:00','nota nueva','80000-1',3,'Para Nota de Credito','ACTIVO'),(4,10010014,'80022202-4',127,'2018-11-09 00:00:00','nota nueva','80000-1',4,'Para Nota de Credito','ACTIVO'),(5,10010014,'80022202-4',127,'2018-11-09 00:00:00','nota nueva','80022202-2',1,'Para Nota de Credito','ACTIVO'),(6,1002447777,'80022202-4',127,'2018-11-08 00:00:00','nota nueva','8002141-6',1,'Para Nota de Debito','ACTIVO'),(7,1002447777,'80022202-4',127,'2018-11-08 00:00:00','nota nueva','8002141-6',1,'Para Nota de Debito','ACTIVO'),(8,1002447777,'80022202-4',127,'2018-11-08 00:00:00','nota nueva','8002141-6',1,'Para Nota de Debito','ACTIVO');

/*Table structure for table `creditoydebitodetalle` */

DROP TABLE IF EXISTS `creditoydebitodetalle`;

CREATE TABLE `creditoydebitodetalle` (
  `idcreditodebito` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciounitario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `IVA5` int(11) DEFAULT NULL,
  `IVA10` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) NOT NULL,
  PRIMARY KEY (`idcreditodebito`,`codigoproducto`),
  KEY `FK_creditoydebitodetalle` (`codigoalmacen`),
  CONSTRAINT `FK_creditoydebitodetalle` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `creditoydebitodetalle` */

insert  into `creditoydebitodetalle`(`idcreditodebito`,`codigoproducto`,`cantidad`,`preciounitario`,`fecha`,`IVA5`,`IVA10`,`codigoalmacen`) values (1,1,1,500,'2018-11-22',5,5,1),(4,1,32000,4,'2018-11-09',5,5,12),(4,2,33000,4,'2018-11-09',5,5,12),(5,1,32000,4,'2018-11-09',5,5,12),(5,28,32000,8,'2018-11-09',5,5,12),(6,1,32000,1,'2018-11-08',5,10,11),(6,28,32000,1,'2018-11-08',5,10,11),(7,1,32000,1,'2018-11-08',NULL,NULL,11),(7,28,32000,1,'2018-11-08',NULL,NULL,11),(8,1,32000,1,'2018-11-08',NULL,NULL,11),(8,28,32000,1,'2018-11-08',NULL,NULL,11);

/*Table structure for table `cuentas_a_pagar` */

DROP TABLE IF EXISTS `cuentas_a_pagar`;

CREATE TABLE `cuentas_a_pagar` (
  `idCuentas` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `nrcomprobante` int(11) NOT NULL,
  `vencimiento` date NOT NULL,
  `monto` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idCuentas`,`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cuentas_a_pagar` */

/*Table structure for table `cuentasacobrar` */

DROP TABLE IF EXISTS `cuentasacobrar`;

CREATE TABLE `cuentasacobrar` (
  `idCuentasACobrar` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `nrcomprobante` int(11) NOT NULL,
  `vencimiento` date NOT NULL,
  `mora` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idCuentasACobrar`,`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cuentasacobrar` */

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `codigoempleado` int(11) NOT NULL,
  `ciemp` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `nrtelefono` int(11) NOT NULL,
  `codigociudad` int(11) NOT NULL,
  `codigopais` int(11) NOT NULL,
  `Idsucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoempleado`),
  KEY `FK_empleado2` (`Idsucursal`),
  KEY `FK_empleado1` (`codigopais`),
  KEY `FK_empleado` (`codigociudad`),
  CONSTRAINT `FK_empleado` FOREIGN KEY (`codigociudad`) REFERENCES `ciudad` (`codigociudad`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_empleado1` FOREIGN KEY (`codigopais`) REFERENCES `pais` (`codigopais`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_empleado2` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `empleado` */

insert  into `empleado`(`codigoempleado`,`ciemp`,`nombres`,`direccion`,`nrtelefono`,`codigociudad`,`codigopais`,`Idsucursal`) values (1,45242426,'ALDO AREVALO ORTIZs','OPTASIANO GOMEZ NUï¿½EZ C/ESPERANZA',994520486,1,1,1),(2,5626628,'MARIO ARIEL AREVALO ORTIZ','OPTASIANO GOMEZ NUÑEZ C/ ESPERANZA',991520469,1,1,1),(4,4542442,'aldo arevalo','OPTASIANO GOMEZ C/ ESPERANZA',21900001,1,3,1),(5,4542442,'aldo arevalo','OPTASIANO GOMEZ C/ ESPERANZA',21900001,1,3,1);

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `cod_emp` int(11) NOT NULL,
  `rucempresa` varchar(45) NOT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rucempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `empresa` */

insert  into `empresa`(`cod_emp`,`rucempresa`,`empresa`,`direccion`,`telefono`) values (6,'0444458','0252555','5588','225588'),(4,'4 524 242-6','aldo arevalo ortiz','marriano roque alonoso 1640','0994520469'),(2,'80022202-3','otasiono','ootasuiab','02155547'),(1,'80022202-4','ALIMENTOS Y SERVICIOS SRL','LUIS MARIA ARGAÑA C/ BRUNO GUGGIARI','021 900 001'),(7,'80022202-6','expresied','mariano','021800255'),(8,'80022202-8','aldo','fjafl','021455'),(3,'80055','aldo','ff','0257');

/*Table structure for table `etapacabecera` */

DROP TABLE IF EXISTS `etapacabecera`;

CREATE TABLE `etapacabecera` (
  `idEtapa` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Notas` varchar(45) DEFAULT NULL,
  `codigoempleado` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT NULL,
  `Idsucursal` int(11) DEFAULT NULL,
  `Ci_Cliente` int(11) DEFAULT NULL,
  `idplantilla` int(11) DEFAULT NULL,
  `idCentroDeProduccion` int(11) DEFAULT NULL,
  `tipoproduccion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'En Proceso',
  PRIMARY KEY (`idEtapa`),
  KEY `FK_etapacabecera1` (`codigoalmacen`),
  KEY `FK_etapacabecera2` (`Idsucursal`),
  KEY `FK_etapacabecera3` (`Ci_Cliente`),
  KEY `FK_etapacabecera6` (`idplantilla`),
  KEY `FK_etapacabecera7` (`idCentroDeProduccion`),
  KEY `FK_etapacabecera5` (`codigoempleado`),
  CONSTRAINT `FK_etapacabecera1` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_etapacabecera2` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_etapacabecera3` FOREIGN KEY (`Ci_Cliente`) REFERENCES `cliente` (`Ci_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_etapacabecera5` FOREIGN KEY (`codigoempleado`) REFERENCES `empleado` (`codigoempleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_etapacabecera7` FOREIGN KEY (`idCentroDeProduccion`) REFERENCES `centrodeproduccion` (`idCentroDeProduccion`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `etapacabecera` */

insert  into `etapacabecera`(`idEtapa`,`Fecha`,`Notas`,`codigoempleado`,`codigoalmacen`,`Idsucursal`,`Ci_Cliente`,`idplantilla`,`idCentroDeProduccion`,`tipoproduccion`,`estado`) values (1,'2018-09-01','primera etap',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'2018-09-21',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'2018-09-21','nuea nota',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'2018-09-21','nuea nota',1,NULL,NULL,45242423,NULL,NULL,NULL,NULL),(5,'2018-09-21','nuea nota',1,NULL,NULL,45242423,NULL,NULL,NULL,NULL),(6,'2018-09-21','',1,NULL,NULL,45242423,NULL,NULL,NULL,NULL),(7,'2018-09-28','',1,NULL,NULL,45242423,NULL,NULL,NULL,NULL),(8,'2018-09-28','',1,1,NULL,45242423,NULL,NULL,NULL,NULL),(9,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(10,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(11,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(12,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(13,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(14,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(15,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(16,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(17,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(18,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(19,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(20,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(21,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(22,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(23,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(24,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(25,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(26,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(27,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(28,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(29,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(30,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(31,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(32,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(33,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(34,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(35,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(36,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(37,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(38,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(39,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(40,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(41,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(42,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(43,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(44,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(45,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(46,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(47,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(48,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(49,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(50,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(51,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(52,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(53,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(54,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(55,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(56,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(57,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(58,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(59,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(60,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(61,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(62,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(63,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(64,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(65,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(66,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(67,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(68,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(69,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(70,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(71,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(72,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(73,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(74,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(75,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(76,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(77,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(78,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(79,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(80,'2018-09-28','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(81,'2018-09-21','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(82,'2018-09-21','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(83,'2018-09-21','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(84,'2018-09-21','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(85,'2018-09-21','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(86,'2018-09-21','nota nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(87,'2018-09-21','buffet semana dos',1,1,1,45242423,NULL,NULL,NULL,NULL),(88,'2018-09-21','buffet semana dos',1,1,1,45242423,NULL,NULL,NULL,NULL),(89,'2018-09-21','buffet semana tres',1,1,1,45242423,NULL,NULL,NULL,NULL),(90,'2018-09-21','buffet semana tres',1,1,1,45242423,NULL,NULL,NULL,NULL),(91,'2018-09-21','buffet semana tres',1,1,1,45242423,NULL,NULL,NULL,NULL),(92,'2018-09-21','buffet semana tres',1,1,1,45242423,NULL,NULL,NULL,NULL),(93,'2018-09-21','buffet semana tres',1,1,1,45242423,NULL,NULL,NULL,NULL),(94,'2018-09-29','etapa nueva',1,1,1,45242423,NULL,NULL,NULL,NULL),(95,'2018-09-28','buffet semana tres',1,3,1,45242423,NULL,NULL,NULL,NULL),(96,'2018-09-28','buffet semana tres',1,3,1,45242423,NULL,NULL,NULL,NULL),(97,'2018-09-29','etapa dos',1,1,1,45242423,NULL,1,'PARA STOCK','En Proceso'),(98,'2018-10-11','etapa',1,8,1,45242423,NULL,2,'PARA STOCK','En Proceso'),(99,'2018-10-11','etapa',1,8,1,45242423,NULL,2,'PARA STOCK','En Proceso');

/*Table structure for table `etapadetalle` */

DROP TABLE IF EXISTS `etapadetalle`;

CREATE TABLE `etapadetalle` (
  `idEtapa` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  `idFormulas` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEtapa`,`codigoproducto`),
  KEY `FK_etapadetalle1` (`codigoproducto`),
  CONSTRAINT `FK_etapadetalle` FOREIGN KEY (`idEtapa`) REFERENCES `etapacabecera` (`idEtapa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_etapadetalle1` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `etapadetalle` */

insert  into `etapadetalle`(`idEtapa`,`codigoproducto`,`cantidad`,`precio`,`idFormulas`,`codigoalmacen`) values (1,1,1,1,1,1),(18,1,4,32000,NULL,1),(19,1,4,32000,NULL,1),(20,1,4,32000,NULL,1),(21,1,4,32000,NULL,1),(30,1,4,32000,NULL,1),(31,1,4,32000,NULL,1),(32,1,4,32000,NULL,1),(33,1,4,32000,NULL,1),(34,1,4,32000,NULL,1),(35,1,4,32000,NULL,1),(39,1,4,32000,NULL,NULL),(39,2,4,33000,NULL,NULL),(40,1,4,32000,NULL,NULL),(40,2,4,33000,NULL,NULL),(41,1,4,32000,NULL,NULL),(41,2,4,33000,NULL,NULL),(42,1,4,32000,NULL,NULL),(42,2,4,33000,NULL,NULL),(42,3,4,460651065016,NULL,NULL),(43,1,4,32000,NULL,NULL),(43,2,4,33000,NULL,NULL),(43,3,4,460651065016,NULL,NULL),(44,1,4,32000,NULL,1),(45,1,4,32000,NULL,NULL),(45,2,4,33000,NULL,NULL),(45,3,4,460651065016,NULL,NULL),(46,1,4,32000,NULL,1),(47,1,4,32000,NULL,1),(53,1,4,32000,NULL,1),(53,2,4,33000,NULL,1),(54,1,4,32000,NULL,1),(54,2,4,33000,NULL,1),(57,1,4,32000,NULL,NULL),(57,2,4,33000,NULL,NULL),(58,1,4,32000,NULL,NULL),(58,2,4,33000,NULL,NULL),(59,1,4,32000,NULL,NULL),(60,1,4,32000,NULL,NULL),(61,1,4,32000,NULL,NULL),(62,1,4,32000,NULL,NULL),(63,1,4,32000,NULL,NULL),(63,2,4,33000,NULL,NULL),(64,1,4,32000,NULL,NULL),(64,2,4,33000,NULL,NULL),(65,1,4,32000,NULL,NULL),(66,1,4,32000,NULL,NULL),(66,2,4,33000,NULL,NULL),(67,1,4,32000,NULL,NULL),(67,2,4,33000,NULL,NULL),(68,1,4,32000,NULL,NULL),(69,1,4,32000,NULL,NULL),(69,2,4,33000,NULL,NULL),(70,1,4,32000,NULL,NULL),(70,2,4,33000,NULL,NULL),(71,1,4,32000,NULL,NULL),(71,2,4,33000,NULL,NULL),(72,1,4,32000,NULL,NULL),(72,2,4,33000,NULL,NULL),(73,1,4,32000,NULL,NULL),(73,2,4,33000,NULL,NULL),(74,1,4,32000,NULL,NULL),(74,2,4,33000,NULL,NULL),(75,1,4,32000,NULL,NULL),(75,2,4,33000,NULL,NULL),(76,1,4,32000,NULL,NULL),(76,2,4,33000,NULL,NULL),(77,1,4,32000,NULL,NULL),(77,2,4,33000,NULL,NULL),(78,1,4,32000,NULL,NULL),(78,2,4,33000,NULL,NULL),(79,1,4,32000,NULL,NULL),(79,2,4,33000,NULL,NULL),(80,1,4,32000,NULL,NULL),(80,2,4,33000,NULL,NULL),(81,1,1,32000,NULL,5),(81,3,4,460651065016,NULL,5),(82,1,1,32000,NULL,5),(82,3,4,460651065016,NULL,5),(83,3,4,460651065016,NULL,2),(83,30,4,5000,NULL,2),(84,3,4,460651065016,NULL,2),(84,30,4,5000,NULL,2),(85,3,4,460651065016,NULL,2),(85,30,4,5000,NULL,2),(86,3,4,460651065016,NULL,2),(86,29,4,5000,NULL,2),(86,30,4,5000,NULL,2),(87,1,4,32000,NULL,1),(87,3,4,460651065016,NULL,1),(88,1,4,32000,NULL,1),(88,3,4,460651065016,NULL,1),(91,29,4,5000,NULL,5),(91,40,4,685685,NULL,5),(92,29,4,5000,NULL,3),(92,40,4,685685,NULL,3),(93,29,4,5000,NULL,2),(93,40,4,685685,NULL,2),(94,2,4,33000,NULL,6),(94,29,4,5000,NULL,6),(95,1,4,32000,NULL,3),(95,3,4,460651065016,NULL,3),(95,28,4,32000,NULL,3),(95,29,8,5000,NULL,3),(96,1,44,32000,NULL,3),(96,28,4,32000,NULL,3),(97,2,4,33000,NULL,3),(97,3,8,460651065016,NULL,3),(97,39,4,500,NULL,3),(98,2,4,33000,NULL,1),(98,28,4,32000,NULL,1),(99,1,4,32000,NULL,1),(99,2,4,33000,NULL,1),(99,28,4,32000,NULL,1);

/*Table structure for table `formasdepago` */

DROP TABLE IF EXISTS `formasdepago`;

CREATE TABLE `formasdepago` (
  `idFormasDePago` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idBancos` int(11) NOT NULL,
  PRIMARY KEY (`idFormasDePago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `formasdepago` */

/*Table structure for table `formulas` */

DROP TABLE IF EXISTS `formulas`;

CREATE TABLE `formulas` (
  `idReceta` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigorubro` int(11) NOT NULL,
  `codigosubrubro` int(11) NOT NULL,
  `idunidaddemedida` int(11) NOT NULL,
  `Formula` double NOT NULL,
  `Composicion` double NOT NULL,
  `cantidadresultante` double NOT NULL,
  PRIMARY KEY (`idReceta`,`codigoproducto`,`codigo`),
  KEY `fk_Formulas_CategoriaDeProductos1_idx` (`idcategoria`),
  KEY `fk_Formulas_Rubros1_idx` (`codigorubro`),
  KEY `fk_Formulas_SubRubros1_idx` (`codigosubrubro`),
  KEY `fk_Formulas_UnidaddeMedida1_idx` (`idunidaddemedida`),
  CONSTRAINT `FK_formulas` FOREIGN KEY (`codigorubro`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_formulas5` FOREIGN KEY (`idReceta`) REFERENCES `receta` (`idReceta`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Formulas_CategoriaDeProductos1` FOREIGN KEY (`idcategoria`) REFERENCES `categoriadeproductos` (`idcategoria`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Formulas_Rubros1` FOREIGN KEY (`codigorubro`) REFERENCES `rubros` (`codigorubro`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Formulas_SubRubros1` FOREIGN KEY (`codigosubrubro`) REFERENCES `subrubros` (`codigosubrubro`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Formulas_UnidaddeMedida1` FOREIGN KEY (`idunidaddemedida`) REFERENCES `unidaddemedida` (`idunidaddemedida`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `formulas` */

insert  into `formulas`(`idReceta`,`codigoproducto`,`codigo`,`idcategoria`,`codigorubro`,`codigosubrubro`,`idunidaddemedida`,`Formula`,`Composicion`,`cantidadresultante`) values (1,40,40,1,2,44,2,5,500,100);

/*Table structure for table `gestiondeproduccioncabecera` */

DROP TABLE IF EXISTS `gestiondeproduccioncabecera`;

CREATE TABLE `gestiondeproduccioncabecera` (
  `idGestionDeProduccion` int(11) NOT NULL,
  `NombreTarea` varchar(45) NOT NULL,
  `TiempoNecesario` datetime NOT NULL,
  `CantidadDePersonas` int(11) NOT NULL,
  `idorden` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idGestionDeProduccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestiondeproduccioncabecera` */

/*Table structure for table `gestiondeproducciondetalle` */

DROP TABLE IF EXISTS `gestiondeproducciondetalle`;

CREATE TABLE `gestiondeproducciondetalle` (
  `idGestionDeProduccion` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `CantidaAproducir` int(11) NOT NULL,
  `Herramientas` varchar(45) NOT NULL,
  PRIMARY KEY (`idGestionDeProduccion`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestiondeproducciondetalle` */

/*Table structure for table `impuestos` */

DROP TABLE IF EXISTS `impuestos`;

CREATE TABLE `impuestos` (
  `idimpuesto` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `tasa` int(11) NOT NULL,
  `aplicarventas` varchar(2) NOT NULL,
  `aplicarcompras` varchar(2) NOT NULL,
  `empresa` varchar(45) NOT NULL DEFAULT 'ALIMENTOS Y SERVICIOS SRL',
  PRIMARY KEY (`idimpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `impuestos` */

insert  into `impuestos`(`idimpuesto`,`nombre`,`tasa`,`aplicarventas`,`aplicarcompras`,`empresa`) values (1,5,5,'si','si','ALIMENTOS Y SERVICIOS SRL'),(2,10,10,'si','si','ALIMENTOS Y SERVICIOS SRL'),(3,5,5,'si','si','ALIMENTOS Y SERVICIOS SRL'),(4,5,5,'si','si','ALIMENTOS Y SERVICIOS SRL'),(5,15,15,'no','no','ALIMENTOS Y SERVICIOS SRL');

/*Table structure for table `ingresodeproduccioncabecera` */

DROP TABLE IF EXISTS `ingresodeproduccioncabecera`;

CREATE TABLE `ingresodeproduccioncabecera` (
  `idIngreso` int(11) NOT NULL,
  `PersonaAcargo` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Notas` varchar(45) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT NULL,
  `idorden` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  PRIMARY KEY (`idIngreso`),
  KEY `FK_ingresodeproduccioncabecera` (`codigoalmacen`),
  KEY `idorden` (`idorden`),
  CONSTRAINT `FK_ingresodeproduccioncabecera` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `ingresodeproduccioncabecera_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `ordenproduccioncabecera` (`idorden`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ingresodeproduccioncabecera` */

insert  into `ingresodeproduccioncabecera`(`idIngreso`,`PersonaAcargo`,`Fecha`,`Notas`,`codigoalmacen`,`idorden`,`estado`) values (1,'ALDO AREVALO ORTIZ','2018-09-11','BUFFET SEMANA DOS',1,1,'ACTIVO'),(2,'ALDO AREVALO ORTIZ','2018-09-28','',6,20,'ACTIVO'),(3,'ALDO AREVALO ORTIZ','2018-09-28','',6,20,'ACTIVO'),(4,'ALDO AREVALO ORTIZ','2018-10-12','ingr',12,146,'ACTIVO'),(5,'ALDO AREVALO ORTIZ','2018-10-12','ingr',12,146,'ACTIVO'),(6,'ALDO AREVALO ORTIZ','2018-10-03','ingreso nuevo',12,146,'ACTIVO'),(7,'ALDO AREVALO ORTIZs','2018-11-30','notas dos9',12,146,'ACTIVO');

/*Table structure for table `ingresodeproducciondetalle` */

DROP TABLE IF EXISTS `ingresodeproducciondetalle`;

CREATE TABLE `ingresodeproducciondetalle` (
  `idIngreso` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `Cantidadingresada` int(11) DEFAULT NULL,
  `idCentroDeProduccion` int(11) DEFAULT NULL,
  `idorden` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT NULL,
  PRIMARY KEY (`idIngreso`,`codigoproducto`),
  KEY `FK_ingresodeproducciondetalle` (`codigoalmacen`),
  KEY `idorden` (`idorden`),
  KEY `FK_ingresodeproducciondetalle2` (`codigoproducto`),
  CONSTRAINT `FK_ingresodeproducciondetalle` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ingresodeproducciondetalle1` FOREIGN KEY (`idIngreso`) REFERENCES `ingresodeproduccioncabecera` (`idIngreso`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ingresodeproducciondetalle2` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `ingresodeproducciondetalle_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `ordenproduccioncabecera` (`idorden`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ingresodeproducciondetalle` */

insert  into `ingresodeproducciondetalle`(`idIngreso`,`codigoproducto`,`Cantidadingresada`,`idCentroDeProduccion`,`idorden`,`codigoalmacen`) values (1,1,7,1,21,6),(1,2,7,1,21,6),(1,40,8,1,21,6),(2,28,8,1,20,6),(2,29,8,1,20,6),(3,28,8,1,20,6),(3,29,8,1,20,6),(4,1,4,1,146,12),(4,40,4,1,146,12),(5,1,5,1,146,12),(5,40,4,1,146,12),(6,1,5,1,146,9),(6,40,5,1,146,9),(7,1,1,1,146,12),(7,40,1,1,146,12);

/*Table structure for table `librocompra` */

DROP TABLE IF EXISTS `librocompra`;

CREATE TABLE `librocompra` (
  `idLibroCompra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `idcreditodebito` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `iva 5` int(11) NOT NULL,
  `iva 10` int(11) NOT NULL,
  `tasa 5` int(11) NOT NULL,
  `tasa 10` int(11) NOT NULL,
  `exento` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idLibroCompra`,`id_compra`,`idcreditodebito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `librocompra` */

/*Table structure for table `libroventa` */

DROP TABLE IF EXISTS `libroventa`;

CREATE TABLE `libroventa` (
  `idLibroVenta` int(11) NOT NULL,
  `idCreditoDebitoVenta` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `iva 5` int(11) NOT NULL,
  `iva 10` int(11) NOT NULL,
  `tasa 5` int(11) NOT NULL,
  `tasa 10` int(11) NOT NULL,
  `exento` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idLibroVenta`,`idCreditoDebitoVenta`,`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `libroventa` */

/*Table structure for table `listadodepreciosdeproductos` */

DROP TABLE IF EXISTS `listadodepreciosdeproductos`;

CREATE TABLE `listadodepreciosdeproductos` (
  `idListado` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `RucProveedor` varchar(45) NOT NULL,
  `precioporenvase` double NOT NULL,
  `cantidadporenvase` double NOT NULL,
  `unidaddemedida` varchar(45) NOT NULL,
  PRIMARY KEY (`idListado`,`codigoproducto`,`RucProveedor`),
  KEY `FK_listadodepreciodeproductos1` (`RucProveedor`),
  KEY `FK_listadodepreciodeproveedor2` (`unidaddemedida`),
  KEY `FK_listadodepreciodeproductos` (`codigoproducto`),
  CONSTRAINT `FK_listadodepreciodeproductos` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_listadodepreciodeproductos1` FOREIGN KEY (`RucProveedor`) REFERENCES `proveedor` (`RucProveedor`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `listadodepreciosdeproductos` */

insert  into `listadodepreciosdeproductos`(`idListado`,`codigoproducto`,`RucProveedor`,`precioporenvase`,`cantidadporenvase`,`unidaddemedida`) values (2,1,'80022202-1',1,1,'X1'),(2,40,'80022202-1',1,1,'X1');

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `marca` */

insert  into `marca`(`idmarca`,`nombre`) values (1,'marcsss'),(3,'mar'),(4,'fadfa'),(5,'nombre'),(6,'nuevo producto'),(7,'marc'),(8,'arca'),(9,'.,l,,Ã±l'),(10,'mar'),(11,'mar55'),(12,'nom'),(13,'baaa'),(15,'tres');

/*Table structure for table `mesadeentrada` */

DROP TABLE IF EXISTS `mesadeentrada`;

CREATE TABLE `mesadeentrada` (
  `idMesaDeEntrada` int(11) NOT NULL,
  `MesaDeEntradacol` varchar(45) DEFAULT NULL,
  `codigoalmacen` int(11) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `idPuntodeventa` int(11) NOT NULL,
  `Empleado_codigo` int(11) NOT NULL,
  PRIMARY KEY (`idMesaDeEntrada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mesadeentrada` */

/*Table structure for table `mesadeentradadetalle` */

DROP TABLE IF EXISTS `mesadeentradadetalle`;

CREATE TABLE `mesadeentradadetalle` (
  `idMesaDeEntrada` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  PRIMARY KEY (`idMesaDeEntrada`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mesadeentradadetalle` */

/*Table structure for table `notaderemisioncabecera` */

DROP TABLE IF EXISTS `notaderemisioncabecera`;

CREATE TABLE `notaderemisioncabecera` (
  `nrid` int(11) NOT NULL,
  `nrtransferencialmacen` varchar(45) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  `fechaenvio` date DEFAULT NULL,
  `idorden` int(11) DEFAULT '1',
  `nrpedidonota` int(11) DEFAULT '1',
  `Idsucursal` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT '1',
  `codigoempleado` int(11) DEFAULT NULL,
  `nota` varchar(45) NOT NULL,
  PRIMARY KEY (`nrid`),
  KEY `FK_notaderemisioncabecera1` (`idusuario`),
  KEY `FK_notaderemisioncabecera2` (`Idsucursal`),
  KEY `FK_notaderemisioncabecera3` (`codigoempleado`),
  KEY `FK_notaderemisioncabecera4` (`nrpedidonota`),
  KEY `FK_notaderemisioncabecera5` (`idorden`),
  KEY `FK_notaderemisioncabecera6` (`codigoalmacen`),
  CONSTRAINT `FK_notaderemisioncabecera1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisioncabecera2` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisioncabecera3` FOREIGN KEY (`codigoempleado`) REFERENCES `empleado` (`codigoempleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisioncabecera4` FOREIGN KEY (`nrpedidonota`) REFERENCES `pedidodenotaderemision` (`nrpedido`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisioncabecera5` FOREIGN KEY (`idorden`) REFERENCES `ordenproduccioncabecera` (`idorden`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisioncabecera6` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notaderemisioncabecera` */

insert  into `notaderemisioncabecera`(`nrid`,`nrtransferencialmacen`,`codigoalmacen`,`fecha`,`estado`,`fechaenvio`,`idorden`,`nrpedidonota`,`Idsucursal`,`idusuario`,`codigoempleado`,`nota`) values (1,'1',1,'2018-11-22 15:47:21','ACTIVO','2018-11-22',1,1,1,1,1,'nueva remision'),(2,'2',1,'2018-11-22 16:15:23','ACTIVO','2018-11-22',1,1,1,1,1,'nueva remision'),(3,'3',9,'2018-11-22 16:19:10','ACTIVO','2018-11-07',1,1,1,1,1,'nueva remision'),(4,'4',9,'2018-11-22 16:20:13','ACTIVO','2018-11-07',1,1,1,1,1,'nueva remision'),(5,'5',8,'2018-11-22 16:21:37','ACTIVO','2018-11-07',1,1,1,1,1,'nueva remision'),(6,'6',8,'2018-11-22 16:22:35','ACTIVO','2018-11-07',1,1,1,1,1,'nueva remision'),(7,'7',1,'2018-11-22 16:23:57','ACTIVO','2018-11-07',1,1,1,1,4,'nueva remision'),(8,'8',12,'2018-11-22 16:56:19','ACTIVO','2018-11-07',1,1,1,1,1,'nueva remision'),(9,'9',12,'2018-11-22 16:57:29','ACTIVO','2018-11-07',1,1,1,1,1,'nueva remision'),(10,'10',1,'2018-11-22 16:59:01','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(11,'11',1,'2018-11-22 16:59:55','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(12,'12',7,'2018-11-22 17:01:44','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(13,'13',7,'2018-11-22 17:05:34','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(14,'14',7,'2018-11-22 17:05:51','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(15,'15',7,'2018-11-22 17:07:47','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(16,'16',6,'2018-11-22 17:10:44','ACTIVO','2018-11-07',1,1,9,1,2,'nueva remision'),(17,'17',6,'2018-11-22 17:11:14','ACTIVO','2018-11-07',1,1,9,1,2,'nueva remision'),(18,'18',4,'2018-11-22 17:15:16','ACTIVO','2018-11-07',1,1,1,1,5,'nueva remision'),(19,'19',4,'2018-11-22 17:15:32','ACTIVO','2018-11-07',1,1,1,1,5,'nueva remision'),(20,'20',4,'2018-11-22 17:15:53','ACTIVO','2018-11-07',1,1,1,1,5,'nueva remision'),(21,'21',7,'2018-11-22 17:16:24','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(22,'22',7,'2018-11-22 17:17:15','ACTIVO','2018-11-07',1,1,1,1,2,'nueva remision'),(23,'23',9,'2018-11-22 18:08:40','ACTIVO','2018-11-07',1,1,1,1,4,'nueva remision'),(24,'24',9,'2018-11-22 18:47:43','ACTIVO','2018-11-07',1,1,1,1,4,''),(25,'25',9,'2018-11-22 18:47:52','ACTIVO','2018-11-07',1,1,1,1,4,''),(26,'26',9,'2018-11-22 18:48:15','ACTIVO','2018-11-07',1,1,1,1,4,''),(27,'27',9,'2018-11-22 18:50:49','ACTIVO','2018-11-07',1,1,1,1,4,''),(28,'28',9,'2018-11-22 18:51:36','ACTIVO','2018-11-07',1,1,1,1,4,''),(29,'29',9,'2018-11-22 18:52:30','ACTIVO','2018-11-07',1,1,1,1,4,''),(30,'30',6,'2018-11-22 18:52:55','ACTIVO','2018-11-07',1,1,9,1,4,'nota tres'),(31,'31',12,'2018-11-22 19:45:29','ACTIVO','2018-11-08',1,1,1,1,1,'nota nueva');

/*Table structure for table `notaderemisiondetalle` */

DROP TABLE IF EXISTS `notaderemisiondetalle`;

CREATE TABLE `notaderemisiondetalle` (
  `nrid` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidadenviada` double NOT NULL,
  `cantidadrecibida` double NOT NULL DEFAULT '0',
  `precio` double NOT NULL,
  `codigoalmacen` int(11) NOT NULL,
  `idimpuesto` int(11) NOT NULL,
  `cantidadorden` double NOT NULL DEFAULT '50',
  PRIMARY KEY (`nrid`,`codigoproducto`),
  KEY `FK_notaderemisiondetalle` (`codigoalmacen`),
  KEY `FK_notaderemisiondetalle2` (`codigoproducto`),
  KEY `FK_notaderemisiondetalle4` (`idimpuesto`),
  CONSTRAINT `FK_notaderemisiondetalle` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisiondetalle1` FOREIGN KEY (`nrid`) REFERENCES `notaderemisioncabecera` (`nrid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisiondetalle2` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_notaderemisiondetalle4` FOREIGN KEY (`idimpuesto`) REFERENCES `impuestos` (`idimpuesto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notaderemisiondetalle` */

insert  into `notaderemisiondetalle`(`nrid`,`codigoproducto`,`cantidadenviada`,`cantidadrecibida`,`precio`,`codigoalmacen`,`idimpuesto`,`cantidadorden`) values (8,28,0,0,3,1,2,50),(9,28,5,5,3,8,2,50),(10,40,4,4,3,9,2,50),(12,40,4,4,3,1,2,50),(13,40,4,4,6,1,2,50),(14,40,4,4,6,1,2,50),(15,40,4,4,6,1,2,50),(16,40,4,4,5,3,2,50),(17,3,4,4,5,3,2,50),(17,40,4,4,5,3,2,50),(21,2,4,4,33000,7,1,50),(21,29,4,4,5000,7,2,50),(22,2,4,4,33000,7,1,50),(22,28,1,1,32000,7,2,50),(22,29,4,4,5000,7,2,50),(23,1,4,4,32000,9,1,50),(23,30,1,1,5000,9,2,50),(23,49,1,1,55,9,2,50),(24,1,4,4,32000,9,1,4),(24,30,1,1,5000,9,2,1),(24,49,1,1,55,9,2,1),(25,1,4,4,32000,9,1,4),(25,30,1,1,5000,9,2,1),(25,49,1,1,55,9,2,1),(26,1,4,4,32000,9,1,4),(26,28,1,1,32000,9,2,1),(26,30,1,1,5000,9,2,1),(26,49,1,1,55,9,2,1),(27,1,4,4,32000,9,1,4),(27,28,1,1,32000,9,2,1),(27,30,1,1,5000,9,2,1),(27,49,1,1,55,9,2,1),(28,1,4,4,32000,9,1,4),(28,28,1,1,32000,9,2,1),(28,30,1,1,5000,9,2,1),(28,49,1,1,55,9,2,1),(29,1,4,4,32000,9,1,4),(29,28,1,1,32000,9,2,1),(29,30,1,1,5000,9,2,1),(29,49,1,1,55,9,2,1),(30,1,1,1,32000,1,1,1),(30,40,1,1,685685,1,2,1),(31,2,5,5,33000,14,1,5),(31,40,4,4,685685,14,2,4);

/*Table structure for table `notaderemisionventacabecera` */

DROP TABLE IF EXISTS `notaderemisionventacabecera`;

CREATE TABLE `notaderemisionventacabecera` (
  `Idnotaderemision` int(11) NOT NULL,
  `numerodecomprobante` int(11) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `idPuntodeventa` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notas` varchar(45) NOT NULL,
  `direcciondedestino` varchar(45) NOT NULL,
  `horaenvio` varchar(45) NOT NULL,
  `horafinalizacion` varchar(45) NOT NULL,
  `nrchapadelvehiculo` decimal(10,0) NOT NULL,
  `idPedidoPreventa` int(11) NOT NULL,
  `idListado` int(11) NOT NULL,
  PRIMARY KEY (`Idnotaderemision`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notaderemisionventacabecera` */

/*Table structure for table `notaderemisionventadetalle` */

DROP TABLE IF EXISTS `notaderemisionventadetalle`;

CREATE TABLE `notaderemisionventadetalle` (
  `Idnotaderemision` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`Idnotaderemision`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notaderemisionventadetalle` */

/*Table structure for table `ordencompracabecera` */

DROP TABLE IF EXISTS `ordencompracabecera`;

CREATE TABLE `ordencompracabecera` (
  `idordencompra` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `notas` varchar(45) DEFAULT NULL,
  `RucProveedor` varchar(45) DEFAULT NULL,
  `idCentroDeCosto` int(11) DEFAULT NULL,
  `TerminosDePago` varchar(45) DEFAULT NULL,
  `SitioEntrega` varchar(45) DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `idPresupuesto` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT '1',
  PRIMARY KEY (`idordencompra`),
  KEY `FK_ordencompracabecera` (`RucProveedor`),
  KEY `FK_ordencompracabecera1` (`idCentroDeCosto`),
  KEY `FK_ordencompracabecera2` (`idPresupuesto`),
  CONSTRAINT `FK_ordencompracabecera` FOREIGN KEY (`RucProveedor`) REFERENCES `proveedor` (`RucProveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordencompracabecera1` FOREIGN KEY (`idCentroDeCosto`) REFERENCES `centrodecostos` (`idCentroDeCosto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordencompracabecera2` FOREIGN KEY (`idPresupuesto`) REFERENCES `presupuestocabecera` (`idPresupuesto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ordencompracabecera` */

insert  into `ordencompracabecera`(`idordencompra`,`fecha`,`vencimiento`,`notas`,`RucProveedor`,`idCentroDeCosto`,`TerminosDePago`,`SitioEntrega`,`FechaEntrega`,`idPresupuesto`,`codigoalmacen`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(2,'2018-09-22','2018-11-26','nueva ordenkk','80022302-6',1,NULL,NULL,NULL,NULL,1),(3,'2018-09-22','2018-11-26','nueva ordenkk','80022302-6',1,'Contado','deposito','2018-08-23',35,1),(4,'2018-09-22','2018-11-26','nueva ordenkk','80022302-6',1,'Contado','deposito','2018-08-23',35,1),(5,'2018-09-22','2018-11-26','nueva ordenkk','80022302-6',1,'Contado','deposito','2018-08-23',36,1),(6,'2018-09-22','2018-11-26','orden parcia','80022302-6',1,'Credito','deposito de materias primas','2018-08-31',39,1),(7,'2018-09-22','2018-11-26','orden parcia','80022302-6',1,'Credito','deposito de materias primas','2018-08-31',36,1),(8,'2018-09-22','2018-11-26','orden parcia','80022302-6',1,'Credito','deposito de materias primas','2018-08-31',36,1),(9,'2018-09-22','2018-11-26','orden parcia','80022302-6',1,'Credito','deposito de materias primas','2018-08-31',36,1),(10,'2018-09-05','2018-11-26','notas nueva','80022302-6',1,'Credito','deposito de materias primas','2018-08-31',35,1),(11,'2018-09-29','2018-09-29','ggsg','80022302-6',1,'Contado','fggg','2018-08-11',35,1),(12,'2018-09-29','2018-09-29','mhmgfmfgj','80022302-6',1,'Contado','fggg','2018-08-11',35,1),(13,'2018-09-29','2018-09-29','mhmgfmfgj','80022302-6',1,'Contado','fggg','2018-08-11',35,1),(14,'2018-09-22','2018-10-28','nueva orden','80022302-6',1,'Contado','nota nueva','2018-08-14',35,1),(15,'2018-10-21','2018-11-25','nuevo','80022302-6',1,'Contado','entejo','2018-08-08',36,1),(16,'2018-09-28','2018-09-29','orden semana dos','8002141-6',1,'Contado','deposito','2018-09-20',1,1),(17,'2018-10-01','2018-10-02','ORDER IT','80022302-6',1,'Contado','depsoito','2018-10-02',36,1);

/*Table structure for table `ordencompradetalle` */

DROP TABLE IF EXISTS `ordencompradetalle`;

CREATE TABLE `ordencompradetalle` (
  `id` varchar(250) NOT NULL,
  `idordencompra` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `listadodeprocios` varchar(45) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `usuario` varchar(45) NOT NULL DEFAULT 'ALDO AREVALO',
  `ultimamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`idordencompra`,`codigoproducto`),
  KEY `fk_OrdenCompraDetalle_OrdenCompraCabecera1` (`idordencompra`),
  KEY `fk_OrdenCompraDetalle_Productos1` (`codigoproducto`),
  CONSTRAINT `fk_OrdenCompraDetalle_OrdenCompraCabecera1` FOREIGN KEY (`idordencompra`) REFERENCES `ordencompracabecera` (`idordencompra`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_OrdenCompraDetalle_Productos1` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ordencompradetalle` */

insert  into `ordencompradetalle`(`id`,`idordencompra`,`codigoproducto`,`estado`,`listadodeprocios`,`cantidad`,`precio`,`usuario`,`ultimamodificacion`) values ('5b832ef57d6cd',3,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:51:33'),('5b832ef586702',3,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:51:33'),('5b832f1601305',4,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:52:06'),('5b832f16068e7',4,2,'anulado','1',4,33000,'ALDO AREVALO','2018-08-27 19:41:54'),('5b832f160bfcf',4,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:52:06'),('5b832f16115f5',4,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:52:06'),('5b832f419c175',5,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:52:49'),('5b832f41a2865',5,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:52:49'),('5b832f41a7eea',5,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:52:49'),('5b832f41ad593',5,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 18:52:49'),('5b832f41b2bf8',5,28,'ACTIVO','1',4,0,'ALDO AREVALO','2018-08-26 18:52:49'),('5b8331d38b15b',6,2,'ACTIVO','1',4,33000,'ALDO AREVALO','2018-08-26 19:03:47'),('5b8331d3907f7',6,29,'ACTIVO','1',4,5000,'ALDO AREVALO','2018-08-26 19:03:47'),('5b8331d395ce1',6,30,'ACTIVO','1',8,5000,'ALDO AREVALO','2018-08-26 19:03:47'),('5b83322fd7d7b',7,1,'ACTIVO','1',4,32000,'ALDO AREVALO','2018-08-26 19:05:19'),('5b83322feab95',7,1,'ACTIVO','1',4,32000,'ALDO AREVALO','2018-08-26 19:05:19'),('5b83392e5634b',9,3,'ACTIVO','1',55,460651065016,'ALDO AREVALO','2018-08-26 19:35:10'),('5b83392e65236',9,30,'ACTIVO','1',5,5000,'ALDO AREVALO','2018-08-26 19:35:10'),('5b83441e7a5fe',11,39,'ACTIVO','1',4,500,'ALDO AREVALO','2018-08-26 20:21:50'),('5b83441e8386f',11,39,'ACTIVO','1',4,500,'ALDO AREVALO','2018-08-26 20:21:50'),('5b83469b4a86d',12,29,'ACTIVO','1',4,5000,'ALDO AREVALO','2018-08-26 20:32:27'),('5b848b6fe85de',14,2,'ACTIVO','1',2,33000,'ALDO AREVALO','2018-08-27 19:38:23'),('5b848b701165b',14,2,'ACTIVO','1',3,33000,'ALDO AREVALO','2018-08-27 19:38:24'),('5b848b701eeb8',14,30,'ACTIVO','1',2,5000,'ALDO AREVALO','2018-08-27 19:38:24'),('5b86e2b1ef1bb',15,1,'ACTIVO','1',4,32000,'ALDO AREVALO','2018-08-29 14:15:13'),('5b86e2b210974',15,29,'ACTIVO','1',4,5000,'ALDO AREVALO','2018-08-29 14:15:14'),('5b8ad5026b80c',16,1,'ACTIVO','1',5,32000,'ALDO AREVALO','2018-09-01 14:05:54'),('5b8ad5027243b',16,1,'ACTIVO','1',5,32000,'ALDO AREVALO','2018-09-01 14:05:54'),('5b8ad50277c19',16,2,'ACTIVO','1',2,33000,'ALDO AREVALO','2018-09-01 14:05:54'),('5bb8ca8fa16ee',17,1,'ACTIVO','1',7,32000,'ALDO AREVALO','2018-10-06 10:45:35'),('5bb8ca8fa8319',17,39,'ACTIVO','1',4,500,'ALDO AREVALO','2018-10-06 10:45:35'),('5bb8ca8fad960',17,28,'ACTIVO','1',4,32000,'ALDO AREVALO','2018-10-06 10:45:35');

/*Table structure for table `ordendeproducciondetalle` */

DROP TABLE IF EXISTS `ordendeproducciondetalle`;

CREATE TABLE `ordendeproducciondetalle` (
  `idorden` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `idReceta` int(11) DEFAULT '1',
  `codigoalmacen` int(11) NOT NULL,
  `idplantilla` int(11) NOT NULL,
  `otro` int(11) NOT NULL,
  PRIMARY KEY (`idorden`,`codigoproducto`),
  KEY `FK_ordendeproducciondetalle1` (`codigoproducto`),
  KEY `FK_ordendeproducciondetalle2` (`idplantilla`),
  KEY `FK_ordendeproducciondetalle3` (`codigoalmacen`),
  KEY `FK_ordendeproducciondetalle4` (`idReceta`),
  CONSTRAINT `FK_ordendeproducciondetalle4` FOREIGN KEY (`idReceta`) REFERENCES `receta` (`idReceta`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordendeproducciondetalle` FOREIGN KEY (`idorden`) REFERENCES `ordenproduccioncabecera` (`idorden`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordendeproducciondetalle1` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordendeproducciondetalle3` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ordendeproducciondetalle` */

insert  into `ordendeproducciondetalle`(`idorden`,`codigoproducto`,`cantidad`,`precio`,`idReceta`,`codigoalmacen`,`idplantilla`,`otro`) values (1,1,5,500,1,1,1,1),(1,2,2,33333,1,3,1,2),(1,29,2,33000,1,3,1,3),(2,1,8,32000,1,4,1,4),(3,1,8,32000,1,4,1,5),(3,2,6,33000,1,4,1,6),(4,1,8,32000,1,4,1,7),(4,2,6,33000,1,4,1,8),(5,1,8,32000,1,4,1,9),(5,2,6,33000,1,4,1,10),(6,1,8,32000,1,1,1,11),(6,2,6,33000,1,1,1,12),(7,1,8,32000,1,1,1,13),(7,2,6,33000,1,1,1,14),(8,1,8,32000,1,1,1,15),(8,2,6,33000,1,1,1,16),(9,1,8,32000,1,4,1,17),(9,2,6,33000,1,4,1,18),(10,1,8,32000,1,4,1,19),(10,2,6,33000,1,4,1,20),(10,28,4,32000,1,4,1,21),(10,29,4,5000,1,4,1,22),(11,1,4,32000,1,4,1,23),(11,2,5,33000,1,4,1,24),(12,1,4,32000,1,2,1,25),(12,2,5,33000,1,2,1,26),(12,29,9,5000,1,2,1,27),(13,1,4,32000,1,7,1,28),(13,2,4,33000,1,7,1,29),(14,1,4,32000,1,7,1,30),(14,2,4,33000,1,7,1,31),(15,2,4,33000,1,5,1,32),(15,29,2,5000,1,5,1,33),(16,2,4,33000,1,5,1,34),(16,29,2,5000,1,5,1,35),(17,2,4,33000,1,5,1,36),(17,29,2,5000,1,5,1,37),(18,1,4,32000,1,6,1,38),(18,2,4,33000,1,6,1,39),(19,28,4,32000,1,6,1,40),(19,29,4,5000,1,6,1,41),(20,28,4,32000,1,6,1,42),(20,29,4,5000,1,6,1,43),(21,1,4,32000,1,1,1,44),(22,1,1,32000,1,3,1,45),(22,2,2,33000,1,3,1,46),(22,28,1,3,1,3,1,47),(22,29,1,3,1,3,1,48),(22,30,1,3,1,3,1,49),(23,1,4,32000,1,5,1,50),(23,3,4,460651065016,1,5,1,51),(23,28,4,32000,1,5,1,52),(23,40,4,685685,1,5,1,53),(24,1,4,32000,1,5,1,54),(24,3,4,460651065016,1,5,1,55),(24,28,4,32000,1,5,1,56),(24,40,4,685685,1,5,1,57),(25,1,4,32000,1,5,1,58),(25,3,4,460651065016,1,5,1,59),(25,28,4,32000,1,5,1,60),(25,40,4,685685,1,5,1,61),(26,1,4,32000,1,5,1,62),(26,3,4,460651065016,1,5,1,63),(26,28,4,32000,1,5,1,64),(26,40,4,685685,1,5,1,65),(27,1,4,32000,1,5,1,66),(27,3,4,460651065016,1,5,1,67),(27,28,4,32000,1,5,1,68),(27,40,4,685685,1,5,1,69),(28,1,4,32000,1,5,1,70),(28,3,4,460651065016,1,5,1,71),(28,28,4,32000,1,5,1,72),(28,40,4,685685,1,5,1,73),(29,1,4,32000,1,5,1,74),(29,3,4,460651065016,1,5,1,75),(29,28,4,32000,1,5,1,76),(29,40,4,685685,1,5,1,77),(30,1,4,32000,1,5,1,78),(30,3,4,460651065016,1,5,1,79),(30,28,4,32000,1,5,1,80),(30,40,4,685685,1,5,1,81),(33,1,4,32000,1,1,1,0),(33,3,4,460651065016,1,1,1,0),(34,1,4,32000,1,0,0,0),(34,2,4,33000,1,0,0,0),(34,3,4,460651065016,1,0,0,0),(34,49,4,55,1,0,0,0),(35,1,4,32000,1,0,0,0),(35,2,4,33000,1,0,0,0),(35,3,4,460651065016,1,0,0,0),(35,49,4,55,1,0,0,0),(36,1,4,32000,1,0,0,0),(36,2,4,33000,1,0,0,0),(36,3,4,460651065016,1,0,0,0),(36,49,4,55,1,0,0,0),(37,1,4,32000,1,0,0,0),(37,2,4,33000,1,0,0,0),(37,3,4,460651065016,1,0,0,0),(38,2,4,33000,1,0,0,0),(38,3,4,460651065016,1,0,0,0),(39,2,4,33000,1,0,0,0),(40,1,4,32000,1,1,1,0),(40,28,2,32000,1,1,1,0),(41,1,4,32000,1,0,0,0),(41,28,2,32000,1,0,0,0),(42,1,4,32000,1,0,0,0),(42,2,4,33000,1,0,0,0),(42,28,2,32000,1,0,0,0),(43,1,4,32000,1,0,0,0),(43,2,4,33000,1,0,0,0),(43,28,2,32000,1,0,0,0),(44,1,4,32000,1,0,0,0),(44,28,2,32000,1,0,0,0),(45,2,4,33000,1,0,0,0),(45,29,4,5000,1,0,0,0),(46,2,4,33000,1,0,0,0),(46,29,4,5000,1,0,0,0),(47,2,4,33000,1,0,0,0),(47,29,4,5000,1,0,0,0),(48,1,4,32000,1,5,1,0),(48,30,4,5000,1,5,1,0),(49,1,4,32000,1,5,1,0),(49,30,4,5000,1,5,1,0),(50,1,4,32000,1,0,0,0),(50,30,4,5000,1,0,0,0),(51,1,4,32000,1,5,1,0),(51,3,4,460651065016,1,5,1,0),(51,30,4,5000,1,5,1,0),(52,1,4,32000,1,5,1,0),(52,3,4,460651065016,1,5,1,0),(52,28,8,32000,1,5,1,0),(52,30,4,5000,1,5,1,0),(52,40,8,685685,1,5,1,0),(53,1,4,32000,1,5,1,0),(53,3,4,460651065016,1,5,1,0),(53,28,8,32000,1,5,1,0),(53,30,4,5000,1,5,1,0),(53,40,8,685685,1,5,1,0),(54,1,4,32000,1,0,0,0),(54,3,4,460651065016,1,0,0,0),(54,28,8,32000,1,0,0,0),(54,30,4,5000,1,0,0,0),(54,40,8,685685,1,0,0,0),(54,47,4,55,1,0,0,0),(55,1,4,32000,1,0,0,0),(55,3,4,460651065016,1,0,0,0),(55,28,8,32000,1,0,0,0),(55,30,4,5000,1,0,0,0),(55,40,8,685685,1,0,0,0),(56,1,4,32000,1,0,0,0),(56,3,4,460651065016,1,0,0,0),(56,28,8,32000,1,0,0,0),(56,30,4,5000,1,0,0,0),(57,2,99,33000,1,0,0,0),(57,39,4,500,1,0,0,0),(58,40,4,685685,1,0,0,0),(60,28,4,32000,1,5,1,0),(60,39,4,500,1,5,1,0),(61,28,4,32000,1,0,0,0),(61,29,4,5000,1,0,0,0),(61,40,4,685685,1,0,0,0),(62,29,4,5000,1,0,0,0),(62,40,4,685685,1,0,0,0),(63,29,7,5000,1,5,1,0),(63,39,4,500,1,5,1,0),(63,40,4,685685,1,5,1,0),(64,29,7,5000,1,0,0,0),(64,40,4,685685,1,0,0,0),(65,29,7,5000,1,5,1,0),(65,40,1,685685,1,5,1,0),(66,28,4,32000,1,0,0,0),(66,29,1,5000,1,0,0,0),(66,30,4,5000,1,0,0,0),(66,39,4,500,1,0,0,0),(67,28,4,32000,1,0,0,0),(67,29,1,5000,1,0,0,0),(67,30,4,5000,1,0,0,0),(68,1,4,32000,1,5,1,0),(68,2,4,33000,1,5,1,0),(68,29,4,5000,1,5,1,0),(69,40,4,685685,1,0,0,0),(70,29,4,5000,1,1,1,0),(70,40,4,685685,1,1,1,0),(71,29,4,5000,1,1,1,0),(71,40,4,685685,1,1,1,0),(72,29,4,5000,1,1,1,0),(72,40,4,685685,1,1,1,0),(73,29,4,5000,1,1,1,0),(73,40,4,685685,1,1,1,0),(74,29,4,5000,1,1,1,0),(74,40,4,685685,1,1,1,0),(75,29,4,5000,1,1,1,0),(75,40,4,685685,1,1,1,0),(76,29,4,5000,1,1,1,0),(76,40,4,685685,1,1,1,0),(77,29,4,5000,1,1,1,0),(77,40,4,685685,1,1,1,0),(78,29,4,5000,1,1,1,0),(78,40,4,685685,1,1,1,0),(79,29,4,5000,1,1,1,0),(79,40,4,685685,1,1,1,0),(80,29,4,5000,1,1,1,0),(80,40,4,685685,1,1,1,0),(81,29,4,5000,1,1,1,0),(81,40,4,685685,1,1,1,0),(82,29,4,5000,1,1,1,0),(82,40,4,685685,1,1,1,0),(83,29,4,5000,1,1,1,0),(83,40,4,685685,1,1,1,0),(84,29,4,5000,1,1,1,0),(84,40,4,685685,1,1,1,0),(85,29,4,5000,1,1,1,0),(85,40,4,685685,1,1,1,0),(86,29,4,5000,1,1,1,0),(86,40,4,685685,1,1,1,0),(87,29,4,5000,1,1,1,0),(87,40,4,685685,1,1,1,0),(88,29,4,5000,1,1,1,0),(88,40,4,685685,1,1,1,0),(89,29,4,5000,1,1,1,0),(89,40,4,685685,1,1,1,0),(90,29,4,5000,1,1,1,0),(90,40,4,685685,1,1,1,0),(91,29,4,5000,1,1,1,0),(91,40,4,685685,1,1,1,0),(92,29,4,5000,1,1,1,0),(92,40,4,685685,1,1,1,0),(93,29,4,5000,1,1,1,0),(93,40,4,685685,1,1,1,0),(94,29,4,5000,1,1,1,0),(94,40,4,685685,1,1,1,0),(95,29,4,5000,1,1,1,0),(95,40,4,685685,1,1,1,0),(96,29,4,5000,1,1,1,0),(96,40,4,685685,1,1,1,0),(97,29,4,5000,1,1,1,0),(97,40,4,685685,1,1,1,0),(98,29,4,5000,1,1,1,0),(98,40,4,685685,1,1,1,0),(99,29,4,5000,1,1,1,0),(99,40,4,685685,1,1,1,0),(100,29,4,5000,1,1,1,0),(100,40,4,685685,1,1,1,0),(101,29,4,5000,1,1,1,0),(101,40,4,685685,1,1,1,0),(102,1,4,32000,1,1,1,0),(102,29,4,5000,1,1,1,0),(103,1,4,32000,1,1,1,0),(103,29,4,5000,1,1,1,0),(104,1,4,32000,1,1,1,0),(104,29,4,5000,1,1,1,0),(105,1,4,32000,1,1,1,0),(105,29,4,5000,1,1,1,0),(106,1,4,32000,1,1,1,0),(106,29,4,5000,1,1,1,0),(107,1,4,32000,1,1,1,0),(107,29,4,5000,1,1,1,0),(108,1,4,32000,1,1,1,0),(108,29,4,5000,1,1,1,0),(109,1,4,32000,1,1,1,0),(109,29,4,5000,1,1,1,0),(110,1,4,32000,1,1,1,0),(110,29,4,5000,1,1,1,0),(111,1,4,32000,1,1,1,0),(111,29,4,5000,1,1,1,0),(112,1,4,32000,1,1,1,0),(112,29,4,5000,1,1,1,0),(113,1,4,32000,1,1,1,0),(113,29,4,5000,1,1,1,0),(114,1,4,32000,1,1,1,0),(114,29,4,5000,1,1,1,0),(115,1,4,32000,1,1,1,0),(115,29,4,5000,1,1,1,0),(116,1,4,32000,1,1,1,0),(116,29,4,5000,1,1,1,0),(117,1,4,32000,1,1,1,0),(117,29,4,5000,1,1,1,0),(118,1,4,32000,1,1,1,0),(118,29,4,5000,1,1,1,0),(119,1,4,32000,1,1,1,0),(119,29,4,5000,1,1,1,0),(120,1,4,32000,1,1,1,0),(120,29,4,5000,1,1,1,0),(121,1,4,32000,1,1,1,0),(121,29,4,5000,1,1,1,0),(122,1,4,32000,1,1,1,0),(122,29,4,5000,1,1,1,0),(123,1,4,32000,1,1,1,0),(123,29,4,5000,1,1,1,0),(124,1,4,32000,1,1,1,0),(124,29,4,5000,1,1,1,0),(125,1,4,32000,1,1,1,0),(125,29,4,5000,1,1,1,0),(126,1,4,32000,1,1,1,0),(126,29,4,5000,1,1,1,0),(127,1,4,32000,1,1,1,0),(127,29,4,5000,1,1,1,0),(128,1,4,32000,1,1,1,0),(128,29,4,5000,1,1,1,0),(129,1,4,32000,1,1,1,0),(129,29,4,5000,1,1,1,0),(130,1,4,32000,1,1,1,0),(130,29,4,5000,1,1,1,0),(131,1,4,32000,1,1,1,0),(131,29,4,5000,1,1,1,0),(132,1,4,32000,1,1,1,0),(132,29,4,5000,1,1,1,0),(133,1,4,32000,1,1,1,0),(133,29,4,5000,1,1,1,0),(134,1,4,32000,1,1,1,0),(134,29,4,5000,1,1,1,0),(135,1,4,32000,1,1,1,0),(135,29,4,5000,1,1,1,0),(136,1,4,32000,1,1,1,0),(136,29,4,5000,1,1,1,0),(137,1,4,32000,1,1,1,0),(137,29,4,5000,1,1,1,0),(138,1,4,32000,1,1,1,0),(138,29,4,5000,1,1,1,0),(139,1,4,32000,1,1,1,0),(139,29,4,5000,1,1,1,0),(140,1,4,32000,1,1,1,0),(140,29,4,5000,1,1,1,0),(141,1,4,32000,1,1,1,0),(141,29,4,5000,1,1,1,0),(142,1,4,32000,1,1,1,0),(142,29,4,5000,1,1,1,0),(143,1,4,32000,1,1,1,0),(143,29,4,5000,1,1,1,0),(144,1,4,32000,1,1,1,0),(144,29,4,5000,1,1,1,0),(145,1,4,32000,1,1,1,0),(145,29,4,5000,1,1,1,0),(146,1,4,32000,1,1,1,0),(146,40,9,685685,1,1,1,0);

/*Table structure for table `ordenproduccioncabecera` */

DROP TABLE IF EXISTS `ordenproduccioncabecera`;

CREATE TABLE `ordenproduccioncabecera` (
  `idorden` int(11) NOT NULL,
  `fechaelaboracion` date DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  `tipoproduccion` varchar(45) DEFAULT NULL,
  `Ci_Cliente` int(11) DEFAULT NULL,
  `Notas` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  `idCentroDeProduccion` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT '1',
  `codigoempleado` int(11) DEFAULT NULL,
  `idPresupuesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idorden`),
  KEY `FK_ordenproduccioncabecera` (`Ci_Cliente`),
  KEY `FK_ordenproduccioncabecera1` (`idCentroDeProduccion`),
  KEY `FK_ordenproduccioncabecera2` (`codigoalmacen`),
  KEY `FK_ordenproduccioncabecera3` (`idusuario`),
  KEY `FK_ordenproduccioncabecera5` (`idPresupuesto`),
  KEY `FK_ordenproduccioncabecera4` (`codigoempleado`),
  CONSTRAINT `FK_ordenproduccioncabecera4` FOREIGN KEY (`codigoempleado`) REFERENCES `empleado` (`codigoempleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordenproduccioncabecera` FOREIGN KEY (`Ci_Cliente`) REFERENCES `cliente` (`Ci_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordenproduccioncabecera1` FOREIGN KEY (`idCentroDeProduccion`) REFERENCES `centrodeproduccion` (`idCentroDeProduccion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordenproduccioncabecera2` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordenproduccioncabecera3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ordenproduccioncabecera5` FOREIGN KEY (`idPresupuesto`) REFERENCES `presupuestocabecera` (`idPresupuesto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ordenproduccioncabecera` */

insert  into `ordenproduccioncabecera`(`idorden`,`fechaelaboracion`,`fechaentrega`,`tipoproduccion`,`Ci_Cliente`,`Notas`,`estado`,`idCentroDeProduccion`,`codigoalmacen`,`idusuario`,`codigoempleado`,`idPresupuesto`) values (1,'2018-09-28','2018-09-29','para cocina',45242423,'nueva oenn','activo',1,1,1,1,1),(2,'2018-09-28','2018-09-30','coin',45242423,'244','ACTIVO',1,1,1,1,1),(3,'2018-09-28','2018-09-28','PARA STOCK',45242423,NULL,'ACTIVO',1,1,1,1,1),(4,'2018-09-28','2018-09-28','PARA STOCK',45242423,NULL,'ACTIVO',1,1,1,1,1),(5,'2018-09-28','2018-09-28','PARA STOCK',45242423,'orden dos','ACTIVO',1,1,1,1,1),(6,'2018-09-28','2018-09-28','PARA STOCK',45242423,'orden dos','ACTIVO',2,1,1,1,1),(7,'2018-09-28','2018-09-28','PARA STOCK',45242423,'orden dos','ACTIVO',2,1,1,1,1),(8,'2018-09-28','2018-09-28','PARA STOCK',45242423,'orden dos','ACTIVO',2,1,1,1,1),(9,'2018-09-28','2018-09-28','PARA STOCK',45242423,'orden dos','ACTIVO',2,1,1,1,1),(10,'2018-09-28','2018-09-28','PARA STOCK',45242423,'orden dos','ACTIVO',2,1,1,1,1),(11,'2018-09-29','2018-09-21','PEDIDOS SUCURSALES',45242423,'bufffet lunes 7','ACTIVO',1,1,1,1,1),(12,'2018-09-29','2018-09-05','PEDIDOS SUCURSALES',45242423,'esalada lunes 8','ACTIVO',1,1,1,1,1),(13,'2018-09-29','2018-09-07','PEDIDOS EVENTOS',45242423,'nueva orden','ACTIVO',1,1,1,1,1),(14,'2018-09-29','2018-09-07','PEDIDOS EVENTOS',45242423,'thtwy','ACTIVO',1,1,1,1,1),(15,'2018-09-30','2018-09-07','PEDIDOS EVENTOS',45242423,'ywyw','ACTIVO',1,1,1,1,1),(16,'2018-09-30','2018-09-07','PEDIDOS EVENTOS',45242423,'ywywy','ACTIVO',1,1,1,1,1),(17,'2018-09-30','2018-09-07','PEDIDOS EVENTOS',45242423,'yteyey','ACTIVO',1,1,1,1,1),(18,'2018-09-30','2018-09-29','PARA STOCK',45242423,'COCINA BUFFET LUNES 07','ACTIVO',1,1,1,1,1),(19,'2018-09-30','2018-09-29','PARA STOCK',45242423,'COCINA BUFFET MARTES 9 DE AGOSTO','ACTIVO',1,1,1,1,1),(20,'2018-09-30','2018-09-29','PARA STOCK',45242423,'ENSALADA LUNES 9 DE AGOSTO','ACTIVO',1,1,1,1,1),(21,'2018-09-30','2018-09-11','PARA STOCK',45242423,'nueva orden','ACTIVO',1,2,1,1,1),(22,'2018-09-30','2018-09-29','PARA STOCK',45242423,'bufet semana tres','ACTIVO',1,1,1,1,1),(23,'2018-10-01','2018-10-03','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(24,'2018-10-01','2018-10-04','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(25,'2018-10-01','2018-10-04','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(26,'2018-10-01','2018-10-04','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(27,'2018-10-01','2018-10-04','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(28,'2018-10-01','2018-10-04','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(29,'2018-10-01','2018-10-04','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(30,'2018-10-01','2018-10-04','PARA STOCK',45242423,'produccion de prueba','ACTIVO',2,1,1,1,1),(31,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(32,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(33,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(34,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(35,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(36,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(37,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(38,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(39,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(40,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(41,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(42,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(43,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(44,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(45,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(46,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(47,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(48,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(49,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(50,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(51,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(52,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(53,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(54,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(55,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(56,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(57,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(58,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(59,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(60,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(61,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(62,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(63,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(64,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(65,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(66,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(67,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(68,'2018-10-02','2018-10-03','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,2,1,1,1),(69,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(70,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(71,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(72,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(73,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(74,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(75,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(76,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(77,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(78,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(79,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(80,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(81,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(82,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(83,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(84,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(85,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(86,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(87,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(88,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(89,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(90,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(91,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(92,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(93,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(94,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(95,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(96,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(97,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(98,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(99,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(100,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(101,'2018-08-03','2018-10-04','PARA STOCK',45242423,'prueba pdf','ACTIVO',1,1,1,1,1),(102,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(103,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(104,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(105,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(106,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(107,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(108,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(109,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(110,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(111,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(112,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(113,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(114,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(115,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(116,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(117,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(118,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(119,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(120,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(121,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(122,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(123,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(124,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(125,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(126,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(127,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(128,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(129,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(130,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(131,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(132,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(133,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(134,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(135,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(136,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(137,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(138,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(139,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(140,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(141,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(142,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(143,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(144,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(145,'2018-10-04','2018-10-26','PARA STOCK',45242423,'PAR EL PDF','ACTIVO',1,1,1,1,1),(146,'2018-10-04','2018-10-05','PARA STOCK',45242423,'pedido aldo arealo','ACTIVO',1,1,1,1,1);

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `codigopais` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigopais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pais` */

insert  into `pais`(`codigopais`,`descripcion`) values (1,'PARAGUAY'),(2,'ARGENTINA'),(3,'BRASIL'),(4,'Nueva Zelanda'),(5,'Nueva Zelanda');

/*Table structure for table `pedidocabecera` */

DROP TABLE IF EXISTS `pedidocabecera`;

CREATE TABLE `pedidocabecera` (
  `idPedidoCompra` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Vencimiento` date DEFAULT NULL,
  `Notas` varchar(50) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT '1',
  `cliente` varchar(50) DEFAULT NULL,
  `idusuario` int(11) DEFAULT '1',
  PRIMARY KEY (`idPedidoCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedidocabecera` */

insert  into `pedidocabecera`(`idPedidoCompra`,`Fecha`,`Vencimiento`,`Notas`,`codigoalmacen`,`cliente`,`idusuario`) values (1,'2018-07-26','2018-07-26','Notassss',1,'dossss',1),(2,'2018-06-30','2018-07-29','nuevo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(3,'2018-06-30','2018-06-30','5555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(4,'2018-06-30','2018-06-30','nuevo valor',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(5,'2018-06-30','2018-07-29','444',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(6,'2018-06-30','2018-07-29','44',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(7,'2018-07-29','2018-08-26','44',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(8,'2018-07-23','2018-08-26','444',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(9,'2018-06-16','2018-07-29','cinco',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(10,'2018-07-15','2018-08-26','siete illones',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(11,'2018-07-22','2018-08-26','555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(12,'2018-06-30','2018-06-30','44444',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(13,'2018-06-30','2018-06-30','ocho',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(14,'2018-07-22','2018-08-27','ocho vecer',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(15,'2018-07-29','2018-07-31','cino',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(16,'2018-07-29','2018-08-26','ocho vecers ya',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(17,'2018-07-29','2018-08-28','ocho',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(18,'2018-06-30','2018-06-30','55',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(19,'2018-05-27','2018-06-30','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(20,'2018-06-16','2018-06-30','nota valida',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(21,'2018-06-30','2018-08-27','nota valida',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(22,'2018-06-30','2018-07-17','j',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(23,'2018-07-15','2018-08-26','dant',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(24,'2018-06-30','2018-06-30','codigo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(25,'2018-06-30','2018-06-30','notas',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(26,'2018-07-30','2018-08-27','focus',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(27,'2018-07-28','2018-07-28','nuevo pedido de compras',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(28,'2018-07-28','2018-07-28','data',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(29,'2018-08-19','2018-09-23','Ã±Ã±',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(30,'2018-07-28','2018-07-28','notas pedido',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(31,'2018-07-28','2018-08-26','555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(32,'2018-07-28','2018-08-26','jhjhj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(33,'2018-07-28','2018-08-27','cabtudad',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(34,'2018-08-26','2018-09-25','final',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(35,'2018-07-21','2018-08-28','44',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(36,'2018-06-30','2018-06-30','4',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(37,'2018-08-19','2018-09-16','555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(38,'2018-07-28','2018-07-28','22',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(39,'2018-07-28','2018-07-28','modelo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(40,'2018-08-20','2018-09-18','precio',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(41,'2018-07-20','2018-07-21','fdsaf',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(42,'2018-08-19','2018-09-23','55',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(43,'2018-08-26','2018-09-23','jyjfj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(44,'2018-07-21','2018-07-28','4',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(45,'2018-08-20','2018-09-16','4',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(46,'2018-08-19','2018-09-30','4444',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(47,'2018-07-28','2018-07-28','jjk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(48,'2018-07-28','2018-07-28','444',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(49,'2018-08-27','2018-09-17','5',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(50,'2018-07-28','2018-08-27','5',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(51,'2018-08-12','2018-08-18','grsg',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(52,'2018-08-26','2018-09-30','gfsg',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(53,'2018-07-28','2018-07-28','precio',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(54,'2018-08-19','2018-08-24','hghs',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(55,'2018-08-12','2018-08-25','hgdh',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(56,'2018-07-28','2018-07-28','gregr',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(57,'2018-07-20','2018-07-28','vence',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(58,'2018-07-20','2018-07-26','nuevo pedido',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(59,'2018-07-28','2018-08-26','prueg 50',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(60,'2018-07-21','2018-08-26','si se va',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(61,'2018-07-28','2018-07-28','no se va',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(62,'2018-07-28','2018-07-28','no se va',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(63,'2018-07-28','2018-07-28','no se va',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(64,'2018-07-27','2018-07-28','dd1',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(65,'2018-07-27','2018-07-28','dd2',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(66,'2018-07-26','2018-08-26','hola soy monica',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(67,'2018-06-09','2018-09-10','gfg',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(68,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(69,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(70,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(71,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(72,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(73,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(74,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(75,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(76,'2018-08-20','2018-08-25','kkk',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(77,'2018-08-20','2018-08-25','hola soy monica',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(78,'2018-08-20','2018-08-25','hola soy monica',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(79,'2018-08-20','2018-08-25','hola soy monica',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(80,'2018-08-20','2018-08-25','hola soy monica',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(81,'2018-07-28','0000-00-00','fafa',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(82,'2018-07-28','2018-08-26','fafa',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(83,'2018-07-28','2018-08-26','fafa',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(84,'2018-07-28','2018-08-26','prueba parcial',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(85,'2018-07-28','2018-08-26','prueba parcial',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(86,'2018-07-21','2018-09-02','prueba parcial',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(87,'2018-07-21','2018-09-02','ALDO AREVALO ORTIZ',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(88,'2018-07-21','2018-09-02','ALDO AREVALO ORTIZ',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(89,'2018-07-21','2018-09-02','ALDO AREVALO ORTIZ',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(90,'2018-07-21','2018-09-02','ivan',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(91,'2018-07-21','2018-09-02','ivan',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(92,'2018-07-21','2018-09-02','ivan',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(93,'2018-07-21','2018-09-02','MARIO AREVALO',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(94,'2018-07-21','2018-09-01','MONICA',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(95,'2018-07-21','2018-07-28','ALDO AREVALO ORTIZ',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(96,'2018-07-31','2018-08-31','como es',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(97,'2018-07-25','2018-07-27','colombia camppeon',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(98,'2018-07-31','2018-09-24','nuevo itemd',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(99,'2018-09-25','2018-10-31','notas 98',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(100,'2018-08-24','2018-09-16','nuevo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(101,'2018-08-24','2018-09-16','nuevo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(102,'2018-07-29','2018-08-01','hhhhhhhh',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(103,'2018-08-18','2018-09-18','5555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(104,'2018-08-17','2018-09-16','LA NOTA NUMERO 200',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(105,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(106,'2018-08-18','2018-09-16','neva nota',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(107,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(108,'2018-08-25','2018-09-16','otro mas',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(109,'2018-08-25','2018-09-16','otro mas',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(110,'2018-08-04','2018-09-02','notas',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(111,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(112,'2018-09-23','2018-10-29','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(113,'2018-08-11','2018-09-09','ff',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(114,'2018-09-23','2018-10-29','5555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(115,'2018-09-23','2018-10-29','5555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(116,'2018-09-23','2018-10-29','5555',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(117,'2018-08-25','2018-09-16','nuevo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(118,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(119,'2018-08-25','2018-09-18','otro mas nuevo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(120,'2018-08-17','2018-09-16','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(121,'2018-08-17','2018-09-16','4',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(122,'2018-08-17','2018-09-16','44',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(123,'2018-08-17','2018-09-16','44',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(124,'2018-08-17','2018-09-16','otro',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(125,'2018-08-11','2018-08-24','NUEVO PEDIDO',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(126,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(127,'2018-08-18','2018-08-25','hola puedo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(128,'2018-08-25','2018-08-25','pedido un',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(129,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(130,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(131,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(132,'2018-07-28','2018-09-16','nuevo tem',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(133,'2018-08-17','2018-09-23','android',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(134,'2018-08-24','2018-08-31','ttttt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(135,'2018-08-03','2018-08-25','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(136,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(137,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(138,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(139,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(140,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(141,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(142,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(143,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(144,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(145,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(146,'2018-08-11','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(147,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(148,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(149,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(150,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(151,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(152,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(153,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(154,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(155,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(156,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(157,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(158,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(159,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(160,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(161,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(162,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(163,'2018-08-17','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(164,'2018-08-03','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(165,'2018-08-02','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(166,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(167,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(168,'2018-08-18','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(169,'2018-08-18','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(170,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(171,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(172,'2018-08-10','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(173,'2018-08-10','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(174,'0000-00-00','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(175,'2018-08-10','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(176,'2018-08-10','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(177,'2018-08-10','0000-00-00','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(178,'2018-08-25','2018-09-30','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(179,'0000-00-00','2018-09-30','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(180,'0000-00-00','2018-09-30','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(181,'2018-08-03','2018-09-20','',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(182,'2018-08-03','2018-09-20','notas',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(183,'2018-08-03','2018-09-20','nota numero n',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(184,'2018-08-03','2018-09-20','nota numero n',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(185,'2018-08-03','2018-09-20','nota numero n aaa rrr',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(186,'2018-08-03','2018-09-20','nota numero n aa',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(187,'2018-08-03','2018-09-20','nota numero n aa',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(188,'2018-08-03','2018-09-20','ggfgg fdfdaf',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(189,'2018-08-03','2018-09-20','ggfgg fdfdaf',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(190,'0000-00-00','0000-00-00','tttt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(191,'0000-00-00','0000-00-00','nombre',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(192,'0000-00-00','0000-00-00','nombre',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(193,'2018-08-24','2018-08-31','rgrwt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(194,'2018-08-24','2018-08-31','rgrwt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(195,'2018-08-24','2018-08-31','rgrwt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(196,'2018-08-24','2018-08-31','rgrwt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(197,'2018-08-24','2018-08-31','rgrwt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(198,'2018-08-24','2018-08-31','rgrwt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(199,'2018-08-24','2018-08-31','rgrwt',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(200,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(201,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(202,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(203,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(204,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(205,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(206,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(207,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(208,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(209,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(210,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(211,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(212,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(213,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(214,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(215,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(216,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(217,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(218,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(219,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(220,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(221,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(222,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(223,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(224,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(225,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(226,'2018-08-24','2018-08-31','rgrwtjj',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(227,'2018-09-15','2018-10-14','NTAS',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(228,'2018-09-15','2018-10-14','NTAS',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(229,'2018-09-15','2018-10-14','NTAS',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(230,'2018-09-15','2018-10-21','NOTAS',1,NULL,1),(231,'2018-08-26','2018-08-26','MFA',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(232,'2018-09-14','2018-10-21','notas',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(233,'2018-09-15','2018-10-14','nuev pedidoggg',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(234,'2018-09-22','2018-09-29','pedido jornada primera',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(235,'2018-09-29','2018-09-29','nuevo pedido de compras',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(236,'2018-10-14','2018-11-11','fdafaf',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(237,'2018-10-13','2018-10-20','nuebo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(238,'2018-10-13','2018-10-20','nuebo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(239,'2018-10-13','2018-10-20','nuebo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(240,'2018-10-13','2018-10-20','nuebo',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(241,'2018-10-05','2018-10-06','ordeh',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(242,'2018-10-05','2018-10-06','ordeh',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(243,'2018-10-12','2018-10-12','bbbbb',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(244,'2018-10-18','2018-10-18','pedido semana',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(245,'2018-10-18','2018-10-18','pedido semana',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(246,'2018-10-18','2018-10-18','pedido semana',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(247,'2018-11-02','2018-11-08','nota numero uno',1,'ALIMENTOS Y SERVICIOS S.R.L',1),(248,'2018-11-01','2018-11-09','normas apa',1,'ALIMENTOS Y SERVICIOS S.R.L',1);

/*Table structure for table `pedidodenotaderemision` */

DROP TABLE IF EXISTS `pedidodenotaderemision`;

CREATE TABLE `pedidodenotaderemision` (
  `nrpedido` int(11) NOT NULL,
  `idplantilla` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) DEFAULT NULL,
  `Idsucursal` int(11) DEFAULT NULL,
  `notas` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  PRIMARY KEY (`nrpedido`),
  KEY `FK_pedidodenotaderemision` (`codigoalmacen`),
  KEY `FK_pedidodenotaderemision1` (`Idsucursal`),
  CONSTRAINT `FK_pedidodenotaderemision` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_pedidodenotaderemision1` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedidodenotaderemision` */

insert  into `pedidodenotaderemision`(`nrpedido`,`idplantilla`,`codigoalmacen`,`Idsucursal`,`notas`,`fecha`,`fechaentrega`) values (1,1,1,1,'no aplica','2018-11-22','2018-11-23'),(2,1,11,4,'nota dos','2018-11-01','2018-11-15'),(3,1,11,8,'nota prrr','2018-11-21','2018-11-23'),(4,1,11,8,'nota prrr','2018-11-21','2018-11-23');

/*Table structure for table `pedidodenotaderemisiondetalle` */

DROP TABLE IF EXISTS `pedidodenotaderemisiondetalle`;

CREATE TABLE `pedidodenotaderemisiondetalle` (
  `nrpedido` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `codigoalmacen` int(1) NOT NULL,
  PRIMARY KEY (`nrpedido`,`codigoproducto`),
  KEY `FK_pedidodenotaderemisiondetalle` (`codigoalmacen`),
  KEY `FK_pedidodenotaderemisiondetalle1` (`Idsucursal`),
  CONSTRAINT `FK_pedidodenotaderemisiondetalle1` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_pedidodenotaderemisiondetalle` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedidodenotaderemisiondetalle` */

insert  into `pedidodenotaderemisiondetalle`(`nrpedido`,`codigoproducto`,`cantidad`,`Idsucursal`,`codigoalmacen`) values (4,1,1,14,13),(4,40,4,14,13);

/*Table structure for table `pedidodetalle` */

DROP TABLE IF EXISTS `pedidodetalle`;

CREATE TABLE `pedidodetalle` (
  `id` varchar(250) NOT NULL,
  `idPedidoCompra` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` double(10,2) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`,`idPedidoCompra`,`codigoproducto`),
  KEY `FK_pedidodetalle` (`codigoproducto`),
  KEY `FK_pedidodetalle1` (`idPedidoCompra`),
  CONSTRAINT `FK_pedidodetalle` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_pedidodetalle1` FOREIGN KEY (`idPedidoCompra`) REFERENCES `pedidocabecera` (`idPedidoCompra`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedidodetalle` */

insert  into `pedidodetalle`(`id`,`idPedidoCompra`,`codigoproducto`,`cantidad`,`precio`) values ('1',1,1,1.00,320000),('5b2ed97153792',8,1,4.00,32000),('5b2ed97163aa9',8,1,4.00,32000),('5b2ed99eaf450',9,2,8.00,33000),('5b2ed99eba444',9,2,8.00,33000),('5b2ed99ec50c5',9,2,8.00,33000),('5b2ed99ecd387',9,2,8.00,33000),('5b2ed99ed550e',9,1,8.00,32000),('5b2edc7e00a96',11,2,5.00,3),('5b2edc7e10d7d',11,2,5.00,3),('5b2edc9d6c305',12,2,4.00,3),('5b2edc9d796c6',12,1,4.00,3),('5b2edc9d899ea',12,2,4.00,0),('5b2edcd1837a5',13,2,445.00,3),('5b2edcd193a94',13,2,55.00,3),('5b2edcd19bc85',13,2,5.00,0),('5b2edcd1a3ed0',13,2,5.00,0),('5b2edf6a682c3',14,2,5.00,3),('5b2edf6a7052c',14,2,5.00,2),('5b2edf6a787e2',14,1,44.00,0),('5b2ee11cde5fc',15,1,40.00,3),('5b2ee22e67455',16,2,4.00,3),('5b2ee22e77734',16,2,4.00,3),('5b2ee2ff1797f',17,2,4.00,3),('5b2ee2ff2a875',17,2,4.00,3),('5b3018598f581',27,1,45.00,3),('5b3018599a307',27,1,45.00,3),('5b301859a2402',27,1,45.00,0),('5b301859aa833',27,2,45.00,0),('5b3018bf74aa1',28,2,55.00,3),('5b3018bf7caad',28,2,5.00,3),('5b3018bf84ddb',28,2,5.00,0),('5b3018bf8cea9',28,2,5.00,0),('5b3018bf95298',28,2,45.00,0),('5b3019005d488',29,1,45.00,3),('5b3019006587d',29,1,65.00,3),('5b3019006d8eb',29,1,65.00,0),('5b30190075b2c',29,1,65.00,0),('5b3019007dcf4',29,1,65.00,0),('5b301997d0d71',30,1,463.00,3),('5b301997e4738',30,1,78.00,0),('5b301998047e2',30,1,78.00,0),('5b3019980d675',30,1,78.00,0),('5b301a8acc661',31,2,5.00,3),('5b301a8ad9ac3',31,2,5.00,3),('5b301a8ae219b',31,2,5.00,0),('5b301a8aea272',31,2,5.00,0),('5b301a8af242c',31,2,5.00,0),('5b301af0b9ce6',32,2,4.00,3),('5b301af0c1e4f',32,2,4.00,3),('5b301af0ca005',32,2,4.00,0),('5b301af0d7a7d',32,2,4.00,0),('5b301af0dfa17',32,2,4.00,0),('5b301b66d444b',33,2,45.00,3),('5b301b66e4795',33,2,45.00,3),('5b301b66ec943',33,2,45.00,0),('5b301b67008bd',33,2,45.00,0),('5b301b6708a86',33,2,45.00,0),('5b301f408c6af',34,1,4.00,3),('5b301f409482b',34,1,4.00,3),('5b301f409c8ea',34,2,4.00,0),('5b301f40a4aac',34,2,4.00,0),('5b301f40accc8',34,2,4.00,0),('5b301fa6a7b63',35,1,4.00,3),('5b301fa6b7e96',35,1,4.00,2),('5b301fa6c00c8',35,1,4.00,0),('5b301fa6c8223',35,1,4.00,0),('5b30203961dd8',36,1,4.00,3),('5b30203969f29',36,1,4.00,2),('5b30203972134',36,1,4.00,0),('5b3022fee2088',38,2,33000.00,5),('5b3022fef23ca',38,2,33000.00,5),('5b302377be5fc',39,1,4565.00,32000),('5b302377d14b4',39,1,454.00,32000),('5b302377decd0',39,1,45.00,32000),('5b302377ebfe8',39,1,45.00,32000),('5b30237802fb3',39,1,455.00,32000),('5b3023780dcb9',39,1,45.00,32000),('5b3023de71f55',40,1,32000.00,45),('5b3023de7a413',40,1,32000.00,45),('5b3023de8259d',40,1,32000.00,455),('5b3023de8a6ff',40,1,32000.00,4565),('5b3023de929d3',40,1,32000.00,45),('5b3023de9aab0',40,1,32000.00,45),('5b3023dea2cab',40,1,32000.00,45),('5b3023deaae4e',40,1,32000.00,45),('5b3023deb2fe0',40,1,32000.00,45),('5b3023debb1d0',40,1,32000.00,45),('5b3023dec33a7',40,1,32000.00,45),('5b302410bee06',41,1,32000.00,44),('5b302410d1763',41,1,32000.00,44),('5b302410d9e00',41,1,32000.00,4),('5b302410e1ff1',41,1,32000.00,4),('5b302410ea184',41,1,32000.00,4),('5b302410f236a',41,1,32000.00,4),('5b302411063a1',41,2,33000.00,44),('5b3024110e59c',41,2,33000.00,4),('5b30241116672',41,2,33000.00,45),('5b30258ab5367',42,1,32000.00,3),('5b30258acd1e8',42,1,32000.00,3),('5b30258adef2f',42,1,32000.00,0),('5b30258aeb2a8',42,1,32000.00,0),('5b30258af345c',42,1,32000.00,0),('5b3025f15da20',43,1,32000.00,3),('5b3025f1661e1',43,1,32000.00,2),('5b30261545d06',44,2,33000.00,3),('5b30261553098',44,2,33000.00,3),('5b3026155b763',44,2,33000.00,0),('5b3026156398a',44,2,33000.00,0),('5b3026156bb6a',44,2,33000.00,0),('5b302659de426',45,1,32000.00,3),('5b302659eb6df',45,1,32000.00,2),('5b302659f3de5',45,1,32000.00,0),('5b3026b6f422e',46,2,33000.00,3),('5b3026b70817e',46,2,33000.00,3),('5b3026b7103a1',46,2,33000.00,0),('5b30270b63d5a',47,1,32000.00,3),('5b30270b845bc',47,1,32000.00,2),('5b302723a292e',48,1,32000.00,3),('5b302723b568d',48,1,32000.00,2),('5b3027b11eff8',49,2,33000.00,5),('5b3027b131a40',49,2,33000.00,5),('5b3027b13df46',49,2,33000.00,5),('5b3027eb8feb0',50,2,33000.00,55),('5b3027eba264f',50,2,33000.00,555),('5b3027ebaeb68',50,2,33000.00,65),('5b302849d3f1f',51,2,0.79,33000),('5b302849e3128',51,2,88.00,33000),('5b302849eeef2',51,2,889.00,33000),('5b30284a02e8d',51,2,88.00,33000),('5b30284a1320c',51,2,0.79,33000),('5b30284a1b477',51,2,0.69,33000),('5b30284a2357a',51,2,89.00,33000),('5b30284a2b73a',51,1,0.55,32000),('5b30284a338fb',51,1,0.69,32000),('5b3028f20b253',52,1,45.00,32000),('5b3028f21bb69',52,1,45.00,32000),('5b3028f227807',52,2,0.79,33000),('5b30298898851',53,2,5.00,33000),('5b302988ab721',53,2,5.00,33000),('5b302988b3857',53,2,5.00,33000),('5b302988bb9a3',53,2,5.00,33000),('5b302988c3b45',53,2,5.00,33000),('5b302988cbd19',53,2,5.00,33000),('5b302988d3ede',53,2,5.00,33000),('5b302988dc0c7',53,1,5.00,32000),('5b302988e4270',53,1,5.00,32000),('5b302988ec42a',53,1,5.00,32000),('5b30298905a31',53,1,1.00,32000),('5b302a1261684',54,2,5.00,33000),('5b302a12775d0',54,2,5.00,33000),('5b302a1283437',54,2,5.00,33000),('5b302a128b59c',54,2,5.00,33000),('5b302a1293759',54,2,5.00,33000),('5b302a129b913',54,1,5.00,32000),('5b302b137cc60',56,1,4.00,32000),('5b302b1384dcb',56,1,0.32,32000),('5b302b138cf67',56,1,0.30,32000),('5b302b13951c8',56,1,0.50,32000),('5b302b139d453',56,2,0.69,33000),('5b3037980c71a',57,2,5.00,33000),('5b30379827893',57,2,5.00,33000),('5b3037983c257',57,2,5.00,33000),('5b3037984a69f',57,2,5.00,33000),('5b30379858bd8',57,2,5.00,33000),('5b30379866b79',57,1,0.55,32000),('5b342602ec81a',60,1,5.00,32000),('5b34260302cc4',60,1,5.00,32000),('5b3426030aeba',60,1,5.00,32000),('5b3426031055f',60,1,5.00,32000),('5b34260318721',60,1,5.00,32000),('5b3426031de98',60,1,5.00,32000),('5b34260325f6d',60,1,5.00,32000),('5b3426032b621',60,2,5.00,33000),('5b3426ad11b37',61,1,5.00,32000),('5b3426ad19e55',61,1,5.00,32000),('5b3426ad21f88',61,1,455.00,32000),('5b3426ad2cca1',61,1,45.00,32000),('5b3426ad34423',61,1,45.00,32000),('5b3426ad3cdf7',61,1,45.00,32000),('5b3426e1546ac',62,1,5.00,32000),('5b3426e159d72',62,1,5.00,32000),('5b3426e161f47',62,1,455.00,32000),('5b3426e167555',62,1,45.00,32000),('5b3426e16f72e',62,1,45.00,32000),('5b3426e174db6',62,1,45.00,32000),('5b3426e17cf7d',62,1,5.00,32000),('5b3426e18264e',62,1,5.00,32000),('5b4b48903e1b6',64,1,5.00,32000),('5b4b4890589e0',64,2,5.00,33000),('5b4b4a38a6d3a',65,1,5.00,32000),('5b4b4a38b2696',65,2,5.00,33000),('5b4fd6b7ded1a',66,1,5.00,32000),('5b4fd6b7e4314',66,2,10.00,33000),('5b51259c6b74c',67,1,5.00,32000),('5b51259c70db3',67,2,5.00,33000),('5b539d5bb251d',68,2,5.00,33000),('5b539e2cc0e6f',69,2,5.00,33000),('5b539e833cae6',70,2,5.00,33000),('5b539fb9687eb',71,1,5.00,32000),('5b53a0b88c6fe',72,1,5.00,32000),('5b53a267da625',73,1,5.00,32000),('5b53a4ff1b905',74,1,5.00,32000),('5b53a83ca9b4e',75,1,5.00,32000),('5b53a918e7149',76,1,5.00,32000),('5b53b45396421',77,2,5.00,33000),('5b53b4539ba6e',77,2,5.00,33000),('5b53b453a11af',77,1,5.00,32000),('5b53b4611a5bc',78,2,5.00,33000),('5b53b46125051',78,2,5.00,33000),('5b53b4612dcc7',78,1,5.00,32000),('5b53b47955e21',79,2,5.00,33000),('5b53b4796137d',79,2,5.00,33000),('5b53b47966a09',79,1,5.00,32000),('5b53b4b5eb41d',80,2,5.00,33000),('5b53b4b5f3623',80,2,5.00,33000),('5b53b4b604a21',80,1,5.00,32000),('5b53bba7ee46b',81,1,5.00,32000),('5b53bba804cfc',81,2,5.00,33000),('5b53c8c499b8c',82,1,2.00,32000),('5b53c8c4aca97',82,2,2.00,33000),('5b53cb577c3b9',83,1,2.00,32000),('5b53cb5787185',83,2,2.00,33000),('5b53cc953fa5d',84,2,2.00,33000),('5b53cc9549e05',84,2,5.00,33000),('5b53cc9551dbc',84,2,5.00,33000),('5b53cd3a806a4',85,2,2.00,33000),('5b53cd3a891e5',85,2,5.00,33000),('5b53cd3a8e886',85,2,5.00,33000),('5b53d7b9cb752',86,2,2.00,33000),('5b53d7b9d5bb2',86,2,5.00,33000),('5b53d7b9dbac6',86,2,5.00,33000),('5b53d7b9e10fb',86,1,5.00,32000),('5b53d7b9e68f6',86,2,5.00,33000),('5b53d7e5a60ff',87,2,2.00,33000),('5b53d7e5b0d83',87,2,5.00,33000),('5b53d7e5b6db6',87,2,5.00,33000),('5b53d7e5bc45c',87,1,5.00,32000),('5b53d7e5c4618',87,2,5.00,33000),('5b53db5f68dbe',88,2,2.00,33000),('5b53db5f743a6',88,2,5.00,33000),('5b53db5f79b4a',88,2,5.00,33000),('5b53db5f7f0c0',88,1,5.00,32000),('5b53db5f8f4d8',88,2,5.00,33000),('5b53db9225780',89,2,2.00,33000),('5b53db9230d8d',89,2,5.00,33000),('5b53db923654a',89,2,5.00,33000),('5b53db923ba99',89,1,5.00,32000),('5b53db9241342',89,2,5.00,33000),('5b53db9f5074c',90,2,2.00,33000),('5b53db9f5aa8f',90,2,5.00,33000),('5b53db9f60a8e',90,2,5.00,33000),('5b53db9f66106',90,1,5.00,32000),('5b53db9f6b76b',90,2,5.00,33000),('5b53dbb02b1c5',91,1,5.00,32000),('5b53dbb0366e5',91,2,5.00,33000),('5b53dc5db6ef2',92,1,5.00,32000),('5b53dc5dbc36d',92,2,5.00,33000),('5b569259d4dcd',95,1,5.00,32000),('5b5693bfe4226',93,1,5.00,32000),('5b5693bfe96d1',93,1,5.00,32000),('5b5693bfeed8a',93,2,5.00,33000),('5b57ad014fca3',97,1,21.00,32000),('5b57ad015ebd2',97,1,6.00,32000),('5b57ad01643f3',97,2,6.00,33000),('5b5d0cdde8a1d',99,2,5.00,33000),('5b5d0cde03f33',99,2,5.00,33000),('5b5d0cde0951d',99,1,99.00,32000),('5b5e19e3e9001',100,1,5.00,32000),('5b5e19e40388e',100,1,5.00,32000),('5b5e19e408e87',100,1,5.00,32000),('5b5e19e40e53f',100,1,5.00,32000),('5b5e19e413d68',100,1,5.00,32000),('5b5e260fcc089',101,3,5.00,31000),('5b5e260fd2b88',101,3,5.00,31000),('5b5e260fd84ca',101,1,5.00,32000),('5b5e260fdede9',101,1,5.00,32000),('5b5e260fe448d',101,2,5.00,33000),('5b5e260feb0fd',101,3,5.00,31000),('5b5e3e3679344',98,1,5.00,32000),('5b5e3e3688465',98,2,5.00,33000),('5b5e3eff9e58a',102,3,5.00,31000),('5b5e3effabda8',102,3,5.00,31000),('5b5e3effb2739',102,3,5.00,31000),('5b5e3effb7e4d',102,3,5.00,31000),('5b5e3effbd45e',102,1,85.00,32000),('5b5e3effc2b09',102,2,5.00,33000),('5b5e3effc81e2',102,1,5.00,32000),('5b5e3effcd810',102,1,5.00,32000),('5b5e6a5c8022b',103,1,5.00,32000),('5b5e6a5c86d3d',103,1,5.00,32000),('5b5e6c9f42546',59,3,5.00,31000),('5b5e6c9f49015',59,3,5.00,31000),('5b5e6c9f4e8f0',59,3,3.00,31000),('5b5e6c9f53e8b',59,3,5.00,31000),('5b5e6c9f595b4',59,3,55.00,31000),('5b5e6c9f5eac8',59,1,45.00,32000),('5b5e6c9f64690',59,1,5.00,32000),('5b5e6c9f6adef',59,1,45.00,32000),('5b5e6c9f7058a',59,1,5.00,32000),('5b5e6c9f77096',59,1,45.00,32000),('5b5e6c9f7ca00',59,1,455.00,32000),('5b5e6c9f83517',59,2,3.00,33000),('5b5e6c9f8dea4',59,3,56.00,31000),('5b5e6c9f9618c',59,3,500.00,31000),('5b5e6c9f9b82f',59,3,5.00,31000),('5b5e6c9fa0f40',59,1,5.00,32000),('5b5e6c9fa6531',59,2,500.00,33000),('5b5e6c9fabbac',59,2,5.00,33000),('5b5e6c9fb1279',59,2,5.00,33000),('5b5e6c9fb7dcf',59,2,5.00,33000),('5b5e6c9fbd6a8',59,2,9.00,33000),('5b5e6c9fc40f7',59,2,97.00,33000),('5b5e6c9fc97ca',59,2,7.00,33000),('5b5e6c9fd02fe',59,2,7.00,33000),('5b5e6c9fd5bb3',59,2,7.00,33000),('5b5e6c9fdb000',59,2,7.00,33000),('5b5e6c9fe0865',59,2,7.00,33000),('5b5e6c9fe5d55',59,2,4.00,33000),('5b5e6c9feb577',59,2,20.00,33000),('5b5e6c9ff0a94',59,2,2.00,33000),('5b5e6ca002082',59,2,2.00,33000),('5b5e6ca008aec',59,2,4.00,33000),('5b5e6ca00e1c9',59,2,4.00,33000),('5b5e6ca014d17',59,2,4.00,33000),('5b5e6ca01a5c1',59,2,4.00,33000),('5b60fa418a46e',104,3,5.00,31000),('5b60fa4196da9',104,1,5.00,32000),('5b60fa41a1701',104,1,5.00,32000),('5b60fa41ae727',104,1,5.00,32000),('5b60fa41b42b9',104,1,5.00,32000),('5b60fa41bdb08',104,2,5.00,33000),('5b60fd7b264ce',55,1,5.00,32000),('5b60fd7b3190d',55,1,5.00,32000),('5b60fd7b36eae',55,1,5.00,32000),('5b60fd7b3c682',55,1,5.00,32000),('5b60fd7b432bc',55,1,5.00,32000),('5b60fd7b49ed6',55,1,5.00,32000),('5b60fd7b50a93',55,2,5.00,33000),('5b60fd7b57827',55,2,5.00,33000),('5b63a8a415d4b',106,3,5.00,31000),('5b63a8a420dfb',106,3,5.00,31000),('5b66397898093',108,1,5.00,32000),('5b663978a6e09',108,2,5.00,33000),('5b6640f96b15a',109,1,5.00,32000),('5b6640f97c78c',109,2,5.00,33000),('5b678d56e7355',110,1,22.00,32000),('5b678d5702b56',110,2,22.00,33000),('5b679881c507d',112,1,5.00,32000),('5b67a571254ee',113,1,5.00,32000),('5b67a5712bfdc',113,1,5.00,32000),('5b67ae49c2c7a',114,3,5.00,31000),('5b67ae49c98a7',114,3,5.00,31000),('5b67aeece261f',116,2,5.00,33000),('5b67aeeced78d',116,1,5.00,32000),('5b68df519ac8d',117,1,8.00,32000),('5b68df51a4287',117,1,88.00,32000),('5b68df51aee81',117,1,5.00,32000),('5b6b7b5c6310e',119,39,50.00,500),('5b6b7b5c6eb32',119,1,500.00,32000),('5b6b7b5c79d67',119,2,5.00,33000),('5b6b7b5c8073a',119,2,5.00,33000),('5b6b7b5c85dab',119,28,556.00,5000),('5b6cdd51409ab',123,3,454.00,31000),('5b6cdd51461ff',123,3,4.00,31000),('5b6cdd514b753',123,29,4.00,5000),('5b6cdd51538a4',123,29,4.00,5000),('5b6cdd51590d4',123,1,4.00,32000),('5b6ce1b6339ab',124,29,4.00,5000),('5b6ce1b63e628',124,29,4.00,5000),('5b6ce1b643ae7',124,3,454.00,31000),('5b6ce1b649311',124,3,4.00,31000),('5b6ce1b64e7e5',124,1,4.00,32000),('5b6ce1b655aa2',124,2,5.00,33000),('5b6ce1b65c029',124,2,5.00,33000),('5b6e290b21112',125,28,5.00,5000),('5b6e290b291d1',125,1,5.00,32000),('5b6e290b312ee',125,1,56.00,32000),('5b6e290b36b4c',125,2,5.00,33000),('5b6e290b3bfe5',125,30,5.00,5000),('5b6ec7ce4f04d',127,3,5.00,31000),('5b6ec7ce5de36',127,29,76.00,5000),('5b6f0e4526798',128,2,5.00,33000),('5b6f0e453baa5',128,2,8.00,33000),('5b709f2d5d254',132,28,5.00,5000),('5b709f2d6a9fb',132,28,5.00,5000),('5b709f2d6feb8',132,39,5.00,500),('5b709f2d7575e',132,39,5.00,500),('5b709f2d7abb1',132,40,5.00,685685),('5b709f2d8041b',132,40,5.00,685685),('5b709f2d858fb',132,40,5.00,685685),('5b74c0d981d54',133,28,5.00,5000),('5b74c0d9926db',133,28,5.00,5000),('5b74c0d9a22f2',133,28,5.00,5000),('5b74c0d9af0d2',133,28,5.00,5000),('5b74c0d9ba8e4',133,28,5.00,5000),('5b74c0d9cbfbc',133,49,85.00,55),('5b74c0d9d97c9',133,49,5.00,55),('5b74c0d9e9e7f',133,40,5.00,685685),('5b7616337dbff',134,2,5.00,33000),('5b76163386a7f',134,40,45.00,685685),('5b7e0c0186b17',191,39,5555.00,500),('5b7e0c3e0f19b',192,40,555.00,685685),('5b7f3e3a19577',193,40,8.00,685685),('5b7f3ff4270c9',196,40,9.00,685685),('5b7f40250b2f9',197,47,0.90,55),('5b7f442c1c635',204,40,0.90,685685),('5b7f4436e62a0',205,40,0.90,685685),('5b7f444a758e0',206,40,-2.00,685685),('5b7f452278a22',208,40,5.00,685685),('5b7f45f63ee34',212,40,1.00,685685),('5b7f45fee1f70',213,40,1.00,685685),('5b7f4607c4369',214,40,1.00,685685),('5b7f46210aa59',215,40,1.00,685685),('5b7f46c22f1f5',216,40,8.00,685685),('5b7f46db56c79',217,40,8.00,685685),('5b7f473c58a71',219,40,5.00,685685),('5b7f4746cc5d4',220,40,5.00,685685),('5b7f476577aee',221,40,8.00,685685),('5b7f49aa290b4',223,40,1.00,685685),('5b7f49aa346a2',223,40,1.00,685685),('5b7f4a1d716a5',224,47,1.00,55),('5b7f4a1d79686',224,47,5.00,55),('5b7f4a48ac09b',225,47,1.00,55),('5b7f4a48b4389',225,47,-5.00,55),('5b7f4a4e3d462',226,47,1.00,55),('5b7f4a4e47f59',226,47,-5.00,55),('5b7f4a4e5036a',226,47,1.00,55),('5b8160a5704fc',227,40,4.00,685685),('5b8160a57b010',227,40,4.00,685685),('5b8160b42f66f',228,40,4.00,685685),('5b8160b437a11',228,40,4.00,685685),('5b8160bd274d5',229,40,4.00,685685),('5b8160bd2f849',229,40,4.00,685685),('5b816a79069c9',230,40,4.00,685685),('5b816a790eb67',230,40,4.00,685685),('5b83122951292',232,40,7.00,685685),('5b83122961b12',232,40,7.00,685685),('5b8312906e9a9',37,2,5.00,3),('5b8312907c1c6',37,2,5.00,3),('5b8313dc55605',233,47,7.00,55),('5b8313dc65369',233,47,4.00,55),('5b8313dc6dadb',233,47,4.00,55),('5b8313dc75ca0',233,1,5.00,32000),('5b8313dc834d4',233,2,5.00,33000),('5b8ad41aa48f8',234,1,4.00,32000),('5b8ad41aab484',234,2,8.00,33000),('5b8c6b65d935e',235,40,4.00,685685),('5b8c6b65dfc12',235,40,4.00,685685),('5b9d2788aeee7',236,40,4.00,685685),('5bb0020793abf',237,30,4.00,5000),('5bb00207a0b1c',237,1,4.00,32000),('5bb0021708d6a',238,30,4.00,5000),('5bb0021716394',238,1,4.00,32000),('5bb00417d7f91',239,30,4.00,5000),('5bb00417e8519',239,1,4.00,32000),('5bb0044934117',240,30,4.00,5000),('5bb004494a216',240,1,4.00,32000),('5bb00ad26b249',241,3,4.00,460651065016),('5bb00ad272c18',241,50,4.00,33000),('5bb00afe89b14',242,3,4.00,460651065016),('5bb00afe91b0e',242,50,4.00,33000),('5bb6d2fe60017',243,40,4.00,685685),('5bb6d5dc47b98',2,74,4.00,5),('5bb8bf227bcc0',244,48,4.00,55),('5bb8c09eca89a',245,48,4.00,55),('5bb8c0f57c395',246,48,4.00,55),('5bb8c39a08208',58,28,0.69,5000),('5bb8c39a1017f',58,74,4.00,5),('5bdf75605b5c0',247,28,4.00,32000),('5bdf75606dd52',247,1,5.00,32000),('5be8ab5ca9464',248,47,4.00,55),('5be8ab5caff1e',248,40,4.00,685685),('5be8c59e06408',96,1,7.00,32000),('5be8c59e0f89d',96,2,5.00,33000);

/*Table structure for table `pedidopreventa` */

DROP TABLE IF EXISTS `pedidopreventa`;

CREATE TABLE `pedidopreventa` (
  `idPedidoPreventa` int(11) NOT NULL,
  `Ci_cliente` int(11) NOT NULL,
  `Tipodecomprobante` varchar(45) NOT NULL,
  `Fecha` date NOT NULL,
  `Telefono` int(11) NOT NULL,
  `DireccionDeEnrega` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `Vendedor` varchar(45) NOT NULL,
  `dPuntodeventa` int(11) NOT NULL,
  `idcentrodecosto` int(11) NOT NULL,
  PRIMARY KEY (`idPedidoPreventa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedidopreventa` */

/*Table structure for table `pedidopreventadetalle` */

DROP TABLE IF EXISTS `pedidopreventadetalle`;

CREATE TABLE `pedidopreventadetalle` (
  `idPedidoPreventa` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioVenta` double NOT NULL,
  PRIMARY KEY (`idPedidoPreventa`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedidopreventadetalle` */

/*Table structure for table `plantillas` */

DROP TABLE IF EXISTS `plantillas`;

CREATE TABLE `plantillas` (
  `idplantilla` int(11) NOT NULL,
  `nombreplantilla` varchar(45) NOT NULL,
  PRIMARY KEY (`idplantilla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `plantillas` */

insert  into `plantillas`(`idplantilla`,`nombreplantilla`) values (1,'plantilla unuuuu');

/*Table structure for table `plantillasproductos` */

DROP TABLE IF EXISTS `plantillasproductos`;

CREATE TABLE `plantillasproductos` (
  `idplantilla` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `idCentroDeProduccion` int(11) NOT NULL,
  `idCentroDeCosto` int(11) NOT NULL,
  `idmarca` int(11) NOT NULL,
  PRIMARY KEY (`idplantilla`,`codigoproducto`),
  KEY `FK_plantilla` (`idCentroDeCosto`),
  KEY `FK_plantilla1` (`idCentroDeProduccion`),
  KEY `FK_plantilla2` (`idmarca`),
  KEY `FK_plantillasproductos1` (`codigoproducto`),
  CONSTRAINT `FK_plantillasproductos1` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_plantilla` FOREIGN KEY (`idCentroDeCosto`) REFERENCES `centrodecostos` (`idCentroDeCosto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_plantilla1` FOREIGN KEY (`idCentroDeProduccion`) REFERENCES `centrodeproduccion` (`idCentroDeProduccion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_plantilla2` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_plantillasproductos` FOREIGN KEY (`idplantilla`) REFERENCES `plantillas` (`idplantilla`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `plantillasproductos` */

insert  into `plantillasproductos`(`idplantilla`,`codigoproducto`,`idCentroDeProduccion`,`idCentroDeCosto`,`idmarca`) values (1,1,1,1,1),(1,2,1,1,1),(1,39,1,1,1);

/*Table structure for table `presupuestocabecera` */

DROP TABLE IF EXISTS `presupuestocabecera`;

CREATE TABLE `presupuestocabecera` (
  `idPresupuesto` int(11) NOT NULL,
  `RucProveedor` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Notas` varchar(45) DEFAULT NULL,
  `Vencimiento` date DEFAULT NULL,
  `idCentroDeCosto` int(11) DEFAULT NULL,
  `idPedidoCompra` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPresupuesto`),
  KEY `FK_presupuestocabecera` (`RucProveedor`),
  KEY `FK_presupuestocabecera1` (`idPedidoCompra`),
  KEY `FK_presupuestocabecera2` (`idCentroDeCosto`),
  CONSTRAINT `FK_presupuestocabecera` FOREIGN KEY (`RucProveedor`) REFERENCES `proveedor` (`RucProveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_presupuestocabecera2` FOREIGN KEY (`idCentroDeCosto`) REFERENCES `centrodecostos` (`idCentroDeCosto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `presupuestocabecera` */

insert  into `presupuestocabecera`(`idPresupuesto`,`RucProveedor`,`Fecha`,`Notas`,`Vencimiento`,`idCentroDeCosto`,`idPedidoCompra`) values (1,'8002141-6','2017-12-16','nuevo presupuesto','2017-12-16',1,1),(2,'8002141-6','2018-02-24','333','2018-02-24',NULL,5),(3,'8002141-6','2018-02-16','NOTS','2018-02-23',NULL,4),(4,'8002141-6','2018-02-16','NOTS','2018-02-23',NULL,4),(5,'8002141-6','2018-02-16','NOTS','2018-02-23',NULL,4),(6,'8002141-6','2018-02-16','NOTS','2018-02-23',NULL,4),(7,'8002141-6','2018-02-16','NOTS','2018-02-23',NULL,4),(8,'8002141-6','2018-02-16','NOTS','2018-02-23',NULL,4),(9,'8002141-6','2018-02-16','NOTS','2018-02-23',NULL,4),(10,'8002141-6','2018-02-16','NOTS','2018-02-23',1,4),(11,'8002141-6','2018-02-16','NOTS','2018-02-23',1,4),(12,'8002141-6','2017-12-23','GGG','2018-02-17',1,4),(13,NULL,'2018-09-15','NOTAS','2018-10-21',NULL,NULL),(14,NULL,'2018-09-15','NOTAS','2018-10-21',NULL,NULL),(15,NULL,'2018-09-15','NOTAS','2018-10-21',NULL,NULL),(16,NULL,'2018-09-15','NOTAS','2018-10-21',NULL,NULL),(17,NULL,'2018-09-15','NOTAS','2018-10-21',NULL,NULL),(18,'8002141-6','2018-09-15','NOTAS','2018-10-21',NULL,NULL),(19,'8002141-6','2018-09-15','NOTAS','2018-10-21',NULL,NULL),(20,'8002141-6','2018-09-15','NOTAS','2018-10-21',NULL,NULL),(21,'8002141-6','2018-09-15','NOTAS','2018-10-27',1,NULL),(22,'8002141-6','2018-09-15','NOTAS','2018-10-27',1,NULL),(23,'8002141-6','2018-09-15','NOTAS','2018-10-27',1,NULL),(24,'8002141-6','2018-09-15','NOTAS','2018-10-27',1,NULL),(25,'8002141-6','2018-09-15','NOTAS','2018-10-27',1,NULL),(26,'8002141-6','2018-09-21','buenas','2018-09-22',1,NULL),(27,'8002141-6','2018-09-15','numero','2018-10-15',1,NULL),(28,'8002141-6','2018-09-15','numero','2018-10-15',1,NULL),(29,'8002141-6','2018-09-15','numero','2018-10-15',1,NULL),(30,'8002141-6','2018-09-15','numero','2018-10-15',1,3),(31,'8002141-6','2018-09-15','numero','2018-10-15',1,2),(32,'8002141-6','2018-09-15','numero','2018-10-15',1,2),(33,'8002141-6','2018-09-15','numero','2018-10-15',1,2),(34,'8002141-6','2018-10-14','FAFADF','2018-10-18',1,4),(35,'80022302-6','2018-09-07','nuevo provee','2018-09-13',1,5),(36,'80022302-6','2018-09-07','nuevo provee','2018-09-13',1,5),(37,'8002141-6','2018-07-28','pedido niuevo','2018-09-22',1,10),(38,'8002141-6','2018-07-28','pedido niuevo','2018-09-22',1,10),(39,'80022302-6','2018-07-27','fffff','2018-09-15',1,11),(40,'8002141-6','2018-09-20','PRESUPUESTO NUEVA JORNADA','2018-10-28',1,2),(41,'8002141-6','2018-09-21','presumpuesto numero do','2018-09-21',1,4),(42,'8002141-6','2018-10-01','proveedor','2018-10-01',1,9),(43,'8002141-6','2018-10-01','proveedor','2018-10-01',1,9),(44,'8002141-6','2018-10-01','proveedor','2018-10-01',2,9),(45,'8002141-6','2018-10-01','proveedor','2018-10-01',2,9),(46,'8002141-6','2018-10-01','proveedor','2018-10-01',2,9),(47,'80000-1','2018-11-08','gfsgfsg','2018-11-23',1,10);

/*Table structure for table `presupuestodetalle` */

DROP TABLE IF EXISTS `presupuestodetalle`;

CREATE TABLE `presupuestodetalle` (
  `id` varchar(250) NOT NULL,
  `idPresupuesto` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`id`,`idPresupuesto`,`codigoproducto`),
  KEY `fk_PresupuestoCabecera_has_Productos_Productos1_idx` (`codigoproducto`),
  KEY `fk_PresupuestoCabecera_has_Productos_PresupuestoCabecera1_idx` (`idPresupuesto`),
  CONSTRAINT `fk_PresupuestoCabecera_has_Productos_PresupuestoCabecera1` FOREIGN KEY (`idPresupuesto`) REFERENCES `presupuestocabecera` (`idPresupuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PresupuestoCabecera_has_Productos_Productos1` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `presupuestodetalle` */

insert  into `presupuestodetalle`(`id`,`idPresupuesto`,`codigoproducto`,`cantidad`,`precio`) values ('5b816bb158bf3',16,40,4,685685),('5b816bb160980',16,40,4,685685),('5b816bc3e51a9',17,40,4,685685),('5b816bc3ed3dd',17,40,4,685685),('5b816bc401170',17,40,4,685685),('5b816bc409519',17,28,4,0),('5b8170b091431',23,40,4,685685),('5b8170b09c090',23,40,4,685685),('5b81721426e25',24,40,5,685685),('5b8172142ef14',24,40,5,685685),('5b81737e79941',25,40,5,685685),('5b81737e81d09',25,40,5,685685),('5b81b5c44f926',26,40,4,685685),('5b81b5c457a93',26,40,4,685685),('5b81b5c4624a1',26,40,4,685685),('5b81b5c46a9c0',26,30,4,5000),('5b81b808df836',27,40,5,685685),('5b81b808e79ba',27,40,5,685685),('5b81b90a1583b',28,40,1,685685),('5b81b90a1d9fb',28,40,4,685685),('5b81b92a3a2c2',29,40,1,685685),('5b81b92a4476a',29,40,4,685685),('5b81b9e373bf0',30,40,4,685685),('5b81b9e386ba8',30,40,4,685685),('5b81b9f35d697',31,40,4,685685),('5b81b9f365673',31,40,4,685685),('5b81ba7015a74',32,40,4,685685),('5b81ba701dbf0',32,40,4,685685),('5b81ba764bb57',33,40,4,685685),('5b81ba7653cec',33,40,4,685685),('5b81ba766962b',33,40,4,685685),('5b81c70ff1325',34,40,4,685685),('5b81c7100527e',34,40,4,685685),('5b81e242008e8',35,40,5,685685),('5b81e24208a96',35,40,5,685685),('5b81e24711c8a',36,40,5,685685),('5b81e24719cb5',36,40,5,685685),('5b83127cec4c3',37,40,5,685685),('5b83127d009e5',37,40,5,685685),('5b83127d08bdd',37,29,5,5000),('5b83136b38e31',38,40,5,685685),('5b83136b413c0',38,40,5,685685),('5b83136b495f7',38,29,5,5000),('5b8327c6934bf',39,40,4,685685),('5b8327c698abf',39,40,4,685685),('5b8a9c427905f',40,40,4,685685),('5b8a9c427f8dc',40,40,4,685685),('5b8a9c4284f57',40,40,4,685685),('5b8ad46fe62bc',41,2,8,33000),('5b8ad46fecd30',41,2,8,33000),('5bb8c45a30fe3',42,29,4,5000),('5bb8c48c94cb3',43,29,4,5000),('5bb8c4f5c1491',44,29,4,5000),('5bb8c6bccc80c',45,29,4,5000),('5bb8c940d0fc9',46,29,4,5000),('5bb8c940d77af',46,2,4,33000),('5bf1e82b218c7',47,40,4,685685),('FDAFA',44,1,1,1),('GFSFA',44,1,1,1);

/*Table structure for table `presupuestoproduccioncabecera` */

DROP TABLE IF EXISTS `presupuestoproduccioncabecera`;

CREATE TABLE `presupuestoproduccioncabecera` (
  `idPresupuestoProduccion` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `FechaDeIngreso` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`idPresupuestoProduccion`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `presupuestoproduccioncabecera` */

insert  into `presupuestoproduccioncabecera`(`idPresupuestoProduccion`,`codigoproducto`,`FechaDeIngreso`,`cantidad`,`precio`) values (1,1,'2018-09-05',1,1);

/*Table structure for table `presupuestoproducciondetalle` */

DROP TABLE IF EXISTS `presupuestoproducciondetalle`;

CREATE TABLE `presupuestoproducciondetalle` (
  `codigoproducto` int(11) NOT NULL,
  `idPresupuestoProduccion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `idFormulas` int(11) NOT NULL,
  PRIMARY KEY (`codigoproducto`,`idPresupuestoProduccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `presupuestoproducciondetalle` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `codigoproducto` int(11) NOT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `idimpuesto` int(11) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `idunidaddemedida` int(11) DEFAULT NULL,
  `codigosubrubro` int(11) DEFAULT NULL,
  `codigorubro` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT '1',
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`codigoproducto`),
  KEY `FK_productos` (`idunidaddemedida`),
  KEY `FK_productoscat` (`idcategoria`),
  KEY `FK_productos1` (`idimpuesto`),
  KEY `FK_productos2` (`codigorubro`),
  KEY `FK_productos3` (`codigosubrubro`),
  KEY `FK_productos4` (`idmarca`),
  CONSTRAINT `FK_productos` FOREIGN KEY (`idunidaddemedida`) REFERENCES `unidaddemedida` (`idunidaddemedida`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_productos1` FOREIGN KEY (`idimpuesto`) REFERENCES `impuestos` (`idimpuesto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_productos2` FOREIGN KEY (`codigorubro`) REFERENCES `rubros` (`codigorubro`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_productos3` FOREIGN KEY (`codigosubrubro`) REFERENCES `subrubros` (`codigosubrubro`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_productos4` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_productoscat` FOREIGN KEY (`idcategoria`) REFERENCES `categoriadeproductos` (`idcategoria`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

insert  into `productos`(`codigoproducto`,`producto`,`idimpuesto`,`idmarca`,`idunidaddemedida`,`codigosubrubro`,`codigorubro`,`idcategoria`,`idusuario`,`precio`) values (1,'QUESO DANBO X KG',1,1,1,1,1,2,1,32000),(2,'QUESO MOZZARELLA X KGffffffffffffffffffffffff',1,1,1,1,1,2,1,33000),(3,'quesossss',2,4,2,8554,5,5,1,55000),(28,'jamonada x kg',2,3,1,44,2,1,1,32000),(29,'queso roquefort',2,3,1,44,2,1,1,5000),(30,'queso roquefort x kilo',2,4,1,44,2,1,1,5000),(39,'queso parmesano x kilo',2,3,1,44,2,2,1,500),(40,'nuevo pro',2,3,1,44,2,2,1,685685),(41,'nuevo pro',2,3,1,44,2,2,1,685685),(42,'nuevo pro',2,3,1,44,2,2,1,685685),(43,'nuevo pro',2,3,1,44,2,2,1,685685),(44,'nuevo pro',2,3,1,44,2,2,1,685685),(46,'nuevo pro',2,3,1,44,2,2,1,685685),(47,'hamburguesa cruda x unidad',2,4,1,44,2,2,1,55),(48,'azafrn x kilo',2,4,1,44,2,2,1,55),(49,'333',2,4,1,44,2,2,1,55),(50,'otro mas otro mas',2,4,1,44,2,2,1,33000),(51,'333',2,4,1,44,2,2,1,55),(52,'nuevo producto',2,4,1,44,2,2,1,15641),(53,'hythdgdfh',2,4,1,44,2,2,1,15641),(54,'fff',2,4,1,44,2,2,1,633),(64,'MARIOA',1,4,2,8555,2,5,1,500),(70,'curry',1,1,1,8547,3,2,1,522),(71,'5',1,4,1,2,2,2,1,5000),(74,'44444-04-04',1,3,1,2,2,2,1,5),(75,'aldo',1,4,1,2,2,2,1,55),(76,'aaaaaaaaaaaaaaa',1,4,1,2,2,2,1,55),(86,'88',1,4,1,2,2,2,1,555),(87,'88',1,4,1,2,2,2,1,555),(88,'88',1,4,1,2,2,2,1,555),(89,'88',1,4,1,2,2,2,1,555),(90,'88',1,4,1,2,2,2,1,555),(91,'88',1,4,1,2,2,2,1,555),(92,'88',1,4,1,2,2,2,1,555),(93,'88',1,4,1,2,2,2,1,555),(94,'aldo',1,4,1,2,2,2,1,555),(95,'aldo',1,4,1,2,2,2,1,555),(96,'aldo',1,4,1,2,2,2,1,555),(97,'gfdgs',1,4,1,2,2,2,1,555),(98,'gfdgs',1,4,1,2,2,2,1,555),(99,'555555',1,7,1,2,2,2,1,555),(100,'nombre',1,4,1,2,2,2,1,500),(101,'asfdasfaf',1,4,1,2,2,2,1,5020),(102,'aldo',1,4,1,2,2,2,1,555),(103,'aldo',1,4,1,2,2,2,1,555),(104,'aldo',1,4,1,2,2,2,1,555),(105,'nombre',1,4,1,2,2,2,1,555),(106,'ehfdhd',1,1,1,2,2,2,1,8),(107,'ehfdhd',1,6,1,2,2,2,1,82545555),(108,'ssss',1,6,1,2,2,2,1,55),(109,'cuaro',1,6,1,2,2,2,1,1),(110,'danbo',1,6,1,2,2,2,1,5),(111,'nombre',1,3,1,2,2,2,1,4),(112,'marca',1,1,1,44,1,2,1,5000),(115,'d',1,4,1,8553,5,4,1,4500),(116,'nuevo',1,5,1,1,9,1,1,5000),(117,'',1,1,2,8551,6,5,1,500);

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `RucProveedor` varchar(45) NOT NULL,
  `nombreprov` varchar(45) DEFAULT NULL,
  `nrtelefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `codigociudad` int(11) DEFAULT NULL,
  `codigopais` int(11) DEFAULT NULL,
  `timbrado` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`RucProveedor`),
  KEY `FK_proveedor` (`codigociudad`),
  KEY `FK_proveedor1` (`codigopais`),
  CONSTRAINT `FK_proveedor` FOREIGN KEY (`codigociudad`) REFERENCES `ciudad` (`codigociudad`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_proveedor1` FOREIGN KEY (`codigopais`) REFERENCES `pais` (`codigopais`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `proveedor` */

insert  into `proveedor`(`RucProveedor`,`nombreprov`,`nrtelefono`,`direccion`,`codigociudad`,`codigopais`,`timbrado`,`id`) values ('80000-1','44445666','2546','5555',1,1,100,12),('8002141-6','EXPRESSALIMENTOs','021 555 555','PAI PEREZ C mariscar',2,1,122458,1),('80022202-1','aldo arebal','021','500',1,3,10,10),('80022202-2','aldo arebal','021','500',1,3,10,11),('80022302-6','aldo arealoa','055444021','mmmmmm',4,1,11223,2),('80022544','aldo','021598787','mar',1,1,25444,13),('82122-2','faafa','02154','muÃ±e insho',1,1,1,4),('82122-3','faafa','02154','muÃ±e insho',1,1,111144,6),('82122-6','faafa','02154','muÃ±e insho',1,1,1,5),('82122-9','faafa','02154','fdafafa',1,1,1,3);

/*Table structure for table `puntodeventa` */

DROP TABLE IF EXISTS `puntodeventa`;

CREATE TABLE `puntodeventa` (
  `idPuntodeventa` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `CodigoFacturacion` int(11) NOT NULL,
  `Caja` varchar(45) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idPuntodeventa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `puntodeventa` */

/*Table structure for table `recaudaciones a depositar` */

DROP TABLE IF EXISTS `recaudaciones a depositar`;

CREATE TABLE `recaudaciones a depositar` (
  `Id_Rec` int(11) NOT NULL,
  `id_AperturayCierreDeCaja` int(11) NOT NULL,
  `monto_ef` int(11) NOT NULL,
  `monto_cheq` int(11) NOT NULL,
  `monto_targ` int(11) NOT NULL,
  PRIMARY KEY (`Id_Rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `recaudaciones a depositar` */

/*Table structure for table `receta` */

DROP TABLE IF EXISTS `receta`;

CREATE TABLE `receta` (
  `idReceta` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idReceta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `receta` */

insert  into `receta`(`idReceta`,`Nombre`) values (1,'QUESO DANBO X KG');

/*Table structure for table `registrarperdidadeproduccion` */

DROP TABLE IF EXISTS `registrarperdidadeproduccion`;

CREATE TABLE `registrarperdidadeproduccion` (
  `idPerdidaDeProduccion` int(11) NOT NULL,
  `codigoalmacen` int(11) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Notas` varchar(45) NOT NULL,
  `MotivosVarops` varchar(45) NOT NULL,
  PRIMARY KEY (`idPerdidaDeProduccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `registrarperdidadeproduccion` */

/*Table structure for table `registrarperdidadeproducciondetalle` */

DROP TABLE IF EXISTS `registrarperdidadeproducciondetalle`;

CREATE TABLE `registrarperdidadeproducciondetalle` (
  `idPerdidaDeProduccion` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `codigoalmacen` int(11) NOT NULL,
  PRIMARY KEY (`idPerdidaDeProduccion`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `registrarperdidadeproducciondetalle` */

/*Table structure for table `rubros` */

DROP TABLE IF EXISTS `rubros`;

CREATE TABLE `rubros` (
  `codigorubro` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigorubro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rubros` */

insert  into `rubros`(`codigorubro`,`nombre`) values (1,'rugbis'),(2,'dfdf'),(3,'nurbo rubo'),(4,'rubro'),(5,'rubrossss'),(6,''),(8,''),(9,'gfgg333'),(10,'nombre nuevo'),(11,'paraguayrrrr');

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `codigoalmacen` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `cantidad_actual` int(11) NOT NULL,
  `cantidad_minima` int(11) NOT NULL,
  PRIMARY KEY (`codigoproducto`,`codigoalmacen`),
  KEY `fk_Almacen_has_Productos_Productos1_idx` (`codigoproducto`),
  KEY `fk_Almacen_has_Productos_Almacen1_idx` (`codigoalmacen`),
  CONSTRAINT `fk_Almacen_has_Productos_Almacen1` FOREIGN KEY (`codigoalmacen`) REFERENCES `almacen` (`codigoalmacen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Almacen_has_Productos_Productos1` FOREIGN KEY (`codigoproducto`) REFERENCES `productos` (`codigoproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stock` */

insert  into `stock`(`codigoalmacen`,`codigoproducto`,`cantidad_actual`,`cantidad_minima`) values (1,1,10,9),(1,2,5,5),(2,2,5,5);

/*Table structure for table `subrubros` */

DROP TABLE IF EXISTS `subrubros`;

CREATE TABLE `subrubros` (
  `codigosubrubro` int(11) NOT NULL,
  `subrubro` varchar(45) DEFAULT NULL,
  `codigorubro` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigosubrubro`),
  KEY `FK_subrubros` (`codigorubro`),
  CONSTRAINT `FK_subrubros` FOREIGN KEY (`codigorubro`) REFERENCES `rubros` (`codigorubro`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subrubros` */

insert  into `subrubros`(`codigosubrubro`,`subrubro`,`codigorubro`) values (1,'el uo',1),(2,'el dos',2),(4,'sub',3),(44,'hola',2),(8546,'5',3),(8547,'nuebo sub rubro---',3),(8548,'nuebo sub rubro',11),(8549,'ueo prod',3),(8550,'seleccion',1),(8551,'',5),(8553,'',5),(8554,'marccc',9),(8555,'marccc',9),(8556,'marccc',9),(8557,'elias',1),(8558,'',6),(8559,'sss',2);

/*Table structure for table `sucursal` */

DROP TABLE IF EXISTS `sucursal`;

CREATE TABLE `sucursal` (
  `Idsucursal` int(11) NOT NULL,
  `prefijo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `empresa` varchar(45) NOT NULL DEFAULT 'ALIMENTOS Y SERVICIOS SRL',
  PRIMARY KEY (`Idsucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sucursal` */

insert  into `sucursal`(`Idsucursal`,`prefijo`,`nombre`,`direccion`,`telefono`,`empresa`) values (1,80022202,'Casa Central Produccion','','0','ALIMENTOS Y SERVICIOS SRL'),(2,5844,'MARIANO GON','','0','ALIMENTOS Y SERVICIOS SRL'),(4,1,'001','estrella','211888999','ALIMENTOS Y SERVICIOS SRL'),(5,444,'444','gg','5555','ALIMENTOS Y SERVICIOS SRL'),(6,444,'444','gg','5555','ALIMENTOS Y SERVICIOS SRL'),(7,444,'444','gg','5555','ALIMENTOS Y SERVICIOS SRL'),(8,22,'brasilia','nueva direccion','219554','ALIMENTOS Y SERVICIOS SRL'),(9,77777,'77777','','0','ALIMENTOS Y SERVICIOS SRL'),(11,77777,'77777','','0','ALIMENTOS Y SERVICIOS SRL'),(12,77777,'77777','','0','ALIMENTOS Y SERVICIOS SRL'),(13,100,'100','5555','555555','ALIMENTOS Y SERVICIOS SRL'),(14,100,'100','777777','555555','ALIMENTOS Y SERVICIOS SRL'),(15,1,'001','500','5555','ALIMENTOS Y SERVICIOS SRL'),(16,1,'001','001','221','ALIMENTOS Y SERVICIOS SRL'),(17,11,'011','800','215878','ALIMENTOS Y SERVICIOS SRL');

/*Table structure for table `tbl_employee` */

DROP TABLE IF EXISTS `tbl_employee`;

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employee` */

insert  into `tbl_employee`(`id`,`name`,`address`,`gender`,`designation`,`age`) values (22,'aldo','arevalo','25','25',31);

/*Table structure for table `tbl_order_items` */

DROP TABLE IF EXISTS `tbl_order_items`;

CREATE TABLE `tbl_order_items` (
  `order_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(150) DEFAULT NULL,
  `item_name` varchar(250) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_unit` varchar(30) DEFAULT NULL,
  `hola` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`order_items_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order_items` */

insert  into `tbl_order_items`(`order_items_id`,`order_id`,`item_name`,`item_quantity`,`item_unit`,`hola`) values (1,'1','ALD',5,'55','55');

/*Table structure for table `unidaddemedida` */

DROP TABLE IF EXISTS `unidaddemedida`;

CREATE TABLE `unidaddemedida` (
  `idunidaddemedida` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `cantidad` int(45) DEFAULT NULL,
  `umstandart` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idunidaddemedida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `unidaddemedida` */

insert  into `unidaddemedida`(`idunidaddemedida`,`codigo`,`nombres`,`cantidad`,`umstandart`) values (1,'X1','X1',52,'Unidades'),(2,'PACK 12','PACK 12',23,'Kilogramos'),(3,'X1','X1',3,'Unidades');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`name`,`position`) values (4,'admin','admin','Admin','admin');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `logging` varchar(45) NOT NULL,
  `paswor` varchar(11) NOT NULL,
  `tipousuario` varchar(45) NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `FK_usuario` (`Idsucursal`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`Idsucursal`) REFERENCES `sucursal` (`Idsucursal`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`idusuario`,`usuario`,`logging`,`paswor`,`tipousuario`,`Idsucursal`) values (1,'MARIO','aa','123','Administrador',16),(3,'ALDO AREVALO','mar','123456','Operadores de Deposito',16),(4,'ALDO AREVALO','aarevalo','123','Administrador',1),(5,'mariano','cc','1234','Administrador',16),(6,'marco','dd','123644','Administrador',16),(7,'mar','martt','121','Administrador',16),(8,'richard','aa','aaa','Administrador',16);

/*Table structure for table `ventacabecera` */

DROP TABLE IF EXISTS `ventacabecera`;

CREATE TABLE `ventacabecera` (
  `idVenta` int(11) NOT NULL,
  `Ci_cliente` int(11) NOT NULL,
  `idFormasDePago` int(11) NOT NULL,
  `idCentroDeCosto` int(11) NOT NULL,
  `codigoempleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `Idsucursal` int(11) NOT NULL,
  `idPuntodeventa` int(11) NOT NULL,
  `idMesaDeEntrada` int(11) NOT NULL,
  `idPedidoPreventa` int(11) NOT NULL,
  PRIMARY KEY (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ventacabecera` */

/*Table structure for table `ventadetalle` */

DROP TABLE IF EXISTS `ventadetalle`;

CREATE TABLE `ventadetalle` (
  `idVenta` int(11) NOT NULL,
  `codigoproducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioVenta` double NOT NULL,
  `IVA 5` int(11) DEFAULT NULL,
  `IVA 10` int(11) DEFAULT NULL,
  `codigoalmacen` int(11) NOT NULL,
  PRIMARY KEY (`idVenta`,`codigoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ventadetalle` */

/* Procedure structure for procedure `spF_Pedidos_All` */

/*!50003 DROP PROCEDURE IF EXISTS  `spF_Pedidos_All` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spF_Pedidos_All`(
)
BEGIN
SELECT
  `pedidocabeceradecompra`.`idPedidoCompra` AS `id`,
  `pedidocabeceradecompra`.`Fecha`          AS `Fecha`,
  `pedidocabeceradecompra`.`Vencimiento`    AS `Vencimiento`,
  `pedidocabeceradecompra`.`Notas`          AS `Notas`,
  `almacen`.`almacen`                       AS `almacen`,
  `sucursal`.`nombre`                      AS `sucursal`,
    `productos`.`codigoproducto`                      AS `codigoproducto`
FROM (((`pedidocabeceradecompra`
    JOIN `almacen`)
   JOIN `sucursal`)
 JOIN `productos`)
;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spf_producto_one` */

/*!50003 DROP PROCEDURE IF EXISTS  `spf_producto_one` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spf_producto_one`(
_codigoproducto int
)
BEGIN
SELECT
    p.codigoproducto,
    p.nombre,
    p.precio
   
 
    
FROM
    productos p
WHERE
     p.codigoproducto = _codigoproducto
ORDER BY
    p.codigoproducto
;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spf_produpresu_one` */

/*!50003 DROP PROCEDURE IF EXISTS  `spf_produpresu_one` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spf_produpresu_one`(
_codigoproducto INT
)
BEGIN
declare preciolista double;
declare um varchar(60);
select (precioporenvase / cantidadporenvase) into preciolista from listadodepreciodeproductos where codigoproducto=_codigoproducto;
SELECT (nombres) INTO um FROM unidaddemedida u WHERE u.idunidaddemedida=_codigoproducto;
SELECT
    p.codigoproducto,
    p.nombre,
    um,
    preciolista 
  
 
    
FROM
    productos p
WHERE
     p.codigoproducto=_codigoproducto 
ORDER BY
    p.codigoproducto
;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spF_SubRubros_all` */

/*!50003 DROP PROCEDURE IF EXISTS  `spF_SubRubros_all` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spF_SubRubros_all`(
 
)
BEGIN
SELECT
    sr.codigosubrubro AS codigosubrubro,
    sr.subrubro AS nombre
   
   
FROM
    subrubros sr
    ORDER BY
    sr.codigosubrubro
;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spF_SubRubro_one` */

/*!50003 DROP PROCEDURE IF EXISTS  `spF_SubRubro_one` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spF_SubRubro_one`(
_codigosubrubro  INT 
)
BEGIN
SELECT
    sr.codigosubrubro as codigosubrubro,
    sr.subrubro as nombre
    
FROM
    subrubros sr
WHERE
    sr.codigosubrubro >0 or sr.codigosubrubro = _codigosubrubro
ORDER BY
    sr.codigosubrubro
;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spI_OrdenCabecera` */

/*!50003 DROP PROCEDURE IF EXISTS  `spI_OrdenCabecera` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_OrdenCabecera`(
   INOUT _idordencompra  INT ,
   _idPresupuesto  INT ,
   _fecha  VARCHAR(45),
   _vencimiento  VARCHAR(45),
   _notas  VARCHAR(45),
   _proveedor  VARCHAR(45),
   _rucproveedor VARCHAR(45),
   _TerminosDePago VARCHAR(45),
   _SitioEntrega varchar(60),
   _FechaEntrega varchar(60),
   _centrodecosto varchar(60)
   
)
BEGIN
declare _idCentroDeCostos int;
SELECT IFNULL(MAX(idordencompra ),0)+1 INTO _idordencompra  FROM `ordencompracabecera`;
SELECT (RucProveedor) INTO _rucproveedor FROM `proveedor` WHERE proveedor= _proveedor; 
SELECT (idCentroDeCostos ) INTO _idCentroDeCostos  FROM `centrodecostos` WHERe nombrecentro= _centrodecosto; 
INSERT INTO `ordencompracabecera`(
   `idordencompra `,
   `idPresupuesto `,
   `fecha`,
   `vencimiento`,
   `notas`,
   `RucProveedor`,
   `TerminosDePago`,
   `SitioEntrega `,
   `FechaEntrega`,
   `IdCentroDeCosto`
)
VALUES (
   _idordencompra ,
 _idPresupuesto,
   _fecha,
   _vencimiento,
   _notas,
   _rucproveedor ,
   _TerminosDePago,
   _SitioEntrega,
   _FechaEntrega,
   _IdCentroDeCosto 
 
);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spI_OrdenCompradetalle` */

/*!50003 DROP PROCEDURE IF EXISTS  `spI_OrdenCompradetalle` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_OrdenCompradetalle`(
   _idorden  INT ,
   _cantidad double,
  _precio double,
  _codigoproducto int
   
)
BEGIN
INSERT INTO `ordencompradetalle`(
   `idorden`,
   `cantidad`,
    `precio`,
   `codigoproducto`
)
VALUES (
_idorden,
_cantidad,
_precio,
_codigoproducto
);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spI_PedidoCabeceraDeCompra` */

/*!50003 DROP PROCEDURE IF EXISTS  `spI_PedidoCabeceraDeCompra` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_PedidoCabeceraDeCompra`(
   INOUT _idPedidoCompra  INT ,
   _Fecha timestamp,
   _Vencimiento timestamp,
   _Notas varchar(45),
   _almacen varchar(100),
   _nombre varchar(45),
   _codigoalmacen int,
   _Idsucursal int
 
)
BEGIN
SELECT IFNULL(MAX(idPedidoCompra),0)+1 INTO _idPedidoCompra FROM `pedidocabeceradecompra`;
SELECT (codigoalmacen) INTO _codigoalmacen FROM `almacen`where almacen=_almacen;
SELECT (Idsucursal) INTO _Idsucursal FROM `sucursal`where nombre=_nombre;
INSERT INTO `pedidocabeceradecompra`(
   `idPedidoCompra`,
    `Fecha`,
    `Vencimiento`,
    `Notas`,
    `codigoalmacen`,
    `Idsucursal`
    
  
   
)
VALUES (
 _idPedidoCompra,
 _Fecha ,
 _Vencimiento,
 _Notas,
 _codigoalmacen ,
 _Idsucursal
   
);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spI_PedidoDetalleDeCompra` */

/*!50003 DROP PROCEDURE IF EXISTS  `spI_PedidoDetalleDeCompra` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_PedidoDetalleDeCompra`(
   _idPedidoCompra  INT ,
   _codigoproducto int,
   _cantidad double
   
)
BEGIN
declare _precio double;
SELECT (precio) INTO _precio FROM `productos`WHERE codigoproducto=_codigoproducto;
INSERT INTO `pedidodetalledecompra`(
   `idPedidoCompra`,
   `codigoproducto`,
   `cantidad`,
     `precio`
  
)
VALUES (
   _idPedidoCompra  ,
   _codigoproducto,
   _cantidad,
   _precio 
);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spI_Presucab` */

/*!50003 DROP PROCEDURE IF EXISTS  `spI_Presucab` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_Presucab`(
   INOUT _idpresupuesto  INT ,
    _idPedidoCompra INT,
  
   _centrodecosto VARCHAR(150),
   _Fecha date,
   _Vencimiento date,
   _proveedor varchar(45),
   _Notas varchar(45)
  
 
)
BEGIN
declare _RucProveedor varchar(45);
declare _idCentroDeCosto int;
SELECT IFNULL(MAX(idPresupuesto),0)+1 INTO _idPresupuesto FROM `presupuestocabecera`;
SELECT (RucProveedor) INTO _RucProveedor FROM `proveedor`WHERE nombreprov=_proveedor;
SELECT (idCentroDeCosto) INTO _idCentroDeCosto FROM `centrodecostos`WHERE nombrecentro=_centrodecosto;
INSERT INTO `presupuestocabecera`(
    `idPresupuesto`,
   `idPedidoCompra`,
    `idCentroDeCosto`,
    `Fecha`,
    `Vencimiento`,
    `RucProveedor`,
    `Notas`
   
    
  
   
)
VALUES (
 _idPresupuesto,
 _idPedidoCompra,
 _idCentroDeCosto ,
 _Fecha ,
 _Vencimiento,
  _RucProveedor,
 _Notas
   
);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spI_Presudet` */

/*!50003 DROP PROCEDURE IF EXISTS  `spI_Presudet` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_Presudet`(
    _idpresupuesto  INT ,
    _codigoproducto INT,
     _cantidad double
  
 
)
BEGIN
DECLARE _precio double;
SELECT (precio) INTO _precio FROM `productos`WHERE codigoproducto=_codigoproducto;
INSERT INTO `presupuestodetalle`(
    `idPresupuesto`,
   `codigoproducto`,
    `cantidad`,
    `Precio`
   
   
    
  
   
)
VALUES (
 _idPresupuesto,
 _codigoproducto,
 _cantidad ,
 _precio 
   
);
END */$$
DELIMITER ;

/*Table structure for table `formulasv` */

DROP TABLE IF EXISTS `formulasv`;

/*!50001 DROP VIEW IF EXISTS `formulasv` */;
/*!50001 DROP TABLE IF EXISTS `formulasv` */;

/*!50001 CREATE TABLE  `formulasv`(
 `Nombre` varchar(45) ,
 `idReceta` int(11) ,
 `codigo` int(11) ,
 `codigoproducto` int(11) ,
 `composicion` double ,
 `Formula` double ,
 `cantidadresultante` double ,
 `producto` varchar(45) ,
 `categoria` varchar(45) ,
 `impuesto` int(11) ,
 `rubro` varchar(45) ,
 `subrubro` varchar(45) ,
 `marca` varchar(45) ,
 `unidadm` varchar(45) 
)*/;

/*Table structure for table `listados` */

DROP TABLE IF EXISTS `listados`;

/*!50001 DROP VIEW IF EXISTS `listados` */;
/*!50001 DROP TABLE IF EXISTS `listados` */;

/*!50001 CREATE TABLE  `listados`(
 `idListado` int(11) ,
 `codigoproducto` int(11) ,
 `producto` varchar(45) ,
 `precioporenvase` double ,
 `cantidadporenvase` double ,
 `unidaddemedida` varchar(45) ,
 `nombreprov` varchar(45) ,
 `RucProveedor` varchar(45) 
)*/;

/*Table structure for table `plantillasv` */

DROP TABLE IF EXISTS `plantillasv`;

/*!50001 DROP VIEW IF EXISTS `plantillasv` */;
/*!50001 DROP TABLE IF EXISTS `plantillasv` */;

/*!50001 CREATE TABLE  `plantillasv`(
 `idplantilla` int(11) ,
 `codigoproducto` int(11) ,
 `producto` varchar(45) ,
 `nombreplantilla` varchar(45) ,
 `centrodeproduccion` varchar(45) ,
 `nombrecentro` varchar(45) ,
 `marca` varchar(45) ,
 `nombres` varchar(45) 
)*/;

/*Table structure for table `productosv` */

DROP TABLE IF EXISTS `productosv`;

/*!50001 DROP VIEW IF EXISTS `productosv` */;
/*!50001 DROP TABLE IF EXISTS `productosv` */;

/*!50001 CREATE TABLE  `productosv`(
 `codigoproducto` int(11) ,
 `precio` double ,
 `producto` varchar(45) ,
 `categoria` varchar(45) ,
 `impuesto` int(11) ,
 `rubro` varchar(45) ,
 `subrubro` varchar(45) ,
 `marca` varchar(45) ,
 `unidadm` varchar(45) 
)*/;

/*Table structure for table `unproducto` */

DROP TABLE IF EXISTS `unproducto`;

/*!50001 DROP VIEW IF EXISTS `unproducto` */;
/*!50001 DROP TABLE IF EXISTS `unproducto` */;

/*!50001 CREATE TABLE  `unproducto`(
 `idPedidoCompra` int(11) ,
 `Fecha` date ,
 `Vencimiento` date ,
 `cliente` varchar(50) ,
 `Notas` varchar(50) ,
 `codigoproducto` int(11) ,
 `almacen` varchar(45) ,
 `producto` varchar(45) ,
 `precio` double ,
 `nombres` varchar(45) ,
 `cantidad` double(10,2) ,
 `total` double ,
 `totalp` double 
)*/;

/*Table structure for table `v_marca` */

DROP TABLE IF EXISTS `v_marca`;

/*!50001 DROP VIEW IF EXISTS `v_marca` */;
/*!50001 DROP TABLE IF EXISTS `v_marca` */;

/*!50001 CREATE TABLE  `v_marca`(
 `idmarca` int(11) ,
 `nombre` varchar(45) 
)*/;

/*Table structure for table `v_marcass` */

DROP TABLE IF EXISTS `v_marcass`;

/*!50001 DROP VIEW IF EXISTS `v_marcass` */;
/*!50001 DROP TABLE IF EXISTS `v_marcass` */;

/*!50001 CREATE TABLE  `v_marcass`(
 `name` int(11) ,
 `dos` varchar(45) 
)*/;

/*Table structure for table `vistaajuste` */

DROP TABLE IF EXISTS `vistaajuste`;

/*!50001 DROP VIEW IF EXISTS `vistaajuste` */;
/*!50001 DROP TABLE IF EXISTS `vistaajuste` */;

/*!50001 CREATE TABLE  `vistaajuste`(
 `idAjuste` int(11) ,
 `Fecha` date ,
 `almacen` varchar(45) ,
 `Notas` varchar(45) ,
 `producto` varchar(45) ,
 `precio` double ,
 `codigoproducto` int(11) ,
 `Esperada` double ,
 `Deportada` double ,
 `Faltante` double ,
 `Sobrante` double ,
 `nombrecategoria` varchar(45) ,
 `nombre` varchar(45) ,
 `totalsobrante` double ,
 `totalfaltante` double 
)*/;

/*Table structure for table `vistaetapa` */

DROP TABLE IF EXISTS `vistaetapa`;

/*!50001 DROP VIEW IF EXISTS `vistaetapa` */;
/*!50001 DROP TABLE IF EXISTS `vistaetapa` */;

/*!50001 CREATE TABLE  `vistaetapa`(
 `idEtapa` int(11) ,
 `Fecha` date ,
 `Notas` varchar(45) ,
 `tipoproduccion` varchar(45) ,
 `empleado` varchar(45) ,
 `estado` varchar(45) ,
 `almacenorigen` varchar(45) ,
 `centrodeproduccion` varchar(45) ,
 `almacendestino` varchar(45) ,
 `sucursal` varchar(45) ,
 `cliente` varchar(45) ,
 `codigoproducto` int(11) ,
 `nombres` varchar(45) ,
 `producto` varchar(45) ,
 `precio` double ,
 `cantidad` int(11) ,
 `total` double ,
 `totalp` double 
)*/;

/*Table structure for table `vistaingproduccion` */

DROP TABLE IF EXISTS `vistaingproduccion`;

/*!50001 DROP VIEW IF EXISTS `vistaingproduccion` */;
/*!50001 DROP TABLE IF EXISTS `vistaingproduccion` */;

/*!50001 CREATE TABLE  `vistaingproduccion`(
 `idIngreso` int(11) ,
 `idorden` int(11) ,
 `Fecha` date ,
 `Notas` varchar(45) ,
 `PersonaAcargo` varchar(45) ,
 `estado` varchar(45) ,
 `almacenorigen` varchar(45) ,
 `centrodeproduccion` varchar(45) ,
 `almacendestino` varchar(45) ,
 `codigoproducto` int(11) ,
 `nombres` varchar(45) ,
 `producto` varchar(45) ,
 `precio` double ,
 `Cantidadingresada` int(11) ,
 `total` double ,
 `totalp` double 
)*/;

/*Table structure for table `vistanotacreditodebitocompra` */

DROP TABLE IF EXISTS `vistanotacreditodebitocompra`;

/*!50001 DROP VIEW IF EXISTS `vistanotacreditodebitocompra` */;
/*!50001 DROP TABLE IF EXISTS `vistanotacreditodebitocompra` */;

/*!50001 CREATE TABLE  `vistanotacreditodebitocompra`(
 `idcreditodebito` int(11) ,
 `nrcomprobante` int(11) ,
 `nrfactura` int(11) ,
 `fecha` datetime ,
 `iva5` int(11) ,
 `iva10` int(11) ,
 `Notas` varchar(45) ,
 `tipodecomprobante` varchar(45) ,
 `estado` varchar(45) ,
 `almacen` varchar(45) ,
 `empresa` varchar(45) ,
 `nombreprov` varchar(45) ,
 `codigoproducto` int(11) ,
 `nombres` varchar(45) ,
 `producto` varchar(45) ,
 `preciounitario` double ,
 `cantidad` int(11) ,
 `total` double ,
 `totalp` double 
)*/;

/*Table structure for table `vistaoproduccion` */

DROP TABLE IF EXISTS `vistaoproduccion`;

/*!50001 DROP VIEW IF EXISTS `vistaoproduccion` */;
/*!50001 DROP TABLE IF EXISTS `vistaoproduccion` */;

/*!50001 CREATE TABLE  `vistaoproduccion`(
 `pdf` int(11) ,
 `idorden` int(11) ,
 `fechaelaboracion` date ,
 `fechaentrega` date ,
 `Notas` varchar(45) ,
 `tipoproduccion` varchar(45) ,
 `plantilla` varchar(45) ,
 `empleado` varchar(45) ,
 `estado` varchar(45) ,
 `almacenorigen` varchar(45) ,
 `centrodeproduccion` varchar(45) ,
 `almacendestino` varchar(45) ,
 `cliente` varchar(45) ,
 `codigoproducto` int(11) ,
 `nombres` varchar(45) ,
 `producto` varchar(45) ,
 `precio` double ,
 `cantidad` int(11) ,
 `total` double ,
 `totalp` double 
)*/;

/*Table structure for table `vistaremisioncompra` */

DROP TABLE IF EXISTS `vistaremisioncompra`;

/*!50001 DROP VIEW IF EXISTS `vistaremisioncompra` */;
/*!50001 DROP TABLE IF EXISTS `vistaremisioncompra` */;

/*!50001 CREATE TABLE  `vistaremisioncompra`(
 `nrid` int(11) ,
 `nota` varchar(45) ,
 `idorden` int(11) ,
 `fecha` timestamp ,
 `estado` varchar(45) ,
 `fehaenvio` date ,
 `nrpedidonota` int(11) ,
 `almacenorigen` varchar(45) ,
 `empleado` varchar(45) ,
 `sucursal` varchar(45) ,
 `almacendestino` varchar(45) ,
 `codigoproducto` int(11) ,
 `nombres` varchar(45) ,
 `producto` varchar(45) ,
 `precio` double ,
 `cantidadorden` double ,
 `cantidadenviada` double ,
 `cantidadrecibida` double ,
 `totalenviada` double ,
 `faltante` double ,
 `sobrante` double ,
 `totalrecibida` double ,
 `totalrecibidas` double ,
 `totalenviadas` double 
)*/;

/*View structure for view formulasv */

/*!50001 DROP TABLE IF EXISTS `formulasv` */;
/*!50001 DROP VIEW IF EXISTS `formulasv` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `formulasv` AS select `re`.`Nombre` AS `Nombre`,`re`.`idReceta` AS `idReceta`,`f`.`codigo` AS `codigo`,`p`.`codigoproducto` AS `codigoproducto`,`f`.`Composicion` AS `composicion`,`f`.`Formula` AS `Formula`,`f`.`cantidadresultante` AS `cantidadresultante`,`p`.`producto` AS `producto`,`c`.`nombrecategoria` AS `categoria`,`i`.`nombre` AS `impuesto`,`r`.`nombre` AS `rubro`,`s`.`subrubro` AS `subrubro`,`m`.`nombre` AS `marca`,`um`.`nombres` AS `unidadm` from ((((((((`productos` `p` join `impuestos` `i`) join `subrubros` `s`) join `rubros` `r`) join `categoriadeproductos` `c`) join `marca` `m`) join `unidaddemedida` `um`) join `formulas` `f`) join `receta` `re`) where ((`c`.`idcategoria` = `p`.`idcategoria`) and (`i`.`idimpuesto` = `p`.`idimpuesto`) and (`r`.`codigorubro` = `p`.`codigorubro`) and (`s`.`codigosubrubro` = `p`.`codigosubrubro`) and (`m`.`idmarca` = `p`.`idmarca`) and (`um`.`idunidaddemedida` = `f`.`idunidaddemedida`) and (`re`.`idReceta` = `f`.`idReceta`) and (`f`.`codigoproducto` = `p`.`codigoproducto`)) */;

/*View structure for view listados */

/*!50001 DROP TABLE IF EXISTS `listados` */;
/*!50001 DROP VIEW IF EXISTS `listados` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `listados` AS select distinct `l`.`idListado` AS `idListado`,`pr`.`codigoproducto` AS `codigoproducto`,`pr`.`producto` AS `producto`,`l`.`precioporenvase` AS `precioporenvase`,`l`.`cantidadporenvase` AS `cantidadporenvase`,`l`.`unidaddemedida` AS `unidaddemedida`,`p`.`nombreprov` AS `nombreprov`,`p`.`RucProveedor` AS `RucProveedor` from ((`listadodepreciosdeproductos` `l` join `productos` `pr`) join `proveedor` `p`) where ((`l`.`codigoproducto` = `pr`.`codigoproducto`) and (`l`.`RucProveedor` = `p`.`RucProveedor`)) */;

/*View structure for view plantillasv */

/*!50001 DROP TABLE IF EXISTS `plantillasv` */;
/*!50001 DROP VIEW IF EXISTS `plantillasv` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `plantillasv` AS select `p`.`idplantilla` AS `idplantilla`,`pr`.`codigoproducto` AS `codigoproducto`,`pr`.`producto` AS `producto`,`p`.`nombreplantilla` AS `nombreplantilla`,`c`.`centrodeproduccion` AS `centrodeproduccion`,`cs`.`nombrecentro` AS `nombrecentro`,`mr`.`nombre` AS `marca`,`u`.`nombres` AS `nombres` from ((((((`plantillas` `p` join `productos` `pr`) join `centrodecostos` `cs`) join `centrodeproduccion` `c`) join `plantillasproductos` `pl`) join `unidaddemedida` `u`) join `marca` `mr`) where ((`pl`.`codigoproducto` = `pr`.`codigoproducto`) and (`pl`.`idCentroDeProduccion` = `c`.`idCentroDeProduccion`) and (`pl`.`idCentroDeCosto` = `cs`.`idCentroDeCosto`) and (`u`.`idunidaddemedida` = `pr`.`idunidaddemedida`) and (`mr`.`idmarca` = `pl`.`idmarca`) and (`p`.`idplantilla` = `pl`.`idplantilla`)) */;

/*View structure for view productosv */

/*!50001 DROP TABLE IF EXISTS `productosv` */;
/*!50001 DROP VIEW IF EXISTS `productosv` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productosv` AS select `p`.`codigoproducto` AS `codigoproducto`,`p`.`precio` AS `precio`,`p`.`producto` AS `producto`,`c`.`nombrecategoria` AS `categoria`,`i`.`nombre` AS `impuesto`,`r`.`nombre` AS `rubro`,`s`.`subrubro` AS `subrubro`,`m`.`nombre` AS `marca`,`um`.`nombres` AS `unidadm` from ((((((`productos` `p` join `impuestos` `i`) join `subrubros` `s`) join `rubros` `r`) join `categoriadeproductos` `c`) join `marca` `m`) join `unidaddemedida` `um`) where ((`c`.`idcategoria` = `p`.`idcategoria`) and (`i`.`idimpuesto` = `p`.`idimpuesto`) and (`r`.`codigorubro` = `p`.`codigorubro`) and (`s`.`codigosubrubro` = `p`.`codigosubrubro`) and (`m`.`idmarca` = `p`.`idmarca`) and (`um`.`idunidaddemedida` = `p`.`idunidaddemedida`)) */;

/*View structure for view unproducto */

/*!50001 DROP TABLE IF EXISTS `unproducto` */;
/*!50001 DROP VIEW IF EXISTS `unproducto` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `unproducto` AS select `a`.`idPedidoCompra` AS `idPedidoCompra`,`a`.`Fecha` AS `Fecha`,`a`.`Vencimiento` AS `Vencimiento`,`a`.`cliente` AS `cliente`,`a`.`Notas` AS `Notas`,`v`.`codigoproducto` AS `codigoproducto`,`c`.`almacen` AS `almacen`,`p`.`producto` AS `producto`,`v`.`precio` AS `precio`,`u`.`nombres` AS `nombres`,`v`.`cantidad` AS `cantidad`,(`v`.`cantidad` * `v`.`precio`) AS `total`,(select sum((`dt`.`cantidad` * `pt`.`precio`)) AS `TotalPagar` from (`pedidodetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`idPedidoCompra` = `v`.`idPedidoCompra`)) AS `totalp` from ((((`pedidocabecera` `a` join `pedidodetalle` `v` on((`a`.`idPedidoCompra` = `v`.`idPedidoCompra`))) join `productos` `p` on((`p`.`codigoproducto` = `v`.`codigoproducto`))) join `unidaddemedida` `u` on((`u`.`idunidaddemedida` = `p`.`idunidaddemedida`))) join `almacen` `c` on((`c`.`codigoalmacen` = `a`.`codigoalmacen`))) group by `a`.`idPedidoCompra`,`p`.`producto` */;

/*View structure for view v_marca */

/*!50001 DROP TABLE IF EXISTS `v_marca` */;
/*!50001 DROP VIEW IF EXISTS `v_marca` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_marca` AS select `marca`.`idmarca` AS `idmarca`,`marca`.`nombre` AS `nombre` from `marca` */;

/*View structure for view v_marcass */

/*!50001 DROP TABLE IF EXISTS `v_marcass` */;
/*!50001 DROP VIEW IF EXISTS `v_marcass` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_marcass` AS select `marca`.`idmarca` AS `name`,`marca`.`nombre` AS `dos` from `marca` */;

/*View structure for view vistaajuste */

/*!50001 DROP TABLE IF EXISTS `vistaajuste` */;
/*!50001 DROP VIEW IF EXISTS `vistaajuste` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `vistaajuste` AS select `a`.`idAjuste` AS `idAjuste`,`a`.`Fecha` AS `Fecha`,`al`.`almacen` AS `almacen`,`a`.`Notas` AS `Notas`,`p`.`producto` AS `producto`,`p`.`precio` AS `precio`,`d`.`codigoproducto` AS `codigoproducto`,`d`.`Esperada` AS `Esperada`,`d`.`deportada` AS `Deportada`,`d`.`Faltante` AS `Faltante`,`d`.`Sobrante` AS `Sobrante`,`ca`.`nombrecategoria` AS `nombrecategoria`,`s`.`nombre` AS `nombre`,(select sum((`dt`.`Sobrante` * `pt`.`precio`)) AS `TotalPagar` from (`ajustedetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`idAjuste` = `d`.`idAjuste`)) AS `totalsobrante`,(select sum((`dt`.`Faltante` * `pt`.`precio`)) AS `TotalPagar` from (`ajustedetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`idAjuste` = `d`.`idAjuste`)) AS `totalfaltante` from (((((`ajustecabecera` `a` join `ajustedetalle` `d`) join `almacen` `al`) join `categoriadeproductos` `ca`) join `sucursal` `s`) join `productos` `p`) where ((`a`.`idAjuste` = `d`.`idAjuste`) and (`p`.`codigoproducto` = `d`.`codigoproducto`) and (`a`.`codigoalmacen` = `al`.`codigoalmacen`) and (`ca`.`idcategoria` = `a`.`idcategoria`) and (`s`.`Idsucursal` = `a`.`Idsucursal`)) */;

/*View structure for view vistaetapa */

/*!50001 DROP TABLE IF EXISTS `vistaetapa` */;
/*!50001 DROP VIEW IF EXISTS `vistaetapa` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `vistaetapa` AS select `a`.`idEtapa` AS `idEtapa`,`a`.`Fecha` AS `Fecha`,`a`.`Notas` AS `Notas`,`a`.`tipoproduccion` AS `tipoproduccion`,`e`.`nombres` AS `empleado`,`a`.`estado` AS `estado`,`c`.`almacen` AS `almacenorigen`,`ce`.`centrodeproduccion` AS `centrodeproduccion`,`d`.`almacen` AS `almacendestino`,`s`.`nombre` AS `sucursal`,`cli`.`clinombres` AS `cliente`,`v`.`codigoproducto` AS `codigoproducto`,`u`.`nombres` AS `nombres`,`p`.`producto` AS `producto`,`p`.`precio` AS `precio`,`v`.`cantidad` AS `cantidad`,(`v`.`cantidad` * `v`.`precio`) AS `total`,(select sum((`dt`.`cantidad` * `pt`.`precio`)) AS `TotalPagar` from (`etapadetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`idEtapa` = `v`.`idEtapa`)) AS `totalp` from (((((((((`etapacabecera` `a` join `etapadetalle` `v` on((`a`.`idEtapa` = `v`.`idEtapa`))) join `productos` `p` on((`p`.`codigoproducto` = `v`.`codigoproducto`))) join `empleado` `e` on((`e`.`codigoempleado` = `a`.`codigoempleado`))) join `almacen` `c` on((`c`.`codigoalmacen` = `a`.`codigoalmacen`))) join `cliente` `cli` on((`cli`.`Ci_cliente` = `a`.`Ci_Cliente`))) join `sucursal` `s` on((`s`.`Idsucursal` = `a`.`Idsucursal`))) join `almacen` `d` on((`d`.`codigoalmacen` = `v`.`codigoalmacen`))) join `unidaddemedida` `u` on((`u`.`idunidaddemedida` = `p`.`idunidaddemedida`))) join `centrodeproduccion` `ce` on((`ce`.`idCentroDeProduccion` = `a`.`idCentroDeProduccion`))) group by `a`.`idEtapa`,`p`.`producto` */;

/*View structure for view vistaingproduccion */

/*!50001 DROP TABLE IF EXISTS `vistaingproduccion` */;
/*!50001 DROP VIEW IF EXISTS `vistaingproduccion` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `vistaingproduccion` AS select `a`.`idIngreso` AS `idIngreso`,`a`.`idorden` AS `idorden`,`a`.`Fecha` AS `Fecha`,`a`.`Notas` AS `Notas`,`a`.`PersonaAcargo` AS `PersonaAcargo`,`a`.`estado` AS `estado`,`c`.`almacen` AS `almacenorigen`,`ce`.`centrodeproduccion` AS `centrodeproduccion`,`d`.`almacen` AS `almacendestino`,`v`.`codigoproducto` AS `codigoproducto`,`u`.`nombres` AS `nombres`,`p`.`producto` AS `producto`,`p`.`precio` AS `precio`,`v`.`Cantidadingresada` AS `Cantidadingresada`,(`v`.`Cantidadingresada` * `p`.`precio`) AS `total`,(select sum((`dt`.`Cantidadingresada` * `pt`.`precio`)) AS `TotalPagar` from (`ingresodeproducciondetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`idIngreso` = `v`.`idIngreso`)) AS `totalp` from ((((((`ingresodeproduccioncabecera` `a` join `ingresodeproducciondetalle` `v` on((`a`.`idIngreso` = `v`.`idIngreso`))) join `productos` `p` on((`p`.`codigoproducto` = `v`.`codigoproducto`))) join `almacen` `c` on((`c`.`codigoalmacen` = `a`.`codigoalmacen`))) join `almacen` `d` on((`d`.`codigoalmacen` = `v`.`codigoalmacen`))) join `unidaddemedida` `u` on((`u`.`idunidaddemedida` = `p`.`idunidaddemedida`))) join `centrodeproduccion` `ce` on((`ce`.`idCentroDeProduccion` = `v`.`idCentroDeProduccion`))) order by `a`.`idIngreso`,`p`.`producto` */;

/*View structure for view vistanotacreditodebitocompra */

/*!50001 DROP TABLE IF EXISTS `vistanotacreditodebitocompra` */;
/*!50001 DROP VIEW IF EXISTS `vistanotacreditodebitocompra` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `vistanotacreditodebitocompra` AS select `a`.`idcreditodebito` AS `idcreditodebito`,`a`.`nrcomprobante` AS `nrcomprobante`,`a`.`nrfactura` AS `nrfactura`,`a`.`fecha` AS `fecha`,`v`.`IVA5` AS `iva5`,`v`.`IVA10` AS `iva10`,`a`.`notas` AS `Notas`,`a`.`tipodecomprobante` AS `tipodecomprobante`,`a`.`estado` AS `estado`,`c`.`almacen` AS `almacen`,`e`.`empresa` AS `empresa`,`pr`.`nombreprov` AS `nombreprov`,`v`.`codigoproducto` AS `codigoproducto`,`u`.`nombres` AS `nombres`,`p`.`producto` AS `producto`,`p`.`precio` AS `preciounitario`,`v`.`cantidad` AS `cantidad`,(`v`.`cantidad` * `p`.`precio`) AS `total`,(select sum((`dt`.`cantidad` * `pt`.`precio`)) AS `TotalPagar` from (`creditoydebitodetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`idcreditodebito` = `v`.`idcreditodebito`)) AS `totalp` from ((((((`creditoydebitocabecera` `a` join `creditoydebitodetalle` `v` on((`a`.`idcreditodebito` = `v`.`idcreditodebito`))) join `productos` `p` on((`p`.`codigoproducto` = `v`.`codigoproducto`))) join `almacen` `c` on((`c`.`codigoalmacen` = `v`.`codigoalmacen`))) join `unidaddemedida` `u` on((`u`.`idunidaddemedida` = `p`.`idunidaddemedida`))) join `empresa` `e` on((`e`.`rucempresa` = `a`.`rucempresa`))) join `proveedor` `pr` on((`pr`.`RucProveedor` = `a`.`RucProveedor`))) order by `a`.`idcreditodebito`,`p`.`producto` */;

/*View structure for view vistaoproduccion */

/*!50001 DROP TABLE IF EXISTS `vistaoproduccion` */;
/*!50001 DROP VIEW IF EXISTS `vistaoproduccion` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `vistaoproduccion` AS select `v`.`otro` AS `pdf`,`a`.`idorden` AS `idorden`,`a`.`fechaelaboracion` AS `fechaelaboracion`,`a`.`fechaentrega` AS `fechaentrega`,`a`.`Notas` AS `Notas`,`a`.`tipoproduccion` AS `tipoproduccion`,`pl`.`nombreplantilla` AS `plantilla`,`e`.`nombres` AS `empleado`,`a`.`estado` AS `estado`,`c`.`almacen` AS `almacenorigen`,`ce`.`centrodeproduccion` AS `centrodeproduccion`,`d`.`almacen` AS `almacendestino`,`cli`.`clinombres` AS `cliente`,`v`.`codigoproducto` AS `codigoproducto`,`u`.`nombres` AS `nombres`,`p`.`producto` AS `producto`,`p`.`precio` AS `precio`,`v`.`cantidad` AS `cantidad`,(`v`.`cantidad` * `v`.`precio`) AS `total`,(select sum((`dt`.`cantidad` * `pt`.`precio`)) AS `TotalPagar` from (`ordendeproducciondetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`idorden` = `v`.`idorden`)) AS `totalp` from (((((((((`ordenproduccioncabecera` `a` join `ordendeproducciondetalle` `v` on((`a`.`idorden` = `v`.`idorden`))) join `productos` `p` on((`p`.`codigoproducto` = `v`.`codigoproducto`))) join `empleado` `e` on((`e`.`codigoempleado` = `a`.`codigoempleado`))) join `almacen` `c` on((`c`.`codigoalmacen` = `a`.`codigoalmacen`))) join `cliente` `cli` on((`cli`.`Ci_cliente` = `a`.`Ci_Cliente`))) join `almacen` `d` on((`d`.`codigoalmacen` = `v`.`codigoalmacen`))) join `unidaddemedida` `u` on((`u`.`idunidaddemedida` = `p`.`idunidaddemedida`))) join `centrodeproduccion` `ce` on((`ce`.`idCentroDeProduccion` = `a`.`idCentroDeProduccion`))) join `plantillas` `pl` on((`pl`.`idplantilla` = `v`.`idplantilla`))) group by `a`.`idorden`,`p`.`codigoproducto`,`v`.`otro` */;

/*View structure for view vistaremisioncompra */

/*!50001 DROP TABLE IF EXISTS `vistaremisioncompra` */;
/*!50001 DROP VIEW IF EXISTS `vistaremisioncompra` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `vistaremisioncompra` AS select `a`.`nrid` AS `nrid`,`a`.`nota` AS `nota`,`a`.`idorden` AS `idorden`,`a`.`fecha` AS `fecha`,`a`.`estado` AS `estado`,`a`.`fechaenvio` AS `fehaenvio`,`a`.`nrpedidonota` AS `nrpedidonota`,`c`.`almacen` AS `almacenorigen`,`ce`.`nombres` AS `empleado`,`s`.`nombre` AS `sucursal`,`d`.`almacen` AS `almacendestino`,`v`.`codigoproducto` AS `codigoproducto`,`u`.`nombres` AS `nombres`,`p`.`producto` AS `producto`,`p`.`precio` AS `precio`,`v`.`cantidadorden` AS `cantidadorden`,`v`.`cantidadenviada` AS `cantidadenviada`,`v`.`cantidadrecibida` AS `cantidadrecibida`,(`v`.`cantidadenviada` * `p`.`precio`) AS `totalenviada`,(`v`.`cantidadenviada` - `v`.`cantidadrecibida`) AS `faltante`,(`v`.`cantidadenviada` - `v`.`cantidadrecibida`) AS `sobrante`,(`v`.`cantidadrecibida` * `p`.`precio`) AS `totalrecibida`,(select sum((`dt`.`cantidadrecibida` * `pt`.`precio`)) AS `TotalPagar` from (`notaderemisiondetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`nrid` = `v`.`nrid`)) AS `totalrecibidas`,(select sum((`dt`.`cantidadenviada` * `pt`.`precio`)) AS `TotalPagarr` from (`notaderemisiondetalle` `dt` join `productos` `pt` on((`dt`.`codigoproducto` = `pt`.`codigoproducto`))) where (`dt`.`nrid` = `v`.`nrid`)) AS `totalenviadas` from (((((((`notaderemisioncabecera` `a` join `notaderemisiondetalle` `v` on((`a`.`nrid` = `v`.`nrid`))) join `productos` `p` on((`p`.`codigoproducto` = `v`.`codigoproducto`))) join `almacen` `c` on((`c`.`codigoalmacen` = `a`.`codigoalmacen`))) join `almacen` `d` on((`d`.`codigoalmacen` = `v`.`codigoalmacen`))) join `unidaddemedida` `u` on((`u`.`idunidaddemedida` = `p`.`idunidaddemedida`))) join `sucursal` `s` on((`s`.`Idsucursal` = `a`.`Idsucursal`))) join `empleado` `ce` on((`ce`.`codigoempleado` = `a`.`codigoempleado`))) order by `a`.`nrid`,`p`.`producto` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
