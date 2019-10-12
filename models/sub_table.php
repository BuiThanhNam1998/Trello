<?php
require_once('basic.php');
require_once('task.php');
class SubTable{
  private $id;
  private $name;
  private $status;

  function __construct($id = null, $name = null, $status = null){
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
  }

  static function get_all($cons = ''){
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('select * from sub_tables ' . $cons);

    if($req){
      foreach ($req->fetchAll() as $item) {
        $list[] = new SubTable($item['id'], $item['name'], $item['status']);
      }
    }
    else{
      die('Error!');
    }
    return $list;
  }

  public function get_id(){
    return $this->id;
  }

  public function get_name(){
    return $this->name;
  }

  public function get_status(){
    return $this->status;
  }

  public static function get_table($table_id){
    $cons = 'where status != 0 ';
    if($table_id){
      $cons = $cons . ' and table_id = ' . $table_id;
    }
    return self::get_all($cons);
  }

  public function get_tasks(){
    $cons = 'select tasks.* from tasks inner join sub_tables on tasks.sub_table_id = sub_tables.id where status != 0 and sub_tables.table_id = '. $this->id;
    $list = [];
    $db = DB::getInstance();
    $req = $db->query($cons, PDO::FETCH_ASSOC);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $list[] = Task::create($item);
      }
    }
    else{
      die('Error!');
    }
    return $list;
  }

}