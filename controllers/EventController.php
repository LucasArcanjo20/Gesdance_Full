<?php

class EventController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();

    $limit = 10;
    $offset = 0;

    $data["list"] = $Event->getAll($limit, $offset, $filters);




    //nome do template, nome da view, data
    $this->loadTemplate("home", "event/list", $data);
  }

  public function adminList()
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();

    $limit = 18; //limite de items por página
    $data['currentPage'] = "1"; //atual pagina

    if (!empty($_GET['p'])) { //caso na url tenha o p, a página atual passa a ter o valor de p
      $data['currentPage'] = $_GET['p'];
    }

    $offset = ($data['currentPage'] * $limit) - $limit; //determina de onde a lista começa

    $data['totalItens'] = $Event->getTotal($filters);
    $data['numberOfPages'] = ceil($data['totalItens'] / $limit); //determina o numero de páginas
    $data['list'] = $Event->getAll($limit, $offset, $filters);

    if (isset($_GET) && !empty($_GET)) {
      unset($_GET['p']);
      $data['gets_active'] = http_build_query($_GET);
    }

    //nome do template, nome da view, data
    $this->loadTemplate("admin", "admin/events/list", $data);
  }

  public function create()
  { //action

    $data  = array();
    $filters = array();


    //nome do template, nome da view, data
    $this->loadTemplate("admin", "admin/events/add", $data);
  }

  public function store()
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['name'])) {
      $name = filter_input(INPUT_POST, 'name');
      $description = filter_input(INPUT_POST, 'description');
      $date = filter_input(INPUT_POST, 'date');
      $time = filter_input(INPUT_POST, 'time');
      $local = filter_input(INPUT_POST, 'local');
      $image = filter_input(INPUT_POST, 'image');
      $frame_map = filter_input(INPUT_POST, 'frame_map');



      if ($Event->add($name, $description, $date, $time, $local, $image, $frame_map)) {
        header("location: " . BASE_URL . "Event/adminList");
        exit;
      }
    }
  }


  public function edit($id)
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();


    $data['info'] = $Event->get($id);

    //nome do template, nome da view, data
    $this->loadTemplate("admin", "admin/events/edit", $data);
  }

  //Processa o formulário do editar
  public function update($id)
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();



    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['name'])) {

      $name = filter_input(INPUT_POST, 'name');
      $description = filter_input(INPUT_POST, 'description');
      $date = filter_input(INPUT_POST, 'date');
      $time = filter_input(INPUT_POST, 'time');
      $local = filter_input(INPUT_POST, 'local');
      $image = filter_input(INPUT_POST, 'image');
      $frame_map = filter_input(INPUT_POST, 'frame_map');

      if ($Event->update($name, $description, $date, $time, $local, $image, $frame_map, $id)) {


        header("location: " . BASE_URL . "Event/adminList");
        exit;
      }
    }
  }

  public function show($id)
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();

    $data["info"] = $Event->get($id);



    //nome do template, nome da view, data
    $this->loadTemplate("home", "event/view", $data);
  }  

  public function createpeople($id)
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();
    $Student = new Student();
    $Teacher = new Teacher();
    $limit = 10;
    $offest = 0;

    $data['event_id'] = $id;

    $filters['event_id'] = $id;

    $data["list_event_student"] = $Event->getAllStudent($limit, $offest, $filters);
    $data["list_event_teacher"] = $Event->getAllTeacher($limit, $offest, $filters);

    $data["list_student"] = $Student->getAll($limit, $offest, $filters);
    $data["list_teacher"] = $Teacher->getAll($limit, $offest, $filters);


    //nome do template, nome da view, data
    $this->loadTemplate("admin", "admin/events/people/add", $data);
  }

  public function storeTeacher()
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['event_id'])) {
      $event_id = filter_input(INPUT_POST, 'event_id');
      $teacher_id = filter_input(INPUT_POST, 'teacher_id');
      $observation = filter_input(INPUT_POST, 'observation');



      if ($Event->addTeacherInEvent($event_id, $teacher_id, $observation)) {
        header("location: " . BASE_URL . "Event/createpeople/" . $event_id);
        exit;
      }
    }
  }
  public function storeStudent()
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['event_id'])) {
      $event_id = filter_input(INPUT_POST, 'event_id');
      $student_id = filter_input(INPUT_POST, 'student_id');
      $observation = filter_input(INPUT_POST, 'observation');


      if ($Event->addStudentInEvent($event_id, $student_id, $observation)) {
        header("location: " . BASE_URL . "Event/createpeople/" . $event_id);
        exit;
      }
    }
  }

  public function destroy($id)
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();
    if ($Event->delete($id)) {
      header("location: " . BASE_URL . "Event/adminList");
      exit;
    }
  }

  public function destroyStudent($id, $event_id)
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();
    if ($Event->deleteStudent($id)) {
      header("location: " . BASE_URL . "Event/createpeople/" . $event_id);
      exit;
    }
  }

  public function destroyTeacher($id, $event_id)
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();
    if ($Event->deleteTeacher($id)) {
      header("location: " . BASE_URL . "Event/createpeople/" . $event_id);
      exit;
    }
  }

  public function uploadAttachmentsAuthorization()
  { //action

    $data  = array();
    $filters = array();
    $Event = new Event();
    $Resource = new Resource();
    
    if (!empty($_POST['event_id'])) {
      $dir = "assets/admin/upload/event/authorization/";
   
      
      $attachments_authorization = $Resource->uploadFile($dir, $_FILES['attachments_authorization'], "document");
      
      $event_id = filter_input(INPUT_POST, 'event_id');
      $event_students_id = filter_input(INPUT_POST, 'event_students_id');

      if ($Event->addAuthorization($attachments_authorization, $event_students_id)) {
        header("location: " . BASE_URL . "Event/createpeople/" . $event_id);
        exit;
      }
    }
  }

}
