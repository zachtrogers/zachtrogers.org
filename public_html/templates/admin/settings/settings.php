<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Settings</h3>
						<section>
							<?if(!empty($status)):?>
							<p class="status"><?=$status?></p>
							<?endif;?>
							<form action="/settings" method="post">
								<span>Change Username</span>
								<input type="text" name="username" value="<?=$username?>">
								<br />
								<span>Change Display Name</span>
								<input type="text" name="displayName" value="<?=$displayName?>">
								<br />
								<span>Change Password</span>
								<br />
								<span>Must be at least 8 characters and contain upper and lower case.</span>
								<br />
								<input type="password" name="password" placeholder="New Password">
								<br />
								<input type="password" name="passwordConfirm" placeholder="Confrim New Password">
								<br />
								<input type="hidden" name="id" value="<?=$userId?>">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
