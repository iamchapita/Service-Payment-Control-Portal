// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2022/10/29
@version: 0.1.0
*/

function searchFilter() {
    // Se declaran las variables utilizadas para el proceso de filtrado
    var input, filter, table, tr, td, i, textValue;
    input = document.getElementById("searchInput");
    filter = input.value;
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {
        if (tr[i].textContent.indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
