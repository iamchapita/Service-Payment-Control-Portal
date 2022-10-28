function searchFilter() {

    // Se declaran las variables utilizadas para el proceso de filtrado
    var input, filter, table, tr, td, i, textValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    // Se recorre por todas las filas y se ocultan las que no concuerden con el criterio
    //  de busqueda
    for (i = 0; i < tr.length; i++) {
        // Se obtiene la primer posicion del arreglo de td's
        td = tr[i].getElementsByTagName("td")[0];

        if (td) {
            textValue = td.textContent || td.innerText;
            // Se evalua si el criterio de busqueda se encuentra en el valor de td's
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
