<?php

function get_timestamp() {
	list($usec, $sec) = explode(" ",microtime());	
	return date("Y-m-d H:i:s " . $usec);
}

function jsonReadable($json, $html=FALSE) {
    $tabcount = 0;
    $result = '';
    $inquote = false;
    $ignorenext = false;

    if ($html) {
        $tab = "&nbsp;&nbsp;&nbsp;";
        $newline = "<br/>";
    } else {
        $tab = "\t";
        $newline = "\n";
    }

    for($i = 0; $i < strlen($json); $i++) {
        $char = $json[$i];

        if ($ignorenext) {
            $result .= $char;
            $ignorenext = false;
        } else {
            switch($char) {
                case '{':
                    $tabcount++;
                    $result .= $char . $newline . str_repeat($tab, $tabcount);
                    break;
                case '}':
                    $tabcount--;
                    $result = trim($result) . $newline . str_repeat($tab, $tabcount) . $char;
                    break;
                case ',':
                    $result .= $char . $newline . str_repeat($tab, $tabcount);
                    break;
                case '"':
                    $inquote = !$inquote;
                    $result .= $char;
                    break;
                case '\\':
                    if ($inquote) $ignorenext = true;
                    $result .= $char;
                    break;
                default:
                    $result .= $char;
            }
        }
    }

    return $result;
}


function var2html($var) {

	return jsonReadable(json_encode($var), true);
}


function debug_echo($var_name_or_line, $var_value = null) {

	$line = $var_name_or_line;
	if($var_value != null) {
		$line = $var_name_or_line . ' = ' . var2html(htmlspecialchars(json_encode($var_value)));
	}
	echo '<p>' . $line . '</p>';	
}


// elimina el alemento de clave $value del array $vector recibido
// equivale a hacer unset pero ademas eliminar la entrada del array
function unset_and_remove_value( array $vector, $value ) {
	
	$result = array();
	foreach( $vector as $element ) {
		if( $element != $value ) {
			$result[] = $element;
		}
	}
	
	return $result;

}


// hace un array_merge pero sin reescribir las claves numericas
function array_merge_assoc( &$array1, $array2 ) {
	
	//$result = array();
	foreach( $array2 as $key => $value ) {
		$array1[$key] = $value;
	}

	return $array1;

}

/**
 * Agrega a la $_REQUEST todos los parametros presentes en la $_SESSION
 * observese que si un parametro existe en ambos scopes tendra prioridad el de la $_SESSION
 */
function session2request() {

	session_start();
	foreach( $_SESSION as $key => $value ) {
		$_REQUEST[$key] = $value;
	}
}

function get_real_ip_address()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function dia_semana($dia) {
	if( $dia == 'Monday' ) {
		return 'Lunes';
	} else if( $dia == 'Tuesday' ) {
		return 'Martes';
	} else if( $dia == 'Tuesday' ) {
		return 'Martes';
	} else if( $dia == 'Wednesday' ) {
		return 'Miércoles';
	} else if( $dia == 'Thursday' ) {
		return 'Jueves';
	} else if( $dia == 'Friday' ) {
		return 'Viernes';
	} else if( $dia == 'Saturday' ) {
		return 'Sábado';
	} else if( $dia == 'Sunday' ) {
		return 'Domingo';
	} else {
		return $dia;
	}
}

function eliminar_sql_injection($cadena) {
	return str_replace(";", "", $cadena);
}

// function show_error($dest_page = 'index.tpl', $error_message = null) {
	 
// 	$_REQUEST['error'] = $error_message;
	
// 	// mostramos la pantalla resultado
// 	$datalib->smarty->display_from_context($dest_page, $_REQUEST, $_SESSION);

// }

?>
