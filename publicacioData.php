<?php  
 
/**
 *
 * @author Sergi Suelves
 * @copyright Media-Saturn España 2016.
 * @description Funció PHP que retorna true si estem en una data superior a la data de publicació del nou contingut. 
 * @param  {String} $dataNova Cadena de text en format data "yyyy-mm-dd" a partir de la qual hi haurà un canvi de publicació
 * @return {boolean} retorna true si el contingut es pot publicar i retorna false si el contignut encara no es pot publicar
 */
function changeContent($dataNova){

	//Obtenim la data actual en format Unix UNIX
	$ara= strtotime("now"); 
	
	//Convertim la data de publicació en format UNIX
	$dataCanvi = strtotime($dataNova);

	//Comprobem que estiguem a la data de publicació per publicar
	if($ara > $dataCanvi){
		//Estem en contingut nou publicat
		echo "estem al contingut nou <br />";
		return true;
	}else{
		//Estem en el contingut anitc publicat
		echo "estem al contingut antic <br />";
		
		return false;
	}
}

?>
