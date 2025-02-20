<?php

class AttachmentController extends Controller
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
    $Attachment = new Attachment();
  
    $limit = 18; //limite de items por página
    $data['currentPage'] = "1"; //atual pagina

    if (!empty($_GET['p'])) { //caso na url tenha o p, a página atual passa a ter o valor de p
      $data['currentPage'] = $_GET['p'];
    }

    $offset = ($data['currentPage'] * $limit) - $limit; //determina de onde a lista começa

    $data['totalItens'] = $Attachment->getTotal($filters);
    $data['numberOfPages'] = ceil($data['totalItens'] / $limit); //determina o numero de páginas
    $data['list'] = $Attachment->getAll($limit, $offset, $filters);

    if (isset($_GET) && !empty($_GET)) {
      unset($_GET['p']);
      $data['gets_active'] = http_build_query($_GET);
    }

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/attachments/list", $data);
  }

  public function create()
  { //action

    $data  = array();
    $filters = array();
  

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/attachments/add", $data);
  }

  //Processa o formulário do adicionar
  public function store()
  { //action

    $data  = array();
    $filters = array();
    $Attachment = new Attachment();
    $Resource = new Resource();

    //INPUT_POST e apenas uma das regras de filter_input, pode e deve ser ajustada
    if (!empty($_FILES['path'])) {
      $name = filter_input(INPUT_POST, 'name');
      $dir = "assets/upload/attachments/";
      
      if (isset($_FILES['path'])) { //se não existir o arquivo coloca uma padrão
        $path = $Resource->uploadFile($dir, $_FILES['path'], "document");
      } 

      if ($Attachment->add($name, $path)) {
        header("location: " . BASE_URL . "Attachment");
        exit;
      }
    }
  

  }

  

  //exibe um dado individual
  public function show($id)
  { //action

    $data  = array();
    $filters = array();
    $Example = new Example();

    $data['info'] = $Example->get($id);
  

    //nome do template, nome da view, data
    $this->loadTemplate("admin","admin/attachment/show", $data);
  }

  public function destroy($id)
  { //action

    $data  = array();
    $filters = array();
    $Attachment = new Attachment();
    if ($Attachment->delete($id)) {
      header("location: " . BASE_URL . "Attachment");
      exit;
    }
  

  }



  

  



 

}
