<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Admin</h3>
						<section>

							<?php 

								while ($row = $results->fetch_assoc()) {
									echo $row['post'] . " " . $row['dateSubmitted'] . '<br/>';
								}

							?>

						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>