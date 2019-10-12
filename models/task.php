<?php
require_once('basic.php');
class Task
{
  private $id;
  private $name;
  private $status;
  private $description;
  private $image;
  private $label;
  private $sub_table_id;
  private $date_start;
  private $date_finish;

  function __construct($id = null , $name = null , $description = null, $image = null, $label  =null, $status = null, $date_start = null , $date_finish = null){
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
    $this->description = $description;
    $this->image = $image;
    $this->label = $label;
    $this->date_start = $date_start;
    $this->date_finish = $date_finish;
  }
  public static function create(array $data){
    $instance = new self();
    foreach($data as $key => $pro){
      $instance->$key = $pro;
    }
    return $instance;
  }
  static function get_all($cons = ''){
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('select * from tasks ' . $cons);

    if($req){
      foreach ($req->fetchAll() as $item) {
        $list[] = new SubTable($item['id'], $item['name'], $item['status'], $item['description'], $item['image'], $item['label'], $item['date_start'], $item['finish_date']);
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
  public function get_sub_table_id(){
    return $this->sub_table_id;
  }
  public static function get_table($table_id){
    $cons = 'where status != 0 ';
    if($table_id){
      $cons = $cons . ' and table_id = ' . $table_id;
    }
    return self::get_all($cons);
  }
  public static function set_sub_table_id($sub_table_id, $task_id){
    $cons = 'update tasks set sub_table_id = ' . $sub_table_id . ' where id = ' . $task_id;
    $db = DB::getInstance();
    $req = $db->query($cons);
    die('a');
  }
}