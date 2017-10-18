<?php

require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

session_start();
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
	$usuario = new usuario();
	$usuario->validaLogin($_POST);

	if (@$_SESSION['logado']){
		if ((isset($_SESSION['id_usuario'])) && ($_SESSION['st_usuario'] == 1)){
			switch($_SESSION['tp_usuario']){
				case 1:
							//header ('Location: ../crm/manutencao.php');
				header ('Location: ../');
				break;
			}
		}else{
			header ('Location: ../login/');
		}
	}
	else
		$erro = "<center><h3>Ops, usuário ou senha inválidos...</h3></center>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../crm/dist/img/favicon.ico">
	<meta charset="UTF-8">
	<title>CRMLite - Bem vindo ao painel</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<form class="pure-form pure-form-stacked form-signin" method="POST" autocomplete="off">
		<div class="container">
			<h1 style="margin:0;">
				<img src="../crm/dist/img/favicon.ico" width="22px" height="22px" /> CRMLite</h1>
				<h3 style="font-size:12px;"><?php echo @$erro; ?></h3><br />
				<div class="group form-group">
					<input type="text" name="email" id="email" placeholder="Usuario"  autocomplete="off" required="" />
					<span class="highlight"></span>
					<span class="bar"></span>
				</div>
				<div class="group form-group">
					<input type="password" name="senha" id="senha" placeholder="****" autocomplete="off" required="" />
					<span class="highlight"></span>
					<span class="bar"></span>
				</div>
				<button type="submit" class="button buttonBlue form-group">Fazer login
					<div class="ripples buttonRipples">
						<span class="ripplesCircle"></span>
					</div>
				</button>
			</form>
			<footer></a>
				<p>Powered by <a href="#" style="text-decoration:none;">Agência 3WEB</a></p>
			</footer>
		</div>
	</body>
	</html>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="js/index.js"></script>
