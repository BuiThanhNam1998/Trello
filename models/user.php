<?php 
require_once('basic.php');
class User extends Basic{
  function __construct(){
    $this->table = 'users';
  }

}
?>