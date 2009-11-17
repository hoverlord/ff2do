<div class="add_button"><div id="insert_project">Neues Projekt</div></div>
<script type="text/javascript">
    new Ajax.InPlaceEditor(
        'insert_project', 
        'ajax_project_srv.php?action=insert_project', {
            submitOnBlur: false,
            okControl: "button",
            cancelControl: false,
            onComplete: function(){
                loadProjects();
                    new Effect.Highlight('projectContainer',{})
            }
        }
    );
</script>
<?php
foreach($template->project_list as $project) {
?>
<div id="project_<?php echo $project->project_id; ?>" class="todo_item" onclick="loadList(this.id);getProject(<?php echo $project->project_id; ?>)">
<?php echo utf8_decode($project->project_name); ?>
</div>
<?php
}
?>