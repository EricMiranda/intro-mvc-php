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
class DataBase2 {
    /** @var \PDO Controlador PHP Data Objects */
    private $_driver;

    /** @var int No retorna ningún valor la secuencia SQL */
    public static $QUERY_RETURN_VALUE_NONE = 0;

    /** @var int Retorna el último valor dado por last_insert_id en operaciones INSERT */
    public static $QUERY_RETURN_VALUE_LASTID = 1;

    /** @var int Retorna un array con las columnas y filas de una operación SELECT */
    public static $QUERY_RETURN_VALUE_ARRAY = 2;

    /** @var int Retorna el primer valor de la primera columna y primera fila de una operación SELECT */
    public static $QUERY_RETURN_VALUE_FIRSTCOLUMN = 3;

    /**
     * Constructor
     * @throws AppException
     */
    public function __construct() {
        try {
            $this->_driver = new \PDO('mysql:host=' . APP_DB_HOST2 . ';dbname=' . APP_DB_CATALOG2, APP_DB_USER2, APP_DB_PASSWORD2);
            $this->_driver->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->_driver->exec("SET NAMES 'utf8'");
        } catch (\Exception $ex) {
            throw new AppException('Error al establecer conexión: ' . $ex->getMessage());
        }
    }

    /**
     * Destructor
     */
    public function __destruct() {
        $this->_driver = null;
    }

    /**
     * Desactiva el Autocommit de MySQL
     * @throws AppException
     */
    public function disableAutocommit() {
        try {
            $this->_driver->exec('SET autocommit=0');
        } catch (\Exception $ex) {
            throw new AppException('Error al desactivar autocommit: ' . $ex->getMessage(), 'SET autocommit=0');
        }
    }

    /**
     * Inicia una transacción
     * @throws AppException
     */
    public function startTransaction() {
        try {
            if (!$this->_driver->beginTransaction()) {
                throw new AppException('Error al iniciar transacción SQL');
            }
        } catch (\Exception $ex) {
            throw new AppException('Error al iniciar transacción SQL', $ex->getMessage());
        }
    }

    /**
     * Ejecuta la transacción (los cambios realizados por ésta surten efecto permanentemente)
     * @throws AppException
     */
    public function commitTransaction() {
        try {
            if (!$this->_driver->commit()) {
                throw new AppException('Error al ejecutar transacción SQL');
            }
        } catch (\Exception $ex) {
            throw new AppException('Error al ejecutar transacción SQL: ' . $ex->getMessage());
        }
    }

