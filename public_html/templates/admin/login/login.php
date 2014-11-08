<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Login</h3>
						<section>

							<?if(!empty($error)):?>
							<p class="error"><?=$error?></p>
							<?endif;?>

							<form action="/login" method="POST">
							  <p>Email: <input type="text" name="email" id="email" value="<?=$email_value?>" /></p>
							  <p>Password: <input type="password" name="password" id="password" /></p>
							  <p><input type="submit" value="Login" />
							</form>

							<?if(!empty($urlRedirect)):?>
							<p class="small">(You will redirect to "<?=$urlRedirect?>" upon login)</p>
							<?endif;?>

						</section>
					</article>

				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>