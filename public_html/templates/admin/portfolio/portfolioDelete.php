<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="portfolio">
						<h3>Portfolio</h3>
						<section>
							<form action="/portfolioDelete" method="post">
								<input type="submit" value="Confirm Delete" />
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="hidden" name="image" value="<?=$image?>">
								<span>of <?=$title?></span>
							</form>
							<button title="Cancel" type="button" onclick="location.href='/#portfolio/<?php echo $url ?>'">
                <span>
                  Cancel
                </span>
			        </button>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
