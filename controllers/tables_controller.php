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
    $cls_user = new User();
    $tables_1 = $cls_user->get_tables($uid);
    $tables_2 = $cls_user->get_tables_1($uid);
    $tables = array_unique(array_merge($tables_1, $tables_2), SORT_REGULAR);
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