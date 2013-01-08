<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cLogController
 *
 * @author gt
 */
class cLogController {

    protected $_log_path;
    protected $_threshold = AppLogLevel;
    protected $_date_fmt = 'Y-m-d H:i:s';
    protected $_enabled = TRUE;
    protected $_levels = array('ERROR' => '1', 'DEBUG' => '2', 'INFO' => '3', 'ALL' => '4');

    /**
     * Constructor
     */
    public function __construct() {


        $this->_log_path = (AppLogPath != '') ? AppLogPath : AppRoot . '/logs/';

        if (!is_dir($this->_log_path) OR !is_writable($this->_log_path)) {
            $this->_enabled = FALSE;
        }

        if (is_numeric(AppLogLevel)) {
            $this->_threshold = AppLogLevel;
        }

        if (AppLogDateFormat != '') {
            $this->_date_fmt = AppLogDateFormat;
        }
    }

    // --------------------------------------------------------------------

    /**
     * Write Log File
     *
     * Generally this function will be called using the global log_message() function
     *
     * @param	string	the error level
     * @param	string	the error message
     * @param	bool	whether the error is a native PHP error
     * @return	bool
     */
    public function write_log($level = 'error', $msg, $php_error = FALSE) {
        if ($this->_enabled === FALSE) {
            return FALSE;
        }

        $level = strtoupper($level);

        if (!isset($this->_levels[$level]) OR ($this->_levels[$level] > $this->_threshold)) {
            return FALSE;
        }

        $filepath = $this->_log_path . 'log-' . date('Y-m-d') . '.php';
        $message = '';

        if (!file_exists($filepath)) {
            $message .= "<" . "?php  if ( ! defined('AppRoot')) exit('No direct script access allowed'); ?" . ">\n\n";
        }

        if (!$fp = @fopen($filepath, FOPEN_WRITE_CREATE)) {
            return FALSE;
        }

        $message .= $level . ' ' . (($level == 'INFO') ? ' -' : '-') . ' ' . date($this->_date_fmt) . ' --> ' . $msg . "\n";

        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);

        @chmod($filepath, FILE_WRITE_MODE);
        return TRUE;
    }

}

?>
