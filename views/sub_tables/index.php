<!DOCTYPE html>
<html>
<head>
	<title>Quản lý công việc</title>
	<meta charset="UTF-8">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css'>
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_CSS?>/style.css">
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
			<!-- danh sach cac sub table -->
			<?php foreach($sub_tables as $key => $sub_table){ ?>
			<div class="main-table-item">
				<div class="main-table-item-title">
					<span><?=$sub_table->get_name()?></span>
				</div>

				<div class="main-table-item-content droppable" data-id="<?=$sub_table->get_id()?>">
					<!-- danh sach cac task trong sub table -->
					<?php foreach($tasks as $task){ if($task->get_sub_table_id() == $sub_table->get_id()){ $users = $task->get_user($task->get_id());?>
					<div class="draggable" data-id="<?=$task->get_id()?>">
						<div class="main-task" data-toggle="modal" data-target="#task<?=$task->get_id()?>">
							<!-- anh cua task -->
							<?php if($task->get_image()){?>
							<img src="http://localhost:81/trello<?=$task->get_image()?>" alt="" class="fix-image">
							<?php } ?>
							<!-- ten cua task -->
							<p class="main-task-title"><?=$task->get_name()?></p>
							<div class="main-task-action">
								<!-- ngay ket thuc cuar task -->
								<?php if($task->get_date_finish()){ ?>
								<span class="main-task-finish"><i class="fa fa-clock-o" aria-hidden="true"></i><?=$task->get_date_finish()?></span>
								<?php } ?>
							</div>

							<div class="main-task-users">
								<?php if($users) foreach ($users as $key => $user) { ?>
								<img src="<?=WEB_DOMAIN?><?=$user->get_image()?>" alt="<?=$user->get_username()?>" title="<?=$user->get_username()?>">
								<?php } ?>
							</div>
						</div>
					</div>
			
					<div class="modal fade" id="task<?=$task->get_id()?>">
					    <div class="modal-dialog">
					      	<div class="modal-content">
						        <div class="modal-header">
						          	<h4 class="modal-title"><?=$task->get_name()?></h4>
						          	<button type="button" class="close" data-dismiss="modal">&times;</button>
						        </div>
						        <div class="modal-body">
						        	<?php if($task->get_image()){?>
<<<<<<< HEAD
									<img src="http://localhost:81/trello<?=$task->get_image()?>" alt="" class="fix-image">
=======
									<img src="<?=WEB_DOMAIN?><?=$task->get_image()?>" alt="" class="fix-image">
>>>>>>> 8d764315a232c9cc3623418a679e6a44f6127934
									<?php } ?>
						          	<p><?=$task->get_description()?></p>
						        </div>
						        <div class="modal-footer">
						          	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						        </div>
					      	</div>
					    </div>
					</div>
					<?php }} ?>
				</div>

				<div class="box-add-new-task">
					<span class="ti-plus"></span><a href="#" title="" class="add-new-task">Thêm thẻ khác</a>
				</div>
			</div>
			<?php } ?>
		</section>
	</section>

	

	<script src="<?=URL_JS?>/jquery-3.4.1.min.js"></script>
	<script src="<?=URL_JS?>/bootstrap.min.js"></script>
	<script src="<?=URL_JS?>/jquery-ui.min.js"></script>
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

					$.post('http://localhost:81/trello/index.php?controller=tasks&action=set_sub_table', {'sub_table_id': sub_table_id, 'task_id' : task_id}, function (data) {
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