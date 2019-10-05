<?php
require_once('basic.php');
class SubTable extends Basic
{
  private $id;
  private $name;
  private $status;

  function __construct($id, $name, $status)
  {
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
    $this->talbe = 'sub_tables';
  }

  static function get_all($cons = '')
  {
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
}