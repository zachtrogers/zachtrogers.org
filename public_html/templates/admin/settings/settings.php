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
								<span>Change Email</span>
								<input type="text" name="email" value="<?=$email?>">
								<span>Change Display Name</span>
								<input type="text" name="userName" value="<?=$displayName?>">
								<span>Change Password</span>
								<input type="text" name="password" placeholder="New Password">
								<input type="text" name="passwordConfirm" placeholder="Confrim New Password">
								<input type="hidden" name="id" value="<?=$userNumber?>">
								<input type="submit" value="Save" />
							</form>
						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>
