<!DOCTYPE html>
<html>	
<head>
		<title> Simple To-Do List </title>
		<link rel="stylesheet" type="text/css" href="css/main.css">	
	


</head>	
<body>

		<div class="wrap">
		<div class="header"> TO-DO LIST:</div>
			<div class="task-list">
			 		<ul>
			 			<?php require("includes/connect.php");
			 			// <!-- call this file -->
			 			$mysqli = new mysqli('localhost', 'root' , 'root', 'todo');
			 			$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
			 			if ($result = $mysqli->query($query)) {//if result equals 
			 				//the information from result to go to num_rows
			 				$numrows = $result->num_rows;
			 				if ($numrows>0) {//if num rows is greater then 0 it does the if statement
			 					while($row = $result->fetch_assoc()){
			 						$task_id = $row['id'];
			 						$task_name = $row['task'];

			 						//need single qoutes becuz we are using double inside
			 					 echo '<li>
			 					 <span>'.$task_name. '</span>
			 					 <img id="'.$task_id.'" class="delete-button lengthbutton" width="10px" src="images/close.svg"/>
								 </li>';
			 					}
			 				}
			 			}
			 			?> 
			 		</ul>
			</div>
		<form class="add-new-task" autocomplete="off">
			<input class="tasklength" type="text" name="new-task" placeholder="Add new item..."/>
		</form>
		</div>
</body>
	<script scr="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	
	<script>
			add_task();  
// calling the add task function 
//telling it to get the forum thru $post and send it to add task and it will give comfermation 
		function add_task(){
			$('.add-new-task').submit(function() {
				var new_task = $('.add-new-task input[name=new-task]').val();

				if (new_task != ''){
					$.post('includes/add-task.php', {task: new_task}, function(data) {
						$('add-new-task input[name=new-task]').val();
							$(data).appendTo('.task-list ul').hide().fadein();
					});
				}
				return false;
			});
		}
		//calling class delete-button and when its click it goes to a certain function
		//current_element will fade out
		$('.delete-button').click(function(){
			var current_element = $(this);
			var task_id = $(this).attr('id');

			$.post('includes/delete-task.php', {id: task_id}, function(){
				current_element.parent().fadeOut("fast" , function(){
				$(this).remove();
				});
			});
		});

	</script>

</html>