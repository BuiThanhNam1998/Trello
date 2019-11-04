<?php 
class Basic{
	// private $table;
	static function get_all($cons = ''){
	    $list = [];
	    $db = DB::getInstance();
	    $req = $db->query('select * from ' . $this->table . $cons);

	    if($req){
	      foreach ($req->fetchAll() as $item) {
	        $list[] = new $item;
	      }
	    }
	    else{
	      die('Error!');
	    }
	    return $list;
  	}

  	public function get_one($id){
	    if(!$id) return false;
	    $db = DB::getInstance(); 
	    $cons = 'select * from '. $this->table. ' where id = ' . $id .' limit 1';
	    $arr = $db->query($cons);
	    if($arr){
	    	$result = [];
		    foreach ($arr->fetchAll() as $item) {
		      $result[] = $item;
		    }
		    $result = array_shift($result);
		    return $result;
	    }
	    else{
	    	return false;
	    }
  	}

  	public function insert_one($array){
	    if(!is_array($array)) return false;
	    if($array) 
	      $field = '';
	      $value = '';
	      foreach($array as $key=>$val) {
	        if(!$field) $field=$key;
	        else $field.=','.$key;
	        if(!$value) $value='"'.addslashes($val).'"';
	        else $value.=',"'.addslashes($val).'"';
	      }
	    $db = DB::getInstance();
	    $db->query('insert into '.$this->table.' ('.$field.') VALUES('.$value.')');
	}
	

 	public function get_one_special($special){
	    if(!$special) return false;
	    $db = DB::getInstance(); 
	    $cons = 'select * from '.$this->table.' where special = '.$special;
	    $arr = $db->query($cons);
	    $result = [];
	    if($arr)
	{
	    
	    foreach ($arr->fetchAll() as $item) {
	      $result[] = $item;
	    }
	    $result = array_shift($result);
	}
	    
	    return $result;
  	}
}