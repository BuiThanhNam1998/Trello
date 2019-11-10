<?php
require_once('models\user.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["btn_login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $inputUser = new User();
    $result = $inputUser->trackUserLogin($username, $password);
    if ($result){
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result[0];
        $_SESSION['user_image']  = $result['image'];
        $_SESSION['fullname']  = $result['fullname'];
        // die($_SESSION['user_image']);
        header('Location: index.php?controller=tables');
    }
}

if (isset($_POST["btn_register"])){
    $inputUser = new User();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $image = URL_DEFAULT_IMAGE;
    $status = 1;
    $mess = 'success';

    if($inputUser->is_name_duplicate($username))
        $mess = 'warning';
    if($inputUser->is_email_duplicate($email))
        $mess = 'warning';

    if($mess == 'success'){
        $reg_info = ['username'=>$username, 'password'=>$password, 'email'=>$email, 'image'=>$image, 'status'=>$status];
        $inputUser->insert_one($reg_info);
    }
    
    header('Location: index.php?controller=login&message='.$mess);
}

?>
<!DOCTYPE html>
<html>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" type="text/css" href="layouts/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="layouts/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/style.css">
    <script src="<?=URL_JS?>/jquery-3.4.1.min.js"></script>
    <script src="<?=URL_JS?>/bootstrap.min.js"></script>
    <script src="<?=URL_JS?>/jquery-ui.min.js"></script>
    <script src="<?=URL_JS?>/jquery.validate.min.js"></script>
    <div class="login-page">
    <div class="form-login">
        <form class="register-form" method="POST">
            <input name="username" type="text" placeholder="User name" required>
            <input name="password" type="text" placeholder="Password" required>
            <input name="email" type="text" placeholder="Địa chỉ Email" required>
            <button name="btn_register" type="submit">Đăng ký</button>
            <p class="message">Bạn đã sẵn sàng Đăng nhập? <a href="#">Đăng nhập</a></p>
        </form>
        <form class="login-form" method="POST">
            <input name="username" type="text" placeholder="User name" required>
            <input name="password" type="password" placeholder="Password" required>
            <button name="btn_login" type="submit">đăng nhập</button>
            <p class="message">Bạn chưa có tài khoản? <a href="#">Đăng ký</a></p>
        </form>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".login-form").validate({
                rules:{
                    username:{
                      
                        required: true,
                        minlength:5,
                    },
                    password:{
    
                        required:true,
                        minlength:6,
                    }
                },
                messages:{
                   
                    username:{

                        required: "Vui lòng nhập User name",
                        minlength:"Vui lòng nhập ít nhất 5 ký tự",   
                    },
                    password:{
                        required: "Vui lòng nhập Password",
                        minlength:"Vui lòng nhập ít nhất 6 ký tự",
                    }
                }
            });
            $(".register-form").validate({
                rules:{
                    username:{
                        required: true,
                        minlength:5,
                        // remote:{
                        //     url: 'duplicateChecker.php',
                        //     dataType: 'post',
                        //     data: {
                        //         'username': $('#username').val()
                        //         'elem': 
                        //     },
                        //     success: function(data) {
                        //         if (data.username == 'found')
                        //         {
                        //         message: {
                        //                 username: 'The username is already in use!'
                        //             }
                        //         }
                        //     }
                        // }
                    },
                    password:{
    
                        required:true,
                        minlength:6,
                    },
                    email:{
                        required:true,
                        minlength:9,
                    }
                },

                //loi tuong ung voi moi rule
                messages:{
                   
                    username:{

                        required: "Vui lòng nhập User name",
                        minlength:"Vui lòng nhập ít nhất 5 ký tự",   
                    },
                    password:{
                        required: "Vui lòng nhập Password",
                        minlength:"Vui lòng nhập ít nhất 6 ký tự",
                    },
                    email:{
                        required:"Vui lòng nhập email",
                        minlength:"Vui lòng nhập đúng email",
                    }
                }
            });

            $('.message a').click(function(){
                $('form').animate({height:"toggle",opacity:"toggle"},"slow");
            });
        });
    </script>