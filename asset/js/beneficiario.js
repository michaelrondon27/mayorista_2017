$(document).ready(function(){
	$("#beneficiaro").validate({
      	errorElement: "em",
      	errorPlacement: function(error, element) {
        	$(element.parent("div").addClass("form-animate-error"));
       		error.appendTo(element.parent("div"));
      	},
      	success: function(label) {
        	$(label.parent("div").removeClass("form-animate-error"));
      	},
      	rules: {
	        nombre: "required",
	        rif: "required",
	        cod_tlf: "required",
	        telefono: {
          		required: true,
          		number:true,
         		minlength: 7
        	},
        	direccion: "required",
        	contacto: "required",
        	tipo: "required"
      	},
      	messages: {
        	nombre: "Rellene el campo, por favor",
	        rif: "Rellene el campo, por favor",
	        cod_tlf: "Seleccione una opción, por favor",
	        telefono: {
          		required: "Rellene el campo, por favor",
          		number:"Solo se aceptan números",
         		  minlength: "mínimo 7 carácteres"
        	},
        	direccion: "Rellene el campo, por favor",
        	contacto: "Rellene el campo, por favor",
        	tipo: "Seleccione una opción, por favor"
      	}
    });
});