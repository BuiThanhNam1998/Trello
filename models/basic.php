<?php 
class Basic{
	function getOne($id){
		if(!$id){
			return false;
		}
		else{
			$db = DB::getInstance();
			$cons = 'where id = ' . $id;
    		$req = $db->query('select * from' . $this.table  . $cons);
		}
	}
}