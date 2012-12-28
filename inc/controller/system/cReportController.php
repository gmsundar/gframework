<?php

/**
 * Description of cReportController
 *
 * @author mgovindan
 */
include_once('cController.php');

class cReportController extends cController {

    public $report_id = NULL;
    public $report_name = NULL;
    public $report_design_file = NULL;
    public $report_add_date = NULL;
    public $javareportObj = NULL;
    public $report_format = 'html';
    public $output_file = 'temp/';
    public $result = NULL;
    public $parameters = array();
    public $filters = array();
    private $filterstring = "";
    public $reportvariables = array();
    private $xml = "";

    public function __construct() {
        parent::__construct();
        require_once(AppJavaBridgeURL);
    }

    function getOutputFormat() {

        switch ($this->report_format) {
            case "pdf":
                $this->javareportObj = new java("org.eclipse.birt.report.engine.api.PDFRenderOption");
                $this->javareportObj->setOutputFormat("pdf");
                header("Content-type: application/pdf");

                break;
            case "html":
                $this->javareportObj = new java("org.eclipse.birt.report.engine.api.HTMLRenderOption");
                $this->javareportObj->setOutputFormat("html");
                $ih = new java("org.eclipse.birt.report.engine.api.HTMLServerImageHandler");
                $this->javareportObj->setImageHandler($ih);
                header("Content-type: text/html");
                break;
            case "doc":
                $this->javareportObj = new java("org.eclipse.birt.report.engine.api.RenderOption");
                $this->javareportObj->setOutputFormat("doc");
                header("Content-type: application/msword");
                break;
            case "xls":
                $this->javareportObj = new java("org.eclipse.birt.report.engine.api.RenderOption");
                $this->javareportObj->setOutputFormat("xls");
                header("Content-type: application/vnd.ms-excel");
                break;
            default: die("unknown output format $this->format");
        }
        header("Content-Disposition: inline; filename=" . $this->output_file . "." . $this->report_format);
    }

    function getReportFilter() {

        $parameters = xml2array($this->xml->{'parameters'});
        if (is_array($parameters['scalar-parameter'])) {
            foreach ($parameters['scalar-parameter'] as $key => $value) {
                if ($value['@attributes'] != '') {
                    $data = array();
                    $multiple = "";
                    $filtercontrolname="";
                    $filtercolumnname = $value['@attributes']['name'];
                    $filtercolumnnameoriginal = substr($filtercolumnname, 1);
                    if (strpos($filtercolumnnameoriginal, '@')) {
                        $filtercolumnnameoriginalArray = explode("__", $filtercolumnnameoriginal);
                        list($filtersourcecolumn, $filtersourcetable) = explode("@", $filtercolumnnameoriginalArray[0]);
                        list($filterdestcolumn, $filterdesttable) = explode("@", $filtercolumnnameoriginalArray[1]);
                        $filtercolumnnameoriginal = $filtersourcecolumn;
                        $filtercolumnname = $filtersourcecolumn;
                    } else {
                        $filtersourcecolumn = $filtercolumnnameoriginal;
                    }
                    if ($value['property']['2'] == 'date') {
                        $filterdatatype = $value['property']['2'];
                        $filtercontroltype = $value['property']['5'];
                        $filtercontrolstyle = "width:180px";
                    } else {
                        $filterdatatype = $value['property']['3'];
                        $filtercontroltype = $value['property']['6'];
                        if ($filtercontroltype == "list-box" && $filterdestcolumn != "" && $filterdesttable != "") {

                            $data = $this->getSelectData($filterdesttable, $filterdestcolumn);
                            $filtercontrolname = $filtercolumnname . "[]";
                            $multiple = "multiple";
                        }
                        $filtercontrolstyle = "";
                    }
                    $this->filters[$filtercolumnname]['name'] = $filtercontrolname?$filtercontrolname:$filtercolumnname;
                    $this->filters[$filtercolumnname]['id'] = $filtercontrolname?$filtercontrolname:$filtercolumnname;
                    $this->filters[$filtercolumnname]['type'] = $filterdatatype;
                    $this->filters[$filtercolumnname]['displayname'] = ucfirst(str_replace("_", " ", $filtercolumnnameoriginal));
                    $this->filters[$filtercolumnname]['style'] = $filtercontrolstyle;
                    $this->filters[$filtercolumnname]['sourcecolumn'] = $filtersourcecolumn;
                    $this->filters[$filtercolumnname]['sourcetable'] = $filtersourcetable;
                    $this->filters[$filtercolumnname]['destcolumn'] = $filterdestcolumn;
                    $this->filters[$filtercolumnname]['desttable'] = $filterdesttable;
                    $this->filters[$filtercolumnname]['controltype'] = $filtercontroltype;
                    $this->filters[$filtercolumnname]['data'] = $data;
                    $this->filters[$filtercolumnname]['multiple'] = $multiple;
                    $this->filters[$filtercolumnname]['nodefaulttext'] = "true";
                }
            }
        }
    }

