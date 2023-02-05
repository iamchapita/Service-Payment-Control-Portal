// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2022/10/29
@version: 0.1.0
*/

// Limpia el valor del select cuando se cierra el modal pero no se recarga la pagina
function clearSelect(id) {
    // Se obtienen las options
    var options = document.getElementById(id);
    // Se asigna el valor del select al option con el value=''
    options.value = '';
}
