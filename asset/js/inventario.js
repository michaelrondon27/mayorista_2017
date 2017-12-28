$(document).ready(function(){
	$("#inventario").validate({
		rules:{
			almacenadora:"required",
			producto:"required",
			modelo:"required",
			cantidad:"required",
			cronograma:"required"
		},
		messages:{
			almacenadora:"",
			producto:"",
			modelo:"",
			cantidad:"",
			cronograma:""
		}
	});
	$("#cronograma").change(function(){
		document.getElementById("producto").value="";
		document.getElementById("modelo").value="";
		document.getElementById("cantidad").value="";
	});
	$("#producto").change(function(){
		var prod=$("#producto").val();
		var crono=$("#cronograma").val();
		var valor=3;
		if(crono!=""){
			$.ajax({
	            type: "POST",
	            url: "core/controllers/buscarController.php",
	            data:{
	                "prod":prod,
	                "crono":crono,
	                "valor":valor
	            },
	            success: function(resp){
	                if(resp!=""){
	                    $("#modelo").html(resp);
	                }
	            }
	        });
		}else{
			swal(
                {title:'Por favor, seleccione un cronograma!',
                type:'warning',
                confirmButtonText:'Cerrar'}
            );
            document.getElementById("producto").value="";
		}
	});
});