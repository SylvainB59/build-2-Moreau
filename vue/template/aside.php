<?php

include('header.php');

?>

		<aside class="asideCo container-fluid text-center">
			<div class="row">
				<div class="col-6 mx-auto border">
					<p class="col-12">CONNECT</p>

					<!-- formulaire de connexion -->

					<form class="col-12" action="" method="post">
						<div class="row">
							<p class="col-6">
								<label class="col-12" for="pseudo">PSEUDO</label>
								<input class="col-12" type="text" name="pseudo" id="pseudo" autofocus required>
							</p>
							<p class="col-6">
								<label class="col-12" for="password">PASSWORD</label>
								<input class="col-12" type="password" name="password" id="password" required>
							</p>
						</div>
						<input type="submit" value="OK" class="col-3 mx-auto">
					</form>

					<p class="col-12">Or <a href="signin.php">Sign in !</a></p>
				</div>
			</div>
		</aside>
