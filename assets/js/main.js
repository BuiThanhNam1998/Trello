$('.fa-home').click(function(){
	window.location.replace("index.php?controller=tables");
});

// profile dropdown
$('.avatar').click(function(){
	$('.popup-profile').toggle();
});

$(document).click(function(e){
	if (! $('.avatar').is(e.target) && $('.avatar').has(e.target).length === 0){
	    $('.popup-profile').hide();
	}
});

$(document).click(function(e){
	if (! $('.avatar').is(e.target) && $('.avatar').has(e.target).length === 0){
	    $('.popup-profile').hide();
	}
});

// //profile
// $('#btn-profile').click(function(e){
// 	window.location.replace("index.php?controller=users");
// });

// //logout
// $('#btn-log-out').click(function(e){
// 	window.location.replace("index.php?controller=logout");
// });
	
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
});

$(document).click(function(e){
	if (! $('.newtable').is(e.target) && $('.newtable').has(e.target).length === 0){
	    $('.popup-newtable').hide();
	}
});

// menu table
$('.table-item-menu-icon').click(function(e){
	$(this).parent().parent().find('.popup-menu-table').toggle();
});

$(document).click(function(e){
	if (! $('.table-item-menu-icon').is(e.target) && $('.table-item-menu-icon').has(e.target).length === 0){
	    $('.popup-menu-table').hide();
	}
});
// //confirm password
// var password = document.getElementById("pass")
//   , confirm_password = document.getElementById("confirm_pass");

// function validatePassword(){
// 	console.log('a123');
//   if(password.value != confirm_password.value) {
//     confirm_password.setCustomValidity("Mật khẩu nhập không khớp");
//   } else {
//     confirm_password.setCustomValidity('');
//   }
// }
// password.onchange = validatePassword();
// confirm_password.onkeyup = validatePassword();
 function passsuccess()
 {
 	window.alert("Bạn đã đổi mật khẩu thành công")
 }