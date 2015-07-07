<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<html>
<head>
<title>TP Millet-Diale</title>
<h1 align="center">PIRÁMIDE MILLET-DIALE (DAGOSTINO)</h1>
<br>
</head>

<body>
<form method="post">
		
		<div align="center">
		<input type="number" name="celda1">
		</div>

		<br>
		
		<div align="center">
		<input type="number" name="celda2"> 
		
		<input type="number" name="celda3">
		</div>

		<br>
		
		<div align="center">
		<input type="number" name="celda4"> 
		
		<input type="number" name="celda5">
		
		<input type="number" name="celda6">
		</div>

		<br>

		<div align="center">
		<input type="number" name="celda7"> 
		
		<input type="number" name="celda8">
		
		<input type="number" name="celda9">
		
		<input type="number" name="celda10">
		</div>

		<br>

		<div align="center">
		<input type="number" name="celda11"> 
		
		<input type="number" name="celda12">
		
		<input type="number" name="celda13">
		
		<input type="number" name="celda14">
		
		<input type="number" name="celda15">
		</div>

		<br>
	
		<div align="center">
		<input type="number" min="1" max="6" name="celda16"> 
		
		<input type="number" min="1" max="6" name="celda17">
		
		<input type="number" min="1" max="6" name="celda18">
		
		<input type="number" min="1" max="6" name="celda19">
		
		<input type="number" min="1" max="6" name="celda20">
		
		<input type="number" min="1" max="6" name="celda21">
		</div>
	
		<br>
		<br>
		<br>
		
		<div align="center">
		<input type="submit" name="enviar" value="Resolver">
		</div>
</form>


<?php

if(isset($_POST['enviar'])){
	
	$celda1=$_POST['celda1'];
	
	$celda2=$_POST['celda2'];
	
	$celda3=$_POST['celda3'];
	
	$celda4=$_POST['celda4'];
	
	$celda5=$_POST['celda5'];
	
	$celda6=$_POST['celda6'];
	
	$celda7=$_POST['celda7'];
	
	$celda8=$_POST['celda8'];
	
	$celda9=$_POST['celda9'];
	
	$celda10=$_POST['celda10'];
	
	$celda11=$_POST['celda11'];
	
	$celda12=$_POST['celda12'];
	
	$celda13=$_POST['celda13'];
	
	$celda14=$_POST['celda14'];
	
	$celda15=$_POST['celda15'];
	
	$celda16=$_POST['celda16'];
	
	$celda17=$_POST['celda17'];
	
	$celda18=$_POST['celda18'];
	
	$celda19=$_POST['celda19'];
	
	$celda20=$_POST['celda20'];
	
	$celda21=$_POST['celda21'];

	
	$check_post=array(
	
	$_POST['celda16'],
	
	$_POST['celda17'],
	
	$_POST['celda18'],
	
	$_POST['celda19'],
	
	$_POST['celda20'],
	
	$_POST['celda21']

		);


	if (count(array_unique(array_diff($check_post,array("")))) < count(array_diff($check_post,array("")))){

		echo "Se repiten los valores de la base";
	}

	else{
		

	}
}

class Celda{
	public $valor;
	public $izq;
	public $der; 
}

class Queue{


}

class Piramide{
	
}
?>

</body>
</html>

<style>
input[type="number"] {
   width:60px;
}
</style>