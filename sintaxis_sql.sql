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