<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="portfolio">
						<h3>New</h3>
						<section>
							<form action="/portfolioNew" method="post" enctype="multipart/form-data">
								<input id="title" onKeyUp="urlStart()" type="text" name="title" placeholder="Title">
								<input id="url" onKeyUp="urlStop()" type="text" name="url" placeholder="URL">
								<input id="date" type="date" name="text" placeholder="Date Created">
								<textarea name="description" class="advancedEdit" style="width:300px !important"></textarea>
								<textarea name="languages" class="advancedEdit" style="width:300px !important"></textarea>
			          <img style="display:none;" alt="Image Display Here" id="imageUpload" src="#" width="300px"/>
			          <input type="file" name="fileName" class="img" id="imgFile" onchange="readURL(this)"/>
								<input id="siteUrl" type="text" name="siteUrl" placeholder="Site Url">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
				<script src="/js/admin.js"></script>