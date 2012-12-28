<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cSessionController
 *
 * @author gt
 */
class cSessionController {

    function createSession() {
        session_set_cookie_params(0, '/', '', 0);
        session_name('GFrameworkSession');
        session_start();
        $this->SessionValue('session_started', time());
    }

    function SessionValue($key, $value=NULL, $unset=FALSE) {
        if ($value === NULL) {
            return $_SESSION[$key];
        } elseif ($unset == true) {
            return session_unset($key);
        } else {
            $_SESSION[$key] = $value;
        }
    }

    function removeSession() {
        session_destroy();
    }

}

?>
