// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2022/10/29
@version: 0.1.0
*/

// Realiza el filtrado de datos de la tabla
function searchFilter() {
    // Se declaran las variables utilizadas para el proceso de filtrado
    var filter, yearFilter, yearFilterValue, table, tr;
    var trText;

    filter = document.getElementById("searchInput");
    yearFilter = document.getElementById("yearFilterInput");

    // Normalizando la cadena, quitando simbolos diacriticos
    filterValue = String(filter.value)
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "");

    yearFilterValue = yearFilter ? yearFilter.value : "";

    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    // Se recorren todos los tr de la tabla
    for (var i = 1; i < tr.length; i++) {
        trText = String(tr[i].textContent)
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "");

        if (
            trText.indexOf(filterValue) > -1 &&
            trText.indexOf(yearFilterValue) > -1
        ) {
            tr[i].style.display = "";
            // Se oculta si la cadena a filtrar no esta incluida en el elemento iterado
        } else {
            tr[i].style.display = "none";
        }
    }
}
