// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2022/10/29
@version: 0.1.0
*/

// Limpia el valor del select cuando se cierra el modal pero no se recarga la pagina
function clearSelect() {
    var select = document.getElementsByTagName("select");
    select[0].value = "Seleccione su Nombre";
}
