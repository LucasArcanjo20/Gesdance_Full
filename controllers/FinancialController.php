<?php

class FinancialController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  /* Será a lista de dados*/
  public function index()
  { //action

    $data  = array();
    $filters = array();
    
    //nome do template, nome da view, data
    $this->loadView("admin/financial/emandamento", $data);
  }  

  }



  

  



 


