<? require 'templates/header.php' ?>

<?php 

	while ($row = $results->fetch_assoc()) {
		echo $row['post'] . " " . $row['dateSubmitted'] . '<br/>';
	}

?>

<? require 'templates/footer.php' ?>