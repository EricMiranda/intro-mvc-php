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

class Util {
    public static function resumir_html($info, $len) {
        return utf8_encode(substr(strip_tags(html_entity_decode($info)), 0, $len));
    }

    public static function gen_rand_str() {
        return uniqid() . uniqid();
    }

    public static function toupper($str) {
        return strtr(strtoupper($str),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
    }

    public static function tolower($str) {
        return strtr(strtolower($str),"ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ", "àèìòùáéíóúçñäëïöü");
    }

    public static function int_to_bool($int_val) {
        if (((int) $int_val) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function bool_to_int($bool_val) {
        if ($bool_val) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function url($controller, $function, $params) {
        $url = APP_HOST_URL;

        if ($controller != "") {
            $url .= "/" . $controller;
        }

        if ($function != "") {
            $url .= "/" . $function;
        }

        if ($params != NULL && count($params) > 0) foreach($params as $param) {
            $url .= "/" . $param;
        }

        return $url;
    }

    public static function navbar_array($anchor, $url) {
        $link = array();
        $link["anchor"] = $anchor;
        $link["url"] = $url;
        return $link;
    }

    public static function alert($msg) {
        ?>
        <script type="text/javascript">
            alert("<?=$msg?>");
        </script>
        <?
    }

    public static function alert_and_redirect($msg, $url) {
        ?>
        <script type="text/javascript">
            alert("<?=$msg?>");
            window.location.href = '<?=$url?>';
        </script>
        <?
    }

    public static function alert_and_redirectparent($msg, $url) {
        ?>
        <script type="text/javascript">
            alert("<?=$msg?>");
            parent.location.href = '<?=$url?>';
        </script>
        <?
    }

    public static function alert_and_close($msg) {
        ?>
        <script type="text/javascript">
            alert("<?=$msg?>");
            close();
        </script>
        <?
    }

    public static function redirect($url) {
        header('Location: ' . $url) ;
        exit();
    }

    public static function js_redirect($url) {
        ?>
        <script type="text/javascript">
            window.location.href = '<?=$url?>';
        </script>
        <?
    }

    public static function strtolower($str) {
        $str = mb_strtolower($str, 'UTF-8');
        $chars = array("/","\\","=","!","¡","%","'",'"',"&","+","$","#","*","(",")","{","}","<",">","~","^","[","]","?",".",":","¿","´","`","|","°","@");
        $str = str_replace(" ", "_", $str);

        foreach($chars as $char) {
            $str = str_replace($char, "", $str);
        }

        return $str;
    }

    public static function format_money($num) {
        return "$ " . number_format($num/100, 2, '.', ',');
    }

    public static function to_money($num) {
        return (int)((double)$num * 100);
    }

    public static function get_array_paises() {
        return array(
            "Afghanistan",
            "Albania",
            "Algeria",
            "Andorra",
            "Angola",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bhutan",
            "Bolivia",
            "Bosnia and Herzegovina",
            "Botswana",
            "Brazil",
            "Brunei",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Cape Verde",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Colombi",
            "Comoros",
            "Congo (Brazzaville)",
            "Congo",
            "Costa Rica",
            "Cote d'Ivoire",
            "Croatia",
            "Cuba",
            "Cyprus",
            "Czech Republic",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "East Timor (Timor Timur)",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Ethiopia",
            "Fiji",
            "Finland",
            "France",
            "Gabon",
            "Gambia, The",
            "Georgia",
            "Germany",
            "Ghana",
            "Greece",
            "Grenada",
            "Guatemala",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Honduras",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Ireland",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Korea, North",
            "Korea, South",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Macedonia",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Mauritania",
            "Mauritius",
            "Mexico",
            "Micronesia",
            "Moldova",
            "Monaco",
            "Mongolia",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepa",
            "Netherlands",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Poland",
            "Portugal",
            "Qatar",
            "Romania",
            "Russia",
            "Rwanda",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Vincent",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia and Montenegro",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Swaziland",
            "Sweden",
            "Switzerland",
            "Syria",
            "Taiwan",
            "Tajikistan",
            "Tanzania",
            "Thailand",
            "Togo",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Vatican City",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Zambia",
            "Zimbabwe"
        );
    }

    static function pack_js($script) {
        $packer = new JavaScriptPacker($script, "Normal", true, false);
        return $packer->pack();
    }
    /*
     *	funcion para mostrar datos de debug esta funcion cuenta con 3 parametros, 2
     *	obligatorios y uno opcional, se entiende asi que no pasare a mas explicacion.
     */
    public static function debug($cadena,$status=1,$die=0,$desc='')
    {
        //si "$status == 0" no mostramos nada
        if($status!=1)
        {
            return 0;
        }
        else
        {
            echo "<h3 style='font-size:12px; font-family:Courier,sans-serif; color:#248;'>".$desc."</h3>";
            echo "<pre>";
            print_r($cadena);
            echo "</pre>::";
        }
        if($die==1)die();
    }

}

?>
