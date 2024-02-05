<?php

require_once "AppController.php";

class ProfileController extends AppController {

    public function myProfile() {
        $this->render('myprofile');
    }

}
?>