<?php
require_once('controllers/base_controller.php');
require_once('models/sub_table.php');
require_once('models/table.php');

class SubTablesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'sub_tables';
  }

  public function index()
  {
    $table_id = isset($_GET['table_id']) ? $_GET['table_id'] : '';
    if($table_id){
      $sub_tables = SubTable::get_table($table_id); 
      $data = array('sub_tables' => $sub_tables, 'table_id' => $table_id);
      $this->render('index', $data);
    }
    else{
      $this->render('error');
    }
  }
}