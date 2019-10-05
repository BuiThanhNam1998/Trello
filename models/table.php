<?php
class Table
{
  private $id;
  private $name;
  private $status;
  private $image;

  function __construct($id, $name, $status, $image)
  {
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
    $this->image = $image;
  }

  static function all()
  {
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
}