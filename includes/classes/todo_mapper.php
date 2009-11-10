<?php

require_once('includes/classes/database.php');

class TodoMapper {

    public function getTodoList($project_id = false) {
        $db_link = new Database();
        if ($project_id) {
            $sql = 'SELECT todo_name, todo_id, project_id FROM todos WHERE project_id = "' . $project_id . '" ORDER BY todo_sort_order';
        } else {
            $sql = 'SELECT t.todo_name, t.todo_id, t.project_id FROM todos t, projects p WHERE project_sort_order = "1" AND t.project_id = p.project_id ORDER BY todo_sort_order';
        }
        $list = $db_link->query($sql)->fetchAll();
        return $list;
    }

    public function updateTodoList($orderArray) {
        $db_link = new Database();
        $orderid = 1;
        foreach($orderArray as $id) {
            $sql = 'UPDATE todos SET todo_sort_order = "' . $orderid . '" WHERE todo_id = "' . (int)$id . '"';
            $db_link->exec($sql);
            $orderid++;
        }
    }

    public function getTodo($item_id) {
        $db_link = new Database();
        $sql = 'SELECT todo_id, todo_name, todo_text, project_id, todo_sort_order FROM todos WHERE todo_id = "' . $item_id . '"';
        $item = $db_link->query($sql)->fetch();
        return $item;
    }

    public function setTodo($item_value, $project_id, $item_id = false) {
        $db_link = new Database();
        $insert_value = addslashes($item_value);
        if ($item_id) {
            $sql = 'UPDATE 
                        todos 
                    SET 
                        todo_name = "' . $insert_value . '" 
                    WHERE 
                        todo_id = "' . (int)$item_id . '"
                    AND
                        project_id = "' . $project_id . '"';
            $db_link->exec($sql);
            return $insert_value;
        } else {
            $sql = 'INSERT INTO todos SET todo_name = "' . $insert_value . '", project_id = "' . $project_id . '"';
            $db_link->exec($sql);
        }
    }
    
    public function setTodoText($item_value, $project_id, $item_id = false) {
        $db_link = new Database();
        $insert_value = addslashes($item_value);
        $sql = 'UPDATE 
                    todos 
                SET 
                    todo_text = "' . $insert_value . '" 
                WHERE 
                    todo_id = "' . (int)$item_id . '"
                AND
                    project_id = "' . $project_id . '"';
            $db_link->exec($sql);
            return $insert_value;
    }

    public function deleteTodo($item_id) {
        $db_link = new Database();
        $sql = 'DELETE FROM todos WHERE todo_id = "' . (int)$item_id . '"';
        $db_link->exec($sql);
    }
}
?>