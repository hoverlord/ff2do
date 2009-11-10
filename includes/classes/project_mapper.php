<?php

require_once('includes/classes/database.php');

class ProjectMapper {
    
    public function getProjectList() {
        $db_link = new Database();
        $sql = 'SELECT project_id, project_name FROM projects ORDER BY project_sort_order';
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

}
?>