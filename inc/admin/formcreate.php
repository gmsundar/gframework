<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formcreate
 *
 * @author gt
 */
define('AppRoot', dirname(dirname(dirname(__FILE__))));
include_once("../config/config.php");
include_once("../controller/cFormController.php");
include_once("../controller/cXMLController.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$cformCreate = new cFormController();
$xmlObj = new cXMLController();
$_POST['viewallactions'] = urlencode($_POST['viewallactions']);
$_POST['viewactions'] = urlencode($_POST['viewactions']);
$_POST['afterwrite'] = urlencode($_POST['afterwrite']);
if ($_GET['designfile']) {

    $xmlObj->file = $_POST['tablenames'] = "./formdesigns/" . $_GET['designfile'];
    $saveddata = $xmlObj->readXmlFile();

    foreach ($saveddata as $key => $value) {

        $_POST[$key] = (string) setDefaultValues($key, "", $saveddata);
    }
}
if ($_POST['tablenames']) {

    $xmlObj->file = 'formdesigns/' . $_POST['tablenames'] . '.xml';
}

if ($_POST['submit']) {
    $xmlObj->data = $_POST;
    $formdetailsArray = array();
    $scriptDetailsArray = array();
    $columns = explode('|', $_POST['__columns']);

    $scriptDetailsArray[] = '<?php ' . 'include_once AppRoot . AppController . "c' . ucwords($_POST['tablenames']) . 'Controller.php";' . "\n";
    $scriptDetailsArray[] = '$' . $_POST['tablenames'] . 'Obj = new c' . $_POST['tablenames'] . 'Controller();' . "\n";
    $scriptDetailsArray[] = '$action = $get["action"]?$get["action"]:"viewall";
    $' . $_POST['tablenames'] . 'Obj->id = $id = $get["id"];

if($post){

$' . $_POST['tablenames'] . 'Obj->action = $post["formaction"];
    $content_details_array["page"] = $' . $_POST['tablenames'] . 'Obj->curd();
    $' . $_POST['tablenames'] . 'Obj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("' . $_POST['tablenames'] . '&id=".$' . $_POST['tablenames'] . 'Obj->id."&action=view");
    }else{
    $data=$' . $_POST['tablenames'] . 'Obj->getSelectData($get["file"], $get["columns"], "id=".$' . $_POST['tablenames'] . 'Obj->id, "");
        echo json_encode($data);
        exit;
    }

} else {

     if ($action == "view" || $action == "edit") {

        if($action == "edit"){
            $' . $_POST['tablenames'] . 'Obj->action = "editview";
         }else{
            $' . $_POST['tablenames'] . 'Obj->action = "view";
         }


        $defaultdata = $' . $_POST['tablenames'] . 'Obj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $' . $_POST['tablenames'] . 'Obj->action=$action;
    $content_details_array["page"] = $' . $_POST['tablenames'] . 'Obj->curd();
    redirect("' . $_POST['tablenames'] . '&action=viewall");
    }

}


$' . $_POST['tablenames'] . 'Obj->beforeWrite();
';
    $localization.='$__localization["__page_heading"]="' . $_POST['pageheading'] . '";' . "\n";
    $localization.='$__localization["__page_title"]="' . $_POST['pagetitle'] . '";' . "\n";

    $scriptDetailsArray[] = '$content_details_array["page"]["request_type"]=$get["dataType"];' . "\n";
    $scriptDetailsArray[] = '$content_details_array["page"]["action"]=$get["action"];' . "\n";
    $scriptDetailsArray[] = '$content_details_array["page"]["heading"]=ucwords($content_details_array["__localization"]["data"]["__page_heading"]);' . "\n";
    $scriptDetailsArray[] = '$content_details_array["page"]["title"]=ucwords($content_details_array["__localization"]["data"]["__page_title"]);' . "\n";
    $scriptDetailsArray_view[] = '$content_details_array["page"]["viewactions"]=' . "'" . urldecode($_POST['viewactions']) . "';";

    unset($columns[0]);
    $datatablecolumnformatting = array();
    $viewallcolumnNames[] = "Id";
    $jsviewallscript.='{ "bVisible": false},';
    $formdesigndetails = "";
    foreach ($columns as $key => $value) {
        $sqlcolumns[] = $_POST['tablenames'] . "." . $value;
        $mandatory = ($_POST[$value . '_mandatory'] == 'on') ? 'required' : '';
        $_POST[$value . "_default_value"] = $_POST[$value . "_default_value"] ? $_POST[$value . "_default_value"] : "''";
        $addcolumns[] = "'" . $value . "'=>\$_POST['" . $value . "']";
        $sys_default_code = "";
        $systemdefault_value = '$dummy';
        $controlDetails = "";
        $placeholder = "";
        if ($_POST[$value . '_type'] != 'hidden') {
            $grouparray[$_POST[$value . '_column_group_order']][$value] = $_POST[$value . '_column_order'];

            $group_span[$_POST[$value . '_column_group_order']] = $_POST[$value . '_column_group_span'] != '' ? $_POST[$value . '_column_group_span'] : $group_span[$_POST[$value . '_column_group_order']];
            $grouparraydisplaynames[$_POST[$value . '_column_group_order']] = array($_POST[$value . '_column_group'], $group_span[$_POST[$value . '_column_group_order']]);
        }
        if ($_POST[$value . '_dependentshowhide_condition']) {


            $scriptArray = explode("===>", $_POST[$value . '_dependentshowhide_condition']);
            if ($scriptArray[1]) {
                $javascript[] = '$("#' . $value . '").bind("' . $scriptArray[0] . '",' . $scriptArray[1] . ');';
            } else {
                $javascript[] = $_POST[$value . '_dependentshowhide_condition'];
            }
        }

        if ($_POST[$value] != '' && $_POST[$value . '_type'] != 'nocontrol') {
            $viewallcolumnNames[] = $_POST[$value];
        }
        $localization.='$__localization["' . $value . '"]="' . $_POST[$value] . '";' . "\n";

        if ($_POST[$value . "_default_value"] != "") {
            preg_match("/~~(.*?)~~/", $_POST[$value . "_default_value"], $defaultseqvalueArray);
            if ($defaultseqvalueArray[1]) {
                $sys_default_code = '$seqval=$' . $_POST['tablenames'] . 'Obj->getNextVal("' . $defaultseqvalueArray[1] . '");';
                $systemdefault_value = '$seqval';
            }
        }
        $dependent_event = $scriptDetails_add = $scriptDetails_view = "";
        if ($_POST[$value . "_placeholder"]) {
            $placeholder = ',"placeholder"=>"' . $_POST[$value . "_placeholder"] . '"';
        }


        switch ($_POST[$value . '_type']) {
            case 'text':case 'hidden':case 'readonly':case 'checkbox':case 'date':


                $readonly = $pattern = "";
                $type = $_POST[$value . '_error'];
                if ($type == 'no_validations' && $_POST[$value . '_type'] == 'text') {
                    $type = 'text';
                } elseif ($_POST[$value . '_type'] == 'hidden') {
                    $type = 'hidden';
                } elseif ($type == 'pattern') {
                    $pattern = $_POST[$value . "_validation_pattern_value"];
                } elseif ($type == 'unique') {
                    $type = 'text';
                    $event = ',event=>"onblur=\"geoJs.checkUniqueData(\'' . $_POST['tablenames'] . '\',\'' . $value . '\')\""';
                } elseif ($_POST[$value . '_type'] == 'readonly') {
                    $type = 'text';
                    $readonly = ',"readonly"=>"readonly"';
                } elseif ($_POST[$value . '_type'] == 'checkbox') {
                    $type = 'checkbox';
                }

                if ($_POST[$value . "_viewallcolumns"] == 'on') {
                    $jsviewallscript.='null,';
                } else {
                    $jsviewallscript.='{ "bVisible": false},';
                }
                if ($_POST[$value . '_type'] == 'date') {
                    //"DATE_FORMAT(test_ui.date,'".AppDateFormatDb."') as date"
                    $viewsqlcolumns[] = "DATE_FORMAT(" . $_POST['tablenames'] . "." . $value . ",'\".AppDateFormatDb.\"') as $value";
                } else {
                    $viewsqlcolumns[] = $_POST['tablenames'] . "." . $value;
                }

                $originalcolumn[] = $sqlcolumn[] = $_POST['tablenames'] . "." . $value;
                if ($_POST[$value . '_type'] != 'hidden')
                    $controlDetails = '{if $content_details_array.page.action eq \'view\'}
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.' . $value . '}

                {else}';
                $controlDetails .='{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.' . $value . '}';
                if ($_POST[$value . '_type'] != 'hidden')
                    $controlDetails .='{/if}';
                $scriptDetails_add = $sys_default_code . "\n" . '$content_details_array["formelements"]["' . $value . '"]=array("displayName"=>"' . makeDisplayName($value) . '","type"=>"' . $type . '","name"=>"' . $value . '","id"=>"' . $value . '","class","style","error","required"=>"' . $mandatory . '","value"=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,' . $systemdefault_value . '),"max"=>"' . $_POST[$value . '_max'] . '","min"=>"' . $_POST[$value . '_min'] . '","pattern"=>"' . $pattern . '"' . $event . $readonly . $placeholder . ');';
                $scriptDetails_view = '$content_details_array["formelements"]["' . $value . '"]=array("displayName"=>"' . makeDisplayName($value) . '","type"=>"' . $_POST[$value . '_type'] . '","name"=>"' . $value . '","id"=>"' . $value . '","class"=>"' . $_POST[$value . "_formatting_type"] . '","style","error","required"=>"' . $mandatory . '","value"=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,' . $systemdefault_value . '),"readonly"=>"readonly");';
                $datatablecolumnformatting[] = 'null';
                break;
            case 'select':case 'multiselect':
                $datatablecolumnformatting[] = 'null';
                $selectboxdatavariable = 'dummy';
                $addonfly = '""';
                $multi_select = "";
                $originalcolumn[] = $_POST['tablenames'] . "." . $value;
                if ($_POST[$value . "_viewallcolumns"] == 'on') {
                    $jsviewallscript.='null,';
                } else {
                    $jsviewallscript.='{ "bVisible": false},';
                }
                if ($_POST[$value . "_static_data"]) {
                    $scriptDetails_view = $scriptDetails_add = "\$selectboxdata=array(" . $_POST[$value . "_static_data"] . ");";
                    $selectboxdatavariable = 'selectboxdata';

                    $viewsqlcolumns[] = $_POST['tablenames'] . "." . $value . " as " . $value;
                } else {

                    if ($_POST[$value . "_reference_table"] && $_POST[$value . "_reference_column"]) {


                        $viewsqlcolumns[] = $_POST[$value . "_reference_table"] . "." . $_POST[$value . "_reference_column"] . " as " . $value;

                        $sqlcolumn[] = $_POST[$value . "_reference_table"] . "." . $_POST[$value . "_reference_column"];
                        $sqljoincondtion[$_POST[$value . "_reference_table"]] = 'Left Join ' . $_POST[$value . "_reference_table"] . ' on ' . $_POST[$value . "_reference_table"] . ".id=" . $_POST['tablenames'] . "." . $value;
                    }

                    if ($_POST[$value . "_dependent"] != '') {
                        $dependent[$_POST[$value . "_dependent"]][$value] = $_POST[$value . "_dependent"];
                    }



                    if (is_array($dependent))
                        if (in_array($value, $dependent)) {
                            $selectboxdatavariable = 'dummy';
                        }
                    if ($_POST[$value . "_reference_table"] != '' && $_POST[$value . "_reference_column"] != '') {
                        $scriptDetails_add = "\$selectboxdata=\$" . $_POST['tablenames'] . "Obj->getSelectData('" . $_POST[$value . "_reference_table"] . "','id," . $_POST[$value . "_reference_column"] . "','" . $_POST[$value . "_reference_column_condition"] . "','" . $_POST[$value . "_reference_column_orderby"] . "');";
                        $scriptDetails_view = "\$selectboxdata=\$" . $_POST['tablenames'] . "Obj->getSelectData('" . $_POST[$value . "_reference_table"] . "','id," . $_POST[$value . "_reference_column"] . "','" . $_POST[$value . "_reference_column_condition"] . "','" . $_POST[$value . "_reference_column_orderby"] . "');";
                        $selectboxdatavariable = 'selectboxdata';
                    }

                    $dependent_event = "";
                    if ($_POST[$value . "_dependent"] != '') {

                        $scriptDetails_add .= "\$sql_" . $value . '=base64_encode(\'' . $_POST[$value . "_dependent_query"] . '\');';
                        $dependent_event = ',"event"=>"onChange=\'geoJs.loaddependentValues(this,\\"' . $_POST[$value . "_dependent"] . '\\",\\"$sql_' . $value . '\\")\'"';
                    }
                }

                if ($_POST[$value . "_type"] == 'multiselect') {

                    $multi_select = ',"multiple"=>"true"';
                }
                $controlDetails = '{if $content_details_array.page.action eq \'view\'}

                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.' . $value . '}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.' . $value . '}
{/if}
';
                if ($_POST[$value . "_reference_table"] && $_POST[$value . "_reference_column"]) {

                    $sqlcolumns[] = $_POST[$value . "_reference_table"] . "." . $_POST[$value . "_reference_column"];

                    $sqljoins[] = $_POST[$value . "_reference_table"];
                }
                if ($_POST[$value . "_addonfly"] == 'on') {
                    $addonfly = 'array("' . $_POST[$value . "_reference_table"] . '","' . $_POST[$value . "_reference_column"] . '") ';
                }



                $scriptDetails_add .= '$content_details_array["formelements"]["' . $value . '"]=array("displayName"=>"' . makeDisplayName($value) . '","type"=>"text","name"=>"' . $value . '","id"=>"' . $value . '","class","style","error","required"=>"' . $mandatory . '","data"=>$' . $selectboxdatavariable . ',"value"=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata),"addonfly"=>' . $addonfly . $dependent_event . $placeholder . $multi_select . ');
                ';

                $scriptDetails_view .= '$content_details_array["formelements"]["' . $value . '"] = array("type" => "text", "name" => "' . $value . '", "id" => "' . $value . '","value" => $' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '", $defaultdata,"",$' . $selectboxdatavariable . '));
                ';
                break;
            case 'image':
                if ($_POST[$value . "_viewallcolumns"] == 'on') {
                    $jsviewallscript.='null,';
                } else {
                    $jsviewallscript.='{ "bVisible": false},';
                }
                $controlDetails = '
                    {if $content_details_array.page.action eq \'view\'}
{include file = "formelements/image.tpl" inputDetails = $content_details_array.formelements.' . $value . '}
{else}
{include file = "formelements/input.tpl" inputDetails = $content_details_array.formelements.' . $value . '}
    {/if}

';
                $scriptDetails = '$content_details_array["formelements"]["' . $value . '"] = array("displayName" => "' . makeDisplayName($value) . '", "type" => "text", "name" => "' . $value . '", "id" => "' . $value . '", "class", "style", "error", "mandatory" => true);
                ';
                break;

            case 'camera':
                if ($_POST[$value . "_viewallcolumns"] == 'on') {
                    $jsviewallscript.=' {
                    "fnRender": function ( oObj ) {
                        return \'<img src="\'+AppViewUploadsURL+oObj.aData[1]+\'" />\' ;
        },
        "bUseRendered": false
      },';
                } else {
                    $jsviewallscript.='{ "bVisible": false},';
                }

                $viewsqlcolumns[] = $_POST['tablenames'] . "." . $value;


                $viewcontroltype[] = '"' . $value . '"=>"image"';
                $originalcolumn[] = $_POST['tablenames'] . "." . $value;
                $controlDetails = '{if $smarty.get.action eq \'view\'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.' . $value . '}
                        {$content_details_array.formelements.' . $value . '.value}
                                            {else}';
                $controlDetails .= '{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.' . $value . '}';
                $controlDetails .='{/if}';

                $scriptDetails_add = '$content_details_array["formelements"]["' . $value . '"]=array(
                    "photoimage" => array("src"=>($' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,"")!=""?AppViewUploadsURL.$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"' . $value . '_image","id"=>"' . $value . '_image","alt"=>"' . $value . '"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"' . $_POST['tablenames'] . '","column"=>"' . $value . '"),
                    "photoimage_hidden"=>array("name"=>"' . $value . '","type"=>"hidden","value"=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,AppImgURL."noimage.jpg"))
                    );';

                $scriptDetails_view = '$content_details_array["formelements"]["' . $value . '"]=array("src"=>($' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,"")!=""?AppViewUploadsURL.$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,""):AppImgURL."noimage.jpg"));';

                break;
            case 'textarea':


                if ($_POST[$value . "_viewallcolumns"] == 'on') {
                    $jsviewallscript.='null,';
                } else {
                    $jsviewallscript.='{ "bVisible": false},';
                }
                $viewsqlcolumns[] = $_POST['tablenames'] . "." . $value;



                $controlDetails = '{include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.' . $value . '}';
                $scriptDetails_add = '$content_details_array["formelements"]["' . $value . '"]=array("name"=>"' . $value . '","id"=>"' . $value . '","required"=>"' . $mandatory . '","value"=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata));';
                $scriptDetails_view = '$content_details_array["formelements"]["' . $value . '"]=array("name"=>"' . $value . '","id"=>"' . $value . '","value"=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata,' . $_POST[$value . "_default_value"] . '),"readonly"=>"readonly");';
                break;
            case 'radio':
                if ($_POST[$value . "_viewallcolumns"] == 'on') {
                    $jsviewallscript.='null,';
                } else {
                    $jsviewallscript.='{ "bVisible": false},';
                }
                $viewsqlcolumns[] = $_POST['tablenames'] . "." . $value;

                $originalcolumn[] = $_POST['tablenames'] . "." . $value;
                $scriptDetails_add = "\$selectboxdata=array(" . $_POST[$value . "_static_data"] . ");";
                $controlDetails = '{include file="formelements/radio.tpl" inputDetails=$content_details_array.formelements.' . $value . '}';
                $scriptDetails_add .= '$content_details_array["formelements"]["' . $value . '"]=array("name"=>"' . $value . '","id"=>"' . $value . '","data"=>$selectboxdata,"value"=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("' . $value . '",$defaultdata));';

                break;
            default:
                break;
        }

        if ($_POST[$value . '_type'] == 'hidden') {
            $hiddencontrol.=$controlDetails;
            $scriptDetailsArray_add[] = $scriptDetails_add;
            $scriptDetailsArray_view[] = $scriptDetails_view;
            $controlDetails = "";
        }


        if ($controlDetails != '') {
            $formdetailsArray[$value] = $controlDetails;
            $scriptDetailsArray_add[] = $scriptDetails_add;
            $scriptDetailsArray_view[] = $scriptDetails_view;
        }
    }



    $scriptDetailsArray[] = 'if($action=="add"||$action=="edit")' . "\n" . '{' . implode("\n", $scriptDetailsArray_add) . '}' . "\n";
    $scriptDetailsArray[] = 'if($action=="view")' . "\n" . '{' . implode("\n", $scriptDetailsArray_view) . '}' . "\n";

    $scriptDetailsArray[] = 'if($action == "edit"||$action=="add"||$action=="view")' . "\n" . '{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$' . $_POST['tablenames'] . 'Obj->setDefaultValue("id",$defaultdata));
            }' . "\n";
    $formDetails.='<div id="nav-menu" class="toolbar">
    <ul>';
    $submenudetails = explode(",", $_POST['reference_tables']);
    $formDetails.='<li><a href="{$AppURL}index.php?file=' . $_POST['tablenames'] . '"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li>';
    $formDetails.='<li><a href="{$AppURL}index.php?file=' . $_POST['tablenames'] . '&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li>';


    $formDetails.='</ul>
