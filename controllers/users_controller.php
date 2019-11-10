<?php 
require_once('controllers/base_controller.php');
require_once('models/sub_table.php');
require_once('models/table.php');
require_once('models/task.php');
require_once('models/user.php');

class UsersController extends BaseController
{
  function __construct(){
    $this->folder = 'users';
  }

  public function index(){
    $user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
    if($user_id){
    	$cls_user = new User();
    	$user = $cls_user->get_one($user_id);
    	$data= array('user' =>$user);
    	$this->render('index', $data);
    }

    
    else{
      $this->render('error');
    }
  }

  public function update_user(){
    $cls_user = new User();
    $id = $_POST['id'];
    unset($_POST['id']);
    if(isset($_POST['save']))
          {

            if (isset($_FILES['avatar'])) {

              
              if($_FILES['avatar']['error']> 0)
              {
                echo("File bị lỗi");
              }
              else{
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/images/'. $_FILES['avatar']['name']);
                $_POST['image'] = 'assets/images/'. $_FILES['avatar']['name'];
                // echo "Ảnh đã được câp nhật";
              }
            }
            else{
              echo("Bạn chưa chọn file để upload");
            }
          }
    unset($_POST['save']);
          
    $cls_user->update_one($id, $_POST);

    header("Location: http://localhost:81/trello/index.php?controller=users");
  }

}
 ?>