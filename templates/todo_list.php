<div class="add_button">
<div id="insert_item">Neuer Eintrag</div>
</div>
<?php
foreach($template->todo_list as $todo) {
    $project_id = $todo->project_id;
?>
<div id="item_<?php echo $todo->todo_id; ?>" class="todo_item" onclick="getItem(this.id)">
<?php echo utf8_decode($todo->todo_name); ?>
</div>
<?php
}
?>
<script type="text/javascript">
    new Ajax.InPlaceEditor(
        'insert_item', 
        'ajax_todo_srv.php?action=insert_item&project_id=<?php echo $template->project_id; ?>', {
            submitOnBlur: true,
            onComplete: function(){
                loadList(<?php echo $template->project_id; ?>);
                new Effect.Highlight('listContainer',{})
            }
        }
    );
</script>