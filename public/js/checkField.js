// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@div: 2022/10/31
@version: 0.1.0
*/

// Obtiene el select de estado de deposito y segun su valor establece
// la propiedad required a la fecha de deposito
function checkDepositeStatus() {
    var select = document.getElementById("depositStatus");
    var div = document.getElementById("dateField");
    var date = document.getElementById("depositDateInput");

    if (!select.value || select.value == "0" ) {
        date.value = "";
        div.setAttribute("hidden", "");
        date.removeAttribute("required");
    }

    if (select.value == "1") {
        div.removeAttribute("hidden");
        date.setAttribute("required", "");
    }

}
