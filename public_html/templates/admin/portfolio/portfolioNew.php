<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>New</h3>
						<section>
							<form action="/blogNew" method="post">
								<input id="blogTitle" onKeyUp="url()" type="text" name="blogTitle" placeholder="Title">
								<input id="blogURL" type="text" name="blogUrl" placeholder="URL">
								<textarea name="post" class="advancedEdit" style="width:300px !important"></textarea>
							  <input type="hidden" name="userNumber" value="<?=$userNumber?>">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
				<script src="/js/admin.js"></script>
									