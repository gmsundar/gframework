<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cMenuController *
 * @author gt
 */
include_once AppRoot . AppModel . 'cMenuModal.php';
include_once AppRoot . AppLocalizationURL . "system/common.lang";

class cMenuController extends cMenuModal {

    public $user_id;
    public $user_menu;

    public function __construct($user_id) {
        $this->user_id = $user_id;
        parent::__construct();
        $this->getMenuDetails();
    }

    public function getMenuDetails() {
        $this->user_menu = $this->formatMenuDetails($this->getUserMenuDetails($this->user_id));

        $this->getChildMenuDetails();
    }

    public function getChildMenuDetails() {

        if (is_array($this->user_menu)) {

            foreach ($this->user_menu as $parent_id => $value) {

                $this->user_menu[$parent_id]['sub'] = $this->formatMenuDetails($this->getUserMenuDetails($this->user_id, $parent_id));

                if (is_array($this->user_menu[$parent_id]['sub'])) {
                    foreach ($this->user_menu[$parent_id]['sub'] as $key1 => $value1) {

                        $this->user_menu[$parent_id]['sub'][$key1]['sub'] = $this->formatMenuDetails($this->getUserMenuDetails($this->user_id, $key1));
                    }
                }
            }
        } else {
            return false;
        }
    }

    function formatMenuDetails($dataArray) {
        if (is_array($dataArray[0])) {
            foreach ($dataArray as $key => $value) {
                $__localization['__menu'][$value['id']] = $__localization['__menu'][$value['id']] ? $__localization['__menu'][$value['id']] : $value['menu_name'];
                $menu[$value['id']] = array($value['id'], $__localization['__menu'][$value['id']], $value['url'], $value['display_icon']);
            }
            return $menu;
        } else {
            return FALSE;
        }
    }

}

?>
