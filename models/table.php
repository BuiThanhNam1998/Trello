<?php
require_once('basic.php');
require_once('task.php');
class Table extends Basic{

  function __construct(){
    $this->table = 'tables';
  }

  public function get_by_user_id($user_id){
    if(!$user_id) return false;
    else{
      $list = [];
      $cons = 'select * from '.$this->table.' where status > 0 and user_id = '.$user_id;
      $db = DB::getInstance();
      $req = $db->query($cons);
      if($req){
        foreach ($req->fetchAll() as $item) {
          $list[] = $item;
        }
        return $list;
      }
    return false;
    }
  }

  public function get_tasks($id){
    $list = [];
    $cons = 'select tasks.* from tasks inner join sub_tables inner join tables on tasks.sub_table_id = sub_tables.id and sub_tables.table_id = tables.id where tables.id = ' . $id;
    $db = DB::getInstance();
    $req = $db->query($cons);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $list[] = $item;
      }
      return $list;
    }
    return false;
  }

  public function get_sub_tables($id){
    $list = [];
    $cons = 'select * from sub_tables where status > 0 and table_id = ' . $id;
    $db = DB::getInstance();
    $req = $db->query($cons);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $list[] = $item;
      }
      return $list;
    }
    return false;
  }

}