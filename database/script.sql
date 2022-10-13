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