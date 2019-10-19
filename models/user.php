<?php 
class User{
  private $id;
  private $username;
  private $status;
  private $password;
function __construct($id = null, $username = null, $status = null, $password = null){
    $this->id = $id;
    $this->username = $username;
    $this->status = $status;
    $this->password = $password;
  }
 static function get_all(){
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM users');

    foreach ($req->fetchAll() as $item) {
      $list[] = new User($item['id'], $item['username'], $item['status'], $item['password']);
    }
    return $list;
  }
  public function get_username(){
    return $this->username;
  }
  public function get_password(){
    return $this->password;
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
    $req = $db->query('select * from users ' . $cons);
    if($req){
      foreach ($req->fetchAll() as $item) {
        $one[] = new User($item['id'], $item['username'], $item['status'], $item['password']);
      }
      $one = array_shift($one);
      return $one;
    }
    return false;
  }
  


}
 ?>