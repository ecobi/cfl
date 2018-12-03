<?php
	include "../include/config.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <title>Sistema</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  
	<script type="text/javascript" src="../js/jquery.mask.min.js"></script>	
	<script type="text/javascript" src="../js/jquery.mask.js"/></script>
		<script type="text/javascript" language="javascript" src="../js/popup.js"/></script>

  <!--  
  
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="../js/consultacep.js"></script>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../js/jquery-ui.min.css">
<!--	
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/typeahead.js"></script>
    
-->

</head>

<script>
$(document).ready(function(){
	document.getElementById("comarca").style.background="white";
	//document.getElementById("cliente").style.background="white";
	document.getElementById("reclamada").style.background="white";
	$('#cliente').on('focus', function(){
		$(this).removeAttr('readonly');
		//document.getElementById("cliente").required = true;
	});
	$('#reclamada').on('focus', function(){
		$(this).removeAttr('readonly');
		document.getElementById("reclamada").required = true;
	});
	$('#comarca').on('focus', function(){
		$(this).removeAttr('readonly');
		document.getElementById("comarca").required = true;
		/*limita somente letras */
		$("#comarca").on("input", function(){
  var regexp = /[^a-zA-Z]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});
	});
	/* $('#comarca').on('focus', function(){
		$(this).removeAttr('readonly');
	});
	 */
 $('#comarca').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"consulta.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
		 
		$('.id_cidade').val(data.id_cidade);
     result($.map(data, function(item){
      return item;
	 })); 
      /* result($.map(data, function(item){
      return item;
     })); */
     }
   })
  }
 });
 $('#cliente').typeahead({
  source: function(client, result)
  {
   $.ajax({
    url:"searchcliente.php",
    method:"POST",
    data:{client:client},
    dataType:"json",
    success:function(data)
    {
		$('.id_cliente').val(data.id_cliente);
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
 $('#reclamada').typeahead({
  source: function(reclamada, result)
  {
   $.ajax({
    url:"searchreclamada.php",
    method:"POST",
    data:{reclamada:reclamada},
    dataType:"json",
    success:function(data)
    {
     $('.id_cliente').val(data.id_cliente);
	 result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
 
});
</script>

 <script type="text/javascript">
	$(document).ready(function(){
		$("#cpf").mask("999.999.999-99");
		$('#cep').mask('99999-999');
		$("#data").mask("99/99/9999");
		$("#processo").mask("9999999-99.9999.9.99.9999");
	});
	function maskphone( campo ) {
        campo.value = campo.value.replace( /[^\d]/g, '' )
                                 .replace( /^(\d\d)(\d)/, '($1) $2' )
                                 .replace( /(\d{4})(\d)/, '$1-$2' );
        if ( campo.value.length > 15 ) campo.value = stop;
        else stop = campo.value;    
}
  </script>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="#"><img src="../imagens/logomenu.png"></a>
    </div>
    <ul class="nav navbar-nav">
	  <li class="active"><a href="../admin/form_usuario.php">Perfil</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastro<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../admin/formulario_cadastro.php">Usuários</a></li>
          <li><a href="../admin/form_cadfuncionario.php">Funcionários</a></li>
		  <li><a href="../admin/form_cad_eventos.php">Eventos</a></li>
        </ul>
      </li>
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
	<h3 class="page-header">Incluir Processos</h3>
  		<form name="checkin" method='post' action="form_processos_gravar.php" encrypt/type="multidata-form">
			<div class="row">
				<div class="form-group col-md-3">
					<label>UNIDADE:</label>
					<select class="form-control" name="unidade" id="unidade">
						<option>CENTRO</option>
						<option>LAPA</option>
						<option>SANTANA</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label> VARA:</label>
					<input name="vara" type="text" placeholder="Numero da Vara" id="vara" class="form-control input-md" maxlength="3" required autofocus autocomplete="nope"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
				</div>
				<div class="form-group col-md-3">
					<label> COMARCA: </label>
					<input name="comarca" type="text" placeholder="Comarca" id="comarca" class="form-control input-md" required readonly  autocomplete="off"/>
					<input type="hidden" name="id_cidade" class="id_cidade" value=""/>
				</div>
				<div class="form-group col-md-3">
					<label> PROCESSO: </label>
					<input name="processo" type="text" placeholder="Numero Processo" id="processo" class="form-control input-md" maxlength="25" required  />
				</div>
				</div>
				<div class="row">
				<div class="form-group col-md-6">
					<label> CLIENTE: </label>
					<a href='javascript:newPopupAdd()'><img src='../imagens/add.png' title='Adicionar Reclamada'/></a>
					<input name="cliente" type="text" placeholder="Cliente" id="cliente" class="form-control input-md" required autocomplete="off" style="text-transform:uppercase;"  readonly/>
					<input type="hidden" name="id_cliente" class="id_cliente" value=""/>
				</div>
				<div class="form-group col-md-6">
					<label> RECLAMADA: </label>
					<a href='javascript:newPopupAdd()'><img src='../imagens/add.png' title='Adicionar Cliente'/></a>		
					<input name="reclamada" type="text" placeholder="Reclamada" id="reclamada" class="form-control input-md" required autocomplete="off" readonly style="text-transform:uppercase;"/>
					<input type="hidden" name="id_reclamada" class="id_reclamada" value=""/>
				</div>
				<div class="form-group col-md-4">
					<label> PASTA </label>
					<input name="pasta" type="text" placeholder="Pasta" id="pasta" class="form-control input-md" maxlength="4" required autocomplete="nope" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
				</div>
				<div class="form-group col-md-4">
					<label> DATA </label>
					<input name="data" type="date" placeholder="data" id="data" class="form-control input-md"/>
				</div>
				<div class="form-group col-md-4">
					<label> STATUS </label>
					<input name="status" type="text" placeholder="" id="data" class="form-control input-md" value="Abertura" disabled="disabled"/>
				</div>
				<div class="form-group col-md-12">
					<label> OBSERVAÇÕES: </label>
					<textarea  name="obs" type="email" placeholder="Observações" id="email" class="form-control input-md" autocomplete="nope"/></textarea>
				</div>
				</div>
		</br>
		</br>
				<div class="row">
					<div class="col-md-12">
						<center>
							<button type="submit" name="Submit" class="btn btn-primary btn-md" />Gravar</button>
							<button type="reset" class="btn btn-primary btn-md"/>
							Limpar</button>
						</center>
					</div>
				</div>		
		</form>
		</div>
		
		
</body>
</html>