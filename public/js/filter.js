// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2022/10/29
@version: 0.1.0
*/

// Realiza el filtrado de datos de la tabla
function searchFilter() {
    // Se declaran las variables utilizadas para el proceso de filtrado
    var input, filter, table, tr, td, i, textValue;
    input = document.getElementById("searchInput");
    filter = input.value;
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    // Se recorren todos los tr de la tabla
    for (var i = 1; i < tr.length; i++) {
        // Se comprueba que la cadena a filtrar esta incluida en el elemento iterado
        if (tr[i].textContent.indexOf(filter) > -1) {
            tr[i].style.display = "";
        // Se oculta si la cadena a filtrar no esta incluida en el elemento iterado
        } else {
            tr[i].style.display = "none";
        }
    }
}
