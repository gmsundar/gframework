<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cXMLController
 *
 * @author gt
 */
class cXMLController {

    public $root = "gbase_config";
    public $file = "";
    public $data = "";
    private $xmlObj = "";

    function writeArrayToXML() {
        $this->xmlObj = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><" . $this->root . "></" . $this->root . ">");
        $this->arrayToXml($this->data, $this->xmlObj);
        $this->xmlObj->asXML($this->file);
    }

// function defination to convert array to xml
    private function arrayToXml($data, &$xmlObj) {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xmlObj->addChild("$key");
                    $this->arrayToXml($value, $subnode);
                } else {
                    $this->arrayToXml($value, $xmlObj);
                }
            } else {
                $xmlObj->addChild("$key", "$value");
            }
        }
    }

    function readXmlFile() {
        if (file_exists($this->file)) {
            return simplexml_load_file($this->file);
        } else {
            return false;
        }
    }

    function xmlstrToArray() {
        $xml = simplexml_load_string(file_get_contents($this->file));

        $array_string = json_encode($xml);

        $array = json_decode($array_string, true);

        return $array;
    }

    function domnodeToArray($node) {
        $output = array();
        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
            case XML_TEXT_NODE:
                $output = trim($node->textContent);
                break;
            case XML_ELEMENT_NODE:
                for ($i = 0, $m = $node->childNodes->length; $i < $m; $i++) {
                    $child = $node->childNodes->item($i);
                    $v = domnode_to_array($child);
                    if (isset($child->tagName)) {
                        $t = $child->tagName;
                        if (!isset($output[$t])) {
                            $output[$t] = array();
                        }
                        $output[$t][] = $v;
                    } elseif ($v) {
                        $output = (string) $v;
                    }
                }
                if (is_array($output)) {
                    if ($node->attributes->length) {
                        $a = array();
                        foreach ($node->attributes as $attrName => $attrNode) {
                            $a[$attrName] = (string) $attrNode->value;
                        }
                        $output['@attributes'] = $a;
                    }
                    foreach ($output as $t => $v) {
                        if (is_array($v) && count($v) == 1 && $t != '@attributes') {
                            $output[$t] = $v[0];
                        }
                    }
                }
                break;
        }
        return $output;
    }

    function DOMinnerHTML() {
        $innerHTML = "";
        $children = $this->data->childNodes;
        foreach ($children as $child) {
            $tmp_dom = new DOMDocument();
            $tmp_dom->appendChild($tmp_dom->importNode($child, true));
            $innerHTML.=trim($tmp_dom->saveHTML());
        }
        return $innerHTML;
    }

}

?>
