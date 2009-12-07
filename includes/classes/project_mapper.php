<?php

require_once('includes/classes/database.php');

class ProjectMapper {
    
    public function getProjectList() {
        $where = '';
        if (isset($_SESSION['displayCompletedProjects']) AND $_SESSION['displayCompletedProjects'] === false) {
            $where .= ' WHERE project_archived = "0"';
        }
        $db_link = new Database();
        $sql = 'SELECT project_id, project_name, project_archived FROM projects' . $where . ' ORDER BY project_sort_order';
        $projects = $db_link->query($sql)->fetchAll();
        return $projects;
    }
    
    public function updateProjectList($orderArray) {
        $db_link = new Database();
        $orderid = 1;
        foreach($orderArray as $id) {
            $sql = 'UPDATE projects SET project_sort_order = "' . $orderid . '" WHERE project_id = "' . (int)$id . '"';
            $db_link->exec($sql);
            $orderid++;
        }
    }
    
    public function getProject($project_id) {
        $db_link = new Database();
        $sql = 'SELECT * FROM projects WHERE project_id = "' . $project_id . '"';
        $project = $db_link->query($sql)->fetch();
        return $project;
    }
    
    public function setProject($project_name, $project_id = false) {
        $db_link = new Database();
        $insert_value = addslashes($project_name);
        if ($project_id) {
            $sql = 'UPDATE projects SET project_name = "' . $insert_value . '" WHERE project_id = "' . (int)$project_id . '"';
            $db_link->exec($sql);
            return $insert_value;
        } else {
            $sql = 'INSERT INTO projects SET project_name = "' . $insert_value . '", project_sort_order = "100"';
            $db_link->exec($sql);
        }
    }
    
    public function deleteProject($project_id) {
        $db_link = new Database();
        $sql = 'DELETE FROM projects WHERE project_id = "' . (int)$project_id . '"';
        $db_link->exec($sql);
        $sql = 'DELETE FROM todos WHERE project_id = "' . (int)$project_id . '"';
        $db_link->exec($sql);
    }
    
    public function getFirstProjectId() {
        $db_link = new Database();
        $sql = 'SELECT project_id FROM projects ORDER BY project_sort_order ASC LIMIT 0,1';
        $project_id = $db_link->query($sql)->fetch()->project_id;
        return $project_id;
    }
    
    public function archiveProject($id) {
        $db_link = new Database();
        $sql = 'SELECT project_archived FROM projects WHERE project_id = "' . (int)$id . '"';
        $toggle = 1;
        if ($db_link->query($sql)->fetch()->project_archived == 1) {
            $toggle = 0;
        }
        $sql = 'UPDATE projects SET project_archived = ' . $toggle . ' WHERE project_id = "' . (int)$id . '"';
        $db_link->exec($sql);
    }
}
?>