<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Blog</h3>
						<section>
							<form action="/blogDelete" method="post">
								<input type="submit" value="Confirm Delete" />
								<input type="hidden" name="id" value="<?=$id?>">
								<span>of <?=$title?></span>
							</form>
							<button title="Cancel" type="button" onclick="location.href='/blog/<?php echo $url ?>'">
                <span>
                  Cancel
                </span>
			        </button>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
