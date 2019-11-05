<?php
// echo '<ul>';
// foreach ($tables as $table) {
//   echo '<li>
//     <a href="#">' . $table->name . '</a>
//   </li>';
// }
// echo '</ul>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý công việc</title>
	<meta charset="UTF-8">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<!-- /header -->
	<header class="header-table">
	<div class="header-left">
		<a href="#" title=""><i class="fa fa-home" aria-hidden="true"></i></a>
	</div>
	<div class="header-right">
		<a href="#" title=""><i class="fa fa-user" aria-hidden="true"></i></a>
		<a href="#" title="" class="avatar"><img src="<?=URL_IMAGES?>/image_03.jpg" alt=""></a>

		<div class="main-popup popup-profile">
			<div class="main-popup-head">
				<span>Bùi Thanh Nam</span>
			</div>
			<div class="main-popup-content">
				<ul>
					<li><a href="#" title="">Hồ sơ hiển thị</a></li>
					<li><a href="#" title="">Hoạt động</a></li>
					<li><a href="#" title="">Cài đăt</a></li>
					<li><a href="#" title="">Đăng xuất</a></li>
				</ul>
			</div>
		</div>
		<a href="#" title="" class="newtable"><i class="fa fa-plus" aria-hidden="true"></i></a>
		<div class="main-popup popup-newtable">
			<div class="main-popup-head">
				<span>Tạo bảng</span>
			</div>
			<div class="main-popup-content">
				<ul>
					<li><a href="#" title="" class="add-table-icon"><i class="fa fa-trello" aria-hidden="true">Tạo bảng...</i> <br> 
					Một bảng được tạo thành từ các thẻ được sắp xếp trong danh sách. Sử dụng bảng để quản lý các dự án, theo dõi thông tin, hoặc tổ chức bất cứ việc gì.</a></li>
					<li><a href="#" title=""><i class="fa fa-group" aria-hidden="true">Tạo nhóm...</i> 	<br>
					Một nhóm là tập hợp các bảng và mọi người. Sử dụng nhóm để tổ chức công ty của bạn, hỗ trợ người bận rộn, gia đình hoặc bạn bè.</a></li>
					
				</ul>
			</div>
		</div>
		<div class="main-popup popup-addtable">
			<div class="main-popup-head">
				<span>Thêm mới</span>
			</div>
			<div class="main-popup-content">
				<form action="" method="post">
					<input type="hidden" name="controller" value="tables">
					<input type="hidden" name="action" value="add_table">
					<input type="text" name="name" placeholder="Thêm tiêu đề">
					<input type="hidden" name="image" value="123">
  					<button  class="btn-add-table" type="submit">Lưu</button>
				</form>
			</div>
		</div>

	</div>
</header>
	<!-- content -->
	<section class="main-content-home">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="main-content-home-title"><i class="fa fa-list" aria-hidden="true"></i> Danh sách công việc</h3>
				</div>
			</div>
			<div class="row">
				<?php foreach($tables as $key => $table){ ?>
				<div class="col-lg-3">
					<div class="table-item">
						<a href="#" title="" class="thumb">
							<img src="<?=$table['image']?>" alt="" class="fix-image">
						</a>
						<a href="#" title="" class="table-item-title"><?=$table['name']?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
<script>
	// profile
	$('.avatar').click(function(){
		$('.popup-profile').toggle();
	});
	$(document).click(function(e){
		if (! $('.avatar').is(e.target) && $('.avatar').has(e.target).length === 0){
	        $('.popup-profile').hide();
	    }
	})
	$(document).click(function(e){
		if (! $('.avatar').is(e.target) && $('.avatar').has(e.target).length === 0){
	        $('.popup-profile').hide();
	    }
	})
	//newtable
	$('.btn-add-table').click(function(){

	});
	$('.add-table-icon').click(function(){
		$('.popup-addtable').toggle();
	});
	$('.newtable').click(function(){
		$('.popup-newtable').toggle();
	});
	$(document).click(function(e){
		if (! $('.newtable').is(e.target) && $('.newtable').has(e.target).length === 0){
	        $('.popup-newtable').hide();
	    }
	})
	$(document).click(function(e){
		if (! $('.newtable').is(e.target) && $('.newtable').has(e.target).length === 0){
	        $('.popup-newtable').hide();
	    }
	})
	// menu table
	$('.table-item-menu-icon').click(function(e){
		$(this).parent().parent().find('.popup-menu-table').toggle();
	});
	$(document).click(function(e){
		if (! $('.table-item-menu-icon').is(e.target) && $('.table-item-menu-icon').has(e.target).length === 0){
	        $('.popup-menu-table').hide();
	    }
	})

</script>
</body>
</html>