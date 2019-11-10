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
    $cls_user = new User();
    $tables_1 = $cls_user->get_tables($uid);
    $tables_2 = $cls_user->get_tables_1($uid);
    $tables = array_unique(array_merge($tables_1, $tables_2), SORT_REGULAR);
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
    $_POST['user_id'] = $_SESSION['userid'];
    unset($_POST['save-table']);
    $cls_table->insert_one($_POST);
    header("Location: http://localhost:81/trello/index.php?controller=tables");
  }
}
 ?>
