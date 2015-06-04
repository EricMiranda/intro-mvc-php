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

class PageBuilder
{
	public static function header($title, $description, $css=null, $js=null, $width=1024,$img_fb='',$resumen_fb='') {
        $ga = '';
        $fb_appid = '591758137512355';

        App::load_view('header', array(
            'page_title' => $title,
            'page_description' => $description,
            'page_css' => $css,
            'page_js' => $js,
            'page_fb_appid' => $fb_appid,
            'page_ga' => $ga,
            'page_width' => $width,
            'img_fb'=>$img_fb,
            'resumen_fb'=>$resumen_fb,
        ));
    }

    public static function topbar($seccion) {
        App::load_view('topbar', array("seccion"=>$seccion));
    }

    public static function footer() {
        App::load_view('footer', array("", ""));
    }
}
?>
