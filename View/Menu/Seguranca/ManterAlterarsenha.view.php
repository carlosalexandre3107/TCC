<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require "Style.php";
	require_once("../Entity/Usuario.class.php");
	$obj = new Usuario();
	
	require_once("../Business/EnumGenerico.class.php");
	$obj2 = new EnumGenerico();
?>

<body>
<br>
<div class="boxcadastro">
    	<div class="boxtitulo">
       	  	<p style="	width:135px;">ALTERAR SENHA</p>
   		</div><!--FIM DA DIV BOX TITULO-->
        
        <table width="500" class="formcadastro">
          <tr>
            <td>MATRÍCULA</td>
            <td><input type="text" name="matricula"/></td>
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
          </tr>
  </table>
        </br>
	</div><!--FIM DA DIV BOX Gerenciar-->
<?php
	if (isset($_POST['buscar'])){
	
	$matr = $_POST['matricula'];
	$desligado = $_POST['desligado'];
	
?>		
    <div class="boxManter">
        <table width="900" border="1" bordercolor="#000000" class="tbManter">
              <tr style="background:#999; margin:0 auto; font-weight:bold; font-family:calibri;">
					<td width="120"><center>MATRÍCULA</center></td>
                    <td width="400"><center>E-MAIL</center></td>
                    <td width="120"><center>PERFIL</center></td>
                    <td width="120"><center>DESLIGADO</center></td>
					<td width="120"><center>ALTERAR SENHA</center></td>
              </tr>
			  <?php
				$usuario = new Usuario();
				$listaUsuarios = $usuario->ListarUsuario($matr, $desligado, "");
				
				if (empty($listaUsuarios)){
							echo ("<center><strong>Não a resultado para esse filtro!</strong></center>");
				}else{
					foreach ($listaUsuarios as $item){
			  ?>
					<form method="post">
						  <tr>
								<td><center><?php echo $item->matr?></center><input type="hidden" name="matr" value="<?php echo $item->matr; ?>" /></td>
								<td><?php echo $item->email ?><input type="hidden" name="email" value="<?php echo $item->email; ?>" /></td>
								<td><center><?php echo $obj2->Perfil($item->perfil); ?></center><input type="hidden" name="perfil" value="<?php echo $item->perfil; ?>" /></td>
								<td><center><?php echo $obj2->Status($item->desativado); ?></center><input type="hidden" name="desativado" value="<?php echo $item->desativado; ?>" /></td>
								<input type="hidden" name="id" value="<?php echo $item->id; ?>" />
								<input type="hidden" name="idColaborador" value="<?php echo $item->colaboradorId; ?>" />
								
								<td><center><input type="submit" name="alterarsenha" value="ALTERAR" /></center></td>
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
	if (isset($_POST['alterarsenha'])){
	
		$id         = $_POST['id'];
		$matr       = $_POST['matr'];
		$email      = $_POST['email'];
		$perfil     = $_POST['perfil'];
		$desativado = $_POST['desativado'];
		$idC        = $_POST['idColaborador'];
?>
		<div class="boxcadastro" style="margin-top:20px;">
				<div class="boxtitulo">
					<p style="	width:135px;">ALTERAR SENHA</p>
				</div><!--FIM DA DIV BOX TITULO-->
			<form method="post">	
				    <input type="hidden" name="idAlterarSenha" value="<?php echo $id; ?>" />
					<input type="hidden" name="matrAlterarSenha" value="<?php echo $matr; ?>" />
					<input type="hidden" name="emailAlterarSenha" value="<?php echo $email; ?>" />
					<input type="hidden" name="perfilAlterarSenha" value="<?php echo $perfil; ?>" />
					<input type="hidden" name="desativadoAlterarSenha" value="<?php echo $desativado; ?>" />
					<input type="hidden" name="idColaboradorAlterarSenha" value="<?php echo $idC; ?>" />
				<table width="400" class="formcadastro">
				  <tr>
					<td>NOVA SENHA</td>
					<td><input name="novasenha" type="password" /></td>
				  </tr>
				  <tr>
					<td>CONFIRMAR NOVA SENHA</td>
					<td><input name="confirmarnovasenha" type="password" /></td>
					<td><input type="submit" name="gravar" value="GRAVAR" /></td>				
				  </tr>
				</table>
				
			</form>	
		</div><!--FIM DA DIV BOX Gerenciar-->
<?php
}
?>

<?php 
	if (isset ($_POST['gravar'])){
	
		$idAlterarSenha = $_POST['idAlterarSenha'];
		$matrAlterarSenha = $_POST['matrAlterarSenha'];
		$emailAlterarSenha = $_POST['emailAlterarSenha'];
		$perfilAlterarSenha = $_POST['perfilAlterarSenha'];
		$desativadoAlterarSenha = $_POST['desativadoAlterarSenha'];
		$idColaboradorAlterarSenha = $_POST['idColaboradorAlterarSenha'];
		
		if ($_POST['novasenha'] != $_POST['confirmarnovasenha']){
			echo "<script> 
					alert ('As senha não corresponde!');
				  </script>";
		}else{
			$senha = md5($_POST['confirmarnovasenha']);
			//echo $idAlterarSenha." - ".$matrAlterarSenha." - ".$emailAlterarSenha." - ".$perfilAlterarSenha." - ".$desativadoAlterarSenha." - ".$senha." - ".$idColaboradorAlterarSenha;
			
			$obj->setValue('desativado', $desativadoAlterarSenha);
			$obj->setValue('perfil', $perfilAlterarSenha);
			$obj->setValue('senha', $senha);
			$obj->setValue('Colaborador_id', $idColaboradorAlterarSenha);
			
			$obj->Atualizar($obj, $idAlterarSenha);
			
		echo "<script>
				alert ('Senha alterada com sucesso!');
			  </script>";
		}
?>
		
<?php	
	}	
?>
</body>
</html>