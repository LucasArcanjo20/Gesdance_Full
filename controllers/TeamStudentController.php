<?php

class TeamStudentController extends Controller
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
    $TeamStudent = new TeamStudent();
  
    $limit = 18; //limite de items por página
    $data['currentPage'] = "1"; //atual pagina

    if (!empty($_GET['p'])) { //caso na url tenha o p, a página atual passa a ter o valor de p
      $data['currentPage'] = $_GET['p'];
    }

    $offset = ($data['currentPage'] * $limit) - $limit; //determina de onde a lista começa

    $data['totalItens'] = $TeamStudent->getTotal($filters);
    $data['numberOfPages'] = ceil($data['totalItens'] / $limit); //determina o numero de páginas
    $data['list'] = $TeamStudent->getAll($limit, $offset, $filters);

    if (isset($_GET) && !empty($_GET)) {
      unset($_GET['p']);
      $data['gets_active'] = http_build_query($_GET);
    }

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/teamstudents/list", $data);
  }

  public function create()
  { //action

    $data  = array();
    $filters = array();
    

   
    //nome do template, nome da view, data
    $this->loadTemplate("home","admin/teamstudents/create", $data);
  }

  //Processa o formulário do adicionar
  public function store()
  { //action

    $data  = array();
    $filters = array();
    $TeamStudent = new TeamStudent();
    $Team = new Team();

    

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['team_id'])) {
      $team_id = filter_input(INPUT_POST, 'team_id');
      $student_id = filter_input(INPUT_POST, 'student_id');
      
      

      if ($TeamStudent->add($team_id, $student_id)) {
        header("location: " . BASE_URL . "TeamStudent");
        exit;
      }
    }
  

  }

  public function edit($id)
  { //action

    $data  = array();
    $filters = array();
  

    //nome do template, nome da view, data
    $this->loadTemplate("home","admin/teamstudents/edit", $data);
  }

  //Processa o formulário do editar
  public function update($id)
  { //action

    $data  = array();
    $filters = array();
    $TeamStudent = new TeamStudent();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['campo_obrigatório'])) {
      $campo1 = filter_input(INPUT_POST, 'campo1');
      $campo2 = filter_input(INPUT_POST, 'campo2');
      $campo3 = filter_input(INPUT_POST, 'campo3');
      

      if ($TeamStudent->update($campo1, $campo2, $campo3, $id)) {
        header("location: " . BASE_URL . "TeamStudentTable");
        exit;
      }
    }
 
  }

  //exibe um dado individual
  public function show($id)
  { //action

    $data  = array();
    $filters = array();
    $TeamStudent = new TeamStudent();

    $data['info'] = $TeamStudent->get($id);
  

    //nome do template, nome da view, data
    $this->loadTemplate("home","admin/teamstudents/show", $data);
  }

  public function destroy($id)
  { //action

    $data  = array();
    $filters = array();
    $TeamStudent = new TeamStudent();
    if ($TeamStudent->delete($id)) {
      header("location: " . BASE_URL . "TeamStudentTable");
      exit;
    }
  

  }



  

  



 

}
