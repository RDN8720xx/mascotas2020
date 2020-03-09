-- CIFO Vallès, CIFO La Violeta
-- Robert Sallent

-- EJERCICIO 2: MASCOTAS
-- elimina la base de datos mascota si existe
DROP DATABASE IF EXISTS Mascotas2020;

-- crea la base de datos mascotas
CREATE DATABASE Mascotas2020 
DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- usa la base de datos mascotas
USE Mascotas2020;

-- crea la tabla tipos
CREATE TABLE IF NOT EXISTS tipos (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(64) NOT NULL,
  descripcion varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- inserta los registros en la tabla tipos
INSERT INTO tipos
		(id, nombre, descripcion)
VALUES
(1, 'Leon', 'El rey de la jungla'),
(2, 'Gato', 'Animal doméstico autónomo'),
(3, 'Paquidermo', 'Animal muy grande'),
(4, 'Pájaro', 'Animal pequeño y ruidoso'),
(5, 'Reptil', 'A la lengua y a las serpientes hay que temerles'),
(6, 'Gamusino', 'Animal autóctono de España, Portugal y Cuba'),
(7, 'Perro', 'Animal doméstico y para guardar cabras');

-- crea la tabla razas
CREATE TABLE IF NOT EXISTS razas (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(64) NOT NULL,
  descripcion text NOT NULL,
  idtipo int(11) NOT NULL,
  FOREIGN KEY (idtipo) REFERENCES tipos (id) 
  ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- inserta las razas
INSERT INTO razas 
	(id, nombre, descripcion, idtipo)
VALUES
(1, 'León africano', 'León de la jungla africana', 1),
(2, 'Persa', 'Gato peludo', 2),
(3, 'Siamés', 'Gato blanco de cara negra', 2),
(4, 'Elefante', 'Gran animal con trompa', 3),
(5, 'Gorrión', 'Pájaro urbano', 4),
(6, 'Canario', 'Pájaro doméstico cantarín', 4),
(7, 'Jilguero', 'Pájaro cantarín de colorines', 4),
(8, 'Cotorra', 'Pájaro hablador molesto', 4),
(9, 'Camaleón', 'Reptil pequeño que muta de color', 5),
(10, 'Boa', 'Gran serpiente', 5),
(11, 'Dragón', 'Pequeño reptil', 5),
(12, 'Gamusino extremeño', 'Gamusino propio de los campos de Badajoz', 6),
(13, 'Dogo', 'Perro de gran tamaño', 7),
(14, 'Bulldog', 'Perro gordo', 7),
(15, 'Yorkshire', 'Perro pequeño color gris', 7),
(16, 'Dálmata', 'Perro blanco con manchas negras', 7),
(17, 'Galgo', 'Perro muy delgado y muy rápido', 7);

-- crea la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id int(11) NOT NULL PRIMARY KEY auto_increment,
    usuario varchar(32) NOT NULL UNIQUE KEY,
    clave varchar(32) NOT NULL,
    nombre varchar(32) NOT NULL,
    apellido1 varchar(32) NOT NULL DEFAULT '',
    apellido2 varchar(32) NOT NULL DEFAULT '',
    privilegio int(11) NOT NULL DEFAULT '0',
    administrador boolean NOT NULL DEFAULT false,
    email varchar(128) NOT NULL,
    imagen varchar(512) DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- inserta en la tabla usuarios con contraseña 1234
INSERT INTO usuarios
    (id, usuario, clave, nombre, apellido1, apellido2,
    privilegio, administrador, email, imagen, created_at, updated_at)
VALUES
	     
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', 'CIFO','SOC',
 1000, 1, 'admin@rmf.cat', 'images/users/adming.png', DEFAULT, NULL),
(2, 'usuariosupervisor', '81dc9bdb52d04dc20036dbd8313ed055', 'supervisor01', '', '',
  500, 0, 'super@test.com', NULL, DEFAULT, NULL),
(3, 'usuario', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario01', '', '',
  100, 0, 'usuario@test.com', NULL, DEFAULT, NULL);


-- crea la tabla mascotas
CREATE TABLE IF NOT EXISTS mascotas (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(64) NOT NULL,
  sexo char(1) NOT NULL COMMENT 'M macho, H hembra',
  biografia text NOT NULL,
  fechanacimiento date NOT NULL,
  fechadepasoAOL varchar(32) NOT NULL,
  idusuario int(11) NOT NULL,
  idraza int(11) NOT NULL,
  FOREIGN KEY (idusuario) REFERENCES usuarios (id) 
  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (idraza) REFERENCES razas (id) 
  ON DELETE RESTRICT ON UPDATE CASCADE
 )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- inserta en la tabla mascotas
-- INSERT INTO mascotas
-- VALUES ();


-- crea la tabla fotos
CREATE TABLE IF NOT EXISTS fotos(
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fichero varchar(256) NOT NULL,
  ubicacion varchar(128) DEFAULT NULL,
  idmascota int(11) NOT NULL,
  FOREIGN KEY (idmascota) REFERENCES mascotas (id) 
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- inserta en la tabla fotos
-- INSERT INTO fotos
-- VALUES ();

