
<?php 

	include("config.php"); 

	$query = $MySQLi ->
	query("SELECT SAL_NOME,SAL_FOTO,AVG(DUE_STATUS)*100 AS VITORIAS FROM TB_DUELOS INNER JOIN TB_SALAS ON SAL_CODIGO=DUE_SAL_CODIGO GROUP BY SAL_NOME ORDER BY VITORIAS DESC");

?>

<html>
<head>
	<title>Estatisticas</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css?version=8">
</head>
<body>

	<img src="foto_expotec" class="foto_expotec" width="200" height="100">
	<button onclick="location.href='index.php'"> VOTAR </button>	

	<div class="estatisticas">

	<?php

		while( $i = $query->fetch_assoc() ){
			echo "<div class='candidato'>";
			echo "<label>".$i["SAL_NOME"]." ( ".round(floatval($i["VITORIAS"]),2)."% )<label>";
			$foto_ = "fotos/".$i["SAL_FOTO"];
			echo '<img src="'.$foto_.'">';
			echo "</div><br>";
		}

	?>

	</div>

</body>
</html>