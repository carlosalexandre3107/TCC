function NovaJanela(value, id, ano, mes, dia){
											
										var total = value.length;
										var div = value.indexOf("|");
										var div2 = value.indexOf(":");
	
										var res = value.slice(0,div);	
										var res2 = value.slice(div+1,div2);
										var res3 = value.slice(div2+1,total);
										
										if (res == 11){
											var url = "JusComTextoAnexo.view.php?&idCartao="+id+"&ano="+ano+"&mes="+mes+"&dia="+dia;
											window.open(url, "_black", "width=500, height=400");
											document.getElementById('idOcorrencia'+dia).value = res3;
											
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly  = true;
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
										}else if (res == 10){
											var url = "JusComTexto.view.php?&idCartao="+id+"&ano="+ano+"&mes="+mes+"&dia="+dia;
											window.open(url, "_black", "width=500, height=400");
											document.getElementById('idOcorrencia'+dia).value = res3;
											
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly  = true;
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
										}else if (res == '01'){
											var url = "JusComAnexo.view.php?&idCartao="+id+"&ano="+ano+"&mes="+mes+"&dia="+dia;
											window.open(url, "_black", "width=500, height=400");
											document.getElementById('idOcorrencia'+dia).value = res3;
																						
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly  = true;
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
										}else if (res2 != "NR"){
											document.getElementById('idOcorrencia'+dia).value = res3;
										
											document.getElementById('iniEntrada'+dia).value = res2;
											document.getElementById('iniEntrada'+dia).readOnly = true;
											
											document.getElementById('intSaida'+dia).value = res2;
											document.getElementById('intSaida'+dia).readOnly  = true;
											
											document.getElementById('intEntrada'+dia).value = res2;
											document.getElementById('intEntrada'+dia).readOnly  = true;
											
											document.getElementById('fimSaida'+dia).value = res2;
											document.getElementById('fimSaida'+dia).readOnly  = true;
											
											document.getElementById('extEntrada'+dia).value = res2;
											document.getElementById('extEntrada'+dia).readOnly  = true;
											
											document.getElementById('extSaida'+dia).value = res2;
											document.getElementById('extSaida'+dia).readOnly  = true;
											
											document.getElementById('totalMinuto'+dia).value = res2;
											document.getElementById('totalHora'+dia).value = res2;
										}else if (res2 == "NR"){
											document.getElementById('idOcorrencia'+dia).value = res3;
										
											document.getElementById('iniEntrada'+dia).value = "";
											document.getElementById('iniEntrada'+dia).readOnly  = false;
											document.getElementById('iniEntrada'+dia).value = document.getElementById('BaseEnt1'+dia).value;
											                                                      
											document.getElementById('intSaida'+dia).value = "";   
											document.getElementById('intSaida'+dia).readOnly  = false;
											document.getElementById('intSaida'+dia).value = document.getElementById('BaseSai1'+dia).value;
											                                                      
											document.getElementById('intEntrada'+dia).value = ""; 
											document.getElementById('intEntrada'+dia).readOnly  = false;
											document.getElementById('intEntrada'+dia).value = document.getElementById('BaseEnt2'+dia).value;
											 
											document.getElementById('fimSaida'+dia).value = "";   
											document.getElementById('fimSaida'+dia).readOnly  = false;
											document.getElementById('fimSaida'+dia).value = document.getElementById('BaseSai2'+dia).value;                                                    
											
											document.getElementById('extEntrada'+dia).value = ""; 
											document.getElementById('extEntrada'+dia).readOnly  = false;
											document.getElementById('extEntrada'+dia).value = document.getElementById('BaseEnt3'+dia).value;                                                    
											
											document.getElementById('extSaida'+dia).value = "";   
											document.getElementById('extSaida'+dia).readOnly  = false;
											document.getElementById('extSaida'+dia).value = document.getElementById('BaseSai3'+dia).value;
											
											document.getElementById('totalMinuto'+dia).value = "";
											document.getElementById('totalHora'+dia).value = "";
										}
									}
									
