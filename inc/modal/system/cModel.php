<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cModal
 *
 * @author gt
 */
include_once('cDatabase.php');

class cModel extends cDatabase {

    public $column; //what columns to be queried or set or deleted
    public $parent_only; //whether to restrict the query to only one table
    public $table;
    public $join_condition;
    public $condition;
    public $group_by;
    public $having;
    public $order_by;
    public $limit;
    public $offset_by;
    public $sub_query;
    public $query;
    public $exclude_columns = "";
    public $returning;
    public $debug = false;

    public function __construct() {
        parent::__construct();
    }

    function resetQuery() {
        if ($this->debug) {
            echo $this->query;
        }
        unset($this->column, $this->parent_only, $this->table, $this->join_condition, $this->condition, $this->group_by, $this->having, $this->order_by, $this->limit, $this->offset_by, $this->sub_query, $this->exclude_columns);
    }

    public function create() {
        //$foreignkeycolumns = $this->getForeignKeyDetails($this->table);
        if (is_array($foreignkeycolumns['columns'])) {
            foreach ($this->column as $columnname => $value) {
                if (array_key_exists($this->column[$columnname], $foreignkeycolumns['columns'])) {
                    $this->column[$columnname] = $this->column[$columnname] ? $this->column[$columnname] : "NULL";
                }
            }
        }
        $this->query = "INSERT INTO " . $this->table;
        $columnNames = '';

        foreach ($this->column as $columnName => $columnValue) {

            if ($columnValue != '' || $columnValue !== NULL) {
                $columnNames[$columnName] = $columnValue;
            }
        }
        $this->query.= ( $columnNames) ? " (`" . implode('`,`', array_keys($columnNames)) . "`) VALUES ('" . implode("','", array_values($columnNames)) . "')" : "";
        $this->query.= ( $this->returning) ? " RETURNING " . $this->returning : "";
        $this->query.= ( $this->sub_query) ? $this->sub_query : "";
        $this->query.=";";
        $this->resetQuery();
        return $this;
    }

    public function select() {
        $this->query = "SELECT ";
        $this->query.= ( $this->column) ? (is_array($this->column)) ? implode(',', $this->column) : $this->column  : " * ";
        $this->query.=" FROM " . $this->parent_only . " " . $this->table . " ";
        $this->query.= ( $this->join_condition) ? " " . ((is_array($this->join_condition)) ? implode(' ', $this->join_condition) : $this->join_condition) : "";
        $this->query.=$this->condition . $this->group_by . $this->having . $this->order_by . $this->limit . $this->offset_by;
        $this->resetQuery();
        return $this;
    }

    public function update() {
        $columnNames = '';
        foreach ($this->column as $columnName => $columnValue) {

            if ($columnValue != '' || $columnValue !== NULL) {
                $columnNames[] = $columnName . " = '" . $columnValue . "'";
            }
        }
        $this->query = "UPDATE " . $this->parent_only . " " . $this->table . " SET " . implode(",", $columnNames) . "" . $this->condition;

        $this->resetQuery();
        return $this;
    }

    public function alter() {

        foreach ($this->column as $columnName => $columnValue) {

            if ($columnValue != '' || $columnValue !== NULL) {
                $columnNames[] = $columnName . " = '" . $columnValue . "'";
            }
        }
        $this->query = "ALTER TABLE " . $this->table . " SET " . implode(",", $columnNames) . "" . $this->condition;

        $this->resetQuery();
        return $this;
    }

    public function delete() {

        $this->query = "DELETE FROM " . $this->parent_only . " " . $this->table . $this->condition;
        $this->resetQuery();
        return $this;
    }

    public function addWhereCondition($condition) {

        $this->condition = ($condition) ? " WHERE " . ((is_array($condition)) ? implode(' AND ', $condition) : $condition) : "";

        return $this;
    }

    public function addGroupBy($group_by) {
        $this->group_by = ($group_by) ? " GROUP BY " . ((is_array($group_by)) ? implode(', ', $group_by) : $group_by) : "";
        return $this;
    }

