<!DOCTYPE html>
<html>
<body>
	<!-- /Header -->
	<!-- /content -->
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/profile.css">
	<div class="content" tabindex="-1">
		<div class="content-header">
			<h2><?= $user['username'] ?></h2>
			<p><?= $user['email']?></p>
		</div>
	</div>
		<div class="banner">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#1" >Hồ Sơ và Hiển Thị</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#2" >Hoạt động</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#3" >Thẻ</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#4" >Setting</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#5" >Premium</a></li>
			</ul>	
		</div>
			<div class="tab-content">
				
				<div id="1" class="tab-pane container active main-profile-container">
					<div class="main-content-wrapper">
				<div class="main-content">
					<img  src="<?=URL_IMAGES?>/banner-pictures.jpg">
					<h1 class="title-profile-main-text">Quản lý thông tin cá nhân của bạn</h1>
					<p class="detail-text">Control which information people see and Power-Ups may access. To learn more, view our Terms of Service or Privacy Policy.</p>
					<h3>Thông tin</h3>
					<hr/>
					

				<form class="form-style" method="POST" action="?controller=users&action=update_user" enctype="multipart/form-data">
						<input type="hidden" value="<?=$user['id']?>" name="id">
						<div class="form-style-info">
						<div class="title-user-profile">
						<span>Full Name</span>
						<span><i class="fa fa-globe" aria-hidden="true" ></i> Always Public</span>
						</div>
						<div>
							<input type="text" name="fullname" id="fullname" class="text-field" value="<?=$user['fullname']?>">
						</div>

						<div class="title-user-profile">
						<span>Address</span>
						<span><i class="fa fa-globe" aria-hidden="true"></i> Always Public</span>
						</div>
						<div>
							<input type="text" name="address" class="text-field" value="<?=$user['address']?>">
						</div>	

						<div class="title-user-profile">
						<span>Username</span>
						<span><i class="fa fa-globe" aria-hidden="true"></i> Always Public</span>
						</div>
						<div>
							<input type="text" name="username" class="text-field" value="<?=$user['username']?>">
						</div>

						<div class="title-user-profile">
						<span>Bio</span>
						<span><i class="fa fa-globe" name="bio" aria-hidden="true" ></i> Always Public</span>
						</div>
						<div>
							<textarea><?=$user['bio']?></textarea>
						</div>
						<button class="save-button" type="submit" name="save">Save</button>
						</div>
						

						<div class="img-avatar">
							<span>Avatar</span>
							<br>
							<img src="<?=$user['image']?>">
							<input id="avatar" type="file" name="avatar">
						</div>

					</form>
						

						<h3>Contact</h3>
						<hr/>

						<div>
							<span>Email Address</span>
						</div>
						<div class="title-user-profile">	
						<input type="text" name="email" class="text-field" value="<?=$user['email']?>">
						</div>
						<button style="display: block;" class="change-email-button">Change or add email</button>
				</div>
		</div>
				</div>

				


				<div id="2" class="tab-pane container">
					<h2> A@###########</h2>
					<p>skafjlasfffffffkasfjklasfljkasfjlkasljkfasjlkfsajlkflasjkfjlkasfjlk</p>
				</div>

				<div id="3" class="tab-pane container">
					<h2> ($$(($$$($(</h2>
					<p>skafjlasfffffffkasfjklasfljkasfjlkasljkfasjlkfsajlkflasjkfjlkasfjlk</p>
				</div>

				<div id="4" class="tab-pane container">
					<h2> 123455678</h2>
					<p>skafjlasfffffffkasfjklasfljkasfjlkasljkfasjlkfsajlkflasjkfjlkasfjlk</p>
				</div>

				<div id="5" class="tab-pane container">
					<h2> //////////////////////////////////</h2>
					<p>skafjlasfffffffkasfjklasfljkasfjlkasljkfasjlkfsajlkflasjkfjlkasfjlk</p>
				</div>

			</div>
		<!--Main Content-->
</div>	
	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			$(".form-style").validate({
			rules: {
				//fullname tu 6- 20 ki tu
				fullname:
				{
					required : true,
					minlength: 6,
					maxlength: 50
				},

				//address khong duoc de trong
				address:
				{
						required : true
				},

				username:
				{
					required : true,
					minlength: 6,
					maxlength: 20
				},

				},

			messages: {
					fullname:
						{
							required : "You must type Full name",
							minlength: "Your fullname must be more than 6",
							maxlength: "Your fullname must be less than 50",
							
						},
					
					address:
						{
							required : "You must type Address"
						},	

					
					username:
						{
							required : "You must type User name",
							minlength: "Your username must be more than 6",
							maxlength: "Your username must be less than 20"
					
						},

				}
			});
		});
	</script>
</body>
</html>