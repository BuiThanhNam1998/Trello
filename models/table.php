<?php
require_once('task.php');
class Table{
  private $id;
  private $name;
  private $status;
  private $image;

  function __construct($id = null, $name = null, $status = null, $image = null){
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
    $this->image = $image;
  }

  static function get_all(){
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM tables');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Table($item['id'], $item['name'], $item['status'], $item['image']);
    }
    return $list;
  }
  public function get_name(){
    return $this->name;
  }
  public function get_image(){
    return $this->image;
  }
  public function get_status(){
    return $this->status;
  }
  public function get_one($id){
    $cons = '';
    if($id){
      $cons = ' where status != 0 and id = ' . $id . ' limit 1';
    }
    $one = [];
    $db = DB::getInstance();
    $req = $db->query('select * from tables ' . $cons);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $one[] = new Table($item['id'], $item['name'], $item['status'], $item['image']);
      }
      $one = array_shift($one);
      return $one;
    }
    return false;
  }
  
  public function get_tasks(){
    $list = [];
    $cons = 'select tasks.* from tasks inner join sub_tables inner join tables on tasks.sub_table_id = sub_tables.id and sub_tables.table_id = tables.id where tables.id = ' . $this->id;
    $db = DB::getInstance();
    $req = $db->query($cons, PDO::FETCH_ASSOC);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $list[] = Task::create($item);
      }
      return $list;
    }
    return false;
  }
}