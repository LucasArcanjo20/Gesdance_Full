<?php

class AdminController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }  

  public function index()
  { //action

    $data  = array();
    $filters = array();
    $Note = new Note();
    $data["info"] = $Note->get(1);
   

    //nome da view, data
    $this->loadTemplate("admin","admin/home", $data);//view e data
  }

  public function update($id)
  { //action

    $data  = array();
    $filters = array();
    $Note = new Note();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['notes'])) {
      $notes = filter_input(INPUT_POST, 'notes');
    

      if ($Note->update($notes, $id)) {
        header("location: " . BASE_URL . "Admin");
        exit;
      }
    }
 
  }


  



 

}
