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
class FormUtil
{
     public static function form_validation_rule($field, $r, $msg)
     {
         $rule = array();
         $rule['field'] = $field;
         $rule['rule'] = $r;
         $rule['msg'] = $msg;
         return $rule;
     }

     public static function validate_form($id, $rules, $confirm_msg = '', $execute_js = '', $submit = true) {
         ?>
        <script type="text/javascript">
            function validar_forma_<?=$id?>() {
                var formaVal = new Validator("<?=$id?>");
                formaVal.clearAllValidations();

                <? foreach($rules as $rule): ?>
                    formaVal.addValidation("<?=$rule['field']?>","<?=$rule['rule']?>", "<?=htmlspecialchars($rule['msg'])?>");
                <? endforeach; ?>

                if (document.<?=$id?>.onsubmit()) {
                    <? if ($confirm_msg != ''){?>
                            if(confirm("<?=htmlspecialchars($confirm_msg)?>")) {
                                <?=$execute_js?>
                                <? if ($submit): ?>document.<?=$id?>.submit(); <? endif; ?>
                            }
                    <? } else { ?>
                            <?=$execute_js?>
                            <? if ($submit): ?>document.<?=$id?>.submit();<? endif; ?>
                    <? } ?>
                }
            }
        </script>
         <?
     }

     public static function get_post_var($var) {
         if (isset($_POST[$var])) {
             return $_POST[$var];
         } else {
             return "";
         }
     }

     public static function fileupload($nombre, $width, $label_width = null, $label = "") {
        if ($label_width != null) {
            ?>
            <td style="width: <?=$label_width?>; padding-left: 25px" class="form_label"><?=$label?></td><td>
            <?
        }

        ?>
        <input type="file" name="<?=$nombre?>" style="width: <?=$width?>" value="" />
        <?

        if ($label_width != null) { echo "</td>"; }
    }
    /*
     public static function armaSelect($tabla,$id,$nombre,$class)
     {
          #<select id="clase" name="clase" class="input-small">
          #<option>AAA</option>	#<option>AA</option>
          #<option>xxx</option>
          #</select>
          $link = conectar(_DB_);
          $sql = "select * from ".$tabla.";";
          $r1 =ExQry($sql); //utilizamos ExQry xq queremos el ID de la tabla
          #debug("Categorias",$r1,1);
          echo "<select id='".$id."' name='".$nombre."' class='{$class}' required>";
          echo "<option value='0'>N/A</option>";
          foreach($r1 as $idx => $valor)
          {
               echo "<option value='".$idx."'>	".$valor['nombre']."</option>";
          }
          echo "</select>";
     }*/

    /*
     * construye un <selecte> a partir de una tabla,
     * la tabla debe contener id y nombre como campos
     * $tabla = tabla existente en base de datos
     * $id = nombre de ID para DOM
     * $nombre = nombre del select box
     * $class = estilo CSS para el select box
     * $val = (opcional) Setear este valor cuando se requiere cargar un valor predeterminado
     */
     public static function armaSelect($tabla,$id,$nombre,$class,$val='')
     {
          $db = new DataBase();
          $db->connect();

          #$r1 = $db->select($tabla,'id,nombre','id>?',array(0));
          $r1 = $db->select($tabla, "id,nombre", "id>? order by id asc", array(0));
          $optionselect="<select id='".$id."' name='".$nombre."' class='{$class}' required>";
          $valores='';
          $item='';
          if((count($r1)>0) and $r1!=null)
          {
               foreach($r1 as $idx => $valor)
               {
                    #Util::debug('valor linea 281',$valor,1,1);
                    $no = $idx+1;
                    if($val==$no) $item='selected';else $item='';
                    $valores.='<option value="'.$no.'" '.$item.'>'.$valor['nombre'].'</option>';
               }
          }
          else
          {
               return null;
          }
          return $optionselect.$valores."</select>";
     }

     /*
     * construye un <selecte> dependiente de un select primario
     * la tabla debe contener id y nombre como campos
     * $tabla = tabla existente en base de datos
     * $no = el ID de referencia para armar el select
     * $id = nombre de ID para DOM
     * $nombre = nombre del select box
     * $class = estilo CSS para el select box
     */
     public static function armaDSelect($tabla,$no,$id,$nombre,$class,$val='')
     {
          $db = new DataBase();
          $db->connect();

          #$r1 = $db->select($tabla,'id,nombre','id>?',array(0));
          $r1 = $db->select($tabla, "id,id_marca,nombre", "id_marca=?", array($no));
          $optionselect="<select id='".$id."' name='".$nombre."' class='{$class}' required>";
          $valores='';
          $item='';
          if((count($r1)>0) and $r1!=null)
          {
               foreach($r1 as $idx => $valor)
               {
                    #Util::debug('valor linea 281',$valor,1,1);
                    if($val==$valor['id'])$item='selected'; else $item='';
                    $valores.='<option value="'.$valor['id'].'" '.$item.'>'.$valor['nombre'].'</option>';
               }
          }
          else
          {
               return null;
          }
          return $optionselect.$valores."</select>";
     }
     /*
      *   metodo para generar un select box con una lista determinada
      *   $desde = valor inicial
      *   $hasta = valor final
      *   $desde siempre debe ser menor a $hasta
      */
     public static function armaSelectAnio($desde,$hasta,$class,$val='')
     {
          $optionselect="<select id='anio' name='anio' class='{$class}' required>";
          $valores='';$item='';
          for(;$desde<=$hasta;$hasta--)
          {
               if($val==$hasta)$item='selected'; else $item='';
               $valores.='<option value="'.$hasta.'" '.$item.'>'.$hasta.'</option>';
          }
          return $optionselect.$valores."</select>";
     }

     public static function armaForm($params)
     {
          /*FormUtil::get_post_var(1)*/
          $codigo='';
          foreach($_REQUEST as $val => $x)
          {
               $codigo.='FormUtil::get_post_var("'.$val.'"),<br>';
          }
          return $codigo;
     }
}
?>