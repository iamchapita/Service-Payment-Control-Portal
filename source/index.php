<?php

// -*- coding: utf-8 -*-

// @author: lamorales@unah.hn||iamchapita
// @date: 2021/09/17
// @version: 0.1.0

include ("core/Entity.php");

$var = new Entity("month");

$result = $var->getAll();

foreach($result as $element){

    foreach($element as $field){
        echo $field;
    }
    echo "<br>";
}

?>