<?php

include('template/header.php');

?>

<section>
	<form action="" method="post">
		<p>
			<label for="projectName">Project Name</label><br>
			<input type="text" name="projectName">
		</p>
		<p>
			<label for="">limite date(AAAA/MM/JJ)</label><br>
			<input type="date">
		</p>
		<label for="types">Project type</label>
		<select name="types" id="">
			<?php 
			$type_name = getNameOfType();
			foreach ($type_name as $key => $value)
			{
				echo '<option value="'.$type_name[$key]['id'].'">'.$type_name[$key]['name'].'</option>';
			}
			?>
		</select>
		<input type="submit" name="addNewProject">
		<?php
				// if(isset($_POST['addNewProject']))
				// {
				?>
				<!-- <form action="" method="post" class="align-self-center">
					<input type="text" name="newProjectName" placeholder="New Project Name">
					<input type="submit" name="validNewProject">
				</form> -->
				<?php
				// }
				// else
				// {
				?>
				<!-- <form action="" method="post" class="align-self-center">
					<input type="submit" name="addNewProject" value="ADD NEW PROJECT" class="p-3">
				</form> -->
				<?php
				// }
				?>
	</form>	
</section>
