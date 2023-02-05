// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2023/02/05
@version: 0.1.0
*/

function disableDepositDateInput() {
    var date1 = document.getElementById("depositDateInput1");
    var date2 = document.getElementById("depositDateInput2");
    var date3 = document.getElementById("depositDateInput3");
    var date4 = document.getElementById("depositDateInput4");
    var date5 = document.getElementById("depositDateInput5");
    var date6 = document.getElementById("depositDateInput6");
    var date7 = document.getElementById("depositDateInput7");
    var date8 = document.getElementById("depositDateInput8");
    var date9 = document.getElementById("depositDateInput9");
    var date10 = document.getElementById("depositDateInput10");
    var date11 = document.getElementById("depositDateInput11");
    var date12 = document.getElementById("depositDateInput12");

    try {
        date1.setAttribute("disabled", "");
        date1.removeAttribute("required");
        date2.setAttribute("disabled", "");
        date2.removeAttribute("required");
        date3.setAttribute("disabled", "");
        date3.removeAttribute("required");
        date4.setAttribute("disabled", "");
        date4.removeAttribute("required");
        date5.setAttribute("disabled", "");
        date5.removeAttribute("required");
        date6.setAttribute("disabled", "");
        date6.removeAttribute("required");
        date7.setAttribute("disabled", "");
        date7.removeAttribute("required");
        date8.setAttribute("disabled", "");
        date8.removeAttribute("required");
        date9.setAttribute("disabled", "");
        date9.removeAttribute("required");
        date10.setAttribute("disabled", "");
        date10.removeAttribute("required");
        date11.setAttribute("disabled", "");
        date11.removeAttribute("required");
        date12.setAttribute("disabled", "");
        date12.removeAttribute("required");
    } catch (error) {}
}
