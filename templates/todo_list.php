<div class="add_button">
<div id="insert_item">Neuer Eintrag</div>
</div>
<?php
foreach($template->todo_list as $todo) {
    $project_id = $todo->project_id;
?>
<div id="item_<?php echo $todo->todo_id; ?>" class="todo_item" onclick="getItem(this.id)">
<?php
if ($todo->todo_archived == 1) {
    echo '<s>';
}
echo utf8_decode($todo->todo_name);
if ($todo->todo_archived == 1) {
    echo '</s>';
}
?>
</div>
<?php
}
?>
<script type="text/javascript">
    new Ajax.InPlaceEditor(
        'insert_item', 
        'ajax_todo_srv.php?action=insert_item&project_id=<?php echo $template->project_id; ?>', {
            submitOnBlur: false,
            okControl: "link",
            okText: "✓",
            cancelControl: "link",
            cancelText: "✗",
            onComplete: function(){
                loadList(<?php echo $template->project_id; ?>);
                new Effect.Highlight('listContainer',{})
            }
        }
    );
    make_selected($('project_<?php echo $template->project_id; ?>'));
</script>