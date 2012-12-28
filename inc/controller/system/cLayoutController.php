<?php

/**
 * Description of cLayoutController
 *
 * @author mgovindan
 */
include_once AppRoot . AppModel . 'cLayoutModel.php';

class cLayoutController extends cLayoutModel {

    function __construct() {
        parent::__construct();
    }

    function getMenuDetails($iMenuId="", $vMenuType='user') {
        if ($iMenuId != '') {
            return $this->getChildMenuDetails($iMenuId);
        } else {

            $userMenu = $this->getParentMenuDetails();
            $systemMenu = $this->getSystemMenuDetails();
            if (is_array($userMenu) && is_array($systemMenu)) {
                $result = array_merge($userMenu, $systemMenu);
            } elseif (is_array($userMenu)) {
                $result = $userMenu;
            } elseif (is_array($systemMenu)) {
                $result = $systemMenu;
            }

            return $result;
        }
    }

}

?>
