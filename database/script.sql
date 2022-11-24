CREATE DATABASE experimentos;

USE experimentos;
-- Vista departamento, provincia y distrito en un campo
CREATE VIEW vs_ubigeo_full
AS
	SELECT ubigeo,
	CONCAT(dpto,' ',prov,' ',distrito) AS 'text'
	FROM ubigeos
	ORDER BY  2;

-- Proc consultando a la Vista 
DELIMITER$$
CREATE PROCEDURE spu_ubigeos_buscar 
(
IN _valorbuscado VARCHAR(30)
)
BEGIN
SELECT * FROM vs_ubigeo_full
WHERE vs_ubigeo_full.text LIKE CONCAT('%',_valorbuscado,'%');
END$$


CALL spu_ubigeos_buscar('pueblo nuevo');


CREATE TABLE comentarios
(
idcomentario 		INT 		AUTO_INCREMENT PRIMARY KEY,
comentario 		TEXT 		NOT NULL,
fechacomentario 	DATETIME  	NOT NULL DEFAULT NOW()
)ENGINE = INNODB;

DELIMITER$$
CREATE PROCEDURE spu_comentario_registrar
(
IN _comentario TEXT
)
BEGIN
INSERT INTO comentarios(comentario)
VALUES(_comentario);
END$$

CALL spu_comentario_registrar("<h1>hola</h1>");
CALL spu_comentario_registrar("<h2>SENATI</h2>");



DELIMITER$$
CREATE PROCEDURE spu_comentario_listar()
BEGIN
SELECT * FROM comentarios
ORDER BY idcomentario DESC LIMIT 1;
END$$

CALL spu_comentario_listar();

CREATE TABLE equipos
(
	idequipo					INT 				AUTO_INCREMENT PRIMARY KEY,
	nombre 					VARCHAR(30)		NOT NULL,
	precio 					DECIMAL(7,2)	NOT NULL,
	garantia 				TINYINT			NOT NULL,
	especificaciones 		JSON	 			NULL
)ENGINE=INNODB;

INSERT INTO equipos (nombre, precio, garantia, especificaciones) VALUES
("Samsung Galaxy S3",1200,12,'{"capacidad":512, "ram": 1024}')

INSERT INTO equipos (nombre, precio, garantia, especificaciones) VALUES
    ("LG Power",1500,12,'{"colores":["rojo","verde","azul"]}');

SELECT * FROM equipos;

-- Active: 1668121920190@@127.0.0.1@3306@experimentos

SELECT * FROM equipos;


SELECT nombre, JSON_EXTRACT(especificaciones,'$.capacidad') FROM equipos;

SELECT nombre, JSON_EXTRACT(especificaciones,'$.ram') FROM equipos


INSERT INTO equipos (nombre, precio, garantia, especificaciones) VALUES
    ("LG Power",1500,12,'{"colores":["rojo","verde","azul"]}');

SELECT nombre,
	JSON_EXTRACT(especificaciones,'$.colores') AS 'colores'
FROM equipos 
WHERE idequipo = 2;

-- RECUPERAMOS EL PRIMER VALOR
SELECT nombre,
	JSON_EXTRACT(especificaciones,'$.colores[0]') AS 'colores'
FROM equipos 
WHERE idequipo = 2;

-- CAMBIAR EL ULTIMO COLOR => rojo => blanco

UPDATE equipos SET
	especificaciones = JSON_REPLACE(especificaciones,'$.colores[0]', "blanco")
 WHERE idequipo = 2;
 
SELECT * FROM equipos
 
 -- obtener datos
SELECT nombre, 
			JSON_EXTRACT(especificaciones, '$.capacidad')'capacidad'
	FROM equipos WHERE idequipo = 2;
	
SELECT nombre, 
			JSON_EXTRACT(especificaciones, '$.colores')"colores"
	FROM equipos WHERE idequipo = 1;
	
SELECT nombre, 
			JSON_EXTRACT(especificaciones, '$.colores[0]')"colores"
	FROM equipos WHERE idequipo = 2;
	
-- actualizamos datos en json
UPDATE equipos SET
	especificaciones = JSON_REPLACE(especificaciones, '$.capacidad', 2048)
 WHERE idequipo = 1;
 
UPDATE equipos SET
	especificaciones = JSON_REPLACE(especificaciones, '$.colores[0]','negro')
	WHERE idequipo = 2;
	
-- eliminar nodo de sjon
UPDATE equipos SET
	especificaciones = JSON_REMOVE(especificaciones, '$.ram')
	WHERE idequipo = 1;
	
-- insertar un json complejo
INSERT INTO equipos (nombre, precio, garantia, especificaciones) VALUES
("Motorola Max", 2000, 12, '{"plegabel":"true", "5G": true, "sensores":["retina", "ritmo cardiaco"]}')

-- verficamos el dato en el json
SELECT nombre, 
			JSON_EXTRACT(especificaciones, '$.sensores[1]')"sensor"
	FROM equipos WHERE idequipo = 3;
	
-- como mostrar los datos no json como arreglo
SELECT JSON_ARRAY(nombre,precio,garantia)"datos" FROM equipos

-- como agregar datos al arreglo
SET @json = '[1,2,3,4]';
SELECT JSON_ARRAY_INSERT(@json,'$[0]',7);

-- agregando un nuevo color
UPDATE equipos SET
	especificaciones = JSON_ARRAY_INSERT(especificaciones, '$.colores[3]','dorado')
	WHERE idequipo = 2;
	
-- agregar un nuevo sensor al 3 registro
UPDATE equipos SET
	especificaciones = JSON_ARRAY_INSERT(especificaciones, '$.sensores[2]','biometrico')
	WHERE idequipo = 3;
	
-- cúantos sensores tiene registrado el motorolamax
SELECT  nombre, JSON_LENGTH(especificaciones,'$.sensores')'Total sensores'
	FROM equipos WHERE idequipo = 3;

-- ¿Cómo sabemos si existe un nodo en el JSON?
SELECT 	nombre,
		CASE
			WHEN (JSON_EXISTS(especificaciones, '$.sensores')) = 0 THEN  "No tiene"
			WHEN (JSON_EXISTS(especificaciones, '$.sensores')) = 1 THEN  "Si tiene"
		END  'sensor disponible'
	FROM equipos;
-- agregar un nuevo nodo json
SET @json = '{"D": "Photoshop", "I": "AutoCat"}';
-- agregar la clave p : visual studio code
SELECT JSON_INSERT(@json,'$.P','Visual Studio Code');

-- agregar el nodo "ragua": true al ultimo registro
UPDATE equipos SET
	especificaciones = JSON_INSERT(especificaciones,'$.ragua','true')
	WHERE idequipo = 3


SELECT * FROM equipos