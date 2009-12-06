<?php

require_once('includes/config.php');
require_once('includes/classes/template_service.php');

session_start();
$tpl = new TemplateService;
$tpl->display('index.php');

?>