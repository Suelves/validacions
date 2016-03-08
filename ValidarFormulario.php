<?php

class ValidarFormulario {

	public function fecha($fecha) {
     
     $purchase_date = $fecha;
     $std_ini_date  = "01/01/2015";
    $std_end_date = "12/12/2015";
     $ErrorPurchaseDate;

    if ((preg_match("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/", $purchase_date, $matches) !== 1) || ($purchase_date == NULL) || ($purchase_date == "")){
      $error_purchase_date = "<li class='error-message'>•Introduce una fecha en el formato especificado</li>";
      // echo 'false PDATE';
      return false;
    }else{
      if (strtotime($purchase_date) > strtotime($std_end_date)){
        $error_purchase_date = "<li class='error-message'>•La fecha introducida se encuentra fuera del período de la promoción</li>";
        $ErrorPurchaseDate = $error_purchase_date;
        // echo 'false PDATE2';
         print '<div style="color:red">La fecha NO es correcta<br /></div>';        
            print '=================================================<br />';   
        return false;
      }else{
        // echo 'true PDATE';
            print '<div style="color:gree                                                                                                                                                                                                                    n">La fecha es CORRECTA<br /></div>';        
            print '=================================================<br />';    
        return true;
      }
    }
  }
    
    public function nombre($name){
        // $permitidos = "/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,50}$/i";
    	
    	if(empty($name)==true){
    		print '<div style="color:red">el $name está vacio <br /></div>';		
    		print '=================================================<br />';		
    	}else {
    		if (($name !== NULL) && ($name !== "") && (strlen($name) > 1)){
    			if(is_strIng($name)==true){
    				print '<div style="color:green">EL $name ESTÁ VALIDADO</div> <br />';
    				print "=================================================<br />";
    				return true;
    			}

    			print "<div style='color:red'>EL $name NO TIENE CARACTERES</div> <br />";
    			print "EL =================================================<br />";


    		}else{
    			print '<div style="color:red">EL $name ESTÁ vacio</div> <br />';
    			print "=================================================<br />";
    			return false;
    		}
    	}

    }


    public function correo($email){
    			// Primero, checamos que solo haya un símbolo @, y que los largos sean correctos
    	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
					// correo inválido por número incorrecto de caracteres en una parte, o número incorrecto de símbolos @
    		echo "<br />EL $email NO CONTIENE @<br />";
    		print "=================================================<br />";
    		return false;
    	}
			  // se divide en partes para hacerlo más sencillo
    	$email_array = explode("@", $email);
    	$local_array = explode(".", $email_array[0]);
    	for ($i = 0; $i < sizeof($local_array); $i++) {

    		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])){
    			echo "<br />EL $email NO funciona <br />";
    			print "=================================================<br />";

    			return false;
    		}
    	} 
			  // se revisa si el dominio es una IP. Si no, debe ser un nombre de dominio válido
    	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) 
    	{ 
    		$domain_array = explode(".", $email_array[1]);
    		if (sizeof($domain_array) < 2) 
    		{
    			echo "<br />EL $email NO funciona <br />";
    			print "=================================================<br />";

			        return false; // No son suficientes partes o secciones para se un dominio
			    }
			    for ($i = 0; $i < sizeof($domain_array); $i++) 
			    {
			    	if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])){
			    		echo "<br />EL $email NO funciona <br />";
			    		print "=================================================<br />";
			    		return false;
			    	}
			    }
			}
			echo "<br />EL $email SI funciona <br />";
			print "=================================================<br />";
			return true;
		}


        // public function compararCorreos($correo, $auxiliar) {
           
           
        //     print "=================================================<br />";
        //     echo "COMPARANDO CORREOS<br />";
        //     print "=================================================<br />";

        //     $next = array();
        //     $max = sizeof($auxiliar):
        //     $NextComprobacion = true;
        //     // echo "LARGO DE ARRAY DE CORREOS AMIGOS: ".$max."<br />";
        //     //     if($NextComprobacion==true){
        //     //         for($i=0; $i<=$max; $ì++){
        //     //             print "yeah <br />";
        //     //         }
        //     //     }             

        //     //  if($NextComprobacion==true){
                
        //     //     for($i=0; $i <= $max; $i++) {
                    
        //     //         for($j=0; $j <= $max; $j++){
        //     //             if($i==$j){
        //     //                 continue;
        //     //             }else{
        //     //                 if($auxiliar[$i]==$auxiliar[$j]){
        //     //                     print "Hay correos repetidos entre los amigos";
        //     //                     return false;
        //     //                 }
        //     //             }
        //     //         } 
             
        //     //     }
        //     //     print "No hay ninguna coincidencia entre los correos de los amigos"
        //     //     return true;

        //     // }
                
        //         // for ($i=0; $i <=$max; $i++) { 
        //         //     print $auxiliar[$i]."<br />";
        //         // }

        //         // print_r($auxiliar); 
        //         // print "<br />";
        //         // print_r($next);
        //         // print "<br />";
        //         // print "sizeof max: ".$max."<br />";


        // }

		public function cantidad($cantidad){
			if(is_numeric($cantidad)){
				if( ($cantidad>0) && ($cantidad<=100)){
					echo 'es numerico y tiene un valor CORRECTO<br />';
					print "=================================================<br />";
					return true;
				}

				echo 'no es una cantidad válida<br />';
				print "=================================================<br />";
				return false;
			}else{
				echo 'no es numerico <br />';
				print "=================================================<br />";
				return false;
			}
		}


		public function mensaje($mensaje){
			if (is_string($mensaje)) {
				if( (strlen($mensaje))>0 && (strlen($mensaje)<100) ){
					echo "El mensaje es correcto<br />";
					print "=================================================<br />";
					return true;
				}else {
					echo "El mensaje es correcto<br />";
					print "=================================================<br />";
					return false;
				}
			}
		}
		public function checkbox($check){
			if (isset($check) && $check == true){
				echo '<div style="color:green">Has aceptado correctamente las condiciones de uso.</div>';
				return true;
			} else{
				echo '<div style="color:red">Debes aceptar las condiciones de uso.</div>';
				return flase;
			}

		}

	}


?>