</div>';

    $formDetails.='{if $content_details_array.formelements neq \'\'}
        {$content_details_array.page.viewactions}
            ' . "\n" . '<form name="' . $_POST['tablenames'] . '_form" id="' . $_POST['tablenames'] . '_form" method="post" action="{$content_details_array.current_page}" >' . "\n";


    ksort($grouparray, SORT_NUMERIC);
    $formDetails.='<table class="formbox" width="100%">' . "\n";

    if ($_POST['layout'] == 'vertical') {
        $total_groups = count($grouparray);
        $i = 1;
        foreach ($grouparray as $framename => $framedata) {
            if ($i % 2 != 0) {
                $formDetails.='<tr >' . "\n";
            }
            $formDetails.='<td ';
            if ($grouparraydisplaynames[$framename][1] == 'on')
                $formDetails.= $total_groups_is_odd;

            $formDetails.=' >' . "\n";



            if ($total_groups > 0) {
                $formDetails.='<div class="divframe">' . "\n";
                $formDetails.='<h4 class="subhead">' . $grouparraydisplaynames[$framename][0] . '</h4>' . "\n <p>";
            }


            $formDetails.="\n" . '<table valign="top" class="contenttable">' . "\n";

            if ($grouparraydisplaynames[$framename][1] == 'on') {
                $framedata_temp = array_chunk($framedata, round(count($framedata) / 2), true);
                $framedata = $framedata_temp[0];
                $formDetails.= "\n" . '<tr>' . "\n" . '<td valign="top">' . "\n" . '<table class="contenttablesub">' . "\n";
                $i++;
            }
            asort($framedata);
            foreach ($framedata as $key => $value) {
                $columnNames[] = $_POST[$key];
                if ($formdetailsArray[$key]) {

                    $formDetails.='<tr id="row_' . $key . '">' . "\n";
                    $formDetails.='<td width="200px" bgcolor="#F2F2F2" align="right">{$content_details_array.__localization.data.' . $key . '}</td>' . "\n";
                    $formDetails.='<td width="200px">' . $formdetailsArray[$key] . '</td>' . "\n";
                    $formdesigndetails.="[" . $_POST[$key] . "]";
                    $formDetails.='</tr>' . "\n";
                    $j++;
                }
            }
            $formDetails.="</table> \n ";
            if ($grouparraydisplaynames[$framename][1] == 'on') {
                $formDetails.='</td><td valign="top"><table>';
                $framedata = $framedata_temp[1];
                asort($framedata);
                if (is_array($framedata))
                    foreach ($framedata as $key => $value) {
                        $columnNames[] = $_POST[$key];
                        if ($formdetailsArray[$key]) {
                            $formDetails.='<tr id="row_' . $key . '">' . "\n";
                            $formDetails.='<td width="200px" bgcolor="#F2F2F2" align="right">{$content_details_array.__localization.data.' . $key . '}</td>' . "\n";
                            $formDetails.='<td width="200px">' . $formdetailsArray[$key] . '</td>' . "\n";
                            $formDetails.='</tr>' . "\n";
                            $j++;
                        }
                    }
                $formDetails.="</table> \n ";
                $formDetails.='</td>' . "\n" . '</tr>' . "\n" . '</table>' . "\n";
            }
            if ($total_groups > 0)
                $formDetails.="</p> " . "\n" . "</div>" . "\n";
            $formDetails.='</td>';
            if ($i % 2 == 0)
                $formDetails.='</tr>' . "\n";
            $i++;
        }
    } elseif ($_POST['layout'] == 'horizontal') {

        $formDetails.='<table width="100%">' . "\n";
        $formdesigndetails.=$formDetails.='<tr>' . "\n";
        foreach ($formdetailsArray as $key => $value) {
            $formdesigndetails.=$formDetails.='<th>{$content_details_array.__localization.data.' . $key . '}</th>' . "\n";
        }
        $formdesigndetails.=$formDetails.='</tr>' . "\n";
        $formdesigndetails.=$formDetails.='<tr>' . "\n";
        foreach ($formdetailsArray as $key => $value) {
            $columnNames[] = $_POST[$key];


            $formdesigndetails.=$formDetails.='<td>' . $value . '</td>' . "\n";
        }
        $formdesigndetails.=$formDetails.='</tr>' . "\n" . "</table> \n";
    }


    $formDetails.= '</td>' . "\n" . '</tr>' . "\n";
    $formDetails.= '{if $content_details_array.page.request_type eq \'\' && $content_details_array.page.action neq \'view\'}';
    $formDetails.= ' <tr>

                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />

                </td>
           </tr>';
    $formDetails.= '{/if}';
    $formDetails.='</table>{if $content_details_array.page.action neq \'view\'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}' . $hiddencontrol . "\n";
    $formDetails.='{/if}</form>' . "\n";


    if (is_array($javascript_include))
        $javascript_include = implode("\n", $javascript_include);

    if (is_array($javascript))
        $javascript = '<script>$(function() {' . implode("\n", $javascript) . '});</script>';

    if (!is_array($viewcontroltype))
        $viewcontroltype = array();
    if (!is_array($viewsqlcolumns))
        $viewsqlcolumns = array();
    $_POST['child_tables'] = json_decode($_POST['child_tables']);

    $viewallcolumnNames[] = "Action";
    $formDetails.= $javascript_include . '{literal}' . $javascript . '{/literal}';
    $scriptDetailsArray[] = 'if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$' . $_POST['tablenames'] . 'Obj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);

    $content_details_array["viewall"]["columnnames"]=json_decode(\'' . json_encode($viewallcolumnNames) . '\');
}';
    if (is_array($sqljoincondtion))
        $sqljoincondtion = implode(' ', $sqljoincondtion);

    $controllerDetailsArray[] = '<?php include_once(\'cController.php\');
