<?php

// -*- coding: utf-8 -*-

// @author: lamorales@unah.hn||iamchapita
// @date: 2021/09/17
// @version: 0.1.0

// Clase que abstraera un modelo generalizado de una entidad y sus operaciines 'basicas'
class Entity{

    private $table, $db, $connect;

    // Constructor de la clase donde se recibe el nombre de la tabla que moldea la entidad
    public function __construct($table){
        
        $this->table = (string) $table;

        require_once ("Connect.php");

        $this->connect = new Connect();
        $this->db=$this->connect->connection();
    }

    public function getConnect(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }

    public function getAll(){
        $query = "SELECT * FROM $this->table ORDER BY id ASC";
        $result = mysqli_query($this->db, $query);
        
        while($row = mysqli_fetch_assoc($result) ){
            $resultSet[]=$row;
        }
        return $resultSet;
    }
}

?>