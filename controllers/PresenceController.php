<?php

class PresenceController extends Controller
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
    $Call = new Call();

    $limit = 18; //limite de items por página
    $data['currentPage'] = "1"; //atual pagina

    if (!empty($_GET['p'])) { //caso na url tenha o p, a página atual passa a ter o valor de p
      $data['currentPage'] = $_GET['p'];
    }

    if (!empty($_GET['team_id'])) { //caso na url tenha o p, a página atual passa a ter o valor de p
      $filters['team_id'] = $_GET['team_id'];
      $data['info_team'] = $Call->get($filters['team_id']);
    }

    $offset = ($data['currentPage'] * $limit) - $limit; //determina de onde a lista começa

    $data['totalItens'] = $Call->getTotal($filters);
    $data['numberOfPages'] = ceil($data['totalItens'] / $limit); //determina o numero de páginas
    $data['list'] = $Call->getAll($limit, $offset, $filters); 

   

    if (isset($_GET) && !empty($_GET)) {
      unset($_GET['p']);
      $data['gets_active'] = http_build_query($_GET);
    }

    //nome do template, nome da view, data
    $this->loadTemplate("admin", "admin/teams/presence/list", $data);
  }

  public function create($id) //action
  { //action

    $data  = array(); //essa variavel envia os dados que precisamos para a view
    $filters = array();
    $Student = new Student();
    $Team = new Team();
    $TeamStudent = new TeamStudent();

    $limit = 1000;
    $offset = 0;

    $data["id"] = $id;
    $filters['team_id'] = $id;
    $data["list"] = $TeamStudent->getAll($limit, $offset, $filters);
    $data["info"] = $Team->get($id);

   



    //nome do template, nome da view, data
    $this->loadTemplate("admin", "admin/teams/presence/add", $data);
  }

  public function store()
  {
    $data = array();
    $filters = array();
    $Presence = new Presence();
    $Call = new Call();

    if (!empty($_POST['student_id'])) {
      $student_ids = $_POST['student_id'];
      $team_id = filter_input(INPUT_POST, 'team_id', FILTER_SANITIZE_NUMBER_INT);
      $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $data['call_id'] = $Call->add($team_id, $date, $time);

      foreach ($student_ids as $student_id) {
        $presence = isset($_POST['presence_' . $student_id]) ? 1 : 0;
        $observation = filter_input(INPUT_POST, 'observation_' . $student_id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $return = $Presence->add($data['call_id'], $student_id, $observation, $presence);
      }

      if ($return) {
        header("Location: " . BASE_URL . "Presence?team_id=" . $team_id);
        exit;
      }
    }
  }




  public function edit($id)
  { //action
    $data  = array();
    $filters = array();
    $Student = new Student();
    $Call = new Call();
    $Presence = new Presence();
    $Team = new Team();
    $TeamStudent = new TeamStudent();

    $limit = 1000;
    $offset = 0;

   
    $data["info"] = $Call->get($id);
    $filters['team_id'] = $data["info"]['team_id'];
    $data["list_team_student"] = $TeamStudent->getAll($limit, $offset, $filters);

    foreach($data["list_team_student"] as $key => $value){
      $data["list_team_student"][$key]['call_info'] = $Presence->getStudent($value['id'], $id);
    }

    

    //nome do template, nome da view, data
    $this->loadTemplate("admin", "admin/teams/presence/edit", $data);
  }

  public function update()
  {
    $data = array();
    $filters = array();
    $Presence = new Presence();
    $Call = new Call();

    if (!empty($_POST['student_id'])) {

      $call_id = filter_input(INPUT_POST, 'call_id', FILTER_SANITIZE_NUMBER_INT);

      $Call->delete($call_id);
      $Presence->deleteCall($call_id);

      $student_ids = $_POST['student_id'];
      $team_id = filter_input(INPUT_POST, 'team_id', FILTER_SANITIZE_NUMBER_INT);      
      $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $data['call_id'] = $Call->add($team_id, $date, $time);

      foreach ($student_ids as $student_id) {
        $presence = isset($_POST['presence_' . $student_id]) ? 1 : 0;
        $observation = filter_input(INPUT_POST, 'observation_' . $student_id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $return = $Presence->add($data['call_id'], $student_id, $observation, $presence);
      }

      if ($return) {
        header("Location: " . BASE_URL . "Presence?team_id=" . $team_id);
        exit;
      }
    }

  }

  //Processa o formulário do editar
 

  //exibe um dado individual
  public function show($id)
  { //action

    $data  = array();
    $filters = array();
    $Presence = new Presence();

    $data['info'] = $Presence->get($id);


    //nome do template, nome da view, data
    $this->loadTemplate("home", "presence/show", $data);
  }

  public function destroy($id)
  { //action

    $data  = array();
    $filters = array();
    $Call = new Call();
    if ($Call->delete($id)) {
      header("location: " . BASE_URL . "presence");
      exit;
    }
  }
}
