<div class="todo_detail">
<p id="name_<?php echo $template->todo->todo_id; ?>">
<?php echo utf8_decode($template->todo->todo_name); ?>
</p>
<p id="text_<?php echo $template->todo->todo_id; ?>">
<?php
if ($template->todo->todo_text != '') { 
    echo utf8_decode($template->todo->todo_text); 
} else { 
    echo 'Text: '; 
}
?>
</p>
<p>
  <input type="checkbox" id="archive_item_<?php echo $template->todo->todo_id; ?>" onChange="archiveItem(this.id, <?php echo $template->todo->project_id; ?>)"<?php if ($template->todo->todo_archived == 1) {echo ' checked';}?>> erledigt
  <input type="button" value="l&ouml;schen" class="delete_button" id="delete_item_<?php echo $template->todo->todo_id; ?>" onclick="delete_item(this.id, <?php echo $template->todo->project_id; ?>)" />
</p>
<script type="text/javascript">
    new Ajax.InPlaceEditor(
        'name_<?php echo $template->todo->todo_id; ?>', 
        'ajax_todo_srv.php?action=set_item&id=<?php echo $template->todo->todo_id; ?>&project_id=<?php echo $template->todo->project_id; ?>', {
            submitOnBlur: true,
            onComplete: function(){
			    loadList(<?php echo $template->todo->project_id; ?>);
      			new Effect.Highlight('listContainer',{})
		    }
        }
    );
    new Ajax.InPlaceEditor(
        'text_<?php echo $template->todo->todo_id; ?>', 
        'ajax_todo_srv.php?action=set_item_text&id=<?php echo $template->todo->todo_id; ?>&project_id=<?php echo $template->todo->project_id; ?>', {
            rows: 7,
            cols: 27,
            submitOnBlur: true,
            onComplete: function(){
      		    new Effect.Highlight('listContainer',{})
		    }
        }
    );
</script>
</div>