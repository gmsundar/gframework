<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of global_db
 *
 * @author gt
 */
Class cDatabase extends PDO {

    public $dbObj;
    public $query;
    private $connection;
    public $sql;
    public $error;
    public $availableDrivers;
    public $database = DataBaseName;
    public $host = DataBaseHost;
    public $user = DataBaseUser;
    public $password = DataBasePass;
    public $file = DataBaseFile;
    public $dbtype = DataBaseType;
    public $port = DataBasePort;

    public function __construct() {

        $this->availableDrivers = $this->getAvailableDrivers();


        //$this->connection->exec("SET CHARACTER SET utf8");
    }

    public function getConnection() {
        if ($this->connection === null) {

            try {
                switch ($this->dbtype) {
                    case "mssql":
                        $this->connection = new PDO("mssql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
                        break;
                    case "sqlsrv":
                        $this->connection = new PDO("sqlsrv:server=" . $this->host . ";database=" . $this->database, $this->user, $this->password);
                        break;
                    case "ibm": //default port = ?
                        $this->connection = new PDO("ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE=" . $this->database . "; HOSTNAME=" . $this->host . ";PORT=" . $this->port . ";PROTOCOL=TCPIP;", $this->user, $this->password);
                        break;
                    case "dblib": //default port = 10060
                        $this->connection = new PDO("dblib:host=" . $this->host . ":" . $this->port . ";dbname=" . $this->database, $this->user, $this->password);
                        break;
                    case "odbc":
                        $this->connection = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=" . $this->file . "Uid=" . $this->user);
                        break;
                    case "oracle":
                        $this->connection = new PDO("OCI:dbname=" . $this->database . ";charset=UTF-8", $this->user, $this->password);
                        break;
                    case "ifmx":
                        $this->connection = new PDO("informix:DSN=InformixDB", $this->user, $this->password);
                        break;
                    case "fbd":
                        $this->connection = new PDO("firebird:dbname=" . $this->host . ":" . $this->database, $this->user, $this->password);
                        break;
                    case "mysql":
                        $this->connection = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database, $this->user, $this->password);
                        break;
                    case "sqlitefromfile": //ej: "sqlite:/path/to/database.sdb"
                        $this->connection = new PDO("sqlite:" . $this->file);
                        break;
                    case "sqlitememory":
                        $this->connection = new PDO("sqlite::memory");
                        break;
                    case "pgsql":
                        $this->connection = (is_numeric($this->port)) ? new PDO("pgsql:dbname=" . $this->database . ";port=" . $this->port . ";host=" . $this->host, $this->user, $this->password) : new PDO("pgsql:dbname=" . $this->database . ";host=" . $this->host, $this->user, $this->password);
                        break;
                    default:
                        $this->connection = null;
                        break;
                }
            } catch (PDOException $e) {
                $this->error = "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return $this->connection;
    }

    function executeRead() {
        try {
            $this->getConnection();
            $this->beginTransaction();
            $dbobj = $this->connection->prepare($this->query);
            $dbobj->execute();
            $res = $dbobj->fetchAll(PDO::FETCH_ASSOC);
            $this->commit();
            return $res;
        } catch (PDOException $e) {
            $this->error = "Error: " . $e->getMessage();
            $this->rollBack();
            return false;
        }
    }

    function executeWrite() {

        try {
            if (!preg_match('/^\s*(insert|update|delete|replace)/i', $this->query)) {
                throw new PDOException("SQL statement not supported");
            }
            $this->getConnection();
            $this->beginTransaction();
            $dbobj = $this->connection->prepare($this->query);
            $dbobj->execute();
            $this->commit();
            if (preg_match('/^\s*(insert|replace)/i', $this->query)) {

                return $dbobj->lastInsertId();
            } elseif (preg_match('/^\s*(delete|update)/i', $this->sql)) {
                return $dbobj->rowCount();
            }
        } catch (PDOException $e) {
            $this->error = "Error: " . $e->getMessage();
            $this->rollBack();
            return false;
        }
    }

    function beginTransaction() {
        $this->connection->beginTransaction();
    }

    function commit() {
        $this->connection->commit();
    }

    function rollBack() {
        parent::rollBack();
    }

    /*
     * Meta data functions
     */

    public static function getAvailableDrivers() {
        return PDO::getAvailableDrivers();
    }

    function getCurrVal($seq_name) {
        $this->query = "Select seq_value,increment_factor,pad_count,pad_char,pad_type,table_name,column_name from __sequence where seq_name='" . $seq_name . "'";
        return $this->executeRead();
    }

    function getChildTables($table) {
        switch ($this->dbtype) {
            case 'mysql':

                $this->query = "select column_name,referenced_column_name,referenced_table_name from information_schema.key_column_usage where table_name='" . $table . "' and `table_schema`='" . $this->database . "'";

                break;
        }
        $ForeignKeyDetailsArray = $this->executeRead();
        if (is_array($ForeignKeyDetailsArray)) {
            foreach ($ForeignKeyDetailsArray as $key => $value) {
                $ForeignKeyDetailsArray['columns'][] = $value['column_name'];
            }
        }
        return $ForeignKeyDetailsArray;
    }

}

?>
