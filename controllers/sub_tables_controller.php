<?php
require_once('controllers/base_controller.php');
require_once('models/sub_table.php');
require_once('models/table.php');
require_once('models/task.php');
require_once('models/user.php');

class SubTablesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'sub_tables';
  }

  public function index(){
    $table_id = isset($_GET['table_id']) ? $_GET['table_id'] : '';
    if($table_id){
      $cls_table = new Table();
      $cls_sub_table = new SubTable();
      $cls_task = new Task();
      $cls_user = new User();
      $table = $cls_table->get_one($table_id);
      $sub_tables = $cls_table->get_sub_tables($table_id); 
      $tasks =  $cls_table->get_tasks($table['id']); 
      $data = array('sub_tables' => $sub_tables, 'table' => $table, 'tasks' => $tasks, 'cls_task' => $cls_task);
      $this->render('index', $data);
    }
    else{
      $this->render('error');
    }
  }

  public function add_sub_table(){
    $arr = $_POST;
    $special = time().rand(10, 99);
    $arr['special'] = $special;
    $arr['user_id'] = $_SESSION['userid'];
    $cls_sub_table = new SubTable();
    $cls_sub_table->insert_one($arr);
    $sub_table = $cls_sub_table->get_one_special($special);
    if($sub_table){
    echo '<div class="main-table-item">
        <div class="main-table-item-title">
          <span>'.$sub_table['name'].'</span>
        </div>

        <div class="main-table-item-content droppable" data-id="'.$sub_table['id'].'">
        </div>

        <div class="box-add-new-task">
          <span class="ti-plus"></span><a href="javascript:void(0)" title="Thêm task mới" class="add-new-task">Thêm thẻ khác</a>
        </div>
      </div>';
    }
  }

  public function delete_sub_table(){
    $cls_sub_table = new SubTable();
    $sub_table_id = isset($_POST['sub_table_id']) ? $_POST['sub_table_id'] : '';
    if($sub_table_id){
      $cls_sub_table->delete_one($sub_table_id);
    }
  }
}

