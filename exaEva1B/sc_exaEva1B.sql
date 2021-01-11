DROP TABLE IF EXISTS servicios;
DROP TABLE IF EXISTS pacientes;
DROP TABLE IF EXISTS tipos_servicio;
DROP TABLE IF EXISTS medicos;

-- pacientes que reciben atención en una clínica
create table pacientes(
codpaciente INTEGER PRIMARY KEY,
nombre		varchar(60) not null,
fecha_nac	date,
telefono numeric(10))
ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tipos de servicios médicos que proporciona la clínica
create table tipos_servicio(
codtipo INTEGER PRIMARY KEY,
descripcion varchar(60) not null unique,
especialidad	varchar(45) not null, 
coment	 varchar(100),
coste_minimo	numeric(10) not null,
coste_maximo	numeric(10) not null)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Médicos de la clínica médica
create table medicos( 
	codmedico integer primary key,
	nombre varchar(40) not null,
	nivel	numeric(3) not null, 
	codjefe integer,  -- Código del médico jefe de este médico
	salario	numeric(10))
ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- servicios prestados a los pacientes
create table servicios(
   id integer primary key,
	codpaciente integer not null,  -- Paciente que recibe el servicio médico
	codtipo integer not null,  -- Código del servicio médico recibido
	fecha_inicio	date not null, -- Fecha de inicio del servicio
	fecha_fin		date, -- Fecha de fin del servicio 
	coste				numeric(15) not null, -- Coste del servicio recibido
	codmedico		integer -- Código del médico que da el servicio
	)
	ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO pacientes VALUES(1, 'Juan López', '1971-1-1', 954678934);
INSERT INTO pacientes VALUES(2, 'Nair Duar', '1961-12-4', 954111222);
INSERT INTO pacientes VALUES(3, 'Victoria Jiménez', '1975-4-4', 954124534);
INSERT INTO pacientes VALUES(4, 'Isaias Bemir', '1974-7-5', 955346354);
INSERT INTO pacientes VALUES(5, 'Rocío Sánchez', '1973-2-15', 959574574);
INSERT INTO pacientes VALUES(6, 'David Gómez', '1978-12-23', 952857954);
INSERT INTO pacientes VALUES(7, 'Jose Macías', '1982-11-21', 954584900);

ALTER TABLE pacientes MODIFY codpaciente integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

INSERT INTO medicos VALUES(1, 'David Sánchez', 3, NULL, 150000);
INSERT INTO medicos VALUES(2, 'Francisco Sánchez', 2, 1, 130000);
INSERT INTO medicos VALUES(3, 'John Clos', 3, NULL, 110000);
INSERT INTO medicos VALUES(4, 'Ana Ríos', 1, 1, 100000);
INSERT INTO medicos VALUES(5, 'Esteban Mesa', 2, 1, 100000);

ALTER TABLE medicos MODIFY codmedico integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

INSERT INTO tipos_servicio VALUES(1, 'Neurocirugía', 'Neurología', NULL, 1000, 100000);
INSERT INTO tipos_servicio VALUES(2, 'Implantología', 'Estomatología', NULL, 1000, 50000);
INSERT INTO tipos_servicio VALUES(3, 'Ecografía', 'Radiología', NULL, 1000, 8000);
INSERT INTO tipos_servicio VALUES(4, 'Colonoscopia', 'Digestivo', NULL, 1000, 200000);

ALTER TABLE tipos_servicio MODIFY codtipo integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

INSERT INTO servicios VALUES(1, 1, 1, '2018-1-1', '2018-12-10', 3000, 1);
INSERT INTO servicios VALUES(2, 1, 4, '2017-10-1', '2017-11-21', 2000, 4);
INSERT INTO servicios VALUES(3, 2, 2, '2000-1-2', '2000-3-1', 1250, 2);
INSERT INTO servicios VALUES(4, 3, 3, '2001-1-15', '2001-2-1', 3500, 1);
INSERT INTO servicios VALUES(5, 4, 1, '2006-1-2', '2006-3-1', 1250, 2);
INSERT INTO servicios VALUES(6, 4, 1, '2007-1-15', '2007-2-1', 4500, 1);
INSERT INTO servicios VALUES(7, 5, 4, '2011-1-2', '2011-3-1', 2250, 2);
INSERT INTO servicios VALUES(8, 6, 3, '2016-1-15', '2016-2-1', 3900, 1);


ALTER TABLE servicios MODIFY id integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE medicos ADD CONSTRAINT `FK_med` FOREIGN KEY `FK_med` (`codjefe`) REFERENCES `medicos` (`codmedico`) ON
DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE servicios ADD CONSTRAINT `FK_ser1` FOREIGN KEY `FK_ser1` (`codpaciente`) REFERENCES `pacientes` (`codpaciente`) ON
DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE servicios ADD CONSTRAINT `FK_ser2` FOREIGN KEY `FK_ser2` (`codmedico`) REFERENCES `medicos` (`codmedico`) ON
DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE servicios ADD CONSTRAINT `FK_ser3` FOREIGN KEY `FK_ser3` (`codtipo`) REFERENCES `tipos_servicio` (`codtipo`) ON
DELETE RESTRICT ON UPDATE RESTRICT;

COMMIT;