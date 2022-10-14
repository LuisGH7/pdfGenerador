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