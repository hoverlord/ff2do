<?php

require_once('includes/config.php');
require_once('includes/classes/project_mapper.php');
require_once('includes/classes/template_service.php');

switch ($_GET['action']) {
    
    case 'update_project_list':
        ProjectMapper::updateProjectList($_POST['projectContainer']);
        break;
    
    case 'get_project_list':
        $tpl = new TemplateService;
        $tpl->project_list = ProjectMapper::getProjectList();
        echo $tpl->display('project_list.php');
        break;
    
    case 'get_project':
        $project_id = (int) str_replace('item_', '', $_GET['id']);
        $tpl = new TemplateService;
        $tpl->project = ProjectMapper::getProject($project_id);
        echo $tpl->display('project.php');
        break;

    case 'insert_project':
        ProjectMapper::setProject($_POST['value']);
        echo 'Neues Projekt';
        break;

    case 'set_project_name':
        $output = ProjectMapper::setProject($_POST['value'], $_GET['id']);
        echo utf8_decode($output);
        break;
            
    case 'delete_project':
        ProjectMapper::deleteProject((int)$_POST['id']);
        break;
    
}
?>