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

  public function index()
  {
    $table_id = isset($_GET['table_id']) ? $_GET['table_id'] : '';
    if($table_id){
      $cls_table = new Table();
      $cls_sub_table = new SubTable();
      $cls_task = new Task();
      $cls_user = new User();
      $table = $cls_table->get_one($table_id);
      $sub_tables = $cls_sub_table->get_table($table_id); 
      $tasks =  $table->get_tasks(); 
      $data = array('sub_tables' => $sub_tables, 'table' => $table, 'tasks' => $tasks, 'cls_task' => $cls_task);
      $this->render('index', $data);
    }
    else{
      $this->render('error');
    }
  }
}