class c' . ucwords($_POST['tablenames']) . 'Controller extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array(' . implode(",", $viewcontroltype) . ');
    function __construct() {
        parent::__construct();
        $this->table = "' . $_POST['tablenames'] . '";

    }

 function curd() {
        if($this->action=="viewall"){
            $this->column=array("' . $_POST['tablenames'] . '.id","' . implode('","', $viewsqlcolumns) . '","1 as action");
            $this->join_condition="' . $sqljoincondtion . '";
        }elseif($this->action=="view"){
            $this->column=array("' . implode('","', $viewsqlcolumns) . '");
            $this->join_condition="' . $sqljoincondtion . '";


        }elseif($this->action=="editview"){
            $this->column=array("' . implode('","', $originalcolumn) . '");
            $this->join_condition="' . $sqljoincondtion . '";

        }elseif($this->action=="add"){
            $this->column=array(' . implode(',', $addcolumns) . ');

        }
        else{
            $this->column=array(' . implode(',', $addcolumns) . ');
        }


        $result=parent::curd($this->action,$this->id);


        return $result;
        }
        public function beforeWrite(){
        ' .
            urldecode($_POST['beforewrite']) . '
        }
        public function afterWrite(){
        ' .
            urldecode($_POST['afterwrite']) . '
        }
    } ';

    $formDetails.='{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>


    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id=\'' . $_POST['tablenames'] . '\'"}
    {literal}
        <script>

        $(document).ready(function() {
        geoTable = $(\'#' . $_POST['tablenames'] . '\').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,

			"sPaginationType": "full_numbers",

            aoColumns: [' . $jsviewallscript . '

{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj)
                                                                    {
                                                                    ' . ($_POST['viewallactions'] ? urldecode($_POST['viewallactions']) : "return null;") . '
								}
							}]



            }
            );

        } );


        </script>
    {/literal}


