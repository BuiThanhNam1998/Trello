<?php
require_once('controllers/base_controller.php');
require_once('models/task.php');
require_once('models/sub_table.php');
require_once('models/table.php');
require_once('models/user.php');

class TasksController extends BaseController
{
  function __construct(){
    $this->folder = 'tasks';
  }

  public function index(){
    $table_id = isset($_GET['table_id']) ? $_GET['table_id'] : '';
    if($table_id){
      $cls_table = new Table();
      $table = $cls_table->get_one($table_id);
      $sub_tables = SubTable::get_table($table_id); 
      $data = array('sub_tables' => $sub_tables, 'table' => $table);
      $this->render('index', $data);
    }
    else{
      $this->render('error');
    }
  }

  public function get_user(){
    $task = new Task();
    $users = $cls_task->get_user($task->get_id());
    return $users;
  }

  public function set_sub_table(){
    $sub_table_id = $_POST['sub_table_id'];
    $task_id = $_POST['task_id'];
    $task = new Task;
    if($sub_table_id && $task_id){
      $task->set_sub_table_id($sub_table_id, $task_id);
    }
    die();
  }
}