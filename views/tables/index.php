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
	<header>
		<div class="header-left">
			<a href="#" title=""><i class="fa fa-home" aria-hidden="true"></i></a>
		</div>
		<div class="header-right">
			<a href="#" title=""><i class="fa fa-user" aria-hidden="true"></i></a>
			<a href="#" title="">Bùi Thanh Nam</a>
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
							<img src="<?=$table->get_image()?>" alt="" class="fix-image">
						</a>
						<a href="#" title="" class="table-item-title"><?=$table->get_name()?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>