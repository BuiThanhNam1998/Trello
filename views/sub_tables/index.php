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
			<a href="#" title="">Bùi Thanh Nam</a>
		</div>
	</header>
	<section class="main-wrap">
		<!-- breadcrumb -->
		<section class="table-breadcrumb">
			<h4 class="table-breadcrumb-title">Bài tập web tuần 1 <?=$table_id?></h4>
		</section>
		<!-- content -->
		<section class="main-content-table">
			<?php foreach($sub_tables as $key => $sub_table){ ?>
			<div class="main-table-item">
				<div class="main-table-item-title">
					<span><?=$sub_table->get_name();?></span>
				</div>
				<div class="main-table-item-content droppable">
					<div class="draggable">
						<div class="main-task" data-toggle="modal" data-target="#myModal">
							<p class="main-task-title">Thiết kế giao diện</p>
						</div>
					</div>

					<div class="draggable">
						<div class="main-task">
							<p class="main-task-title">Tạo database</p>
						</div>
					</div>

					<div class="draggable">
						<div class="main-task">
							<p class="main-task-title">Code Backend</p>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>

			<!-- <div class="main-table-item">
				<div class="main-table-item-title">
					<span>Hoàn thành</span>
				</div>
				<div class="main-table-item-content droppable">
					<div class="draggable">
						<div class="main-task">
							<p class="main-task-title">Thiết kế chức năng</p>
						</div>
					</div>
					<div class="draggable">
						<div class="main-task">
							<p class="main-task-title">Thiết kế database</p>
						</div>
					</div>
				</div>
			</div> -->
		</section>
	</section>

	<div class="modal fade" id="myModal">
	    <div class="modal-dialog">
	      	<div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          	<h4 class="modal-title">Modal Heading</h4>
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	          Modal body..
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        </div>
	        
	      </div>
	    </div>
	</div>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script>
	  	$( function() {
		    $(".draggable").draggable({
		    	revert: "invalid",
		    });
		    $(".droppable").droppable({
		      	drop: function( event, ui ) {
		      			ui.draggable.fadeOut();
		      			mainTask = '<div class="draggable">' + ui.draggable.html() + '</div>';
						$(this).append(mainTask);
						$('.draggable').draggable();
		      		}
		    	});
		  	});
	 </script>
</body>
</html>