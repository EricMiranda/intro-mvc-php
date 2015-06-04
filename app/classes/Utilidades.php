<?php
#===================================================#
#     coded by: Moises Espindola         _    _    #
#     nick: zaer00t                     | |  (_)   #
#    ___  _ __   ___   __ _  ___   __ _ | |_  _    #
#   / __|| '__| / _ \ / _` |/ __| / _` || __|| |   #
#  | (__ | |   |  __/| (_| |\__ \| (_| || |_ | |   #
#   \___||_|    \___| \__,_||___/ \__,_| \__||_|   #
#                                                  #
#    e-mail: zaer00t@gmail.com                     #
#    www: http://creasati.com.mx                   #
#    date: 12/Septiembre/2012                      #
#    code name: creasati.com.mx                    #
#==================================================#

    class Utilidades
    {
        public static function limpiaCadena($cadena)
        {
            $cadena = str_replace( 'À', 'A', $cadena );
            $cadena = str_replace( 'Á', 'A', $cadena );
            $cadena = str_replace( 'È', 'E', $cadena );
            $cadena = str_replace( 'É', 'E;',$cadena );
            $cadena = str_replace( 'Ì', 'I', $cadena );
            $cadena = str_replace( 'Í', 'I', $cadena );
            $cadena = str_replace( 'Î', 'I', $cadena );
            $cadena = str_replace( 'Ï', 'I', $cadena );
            $cadena = str_replace( 'Ò', 'O', $cadena );
            $cadena = str_replace( 'Ó', 'O', $cadena );
            $cadena = str_replace( 'Ù', 'U', $cadena );
            $cadena = str_replace( 'Ú', 'U', $cadena );
            $cadena = str_replace( 'à', 'a', $cadena );
            $cadena = str_replace( 'á', 'a', $cadena );
            $cadena = str_replace( 'è', 'e', $cadena );
            $cadena = str_replace( 'é', 'e', $cadena );
            $cadena = str_replace( 'ì', 'i', $cadena );
            $cadena = str_replace( 'í', 'i', $cadena );
            $cadena = str_replace( 'ò', 'o', $cadena );
            $cadena = str_replace( 'ó', 'o', $cadena );
            $cadena = str_replace( 'ù', 'u', $cadena );
            $cadena = str_replace( 'ú', 'u', $cadena );
            $cadena = str_replace( '°', '', $cadena );
            $cadena = str_replace( '%', '', $cadena );
            $cadena = str_replace( '°', '',$cadena);
            $cadena = str_replace( '!', '',$cadena);
            $cadena = str_replace( '"', '',$cadena);
            $cadena = str_replace( '#', '',$cadena);
            $cadena = str_replace( '$', '',$cadena);
            $cadena = str_replace( '%', '',$cadena);
            $cadena = str_replace( '&', '',$cadena);
            $cadena = str_replace( '/', '',$cadena);
            $cadena = str_replace( '(', '',$cadena);
            $cadena = str_replace( ')', '',$cadena);
            $cadena = str_replace( '=', '',$cadena);
            $cadena = str_replace( '?', '',$cadena);
            $cadena = str_replace( '¡', '',$cadena);
            $cadena = str_replace( '¿', '',$cadena);
            $cadena = str_replace( '\'', '',$cadena);
            $cadena = str_replace( '|', '',$cadena);
            $cadena = str_replace( '\\', '',$cadena);
            $cadena = str_replace( '^', '',$cadena);
            $cadena = str_replace( '~', '',$cadena);
            $cadena = str_replace( '@', '',$cadena);
            return $cadena;
        }

        public static function set_utf8($string)
        {
            return utf8_encode($string);
        }

        //metodo para remplazar el width o height de fuentes como imagenes
        //o iframes entre otras
        public static function replaceWH($fuente,$w='100%',$h='')
        {
            $fuente;
            $w='width="'.$w.'"';
            $h='height="'.$h.'"';
            preg_match_all('/(width=("|\')[0-9]{3,}("|\'))/i',$fuente,$width);
            preg_match_all('/(height=("|\')[0-9]{3,}("|\'))/i',$fuente,$height);

            $salida=str_replace(array_shift($width[0]),$w,$fuente);
            $salida=str_replace(array_shift($height[0]),$h,$salida);

            return $salida;
        }

        public static function cortaTexto($Txt, $Largo='200')
        {
            $Txt = substr($Txt, 0, $Largo);
            $posicion = strrpos($Txt, " ");
            $Txt = substr($Txt, 0, $posicion);
            return $Txt;
        }
        
        /*
        	METODO EXPERIMENTAL PARA CONSTRUIR LOS SETTERS Y GETTERS
        	COMO PARAMETROS:
        	$db CONEXION A BASE DE DATOS
        	$tabla TABLA A LA CUAL SE REALIZARA EL BARRIDO DE VARS
        	$salida (OPCIONAL) DETERMINA SI LA SALIDA ES POR ARCHIVO
        */
        public static function buildSetGet($db,$tabla)
        {
			#$r1=$db->select($tabla,"*","id>0",array(null));
			$r1 = $db->select("usuarios","*","id>0",array(0));
			if(empty($r1) || $r1==null)
			{
				throw  new AppException("error con la operacion");
			}
			else
			{
			    echo "vamos equipo vamos muy bien";
			}
			
        }
        
        public static function setMarca($imagen,$opacidad,$x,$y)
        {
			App::load_class("agua/ImageWorkshop");
			$norwayLayer = new ImageWorkshop(array(
				"imageFromPath" => $imagen
				));
				
			$watermarkLayer = new ImageWorkshop(array(
				"imageFromPath" => APP_IMG_PATH."/logo.png",
			));
				
			$watermarkLayer->opacity($opacidad);
			$norwayLayer->addLayer(1, 
			$watermarkLayer,$y, $y, "LB");
			$image = $norwayLayer->getResult();
			#header('Content-type: image/jpeg');
			imagejpeg($image, $imagen, 95); 
			#die();
        }
    }
?>
