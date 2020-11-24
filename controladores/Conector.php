<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Conectar {
    private $Host = HostName;
    private $User = UserName;
    private $Pss = Password;
    private $BD = BDName;
    
    public $query;
    public $conn;
            
    function __construct() {
        $this->conectt();
    }
    
    public function conectt() {
        $this->conn = mysqli_connect($this->Host, $this->User, $this->Pss, $this->BD);
        return $this->conn;
    }
    
    public function ejecutar($sql) {
        
        $a = $this->query = mysqli_query($this->conn, $sql);
        return $a;
    }
    
    public function asociar() {
        while ($row = mysqli_fetch_assoc($this->query)) {
            $datos[] = $row;
        }
            return $datos;
    }
    
    public function assocRow() {
        $rows = mysqli_fetch_row($this->query);
        return $rows;
    }
}

