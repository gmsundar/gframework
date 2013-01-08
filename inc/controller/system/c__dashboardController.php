<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of __dashboard
 *
 * @author mgovindan
 */
class c__dashboardController extends cModal {

    public $id;
    public $userid;
    public $data;
    public $dashboard_columns;

    function __construct() {
        parent::__construct();
        $this->table = "__dashboard";
        $this->data = array();
    }

    function getDashboard() {

        $this->table = "__dashboard";
        $dashboardData = $dashboardDetails = $this->addWhereCondition('id=' . $this->id . " and user_id=" . $_SESSION['user_id'])->select()->executeRead();
        $this->data['dashboard']['title'] = $dashboardData[0]['title'];
        $this->data['dashboard']['columns'] = $dashboardData[0]['columns'];
        $this->getDashboardWidgets();
    }

    function getDashboardWidgets() {
        $this->table = "__widgets w";
        $this->column = array("widget_id","content", "title", "row", "col", "user_id");
        $this->join_condition = " join __dashboard_widget_relation dw on dw.widget_id=w.id";
        $data = $dashboardWidgetDetails = $this->addWhereCondition('dw.dashboard_id=' . $this->id . " and dw.user_id=" . $_SESSION['user_id'])->select()->executeRead();
        foreach ($data as $key => $value) {
            $this->data['widgets'][$value['row']][$value['col']]['title'] = $value['title'];
            $this->data['widgets'][$value['row']][$value['col']]['content'] = "";
            $this->data['widgets'][$value['row']][$value['col']]['row'] = $value['row'];
            $this->data['widgets'][$value['row']][$value['col']]['col'] = $value['col'];
            $this->data['widgets'][$value['row']][$value['col']]['content_hash'] = $value['content'];
        }
    }

}

?>
