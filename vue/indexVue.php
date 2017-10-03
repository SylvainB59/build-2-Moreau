<?php

include('template/aside.php');

?>

<section class="container">
	<article class="row">
		<!-- select by TYPE -->
		<form action="" method="post" class="col-3 mx-auto choix">
			<p class="">Show by type</p>
			<select name="types" id="" class="col-12">
				<option value="all" selected>all</option>
				<?php 
				$type_name = getNameOf('types');
				foreach ($type_name as $key => $value)
				{
					echo '<option value="'.$value['name'].'">'.$type_name[$key]['name'].'</option>';
				}
				?>
			</select>
			<input type="submit">
		</form>

		<!-- select by NAME -->
		<form action="" method="post" class="col-3 mx-auto choix">
			<p>Show by member</p>
			<select name="members" id="" class="col-12">
				<option value="all" selected>all</option>
				<?php 
				$member_name = getNameOf('members');
				foreach ($member_name as $key => $value)
				{
					echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
				}
				?>
			</select>
			<input type="submit">
		</form>
	</article>

	<article class="row justify-content-between">
	<!-- preview of project in main index -->
		<?php
		// var_dump($_POST['types']);
		// var_dump($_POST['members']);
		$project = getAllProjectsPreview();
		foreach ($project as $key => $value)
		{
		?>
			<div class="projectPreview border col-3 row text-center justify-content-center">
				<a href="project.php?idProject=<?php echo $project[$key]['id']; ?>" class="col-12"><h3><?php echo $project[$key]['projectName']; ?></h3></a>
				<div class="col-12 row">
					<p class="col-6">By <?php echo $project[$key]['projectMember']; ?></p>
					<p class="col-6">Type : <?php echo $project[$key]['projectType']; ?></p>
				</div>
				<p class="col-12">Limit : <?php echo$project[$key]['limitDate']; ?></p>
			</div>
		<?php			
		}
		?>

		
	</article>
</section>
