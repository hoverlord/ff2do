<div class="todo_detail">
<p id="name_<?php echo $template->todo->todo_id; ?>"><?php echo utf8_decode($template->todo->todo_name); ?></p>
<div class="clear"></div>
<div  id="text">
<p id="text_<?php echo $template->todo->todo_id; ?>"><?php echo utf8_decode($template->todo->todo_text); ?></p>
</div>
<div class="clear"></div>
<div id="user">Knut</div>
<p>
  <input type="checkbox" id="archive_item_<?php echo $template->todo->todo_id; ?>" onChange="archiveItem(this.id, <?php echo $template->todo->project_id; ?>)"<?php if ($template->todo->todo_archived == 1) {echo ' checked';}?>> erledigt
  <input type="button" value="l&ouml;schen" class="delete_button" id="delete_item_<?php echo $template->todo->todo_id; ?>" onclick="delete_item(this.id, <?php echo $template->todo->project_id; ?>)" />
</p>
<script type="text/javascript">
    new Ajax.InPlaceEditor(
        'name_<?php echo $template->todo->todo_id; ?>', 
        'ajax_srv.php?action=set_item&id=<?php echo $template->todo->todo_id; ?>&project_id=<?php echo $template->todo->project_id; ?>', {
            submitOnBlur: false,
            okControl: "link",
            okText: "✓",
            cancelControl: "link",
            cancelText: "✗",
            onComplete: function(){
			    loadList(<?php echo $template->todo->project_id; ?>);
      			new Effect.Highlight('listContainer',{})
		    }
        }
    );
    new Ajax.InPlaceEditor(
        'text_<?php echo $template->todo->todo_id; ?>', 
        'ajax_srv.php?action=set_item_text&id=<?php echo $template->todo->todo_id; ?>&project_id=<?php echo $template->todo->project_id; ?>', {
            submitOnBlur: false,
            okControl: "link",
            okText: "✓",
            cancelControl: "link",
            cancelText: "✗",
            onComplete: function(){
      		    new Effect.Highlight('listContainer',{})
		    }
        }
    );
    new Ajax.InPlaceCollectionEditor(
        'user',
        'ajax_srv.php?action=set_item_user&id=<?php echo $template->todo->todo_id; ?>&project_id=<?php echo $template->todo->project_id; ?>', {
            okText: "✓",
            cancelText: "✗",
		    collection: ['hans','werner','knut','knilch','heinz']
        }
    );
    make_selected($('item_<?php echo $template->todo->todo_id; ?>'));
</script>
</div>