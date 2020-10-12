<?php
    namespace Controllers;

    class HomeAdminController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home-admin.php");
        }        
    }
?>