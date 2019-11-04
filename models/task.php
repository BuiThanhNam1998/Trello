<?php
require_once('basic.php');
require_once('user.php');
class Task extends Basic{

  function __construct(){
    $this->table = 'tasks';
  }

  public static function set_sub_table_id($sub_table_id, $task_id){
    $cons = 'update tasks set sub_table_id = ' . $sub_table_id . ' where id = ' . $task_id;
    $db = DB::getInstance();
    $req = $db->query($cons);
  }

  public function get_users($task_id){
    $list = [];
    $cls_user = new User();
    $cons = 'select user_id from tasks_users where task_id = '. $task_id;
    $db = DB::getInstance();
    $req = $db->query($cons);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $id = $item['user_id'];
        $one = $cls_user->get_one($id);
        $list[] = $one;
      }

      return $list;
    }
    return false;
  }

}