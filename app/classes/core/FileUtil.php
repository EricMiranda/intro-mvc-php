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
    define("APP_FILEUPLOAD_OK", 0);
    define("APP_FILEUPLOAD_ERROR_SIZE", 1);

    class FileUtil
    {
        public static function is_uploaded($field_id)
        {
            if (empty($_FILES))
            {
                return false;
            }
            return is_uploaded_file($_FILES[$field_id]['tmp_name']);
        }

        public static function save_file($field_id, $dest_path, $size_limit)
        {
            if ($_FILES[$field_id]["size"] < ($size_limit * 1024))
            {
                if ($_FILES[$field_id]["error"] > 0)
                {
                    throw new AppException("Error al subir archivo " . $_FILES[$field_id]["name"] . ": " . $_FILES[$field_id]["error"]);
                }
                else
                {
                    if(!move_uploaded_file($_FILES[$field_id]["tmp_name"], $dest_path))
                    {
                        throw new AppException("Error al subir archivo " . $_FILES[$field_id]["name"]);
                    }
                    return APP_FILEUPLOAD_OK;
                }
            }
            else
            {
                return APP_FILEUPLOAD_ERROR_SIZE;
            }
        }
        /* ++ mi funcion multi ++*/
        public static function save_filem($field_id,$dest_path,$size)
        {
            $archivos = count($_FILES[$field_id]['name']);
            for($i=0; $i<$archivos; $i++)
            {
                if ($_FILES[$field_id]["size"][$i] < ($size * 1024))
                {
                    if ($_FILES[$field_id]["error"][$i] > 0)
                    {
                        throw new AppException("Error al subir archivo -> " . $_FILES[$field_id]["name"][$i] . ": " . $_FILES[$field_id]["error"][$i]);
                    }
                    else
                    {
                        if(!move_uploaded_file($_FILES[$field_id]["tmp_name"][$i], $dest_path))
                        {
                            throw new AppException("Error al subir archivo = " . $_FILES[$field_id]["name"][$i]);
                        }
                    }
                }
                else
                {
                    return APP_FILEUPLOAD_ERROR_SIZE;
                }
            }
            return APP_FILEUPLOAD_OK;
        }

        static function get_file_ext($idName)
        {
            $name = $_FILES[$idName]['name'];
            $arr = explode(".", $name);
            $ext = strtolower($arr[count($arr)-1]);
            return $ext;
        }
    }

?>
