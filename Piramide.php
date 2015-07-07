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
class Celda{
	var $valor;
	var $izq;
	var $der;
	function assign_values($valor,$izq,$der){
		$this->valor=$valor;
		$this->izq=$izq;
		$this->der=$der;
	}
	
	function resolver(){
	
	$flag=False;
	
	if($this->valor==0){
		if($this->izq->valor!=0 and $this->der->valor!=0){
			$this->valor=$this->izq->valor + $this->der->valor;
			$flag=True;
		}
	}
	else{
		if($this->izq->valor==0 and $this->der->valor!=0){
			$this->izq->valor = $this->valor - $this->der->valor;
			$flag=True;
		}
		
		if($this->izq->valor!=0 and $this->der->valor==0){
			$this->der->valor = $this->valor - $this->izq->valor;
			$flag=True;	
		}
	}	if($this->izq->resolver()==FALSE && $this->der->resolver()==FALSE){

		$this->izq->resolver();
	}
		else{
			
			if($this->izq->resolver()==FALSE){
			$this->der->resolver();
		}

			if($this->der->resolver()==FALSE){
			$this->izq->resolver();
		}
	
		}
		return $flag;
	}

	function resuelto(){
		$flag=True;
		if($this->valor==0){
			$flag=False;
		}

		return $flag;
	}
}
class CeldaAbajo extends Celda{
	var $valor;
	function assign_values_base($valor){
		$this->valor=$valor;
	}
		
	function resolver(){
		return False;
	}
	function resuelto(){ 
		return ($this->valor!=0);
	}
}

if(isset($_POST['enviar'])){
	#Armar pirámide
	$celda21 = new CeldaAbajo;
	$celda21 -> assign_values_base($_POST['celda21']);
	$celda20 = new CeldaAbajo;
	$celda20 -> assign_values_base($_POST['celda20']);
	$celda19 = new CeldaAbajo;
	$celda19 -> assign_values_base($_POST['celda19']);
	$celda18 = new CeldaAbajo;
	$celda18 -> assign_values_base($_POST['celda18']);
	$celda17 = new CeldaAbajo;
	$celda17 -> assign_values_base($_POST['celda17']);
	$celda16 = new CeldaAbajo;
	$celda16 -> assign_values_base($_POST['celda16']);
	$celda15 = new Celda;
	$celda15 -> assign_values($_POST['celda15'],$celda20,$celda21);
	$celda14 = new Celda;
	$celda14 -> assign_values($_POST['celda14'],$celda19,$celda20);
	$celda13 = new Celda;
	$celda13 -> assign_values($_POST['celda13'],$celda18,$celda19);
	$celda12 = new Celda;
	$celda12 -> assign_values($_POST['celda12'],$celda17,$celda18);
	$celda11 = new Celda;
	$celda11 -> assign_values($_POST['celda11'],$celda16,$celda17);
	$celda10 = new Celda;
	$celda10 -> assign_values($_POST['celda10'],$celda14,$celda15);
	$celda9 = new Celda;
	$celda9 -> assign_values($_POST['celda9'],$celda13,$celda14);
	$celda8 = new Celda;
	$celda8 -> assign_values($_POST['celda8'],$celda12,$celda13);
	$celda7 = new Celda;
	$celda7 -> assign_values($_POST['celda7'],$celda11,$celda12);
	$celda6 = new Celda;
	$celda6 -> assign_values($_POST['celda6'],$celda9,$celda10);
	$celda5 = new Celda;
	$celda5 -> assign_values($_POST['celda5'],$celda8,$celda9);
	$celda4 = new Celda;
	$celda4 -> assign_values($_POST['celda4'],$celda7,$celda8);
	$celda3 = new Celda;
	$celda3 -> assign_values($_POST['celda3'],$celda5,$celda6);
	$celda2 = new Celda;
	$celda2 -> assign_values($_POST['celda2'],$celda4,$celda5);
	$celda1 = new Celda;
	$celda1 -> assign_values($_POST['celda1'],$celda2,$celda3);
		
	#Comprobar que no se repitan los números de la base
	$check_post=array(
	
	$_POST['celda16'],
	
	$_POST['celda17'],
	
	$_POST['celda18'],
	
	$_POST['celda19'],
	
	$_POST['celda20'],
	
	$_POST['celda21']
		);
	if (count(array_unique(array_diff($check_post,array("")))) < count(array_diff($check_post,array("")))){
		echo "<br>";
		echo "<p align='center'><font size='20'>Se repiten los valores de la base</font></p>";
	}
	else{
		
		$noresuelto=True;
		while($noresuelto){
			for($i=1;$i<16;$i++){
			$noresuelto=$celda1->resolver();
		}}

		#Perdon por esta asquerosidad :)

		if($celda1->resuelto() and $celda2->resuelto() and $celda3->resuelto() and $celda4->resuelto() and $celda5->resuelto() and $celda6->resuelto() and $celda7->resuelto() and $celda8->resuelto() and $celda9->resuelto() and $celda10->resuelto() and $celda11->resuelto() and $celda12->resuelto() and $celda13->resuelto() and $celda14->resuelto() and $celda15->resuelto() and $celda16->resuelto() and $celda17->resuelto() and $celda18->resuelto() and $celda19->resuelto() and $celda20->resuelto() and $celda21->resuelto()){
			
	
		 echo "<p align='center'><font size='20'>".$celda1->valor."</font></p>";
		 echo "<p align='center'><font size='20'>".$celda2->valor."&nbsp; &nbsp;".$celda3->valor."</font></p>";
		 echo "<p align='center'><font size='20'>".$celda4->valor."&nbsp; &nbsp;".$celda5->valor."&nbsp; &nbsp;".$celda6->valor."</font></p>";
		 echo "<p align='center'><font size='20'>".$celda7->valor."&nbsp; &nbsp;".$celda8->valor."&nbsp; &nbsp;".$celda9->valor."&nbsp; &nbsp;".$celda10->valor."</font></p>";
		 echo "<p align='center'><font size='20'>".$celda11->valor."&nbsp; &nbsp; &nbsp;".$celda12->valor."&nbsp; &nbsp; &nbsp;".$celda13->valor."&nbsp; &nbsp; &nbsp;".$celda14->valor."&nbsp; &nbsp; &nbsp;".$celda15->valor."</font></p>";
		 echo "<p align='center'><font size='20'>".$celda16->valor."&nbsp; &nbsp; &nbsp;".$celda17->valor."&nbsp; &nbsp; &nbsp;".$celda18->valor."&nbsp; &nbsp; &nbsp;".$celda19->valor."&nbsp; &nbsp; &nbsp;".$celda20->valor."&nbsp; &nbsp; &nbsp;".$celda21->valor."</font></p>";
			}
		else{
			echo "<br>";
			echo "<p align='center'><font size='20'>No se puede resolver</font></p>";
		}
	}
}
?>

</body>
</html>

<style>
input[type="number"] {
   width:60px;
}
</style>