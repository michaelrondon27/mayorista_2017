$(document).ready(function(){
	$("#form_cotizacion").validate({
		rules:{
			cotizacion:"required",
			empresa:"required",
			total:"required",
			fecha:"required"
		},
		messages:{
			cotizacion:"",
			empresa:"",
			total:"",
			fecha:""
		}
	});
	$('#fecha').bootstrapMaterialDatePicker({
		weekStart : 0, 
		time: false,
		animation:true
	});
});