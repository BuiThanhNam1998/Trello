<?php
require_once('basic.php');
require_once('task.php');
class SubTable extends Basic{
  function __construct($id = null, $name = null, $status = null){
    $this->table = 'sub_tables';
  }

  public static function get_by_table($table_id){
    $cons = 'where status != 0 ';
    if($table_id){
      $cons = $cons . ' and table_id = ' . $table_id;
    }
    return self::get_all($cons);
  }

  public function get_tasks($id){
    $cons = 'select * from tasks where sub_table_id = '.$id;
    $list = [];
    $db = DB::getInstance();
    $req = $db->query($cons);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $list[] = $item;
      }
    }
    else{
      die('Error!');
    }
    return $list;
  }

}