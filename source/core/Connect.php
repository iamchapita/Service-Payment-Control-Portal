<?php

// -*- coding: utf-8 -*-

// @author: lamorales@unah.hn||iamchapita
// @date: 2021/09/17
// @version: 0.1.0

class Connect{

    private $driver;
    private $host, $user, $password, $database, $charset;
    
    // Constructor de la clase
    public function __construct(){
        // Se incluye el archivo con los parametros de conexion a la base de datos
        $connectionConfig = require_once("config\database.php");

        // Se establecen los parametros de conexion
        $this->driver = $connectionConfig["driver"];
        $this->host = $connectionConfig["host"];
        $this->user = $connectionConfig["user"];
        $this->password = $connectionConfig["password"];
        $this->database = $connectionConfig["database"];
        $this->charset = $connectionConfig["charset"];
    }

    // Devuelve el objeto donde se realizaran las diferentes operaciones sobre la base de datos
    public function connection(){

        if($this->driver == "mysql" || $this->driver == null){

            $connection = new mysqli($this->host, $this->user, $this->password, $this->database);
            //$connection->query("SET NAMES '".$this->charset."'");
        }
        return $connection;
    }
}
?>