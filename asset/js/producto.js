$(document).ready(function(){
	$("#productos").validate({
		rules:{
			producto:"required"
		},
		messages:{
			producto:""
		}
	});
});