    public function addHaving($having) {
        $this->having = ($having) ? " HAVING " . ((is_array($having)) ? implode(' AND ', $having) : $having) : "";
        return $this;
    }

    public function addOrderBy($order_by) {

        $this->order_by = ($order_by) ? " ORDER BY " . ((is_array($order_by)) ? implode(', ', $order_by) : $order_by) : "";
        return $this;
    }

    public function addLimit($limit) {
        $this->limit = ($limit) ? " LIMIT " . $limit : "";
        return $this;
    }

    public function addOffsetBy($offset_by) {

        $this->offset_by = ($offset_by) ? " OFFSET " . $offset_by : "";
        return $this;
    }

    function getColumnDetails($table) {
        switch ($this->dbtype) {
            case 'mysql':

                $this->query = "select c.table_schema,c.table_name,c.column_name,is_nullable,c.ordinal_position,column_default,data_type, character_maximum_length,character_octet_length,column_type,extra,column_key from information_schema.columns c  where c.table_name='" . $table . "' and c.table_schema='" . $this->database . "' order by c.ordinal_position;";

                break;
        }
        $columnDetailsArray = $this->executeRead();
//        if (is_array($columnDetailsArray)) {
//            foreach ($columnDetailsArray as $key => $value) {
//                $this->query = "select constraint_name,referenced_table_name,referenced_column_name from information_schema.key_column_usage where table_name='" . $table . "' and table_schema='" . $this->database . "' and column_name='" . $value['column_name'] . "'";
//                $columnForeignDetailsArray = $this->executeRead();
//                $columnDetails[$value['COLUMN_NAME']] = $value;
//                if ($columnForeignDetailsArray[0]['REFERENCED_TABLE_NAME']) {
//                    $referenceColumnDetails = $this->getColumnDetails($columnForeignDetailsArray[0]['REFERENCED_TABLE_NAME']);
//                    $columnDetails[$value['COLUMN_NAME']]['REFERENCED_TABLE_NAME'] = $columnForeignDetailsArray[0]['REFERENCED_TABLE_NAME'];
//                    $columnDetails[$value['COLUMN_NAME']]['REFERENCED_COLUMN_NAME'] = $columnForeignDetailsArray[0]['REFERENCED_COLUMN_NAME'];
//                    $columnDetails[$value['COLUMN_NAME']]['CONSTRAINT_NAME'] = $columnForeignDetailsArray[0]['CONSTRAINT_NAME'];
//                    $columnDetails[$value['COLUMN_NAME']]['referencetabledetails'] = $referenceColumnDetails;
//                }
//                $columnDetails[$value['COLUMN_NAME']]["AI"] = $value['extra'] == 'auto_increment' ? true : false;
//            }
        //}


        return $columnDetailsArray;
    }

    function getTableDetails($columns = "", $condition = "") {
        switch ($this->dbtype) {
            case 'mysql':

                $this->query = "select table_name,table_type,table_rows,auto_increment,create_time $columns from information_schema.tables where  table_schema='" . $this->database . "' $condition order by table_name;";
                break;

            default:
                break;
        }

        return $this->executeRead();
    }

    function getNextVal($seq_name) {
        //return $this->getNextVal($seq_name);
    }

    function getChildTables($table) {
        //return $this->getChildTables($table);
    }

    function getDBList($dbtype, $databasehost, $databaseuser, $databasepass, $databasename, $databaseport) {
        $this->dbtype = $dbtype;
        $this->host = $databasehost;
        $this->user = $databaseuser;
        $this->password = $databasepass;
        $this->database = $databasename ? $databasename : "information_schema";
        $this->port = $databaseport;
        switch ($this->dbtype) {
            case 'mysql':

                $this->query = "select schema_name from information_schema.schemata order by 1";
                break;

            default:
                break;
        }

        return $this->executeRead();
    }

}
?>
