<?php

class cUtils {

    function redirect($uri = array(), $method = 'default', $http_response_code = 302) {
        $uri = $this->createUrl($uri);

        switch ($method) {
            case 'refresh' : header("Refresh:0;url=" . $uri);
                break;

            default : header("Location: " . $uri, TRUE, $http_response_code);
                break;
        }
        exit;
    }

    function encodeURL($url = array()) {
        if (is_array($url)) {
            foreach ($url as $key => $value) {
                $url[$key] = base64_encode($value);
            }
            $url['e'] = true;
        }
        return $url;
    }

    function decodeURL($url = array()) {
        if (is_array($url)) {
            foreach ($url as $key => $value) {
                $url[$key] = base64_decode($value);
            }
        }
        return $url;
    }

    function logMessage($level = 'error', $message, $php_error = FALSE) {
        static $_log;
        include_once AppRoot . AppController . '/cLogController' . '.php';
        $_log = new cLogController();

        $_log->write_log($level, $message, $php_error);
    }

    function logSQL($sql) {
        static $_log;
        include_once AppRoot . AppController . '/cLogController' . '.php';
        $_log = new cLogController();

        $_log->write_log('sql', $message, false);
    }

// --------------------------------------------------------------------

    /**
     * Clean POST array
     */
    function cleanPost($index = NULL, $xss_clean = FALSE) {

        if ($index === NULL AND !empty($_POST)) {
            $post = $_POST;
            if ($post['e'] == true) {
                $post = $this->decodeURL($post);
            }

            return $post;
        }
    }

// --------------------------------------------------------------------

    /**
     * Clean GET array
     * *
     */
    function cleanGet() {
        if (!empty($_GET)) {
            $get = $_GET;
            if ($get['e'] == true) {
                $get = $this->decodeURL($get);
            }

            return $get;
        }
    }

    function assoc_to_num_array($array, $key_val_sep = "=") {
        if ($array) {
            foreach ($array as $key => $value) {
                $temp[] = $key . $key_val_sep . $value;
            }
        }
        return $temp;
    }

    function xml2array($xmlObject, $out = array()) {
        foreach ((array) $xmlObject as $index => $node) {
            $out[$index] = ( is_object($node) || is_array($node) ) ? xml2array($node) : $node;
        }
        return $out;
    }

    function localize($file) {
        $languageFileName = AppRoot . AppLocalizationURL . $file . '.lang';
        if (is_readable($languageFileName)) {
//        return (array)json_decode(file_get_contents ($languageFileName));
            include_once $languageFileName;
        }
    }

    function createUrl($params) {
        foreach ($this->encodeURL($params) as $key => $value) {
            $url.="&" . $key . "=" . $value;
        }
        //TODO be fixed with the function http_build_url
        //return "index.php?" . http_build_url($this->encodeURL($params));
        return "index.php?" . $url;
    }

    function objectToArray($data) {

        $result = array();
        $data = (array) $data;
        foreach ($data as $key => $value) {
            if (is_object($value))
                $value = (array) $value;
            if (is_array($value))
                $result[$key] = $this->objectToArray($value);
            else
                $result[$key] = $value;
        }

        return $result;
    }

}

?>
