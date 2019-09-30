<?php
require_once('controllers/base_controller.php');
require_once('models/sub_table.php');

class SubTablesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'sub_tables';
  }

  public function index()
  {
    $sub_tables = SubTable::all();
    $data = array('sub_tables' => $sub_tables);
    $this->render('index', $data);
  }
}