<?php
	$app->get("/portfolio", function () use ($app, $query, $test) {
	  $results = $query('SELECT id, post, dateSubmitted, submitter, url, title, displayName FROM ztr_porfolio ORDER BY id DESC');
    $app->render('../templates/public/portfolio.php', array('results' => $results));
	});