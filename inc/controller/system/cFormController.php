<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cFormController
 *
 * @author gt
 */
include_once('cController.php');
include_once('../common/utils.php');

class cFormController extends cController {

    public $html;
    public $properties;
    private $currentControl;
    public $tplPath = "";
    public $scriptsPath = "";
    public $controllerPath = "";
    public $langPath = "";
    public $filename = "";
    private $scriptCode = "";
    private $controllerCode = "";
    private $jsCode = "";
    public $projectFile = "gapp.gpr";
    public $projectFilePath = "";

    function __construct() {

    }

    function createModal() {

    }

    function createController() {
        $this->controllerCode = "<?php include_once('system/cController.php');" .
                'class c' . ucwords($this->filename) . ' extends cController {';


        $this->controllerCode .='//Events for forms';
        $this->controllerCode .='public function beforeAdd(){

        }';
        $this->controllerCode .='public function afterAdd(){

        }';
        $this->controllerCode .='public function beforeEdit(){

        }';
        $this->controllerCode .='public function afterEdit(){

        }';
        $this->controllerCode .='public function beforeView(){

        }';
        $this->controllerCode .='public function beforeViewAll(){

        }';
        $this->controllerCode .='} ' . "\n" . ' ?>';
        file_put_contents($this->controllerPath . "/c" . ucwords($this->filename) . ".php", $this->controllerCode);
    }

    function createPage() {
        $this->createView();
        $this->createScript();
        $this->createController();
        $this->updateProjectCode();
    }

    function createView() {
        if ($this->html != '') {
            $dom = new DOMDocument();
            @$dom->loadHTML($this->html);
            $dom->encoding = 'utf-8';
# remove <!DOCTYPE
            $dom->removeChild($dom->firstChild);
# remove <html><body></body></html>
            $dom->replaceChild($dom->firstChild->firstChild->firstChild, $dom->firstChild);

            foreach ($dom->getElementsByTagName('span') as $node) {
                $nodeid = $node->getAttribute('id');
                $ctrltype = substr($nodeid, - 5);
                $ctrlname = substr($nodeid, 0, -5);
                if ($ctrltype === '_ctrl' || $ctrltype === '_labl') {
                    $this->currentControl['name'] = $ctrlname;
                    if ($ctrltype === '_ctrl') {
                        $this->currentControl['type'] = $this->properties->$ctrlname->{'add_as'};
                        $this->currentControl['properties'] = objectToArray($this->properties->$ctrlname);
                        $this->createControl();

                        $node->nodeValue = $this->viewScript;
                        $this->viewScript = "";
                    } else {
//$node->nodeValue = 'Sundar';
                    }
                }
            }
            foreach ($dom->getElementsByTagName('*') as $node) {
                $node->removeAttribute('id');
                $classname = $node->getAttribute('class');
                $node->removeAttribute('class');
                $node->removeAttribute('data-type');
                $node->removeAttribute('data-context-menu');
                $node->removeAttribute('style');

                if ($classname == 'icon-pencil' || $classname == 'close' || $node->nodeValue == '&Atilde;&#151;') {

                    $node->parentNode->removeChild($node);
                }
            }
            $submit = $dom->createElement('button', 'Submit');
            //creating submit button @ the end of page
            $submit->setAttribute('type', 'submit');
            $submit->setAttribute('class', 'btn');
            $dom->appendChild($submit);
            $script = $dom->createElement('script');
            // Creating an empty text node forces <script></script>

            $script->appendChild($dom->createTextNode('{literal}' . $this->jsCode . '{/literal}'));
            $dom->appendChild($script);
            file_put_contents($this->tplPath . "/" . $this->filename . ".tpl", "<form method='POST'>" . $dom->saveHTML() . "</form>");
        }
    }

    function createScript() {

        $scriptCode = $this->scriptCode;

        $this->scriptCode = "<?php " .
                'include_once AppRoot . AppController . "c' . ucwords($this->filename) . '.php";' .
                '$' . $this->filename . 'Obj = new c' . $this->filename . '();';

        $this->scriptCode.='$action = $get["action"]?$get["action"]:"viewall";';
        $this->scriptCode.='$' . $this->filename . 'Obj ->id = $id = $get["id"];';

        $this->scriptCode.='if($post){

$' . $this->filename . 'Obj->action = $post["formaction"];
    $content_details_array["page"] = $' . $this->filename . '>curd();

    if ($get["type"] == "") {
        redirect("' . $this->filename . '&id=".$' . $this->filename . 'Obj->id."&action=view");
    }else{
    $data=$' . $this->filename . 'Obj->getSelectData($get["file"], $get["columns"], "id=".$' . $this->filename . 'Obj->id, "");
        echo json_encode($data);
        exit;
    }

} else {

     if ($action == "view" || $action == "edit") {

        if($action == "edit"){
            $' . $this->filename . 'Obj->action = "editview";
         }else{
            $' . $this->filename . 'Obj->action = "view";
         }


        $defaultdata = $' . $this->filename . 'Obj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $' . $this->filename . 'Obj->action=$action;
    $content_details_array["page"] = $' . $this->filename . 'Obj->curd();
    redirect("' . $this->filename . '&action=viewall");
    }

}';


        $this->scriptCode .=$scriptCode . "?>";
        file_put_contents($this->scriptsPath . "/" . $this->filename . ".php", $this->scriptCode);
    }

    function createPageJS() {
        print_r($this->currentControl['properties']);
        switch ($this->currentControl['type']) {
            case 'date':
                $this->jsCode.="$('#" . $this->currentControl['name'] . "_display_date').datepicker({
                    'changeMonth': true,
                    'changeYear': true,
                    'dateFormat':'DD, d MM, yy',
                    'altField': '#" . $this->currentControl['name'] . "',
                    'altFormat': 'yy-mm-dd'";
                if ($this->currentControl['properties']['properties']['min'] != '') {
                    $this->jsCode.=",minDate: '" . $this->currentControl['properties']['properties']['max'] . "'";
                }

                if ($this->currentControl['properties']['properties']['max'] != '') {
                    $this->jsCode.=",maxDate: '" . $this->currentControl['properties']['properties']['max'] . "'";
                }


                $this->jsCode.="});
\n";
                break;
        }
    }

    function addSequenceCode() {

    }

    function createControl() {

        $this->scriptCode.= '$content_details_array["formelements"][ "' . $this->currentControl['name'] . '"]=array(';
        $this->scriptCode.="'name' => '" . $this->currentControl['name'] . "', ";
        $this->scriptCode.="'id' => '" . $this->currentControl['name'] . "', ";
        $this->scriptCode.="'value' => \${$this->filename}Obj->setDefaultValue('" . $this->currentControl['properties']['default_value'] . "', \$data['" . $this->currentControl['name'] . "']), ";

        $this->scriptCode.="'mandatory' => '" . $this->currentControl['properties']['mandatory'] . "', ";
        $this->scriptCode.="'class' => '" . $this->currentControl['properties']['class'] . "'";

        switch ($this->currentControl['type']) {
            case 'label':
                $this->viewScript = '{include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'select':


                if ($this->currentControl['properties']['data']['from'] !== '' && $this->currentControl['properties']['data']['cols'] !== '') {
                    $this->scriptCode.=", 'data' => \${$this->filename}Obj->getSelectData('" . $this->currentControl['properties']['data']['from'] . "', 'id," . $this->currentControl['properties']['data']['cols'] . "', '" . $this->currentControl['properties']['data']['where'] . "', '" . $this->currentControl['properties']['data']['orderby'] . "', '" . $this->currentControl['properties']['data']['join'] . "')";
                } else {
                    if (is_array($this->currentControl['properties']['data']['static'])) {
                        $this->scriptCode.=", 'data' => array(";
                        foreach ($this->currentControl['properties']['data']['static'] as $key => $value) {
                            $this->scriptCode.="'" . $value[0] . "' => '" . $value[1] . "', ";
                        }
                        $this->scriptCode = rtrim($this->scriptCode, ", ");
                        $this->scriptCode.=")";
                    }
                }

                $this->viewScript = '{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'checkbox':
                if ($this->currentControl['properties']['default_value'])
                    $this->scriptCode.=", 'checked' => '" . $this->currentControl['checked'] . "'";
                $this->viewScript = '{include file="formelements/checkbox.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'radio':
                if ($this->currentControl['properties']['default_value'])
                    $this->scriptCode.=", 'checked' => '" . $this->currentControl['checked'] . "'";
                $this->viewScript = '{include file="formelements/radio.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'text':
                $this->scriptCode.=", 'type' => '" . $this->currentControl['properties']['properties']['type'] . "'";
                $this->viewScript = '{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'date':
                $this->viewScript = '{include file="formelements/date.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                $this->createPageJS();
                break;
            case 'datetime':
                $this->viewScript = '{include file="formelements/datetime.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'time':
                $this->viewScript = '{include file="formelements/time.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'color':
                $this->viewScript = '{include file="formelements/color.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'file':
                $this->viewScript = '{include file="formelements/file.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'camera':
                $this->viewScript = '{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'textarea':
                $this->viewScript = '{include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'url':
                $this->viewScript = '{include file="formelements/anchor.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'image':
                $this->viewScript = '{include file="formelements/image.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'audio':
                $this->viewScript = '{include file="formelements/audio.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'video':
                $this->viewScript = '{include file="formelements/video.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'map':
                $this->viewScript = '{include file="formelements/map.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            case 'custom':
                $this->viewScript = '{include file="formelements/custom.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
            default:
                //html
                $this->viewScript = '{include file="formelements/html.tpl" inputDetails=$content_details_array.formelements.' . $this->currentControl['name'] . '}';
                break;
        }
        $this->scriptCode.=");
";
    }

    function createLayout() {

    }

    function loadProjectCode() {
        if (is_readable($this->projectFilePath . $this->projectFile)) {
            $data = file_get_contents($this->projectFilePath . $this->projectFile);
            $data = json_decode($data);
        }
        $this->properties = $data->{$this->filename}->{"properties"};
        $this->html = $data->{$this->filename}->{"html"};
    }

    function updateProjectCode() {
        if (is_readable($this->projectFilePath . $this->projectFile)) {
            $data = file_get_contents($this->projectFilePath . $this->projectFile);
            $data = json_decode($data);
        }

        $data->{$this->filename}->{"properties"} = $this->properties;
        $data->{$this->filename}->{"html"} = $this->html;
        file_put_contents($this->projectFilePath . $this->projectFile, json_encode($data));
    }

}

?>
