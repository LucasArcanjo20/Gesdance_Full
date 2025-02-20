<?php

class StudentController extends Controller
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
    $Student = new Student();
    
  
    $limit = 18; //limite de items por página
    $data['currentPage'] = "1"; //atual pagina

    if (!empty($_GET['p'])) { //caso na url tenha o p, a página atual passa a ter o valor de p
      $data['currentPage'] = $_GET['p'];
    }

    $offset = ($data['currentPage'] * $limit) - $limit; //determina de onde a lista começa

    $data['totalItens'] = $Student->getTotal($filters);
    $data['numberOfPages'] = ceil($data['totalItens'] / $limit); //determina o numero de páginas
    $data['list_student'] = $Student->getAll($limit, $offset, $filters);

   

    if (isset($_GET) && !empty($_GET)) {
      unset($_GET['p']);
      $data['gets_active'] = http_build_query($_GET);
    }

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/students/list", $data);
  }

  public function create()
  { //action

    $data  = array();
    $filters = array();
  

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/students/add", $data);
  }

  //Processa o formulário do adicionar
  public function store()
  { //action

    $data  = array();
    $filters = array();
    $Student = new Student();
    $Resource = new Resource();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['name'])) {

      $name = filter_input(INPUT_POST, 'name');
      $document = filter_input(INPUT_POST, 'document');
      $date_birth = filter_input(INPUT_POST, 'date_birth');
      $phone = filter_input(INPUT_POST, 'phone');
      $email = filter_input(INPUT_POST, 'email');
      $zipcode = filter_input(INPUT_POST, 'zipcode');
      $street = filter_input(INPUT_POST, 'street');
      $number = filter_input(INPUT_POST, 'number');
      $complement = filter_input(INPUT_POST, 'complement');
      $district = filter_input(INPUT_POST, 'district');
      $state = filter_input(INPUT_POST, 'state');
      $city = filter_input(INPUT_POST, 'city');
      $reference = filter_input(INPUT_POST, 'reference');
      $observation = filter_input(INPUT_POST, 'observation');  
      $responsible_name_1 = filter_input(INPUT_POST, 'responsible_name_1');  
      $telephone_number_of_the_representative_1 = filter_input(INPUT_POST, 'telephone_number_of_the_representative_1');
      $responsible_name_2 = filter_input(INPUT_POST, 'responsible_name_2');
      $telephone_number_of_the_representative_2 = filter_input(INPUT_POST, 'telephone_number_of_the_representative_2');
      
      $dir = "assets/admin/upload/student/" . $name . "/";   
      
      $image = $Resource->uploadFile($dir, $_FILES['image']);
      $image_voice_authorization_attachment = $Resource->uploadFile($dir, $_FILES['image_voice_authorization_attachment'], "document");
      
     

      if ($Student->add($name, $document, $date_birth,$phone,$email,$zipcode,$street,$number,$complement,$district,$state,$city,$reference,$observation, $responsible_name_1, $telephone_number_of_the_representative_1, $responsible_name_2, $telephone_number_of_the_representative_2, $image, $image_voice_authorization_attachment)) {
        header("location: " . BASE_URL . "Student");
        exit;
      }

      
    }
  

  }

  public function edit($id)
  { //action

    $data  = array();
    $filters = array();
    $Student = new Student();
    

    $data['info'] = $Student->get($id);

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/students/edit", $data);
  }

  //Processa o formulário do editar
  public function update($id)
  { //action

    $data  = array();
    $filters = array();
    $Student = new Student();
    $Resource = new Resource();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['name'])) {
      $name = filter_input(INPUT_POST, 'name');
      $document = filter_input(INPUT_POST, 'document');
      $date_birth = filter_input(INPUT_POST, 'date_birth');
      $phone = filter_input(INPUT_POST, 'phone');
      $email = filter_input(INPUT_POST, 'email');
      $zipcode = filter_input(INPUT_POST, 'zipcode');
      $street = filter_input(INPUT_POST, 'street');
      $number = filter_input(INPUT_POST, 'number');
      $email = filter_input(INPUT_POST, 'email');
      $complement = filter_input(INPUT_POST, 'complement');
      $district = filter_input(INPUT_POST, 'district');
      $state = filter_input(INPUT_POST, 'state');
      $city = filter_input(INPUT_POST, 'city');
      $reference = filter_input(INPUT_POST, 'reference');
      $observation = filter_input(INPUT_POST, 'observation');
      $responsible_name_1 = filter_input(INPUT_POST, 'responsible_name_1');  
      $telephone_number_of_the_representative_1 = filter_input(INPUT_POST, 'telephone_number_of_the_representative_1');
      $responsible_name_2 = filter_input(INPUT_POST, 'responsible_name_2');
      $telephone_number_of_the_representative_2 = filter_input(INPUT_POST, 'telephone_number_of_the_representative_2');
      
      $dir = "assets/admin/upload/student/" . $name . "/";   
      
      $image = $Resource->uploadFile($dir, $_FILES['image']);
      $image_voice_authorization_attachment = $Resource->uploadFile($dir, $_FILES['image_voice_authorization_attachment'], "document");
      
      

      if ($Student->update($name, $document, $date_birth,$phone,$email,$zipcode,$street,$number,$complement,$district,$state,$city,$reference, $observation, $responsible_name_1, $telephone_number_of_the_representative_1, $responsible_name_2, $telephone_number_of_the_representative_2, $image, $image_voice_authorization_attachment, $id)) {
        header("location: " . BASE_URL . "Student");
        exit;
      }
    }
 
  }

  //exibe um dado individual
  public function attachment($id)
  { //action

    $data  = array();
    $filters = array();
    $Student = new Student();

    
  

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/students/attachment", $data);
  }

  public function destroy($id)
  { //action

    $data  = array();
    $filters = array();
    $Student = new Student();
    if ($Student->delete($id)) {
      header("location: " . BASE_URL . "Student");
      exit;
    }
  

  }



  

  



 

}
