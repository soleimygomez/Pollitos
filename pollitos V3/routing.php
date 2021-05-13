<?php 

$controllers=array(
	'usuarios'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'pollito'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'mortalidad'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'mortalidadd'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'granja'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'granjero'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'galpon'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'lote'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'vehiculos'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'visitantes'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		echo '<script>
        alert("ERROR");
         location.href="ir-registro.php";
        </script>';
		call('pollito','error');
		call('granja','error');
		call('granjero','error');
		call('galpon','error');
		
	}		
}else{
	
	call('pollito','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
	
        
            
        case 'granja':
		require_once('Model/granja.php');
		$controller= new GranjaController();
		break;

		case 'granjero':
		require_once('Model/granjero.php');
		require_once('Model/Usuarios.php');
		$controller= new GranjeroController();
		break;
        
        case 'galpon':
		require_once('Model/Galpon.php');
		$controller= new GalponController();
		break;
        
        
        
        case 'lote':
		require_once('Model/Lote.php');
		$controller= new LoteController();
		break; 

		case 'vehiculos':
		require_once('Model/Vehiculos.php');
		$controller= new VehiculosController();
		break;
        

        case 'visitantes':
		require_once('Model/Visitantes.php');
		$controller= new VisitantesController();
		break;
        

		case 'pollito':
		require_once('Model/Pollito.php');
		require_once('Model/Galpon.php');
		$controller= new PollitoController();
		break;

		case 'mortalidad':
		require_once('Model/Mortalidadd.php');
		require_once('Model/Mortalidad.php');
		require_once('Model/Pollito.php');
		$controller= new MortalidadController();
		break;



		default:
				# code...
		break;
	}
	$controller->{$action}();
}

?>