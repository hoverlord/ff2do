<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/prototype.js"></script>
<script src="js/scriptaculous.js"></script>
<script src="js/todo_list.js"></script>
</head>
<body>
<div id="page_wrapper">
    <ul id="nav">
    	<li>
    	    <a href="#">Optionen</a>
    		<ul>
    			<li><input type="checkbox" onChange="toggleCompletedProjects()" <?php if (isset($_SESSION['displayCompletedProjects']) AND $_SESSION['displayCompletedProjects'] == 1) {echo ' checked';}?>>&nbsp;erledigte Projekte verbergen</li>
    			<li><input type="checkbox" onChange="toggleCompletedTodos()" <?php if (isset($_SESSION['displayCompletedTodos']) AND $_SESSION['displayCompletedTodos'] == 1) {echo ' checked';}?>>&nbsp;erledigte Aufgaben verbergen</li>
    		</ul>
    	</li>
    </ul>
    <div style="clear: left;"></div>
    <div id="projectContainer">
    </div>
    <div id="listContainer"></div>
    <div id="viewer_container">
    <div id="todo_viewer"></div>
    </div>
    <div style="clear: left;"></div>
</div>
</body>
</html>