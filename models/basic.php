<?php 
class Basic{
	// private $table;
	public function get_all($cons = ''){
	    $list = [];
	    $db = DB::getInstance();
	    $req = $db->query('select * from ' . $this->table . $cons);

	    if($req){
	      	foreach ($req->fetchAll() as $item) {
        		$list[] = $item;
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
	    if($arr){
	    
		    foreach ($arr->fetchAll() as $item) {
		      $result[] = $item;
		    }
		    $result = array_shift($result);
		}
	    
	    return $result;
  	}

  	function update_one($id, $array) {
  		if (!is_array($array)) 
  			return false;
  		// $oneItem = $this->getCache($key_cache); 
  		// $exists_cache = false; 
  		// if($oneItem) { 
  		// 	$exists_cache = true; 
  		// 	if($oneItem=='null') $oneItem = array();
  		// } 
  		$oneItem = array();
  		$value=''; 
  		if ($array)foreach($array as $key => $val) {
  			if (!$value) $value = $key . '="' . addslashes($val) . '"';
  			else $value.= ',' . $key . '="' . addslashes($val) . '"';
  			$oneItem[$key] = $val;
  		}
  		$db = DB::getInstance(); 
  		$db->query('UPDATE '.$this->table.' SET '.$value.' WHERE id = '.$id);
  	}
}