function CalculaTempo(dias){
													
							var diasResult = new Array();
							diasResult = dias.split("|");
											
							for (i in diasResult){
								diasResult[i] = parseInt(diasResult[i], 10);
							}
							
															
							if (document.getElementById('totalGeralMin').value == "" && document.getElementById('totalGeralHora').value == ""){
								document.getElementById('totalGeralMin').value = 0;
								document.getElementById('totalGeralHora').value = 0;
							}
							if (document.getElementById('totalGeralMin').value != '0' && document.getElementById('totalGeralHora').value != '0'){
								document.getElementById('totalGeralMin').value = 0;
								document.getElementById('totalGeralHora').value = 0;
							}
							for (i = 0; i < diasResult.length; i++){
								
								var BaseEnt1 = document.getElementById('BaseEnt1' + diasResult[i]).value;
								var BaseSai1 = document.getElementById('BaseSai1' + diasResult[i]).value;
								var BaseEnt2 = document.getElementById('BaseEnt2' + diasResult[i]).value;
								var BaseSai2 = document.getElementById('BaseSai2' + diasResult[i]).value;
								var BaseEnt3 = document.getElementById('BaseEnt3' + diasResult[i]).value;
								var BaseSai3 = document.getElementById('BaseSai3' + diasResult[i]).value;

								if (document.getElementById('iniEntrada' + diasResult[i]).id == 'iniEntrada' + diasResult[i]){
									
									var BaseEnt1 = BaseEnt1.split(':');
									var valor = document.getElementById('iniEntrada' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseEnt1[0], 10);
									var minutosTotalBase = parseInt(BaseEnt1[1], 10);
										var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
										var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
									if (minutosBase <= minutosAplicacao){
										var tTotalEnt1 = minutosBase - minutosAplicacao;
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt1 / 60;																			
									}else{
										var tTotalEnt1 = minutosAplicacao - minutosBase;
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt1 / 60;
									}		
								}if (document.getElementById('intSaida' + diasResult[i]).id == 'intSaida' + diasResult[i]){
									
									var BaseSai1 = BaseSai1.split(':');
									var valor = document.getElementById('intSaida' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseSai1[0], 10);
									var minutosTotalBase = parseInt(BaseSai1[1], 10);
										var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
										var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
									if (minutosBase <= minutosAplicacao){
										var tTotalSai1 = minutosAplicacao - minutosBase;
											tTotalSai1 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai1);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai1 / 60;

									}else{
										var tTotalSai1 = minutosAplicacao - minutosBase;
											tTotalSai1 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai1);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai1;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai1 / 60;
									}		
								}if (document.getElementById('intEntrada' + diasResult[i]).id == 'intEntrada' + diasResult[i]){
									
									var BaseEnt2 = BaseEnt2.split(':');
									var valor = document.getElementById('intEntrada' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseEnt2[0], 10);
									var minutosTotalBase = parseInt(BaseEnt2[1], 10);
										var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
										var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
									if (minutosBase <= minutosAplicacao){
										var tTotalEnt2 = minutosBase - minutosAplicacao;
											tTotalEnt2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalEnt2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt2 / 60;
									}else{
										var tTotalEnt2 = minutosAplicacao - minutosBase;
											tTotalEnt2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalEnt2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalEnt2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalEnt2 / 60;
									}		
								}if (document.getElementById('fimSaida' + diasResult[i]).id == 'fimSaida' + diasResult[i]){
									
									var BaseSai2 = BaseSai2.split(':');
									var valor = document.getElementById('fimSaida' + diasResult[i]).value.split(':');
									
									var horasTotalBase = parseInt(BaseSai2[0], 10);
									var minutosTotalBase = parseInt(BaseSai2[1], 10);
										var minutosBase = (horasTotalBase * 60) + minutosTotalBase;
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
									
									if (minutosBase <= minutosAplicacao){
										var tTotalSai2 = minutosAplicacao - minutosBase;
											tTotalSai2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai2 / 60;
									}else{
										var tTotalSai2 = minutosAplicacao - minutosBase;
											tTotalSai2 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai2);
											document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai2;
											document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai2 / 60;
									}		
								}if (document.getElementById('extEntrada' + diasResult[i]).id == 'extEntrada' + diasResult[i]){
									var valor = document.getElementById('extEntrada' + diasResult[i]).value.split(':');
																	
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
										tTotalEnt3 = parseInt(minutosAplicacao);
											
								}if (document.getElementById('extSaida' + diasResult[i]).id == 'extSaida' + diasResult[i]){
									var valor = document.getElementById('extSaida' + diasResult[i]).value.split(':');
									
									var horasTotalAplicacao = parseInt(valor[0], 10);
									var minutosTotalAplicacao = parseInt(valor[1], 10);	
									var minutosAplicacao = (horasTotalAplicacao * 60) + minutosTotalAplicacao;
																				
										var tTotalSai3 = parseInt(minutosAplicacao) - parseInt(tTotalEnt3);
										tTotalSai3 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(tTotalSai3);
										document.getElementById('totalMinuto' + diasResult[i]).value = tTotalSai3;
										document.getElementById('totalHora' + diasResult[i]).value 	 = tTotalSai3 / 60;
										
								}
								
								if (document.getElementById('iniEntrada' + diasResult[i]).value.indexOf(":") < 1){
										document.getElementById('totalMinuto' + diasResult[i]).value = document.getElementById('iniEntrada' + diasResult[i]).value;
										document.getElementById('totalHora' + diasResult[i]).value = document.getElementById('iniEntrada' + diasResult[i]).value;
								
								}
								if (document.getElementById('iniEntrada' + diasResult[i]).value.indexOf(":") < 1){		
									var t1 = parseInt(document.getElementById('totalGeralMin').value)  + 0;
									var t2 = parseInt(document.getElementById('totalGeralHora').value) + 0;
									
								}else{
									var t1 = parseInt(document.getElementById('totalMinuto' + diasResult[i]).value) + parseInt(document.getElementById('totalGeralMin').value);
									var t2 = parseInt(document.getElementById('totalHora' + diasResult[i]).value) + parseInt(document.getElementById('totalGeralHora').value);
								}
									
									document.getElementById('totalGeralMin').value  = parseInt(t1);
									document.getElementById('totalGeralHora').value = parseInt(t2);	
								
									
							}//FIM DO FOR
								
						}//FIM DA FUNCTION
						
