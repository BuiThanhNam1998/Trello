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
	//logout
	$('#btn-log-out').click(function(e){
		window.location.replace("index.php?controller=logout");
	});
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
