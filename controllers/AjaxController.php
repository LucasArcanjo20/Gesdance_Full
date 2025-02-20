<?php
class AjaxController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

 

  public function generateListTeamsExcludingCurrent()
  {
    $data = array();
    $filters = array();
    $Team = new Team();
    $TeamStudent = new TeamStudent();

    if(isset($_POST['student_id'])){
      $limit = 100;
      $offset = 0; 

      $filters['ignore_student_id'] = $TeamStudent->getAllTeam($_POST['student_id']);
      

      $data['list_teams'] = $Team->getAll($limit, $offset, $filters);

      
    }
    
    
    // Transforma os dados em JSON
    $json = json_encode($data['list_teams']);
    
    // Retorna o JSON
    echo $json;
    
  }


  
}
