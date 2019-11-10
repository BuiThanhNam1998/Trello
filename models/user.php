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

  	public function get_tasks($user_id){
  		if(!$user_id){
  			return false;
  		}else{
		  	$list = [];
		    $cls_task = new Task();
		    $cons = 'select task_id from tasks_users where user_id = '. $user_id;
		    $db = DB::getInstance();
		    $req = $db->query($cons);
		    if($req){
		      	foreach ($req->fetchAll() as $item) {
		        	$id = $item['task_id'];
		        	$one = $cls_task->get_one($id);
		        	$list[] = $one;
		      	}

		     	return $list;
		    }
		    return false;
		}
  	}

  	public function get_sub_tables($user_id){
  		if(!$user_id){
  			return false;
  		}else{
  			$cls_user = new User();
  			$tasks = $cls_user->getTask($user_id);
  		}
  	}

  	public function get_tables($user_id){
  		if(!$user_id){
  			return false;
  		}
  		else{
  			$list = [];
  			$cons = 'SELECT tables.* FROM tables INNER JOIN sub_tables INNER JOIN tasks INNER JOIN tasks_users ON tables.id = sub_tables.table_id AND sub_tables.id = tasks.sub_table_id AND tasks.id = tasks_users.task_id WHERE tasks_users.user_id = '.$user_id.' AND tables.status > 0 GROUP BY tables.id';
  			$db = DB::getInstance();
		    $req = $db->query($cons);
		    if($req){
		      	foreach ($req->fetchAll() as $item) {
		        	$list[] = $item;
		      	}
		     	return $list;
		    }
		    return false;
  		}
  	}

  	public function get_tables_1($user_id){
  		if(!$user_id){
  			return false;
  		}
  		else{
  			$list = [];
  			$cons = 'select * from tables where status > 0 and user_id = ' . $user_id;
  			$db = DB::getInstance();
		    $req = $db->query($cons);
		    if($req){
		      	foreach ($req->fetchAll() as $item) {
		        	$list[] = $item;
		      	}
		     	return $list;
		    }
		    return false;
  		}
  	}

}
?>