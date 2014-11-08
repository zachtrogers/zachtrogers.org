<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Blog</h3>
						<section>
						    <?php 
								while ($row = $results->fetch_assoc()) {
									?>
									<h2><?php echo $row['title']?></h2>
									<div>
										<?php echo $row['post']?>
									<div>
									<div>
										<span><?php echo $row['dateSubmitted']?></span>
										<span><?php echo $row['submitter']?></span>
										<?php echo $row['id']?>
									</div>
										<?php
								}
							?>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
