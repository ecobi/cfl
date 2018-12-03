<?php
			session_start();
			include "../include/config.php";
			include "../include/functions.php";
			session_checker();
?>
			<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Sistema</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!--	<link rel="stylesheet" type="text/css" href="../css/styles.css" /> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><img src="../imagens/logomenu.png"></a>
    </div>
    <ul class="nav navbar-nav">
	  <li class="active"><a href="../admin/form_usuario.php">Perfil</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastro<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../admin/formulario_cadastro.php">Clientes</a></li>
          <li><a href="../admin/form_cadfuncionario.php">Funcionários</a></li>
		  <li><a href="../admin/form_advogado.php">Advogado</a></li>
		  <li><a href="../admin/form_ComarcaVara.php">Comarca/Varas</a></li>
		  
        </ul>
      </li>
	  <li><a href="../admin/form_pasta.php">Pasta</a></li>
	  <li><a href="../admin/form_processos.php">Processos</a></li>
	  
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios<span class="caret"></span></a>
        <ul class="dropdown-menu">
			<li><a href="../admin/relatoriocheckin.php">Check-in</a></li>
			<li><a href="../admin/form_rel_cadastro.php">Cadastro</a></li>
		</ul>
	  </ul>
	<ul class="nav navbar-nav navbar-right">
<?php
			echo "<li>Bem vindo <strong>". $_SESSION['nome'] ." ". $_SESSION['sobrenome'] ."</strong>! <br /><li>";
?>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Bem vindo!</h3>
  <p>Sistema de gestão Agenda</p>
</div>

</body>
</html>