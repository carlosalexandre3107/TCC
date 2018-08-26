function horaMinuto(ObjId, Ativo){

		$("#"+ObjId).mask("99:99");

		//$("#"+ObjId).attr('disabled', 'disabled');
		
}

function Mascaras(idObjeto, tipo){
	if (tipo == "Telefone"){
		$("#"+idObjeto).mask("(99) 9999-9999");
	}else if (tipo == "Celular"){
		$("#"+idObjeto).mask("(99) 99999-9999");
	}else if(tipo == "Pis"){
		$("#"+idObjeto).mask("999.99999.99/99");
	}else if(tipo == "Ctps"){
		$("#"+idObjeto).mask("99999-999");
	}	
}

function ValidaInt(idObjetoInt, tipoValida, value){
	if (tipoValida == "Inteiro"){
		alert("OK!"+$("#"+idObjetoInt).id);
		//var x = $("#"+idObjetoInt).isNumeric(10);
		//alert(x);
		//if ($("#"+idObjetoInt).isNumeric(value)){
			//alert("OK!");
			//alert($("#"+idObjetoInt).isNumeric(value));
			
		//}else {//if ($("#"+idObjetoInt).isNumeric(value) == false){
			//alert($("#"+idObjetoInt).isNumeric(value));
			//$("#"+idObjetoInt).val("");
		//}
		
		//if ((event.keyCode >= 47 && event.keyCode <= 58) || (event.keyCode >= 96 && event.keyCode <= 105)) {
		//}else{
			//$("#"+idObjetoInt).val(");
		//}
	}
}