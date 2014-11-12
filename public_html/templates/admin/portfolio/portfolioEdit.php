<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="portfolio">
						<h3>Edit</h3>
						<section>
							<?if(!empty($status)):?>
							<p class="status"><?=$status?></p>
							<?endif;?>
							<button title="Delete" type="button" onclick="location.href='/portfolioDelete/<?php echo $url ?>'">
                <span>
                  Delete
                </span>
			        </button>
							<form action="/portfolioEdit" method="post" enctype="multipart/form-data">
								<input id="title" type="text" name="title" value="<?=$title?>">
								<input id="url" onKeyUp="urlStop()" type="text" name="url" value="<?=$url?>">
								<input id="date" type="text" name="date" value="<?=$date?>">
								<textarea name="description" class="advancedEdit" style="width:300px !important"><?php echo $description?></textarea>
								<textarea name="languages" class="advancedEdit" style="width:300px !important"><?php echo $languages?></textarea>
			          <img style="display:none;" alt="Image Display Here" id="imageUpload" src="#" width="300px"/>
			          <input type="file" name="fileName" class="img" id="imgFile" onchange="readURL(this)"/>
                <img style="display:none;" alt="Image Display Here" id="imageUpload" src="#" width="600px"/>
                <img id="imageCurrent" width="300px" src="/img/portfolio/<?=$image?>"/>
                <input name="image" type="hidden" value="<?=$image?>">
								<input id="siteUrl" type="text" name="siteUrl" value="<?=$siteUrl?>">
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>
					
				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
				<script src="/js/admin.js"></script>


		