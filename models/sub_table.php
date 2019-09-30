<?php
class SubTable
{
  private $id;
  private $name;
  private $status;

  function __construct($id, $name, $status)
  {
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM sub_tables');

    foreach ($req->fetchAll() as $item) {
      $list[] = new SubTable($item['id'], $item['name'], $item['status']);
    }

    return $list;
  }
  public function get_name(){
    return $this->name;
  }
  public function get_status(){
    return $this->status;
  }
}