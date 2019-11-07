<?php
// echo '<ul>';
// foreach ($tables as $table) {
//   echo '<li>
//     <a href="#">' . $table->name . '</a>
//   </li>';
// }
// echo '</ul>';
require_once('models\table.php');
    if (isset($_POST['name'])){
		$tbl = new Table();
		$name = $_POST['name'];
		$image = URL_DEFAULT_TABLE_IMAGE;
		$inputTbl = ['name'=> $name, 'status'=> 1, 'image' => $image, 'user_id' => $_SESSION['userid']];
		$tbl->insert_one($inputTbl);
		Header( "Location: index.php?controller=tables" );
    }
?>
<body>
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
						<a href="?controller=sub_tables&table_id=<?=$table['id']?>" title="" class="thumb">
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
