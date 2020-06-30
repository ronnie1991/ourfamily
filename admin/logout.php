<?php
session_start();
require_once('main.class.php');
$object->logout($_SESSION['user_id']);
echo "
            <script type=\"text/javascript\">           
		   window.location='index';
            </script>
        "; 

?>