function TrataOcorrencia(value, item){						
	var div = value.indexOf("|");
	var total = value.length;
	
	var res = value.slice(0, div);	
	var res2 = value.slice(div+1,total);
	
	if (res2 != "NR"){		
		document.getElementById("idOcorrencia"+item).value = res;	
		
		document.getElementById("incluirIniEntrada"+item).value = res2;							
		document.getElementById("incluirIniEntrada"+item).readOnly  = true;
		document.getElementById("incluirIniEntrada"+item).style.backgroundColor = "#CCC";
		
		document.getElementById("incluirIntSaida"+item).value = res2;							
		document.getElementById("incluirIntSaida"+item).readOnly  = true;
		document.getElementById("incluirIntSaida"+item).style.backgroundColor = "#CCC";
		
		document.getElementById("incluirIntEntrada"+item).value = res2;							
		document.getElementById("incluirIntEntrada"+item).readOnly  = true;	
		document.getElementById("incluirIntEntrada"+item).style.backgroundColor = "#CCC";									
		
		document.getElementById("incluirFimSaida"+item).value = res2;							
		document.getElementById("incluirFimSaida"+item).readOnly  = true;
		document.getElementById("incluirFimSaida"+item).style.backgroundColor = "#CCC";
		
		document.getElementById("incluirExtEntrada"+item).value = res2;							
		document.getElementById("incluirExtEntrada"+item).readOnly  = true;
		document.getElementById("incluirExtEntrada"+item).style.backgroundColor = "#CCC";
		
		document.getElementById("incluirExtSaida"+item).value = res2;							
		document.getElementById("incluirExtSaida"+item).readOnly  = true;
		document.getElementById("incluirExtSaida"+item).style.backgroundColor = "#CCC";
		
	}else{
		document.getElementById("idOcorrencia"+item).value = res;	
		
		document.getElementById("incluirIniEntrada"+item).value = "";
		document.getElementById("incluirIniEntrada"+item).readOnly  = false;
		document.getElementById("incluirIniEntrada"+item).style.backgroundColor = "#FFF";
		
		document.getElementById("incluirIntSaida"+item).value   = "";
		document.getElementById("incluirIntSaida"+item).readOnly  = false;
		document.getElementById("incluirIntSaida"+item).style.backgroundColor = "#FFF";
		
		document.getElementById("incluirIntEntrada"+item).value = "";
		document.getElementById("incluirIntEntrada"+item).readOnly  = false;
		document.getElementById("incluirIntEntrada"+item).style.backgroundColor = "#FFF";
		
		document.getElementById("incluirFimSaida"+item).value   = "";
		document.getElementById("incluirFimSaida"+item).readOnly  = false;
		document.getElementById("incluirFimSaida"+item).style.backgroundColor = "#FFF";
		
		document.getElementById("incluirExtEntrada"+item).value = "";
		document.getElementById("incluirExtEntrada"+item).readOnly  = false;
		document.getElementById("incluirExtEntrada"+item).style.backgroundColor = "#FFF";
		
		document.getElementById("incluirExtSaida"+item).value   = "";
		document.getElementById("incluirExtSaida"+item).readOnly  = false;
		document.getElementById("incluirExtSaida"+item).style.backgroundColor = "#FFF";		
		
	}		
							}