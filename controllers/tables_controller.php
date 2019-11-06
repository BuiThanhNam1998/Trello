<?php
require_once('controllers/base_controller.php');
require_once('models/table.php');

class TablesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'tables';
  }

  public function index()
  {
    $uid = $_SESSION['userid'];
    $cls_table = new Table();
    $tables = $cls_table->get_by_user_id($uid);
    $data = array('tables' => $tables);
    $this->render('index', $data);
  }
  public function add_table()
  {
    $arr = $_POST;
    $cls_table = new Table();
    $cls_table->insert_one($arr);
  }
}