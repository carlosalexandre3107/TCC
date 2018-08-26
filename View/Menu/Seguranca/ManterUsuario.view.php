<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once("Style.php");
	require_once("../Entity/Usuario.class.php");
	$obj = new Usuario();
	
	require_once("../Business/EnumGenerico.class.php");
	$obj2 = new EnumGenerico();
?>
<body>
<br>
	<div class="boxcadastro">
			<div class="boxtitulo">
				<p style="	width:77px;">USUÁRIO</p>
			</div><!--FIM DA DIV BOX TITULO-->
			
				<table width="500" class="formcadastro">
					 <tr>
						<td>MATRÍCULA</td>
						<td><input type="text" name="matricula" id="idMatricula" onblur="ValidaInt(this.id, 'Inteiro', this.value);"/></td>
					 </tr>
					 <tr>
						<td>DESLIGADO</td>
						<td><select name="desligado">
								<option value="">Todos</option>
								<option value="1">Sim</option>
								<option value="0">Não</option>
							</select>
						</td>
						<td>
							<input type="submit" name="buscar" value="BUSCAR" />
						</td>
						<td>
							<input type="submit" name="incluir" value="NOVO" />
						</td>
					  </tr>
				</table>
			</br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
	if (isset($_POST['buscar'])){
	
	$matr = $_POST['matricula'];
	$desligado = $_POST['desligado'];
	
	if (!isset($matr)){
		$matr = NULL;
	}
?>	
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
                    <td width="120"><center>MANTER</center></td>
                    <td width="120"><center>MATRÍCULA</center></td>
                    <td width="400"><center>E-MAIL</center></td>
                    <td width="120"><center>PERFIL</center></td>
                    <td width="120"><center>DESLIGADO</center></td>
					<td width="120"><center>NOVA SENHA</center></td>
              </tr>
			  <?php
				$usuarioBuscar = new Usuario();
				$listaUsuarios = $usuarioBuscar->ListarUsuario($matr, $desligado, NULL);
		
				if (empty($listaUsuarios)){
							echo ("<center><strong>Não a resultado para esse filtro!</strong></center>");
				}else{
					foreach ($listaUsuarios as $item){
			  ?>
					<form method="post">  
					  <tr>
						<td><center><input type="submit" name="alterar" value="ALTERAR" /></center></td>
						<td><center><?php echo $item->matr?><input type="hidden" name="matrUsuario" value="<?php echo $item->matr?>" /></center></td>
						<td><?php echo $item->email ?><input type="hidden" name="emailUsuario" value="<?php echo $item->email?>" /></td>
						<td><center><?php echo $obj2->Perfil($item->perfil); ?><input type="hidden" name="perfilUsuario" value="<?php echo $obj2->Perfil($item->perfil); ?>" /></center></td>
							<?php
								if ($item->desativado == 1){
									if($item->perfil == 1){
							?>
									<td><center>
											<input style="border: 3px solid #900;" type="submit" name="desativadoUsuario" value="<?php echo $obj2->Status($item->desativado); ?>" />
										</center>
									</td>
							<?php
									}else{
							?>
						  			<td><center>
											<input style="border: 3px solid #900;" disabled type="submit" name="desativadoUsuario" value="<?php echo $obj2->Status($item->desativado); ?>" />
										</center>
									</td>
						    <?php
									}
								}else{
									if($item->perfil == 1){
							?>	
									<td><center>
											<input style="border: 3px solid #060;" type="submit" name="desativadoUsuario" value="<?php echo $obj2->Status($item->desativado); ?>" />
										</center>
									</td>
							<?php
									}else{
							?>
						  			<td><center>
											<input style="border: 3px solid #060;" disabled type="submit" name="desativadoUsuario" value="<?php echo $obj2->Status($item->desativado); ?>" />
										</center>
									</td>
						  	<?php
									}
								}
							?>
						<input type="hidden" name="idUsuario" value="<?php echo $item->id?>" />
						<input type="hidden" name="idColaboradorUsuario" value="<?php echo $item->colaboradorId?>" />
						<input type="hidden" name="senhaUsuario" value="<?php echo $item->senha?>" />
						<input type="hidden" name="desativadoUser" value="<?php echo $item->desativado?>" />
						<td><center><input type="submit" name="novasenha" value="NOVA SENHA"/></center></td>
					  </tr>
					</form>  
			<?php
				}
			}
			?>
		</table>
    </div><!--FIM DA DIV TBMANTER-->
<?php
}
?>

