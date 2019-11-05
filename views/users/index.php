<!DOCTYPE html>
<html>
<head>
	<title>Quản lý Hồ sơ cá nhân</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/profile.css">
</head>
<body>
	<!-- /Header -->
<header>
	<div class="header-left">
		<a href="#" title=""><i class="fa fa-home" aria-hidden="true"></i></a>
		<a  href="#" title=""><i class="fa fa-clipboard" aria-hidden="true">Bảng</i></a>
		<a href="#"><input type="search" name="" style="background :#026aa7;"></a>		
		<a href="#" title=""><i class="fa fa-search" aria-hidden="true"></i></a>	
	</div>

	<div class="header-right">
		<a href="#" title=""><i class="fa fa-plus" aria-hidden="true"></i></a>
		<a href="#" title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a>
		<a href="#" title=""><i class="fa fa-bell" aria-hidden="true"></i></a>
		<img src="images/profile.jpg" class="rounded img-profile">
	</div>
</header>
	<!-- /content -->
	<div class="content" tabindex="-1">
		<div class="content-header">
			<h2><?= $user['username'] ?></h2>
			<p><?= $user['email']?></p>
		</div>
	</div>
		<div class="banner">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#1" >Tab 1</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#2" >Tab 2</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#3" >Tab 3</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#4" >Tab 4</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#5" >Tab 5</a></li>
			</ul>	
		</div>
			<div class="tab-content">
				
				<div id="1" class="tab-pane container active main-profile-container">
					<div class="main-content-wrapper">
				<div class="main-content">
					<img  src="<?=URL_IMAGES?>/content-1.jpg">
					<h1 class="title-profile-main-text">Manage Your Personal Information</h1>
					<p class="detail-text">Control which information people see and Power-Ups may access. To learn more, view our Terms of Service or Privacy Policy.</p>
					<h3>About</h3>
					<hr/>

					<form class="form-style" method="POST" action="?controller=users&action=update_user">
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
						<button class="save-button" type="submit">Save</button>
						</div>
						

						<div class="img-avatar">
							<span>Avatar</span>
							<img src="<?=URL_IMAGES?>/shiba-p.jpg">
						</div>

					</form>
						
						<h3>Contact</h3>
						<hr/>

						<div>
							<span>Email Address</span>
						</div>
						<div class="title-user-profile">
						<input type="text" name="email" class="text-field" value="<?=$user['email']?>" >
						</div>
						<button style="display: block;">Change or add email</button>
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
	<!-- <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.validate.min.js"></script> -->
	<script type="text/javascript">
		$(document).ready(function($) {
			$(".form-style").validate({
				
			rule: {
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

				


			message: {
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
			}
			});
		});
	</script>
</body>
</html>