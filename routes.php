<?php
$controllers = array(
  'pages' => ['home', 'error'],
  'tables' => ['index', 'add_table'],
  'login' => ['index'],
  'tables' => ['index', 'add_table'],
  'sub_tables' => ['index', 'add_sub_table', 'delete_sub_table'],
  'tasks' => ['index', 'set_sub_table', 'add_task'],
  'users' => ['index','update_user','update_pass'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  	$controller = 'pages';
  	$action = 'error';
}

// Kiểm tra xem đã đăng nhập chưa, nêu chưa thì trở lại page login

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();