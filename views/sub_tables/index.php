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
			<h4 class="table-breadcrumb-title"><?=$table->get_name()?></h4>
		</section>
		<!-- content -->
		<section class="main-content-table">
			<?php foreach($sub_tables as $key => $sub_table){ ?>
			<div class="main-table-item">
				<div class="main-table-item-title">
					<span><?=$sub_table->get_name()?></span>
				</div>
				<div class="main-table-item-content droppable" data-id="<?=$sub_table->get_id()?>">
					<?php foreach($tasks as $task){ if($task->get_sub_table_id() == $sub_table->get_id()){?>
					<div class="draggable" data-id="<?=$task->get_id()?>">
						<div class="main-task" data-toggle="modal" data-target="#myModal">
							<p class="main-task-title"><?=$task->get_name()?></p>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
			<?php } ?>
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
		//drag-drop
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
					task_id = ui.draggable.data('id');
					sub_table_id = $(this).data('id');
					d = new Date();

					$.post('http://localhost/trello/index.php?controller=tasks&action=set_sub_table', {'sub_table_id': sub_table_id, 'task_id' : task_id, 'v': d.getSeconds() }, function (data) {
		                console.log('ok');
		            }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?
		                alert(thrownError); //alert with HTTP error
		            })

	      		}
	    	});
	  	});
	  	//
	 </script>
</body>
</html>