<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Edit</h3>
						<section>
							<?if(!empty($status)):?>
							<p class="status"><?=$status?></p>
							<?endif;?>
							<button title="Delete" type="button" onclick="location.href='/blogDelete/<?php echo $url ?>'">
                <span>
                  Delete
                </span>
			        </button>
							<form action="/blogEdit" method="post">
								<input id="title" type="text" name="title" value="<?=$title?>">
								<input id="url" type="text" onKeyUp="urlStop()" name="url" value="<?=$url?>">
								<textarea name="post" class="advancedEdit" style="width:300px !important"><?php echo $post?></textarea>
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>
					
				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
				<script src="/js/admin.js"></script>


		