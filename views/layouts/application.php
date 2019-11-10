<DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <title>Quản lý công việc</title>
	<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css'>
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/style.css">
	<script src="<?=URL_JS?>/jquery-3.4.1.min.js"></script>
	<script src="<?=URL_JS?>/bootstrap.min.js"></script>
	<script src="<?=URL_JS?>/jquery-ui.min.js"></script>
	<script src="<?=URL_JS?>/jquery.validate.min.js"></script>
	<?php if($_GET['controller']=='users'){?>
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/profile.css">
	<?php } ?>
  </head>
  <body>
  	<?php if ($_GET['controller']!='login') { require_once('models/user.php'); $cls_user = new User(); $user = $cls_user->get_one($_SESSION['userid']); ?>
  	<!-- /header -->
	<header class="header-table">
		<div class="header-left">
			<a href="#" title=""><i class="fa fa-home" aria-hidden="true"></i></a>
		</div>
		<div class="header-right">
			<a href="#" title=""><i class="fa fa-user" aria-hidden="true"></i></a>
			<a href="#" title="" class="avatar"><img src="<?=$user['image']?>" alt=""></a>

			<div class="main-popup popup-profile">
				<div class="main-popup-head">
					<span><?=$user['fullname']?></span>
				</div>
				<div class="main-popup-content">
					<ul>
						<li><a id="btn-profile" href="?controller=users&tab=profile-tab" title=""> <span>Hồ sơ hiển thị</span> </a></li>
						<li><a href="?controller=users&tab=operation-tab" title=""><span>Hoạt động</span></a></li>
						<li><a href="?controller=users&tab=setting-tab" title=""> <span>Cài đăt</span></a></li>
						<li><a id="btn-log-out" href="?controller=logout" title=""><span>Đăng xuất</span></a></li>
					</ul>
				</div>
			</div>
			<a href="#" title="" class="newtable"><i class="fa fa-plus" aria-hidden="true"></i></a>
			<div class="main-popup popup-newtable">
				<div class="main-popup-head">
					<span>Tạo bảng</span>
				</div>
				<div class="main-popup-content main-table">
					<ul>
						<li><a href="#" title="" class="add-table-icon"><i class="fa fa-trello" aria-hidden="true"></i><span>Tạo bảng...</span> <br> 
						Một bảng được tạo thành từ các thẻ được sắp xếp trong danh sách. Sử dụng bảng để quản lý các dự án, theo dõi thông tin, hoặc tổ chức bất cứ việc gì.</a></li>
						<li><a href="#" title=""><i class="fa fa-group" aria-hidden="true">  </i> <span>Tạo nhóm...</span>	<br>
						Một nhóm là tập hợp các bảng và mọi người. Sử dụng nhóm để tổ chức công ty của bạn, hỗ trợ người bận rộn, gia đình hoặc bạn bè.</a></li>
						
					</ul>
				</div>
			</div>
			<div class="main-popup popup-addtable">
				<div class="main-popup-head">
					<span>Thêm mới</span>
				</div>
				<div class="main-popup-content">
					<form action="?controller=tables&action=add_table" method="POST" enctype="multipart/form-data" >
						<!-- <input type="hidden" name="controller" value="tables">
						<input type="hidden" name="action" value="add_table"> -->
						<input type="text" name="name" placeholder="Thêm tiêu đề">
						<input type="file" name="image">
	  					<button class="btn-add-table" name="save-table" type="submit">Lưu</button>
					</form>
				</div>
			</div>
		</div>
	</header>
 	<?php } ?>
    <?= @$content ?>
  </body>
  <script src="<?=URL_JS?>/main.js"></script>
</html>
