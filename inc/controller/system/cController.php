<?php

include_once AppRoot . AppModel . "system/cModel.php";

class cController extends cModel {

    function __construct() {
        parent::__construct();
    }

    public $id = NULL;

    public function getSelectData($table, $columns = NULL, $condition = NULL, $orderby = NULL, $joincondition = NULL) {


        $this->table = $table;
        $this->column = $columns;
        $this->join_condition = $joincondition;
        $data = $this->addWhereCondition($condition)->addOrderBy($orderby)->select()->executeRead();

        if (is_array($data)) {
            $dataarraykeys = array_keys($data[0]);
            foreach ($data as $key => $value) {

                $dataArray[$value[$dataarraykeys[0]]] = $value[$dataarraykeys[1]] ? $value[$dataarraykeys[1]] : $value[$dataarraykeys[0]];
            }
        }
        return $dataArray;
    }

    public function curd($action = '', $id = "") {


        if ($action == 'view' || $action == 'editview') {
            return $this->addWhereCondition($this->table . '.id=' . $id)->select()->executeRead();
        } elseif ($action == 'edit') {
            $this->addWhereCondition('id=' . $id)->update()->executeWrite();
            $this->id = $id;
            return $this->id;
        } elseif ($action == 'delete') {
            $this->addWhereCondition('id=' . $id)->delete()->executeWrite();
            $this->id = $id;
            return $this->id;
        } elseif ($action == 'add') {
            $this->id = $this->create()->executeWrite();
            return $this->id;
        } else {
            return $this->addWhereCondition($condition)->select()->executeRead();
        }
    }

    public function setDefaultValue($key, $default = array(), $systemdefault = "") {


        return $default[$key] ? $default[$key] : ($systemdefault ? $systemdefault : ($_POST[$key] ? $_POST[$key] : $_GET[$key]));
    }

    private function setSessionValues() {
        foreach ($this->column as $key => $value) {
            if (in_array($key, array_keys($_SESSION)) && $this->column[$key] == "") {
                $this->column[$key] = $_SESSION[$key];
            }
        }
    }

}

?>
