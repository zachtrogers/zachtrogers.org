<? require 'templates/header.php' ?>

<article id="blog">
	<h3>Blog</h3>
	<section>
	    <?php 
			while ($row = $results->fetch_assoc()) {
				echo $row['post'] . " " . $row['dateSubmitted'] . '<br/>';
			}

		?>
	</section>
</article>

<? require 'templates/footer.php' ?>