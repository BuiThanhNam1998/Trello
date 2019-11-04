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

  // public function index(){
  //   $table_id = isset($_GET['table_id']) ? $_GET['table_id'] : '';
  //   if($table_id){
  //     $cls_table = new Table();
  //     $table = $cls_table->get_one($table_id);
  //     $sub_tables = SubTable::get_table($table_id); 
  //     $data = array('sub_tables' => $sub_tables, 'table' => $table);
  //     $this->render('index', $data);
  //   }
  //   else{
  //     $this->render('error');
  //   }
  // }

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

  public function add_task(){
    $arr = $_POST;
    $special = time().rand(10, 99);
    $arr['special'] = $special;
    $cls_task = new Task();
    $cls_task->insert_one($arr);

    $task = $cls_task->get_one_special($special);
    $users = $cls_task->get_users($task['id']);
    if($task){
    echo '<div class="draggable ui-draggable ui-draggable-handle" data-id="'.$task['id'].'">
            <div class="main-task" data-toggle="modal" data-target="'.$task['id'].'">';
            if($task['image']){
              echo 
              '<img src="'.WEB_DOMAIN.$task['image'].'" alt="" class="fix-image">';
              }
              echo
              '<p class="main-task-title">'.$task['name'].'</p>
              <div class="main-task-action">';
                if($task['date_finish']) echo '
                <span class="main-task-finish"><i class="fa fa-clock-o" aria-hidden="true"></i>'.$task['date_finish'].'</span>
              </div>
              </div>

              <div class="main-task-users">
              </div>
            </div>
          </div>';
    }
  }
}