   function setDefaultFilters(){
       $this->filterstring.="";
   } 
    function setReportFilters() {

        foreach ($this->filters as $key => $value) {
            
            if ($value['selectedvalue'] != '') {
                if ($value['sourcetable'] != "") {
                    $filtercolumnnameoriginal = $value['sourcetable'] . "." . $value['sourcecolumn'];
                } else {
                    $filtercolumnnameoriginal = $value['sourcecolumn'];
                }

                if ($value['type'] == 'date') {
                    if (strripos($value['selectedvalue'], 'to')) {

                        $dataArray = explode("to", $value['selectedvalue']);
                        if ($dataArray[0]) {
                            $dataArray[0] = date('Y-m-d', strtotime($dataArray[0]));
                        }
                        if ($dataArray[1]) {
                            $dataArray[1] = date('Y-m-d', strtotime($dataArray[1]));
                        }

                        if ($dataArray[0] != "" && $dataArray[1] != "") {

                            $this->filterstring .= " " . $filtercolumnnameoriginal . " BETWEEN '" . $dataArray[0] . "' AND '" . $dataArray[1] . "' AND ";
                        } elseif ($dataArray[0] != "") {
                            $this->filterstring .= " " . $filtercolumnnameoriginal . " < '" . $value['selectedvalue'] . "' AND ";
                        } elseif ($dataArray[1] != "") {
                            $this->filterstring .= " " . $filtercolumnnameoriginal . " > '" . $value['selectedvalue'] . "' AND ";
                        }
                    } else {

                        $this->filterstring .= " " . $filtercolumnnameoriginal . "='" . $value['selectedvalue'] . "' AND ";
                    }
                } else {
                    if (is_array($value['selectedvalue'])) {
                        $this->filterstring .= " " . $filtercolumnnameoriginal . " in ('" . implode("','",$value['selectedvalue']) . "') AND ";
                    } else {
                        $this->filterstring .= " " . $filtercolumnnameoriginal . "='" . $value['selectedvalue'] . "' AND ";
                    }
                }
            }
        }
        if ($this->filterstring != "") {
            $this->filterstring = rtrim($this->filterstring, " AND ");
            $sql = $this->xml->{'data-sets'}->{'oda-data-set'}->{'xml-property'}[0];
            if (stristr($sql, "where")) {
                $this->filterstring = " AND " . $this->filterstring;
            } else {
                $this->filterstring = " WHERE " . $this->filterstring;
            }
            $this->xml->{'data-sets'}->{'oda-data-set'}->{'xml-property'}[0] = $sql . $this->filterstring;
        }
        $this->setDefaultFilters();
    }

    function getReportDetails() {
        $this->table = "__reports";
        $reportDetailsArray = $this->addWhereCondition("id = $this->id")->select()->executeRead();

        $this->report_design_file = $reportDetailsArray[0]['report_file'];
        $this->xml = simplexml_load_file(AppReportDesigns . $this->report_design_file);
    }

    function setReportVariables() {
        $reportVariables = (array) $this->xml->{'property'}[11]->{'variable-element'};
        $this->reportvariables[$reportVariables['@attributes']['name']] = $reportVariables['expression'];
    }

    function makeTempReportfile() {

        $this->xml->{'data-sources'}->{'oda-data-source'}->{'property'}[1] = "jdbc:" . DataBaseType . "://" . DataBaseHost . ":" . DataBasePort . "/" . DataBaseName;
        $this->xml->{'data-sources'}->{'oda-data-source'}->{'property'}[2] = DataBaseUser;
        if (DataBasePass != '') {
            $this->xml->{'data-sources'}->{'oda-data-source'}->{'encrypted-property'} = base64_encode(DataBasePass);
            if(!$this->xml->{'data-sources'}->{'oda-data-source'}->{'encrypted-property'}['name'])
            $this->xml->{'data-sources'}->{'oda-data-source'}->{'encrypted-property'}->addAttribute("name","odaPassword");
            if(!$this->xml->{'data-sources'}->{'oda-data-source'}->{'encrypted-property'}['encryptionID'])
            $this->xml->{'data-sources'}->{'oda-data-source'}->{'encrypted-property'}->addAttribute("encryptionID","base64");
        }else{
            unset($this->xml->{'data-sources'}->{'oda-data-source'}->{'encrypted-property'});
        }
        $this->output_file = AppReportDesigns . $this->output_file . $this->report_design_file;
        $this->setReportFilters();
        $xmlstring = $this->xml->asXML();
        $fp = fopen($this->output_file, 'w');
        fwrite($fp, $xmlstring);
        fclose($fp);
    }

    function generateReport() {

        $this->makeTempReportfile();
        $this->setReportVariables();
        $ctx = java_context()->getServletContext();
        $birtReportEngine = java("org.eclipse.birt.php.birtengine.BirtEngine")->getBirtEngine($ctx);
        java_context()->onShutdown(java("org.eclipse.birt.php.birtengine.BirtEngine")->getShutdownHook());
        try {

            $report = $birtReportEngine->openReportDesign($this->output_file);
            $task = $birtReportEngine->createRunAndRenderTask($report);
            if (is_array($this->parameters)) {
                foreach ($this->parameters as $key => $value) {
                    $id = substr($key, 1);
                    $task->setParameterValue($id, $value);
                }
            }

            $this->getOutputFormat();
            $this->javareportObj->setOutputStream($out = new java("java.io.ByteArrayOutputStream"));
            $task->setRenderOption($this->javareportObj);
            $task->run();
            $task->close();
        } catch (JavaException $e) {
            echo $e;
        }
        $this->result = java_values($out->toByteArray());
    }

}

?>
