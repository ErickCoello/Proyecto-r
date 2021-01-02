/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Erick
 * Created: 23/11/2020
 */
CREATE DATABASE registro_secundaria;
USE registro_secundaria;

CREATE TABLE ciclos_e (id INT AUTO_INCREMENT PRIMARY KEY, ciclo_e VARCHAR(20));
CREATE TABLE puestos (id INT AUTO_INCREMENT PRIMARY KEY, puesto VARCHAR(50));

CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, id_p INT, name_u VARCHAR(100),
 email VARCHAR(50), password VARCHAR(50), FOREIGN KEY (id_p) REFERENCES puestos(id));

CREATE TABLE datos_alumnos (id INT AUTO_INCREMENT PRIMARY KEY, id_c INT, nombre VARCHAR(200),
Gr1 VARCHAR(1), Gr2 VARCHAR(1), Gr3 VARCHAR(1), cp VARCHAR(1), boleta1 VARCHAR(1), boleta2 VARCHAR(1),
boleta3 VARCHAR(1), cs VARCHAR(1), curp VARCHAR(1), observaciones VARCHAR(200),
FOREIGN KEY (id_c) REFERENCES ciclos_e(id));

INSERT INTO ciclos_e(ciclo_e) VALUES ('2000-2001');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2001-2002');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2002-2003');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2003-2004');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2004-2005');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2005-2006');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2006-2007');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2007-2008');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2008-2009');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2009-2010');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2010-2011');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2011-2012');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2012-2013');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2013-2014');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2014-2015');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2015-2016');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2016-2017');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2017-2018');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2018-2019');
INSERT INTO ciclos_e(ciclo_e) VALUES ('2019-2020');