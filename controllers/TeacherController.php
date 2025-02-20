<?php

class TeacherController extends Controller
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
    $Teacher = new Teacher();//instanciado o objeto teacher (instanciar é o mesmo que criar)
    $limit = 18; //limite de items por página
    $offset = 0;
    
    $data['list'] = $Teacher->getAll($limit, $offset, $filters);
  

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/teachers/list", $data);
  }

  public function create()//action
  { //action

    $data  = array();
    $filters = array();    

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/teachers/add", $data);

  }

  //Processa o formulário do adicionar
  public function store()
  { //action

    $data  = array();
    $filters = array();
    $Account = new Account();
    $Resource = new Resource();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['name'])) {
      
      $options = array('cost' => 11);

      $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT, $options);
      $login = filter_input(INPUT_POST, 'login');
      $name = filter_input(INPUT_POST, 'name');
      $phone = filter_input(INPUT_POST, 'phone');
      $email = filter_input(INPUT_POST, 'email');
      $zipcode = filter_input(INPUT_POST, 'zipcode');
      $street = filter_input(INPUT_POST, 'street');
      $number = filter_input(INPUT_POST, 'number');
      $complement = filter_input(INPUT_POST, 'complement');
      $district = filter_input(INPUT_POST, 'district');
      $reference = filter_input(INPUT_POST, 'reference');
      $state = filter_input(INPUT_POST, 'state');
      $city = filter_input(INPUT_POST, 'city');
      $descrition = filter_input(INPUT_POST, 'descrition');
      $instagram = filter_input(INPUT_POST, 'instagram');
      $document = filter_input(INPUT_POST, 'document');
      $image = filter_input(INPUT_POST, 'image');
      $date_birth = filter_input(INPUT_POST, 'date_birth');
      $dir = "assets/admin/upload/teachers/";
      $voice_video_authorization = $Resource->uploadFile($dir, $_FILES['voice_video_authorization']);


      if ($Account->add($login, $password, $name, $phone, $email, $zipcode, $street, $number, $complement, $district, $reference, $state, $city, $descrition, $instagram, $document, $image, $date_birth, $voice_video_authorization)) {
        header("location: " . BASE_URL . "Teacher");
        exit;
      }
    }
  

  }

  
  public function edit($id)
  { //action

    $data  = array();
    $filters = array();  
    $Teacher = new Teacher(); 

    $data["info"] = $Teacher->get($id);


    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/teachers/edit", $data);

  }

  //Processa o formulário do editar
  public function update($id)
  { //action

    $data  = array();
    $filters = array();
    $Teacher = new Teacher();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['name'])) {
       
      $name = filter_input(INPUT_POST, 'name');
      $phone = filter_input(INPUT_POST, 'phone');
      $email = filter_input(INPUT_POST, 'email');
      $zipcode = filter_input(INPUT_POST, 'zipcode');
      $street = filter_input(INPUT_POST, 'street');
      $number = filter_input(INPUT_POST, 'number');
      $complement = filter_input(INPUT_POST, 'complement');
      $district = filter_input(INPUT_POST, 'district');
      $reference = filter_input(INPUT_POST, 'reference');
      $state = filter_input(INPUT_POST, 'state');
      $city = filter_input(INPUT_POST, 'city');
      $descrition = filter_input(INPUT_POST, 'descrition');
      $instagram = filter_input(INPUT_POST, 'instagram');
      $document = filter_input(INPUT_POST, 'document');
      $image = filter_input(INPUT_POST, 'image');
      $date_birth = filter_input(INPUT_POST, 'date_birth');
      $voice_video_authorization =""; 
      

      if ($Teacher->update($name, $phone, $email, $zipcode, $street, $number, $complement, $district, $reference, $state, $city, $descrition, $instagram, $document, $image, $date_birth, $voice_video_authorization, $id)) {
        header("location: " . BASE_URL . "Teacher");
        exit;
      }
    }
  

  }

  public function editAccount($id)
  { //action

    $data  = array();
    $filters = array();  
    $Account = new Account(); 

    $data["info"] = $Account->get($id);
   

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/teachers/edit-account", $data);

  }

  public function updateAccount($id)
  { //action

    $data  = array();
    $filters = array();
    $Account = new Account();

  

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_POST['login'])) {
       
      $options = array('cost' => 11);

      $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT, $options);
      $login = filter_input(INPUT_POST, 'login');
      

      if ($Account->update($login, $password, $id)) {
        header("location: " . BASE_URL . "Teacher");
        exit;
      }
    }
  

  }

  public function destroy($id)
  { //action

    $data  = array();
    $filters = array();
    $Teacher = new Teacher();
    if ($Teacher->delete($id)) {
      header("location: " . BASE_URL . "Teacher");
      exit;
    }

  }

  public function logout()
  {
      unset($_SESSION['gesdance_online']);//unset remove a session
      header("Location: " . BASE_URL);
  }

 
  

  


  

  



 

}
