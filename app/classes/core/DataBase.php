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

class DataBase {

    /** @var mysqli */
    private $drv;

    function connect() {
        $this->drv = new mysqli(APP_DB_HOST, APP_DB_USER, APP_DB_PASSWORD, APP_DB_CATALOG);
        $this->utf8Mode();
    }

    function disconnect() {
        $this->drv->close();
    }

    function __destruct() {
        $this->disconnect();
    }

    public function utf8Mode() {
        $this->drv->query("SET NAMES 'utf8'");
    }

    private function getTypeString($data) {
        $str = "";

        foreach($data as $value) {
            $str .= substr(gettype($value), 0, 1);
        }

        return $str;
    }

    private function refValues($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
        {
            $refs = array();
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }

    private function bindParam($stmt, $data)
    {
        if(!call_user_func_array(array($stmt, "bind_param"), $this->refValues(array_merge(array($this->getTypeString($data)), $data)))) {
            throw new Exception("Error durante binding MySQL");
        }
    }

    private function fetchObject($stmt) {
        $meta = $stmt->result_metadata();
        $fields = $meta->fetch_fields();

        foreach($fields as $field) {
            $result[$field->name] = "";
            $resultArray[$field->name] = &$result[$field->name];
        }

        $rows = null;

        call_user_func_array(array($stmt, 'bind_result'), $resultArray);
        while($stmt->fetch()) {
            $resultObject = new stdClass();

            foreach ($resultArray as $key => $value) {
                $resultObject->$key = $value;
            }

            $rows[] = $resultObject;
        }

        return $rows;
    }

    private function fetchArray($stmt) {
        $meta = $stmt->result_metadata();
        $fields = $meta->fetch_fields();

        foreach($fields as $field) {
            $result[$field->name] = "";
            $resultArray[$field->name] = &$result[$field->name];
        }

        $rows = null;

        call_user_func_array(array($stmt, 'bind_result'), $resultArray);
        while($stmt->fetch()) {
            $arr = array();

            foreach ($resultArray as $key => $value) {
                $arr[$key] = $value;
            }

            $rows[] = $arr;
        }

        return $rows;
    }

    function insert($table, $data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO " . $this->drv->escape_string($table) . " (";
        $query2 = ") VALUES (";
        for ($i = 0; $i < count($keys); $i++)
        {
            $query .= $keys[$i];
            $query2 .= "?";

            if ($i < count($keys)-1) {
                $query .= ",";
                $query2 .= ",";
            }
        }

        $query2 .= ")";

        $stmt = $this->drv->prepare($query . $query2);

        $this->bindParam($stmt, $data);
        if(!$stmt->execute()) {
            throw new Exception("Error Mysql (" . $stmt->errno . ") " . $query . $query2);
        }

        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }

    function select($table, $fields, $where, $data) {
        $query = "SELECT " . $this->drv->escape_string($fields) . " FROM " . $this->drv->escape_string($table) . " WHERE " . $where;
        $stmt = $this->drv->prepare($query);

        $this->bindParam($stmt, $data);

        if(!$stmt->execute()) {
            throw new Exception("Error Mysql (" . $stmt->errno . ")");
        }

        $result = $this->fetchArray($stmt);
        $stmt->close();
        return $result;
    }

    function update($table, $data, $where, $data2)
    {
        $query = "UPDATE " . $this->drv->escape_string($table) . " SET ";
        $keys = array_keys($data);

        for ($i = 0; $i < count($keys); $i++) {
            $query .= $keys[$i] . "=?";

            if ($i < count($keys) - 1) {
                $query .= ",";
            }
        }

        $query .= " WHERE " . $where;

        $stmt = $this->drv->prepare($query);

        $this->bindParam($stmt, array_merge($data, $data2));
        if(!$stmt->execute()) {
            throw new Exception("Error Mysql (" . $stmt->errno . ")");
        }

        $rows = $stmt->affected_rows;
        $stmt->close();
        return $rows;
    }

    function updateIncField($table, $field, $where, $data) {
        $field = $this->drv->escape_string($field);
        $query = "UPDATE " . $this->drv->escape_string($table) . " SET " . $field . "=" . $field . "+1 WHERE " . $where;

         $stmt = $this->drv->prepare($query);

        $this->bindParam($stmt, $data);

        if(!$stmt->execute()) {
            throw new Exception("Error Mysql (" . $stmt->errno . ")");
        }

        $rows = $stmt->affected_rows;
        $stmt->close();
        return $rows;
    }

    function delete($table, $where, $data) {
        $query = "DELETE FROM " . $this->drv->escape_string($table) . " WHERE " . $where;

        $stmt = $this->drv->prepare($query);

        $this->bindParam($stmt, $data);

        if(!$stmt->execute()) {
            throw new Exception("Error Mysql (" . $stmt->errno . ")");
        }

        $rows = $stmt->affected_rows;
        $stmt->close();
        return $rows;
    }
        /**
     * Ejecuta una secuencia SQL sobre la base de datos, la secuencia soporta place holders ? (prepared statement)
     * @param string $sql Secuencia / Comando a ejecutar
     * @param array $data Array con los datos por los que los place holders ? serán sustituidos
     * @param int $returnValue Tipo de datos que retornará la secuencia, valores posibles definidos por \model\core\DataBase::$QUERY_RETURN_VALUE_*
     * @return int En secuencias INSERT con valor de regreso $QUERY_RETURN_VALUE_LASTID
     * @return array En secuencias SELECT con valor de regreso $QUERY_RETURN_VALUE_ARRAY
     * @return string En secuencias SELECT con valor de regreso $QUERY_RETURN_VALUE_FIRSTCOLUMN
     * @throws AppException
     */
    public function execute($sql, $data = null, $returnValue = 0)
    {
    	$statement = $this->drv->prepare($sql);
    	$statement->execute();
    	return $statement;
    }
    public function fArray($stmt) {
		$meta = $stmt->result_metadata();
		$fields = $meta->fetch_fields();

		foreach($fields as $field) {
			$result[$field->name] = "";
			$resultArray[$field->name] = &$result[$field->name];
		}

		$rows = null;

		call_user_func_array(array($stmt, 'bind_result'), $resultArray);
		while($stmt->fetch()) {
			$arr = array();

			foreach ($resultArray as $key => $value) {
				$arr[$key] = $value;
			}

			$rows[] = $arr;
		}

		return $rows;
	}
}

?>
