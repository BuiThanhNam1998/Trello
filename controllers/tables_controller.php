<?php
require_once('controllers/base_controller.php');
require_once('models/table.php');

class TablesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'tables';
  }

  public function index()
  {
    $uid = $_SESSION['userid'];
    $cls_table = new Table();
    $tables = $cls_table->get_by_user_id($uid);
    $data = array('tables' => $tables);
    $this->render('index', $data);
  }

  public function add_table(){
    $arr = $_POST;
    $cls_table = new Table();
    if(isset($_POST['save-table'])){
      if($_FILES['image']['error']>0)
      {
        echo("File bị lỗi");
      }
      else{
        move_uploaded_file($_FILES['image']['tmp_name'],'assets/images/'. $_FILES['image']['name']);
        $_POST['image']='assets/images/'.$_FILES['image']['name'];
      }
    }
    else{
      return false;
    }
    $_POST['user_id'] = 
    unset($_POST['save-table']);
    $cls_table->insert_one($_POST);
    header("Location: http://localhost:81/trello/index.php?controller=tables");
  }
}
 ?>
