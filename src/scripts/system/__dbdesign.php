<?php

include_once AppRoot . AppController . "system/c__dbdesignController.php";


$content_details_array["page"]["request_type"] = $get["dataType"];

$content_details_array["page"]["action"] = $get["action"];
$action = $get["action"];
$heading = $get["action"] ? " " . $get["action"] . " [" . $_GET["id"] . "]" : "";
$content_details_array["page"]["heading"] = ucwords($heading . " DB Designer");

$content_details_array["page"]["title"] = ucwords("DB Designer" . $heading);

$__dbdesignObj = new c__dbDesignController();

if($post){
    print_r($post);
    
    if($get['action']=='edit'){
        
        $__dbdesignObj->SQL="ALTER TABLE ".$get['id'];
        
        
    }elseif($get['action']=='add'||$get['action']==''){
        
    }
}


if ($action == "add" || $action == "edit" || $action == "view") {

    $defaultdata = array("asdefined" => "As Defined", "null" => "NULL", "currenttimestamp" => "Current TimeStamp");
    $datatype = array("int" => "INT", "varchar" => "String", "date" => "Date", "float" => "Number");
    $index=array("PRI" => "Primary Key", "UNI" => "Unique Key","MUL"=>"Index");
    if ($action == "view" || $action == "edit") {
//$__dbdesignObj->debug=true;
        
        $columnDetails = $__dbdesignObj->getColumnDetails($get["id"]);
        foreach ($columnDetails as $key => $value) {
            
            
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_NAME']['value'] = $value['COLUMN_NAME'];
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_NAME']['size'] = 10;
            $content_details_array["formelements"]["add_edit"][$key]['IS_NULLABLE']['value'] = $value['IS_NULLABLE'];
            $content_details_array["formelements"]["add_edit"][$key]['DATA_TYPE']['value'] = $value['DATA_TYPE'];
            $content_details_array["formelements"]["add_edit"][$key]['DATA_TYPE']['data'] = $datatype;
            $content_details_array["formelements"]["add_edit"][$key]['DATA_TYPE']['size'] = 5;
            $content_details_array["formelements"]["add_edit"][$key]['CHARACTER_MAXIMUM_LENGTH']['value'] = $value['CHARACTER_MAXIMUM_LENGTH'];
            $content_details_array["formelements"]["add_edit"][$key]['CHARACTER_MAXIMUM_LENGTH']['size'] = 3;
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_DEFAULT']['value'] = $value['COLUMN_DEFAULT'];
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_DEFAULT']['data'] = $defaultdata;
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_DEFAULT']['size'] = 5;
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_TYPE']['value'] = $value['COLUMN_TYPE'];
            $content_details_array["formelements"]["add_edit"][$key]['IS_NULLABLE']['type'] = "checkbox";
            $content_details_array["formelements"]["add_edit"][$key]['INDEX']['data'] = $index;
            $content_details_array["formelements"]["add_edit"][$key]['INDEX']['value'] = $value['COLUMN_KEY'];
            $content_details_array["formelements"]["add_edit"][$key]['AI']['type'] = "checkbox";
            $content_details_array["formelements"]["add_edit"][$key]['AI']['value'] =$value['AI'] ;
            
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_NAME']['name'] = $key . "[COLUMN_NAME]";
            $content_details_array["formelements"]["add_edit"][$key]['IS_NULLABLE']['name'] = $key . "[IS_NULLABLE]";
            
            $content_details_array["formelements"]["add_edit"][$key]['DATA_TYPE']['name'] = $key. "[DATA_TYPE]";
            $content_details_array["formelements"]["add_edit"][$key]['CHARACTER_MAXIMUM_LENGTH']['name'] = $key. "[CHARACTER_MAXIMUM_LENGTH]";
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_DEFAULT']['name'] = $key . "[COLUMN_DEFAULT]";
            $content_details_array["formelements"]["add_edit"][$key]['COLUMN_TYPE']['name'] = $key. "[COLUMN_TYPE]";
            $content_details_array["formelements"]["add_edit"][$key]['AI']['name'] = $key . "[AI]";
            
            $content_details_array["formelements"]["add_edit"][$key]['INDEX']['name'] = $key . "[INDEX]";
            
            
        }
    } else {

        $content_details_array["formelements"]["add_edit"][0]["COLUMN_NAME"] = array("type" => "text", "name" => "COLUMN_NAME[]", "id" => "name", "required" => "true", "size" => "10");
        $content_details_array["formelements"]["add_edit"][0]["COLUMN_TYPE"] = array("name" => "DATA_TYPE[]", "id" => "type", "required" => "true", "data" => $datatype, "size" => "5");
        $content_details_array["formelements"]["add_edit"][0]["CHARACTER_MAXIMUM_LENGTH"] = array("type" => "text", "name" => "CHARACTER_MAXIMUM_LENGTH[]", "id" => "length", "size" => "3");
        $content_details_array["formelements"]["add_edit"][0]["COLUMN_DEFAULT"] = array("name" => "default[]", "id" => "COLUMN_DEFAULT", "data" => $defaultdata, "size" => "5");
        ;
        $content_details_array["formelements"]["add_edit"][0]["IS_NULLABLE"] = array("type" => "checkbox", "name" => "IS_NULLABLE[]", "id" => "is_null");
        $content_details_array["formelements"]["add_edit"][0]["INDEX"] = array("name" => "index[]", "id" => "INDEX", "data" => $index, "size" => "5");
        $content_details_array["formelements"]["add_edit"][0]["AI"] = array("type" => "checkbox", "name" => "AI[]", "id" => "ai");
        $content_details_array["formelements"]["add_edit"][0]["DEFAULT_VALUE_CONTENT"] = array("type" => "text", "name" => "DEFAULT_VALUE_CONTENT[]", "id" => "default_value", "size" => "5");
    }
    if ($action == "add")
        $content_details_array["formelements"]["submit_button"] = array("name" => "submit", "id" => "submit", "value" => "Create");
    if ($action == "edit")
        $content_details_array["formelements"]["submit_button"] = array("name" => "submit", "id" => "submit", "value" => "Update");
} else {


    //and TABLE_NAME not like '__%'
    $content_details_array["viewall"]["data"] = $__dbdesignObj->getTableDetails(",1 as action", "");
    $content_details_array["viewall"]["colcount"] = count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"] = count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"] = json_decode('["Table","Type","Rows","PK","Created","Action"]');
}
$content_details_array["formelements"]["create_table"] = array("type" => "text", "name" => "create_table", "id" => "create_table", "required" => "true");
$content_details_array["formelements"]["create_table_columns"] = array("type" => "text", "name" => "create_table_columns", "id" => "create_table_columns", "required" => "true");
?>