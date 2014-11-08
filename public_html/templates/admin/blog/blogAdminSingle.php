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
									<a href="/blogEdit/<?php echo $row['url']?>">Edit<a/>
									<a href="/blogDelete<?php echo $row['id']?>">Delete<a/>
									<div>
										<?php echo $row['post']?>
									<div>
									<div>
										<span><?php echo date("l, F jS, Y @ H:ia",strtotime($row['dateSubmitted']));?></span>
										<span>By: <?php echo $row['displayName']?></span>
									</div>
										<?php
								}
							?>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
