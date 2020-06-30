<?php 
include_once('main.class.php');
if(isset($_POST['memRegisId']))
{
	$object->deltCulubMember($_POST['memRegisId']);
	
}

if(isset($_POST['gymMemRegisId']))
{
	$object->deltGYMMember($_POST['gymMemRegisId']);
	
}

?>