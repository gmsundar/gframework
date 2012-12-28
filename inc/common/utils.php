<?php

function redirect($uri = '', $method = 'default', $http_response_code = 302) {
//		if ( ! preg_match('#^https?://#i', $uri))
//		{
//			$uri = site_url($uri);
//		}

    switch ($method) {
        case 'refresh' : header("Refresh:0;url=" . $uri);
            break;
        case 'default' : header("Location: index.php?file=" . $uri, TRUE, $http_response_code);
            break;
        default : header("Location: " . $uri, TRUE, $http_response_code);
            break;
    }
    exit;
}

function log_message($level = 'error', $message, $php_error = FALSE) {
    static $_log;
    include_once AppRoot . AppController . '/cLogController' . '.php';
    $_log = new cLogController();

    $_log->write_log($level, $message, $php_error);
}

function log_sql($sql) {
    static $_log;
    include_once AppRoot . AppController . '/cLogController' . '.php';
    $_log = new cLogController();

    $_log->write_log('sql', $message, false);
}

// --------------------------------------------------------------------

/**
 * Fetch an item from the POST array
 *
 * @access	public
 * @param	string
 * @param	bool
 * @return	string
 */
function cleanpost($index = NULL, $xss_clean = FALSE) {
    // Check if a field has been provided
    if ($index === NULL AND !empty($_POST)) {
        $post = array();
        //TODO Sundar Check post array for clean
//$this->_fetch_from_array($_POST, $key, $xss_clean);
        // Loop through the full _POST array and return it
        foreach (array_keys($_POST) as $key) {
            if ($_POST['e'] == true) {
                $post[$key] = base64_decode($_POST[$key]);
            } else {
                $post[$key] = $_POST[$key];
            }
        }
        return $post;
    }

//    return $this->_fetch_from_array($_POST, $index, $xss_clean);
}

// --------------------------------------------------------------------

/**
 * Fetch an item from the GET array
 *
 * @access	public
 * @param	string
 * @param	bool
 * @return	string
 */
function cleanget($index = NULL, $xss_clean = FALSE) {
    // Check if a field has been provided
    if ($index === NULL AND !empty($_GET)) {
        $get = array();
        //TODO Sundar Check post array for clean
//$this->_fetch_from_array($_GET, $key, $xss_clean);
        // loop through the full _GET array

        foreach (array_keys($_GET) as $key) {
            if ($_GET['e'] == true) {
                $get[$key] = base64_decode($_GET[$key]);
            } {
                $get[$key] = $_GET[$key];
            }
        }
        return $get;
    }

//    return $this->_fetch_from_array($_GET, $index, $xss_clean);
}

// --------------------------------------------------------------------

/**
 * Fetch an item from either the GET array or the POST
 *
 * @access	public
 * @param	string	The index key
 * @param	bool	XSS cleaning
 * @return	string
 */
function get_post($index = '', $xss_clean = FALSE) {
    if (!isset($_POST[$index])) {
        return $this->get($index, $xss_clean);
    } else {
        return $this->post($index, $xss_clean);
    }
}

// --------------------------------------------------------------------

/**
 * Fetch an item from the COOKIE array
 *
 * @access	public
 * @param	string
 * @param	bool
 * @return	string
 */
function cookie($index = '', $xss_clean = FALSE) {
    return $this->_fetch_from_array($_COOKIE, $index, $xss_clean);
}

// --------------------------------------------------------------------

/**
 * Fetch an item from the SERVER array
 *
 * @access	public
 * @param	string
 * @param	bool
 * @return	string
 */
function server($index = '', $xss_clean = FALSE) {
    return $this->_fetch_from_array($_SERVER, $index, $xss_clean);
}

// --------------------------------------------------------------------

/**
 * Fetch the IP Address
 *
 * @access	public
 * @return	string
 */
