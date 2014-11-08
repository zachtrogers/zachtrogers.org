<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Edit</h3>
						<section>
							<?if(!empty($status)):?>
							<p class="status"><?=$status?></p>
							<?endif;?>
							<a href="/blogDelete<?php echo $id ?>">Delete<a/>
							<form action="/blogEdit" method="post">
								<input id="blogTitle" onKeyUp="url()" type="text" name="blogTitle" value="<?=$blogTitle?>">
								<input id="blogURL" type="text" name="blogUrl" value="<?=$blogUrl?>">
								<textarea name="post" class="advancedEdit" style="width:300px !important"><?php echo $post?></textarea>
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
				<script src="/js/admin.js"></script>
		