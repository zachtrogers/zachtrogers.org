<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>New</h3>
						<section>
							<form action="/blogNew" method="post">
								<textarea name="post" style="width:300px !important"></textarea>
							  <select style="width:150px !important" name="userName">
							    <option value="Zach">
							      Zach
							    </option>
							  </select>
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
									