function ip_address() {
    if ($this->ip_address !== FALSE) {
        return $this->ip_address;
    }

    if (config_item('proxy_ips') != '' && $this->server('HTTP_X_FORWARDED_FOR') && $this->server('REMOTE_ADDR')) {
        $proxies = preg_split('/[\s,]/', config_item('proxy_ips'), -1, PREG_SPLIT_NO_EMPTY);
        $proxies = is_array($proxies) ? $proxies : array($proxies);

        $this->ip_address = in_array($_SERVER['REMOTE_ADDR'], $proxies) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    } elseif ($this->server('REMOTE_ADDR') AND $this->server('HTTP_CLIENT_IP')) {
        $this->ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ($this->server('REMOTE_ADDR')) {
        $this->ip_address = $_SERVER['REMOTE_ADDR'];
    } elseif ($this->server('HTTP_CLIENT_IP')) {
        $this->ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ($this->server('HTTP_X_FORWARDED_FOR')) {
        $this->ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    if ($this->ip_address === FALSE) {
        $this->ip_address = '0.0.0.0';
        return $this->ip_address;
    }

    if (strpos($this->ip_address, ',') !== FALSE) {
        $x = explode(',', $this->ip_address);
        $this->ip_address = trim(end($x));
    }

    if (!$this->valid_ip($this->ip_address)) {
        $this->ip_address = '0.0.0.0';
    }

    return $this->ip_address;
}

// --------------------------------------------------------------------

/**
 * Validate IP Address
 *
 * Updated version suggested by Geert De Deckere
 *
 * @access	public
 * @param	string
 * @return	string
 */
function valid_ip($ip) {
    $ip_segments = explode('.', $ip);

    // Always 4 segments needed
    if (count($ip_segments) != 4) {
        return FALSE;
    }
    // IP can not start with 0
    if ($ip_segments[0][0] == '0') {
        return FALSE;
    }
    // Check each segment
    foreach ($ip_segments as $segment) {
        // IP segments must be digits and can not be
        // longer than 3 digits or greater then 255
        if ($segment == '' OR preg_match("/[^0-9]/", $segment) OR $segment > 255 OR strlen($segment) > 3) {
            return FALSE;
        }
    }

    return TRUE;
}

// --------------------------------------------------------------------

/**
 * User Agent
 *
 * @access	public
 * @return	string
 */
function user_agent() {
    if ($this->user_agent !== FALSE) {
        return $this->user_agent;
    }

    $this->user_agent = (!isset($_SERVER['HTTP_USER_AGENT'])) ? FALSE : $_SERVER['HTTP_USER_AGENT'];

    return $this->user_agent;
}

// --------------------------------------------------------------------

/**
 * Sanitize Globals
 *
 * This function does the following:
 *
 * Unsets $_GET data (if query strings are not enabled)
 *
 * Unsets all globals if register_globals is enabled
 *
 * Standardizes newline characters to \n
 *
 * @access	private
 * @return	void
 */
function _sanitize_globals() {
    // It would be "wrong" to unset any of these GLOBALS.
    $protected = array('_SERVER', '_GET', '_POST', '_FILES', '_REQUEST',
        '_SESSION', '_ENV', 'GLOBALS', 'HTTP_RAW_POST_DATA',
        'system_folder', 'application_folder', 'BM', 'EXT',
        'CFG', 'URI', 'RTR', 'OUT', 'IN');

    // Unset globals for securiy.
    // This is effectively the same as register_globals = off
    foreach (array($_GET, $_POST, $_COOKIE) as $global) {
        if (!is_array($global)) {
            if (!in_array($global, $protected)) {
                global $$global;
                $$global = NULL;
            }
        } else {
            foreach ($global as $key => $val) {
                if (!in_array($key, $protected)) {
                    global $$key;
                    $$key = NULL;
                }
            }
        }
    }

    // Is $_GET data allowed? If not we'll set the $_GET to an empty array
    if ($this->_allow_get_array == FALSE) {
        $_GET = array();
    } else {
        if (is_array($_GET) AND count($_GET) > 0) {
            foreach ($_GET as $key => $val) {
                $_GET[$this->_clean_input_keys($key)] = $this->_clean_input_data($val);
            }
        }
    }

    // Clean $_POST Data
    if (is_array($_POST) AND count($_POST) > 0) {
        foreach ($_POST as $key => $val) {
            $_POST[$this->_clean_input_keys($key)] = $this->_clean_input_data($val);
        }
    }

    // Clean $_COOKIE Data
    if (is_array($_COOKIE) AND count($_COOKIE) > 0) {
        // Also get rid of specially treated cookies that might be set by a server
        // or silly application, that are of no use to a CI application anyway
        // but that when present will trip our 'Disallowed Key Characters' alarm
        // http://www.ietf.org/rfc/rfc2109.txt
        // note that the key names below are single quoted strings, and are not PHP variables
        unset($_COOKIE['$Version']);
        unset($_COOKIE['$Path']);
        unset($_COOKIE['$Domain']);

        foreach ($_COOKIE as $key => $val) {
            $_COOKIE[$this->_clean_input_keys($key)] = $this->_clean_input_data($val);
        }
    }

    // Sanitize PHP_SELF
    $_SERVER['PHP_SELF'] = strip_tags($_SERVER['PHP_SELF']);


    // CSRF Protection check
    if ($this->_enable_csrf == TRUE) {
        $this->csrf_verify();
    }

    log_message('debug', "Global POST and COOKIE data sanitized");
}

// --------------------------------------------------------------------

/**
 * Clean Input Data
 *
 * This is a helper function. It escapes data and
 * standardizes newline characters to \n
 *
 * @access	private
 * @param	string
 * @return	string
 */
function _clean_input_data($str) {
    if (is_array($str)) {
        $new_array = array();
        foreach ($str as $key => $val) {
            $new_array[$this->_clean_input_keys($key)] = $this->_clean_input_data($val);
        }
        return $new_array;
    }

    /* We strip slashes if magic quotes is on to keep things consistent

      NOTE: In PHP 5.4 get_magic_quotes_gpc() will always return 0 and
      it will probably not exist in future versions at all.
     */
    if (!is_php('5.4') && get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }

    // Clean UTF-8 if supported
    if (UTF8_ENABLED === TRUE) {
        $str = $this->uni->clean_string($str);
    }

    // Remove control characters
    $str = remove_invisible_characters($str);

    // Should we filter the input data?
    if ($this->_enable_xss === TRUE) {
        $str = xss_clean($str);
    }

    // Standardize newlines if needed
    if ($this->_standardize_newlines == TRUE) {
        if (strpos($str, "\r") !== FALSE) {
            $str = str_replace(array("\r\n", "\r", "\r\n\n"), PHP_EOL, $str);
        }
    }

    return $str;
}

// --------------------------------------------------------------------

/**
 * Clean Keys
 *
 * This is a helper function. To prevent malicious users
 * from trying to exploit keys we make sure that keys are
 * only named with alpha-numeric text and a few other items.
 *
 * @access	private
 * @param	string
 * @return	string
 */
function _clean_input_keys($str) {
    if (!preg_match("/^[a-z0-9:_\/-]+$/i", $str)) {
        exit('Disallowed Key Characters.');
    }

    // Clean UTF-8 if supported
    if (UTF8_ENABLED === TRUE) {
        $str = $this->uni->clean_string($str);
    }

    return $str;
}

// --------------------------------------------------------------------

/**
 * Request Headers
 *
 * In Apache, you can simply call apache_request_headers(), however for
 * people running other webservers the function is undefined.
 *
 * @param	bool XSS cleaning
 *
 * @return array
 */
function request_headers($xss_clean = FALSE) {
    // Look at Apache go!
    if (function_exists('apache_request_headers')) {
        $headers = apache_request_headers();
    } else {
        $headers['Content-Type'] = (isset($_SERVER['CONTENT_TYPE'])) ? $_SERVER['CONTENT_TYPE'] : @getenv('CONTENT_TYPE');

        foreach ($_SERVER as $key => $val) {
            if (strncmp($key, 'HTTP_', 5) === 0) {
                $headers[substr($key, 5)] = $this->_fetch_from_array($_SERVER, $key, $xss_clean);
            }
        }
    }

    // take SOME_HEADER and turn it into Some-Header
    foreach ($headers as $key => $val) {
        $key = str_replace('_', ' ', strtolower($key));
        $key = str_replace(' ', '-', ucwords($key));

        $this->headers[$key] = $val;
    }

    return $this->headers;
}

// --------------------------------------------------------------------

/**
 * Get Request Header
 *
 * Returns the value of a single member of the headers class member
 *
 * @param 	string		array key for $this->headers
 * @param	boolean		XSS Clean or not
 * @return 	mixed		FALSE on failure, string on success
 */
function get_request_header($index, $xss_clean = FALSE) {
    if (empty($this->headers)) {
        $this->request_headers();
    }

    if (!isset($this->headers[$index])) {
        return FALSE;
    }

    if ($xss_clean === TRUE) {
        return xss_clean($this->headers[$index]);
    }

    return $this->headers[$index];
}

// --------------------------------------------------------------------

/**
 * Is ajax Request?
 *
 * Test to see if a request contains the HTTP_X_REQUESTED_WITH header
 *
 * @return 	boolean
 */
function is_ajax_request() {
    return ($this->server('HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest');
}

// --------------------------------------------------------------------

/**
 * Is cli Request?
 *
 * Test to see if a request was made from the command line
 *
 * @return 	boolean
 */
function is_cli_request() {
    return (php_sapi_name() == 'cli') or defined('STDIN');
}

/**
 * Fetch from array
 *
 * This is a helper function to retrieve values from global arrays
 *
 * @access	private
 * @param	array
 * @param	string
 * @param	bool
 * @return	string
 */
function _fetch_from_array(&$array, $index = '', $xss_clean = FALSE) {
    if (!isset($array[$index])) {
        return FALSE;
    }

    if ($xss_clean === TRUE) {
        return xss_clean($array[$index]);
    }

    return $array[$index];
}

/**
 * XSS Clean
 *
 * Sanitizes data so that Cross Site Scripting Hacks can be
 * prevented.  This function does a fair amount of work but
 * it is extremely thorough, designed to prevent even the
 * most obscure XSS attempts.  Nothing is ever 100% foolproof,
 * of course, but I haven't been able to get anything passed
 * the filter.
 *
 * Note: This function should only be used to deal with data
 * upon submission.  It's not something that should
 * be used for general runtime processing.
 *
 * This function was based in part on some code and ideas I
 * got from Bitflux: http://channel.bitflux.ch/wiki/XSS_Prevention
 *
 * To help develop this script I used this great list of
 * vulnerabilities along with a few other hacks I've
 * harvested from examining vulnerabilities in other programs:
 * http://ha.ckers.org/xss.html
 *
 * @param	mixed	string or array
 * @param 	bool
 * @return	string
 */
function xss_clean($str, $is_image = FALSE) {
    /*
     * Is the string an array?
     *
     */
    if (is_array($str)) {
        while (list($key) = each($str)) {
            $str[$key] = xss_clean($str[$key]);
        }

        return $str;
    }

    /*
     * Remove Invisible Characters
     */
    $str = remove_invisible_characters($str);

    // Validate Entities in URLs
    $str = $this->_validate_entities($str);

    /*
     * URL Decode
     *
     * Just in case stuff like this is submitted:
     *
     * <a href="http://%77%77%77%2E%67%6F%6F%67%6C%65%2E%63%6F%6D">Google</a>
     *
     * Note: Use rawurldecode() so it does not remove plus signs
     *
     */
    $str = rawurldecode($str);

    /*
     * Convert character entities to ASCII
     *
     * This permits our tests below to work reliably.
     * We only convert entities that are within tags since
     * these are the ones that will pose security problems.
     *
     */

    $str = preg_replace_callback("/[a-z]+=([\'\"]).*?\\1/si", array($this, '_convert_attribute'), $str);

    $str = preg_replace_callback("/<\w+.*?(?=>|<|$)/si", array($this, '_decode_entity'), $str);

    /*
     * Remove Invisible Characters Again!
     */
    $str = remove_invisible_characters($str);

    /*
     * Convert all tabs to spaces
     *
     * This prevents strings like this: ja	vascript
     * NOTE: we deal with spaces between characters later.
     * NOTE: preg_replace was found to be amazingly slow here on
     * large blocks of data, so we use str_replace.
     */

    if (strpos($str, "\t") !== FALSE) {
        $str = str_replace("\t", ' ', $str);
    }

    /*
     * Capture converted string for later comparison
     */
    $converted_string = $str;

    // Remove Strings that are never allowed
    $str = $this->_do_never_allowed($str);

    /*
     * Makes PHP tags safe
     *
     * Note: XML tags are inadvertently replaced too:
     *
     * <?xml
     *
     * But it doesn't seem to pose a problem.
     */
    if ($is_image === TRUE) {
        // Images have a tendency to have the PHP short opening and
        // closing tags every so often so we skip those and only
        // do the long opening tags.
        $str = preg_replace('/<\?(php)/i', "&lt;?\\1", $str);
    } else {
        $str = str_replace(array('<?', '?' . '>'), array('&lt;?', '?&gt;'), $str);
    }

    /*
     * Compact any exploded words
     *
     * This corrects words like:  j a v a s c r i p t
     * These words are compacted back to their correct state.
     */
    $words = array(
        'javascript', 'expression', 'vbscript', 'script',
        'applet', 'alert', 'document', 'write', 'cookie', 'window'
    );

    foreach ($words as $word) {
        $temp = '';

        for ($i = 0, $wordlen = strlen($word); $i < $wordlen; $i++) {
            $temp .= substr($word, $i, 1) . "\s*";
        }

        // We only want to do this when it is followed by a non-word character
        // That way valid stuff like "dealer to" does not become "dealerto"
        $str = preg_replace_callback('#(' . substr($temp, 0, -3) . ')(\W)#is', array($this, '_compact_exploded_words'), $str);
    }

    /*
     * Remove disallowed Javascript in links or img tags
     * We used to do some version comparisons and use of stripos for PHP5,
     * but it is dog slow compared to these simplified non-capturing
     * preg_match(), especially if the pattern exists in the string
     */
    do {
        $original = $str;

        if (preg_match("/<a/i", $str)) {
            $str = preg_replace_callback("#<a\s+([^>]*?)(>|$)#si", array($this, '_js_link_removal'), $str);
        }

        if (preg_match("/<img/i", $str)) {
            $str = preg_replace_callback("#<img\s+([^>]*?)(\s?/?>|$)#si", array($this, '_js_img_removal'), $str);
        }

        if (preg_match("/script/i", $str) OR preg_match("/xss/i", $str)) {
            $str = preg_replace("#<(/*)(script|xss)(.*?)\>#si", '[removed]', $str);
        }
    } while ($original != $str);

    unset($original);

    // Remove evil attributes such as style, onclick and xmlns
    $str = $this->_remove_evil_attributes($str, $is_image);

    /*
     * Sanitize naughty HTML elements
     *
     * If a tag containing any of the words in the list
     * below is found, the tag gets converted to entities.
     *
     * So this: <blink>
     * Becomes: &lt;blink&gt;
     */
    $naughty = 'alert|applet|audio|basefont|base|behavior|bgsound|blink|body|embed|expression|form|frameset|frame|head|html|ilayer|iframe|input|isindex|layer|link|meta|object|plaintext|style|script|textarea|title|video|xml|xss';
    $str = preg_replace_callback('#<(/*\s*)(' . $naughty . ')([^><]*)([><]*)#is', array($this, '_sanitize_naughty_html'), $str);

    /*
     * Sanitize naughty scripting elements
     *
     * Similar to above, only instead of looking for
     * tags it looks for PHP and JavaScript commands
     * that are disallowed.  Rather than removing the
     * code, it simply converts the parenthesis to entities
     * rendering the code un-executable.
     *
     * For example:	eval('some code')
     * Becomes:		eval&#40;'some code'&#41;
     */
    $str = preg_replace('#(alert|cmd|passthru|eval|exec|expression|system|fopen|fsockopen|file|file_get_contents|readfile|unlink)(\s*)\((.*?)\)#si', "\\1\\2&#40;\\3&#41;", $str);


    // Final clean up
    // This adds a bit of extra precaution in case
    // something got through the above filters
    $str = $this->_do_never_allowed($str);

    /*
     * Images are Handled in a Special Way
     * - Essentially, we want to know that after all of the character
     * conversion is done whether any unwanted, likely XSS, code was found.
     * If not, we return TRUE, as the image is clean.
     * However, if the string post-conversion does not matched the
     * string post-removal of XSS, then it fails, as there was unwanted XSS
     * code found and removed/changed during processing.
     */

    if ($is_image === TRUE) {
        return ($str == $converted_string) ? TRUE : FALSE;
    }

    log_message('debug', "XSS Filtering completed");
    return $str;
}

function &load_class($class, $directory = 'libraries', $prefix = 'CI_') {
    static $_classes = array();

    // Does the class exist?  If so, we're done...
    if (isset($_classes[$class])) {
        return $_classes[$class];
    }

    $name = FALSE;

    // Look for the class first in the local application/libraries folder
    // then in the native system/libraries folder
    foreach (array(APPPATH, BASEPATH) as $path) {
        if (file_exists($path . $directory . '/' . $class . '.php')) {
            $name = $prefix . $class;

            if (class_exists($name) === FALSE) {
                require($path . $directory . '/' . $class . '.php');
            }

            break;
        }
    }

    // Is the request a class extension?  If so we load it too
    if (file_exists(APPPATH . $directory . '/' . config_item('subclass_prefix') . $class . '.php')) {
        $name = config_item('subclass_prefix') . $class;

        if (class_exists($name) === FALSE) {
            require(APPPATH . $directory . '/' . config_item('subclass_prefix') . $class . '.php');
        }
    }

    // Did we find the class?
    if ($name === FALSE) {
        // Note: We use exit() rather then show_error() in order to avoid a
        // self-referencing loop with the Excptions class
        exit('Unable to locate the specified class: ' . $class . '.php');
    }

    // Keep track of what we just loaded
    is_loaded($class);

    $_classes[$class] = new $name();
    return $_classes[$class];
}

// --------------------------------------------------------------------

/**
 * Keeps track of which libraries have been loaded.  This function is
 * called by the load_class() function above
 *
 * @access	public
 * @return	array
 */
function is_loaded($class = '') {
    static $_is_loaded = array();

    if ($class != '') {
        $_is_loaded[strtolower($class)] = $class;
    }

    return $_is_loaded;
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
    foreach ((array) $xmlObject as $index => $node)
        $out[$index] = ( is_object($node) || is_array($node) ) ? xml2array($node) : $node;

    return $out;
}

function localize($file) {
    $languageFileName = AppRoot . AppLocalizationURL . $file . '.lang';
    if (is_readable($languageFileName)) {
//        return (array)json_decode(file_get_contents ($languageFileName));
        include_once $languageFileName;
        print_r($__localization);
    }
}

function createLinkUrl($params) {
    $url = "index.php?";
    foreach ($params as $key => $value) {
        $url.=$key . "=" . base64_encode($value) . "&";
    }
    $url = rtrim($url, "&");
    return $url;
}

?>
