// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2022/10/31
@version: 0.1.0
*/

// Obtiene el select de estado de deposito y segun su valor establece
// la propiedad required a la fecha de deposito
function checkDepositeStatus() {

    var select = document.getElementById('depositStatus');
    var date = document.getElementById('depositDateInput');

    if (select.value == "1"){
        date.setAttribute('required', '');
    }else{
        date.removeAttribute('required');
    }
}
