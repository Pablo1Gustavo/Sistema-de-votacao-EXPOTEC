 
<?php 

	include("config.php"); 

	$query = $MySQLi ->
	query("SELECT * FROM TB_SALAS ORDER BY RAND() LIMIT 2");
	$i1 = $query->fetch_assoc();
	$i2 = $query->fetch_assoc();

	if(isset($_POST['votar']) && isset($_POST['eleito'])){

		$ganhador = $_POST['eleito'];

		if($ganhador==$_POST['sal1'])
			$perdedor = $_POST['sal2'];
		else
			$perdedor = $_POST['sal1'];

		$MySQLi -> query("INSERT INTO TB_DUELOS(DUE_SAL_CODIGO,DUE_STATUS) values ($ganhador,1)");
		$MySQLi -> query("INSERT INTO TB_DUELOS(DUE_SAL_CODIGO,DUE_STATUS) values ($perdedor,0)");

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Voto</title>
	<link rel="stylesheet" type="text/css" href="style.css?version=8">
</head>
<body style="overflow: hidden;">

	<img src="foto_expotec" class="foto_expotec" width="200" height="100">
	<button onclick="location.href='resultados.php'"> RESULTADOS </button>

	<div class="on-middle">


	<div class="form-style">
	<form action="?" method="POST" autocomplete="off">

		<ul class="votacao">

		  <?php echo $i1["SAL_NOME"];?>
		  <li class="opcao n1">
		    <input name="eleito" type="radio" id="n1"  value= <?php echo $i1["SAL_CODIGO"]; ?>>
		    <label for="n1" style="background-image: url(<?php echo "fotos/".$i1["SAL_FOTO"]; ?>);background-size: 250px 250px;"></label>
		  </li>

		  <br>

		  <?php echo $i2["SAL_NOME"];?>
		  <li class="opcao n2" >
		    <input name="eleito" type="radio" id="n2" value= <?php echo $i2["SAL_CODIGO"]; ?>>
		    <label for="n2" style="background-image: url(<?php echo "fotos/".$i2["SAL_FOTO"]; ?>);background-size: 250px 250px;"></label>
		  </li>

		</ul>

		<br><br>

		<input type="hidden" name="sal1" value= <?php echo $i1["SAL_CODIGO"]; ?>>
		<input type="hidden" name="sal2" value= <?php echo $i2["SAL_CODIGO"]; ?>>

		<input type=submit name="votar" value="VOTAR">

	</form>
	</div>

	</div>


</body>
</html>