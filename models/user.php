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
	    }
	    $result = array_shift($result);
	    if(empty($result)){
	    	return false;
	    }
	    return $result;
    }
  	public function is_name_duplicate($value){
  		if (!$value) return false;
  		$db = DB::getInstance();
  		$arr = $db->query('select * from '.$this->table.' where username = "'.$value.'"');
  		$result = [];
	    foreach ($arr->fetchAll() as $item){
	    	$result[]=$item;
	    }
	    $result = array_shift($result);
	    if(!empty($result)){
	    	return true;
	    }
	    return false;
  	}
  	public function is_email_duplicate($value){
  		if (!$value) return false;
  		$db = DB::getInstance();
  		$arr = $db->query('select * from '.$this->table.' where email = "'.$value.'"');
  		$result = [];
	    foreach ($arr->fetchAll() as $item){
	    	$result[]=$item;
	    }
	    $result = array_shift($result);
	    if(!empty($result)){
	    	return true;
	    }
	    return false;
  	}

  	public function get_tasks($id){
  		if(!$id);
  	}
  	public function get_tables($id){

  	}

}
?>