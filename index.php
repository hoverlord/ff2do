<?php

require_once('includes/config.php');
require_once('includes/classes/template_service.php');

$tpl = new TemplateService;
$tpl->display('index.php');

?>