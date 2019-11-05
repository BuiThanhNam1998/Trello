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
	</div>
</header>
<section class="main-wrap">
	<!-- breadcrumb -->
	<section class="table-breadcrumb">
		<h4 class="table-breadcrumb-title"><?=$table['name']?></h4>
	</section>
	<!-- content -->
	<section class="main-content-table">
		<!-- danh sach cac sub table -->
		<?php foreach($sub_tables as $key => $sub_table){ ?>
		<div class="main-table-item">
			<div class="main-table-item-title">
				<span><?=$sub_table['name']?></span>
				<a href="javascript:void(0)" class="table-item-menu-icon"><span class="ti-more-alt"></span></a>

				<div class="main-popup popup-menu-table">
					<div class="main-popup-head">
						<span>Thao tác</span>
					</div>
					<div class="main-popup-content">
						<ul>
							<li><a href="#" title="">Thêm thẻ</a></li>
							<li><a href="#" title="">Lưu trữ danh sách này</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="main-table-item-content droppable" data-id="<?=$sub_table['id']?>">
				<!-- danh sach cac task trong sub table -->
				<?php foreach($tasks as $task){ if($task['sub_table_id'] == $sub_table['id']){ $users = $cls_task->get_users($task['id']);?>
				<div class="draggable" data-id="<?=$task['id']?>">
					<div class="main-task" data-toggle="modal" data-target="#task<?=$task['id']?>">
						<!-- anh cua task -->
						<?php if($task['image']){?>
						<img src="<?=WEB_DOMAIN?><?=$task['image']?>" alt="" class="fix-image">
						<?php } ?>
						<!-- ten cua task -->
						<p class="main-task-title"><?=$task['name']?></p>
						<div class="main-task-action">
							<!-- ngay ket thuc cuar task -->
							<?php if($task['date_finish']){ ?>
							<span class="main-task-finish"><i class="fa fa-clock-o" aria-hidden="true"></i><?=$task['date_finish']?></span>
							<?php } ?>
						</div>

						<div class="main-task-users">
							<?php if($users) foreach ($users as $key => $user) { ?>
							<img src="<?=WEB_DOMAIN?><?=$user['image']?>" alt="<?=$user['username']?>" title="<?=$user['username']?>">
							<?php } ?>
						</div>
					</div>
				</div>
		
				<div class="modal fade" id="task<?=$task['id']?>">
				    <div class="modal-dialog">
				      	<div class="modal-content">
					        <div class="modal-header">
					          	<h4 class="modal-title"><?=$task['name']?></h4>
					          	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <div class="modal-body">
					        	<?php if($task['image']){?>
								<img src="<?=WEB_DOMAIN?><?=$task['image']?>" alt="" class="fix-image">
								<?php } ?>
					          	<p><?=$task['description']?></p>
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
				<span class="ti-plus"></span><a href="javascript:void(0)" title="Thêm task mới" class="add-new-task">Thêm thẻ khác</a>
			</div>
		</div>
		<?php } ?>
		<!-- add sub table -->
		<div class="main-table-item main-table-add">
			<div class="box-add-new-task box-add-new-sub-table">
				<span class="ti-plus"></span><a href="javascript:void(0)" title="Thêm task mới" class="add-new-sub-table">Thêm danh sách khác</a>
			</div>
		</div>	

	</section>
</section>
<!-- ajax -->
<script>
	//drag-drop task
  	$( function() {
	    $(".draggable").draggable({
	    	revert: "invalid",
	    });
	    $(".droppable").droppable({
	      	drop: function( event, ui ) {
      			ui.draggable.fadeOut();
      			var mainTask = '<div class="draggable">' + ui.draggable.html() + '</div>';
				$(this).append(mainTask);
				$('.draggable').draggable();
				var task_id = ui.draggable.data('id');
				var sub_table_id = $(this).data('id');

				$.post('<?=WEB_DOMAIN?>/index.php?controller=tasks&action=set_sub_table', {'sub_table_id': sub_table_id, 'task_id' : task_id}, function (data) {
	                console.log('ok');
	            }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?
	                alert(thrownError); //alert with HTTP error
	            })

      		}
    	});
  	});
  	//add task
  	$('.add-new-task').click(function(){
  		$(this).parents('.main-table-item').append(
  			'<div class="main-task box-add-new-task-content">\
  				<textarea name="name" row="2" class="name-task-add" placeholder="Nhập tiêu đề cho thẻ này"></textarea>\
  			</div>\
  			<div class="box-add-new-task-action">\
  				<button type="button" class="add-task-button">Thêm mới</button>\
  				<span class="ti-close add-task-cancel"></span>\
  			</div>'
  		);
  		$(this).parents('.box-add-new-task').css('display', 'none');
  	});
  	$(document).on('click', '.add-task-button', function(){
  		var sub_table_id = $(this).parents('.main-table-item').find('.main-table-item-content').data('id');
  		var name = $(this).parents('.main-table-item').find('.name-task-add').val();
  		$(this).parents('.main-table-item').find('.name-task-add').val('').focus();

        $.ajax({
        	url: "<?=WEB_DOMAIN?>/index.php?controller=tasks&action=add_task",
        	method: 'post',
        	data: {'sub_table_id': sub_table_id, 'name' : name },
        	context: $('.main-table-item-content[data-id =' + sub_table_id + ']'),
        }).done(function(data) {
		    $(this ).append(data);
		});
  	});
  	//cancel add task
  	$(document).on('click', '.add-task-cancel', function(){
  		$(this).parents('.main-table-item').find('.box-add-new-task').css('display', 'block');
  		$(this).parents('.main-table-item').find('.box-add-new-task-content').css('display', 'none');
  		$(this).parent().css('display', 'none');
  	});
  	//ad news sub_table
  	$(document).on('click', '.add-new-sub-table', function(){
  	// $('.add-new-sub-table').click(function(){
  		$(this).parents('.main-table-item').append(
  			'<div class="main-task box-add-new-task-content">\
  				<input name="name" type="text" class="name-sub-table-add" placeholder="Nhập tiêu đề danh sách">\
  			</div>\
  			<div class="box-add-new-task-action">\
  				<button type="button" class="add-sub-table-button">Thêm mới</button>\
  				<span class="ti-close add-task-cancel"></span>\
  			</div>'
  		);
  		$(this).parents('.box-add-new-task').css('display', 'none');
  	});
  	$(document).on('click', '.add-sub-table-button', function(){
  		var table_id = <?=$table['id']?>;
  		var name = $(this).parents('.main-table-item').find('.name-sub-table-add').val();
  		$(this).parents('.main-table-item').find('.name-sub-table-add').val('').focus();

        $.ajax({
        	url: "<?=WEB_DOMAIN?>/index.php?controller=sub_tables&action=add_sub_table",
        	method: 'post',
        	data: {'table_id': table_id, 'name' : name },
        	context: $('.main-content-table'),
        }).done(function(data) {
        	$(this).find('.main-table-add').remove();
		    $(this).append(data);
		    $(this).append(
		    	'<div class="main-table-item main-table-add">\
		    		<div class="box-add-new-task box-add-new-sub-table" style="display: none;">\
						<span class="ti-plus"></span><a href="javascript:void(0)" title="Thêm task mới" class="add-new-sub-table">Thêm danh sách khác</a>\
					</div>\
			    	<div class="main-task box-add-new-task-content">\
	  				<input name="name" type="text" class="name-sub-table-add" placeholder="Nhập tiêu đề danh sách">\
		  			</div>\
		  			<div class="box-add-new-task-action">\
		  				<button type="button" class="add-sub-table-button">Thêm mới</button>\
		  				<span class="ti-close add-task-cancel"></span>\
		  			</div></div?'
		    	)
		});
  	});
</script>
<!-- style -->
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