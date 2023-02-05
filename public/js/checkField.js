// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@div: 2022/10/31
@version: 0.1.0
*/

/* Obtiene el select de estado de deposito y segun su valor establece
la propiedad disabled a la fecha de deposito */
function checkDepositeStatus(num) {
    var select = document.getElementById("depositStatus"+ num);
    var date = document.getElementById("depositDateInput"+ num);

    if (!select.value || select.value == "0") {
        date.value = "";
        date.setAttribute("disabled", "");
        date.removeAttribute("required");
    }

    if (select.value == "1") {
        date.removeAttribute("disabled");
        date.setAttribute("required", "");
    }
}
