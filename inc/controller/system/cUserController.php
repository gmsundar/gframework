<?php

/**
 * Description of cLayoutController
 *
 * @author mgovindan
 */
include_once AppRoot . AppModel . 'cUserModel.php';

class cUserController extends cUserModel {

    public $UserModel;
    public $userId;
    public $loginId;

    function __construct() {

        $this->UserModel = new cUserModel();
    }

    function validateCredencials($username, $password) {
        $userDetailsArray = $this->UserModel->validateLogin($username, $password);
        $this->userId = $userDetailsArray[0]['user_id'];
        $this->loginId = $userDetailsArray[0]['id'];

        $this->setSessionUserDetails();

        return $this->loginId;
    }

    function setSessionUserDetails() {
        include_once AppRoot . AppController . 'cSessionController.php';
        $session = new cSessionController();
        if ($this->userId != '') {
            $userDetails = $this->UserModel->getUserDetails($this->userId);
            $session->SessionValue('first_name', $userDetails[0]['first_name']);
            $session->SessionValue('last_name', $userDetails[0]['last_name']);
            $session->SessionValue('middle_name', $userDetails[0]['middle_name']);
            $session->SessionValue('email', $userDetails[0]['email']);
            $session->SessionValue('mobile', $userDetails[0]['mobile']);
            $session->SessionValue('photo', $userDetails[0]['photo']);
            $session->SessionValue('sex', $userDetails[0]['sex']);
            $session->SessionValue('user_type', $userDetails[0]['user_type']); 
            $session->SessionValue('branch_id', $userDetails[0]['branch_id']);
            $session->SessionValue('user_restrictions', $userDetails[0]['user_restrictions']);
            $session->SessionValue('user_id', $this->userId);
            $session->SessionValue('PMA_single_signon_user', DataBaseUser);
            $session->SessionValue('PMA_single_signon_password', DataBasePass);
            $session->SessionValue('PMA_single_signon_host', DataBaseHost);
            $session->SessionValue('PMA_single_signon_port', DataBasePort);

        }else{
//            $session->SessionValue('pageerror', 'Login failed!!!');
        }
    }

}

?>
