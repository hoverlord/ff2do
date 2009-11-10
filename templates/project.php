<div class="todo_detail">
<p id="name_<?php echo $template->project->project_id; ?>"><?php echo utf8_decode($template->project->project_name); ?></p>
<p>Sortierung: <?php echo $template->project->project_sort_order; ?></p>
<input type="button" value="l&ouml;schen" name="delete_button"
	class="delete_button"
	onclick="delete_project(<?php echo $template->project->project_id; ?>)" />
<script type="text/javascript">
    new Ajax.InPlaceEditor(
        'name_<?php echo $template->project->project_id; ?>', 
        'ajax_project_srv.php?action=set_project_name&id=<?php echo $template->project->project_id; ?>', {
            submitOnBlur: true,
            onComplete: function(){
			    loadProjects();
      			new Effect.Highlight('projectContainer',{})
		    }
        }
    );
</script>
</div>
