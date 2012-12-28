<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c__widgetController
 *
 * @author mgovindan
 */
include_once AppRoot . AppController."cController.php";
class c__widgetController extends cController {
    
    public $currentWidgetCondition=array();
    
    
    public function __construct() {
        parent::__construct();
        $this->table = "__widgets";
        $this->data = array();
    }
    function loadModule(){
       
    }
}

?>