<?php
	if (isset ($_POST['desativadoUsuario'])){
		
		$idUsuarioD = $_POST['idUsuario'];
		$desativadoUsuario = $_POST['desativadoUsuario'];
		$perfilUsuario = $_POST['perfilUsuario'];
		$senhaUsuario = $_POST['senhaUsuario'];
		$idColaboradorUsuario = $_POST['idColaboradorUsuario'];
		
		if ($desativadoUsuario == "Sim"){
			$numDesligado = '0';
		}else if ($desativadoUsuario == "Não"){
			$numDesligado = 1;
		}
	
		require_once("../Entity/Usuario.class.php");
		$setor = new Usuario();
		
		$setor->setValue('desativado', $numDesligado);
		$setor->setValue('perfil', $perfilUsuario);
		$setor->setValue('senha', $senhaUsuario);
		$setor->setValue('Colaborador_id', $idColaboradorUsuario);
		
		$setor->Atualizar($setor, $idUsuarioD);
?>
		<script>
			alert ("Usuário modificada com sucesso!");
		</script>
<?php	
	}	
?>

<?php
	if (isset($_POST['incluir'])){
?>
		<div class="boxcadastro" style="margin-top:20px;">
		
				<div class="boxtitulo">
					<p style="	width:149px;">INCLUIR USUÁRIO</p>
				</div><!--FIM DA DIV BOX TITULO-->
				
			<form method="post">	
				<table width="400" class="formcadastro">
				  <tr>
					<td>MATRÍCULA</td>
					<td><input type="text" name="matrIncluir"/></td>
				  </tr>
				  <tr>
					<td>PERFIL</td>
					<td><select name="perfilIncluir">
							<option>Administrador</option>
							<option>Operador</option>
						</select>
					</td>
					<td><input type="submit" name="gravar" value="GRAVAR"/></td>
				  </tr>
				</table>
			</form>	
				</br>
		</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>

<?php
	if (isset($_POST['gravar'])){
		
		$matrIncluir = $_POST['matrIncluir'];
		$perfil = $_POST['perfilIncluir'];
		
		require_once("../Entity/Colaborador.class.php");
		$colaborador = new Colaborador();
		
		$result = $colaborador->ListarColaboradores(0, 'Colaborador', 'matr', $matrIncluir);
		
		if (empty($result)){
			echo "<script>alert ('Não existe esse numero de matricula!'); </script>";
		}else{
		
			foreach ($result as $item){
				$idColaboradorUsuario = $item->id;
				$email = $item->email;
			}	
		
			if ($perfil == "Administrador"){
				$perfil = '0';
			}else{
				$perfil = 1;
			}
			
			require_once("../Entity/Usuario.class.php");
			$usuario = new Usuario();
			
			$senhaT = $usuario->GerarNovaSenha($email);	
			
			$senha = md5($senhaT);
			
			$obj->setValue('desativado','0');
			$obj->setValue('perfil',$perfil);
			$obj->setValue('senha',$senha);
			$obj->setValue('Colaborador_id',$idColaboradorUsuario);
			
			$obj->Inserir($obj);
			
			echo "<script>
					alert ('Usuário cadastrador com sucesso!');
				  </script>";
		}//FIM DO ELSE	
?>
		
<?php	
	}	
?>

<!-- BOX DE ALTERAR USUÁRIO -->
<?php
	if (isset($_POST['alterar'])){
	
		$idAlterar = $_POST['idColaboradorUsuario'];
?>
		<div class="boxcadastro" style="margin-top:20px;">
		
				<div class="boxtitulo">
					<p style="	width:135px;">ALTERAR PERFIL</p>
				</div><!--FIM DA DIV BOX TITULO-->
			<?php	
				$linha2 = $obj->ListarUsuario(NULL, NULL, $idAlterar);
				foreach ($linha2 as $item2){		
			?>		
			<form method="post">	
				<table width="400" class="formcadastro">
				  <tr>
					<td>PERFIL</td>
					<td><select name="perfilAlterar">
							<?php
								if ($item2->perfil == 1){
									$selectedA = NULL;
									$selectedO = "selected";
								}else{
									$selectedA = "selected";
									$selectedO = NULL;
								}
							?>
							<option <?php echo $selectedA?> >Administrador</option>
							<option <?php echo $selectedO?> >Operador</option>
						</select>
					</td>
					<input type="hidden" name="desativadoAlterar" value="<?php echo $item2->desativado; ?>" />
					<input type="hidden" name="senhaAlterar" value="<?php echo $item2->senha; ?>" />
					<input type="hidden" name="idColaboradorAlterar" value="<?php echo $item2->colaboradorId; ?>" />
					<input type="hidden" name="idUsuarioAlterar" value="<?php echo $item2->id; ?>" />
					<td><input type="submit" name="atualizar" value="ALTERAR" /></td>
				  </tr>
				</table>
			</form>
			<?php
				}
			?>
				</br>
		</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>

<?php
	if (isset ($_POST['atualizar'])){
		
		$desativadoAlterar = $_POST['desativadoAlterar'];
		$perfilAlterar = $_POST['perfilAlterar'];
		$senhaAlterar = $_POST['senhaAlterar'];
		$idColaboradorAlterar = $_POST['idColaboradorAlterar'];
		$idUsuarioAlterar = $_POST['idUsuarioAlterar'];
		
		if ($perfilAlterar == "Administrador"){
			$perfil = '0';
		}else{
			$perfil = 1;
		}
		
		$obj->setValue('desativado',$desativadoAlterar);
		$obj->setValue('perfil',$perfil);
		$obj->setValue('senha',$senhaAlterar);
		$obj->setValue('Colaborador_id',$idColaboradorAlterar);
		
		$obj->Atualizar($obj, $idUsuarioAlterar);
?>
		<script>
			alert ("Perfil alterado com sucesso!");
		</script>
<?php	
	}	
?>

<!-- BOX DE GERAR NOVA SENHA USUÁRIO -->
<?php
	if (isset($_POST['novasenha'])){
	
		$idColaboradorNovaSenha = $_POST['idColaboradorUsuario'];
		$matrUsuarioNovaSenha = $_POST['matrUsuario'];
		$emailUsuarioNovaSenha = $_POST['emailUsuario'];
		$perfilUsuarioNovaSenha = $_POST['perfilUsuario'];
		$desativadoUsuarioNovaSenha = $_POST['desativadoUser'];
		$idUsuarioN = $_POST['idUsuario'];
?>
		<div class="boxcadastro" style="margin-top:20px;">
		
				<div class="boxtitulo">
					<p style="	width:170px;">GERAR NOVA SENHA</p>
				</div><!--FIM DA DIV BOX TITULO-->
			<?php	
				$resultUsuario = $obj->GerarNovaSenha($emailUsuarioNovaSenha);		
			?>		
			<form method="post">	
				<table width="400" class="formcadastro">
				  <tr>
					<td>MATRÍCULA</td>
					<td><input type="text" name="matrNovaSenha" id="matrNovaSenha" value="<?php echo $matrUsuarioNovaSenha; ?>" /></td>
				  </tr>
				  <tr>
					<td>SENHA TEMPORARIA</td>
					<td><input type="text" name="senhaNovaSenha" value="<?php echo $resultUsuario; ?>" /></td>
					
					<input type="hidden" name="emailNovaSenha" value="<?php echo $emailUsuarioNovaSenha; ?>" />
					<input type="hidden" name="perfilNovaSenha" value="<?php echo $perfilUsuarioNovasenha; ?>" />
					<input type="hidden" name="desativadoNovaSenha" value="<?php echo $desativadoUsuarioNovaSenha; ?>" />
					<input type="hidden" name="idColaboradorNovaSenha" value="<?php echo $idColaboradorNovaSenha; ?>" />
					<input type="hidden" name="idUsuarioN" value="<?php echo $idUsuarioN; ?>" />
					
					<td><input type="submit" name="enviar" value="ALTERAR"/></td>
				  </tr>
				</table>
			</form>
			<script>
				document.getElementById('matrNovaSenha').readOnly  = true;
				document.getElementById('matrNovaSenha').style.backgroundColor = "#999";
			</script>
				</br>
		</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>

<?php
	if (isset ($_POST['enviar'])){
		
		$idColaboradorNovaSenha       = $_POST['idColaboradorNovaSenha'];
		$senhaNovaSenha      = $_POST['senhaNovaSenha'];
		$perfilNovaSenha     = $_POST['perfilNovaSenha'];
		$desativadoNovaSenha = $_POST['desativadoNovaSenha'];
		$idUsuarioE = $_POST['idUsuarioN'];
		
		$senhaNovaSenha = md5($senhaNovaSenha);
		
		if ($perfilNovaSenha == "Administrador"){
			$perfilNovaSenha = '0';
		}else{
			$perfilNovaSenha = 1;
		}
		
		//echo $idColaboradorNovaSenha." - ".$senhaNovaSenha." - ".$perfilNovaSenha." - ".$desativadoNovaSenha." - ".$idUsuarioE;
		
		$obj->setValue('desativado',$desativadoNovaSenha);
		$obj->setValue('perfil',$perfilNovaSenha);
		$obj->setValue('senha',$senhaNovaSenha);
		$obj->setValue('Colaborador_id',$idColaboradorNovaSenha);
		
		$obj->Atualizar($obj, $idUsuarioE);
?>
		<script>
			alert ("Usuário modificada com sucesso!");
		</script>
<?php	
	}	
?>

</body>
</html>