<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>New</h3>
						<section>
							<form action="/blogNew" method="post">
								<input id="title" onKeyUp="urlStart()" type="text" name="title" placeholder="Title">
								<input id="url" onKeyUp="urlStop()" type="text" name="url" placeholder="URL">
								<textarea name="post" class="advancedEdit" style="width:300px !important"></textarea>
							  <input type="hidden" name="userId" value="<?=$userId?>">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
				<script src="/js/admin.js"></script>
									