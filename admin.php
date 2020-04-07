<?php 
include("config.php");

$result = "Algo foi feito incorretamente!";

if(isset($_POST['cadastrar']) && isset($_FILES['foto'])){
	if($_FILES['foto']['size'] > 0){

		$nome = strtoupper($_POST['nome']);

    	$extensao = strtolower(substr($_FILES['foto']['name'], -4));
    	$nome_arq = md5(time()).$extensao;
    	move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/".$nome_arq);

    	$query = $MySQLi -> query("INSERT INTO TB_SALAS(SAL_NOME,SAL_FOTO) values ('$nome','$nome_arq')");

    	if($query){
    		$result = "Cadastrado com sucesso!";
    	}

	}
	echo $result;
}

?>

<html>
<head>
	<meta charset="utf-8"/>
	<title>Adicionar salas</title>
	<link rel="stylesheet" type="text/css">
</head>
<body>

	<div class="on-middle">
		<form action="?" method="POST" autocomplete="off" enctype="multipart/form-data">
			NOME:<input type="text" name="nome"><br>
			<input type="file" id="foto" style="display: none;" name="foto"/>
			FOTO:<input type="button" value="Procurar" onclick="document.getElementById('foto').click();" /><br><br>
			<input type="SUBMIT" value="CADASTRAR" name="cadastrar">
		</form>
	</div>

	<button onclick="location.href='index.php'"> VOTAÇAO </button>
	
</body>
</html>