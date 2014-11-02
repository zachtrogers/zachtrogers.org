<? require 'templates/header.php' ?>

<?if(!empty($error)):?>
<p class="error"><?=$error?></p>
<?endif;?>

<p class="small">Hint: brian@nesbot.com / aaaa</p>

<form action="/login" method="POST">
  <p>Email: <input type="text" name="email" id="email" value="<?=$email_value?>" /> <span class="error"><?=$error?></span></p>
  <p>Password: <input type="password" name="password" id="password" /></p>
  <p><input type="submit" value="Login" />
</form>

<?if(!empty($urlRedirect)):?>
<p class="small">(You will redirect to "<?=$urlRedirect?>" upon login)</p>
<?endif;?>

<? require 'templates/footer.php' ?>