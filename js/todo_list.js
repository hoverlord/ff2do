Event.observe(window, 'load', init, false);

function init() {
	loadList();
	loadProjects();
}

loadList = function(project_id) {
	var url = 'ajax_todo_srv.php?action=get_list&project_id='+project_id;
	var ajax = new Ajax.Updater(
		'listContainer',
		url, {
			method: 'get',
			evalScripts: true,
			onComplete: function() {
				Sortable.create(
					'listContainer', {
						tag: 'div',
						onUpdate: updateList
					}
				);
			}
		}
	)
}

function updateList(container) {
	var url = 'ajax_todo_srv.php?action=update_list';
	var params = Sortable.serialize(container.id);
	var ajax = new Ajax.Request(
		url, {
			method: 'post',
			evalScripts: true,
			parameters: params,
			onComplete: function(){
				new Effect.Highlight('listContainer',{})
			}
		}
	);
}

getItem = function(id) {
    new Effect.Fade(
        'todo_viewer',{
            duration: 0.2,
            afterFinish: function() {
				var params = 'id='+id;
				var ajax = new Ajax.Updater(
					'todo_viewer',
					'ajax_todo_srv.php?action=get_item', {
						method: 'get',
						evalScripts: true,
						parameters: params,
						onComplete: function() {
							new Effect.Appear(
							    'todo_viewer', {
							        duration: 0.2
							    }
							);
						}
					}
				);
            }
        }
    );
}

delete_item = function(id, project_id) {
    var params = 'id='+id;
    var url = 'ajax_todo_srv.php?action=delete_item';
    var ajax = new Ajax.Request(
        url, {
            method: 'post',
			parameters: params,
			onComplete: function(){
				loadList(project_id);
				new Effect.Fade(
				    'todo_viewer', {
				        duration: 0.2
				    }
				);
			}
        }
    );
}

archiveItem = function(id, project_id) {
    var params = 'id='+id;
    var url = 'ajax_todo_srv.php?action=archive_item';
    var ajax = new Ajax.Request(
        url, {
            method: 'post',
			parameters: params,
			onComplete: function(){
				loadList(project_id);
				new Effect.Fade(
				    'todo_viewer', {
				        duration: 0.2
				    }
				);
			}
        }
    );
}

toggleCompletedTodos = function() {
    var url = 'ajax_todo_srv.php?action=toggle_completed_todos';
    var ajax = new Ajax.Request(
        url, {
            method: 'post',
			onComplete: function(){
				loadList();
				new Effect.Fade(
				    'todo_viewer', {
				        duration: 0.2
				    }
				);
			}
        }
    );
}

loadProjects = function() {
	var url = 'ajax_project_srv.php?action=get_project_list';
	var ajax = new Ajax.Updater(
		'projectContainer',
		url, {
			method: 'get',
			evalScripts: true,
			onComplete: function() {
				Sortable.create(
					'projectContainer', {
						tag: 'div',
						onUpdate: updateProjects
					}
				);
			}
		}
	)
}

function updateProjects(container) {
	var url = 'ajax_project_srv.php?action=update_project_list';
	var params = Sortable.serialize(container.id);
	var ajax = new Ajax.Request(
		url, {
			method: 'post',
			evalScripts: true,
			parameters: params,
			onComplete: function(){
				new Effect.Highlight('projectContainer',{})
			}
		}
	);
}

getProject = function(id) {
    new Effect.Fade(
        'todo_viewer',{
            duration: 0.2,
            afterFinish: function() {
				var params = 'id='+id;
				var ajax = new Ajax.Updater(
					'todo_viewer',
					'ajax_project_srv.php?action=get_project', {
						method: 'get',
						evalScripts: true,
						parameters: params,
						onComplete: function() {
							new Effect.Appear(
							    'todo_viewer', {
							        duration: 0.2
							    }
							);
						}
					}
				);
            }
        }
    );
}

delete_project = function(project_id) {
    var params = 'id='+project_id;
    var url = 'ajax_project_srv.php?action=delete_project';
    var ajax = new Ajax.Request(
        url, {
            method: 'post',
			parameters: params,
			onComplete: function(){
				loadProjects();
				loadList();
				new Effect.Fade(
				    'todo_viewer', {
				        duration: 0.2
				    }
				);
			}
        }
    );
}