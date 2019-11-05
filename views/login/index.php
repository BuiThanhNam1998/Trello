<?php
include_once('models\user.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["btn_login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $inputUserData = new user;
    $result = $inputUserData->trackUserLogin($username, $password);
    if ($result){
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result[0];
        print_r($_SESSION);
        header('Location: index.php?controller=tables');
    }
}

?>
<!DOCTYPE html>
<html>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" type="text/css" href="layouts/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="layouts/css/login.css">
    <div class="login-page">
    <div class="form-login">
        <form class="register-form">
            <input name="username" type="text" placeholder="User name" required>
            <input name="password" type="text" placeholder="Password" required>
            <input name="email" type="text" placeholder="Địa chỉ Email" required>
            <button>Đăng ký</button>
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
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
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
<?php?>