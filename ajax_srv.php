<?php

require_once('includes/config.php');
require_once('includes/classes/todo_mapper.php');
require_once('includes/classes/project_mapper.php');
require_once('includes/classes/template_service.php');

session_start();

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
    
    case 'archive_project':
        ProjectMapper::archiveProject(str_replace('archive_project_', '', $_POST['id']));
        break;
        
    case 'delete_project':
        ProjectMapper::deleteProject((int)$_POST['id']);
        break;
    
    case 'get_list':
        if (isset($_GET['project_id']) and ($_GET['project_id'] != 'undefined')) {
            $project_id = (int)str_replace('project_', '', $_GET['project_id']);
        } else {
            $project = new ProjectMapper;
            $project_id = $project->getFirstProjectId();
        }
        $tpl = new TemplateService;
        $tpl->todo_list = TodoMapper::getTodoList($project_id);
        $tpl->project_id = $project_id;
        echo $tpl->display('todo_list.php');
        break;

    case 'update_list':
        $list = $_POST['listContainer'];
        TodoMapper::updateTodoList($list);
        break;
        
    case 'get_item':
        $item_id = str_replace('item_', '', $_GET['id']);
        $tpl = new TemplateService;
        $tpl->todo = TodoMapper::getTodo($item_id);
        echo $tpl->display('todo.php');
        break;

    case 'set_item':
        $output = TodoMapper::setTodo($_POST['value'], $_GET['project_id'], $_GET['id']);
        echo utf8_decode($output);
        break;
    
    case 'set_item_text':
        $value = $_POST['value'];
        $project_id = $_GET['project_id'];
        $id = $_GET['id'];
        $output = TodoMapper::setTodoText($value, $project_id, $id);
        echo utf8_decode($output);
        break;

    case 'insert_item':
        if ($_POST['value'] != '' AND $_POST['value'] != 'Neuer Eintrag') {
            TodoMapper::setTodo($_POST['value'], $_GET['project_id']);
        }
        echo 'Neuer Eintrag';
        break;

    case 'delete_item':
        TodoMapper::deleteTodo(str_replace('delete_item_', '', $_POST['id']));
        break;
    
    case 'archive_item':
        TodoMapper::archiveTodo(str_replace('archive_item_', '', $_POST['id']));
        break;
    
    case 'toggle_completed_todos':
        $_SESSION['displayCompletedTodos'] = true;
        if ($_POST['hide'] == 'true') {
            $_SESSION['displayCompletedTodos'] = false;
        }
        break;
        
    case 'toggle_completed_projects':
        $_SESSION['displayCompletedProjects'] = true;
        if ($_POST['hide'] == 'true') {
            $_SESSION['displayCompletedProjects'] = false;
        }
        break;
}
?>