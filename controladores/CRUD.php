<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Operaciones {
    public $mysql;
    public $z;
            
    function __construct($tabla, $ObjConnect) {
        $this->mysql = $ObjConnect;
        
        if($tabla == "") {
            echo '<script> console.log("proceso correcto"); </script>';    
        } else {
        $a = $this->mysql->ejecutar('DESCRIBE '.$tabla);
        $b = $this->mysql->asociar();
        
        for ($i = 0; $i < sizeof($b); $i++){
            $c = $c.$b[$i]['Field'].',';
        }
        
        $this->z = substr($c, 3, -1);
        }
    }
    
    function addData($table, $atribut, $id, $datos) {
        foreach ($datos as $value) {
            $x = $x."'{$value}',";
        }
        if($atribut == ''){
            $proceso = $this->mysql->ejecutar('INSERT INTO '.$table.' ('.$this->z.') VALUES ('.$id.','.substr($x, 0, -1).')');
            return $proceso;
        }
        if($id == 0 || $atribut != '') {
             $ejecucion = $this->mysql->ejecutar('INSERT INTO '.$table.' ('.$atribut.') VALUES ('.$substr($x, 0, -1).')');
             return $ejecucion;
        }   
        
    }
    
    function getData($tableName){
        $this->mysql->ejecutar('SELECT *FROM '.$tableName);
        $res = $this->mysql->asociar();
        return $res;
    }
    
    function deleteData($tableN, $fila, $id){
        $delete = $this->mysql->ejecutar('DELETE FROM '.$tableN.' WHERE '.$fila.' = '.$id);
        return $delete;
    }
    
    function getRows($tabla, $atributo, $valor) {
        $ejecucion = $this->mysql->ejecutar('SELECT *FROM '.$tabla.' WHERE '.$atributo.' = "'.$valor.'"');
        $columna = $this->mysql->asociar();
        return $columna;
    }
    
function updateData($tabla, $datoss, $condicion) {
        $update = $this->mysql->ejecutar('UPDATE '.$tabla.' SET '.$datoss.' WHERE '.$condicion);
        return $update;
    }
    
    function getRelacional($atributes, $tables, $condition, $operacion){
        if($operacion == null) {
            foreach ($atributes as $value) {
            $a = $a."{$value},";
        }
        
        foreach ($tables as $key) {
            $b = $b."{$key},";
        }
        $this->mysql->ejecutar('SELECT '.substr($a, 0, -1).' FROM '. substr($b, 0, -1).' WHERE '.$condition);
        $datos = $this->mysql->asociar();
        return $datos;
        }
        if($operacion == true) {
        $this->mysql->ejecutar('SELECT '.$atributes.' FROM '.$tables.' WHERE '.$condition);
        $d = $this->mysql->assocRow();
        return $d;
        }
    }
    
    function getID($tabla, $condicion){
        $this->mysql->ejecutar('SELECT *FROM '.$tabla.' WHERE '.$condicion);
        $registro = $this->mysql->assocRow();
        return $registro;
    }
}