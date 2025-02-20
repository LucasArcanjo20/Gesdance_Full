<?php

class TeamController extends Controller


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
      $Team = new Team();//instanciado o objeto teacher (instanciar é o mesmo que criar)
  
      $limit = 18; //limite de items por página
      $offset = 0;
      
      $data['list'] = $Team->getAll($limit, $offset, $filters);

    
  
      //nome do template, nome da view, data
      $this->loadTemplate("admin","admin/teams/list", $data);
    }

    
  
    public function create()//action
    { //action
  
      $data  = array();//essa variavel envia os dados que precisamos para a view
      $filters = array(); 
      $Teacher = new Teacher();

      $limit = 1000;
      $offset = 0;
      
      
      $data["list"] = $Teacher->getAll($limit, $offset, $filters);

     

  
      //nome do template, nome da view, data
      $this->loadTemplate("admin","admin/teams/add", $data);
  
    }


  
    //Processa o formulário do adicionar
    public function store()
    { //action
  
      $data  = array();
      $filters = array();
      $Team = new Team();
      
  
      //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
      if (!empty($_POST['name'])) {
        
  
        $name = filter_input(INPUT_POST, 'name');
        $teacher_id = filter_input(INPUT_POST, 'teacher_id');
        $days = filter_input(INPUT_POST, 'days');
        $schedules = filter_input(INPUT_POST, 'schedules');
       
        
         
  
  
        if ($Team->add($name, $teacher_id, $days, $schedules)) {
          header("location: " . BASE_URL . "Team");
          exit;
        }
      }
    
  
    }
  
    
    public function edit($id)
    { //action
  
      $data  = array();
      $filters = array();  
      $Team = new Team(); 
  
      $data["info"] = $Team->get($id);
  
      
  
      //nome do template, nome da view, data
      $this->loadTemplate("admin","admin/teams/edit", $data);
  
    }
  
   

    public function destroy($id)
    { //action
  
      $data  = array();
      $filters = array();
      $Team = new Team();
      if ($Team->delete($id)) {
        header("location: " . BASE_URL . "Team");
        exit;
      }
  
    }

  }