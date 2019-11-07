//logout
$('#btn-log-out').click(function(e){
	window.location.replace("index.php?controller=logout");
});
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