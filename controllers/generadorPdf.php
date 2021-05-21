<?php

class GeneradorPdf extends Controller{

function __construct(){
    parent::__construct();
}

function render(){
    $this->view->render('generarPdf/index'); 
}


}