{/if}';

    $xmlObj->data["__layout"] = urlencode($formdesigndetails);
    $xmlObj->writeArrayToXML();

    file_put_contents(AppRoot . AppScriptURL . $_POST['tablenames'] . ".php", implode("\n", $scriptDetailsArray) . "\n" . ' ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>');
    file_put_contents(AppRoot . AppLocalizationURL . $_POST['tablenames'] . ".lang", "<?php \n" . $localization . "?>");

    file_put_contents(AppRoot . AppController . 'c' . ucwords($_POST['tablenames']) . "Controller.php", implode("\n", $controllerDetailsArray) . "\n" . ' ?>');


    file_put_contents($smarty->template_dir . "/" . $_POST['tablenames'] . ".tpl", $formDetails);


    echo "configuration saved successfully !!!!";
    exit;
} else {

    $data = $cformCreate->getSelectData('information_schema.tables', 'table_name', array("TABLE_SCHEMA='" . DataBaseName . "'"), '1');
    $content_details_array["formelements"]["tablenames"] = array("displayName" => "Tables/Views", "name" => "tablenames", "id" => "tablenames", "class", "style", "error", "mandatory" => true, 'data' => $data, 'event' => 'onChange="this.form.submit()"', 'value' => $_POST['tablenames']);


    if ($_POST['tablenames']) {

        $saveddata = $xmlObj->readXmlFile();


        $columndata = $cformCreate->getColumnDetails($_POST['tablenames']);

        $columns = implode('|', (array_keys($columndata)));

        $childTables = $cformCreate->getChildTables($_POST['tablenames']);
//        $childTables = is_array($childTables) ? json_encode($childTables) : "";
        $content_details_array["formelements"]["submit"] = array("name" => "submit", "id" => "submit", 'value' => 'Submit');
        $content_details_array["formelements"]["reset"] = array("name" => "reset", "id" => "reset", 'value' => 'Reset');
        $content_details_array["formelements"]['layout'] = array("name" => 'layout', "required" => 'required', 'data' => array('vertical' => 'Vertical', 'horizontal' => 'Horizontal', 'dashboard' => 'Dashboard', 'parentchild' => 'Parent [Vertical] Child [Horizontal]'), 'value' => setDefaultValues("layout", "vertical", $saveddata));
        $pagetitle = "";
        $pageheading = "";
        $content_details_array["formelements"]["pagetitle"] = array("name" => "pagetitle", 'required' => 'required', 'value' => $saveddata->pagetitle);
        $content_details_array["formelements"]["pageheading"] = array("name" => "pageheading", 'required' => 'required', 'value' => $saveddata->pageheading);
        $content_details_array["formelements"]["viewallactions"] = array("name" => "viewallactions", 'value' => ($saveddata->viewallactions ? urldecode($saveddata->viewallactions) : 'return null;'));
        $content_details_array["formelements"]["viewactions"] = array("name" => "viewactions", 'value' => urldecode($saveddata->viewactions));
        $default_controls = array('text' => 'text', 'label' => 'Label', 'hidden' => 'hidden', 'select' => 'select', 'image' => 'image', 'multiselect' => 'Multi Select', 'checkbox' => 'checkbox', 'radio' => 'radio', 'nocontrol' => 'No Control', 'camera' => 'Take Photo', 'readonly' => 'Read Only', 'textarea' => 'Text Area');
        $content_details_array["formelements"]["beforewrite"] = array("name" => "beforewrite", 'value' => urldecode($saveddata->beforewrite));
        $content_details_array["formelements"]["afterwrite"] = array("name" => "afterwrite", 'value' => urldecode($saveddata->afterwrite));


        $content_details_array["formelements"]['columns'] = array("value" => setDefaultValues($columnName . "_columns", "$defaultcontrol", $saveddata), "name" => $columnName . '_columns', 'required' => 'required', 'data' => $columns, "multiple" => true, "nodefaulttext" => true);

        /**
         * Controls
         */
        $default_controls = array('text' => 'text', 'select' => 'select', 'hidden' => 'hidden', 'multiselect' => 'Multi Select', 'checkbox' => 'checkbox', 'date' => 'date', 'radio' => 'radio', 'camera' => 'Take Photo', 'readonly' => 'Read Only', 'textarea' => 'Text Area');
        $default_view_controls = array('label' => 'Label', 'date' => 'Date', 'hyperlink' => 'Hyper Link', 'image' => 'Image', 'file' => 'File', 'html' => 'HTML', 'audio' => 'Audio', 'video' => 'Video', 'custom' => 'Custom');

        $relational_controls = array('select' => 'select', 'multiselect' => 'Multi Select', 'checkbox' => 'checkbox', 'radio' => 'radio', 'readonly' => 'Read Only', 'hidden' => 'hidden');
        $intvalidations = array('number' => 'Number', 'no_validations' => 'No validations', 'pattern' => 'Pattern');
        $varcharvalidations = array('no_validations' => 'No validations', 'url' => 'URL', 'email' => 'Email', 'pattern' => 'pattern', 'color' => 'color', 'unique' => 'Unique from DB');
        $datevalidations = array('no_validations' => 'No validations', 'date' => "Date", "timestamp" => "Time Stamp", "date_timestamp" => "Date with Time Stamp", 'pattern' => 'pattern');
        $javascriptevents = array('date' => "Date", "timestamp" => "Time Stamp", "date_timestamp" => "Date with Time Stamp", 'pattern' => 'pattern');

        $dependencyArray = array_keys($columndata);
        unset($dependencyArray['0']);

        foreach ($dependencyArray as $key => $currentcolumn) {
            $temp[$currentcolumn] = $currentcolumn;
        }
        $dependencyArray = $temp;
        arsort($dependencyArray);
        $count = 0;
        foreach ($columndata as $columnName => $value) {
            $count++;
            $data = $default_controls;
            $defaultcontrol = 'text';
            if ($columnName != 'id') {
                $reference_details = array();
                if (is_array($value['referencetabledetails'])) {
                    $reference_details['columns'] = array_combine(array_keys($value['referencetabledetails']), array_keys($value['referencetabledetails']));
                    $reference_details['REFERENCED_TABLE_NAME'] = $value['REFERENCED_TABLE_NAME'];
                    $referencetables[] = $reference_details['REFERENCED_TABLE_NAME'];
                    $data = $relational_controls;
                    $defaultcontrol = 'select';
                }

                if ($value['DATA_TYPE'] == 'int') {
                    $validationdata = $intvalidations;
                } elseif ($value['DATA_TYPE'] == 'date') {
                    $validationdata = $datevalidations;
                } else {
                    $validationdata = $varcharvalidations;
                }


                $content_details_array["formelements"]['column'][$columnName]['details'] = array("display_name" => makeDisplayName($columnName), "value" => setDefaultValues($columnName, makeDisplayName($columnName), $saveddata), "type" => "text", "name" => $columnName, "id" => $columnName, 'reference_details' => $reference_details, 'required' => 'required');
                $content_details_array["formelements"]['column'][$columnName]['static_data'] = array("value" => setDefaultValues($columnName . "_static_data", "", $saveddata), "type" => "text", "name" => $columnName . "_static_data", "id" => $columnName . "_static_data");

                $content_details_array["formelements"]['column'][$columnName]['default_value'] = array("value" => setDefaultValues($columnName . "_default_value", "", $saveddata), "type" => "text", "name" => $columnName . "_default_value");

                $content_details_array["formelements"]['column'][$columnName]['placeholder'] = array("value" => setDefaultValues($columnName . "_placeholder", "", $saveddata), "type" => "text", "name" => $columnName . "_placeholder");
                $content_details_array["formelements"]['column'][$columnName]['column_order'] = array("value" => setDefaultValues($columnName . "_column_order", $count, $saveddata), "type" => "number", "name" => $columnName . "_column_order", "style" => "width:50px");
                $content_details_array["formelements"]['column'][$columnName]['column_group'] = array("value" => setDefaultValues($columnName . "_column_group", "1", $saveddata), "type" => "text", "name" => $columnName . "_column_group");
                $content_details_array["formelements"]['column'][$columnName]['column_group_order'] = array("value" => setDefaultValues($columnName . "_column_group_order", "", $saveddata), "type" => "number", "name" => $columnName . "_column_group_order", "style" => "width:50px");

                $content_details_array["formelements"]['column'][$columnName]['column_group_span'] = array("checked" => (setDefaultValues($columnName . "_column_group_span", "", $saveddata) != '' ? 'checked' : ''), "name" => $columnName . '_column_group_span', 'type' => 'checkbox');
                $content_details_array["formelements"]['column'][$columnName]['viewallcolumns'] = array("checked" => (setDefaultValues($columnName . "_viewallcolumns", "true", $saveddata) != '' ? 'checked' : ''), "name" => $columnName . '_viewallcolumns', 'type' => 'checkbox');
//                $content_details_array["formelements"]['column'][$columnName]['showhide'] = array("checked" => (setDefaultValues($columnName . "_showhide", "", $saveddata) != '' ? 'checked' : ''), "name" => $columnName . '_showhide', 'type' => 'checkbox');



                $content_details_array["formelements"]['column'][$columnName]['type'] = array("value" => setDefaultValues($columnName . "_type", "$defaultcontrol", $saveddata), "name" => $columnName . '_type', 'required' => 'required', 'data' => $data);
                $content_details_array["formelements"]['column'][$columnName]['view_type'] = array("value" => setDefaultValues($columnName . "_view_type", "label", $saveddata), "name" => $columnName . '_view_type', 'required' => 'required', 'data' => $default_view_controls);

                $dependencyArray_temp = $dependencyArray;
                $content_details_array["formelements"]['column'][$columnName]['formatting_type'] =
                        array("value" => setDefaultValues($columnName . "_formatting_type", "textalignleft", $saveddata), "name" => $columnName . '_formatting_type', 'required' => 'required', 'data' => array("textalignleft" => "Align Left", "textalignright" => "Align right", "textalignjustify" => "Justify", "textformatbold" => "Bold", "textformatitalic" => "Italic", "textformatunderline" => "Underline"));

                unset($dependencyArray_temp[$columnName]);
                $content_details_array["formelements"]['column'][$columnName]['dependent'] = array("value" => setDefaultValues($columnName . "_dependent", "$defaultcontrol", $saveddata), "name" => $columnName . '_dependent', 'data' => $dependencyArray_temp);
                //TODO fix mandatory field default value


                $content_details_array["formelements"]['column'][$columnName]['dependent_query'] = array("value" => setDefaultValues($columnName . "_dependent_query", "", $saveddata), "name" => $columnName . '_dependent_query');

                $content_details_array["formelements"]['column'][$columnName]['dependentshowhide_condition'] = array("value" => setDefaultValues($columnName . "_dependentshowhide_condition", "", $saveddata), "name" => $columnName . '_dependentshowhide_condition');


                $content_details_array["formelements"]['column'][$columnName]['reference_column'] = array("value" => setDefaultValues($columnName . "_reference_column", "", $saveddata), "name" => $columnName . '_reference_column', 'data' => $reference_details['columns']);
                $content_details_array["formelements"]['column'][$columnName]['reference_column_orderby'] = array("value" => setDefaultValues($columnName . "_reference_column_orderby", "", $saveddata), "name" => $columnName . '_reference_column_orderby', 'data' => $reference_details['columns']);
                $content_details_array["formelements"]['column'][$columnName]['pattern'] = array("value" => setDefaultValues($columnName . "_validation_pattern_value", "", $saveddata), "name" => $columnName . '_validation_pattern_value');
                $content_details_array["formelements"]['column'][$columnName]['min'] = array("value" => setDefaultValues($columnName . "_min", "", $saveddata), "name" => $columnName . '_min');
                $content_details_array["formelements"]['column'][$columnName]['max'] = array("value" => setDefaultValues($columnName . "_max", "", $saveddata), "name" => $columnName . '_max');

                $content_details_array["formelements"]['column'][$columnName]['validations'] = array("value" => setDefaultValues($columnName . "_error", "no_validations", $saveddata), "name" => $columnName . '_error', 'required' => 'required', 'data' => $validationdata);
                $content_details_array["formelements"]['column'][$columnName]['mandatory'] = array("checked" => (setDefaultValues($columnName . "_mandatory", "", $saveddata) != '' ? 'checked' : ''), "name" => $columnName . '_mandatory', 'type' => 'checkbox');
                $content_details_array["formelements"]['column'][$columnName]['addonfly'] = array("checked" => (setDefaultValues($columnName . "_addonfly", "checked", $saveddata) != '' ? 'checked' : ''), "name" => $columnName . '_addonfly', 'type' => 'checkbox');
            }
        }
        if (is_array($referencetables)) {
            $referencetables = implode(",", $referencetables);
        }

        $content_details_array["formelements"]['reference_tables'] = array("value" => $referencetables, "type" => "hidden", "name" => 'reference_tables', "id" => 'reference_tables');

        $content_details_array["formelements"]['child_tables'] = array("value" => $childTables, "type" => "hidden", "name" => 'child_tables', "id" => 'child_tables');
    }

    $smarty->assign('AppCssURL', AppCssURL);
    $smarty->assign('AppImgURL', AppImgURL);
    $smarty->assign('AppJsURL', AppJsURL);
    $smarty->assign('AppTheme', AppTheme);
    $smarty->assign('AppThemeCss', AppThemeCss);
    $smarty->assign('AppThemeJs', AppThemeJs);
    $smarty->assign('AppThemeImg', AppThemeImg);
    $smarty->assign('columns', $columns);
    $smarty->assign('content_details_array', $content_details_array);

    $smarty->display(AppTheme . 'header.tpl');
    $smarty->display('formcreate.tpl');
    $smarty->display(AppTheme . 'footer.tpl');
}

function makeDisplayName($columnName) {
    return ucwords(str_replace('_', ' ', $columnName));
}

function setDefaultValues($column, $default, $data) {
    return $data->$column ? $data->$column : $default;
}

?>
