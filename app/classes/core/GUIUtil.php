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
class GUIUtil {

    public static function error_msg($tipo, $titulo, $msg, $redirect = "javascript:window.history.back()") {
        ?>
        <div style="padding: 20px; border: 2px solid red">
            <!-- <p><?=$tipo?></p>-->
            <p><?=$titulo?></p>
            <p><?=$msg?></p>
        </div>
        <?
        exit();
    }
}

?>
