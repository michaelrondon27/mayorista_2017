$(document).ready(function(){
	$("#juguetes").validate({
		rules:{
			juguete:"required",
			precio:"required"
		},
		messages:{
			juguete:"",
			precio:""
		}
	});
	$("#precio").change(function(){
		var precio=$("#precio").val();
		precio=precio.replace(".", ",");
		precio=formatNumber.new(precio);
		document.getElementById("verifique").value=precio;
	});
});
var formatNumber={
 	separador: ".", // separador para los miles
 	sepDecimal: ',', // separador para los decimales
 	formatear:function (num){
		num+='';
		var splitStr=num.split('.');
		var splitLeft=splitStr[0];
		var splitRight=splitStr.length > 1 ? this.sepDecimal+splitStr[1] : '';
		var regx=/(\d+)(\d{3})/;
		while(regx.test(splitLeft)){
		 	splitLeft=splitLeft.replace(regx, '$1'+this.separador+'$2');
		}
 		return this.simbol + splitLeft+splitRight;
 	},
 	new:function(num, simbol){
 	this.simbol=simbol ||'';
 		return this.formatear(num);
 	}
}