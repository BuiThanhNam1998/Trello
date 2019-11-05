<?php 
require_once('basic.php');
class User extends Basic{
  function __construct(){
    $this->table = 'users';
  }
  public function trackUserLogin($name, $password){
        if(!$name || !$password) return false;
        $db = DB::getInstance();
	    $cons = 'select * from '.$this->table.' where username = "'.$name.'" and password = "'.$password.'" limit 1';
	    $arr = $db->query($cons);
	    $result = [];
	    foreach ($arr->fetchAll() as $item){
	    	$result[]=$item;
	    	print_r($item);
	    }
	    if(empty($result)){
	    	return false;
	    }
	    return true;
    }
}
?>