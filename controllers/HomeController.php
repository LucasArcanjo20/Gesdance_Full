<?php

class HomeController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { //action

    $data  = array();
    $filters = array();
  

    //nome do template, nome da view, data
    $this->loadTemplate("home","home", $data);
  }

  public function about()
  { //action

    $data  = array();
    $filters = array();
    $Teacher = new Teacher(); //instaciamos o objeto, instanciar e o mesmo que criar
    $Student = new Student(); 
    $Team = new Team(); 

    $limit = 10;
    $offset = 0;

    

    $data['list'] = $Teacher->getAll($limit, $offset, $filters);
    $data['qt_teachers'] = count($data['list']);

    

    $data['list_students'] = $Student->getAll($limit, $offset, $filters);
    $data['qt_students'] = count($data['list_students']);

    $data['list_teams'] = $Team->getAll($limit, $offset, $filters);
    $data['qt_teams'] = count($data['list_teams']);
    

    //nome do template, nome da view, data
    $this->loadTemplate("home","about", $data);
  }

   public function contact()
  { //action

    $data  = array();
    $filters = array();
  

    //nome do template, nome da view, data
    $this->loadTemplate("home","contact", $data);
  }

  public function login()
  { //action

    $data  = array();
    $filters = array();
  

    //nome da view, data
    $this->loadView("login", $data);//view e data
  }

  



 

}