    /**
     * Cancela la transacción y los cambios realizados por ella
     * @throws AppException
     */
    public function rollbackTransaction() {
        try {
            if (!$this->_driver->rollBack()) {
                throw new AppException('Error al ejecutar cancelar SQL');
            }
        } catch (\Exception $ex) {
            throw new AppException('Error al cancelar transacción SQL: ' . $ex->getMessage());
        }
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
    public function execute($sql, $data = null, $returnValue = 0) {
        try {
            $statement = $this->_driver->prepare($sql);

            if ($data != null) {
                $statement->execute($data);
            } else {
                $statement->execute();
            }

            //Clasifica valor de regreso
            switch($returnValue) {
                case DataBase::$QUERY_RETURN_VALUE_LASTID:
                    $id = $this->_driver->lastInsertId();
                    $statement->closeCursor();
                    return $id;
                    break;

                case DataBase::$QUERY_RETURN_VALUE_ARRAY:
                    $array = array();

                    while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                        $array[] = $row;
                    }

                    $statement->closeCursor();
                    return $array;
                    break;

                case DataBase::$QUERY_RETURN_VALUE_FIRSTCOLUMN:
                    if ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                        $temp = array_values($row);
                        $value = $temp[0];
                    } else {
                        $value = null;
                    }

                    $statement->closeCursor();
                    return $value;
                    break;

                default: $statement->closeCursor(); break;
            }
        } catch (\Exception $ex) {
            throw new AppException('Error al ejecutar secuencia SQL: ' . $ex->getMessage());
        }
    }

    /**
     * Inserta un array de datos en una tabla a través del comando SQL: INSERT
     * @param string $table Nombre de la tabla en donde se insertará el array
     * @param array $data Array de datos a insertar (el array debe ser $arr[nombre_campo]=valor_campo)
     * @return int id de la fila recíen insertada (aplica en tablas con auto inc primary key)
     * @throws AppException
     */
    public function insert($table, $data) {
        if (\is_array($data)) {
            $keys = \array_keys($data);
            $values = \array_values($data);

            $c_keys = \count($keys);

            //Encierra nombres de campos entre ``
            for ($i = 0; $i < $c_keys; $i++) $keys[$i] = "`$keys[$i]`";

            $sql = "INSERT INTO `$table` (" . \implode(',', $keys) . ') VALUES (' . \substr(\str_repeat('?,', $c_keys), 0, -1) . ')';

            return $this->execute($sql, $values, DataBase::$QUERY_RETURN_VALUE_LASTID);
        } else {
            throw new AppException('Error el ejecutar INSERT: se requiere un array');
        }
    }

    /**
     * Inserta o remplaza un array de datos en una tabla a través del comando SQL: REPLACE
     * @param string $table Nombre de la tabla en donde se insertará el array
     * @param array $data Array de datos a insertar (el array debe ser $arr[nombre_campo]=valor_campo)
     * @throws AppException
     */
    public function replace($table, $data) {
        if (\is_array($data)) {
            $keys = \array_keys($data);
            $values = \array_values($data);

            $c_keys = \count($keys);

            //Encierra nombres de campos entre ``
            for ($i = 0; $i < $c_keys; $i++) $keys[$i] = "`$keys[$i]`";

            $this->execute("REPLACE INTO `$table` (" . \implode(',', $keys) . ') VALUES (' . \substr(\str_repeat('?,', $c_keys), 0, -1) . ')', $values, DataBase::$QUERY_RETURN_VALUE_NONE);
        } else {
            throw new AppException('Error el ejecutar REPLACE: se requiere un array');
        }
    }

    /**
     * Obtiene un array de datos a través del comando SQL: SELECT
     * @param string $table Nombre de la tabla en donde se aplicará el select
     * @param string $fields Campos o campos a obtener (separados por coma ,)
     * @param string $where Cláusula WHERE para el comando SELECT (opcional)
     * @param array $data Array de datos para sustituir place holders ? en claúsula WHERE (opcional)
     * @param boolean $forUpdate TRUE para ejecutar SELECT en modo bloqueo de lectura (para operaciones transaccionales)
     * @param boolean $returnOnlyFirstColumn TRUE para retornar solo el primer valor de la primera columna y fila de los resultados
     * @return array Arreglo de resultados del comando SELECT cuando $returnOnlyFirstColumn es FALSE
     * @return string Primer valor de la primera columna y fila de los resultados cuando $returnOnlyFirstColumn es TRUE
     */
    public function select($table, $fields, $where = null, $data = null, $forUpdate = false, $returnOnlyFirstColumn = false) {
        $sql = "SELECT $fields FROM $table";

        if ($where != null) {
            $sql.= " WHERE $where";
        }

        if($forUpdate) $sql.= ' FOR UPDATE';

        if (!$returnOnlyFirstColumn) {
            return $this->execute($sql, $data, DataBase::$QUERY_RETURN_VALUE_ARRAY);
        } else {
            return $this->execute($sql, $data, DataBase::$QUERY_RETURN_VALUE_FIRSTCOLUMN);
        }
    }

    /**
     * Actualiza datos en una tabla a través de un array de datos y el comando SQL: UPDATE
     * @param type $table Nombre de la tabla a actualizar
     * @param type $data Array de datos a actualizar (el array debe ser $arr[nombre_campo]=valor_campo)
     * @param type $where Cláusula WHERE para el comando UPDATE (opcional)
     * @param type $whereData Array de datos para sustituir place holders ? en claúsula WHERE (opcional)
     * @throws AppException
     */
    public function update($table, $data, $where = null, $whereData = null) {
        if (\is_array($data)) {
            $sql = "UPDATE `$table` SET ";
            $keys = \array_keys($data);

            if ($where != null && $whereData != null) {
                $values = \array_merge(\array_values($data), $whereData);
            } else {
                $values = \array_values($data);
            }

            $c_keys = \count($keys);

            //Completa secuencia SQL con place holders `nombre_campo`=?
            for ($i = 0; $i < $c_keys; $i++) {
                $sql.= "`$keys[$i]`=?";
                if ($i < $c_keys-1) $sql.=',';
            }

            if ($where != null) {
                $sql.= " WHERE $where";
            }

            $this->execute($sql, $values);
        } else {
            throw new AppException('Error el ejecutar UPDATE: se requiere un array');
        }
    }

    /**
     * Elimina datos de una tabla a través del comando: DELETE
     * @param type $table Nombre de la tabla en donde se borrarán datos
     * @param type $where Cláusula WHERE para el comando DELETE (opcional)
     * @param type $whereData Array de datos para sustituir place holders ? en claúsula WHERE (opcional)
     */
    public function delete($table, $where = null, $whereData = null) {
        $sql = "DELETE FROM `$table`";

        if ($where != null) $sql.= " WHERE $where";

        if ($whereData != null && $where != null) {
            $this->execute($sql, $whereData);
        } else {
            $this->execute($sql);
        }
    }
}

?>
