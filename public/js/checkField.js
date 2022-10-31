// -*- coding: utf-8 -*-
/*
@author: lamorales@unah.hn || alejandrom646@gmail.com ||iamchapita
@date: 2022/10/31
@version: 0.1.0
*/

function checkDepositeStatus() {

    var select = document.getElementById('depositeStatus');
    var date = document.getElementById('depositeDateInput');

    if (select.value == "1"){
        date.setAttribute('required', '');
    }else{
        date.removeAttribute('required');
    }
}
