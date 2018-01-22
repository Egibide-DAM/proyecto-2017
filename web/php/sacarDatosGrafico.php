<?php	
	if(isset($_POST['fecha'])){
		include "conexion.php";
		
		$fecha=$_POST['fecha'];
		//$fecha="2018-01-18";
		
		
		//echo $_POST['fecha'];
		//$sql="SELECT * FROM mediciones WHERE fecha like '".$fecha."%' LIMIT 0,20";
		$sql="SELECT * FROM mediciones WHERE fecha like '".$fecha."%'";
		//echo $sql;
		$resultado = mysqli_query($conn,$sql);	
		
		$numrows=mysqli_num_rows($resultado);
		
		if($numrows>0){
		
			$humedades="";
			$temperaturas="";
			$fechaHora="";		
			
			$contador=0;
			while($fila = mysqli_fetch_array($resultado)) {			
				$humedades.= $fila["humedad"];			
				$temperaturas.= $fila["temperatura"];			
				$fechaHora.= $fila["fecha"];
				
				if(($contador + 1)<$numrows){
					$humedades.="|";
					$temperaturas.="|";
					$fechaHora.="|";
				}
				$contador++;
			}
			
			//print_r($contador);
			
			$someJSONObject = json_encode(array(
					'chart' => array(
						'caption'=> 'Temperatura Y Humendad',
						'subcaption'=>$fecha,
						"showHoverEffect"=> "1",
						"forceAxisLimits"=> "1",
						"pixelsPerPoint"=>"0",
						"pixelsPerLabel"=> "30",
						"lineThickness"=> "1",
						"compactdatamode"=> "1",
						"dataseparator"=> "|",
						"scrollheight"=> "9",
						"flatScrollBars"=> "1",
						"scrollShowButtons"=> "1",
						"drawCustomLegendIcon"=> "1",
						"showAlternateHGridColor"=> "0",
					'categories' => array(array("category"=>$fechaHora)),
					'dataset' => array(
			),true);
			
			echo $someJSONObject;
		}else{
			echo "Error";
		}
		
		mysqli_close($conn);
		
		
	}else{
		echo "Error";
	}
?>